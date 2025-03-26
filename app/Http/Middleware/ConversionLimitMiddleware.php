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
        
        // Check if the user has reached their conversion limit
        $limit = ($user->role === 1) ? 1000 : 50; // Premium vs Free user
        
        if ($user->usage_count >= $limit) {
            return response()->view('limit-reached', [
                'limit' => $limit,
                'isPremium' => $user->role === 1
            ]);
        }
        
        return $next($request);
    }
} 