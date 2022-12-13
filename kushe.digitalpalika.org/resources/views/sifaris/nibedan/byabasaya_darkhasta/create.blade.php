

{{--@extends('layouts.main')--}}

{{--@section('title')--}}
{{--    डिजिटल पालिका | सिफारिस--}}
{{--@endsection--}}
{{--@section('custom-css')--}}
{{--    <style>--}}

{{--    </style>--}}

{{--@endsection--}}

{{--@section('content')--}}
{{--<div class="card">--}}
{{--    <div class="card-body">--}}
{{--        <div class="card-header">--}}
{{--            पयसाय दर्ता--}}
{{--        </div>--}}
{{--        <div class="row div-nibedan-date div-nibedan">--}}
{{--            <div class="d-flex flex-nibedan justify-content-end">--}}
{{--                <b>मिति : </b> <input class="input-backgound-textual current-np-date" id="date" name="date" type="text" placeholder="मिति">--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row div-nibedan-address div-nibedan">--}}
{{--            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                <b>श्री</b>--}}
{{--                    <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>ज्यु  </b>--}}
{{--            </div>--}}
{{--            <div class="d-flex flex-nibedan justify-content-start">--}}

{{--                <input class="input-backgound-textual" style="" id="ward_no" name="ward_no" type="text" placeholder="वडा न.">--}}

{{--            </div>--}}
{{--            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}


{{--            </div>--}}

{{--            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="_name" type="text" placeholder="टोल को नाम">--}}
{{--                <b> । </b>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--        <div class="row div-nibedan-title div-nibedan">--}}
{{--            <div class="d-flex flex-nibedan justify-content-center">--}}
{{--                <b>विषय : व्यवसाय दर्ता गर्ने बारे।</b>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row  div-nibedan">--}}
{{--            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                <b>महोदय,</b>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row  div-nibedan">--}}

{{--            <div class="d-flex flex-wrap flex-nibedan justify-content-start">--}}
{{--                <b>--}}
{{--                    <span style="margin-left: 80px">तल लेखिए</span>--}}
{{--                    बमोजिमको व्यापार व्यवसाय गर्न निम्न लिखित नामको व्यवसाय मेरो नाममा दर्ता गराउन ईच्छुक भएकोले दर्ताको लागि आवश्यक भएको कागजातहरु यसै निवेदनसाथ संलग्न गरी यो निवेदन पेश गरेको छु । लेखिएको व्यहोरामा कुनै कुरा झुट्टा ठहरे कानुन बमोजिम सहँला बुझोंला ।--}}
{{--                </b>--}}

{{--                <b> वडा न.</b><input class="input-backgound-textual" style="width: 50px" id="ward_no" name="ward_no" type="text" placeholder="वडा न."><b>निबासी</b>--}}

{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>को बाबु श्री </b><input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>आदिबासी जनजाती अन्तर्गत</b><input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>अन्तर्गत जति भएको व्यहोराको सिफारिस उपलब्ध गराई पऊ यो निबेदन पेस गरेको छु </b>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row div-nibedan">--}}

{{--            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                <b>१. </b><b> व्यवसायको पुरा नाम (नेपालीमा):-</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--            </div>--}}

{{--            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                <b>१. </b><b>व्यवसायको पुरा नाम (अंग्रेजिको ठुलो अक्षरमा) :-</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--            </div>--}}

{{--            <div class="d-flex flex-nibedan flex-wrap justify-content-start">--}}
{{--                <b>३. </b><b> व्यवसायको पुरा ठेगाना :-</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b> जिल्ला </b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>वडा नं</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>टोल</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>फोन नं.</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--            </div>--}}

{{--            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                <b>४.</b><b> व्यवसायमा लगाउने पूँजी रु</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>(अक्षरेपी रु</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>)</b>--}}
{{--            </div>--}}

{{--            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                <b>५.</b><b> व्यवसायको उद्देश्य :-</b>--}}
{{--                <select class="input-backgound-textual" id="paika_name" name="palika_name"  placeholder="पालिकाको नाम">--}}
{{--                    <option>dfasfdsfdafsadfa</option>--}}
{{--                    <option>dfafda</option>--}}
{{--                </select>--}}
{{--            </div>--}}


{{--            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                <b>६.</b><b> व्यवसायले कारोवार गर्ने मुख्य वस्तुको विवरण</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--            </div>--}}

{{--            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                <b>७.</b><b>प्रोप्राइटरको पुरा नाम :-</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>नागरिकता नं.</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>ना.प्र. जारी मिती</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--            </div>--}}

{{--            <div class="d-flex sub-flex-nibedan flex-nibedan flex-wrap justify-content-start">--}}
{{--                <b>स्थायी ठेगाना (नागरिकता अनुसार) :-</b>--}}
{{--                <b> जिल्ला </b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>वडा नं</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>टोल</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>फोन नं.</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}

{{--            </div>--}}

{{--            <div class="d-flex sub-flex-nibedan flex-nibedan flex-wrap justify-content-start">--}}
{{--                <b>हालको ठेगाना:-</b>--}}
{{--                <b> जिल्ला </b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>वडा नं</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>टोल</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}

{{--            </div>--}}

{{--            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                <b>८.</b><b>प्रोप्राइटरको तिन पुस्तेनाम,ठेगाना :-</b>--}}
{{--            </div>--}}

{{--                <div class="d-flex sub-flex-nibedan flex-nibedan justify-content-start">--}}
{{--                    <b>(क) प्रोप्राइटरको बाजेको नाम :-</b>--}}
{{--                    <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                    <b>ठेगाना :-</b>--}}
{{--                    <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                </div>--}}
{{--                <div class="d-flex sub-flex-nibedan flex-nibedan justify-content-start">--}}
{{--                    <b>(ख) प्रोप्राइटरको बाबुको नाम :-</b>--}}
{{--                    <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                    <b>ठेगाना :-</b>--}}
{{--                    <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                </div>--}}
{{--                <div class="d-flex sub-flex-nibedan flex-nibedan justify-content-start">--}}
{{--                    <b>(ग) प्रोप्राइटरको विवाहित महिला भएमा पतिको नाम :-</b>--}}
{{--                    <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                    <b>ठेगाना :-</b>--}}
{{--                    <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                </div>--}}

{{--        </div>--}}


{{--        <div class="row  div-nibedan">--}}
{{--            <div class="row div-nibedan-title div-nibedan">--}}
{{--                <div class="d-flex flex-nibedan justify-content-end">--}}
{{--                    <b style="margin-right: 50px">निवेदक/निबेदिका </b>--}}
{{--                </div>--}}

{{--                <div class="d-flex flex-nibedan flex-nibedan justify-content-end ">--}}
{{--                    <b>प्रोप्राइटरको नाम :</b><input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}

{{--                </div>--}}
{{--                <div class="d-flex flex-nibedan justify-content-end">--}}
{{--                    <b>सही :</b><input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                </div>--}}

{{--                <div class="d-flex flex-nibedan justify-content-end">--}}
{{--                    <table class="table-bordered" style="height: 180px;width: 300px">--}}
{{--                        <thead>--}}
{{--                            <tr>--}}
{{--                                <td class="text-center">--}}
{{--                                    दायाँ--}}
{{--                                </td>--}}
{{--                                <td class="text-center">--}}
{{--                                    बायााँ--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                            <tr>--}}
{{--                                <td>--}}

{{--                                </td>--}}
{{--                                <td>--}}

{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--        <div class="row div-nibedan">--}}
{{--            <div class="d-flex flex-nibedan justify-content-center">--}}
{{--                कबुलियतनामा--}}
{{--            </div>--}}


{{--            <div class="d-flex flex-nibedan flex-wrap justify-content-start">--}}
{{--                <span>--}}
{{--                   <b> लिखितम्‌ </b>--}}
{{--                    <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                    <b>को</b>--}}
{{--                    <select class="input-backgound-textual" id="paika_name" name="palika_name"  placeholder="पालिकाको नाम">--}}
{{--                        <option>नाति</option>--}}
{{--                        <option>dfafda</option>--}}
{{--                    </select>--}}
{{--                    <b>को</b>--}}
{{--                    <select class="input-backgound-textual" id="paika_name" name="palika_name"  placeholder="पालिकाको नाम">--}}
{{--                        <option>छोरा</option>--}}
{{--                        <option>dfafda</option>--}}
{{--                    </select>--}}
{{--                    <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                    <b> बस्ने वर्ष </b>--}}
{{--                    <input class="input-backgound-textual" style="width: 50px" id="ward_no" name="ward_no" type="text" placeholder="वडा न.">--}}
{{--                    <b>को</b>--}}
{{--                    <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                    <b>आगे</b>--}}
{{--                    <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                    <b>--}}
{{--                        को नामले व्यवसाय दर्ता गर्न मैले त्यस वडा कार्यालयमा दरखास्त दिएकोमा उक्त व्यवसाय सम्बन्धमा प्रचलित ऐन कानुन र--}}
{{--                        यस नगरपालिकाको शार्त तथा नियम समेत पालना गरी काम गर्नेछु। सो पालना गर्ने कुरामा कबुलियत समेत गर्न तपाईंको--}}
{{--                        मंजुर छ / छैन भनि वडा कार्यालयबाट सोधनी भएकोमा मेरो चित्त बुझ्यो। यसमा प्रचलित ऐन कानुन र यस नगरपालिकाको शर्त तथा--}}
{{--                        नियम उल्लङघन गरेको देखीएमा ऐन कानुन बमोजिम--}}
{{--                    </b>--}}
{{--                    <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                    <b>वडा नं</b>--}}
{{--                    <input class="input-backgound-textual" style="width: 50px" id="ward_no" name="ward_no" type="text" placeholder="वडा न.">--}}
{{--                    <b>को कार्यालयमा चढाएँ।</b>--}}
{{--                </span>--}}
{{--            </div>--}}


{{--            <div class="d-flex flex-nibedan justify-content-center">--}}
{{--                <b>ईतिसंवत</b>--}}
{{--                <input class="input-backgound-textual" style="width: 50px" id="ward_no" name="ward_no" type="text" placeholder="वडा न.">--}}
{{--                <b>साल </b>--}}
{{--                <input class="input-backgound-textual" style="width: 50px" id="ward_no" name="ward_no" type="text" placeholder="वडा न.">--}}
{{--                <b>महिना </b>--}}
{{--                <input class="input-backgound-textual" style="width: 50px" id="ward_no" name="ward_no" type="text" placeholder="वडा न.">--}}
{{--                <b> गतेरोज </b>--}}
{{--                <input class="input-backgound-textual" style="width: 50px" id="ward_no" name="ward_no" type="text" placeholder="वडा न.">--}}
{{--                <b> शुभम्‌</b>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--        <div class="row div-nibedan">--}}
{{--            <div class="d-flex flex-nibedan justify-content-center">--}}
{{--                (सनाखत सम्बन्धी कागजात)--}}
{{--            </div>--}}

{{--            <div class="d-flex flex-nibedan flex-wrap justify-content-start">--}}
{{--                    <span>--}}
{{--                        <b>यसमा लेखिएको फारम तथा कबुलियतनामा म आफै स्वयं</b>--}}
{{--                        <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                        <b>को</b>--}}
{{--                        <input class="input-backgound-textual" style="width: 50px" id="ward_no" name="ward_no" type="text" placeholder="वडा न.">--}}
{{--                        <b> नं वडा कार्यालयमा उपस्थित भई दर्ता गराएको हुँ । </b>--}}
{{--                        <b> निवेदन सँग संलग्न नागरिकता प्रमाणपत्रको प्रतिलिपी फोटो तथा अन्य कागजातहरु मेरा आफ्नै हुन्‌ । </b>--}}
{{--                        <b>माथी उल्लेखित सम्पुर्ण व्यहोरा समेत साँचो हो । कुनै कुरा फरक परेमा कानुन बमोजिम सहँला बुझौंला भनी सनाखत गर्ने । </b>--}}
{{--                    </span>--}}
{{--            </div>--}}

{{--            <div class="row div-nibedan-title div-nibedan">--}}
{{--                <div class="d-flex flex-nibedan justify-content-end">--}}
{{--                    <b style="margin-right: 50px">प्रोप्राइटरको सही :-</b>--}}
{{--                </div>--}}

{{--                <div class="d-flex flex-nibedan justify-content-end">--}}
{{--                    <b>नाम :</b><input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--        <div class="row div-nibedan">--}}
{{--            <div class="d-flex flex-nibedan justify-content-center">--}}
{{--                (वडा कार्यालयले मात्र भन)--}}
{{--            </div>--}}

{{--            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                <b>श्रीमान्‌</b>--}}
{{--            </div>--}}

{{--            <div class="d-flex flex-nibedan flex-wrap justify-content-start">--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>नामक व्यवसाय</b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <b>--}}
{{--                    को नाममा दर्ता गरी पाउन आवश्यक सबै कागजातहरु रितपुर्वक पेश हुन आएकोले माग बमोजिम दर्ता गरिदिन मनासिव रु--}}
{{--                </b>--}}
{{--                <input class="input-backgound-textual" style="width: 50px" id="ward_no" name="ward_no" type="text" placeholder="वडा न.">--}}
{{--                <b>--}}
{{--                    अक्षरे रु--}}
{{--                </b>--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}

{{--                <b>--}}
{{--                    राजश्व लिई निजको नाममा व्यवसाय दर्ता गरी प्रमाणपत्र दिनको निमित्त निर्णयार्थ पेश गरेको छु ।--}}
{{--                </b>--}}
{{--            </div>--}}


{{--        </div>--}}

{{--        <div class="row div-nibedan">--}}
{{--            <div class="col-md-3">--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <p class="centered_text">--}}

{{--                    पेश गर्ने--}}
{{--                </p>--}}
{{--            </div>--}}

{{--            <div class="col-md-3">--}}
{{--                <input class="input-backgound-textual" id="paika_name" name="palika_name" type="text" placeholder="पालिकाको नाम">--}}
{{--                <p class="centered_text">--}}

{{--                    सदर गर्ने--}}

{{--                </p>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row div-nibedank-detail div-nibedan">--}}
{{--            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                <b style="margin-right: 50px; font-size: 30px">निवेदकको विवरण </b>--}}
{{--            </div>--}}
{{--            <div class="row" >--}}
{{--                <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                    <b style="margin-right: 50px">निवेदकको नाम  </b>--}}
{{--                </div>--}}
{{--                <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                    <input class="input-backgound-textual" style="" id="ward_no" name="ward_no" type="text" placeholder="वडा न.">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row" >--}}
{{--                <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                    <b style="margin-right: 50px">निवेदकको ठेगाना  </b>--}}
{{--                </div>--}}
{{--                <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                    <input class="input-backgound-textual" style="" id="ward_no" name="ward_no" type="text" placeholder="वडा न.">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row" >--}}
{{--                <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                    <b style="margin-right: 50px">निवेदकको फोन न.  </b>--}}
{{--                </div>--}}
{{--                <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                    <input class="input-backgound-textual" style="" id="ward_no" name="ward_no" type="text" placeholder="वडा न.">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row div-nibedan">--}}
{{--            <div class="d-flex flex-nibedan justify-content-center">--}}
{{--                <button>save and print record</button>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
{{--</div>--}}
{{--@endsection--}}

{{--@section('custom-script')--}}

{{--@endsection--}}








@extends('layouts.main')

@section('title')
    डिजिटल पालिका | सिफारिस
@endsection

@section('custom-css')
    <style>
        .error-div
        {
            width: 100%;

        }

        .input-number
        {
            width: 50px
        }

        .margin-left20
        {
            margin-left: 50px;
        }

        .b_title
        {
            margin-right: 50px; font-size: 30px
        }



    </style>

@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{route($view_array['form_store_url'])}}" method="post">
                @csrf
                <div class="card-header">
                    <span class="card-title">{{$view_array['form_title']}}</span>
                </div>

                {{--            मिति--}}
                @foreach($view_array['form_sections'] as $section)
                    <div class="row {{$section['div-class-name']}} div-nibedan">

                        @foreach($section['flex-div']['rows'] as $row)
                            <div class="d-flex flex-wrap flex-nibedan justify-content-{{$section['flex-div']['position']}}">
                                @foreach($row['fields'] as $field)
                                    @if($field['field_type']=='b')
                                        <b class="nibedan-b {{(array_key_exists('class',$field) ? $field['class']:'')}}">{{$field['content']}} </b>
                                    @endif

                                    @if($field['field_type']=='input')

                                        <input class="input-text {{(array_key_exists('class',$field) ? $field['class']:'')}}" id="{{$field['name']}}" name="{{$field['name']}}" type="text" placeholder="{{$field['placeholder']}}" value="{{old($field['name'])}}">
                                        <span class="text-danger " id="error_{{$field['name']}}">@error($field['name'])({{$message}})@enderror</span>
                                    @endif

                                    @if($field['field_type']=='select')
                                        <select class="input-text{{$field['class']}}" name="{{$field['name']}}">

                                            <option></option>
                                            @foreach($field['options'] as $option)
                                                <option value="{{$option}}" {{ (old($field['name'])==$option) ? "selected": ""}}>{{$option}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger " id="error_{{$field['name']}}">@error($field['name'])({{$message}})@enderror</span>
                                    @endif
                                    @if($field['field_type']=='file')
                                        @if($field['file_display']=='dynamic')
                                            <div class="kagajpatra">
                                            </div>
                                            <br><div class="d-flex flex-nibedan justify-content-end">
                                                <button  id="add_kagajpatra" class="btn_palika" type="button" data-kagajpatra_no="0" style="align-self: flex-end;"> कागज पत्र थप्नुहोस </button>
                                            </div>
                                        @endif
                                        <span class="text-danger " id="error_{{$field['name']}}">@error($field['name'])({{$message}})@enderror</span>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <div class="row div-nibedank-detail div-nibedan">
                    <div class="d-flex flex-nibedan justify-content-center">
                        <button class="btn_palika" type="submit">save and print record</button>
                    </div>
                </div>
            </form>
        </div>
    </div>



@endsection


@section('custom-script')
    <script>
        @if(!$errors->isEmpty())
        @foreach(\GuzzleHttp\json_decode($errors) as $key=>$error)
        {{--                 {{$error[0]}}--}}
        $('#{{$key}}').addClass('error-input');
        @endforeach
        @endif

        $('.error-input').click(function () {
            $(this).removeClass('error-input');
            var name=$(this).attr('name');
            $('#error_'+name).html('');

        });
    </script>




    <script>
        $('#add_kagajpatra').click(function () {
            var kagajpatra_no=$(this).data('kagajpatra_no');
            $('.kagajpatra').append(
                '<div id="'+kagajpatra_no+'" class="file_upload_div">\n' +
                '                            <div class="d-flex flex-nibedan justify-content-start">\n' +
                '                                <img class="remove_kagajpatra" data-kagajpatra_no="'+kagajpatra_no+'" src="{{asset("icons/nibedan/remove.png")}}" height="25px" width="25px"/>\n' +
                '                                <b class="nibedan-b"> कागज पत्र :-</b>\n' +
                '                            </div>\n' +
                '\n' +
                '                            <div>\n' +
                '                                <div class="d-flex flex-nibedan justify-content-end">\n' +
                '\n' +
                '                                    <input  class="input-text" style="width:100%;" id="nibedan_document_file_title" name="nibedan_document_file_title[]" type="text" placeholder="कागज पत्र विवरण">\n' +
                '                                    '+

                '                                </div>\n' +
                '                                <div class="">\n' +
                '                                    <input required class="document_file" id="nibedan_document_file'+kagajpatra_no+'" name="nibedan_document_file" type="file" data-id="'+kagajpatra_no+'">\n' +
                '                                       <input id="uploaded_file_name'+kagajpatra_no+'" name="uploaded_file_names[]" value="" hidden>'+
                '                                </div>\n' +
                '                            </div>\n' +
                '</div>'
            )


            // Get a reference to the file input element
            const inputElement = document.querySelector('input[id="nibedan_document_file'+kagajpatra_no+'"]');
            // Create a FilePond instance
            const pond = FilePond.create(inputElement);
            FilePond.setOptions({
                server:
                    {
                        url:"{{route('file.upload')}}",
                        headers:{
                            'X-CSRF-TOKEN':'{{csrf_token()}}'
                        },
                        process: {
                            onload: (res) => {

                                // select the right value in the response here and return
                                // var file_name_list=$('#uploaded_file_names').val();
                                // if(file_name_list=="")
                                // {
                                //     file_name_list=res;
                                // }
                                // else {
                                //     file_name_list=file_name_list+','+res;
                                // }
                                // $('#uploaded_file_names').attr('value',file_name_list);
                                $('#uploaded_file_name'+kagajpatra_no).attr('value',res);
                                // console.log(kagajpatra_no)

                            }
                        }
                    }
            });


            $(this).data('kagajpatra_no',kagajpatra_no+1);
        })

        $(document).on('click','.remove_kagajpatra',function () {
            $('#'+$(this).data('kagajpatra_no')).remove();
        })
        $(document).on('input','.input-text',function () {
            $('.error-div').html('');
        })
    </script>


    <script>

        // $(document).on('change','.document_file',function () {
        //     // Get a reference to the file input element
        //     console.log('input[id="nibedan_document_file'+$(this).data('id')+'"]')
        //     const inputElement = document.querySelector('input[id="nibedan_document_file'+$(this).data('id')+'"]');
        //     // Create a FilePond instance
        //
        //     const pond = FilePond.create(inputElement);
        //
        //
        //
        //
        //
        // })


        document.addEventListener('FilePond:removefile', (e) => {
            console.log('FilePond ready for use', e.detail);

        });


    </script>
@endsection
