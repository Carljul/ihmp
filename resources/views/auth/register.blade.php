@extends('layouts.app')

@section('content')
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col s12">
            <div class="card">
                <div class="card-header"></div>

                <div class="card-body">
                </div>
            </div>
        </div>
    </div>
</div> -->

<style>
    .fullscreen {
        height: 100vh;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }
</style>
<div class="row">
    <div class="col s12 m6 fullscreen" style="background-image: url('../storage/bg/ihmp.jpg');">
        &nbsp;
    </div>
    <div class="col s12 m6">
        <div class="center">
            <img src="{{ asset('storage/') }}/{{setting('site.logo')}}" class="responsive-img circle logo2" alt="Logo"/>
            <h4 class="systemName">{{ setting('site.title') }}</h4>
        </div>
        <div class="row">
            <div class="col s12 m2"></div>
            <div class="col s12 m8">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h5>{{ __('Register') }}</h5>

                    @if($successMessage = Session::get('successMessage'))
                        <div class="card">
                            <div class="card-content green white-text">
                                {{$successMessage}} 
                                <a href="/" class="white-text">Go to login</a>
                            </div>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>

                            <a href="/" style="margin-left: 10px;">Login Instead?</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col s12 m2"></div>
        </div>
    </div>
</div>
@endsection
