@extends('layouts.app')
@section('content')

<div class="index">

    <h1>WebHost, a melhor revendedora de hosts do Brasil</h1>

    <img class="img-index"  src="https://media.discordapp.net/attachments/789554224132259890/872218567553200208/Servidores.png"
    alt="Servidor"/>

    <div class="bottomButtons">
        <a class="btn btn-danger" href="/domain">Domínios</a>
        <a class="btn btn-warning" href="/hosts" style="margin-left: 20px">Hospedagens</a>
        <a class="btn btn-success" href="/servers" style="margin-left: 20px">Servidores</a>
    </div>
</div>

@endsection
