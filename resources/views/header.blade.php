<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('/css/css.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WebHost</title>
</head>
<body>
    <div class="container">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="/" class="navbar-brand" style="margin-left: 2%">WebHost</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav" style="margin-left: 10%">
                        <li class="nav-item">
                            <a class="nav-link" href="/domain">Domínios</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/hosts">Hospedagem</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/servers">Servidores</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        @yield('container')
    </div>
    <footer id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    &copy; 2021 WebHost. Criado por <a target="_blank" href="https://github.com/oduardu" title="Eduardo Pazzini Zancanaro">Eduardo</a> & <a target="_blank" href="https://github.com/umfilipe" title="Filipe Medeiros de Almeida">Filipe</a>
                </div>
                <div class="col-lg-3">
                    <ul class="social-icons" >
                        <li><a href="https://facebook.com"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="https://twitter.com"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="https://linkedin.com"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="https://youtube.com"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="https://github.com"><i class="fa fa-github"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/78376bc006.js" crossorigin="anonymous"></script>
    </body>
    </html>
