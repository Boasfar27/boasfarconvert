<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ConversionLimitMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        
        // Check if user is authenticated
        if (!$user) {
            return redirect()->route('login');
        }
        
        // Skip limit for super admin
        if ($user->role === 2) {
            return $next($request);
        }
        
        // Premium users (role 1) have unlimited conversions
        if ($user->role === 1) {
            return $next($request);
        }
        
        // For free users (role 0), get the limit and check usage
        $baseLimit = 50; // Base limit for free users
        
        // Add any additional limit increases from donations
        $additionalLimit = 0;
        if ($user->additional_data) {
            $userData = json_decode($user->additional_data, true);
            $additionalLimit = $userData['limit_increases'] ?? 0;
        }
        
        $totalLimit = $baseLimit + $additionalLimit;
        
        // Check if the user has reached their conversion limit
        if ($user->usage_count >= $totalLimit) {
            return redirect()->route('limit.reached', [
                'limit' => $totalLimit,
                'isPremium' => false
            ]);
        }
        
        return $next($request);
    }
} 