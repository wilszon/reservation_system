<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        abort(403); //abort() es un helper de Laravel que detiene inmediatamente 
        //la ejecución de la petición El número 403 es un código de estado HTTP que significa "Forbidden" (Prohibido).
    }
}
