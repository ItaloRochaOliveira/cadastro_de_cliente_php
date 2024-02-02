<?php

namespace App\Models;
namespace App\Http\Controllers;


use App\Http\Requests\EventStoreRequest;
use Illuminate\Http\Request;

use App\PessoaModel;
use App\Models\TelefoneModel;
use App\Models\Pessoas;
use App\Models\Telefones;
use Illuminate\Support\Facades\Log;
use PessoaModel as GlobalPessoaModel;

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
            $telefonesDaPessoa = array();
            foreach($telefones as $it => $telefone){
                if($pessoa->id == $telefone->id_pessoa){
                    // echo $telefone;
                    array_push($telefonesDaPessoa, $telefone);
                    $pessoas[$ip]->telefone = $telefonesDaPessoa;
                }
            }
        }
    
        return view('welcome', ['siglas' => $siglas, "pessoas" => $pessoas]);
    }

    public function store(Request $request){
        // $request->validate($this->rules()); // Execute a validação explicitamente

        // $dadosDoFormulario = $request->validated();

       
        $databasePessoa = new Pessoas([
            'nome' => $request["nome"],
            'cpf' => $request['cpf'],
            'rg' => $request['rg'],
            'cep' => $request['cep'],
            'logradouro' => $request['logradouro'],
            'complemento' => $request['complemento'],
            'setor' => $request['setor'],
            'cidade' => $request['cidade'],
            'uf' => $request['uf'],
        ]);

      $databasePessoa->save();

        foreach($request->telefone as $it => $telefone){
            if(!empty($telefone['telefone'])){
                $databaseTelefone = new Telefones([
                    'telefone' => $telefone['telefone'], 
                    'descricao' => $telefone['descricao'] , 
                    'id_pessoa' => $databasePessoa->id
                ]);
                

                $databaseTelefone->save();
            }
        }
       

        return redirect("/");
    }

    // public function edit($id){
        
    // }
}