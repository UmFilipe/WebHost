@extends('layouts.app')
@section('content')
<div style="margin-top: 20px; margin-right: 100px; margin-left: 100px;">
    <h2>Servidores</h2>

    <div class="row g-3">
        <div class="col-auto">
            <form action="{{ action('App\Http\Controllers\ServerController@search') }}" class="row g-3" method="POST">
                @csrf
                <div class="col-auto">
                    <input type="search" class="form-control" name="pesquisar" id="pesquisar" placeholder="Pesquisar">
                </div>
                <div class="col-auto">
                    <select name="type" id="type" class="form-control">
                        <option value="tipo" @if (!empty(old('type')) && old('type') == 'tipo') selected @endif>Tipo de Servidor</option>
                        <option value="preco" @if (!empty(old('type')) && old('type') == 'preco') selected @endif>Preço</option>
                        <option value="descricao" @if (!empty(old('type')) && old('type') == 'descricao') selected @endif>Descrição</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button class="btn btn-outline-dark" type="submit"><i class="fas fa-search"></i>
                        Pesquisar</button>
                </div>
            </form>
        </div>

        <div class="col-auto" style="margin-left: 10%">
            <a href="{{ action('App\Http\Controllers\ServerController@create') }}" class="btn btn-success"><i
                    class="fas fa-plus"></i> Cadastrar</a>
        </div>
        <div class="col-auto">
            <a class="btn btn-danger"
                href="{{ action('App\Http\Controllers\ServerController@pdfServer') }}"><i
                    class="fas fa-file-pdf"></i>
                PDF</a>
        </div>
        <div class="col-auto">
        <a href="{{url("/servers-email")}}" class="btn btn-warning"> <i class="fas fa-paper-plane"></i> Enviar
                Email</a>
        </div>

    </div>
    <table class="table table-hover" style="margin-top: 20px;">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Imagem</th>
                <th scope="col">Tipo de Servidor</th>
                <th scope="col">Preço</th>
                <th scope="col">Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($servers as $item)
                @php
                    !empty($item->nome_arquivo) ? $nome_arquivo = $item->nome_arquivo : $nome_arquivo = "sem_imagem.png";
                @endphp
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td><img src="/storage/imagem/{{$nome_arquivo}}" width="150px"/></td>
                    <td>{{ $item->tipo }}</td>
                    <td>R${{ $item->preco }}</td>
                    <td>{{ $item->descricao }}</td>
                    <td><a href="{{ action('App\Http\Controllers\ServerController@edit', $item->id) }}"><i class="fa fa-edit"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-around">
        {{ $servers->links()}}
    </div>
@endsection
