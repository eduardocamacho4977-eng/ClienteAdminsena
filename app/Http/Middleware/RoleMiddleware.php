<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $userRole = Auth::user()->getEffectiveRole();

        if (empty($roles) || in_array($userRole, $roles, true)) {
            return $next($request);
        }

        abort(403, 'No tienes permisos para acceder a esta sección.');
    }
}
