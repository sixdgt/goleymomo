<?php

namespace App\Http\Controllers\Sifaris\GarJagga;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sifaris\SifarisAbstractController;
use App\Models\Sifaris\GarJagga\GarBatoPramanit;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Krishnahimself\DateConverter\DateConverter;
use Yajra\DataTables\Facades\DataTables;

class GarBatoPramanitController extends SifarisAbstractController
{
    public function __construct()
    {
        $this->model=new GarBatoPramanit();
        $this->setViewArray(
            array(
                'form_store_url'=>'gar-bato-pramanit.store',
                'form_update_url'=>'gar-bato-pramanit.update',
                'form_destroy_url'=>'gar-bato-pramanit.destroy',
                'back_url'=>'gar-bato-pramanit.index',
                'form_title'=>'घरबाटो प्रमाणित',


                'create_page_url'=>'gar-bato-pramanit.create',
                'index_page_url'=>'gar-bato-pramanit.index',
                'show_page_url'=>'gar-bato-pramanit.show',
                'form_edit_url'=>'gar-bato-pramanit.edit',
                'default_view_url'=>'gar-bato-pramanit.default',
                'pdf_view_url'=>'gar-bato-pramanit.pdf',
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
                                        ['field_type'=>'input','class'=>'','name'=>'office_name','placeholder'=>'','validation'=>'required|string|max:191'],

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
                                        ['field_type'=>'span','class'=>'text_bold','content'=>' विषय: घर बाटो प्रमाणित ।'],
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
                        'div-class-name'=>'margin-top3',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'प्रस्तुत विषयमा जिल्ला'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_district_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_palika_name','placeholder'=>'','validation'=>'required|string|max:191'],

                                        ['field_type'=>'span','content'=>'वडा नं'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_ward_no','placeholder'=>'','validation'=>'required|np_integer'],
                                        ['field_type'=>'span','content'=>'(साविकको ठेगाना'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_sabik_palika_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>',वडा नं'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_sabik_ward_no','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'), अन्तर्गत'],


                                        ['field_type'=>'select','class'=>'','name'=>'body_person_abbreviation','placeholder'=>'','option_type'=>'static','options'=>['श्री'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_person_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'त्यस कार्यालयमा श्रेस्ता दर्ता कायम रहेको जग्गाको घरबाटो तपसिलमा उल्लेखित विवरण अनुसार भएको व्यहोरा प्रमाणित गरिन्छ।']
                                    )


                                ],

                            )
                        )
                    ],



                    [
                        'div-class-name'=>'margin-top3',
                        'flex-div'=>array(
                            'position'=>'center',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'घर बाटो विवरण'],
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
                                        [
                                            'field_type'=>'custom_field',
                                            'view'=>'sifaris.pages.custom_views.gar_jagga.gar_bato_detail_list_table',
                                            'js'=>'',
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
        $data = GarBatoPramanit::where('deleted','=','0')->get();
        if($request->ajax()) {
            if (!empty($request->nibedak_name)) {
                $data = GarBatoPramanit::where('deleted','=','0')
                    ->where('applicant_name_bibaran', 'LIKE', '%'.$request->nibedak_name.'%')
                    ->get();
            }
            if (!empty($request->citizenship_no)) {
                $data = GarBatoPramanit::where('deleted','=','0')->
                where('applicant_citizenship_number', 'LIKE', '%'.$request->citizenship_no.'%')->get();
            }
            if(!empty($request->sifaris_no)){
                $data=GarBatoPramanit::where('deleted','=','0')
                    ->where('id','=',$request->sifaris_no)->get();
            }


            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="'.route($this->getViewArray()["show_page_url"],$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="show" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.route($this->getViewArray()["form_edit_url"],['gar_bato_pramanit'=>$row['id']]).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="edit" data-target="#myModal"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-sm btn-danger delete-nibedan" data-id="'.$row['id'].'" id="deleteDarta"><i class="fa fa-trash"></i></a>
                    </div>';
                })
                ->rawColumns(['actions','files'])
                ->make(true);
        }


