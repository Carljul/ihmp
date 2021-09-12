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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$content->firstname}} {{$content->middlename}} {{$content->lastname}} {{$content->suffix ?? ''}}</title>
    <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">

    <style>
        .priest{
            position: absolute;
            bottom: 7%;
            left: 47%;
        }
        table.custom-table{
            width: 30%;
            position: absolute;
            left: 14% !important;
        }

        table.custom-table td{
            padding: 0px !important;
        }

        .bold {
            font-weight: bold;
        }
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
        .death_bottom{
            position: absolute;
            width: 350px;
            margin-left: -175px;
            margin-top: -84px;
            transform: scaleY(-1);
        }
        .death_top{
            position: absolute;
            width: 350px;
            margin-left: -175px;
            margin-top: -100px;
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
            width: 300px;
            height: 300px;
            position: absolute;
            top: 200px;
            left: 37%;
            z-index: -1;
            display: block;
            margin-top: auto;
            margin-bottom: auto;
            opacity: 0.12;
            border-radius: 1000px;
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
                <img src="{{asset('storage/logo/death_border.png')}}" alt="death_top" class="death_top">
                <h2 class="old-english">Certificate of Death</h2>
                <img src="{{asset('storage/logo/death_border.png')}}" alt="death_bottom" class="death_bottom">
                <br><br><br>
                This is to acknowledge the death of
                <br>
                <h3 class="old-english">
                    <span class="underline">&nbsp;&nbsp;&nbsp;{{$content->firstname}} {{$content->middlename}} {{$content->lastname}} {{$content->suffix}}&nbsp;&nbsp;&nbsp;</span>
                </h3>
                <br>
                <div>
                    On the <span class="bold underline">&nbsp;&nbsp;{{ordinal_suffix_of(deathGetDay($meta->date_of_death))}}&nbsp;&nbsp;</span>
                    day of <span class="bold underline">&nbsp;&nbsp;{{month_string(deathGetMonth($meta->date_of_death))}}&nbsp;&nbsp;</span>
                    In the year of <span class="bold underline">&nbsp;&nbsp;{{deathGetYear($meta->date_of_death)}}&nbsp;&nbsp;</span>
                    with the age of <span class="bold underline">&nbsp;&nbsp;{{$meta->age}}&nbsp;&nbsp;</span>,
                    a resident in <span class="bold underline">&nbsp;&nbsp;{{$meta->residence}}&nbsp;&nbsp;</span>
                    with his/her Informant/Relatives <span class="bold underline">&nbsp;&nbsp;{{$meta->informant_or_relatives}}&nbsp;&nbsp;</span>.

                    <br><br>
                    Mr/Mrs/Ms. <span class="bold underline">&nbsp;&nbsp;{{$content->firstname}}&nbsp;&nbsp;</span> will be burried in
                    <span class="bold underline">&nbsp;&nbsp;{{$meta->place_of_burial}}&nbsp;&nbsp;</span> on
                    <span class="bold underline">&nbsp;&nbsp;{{deathDateGetFullStringFormat($meta->date_of_burial)}}&nbsp;&nbsp;</span>
                </div>
                <br>
                <br>

                <img src="{{asset('storage/logo/death_border.png')}}" alt="death_top" class="death_top">
                <div>
                    All data mentioned above appears in the Registry of Death at the Archdiocesan Shrine of the Immaculate Heart of Mary Parish;
                    <br>
                    <br>
                    <table class="custom-table">
                        <tr>
                            <td>Book Number</td>
                            <td>: <span class="bold">{{$meta->book_number}}</span></td>
                        </tr>
                        <tr>
                            <td>Page Number</td>
                            <td>: <span class="bold">{{$meta->page_number}}</span></td>
                        </tr>
                        <tr>
                            <td>Registry Number</td>
                            <td>: <span class="bold">{{$meta->registry_number}}</span></td>
                        </tr>
                        <tr>
                            <td>Date Issued</td>
                            <td>: <span class="bold">{{deathDateGetFullStringFormat($meta->date_issued)}}</span></td>
                        </tr>
                    </table>
                </div>
                <br>
                <br>
                <div class="priest">
                    @if($content->priest_fname != null)
                    <strong><span class="underline">&nbsp;&nbsp;{{$content->priest_clergy}} {{$content->priest_fname}} {{$content->priest_mname}} {{$content->priest_lname}} {{$content->priest_suffix}}&nbsp;&nbsp;</span></strong><br>
                    @endif
                    Parish Priest
                </div>
            </center>
        </div>
        <img src="{{asset('storage/logo/ihm.jpg')}}" alt="background" class="churchBG">
    </div>

    <script>
        print();
        setTimeout(function(){
            location.href="/ihmp/certificate";
        },1000);
    </script>
</body>
</html>
