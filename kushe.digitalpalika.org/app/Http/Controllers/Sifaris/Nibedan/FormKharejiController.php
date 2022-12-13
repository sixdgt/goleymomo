<?php

namespace App\Http\Controllers\Sifaris\Nibedan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sifaris\SifarisAbstractController;
use App\Models\Sifaris\Nibedan\FormKhareji;
use Illuminate\Http\Request;
use Krishnahimself\DateConverter\DateConverter;
use Yajra\DataTables\Facades\DataTables;

class FormKharejiController extends SifarisAbstractController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->model=new FormKhareji();
        $this->setViewArray(
            array(
                'form_store_url'=>'form-khareji.store',
                'form_update_url'=>'form-khareji.update',
                'form_destroy_url'=>'form-khareji.destroy',
                'back_url'=>'form-khareji.index',
                'form_title'=>'फर्म खारेजी',


                'create_page_url'=>'form-khareji.create',
                'index_page_url'=>'form-khareji.index',
                'show_page_url'=>'form-khareji.show',
                'form_edit_url'=>'form-khareji.edit',
                'default_view_url'=>'form-khareji.default',
                'pdf_view_url'=>'form-khareji.pdf',
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
                                        ['field_type'=>'span','class'=>'text_bold font-size','content'=>'अनुसूची १५.३'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold font-size','content'=>'प्राइभेट तथा साझेदारी फर्म खारेजीको लागि निवेदन'],

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
                                    'col_no'=>'10',
                                    'rows'=>array(
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'span','content'=>'श्रीमान्‌'],
                                                ['field_type'=>'input','name'=>'sifaris_to_designation','validation'=>'required|string|max:191','placeholder'=>''],
                                                ['field_type'=>'span','content'=>'ज्यू'],
                                            )
                                        ],
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'input','name'=>'sifaris_to_palika_name','validation'=>'required|string|max:191','placeholder'=>''],

                                            )
                                        ],
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'input','name'=>'sifaris_to_address','validation'=>'required|string|max:191','placeholder'=>''],
                                                ['field_type'=>'span','content'=>','],
                                                ['field_type'=>'input','name'=>'sifaris_to_district','validation'=>'required|string|max:191','placeholder'=>''],

                                            )
                                        ],


                                    )
                                ],
//                                [
//                                    'col_no'=>'1',
//                                    'rows'=>array(
//                                        [
//                                            'fields'=>array(
//                                                ['field_type'=>'span','class'=>'','content'=>'.'],
//
//                                            )
//                                        ],
//                                    )
//                                ],

                                [
                                    'col_no'=>'2',
                                    'rows'=>array(
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'div','style'=>'width:130px; height:130px; border:1px solid black;','class'=>'text-center','content'=>'रु.१० को टिकट'],
                                            )
                                        ],

                                    )
                                ],


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
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'center',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'विषय: फर्म खारेजी सम्बन्धमा ।'],
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
                                        ['field_type'=>'span','content'=>'उपयुक्त सम्बन्धमा मेरो नाममा त्यस'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_palika_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'मा व्यापारिक प्रयोजनका लागि दर्ता भएको'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_form_type','placeholder'=>'','option_type'=>'static','options'=>['प्राइभेट फर्म'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'नं.'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_form_no','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'को'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_form_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'नामको फर्म'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_form_khareji_reason','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'कारणले खारेज गरी पाउन रु. १० को टिकट टाँसी यो निवेदन दिएको छु। उक्त फर्मको नामबाट नेपाल सरकार र अन्य कुनै निकायमा कुनै राजस्व र अन्य रकम बुझाउन बाँकी छैन। कुनै 
                                        किसिमको रकम वा राजस्व बुझाउन बाँकी देखिएमा पछि कुनै उजुरबाजुर नगरी सम्बन्धित निकायमा बुझाउन मेरो मन्जुरी छ। नियमानुसार लाग्ने दस्तुर लिई'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_form_own_type','placeholder'=>'','option_type'=>'static','options'=>['मेरो'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'नामको उक्त फर्म खारेज गरी पाउन श्रीमान्‌ समक्ष अनुरोध गर्दछु।'],

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
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'संलग्न कागजातहरु'],
                                    )
                                ],
                                [

                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'१. सक्कल प्रमाणपत्र'],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'२. आयकर दर्ता प्रमाणपत्रको प्रतिलिपि'],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'३. कर तिरेको निस्सा'],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'४. लेखा परीक्षण प्रतिवेदन'],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'५. अन्य (भएमा उल्लेख गर्ने)'],
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
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'निवेदक/निबेदिका'],

                                    )
                                ],
                                [
                                    'fields'=>array(

                                        ['field_type'=>'span','content'=>'दस्तखत:'],
                                        ['field_type'=>'input','name'=>'body_applicant_sign','validation'=>'required|string|max:191','placeholder'=>''],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'नाम/थर:'],
                                        ['field_type'=>'input','name'=>'body_applicant_full_name','validation'=>'required|string|max:191','placeholder'=>'नाम/थर'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'ठेगाना:'],
                                        ['field_type'=>'input','name'=>'body_applicant_address','validation'=>'required|string|max:191','placeholder'=>'ठेगाना'],

                                    )
                                ],
                                [
                                    'fields'=>array(

                                        ['field_type'=>'span','content'=>'फर्मको छाप:'],
                                        ['field_type'=>'input','name'=>'body_form_stamp','validation'=>'required|string|max:191','placeholder'=>''],
                                    )
                                ]

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
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'औंठा छाप'],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'table','table_title'=>['दायाँ','बाया'],'row_num'=>'1','table_class'=>'width300 float-right','td_class'=>'height150'],

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
    }

    public function index(Request $request)
    {
        $data = FormKhareji::where('deleted','=','0')->get();
        if($request->ajax()) {
            if (!empty($request->nibedak_name)) {
                $data = FormKhareji::where('deleted','=','0')
                    ->where('applicant_name_bibaran', 'LIKE', '%'.$request->nibedak_name.'%')
                    ->get();
            }
            if (!empty($request->citizenship_no)) {
                $data = FormKhareji::where('deleted','=','0')->
                where('applicant_citizenship_number', 'LIKE', '%'.$request->citizenship_no.'%')->get();
            }
            if(!empty($request->sifaris_no)){
                $data=FormKhareji::where('deleted','=','0')
                    ->where('id','=',$request->sifaris_no)->get();
            }


            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="'.route($this->getViewArray()["show_page_url"],$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="show" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.route($this->getViewArray()["form_edit_url"],['form_khareji'=>$row['id']]).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="edit" data-target="#myModal"><i class="fa fa-pencil"></i></a>
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
