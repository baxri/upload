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
    <link href="//vjs.zencdn.net/6.7/video-js.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="container-fluid header-fluid">
        <div class="row justify-content-between align-items-center">
            <div class="col-sm-2 languages">
                <div class="btn-group  align-baseline" >
                    <a href="/en/home/" class="btn btn-link {{app()->getLocale() == 'en' ? 'active' : ''}} ">EN</a>
                    <a href="/fr/home/" class="btn btn-link {{app()->getLocale() == 'fr' ? 'active' : ''}} ">FR</a>
                </div>
            </div>
            <div class="col-sm-2 text-center logo">
                <h1>BTI</h1>
            </div>
            <div class="col-sm-2 logout">
                <form id="logout-form" action="/{{app()->getLocale()}}/logout" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-block btn-danger"><span class="fas fa-sign-out-alt"></span>
                        {{trans('app.LOGOUT')}}
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="height-small"></div>
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-4 text-center">
                <h4>{{\Carbon\Carbon::now()->format("l, F")}} {{\Carbon\Carbon::now()->format("d")}}
                    th {{\Carbon\Carbon::now()->format("Y")}}</h4>
                @if( empty(!$connection) )
                    <p>Last connection:
                        {{\Carbon\Carbon::parse($connection->created_at)->format('l, F d')}}th
                        {{\Carbon\Carbon::parse($connection->created_at)->format('Y')}} at
                        {{\Carbon\Carbon::parse($connection->created_at)->format('h:i')}}
                    </p>
                @else
                    <p>{{trans('app.CONGRATULATION_THIS_IS_YOUR_FIRST_LOGIN')}}</p>
                @endif
            </div>
        </div>
        <div class="height-extra-small"></div>
        <div class="row justify-content-center">
            <div class="col-sm-1 text-center line"></div>
        </div>
        <div class="height-small"></div>
        <div class="row justify-content-center align-items-center">
            <div class="col-sm-6 text-center">
                <h5>{{trans('app.WELCOME')}} {{Auth::user()->name}}</h5>
                <p>{{trans('app.THIS_IS_YOUR_DASHBOARD')}}</p>
            </div>
        </div>
        <div class="height-small"></div>
    </div>
    <div class="container-fluid main-tabs">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="text-center col-sm-3">
                    <a href="/{{app()->getLocale()}}/home/new" class="btn btn-link btn-lg btn-block {{$status == 'new' ? 'active' : ''}}">
                        <b>{{trans('app.NEW')}}</b> <span class="badge badge-light">{{$new}}</span>
                    </a>
                </div>
                <div class="text-center col-sm-3">
                    <a href="/{{app()->getLocale()}}/home/pending"
                       class="btn btn-link btn-lg btn-block {{$status == 'pending' ? 'active' : ''}}">
                        <b>{{trans('app.PENDING')}}</b> <span class="badge badge-light">{{$pending}}</span>
                    </a>
                </div>
                <div class="text-center col-sm-3 ">
                    <a href="/{{app()->getLocale()}}/home/history"
                       class="btn btn-link btn-lg btn-block {{$status == 'history' ? 'active' : ''}}">
                        <b>{{trans('app.HISTORY')}}</b>
                    </a>
                </div>
                @if( Auth::user()->type == App\User::$type_bti )
                    <div class="text-center col-sm-3">
                        <a href="#" class="btn btn-link btn-lg btn-block disabled">
                            <b>{{trans('app.BACK_OFFICE')}}</b>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="container-fluid main-tabs-bottom"></div>
    @yield('content')
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js"
        integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl"
        crossorigin="anonymous"></script>
</body>
</html>