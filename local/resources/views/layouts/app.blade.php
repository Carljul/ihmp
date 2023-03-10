<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ setting('site.title') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    <!--Import Google Icon Font-->
    <link href="{{ asset('css/icon.css') }}" rel="stylesheet">

    <!-- Tab Icon -->
    <link href="{{ asset('storage/') }}/{{setting('site.logo')}}" rel="icon">

    <!-- Styles -->
    <link href="{{ asset('css/materialize.css?v='.strtotime(now())) }}" rel="stylesheet">
    <link href="{{ asset('css/ihmp.css?v='.strtotime(now())) }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.css?v='.strtotime(now())) }}" rel="stylesheet">
    <link href="{{ asset('css/modal_flat.css?v='.strtotime(now())) }}" rel="stylesheet">
    <link href="{{ asset('css/modal_rounded.css?v='.strtotime(now())) }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        @guest
            <a href="IHMP_SOR Manual.pdf" style="position: absolute; bottom: 20px; right: 40px;" download>Download Manual</a>
        @else
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="/ihmp/profile">Profile</a></li>
            <li class="divider"></li>
            <li>
                <a id="logout_out_link" class="dropdown-item"
                    href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
        <nav class="blue darken-3">
            <div class="container nav-wrapper">
                <a href="/ihmp" class="brand-logo">{{ setting('site.title') }}</a>
                <ul class="right hide-on-med-and-down">
                    <li class="certificate"><a href="/ihmp/certificate">Manage Records</a></li>
                    <li class="priest"><a href="/ihmp/priest">Manage Priests</a></li>
                @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                    <li><a href="/ihmp/user">Manage Users</a></li>
                @endif
                @if(Auth::user()->role_id == 3)
                    <li><a href="/ihmp/template">Manage Templates</a></li>
                    <li><a href="/ihmp/maintenance">Maintenance</a></li>
                @endif
                    <!-- Dropdown Trigger -->
                    <li>
                        <a class="dropdown-button" href="#!" data-activates="dropdown1">
                            <img src="{{ asset('storage/') }}/{{ Auth::user()->avatar }}" alt="avatar" class="responsive-img circle avatar left">
                            {{ Auth::user()->name }}
                            <i class="material-icons right">arrow_drop_down</i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        @endguest

        <main>
            @yield('content')
        </main>
    </div>

    @extends('modals.index')

    <!--JavaScript at end of body for optimized loading-->
    <script src="{{ asset('/js/constants.js?v='.strtotime(now())) }}"></script>
    <script src="{{ asset('/js/materialize.js?v='.strtotime(now())) }}"></script>
    <script src="{{ asset('/js/general.js?v='.strtotime(now())) }}"></script>
    <script src="{{ asset('/js/moment.js?v='.strtotime(now())) }}"></script>
    <script src="{{ asset('/js/daypilot-modal-3.15.1.min.js?v='.strtotime(now())) }}"></script>
    <script src="{{ asset('/js/onload.js')}}"></script>
</body>
</html>
