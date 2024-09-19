<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
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
            // Check if the user has an admin usertype
            if (Auth::user()->usertype === 'admin') {
                return $next($request);
            } else {
                // If the user is authenticated but not an admin
                abort(403, 'Access denied');
            }
        } else {
            // If the user is not authenticated
            return redirect()->route('login'); // Redirect to login or another page
        }
    }
}
