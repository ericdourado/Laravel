<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil)
    {
        echo $metodo_autenticacao . '<br>';
        if ($metodo_autenticacao == 'padrao')
        {

        }
        if($metodo_autenticacao == 'ldap'){

        }
        if(false){
            return $next($request);
        }else{
            return response('Acesso negado! rota exige autenticacao');
        }
      
    }
}
