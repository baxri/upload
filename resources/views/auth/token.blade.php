@extends('layouts.app')

@section('content')
    <form class="form-horizontal" method="POST" action="/{{app()->getLocale()}}/google2fa">
        {{ csrf_field() }}
        <div class="row height-medium"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 justify-content-center text-center">
                <h2>Welcone To Screener Manager Portal</h2>
                <p>Please login or signup to access your projects</p>
            </div>
        </div>
        <div class="row height-small"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <label for="token" class="control-label">Google 2FA Token</label>
                <input id="token" type="number" maxlength="6"  class="form-control height-small text-center" name="token" value="" placeholder="" required autofocus>
            </div>
        </div>
        <div class="row height-extra-small"></div>
        <div class="row justify-content-center">
            <div class="col-sm-4col-sm-12 col-md-6 col-lg-4 text-center">
                <button type="submit" class="btn btn-secondary btn-block height-small">LOG IN</button>
            </div>
        </div>
        <div class="row height-small"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-4 text-center">
                <a href="{{ route('login') }}" class="underline">BACK TO LOG IN</a>
            </div>
        </div>
        <div class="row height-small"></div>
    </form>
@endsection
