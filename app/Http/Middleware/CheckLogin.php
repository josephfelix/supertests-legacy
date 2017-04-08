<?php

namespace App\Http\Middleware;

use Closure;

/**
 * Class CheckLogin
 * @package App\Http\Middleware
 */
class CheckLogin
{
    /**
     * Verifica se o usuário está logado
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->get('logged')) {
            return redirect('/');
        }

        return $next($request);
    }
}
