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
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
            margin: 40px;
        }
        .border-top{
            position: absolute;
            margin-top: -136px;
            margin-left: -120px;
            height: 200px;
        }

        .border{
            border-bottom: 1px solid black;
            margin: 0px 10px;
        }

        .logo{
            position: absolute;
            left: 40%;
            width: 150px;
            bottom: 11%;
        }

        .classic-font{
            font-family: Brush Script MT;
        }
        .marriage_top{
            width: 300px;
            position: absolute;
            margin-top: -120px;
        }
        .marriage_bottom{
            position: absolute;
            width: 250px;
            margin-left: -129px;
            margin-top: -18px;
        }

        .f25{
            font-size: 25px;
        }
        .marriage_side_top_left{
            position: absolute;
            left: 40px;
            top: 40px;
            width: 150px;
        }

        .marriage_side_top_right{
            position: absolute;
            right: 40px;
            top: 40px;
            transform: scaleX(-1);
            width: 150px;
        }
        .marriage_side_bottom_left{
            position: absolute;
            left: 40px;
            bottom: 40px;
            transform: scaleY(-1);
            width: 150px;
        }
        .marriage_side_bottom_right{
            position: absolute;
            right: 40px;
            bottom: 40px;
            transform: scaleX(-1) scaleY(-1);
            width: 150px;
        }
        .churchBG{
            width: 91%;
            position: absolute;
            top: 100px;
            left: 47px;
            z-index: -1;
            display: block;
            margin-top: auto;
            margin-bottom: auto;
            opacity: 0.12;
        }
        @page {
            size: landscape;
            margin: 12%;
        }
    </style>
</head>
<body>
    <div class="row">
        <div class="col s12">
            <center>
                <img src="{{asset('storage/logo/marriage_sides.png')}}" alt="marriage_top" class="marriage_side_top_left">
                <img src="{{asset('storage/logo/marriage_sides.png')}}" alt="marriage_top" class="marriage_side_top_right">
                <img src="{{asset('storage/logo/marriage_sides.png')}}" alt="marriage_top" class="marriage_side_bottom_left">
                <img src="{{asset('storage/logo/marriage_sides.png')}}" alt="marriage_top" class="marriage_side_bottom_right">
                <h2 class="classic-font">Certificate of Marriage</h2>
                <img src="{{asset('storage/logo/marriage_bottom.png')}}" alt="marriage_bottom" class="marriage_bottom">
                <br><br>
                Church of
                <h5><span>Immaculate Heart of Mary Parish</span></h5><br>
                <span class="">This is to certify that</span>
                <br>
                <strong><span class="classic-font underline f25">&nbsp;&nbsp;{{$meta->husband_firstname}} {{$meta->husband_middlename}} {{$meta->husband_lastname}} {{$meta->husband_suffix}}&nbsp;&nbsp;</span></strong>
                 and
                <strong><span class="classic-font underline f25">&nbsp;&nbsp;{{$meta->wife_firstname}} {{$meta->wife_middlename}} {{$meta->wife_lastname}} {{$meta->wife_suffix}}&nbsp;&nbsp;</span></strong>
                <br>
                in the legal age of <strong><span class="underline">&nbsp;&nbsp;{{$meta->husband_age}}&nbsp;&nbsp;</span></strong> and
                <strong><span class="underline">&nbsp;&nbsp;{{$meta->wife_age}}&nbsp;&nbsp;</span></strong> were united in holy matrimony of marriage on this day,
                the <strong><span class="underline">&nbsp;&nbsp;{{ordinal_suffix_of($meta->marriage_day)}}&nbsp;&nbsp;</span></strong> of <strong><span class="underline">&nbsp;&nbsp;{{month_string($meta->marriage_month)}}&nbsp;&nbsp;</span></strong>
                in the year of <strong><span class="underline">&nbsp;&nbsp;{{$meta->marriage_year}}&nbsp;&nbsp;</span></strong><br>at
                <span class="underline">&nbsp;&nbsp;{{$meta->marriage_place}}&nbsp;&nbsp;</span>. The holy matrimony of marriage was solemnized by <strong><span class="underline">&nbsp;&nbsp;{{$meta->solemnized_by}}&nbsp;&nbsp;</span></strong>

                <br>
                <br>
                The ceremony was witnessed and celebrated by:

                <div class="row">
                    <div class="col s6">
                        Husbands witness
                    </div>
                    <div class="col s6">
                        Wifes witness
                    </div>
                </div>
                <div class="row">
                    <div class="col s3"><span class="{{$meta->husband_firstwitness == '' ? '':'underline'}}">&nbsp;&nbsp;{{$meta->husband_firstwitness}}&nbsp;&nbsp;</span></div>
                    <div class="col s3"><span class="{{$meta->husband_secondwitness == '' ? '':'underline'}}">&nbsp;&nbsp;{{$meta->husband_secondwitness}}&nbsp;&nbsp;</span></div>
                    <div class="col s3"><span class="{{$meta->wife_firstwitness == '' ? '':'underline'}}">&nbsp;&nbsp;{{$meta->wife_firstwitness}}&nbsp;&nbsp;</span></div>
                    <div class="col s3"><span class="{{$meta->wife_secondwitness == '' ? '':'underline'}}">&nbsp;&nbsp;{{$meta->wife_secondwitness}}&nbsp;&nbsp;</span></div>
                </div>
                <br>
                I hereby to certify to the correctness of the date above as found in the Parish book of <br>
                Marriages No. <span class="underline">&nbsp;&nbsp;{{$meta->marriage_number}}&nbsp;&nbsp;</span>
                Page: <span class="underline">&nbsp;&nbsp;{{$meta->marriage_page}}&nbsp;&nbsp;</span>
                Line: <span class="underline">&nbsp;&nbsp;{{$meta->marriage_line}}&nbsp;&nbsp;</span>
                <br><br><br><br>

                @if($content->priest_fname != null)
                <strong><span class="underline">&nbsp;&nbsp;{{$content->priest_clergy}} {{$content->priest_fname}} {{$content->priest_mname}} {{$content->priest_lname}} {{$content->priest_suffix}}&nbsp;&nbsp;</span></strong><br>
                @endif
                Parish Priest
            </center>
        </div>
        <img src="{{asset('storage/bg/ihmp.jpg')}}" alt="background" class="churchBG">
    </div>

    <script>
        print();
        setTimeout(function(){
            location.href="/ihmp/certificate";
        },1000);
    </script>
</body>
</html>
