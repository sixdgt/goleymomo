<?php

namespace App\Http\Controllers\Sifaris\Nibedan;

use App\Http\Controllers\Controller;

use App\Http\Controllers\Sifaris\SifarisAbstractController;
use App\Models\Form\Field\Ftext;
use App\Models\Sifaris\Nibedan\ByabasayaDarkhastaNibedan;

use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Krishnahimself\DateConverter\DateConverter;
use Yajra\DataTables\Facades\DataTables;


class ByabasayaDarkhastaNibedanController extends SifarisAbstractController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    private $view_array;
//    private $rules=array();
//    public $messages = [
//        'required' => 'यो क्षेत्र आवश्यक छ।',
//        'string' => 'यो फिल्ड स्ट्रिङ हुनुपर्छ।',
//        'max' => 'यो फिल्डले अधिकतम संख्या :max सम्म मात्र लिन्छ।',
//        'integer'=>'यो फिल्ड अंकमा हुनुपर्छ। ',
//        'numeric'=>'गलत इनपुट !',
//        'unique'=>''
//    ];

    public function __construct()
    {
        $this->view_array=array(
            'form_store_url'=>'byabasaya-darkhasta.store',
            'form_update_url'=>'byabasaya-darkhasta.update',
            'back_url'=>'byabasaya-darkhasta.index',
            'form_title'=>'व्यवसाय दर्ता गर्ने दरखास्त।',


            'index_page_url'=>'byabasaya-darkhasta.index',
            'form_edit_url'=>'byabasaya-darkhasta.edit',
            'default_view_url'=>'byabasaya-darkhasta.default',
            'pdf_view_url'=>'byabasaya-darkhasta.pdf',
            'form_sections'=>array(
                [

                    'div-class-name'=>'div-nibedan-date',
                    'flex-div'=>array(
                        'position'=>'end',
                        'rows'=>array(
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'मिति : '],
                                    ['field_type'=>'input','class'=>'date-picker','name'=>'applied_at','placeholder'=>'मिति','validation'=>'required|string|max:191'],
                                )
                            ]
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
                                    ['field_type'=>'span','content'=>'श्री'],
                                    ['field_type'=>'input','class'=>'','name'=>'designation','placeholder'=>'','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'ज्यू'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'input','class'=>'','name'=>'name_of_authority','placeholder'=>'','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'input','class'=>'','name'=>'authority_office','placeholder'=>'','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'input','class'=>'','name'=>'authority_office_address','placeholder'=>'','validation'=>'required|string|max:191'],
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
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'विषय : व्यवसाय दर्ता गर्ने बारे।'],

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
                    'div-class-name'=>'',
                    'flex-div'=>array(
                        'position'=>'start',
                        'rows'=>array(
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'तल लेखिए बमोजिमको व्यापार व्यवसाय गर्न निम्न लिखित नामको व्यवसाय मेरो नाममा दर्ता गराउन ईच्छुक भएकोले दर्ताको लागि आवश्यक भएको कागजातहरु यसै निवेदनसाथ संलग्न गरी यो निवेदन पेश गरेको छु । लेखिएको व्यहोरामा कुनै कुरा झुट्टा ठहरे कानुन बमोजिम सहँला बुझौंला ।'],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'१. व्यवसायको पुरा नाम (नेपालीमा):-'],
                                    ['field_type'=>'input','class'=>'','name'=>'business_name_nepali','placeholder'=>'व्यवसायको पुरा नाम','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'२. व्यवसायको पुरा नाम (अंग्रेजिको ठुलो अक्षरमा) :-'],
                                    ['field_type'=>'input','class'=>'en-input-text','name'=>'business_name_english','placeholder'=>'business full name','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'३. व्यवसायको पुरा ठेगाना :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'business_district','placeholder'=>'जिल्ला','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'जिल्ला'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'business_ward_no','placeholder'=>'वडा नं','validation'=>'required|np_integer'],
                                    ['field_type'=>'span','content'=>'वडा नं'],
                                    ['field_type'=>'input','class'=>'','name'=>'business_tol','placeholder'=>'टोल','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'टोल'],
                                    ['field_type'=>'input','class'=>'','name'=>'business_phone_num','placeholder'=>'फोन नं','validation'=>'required|np_phone:191'],
                                    ['field_type'=>'span','content'=>'फोन नं'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'४. व्यवसायमा लगाउने पूँजी रु'],
                                    ['field_type'=>'input','class'=>'','name'=>'business_deposit_amount','placeholder'=>'पूँजी','validation'=>'required|np_double'],
                                    ['field_type'=>'span','content'=>'(अक्षरेपी रु'],
                                    ['field_type'=>'input','class'=>'','name'=>'business_deposit_word','placeholder'=>'','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>')'],
                                )
                            ],

                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'५. व्यवसायको उद्देश्य :-'],
                                    ['field_type'=>'select','class'=>'','name'=>'business_purpose','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['स्थानीय व्यापार']],
                                )
                            ],

                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'६. व्यवसायले कारोवार गर्ने मुख्य वस्तुको विवरण'],
                                    ['field_type'=>'input','class'=>'','name'=>'business_model','placeholder'=>'','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'७. प्रोप्राइटरको पुरा नाम :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'proprieter_name','placeholder'=>'प्रोप्राइटरको पुरा नाम','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'स्थायी ठेगाना (नागरिकता अनुसार :-(जिल्ला'],
                                    ['field_type'=>'input','class'=>'','name'=>'proprieter_district','placeholder'=>'जिल्ला','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'वडा न.'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'proprieter_ward_no','placeholder'=>'वडा नं','validation'=>'required|np_integer'],

                                    ['field_type'=>'span','content'=>'टोलको नाम'],
                                    ['field_type'=>'input','class'=>'','name'=>'proprieter_tol','placeholder'=>'टोलको नाम','validation'=>'required|string|max:191'],

                                    ['field_type'=>'span','content'=>'फोन नं'],
                                    ['field_type'=>'input','class'=>'','name'=>'proprieter_phone','placeholder'=>'फोन नं','validation'=>'required|np_phone:191'],

                                    ['field_type'=>'span','content'=>'नागरिकता नं'],
                                    ['field_type'=>'input','class'=>'','name'=>'proprieter_citizenship_num','placeholder'=>'नागरिकता नं','validation'=>'required|string|max:191'],

                                    ['field_type'=>'span','content'=>'जिल्ला'],
                                    ['field_type'=>'input','class'=>'','name'=>'proprieter_citizenship_district','placeholder'=>'जिल्ला','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'ना.प्र. जारी मिती'],
                                    ['field_type'=>'input','class'=>'date-picker','name'=>'proprieter_citizenship_issue_date','placeholder'=>'ना.प्र. जारी मिती','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'हालको ठेगाना:-'],
                                    ['field_type'=>'span','content'=>'(जिल्ला'],
                                    ['field_type'=>'input','class'=>'','name'=>'proprieter_current_district','placeholder'=>'जिल्ला','validation'=>'required|string|max:191'],

                                    ['field_type'=>'span','content'=>'वडा नं'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'proprieter_current_ward_no','placeholder'=>'वडा नं','validation'=>'required|np_integer'],
                                    ['field_type'=>'span','content'=>'टोलको नाम'],
                                    ['field_type'=>'input','class'=>'','name'=>'proprieter_current_tol','placeholder'=>'टोलको नाम','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>')'],
                                    )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'८.प्रोप्राइटरको तिन पुस्तेनाम,ठेगाना :-'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'(क) प्रोप्राइटरको बाजेको नाम :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'proprieter_grand_father_name','placeholder'=>'बाजेको नाम','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'ठेगाना :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'proprieter_grand_father_address','placeholder'=>'ठेगाना','validation'=>'required|string|max:191'],

                                )
                            ],

                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'(ख) प्रोप्राइटरको बाबुको नाम :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'proprieter_father_name','placeholder'=>' बाबुको नाम','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'ठेगाना :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'proprieter_father_address','placeholder'=>'ठेगाना','validation'=>'required|string|max:191'],

                                )

                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'(ग) प्राप्राइटरको विवाहित महिला भएमा पतिको नाम :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'proprieter_husband_name','placeholder'=>' पतिको नाम','validation'=>'string|max:191'],
                                    ['field_type'=>'span','content'=>'ठेगाना :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'proprieter_husband_address','placeholder'=>'ठेगाना','validation'=>'string|max:191'],

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
                                    ['field_type'=>'span','content'=>'निवेदक'],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'प्रोप्राइटरको नाम :'],
                                    ['field_type'=>'input','class'=>'','name'=>'kabuliyatnama_applicant_name','placeholder'=>'प्रोप्राइटरको नाम','validation'=>'required|string|max:191'],
                                )

                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'सही :'],
                                    ['field_type'=>'input','class'=>'','name'=>'kabuliyatnama_applicant_signature','placeholder'=>'सही','validation'=>'required|string|max:191'],
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
                                    ['field_type'=>'table','table_title'=>['दायाँ','बाया'],'row_num'=>'1','table_class'=>'width300 float-right height150'],

                                )
                            ],


                        )
                    )
                ],


                [
                    'div-class-name'=>'div-nibedan-date',
                    'flex-div'=>array(
                        'position'=>'center',
                        'rows'=>array(
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'कबुलियतनामा']
                                )
                            ]
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
                                    ['field_type'=>'span','content'=>'लिखितम्‌'],
                                    ['field_type'=>'input','class'=>'','name'=>'kabuliyatnama_grand_father_name','placeholder'=>'बजेको नाम','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'को '],
                                    ['field_type'=>'select','class'=>'','name'=>'kabuliyatnama_relationship_grand_father','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['नाति','नातिनी']],
                                    ['field_type'=>'input','class'=>'','name'=>'kabuliyatnama_father_name','placeholder'=>' बुवाको नाम','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'को '],
                                    ['field_type'=>'select','class'=>'','name'=>'kabuliyatnama_relationship_father','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['छोरा','छोरी']],
                                    ['field_type'=>'input','class'=>'','name'=>'kabuliyatnama_applicant_address','placeholder'=>'ठेगाना','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'बस्ने वर्ष'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'kabuliyatnama_applicant_age','placeholder'=>'उमेर','validation'=>'required|np_integer'],
                                    ['field_type'=>'span','content'=>'को '],
                                    ['field_type'=>'input','class'=>'','name'=>'kabuliyatnama_proprieter_name_application','placeholder'=>'नाम','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'आगे'],
                                    ['field_type'=>'input','class'=>'','name'=>'kabuliyatnama_applicant_business_name','placeholder'=>'व्यवसायको नाम','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'नामले व्यवसाय दर्ता गर्न मैले त्यस वडा कार्यालयमा दरखास्त दिएकोमा उक्त व्यवसाय सम्बन्धमा प्रचलित ऐन कानुन र यस नगरपालिकाको शार्त तथा नियम समेत पालना गरी काम गर्नेछु। नामले व्यवसाय दर्ता गर्न मैले त्यस वडा कार्यालयमा दरखास्त दिएकोमा उक्त व्यवसाय सम्बन्धमा प्रचलित ऐन कानुन र यस नगरपालिकाको शार्त तथा नियम समेत पालना गरी काम गर्नेछु। सो पालना गर्ने कुरामा कबुलियत समेत गर्न तपाईंको मंजुर छ / छैन भनि वडा कार्यालयबाट सोधनी भएकोमा मेरो चित्त बुझ्यो। यसमा प्रचलित ऐन कानुन र यस नगरपालिकाको शर्त तथा नियम उल्लङघन गरेको देखीएमा ऐन कानुन बमोजिम सहँला.बुझाँउला भनि मेरो मनोमानी राजी खुशी सँग यो कबुलियतनामाको कागज लेखी '],
                                    ['field_type'=>'input','class'=>'','name'=>'kabuliyatnama_applied_office','placeholder'=>'','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'वडा नं'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'kabuliyatnama_applied_office_ward_no','placeholder'=>'','validation'=>'required|np_integer'],
                                    ['field_type'=>'span','content'=>'को कार्यालयमा चढाएँ।'],
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
                                    ['field_type'=>'span','content'=>'ईतिसंवत'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'kabuliyatnama_year','placeholder'=>'साल','validation'=>'required|np_integer'],
                                    ['field_type'=>'span','content'=>'साल'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'kabuliyatnama_month','placeholder'=>'महिना','validation'=>'required|np_integer'],
                                    ['field_type'=>'span','content'=>'महिना'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'kabuliyatnama_date','placeholder'=>'गतेरोज','validation'=>'required|np_integer'],
                                    ['field_type'=>'span','content'=>'गतेरोज'],
//                                    ['field_type'=>'input','class'=>'','name'=>'kabuliyatnama_grand_father_name','placeholder'=>'बजेको नाम','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'शुभम्‌'],
                                )
                            ],
                        )
                    )
                ],

                [
                    'div-class-name'=>'div-nibedan-date',
                    'flex-div'=>array(
                        'position'=>'center',
                        'rows'=>array(
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'(सनाखत सम्बन्धी कागजात)']

                                )
                            ]
                        )
                    )
                ],
                [
                    'div-class-name'=>'div-nibedan-date',
                    'flex-div'=>array(
                        'position'=>'start',
                        'rows'=>array(
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'यसमा लेखिएको फारम तथा कबुलियतनामा म आफै स्वयं'],
                                    ['field_type'=>'input','class'=>'','name'=>'sanakhat_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'को'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'sanakhat_ward_no','placeholder'=>'','validation'=>'required|np_integer'],
                                    ['field_type'=>'span','content'=>'नं वडा कार्यालयमा उपस्थित भई दर्ता गराएको हुँ । निवेदन सँग संलग्न नागरिकता प्रमाणपत्रको प्रतिलिपी फोटो तथा माथी उल्लेखित सम्पुर्ण व्यहोरा समेत साँचो हो । कुनै कुरा फरक परेमा कानुन बमोजिम सहँला बुझौंला भनी सनाखत गर्ने ।'],
                                )
                            ]
                        )
                    )
                ],
                [
                    'div-class-name'=>'div-nibedan-date',
                    'flex-div'=>array(
                        'position'=>'end',
                        'rows'=>array(
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'प्रोप्राइटरको सही :-'],
                                )
                            ],
                            [
                                'fields'=>array(


                                    ['field_type'=>'span','content'=>'नाम:'],
                                    ['field_type'=>'input','class'=>'','name'=>'sanakhat_proprieter_name','placeholder'=>'','validation'=>'required|string|max:191'],

                                )
                            ],
                            [
                                'fields'=>array(


                                    ['field_type'=>'span','content'=>'मिति:'],
                                    ['field_type'=>'input','class'=>'','name'=>'sanakhat_date','placeholder'=>'','validation'=>'required|string|max:191'],

                                )
                            ]
                        )
                    )
                ],

                [
                    'div-class-name'=>'div-nibedan-date',
                    'flex-div'=>array(
                        'position'=>'center',
                        'rows'=>array(
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'(वडा कार्यालयले मात्र भने)']

                                )
                            ]
                        )
                    )
                ],
                [
                    'div-class-name'=>'div-nibedan-date',
                    'flex-div'=>array(
                        'position'=>'left',
                        'rows'=>array(
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'श्रीमान्‌']

                                )
                            ]
                        )
                    )
                ],

                [
                    'div-class-name'=>'div-nibedan-date',
                    'flex-div'=>array(
                        'position'=>'left',
                        'rows'=>array(
                            [
                                'fields'=>array(

                                    ['field_type'=>'input','class'=>'','name'=>'tippani_business_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'नामक व्यवसाय'],
                                    ['field_type'=>'input','class'=>'','name'=>'tippani_proprieter_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'को नाममा दर्ता गरी पाउन आवश्यक सबै कागजातहरु रितपुर्वक पेश हन आएकोले माग बमोजिम दर्ता गरिदिन मनासिव रु'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'tippani_manasib_amount','placeholder'=>'','validation'=>'required|np_double'],
                                    ['field_type'=>'span','content'=>'अक्षरेपी रु'],
                                    ['field_type'=>'input','class'=>'','name'=>'tippani_rajaswa_amount','placeholder'=>'','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'राजश्व लिई निजको नाममा व्यवसाय दर्ता गरी प्रमाणपत्र दिनको निमित्त निर्णयार्थ पेश गरेको छु ।'],

                                )
                            ]
                        )
                    )
                ],
                [
                    'div-class-name'=>'div-nibedan-date',
                    'flex-div'=>array(
                        'position'=>'left',
                        'rows'=>array(
                            [
                                'fields'=>array(


                                    ['field_type'=>'span','content'=>'पेश गर्ने'],
                                    ['field_type'=>'input','class'=>'','name'=>'tippani_applied_by','placeholder'=>'','validation'=>'required|string|max:191'],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'सदर गर्ने'],
                                    ['field_type'=>'input','class'=>'','name'=>'tippani_processed_by','placeholder'=>'','validation'=>'required|string|max:191'],

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
        foreach ($this->view_array['form_sections'] as $form_section)
        {
            foreach ($form_section['flex-div']['rows'] as $row)
            {
                foreach ($row['fields'] as $field)
                {
                    if($field['field_type']=='input' || $field['field_type']=='select'){
                        $this->rules[$field['name']]=$field['validation'];
                    }
                }
            }
        }
    }


    public function index(Request $request)
    {
        $data = ByabasayaDarkhastaNibedan::where('deleted','=','0')->get();;
        if($request->ajax()){

            if (!empty($request->nibedak_name)) {
                $data = ByabasayaDarkhastaNibedan::where('deleted','=','0')
                    ->where('applicant_name_bibaran', 'LIKE', '%'.$request->nibedak_name.'%')->get();
            }
            if (!empty($request->citizenship_no)) {
                $data = ByabasayaDarkhastaNibedan::where('deleted','=','0')->
                where('applicant_citizenship_number', 'LIKE', '%'.$request->citizenship_no.'%')->get();
            }
            if(!empty($request->sifaris_no)){
                $data=ByabasayaDarkhastaNibedan::where('deleted','=','0')
                    ->where('id','=',$request->sifaris_no)->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="'.route('byabasaya-darkhasta.show',$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="show" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.route('byabasaya-darkhasta.edit',$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="edit" data-target="#myModal"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-sm btn-danger delete-nibedan" data-id="'.$row['id'].'" id="deleteDarta"><i class="fa fa-trash"></i></a>
                    </div>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        $data['date'] = DateConverter::fromEnglishDate(date('Y'), date('m'), date('d'))->toNepaliDate();
        return view('sifaris.nibedan.byabasaya_darkhasta.index', $data);

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
        $byabasayaDarkhastaNibedan=new ByabasayaDarkhastaNibedan();
        $byabasayaDarkhastaNibedan=$this->set_values_in_fields($request,$byabasayaDarkhastaNibedan,$this->view_array);


        $byabasayaDarkhastaNibedan->submitted_by=Auth::id();
        if($byabasayaDarkhastaNibedan->save())
        {

//            if($request->has('uploaded_file_names') && $request->has('document_file_title'))
//            {
//
//                foreach ($request->document_file_title as $key=>$file_title)
//                {
//                    File::move(storage_path('app/files/temp-files/'.$request->uploaded_file_names[$key]), public_path('files/sifaris/nibedan'.$request->uploaded_file_names[$key]));
//                    $file_path='files/sifaris/nibedan/'.$request->uploaded_file_names[$key];
//                    $byabasayaDarkhastaNibedan->files()->create(["file_title"=>$file_title, "url"=>$file_path]);
//
//                }
//
//            }
            return Redirect::route('byabasaya-darkhasta.show',$byabasayaDarkhastaNibedan->id)->with('success','सफलतापूर्वक स्टोर गरियो');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show_default($id)
    {
//        echo $id;
        $byabasayaDarkhastaNibedan=ByabasayaDarkhastaNibedan::where('id','=',$id)->get()->first();
        return view('sifaris.pages.show_page',['model'=>$byabasayaDarkhastaNibedan,'view_array'=>$this->view_array]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $byabasayaDarkhastaNibedan=ByabasayaDarkhastaNibedan::where('id','=',$id)->get()->first();
//        return view('sifaris.nibedan.byabasaya_darkhasta.show',['model'=>$byabasayaDarkhastaNibedan,'view_array'=>$this->view_array]);
        return view('sifaris.pages.main_show_page',['model'=>$byabasayaDarkhastaNibedan,'view_array'=>$this->view_array]);
    }

    public function edit($id)
    {
        $model=ByabasayaDarkhastaNibedan::where('id','=',$id)->get()->first();
        return view('sifaris.pages.edit_page',['model'=>$model,'view_array'=>$this->view_array]);
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

        $byabasayaDarkhastaNibedan=ByabasayaDarkhastaNibedan::where('id','=',$id)->get()->first();
        $byabasayaDarkhastaNibedan=$this->set_values_in_fields($request,$byabasayaDarkhastaNibedan,$this->view_array);

        $byabasayaDarkhastaNibedan->proprieter_street='fdsaf';
        $byabasayaDarkhastaNibedan->proprieter_current_street='fsaf';
        $byabasayaDarkhastaNibedan->submitted_by=Auth::id();
        if($byabasayaDarkhastaNibedan->save())
        {
//            if($request->has('uploaded_file_names') && $request->has('document_file_title'))
//            {
//
//                foreach ($request->document_file_title as $key=>$file_title)
//                {
//                    File::move(storage_path('app/files/temp-files/'.$request->uploaded_file_names[$key]), public_path('files/sifaris/nibedan'.$request->uploaded_file_names[$key]));
//                    $file_path='files/sifaris/nibedan/'.$request->uploaded_file_names[$key];
//                    $byabasayaDarkhastaNibedan->files()->create(["file_title"=>$file_title, "url"=>$file_path]);
//
//                }
//
//            }
            return Redirect::route('byabasaya-darkhasta.show',$byabasayaDarkhastaNibedan->id)->with('success' , 'सफलतापूर्वक अपडेट गरियो');
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

        return (ByabasayaDarkhastaNibedan::where('id','=',$id)->update(['deleted'=>1])) ?
            response()->json(
                [
                    'status' => 200,
                    'message' => 'डाटा सफलतापूर्वक मेटिएको छ।'
                ]
            ) : response()->json(
                [
                    'status' => 400,
                    'message' => 'सर्भर त्रुटि।'
                ]
            );
    }

    function show_pdf($id)
    {
        $byabasayaDarkhastaNibedan=ByabasayaDarkhastaNibedan::where('id','=',$id)->get()->first();
//        return view('sifaris.pages.show_page',['model'=>$aadhibasiPramanitNibedan,'view_array'=>$this->view_array]);
        $pdf = SnappyPdf::loadView('sifaris.pages.show_page',['model'=>$byabasayaDarkhastaNibedan,'view_array'=>$this->view_array]);
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
}
