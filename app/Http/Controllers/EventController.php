<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pessoas;

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
    
        return view('welcome', ['siglas' => $siglas, "pessoas" => $pessoas]);
    }
}