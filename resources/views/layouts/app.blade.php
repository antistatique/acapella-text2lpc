<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('build/css/app.css') }}">
    </head>
    <body>
        <div id="app">
            <header-component loggedin={{ Auth::check() }} username={{ Auth::user()->name }}></header-component>
            <main>
                @yield('content')
            </main>
            <footer-component></footer-component>
        </div>
    </body>
    <script type="text/javascript" src="{{ mix('build/js/app.js') }}"></script>
</html>