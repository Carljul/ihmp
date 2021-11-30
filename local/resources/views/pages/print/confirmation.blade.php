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
            @page {
                size: landscape
            }
            * {
                -webkit-print-color-adjust: exact;
            }

            footer {page-break-after: always;}
        }
        .backgroundCertification {
            background: url('background.png');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            background-position-y: 37%;
        }
        .img-size {
            width: 400px;
        }
        .img-top-faded {
            position: absolute;
            opacity: 0.5;
            top: -25%;
            left: 0;
            width: 380px;
        }
        .img-top-sticking-left {
            position: absolute;
            left: -19%;
            top: -2%;
        }
        .img-center {
            position: absolute;
            top: 27.4%;
            left: -10px;
            width: 350px;
        }
        .img-bottom-sticking-left {
            position: fixed;
            top: 50%;
            left: -19%;
        }
        .img-bottom-faded {
            background: url("{{asset('storage/bg/certificates/confirmation_side.png')}}");
            position: absolute;
            opacity: 0.5;
            bottom: 0;
            left: 0;
            width: 380px;
            height: 198px;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .toFade{
            width: 100%;
            height: 100vh;
            position: absolute;
            opacity: 0.4;
            top: 0;
            z-index: -1;
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

        .cob {
            text-align: center;
            font-size: 72px;
            font-family: 'GreatVibes';
            color: #004aad;
        }
        .color-205{
            color: #20548b;
        }
        .line {
            color: black;
            border-bottom: 1px solid #20548b;
        }
        .flex{
            display: flex;
        }

        .openSans {
            font-family: 'OpenSans';
            font-size: 18px;
        }
        .ten {
            width: 4.5%;
        }
        .eighty {
            width: 74%;
        }

        .r-m-t {
            margin-top: 0;
        }
        .r-m-b {
            margin-bottom: 0;
        }

        .parents-line {
            width: 37%;
        }

        .old-english{
            font-family: "Euclid Fraktur", "Old English Text MT", fantasy, serif;
            font-size: 24px;
        }
        .extraSpace {
            width: 15%;
        }
        .extraSpaceSponsor{
            width: 8%;
        }
        .sponsorLine{
            width: 70%;
            text-align: center;
        }
        .day_number_space{
            width: 10%;
        }
        .withComma {
            width: 20%;
            margin-right: 10px;
        }

        .monthLine {
            width: 10%;
        }
        .ministerLine {
            width: 33%;
        }
        .widthFive{
            width: 5%;
        }
        .registerBookWidth {
            width: 12%;
        }
    </style>
</head>
    <body>

        <div class="container-fluid">
            <img src="{{asset('storage/bg/certificates/confirmation_side.png')}}" alt="" class="img-size img-top-faded">
            <img src="{{asset('storage/bg/certificates/confirmation_side.png')}}" alt="" class="img-size img-top-sticking-left">
            <img src="{{asset('storage/bg/certificates/confirmation_side.png')}}" alt="" class="img-size img-center">
            <img src="{{asset('storage/bg/certificates/confirmation_side.png')}}" alt="" class="img-size img-bottom-sticking-left">
            <div class="img-bottom-faded"></div>
            <div class="row">
                <div class="col s2"></div>
                <div class="col s10">
                    <div class="row">
                        <div class="col s12 letter-header balgin center">
                            <p class="r-m-b rcaoc">ROMAN CATHOLIC ARCHDIOCESE OF CEBU</p>
                            <p class="r-m-b r-m-t asihm color-205">ARCHDIOCESAN SHRINE OF THE IMMACULATE HEART OF MARY</p>
                            <p class="r-m-b r-m-t mczip">Minglanilla, Cebu 6046</p>
                            <p class="r-m-b r-m-t contact">Tel. no. 260-3462/ Facebook page: https://www.facebook.com/ASIHM1857/</p>
                        </div>
                        <div class="col s12">
                            <h1 class="cob">Confirmation Certificate</h1>
                        </div>
                        <div class="openSans">
                            <div class="col s12">
                                <div class="row flex">
                                    <div class="l1 ten"></div>
                                    <div class="l1">This is to certify that</div>
                                    <div class="l1 eighty line center">{{$content->firstname}} {{$content->middlename}} {{$content->lastname}} {{$content->suffix ?? ''}}</div>
                                </div>
                                <div class="row flex">
                                    <div class="l1 ten"></div>
                                    <div class="l1">son/daughter of</div>
                                    <div class="l1 line parents-line center">{{$meta->father_firstname}} {{$meta->father_middlename}} {{$meta->father_lastname}} {{$meta->father_suffix ?? ''}}</div>
                                    <div class="l1">and</div>
                                    <div class="l1 line parents-line center">{{$meta->mother_firstname}} {{$meta->mother_middlename}} {{$meta->mother_lastname}} {{$meta->mother_suffix ?? ''}}</div>
                                </div>
                                <div class="row">
                                    <div class="col s12 center old-english">
                                        was confirmed according to the rite of the Roman Catholic Church
                                    </div>
                                </div>
                                <div class="row flex">
                                    <div class="li extraSpace"></div>
                                    <div class="l1 line day_number_space center">{{ordinal_suffix_of($meta->confirmation_day)}}</div>
                                    <div class="l1">day of</div>
                                    <div class="l1 line withComma center">{{month_string($meta->confirmation_month)}}</div>
                                    <div class="li">,</div>
                                    <div class="l1 line monthLine center">{{$meta->confirmation_year}}</div>
                                    <div class="l1">by</div>
                                    <div class="l1 line ministerLine center">{{$meta->confirmation_by}}</div>
                                </div>
                                <div class="row flex">
                                    <div class="l1 extraSpaceSponsor"></div>
                                    <div class="l1 line" style="width: 90%;">&nbsp;</div>
                                </div>
                            </div>
                            <div class="col s12">
                                <div class="row flex">
                                    <div class="li extraSpaceSponsor"></div>
                                    <div class="l1">
                                        @if($meta->first_sponsor != "" && $meta->second_sponsor != "")
                                            The Sponsors being
                                        @elseif($meta->first_sponsor != "" && $meta->second_sponsor == "")
                                            The Sponsor being
                                        @elseif($meta->first_sponsor == "" && $meta->second_sponsor != "")
                                            The Sponsor being
                                        @endif
                                    </div>
                                    <div class="l1 line sponsorLine">
                                        @if($meta->first_sponsor != "" && $meta->second_sponsor != "")
                                            {{$meta->first_sponsor}} and {{$meta->second_sponsor}}
                                        @elseif($meta->first_sponsor != "" && $meta->second_sponsor == "")
                                            {{$meta->first_sponsor}}
                                        @elseif($meta->first_sponsor == "" && $meta->second_sponsor != "")
                                            {{$meta->second_sponsor}}
                                        @endif
                                    </div>
                                </div>
                                <div class="row flex">
                                    <div class="l1 widthFive"></div>
                                    <div class="l1">as appears from the confirmation Register Book</div>
                                    <div class="li line center registerBookWidth">{{$meta->registration_book}}</div>
                                    <div class="li">Page</div>
                                    <div class="li line center registerBookWidth">{{$meta->book_page}}</div>
                                    <div class="li">No.</div>
                                    <div class="li line center registerBookWidth">{{$meta->book_number}}</div>
                                </div>
                                <div class="row flex">
                                    <div class="li widthFive"></div>
                                    <div class="l1">Purpose:</div>
                                    <div class="l1 line purpose-content" style="width: 84%;"></div>
                                </div>
                            </div>
                            <div class="col s12" style="margin-top: 8%;">
                                <div class="col s4">
                                    <div class="row">
                                        <div class="col s12 line center">
                                            @if($meta->date_issued != 'NaN/NaN/NaN')
                                                {{deathDateGetFullStringFormat(str_replace('//','/',$meta->date_issued))}}                                                
                                            @endif
                                        </div>
                                        <div class="col s12 center">Date of Issue</div>
                                    </div>
                                </div>
                                <div class="col s4 center"><p style="margin-top: -20px;">PARISH SEAL</p></div>
                                <div class="col s4">
                                    <div class="row center">
                                        <div class="col s12 line">
                                            @if($content->priest_fname != null)
                                                {{$content->priest_clergy}} {{$content->priest_fname}} {{$content->priest_mname}} {{$content->priest_lname}} {{$content->priest_suffix}}
                                            @endif
                                        </div>
                                        <div class="col s12">Parish Priest</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="toFade backgroundCertification"></div>
        </div>
        <footer></footer>
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
