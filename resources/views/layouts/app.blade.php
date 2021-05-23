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
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">

    
    <!--JavaScript at end of body for optimized loading-->
    <script src="{{ asset('js/materialize.js') }}"></script>
    <script src="{{ asset('js/datatables.js') }}"></script>
    <script src="{{ asset('js/constants.js') }}"></script>
</head>
<body>
    <div id="app">
        @guest
        
        @else
        <!-- Dropdown Structure -->
        <ul id="dropdown1" class="dropdown-content">
            <li><a href="/admin/profile">Profile</a></li>
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
        <nav class="blue darken-3">
            <div class="container nav-wrapper">
                <a href="#!" class="brand-logo">{{ setting('site.title') }}</a>
                <ul class="right hide-on-med-and-down">
                    <li class="certificate"><a href="/certificate">Manage Records</a></li>
                    <li class="priest"><a href="/priest">Manage Priest</a></li>
                @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                    <li><a href="/admin/users">Manage Users</a></li>
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


    
    <script type="text/javascript">
        $(document).ready(function(){
            $('.parallax').parallax();
            $('.modal').modal();
            $('#certificates_table').dataTable({ 
                "bLengthChange": false,
                "bFilter": true,
            });

            /// adding class to #certificates_table_filter
            $('#certificates_table_filter').addClass('col s12 m6');
            $('#certificates_table_filter').removeClass('dataTables_filter');
            /// adding date filter right next to search
            $('#certificates_table_filter').after(
                '<div class="col s12 m6"><label>Date Filter:<input type="text" class="datepicker" aria-controls="certificates_table"></label></div>'
            );

            $('.datepicker').pickadate();
            $('.datepicker').on('mousedown',function(event){ event.preventDefault(); });
        });
    </script>
</body>
</html>
