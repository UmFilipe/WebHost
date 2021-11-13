@extends('layouts.app')

    @php
    if (!empty(Request::route('id'))) {
        $action = action('App\Http\Controllers\DomainController@update', $domain->id);
    } else {
        $action = action('App\Http\Controllers\DomainController@new');
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
                <div class="col-md-3">
                    <label for="dominio" class="form-label">Nome do domínio</label>
                    <input name="dominio" id="dominio" type="text" class="form-control" placeholder="Nome do domínio" required
                        value="@if (!empty(old('dominio'))) {{ old('dominio') }} @elseif(!empty($domain->dominio)){{ $domain->dominio }} @endif">
                </div>
            
                <div class="col-md-3">
                    <label for="preco" class="form-label">Preço</label>
                    <input name="preco" id="preco" type="text" class="form-control"
                        placeholder="15.00" required value="@if (!empty(old('preco'))) {{ old('preco') }} @elseif(!empty($domain->preco)){{ $domain->preco }} @endif">
                </div>
            <div class="form-group col-md-3">
            <label for="domain_categoria_id">Localidade</label>
            <select name="domain_categoria_id" class="form-control">
                @foreach ($domain_categorias as $item)
                <option value="{{$item->id}}" @if($item->id == old('domain_categoria_id', ($domain->domain_categoria_id))) selected="selected" @endif >{{$item->nome}} -
                    {{$item->sigla}}</option>
                @endforeach
            </select>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <label for="descricao" class="form-label">Descrição</label>
                    <textarea name="descricao" id="descricao" cols="30" rows="2" required
                        placeholder="Insira uma descrição breve para o domínio"
                        class="form-control">@if (!empty(old('descricao'))) {{ old('descricao') }} @elseif(!empty($domain->descricao)){{ $domain->descricao }} @endif</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3" style="margin-top: 10px;">
                    <button type="submit" class="btn btn-success"><i class="@if (!empty($domain->id)) fas fa-save
                        @else
                            fas fa-plus @endif"></i>
                        {{ empty($domain->id) ? 'Cadastrar' : 'Editar' }}
                    </button>

                    @if (!empty($domain->id))
                        <a class="btn btn-danger" href="{{ action('App\Http\Controllers\DomainController@remove', $domain->id) }}"
                        >
                            <i class="fas fa-trash"></i> Remover</a>
                    @endif
                </div>
            </div>
        </form>

    </div>

@endsection
