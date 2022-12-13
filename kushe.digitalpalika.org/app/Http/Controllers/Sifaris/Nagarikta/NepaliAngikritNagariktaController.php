<?php

namespace App\Http\Controllers\Sifaris\Nagarikta;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sifaris\SifarisAbstractController;
use App\Models\Sifaris\Nagarikta\NepaliAngikritNagarikta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Krishnahimself\DateConverter\DateConverter;
use Yajra\DataTables\DataTables;

class NepaliAngikritNagariktaController extends SifarisAbstractController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->model=new NepaliAngikritNagarikta();
        $this->setViewArray(
            array(
                'form_store_url'=>'nepali-angikrit-nagarikta.store',
                'form_update_url'=>'nepali-angikrit-nagarikta.update',
                'form_destroy_url'=>'nepali-angikrit-nagarikta.destroy',
                'back_url'=>'nepali-angikrit-nagarikta.index',
                'form_title'=>'नेपाली अंगीकृत नागरिकताको प्रमाण-पत्र ।',


                'create_page_url'=>'nepali-angikrit-nagarikta.create',
                'index_page_url'=>'nepali-angikrit-nagarikta.index',
                'show_page_url'=>'nepali-angikrit-nagarikta.show',
                'form_edit_url'=>'nepali-angikrit-nagarikta.edit',
                'default_view_url'=>'nepali-angikrit-nagarikta.default',
                'pdf_view_url'=>'nepali-angikrit-nagarikta.pdf',
                'index_table_title'=>array(
                    'id'=>'ID',
                    'applicant_name_bibaran'=>'निवेदकको नाम',
                    'applicant_address_bibaran'=>'निवेदकको ठेगाना',
                    'applicant_citizenship_number'=>'निवेदकको नागरिकता नं.',
                    'applicant_phone_number'=>'निवेदकको फोन न.',
                    'applied_date'=>'सिफारिस मिती',
                    'actions'=>'actions'
                ),

                'form_sections'=>array(


                    [
                        'div-class-name'=>'margin-top3',
                        'flex-div'=>array(
                            'position'=>'center',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'अनुसूची-७'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'(नियम ५ को उपनियम (१) र नियम ७ को उपनियम (१), (२) र (५) सँग सम्बन्धित)'],

                                    )
                                ],
                            )
                        )
                    ],
                    [
                        'div-class-name'=>'margin-top3',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'श्री प्रमुख जिल्ला अधिकारी,'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'श्री प्रमुख जिल्ला अधिकारी,'],
                                        ['field_type'=>'input','class'=>'','name'=>'district_office_address','placeholder'=>'','validation'=>'required|string|max:191'],

                                    )
                                ],
                            )
                        )
                    ],




                    [
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'center',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'विषय :- नेपाली नागरिकताको प्रमाणपत्र पाउँ ।
'],
                                    )
                                ],

                            )
                        )
                    ],
                    [
                        'div-class-name'=>'margin-top3',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'महोदय,'],
                                    )
                                ],

                            )
                        )
                    ],


                    [
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'मैले नेपाल नागरिकता ऐन २०६३ को दफा ५ बमोजिमको शर्त तथा अवस्था परा गरिसकेकोले नेपाली नागरिक'],
                                        ['field_type'=>'select','class'=>'','name'=>'citizenship_according_to','placeholder'=>'','option_type'=>'static','options'=>['को छोर'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'को हैसियतले नेपालको अंगीकत नागरिकताको प्रमाणपत्र पाउनको लागि देहायको विवरण खोलि सिफारिस साथ रु १०/- को टिकट टाँसी यो निवेदनपत्र पेश गरेको छु।'],

                                    )
                                ],

                            )
                        )
                    ],
                    [
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'१. मेरो विवरण :-‌'],

                                    )
                                ],

                            )
                        )
                    ],

                    [
                        'div-class-name'=>'margin-top3',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'(क) पूरा नाम, थर :-'],
                                        ['field_type'=>'input','class'=>'','name'=>'person_full_name','placeholder'=>'पूरा नाम, थर','validation'=>'required|string|max:191'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'(ख) जन्मस्थान :-'],
                                        ['field_type'=>'input','class'=>'','name'=>'person_birth_place','placeholder'=>'जन्मस्थान','validation'=>'required|string|max:191'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'(ग) जन्म मिति :-'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'person_birth_year','placeholder'=>'साल','validation'=>'required|np_integer'],
                                        ['field_type'=>'span','content'=>' साल '],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'person_birth_month','placeholder'=>'महिना','validation'=>'required|np_integer'],
                                        ['field_type'=>'span','content'=>' महिना '],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'person_birth_day','placeholder'=>'गते','validation'=>'required|np_integer'],
                                        ['field_type'=>'span','content'=>' गते '],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'(घ) पुरा गरेको उमेर :-'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'person_age','placeholder'=>'उमेर','validation'=>'required|np_integer'],

                                    )
                                ],


                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'(ङ) लिङ्ग :-'],
                                        ['field_type'=>'select','class'=>'','name'=>'person_gender_type','placeholder'=>'','option_type'=>'static','options'=>['पुरुष'],'validation'=>'required|string|max:191'],

                                    )
                                ],

                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'(ब) धर्म :-'],
                                        ['field_type'=>'input','class'=>'','name'=>'person_religion','placeholder'=>'धर्म','validation'=>'required|string|max:191'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'(छ) बाबुको :- '],


                                    )
                                ],

                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                        ['field_type'=>'span','content'=>'(क) नाम, थर:-'],
                                        ['field_type'=>'input','class'=>'','name'=>'father_full_name','placeholder'=>'नाम, थर','validation'=>'required|string|max:191'],

                                    )
                                ],

                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                        ['field_type'=>'span','content'=>'(ख) ठेगाना :-'],
                                        ['field_type'=>'input','class'=>'','name'=>'father_address','placeholder'=>'ठेगाना','validation'=>'required|string|max:191'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                        ['field_type'=>'span','content'=>'(ग) नागरिकता :-'],
                                        ['field_type'=>'input','class'=>'','name'=>'father_citizenship_no','placeholder'=>'नागरिकता','validation'=>'required|string|max:191'],

                                    )
                                ],


                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'(ज) आमाको :- '],


                                    )
                                ],

                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                        ['field_type'=>'span','content'=>'(क) नाम, थर:-'],
                                        ['field_type'=>'input','class'=>'','name'=>'mother_full_name','placeholder'=>'नाम, थर','validation'=>'required|string|max:191'],

                                    )
                                ],

                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                        ['field_type'=>'span','content'=>'(ख) ठेगाना :-'],
                                        ['field_type'=>'input','class'=>'','name'=>'mother_address','placeholder'=>'ठेगाना','validation'=>'required|string|max:191'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                        ['field_type'=>'span','content'=>'(ग) नागरिकता :-'],
                                        ['field_type'=>'input','class'=>'','name'=>'mother_citizenship_no','placeholder'=>'नागरिकता','validation'=>'required|string|max:191'],

                                    )
                                ],




                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'(झ) पतिको :-'],


                                    )
                                ],

                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                        ['field_type'=>'span','content'=>'(क) नाम, थर:-'],
                                        ['field_type'=>'input','class'=>'','name'=>'husband_full_name','placeholder'=>'नाम, थर','validation'=>'string|max:191'],

                                    )
                                ],

                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                        ['field_type'=>'span','content'=>'(ख) ठेगाना :-'],
                                        ['field_type'=>'input','class'=>'','name'=>'husband_address','placeholder'=>'ठेगाना','validation'=>'string|max:191'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                        ['field_type'=>'span','content'=>'(ग) नागरिकता :-'],
                                        ['field_type'=>'input','class'=>'','name'=>'husband_citizenship_no','placeholder'=>'नागरिकता','validation'=>'string|max:191'],

                                    )
                                ],


                            )
                        )
                    ],


                    [
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'२. नेपालमा बसोवास गरेको वर्ष :-‌'],

                                    )
                                ],

                            )
                        )
                    ],

                    [
                        'div-class-name'=>'margin-top3',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'(क) नेपाली नागरिकको छोरा वा छोरीको हकमा :-'],


                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                        ['field_type'=>'span','content'=>'१) पिताको राष्ट्रियता :-'],
                                        ['field_type'=>'input','class'=>'','name'=>'nepali_citizen_child_father_nationality','placeholder'=>' पिताको राष्ट्रियता','validation'=>'required|string|max:191'],

                                    )
                                ],

                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                        ['field_type'=>'span','content'=>'२) पिताको मुलुकबाट नागरिकता प्रमाणपत्र लिए नलिएको निस्सा :-'],
                                        ['field_type'=>'radio','class'=>'','name'=>'nepali_citizen_child_father_citizenship_taken','options'=>['(क) लिएको','(ख) नलिएको'],'validation'=>'required|string|max:191'],

                                    )
                                ],



                            )
                        )
                    ],

                    [
                        'div-class-name'=>'margin-top3',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'(ख) नेपाली नागरिकसंग वैवाहिक सम्बन्ध भएको विदेशी महिलाको हकमा :-'],


                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                        ['field_type'=>'span','class'=>'margin-left20','content'=>'(श्री'],
                                        ['field_type'=>'input','class'=>'','name'=>'nepali_husband_full_name','placeholder'=>'नाम','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'सँग विवाह भएको मिती) :-'],
                                        ['field_type'=>'input','class'=>'date-picker','name'=>'nepali_husband_married_date','placeholder'=>'मिती','validation'=>'required|string|max:191'],

                                    )
                                ],





                            )
                        )
                    ],
                    [
                        'div-class-name'=>'margin-top3',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'(ग) अरु विदेशीको हकमा (कम्तिमा पन्ध्र वर्ष):-'],

                                        ['field_type'=>'input','class'=>'','name'=>'bideshihakwala','placeholder'=>'','validation'=>'required|string|max:191'],

                                    )
                                ],





                            )
                        )
                    ],



                    [
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'३. नेपालमा बसोवास गरेको ठाउँ र मिती :-
'],

                                    )
                                ],

                            )
                        )
                    ],

                    [
                        'div-class-name'=>'margin-top3',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'','content'=>'(क) जिल्ला :-'],
                                        ['field_type'=>'input','class'=>'','name'=>'lived_in_nepal_district','placeholder'=>'जिल्ला','validation'=>'required|string|max:191'],
                                        ['field_type'=>'select','class'=>'','name'=>'lived_in_nepal_palika_type','option_type'=>'static','options'=>['गाउँपालिका'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'lived_in_nepali_palika','placeholder'=>'','validation'=>'required|string|max:191'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                        ['field_type'=>'span','class'=>'','content'=>'वडा नं. :-'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'lived_in_nepal_ward_no','placeholder'=>'वडा नं.','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','class'=>'','content'=>'टोल । गाउँ :-'],
                                        ['field_type'=>'input','class'=>'','name'=>'lived_in_nepal_tol','placeholder'=>'','validation'=>'required|string|max:191'],

                                    )
                                ],

                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                        ['field_type'=>'span','class'=>'','content'=>'District :-'],
                                        ['field_type'=>'input','class'=>'','name'=>'lived_in_nepal_district_en','placeholder'=>'District','validation'=>'required|string|max:191'],
                                        ['field_type'=>'select','class'=>'','name'=>'lived_in_nepal_palika_type_en','option_type'=>'static','options'=>['rural-municipality'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'lived_in_nepali_palika_en','placeholder'=>'','validation'=>'required|string|max:191'],

                                    )
                                ],

                                [
                                    'fields'=>array(

                                        ['field_type'=>'span','class'=>'','content'=>'(ख) खण्ड (क) मा लेखिएको स्थानमा आई अटुट रुपमा बसेको मिति :-'],
                                        ['field_type'=>'input','class'=>'date-picker','name'=>'lived_in_nepal_continuous_from_date','placeholder'=>'मिति','validation'=>'required|string|max:191'],


                                    )
                                ],




                            )
                        )
                    ],


                    [
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'४. हाल साथमा रहेको परिवारको विवरण र संख्या :-'],

                                    )
                                ],

                            )
                        )
                    ],

                    [
                        'div-class-name'=>'margin-top3',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(


                                [
                                    'fields'=>array(

                                        ['field_type'=>'span','class'=>'','content'=>'(क) छोरा'],


                                    )
                                ],

                                [
                                    'fields'=>array(
                                        [
                                            'field_type'=>'custom_field',
                                            'view'=>'sifaris.pages.custom_views.nagarikta.angikrit_nagarikta_add_son_table',
                                            'js'=>'',
                                            'css'=>''
                                        ],

                                    )
                                ],

                                [
                                    'fields'=>array(

                                        ['field_type'=>'span','class'=>'','content'=>'(ख) छोरी'],


                                    )
                                ],

                                [
                                    'fields'=>array(
                                        [
                                            'field_type'=>'custom_field',
                                            'view'=>'sifaris.pages.custom_views.nagarikta.angikrit_nagarikta_add_daughter_table',
                                            'js'=>'sifaris.pages.custom_views.nagarikta.js.js',
                                            'css'=>''
                                        ],

                                    )
                                ],



                                [
                                    'fields'=>array(

                                        ['field_type'=>'span','class'=>'','content'=>'(ग) पति / पत्नी'],


                                    )
                                ],

                                [
                                    'fields'=>array(
                                        [
                                            'field_type'=>'custom_field',
                                            'view'=>'sifaris.pages.custom_views.nagarikta.angikrit_nagarikta_add_husband_wife_table',
                                            'js'=>'sifaris.pages.custom_views.nagarikta.js.js',
                                            'css'=>''
                                        ],

                                    )
                                ],



                            )
                        )
                    ],


                    [
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'५. मैले नेपाली वा नेपालमा प्रचलित'],
                                        ['field_type'=>'input','name'=>'language_can_talk_write','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'भाषा बोल्न र लेख्न जानेको छु'],

                                    )
                                ],

                            )
                        )
                    ],


                    [
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'६. मेरो जीवन निर्वाह गर्ने :-'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'','content'=>'(क) साधन :-'],
                                        ['field_type'=>'input','name'=>'to_live_sadhan','validation'=>'required|string|max:191','placeholder'=>'साधन'],

                                        ['field_type'=>'span','class'=>'','content'=>'(ख) योग्यता :-'],
                                        ['field_type'=>'input','name'=>'to_live_qualification','validation'=>'required|string|max:191','placeholder'=>'योग्यता'],

                                        ['field_type'=>'span','class'=>'','content'=>'(ग) हालको व्यवसाय :-'],
                                        ['field_type'=>'input','name'=>'to_live_current_business','validation'=>'required|string|max:191','placeholder'=>'व्यवसाय'],

                                    )
                                ],

                            )
                        )
                    ],

                    [
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'७. विदेशी मुलुकको नागरिकता नलिएको वा त्यागेको वा त्याग्न कारवाही चलाएको विवरण :-'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'','content'=>'(क) म पहिले नागरिक रहेको विदेशी मुलुकको नाम :-'],
                                        ['field_type'=>'input','name'=>'previous_country_name','validation'=>'required|string|max:191','placeholder'=>'पहिलेको मुलुकको नाम'],




                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'','content'=>'(ख) खण्ड (क) मा लेखिएको मुलुकको नागरिकता नलिएको वा सो मूलुकको कानुन बमोजिम मिति'],
                                        ['field_type'=>'input','class'=>'date-picker','name'=>'previous_country_abandoned_date','validation'=>'required|string|max:191','placeholder'=>'मिति'],
                                        ['field_type'=>'span','class'=>'','content'=>'मा त्यगिसकेको वा त्याग्न कारवाही चलाएको ।'],

                                    )
                                ],
                                [
                                    'fields'=>array(


                                        ['field_type'=>'span','class'=>'','content'=>'(ग) खण्ड (क) मा लसिएका मृतकका नागरिकता टालसमा नलिएका छा आागिसकका बा साझ कारयाडौ बजाएको पिताउकका निस्सा नेपाल सरकारलाई मिति'],
                                        ['field_type'=>'input','class'=>'date-picker','name'=>'previous_country_abandoned_nissa_submitted_date','validation'=>'required|string|max:191','placeholder'=>'मिति'],
                                        ['field_type'=>'span','class'=>'','content'=>'मा दिएको। त्यसरी दिएको निस्साको प्रतिलिपि यसै साध संलग्न छ।'],



                                    )
                                ],

                            )
                        )
                    ],

                    [
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'८. मैले नैतिक पतन देखिने कुनै फौजदारी मुद्दामा सजाय पाएको छैन। मैले माथि लेखिदिएको व्यहोरा ठीक साँचो हो। भूल ठहरेमा कानून बमोजिम सहुँला बुझाउँला।'],

                                    )
                                ],


                            )
                        )
                    ],
                    [
                        'div-class-name'=>'margin-top-10',
                        'flex-div'=>array(
                            'position'=>'start',
                            'cols'=>array(
                                [
                                    'col_no'=>'4',
                                    'rows'=>array(
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'span','content'=>'मिति :-'],
                                                ['field_type'=>'input','class'=>'date-picker','name'=>'applied_date','validation'=>'required|string|max:191','placeholder'=>'मिति'],

                                            )
                                        ],
                                        [
                                            'fields'=>array(

                                                ['field_type'=>'table','table_title'=>['दायाँ','बाया'],'row_num'=>'1','table_class'=>'width300 float-left','td_class'=>'height150'],

                                            )
                                        ],


                                    )
                                ],
                                [
                                    'col_no'=>'4',
                                    'rows'=>array(
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'span','class'=>'','content'=>'.'],

                                            )
                                        ],
                                    )
                                ],

                                [
                                    'col_no'=>'4',
                                    'rows'=>array(
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'span','class'=>'','content'=>'भवदिय,'],

                                            )
                                        ],
                                        [
                                            'fields'=>array(

                                                ['field_type'=>'span','content'=>'निवेदकको दस्तखत'],
                                                ['field_type'=>'input','name'=>'applicant_signature','validation'=>'required|string|max:191','placeholder'=>'दस्तखत'],
                                            )
                                        ],


                                    )
                                ],


                            )
                        )
                    ],
                    [
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'center',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'गाउँपालिका को सिफारिस'],

                                    )
                                ],

                            )
                        )
                    ],

                    [
                        'div-class-name'=>'margin-top-10',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'input','name'=>'sifaris_birth_country','validation'=>'required|string|max:191','placeholder'=>'देशको नाम'],
                                        ['field_type'=>'span','class'=>'','content'=>'देशमा जन्म भई'],

                                        ['field_type'=>'input','name'=>'sifaris_palika_name','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'select','class'=>'','name'=>'sifaris_palika_type','option_type'=>'static','options'=>['गाउँपालिका'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'sifaris_ward_no','validation'=>'required|np_integer','placeholder'=>''],

                                        ['field_type'=>'span','class'=>'','content'=>'नं. वडा'],
                                        ['field_type'=>'input','name'=>'sifaris_tol_name','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'span','class'=>'','content'=>'मा स्थायी बसोबास गर्दै आएको यसमा लेखिएको श्री'],

                                        ['field_type'=>'input','name'=>'sifaris_father_name','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'span','class'=>'','content'=>'को'],
                                        ['field_type'=>'select','class'=>'','name'=>'sifaris_child_type','option_type'=>'static','options'=>['छोरा'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','class'=>'','content'=>'वर्ष'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'sifaris_age','validation'=>'required|np_integer','placeholder'=>''],
                                        ['field_type'=>'span','class'=>'','content'=>'को'],
                                        ['field_type'=>'select','class'=>'','name'=>'sifaris_person_abbreviation','option_type'=>'static','options'=>['श्री'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','name'=>'sifaris_person_name','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'span','class'=>'','content'=>'लाई म राम्ररी चिन्दछु। उपर्युक्त लेखिए बमोजिमको निजको व्यहोरा मैले जाने बुझेसम्म साँचो हो। झठ्ठा ठहरे कानुन् बमोजिम सहुँला बुझाउँला।'],



                                    )
                                ],

                            )
                        )
                    ],

                    [
                        'div-class-name'=>'margin-top-10',
                        'flex-div'=>array(
                            'position'=>'start',
                            'cols'=>array(


                                [
                                    'col_no'=>'4',
                                    'rows'=>array(
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'span','content'=>'मिति :-'],
                                                ['field_type'=>'input','class'=>'date-picker','name'=>'sifaris_applied_date','validation'=>'required|string|max:191','placeholder'=>'मिति'],

                                            )
                                        ],
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'span','class'=>'','content'=>'कार्यालयको नाम र छाप'],
                                                ['field_type'=>'input','name'=>'sifaris_body_stamp_palika_name','validation'=>'required|string|max:191','placeholder'=>'गाउँपालिकाको नाम'],
                                            )
                                        ],


                                    ),
                                ],
                                [
                                    'col_no'=>'4',
                                    'rows'=>array(
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'span','class'=>'','content'=>'.'],

                                            )
                                        ],
                                    )
                                ],
                                [
                                    'col_no'=>'4',
                                    'rows'=>array(
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'span','content'=>'निवेदक/निबेदिका'],

                                            )
                                        ],
                                        [
                                            'fields'=>array(

                                                ['field_type'=>'span','content'=>'दस्तखत'],
                                                ['field_type'=>'input','name'=>'sifaris_garne_signature','validation'=>'required|string|max:191','placeholder'=>''],
                                            )
                                        ],
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'span','content'=>'नाम/थर'],
                                                ['field_type'=>'input','name'=>'sifaris_garne_full_name','validation'=>'required|string|max:191','placeholder'=>'नाम/थर'],

                                            )
                                        ],

                                        [
                                            'fields'=>array(

                                                ['field_type'=>'span','content'=>'पद'],

                                                ['field_type'=>'select','class'=>'','name'=>'sifaris_garne_post','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['प्रबन्धक']],
                                            )
                                        ]

                                    )
                                ],


                            )
                        )
                    ],


                    [
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'center',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'अनुसूची'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'(डफा ५.को उपदफा (६) सँग सम्बन्धित)'],

                                    )
                                ],

                            )
                        )
                    ],

                    [
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(

                                        ['field_type'=>'span','class'=>'','content'=>'म'],
                                        ['field_type'=>'input','name'=>'oath_person_name','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'span','class'=>'','content'=>'ईश्वरको नाममा शपथ लिन्छु कि सत्य निष्ठापूर्वक प्रतिज्ञा गर्दछु कि नेपाल राज्य, प्रचलित संविधान र कानुन प्रति वफादार रही श्रद्धा एवं निष्ठापूर्वक नेपाली नागरिकको रुपमा आफ्नो कर्तव्य पालना गर्ने छु।'],

                                    )
                                ],

                            )
                        )
                    ],


                    [
                        'div-class-name'=>'margin-top-10',
                        'flex-div'=>array(
                            'position'=>'start',
                            'cols'=>array(


                                [
                                    'col_no'=>'4',
                                    'rows'=>array(
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'span','content'=>'मिति :-'],
                                                ['field_type'=>'input','class'=>'date-picker','name'=>'oath_applied_date','validation'=>'required|string|max:191','placeholder'=>'मिति'],

                                            )
                                        ],


                                    ),
                                ],
                                [
                                    'col_no'=>'4',
                                    'rows'=>array(
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'span','class'=>'','content'=>'.'],

                                            )
                                        ],
                                    )
                                ],
                                [
                                    'col_no'=>'4',
                                    'rows'=>array(

                                        [
                                            'fields'=>array(

                                                ['field_type'=>'span','content'=>'दस्तखत'],
                                                ['field_type'=>'input','name'=>'oath_signature','validation'=>'required|string|max:191','placeholder'=>''],
                                            )
                                        ],
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'span','content'=>'नाम:-'],
                                                ['field_type'=>'input','name'=>'oath_signature_person_name','validation'=>'required|string|max:191','placeholder'=>'नाम/थर'],

                                            )
                                        ],

                                        [
                                            'fields'=>array(

                                                ['field_type'=>'span','content'=>'वतन'],

                                                ['field_type'=>'select','class'=>'','name'=>'oath_watan','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['प्रबन्धक']],
                                            )
                                        ]

                                    )
                                ],


                            )
                        )
                    ],






                    [
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'end',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'','content'=>'मिति'],
                                        ['field_type'=>'input','class'=>'date-picker','name'=>'india_applied_date','validation'=>'required|string|max:191','placeholder'=>'मिति'],

                                    )
                                ],

                            )
                        )
                    ],
                    [
                        'div-class-name'=>'margin-top3',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'महामहिम भारतीय राजदुत ज्यु'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'भारतीय दुतावास'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'input','class'=>'','name'=>'india_embassy_address','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>', काठमाडौं'],


                                    )
                                ],
                            )
                        )
                    ],

                    [
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'center',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'विषय :- भारतीय नागरिकता परित्याग गरि पाउँ ।'],
                                    )
                                ],

                            )
                        )
                    ],



                    [
                        'div-class-name'=>'margin-top-10',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'म निवेदिका भारतको'],
                                        ['field_type'=>'input','name'=>'india_state_name','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'select','class'=>'','name'=>'india_state_type','placeholder'=>'','option_type'=>'static','options'=>['राज्य'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','name'=>'india_district_name','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'span','content'=>'जिल्ला'],
                                        ['field_type'=>'input','name'=>'india_thana','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'span','content'=>'थाना'],
                                        ['field_type'=>'input','name'=>'india_gram','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'span','content'=>'ग्राम वडा नं'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'india_ward_no','validation'=>'required|np_integer','placeholder'=>''],
                                        ['field_type'=>'span','content'=>'बस्ने'],
                                        ['field_type'=>'input','class'=>'','name'=>'india_grand_father_name','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'span','content'=>'को नातिनी'],
                                        ['field_type'=>'input','class'=>'','name'=>'india_father_name','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'span','content'=>'को छोरी'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'india_age','validation'=>'required|np_integer','placeholder'=>''],
                                        ['field_type'=>'span','content'=>'वर्षिय'],
                                        ['field_type'=>'input','class'=>'','name'=>'india_person_name','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'span','content'=>'हुँ ।'],

                                        ['field_type'=>'span','content'=>'मैले नेपाल राज्यको'],
                                        ['field_type'=>'input','class'=>'inout-number','name'=>'india_nepali_husband_state_no','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'span','content'=>'न. प्रदेश'],
                                        ['field_type'=>'input','name'=>'india_nepali_husband_district_name','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'span','content'=>'जिल्ला'],
                                        ['field_type'=>'input','name'=>'india_nepali_husband_palika_name','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'select','class'=>'','name'=>'india_nepali_husband_palika_type','placeholder'=>'','option_type'=>'static','options'=>['गाउँपालिका'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'वडा नं'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'india_nepali_husband_ward_no','validation'=>'required|np_integer','placeholder'=>''],
                                        ['field_type'=>'span','content'=>'बस्ने'],
                                        ['field_type'=>'input','class'=>'','name'=>'india_nepali_husband_grand_father_name','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'span','content'=>'को नाति'],
                                        ['field_type'=>'input','class'=>'','name'=>'india_nepali_husband_father_name','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'span','content'=>'को छोरा'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'india_nepali_husband_age','validation'=>'required|np_integer','placeholder'=>''],
                                        ['field_type'=>'span','content'=>'वर्षिय'],
                                        ['field_type'=>'input','class'=>'','name'=>'india_nepali_husband_name','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'span','content'=>'संग मेरी सामाजिक परम्परा अनुरुप मिति'],
                                        ['field_type'=>'input','class'=>'date-picker','name'=>'india_nepali_husband_married_date','validation'=>'required|string|max:191','placeholder'=>''],
                                        ['field_type'=>'span','content'=>'मा विवाह भएको छ । अब मैले नेपालको संविधान (२०७२), नेपाल नागरिकता ऐन (२०६३) एवं ऐन नियमावली (२०६३) अनुरुप नेपालको वैवाहिक नागरिकता लिने भएकोले मेरो भारतीय नागरिकता परित्याग गरिदिने कारवाही प्रयोजनका लागि मैले आफ्नो स्वेच्छा र राजीखुसी हुलाक रजिष्टरी गरि यो निवेदन प्रेषित गरेको छु ।'],

                                    )
                                ],

                            )
                        )
                    ],



                    [
                        'div-class-name'=>'margin-top-10',
                        'flex-div'=>array(
                            'position'=>'start',
                            'cols'=>array(


                                [
                                    'col_no'=>'4',
                                    'rows'=>array(
                                        [
                                            'fields'=>array(

                                                ['field_type'=>'table','table_title'=>['दायाँ','बाया'],'row_num'=>'1','table_class'=>'width300 float-left','td_class'=>'height150'],

                                            )
                                        ],


                                    ),
                                ],
                                [
                                    'col_no'=>'4',
                                    'rows'=>array(
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'span','class'=>'','content'=>'व्यहोरा साँचो छ झूठा ठहरे कानून बमोजिम सहुँला बुझाउँला।'],

                                            )
                                        ],
                                    )
                                ],
                                [
                                    'col_no'=>'4',
                                    'rows'=>array(

                                        [
                                            'fields'=>array(

                                                ['field_type'=>'span','content'=>'भवदीय,'],
                                            )
                                        ],
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'span','content'=>' निवेदिका :- '],
                                                ['field_type'=>'input','name'=>'india_nibedika_name','validation'=>'required|string|max:191','placeholder'=>'नाम/थर'],

                                            )
                                        ],

                                        [
                                            'fields'=>array(

                                                ['field_type'=>'span','content'=>' दस्तखत :- '],
                                                ['field_type'=>'input','name'=>'india_nibedika_signature','validation'=>'required|string|max:191','placeholder'=>''],
                                            )
                                        ]

                                    )
                                ],


                            )
                        )
                    ],









                    [
                        'div-class-name'=>'div-nibedan-to',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'निवेदकको विवरण :'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'','content'=>'निवेदकको नाम :'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'input','name'=>'applicant_name_bibaran','validation'=>'required|string|max:191','placeholder'=>'निवेदकको नाम'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'','content'=>'निवेदकको ठेगाना :'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'input','name'=>'applicant_address_bibaran','validation'=>'required|string|max:191','placeholder'=>'निवेदकको ठेगाना'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'','content'=>'निवेदकको नागरिकता नं. :'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'input','name'=>'applicant_citizenship_number','validation'=>'required|string|max:191','placeholder'=>'निवेदकको नागरिकता नं.'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'','content'=>'निवेदकको फोन न. :'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'input','name'=>'applicant_phone_number','validation'=>'required|string|max:191','placeholder'=>'निवेदकको फोन न.  '],

                                    )
                                ],
                            )
                        )
                    ],


                )

            )
        );
        //setting all validation errors
        $this->rules=$this->set_values_in_validation($this->getViewArray());
    }

    public function store(Request $request)
    {
//        dd($request);
        $validator = Validator::make(
            $request->all(),
            $this->rules,
            $this->messages
        );
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
//        $nepaliNagariktaSifaris=new NepaliNagariktaSifaris();
        $this->model=$this->set_values_in_fields($request,$this->model,$this->getViewArray());
        if($request->has('current_family_sons'))
        {
            $sons='';
            foreach ($request->current_family_sons as $current_family_son) {
                $sons=$sons.','.$current_family_son;
            }
            $this->model->current_family_sons=$sons;

        }

        if($request->has('current_family_daughters'))
        {
            $daughters='';
            foreach ($request->current_family_daughters as $current_family_daughter) {
                $daughters=$daughters.','.$current_family_daughter;
            }
            $this->model->current_family_daughters=$daughters;

        }

        if($request->has('current_family_husband_wife'))
        {
            $husband_wifes='';
            foreach ($request->current_family_husband_wife as $husband_wife) {
                $husband_wifes=$husband_wifes.','.$husband_wife;
            }
            $this->model->current_family_husband_wife=$husband_wifes;

        }

        $this->model->submitted_by=Auth::id();
        if($this->model->save())
        {
            return Redirect::route($this->getViewArray()['show_page_url'],$this->model->id)->with('success','सफलतापूर्वक स्टोर गरियो');
        }
    }


    public function index(Request $request)
    {
        $data = NepaliAngikritNagarikta::where('deleted','=','0')->get();
        if($request->ajax()) {
            if (!empty($request->nibedak_name)) {
                $data = NepaliAngikritNagarikta::where('deleted','=','0')
                    ->where('applicant_name_bibaran', 'LIKE', '%'.$request->nibedak_name.'%')
                    ->get();
            }
            if (!empty($request->citizenship_no)) {
                $data = NepaliAngikritNagarikta::where('deleted','=','0')->
                where('applicant_citizenship_number', 'LIKE', '%'.$request->citizenship_no.'%')->get();
            }
            if(!empty($request->sifaris_no)){
                $data=NepaliAngikritNagarikta::where('deleted','=','0')
                    ->where('id','=',$request->sifaris_no)->get();
            }


            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="'.route('nepali-angikrit-nagarikta.show',$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="show" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.route('nepali-angikrit-nagarikta.edit',['nepali_angikrit_nagariktum'=>$row['id']]).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="edit" data-target="#myModal"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-sm btn-danger delete-nibedan" data-id="'.$row['id'].'" id="deleteDarta"><i class="fa fa-trash"></i></a>
                    </div>';
                })
                ->rawColumns(['actions','files'])
                ->make(true);
        }
        $data['date'] = DateConverter::fromEnglishDate(date('Y'), date('m'), date('d'))->toNepaliDate();
        return view('sifaris.pages.index_page', ['data'=>$data,'view_array'=>$this->getViewArray()]);
    }


}
