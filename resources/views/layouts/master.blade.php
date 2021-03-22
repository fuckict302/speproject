<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Test</title>
    <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body class="antialiased">
<nav class="navbar navbar-dark" style="background-color: black; color: white;">
    <div class="d-flex">
        <a class="navbar-brand" href="#"><img src="{{ URL::asset('img/logo.png') }}"></a>
        <div>
            <h1>SELF AND PEER EVALUATION PORTAL</h1>
            <div class="d-flex">
                <button class="btn btn-danger navbar-btn">Home</button>
                <button class="btn btn-danger navbar-btn">Placeholder</button>
                <button class="btn btn-danger navbar-btn">Placeholder</button>
                <button class="btn btn-danger navbar-btn">Placeholder</button>
            </div>
        </div>
    </div>
    <div class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            Welcome {{ Auth::user()->name }}
        </a>
</nav>
</body>
</html>


