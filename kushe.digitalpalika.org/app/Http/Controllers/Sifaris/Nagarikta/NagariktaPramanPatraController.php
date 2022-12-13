<?php

namespace App\Http\Controllers\Sifaris\Nagarikta;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sifaris\SifarisAbstractController;
use App\Models\Sifaris\Nagarikta\NagariktaPramanPatra;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Krishnahimself\DateConverter\DateConverter;
use Yajra\DataTables\DataTables;

class NagariktaPramanPatraController extends SifarisAbstractController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    private $view_array= array();
//    public $rules = [];
//    public $messages = [
//        'required' => 'यो क्षेत्र आवश्यक छ।',
//        'string' => 'यो फिल्ड स्ट्रिङ हुनुपर्छ।',
//        'max' => 'यो फिल्डले अधिकतम संख्या :max सम्म मात्र लिन्छ।',
//        'np_integer'=>'यो फिल्ड अंकमा हुनुपर्छ',
//        'unique'=>''
//    ];
    public function __construct()
    {
        $this->view_array= array(
            'form_store_url'=>'nagarikta-pramanpatra.store',
            'form_update_url'=>'nagarikta-pramanpatra.update',
            'form_destroy_url'=>'nagarikta-pramanpatra.destroy',
            'back_url'=>'nagarikta-pramanpatra.index',
            'form_title'=>'नागरिकता प्रमाणपत्र सिफारिस',


            'create_page_url'=>'nagarikta-pramanpatra.create',
            'index_page_url'=>'nagarikta-pramanpatra.index',
            'form_edit_url'=>'nagarikta-pramanpatra.edit',
            'default_view_url'=>'nagarikta-pramanpatra.default',
            'pdf_view_url'=>'nagarikta-pramanpatra.pdf',
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
                                    ['field_type'=>'span','content'=>'विषयःनेपाली नागरिकताको प्रमाण-पत्र पाऊँ।'],

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
                                    ['field_type'=>'span','content'=>'म'],
                                    ['field_type'=>'select','class'=>'','name'=>'citizenship_according_to','placeholder'=>'','option_type'=>'static','options'=>['वंशजको नाताले'],'validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'नेपाली नागरीक भएकोले देहायको विवरण खोली नेपाली नागरिकताको प्रमाण-पत्र पाउनको लागि सिफारिस साथ'],
                                    ['field_type'=>'span','content'=>'रु १०।- को टिकट टाँसी यो निवेदन पेश गरेको छु।मेले यस अघि नेपाली'],
                                    ['field_type'=>'span','content'=>'नागरिकताको प्रमाण-पत्र लिएको छैन।'],
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
                                            ['field_type'=>'span','class'=>'','content'=>'नाम थर :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'full_name','placeholder'=>'नाम थर','validation'=>'required|string|max:191'],
                                        )
                                    ],


                                ),
                            ],

                            [
                                'col_no'=>'8',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'Full name :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'full_name_en','placeholder'=>'Full Name','validation'=>'required|string|max:191'],
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
                                            ['field_type'=>'span','class'=>'','content'=>'लिङ्ग :-'],
                                            ['field_type'=>'select','class'=>'','name'=>'sex','placeholder'=>'','option_type'=>'static','options'=>['पुरुष'],'validation'=>'required|string|max:191'],
                                        )
                                    ],

                                ),
                            ],
                            [
                                'col_no'=>'8',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>' sex :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'sex_en','placeholder'=>'sex','validation'=>'required|string|max:191'],
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
                                            ['field_type'=>'span','class'=>'','content'=>'जन्म स्थान :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'birth_place','validation'=>'required|string|max:191','placeholder'=>'जन्म स्थान','validation'=>'required|string|max:191'],
                                        )
                                    ],

                                ),
                            ],
                            [
                                'col_no'=>'8',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'Place Of Birth :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'birth_place_en','placeholder'=>'Place Of Birth','validation'=>'required|string|max:191'],
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
                                    ['field_type'=>'span','content'=>' स्थायी बासस्थान:'],

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
                                            ['field_type'=>'input','class'=>'','name'=>'permanent_address_district','placeholder'=>'जिल्ला','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'district :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'permanent_address_district_en','placeholder'=>'district','validation'=>'required|string|max:191'],
                                        )
                                    ],


                                ),
                            ],

                            [
                                'col_no'=>'2',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'input','class'=>'','name'=>'permanent_address_palika_name','placeholder'=>'पालिका','validation'=>'required|string|max:191'],

                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'input','class'=>'','name'=>'permanent_address_palika_name_en','placeholder'=>'','validation'=>'required|string|max:191'],

                                        )
                                    ],

                                ),
                            ],
                            [
                                'col_no'=>'2',
                                'rows'=>array(
                                    [
                                        'fields'=>array(

                                            ['field_type'=>'input','class'=>'','name'=>'permanent_address_palika_type','placeholder'=>'','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(

                                            ['field_type'=>'input','class'=>'','name'=>'permanent_address_palika_type_en','placeholder'=>'','validation'=>'required|string|max:191'],
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
                                            ['field_type'=>'input','class'=>'','name'=>'permanent_address_word_no','placeholder'=>'वडा नं.','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'ward no. :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'permanent_address_word_no_en','placeholder'=>'ward no','validation'=>'required|string|max:191'],
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
                                            ['field_type'=>'span','class'=>'','content'=>'जन्म मिति (बि.सं) :-'],
                                            ['field_type'=>'input','class'=>'date-picker','name'=>'dob','placeholder'=>'मिती','validation'=>'required|string|max:191'],
                                        )
                                    ],



                                ),
                            ],
                            [
                                'col_no'=>'8',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'Date Of Birth (AD) :-'],
                                            ['field_type'=>'input','class'=>'en-date','name'=>'dob_en','placeholder'=>'Date Of Birth','validation'=>'required|string|max:191'],
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
                                    ['field_type'=>'span','content'=>'(शैक्षिक प्रमाण-पत्र हुनेले सोही मिति उल्लेख गर्ने)'],

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
                                            ['field_type'=>'span','class'=>'','content'=>'बाबुको नाम, थर :'],
                                            ['field_type'=>'input','class'=>'','name'=>'father_name','placeholder'=>'बाबुको नाम, थर','validation'=>'required|string|max:191'],
                                        )
                                    ],


                                ),
                            ],

                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'ठेगाना :'],
                                            ['field_type'=>'input','class'=>'','name'=>'father_address','placeholder'=>'ठेगाना','validation'=>'required|string|max:191'],
                                        )
                                    ],


                                ),
                            ],
                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'नागरिकता:-'],
                                            ['field_type'=>'input','class'=>'','name'=>'father_citizenship_no','placeholder'=>'नागरिकता','validation'=>'required|string|max:191'],
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
                                            ['field_type'=>'span','class'=>'','content'=>'आमाको नाम, थर :'],
                                            ['field_type'=>'input','class'=>'','name'=>'mother_name','placeholder'=>'आमाको नाम, थर','validation'=>'string|max:191'],
                                        )
                                    ],


                                ),
                            ],

                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'ठेगाना:'],
                                            ['field_type'=>'input','class'=>'','name'=>'mother_address','placeholder'=>'ठेगाना','validation'=>'string|max:191'],
                                        )
                                    ],


                                ),
                            ],
                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'नागरिकताको:'],
                                            ['field_type'=>'input','class'=>'','name'=>'mother_citizenship_no','placeholder'=>'नागरिकताको','validation'=>'string|max:191'],
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
                                            ['field_type'=>'span','class'=>'','content'=>'पति/पत्नी नाम , थर :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'husband_or_wife_name','placeholder'=>'पति/पत्नी नाम, थर','validation'=>'string|max:191'],
                                        )
                                    ],


                                ),
                            ],

                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'ठेगाना :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'husband_or_wife_address','placeholder'=>'ठेगाना','validation'=>'string|max:191'],
                                        )
                                    ],


                                ),
                            ],
                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'नागरिकताको:-'],
                                            ['field_type'=>'input','class'=>'','name'=>'husband_or_wife_citizenship_no','placeholder'=>'नागरिकताको','validation'=>'string|max:191'],
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
                                            ['field_type'=>'span','class'=>'','content'=>'संरक्षकको नाम, धर :'],
                                            ['field_type'=>'input','class'=>'','name'=>'patron_name','placeholder'=>'संरक्षकको नाम, थर','validation'=>'string|max:191'],
                                        )
                                    ],


                                ),
                            ],

                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'ठेगाना :-'],
                                            ['field_type'=>'input','class'=>'','name'=>'patron_address','placeholder'=>'ठेगाना','validation'=>'string|max:191'],
                                        )
                                    ],


                                ),
                            ],
                            [
                                'col_no'=>'4',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'नागरिकताको:-'],
                                            ['field_type'=>'input','class'=>'','name'=>'patron_citizenship_no','placeholder'=>'नागरिकताको','validation'=>'string|max:191'],
                                        )
                                    ],

                                ),
                            ],


                        ),

                    )
                ],


                [
                    'div-class-name'=>'margin-top-10',
                    'flex-div'=>array(
                        'position'=>'center',
                        'rows'=>array(
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'मैले माथि लेखिदिएको व्यहोरा ठिक साँचो हो ।झुट्टा ठहरे कानुन वमोजिम सँहुला, बुझाउँला।'],
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
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'गाउँपालिकाको सिफारिस'],
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

                                    ['field_type'=>'span','class'=>'','content'=>'लाई म चिन्दछु। उपयुक्त लेखिए बमोजिमको निजको व्यहोरा'],
                                    ['field_type'=>'span','class'=>'','content'=>'मैले जानेबुझे सम्म साँचो हो। निजलाई'],
                                    ['field_type'=>'input','class'=>'','name'=>'sifaris_body_citizenship_according_to','placeholder'=>'','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','class'=>'','content'=>'नागरिकताको प्रमाण-पत्र दिए हुन्छ। उक्त '],
                                    ['field_type'=>'span','class'=>'','content'=>'विवरण झुटो ठहरे कानुन बमोजिम सहँला बुझाउँला।'],
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
                                'col_no'=>'8',
                                'rows'=>array(
                                    [
                                        'fields'=>array(

                                            ['field_type'=>'span','content'=>'मिति'],

                                            ['field_type'=>'input','class'=>'date-picker','name'=>'sifaris_body_applied_date','validation'=>'required|string|max:191','placeholder'=>'मिति'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'text_bold','content'=>'कार्यालयको नाम र छाप'],
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
                                            ['field_type'=>'span','class'=>'text_bold','content'=>'निवेदक/निबेदिका'],

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
        $data = NagariktaPramanPatra::where('deleted','=','0')->get();
        if($request->ajax()) {
            if (!empty($request->nibedak_name)) {
                $data = NagariktaPramanPatra::where('deleted','=','0')
                    ->where('applicant_name_bibaran', 'LIKE', '%'.$request->nibedak_name.'%')
                    ->get();
            }
            if (!empty($request->citizenship_no)) {
                $data = NagariktaPramanPatra::where('deleted','=','0')->
                where('applicant_citizenship_number', 'LIKE', '%'.$request->citizenship_no.'%')->get();
            }
            if(!empty($request->sifaris_no)){
                $data=NagariktaPramanPatra::where('deleted','=','0')
                    ->where('id','=',$request->sifaris_no)->get();
            }


            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="'.route('nagarikta-pramanpatra.show',$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="show" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.route('nagarikta-pramanpatra.edit',['nagarikta_pramanpatra'=>$row['id']]).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="edit" data-target="#myModal"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-sm btn-danger delete-nibedan" data-id="'.$row['id'].'" id="deleteDarta"><i class="fa fa-trash"></i></a>
                    </div>';
                })
                ->rawColumns(['actions','files'])
                ->make(true);
        }
        $data['date'] = DateConverter::fromEnglishDate(date('Y'), date('m'), date('d'))->toNepaliDate();
        return view('sifaris.pages.index_page', ['data'=>$data,'view_array'=>$this->view_array]);
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
        $nagariktaPramanPatra=new NagariktaPramanPatra();
        $nagariktaPramanPatra=$this->set_values_in_fields($request,$nagariktaPramanPatra,$this->view_array);

        $nagariktaPramanPatra->submitted_by=Auth::id();
        if($nagariktaPramanPatra->save())
        {
            return Redirect::route('nagarikta-pramanpatra.show',$nagariktaPramanPatra->id)->with('success','सफलतापूर्वक स्टोर गरियो');
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
        $nagariktaPramanPatra=NagariktaPramanPatra::where('id','=',$id)->get()->first();
        return view('sifaris.pages.main_show_page',['model'=>$nagariktaPramanPatra,'view_array'=>$this->view_array]);
    }


    public function show_default($id)
    {

        $nagariktaPramanPatra=NagariktaPramanPatra::where('id','=',$id)->get()->first();
        return view('sifaris.pages.show_page',['model'=>$nagariktaPramanPatra,'view_array'=>$this->view_array]);
    }


    function show_pdf($id)
    {
        $nagariktaPramanPatra=NagariktaPramanPatra::where('id','=',$id)->get()->first();
//        return view('pages.show_page',['model'=>$NagariktaPramanPatra,'view_array'=>$this->view_array]);
        $pdf = SnappyPdf::loadView('sifaris.pages.show_page',['model'=>$nagariktaPramanPatra,'view_array'=>$this->view_array]);
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
        $nagariktaPramanPatra=NagariktaPramanPatra::where('id','=',$id)->get()->first();

        return view('sifaris.pages.edit_page',['model'=>$nagariktaPramanPatra,'view_array'=>$this->view_array]);
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
        $nagariktaPramanPatra=NagariktaPramanPatra::where('id','=',$id)->get()->first();
        $nagariktaPramanPatra=$this->set_values_in_fields($request,$nagariktaPramanPatra,$this->view_array);
        if($nagariktaPramanPatra->save())
        {
            return Redirect::route('nagarikta-pramanpatra.show',$nagariktaPramanPatra->id)->with('success','सफलतापूर्वक स्टोर गरियो');
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
        return (NagariktaPramanPatra::where('id','=',$id)->update(['deleted'=>1])) ?
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
