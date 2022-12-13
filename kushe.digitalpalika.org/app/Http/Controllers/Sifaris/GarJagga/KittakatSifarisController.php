<?php

namespace App\Http\Controllers\Sifaris\GarJagga;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sifaris\SifarisAbstractController;
use App\Models\Sifaris\GarJagga\KittakatSifaris;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Krishnahimself\DateConverter\DateConverter;
use Yajra\DataTables\Facades\DataTables;

class KittakatSifarisController extends SifarisAbstractController
{
    public function __construct()
    {
        $this->model=new KittakatSifaris();
        $this->setViewArray(
            array(
                'form_store_url'=>'kittakat-sifaris.store',
                'form_update_url'=>'kittakat-sifaris.update',
                'form_destroy_url'=>'kittakat-sifaris.destroy',
                'back_url'=>'kittakat-sifaris.index',
                'form_title'=>'कित्ताकाट सिफारिस',


                'create_page_url'=>'kittakat-sifaris.create',
                'index_page_url'=>'kittakat-sifaris.index',
                'show_page_url'=>'kittakat-sifaris.show',
                'form_edit_url'=>'kittakat-sifaris.edit',
                'default_view_url'=>'kittakat-sifaris.default',
                'pdf_view_url'=>'kittakat-sifaris.pdf',
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
                    ]
                    ,
                    $this->palika_top_detail_view
                    ,

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
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'विषय:कित्ताकाट सिफारिस ।'],
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
                                        ['field_type'=>'select','class'=>'','name'=>'receiver_office_type','placeholder'=>'','option_type'=>'static','options'=>['भुमि सुधार कार्यालय'],'validation'=>'required|string|max:191'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'input','class'=>'','name'=>'prasasan_address','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'prasasan_district','placeholder'=>'','validation'=>'required|string|max:191'],
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
                                        ['field_type'=>'select','class'=>'','name'=>'body_palika_type','placeholder'=>'','option_type'=>'static','options'=>$this->palika_types,'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'वडा नं'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'body_ward_no','placeholder'=>'','validation'=>'required|np_integer'],
                                        ['field_type'=>'span','content'=>'स्थायी वासिन्दा(साविक'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_sabik_palika_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>',वडा नं'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_sabik_ward_no','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>') निवासी'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_person_abbreviation','placeholder'=>'','option_type'=>'static','options'=>['श्री'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_person_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'को नाममा श्रेस्ता दर्ता कायम रहेको तल उल्लेखित विवरण को घर-जग्गा मध्ये'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'total_jagga_area','placeholder'=>'','validation'=>'required|np_integer'],
                                        ['field_type'=>'span','content'=>'तर्फबाट'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'kittakat_jagga_area','placeholder'=>'','validation'=>'required|np_integer'],
                                        ['field_type'=>'span','content'=>'क्षेत्रफल जग्गा '],
                                        ['field_type'=>'select','class'=>'','name'=>'kittakat_type','placeholder'=>'','option_type'=>'static','options'=>['कित्ताकाट','प्लट मिलन'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'गर्न प्राबिधिक निरीक्षण गर्दा मापदण्ड अनुसार मिल्ने देखिएको हुनाले सोको लागि सिफारिस गरिन्छ |'],
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
                                        ['field_type'=>'span','class'=>'text_bold','content'=>' घर रहेका जग्गाका विवरण '],
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
                                            'view'=>'sifaris.pages.custom_views.gar_jagga.kittakat_jagga_detail_table',
                                            'js'=>'',
                                            'css'=>''
                                        ],

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
                                        ['field_type'=>'span','class'=>'text_bold','content'=>' कित्ताकाट सिफारिस फिल्ड निरीक्षण प्रतिवेदन '],
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
                                        ['field_type'=>'span','content'=>'घर बनेको जग्गाको क्षेत्रफल:'],
                                        ['field_type'=>'input','class'=>'','name'=>'gar_jagga_area','placeholder'=>'','validation'=>'required|string|max:191'],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'घरको जम्मा क्षेत्रफल: '],
                                        ['field_type'=>'input','class'=>'','name'=>'gar_area','placeholder'=>'','validation'=>'required|string|max:191'],
                                    )
                                ],

                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'घरको भुइँ तल्लाको क्षेत्रफल: '],
                                        ['field_type'=>'input','class'=>'','name'=>'gar_bhuitala_area','placeholder'=>'','validation'=>'required|string|max:191'],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'पाउने फार: '],
                                        ['field_type'=>'input','class'=>'','name'=>'paune_far','placeholder'=>'','validation'=>'required|string|max:191'],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'सिफारिस दिन मिल्ने कारण: '],
                                        ['field_type'=>'input','class'=>'','name'=>'sifaris_reason','placeholder'=>'','validation'=>'required|string|max:191'],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'सिफारिस गर्ने:'],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'प्राबिधिकको नाम: '],
                                        ['field_type'=>'input','class'=>'','name'=>'prabidhik_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'प्राबिधिकको हस्ताक्षर: '],
                                        ['field_type'=>'input','class'=>'','name'=>'','placeholder'=>'','validation'=>''],
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
        $this->rules=$this->rules;
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

            if($request->has('sit_no'))
            {

                foreach ($request->sit_no as $key=>$sit_no) {
                    DB::table('kittakat_jagga_ditails')->insert(
                        array(
                            'kittakat_sifaris_id'=>$id,
                            'sit_no'=>($request->sit_no[$key])? $request->sit_no[$key]:'-',
                            'kitta_no'=>($request->kitta_no[$key])? $request->kitta_no[$key]:'-',
                            'jagga_area'=>($request->jagga_area[$key])? $request->jagga_area[$key]:'-',
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
        $kittakat_jagga_details=DB::table('kittakat_jagga_ditails')
            ->where('kittakat_sifaris_id','=',$id)
            ->get('*');
        return view('sifaris.pages.edit_page',['model'=>$this->model,'view_array'=>$this->view_array,'kittakat_jagga_details'=>$kittakat_jagga_details]);
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
//        $id=$this->model->create($request->all()+['submitted_by'=>Auth::id()])->id;
        $this->model=KittakatSifaris::find($id);
        if($this->model->update($request->all()))
        {

            if($request->has('sit_no'))
            {
                DB::table('kittakat_jagga_ditails')
                    ->where('kittakat_sifaris_id','=',$this->model->id)
                    ->delete();
                foreach ($request->sit_no as $key=>$sit_no) {
                    DB::table('kittakat_jagga_ditails')->insert(
                        array(
                            'kittakat_sifaris_id'=>$this->model->id,
                            'sit_no'=>($request->sit_no[$key])? $request->sit_no[$key]:'-',
                            'kitta_no'=>($request->kitta_no[$key])? $request->kitta_no[$key]:'-',
                            'jagga_area'=>($request->jagga_area[$key])? $request->jagga_area[$key]:'-',
                        )
                    );
                }
            }

            return Redirect::route($this->getViewArray()['show_page_url'],$this->model->id)->with('success','सफलतापूर्वक स्टोर गरियो');
        }
    }

    public function index(Request $request)
    {
        $data = KittakatSifaris::where('deleted','=','0')->get();
        if($request->ajax()) {
            if (!empty($request->nibedak_name)) {
                $data = KittakatSifaris::where('deleted','=','0')
                    ->where('applicant_name_bibaran', 'LIKE', '%'.$request->nibedak_name.'%')
                    ->get();
            }
            if (!empty($request->citizenship_no)) {
                $data = KittakatSifaris::where('deleted','=','0')->
                where('applicant_citizenship_number', 'LIKE', '%'.$request->citizenship_no.'%')->get();
            }
            if(!empty($request->sifaris_no)){
                $data=KittakatSifaris::where('deleted','=','0')
                    ->where('id','=',$request->sifaris_no)->get();
            }


            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="'.route($this->getViewArray()["show_page_url"],$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="show" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.route($this->getViewArray()["form_edit_url"],['kittakat_sifari'=>$row['id']]).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="edit" data-target="#myModal"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-sm btn-danger delete-nibedan" data-id="'.$row['id'].'" id="deleteDarta"><i class="fa fa-trash"></i></a>
                    </div>';
                })
                ->rawColumns(['actions','files'])
                ->make(true);
        }


        $data['date'] = DateConverter::fromEnglishDate(date('Y'), date('m'), date('d'))->toNepaliDate();
        return view('sifaris.pages.index_page', ['data'=>$data,'view_array'=>$this->getViewArray()]);
    }


    public function show_default($id)
    {
        $kittakat_jagga_details=DB::table('kittakat_jagga_ditails')
            ->where('kittakat_sifaris_id','=',$id)
            ->get('*');
        $this->model=$this->model->where('id','=',$id)->get()->first();
        return view('sifaris.pages.show_page',['model'=>$this->model,'view_array'=>$this->view_array,'view_only'=>true,'kittakat_jagga_details'=>$kittakat_jagga_details]);
    }

    function show_pdf($id)
    {
        $kittakat_jagga_details=DB::table('kittakat_jagga_ditails')
            ->where('kittakat_sifaris_id','=',$id)
            ->get('*');
        $this->model=$this->model->where('id','=',$id)->get()->first();

        $pdf = SnappyPdf::loadView('sifaris.pages.show_page',['model'=>$this->model,'view_array'=>$this->view_array,'view_only'=>true,'view_only'=>true,'kittakat_jagga_details'=>$kittakat_jagga_details]);
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
