@extends('layouts.app')

    @php
    if (!empty(Request::route('id'))) {
        $action = action('App\Http\Controllers\ServerController@update', $servers->id);
    } else {
        $action = action('App\Http\Controllers\ServerController@new');
    }
    @endphp

    @section('content')

    <div style="margin-top: 20px; margin-right: 100px; margin-left: 100px;">

        <form action="{{ $action }}" method="POST" class="col">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label for="tipo" class="form-label">Tipo do servidor</label>
                    <input name="tipo" id="tipo" type="text" class="form-control" placeholder="Tipo do servidor" required
                        value="@if (!empty(old('tipo'))) {{ old('tipo') }} @elseif(!empty($servers->tipo)){{ $servers->tipo }} @endif">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="preco" class="form-label">Preço</label>
                    <input name="preco" id="preco" type="text" class="form-control"
                        placeholder="R$ 15" required value="@if (!empty(old('preco'))) {{ old('preco') }} @elseif(!empty($servers->preco)){{ $servers->preco }} @endif">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea name="descricao" id="descricao" cols="30" rows="2" required
                        placeholder="Insira uma descrição para o servidor"
                        class="form-control">@if (!empty(old('descricao'))) {{ old('descricao') }} @elseif(!empty($servers->descricao)){{ $servers->descricao }} @endif</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 10px;">
                    <button type="submit" class="btn btn-success"><i class="@if (!empty($servers->id)) fas fa-save
                        @else
                            fas fa-plus @endif"></i>
                        {{ empty($servers->id) ? 'Cadastrar' : 'Editar' }}</button>
                </div>
                <div class="col-md-12" style="margin-top: 10px;">
                    @if (!empty($servers->id))
                        <a class="btn btn-danger" href="{{ action('App\Http\Controllers\ServerController@remove', $servers->id) }}"
                        >
                            <i class="fas fa-trash"></i> Remover</a>
                    @endif
                </div>
            </div>
        </form>

    </div>

@endsection
