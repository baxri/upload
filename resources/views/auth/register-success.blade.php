@extends('layouts.app')

@section('content')
    <form class="form-horizontal" method="POST" action="/login">
        {{ csrf_field() }}
        <div class="row height-medium"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 justify-content-center text-center">
                <h2>Registration Sucessfully Completed</h2>
                <p>Please check your email to validate google 2fa</p>
            </div>
        </div>
        <div class="row height-small"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-4 text-center">
                <a href="{{ route('login') }}" class="underline">LOG IN</a> |
                <a href="{{ route('register') }}" class="underline">REGISTER</a>
            </div>
        </div>
        <div class="row height-small"></div>
    </form>
@endsection