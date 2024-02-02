<?php

namespace App\Http\Middleware;

use App\Models\Pessoas;
use App\Models\Telefones;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ShareInfoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $pessoas = Pessoas::all();
        $telefones = Telefones::all();

        foreach($pessoas as $ip => $pessoa){
            $telefonesDaPessoa = array();
            foreach($telefones as $it => $telefone){
                if($pessoa->id == $telefone->id_pessoa){
                    array_push($telefonesDaPessoa, $telefone);
                    $pessoas[$ip]->telefone = $telefonesDaPessoa;
                }
            }
        }

         app()->instance('pessoas', $pessoas);
 
         return $next($request);
    }
}