@extends('layouts.main')
@section('title')
डिजिटल पालिका | गाउँपालिका/नगरपालिका
@endsection
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
                    <div class="main-img">
                        <div class="d-flex justify-content-center">
                            <img alt="Bootstrap Image Preview"  style="position: absolute;margin-top:160px;width:150px;height:150px" src="https://files.structurae.net/files/photos/1/the_karnali_bridge.jpg" class="rounded-circle" />
                        </div>
                        <div class="img-container" style="height: 250px;
                        overflow-y: hidden;
                        margin-bottom:20px;

                        border-radius: 20px 20px 0 0">

                            <img alt="Bootstrap Image Preview" class="img-fluid w-100" style="margin-top: -93px"  src="https://photographylife.com/wp-content/uploads/2015/07/DSC0476-2.jpg" />

                        </div>

                    </div>
					<div class="row py-5" >
                        <div class="col-md-6">
							<dl class="text-center">
                                <dt>
                                     गाउँपालिका/नगरपालिको  नाम
                                </dt>
                                <dd>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                      </svg>
                                      {{-- {{$palika_parichaya[0]->dp_gn_name}} --}}
                                       कर्णाली गाउँपालिका
                                </dd>
                                <dt>
                                    गाउँपालिका/नगरपालिको  ठाउँ
                                </dt>
                                <dd>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                      </svg>
                                      29.3863° N, 82.3886° E
                                      {{-- {{$palika_parichaya[0]->dp_gn_lat}} --}}

                                    </dd>
                                <dt>
                                    गाउँपालिका/नगरपालिको नाम इतिहास
                                </dt>
                                <dd>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                      </svg>
                                      कर्णाली नेपालको पुरानो सभ्यता हो र यो कर्णाली नदीसँग जोडिएको छ।
                                      {{-- {{$palika_parichaya[0]->dp_gn_history}} --}}

                                </dd>

                                <dt>
                                    गाउँपालिका/नगरपालिको धर्म
                                </dt>
                                <dd>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                      </svg>
                                      95.34% मानिसहरूले मस्तो-हिन्दू भनेर चिनाउने गरी हिन्दू धर्म/मस्तोवाद प्रान्तमा सबैभन्दा धेरै पालना गरिएको धर्म हो।
                                      {{-- {{$palika_parichaya[0]->dp_gn_religion}} --}}

                                </dd>
                                <dt>
                                    गाउँपालिका/नगरपालिको संस्कृति				</dt>
                                <dd>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                      </svg>
                                      खस आर्य क्षेत्री, कामी, ठकुरी र बाहुन जनसंख्याको साथ प्रान्तको सबैभन्दा ठूलो जातीय-भाषिक आदिवासी समूह हो।
                                      {{-- {{$palika_parichaya[0]->dp_gn_culture}} --}}

                                </dd>
                                <dt>
                                    गाउँपालिका/नगरपालिको वास्तुकला
                                </dt>
                                <dd>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                      </svg>
                                      कर्णाली पुल, असममित, एकल टावर, केबल स्टेड ब्रिज नेपालमा यसको प्रकारको दोस्रो सबैभन्दा लामो पुल हो र अन्तर्राष्ट्रिय सहयोगद्वारा निर्माण गरिएको हो।
                                      {{-- {{$palika_parichaya[0]->dp_gn_architecture}} --}}

                                </dd>

                                <dt>
                                    गाउँपालिका/नगरपालिको शिक्षा
                                </dt>
                                <dd>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                      </svg>
                                      पछिल्लो तथ्यांकले कर्णाली प्रदेशको साक्षरता दर राष्ट्रिय औसत ६५.९५ प्रतिशतको तुलनामा ५८.२५ प्रतिशत रहेको देखाएको छ ।
                                      {{-- {{$palika_parichaya[0]->dp_gn_education}} --}}

                                </dd>
						</div>
						<div class="col-md-6">
							<dl class="text-center">



                                <dt>
                                    गाउँपालिका/नगरपालिको स्वास्थ्य सेवा
                                </dt>
                                <dd>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                      </svg>
                                      कर्णाली प्रदेशमा १२ अस्पताल, १३ प्राथमिक स्वास्थ्य केन्द्र र ३ सय ३६ स्वास्थ्य चौकी रहेका छन् ।
                                      {{-- {{$palika_parichaya[0]->dp_gn_healthcare}} --}}

                                </dd>
                                <dt>
                                    गाउँपालिका/नगरपालिको यातायात
                                </dt>
                                <dd>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                      </svg>
                                      कर्णाली राजमार्ग (नेपाली: कर्णाली राजमार्ग, जसलाई H13 पनि भनिन्छ) एक राजमार्ग हो, र नेपालको दुई क्षेत्रहरू बीचको महत्त्वपूर्ण यातायात लिंक हो।
                                      {{-- {{$palika_parichaya[0]->dp_gn_transport}} --}}

                                </dd>
                                <dt>
                                    गाउँपालिका/नगरपालिको सीमा
                                </dt>
                                <dd>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                      </svg>
                                      २७,९८४ किलोमिटर
                                      {{-- {{$palika_parichaya[0]->dp_gn_boundary}} --}}

                                </dd>
                                <dt>
                                    गाउँपालिका/नगरपालिको शहर दृश्य
                                </dt>
                                <dd>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                      </svg>
                                      कर्णाली नेपालको पुरानो सभ्यता हो र यो कर्णाली नदीसँग जोडिएको छ।
                                      {{-- {{$palika_parichaya[0]->dp_gn_city_scape}} --}}

                                </dd>
                                <dt>
                                    गाउँपालिका/नगरपालिको पर्यटन क्षेत्र
                                </dt>
                                <dd>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                      </svg>
                                      डोल्पाको शे-फोक्सुण्डो राष्ट्रिय निकुञ्ज, जुम्लाको सिञ्जा सार्वजनिक, मुगुको रारा ताल, पञ्चकोशी ज्वाला क्षेत्र र सुर्खेतको काक्रेविहार, देउतीबजाई र मदन आश्रित पार्क स्थापना र प्रवर्द्धन गर्नुपर्ने गन्तव्यमा पर्छन्।

                                      {{-- {{$palika_parichaya[0]->dp_gn_tourism_area}} --}}

                                </dd>
                                <dt>
                                    गाउँपालिका/नगरपालिको जनसंख्या।
                                </dt>
                                <dd>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8z"/>
                                      </svg>
                                      सोह्र लाख चौरानब्बे हजार आठ सय उनान्नब्बे।
                                      {{-- {{$palika_parichaya[0]->dp_gn_population}} --}}

                                </dd>
                            </dl>
                            </dl>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

