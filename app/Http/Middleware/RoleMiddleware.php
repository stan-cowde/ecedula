<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = Auth::user();

        // Check if the user is authenticated
        if (!$user) {
            return redirect('/login'); // Redirect to login page if not authenticated
        }

        // Role check: Assume role ID 1 = user, 2 = superadmin
        $roles = [
            'user' => 1,
            'admin' => 2,
        ];

        //abort if not authorized
        abort_if(
            $user->role != $roles[$role],
            403,
            'Unauthorized action.'
        );

        return $next($request);
    }
}
