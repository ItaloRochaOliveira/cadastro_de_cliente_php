@extends('layouts.main')

@section('title', "Edição de clientes")


<script>
<?php echo "var dados = " . json_encode($telefonesParaEditar) . ";"; ?>
</script>

@section('content')

<h1>Edição de pessoa</h1>

<form method="post" action="/pessoa/update/{{$pessoaParaEditar->id}}" id="form-pessoa">
    @csrf
    <div id="pessoa-formulario">
        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" value="{{$pessoaParaEditar->nome}}">
        </div>

        <div>
            <label for="cpf">CPF:</label>
            <input type="text" name="cpf" id="cpf" value="{{$pessoaParaEditar->cpf}}">
        </div>

        <div>
            <label for="rg">RG:</label>
            <input type="text" name="rg" id="rg" value="{{$pessoaParaEditar->rg}}">
        </div>

        <h3>Endereço</h3>
        <div>
            <label for="cep">CEP:</label>
            <input type="text" name="cep" id="cep" value="{{$pessoaParaEditar->cep}}">
        </div>

        <div>
            <label for="logradouro">Logradouro:</label>
            <input type="text" name="logradouro" id="logradouro" value="{{$pessoaParaEditar->logradouro}}">
        </div>

        <div>
            <label for="complemento">Complemento:</label>
            <input type="text" name="complemento" id="complemento" value="{{$pessoaParaEditar->complemento}}">
        </div>

        <div>
            <label for="setor">Setor:</label>
            <input type="text" name="setor" id="setor" value="{{$pessoaParaEditar->setor}}">
        </div>

        <div>
            <label for="cidade">Cidade:</label>
            <input type="text" name="cidade" id="cidade" value="{{$pessoaParaEditar->cidade}}">
        </div>

        <label for="uf">UF:</label>
        <select id="uf">
            <option value="{{empty($pessoaParaEditar->uf) ? 'select' : $pessoaParaEditar->uf}}">
                {{empty($pessoaParaEditar->uf) ? "select" : $pessoaParaEditar->uf}}</option>
            @foreach ($siglas as $i => $sigla)
            <option value="{{$sigla}}">{{$sigla}}</option>
            @endforeach
        </select>

    </div>

    <table>
        <thead>
            <tr>
                <th><label for="telefone">Telefone</label></th>
                <th><label for="descricao">Descrição</label></th>
            </tr>
        </thead>

        <div id="dados" data-pessoa="{{ json_encode($pessoaParaEditar) }}"></div>


        <tbody id="telefone-descricao"></tbody>
    </table>
    <span id="adicionar-linha-telefone">+</span>


    <div>
        <form method="post" action="/pessoa/update/{{$pessoaParaEditar->id}}">
            @csrf
            @method('PUT')
            <button type="submit">
                Gravar</button>
        </form>

        <form method="post" action="/pessoa/delete/{{$pessoaParaEditar->id}}">
            @csrf
            @method('DELETE')
            <button type="submit">
                Excluir</button>
        </form>

    </div>
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
</table>


@endsection