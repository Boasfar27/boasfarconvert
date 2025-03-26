<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckConversionLimit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $user = auth()->user();
            
            // Check if user has reached the limit (50 conversions for regular users)
            if ($user->hasReachedLimit()) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'You have reached your conversion limit. Please upgrade to premium for unlimited conversions.'
                ], 403);
            }
        }

        return $next($request);
    }
}
