@extends('layouts.app')

    @php
    if (!empty(Request::route('id'))) {
        $action = action('App\Http\Controllers\HostController@update', $hosts->id);
    } else {
        $action = action('App\Http\Controllers\HostController@new');
    }
    @endphp
    @section('script')
    <script>
        $(document).ready(function($){
        $('#preco').mask("###0.00", {reverse: true})
    }); 
    </script>
    @endsection
    @section('content')

    <div style="margin-top: 20px; margin-right: 100px; margin-left: 100px;">

        <form action="{{ $action }}" method="POST" class="col">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <label for="tamanho" class="form-label">Tamanho da Host (GB) </label>
                    <input name="tamanho" id="tamanho" type="text" class="form-control" placeholder="20" required
                        value="@if (!empty(old('tamanho'))) {{ old('tamanho') }} @elseif(!empty($hosts->tamanho)){{ $hosts->tamanho }} @endif">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="localizacao" class="form-label">Localização</label>
                    <input name="localizacao" id="localizacao" type="text" class="form-control" placeholder="Santa Catarina" required
                        value="@if (!empty(old('localizacao'))) {{ old('localizacao') }} @elseif(!empty($hosts->localizacao)){{ $hosts->localizacao }} @endif">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="preco" class="form-label">Preço (R$)</label>
                    <input name="preco" id="preco" type="text" class="form-control"
                        placeholder="300" required value="@if (!empty(old('preco'))) {{ old('preco') }} @elseif(!empty($hosts->preco)){{ $hosts->preco }} @endif">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 10px;">
                    <button type="submit" class="btn btn-success"><i class="@if (!empty($hosts->id)) fas fa-save
                        @else
                            fas fa-plus @endif"></i>
                        {{ empty($hosts->id) ? 'Cadastrar' : 'Editar' }}</button>
                </div>
                <div class="col-md-12" style="margin-top: 10px;">
                    @if (!empty($hosts->id))
                        <a class="btn btn-danger" href="{{ action('App\Http\Controllers\HostController@remove', $hosts->id) }}"
                        >
                            <i class="fas fa-trash"></i> Remover</a>
                    @endif
                </div>
            </div>
        </form>

    </div>

@endsection
