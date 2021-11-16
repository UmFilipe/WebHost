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
    <p>Lista de Hosts</p>
    <div class="col-auto">
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
</div>
</body>

</html>