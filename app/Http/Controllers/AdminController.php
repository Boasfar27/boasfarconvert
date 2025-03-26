<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Constructor with middleware
     */
    public function __construct()
    {
        $this->middleware(['auth:sanctum', 'verified', 'superadmin']);
    }

    /**
     * Display admin dashboard
     */
    public function dashboard()
    {
        // Get counts for dashboard stats
        $userCount = User::count();
        $pendingPayments = Payment::where('status', 'pending')->count();
        $completedPayments = Payment::where('status', 'approved')->count();
        $totalAmount = Payment::where('status', 'approved')->sum('amount');
        
        // Get latest users and payments
        $latestUsers = User::latest()->take(5)->get();
        $latestPayments = Payment::with('user')->latest()->take(5)->get();
        
        return view('admin.dashboard', [
            'userCount' => $userCount,
            'pendingPayments' => $pendingPayments,
            'completedPayments' => $completedPayments,
            'totalAmount' => $totalAmount,
            'latestUsers' => $latestUsers,
            'latestPayments' => $latestPayments,
        ]);
    }

    /**
     * Display all payments
     */
    public function payments()
    {
        $payments = Payment::with('user')->latest()->paginate(15);
        
        return view('admin.payments', [
            'payments' => $payments
        ]);
    }
    
    /**
     * View payment details
     */
    public function viewPayment($id)
    {
        $payment = Payment::with('user', 'processor')->findOrFail($id);
        
        return view('admin.payment-detail', [
            'payment' => $payment
        ]);
    }

    /**
     * Display all users
     */
    public function users()
    {
        $users = User::latest()->paginate(15);
        
        return view('admin.users', [
            'users' => $users
        ]);
    }

    /**
     * Approve a payment
     */
    public function approvePayment(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        
        // Only process pending payments
        if ($payment->status !== 'pending') {
            return redirect()->back()->with('error', 'This payment has already been processed.');
        }
        
        // Update payment status
        $payment->status = 'approved';
        $payment->processed_by = Auth::id();
        $payment->processed_at = now();
        $payment->notes = $request->notes;
        $payment->save();
        
        // Update user based on payment type
        $user = User::find($payment->user_id);
        
        if ($payment->type === 'premium_upgrade') {
            // Upgrade user to premium
            $user->role = 1; // Premium user
            $user->save();
        } elseif ($payment->type === 'limit_increase') {
            // Increase user conversion limit
            $additionalData = json_decode($payment->additional_data, true);
            $additionalConversions = $additionalData['additional_conversions'] ?? 0;
            
            // Create a record of the limit increase in additional_data of the user
            $userLimitIncrease = $user->additional_data ? json_decode($user->additional_data, true) : [];
            $userLimitIncrease['limit_increases'] = isset($userLimitIncrease['limit_increases']) ? 
                $userLimitIncrease['limit_increases'] + $additionalConversions : 
                $additionalConversions;
            
            $user->additional_data = json_encode($userLimitIncrease);
            $user->save();
        }
        
        return redirect()->back()->with('success', 'Payment approved successfully.');
    }

    /**
     * Reject a payment
     */
    public function rejectPayment(Request $request, $id)
    {
        $payment = Payment::findOrFail($id);
        
        // Only process pending payments
        if ($payment->status !== 'pending') {
            return redirect()->back()->with('error', 'This payment has already been processed.');
        }
        
        // Update payment status
        $payment->status = 'rejected';
        $payment->processed_by = Auth::id();
        $payment->processed_at = now();
        $payment->notes = $request->notes;
        $payment->save();
        
        return redirect()->back()->with('success', 'Payment rejected successfully.');
    }

    /**
     * Update user role
     */
    public function updateUserRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|integer|in:0,1,2',
        ]);
        
        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();
        
        return redirect()->back()->with('success', 'User role updated successfully.');
    }
} 