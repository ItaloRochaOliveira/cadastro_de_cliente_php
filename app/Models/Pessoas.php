<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoas extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'cpf', 'rg', 'cep', 'logradouro', 'complemento', 'setor', 'cidade', 'uf'];

    private string $nome;
    private string $cpf;
    private string $rg;
    private string $cep;
    private string $logradouro;
    private string $complemento;
    private string $setor;
    private string $cidade;
    private string $uf;

    public function Pessoas($nome, $cpf, $rg, $cep, $logradouro, $complemento, $setor, $cidade, $uf){
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->rg = $rg;
        $this->cep = $cep;
        $this->logradouro = $logradouro;
        $this->complemento = $complemento;
        $this->setor = $setor;
        $this->cidade = $cidade;
        $this->uf = $uf;
    }
    
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function setCpf($cpf){
        $this->cpf = $cpf;
    }
    public function setRg($rg){
        $this->rg = $rg;
    }
    public function setCep($cep){
        $this->cep = $cep;
    }
    public function setLogradouro($logradouro){
        $this->logradouro = $logradouro;
    }
    public function setComplemento($complemento){
        $this->complemento = $complemento;
    }
    public function setSetor($setor){
        $this->setor = $setor;
    }
    public function setCidade($cidade){
        $this->cidade = $cidade;
    }
    public function setUf($uf){
        $this->uf = $uf;
    }

    public function toArray()
    {
        return [
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'rg' => $this->rg,
            'cep' => $this->cep,
            'logradouro' => $this->logradouro,
            'complemento' => $this->complemento,
            'setor' => $this->setor,
            'cidade' => $this->cidade,
            'uf' => $this->uf,
        ];
    }
}