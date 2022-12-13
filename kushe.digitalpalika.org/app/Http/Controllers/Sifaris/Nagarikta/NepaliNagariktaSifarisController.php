<?php

namespace App\Http\Controllers\Sifaris\Nagarikta;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sifaris\SifarisAbstractController;
use App\Models\Sifaris\Nagarikta\NepaliNagariktaSifaris;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Krishnahimself\DateConverter\DateConverter;
use Yajra\DataTables\Facades\DataTables;

class NepaliNagariktaSifarisController extends SifarisAbstractController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $view_array= array();
    public $rules = [];
    public $messages = [
        'required' => 'यो क्षेत्र आवश्यक छ।',
        'string' => 'यो फिल्ड स्ट्रिङ हुनुपर्छ।',
        'max' => 'यो फिल्डले अधिकतम संख्या :max सम्म मात्र लिन्छ।',
        'np_integer'=>'यो फिल्ड अंकमा हुनुपर्छ',
        'unique'=>''
    ];
    public function __construct()
    {
        $this->view_array= array(
            'form_store_url'=>'nagarikta-sifaris.store',
            'form_update_url'=>'nagarikta-sifaris.update',
            'form_destroy_url'=>'nagarikta-sifaris.destroy',
            'back_url'=>'nagarikta-sifaris.index',
            'form_title'=>'नेपाली नागरिकताको सिफारिस',


            'create_page_url'=>'nagarikta-sifaris.create',
            'index_page_url'=>'nagarikta-sifaris.index',
            'form_edit_url'=>'nagarikta-sifaris.edit',
            'default_view_url'=>'nagarikta-sifaris.default',
            'pdf_view_url'=>'nagarikta-sifaris.pdf',
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
                                                'js'=>'sifaris.pages.custom_views.bipanna_nagarik_nibedan.js',
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
                                    ['field_type'=>'select','class'=>'','name'=>'prasasan_type','placeholder'=>'','option_type'=>'static','options'=>['जिल्ला'],'validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'प्रशासन कार्यालय'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'input','class'=>'','name'=>'prasasan_address','placeholder'=>'','validation'=>'required|string|max:191'],

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
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'विषयःसिफारिस गरिएको ।'],
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
                                    ['field_type'=>'span','content'=>'यस गाउँपालिका अन्तर्गत निम्न लिखित विवरण भएका श्री'],
                                    ['field_type'=>'input','class'=>'','name'=>'applicant_name','placeholder'=>'नाम','validation'=>'required|string|max:191'],

                                    ['field_type'=>'span','content'=>'ले स्थायी नेपाली नागरिकताको प्रमाण-पत्र बनाउनको लागि सिफारिस पाउ भनि निबेदन दिएको हुँदा निम्न विवरणमा उल्लेखित'],
                                    ['field_type'=>'span','content'=>'ब्यक्तिलाई स्थायी नेपाली नागरिकताको प्रमाण-पत्र उपलब्ध गराई दिनुहुन सिफारिस साथ अनुरोध गर्दछु !'],
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
                                    ['field_type'=>'span','content'=>'जन्मस्थान :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'birth_place','placeholder'=>'जन्मस्थान','validation'=>'required|string|max:191'],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'बाबुको नाम धर, वतन :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'father_name','placeholder'=>'बाबुको नाम धर','validation'=>'required|string|max:191'],
                                    ['field_type'=>'input','class'=>'','name'=>'father_wotan','placeholder'=>'वतन','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'आमाको नाम धर, वतन :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'mother_name','placeholder'=>'आमाको नाम धर','validation'=>'required|string|max:191'],
                                    ['field_type'=>'input','class'=>'','name'=>'mother_wotan','placeholder'=>'वतन','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'पति/पत्नीक नाम धर, वतन :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'husband_wife_name','placeholder'=>'पति/पत्नीक नाम धर','validation'=>'required|string|max:191'],
                                    ['field_type'=>'input','class'=>'','name'=>'husband_wife_wotan','placeholder'=>'वतन','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'स्थायी ठेगाना :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'permanent_address','placeholder'=>'ठेगाना','validation'=>'required|string|max:191'],

                                )
                            ],

                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'सम्बन्धित व्यक्तिको नाम धर, वतन :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'full_name','placeholder'=>'सम्बन्धित व्यक्तिको नाम धर','validation'=>'required|string|max:191'],
                                    ['field_type'=>'input','class'=>'','name'=>'wotan','placeholder'=>'वतन','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'जन्म मिति :-'],
                                    ['field_type'=>'input','class'=>'date-picker','name'=>'dob','placeholder'=>'जन्म मिति','validation'=>'required|string|max:191'],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'जिल्ला प्रशासनबाट खटिएको नागरिकता टोलीमा नाम दर्ता :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'darta_name','placeholder'=>'नाम','validation'=>'required|string|max:191'],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'सिफारिस माग गर्ने व्यक्तिको सही :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'applicant_signature','placeholder'=>'','validation'=>'required|string|max:191'],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'सिफारिस माग गर्नेको फोटो'],


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
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'सनाखत'],

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
                                    ['field_type'=>'span','content'=>'निवेदक'],
                                    ['field_type'=>'input','class'=>'','name'=>'sanakhat_name','placeholder'=>'नाम','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'मेरो'],
                                    ['field_type'=>'input','class'=>'','name'=>'sanakhat_relationship_with','placeholder'=>'सम्बन्ध','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'नाता हुन्‌ ! निजले हालसम्म कही कतैबाट नेपाली नागरिकताको प्रमाण-पत्र लीएको छैन ! ब्येहोरा झट्ठा ठहरेमा कानुन बमोजिम सहँला बुझाउला ।'],
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
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'भनि सनाखत र सहिछाप गर्नेको :'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'नाम :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'sanakhat_person_name','placeholder'=>'नाम','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'ना.प्र न॑. :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'sanakhat_person_citizenship_no','placeholder'=>'ना.प्र न॑.','validation'=>'required|string|max:191'],
                                )
                            ],

                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'सही छाप :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'sanakhat_person_signature','placeholder'=>'सही छाप ','validation'=>'required|string|max:191'],
                                )
                            ],

                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'मिति :-'],
                                    ['field_type'=>'input','class'=>'','name'=>'sanakhat_date','placeholder'=>'मिति','validation'=>'required|string|max:191'],
                                )
                            ],

                        )
                    )
                ],
