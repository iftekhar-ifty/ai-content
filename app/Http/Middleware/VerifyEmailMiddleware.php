<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class VerifyEmailMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user's email is verified
            if (!Auth::user()->email_verified_at) {
                // Redirect the user to the email verification page
                return redirect()->route('verification.noticeResend');
            }
        }

        // If the user is authenticated and email is verified, proceed with the request
        // Or if the user is a guest, proceed with the request
        return $next($request);
    }
}
