<?php

namespace App\Http\Controllers;


use App\Http\Requests\EventStoreRequest;
use Illuminate\Http\Request;

use App\Models\Pessoas;
use App\Models\Telefones;
use tidy;

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
        $telefonesParaEditar = Telefones::where(
            'id_pessoa', '=', $pessoaParaEditar->id
        )->get();

        return view('EditUserView', [
            'siglas' => $this->siglas, 
            "pessoas" => $pessoas, 
            'pessoaParaEditar' => $pessoaParaEditar, 
            'telefonesParaEditar' => $telefonesParaEditar
        ]);
    }

    public function update(Request $request){
        $id = $request->id;

        $databasePessoa = Pessoas::find($id);

        $databasePessoa->update([
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


        $telefonesParaEditar = Telefones::where(
            'id_pessoa', '=', $id
        )->get();

        foreach($request->telefone as $it => $telefone){
            
            if(isset($telefonesParaEditar[$it])){
                $telefoneAtual = Telefones::findOrFail($telefonesParaEditar[$it]->id);
               $telefoneAtual->update([
                'telefone' => $telefone['telefone'], 
                'descricao' => $telefone['descricao'] 
            ]);
            } else {
                if(!empty($telefone['telefone'])){
                    $databaseTelefone = new Telefones([
                        'telefone' => $telefone['telefone'], 
                        'descricao' => $telefone['descricao'] , 
                        'id_pessoa' => $databasePessoa->id
                    ]);

                    $databaseTelefone->save();
            }
            }
        }

        return redirect("/pessoa/edit/{$id}");
    }

    public function delete(Request $request){
        $id = $request->id;

        $telefonesParaEditar = Telefones::where(
            'id_pessoa', '=', $id
        )->get();

        foreach($telefonesParaEditar as $it => $telefone){
            Telefones::findOrFail($telefone->id)->delete();
        } 
               
        Pessoas::findOrFail($id)->delete();

        return redirect("/")->with("msg", "Pessoa Excluida com sucesso.");
    }
}