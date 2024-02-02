<?php

namespace App\Http\Controllers;


use App\Http\Requests\EventStoreRequest;
use Illuminate\Http\Request;

use App\Models\Pessoas;
use App\Models\Telefones;

class EventController extends Controller
{
    public $siglas = [
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


    public function index(){
        
        $pessoas = app('pessoas');
    
        return view('welcome', ['siglas' => $this->siglas, "pessoas" => $pessoas]);
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

    public function edit($id){
        $pessoas = app('pessoas');

        $pessoaParaEditar = Pessoas::findOrFail($id);
        $telefonesParaEditar = Telefones::findOrFail($pessoaParaEditar->id);

        return view('EditUserView', [
            'siglas' => $this->siglas, 
            "pessoas" => $pessoas, 
            'pessoaParaEditar' => $pessoaParaEditar, 
            'telefonesParaEditar' => $telefonesParaEditar
        ]);
    }
}