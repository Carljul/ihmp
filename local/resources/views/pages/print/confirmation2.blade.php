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
<html>
    <head>
        <title>{{$content->firstname}} {{$content->middlename}} {{$content->lastname}} {{$content->suffix ?? ''}}</title>
        <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
        <style>
            .old-english{
                font-family: "Euclid Fraktur", "Old English Text MT", fantasy, serif;
            }

            .underline{
                text-decoration: underline;
            }

            body{
                margin: 48px;
            }
            .border-top{
                position: absolute;
                margin-top: -136px;
                margin-left: -120px;
                height: 200px;
            }

            .logo{
                position: absolute;
                left: 40%;
                width: 150px;
                bottom: 11%;
            }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col s12 old-english">
                    <center>
                        <img src="{{asset('storage/logo/certificate.jpg')}}" alt="logo" class="logo responsive-img circle">
                        <h4>Immaculate Heart of Mary Parish</h4>
                        <p>Minglanilla, Cebu, Philippines<br>Tel. Nos. 490-9635, 272-5807</p>
                        <br>
                        <h2>Certificate of Confirmation</h2>
                    </center>
                </div>
                <div class="col s12">
                    <br>
                    <br>
                    <center>
                        <img src="{{ asset('storage/logo/border.png') }}" alt="border" class="border-top">
                        This is to certify that
                        <div class="underline">
                            <h3 class="old-english">{{$content->firstname}} {{$content->middlename}} {{$content->lastname}} {{$content->suffix ?? ''}}</h3>
                        </div>
                        <br>
                        son/daugther of
                        <br>
                        <b><span class="underline">{{$meta->father_firstname}} {{$meta->father_middlename}} {{$meta->father_lastname}} {{$meta->father_suffix ?? ''}}</span></b> and
                        <b><span class="underline">{{$meta->mother_firstname}} {{$meta->mother_middlename}} {{$meta->mother_lastname}} {{$meta->mother_suffix ?? ''}}</span></b>
                        <br>
                        <br>
                        was <b>confirmed according to the rite of the Roman Catholic Church</b> on the <span class="underline">&nbsp;&nbsp;{{ordinal_suffix_of($meta->confirmation_day)}}&nbsp;&nbsp;</span>
                        day of <span class="underline">&nbsp;&nbsp;{{month_string($meta->confirmation_month)}}&nbsp;&nbsp;</span>, <span class="underline">&nbsp;&nbsp;{{$meta->confirmation_year}}&nbsp;&nbsp;</span> by <span class="underline"><b>&nbsp;&nbsp;{{$meta->confirmation_by}}&nbsp;&nbsp;</b></span>.
                        <br>
                        <br>
                        @if($meta->first_sponsor != "" && $meta->second_sponsor != "")
                            The sponsors being <span class="underline">&nbsp;&nbsp;{{$meta->first_sponsor}}&nbsp;&nbsp;</span> and <span class="underline">&nbsp;&nbsp;{{$meta->second_sponsor}}&nbsp;&nbsp;</span>
                        @elseif($meta->first_sponsor != "" && $meta->second_sponsor == "")
                            The sponsor <span class="underline">&nbsp;&nbsp;{{$meta->first_sponsor}}&nbsp;&nbsp;</span>
                        @elseif($meta->first_sponsor == "" && $meta->second_sponsor != "")
                            The sponsor <span class="underline">&nbsp;&nbsp;{{$meta->second_sponsor}}&nbsp;&nbsp;</span>
                        @endif
                        as appears from the Confirmation Register Book <span class="underline">&nbsp;&nbsp;{{$meta->registration_book}}&nbsp;&nbsp;</span> Page <span class="underline">&nbsp;&nbsp;{{$meta->book_page}}&nbsp;&nbsp;</span> No. <span class="underline">&nbsp;&nbsp;{{$meta->book_number}}&nbsp;&nbsp;</span> of this Church.
                    </center>
                </div>
                <div class="col s12">
                    <br><br><br><br><br>
                    <div class="row">
                        <div class="col s3">
                            <center>
                                @if($meta->date_issued != 'NaN/NaN/NaN')
                                    <span class="underline">&nbsp;&nbsp;{{deathDateGetFullStringFormat($meta->date_issued)}}&nbsp;&nbsp;</span><br>
                                @else
                                    <span class="underline">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span><br>
                                @endif
                                Date Issued
                            </center>
                        </div>
                        <div class="col s3"></div>
                        <div class="col s2"></div>
                        <div class="col s4">
                            <center>
                                @if($content->priest_fname != null)
                                <strong><span class="underline">&nbsp;&nbsp;{{$content->priest_clergy}} {{$content->priest_fname}} {{$content->priest_mname}} {{$content->priest_lname}} {{$content->priest_suffix}}&nbsp;&nbsp;</span></strong><br>
                                @endif
                                Parish Priest
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            print();
            setTimeout(function(){
                location.href="/ihmp/certificate";
            },1000);
        </script>
    </body>
</html>
