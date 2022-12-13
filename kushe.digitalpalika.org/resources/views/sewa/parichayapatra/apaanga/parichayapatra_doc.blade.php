
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>



    </style>
</head>
<body>


<div class="div-main" style="padding: 30px; background-color: whitesmoke">

    <div style="width: 760px; margin:auto">
        <div class="div-first" style="width: 560px; display: inline-block">

            <div class="div-logo" style="padding-left: 190px; width: 560px;height: 95px; display: inline-block">
                <img src="{{getDataURI('parichayapatra/nep_gov_logo.jpg')}}" style="height: 90px; width: 90px; ">

                <img src="{{getDataURI('parichayapatra/voter_logo.jpg')}}" style="height: 90px; width: 90px;">

            </div>



            <div class="div-institute-name" style="width: 560px;  text-align: center; margin-top: 5px;font-size: 32px;">
                <h3>निर्वाचन आयोग नेपाल</h3>
            </div>
            <div class="div-parichayapatra-title" style="width: 560px; text-align: center; font-size: 32px;">


                <mark>
                    बालबालिका परिचय पत्र
                </mark>


            </div>
            <div class="div-parichayapatra-detail" style="width: 560px; padding-left:40px;margin-top:5px; font-size: 22px;">



                नाम, थर: <span class="input">{{$apaangaParichayapatra->first_name }} {{$apaangaParichayapatra->middle_name }} {{$apaangaParichayapatra->last_name }}</span><br />
                जन्म मीती: <span class="input">{{$apaangaParichayapatra->dob}}</span><br/>
                नागरिकता नं
                <span class="input">12-58921-1651-41661 </span><br />
                बुबाको नाम, थर: <span class="input">{{$apaangaParichayapatra->father_first_name }} {{$apaangaParichayapatra->father_middle_name }} {{$apaangaParichayapatra->father_last_name }}</span><br />
                आमको नाम, थर: <span class="input">{{$apaangaParichayapatra->mother_first_name }} {{$apaangaParichayapatra->mother_middle_name }} {{$apaangaParichayapatra->mother_last_name }}</span><br />

                स्थायी ठेगाना: प्रदेश <span class="input">{{$apaangaParichayapatra->address_pradesh }}</span> जिल्ला <span class="input">{{$apaangaParichayapatra->address_jilla }}</span> गा.बी.स /
                न.पा <span class="input">{{$apaangaParichayapatra->address_palika }}</span> वडा नं
                <span class="input">{{$apaangaParichayapatra->address_ward_no }}</span><br />




            </div>
        </div>
        <div class="div-second" style="width: 200px; display: inline-block; position: absolute;">
            <img src="{{getDataURI('parichayapatra/user_photo.jpg')}}" style="width:200px;height: 300px">

            <div class="signature" style="margin-top: 100px; font-size: 15px">आयोगका सचिबको हस्ताक्षर</div>

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
