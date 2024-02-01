<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pessoas;
use App\Models\Telefones;

class EventController extends Controller
{
    public function index(){
        $siglas = [
            'AC',
            'AL',
            'AP',
            'AM',
            'BA',
            'CE',
            'DF',
            'ES',
            'GO',
            'MA',
            'MS',
            'MT',
            'MG',
            'PA',
            'PB',
            'PR',
            'PE',
            'PI',
            'RJ',
            'RN',
            'RS',
            'RO',
            'RR',
            'SC',
            'SP',
            'SE',
            'TO',
        ];

        $pessoas = Pessoas::all();
        $telefones = Telefones::all();

        $pessoas[0]->id;

        foreach($pessoas as $ip => $pessoa){
            foreach($telefones as $it => $telefone){
                if($pessoa->id_telefone == $telefone->id){
                    // echo $pessoas[$ip];
                    $pessoas[$ip]->telefone = $telefone;
                }
            }
        }
    
        return view('welcome', ['siglas' => $siglas, "pessoas" => $pessoas]);
    }
}