@extends('layouts.app')

@section('content')
    <form class="form-horizontal" method="POST" action="/{{app()->getLocale()}}/google2fa/confirm">
        {{ csrf_field() }}
        <div class="row height-medium"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 justify-content-center text-center">
                <h2>Google 2FA Verification</h2>
                <p>Please confirm QR code bellow</p>
            </div>
        </div>
        <div class="row height-extra-small"></div>

        <div class="row justify-content-center">
            <div class="col-sm-4 text-center">
                <img src="{{ $google2fa->qr }}">
            </div>
        </div>
        <div class="row height-small"></div>

        <div class="row justify-content-center">
            <div class="col-sm-4">
                <label for="token" class="control-label">Enter Token</label>
                <input id="token" type="number" class="form-control height-small" name="token" value=""required autofocus>
                <input type="hidden" name="hash" value="{{$google2fa->hash}}">
            </div>
        </div>
        <div class="row height-extra-small"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-4 text-center">
                <button type="submit" class="btn btn-secondary btn-block height-small">CONFIRM</button>
            </div>
        </div>
        <div class="row height-medium"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-4 text-center">
                <a href="{{ route('login') }}" class="underline">LOG IN</a>
            </div>
        </div>
        <div class="row height-small"></div>
    </form>
@endsection