<?php

namespace App\Http\Controllers\Sifaris\Nagarikta;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sifaris\SifarisAbstractController;
use App\Models\Sifaris\Nagarikta\NagariktaPratilipiSifaris;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Krishnahimself\DateConverter\DateConverter;
use Yajra\DataTables\Facades\DataTables;

class NagariktaPratilipiSifarisController extends SifarisAbstractController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $view_array= array();
    public $rules = [];
//    public $messages = [
//        'required' => 'यो क्षेत्र आवश्यक छ।',
//        'string' => 'यो फिल्ड स्ट्रिङ हुनुपर्छ।',
//        'max' => 'यो फिल्डले अधिकतम संख्या :max सम्म मात्र लिन्छ।',
//        'np_integer'=>'यो फिल्ड अंकमा हुनुपर्छ',
//        'integer'=>'यो फिल्ड अंकमा हुनुपर्छ',
//        'unique'=>''
//    ];
    public function __construct()
    {
        $this->view_array= array(
            'form_store_url'=>'nagarikta-pratilipi.store',
            'form_update_url'=>'nagarikta-pratilipi.update',
            'back_url'=>'nagarikta-pratilipi.index',
            'form_title'=>'नागरिकता प्रतिलिपि सिफारिस',


            'index_page_url'=>'nagarikta-pratilipi.index',
            'form_edit_url'=>'nagarikta-pratilipi.edit',
            'default_view_url'=>'nagarikta-pratilipi.default',
            'pdf_view_url'=>'nagarikta-pratilipi.pdf',

            'form_sections'=>array(
                [
                    'div-class-name'=>'',
                    'flex-div'=>array(
                        'position'=>'start',
                        'rows'=>array(
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'श्रीमान्‌ प्रमुख जिल्ला अधिकारीज्यू'],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'select','class'=>'','name'=>'prasasan_type','placeholder'=>'','option_type'=>'static','options'=>['जिल्ला'],'validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'प्रशासन कार्यालय'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'input','class'=>'','name'=>'prasasan_address','placeholder'=>'','validation'=>'required|string|max:191'],

                                )
                            ]
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
                                    ['field_type'=>'span','content'=>'विषयःनेपाली नागरिकताको प्रमाण-पत्र प्रतिलिपि पाफँ।'],

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
                                    ['field_type'=>'span','content'=>'महोदय,'],

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
                                    ['field_type'=>'span','content'=>'मैले बरेङ गाउँपालिका कार्यालयबाट देहायको विवरण भएको नेपाली नागरिकता प्रमाण-पत्र लिएकोमा सो प्रमाण-पत्रको सक्कल'],
                                    ['field_type'=>'select','class'=>'','name'=>'citizenship_damage_type','placeholder'=>'','option_type'=>'static','options'=>['झुत्रो भएको'],'validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'हुँदा सोको प्रतिलिपि पाउनको लागि सो नागरिकता प्रमाण-पत्रको'],
                                    ['field_type'=>'span','content'=>' प्रति संलग्न राखि रु. १३ (तेह) को टिकट टाँसी सिफारिस सहित यो निवेदन पेश गरेको छु।'],
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
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'मैले नागरिकताको प्रमाण-पत्र लिदाको यस प्रकार छ ।'],

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
                                            ['field_type'=>'span','class'=>'','content'=>'१ ना प्र प न.:-'],
                                            ['field_type'=>'input','class'=>'','name'=>'previous_citizenship_no','placeholder'=>'ना प्र प न.','validation'=>'required|string|max:191'],
                                        )
                                    ],



                                ),
                            ],
                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'मिती:'],
                                            ['field_type'=>'input','class'=>'date-picker','name'=>'previous_citizenship_date','placeholder'=>'मिती','validation'=>'required|string|max:191'],
                                        )
                                    ],



                                ),
                            ],
                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'किसिम :-'],
                                            ['field_type'=>'select','class'=>'','name'=>'previous_citizenship_type','placeholder'=>'','option_type'=>'static','options'=>['नागरिकताको किसिम'],'validation'=>'required|string|max:191'],
                                        )
                                    ],



                                ),
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
                                            ['field_type'=>'span','class'=>'','content'=>'२. नाम थर :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'previous_citizenship_full_name','placeholder'=>'नाम थर','validation'=>'required|string|max:191'],
                                        )
                                    ],


                                ),
                            ],

                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'Full name :-'],
                                            ['field_type'=>'input','class'=>'en-input-text','name'=>'previous_citizenship_full_name_en','placeholder'=>'Full Name','validation'=>'required|string|max:191'],
                                        )
                                    ],

                                ),
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
                                            ['field_type'=>'span','class'=>'','content'=>'३. लिङ्ग :-'],
                                            ['field_type'=>'select','class'=>'','name'=>'previous_citizenship_sex','placeholder'=>'','option_type'=>'static','options'=>['पुरुष'],'validation'=>'required|string|max:191'],
                                        )
                                    ],

                                ),
                            ],
                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>' sex :-'],
                                            ['field_type'=>'input','class'=>'en-input-text','name'=>'previous_citizenship_sex_en','placeholder'=>'sex','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                ),
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
                                            ['field_type'=>'span','class'=>'','content'=>'४. जन्म स्थान :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'previous_citizenship_birth_place','validation'=>'required|string|max:191','placeholder'=>'जन्म स्थान','validation'=>'required|string|max:191'],
                                        )
                                    ],

                                ),
                            ],
                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>' Place Of Birth :-'],
                                            ['field_type'=>'input','class'=>'en-input-text','name'=>'previous_citizenship_birth_place_en','placeholder'=>'Place Of Birth','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                ),
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
                                    ['field_type'=>'span','content'=>'५. स्थायी बासस्थान:'],

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
                                            ['field_type'=>'span','class'=>'','content'=>'जिल्ला :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'previous_citizenship_permanent_address_district','placeholder'=>'जिल्ला','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'district :-'],
                                            ['field_type'=>'input','class'=>'en-input-text','name'=>'previous_citizenship_permanent_address_district_en','placeholder'=>'district','validation'=>'required|string|max:191'],
                                        )
                                    ],


                                ),
                            ],

                            [
                                'col_no'=>'2',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'input','class'=>'','name'=>'previous_citizenship_permanent_address_palika_name','placeholder'=>'पालिका','validation'=>'required|string|max:191'],

                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'input','class'=>'en-input-text','name'=>'previous_citizenship_permanent_address_palika_name_en','placeholder'=>'','validation'=>'required|string|max:191'],

                                        )
                                    ],

                                ),
                            ],
                            [
                                'col_no'=>'2',
                                'rows'=>array(
                                    [
                                        'fields'=>array(

                                            ['field_type'=>'input','class'=>'','name'=>'previous_citizenship_permanent_address_palika_type','placeholder'=>'','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(

                                            ['field_type'=>'input','class'=>'en-input-text','name'=>'previous_citizenship_permanent_address_palika_type_en','placeholder'=>'','validation'=>'required|string|max:191'],
                                        )
                                    ],

                                ),
                            ],

                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'वडा नं. :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'previous_citizenship_permanent_address_word_no','placeholder'=>'वडा नं.','validation'=>'required|np_integer:191'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'ward no. :-'],
                                            ['field_type'=>'input','class'=>'en-input-text','name'=>'previous_citizenship_permanent_address_word_no_en','placeholder'=>'ward no','validation'=>'required|integer:191'],
                                        )
                                    ],


                                ),
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
                                            ['field_type'=>'span','class'=>'','content'=>'३. लिङ्ग :-'],
                                            ['field_type'=>'select','class'=>'','name'=>'previous_citizenship_sex','placeholder'=>'','option_type'=>'static','options'=>['पुरुष'],'validation'=>'required|string|max:191'],
                                        )
                                    ],

                                ),
                            ],
                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>' sex :-'],
                                            ['field_type'=>'select','class'=>'en-input-text','name'=>'previous_citizenship_sex_en','placeholder'=>'','option_type'=>'static','options'=>['male','female'],'validation'=>'required|string|max:191'],
