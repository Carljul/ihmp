@extends('layouts.app')

@section('content')
<div class="container">
    <div class="parallax-container">
        <div class="parallax">
            <img src="{{ asset('storage/logo/ihm.jpg') }}">
        </div>
    </div>
    
    <div class="section row">
        <div class="col s12 m3"></div>
        <div class="col s12 m6">
            <div class="center">
                <img src="{{ asset('storage/logo/ihm.jpg') }}" class="responsive-img circle logo" alt="Logo"/>
                <h4>IHMP - SOR</h4>
            </div>
            <form method="POST" action="{{ route('login') }}" class="col s12">
                @csrf
                <div class="input-field col s12">
                    <input id="email" type="email" class="loginInputs validate form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="off">
                    <label for="email" class="center">Email/Username</label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="input-field col s12">
                    <input id="password" type="password" class="loginInputs form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">
                    <label for="password">Password</label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="col s12 center">
                    <button type="submit" class="waves-effect waves-light btn">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
        <div class="col s12 m3"></div>
    </div>
</div>
@endsection




@section('script')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.parallax').parallax();
        });
    </script>
@endsection
