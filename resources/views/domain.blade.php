@extends('layouts.app')
@section('content')

<div style="margin-top: 20px; margin-right: 100px; margin-left: 100px;">
    <h2>Dominios</h2>

    <div class="row g-3">
        <div class="col-auto">
            <form action="{{ action('App\Http\Controllers\DomainController@search') }}" class="row g-3" method="POST">
                @csrf
                <div class="col-auto">
                    <input type="search" class="form-control" name="pesquisar" id="pesquisar" placeholder="Pesquisar">
                </div>
                <div class="col-auto">
                    <select name="tipo" id="tipo" class="form-control">
                        <option value="dominio" @if (!empty(old('tipo')) && old('tipo') == 'dominio') selected @endif>Nome do domínio</option>
                        <option value="preco" @if (!empty(old('tipo')) && old('tipo') == 'preco') selected @endif>Preço</option>
                        <option value="descricao" @if (!empty(old('tipo')) && old('tipo') == 'descricao') selected @endif>Descrição</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button class="btn btn-outline-dark" type="submit"><i class="fas fa-search"></i>
                        Pesquisar</button>
                </div>
            </form>
        </div>
        <div class="col-auto" style="margin-left: 20%">
            <a href="{{ action('App\Http\Controllers\DomainController@create') }}" class="btn btn-success"><i
                    class="fas fa-plus"></i> Cadastrar</a>
        </div>
        <div class="col-auto">
            <a class="btn btn-danger"
                href="{{ action('App\Http\Controllers\DomainController@pdfDomain') }}"><i
                    class="fas fa-file-pdf"></i>
                PDF</a>
        </div>
    </div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<table class="table table-hover" style="margin-top: 20px;">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nome do Domínio</th>
            <th scope="col">Email do Dono</th>
            <th scope="col">Preço</th>
            <th scope="col">Descrição</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($domains as $item)
            <tr>
                <th scope="row">{{ $item->id }}</th>
                <td>{{ $item->dominio }}</td>
                <td>R${{ $item->preco }}</td>
                <td>{{ $item->descricao }}</td>
                <td><a href="{{ action('App\Http\Controllers\DomainController@edit', $item->id) }}"><i class="fa fa-edit"></i></a></td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
