<?php

use Illuminate\Database\Eloquent\Model;

class TelefoneModel extends Model{
    private string $telefone;
    private string $descricao;

    
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

    public function toArray()
    {
        return [
            'telefone' => $this->telefone,
            'descricao' => $this->descricao,
        ];
    }

}