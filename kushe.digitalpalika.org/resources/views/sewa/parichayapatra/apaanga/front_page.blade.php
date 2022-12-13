







<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .front-page-text
        {
            color: yellow;
        }





        /*css for nepali texted paged*/

        .row-content-div
        {
            width: 100%;
            padding-left: auto;
            padding-right: auto;
            margin-top: 5px;
        }

        .content-left
        {
            text-align: left;
        }

        .content-right
        {
            text-align: right;
        }

        .content-center
        {
            text-align: center;
        }

        .dynamic-text
        {
            width: auto;
            border-bottom: dotted 2px black;
            padding-left: 10px;
            padding-right: 10px;
        }

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

<div class="" style="margin-left:auto; margin-right:auto;width: 100%; height: 620px; padding: 20px; background-color:
        @foreach($diability_severity_types as $diability_severity_type)
            @if($diability_severity_type[0]==$apaangaParichayapatra->disability_type_severity)
                {{$diability_severity_type[4]}}
            @break
            @endif
            {{--                <option value="{{$diability_nature_type[0]}}" {{$apaanga->disability_type_nature==$diability_nature_type[0] ? "selected":""}}>{{$diability_nature_type[2]}} ({{$diability_nature_type[1]}})</option>--}}
        @endforeach
        ">


    <div style="margin-left:auto; margin-right:auto;  border-radius: 50%; background: skyblue;  width:80px; height: 80px; margin-top: 50px; box-shadow: 0px 0px 15px 10px rgba(135,206,235,1);" >
            <img src="{{getDataURI('image/gov-logo.png')}}" style="width: 80px; height: 80px; margin-left: 0px; margin-top: 0px; ">
    </div>



    <div style="width: 100%; margin-top: 10px; padding-left: auto; padding-right: auto; text-align: center;">
        <b class="front-page-text">कुशे गाउँपालिका</b>
    </div>


    <div class="row-content-div content-center">
        <b class="front-page-text">गाउँ कार्यपालिका कार्यालय</b>
    </div>

    <div class="row-content-div content-center">
        <b class="front-page-text">(महिला, बालबालिका तथा जेष्ठ नागरिक साखा)</b>
    </div>

    <div class="row-content-div content-center">
        <b class="front-page-text">कर्णाली प्रदेश, नेपाल</b>
    </div>

    <div style="width: 100%; padding-left: auto; margin-top: 40px; padding-right: auto; text-align: center;">
        <h4><b class="front-page-text">अपाङ्गता भएका व्यक्तिको</b></h4>
    </div>

    <div class="row-content-div content-center">
        <h2><b class="front-page-text">परिचय-पत्र</b></h2>
    </div>

    <div style="width: 100%; padding-left: auto; margin-top: 200px; padding-right: auto; text-align: center;">
        <b class="front-page-text">(अपाङ्गता भएका व्यक्तिको परिचय-पत्र वितरण कार्यविधि, २०७५)</b>
    </div>

</div>



