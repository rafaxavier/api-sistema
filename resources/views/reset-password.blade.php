<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Reset de senha') }}</title>
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
                    <div class="col-md-6">

                        <div class="card">
                            <div class="card-header">{{ __('Alterar Senha') }}</div>

                            <div class="card-body">
                                <form method="POST" action="{{ route('password.store') }}">
                                    <input type="hidden" name="token" value="{{ $token }}">

                                    <div class="form-group">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                                        <div class="col-md-12">
                                            <input id="email" type="email" class="form-control" readonly name="email" value="{{ $email}}" required autocomplete="email" autofocus>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>
                                        <div class="col-md-12">
                                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme sua Senha') }}</label>
                                        <div class="col-md-12">
                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>

                                    @if(isset($message['validation']))
                                        <div class="alert alert-danger mt-3">
                                            {{ $message['validation'] }}
                                        </div>
                                    @endif

                                    @if(isset($message['success']))
                                        <div class="alert alert-success mt-3" role="alert">
                                            {{ $message['success'] }}. <br><a href="#" >Click aqui para logar</a>
                                        </div>
                                    @endif

                                    <div class="form-group mt-4">
                                        <div class="col-md-12 offset-md-12">
                                            <button type="submit" class="btn btn-primary btn-md  col-md-12">
                                                {{ __('Confirme') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                @if(isset($message['token']))
                                <form id="resend-email" method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <input type="hidden" name="email" value="{{ $email }}">
                                    <div class="alert alert-danger mt-3">
                                        {{ $message['token'] }}, reenvie o e-mail para
                                        <button class="btn btn-link" type="submit" id="btn-resend-email">recuperar</button> a senha 
                                        ou faça <a href="#">login</a>
                                    </div>
                                </form>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>