//                                            ['field_type'=>'input','class'=>'','name'=>'previous_citizenship_sex_en','placeholder'=>'sex','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                ),
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
                                            ['field_type'=>'span','class'=>'','content'=>'६. जन्म मिति (बि.सं) :-'],
                                            ['field_type'=>'input','class'=>'date-picker','name'=>'previous_citizenship_dob','placeholder'=>'मिती','validation'=>'required|string|max:191'],
                                        )
                                    ],



                                ),
                            ],
                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'Date Of Birth (AD) :-'],
                                            ['field_type'=>'input','class'=>'en-date en-input-text','name'=>'previous_citizenship_dob_en','placeholder'=>'Date Of Birth','validation'=>'required|string|max:191'],
                                        )
                                    ],



                                ),
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
                                            ['field_type'=>'span','class'=>'','content'=>'७. बाबुको नाम, थर :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'previous_citizenship_father_name','placeholder'=>'बाबुको नाम, थर','validation'=>'required|string|max:191'],
                                        )
                                    ],


                                ),
                            ],

                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'बाबुको वतन :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'previous_citizenship_father_wotan','placeholder'=>'बाबुको वतन','validation'=>'required|string|max:191'],
                                        )
                                    ],


                                ),
                            ],
                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'नागरिकताको किसिम :-'],
                                            ['field_type'=>'select','class'=>'','name'=>'previous_citizenship_father_citizenship_type','placeholder'=>'','option_type'=>'static','options'=>['नागरिकताको किसिम'],'validation'=>'required|string|max:191'],
                                        )
                                    ],

                                ),
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
                                            ['field_type'=>'span','class'=>'','content'=>'८. आमाको नाम, थर :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'previous_citizenship_mother_name','placeholder'=>'आमाको नाम, थर','validation'=>'string|max:191'],
                                        )
                                    ],


                                ),
                            ],

                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'आमाको वतन :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'previous_citizenship_mother_wotan','placeholder'=>'आमाको वतन','validation'=>'string|max:191'],
                                        )
                                    ],


                                ),
                            ],
                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'नागरिकताको किसिम :-'],
                                            ['field_type'=>'select','class'=>'','name'=>'previous_citizenship_mother_citizenship_type','placeholder'=>'','option_type'=>'static','options'=>['नागरिकताको किसिम'],'validation'=>'string|max:191'],
                                        )
                                    ],

                                ),
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
                                            ['field_type'=>'span','class'=>'','content'=>'९. पतिको नाम, थर :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'previous_citizenship_husband_name','placeholder'=>'पतिको नाम, थर','validation'=>'string|max:191'],
                                        )
                                    ],


                                ),
                            ],

                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'पतिको वतन :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'previous_citizenship_husband_wotan','placeholder'=>'पतिको वतन','validation'=>'string|max:191'],
                                        )
                                    ],


                                ),
                            ],
                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'नागरिकताको किसिम :-'],
                                            ['field_type'=>'select','class'=>'','name'=>'previous_citizenship_husband_citizenship_type','placeholder'=>'','option_type'=>'static','options'=>['नागरिकताको किसिम'],'validation'=>'string|max:191'],
                                        )
                                    ],

                                ),
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
                                    ['field_type'=>'span','content'=>'माथि उल्लेखित विवरण मैले'],
                                    ['field_type'=>'input','class'=>'','name'=>'previous_citizenship_form_office_name','placeholder'=>'कार्यालय','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'कार्यालयबाट लीएको नं.'],
                                    ['field_type'=>'input','class'=>'','name'=>'previous_citizenship_body_citizenship_no','placeholder'=>'ना.प्र.प.नं.','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'को ना.प्र.प. को व्यहोरा संग दुरुस्त छ। फरक'],
                                    ['field_type'=>'span','content'=>' छैन। लेखिएको व्यहोरा झुट्टा ठहरेमा कानुन बमोजिम सहँला बुझाउँला ।'],
                                )
                            ],

                        )
                    )
                ],
