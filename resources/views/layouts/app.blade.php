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

    <!-- Styles -->
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ihmp.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">
    
    <!--JavaScript at end of body for optimized loading-->
    <script src="{{ asset('/js/constants.js') }}"></script>
    <script src="{{ asset('/js/materialize.js') }}"></script>
    <script src="{{ asset('/js/general.js') }}"></script>
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
                <a href="#!" class="brand-logo">{{ setting('site.title') }}</a>
                <ul class="right hide-on-med-and-down">
                    <li class="certificate"><a href="/certificate">Manage Records</a></li>
                    <li class="priest"><a href="/priest">Manage Priest</a></li>
                @if(Auth::user()->role_id == 1 || Auth::user()->role_id == 3)
                    <li><a href="/admin/users">Manage Users</a></li>
                @endif
                @if(Auth::user()->role_id == 3)
                    <li><a href="/template">Manage Templates</a></li>
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

     <script type="text/javascript">
        $(document).ready(function(){
            $('.parallax').parallax();
            setLogoutForm();
            // $('select').material_select(); <--- Do not use this one or it will affect the parish priest dropdown
            /// Register all dropdowns here do not use the general method of material select
            $("#selectCertificate").material_select();
            $("#selectTemplateType").material_select(); //DC: added here the dropdown for template type
            $("#selectIsTemplate").material_select(); //DC: added here the dropdown for is template
            $("#selectForm").material_select();
            $('.modal').modal();
            $('.datepicker').pickadate();            
            $('.datepicker').on('mousedown',function(event){ event.preventDefault(); });

            checkConnection();
            /// General functions
            // Check Server Connectivity
            function checkConnection(){
                $.ajax({
                    type: "GET",
                    url: general_controller_endpoint,
                    success: function(response){
                        console.log(response);
                    }, error: function(e){
                        console.log(e);
                    }
                });
            }

            // Set Logout Form
            function setLogoutForm(){
                if(localStorage.getItem('AT') != null){
                    var at = localStorage.getItem('AT');
                    var user_id = at.substring(33, at.length);
                    $("#logout_out_link").attr('href',system_url+'logout?token_key='+at+'&user_id='+user_id);
                    $("#logout-form").prop('action',system_url+'logout?token_key='+at+'&user_id='+user_id);
                }
            }
        });
    </script>
</body>
</html>
