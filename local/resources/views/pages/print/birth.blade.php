@php

    function deathDateGetFullStringFormat($date){
        return date('F d, Y',strtotime($date));
    }
@endphp
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
    <link href="{{ asset('css/materialize.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ihmp.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datatables.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal_flat.css') }}" rel="stylesheet">
    <link href="{{ asset('css/modal_rounded.css') }}" rel="stylesheet">

    <!--JavaScript at end of body for optimized loading-->
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <style>

        /* This is my main site's font */
        @font-face {
            font-family: 'GreatVibes';
            src: url("{{asset('fonts/GreatVibes-Regular.ttf')}}")
        }

        @font-face {
            font-family: 'Anton-Regular';
            src: url("{{asset('fonts/Anton-Regular.ttf')}}")
        }

        @font-face {
            font-family: 'LiberBaskerVille-Bold';
            src: url("{{asset('fonts/LiberBaskerVille-Bold.ttf')}}")
        }

        @font-face {
            font-family: 'LibreBaskerville-Italic';
            src: url("{{asset('fonts/LibreBaskerville-Italic.ttf')}}")
        }

        @font-face {
            font-family: 'LibreBaskerville-Regular';
            src: url("{{asset('fonts/LibreBaskerville-Regular.ttf')}}")
        }

        @font-face {
            font-family: 'Balgin-Light';
            src: url("{{asset('fonts/Balgin-Light.ttf')}}")
        }
        @font-face {
            font-family: 'OpenSans';
            src: url("{{asset('fonts/OpenSans-VariableFont_wdth,wght.ttf')}}")
        }

        .certficate-background {
            position: relative;
        }

        .certficate-background:before {
            content: ' ';
            display: block;
            position: absolute;
            left: 0;
            top: -20px;
            opacity: 0.3;
            width: 100%;
            height: 100vh;
            background-size: cover;
            background-position-y: 27%;
            background-image: url("{{ asset('storage/bg/certificates/bgBird.png') }}") !important;
        }

        .inner-container{
            width: 100%;
            height: 100vh;
            border-top: 15px solid #6486aa;
            border-bottom: 15px solid #6486aa;
            position: relative;
        }

        .main-content {
            display: block;
            margin-top: 5px;
            width: 100%;
            height: 96vh;
            border-top: 5px solid #6486aa;
            border-bottom: 5px solid #6486aa;
        }
        .main-content .header span {
            display: block;
            text-align: center;
            color: #6486aa;
            font-family: 'Balgin-Light';
        }
        .main-content .header .rcaoc {
            letter-spacing: 5px;
        }
        .main-content .header .asihm {
            font-size: 20px;
            letter-spacing: 6.4px;
            font-family: 'Anton-Regular';
        }

        .main-content .header .mczip {
            letter-spacing: 5px;
        }
        .main-content .header .contact {
            font-size: 15px;
        }

        .logo-container {
            position: relative;
            display: flex;
            color: #6486aa;
            margin: 0 auto;
            align-items: center;
            justify-content: center;
        }
        .logo-container div{
            text-align: center;
        }
        .logo-container img{
            width: 45%;
        }
        .logo-container img.curl{
            position: absolute;
            top: 10px;
            width: 19%;
        }
        .logo-container div span.leftMessage{
            position: relative;
            font-size: 25px;
            font-family: 'GreatVibes';
            line-height: 1;
            top: -15px;
            left: 17%;
        }
        .logo-container div span.rightMessage{
            position: relative;
            font-size: 25px;
            left: -22%;
            font-family: 'GreatVibes';
            line-height: 1;
            top: 3px;
        }

        .cob {
            text-align: center;
            font-size: 72px;
            position: absolute;
            font-family: 'GreatVibes';
            margin-top: -10.5%;
            margin-left: 15.5%;
        }
        .content {
            margin: 0 48px;
            position: relative;
            font-size: 16px;
        }
        .content .breaker{
            width: 98%;
            background-color: #6486aa93;
            border: 2px solid #6486aa93;
            border-radius: 2px;
            margin-top: 0px;
        }
        .tct {
            font-weight: 500;
            margin: 0;
        }
        .born-date-place-container{
            display: flex;
            font-family: 'OpenSans';
        }
        .born-date-place-container .born-on-content,
        .born-date-place-container .born-in-content{
            width: 40%;
            border-bottom: 1px solid black;
            position: relative;
            top: -4px;
            margin: 0 2px;
            text-align: center;
        }
        .born-date-place-container .born-in-content{
            width: 45% !important;
        }

        .parents-container{
            display: flex;
            font-family: 'OpenSans';
        }

        .parents-container .father-content,
        .parents-container .mother-content{
            width: 41.7%;
            border-bottom: 1px solid black;
            position: relative;
            top: -4px;
            margin: 0 2px;
            text-align: center;
        }
        .childsName {
            text-align: center;
            font-weight: 600;
            font-size: 20px;
        }

        .residents-container {
            display: flex;
        }
        .residents-container .resident-content {
            border-bottom: 1px solid black;
            position: relative;
            top: -4px;
            width: 83.5%;
            margin: 0 2px;
            text-align: center;
        }
        .iggtrt {
            text-align: center;
            color: #6486aa;
            font-family: 'GreatVibes';
            margin-top: 2px;
            font-size: 20px;
        }
        .sob {
            font-family: 'GreatVibes';
            text-align: center;
            position: relative;
            margin-top: -40px;
            margin-bottom: 0;
            font-size: 80px;
        }
        .date-minister-container {
            display: flex;
            justify-content: center;
            margin-top: -8px;
        }
        .date-minister-container div.dmc{
            width: 20%;
            text-align: center;
        }
        .date-minister-container div.dmc.date-baptism{
            width: 50%;
            text-align: center;
        }
        .date-minister-container div.dmc.minister{
            width: 50%;
            text-align: center;
        }

        .date-minister-container div.dmc .label hr {
            width: 80%;
            text-align: center;
            margin-bottom: 1px;
            margin-top: 0;
        }
        .godparents-container {
            display: flex;
        }
        .godparents-container .godparents-content{
            border-bottom: 1px solid black;
            width: 100%;
            position: relative;
            top: -4px;
        }

        .godparents-content2,
        .godparents-content3,
        .godparents-content4 {
            width: 100%;
            height: 18px;
            border-bottom: 1px solid black;
        }
        .godparents-content4{
            margin-bottom: 5px;
        }

        .purpose-container {
            display: flex;
        }
        .purpose-container .purpose-content {
            border-bottom: 1px solid black;
            width: 100%;
            position: relative;
            top: -4px;
        }
        .baptismal-container {
            display: flex;
        }

        .baptismal-container .pannel.left-pannel{
            width: 50%;
        }


        .baptismal-container .pannel.center-pannel{
            width: 15%;
        }

        .baptismal-container .pannel.right-pannel{
            width: 40%;
            position: relative;
            top: 30px;
        }

        .baptismal-container .left-pannel .container {
            display: flex;
            width: 100%;
        }
        .baptismal-container .left-pannel .container .baptismal-register-content {
            width: 50%;
            border-bottom: 1px solid black;
            position: relative;
            top: -4px;
            margin-left: 2px;
        }
        .baptismal-container .left-pannel .container .contents {
            text-align: center;
        }

        .baptismal-container .left-pannel .container.vp .contents {
            position: relative;
            border-bottom: 1px solid black;
            width: 31%;
            top: -4px;
        }

        .baptismal-container .left-pannel .container.di .contents {
            position: relative;
            border-bottom: 1px solid black;
            width: 65%;
            top: -4px;
        }

        .baptismal-container .right-pannel {
            text-align: center;
        }
        .baptismal-container .center-pannel p{
            position: relative;
            top: 15px;
        }
        .baptismal-container .right-pannel .parish-priest-label .line,
        .date-minister-container .dmc .label .line{
            width: 90%;
            margin: 0 0 0 24px;
            border-bottom: 1px solid black;
        }
        .date-minister-container .dmc .label .line{
            width: 80%;
            margin-left: 10%;
        }

        @media print{
            * {
                -webkit-print-color-adjust: exact;
            }
        }
        @page{
            size: portrait;
        }
    </style>
