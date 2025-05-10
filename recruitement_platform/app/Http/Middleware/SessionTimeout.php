<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SessionTimeout
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('user_id')) {
            return redirect()->route('connexion.choix');
        }

        $lastActivity = session('last_activity');
        $timeout = now()->diffInMinutes($lastActivity);

        if ($timeout > 15) {
            $role = session('user_role');
            session()->flush();

            return redirect()->route($role === 'employeur' ? 'connexion.recruteur' : 'connexion.candidat')
                ->with('message', 'Session expirée. Veuillez vous reconnecter.');
        }

        session(['last_activity' => now()]); // Rafraîchir l'activité

        return $next($request);
    }
    
}
