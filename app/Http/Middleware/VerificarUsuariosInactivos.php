<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificarUsuariosInactivos
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $guard = null)
    {
        if(auth()->check() && (auth()->user()->isActive == 'Inactive')){

            // dd(auth()->user()->cargo);

            $authGuard = app('auth')->guard($guard);
            auth('web')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('login')->with('status', 'Tu cuenta esta suspendida, por favor contactar con el administrador para más información.');

        }
        else{
            return $next($request);
        }
    }
}
