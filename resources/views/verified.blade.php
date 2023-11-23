<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>

<body>
    <div>
        <h1>Verificação de E-mail</h1>
        @if ($parametro == 1)
        <p>Email verificado com Sucesso!</p>
        @endif

        @if ($parametro == 0)
        <p>Seu Email já foi verificado!</p>
        @endif

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">sair</button>
        </form>
    </div>
</body>

</html>