{{-- <div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
		</div>

		<div class="col-md-8">
			<h3 class="text-center">



                पालिका पत्र जानकारी			</h3>
			<dl>
				<dt>
                    गाउँपालिका/नगरपालिको  नाम
				</dt>
				<dd>
                    {{$palika_parichaya[0]->dp_gn_name}}
                </dd>
                <dt>
                    गाउँपालिका/नगरपालिको  ठाउँ
				</dt>
				<dd>
                    {{$palika_parichaya[0]->dp_gn_lat}}

                    </dd>
				<dt>
                    गाउँपालिका/नगरपालिको नाम इतिहास
				</dt>
				<dd>
                    {{$palika_parichaya[0]->dp_gn_history}}

                </dd>

				<dt>
                    गाउँपालिका/नगरपालिको धर्म
				</dt>
				<dd>
                    {{$palika_parichaya[0]->dp_gn_religion}}

				</dd>
				<dt>
                    गाउँपालिका/नगरपालिको संस्कृति				</dt>
				<dd>
                    {{$palika_parichaya[0]->dp_gn_culture}}

				</dd>
                <dt>
                    गाउँपालिका/नगरपालिको वास्तुकला
                </dt>
                <dd>
                    {{$palika_parichaya[0]->dp_gn_architecture}}

                </dd>
                <dt>
                    गाउँपालिका/नगरपालिको शहर दृश्य
                </dt>
                <dd>
                    {{$palika_parichaya[0]->dp_gn_city_scape}}

                </dd>
                <dt>
                    गाउँपालिका/नगरपालिको पर्यटन क्षेत्र
                </dt>
                <dd>
                    {{$palika_parichaya[0]->dp_gn_tourism_area}}

                </dd>
                <dt>
                    गाउँपालिका/नगरपालिको जनसंख्या
                </dt>
                <dd>
                    {{$palika_parichaya[0]->dp_gn_population}}

                </dd>
                <dt>
                    गाउँपालिका/नगरपालिको शिक्षा
                </dt>
                <dd>
                    {{$palika_parichaya[0]->dp_gn_education}}

                </dd>
                <dt>
                    गाउँपालिका/नगरपालिको स्वास्थ्य सेवा
                </dt>
                <dd>
                    {{$palika_parichaya[0]->dp_gn_healthcare}}

                </dd>
                <dt>
                    गाउँपालिका/नगरपालिको यातायात
                </dt>
                <dd>
                    {{$palika_parichaya[0]->dp_gn_transport}}

                </dd>
                <dt>
                    गाउँपालिका/नगरपालिको सीमा
                </dt>
                <dd>
                    {{$palika_parichaya[0]->dp_gn_boundary}}

                </dd>
			</dl>
		</div>
	</div>
</div> --}}
@endsection
