<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdminRole
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->rol !== 'admin') {
            return redirect('/')->withErrors('No tienes permisos para acceder a esta página.');
        }

        return $next($request);
    }
}