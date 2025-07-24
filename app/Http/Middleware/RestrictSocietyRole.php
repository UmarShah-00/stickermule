<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RestrictSocietyRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user has the 'society' role
        if (auth()->user() && auth()->user()->hasRole('society')) {
            // Redirect if the user has the 'society' role and is trying to access a restricted route
            return redirect('/payment');  // Replace '/home' with any route you want to redirect them to
        }

        // Allow the request to continue if the user does not have the 'society' role
        return $next($request);
    }
}