</head>
<body>
    <div class="certficate-background">
        <div class="inner-container">
            <div class="main-content">
                <div class="header">
                    <span class="rcaoc">ROMAN CATHOLIC ARCHDIOCESE OF CEBU</span>
                    <span class="asihm">ARCHDIOCESAN SHRINE OF THE IMMACULATE HEART OF MARY</span>
                    <span class="mczip">Minglanilla, Cebu 6046</span>
                    <span class="contact">Tel . no. 260-3462/ Facebook page: https://www.facebook.com/ASIHM1857/</span>
                </div>
                <div class="logo-container">
                    <div><span class="leftMessage">"Go therefore make<br>disciples of all the nations;</span></div>
                    <img src="{{asset('storage/bg/certificates/bgCurl.png')}}" class="curl" alt="">
                    <img src="{{asset('storage/bg/certificates/bgBaptist.png')}}" alt="">
                    <div><span class="rightMessage">baptize them in the name of<br>the Father and of the<br>Son and of the Holy<br>Spirit."</span></div>
                </div>
                <div class="content">
                    <p class="cob">Certificate of Baptism</p>
                    <p class="tct">This is to certify that:</p>
                    {{-- Child Name --}}
                    <div class="childsName">{{$content->firstname}} {{$content->middlename}} {{$content->lastname}} {{$content->suffix ?? ''}}</div>
                    <hr class="breaker">
                    {{-- Born Details --}}
                    <div class="born-date-place-container">
                        <div class="born-on">
                            Born on
                        </div>
                        <div class="born-on-content">
                            {{date('F d, Y', strtotime(str_replace("//","/",$meta->born_on)))}}
                        </div>
                        <div class="born-in">
                            in
                        </div>
                        <div class="born-in-content">
                            {{$meta->born_in}}
                        </div>
                    </div>
                    {{-- Parent --}}
                    <div class="parents-container">
                        <div class="born-on">
                            Child of
                        </div>
                        <div class="father-content">
                            {{$meta->father_firstname}} {{$meta->father_middlename}} {{$meta->father_lastname}} {{$meta->father_suffix}}
                        </div>
                        <div class="born-in">
                            and
                        </div>
                        <div class="mother-content">
                            {{$meta->mother_firstname}} {{$meta->mother_middlename}} {{$meta->mother_lastname}} {{$meta->mother_suffix}}
                        </div>
                    </div>
                    {{-- Residents --}}
                    <div class="residents-container">
                        <div class="resident">
                            Residents of
                        </div>
                        <div class="resident-content">
                            {{$meta->resident_of}}
                        </div>
                    </div>
                    <p class="iggtrt">in God's good time received the</p>
                    <p class="sob">Sacrament of Baptism</p>
                    {{-- Date and Minister --}}
                    <div class="date-minister-container">
                        <div class="dmc date-baptism">
                            <div class="db-content">
                                {{date('F d, Y', strtotime(str_replace("//","/",$meta->baptism_date)))}}
                            </div>
                            <div class="label">
                                <div class="line"></div>
                                Date of Baptism
                            </div>
                        </div>
                        <div></div>
                        <div class="dmc minister">
                            <div class="minister-content">
                                {{$meta->baptism_minister}}
                            </div>
                            <div class="label">
                                <div class="line"></div>
                                Minister of Baptism
                            </div>
                        </div>
                    </div>
                    {{-- Godparents --}}
                    <div class="godparents-container">
                        <div class="godparents-label">
                            Godparents:
                        </div>
                        <div class="godparents-content">&nbsp;&nbsp;
                            @foreach ($godparents as $key => $godparent)
                                @if(count($godparents) > 3)
                                    {{ $godparent }}@if($key < 3), @endif
                                @else
                                    {{ $godparent }}@if(count($godparents) > 1 && $key != count($godparents) - 1), @endif
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="godparents-content2">
                        @foreach ($godparents as $key => $godparent)
                            @if(count($godparents) > 7)
                                @if($key >= 4)
                                    {{ $godparent }}@if($key < 7) , @endif
                                @endif
                            @else
                                @if($key >= 4)
                                    {{ $godparent }}@if(count($godparents) > 4 && $key != count($godparents) - 1), @endif
                                @endif
                            @endif
                        @endforeach
                    </div>
                    <div class="godparents-content3">
                        @foreach ($godparents as $key => $godparent)
                            @if(count($godparents) > 11)
                                @if($key >= 8)
                                    {{ $godparent }}@if($key < 11) , @endif
                                @endif
                            @else
                                @if($key >= 8)
                                    {{ $godparent }}@if(count($godparents) > 8) , @endif
                                @endif
                            @endif
                        @endforeach
                    </div>
                    <div class="godparents-content4">
                        @foreach ($godparents as $key => $godparent)
                            @if(count($godparents) > 12)
                                @if($key >= 12)
                                    {{ $godparent }}@if(count($godparents) - 1 != $key) , @endif
                                @endif
                            @else
                                @if($key >= 12)
                                    {{ $godparent }}@if(count($godparents) +-1 != $key) , @endif
                                @endif
                            @endif
                        @endforeach
                    </div>
                    {{-- Purpose --}}
                    <div class="purpose-container">
                        <div class="purpose-label">
                            Purpose:
                        </div>
                        <div class="purpose-content">

                        </div>
                    </div>
                    {{-- Baptismal Info --}}
                    <div class="baptismal-container">
                        <div class="pannel left-pannel">
                            <div class="container">
                                <div class="baptismal-register-label">Baptismal Register:</div>
                                <div class="baptismal-register-content contents">{{$meta->baptismal_register}}</div>
                            </div>
                            <div class="container vp">
                                <div class="volume-label">Volume:</div>
                                <div class="volume-content contents">{{$meta->volume}}</div>
                                <div class="page-label">Page:</div>
                                <div class="page-content contents">{{$meta->page}}</div>
                            </div>
                            <div class="container di">
                                <div class="date-issued-label">Date Issued:</div>
                                <div class="date-issued-content contents">{{$meta->date_issued == "NaN//NaN//NaN" ? "":deathDateGetFullStringFormat(date('F d, Y', strtotime(str_replace("//","/",$meta->date_issued))))}}</div>
                            </div>
                        </div>
                        <div class="pannel center-pannel">
                            <p>PARISH SEAL</p>
                        </div>
                        <div class="pannel right-pannel">
                            @if(empty($content->priest_fname))
                            <div class="parish-priest-content contents">&nbsp;</div>
                            @else
                            <div class="parish-priest-content contents">{{$content->priest_clergy}} {{$content->priest_fname}} {{$content->priest_mname}} {{$content->priest_lname}} {{$content->priest_suffix}}</div>
                            @endif
                            <div class="parish-priest-label">
                                <div class="line"></div>
                                Parish Priest
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let purpose = prompt("Please Enter Certificate Purpose", "");

        $('.purpose-content').html('&nbsp;&nbsp;'+purpose);
        print();

        setTimeout(function(){
            location.href="/ihmp/certificate";
        },1000);
    </script>
</body>
</html>
