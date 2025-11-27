<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTeam
{
    /**
     * Handle an incoming request.
     *
     * Verifica que el usuario tenga el rol especificado en la tabla team_user.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role): Response
    {
        $user = $request->user();

        if (! $user) {
            abort(403, 'No autenticado.');
        }

        // Normalizar a minúsculas para comparación
        $role = mb_strtolower($role);

        // Verificar si el usuario tiene el rol en la tabla team_user
        $hasRole = $user->teams()
            ->wherePivot('role', $role)
            ->exists();

        if (! $hasRole) {
            abort(403, 'No tienes acceso a esta área. Se requiere el rol: ' . $role);
        }

        return $next($request);
    }
}
