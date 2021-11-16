<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <title>WebHost</title>
</head>

<body
    style="margin-top: 50px; margin-bottom: 50px; margin-right: 30px; margin-left: 30px; width: 100%; height: 100vh; justify-content: center;">
    @if (!empty($servers))
    <p>Lista de Servidores</p>
    <div class="col-auto">
    <table class="table table-hover" style="margin-top: 20px;">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Tipo de Servidor</th>
                <th scope="col">Preço</th>
                <th scope="col">Descrição</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($servers as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->tipo }}</td>
                    <td>R${{ $item->preco }}</td>
                    <td>{{ $item->descricao }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
        <h3>Não há nenhum item para ser exibido.</h3>
    @endif
</body>
