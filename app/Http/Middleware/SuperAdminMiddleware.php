<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated and is a super admin (role = 2)
        if (!$request->user() || $request->user()->role !== 2) {
            return redirect()->route('dashboard')->with('error', 'You do not have permission to access this area.');
        }
        
        return $next($request);
    }
} 