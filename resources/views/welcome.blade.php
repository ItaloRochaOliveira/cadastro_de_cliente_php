@extends('layouts.main')

@section('title', "Cadastro de clientes")

@section('content')

<h1>Cadastro de pessoa</h1>
<form method="post" action="">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome">

    <label for="cpf">CPF:</label>
    <input type="text" name="cpf" id="cpf">

    <label for="rg">RG:</label>
    <input type="text" name="rg" id="rg">

    <h3>Endereço</h3>
    <label for="cep">CEP:</label>
    <input type="text" name="cep" id="cep">

    <label for="logradouro">Logradouro:</label>
    <input type="text" name="logradouro" id="logradouro">

    <label for="complemento">Complemento:</label>
    <input type="text" name="complemento" id="complemento">

    <label for="setor">Setor:</label>
    <input type="text" name="setor" id="setor">

    <label for="cidade">Cidade:</label>
    <input type="text" name="cidade" id="cidade">

    <label for="uf">UF:</label>
    <select id="uf">
        <option value="none">Select</option>
        @foreach ($siglas as $i => $sigla)
        <option value="{{$sigla}}">{{$sigla}}</option>
        @endforeach
    </select>

    <table>
        <thead>
            <tr>
                <th><label for="telefone">Telefone</label></th>
                <th><label for="descricao">Descrição</label></th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td><input type="text" id="telefone" name="telefone[]"></td>
                <td><input type="text" id="descricao" name="descricao[]"></td>
            </tr>
            <tr>
                <td><input type="text" name="telefone[]"></td>
                <td><input type="text" name="descricao[]"></td>
            </tr>
            <tr>
                <td><input type="text" name="telefone[]"></td>
                <td><input type="text" name="descricao[]"></td>
            </tr>
            <tr>
                <td><input type="text" name="telefone[]"></td>
                <td><input type="text" name="descricao[]"></td>
            </tr>
            <tr>
                <td><input type="text" name="telefone[]"></td>
                <td><input type="text" name="descricao[]"></td>
            </tr>

        </tbody>
    </table>

    <button type="submit">Gravar</button>
</form>

<div></div>

<table>
    <caption>
        <h2>Dados gravados</h2>
    </caption>

    <thead>
        <tr>
            <th>Nome:</th>
            <th>CPF</th>
            <th>RG</th>
            <th>CEP</th>
            <th>Telefone - Descrição</th>
            <th></th>
        </tr>
    </thead>

    <tbody>
        @foreach ($pessoas as $i => $pessoa)
        <tr>
            <th>{{$pessoa->nome}}</th>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection