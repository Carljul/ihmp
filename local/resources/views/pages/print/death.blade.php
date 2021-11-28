@php
    function ordinal_suffix_of($i) {
        $j = $i % 10;
            $k = $i % 100;
        if ($j == 1 && $k != 11) {
            return $i."st";
        }
        if ($j == 2 && $k != 12) {
            return $i."nd";
        }
        if ($j == 3 && $k != 13) {
            return $i."rd";
        }
        return $i."th";
    }

    function month_string($index){
        $list = ['January','February','March','April','May','June','July','August','September','October','November','December'];
        return $list[$index - 1];
    }

    function deathGetDay($date){
        return date('d',strtotime($date));
    }

    function deathGetMonth($date){
        return date('m',strtotime($date));
    }

    function deathGetYear($date){
        return date('Y',strtotime($date));
    }

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
        @media print{
            * {
                -webkit-print-color-adjust: exact;
            }
        }
        .backgroundImage {
            background: url("{{asset('storage/bg/certificates/death.png')}}");
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
        }
        .toFade {
            width: 100%;
            height: 100vh;
            opacity: 0.3;
            position: absolute;
            top: 0;
        }
        .r-m-t {
            margin-top: 0;
        }
        .r-m-b {
            margin-bottom: 0;
        }
        .certificate-content {
            margin: 0 7%;
        }
        .line {
            color: black;
            border-bottom: 1px solid #20548b;
        }
        .line:before {
            content: ':';
            position: relative;
            left: -17px;
            bottom: -6px;
        }
        .rcaoc {
            letter-spacing: 5px;
            color: #6486aa;
        }
        .balgin{
            font-family: 'Balgin-Light';
        }
        .asihm {
            font-size: 20px;
            letter-spacing: 6.4px;
            font-family: 'Anton-Regular';
        }
        .mczip {
            letter-spacing: 5px;
        }
        .contact {
            font-size: 15px;
        }
        .death-color-theme {
            color: #20548b;
        }
        .cob {
            text-align: center;
            font-size: 72px;
            font-family: 'GreatVibes';
            color: #004aad;
        }
        .certificate-content .s4 {
            font-weight: bold;
        }
        .certificate-content .s3 {
            width: 28% !important;
        }
        .message {
            font-weight: 500;
        }
    </style>
</head>
<body>
    <div class="container-fluid death-color-theme">
        <div class="row center">
            <div class="col s12 balgin">
                <p class="r-m-b rcaoc">ROMAN CATHOLIC ARCHDIOCESE OF CEBU</p>
                <p class="r-m-b r-m-t asihm">ARCHDIOCESAN SHRINE OF THE IMMACULATE HEART OF MARY</p>
                <p class="r-m-b r-m-t mczip">Minglanilla, Cebu 6046</p>
                <p class="r-m-b r-m-t contact">Tel. no. 260-3462/ Facebook page: https://www.facebook.com/ASIHM1857/</p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h1 class="center r-m-t cob">Certificate of Death</h1>
                    <p class="center message">This is to certify that the following data appears in the Registry of Death at the<br>Archdiocesan Shrine of the Immaculate Heart of Mary Parish:</p>
                </div>
            </div>
            <div class="certificate-content">
                <div class="row">
                    <div class="col s4">NAME OF DECEASED</div>
                    <div class="col s8 line">{{$content->firstname}} {{$content->middlename}} {{$content->lastname}} {{$content->suffix}}</div>
                </div>
                <div class="row">
                    <div class="col s4">AGE</div>
                    <div class="col s8 line">{{$meta->age}}</div>
                </div>
                <div class="row">
                    <div class="col s4">RESIDENCE</div>
                    <div class="col s8 line">{{$meta->residence}}</div>
                </div>
                <div class="row">
                    <div class="col s4">DATE OF DEATH</div>
                    <div class="col s8 line">{{ deathDateGetFullStringFormat(str_replace('//','/',$meta->date_of_death)) }}</div>
                </div>
                <div class="row">
                    <div class="col s4">PLACE OF BURIAL</div>
                    <div class="col s8 line">{{$meta->place_of_burial}}</div>
                </div>
                <div class="row">
                    <div class="col s4">INFORMANT/RELATIVES</div>
                    <div class="col s8 line">{{$meta->informant_or_relatives}}</div>
                </div>
                <br>
                <div class="row">
                    <div class="col s4">BOOK NUMBER</div>
                    <div class="col s3 line">{{$meta->book_number}}</div>
                </div>
                <div class="row">
                    <div class="col s4">PAGE NUMBER</div>
                    <div class="col s3 line">{{$meta->page_number}}</div>
                </div>
                <div class="row">
                    <div class="col s4">REGISTRY NUMBER</div>
                    <div class="col s3 line">{{$meta->registry_number}}</div>
                </div>
                <div class="row">
                    <div class="col s4">DATE ISSUED</div>
                    <div class="col s3 line">{{deathDateGetFullStringFormat(str_replace('//','/',$meta->date_issued))}}</div>
                </div>
                <br>
                <br>
                <div class="row">
                    <div class="col s6">
                        <p>
                            NOT VALID
                            <br>
                            WITHOUT
                            <br>
                            PARISH SEAL
                        </p>
                    </div>
                    <div class="col s6" style="position: relative;">
                        <div class="row center" style="position: absolute; right: 0; top: 25px;">
                            <div class="col s12" style="color: black; border-bottom: 1px solid #20548b;">@if($content->priest_fname != null){{$content->priest_clergy}} {{$content->priest_fname}} {{$content->priest_mname}} {{$content->priest_lname}} {{$content->priest_suffix}}@endif</div>
                            <div class="col s12">Parish Priest</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="toFade backgroundImage"></div>

    <script>
        print();
        setTimeout(function(){
            location.href="/ihmp/certificate";
        },1000);
    </script>
</body>
</html>