<div class="" style="margin-left:auto; margin-right:auto; width: 500px; height: 100px; height: auto; padding: 20px;">
    <div style=" position: absolute; margin-left:auto; margin-right:auto;  border-radius: 50%; width:40px; height: 40px; margin-top: 20px;" >
        <img src="{{getDataURI('image/gov-logo.png')}}" style="width: 60px; height: 60px; margin-left: 25px; margin-top: 0px; ">
    </div>

    <div style=" position: absolute;
                margin-left: 345px;
                margin-right: auto;
                border-radius: 10px;
                width: 100px;
                height: 115px;
                margin-top: 85px;
                border: 1px solid black;" >
        <img src="{{getDataURI($apaangaParichayapatra->apaanga_profile_picture)}}" style="width: 100%; height: 100%;">
    </div>

    <div style="width: 100%; margin-top: 10px; padding-left: auto; padding-right: auto; text-align: center;">
        <b class="">कुशे गाउँपालिका</b>
    </div>


    <div class="row-content-div content-center">
        <b class="">गाउँ कार्यपालिका कार्यालय</b>
    </div>

    <div class="row-content-div content-center">
        <b class="">(महिला, बालबालिका तथा जेष्ठ नागरिक साखा)</b>
    </div>

    <div class="row-content-div content-center">
        <b class="">कर्णाली प्रदेश, नेपाल</b>
    </div>

    <div class="row-content-div content-center">
        <h4 style="width: 100%; padding: 5px"><b style="padding: 5px;color: white;background-color: black;border-radius: 10px;">अपाङ्गता परिचय-पत्र</b></h4>
    </div>

    <div class="row-content-div content-left">
        <b class="">परिचयपत्र नम्बर : {{$apaangaParichayapatra->id}}</b>
    </div>
    <div class="row-content-div content-left">
        <b class="">परिचयपत्र प्रकार :</b>
    </div>

    <div class="row-content-div content-left">
        <b class="">१) नाम, थर: {{$apaangaParichayapatra->first_name}} {{$apaangaParichayapatra->middle_name}} {{$apaangaParichayapatra->last_name}}</b>
    </div>
    <div class="row-content-div content-left">
        <b class="">२) ठेगाना : प्रदेश </b>
        <span class="dynamic-text" style="">
{{--            {{$apaangaParichayapatra->address_pradesh}}--}}
            @foreach($provinces as $province)
                @if($province['code']==$apaangaParichayapatra->address_pradesh)
                    {{$province['nepali_name']}}
                    @break
                    @endif
                @endforeach

        </span>
        <b class=""> जिल्ला </b>
        <span class="dynamic-text" style="">
            @foreach($districts as $district)
                @if($district[0]==$apaangaParichayapatra->address_jilla)
                    {{$district[3]}}
                    @break
                @endif
            @endforeach
        </span>
        <br><b class="" style="margin-left: 20px"> स्थानीय तह </b>
        <span class="dynamic-text" style="">
            @foreach($local_bodies as $local_bodie)
                @if($local_bodie[0]==$apaangaParichayapatra->address_palika)
                    {{$local_bodie[4]}}
                    @break
                @endif
            @endforeach
        </span>
    </div>

    <div class="row-content-div content-left">
        <b class=""> ३) जन्म मिति : </b>
        <span class="dynamic-text" style="">{{$apaangaParichayapatra->dob}}</span>
    </div>

    <div class="row-content-div content-left">
        <b class="">४) ना.प्र.प.न. :</b>
        <span class="dynamic-text" style="">{{$apaangaParichayapatra->identity_card_no}}</span>
    </div>

    <div class="row-content-div content-left">
        <b class="">५) लिङ्ग</b>
        <span class="dynamic-text" style="">
            @foreach($genders as $gender)
                @if($gender[0]==$apaangaParichayapatra->gender)
                    {{$gender[2]}}
                    @break
                @endif
            @endforeach
        </span>
        <b class="">६) रक्त समूह</b>
        <span class="dynamic-text" style="">{{$apaangaParichayapatra->blood_group}}</span>
    </div>

    <div class="row-content-div content-left">
        <b class="">७) अपाङ्गताको किसिम: प्रकृतिको आधारमा</b>
        <span class="dynamic-text" style="">
            @foreach($diability_nature_types as $diability_nature_type)
                @if($diability_nature_type[0]==$apaangaParichayapatra->disability_type_nature)
                    {{$diability_nature_type[2]}}
                    @break
                @endif
{{--                <option value="{{$diability_nature_type[0]}}" {{$apaanga->disability_type_nature==$diability_nature_type[0] ? "selected":""}}>{{$diability_nature_type[2]}} ({{$diability_nature_type[1]}})</option>--}}
            @endforeach
        </span>
        <br><b class="" style="margin-left: 20px">गम्भीरता</b>
        <span class="dynamic-text" style="">
            @foreach($diability_severity_types as $diability_severity_type)
                @if($diability_severity_type[0]==$apaangaParichayapatra->disability_type_severity)
                    {{$diability_severity_type[3]}}
                    @break
                @endif
                {{--                <option value="{{$diability_nature_type[0]}}" {{$apaanga->disability_type_nature==$diability_nature_type[0] ? "selected":""}}>{{$diability_nature_type[2]}} ({{$diability_nature_type[1]}})</option>--}}
            @endforeach
        </span>
    </div>

    <div class="row-content-div content-left">
        <b class="">८) बाबु/आमा वा संरक्षकको नाम, थर,</b>
        <span class="dynamic-text" style="">{{$apaangaParichayapatra->father_first_name}} {{$apaangaParichayapatra->father_middle_name}} {{$apaangaParichayapatra->father_last_name}}</span>
    </div>


    <div class="row-content-div content-left">
        <b class="">९) परिचयपत्र वाहकको दस्तखत :</b>
        <span class="dynamic-text" style="">fdsafa</span>
    </div>

    <div class="row-content-div content-left">
        <b class="">१०) परिचय पत्र प्रमाणित गर्ने</b>
        <span class="dynamic-text" style="">fdsafa</span>
    </div>

    <div class="row-content-div content-right">
        <b class="">नाम,थर :</b>
        <span class="dynamic-text" style="">fdsafa</span>
    </div>
    <div class="row-content-div content-right">
        <b class="">हस्ताक्षर :</b>
        <span class="dynamic-text" style="">fdsafa</span>
    </div>
    <div class="row-content-div content-right">
        <b class="">पद :</b>
        <span class="dynamic-text" style="">fdsafa</span>
    </div>
    <div class="row-content-div content-right">
        <b class="">मिति :</b>
        <span class="dynamic-text" style="">fdsafa</span>
    </div>
