<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AssignRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Ensure the user has a role assigned
            if ($user->role && isset($user->role->name)) {
                if (method_exists($user, 'assignRole')) {
                    $user->assignRole($user->role->name);
                }
                return $next($request);
            }
        }

        return redirect('/unauthorized')->with('error', 'You do not have access to this page.');
    }
}