        $data['date'] = DateConverter::fromEnglishDate(date('Y'), date('m'), date('d'))->toNepaliDate();
        return view('sifaris.pages.index_page', ['data'=>$data,'view_array'=>$this->getViewArray()]);
    }


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
        if($id=$this->model->create($request->all()+['submitted_by'=>Auth::id()])->id)
        {
            if($request->has('palika_ward_no'))
            {

                foreach ($request->palika_ward_no as $key=>$palika_ward_no) {

                    DB::table('gar_bato_details')->insert(
                        array(
                            'gar_bato_pramanit_id'=>$id,
                            'palika_ward_no'=>($request->palika_ward_no[$key])? $request->palika_ward_no[$key]:'-',
                            'sit_no'=>($request->sit_no[$key])? $request->sit_no[$key]:'-',
                            'kitta_no'=>($request->kitta_no[$key])? $request->kitta_no[$key]:'-',
                            'jagga_area'=>($request->jagga_area[$key])? $request->jagga_area[$key]:'-',
                            'bato_name'=>($request->bato_name[$key])? $request->bato_name[$key]:'-',
                            'gar_present_or_not'=>($request->gar_present_or_not[$key])? $request->gar_present_or_not[$key]:'-',
                            'bato_type'=>($request->bato_type[$key])? $request->bato_type[$key]:'-'
                        )
                    );
                }

            }


            return Redirect::route($this->getViewArray()['show_page_url'],$id)->with('success','सफलतापूर्वक स्टोर गरियो');
        }

    }


    public function show_default($id)
    {
        $gar_bato_details=DB::table('gar_bato_details')
            ->where('gar_bato_pramanit_id','=',$id)
            ->get('*');
        $this->model=$this->model->where('id','=',$id)->get()->first();

        return view('sifaris.pages.show_page',['model'=>$this->model,'view_array'=>$this->view_array,'view_only'=>true,'gar_bato_details'=>$gar_bato_details]);
    }




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

        $this->model=GarBatoPramanit::find($id);
        if($this->model->update($request->all()))
        {
            DB::table('gar_bato_details')
                ->where('gar_bato_pramanit_id','=',$this->model->id)
                ->delete();
            if($request->has('palika_ward_no'))
            {
                //delete old value and store new updated value

                foreach ($request->palika_ward_no as $key=>$palika_ward_no) {

                    DB::table('gar_bato_details')->insert(
                        array(
                            'gar_bato_pramanit_id'=>$this->model->id,
                            'palika_ward_no'=>($request->palika_ward_no[$key])? $request->palika_ward_no[$key]:'-',
                            'sit_no'=>($request->sit_no[$key])? $request->sit_no[$key]:'-',
                            'kitta_no'=>($request->kitta_no[$key])? $request->kitta_no[$key]:'-',
                            'jagga_area'=>($request->jagga_area[$key])? $request->jagga_area[$key]:'-',
                            'bato_name'=>($request->bato_name[$key])? $request->bato_name[$key]:'-',
                            'gar_present_or_not'=>($request->gar_present_or_not[$key])? $request->gar_present_or_not[$key]:'-',
                            'bato_type'=>($request->bato_type[$key])? $request->bato_type[$key]:'-'
                        )
                    );
                }

            }


            return Redirect::route($this->getViewArray()['show_page_url'],$this->model->id)->with('success','सफलतापूर्वक स्टोर गरियो');
        }
    }

    public function edit($id)
    {
        $this->model=$this->model->where('id','=',$id)->get()->first();
        $gar_bato_details=DB::table('gar_bato_details')
            ->where('gar_bato_pramanit_id','=',$id)
            ->get('*');
        return view('sifaris.pages.edit_page',['model'=>$this->model,'view_array'=>$this->view_array,'gar_bato_details'=>$gar_bato_details]);
    }


    function show_pdf($id)
    {
        $gar_bato_details=DB::table('gar_bato_details')
            ->where('gar_bato_pramanit_id','=',$id)
            ->get('*');
        $this->model=$this->model->where('id','=',$id)->get()->first();
        //return view('pages.show_page',['model'=>$NagariktaPramanPatra,'view_array'=>$this->view_array]);
        $pdf = SnappyPdf::loadView('sifaris.pages.show_page',['model'=>$this->model,'view_array'=>$this->view_array,'view_only'=>true,'gar_bato_details'=>$gar_bato_details]);
        $pdf->setOption('enable-javascript', true);
        $pdf->setOption('javascript-delay', 2000);
        $pdf->setOption('enable-smart-shrinking', true);
        $pdf->setOption('no-stop-slow-scripts', true);
        //$pdf->setOption('viewport-size', '400x200');
        //$pdf->setOption('no-outline', true);
        $pdf->setOption('page-size','A4');
        $pdf->setOption('margin-left','0mm');
        $pdf->setOption('margin-right','0mm');
        $pdf->setOption('margin-top','0mm');
        $pdf->setOption('margin-bottom','0mm');
        $pdf->setOption('orientation', 'Portrait');
        //$pdf->setOption('page-height','100');
        //$pdf->setOption('page-width','106.5');
        return $pdf->stream();
    }
}
