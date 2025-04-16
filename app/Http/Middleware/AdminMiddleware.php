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

        // if(!Auth::user()->role_as == '1'){
        //     return redirect('/home')->with('status','Access Denied. As your are not Admin ');
        // }
        // return $next($request);

        if (Auth::check()) {
            if (Auth::user()->role_as == '1') {
                // Admin user, allow to proceed
                return $next($request);
            } elseif (Auth::user()->role_as == '0') {
                // Normal user
                return redirect('/')->with('status', 'Welcome to Farmer Portal');
            } else {
                // Any other role or unauthorized
                return redirect('/home')->with('status', 'Access Denied. You are not authorized.');
            }
        }
        else {
            return redirect('/login')->with('status', 'Please login to access the portal');
        }

    }
}
