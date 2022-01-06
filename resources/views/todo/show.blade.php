<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]>      <html class="no-js"> <!--<![endif]-->
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="#">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="text-left pt-5">{{ $todo->name }}</h2>
                    <div class="card card-default">
                        <div class="card-header">
                            Details
                        </div>
                        <div class="card-body">
                            {{ $todo->description}}
                        </div>
                    </div>
                    <div class="card card-default">
                        <div class="card-header">
                            Completed
                        </div>
                        <div class="card-body">
                            {{ $todo->id === 1 ? "Yes" : "No" }}
                        </div>
                    </div>
                    <br>
                    <h5><a href="/todo">Back to Todos</a></h5>
                </div>
            </div>
        </div>
        <script src="" async defer></script>
    </body>
</html>
