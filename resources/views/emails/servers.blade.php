<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
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
</div>
</body>

</html>