<?php

namespace App\Http\Controllers\Sifaris\GarJagga;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sifaris\SifarisAbstractController;
use App\Models\Sifaris\GarJagga\ChauhaddhiSifaris;
use App\Models\Sifaris\GarJagga\JotBhokChalanSifaris;
use Illuminate\Http\Request;

class ChauhaddhiSifarisController extends SifarisAbstractController
{
    public function __construct()
    {
        $this->model=new ChauhaddhiSifaris();

        $this->model_class=ChauhaddhiSifaris::class;
        $this->setViewArray(
            array(
                'form_store_url'=>'chauhadhi-sifaris.store',
                'form_update_url'=>'chauhadhi-sifaris.update',
                'form_destroy_url'=>'chauhadhi-sifaris.destroy',
                'back_url'=>'chauhadhi-sifaris.index',
                'form_title'=>'चौहद्दी सिफारिस',


                'create_page_url'=>'chauhadhi-sifaris.create',
                'index_page_url'=>'chauhadhi-sifaris.index',
                'show_page_url'=>'chauhadhi-sifaris.show',
                'form_edit_url'=>'chauhadhi-sifaris.edit',
                'default_view_url'=>'chauhadhi-sifaris.default',
                'pdf_view_url'=>'chauhadhi-sifaris.pdf',
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
                        'div-class-name'=>'margin-top-10',
                        'flex-div'=>array(
                            'position'=>'left',
                            'cols'=>array(
                                [
                                    'col_no'=>'5',
                                    'rows'=>array(
                                        [
                                            'fields'=>array(
                                                [
                                                    'field_type'=>'custom_field',
                                                    'view'=>'sifaris.pages.custom_views.nagarikta.nagarikta_sifaris_top_view',
                                                    'js'=>'',
                                                    'css'=>''
                                                ],

                                            )
                                        ]
                                    ),
                                ],
                            )
                        )
                    ],

                    [
                        'div-class-name'=>'margin-top3 text-red',
                        'flex-div'=>array(
                            'position'=>'center',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'बरेङ गाउँपालिका'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold font-size','content'=>'१ नं वडा कार्यालय'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'बरेङ-१,धल्लुबाँस्कोट, बागलुङ'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'गण्डकी प्रदेश, नेपाल'],

                                    )
                                ]

                            )
                        )
                    ],

                    [
                        'div-class-name'=>'margin-top3',
                        'flex-div'=>array(
                            'position'=>'end',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'मिति :'],
                                        ['field_type'=>'input','class'=>'date-picker','name'=>'applied_date','placeholder'=>'मिति','validation'=>'required|string|max:191'],

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
                                        ['field_type'=>'span','content'=>'पत्र संख्या :'],
                                        ['field_type'=>'input','class'=>'','name'=>'patra_no','placeholder'=>'पत्र संख्या','validation'=>'required|string|max:191'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'चलानी नं. :'],
                                        ['field_type'=>'input','class'=>'','name'=>'chalani_no','placeholder'=>'चलानी नं.','validation'=>'required|string|max:191'],

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
                                        ['field_type'=>'span','content'=>'श्री'],
                                        ['field_type'=>'select','class'=>'','name'=>'office_type','placeholder'=>'','option_type'=>'static','options'=>['मालपोत कार्यालय'],'validation'=>'required|string|max:191'],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'input','class'=>'','name'=>'office_address','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'office_district_name','placeholder'=>'','validation'=>'required|string|max:191'],
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
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'विषय:चौहद्वी सिफारिस सम्बन्धमा।'],
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
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'श्री जो जस्‌ संग सम्बन्ध राख्दछ।'],
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
                                        ['field_type'=>'span','content'=>'प्रस्तुत बिषयमा यस जिल्ला'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_district_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_current_palika_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_current_palika_type','placeholder'=>'','option_type'=>'static','options'=>$this->palika_types,'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>',वडा नं'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_ward_no','placeholder'=>'','validation'=>'required|np_integer:191'],
                                        ['field_type'=>'span','content'=>'बस्ने'],
                                        ['field_type'=>'span','content'=>'नाममा नम्बरी दर्ता कायम रहेको साविक जिल्ला'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_jagga_sabik_district','placeholder'=>'','option_type'=>'static','options'=>$this->districts,'validation'=>'required|string|max:191'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_jagga_sabik_palika_name','placeholder'=>'','option_type'=>'static','options'=>$this->palikas,'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>',वडा नं'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_jagga_sabik_ward_no','placeholder'=>'','validation'=>'required|np_integer:191'],
                                        ['field_type'=>'span','content'=>'हाल जिल्ला'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_jagga_current_district','placeholder'=>'','option_type'=>'static','options'=>$this->districts,'validation'=>'required|string|max:191'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_jagga_current_palika_name','placeholder'=>'','option_type'=>'static','options'=>$this->palikas,'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>',वडा नं'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_jagga_current_ward_no','placeholder'=>'','validation'=>'required|np_integer:191'],
                                        ['field_type'=>'span','content'=>'को कित्ता नम्बर'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_kitta_no','placeholder'=>'','validation'=>'required|np_integer:191'],

                                        ['field_type'=>'span','content'=>'को क्षेत्रफल'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_jagga_area','placeholder'=>'','validation'=>'required|np_double:191'],
                                        ['field_type'=>'span','content'=>'जमिनको निजको निबेदन अनुसार हालसम्मको चौहटद्दी तपशिल अनुसार रहेको व्यहोरा अनुरोध छ ।'],


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
                                        ['field_type'=>'span','content'=>'पूर्व:'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_jagga_east','placeholder'=>'','validation'=>'required|string|max:191'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'पश्चिम:'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_jagga_west','placeholder'=>'','validation'=>'required|string|max:191'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'उत्तर:'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_jagga_north','placeholder'=>'','validation'=>'required|string|max:191'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'दक्षिण:'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_jagga_south','placeholder'=>'','validation'=>'required|string|max:191'],

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
//                                        ['field_type'=>'span','content'=>'निवेदक/निबेदिका'],

                                    )
                                ],
                                [
                                    'fields'=>array(

                                        ['field_type'=>'span','content'=>'दस्तखत'],
                                        ['field_type'=>'input','name'=>'submitted_person_sign','validation'=>'','placeholder'=>''],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'नाम/थर'],
                                        ['field_type'=>'input','name'=>'submitted_person_name','validation'=>'required|string|max:191','placeholder'=>'नाम/थर'],

                                    )
                                ],

                                [
                                    'fields'=>array(

                                        ['field_type'=>'span','content'=>'पद'],

                                        ['field_type'=>'select','class'=>'','name'=>'submitted_person_post','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['प्रबन्धक']],
                                    )
                                ]

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
                                        ['field_type'=>'input','name'=>'applicant_phone_number','validation'=>'required|np_phone','placeholder'=>'निवेदकको फोन न.  '],

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
        $this->rules=$this->rules;
    }
}
