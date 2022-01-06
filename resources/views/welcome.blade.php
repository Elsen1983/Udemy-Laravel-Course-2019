<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div>
            <h1>Welcome page</h1>
            <br>
            <h3>
                <a href="/todo">ToDo page</a>
            </h3>
            <h3>
                <a href="/about">About page</a>
            </h3>
            <h3>
                <a href="/contact">Contact page</a>
            </h3>
        </div>
    </body>
</html>