//                [
//                    'div-class-name'=>'',
//                    'flex-div'=>array(
//                        'position'=>'start',
//                        'rows'=>array(
//                            [
//                                'fields'=>array(
//                                    ['field_type'=>'span','content'=>'औंठा छाप'],
//
//                                )
//                            ],
//                            [
//                                'fields'=>array(
//
//                                    ['field_type'=>'table','table_title'=>['दायाँ','बाया'],'row_num'=>'1','table_class'=>'width300','td_class'=>'height150'],
//
//                                )
//                            ],
//
//
//                        )
//                    )
//                ],



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
                                            ['field_type'=>'span','content'=>'औंठा छाप'],

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

                                            ['field_type'=>'span','content'=>'दस्तखत'],
                                            ['field_type'=>'input','name'=>'applicant_signature','validation'=>'required|string|max:191','placeholder'=>''],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','content'=>'नाम/थर'],
                                            ['field_type'=>'input','name'=>'applicant_full_name','validation'=>'required|string|max:191','placeholder'=>'नाम/थर'],

                                        )
                                    ],

                                    [
                                        'fields'=>array(

                                            ['field_type'=>'span','content'=>'मिति'],

                                            ['field_type'=>'input','class'=>'date-picker','name'=>'applied_date','validation'=>'required|string|max:191','placeholder'=>'मिति'],
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
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'गाउँपालिका को प्रतिलिपि ना.प्र.प. का लागि सिफारिस'],
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
                                    ['field_type'=>'input','class'=>'','name'=>'sifaris_body_palika_name','placeholder'=>'गाउँपालिका','validation'=>'required|string|max:191'],
                                    ['field_type'=>'select','class'=>'','name'=>'sifaris_body_palika_type','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['गाउँपालिका','']],
                                    ['field_type'=>'span','class'=>'','content'=>'वडा नं.'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'sifaris_body_ward_no','placeholder'=>'वडा','validation'=>'required|np_integer'],
                                    ['field_type'=>'span','class'=>'','content'=>'मा मिति'],
                                    ['field_type'=>'input','class'=>'date-picker','name'=>'sifaris_body_dob','placeholder'=>'मिति','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','class'=>'','content'=>'मा जन्म भई हाल'],
                                    ['field_type'=>'input','class'=>'','name'=>'sifaris_body_current_palika_name','placeholder'=>'गाउँपालिका','validation'=>'required|string|max:191'],
                                    ['field_type'=>'input','class'=>'','name'=>'sifaris_body_current_palika_type','placeholder'=>'गाउँपालिका','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','class'=>'','content'=>'वडा नं.'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'sifaris_body_current_ward_no','placeholder'=>'वडा','validation'=>'required|np_integer'],
                                    ['field_type'=>'span','class'=>'','content'=>'मा स्थायी रुपमा बसोबास गरी आएका यसमा लेखिएका'],
                                    ['field_type'=>'select','class'=>'','name'=>'sifaris_body_father_abbreviation','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['श्रीमान'],'validation'=>'required|string|max:191'],
                                    ['field_type'=>'input','class'=>'','name'=>'sifaris_body_father_name','placeholder'=>'नाम','validation'=>'required|string|max:191'],
                                    ['field_type'=>'select','class'=>'','name'=>'sifaris_body_child_type','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['छोरा']],
                                    ['field_type'=>'span','class'=>'','content'=>'वर्ष'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'sifaris_body_person_age','placeholder'=>'वर्ष','validation'=>'required|np_integer'],
                                    ['field_type'=>'span','class'=>'','content'=>'को '],
                                    ['field_type'=>'select','class'=>'','name'=>'sifaris_body_person_abbreviation','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['श्री'],'validation'=>'required|string|max:191'],
                                    ['field_type'=>'input','class'=>'','name'=>'sifaris_body_person_name','placeholder'=>'नाम','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','class'=>'','content'=>'लाई म चिन्दछु। निजको माग बमोजिम उपयुक्त विवरण भएको नं.'],
                                    ['field_type'=>'input','class'=>'','name'=>'sifaris_body_citizenship_no','placeholder'=>'ना.प्र.प.न.','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','class'=>'','content'=>'मिति'],
                                    ['field_type'=>'input','class'=>'date-picker','name'=>'sifaris_body_citizenhip_date','placeholder'=>'मिति','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','class'=>'','content'=>'को नगरिकता प्रमाण-पत्रको सक्कल प्रति'],
                                    ['field_type'=>'input','class'=>'','name'=>'sifaris_body_citizenhip_damage_type','placeholder'=>'','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','class'=>'','content'=>'व्यहोरा साँचो हुँदा प्रतिलिपि दिएमा फरक नपर्ने व्यहोरा'],
                                    ['field_type'=>'span','class'=>'','content'=>'सिफारिस गर्दछु। उक्त विवरण झटठ्ठा ठहरे कानुन बमोजिम सँहुला बुझाउँला।'],
//                                    ['field_type'=>'div','style'=>'width:130px; height:130px; border:1px solid black;','class'=>'text-center','content'=>'दुवै कान देखिने हाल खिचिएको २.५ x ३ से.मी. फोटो'],

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
                                            ['field_type'=>'div','style'=>'width:130px; height:130px; border:1px solid black;','class'=>'text-center','content'=>'दुवै कान देखिने हाल खिचिएको २.५ x ३ से.मी. फोटो'],
                                        )
                                    ],


                                ),
                            ],

                            [
                                'col_no'=>'4',
                                'rows'=>array(
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
                                            ['field_type'=>'span','content'=>'निवेदक/निबेदिका'],

                                        )
                                    ],
                                    [
                                        'fields'=>array(

                                            ['field_type'=>'span','content'=>'दस्तखत'],
                                            ['field_type'=>'input','name'=>'sifaris_body_applicant_sign','validation'=>'required|string|max:191','placeholder'=>''],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','content'=>'नाम/थर'],
                                            ['field_type'=>'input','name'=>'sifaris_body_applicant_full_name','validation'=>'required|string|max:191','placeholder'=>'नाम/थर'],

                                        )
                                    ],

                                    [
                                        'fields'=>array(

                                            ['field_type'=>'span','content'=>'पद'],

                                            ['field_type'=>'select','class'=>'','name'=>'sifaris_body_post_type','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['प्रबन्धक']],
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
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'निवेदकको विवरण'],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'','content'=>'निवेदकको नाम  '],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'input','name'=>'applicant_name_bibaran','validation'=>'required|string|max:191','placeholder'=>'निवेदकको नाम'],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'','content'=>'निवेदकको ठेगाना  '],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'input','name'=>'applicant_address_bibaran','validation'=>'required|string|max:191','placeholder'=>'निवेदकको ठेगाना'],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'','content'=>'निवेदकको नागरिकता नं.'],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'input','name'=>'applicant_citizenship_number','validation'=>'required|string|max:191','placeholder'=>'निवेदकको नागरिकता नं.'],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'','content'=>'निवेदकको फोन न.  '],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'input','name'=>'applicant_phone_number','validation'=>'required|np_phone','placeholder'=>'निवेदकको फोन न.  '],

                                )
                            ],
                        )
                    )
                ],


            )

        );
        //setting all validation errors
        $this->rules=$this->set_values_in_validation($this->view_array);
    }

    public function index(Request $request)
    {
        $data = NagariktaPratilipiSifaris::where('deleted','=','0')->get();
        if($request->ajax()) {
            if (!empty($request->nibedak_name)) {
                $data = NagariktaPratilipiSifaris::where('deleted','=','0')
                    ->where('applicant_name_bibaran', 'LIKE', '%'.$request->nibedak_name.'%')
                    ->get();
            }
            if (!empty($request->citizenship_no)) {
                $data = NagariktaPratilipiSifaris::where('deleted','=','0')->
                where('applicant_citizenship_number', 'LIKE', '%'.$request->citizenship_no.'%')->get();
            }
            if(!empty($request->sifaris_no)){
                $data=NagariktaPratilipiSifaris::where('deleted','=','0')
                    ->where('id','=',$request->sifaris_no)->get();
            }


            return Datatables::of($data)
                ->addIndexColumn()
               
                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="'.route('nagarikta-pratilipi.show',$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="show" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.route('nagarikta-pratilipi.edit',['nagarikta_pratilipi'=>$row['id']]).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="edit" data-target="#myModal"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-sm btn-danger delete-nibedan" data-id="'.$row['id'].'" id="deleteDarta"><i class="fa fa-trash"></i></a>
                    </div>';
                })
                ->rawColumns(['actions','files'])
                ->make(true);
        }
        $data['date'] = DateConverter::fromEnglishDate(date('Y'), date('m'), date('d'))->toNepaliDate();
        return view('sifaris.nagarikta.nagarikta_pratilipi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('sifaris.pages.create_page',['view_array'=>$this->view_array]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $nagariktaPratilipiSifaris=new NagariktaPratilipiSifaris();
        $nagariktaPratilipiSifaris=$this->set_values_in_fields($request,$nagariktaPratilipiSifaris,$this->view_array);

        $nagariktaPratilipiSifaris->submitted_by=Auth::id();
        if($nagariktaPratilipiSifaris->save())
        {
            return Redirect::route('nagarikta-pratilipi.show',$nagariktaPratilipiSifaris->id)->with('success','सफलतापूर्वक स्टोर गरियो');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $nagariktaPratilipiSifaris=NagariktaPratilipiSifaris::where('id','=',$id)->get()->first();
        return view('sifaris.pages.main_show_page',['model'=>$nagariktaPratilipiSifaris,'view_array'=>$this->view_array]);
    }

    public function show_default($id)
    {

        $nagariktaPratilipiSifaris=NagariktaPratilipiSifaris::where('id','=',$id)->get()->first();
        return view('sifaris.pages.show_page',['model'=>$nagariktaPratilipiSifaris,'view_array'=>$this->view_array]);
    }



    function show_pdf($id)
    {
        $nagariktaPratilipiSifaris=NagariktaPratilipiSifaris::where('id','=',$id)->get()->first();
//        return view('pages.show_page',['model'=>$NagariktaPratilipiSifaris,'view_array'=>$this->view_array]);
        $pdf = SnappyPdf::loadView('sifaris.pages.show_page',['model'=>$nagariktaPratilipiSifaris,'view_array'=>$this->view_array]);
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 2000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
//        $pdf->setOption('viewport-size', '400x200');
//    $pdf->setOption('no-outline', true);
        $pdf->setOption('page-size','A4');
        $pdf->setOption('margin-left','0mm');
        $pdf->setOption('margin-right','0mm');
        $pdf->setOption('margin-top','0mm');
        $pdf->setOption('margin-bottom','0mm');
        $pdf->setOption('orientation', 'Portrait');
//        $pdf->setOption('page-height','100');
//        $pdf->setOption('page-width','106.5');
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nagariktaPratilipiSifaris=NagariktaPratilipiSifaris::where('id','=',$id)->get()->first();

        return view('sifaris.pages.edit_page',['model'=>$nagariktaPratilipiSifaris,'view_array'=>$this->view_array]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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
        $nagariktaPratilipiSifaris=NagariktaPratilipiSifaris::where('id','=',$id)->get()->first();
        $nagariktaPratilipiSifaris=$this->set_values_in_fields($request,$nagariktaPratilipiSifaris,$this->view_array);
        if($nagariktaPratilipiSifaris->save())
        {
            return Redirect::route('nagarikta-pratilipi.show',$nagariktaPratilipiSifaris->id)->with('success','सफलतापूर्वक स्टोर गरियो');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return (NagariktaPratilipiSifaris::where('id','=',$id)->update(['deleted'=>1])) ?
            response()->json(
                [
                    'status' => 200,
                    'message' => 'डाटा मेटाइएको छ'
                ]
            ) : response()->json(
                [
                    'status' => 400,
                    'message' => 'Something went wrong'
                ]
            );
    }
}