//                [
//                    'div-class-name'=>'',
//                    'flex-div'=>array(
//                        'position'=>'start',
//                        'rows'=>array(
//                            [
//                                'fields'=>array(
//                                    ['field_type'=>'span','content'=>'औंठा छाप'],
//
//                                )
//                            ],
//                            [
//                                'fields'=>array(
//
//                                    ['field_type'=>'table','table_title'=>['दायाँ','बाया'],'row_num'=>'1','table_class'=>'width300','td_class'=>'height150'],
//
//                                )
//                            ],
//
//
//                        )
//                    )
//                ],



                [
                    'div-class-name'=>'margin-top-10 div-center',
                    'flex-div'=>array(
                        'position'=>'center',

                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','content'=>'औंठा छाप'],

                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'table','table_title'=>['दायाँ','बाया'],'row_num'=>'1','table_class'=>'width300 div-center','td_class'=>'height150'],
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

        );
        //setting all validation errors
        $this->rules=$this->set_values_in_validation($this->view_array);
    }
    
    


    public function index(Request $request)
    {
        $data = NepaliNagariktaSifaris::where('deleted','=','0')->get();
        if($request->ajax()) {
            if (!empty($request->nibedak_name)) {
                $data = NepaliNagariktaSifaris::where('deleted','=','0')
                    ->where('applicant_name_bibaran', 'LIKE', '%'.$request->nibedak_name.'%')
                    ->get();
            }
            if (!empty($request->citizenship_no)) {
                $data = NepaliNagariktaSifaris::where('deleted','=','0')->
                where('applicant_citizenship_number', 'LIKE', '%'.$request->citizenship_no.'%')->get();
            }
            if(!empty($request->sifaris_no)){
                $data=NepaliNagariktaSifaris::where('deleted','=','0')
                    ->where('id','=',$request->sifaris_no)->get();
            }


            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="'.route('nagarikta-sifaris.show',$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="show" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.route('nagarikta-sifaris.edit',['nagarikta_sifari'=>$row['id']]).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="edit" data-target="#myModal"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-sm btn-danger delete-nibedan" data-id="'.$row['id'].'" id="deleteDarta"><i class="fa fa-trash"></i></a>
                    </div>';
                })
                ->rawColumns(['actions','files'])
                ->make(true);
        }


        $data['date'] = DateConverter::fromEnglishDate(date('Y'), date('m'), date('d'))->toNepaliDate();
        return view('sifaris.pages.index_page', ['data'=>$data,'view_array'=>$this->view_array]);
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
        $nepaliNagariktaSifaris=new NepaliNagariktaSifaris();
        $nagariktaPramanPatra=$this->set_values_in_fields($request,$nepaliNagariktaSifaris,$this->view_array);

        $nagariktaPramanPatra->submitted_by=Auth::id();
        if($nepaliNagariktaSifaris->save())
        {
            return Redirect::route('nagarikta-sifaris.show',$nepaliNagariktaSifaris->id)->with('success','सफलतापूर्वक स्टोर गरियो');
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
        $nepaliNagariktaSifaris=NepaliNagariktaSifaris::where('id','=',$id)->get()->first();
        return view('sifaris.pages.main_show_page',['model'=>$nepaliNagariktaSifaris,'view_array'=>$this->view_array]);
    }


    public function show_default($id)
    {

        $nepaliNagariktaSifaris=NepaliNagariktaSifaris::where('id','=',$id)->get()->first();
        return view('sifaris.pages.show_page',['model'=>$nepaliNagariktaSifaris,'view_array'=>$this->view_array]);
    }


    function show_pdf($id)
    {
        $nepaliNagariktaSifaris=NepaliNagariktaSifaris::where('id','=',$id)->get()->first();
//        return view('pages.show_page',['model'=>$NagariktaPramanPatra,'view_array'=>$this->view_array]);
        $pdf = SnappyPdf::loadView('sifaris.pages.show_page',['model'=>$nepaliNagariktaSifaris,'view_array'=>$this->view_array]);
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nepaliNagariktaSifaris=NepaliNagariktaSifaris::where('id','=',$id)->get()->first();

        return view('sifaris.pages.edit_page',['model'=>$nepaliNagariktaSifaris,'view_array'=>$this->view_array]);
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
        $nepaliNagariktaSifaris=NepaliNagariktaSifaris::where('id','=',$id)->get()->first();
        $nepaliNagariktaSifaris=$this->set_values_in_fields($request,$nepaliNagariktaSifaris,$this->view_array);
        if($nepaliNagariktaSifaris->save())
        {
            return Redirect::route('nagarikta-pramanpatra.show',$nepaliNagariktaSifaris->id)->with('success','सफलतापूर्वक स्टोर गरियो');
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
        return (NepaliNagariktaSifaris::where('id','=',$id)->update(['deleted'=>1])) ?
            response()->json(
                [
                    'status' => 200,
                    'message' => 'डाटा मेटाइएको छ'
                ]
            ) : response()->json(
                [
                    'status' => 400,
                    'message' => 'Something went wrong'
                ]
            );
    }
}
