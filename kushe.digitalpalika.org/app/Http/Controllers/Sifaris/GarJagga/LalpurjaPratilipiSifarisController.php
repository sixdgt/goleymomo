<?php

namespace App\Http\Controllers\Sifaris\GarJagga;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sifaris\SifarisAbstractController;
use App\Models\Sifaris\GarJagga\LalpurjaPratilipiSifaris;
use Illuminate\Http\Request;
use Krishnahimself\DateConverter\DateConverter;
use Yajra\DataTables\Facades\DataTables;

class LalpurjaPratilipiSifarisController extends SifarisAbstractController
{
    public function __construct()
    {
        $this->model=new LalpurjaPratilipiSifaris();
        $this->setViewArray(
            array(
                'form_store_url'=>'lalpurja-pratilipi-sifaris.store',
                'form_update_url'=>'lalpurja-pratilipi-sifaris.update',
                'form_destroy_url'=>'lalpurja-pratilipi-sifaris.destroy',
                'back_url'=>'lalpurja-pratilipi-sifaris.index',
                'form_title'=>'लालपुर्जाको प्रतिलिपि सिफारिस',


                'create_page_url'=>'lalpurja-pratilipi-sifaris.create',
                'index_page_url'=>'lalpurja-pratilipi-sifaris.index',
                'show_page_url'=>'lalpurja-pratilipi-sifaris.show',
                'form_edit_url'=>'lalpurja-pratilipi-sifaris.edit',
                'default_view_url'=>'lalpurja-pratilipi-sifaris.default',
                'pdf_view_url'=>'lalpurja-pratilipi-sifaris.pdf',
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
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'center',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'विषयःचार किल्ला सिफारिस सम्बन्धमा'],
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
                        'div-class-name'=>'margin-top3',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'उपरोक्त सम्बन्धमा'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_person_abbreviation','placeholder'=>'','option_type'=>'static','options'=>['श्री'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_person_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'को नाममा समेत संयुक्त दर्ता श्रेस्ता भएको'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_current_palika_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_current_palika_type','placeholder'=>'','option_type'=>'static','options'=>['गाउँपालिका','नगरपालिका'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>',वडा नं'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_current_ward_no','placeholder'=>'','validation'=>'required|np_integer:191'],
                                        ['field_type'=>'span','content'=>'(साविकको ठेगाना'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_sabik_palika_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>',वडा नं'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_sabik_ward_no','placeholder'=>'','validation'=>'required|np_integer:191'],
                                        ['field_type'=>'span','content'=>') कि.नं.'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_kitta_no','placeholder'=>'','validation'=>'required|np_integer:191'],
                                        ['field_type'=>'span','content'=>'को क्षे.फ.'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_jagga_area','placeholder'=>'','validation'=>'required|np_integer:191'],
                                        ['field_type'=>'span','content'=>'भएको जग्गाको जग्गाधनी लाल पुर्जा हराएकोले सोको प्रतिलिपिको सिफारिस गरी पाउँ भनी जिल्ला'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_nibedak_district_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_nibedak_palika_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_nibedak_palika_type','placeholder'=>'','option_type'=>'static','options'=>['गाउँपालिका','नगरपालिका'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>',वडा नं'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_nibedak_ward_no','placeholder'=>'','validation'=>'required|np_integer:191'],
                                        ['field_type'=>'span','content'=>'(साविकको ठेगाना'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_sabik_nibedak_palika_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>',वडा नं'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_sabik_nibedak_ward_no','placeholder'=>'','validation'=>'required|np_integer:191'],
                                        ['field_type'=>'span','content'=>') बस्ने'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_nibedak_abbreviation','placeholder'=>'','option_type'=>'static','options'=>['श्री'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_nibedak_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'ले यस वडा कार्यालयमा निवेदन दिनुभएको हुदाँ सो सम्बन्धमा त्यहाँको नियमानुसार जग्गाधनी प्रमाण पुर्जाको प्रतिलिपि उपलब्ध गराइ दिनुहुन सिफारिस गरिन्छ ।'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'निवेदक'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_nibedak_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'ना.प्र.नं.'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_nibedak_citizenship_no','placeholder'=>'','validation'=>'required|string|max:191'],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'जारी मिति'],
                                        ['field_type'=>'input','class'=>'date-picker','name'=>'body_nibedak_dob','placeholder'=>'','validation'=>'required|string|max:191'],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'पिता'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_nibedak_father_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                    )
                                ],

                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'बाजे'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_nibedak_grand_father_name','placeholder'=>'','validation'=>'required|string|max:191'],
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


    public function index(Request $request)
    {
        $data = LalpurjaPratilipiSifaris::where('deleted','=','0')->get();
        if($request->ajax()) {
            if (!empty($request->nibedak_name)) {
                $data = LalpurjaPratilipiSifaris::where('deleted','=','0')
                    ->where('applicant_name_bibaran', 'LIKE', '%'.$request->nibedak_name.'%')
                    ->get();
            }
            if (!empty($request->citizenship_no)) {
                $data = LalpurjaPratilipiSifaris::where('deleted','=','0')->
                where('applicant_citizenship_number', 'LIKE', '%'.$request->citizenship_no.'%')->get();
            }
            if(!empty($request->sifaris_no)){
                $data=LalpurjaPratilipiSifaris::where('deleted','=','0')
                    ->where('id','=',$request->sifaris_no)->get();
            }


            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="'.route($this->getViewArray()["show_page_url"],$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="show" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.route($this->getViewArray()["form_edit_url"],['lalpurja_pratilipi_sifari'=>$row['id']]).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="edit" data-target="#myModal"><i class="fa fa-pencil"></i></a>
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
