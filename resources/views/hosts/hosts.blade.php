@extends('layouts.app')
@section('content')
<div style="margin-top: 20px; margin-right: 100px; margin-left: 100px;">
    <h2>Hosts</h2>

    <div class="row g-3">
        <div class="col-auto">
            <form action="{{ action('App\Http\Controllers\HostController@search') }}" class="row g-3" method="POST">
                @csrf
                <div class="col-auto">
                    <input type="search" class="form-control" name="pesquisar" id="pesquisar" placeholder="Pesquisar">
                </div>
                <div class="col-auto">
                    <select name="tipo" id="tipo" class="form-control">
                        <option value="tamanho" @if (!empty(old('tipo')) && old('tipo') == 'tamanho') selected @endif>Tamanho</option>
                        <option value="localizacao" @if (!empty(old('tipo')) && old('tipo') == 'localizacao') selected @endif>Localização</option>
                        <option value="preco" @if (!empty(old('tipo')) && old('tipo') == 'preco') selected @endif>Descrição</option>
                    </select>
                </div>
                <div class="col-auto">
                    <button class="btn btn-outline-dark" type="submit"><i class="fas fa-search"></i>
                        Pesquisar</button>
                </div>
            </form>
        </div>
        <div class="col-auto" style="margin-left: 10%">
            <a href="{{ action('App\Http\Controllers\HostController@create') }}" class="btn btn-success"><i
                    class="fas fa-plus"></i> Cadastrar</a>
        </div>
        <div class="col-auto">
            <a class="btn btn-danger"
                href="{{ action('App\Http\Controllers\HostController@pdfHosts') }}"><i
                    class="fas fa-file-pdf"></i>
                PDF</a>
        </div>
        <div class="col-auto">
        <a href="{{url("/hosts-email")}}" class="btn btn-warning"> <i class="fas fa-paper-plane"></i> Enviar
                Email</a>
        </div>
    </div>
    <table class="table table-hover" style="margin-top: 20px;">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Tamanho do Host</th>
                <th scope="col">Localização</th>
                <th scope="col">Preço</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($hosts as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->tamanho }} GB</td>
                    <td>{{ $item->localizacao }}</td>
                    <td>R$ {{ $item->preco }}</td>
                    <td><a href="{{ action('App\Http\Controllers\HostController@edit', $item->id) }}"><i class="fa fa-edit"></i></a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-around">
        {{$hosts->links()}}
    </div>

@endsection
