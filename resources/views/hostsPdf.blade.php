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
    @if (!empty($hosts))
        <table class="table table-hover" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th class="col-md-2">ID: </th>
                    <th class="col-md-4">Tamanho: </th>
                    <th class="col-md-3">Localização: </th>
                    <th class="col-md-3">Preço: </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hosts as $item)
                    <tr>
                        <td class="col-md-2"> {{ $item->id }} </td>
                        <td class="col-md-4"> {{ $item->tamanho }} GBs </td>
                        <td class="col-md-3"> {{ $item->localizacao }} </td>
                        <td class="col-md-3"> R$ {{ $item->preco }} </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h3>Não há nenhum item para ser exibido.</h3>
    @endif
</body>
