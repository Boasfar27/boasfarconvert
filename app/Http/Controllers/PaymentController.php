<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Show premium upgrade form
     */
    public function showPremiumUpgrade()
    {
        // Only allow free users to access this page
        if (Auth::user()->role !== 0) {
            return redirect()->route('dashboard')->with('error', 'You are already a premium user.');
        }
        
        return view('payments.premium-upgrade');
    }
    
    /**
     * Show limit upgrade form
     */
    public function showLimitUpgrade()
    {
        // Only allow free users to access this page
        if (Auth::user()->role !== 0) {
            return redirect()->route('dashboard')->with('error', 'Premium users have unlimited conversions.');
        }
        
        return view('payments.limit-upgrade');
    }

    /**
     * Process premium upgrade payment
     */
    public function upgradeToPremium(Request $request)
    {
        $request->validate([
            'payment_id' => 'nullable|string|max:255',
            'payment_proof' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        // Store the payment proof file
        $paymentProofPath = null;
        if ($request->hasFile('payment_proof')) {
            $file = $request->file('payment_proof');
            $filename = 'payment_proof_' . time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $paymentProofPath = $file->storeAs('payment_proofs', $filename, 'public');
        }

        // Create payment record
        $payment = Payment::create([
            'user_id' => Auth::id(),
            'amount' => 50000, // Rp 50,000
            'payment_id' => $request->payment_id,
            'payment_proof' => $paymentProofPath,
            'description' => 'Premium upgrade',
            'status' => 'pending', // Initial status is pending
            'type' => 'premium_upgrade',
        ]);

        return redirect()->route('payment-history')->with('success', 'Your premium upgrade request has been submitted and is pending approval by an administrator. This may take 1-5 minutes.');
    }

    /**
     * Process donation for limit increase
     */
    public function increaseLimitDonation(Request $request)
    {
        $request->validate([
            'payment_id' => 'nullable|string|max:255',
            'amount' => 'required|numeric|min:5000',
            'payment_proof' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
        ]);

        $amount = $request->amount;
        
        // Calculate additional conversions based on amount
        $additionalConversions = 0;
        if ($amount >= 20000) {
            $additionalConversions = 60;
        } elseif ($amount >= 10000) {
            $additionalConversions = 25;
        } elseif ($amount >= 5000) {
            $additionalConversions = 10;
        } else {
            return redirect()->back()->with('error', 'Minimum donation amount is Rp 5,000');
        }

        // Store the payment proof file
        $paymentProofPath = null;
        if ($request->hasFile('payment_proof')) {
            $file = $request->file('payment_proof');
            $filename = 'payment_proof_' . time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
            $paymentProofPath = $file->storeAs('payment_proofs', $filename, 'public');
        }

        // Create payment record
        $payment = Payment::create([
            'user_id' => Auth::id(),
            'amount' => $amount,
            'payment_id' => $request->payment_id,
            'payment_proof' => $paymentProofPath,
            'description' => "Limit increase (+{$additionalConversions} conversions)",
            'status' => 'pending', // Initial status is pending
            'type' => 'limit_increase',
            'additional_data' => json_encode(['additional_conversions' => $additionalConversions])
        ]);

        return redirect()->route('payment-history')->with('success', 'Your donation has been submitted and is pending approval by an administrator. This may take 1-5 minutes.');
    }

    /**
     * Display payment history for the authenticated user
     */
    public function paymentHistory()
    {
        $payments = Payment::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('payments.history', [
            'payments' => $payments
        ]);
    }
} 