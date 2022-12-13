



<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /*@import url("https://fonts.googleapis.com/css2?family=Mukta:wght@200;300;400&display=swap");*/
        /* .div-main*/
        /* {*/
        /*     width: 760px;*/
        /*     height: 550px;*/
        /* }*/
        /* .div-first*/
        /* {*/
        /*     width: 570px;*/
        /*     height: 400px;*/
        /* }*/

        /* .div-second*/
        /* {*/
        /*     float: left;*/
        /*     width: 190px;*/
        /*     height: 155px;*/
        /* }*/




        /* .div-logo*/
        /* {*/
        /*     background-color: red;*/
        /*     width: 570px;*/
        /*     height: 95px;*/
        /* }*/

        /* .div-logo .nep_gov_logo*/
        /* {*/
        /*     width: 280px;*/
        /*     height: 95px;*/
        /* }*/

        /* .div-logo .parichayapatra-logo*/
        /* {*/
        /*     width: 280px;*/
        /*     height: 95px;*/
        /* }*/



        /* .nep_gov_logo img*/
        /* {*/
        /*     float: right;*/
        /*     height: 95px;*/
        /*     width: 95px;*/

        /* }*/

        /*.parichayapatra-logo img*/
        /* {*/
        /*     float: left;*/
        /*    height: 95px;*/
        /*    width: 95px;*/
        /* }*/

        /* .div-institute-name*/
        /* {*/
        /*     width: 570px;*/
        /*     height: 30px;*/
        /*     text-align: center;*/
        /*     color: red*/
        /* }*/

        /* .div-parichayapatra-title*/
        /* {*/
        /*     text-align: center;*/
        /* }*/


    </style>
</head>
<body>


<div class="div-main" style="padding: 20px; background-color: whitesmoke">
    <div style="width: 760px; margin-left: auto; height: auto; margin-right: auto">
        <div class="div-first" style="width: 500px; height: auto; display: inline-block">

            <div class="div-logo" style="padding-left: 40%; width: 560px;height: 95px; display: inline-block">
                <img src="{{getDataURI('parichayapatra/nep_gov_logo.jpg')}}" style="height: 90px; width: 90px; margin-left: auto; margin-right: auto ">

{{--                <img src="{{getDataURI('parichayapatra/voter_logo.jpg')}}" style="height: 90px; width: 90px;">--}}


            </div>



            <div class="div-institute-name" style="width: 560px;  text-align: center; margin-top: 5px;font-size: 32px;">

                <span style=""><b>कुशे गाउँपालिका, जाजरकोट</b></span><br>
                <span style="font-size: 20px">वडा नं: 2,कर्णाली </span>
            </div>
            <div class="div-parichayapatra-title" style="width: 560px; text-align: center; font-size: 32px; color: blue;">
                    महिला परिचयपत्र
            </div>
            <div class="div-parichayapatra-detail" style="width: 560px; padding-left:40px;margin-top:5px; font-size: 22px;">


                नाम:- <span class="input">{{$mahilaParichayapatra->first_name }} {{$mahilaParichayapatra->middle_name }} {{$mahilaParichayapatra->last_name }}</span><br />
                जन्म मिति:- <span class="input">{{$mahilaParichayapatra->dob}}</span><br/>
                नागरिकता नं:-
                <span class="input">12-58921-1651-41661 </span><br />
                बुबाको नाम:- <span class="input">{{$mahilaParichayapatra->father_first_name }} {{$mahilaParichayapatra->father_middle_name }} {{$mahilaParichayapatra->father_last_name }}</span><br />
                आमको नाम:- <span class="input">{{$mahilaParichayapatra->mother_first_name }} {{$mahilaParichayapatra->mother_middle_name }} {{$mahilaParichayapatra->mother_last_name }}</span><br />
                @if(!$mahilaParichayapatra->husband_first_name==null)
                    @if($mahilaParichayapatra->marital_status == "विधवा")
                        स्वर्गीय श्रीमानको नाम, थर: <span class="input">{{$mahilaParichayapatra->husband_first_name }} {{$mahilaParichayapatra->husband_middle_name }} {{$mahilaParichayapatra->husband_last_name }}</span></br>
                    @else
                        श्रीमानको नाम, थर: <span class="input">{{$mahilaParichayapatra->husband_first_name }} {{$mahilaParichayapatra->husband_middle_name }} {{$mahilaParichayapatra->husband_last_name }}</span></br>
                    @endif
                @endif
                स्थायी ठेगाना:- प्रदेश: <span class="input">{{$mahilaParichayapatra->address_pradesh }}, </span> जिल्ला: <span class="input">{{$mahilaParichayapatra->address_jilla }},</span>
                <br><span style="margin-left: 100px"></span>गा.बी.स / न.पा: <span class="input">{{$mahilaParichayapatra->address_palika }}, </span> वडा नं:
                <span class="input">{{$mahilaParichayapatra->address_ward_no }}</span><br />




            </div>
        </div>

        <div class="div-second" style="width: 260px; display: inline-block; position: absolute; padding-top: 70px">
            <img src="{{getDataURI($mahilaParichayapatra->mahila_profile_picture)}}" style="width:200px;height: 200px;">
{{--            //width:132.28px;height: 170.08px;--}}
            <div class="signature" style="margin-top: 100px; font-size: 20px; margin-left: 0px;">आयोगका सचिबको हस्ताक्षर</div>

        </div>
    </div>

</div>
@php
    function getDataURI($imagePath) {
        $finfo = new finfo(FILEINFO_MIME_TYPE);
        $type = $finfo->file($imagePath);
        return 'data:' . $type . ';base64,' . base64_encode(file_get_contents($imagePath));
    }
@endphp
</body>
</html>

