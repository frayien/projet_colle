<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    {!! Html::style('lib/bootstrap/bootstrap.min.css') !!}
    {!! Html::style('css/mangas.css') !!}

    <title>@yield('titrePage')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('films.index') }}">FilmWeb</a>
    </div>
</nav>
<header>
    <h1>@yield('titreItem')</h1>
</header>
<div class="mx-auto" style="width: 90%;">
    @yield('contenu')
</div>


<footer class="footer">
    <p>FilmWeb - copyright 3AInfo Adrien GARBANI - 2020</p>
</footer>
{!! Html::script('lib/jquery/jquery-3.5.1.min.js') !!}
{!! Html::script('lib/js/bootstrap.bundle.js') !!}
{!! Html::script('lib/js/bootstrap.js/bootstrap.min.js') !!}
</body>
</html>
