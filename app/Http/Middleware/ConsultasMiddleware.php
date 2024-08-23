<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class ConsultasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->isMedico()) {
            return $next($request);
        } else {
            // Se não for um medico, redireciona com uma mensagem de erro
            return redirect()->route('home')->
                withErrors(['access' => 'Você']);
        }
    }
}