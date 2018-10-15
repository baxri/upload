<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>

    </style>
</head>
<body>
<div id="app">
    @if(!empty($errors->first()))
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 alert alert-danger text-center">
                    <span>{{ $errors->first() }}</span>
                </div>
            </div>
        </div>
    @endif
    @if(!empty($errors->success->first()))
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 alert alert-success text-center">
                    <span>{{ $errors->success->first() }}</span>
                </div>
            </div>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-2 text-center guest-logo">
                <h1>BTI</h1>
            </div>
        </div>
        @yield('content')
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
