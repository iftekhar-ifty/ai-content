<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) { // Ensure user is authenticated
            $user = auth()->user();

//            if ($user->type === 'admin') {
//                return redirect('/admin/dashboard');  // Redirect to admin dashboard
//            } else if ($user->type === 'user') {
//                return redirect('/user/dashboard');   // Redirect to user dashboard
//            }
        }

        return $next($request);
    }
}
