<?php

namespace App\Http\Controllers\Sifaris\Nibedan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sifaris\SifarisAbstractController;
use App\Models\sifaris\Nibedan\BriddhaBhattaNibedan;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class BriddhaBhattaNibedanController extends SifarisAbstractController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    public $messages = [
//        'required' => 'यो क्षेत्र आवश्यक छ।',
//        'string' => 'यो फिल्ड स्ट्रिङ हुनुपर्छ।',
//        'max' => 'यो फिल्डले अधिकतम संख्या :max सम्म मात्र लिन्छ।',
//        'integer'=>'यो फिल्ड अंकमा हुनुपर्छ',
//        'unique'=>''
//    ];
//
//
//    public $rules = array();
//
//    private $view_array;

    public function __construct()
    {
        $this->view_array= array(
            'form_store_url'=>'briddha-bhatta.store',
            'form_update_url'=>'briddha-bhatta.update',
            'back_url'=>'briddha-bhatta.index',
            'form_title'=>'वृद्धा भत्ताको निवेदन',

            'index_page_url'=>'briddha-bhatta.index',
            'form_edit_url'=>'briddha-bhatta.edit',
            'default_view_url'=>'briddha-bhatta.default',
            'pdf_view_url'=>'briddha-bhatta.pdf',
            'form_sections'=>array(
                [
                    'div-class-name'=>'',
                    'flex-div'=>array(
                        'position'=>'center',
                        'rows'=>array(
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'अनुसूची - ३ (क)'],
//                                    ['field_type'=>'input','class'=>'date-picker','name'=>'applied_at','validation'=>'required|string|max:191','placeholder'=>'मिति','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'(दफा ६ को उपदफा ३ सँग सम्बन्धित)'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'ववृद्धा भत्ताको निवेदन'],
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
                                    ['field_type'=>'span','content'=>'मिति : '],
                                    ['field_type'=>'input','class'=>'date-picker','name'=>'applied_at','validation'=>'required|string|max:191','placeholder'=>'मिति','validation'=>'required|string|max:191'],
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
                                    ['field_type'=>'select','class'=>'','name'=>'designation','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['अध्यक्ष'],'validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'ज्यू,'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'input','class'=>'','name'=>'from_palika','placeholder'=>'गाउँपालिका','validation'=>'required|string|max:191'],
                                    ['field_type'=>'input','class'=>'','name'=>'to_palika','placeholder'=>'','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'को कार्यालय'],
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
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'विषय: नाम दर्ता सम्बन्धमा'],
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
                                    ['field_type'=>'span','class'=>'','content'=>'उपरोक्त विषयमा सामाजिक सुरक्षा भत्ता पाउनका लागि नयाँ नाम दर्ता गरिदिनुहुन देहायका विवरण सहित यो दरखास्त पेश गरेको छु। मैले राज्य कोषबाट मासिक पारिश्रमिक, पेन्सन वा यस्तै प्रकारका कुनै अन्य सुविधा पाएको छैन। व्यहोरा ठीक साँचो हो, झुठो ठहरे प्रचलित कानुन बमोजिम सहुँला बुझाउँला। '],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'लक्षित समूह:'],
                                    ['field_type'=>'select','class'=>'','name'=>'category','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['जेष्ठ नागरिक (दलित)'],'validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','class'=>'text_light text_warning','content'=>'(उपयुक्त कुनै एकमा चिन्ह लगाउने) '],
                                )
                            ],

                        )
                    )
                ],
                [
                    'div-class-name'=>'',
                    'flex-div'=>array(
                        'position'=>'start',
                        'cols'=>array(
                            [
                                'col_no'=>'6',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'नाम, थर:'],
                                            ['field_type'=>'input','class'=>'','name'=>'name','placeholder'=>'नाम','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'बाबुको नाम:'],
                                            ['field_type'=>'input','class'=>'','name'=>'father_name','placeholder'=>'बाबुको नाम','validation'=>'required|string|max:191'],
                                        )
                                    ],

                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'ठेगाना:'],
                                            ['field_type'=>'input','class'=>'','name'=>'address','placeholder'=>'ठेगाना','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'ना.प्र.नं.:'],
                                            ['field_type'=>'input','class'=>'','name'=>'citizenship_number','placeholder'=>'ना.प्र.नं.','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'जेष्ठ नागरिकको हकमा उमेर परेको मिती:'],
                                            ['field_type'=>'input','class'=>'date-picker','name'=>'date_of_old_age_citizen','placeholder'=>'मिती','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'पतिको मृत्यु दर्ता नम्बर :'],
                                            ['field_type'=>'input','class'=>'','name'=>'widow_spouse_name','placeholder'=>'मृत्यु दर्ता नम्बर','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'दस्तखत:'],
                                            ['field_type'=>'input','class'=>'','name'=>'signature','placeholder'=>'दस्तखत','validation'=>'required|string|max:191'],
                                        )
                                    ],

                                ),
                            ],
                            [
                                'col_no'=>'6',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'लिङ्ग:'],
                                            ['field_type'=>'select','class'=>'','name'=>'gender','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['पुरुष','महिला'],'validation'=>'required|string|max:191'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'आमाको नाम:'],
                                            ['field_type'=>'input','class'=>'','name'=>'mother_name','placeholder'=>'आमाको नाम:','validation'=>'required|string|max:191'],
                                        )
                                    ],

                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'जन्ममिति:'],
                                            ['field_type'=>'input','class'=>'date-picker','name'=>'date_of_birth','placeholder'=>'जन्ममिति','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'जारी जिल्ला:'],
                                            ['field_type'=>'input','class'=>'','name'=>'issued_district','placeholder'=>'जिल्ला','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'सम्पर्क मोबाईल न:'],
                                            ['field_type'=>'input','class'=>'','name'=>'contact_number','placeholder'=>'मोबाईल न:','validation'=>'required|np_phone'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'पतिको मृत्यु मिति:'],
                                            ['field_type'=>'input','class'=>'date-picker','name'=>'window_spouse_death_date','placeholder'=>'मिति','validation'=>'required|string|max:191'],
                                        )
                                    ],

                                ),
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
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'कार्यालय प्रयोजनको लागि'],
                                )
                            ],


                        )
                    )
                ],
                [
                    'div-class-name'=>'div-border',
                    'flex-div'=>array(
                        'position'=>'start',
                        'rows'=>array(

                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'नाम दर्ता निर्णय मिति:'],
                                    ['field_type'=>'input','class'=>'date-picker','name'=>'registered_date','placeholder'=>'मिति:','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'भत्ताको किसिम:'],
                                    ['field_type'=>'input','class'=>'','name'=>'type','placeholder'=>'भत्ताको किसिम','validation'=>'required|string|max:191'],
                                )
                            ],

                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'परिचय पत्र नं.:'],
                                    ['field_type'=>'input','class'=>'','name'=>'card_number','placeholder'=>'परिचय पत्र नं.','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'भत्ता पाउने सुरु मिति: आ.व.'],
                                    ['field_type'=>'input','class'=>'date-picker','name'=>'bhatta_started_date','placeholder'=>'मिति','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'को '],
                                    ['field_type'=>'select','class'=>'','name'=>'month_type','placeholder'=>'','option_type'=>'static','options'=>['पहिलो','दोस्रो','तेस्रो'],'validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'चौमासिकदेखि '],
                                )
                            ],

                        )
                    )
                ],
                [
                    'div-class-name'=>'div-border',
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
            if(array_key_exists('cols',$form_section['flex-div']))
            {
                foreach ($form_section['flex-div']['cols'] as $col)
                {
                    foreach ($col['rows'] as $row)
                    {
                        foreach ($row['fields'] as $field)
                        {

                            if($field['field_type']=='input' || $field['field_type']=='select'){
                                $this->rules[$field['name']]=$field['validation'];
                            }
                        }
                    }
                }

            }else{
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
    }


    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = BriddhaBhattaNibedan::where('deleted','=','0')->get();

            if (!empty($request->nibedak_name)) {
                $data = BriddhaBhattaNibedan::where('deleted','=','0')
                    ->where('applicant_name_bibaran', 'LIKE', '%'.$request->nibedak_name.'%')->get();
            }
            if (!empty($request->citizenship_no)) {
                $data = BriddhaBhattaNibedan::where('deleted','=','0')->
                where('applicant_citizenship_number', 'LIKE', '%'.$request->citizenship_no.'%')->get();
            }
            if(!empty($request->sifaris_no)){
                $data=BriddhaBhattaNibedan::where('deleted','=','0')
                    ->where('id','=',$request->sifaris_no)->get();
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    return '<div class="text-center">
                                <a href="'.route('briddha-bhatta.show',$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="show" data-target="#myModal"><i class="fa fa-eye"></i></a>
                                <a href="' . route("briddha-bhatta.edit", "{$row['id']}") . '">
                               <button  type="button" class="btn btn-sm btn-primary" ><i class="fa fa-pencil"></i></button>
                               </a>
                               <button type="button" class="btn btn-sm btn-danger delete-nibedan" data-id="'.$row['id'].'"><i class="fa fa-trash"></i></button>
                               </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('sifaris.nibedan.briddha_bhatta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sifaris.pages.create_page',['view_array'=>$this->view_array]);
//        return view('sifaris.nibedan.briddha_bhatta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request);
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
        $briddhaBhattaNibedan=BriddhaBhattaNibedan::create($request->all());
        if ($briddhaBhattaNibedan) {
            // return 'inserted';
            session()->flash('success', 'डाटा सफलतापूर्वक भण्डारण गरिएको छ।');
            return redirect(route('briddha-bhatta.show',['briddha_bhattum'=>$briddhaBhattaNibedan->id]));
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
        $data = BriddhaBhattaNibedan::find($id);
//        return view('pages.create_page',['view_array'=>$this->view_array]);
//        return view('sifaris.nibedan.briddha_bhatta.show',['model'=>$data,'view_array'=>$this->view_array]);
        return view('sifaris.pages.main_show_page',['model'=>$data,'view_array'=>$this->view_array]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = BriddhaBhattaNibedan::find($id);
//        return view('pages.create_page',['view_array'=>$this->view_array]);
        return view('sifaris.pages.edit_page',['model'=>$data,'view_array'=>$this->view_array]);
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
        if (BriddhaBhattaNibedan::find($id)->update($request->all())) {
            session()->flash('success', 'सफलतापूर्वक अपडेट गरियो ।');
            return redirect(route('briddha-bhatta.show',['briddha_bhattum'=>$id]));
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
        return (BriddhaBhattaNibedan::where('id','=',$id)->update(['deleted'=>1])) ?
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


    public function show_default($id)
    {
        $briddhaBhattaNibedan=BriddhaBhattaNibedan::where('id','=',$id)->get()->first();

        return view('sifaris.pages.show_page',['model'=>$briddhaBhattaNibedan,'view_array'=>$this->view_array]);
    }

    function show_pdf($id)
    {
        $briddhaBhattaNibedan=BriddhaBhattaNibedan::where('id','=',$id)->get()->first();
//        return view('pages.show_page',['model'=>$aadhibasiPramanitNibedan,'view_array'=>$this->view_array]);
        $pdf = SnappyPdf::loadView('sifaris.pages.show_page',['model'=>$briddhaBhattaNibedan,'view_array'=>$this->view_array]);
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
