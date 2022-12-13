<?php

namespace App\Http\Controllers\Sifaris\GarJagga;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sifaris\SifarisAbstractController;
use App\Models\Sifaris\GarJagga\CharKillaSifaris;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Krishnahimself\DateConverter\DateConverter;
use Yajra\DataTables\Facades\DataTables;

class CharKillasifarisController extends SifarisAbstractController
{
    public function __construct()
    {
        $this->model=new CharKillaSifaris();
        $this->setViewArray(
            array(
                'form_store_url'=>'char-killa-sifaris.store',
                'form_update_url'=>'char-killa-sifaris.update',
                'form_destroy_url'=>'char-killa-sifaris.destroy',
                'back_url'=>'char-killa-sifaris.index',
                'form_title'=>'चार किल्ला सिफारिस',


                'create_page_url'=>'char-killa-sifaris.create',
                'index_page_url'=>'char-killa-sifaris.index',
                'show_page_url'=>'char-killa-sifaris.show',
                'form_edit_url'=>'char-killa-sifaris.edit',
                'default_view_url'=>'char-killa-sifaris.default',
                'pdf_view_url'=>'char-killa-sifaris.pdf',
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
                        'div-class-name'=>'margin-top3',
                        'flex-div'=>array(
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'उपरोक्त सम्बन्धमा साविक'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_sabik_palika_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>',वडा नं'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_sabik_ward_no','placeholder'=>'','validation'=>'required|np_integer:191'],
                                        ['field_type'=>'span','content'=>'भई हाल प्रदेश'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_current_pradesh_no','placeholder'=>'','validation'=>'required|np_integer:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_current_district_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_current_palika_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_current_palika_type','placeholder'=>'','option_type'=>'static','options'=>['गाउँपालिका','नगरपालिका'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>',वडा नं'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_current_ward_no','placeholder'=>'','validation'=>'required|np_integer:191'],
                                        ['field_type'=>'span','content'=>'मा स्थायी बसोबास भएको श्री'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_grand_father_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'को'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_grand_child_type','placeholder'=>'','option_type'=>'static','options'=>['नाति'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'श्री'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_father_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'को'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_child_type','placeholder'=>'','option_type'=>'static','options'=>['छोरा'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_person_abbreviation','placeholder'=>'','option_type'=>'static','options'=>['श्री'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_person_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'ले यस कार्यालयमा दिएको निवेदन अनुसार र संलग्न प्रमाणको आधारमा बुझदा निजको हकभोगमा रहेको तपसिल अनुसार जग्गाको चार किल्ला निम्न अनुसार भएको हुँदा'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_char_killa_pramanit_reason','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'को लागि चार किल्ला प्रमाणित गरिएको छ। उक्त जग्गामा बाटो'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_bato_no_in_jagga','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'र घर'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_gar_no_in_jagga','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'रहेको छ ।'],
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
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'तपसिल'],
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
                                            'view'=>'sifaris.pages.custom_views.gar_jagga.char_killa_sifaris_tapasil',
                                            'js'=>'',
                                            'css'=>''
                                        ],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'note'],
                                        ['field_type'=>'textarea','class'=>'full_width','name'=>'note','placeholder'=>'','validation'=>'required|string|max:1000'],
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
        $data = CharKillaSifaris::where('deleted','=','0')->get();
        if($request->ajax()) {
            if (!empty($request->nibedak_name)) {
                $data = CharKillaSifaris::where('deleted','=','0')
                    ->where('applicant_name_bibaran', 'LIKE', '%'.$request->nibedak_name.'%')
                    ->get();
            }
            if (!empty($request->citizenship_no)) {
                $data = CharKillaSifaris::where('deleted','=','0')->
                where('applicant_citizenship_number', 'LIKE', '%'.$request->citizenship_no.'%')->get();
            }
            if(!empty($request->sifaris_no)){
                $data=CharKillaSifaris::where('deleted','=','0')
                    ->where('id','=',$request->sifaris_no)->get();
            }


            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="'.route($this->getViewArray()["show_page_url"],$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="show" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.route($this->getViewArray()["form_edit_url"],['char_killa_sifari'=>$row['id']]).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="edit" data-target="#myModal"><i class="fa fa-pencil"></i></a>
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
        $dynamic_field_values=[];
        if($request->has('area'))
        {
            foreach ($request->area as $key=>$area) {
                array_push($dynamic_field_values,
                    (object)array(
                        'area'=>$request->area[$key],
                        'kitta_no'=>$request->kitta_no[$key],
                        'sit_no'=>$request->sit_no[$key],
                        'jagga_area'=>$request->jagga_area[$key],
                        'east'=>$request->east[$key],
                        'west'=>$request->west[$key],
                        'north'=>$request->north[$key],
                        'south'=>$request->south[$key],
                    )
                );

            }
        }
        $validator = Validator::make(
            $request->all(),
            $this->rules,
            $this->messages
        );

        if ($validator->fails()) {
            $request->session()->flash('char_killa_tapasils',$dynamic_field_values);
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if($id=$this->model->create($request->all()+['submitted_by'=>Auth::id()])->id)
        {
            if($request->has('area'))
            {
                foreach ($request->area as $key=>$area) {
                    DB::table('char_killa_tapasils')->insert(array(
                            'char_killa_sifaris_id'=>$id,
                            'area'=>($request->area[$key])? $request->area[$key]:'-',
                            'kitta_no'=>($request->kitta_no[$key])? $request->kitta_no[$key]:'-',
                            'sit_no'=>($request->sit_no[$key])? $request->sit_no[$key]:'-',
                            'jagga_area'=>($request->jagga_area[$key])? $request->jagga_area[$key]:'-',
                            'east'=>($request->east[$key])? $request->east[$key]:'-',
                            'west'=>($request->west[$key])? $request->west[$key]:'-',
                            'north'=>($request->north[$key])? $request->north[$key]:'-',
                            'south'=>($request->south[$key])? $request->south[$key]:'-',
                        )
                    );

                }
            }
            return Redirect::route($this->getViewArray()['show_page_url'],$id)->with('success','सफलतापूर्वक स्टोर गरियो');
        }

    }

    public function edit($id)
    {
        $this->model=$this->model->where('id','=',$id)->get()->first();
        $char_killa_tapasils=DB::table('char_killa_tapasils')
            ->where('char_killa_sifaris_id','=',$id)
            ->get('*');
        return view('sifaris.pages.edit_page',['model'=>$this->model,'view_array'=>$this->view_array,'char_killa_tapasils'=>$char_killa_tapasils]);
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

        $this->model=CharKillaSifaris::find($id);
        if($this->model->update($request->all()))
        {
            DB::table('char_killa_tapasils')
                ->where('char_killa_sifaris_id','=',$id)
                ->delete();
            if($request->has('area'))
            {
                foreach ($request->area as $key=>$area) {
                    DB::table('char_killa_tapasils')->insert(array(
                            'char_killa_sifaris_id'=>$this->model->id,
                            'area'=>($request->area[$key])? $request->area[$key]:'-',
                            'kitta_no'=>($request->kitta_no[$key])? $request->kitta_no[$key]:'-',
                            'sit_no'=>($request->sit_no[$key])? $request->sit_no[$key]:'-',
                            'jagga_area'=>($request->jagga_area[$key])? $request->jagga_area[$key]:'-',
                            'east'=>($request->east[$key])? $request->east[$key]:'-',
                            'west'=>($request->west[$key])? $request->west[$key]:'-',
                            'north'=>($request->north[$key])? $request->north[$key]:'-',
                            'south'=>($request->south[$key])? $request->south[$key]:'-',
                        )
                    );
                }
            }

            return Redirect::route($this->getViewArray()['show_page_url'],$this->model->id)->with('success','सफलतापूर्वक स्टोर गरियो');
        }
    }



    public function show_default($id)
    {

        $char_killa_tapasils=DB::table('char_killa_tapasils')
            ->where('char_killa_sifaris_id','=',$id)
            ->get('*');
        $this->model=$this->model->where('id','=',$id)->get()->first();

        return view('sifaris.pages.show_page',['model'=>$this->model,'view_array'=>$this->view_array,'view_only'=>true,'char_killa_tapasils'=>$char_killa_tapasils]);
    }


    function show_pdf($id)
    {
        $char_killa_tapasils=DB::table('char_killa_tapasils')
            ->where('char_killa_sifaris_id','=',$id)
            ->get('*');
        $this->model=$this->model->where('id','=',$id)->get()->first();
        //return view('pages.show_page',['model'=>$NagariktaPramanPatra,'view_array'=>$this->view_array]);
        $pdf = SnappyPdf::loadView('sifaris.pages.show_page',['model'=>$this->model,'view_array'=>$this->view_array,'view_only'=>true,'char_killa_tapasils'=>$char_killa_tapasils]);
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
