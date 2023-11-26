<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'verificacao de e-mail') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/9cc50a0661.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        #app {
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .navbar {
            width: 100%;
            position: fixed;
            top: 0;
            z-index: 1000;
            /* para garantir que a barra de navegação esteja acima de outros elementos */
        }

        .container-main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-container {
            width: 100%;
            max-width: 400px;
            /* ajuste conforme necessário */
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/painel') }}">
                    <h5><img src="https://i.pinimg.com/originals/24/bf/0e/24bf0e4063f6b8b50c080b5280cff9da.png" width="50px">Sistema GR</h5>

                </a>
            </div>
        </nav>

        <div class="container-main">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5 card-container">
                        <div class="card">
                            <div class="card-header">{{ __('Verificação de E-mail') }}</div>
                            <div class="card-body">
                                @if ($parametro == 0)
                                <p>Email verificado com Sucesso!</p>
                                @elseif ($parametro == 1)
                                <p>Seu Email já foi verificado!</p>
                                @endif
                                <a class="btn btn-primary btn-sm" role="button">{{ __('Clique aqui para Logar') }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>