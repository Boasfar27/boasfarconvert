<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    /**
     * Redirect to Google OAuth
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Handle Google callback
     */
    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            // Check if the user already exists in our system
            $finduser = User::where('email', $user->email)->first();

            if ($finduser) {
                // User exists, log them in
                Auth::login($finduser);
                return redirect()->route('dashboard');
            } else {
                // Create a new user
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => Hash::make(uniqid()), // Random password
                    'role' => 0, // Default to regular user
                    'usage_count' => 0,
                ]);

                Auth::login($newUser);
                return redirect()->route('dashboard');
            }
        } catch (\Throwable $e) {
            return redirect()->route('login')->with('error', 'Google authentication failed: ' . $e->getMessage());
        }
    }
}
