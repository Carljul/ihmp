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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ihmp.css') }}" rel="stylesheet">

    
    <!--JavaScript at end of body for optimized loading-->
    <script src="{{ asset('js/materialize.js') }}"></script>
</head>
<body>
    <div id="app">
        @guest
        
        @else
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="#!">Profile</a></li>
            <li class="divider"></li>
            <li>
                <a class="dropdown-item"
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
        <nav>
            <div class="nav-wrapper">
                <a href="#!" class="brand-logo">{{ setting('site.title') }}</a>
                <ul class="right hide-on-med-and-down">
                <li><a href="#">Manage Records</a></li>
                @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                    <li><a href="/admin/users">Manage Users</a></li>
                @endif
                <!-- Dropdown Trigger -->
                <li><a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->name }}<i class="material-icons right">arrow_drop_down</i></a></li>
                </ul>
            </div>
        </nav>
        @endguest

        <main>
            @yield('content')
        </main>
    </div>


    
    <script type="text/javascript">
        $(document).ready(function(){
            $('.parallax').parallax();
        });
    </script>
</body>
</html>
