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
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $teamName): Response
    {
        $user = $request->user();

        // 1. Verificar si el usuario tiene un equipo actual asignado
        if (! $user || ! $user->currentTeam) {
            abort(403, 'No perteneces a ningún equipo.');
        }

        // 2. Verificar si el nombre del equipo coincide con el requerido
        // Nota: Podrías usar IDs o Slugs si prefieres no depender del nombre exacto.
        if ($user->currentTeam->name !== $teamName) {
             abort(403, 'No tienes acceso al área de ' . $teamName);
        }

        return $next($request);
    }
}
