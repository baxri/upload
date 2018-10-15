@extends('layouts.app')

@section('content')
    <form class="form-horizontal" method="POST" action="/{{app()->getLocale()}}/register">
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
            <div class="col-sm-12 col-md-6 col-lg-4 ">
                <label for="name" class="control-label">Enter your fullname</label>
                <input id="name" type="text" class="form-control height-small" name="name" value="{{old('name')}}"
                       placeholder="Fullname" required autofocus>
            </div>
        </div>
        <div class="row height-extra-small"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <label for="phone" class="control-label">Enter your phone</label>
                <input id="phone" type="number" class="form-control height-small" name="phone" value="{{old('phone')}}"
                       placeholder="Phone" required autofocus>
            </div>
        </div>
        <div class="row height-extra-small"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <label for="email" class="control-label">Enter your email address</label>
                <input id="email" type="email" class="form-control height-small" name="email" value="{{old('email')}}"
                       placeholder="Email Address" required autofocus>
            </div>
        </div>
        <div class="row height-extra-small"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-4">
                <label for="manager" class="control-label">Choose production manager:</label>
                <select id="manager" name="manager" class="form-control height-small" required autofocus>
                    <option value="">Production manager</option>
                    @foreach($producers as $key => $producer)
                        <option {{old('manager') == $producer->id ? 'selected': ''}} value="{{$producer->id}}">{{$producer->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row height-extra-small"></div>
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-6 col-lg-4 text-center">
                <button type="submit" class="btn btn-secondary btn-block height-small">REGISTER</button>
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