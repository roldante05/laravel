<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ 'Inicio'}}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="css/inicio.css">

    <!-- Scripts -->
    @vite(['resources/js/app.js']);
</head>
<body class="bg-light">
    <main class="container">
    <div class="row">
        <div class="contenido">
            <div class="d-flex justify-content-center">
                <h1>Bienvenidos</h1>
                <h1 class="d-sm-none"></h1>
            </div>
            <div class="d-flex justify-content-center">
                    <a class="me-2 btn btn-primary" href="{{ route('login') }}">Ir al panel</a>
                    <a class="ms-2 btn btn-success" href="{{ url('/') }}">Portfolio</a>
            </div>
        </div>
    </div>
    </main>
</body>
</html>
