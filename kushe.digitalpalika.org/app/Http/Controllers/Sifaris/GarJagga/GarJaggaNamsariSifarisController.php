<?php

namespace App\Http\Controllers\Sifaris\GarJagga;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sifaris\SifarisAbstractController;
use App\Models\Sifaris\GarJagga\GarJaggaNamsariKitani;
use App\Models\Sifaris\GarJagga\GarJaggaNamsariSifaris;
use App\Models\Sifaris\GarJagga\GarKayamSifaris;
use App\Models\Sifaris\Nagarikta\NepaliNagariktaPramanPatraPratilipi;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Krishnahimself\DateConverter\DateConverter;
use Yajra\DataTables\Facades\DataTables;

class GarJaggaNamsariSifarisController extends SifarisAbstractController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->model=new GarJaggaNamsariSifaris();
        $this->setViewArray(
            array(
                'form_store_url'=>'garjagga-namsari-sifaris.store',
                'form_update_url'=>'garjagga-namsari-sifaris.update',
                'form_destroy_url'=>'garjagga-namsari-sifaris.destroy',
                'back_url'=>'garjagga-namsari-sifaris.index',
                'form_title'=>'घर जग्गा नामसारी सिफारिस',


                'create_page_url'=>'garjagga-namsari-sifaris.create',
                'index_page_url'=>'garjagga-namsari-sifaris.index',
                'show_page_url'=>'garjagga-namsari-sifaris.show',
                'form_edit_url'=>'garjagga-namsari-sifaris.edit',
                'default_view_url'=>'garjagga-namsari-sifaris.default',
                'pdf_view_url'=>'garjagga-namsari-sifaris.pdf',
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
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'विषयःघर जग्गा नामसारी सिफारिस।'],
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
                                        ['field_type'=>'span','content'=>'उपरोक्त सम्बन्धमा जिल्ला'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_district_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_palika_name','placeholder'=>'','validation'=>'required|string|max:191'],

                                        ['field_type'=>'span','content'=>'वडा नं'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_ward_no','placeholder'=>'','validation'=>'required|np_integer'],
                                        ['field_type'=>'span','content'=>'(साविक'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_sabik_palika_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>',वडा नं'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_sabik_ward_no','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>') अन्तर्गत निवेदक'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_nibedak_abbreviation','placeholder'=>'','option_type'=>'static','options'=>['श्री'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_nibedak_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'को'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_nibedak_relationship_with_death_person','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'नाता पर्ने श्री'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_death_person_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'को मिति'],
                                        ['field_type'=>'input','class'=>'date-picker','name'=>'body_death_date','placeholder'=>'मिति','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'मा मृत्यु भएको हुनाले निज मृतकका नाममा दर्ता कायम रहेको तल उल्लेखित विवरणको घर जग्गा नामसारीको लागि'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_nibedak_abbreviation_second','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_nibedak_name_second','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'ले निवेदन दिनु भएकोमा मृतकका हकदारहरू नाता प्रमाणित प्रमाण पत्रमा उल्लेखित भएअनुसार रहेकोले निज मृतकका नाममा रहेको सो'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_namsari_property_type','placeholder'=>'','option_type'=>'static','options'=>['जग्गा'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'त्यहाँको नियमानुसार हकदारहरूको नाममा नामसारीको लागि सिफारिस साथ अनुरोध गरिन्छ।'],




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
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'अन्य हकदारको विवरण'],
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
                                            'view'=>'sifaris.pages.custom_views.gar_jagga.gar_jagga_namsari_sifaris_hakdar_list_table',
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
                            'position'=>'center',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'नामसारी गर्न घर/जग्गारको विवरण'],
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
                                            'view'=>'sifaris.pages.custom_views.gar_jagga.gar_jagga_bibaran_table',
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
                                        ['field_type'=>'input','name'=>'sifaris_body_applicant_sign','validation'=>'','placeholder'=>''],
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
    }


    public function index(Request $request)
    {
        $data = GarJaggaNamsariSifaris::where('deleted','=','0')->get();
        if($request->ajax()) {
            if (!empty($request->nibedak_name)) {
                $data = GarJaggaNamsariSifaris::where('deleted','=','0')
                    ->where('applicant_name_bibaran', 'LIKE', '%'.$request->nibedak_name.'%')
                    ->get();
            }
            if (!empty($request->citizenship_no)) {
                $data = GarJaggaNamsariSifaris::where('deleted','=','0')->
                where('applicant_citizenship_number', 'LIKE', '%'.$request->citizenship_no.'%')->get();
            }
            if(!empty($request->sifaris_no)){
                $data=GarJaggaNamsariSifaris::where('deleted','=','0')
                    ->where('id','=',$request->sifaris_no)->get();
            }


            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="'.route($this->getViewArray()["show_page_url"],$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="show" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.route($this->getViewArray()["form_edit_url"],['garjagga_namsari_sifari'=>$row['id']]).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="edit" data-target="#myModal"><i class="fa fa-pencil"></i></a>
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
        //dd($request);

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
        //$id=$this->model->create($request->all()+['submitted_by'=>Auth::id()])->id;
        if($id=$this->model->create($request->all()+['submitted_by'=>Auth::id()])->id)
        {
            if($request->has('jagga_hakdar_name'))
            {

                foreach ($request->jagga_hakdar_name as $key=>$jagga_hakdar_name) {

                    DB::table('jagga_hakdars')->insert(
                        array(
                            'jagga_hakdar_title'=>'gar_jagga_namsari_sifaris_hakdar',
                            'jagga_hakdar_table_id'=>$id,
                            'hakdar_name'=>($request->jagga_hakdar_name[$key])? $request->jagga_hakdar_name[$key]:'-',
                            'hakdar_relationship'=>($request->jagga_hakdar_relationship_with[$key])? $request->jagga_hakdar_relationship_with[$key]:'-',
                            'hakdar_father_name'=>($request->jagga_hakdar_father_name[$key])? $request->jagga_hakdar_father_name[$key]:'-',
                            'hakdar_citizenship_no'=>($request->jagga_hakdar_citizenship_no[$key])? $request->jagga_hakdar_citizenship_no[$key]:'-'
                        )
                    );
                }

            }

            if($request->has('palika_name'))
            {

                foreach ($request->palika_name as $key=>$palika_name) {
                    //dd($sabic_local_office_name);
                    DB::table('gar_jagga_details')->insert(
                        array(
                            'gar_jagga_namsari_sifaris_id'=>$id,
                            'palika_name'=>($request->palika_name[$key])? $request->palika_name[$key]:'-',
                            'palika_ward_no'=>($request->palika_ward_no[$key])? $request->palika_ward_no[$key]:'-',
                            'jagga_area'=>($request->jagga_area[$key])? $request->jagga_area[$key]:'-',
                            'kitta_no'=>($request->kitta_no[$key])? $request->kitta_no[$key]:'-',
                        )
                    );
                }
            }
            return Redirect::route($this->getViewArray()['show_page_url'],$id)->with('success','सफलतापूर्वक स्टोर गरियो');
        }

    }




    public function edit($id)
    {
        $jagga_hakdars=DB::table('jagga_hakdars')
            ->where('jagga_hakdar_table_id','=',$id)
            ->where('jagga_hakdar_title','=','gar_jagga_namsari_sifaris_hakdar')
            ->get('*');
        $gar_jagga_details=DB::table('gar_jagga_details')
            ->where('gar_jagga_namsari_sifaris_id','=',$id)
            ->get('*');
        $this->model=$this->model->where('id','=',$id)->get()->first();
        return view('sifaris.pages.edit_page',['model'=>$this->model,'view_array'=>$this->view_array,'jagga_hakdars'=>$jagga_hakdars,'gar_jagga_details'=>$gar_jagga_details]);
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

        $this->model=GarJaggaNamsariSifaris::find($id);
        if($this->model->update($request->all()))
        {
            DB::table('jagga_hakdars')
                ->where('jagga_hakdar_table_id','=',$this->model->id)
                ->where('jagga_hakdar_title','=','gar_jagga_namsari_sifaris_hakdar')
                ->delete();
            if($request->has('jagga_hakdar_name'))
            {

                foreach ($request->jagga_hakdar_name as $key=>$jagga_hakdar_name) {

                    DB::table('jagga_hakdars')->insert(
                        array(
                            'jagga_hakdar_title'=>'gar_jagga_namsari_sifaris_hakdar',
                            'jagga_hakdar_table_id'=>$this->model->id,
                            'hakdar_name'=>($request->jagga_hakdar_name[$key])? $request->jagga_hakdar_name[$key]:'-',
                            'hakdar_relationship'=>($request->jagga_hakdar_relationship_with[$key])? $request->jagga_hakdar_relationship_with[$key]:'-',
                            'hakdar_father_name'=>($request->jagga_hakdar_father_name[$key])? $request->jagga_hakdar_father_name[$key]:'-',
                            'hakdar_citizenship_no'=>($request->jagga_hakdar_citizenship_no[$key])? $request->jagga_hakdar_citizenship_no[$key]:'-'
                        )
                    );
                }

            }




            DB::table('gar_jagga_details')
                ->where('gar_jagga_namsari_sifaris_id','=',$this->model->id)
                ->delete();
            if($request->has('palika_name'))
            {

                foreach ($request->palika_name as $key=>$palika_name) {
                    //dd($sabic_local_office_name);
                    DB::table('gar_jagga_details')->insert(
                        array(
                            'gar_jagga_namsari_sifaris_id'=>$this->model->id,
                            'palika_name'=>($request->palika_name[$key])? $request->palika_name[$key]:'-',
                            'palika_ward_no'=>($request->palika_ward_no[$key])? $request->palika_ward_no[$key]:'-',
                            'jagga_area'=>($request->jagga_area[$key])? $request->jagga_area[$key]:'-',
                            'kitta_no'=>($request->kitta_no[$key])? $request->kitta_no[$key]:'-',
                        )
                    );
                }
            }
            return Redirect::route($this->getViewArray()['show_page_url'],$this->model->id)->with('success','सफलतापूर्वक स्टोर गरियो');
        }
    }




    public function show_default($id)
    {
        $jagga_hakdars=DB::table('jagga_hakdars')
            ->where('jagga_hakdar_table_id','=',$id)
            ->where('jagga_hakdar_title','=','gar_jagga_namsari_sifaris_hakdar')
            ->get('*');
        $gar_jagga_details=DB::table('gar_jagga_details')
            ->where('gar_jagga_namsari_sifaris_id','=',$id)
            ->get('*');
        $this->model=$this->model->where('id','=',$id)->get()->first();
        return view('sifaris.pages.show_page',['model'=>$this->model,'view_array'=>$this->view_array,'view_only'=>true,'jagga_hakdars'=>$jagga_hakdars,'gar_jagga_details'=>$gar_jagga_details]);
    }


    function show_pdf($id)
    {
        $jagga_hakdars=DB::table('jagga_hakdars')
            ->where('jagga_hakdar_table_id','=',$id)
            ->where('jagga_hakdar_title','=','gar_jagga_namsari_sifaris_hakdar')
            ->get('*');
        $gar_jagga_details=DB::table('gar_jagga_details')
            ->where('gar_jagga_namsari_sifaris_id','=',$id)
            ->get('*');
        $this->model=$this->model->where('id','=',$id)->get()->first();
        //return view('pages.show_page',['model'=>$NagariktaPramanPatra,'view_array'=>$this->view_array]);
        $pdf = SnappyPdf::loadView('sifaris.pages.show_page',['model'=>$this->model,'view_array'=>$this->view_array,'view_only'=>true,'jagga_hakdars'=>$jagga_hakdars,'gar_jagga_details'=>$gar_jagga_details]);
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



    public function destroy($id)
    {
        //
    }
}
