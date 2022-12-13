<?php

namespace App\Http\Controllers\Sifaris\Nibedan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sifaris\SifarisAbstractController;
use App\Models\Sifaris\Nibedan\JaggaSaghSimangkan;
use Illuminate\Http\Request;
use Krishnahimself\DateConverter\DateConverter;
use Yajra\DataTables\Facades\DataTables;

class JaggaSaghSimangkanController extends SifarisAbstractController
{



    public function __construct()
    {
        $this->model=new JaggaSaghSimangkan();
        $this->setViewArray(
            array(
                'form_store_url'=>'jagga-sagh-simangkan.store',
                'form_update_url'=>'jagga-sagh-simangkan.update',
                'form_destroy_url'=>'jagga-sagh-simangkan.destroy',
                'back_url'=>'jagga-sagh-simangkan.index',
                'form_title'=>'जग्गाको साँघ सिमाङ्कन ।',


                'create_page_url'=>'jagga-sagh-simangkan.create',
                'index_page_url'=>'jagga-sagh-simangkan.index',
                'show_page_url'=>'jagga-sagh-simangkan.show',
                'form_edit_url'=>'jagga-sagh-simangkan.edit',
                'default_view_url'=>'jagga-sagh-simangkan.default',
                'pdf_view_url'=>'jagga-sagh-simangkan.pdf',
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
                        'div-class-name'=>'margin-top-10',
                        'flex-div'=>array(
                            'position'=>'start',
                            'cols'=>array(
                                [
                                    'col_no'=>'10',
                                    'rows'=>array(
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'span','content'=>'श्री प्रमुख प्रशासकीय अधिकृत ज्यू,‌'],

                                            )
                                        ],
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'input','name'=>'palika_name','validation'=>'required|string|max:191','placeholder'=>''],
                                                ['field_type'=>'span','content'=>'को कार्यालय'],

                                            )
                                        ],
                                        [
                                            'fields'=>array(
                                                ['field_type'=>'input','name'=>'palika_address','validation'=>'required|string|max:191','placeholder'=>''],
                                                ['field_type'=>'span','content'=>','],
                                                ['field_type'=>'input','name'=>'palika_district','validation'=>'required|string|max:191','placeholder'=>''],

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
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'विषय: जग्गाको साँघ सिमाङ्कन गर्न अमिन खटाई पाउँ बारे ।'],
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
                                        ['field_type'=>'span','class'=>'','content'=>'महोदय,'],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'उपरोक्त सम्बन्धमा म यो विनम्र निवेदन चढाउन आएको व्यहोरा अनुरोध गर्दछु कि जिल्ल'],
                                        ['field_type'=>'input','class'=>'','name'=>'district_body','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'palika_name_body','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'वडा नं.'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'ward_no','placeholder'=>'वडा नं','validation'=>'required|np_integer'],
                                        ['field_type'=>'span','content'=>'साविक'],
                                        ['field_type'=>'select','class'=>'','name'=>'sabik_list','placeholder'=>'','option_type'=>'static','options'=>['माकािपबकाम'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'वडा नं.'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'permanent_ward_no','placeholder'=>'वडा नं','validation'=>'required|np_integer'],

                                        ['field_type'=>'input','class'=>'','name'=>'permanent_tol','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'टोल स्थायी बसोबास गर्ने श्री'],

                                        ['field_type'=>'input','class'=>'','name'=>'father_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'को'],
                                        ['field_type'=>'select','class'=>'','name'=>'child_type','placeholder'=>'','option_type'=>'static','options'=>['छोरा'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'वर्ष'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'age','placeholder'=>'वडा नं','validation'=>'required|np_integer'],
                                        ['field_type'=>'input','class'=>'','name'=>'name','placeholder'=>'','validation'=>'required|string|max:191'],

                                        ['field_type'=>'input','class'=>'','name'=>'body_form_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'को नाममा दर्ता श्रेस्ता कायम रहेको जग्गा'],
                                        ['field_type'=>'input','class'=>'','name'=>'land','placeholder'=>'','validation'=>'required|string|max:191'],


                                        ['field_type'=>'span','content'=>'कित्ता नं.'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'kitta_no','placeholder'=>'','validation'=>'required|np_integer'],
                                        ['field_type'=>'span','content'=>'को जग्गा'],

                                        ['field_type'=>'input','class'=>'','name'=>'land_area_i','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'('],
                                        ['field_type'=>'input','class'=>'','name'=>'land_area_ii','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>')'],


                                        ['field_type'=>'span','content'=>'क्षेत्रफल रहेको जग्गाको साँध सिमाङ्कन गरी पाउन मेरो नागरिकताको प्रमाणपत्रको प्रतिलिपि, जग्गा धनी पुर्जाको प्रतिलिपि, 
                                                                            हालसालै बुझाएको मालपोत रसिदको प्रतिलिपि र नक्शाको फोटोकपी सहित यसै निवेदनमा संलग्न राखी रु'],
                                        ['field_type'=>'input','class'=>'','name'=>'amount_in_digit','placeholder'=>'','validation'=>'required|np_double'],
                                        ['field_type'=>'span','content'=>'/- अक्षरुपि रु'],
                                        ['field_type'=>'input','class'=>'','name'=>'amount_in_word','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'मात्रको भौचर रसिद काटी विनम्र निवेदन चढाउन आएको छु ।'],

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
                                        ['field_type'=>'span','content'=>'नाम:-'],
                                        ['field_type'=>'input','name'=>'applicant_name_body','validation'=>'required|string|max:191','placeholder'=>'नाम/थर'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'ठेगाना:-'],
                                        ['field_type'=>'input','name'=>'applicant_address','validation'=>'required|string|max:191','placeholder'=>'ठेगाना'],

                                        ['field_type'=>'span','content'=>'वडा नं.'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'applicant_ward_no','placeholder'=>'','validation'=>'required|np_integer'],

                                    )
                                ],
                                [
                                    'fields'=>array(

                                        ['field_type'=>'span','content'=>'सम्पर्क नं. :-'],
                                        ['field_type'=>'input','name'=>'contact_no','validation'=>'required|string|max:191','placeholder'=>''],
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
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = JaggaSaghSimangkan::where('deleted','=','0')->get();
        if($request->ajax()) {
            if (!empty($request->nibedak_name)) {
                $data = JaggaSaghSimangkan::where('deleted','=','0')
                    ->where('applicant_name_bibaran', 'LIKE', '%'.$request->nibedak_name.'%')
                    ->get();
            }
            if (!empty($request->citizenship_no)) {
                $data = JaggaSaghSimangkan::where('deleted','=','0')->
                where('applicant_citizenship_number', 'LIKE', '%'.$request->citizenship_no.'%')->get();
            }
            if(!empty($request->sifaris_no)){
                $data=JaggaSaghSimangkan::where('deleted','=','0')
                    ->where('id','=',$request->sifaris_no)->get();
            }


            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="'.route($this->getViewArray()["show_page_url"],$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="show" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.route($this->getViewArray()["form_edit_url"],['jagga_sagh_simangkan'=>$row['id']]).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="edit" data-target="#myModal"><i class="fa fa-pencil"></i></a>
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
