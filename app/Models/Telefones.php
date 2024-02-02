<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefones extends Model
{
    use HasFactory;

    protected $fillable = ['telefone', 'descricao', 'id_pessoa'];

    private string $telefone;
    private string $descricao;
    private string $id_pessoa;

    
    public function PessoaModel($telefone, $descricao){
        $this->telefone = $telefone;
        $this->descricao = $descricao;
    }
    
    public function setTelefone($telefone){
        $this->telefone = $telefone;
    }
    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }
    public function setPessoa($id_pessoa){
        $this->id_pessoa = $id_pessoa;
    }

    // public function toArray()
    // {
    //     return [
    //         'telefone' => $this->telefone,
    //         'descricao' => $this->descricao,
    //         'id_pessoa' => $this->id_pessoa
    //     ];
    // }
}