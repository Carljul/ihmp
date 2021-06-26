@extends('layouts.app')

@section('content')
<div class="full-height">
    <div class="box" style="--r1:130%;--r2:71.5%">
    </div>
    <div class="section row">
        <div class="col s12 m12 vertical-center">
            <div class="center">
                <img src="{{ asset('storage/') }}/{{setting('site.logo')}}" class="responsive-img circle logo" alt="Logo"/>
                <h4 class="systemName">{{ setting('site.title') }}</h4>
            </div>
            <div class="container">
                <div class="col s12 m4"></div>
                <div class="col s12 m4">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-field col s12">
                            <input id="email" type="email" class="validate form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">
                            <label for="email" class="center">Email</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="input-field input-outlined col s12">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">
                            <label for="password">Password</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col s12 center">
                            <button type="submit" class="loginBtn btn col s12 border-radius-100px">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col s12 m4"></div>
            </div>
        </div>
    </div>
</div>
@endsection