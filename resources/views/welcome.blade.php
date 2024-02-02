@extends('layouts.main')

@section('title', "Cadastro de clientes")

@section('content')

<h1 class="title">Cadastro de pessoa</h1>

<form method="post" action="/pessoa/create">
    @csrf
    <div id="pessoa-formulario">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome">
        </div>

        <div>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf">
        </div>

        <div>
            <label for="rg">RG:</label>
            <input type="text" name="rg" id="rg">
        </div>

        <h3 class="title">Endereço</h3>
        <div>
            <label for="cep">CEP:</label>
            <input type="text" name="cep" id="cep">
        </div>

        <div>
            <label for="logradouro">Logradouro:</label>
            <input type="text" name="logradouro" id="logradouro">
        </div>

        <div>
            <label for="complemento">Complemento:</label>
            <input type="text" name="complemento" id="complemento">
        </div>

        <div>
            <label for="setor">Setor:</label>
            <input type="text" name="setor" id="setor">
        </div>

        <div>
            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" id="cidade">
        </div>

        <div id="block">
            <label for="uf">UF:</label>
            <select id="uf">
                <option value="none">Select</option>
                @foreach ($siglas as $i => $sigla)
                <option value="{{$sigla}}">{{$sigla}}</option>
                @endforeach
            </select>
        </div>
    </div>


    <div id="center-telephones">
        <div>
            <table id="table-telephones">
                <thead>
                    <tr>
                        <th><label for="telefone" class="title">Telefone</label></th>
                        <th><label for="descricao" class="title">Descrição</label></th>
                    </tr>
                </thead>

                <tbody id="telefone-descricao"></tbody>
            </table>

            <div>
                <div id="adicionar-linha-telefone">+</div>
            </div>
        </div>

        <button type="submit" id="gravar">Gravar</button>
    </div>
</form>

<div id="linha"></div>

<table id="print-users">
    <div>
        <caption>
            <h2 class="title">Dados gravados</h2>
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
                <th>{{$pessoa->cpf}}</th>
                <th>{{$pessoa->rg}}</th>
                <th>{{$pessoa->cep}}</th>
                <th>
                    @if(isset($pessoa->telefone))
                    @foreach ($pessoa->telefone as $i => $telefone)
                    <p>{{$telefone->telefone}} - {{$telefone->descricao}}</p>
                    @endforeach
                    @endif
                </th>
                <th><button><a href="/pessoa/edit/{{$pessoa->id}}">editar</a></button></th>
            </tr>
            @endforeach
        </tbody>
    </div>
</table>

@endsection