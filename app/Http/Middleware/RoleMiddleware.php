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
    // 1. Validar si el usuario NO está autenticado
    if (!Auth::check()) {
        // En lugar de redireccionar a route('login'), aborta con error 401 o retorna JSON
        return response()->json([
            'message' => 'No has iniciado sesión.'
        ], 401);
    }

    // 2. Obtener el rol del usuario autenticado
    $userRole = Auth::user()->getEffectiveRole();

    // 3. Validar si tiene el rol requerido
    if (empty($roles) || in_array($userRole, $roles, true)) {
        return $next($request);
    }

    // 4. Si no tiene el rol
    return response()->json([
        'message' => 'No tienes permisos para acceder a esta sección.'
    ], 403);
}
}