</div>



<div class="" style="margin-left:auto; margin-right:auto; width: 500px; height: 100px; height: auto; padding: 20px;">
    <div style=" position: absolute; margin-left:auto; margin-right:auto;  border-radius: 50%; width:40px; height: 40px; margin-top: 20px;" >
        <img src="{{getDataURI('image/gov-logo.png')}}" style="width: 60px; height: 60px; margin-left: 25px; margin-top: 0px; ">
    </div>

    <div style=" position: absolute;
                margin-left: 345px;
                margin-right: auto;
                border-radius: 10px;
                width: 100px;
                height: 115px;
                margin-top: 80px;
                border: 1px solid black;" >
        <img src="{{getDataURI($apaangaParichayapatra->apaanga_profile_picture)}}" style="width: 100%; height: 100%;  ">
    </div>

    <div style="width: 100%; margin-top: 10px; padding-left: auto; padding-right: auto; text-align: center;">
        <b class="">Kushe Rural Municipality</b>
    </div>


    <div class="row-content-div content-center">
        <b class="">Office of the Rural Municipal Executive</b>
    </div>

    <div class="row-content-div content-center">
        <b class="">(Woman, Child and senior Citizen Branch)</b>
    </div>

    <div class="row-content-div content-center">
        <b class="">Karnali Province, Nepal</b>
    </div>



    <div class="row-content-div content-left">
        <b class="">ID Card Number :{{$apaangaParichayapatra->id}}</b>
    </div>
    <div class="row-content-div content-left">
        <b class="">ID Card type:</b>
    </div>

    <div class="row-content-div content-center">
        <h4 style="width: 100%; padding: 5px"><b style="padding: 5px;color: white;background-color: black;border-radius: 10px;">Disability Identity card</b></h4>
    </div>

    <div class="row-content-div content-left">
        <b class="">1) Full Name of Person: </b>
        <span class="dynamic-text" style="">{{$apaangaParichayapatra->first_name_english}} {{$apaangaParichayapatra->middle_name_english}} {{$apaangaParichayapatra->last_name_english}}</span>
    </div>
    <div class="row-content-div content-left">
        <b class="">2) Address: Province</b>
        <span class="dynamic-text" style="">
            @foreach($provinces as $province)
                @if($province['code']==$apaangaParichayapatra->address_pradesh)
                    {{$province['english_name']}}
                    @break
                @endif
            @endforeach
        </span>
        <b class=""> District </b>
        <span class="dynamic-text" style="">
            @foreach($districts as $district)
                @if($district[0]==$apaangaParichayapatra->address_jilla)
                    {{$district[2]}}
                    @break
                @endif
            @endforeach
        </span>
        <br><b class="" style="margin-left: 20px"> Local level </b>
        <span class="dynamic-text" style="">
            @foreach($local_bodies as $local_bodie)
                @if($local_bodie[0]==$apaangaParichayapatra->address_palika)
                    {{$local_bodie[3]}}
                    @break
                @endif
            @endforeach
        </span>
    </div>

    <div class="row-content-div content-left">
        <b class=""> 3) Date Of Birth : </b>
        <span class="dynamic-text" style="">
            {{$apaangaParichayapatra->dob}}
        </span>
    </div>

    <div class="row-content-div content-left">
        <b class="">4) Citizenship Number:</b>
        <span class="dynamic-text" style="">
            {{$apaangaParichayapatra->identity_card_no}}
        </span>
    </div>

    <div class="row-content-div content-left">
        <b class="">5) sex</b>
        <span class="dynamic-text" style="">
            @foreach($genders as $gender)
                @if($gender[0]==$apaangaParichayapatra->gender)
                    {{$gender[1]}}
                    @break
                @endif
            @endforeach
        </span>
        <b class="">6) Blod Group</b>
        <span class="dynamic-text" style="">
            {{$apaangaParichayapatra->blood_group}}
        </span>
    </div>

    <div class="row-content-div content-left">
        <b class="">7) Type of Disability On the basis of nature</b>
        <span class="dynamic-text" style="">
            @foreach($diability_nature_types as $diability_nature_type)
                @if($diability_nature_type[0]==$apaangaParichayapatra->disability_type_nature)
                    {{$diability_nature_type[1]}}
                    @break
                @endif
                {{--                <option value="{{$diability_nature_type[0]}}" {{$apaanga->disability_type_nature==$diability_nature_type[0] ? "selected":""}}>{{$diability_nature_type[2]}} ({{$diability_nature_type[1]}})</option>--}}
            @endforeach
        </span>
        <br><b class="" style="margin-left: 20px">on the basis of severity</b>
        <span class="dynamic-text" style="">
            @foreach($diability_severity_types as $diability_severity_type)
                @if($diability_severity_type[0]==$apaangaParichayapatra->disability_type_severity)
                    {{$diability_severity_type[2]}}
                    @break
                @endif
                {{--                <option value="{{$diability_nature_type[0]}}" {{$apaanga->disability_type_nature==$diability_nature_type[0] ? "selected":""}}>{{$diability_nature_type[2]}} ({{$diability_nature_type[1]}})</option>--}}
            @endforeach
        </span>
    </div>

    <div class="row-content-div content-left">
        <b class="">8) Father Name/ Mother name of Guardian</b>
        <span class="dynamic-text" style="">
            {{$apaangaParichayapatra->father_first_name_english}} {{$apaangaParichayapatra->father_middle_name_english}} {{$apaangaParichayapatra->father_last_name_english}}
        </span>
    </div>


    <div class="row-content-div content-left">
        <b class="">9) Signature of ID card Holders</b>
        <span class="dynamic-text" style="">fdsafa</span>
    </div>

    <div class="row-content-div content-left">
        <b class="">10) Approved By: </b>
        <span class="dynamic-text" style="">fdsafa</span>
    </div>

    <div class="row-content-div content-right">
        <b class="">Name :</b>
        <span class="dynamic-text" style="">fdsafa</span>
    </div>
    <div class="row-content-div content-right">
        <b class="">Signature :</b>
        <span class="dynamic-text" style="">fdsafa</span>
    </div>
    <div class="row-content-div content-right">
        <b class="">Designation :</b>
        <span class="dynamic-text" style="">fdsafa</span>
    </div>
    <div class="row-content-div content-right">
        <b class="">Date :</b>
        <span class="dynamic-text" style="">fdsafa</span>
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


