@extends('layouts.app')

@section('content')
    <form class="form-horizontal" method="POST" action="/{{app()->getLocale()}}/login">
        {{ csrf_field() }}
        <div class="row height-medium"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 justify-content-center text-center">
                <h2>Welcome To HACCP Manager Portal</h2>
                <p>Please login to access your panel</p>
            </div>
        </div>
        <div class="row height-small"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <label for="email" class="control-label">Email</label>
                <input id="email" type="email" class="form-control height-small" name="email" value=""
                       placeholder="Email Address" required autofocus>
            </div>
        </div>
        <div class="row height-extra-small"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <label for="password" class="control-label">Password</label>
                <input id="password" type="password" class="form-control height-small" name="email" value=""
                       placeholder="Password" required autofocus>
            </div>
        </div>
        <div class="row height-extra-small"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-4 text-center ">
                <button type="submit" class="btn btn-secondary btn-block height-small">LOGIN</button>
            </div>
        </div>
        <div class="row height-medium"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-4 text-center">
            </div>
        </div>
        <div class="row height-small"></div>
    </form>
@endsection