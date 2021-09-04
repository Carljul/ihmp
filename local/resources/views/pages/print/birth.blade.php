<html>
    <head>
        <title>{{$content->firstname}} {{$content->middlename}} {{$content->lastname}} {{$content->suffix ?? ''}}</title>
        <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
        <style>
            .old-english{
                font-family: "Euclid Fraktur", "Old English Text MT", fantasy, serif;
            }
            .opacity-01{
                opacity: 0.1;
            }
            .logo-size{
                width: 300px;
                height: auto;
            }
            .text-size-8{
                font-size: 12px;
                font-style: italic;
            }
            .custom-right{
                top: 200px;
                position: absolute;
                right: 15px !important;
            }

            .custom-left{
                top: 200px;
                position: absolute;
                left: 15px !important;
            }
            .m-negative-top{
                margin-top: -92px;
            }

            .this_is_to_certify{
                position: absolute;
                top: 410px !important;
            }

            .logo{
                position: absolute;
                left: 153px;
            }
            .underline{
                text-decoration: underline;
            }
            .moveBody{
                position: absolute;
                top: 500px;
                width: 90%;
            }
            .moveBody p{
                text-align: justify;
                font-size: 18px;
            }
            .sacramentOfBaptism{
                position: absolute;
                top: 700px;
                width: 90%;
            }
            .godParents{
                position: absolute;
                top: 800px;
                width: 90%;
            }
            .churchRecord{
                position: absolute;
                top: 990px;
                width: 100%;
                margin-bottom: 0px;
            }
            .bottom-border{
                border-bottom: 1px solid black;
            }
            .certificate_background{
                width: 100%;
                position: absolute;
                z-index: -1;
                opacity: 0.1;
                left: 0px;
                top: 579px;
            }
            @media print{
                body{
                    margin: 45px !important;
                }
                .custom-left{
                    margin-left: 50px;
                }
                .custom-right{
                    margin-right: 50px;
                }
                .this_is_to_certify{
                    left: 0px !important;
                }
                .this_is_to_certify h5{
                    font-weight: bold;
                }

                .logo{
                    position: absolute;
                    left: 220px !important;
                    top: 450px !important;
                }
                .logo img{
                    position: absolute;
                    left: 65px;
                    top: -320px;
                }
            }

            @page{
                size: portrait;
            }
        </style>
    </head>
    <body class="body">
        <div class="center-align old-english">
            <div class="row">
                <h5>Archdiocesan Shrine of the Immculate Heart of Mary</h5>
                <h6>Minglanilla, Cebu 6046<br>Tel.No.260-3462</h6>
            </div>
        </div>

        <div class="row center-align">
            <div class="col m4">
                <div class="text-size-8 custom-left">Go therfore, make<br>disciples of all<br>the nations;</div>
            </div>
            <div class="col m4">
                <center>
                <div class="logo">
                    <img src="{{asset('storage/logo/certificate.jpg')}}" alt="logo" class="responsive-img circle logo-size opacity-01">
                    <h3 class="old-english m-negative-top">Certificate of Baptism</h3>
                </div>
            </center>
            </div>
            <div class="col m4">
                <div class="text-size-8 custom-right">baptize them on the name<br>of the Father and of the Son<br>and of the Holy Spirit.</div>
            </div>
        </div>
        <div class="row center-align">
            <div class="col s12 this_is_to_certify">
                <strong>This is to certify that:</strong>
                <h5>{{$content->firstname}} {{$content->middlename}} {{$content->lastname}} {{$content->suffix ?? ''}}</h5>
                <hr style="width: 500px; border: 1px solid black;">
            </div>
        </div>
        <div class="row">
            <div class="moveBody">
                <p>
                    Born on <b><span class="underline">&nbsp;&nbsp;{{date('F d, Y', strtotime(str_replace("//","/",$meta->born_on)))}}&nbsp;&nbsp;</span></b>
                    in <b><span class="underline">&nbsp;&nbsp;{{$meta->born_in}}&nbsp;&nbsp;</span></b>
                    Child of <b><i><span class="underline">&nbsp;&nbsp;{{$meta->father_firstname}} {{$meta->father_middlename}} {{$meta->father_lastname}} {{$meta->father_suffix}}&nbsp;&nbsp;</span></i></b>
                    and <b><i><span class="underline">&nbsp;&nbsp;{{$meta->mother_firstname}} {{$meta->mother_middlename}} {{$meta->mother_lastname}} {{$meta->mother_suffix}}&nbsp;&nbsp;</span></i></b>
                    Residents of <b><span class="underline">&nbsp;&nbsp;{{$meta->resident_of}}&nbsp;&nbsp;</span></b>
                </p>
                <center>
                    <span>in God's good time received the</span>
                    <h3 class="old-english">Sacrament of Baptism</h3>
                </center>
            </div>
        </div>
        <div class="row sacramentOfBaptism">
            <div class="container-fluid center-align">
                <div class="col s6">
                    {{date('F d, Y', strtotime(str_replace("//","/",$meta->baptism_date)))}}
                    <br>
                    <hr>
                    Date of Baptism
                </div>
                <div class="col s6">
                    <span style="font-size: 20px; font-weight: bold;">{{$meta->baptism_minister}}</span>
                    <br>
                    <hr style="margin-top: 1.5px;">
                    Minister of Baptism
                </div>
            </div>
        </div>
        <img src="{{ asset('storage/logo/john_the_baptist.jpg') }}" alt="bg" class="certificate_background">
        <div class="row godParents">
            <div class="container-fluid">
                <div class="col s12">
                    Godparents:
                </div>
                <br>
                @foreach ($godparents as $godparent)
                    <div class="col {{count($godparents) == 2 ? "s6":(count($godparents) == 1 ?"s12":"s4")}} center-align">
                        <span>{{$godparent}}<br><hr style="margin-top: 0px;"></span>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="row churchRecord">
            <div class="container-fluid">
                <div class="col s6">
                    Baptismal Register: <span class="underline">&nbsp;&nbsp;&nbsp;{{$meta->baptismal_register}}&nbsp;&nbsp;&nbsp;</span><br>
                    Volume: <span class="underline">&nbsp;&nbsp;&nbsp;{{$meta->volume}}&nbsp;&nbsp;&nbsp;</span>
                    Page: <span class="underline">&nbsp;&nbsp;&nbsp;{{$meta->page}}&nbsp;&nbsp;&nbsp;</span><br>
                    Date Issue: <span class="underline">&nbsp;&nbsp;&nbsp;{{$meta->date_issued == "NaN//NaN//NaN" ? "":date('F d, Y', strtotime(str_replace("//","/",$meta->date_issued)))}}&nbsp;&nbsp;&nbsp;</span>
                </div>
                <div class="col s6">
                    <center>
                        <p>
                            <strong><span class="underline">{{$content->priest_clergy}} {{$content->priest_fname}} {{$content->priest_mname}} {{$content->priest_lname}} {{$content->priest_suffix}}</span></strong>
                            <br>
                            Parish Priest
                        </p>
                    </center>
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
