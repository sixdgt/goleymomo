<?php

namespace App\Http\Controllers\Sifaris\Nibedan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sifaris\SifarisAbstractController;
use App\Models\Sifaris\Nibedan\BipannaNibedan;
use Barryvdh\Snappy\Facades\SnappyPdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Krishnahimself\DateConverter\DateConverter;
use Yajra\DataTables\Facades\DataTables;

class BipannaNagarikNibedanController extends SifarisAbstractController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

//    private $messages = [
//        'required' => 'यो क्षेत्र आवश्यक छ।',
//        'string' => 'यो फिल्ड स्ट्रिङ हुनुपर्छ।',
//        'max' => 'यो फिल्डले अधिकतम संख्या :max सम्म मात्र लिन्छ।',
//        'integer'=>'यो फिल्ड अंक हुनुपर्छ।',
//        'unique'=>''
//    ];




    public function __construct()
    {
        $this->view_array= array(
            'form_store_url'=>'bipanna-nagarik.store',
            'form_update_url'=>'bipanna-nagarik.update',
            'back_url'=>'bipanna-nagarik.index',
            'form_title'=>'विपन्न नागरिक आवेदन तथा सिफारिस',


            'index_page_url'=>'bipanna-nagarik.index',
            'form_edit_url'=>'bipanna-nagarik.edit',
            'default_view_url'=>'bipanna-nagarik.default',
            'pdf_view_url'=>'bipanna-nagarik.pdf',
            'form_sections'=>array(
                [
                    'div-class-name'=>'',
                    'flex-div'=>array(
                        'position'=>'center',
                        'rows'=>array(
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'अनुसुची २ '],
//                                    ['field_type'=>'input','class'=>'date-picker','name'=>'applied_at','validation'=>'required|string|max:191','placeholder'=>'मिति','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'(दफा ४ उप दफा (१) सँग सम्बन्धित ) '],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'विपन्न नागरिक आवेदन तथा सिफारिस फाराम '],
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
                                    ['field_type'=>'span','content'=>'श्रीमान्‌'],
                                    ['field_type'=>'select','class'=>'','name'=>'designation','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['अध्यक्ष'],'validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'ज्यू,'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'input','class'=>'','name'=>'a','validation'=>'required|string|max:191','placeholder'=>'','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>','],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'b','validation'=>'required|string|max:191','placeholder'=>'','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'नं. वस कार्यालय,'],
                                    ['field_type'=>'input','class'=>'','name'=>'c','validation'=>'required|string|max:191','placeholder'=>'','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'।'],
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
                                    ['field_type'=>'span','class'=>'text_bold','content'=>'देहाय बमोजिम विवरण भारी विपत्र नागरिक औषधि उपचार सहलियतका लागि अनुरोध गर्दछु। '],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'','content'=>'१. वैयत्तिक'],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'margin-left50','content'=>''],
                                    ['field_type'=>'span','class'=>'','content'=>'बिरामीको नाम:'],
                                    ['field_type'=>'input','class'=>'','name'=>'birami_name','validation'=>'required|string|max:191','placeholder'=>'नाम','validation'=>'required|string|max:191'],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'margin-left50','content'=>''],
                                    ['field_type'=>'span','class'=>'','content'=>'उमेर:'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'birami_age','placeholder'=>'उमेर','validation'=>'required|np_integer'],
                                    ['field_type'=>'span','class'=>'','content'=>'लिङ्ग :'],
                                    ['field_type'=>'select','class'=>'','name'=>'birami_sex','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['महिला','पुरुस','तेस्रो लिङ्ग'],'validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'margin-left50','content'=>''],
                                    ['field_type'=>'span','class'=>'','content'=>'स्थायी ठेगाना: '],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'margin-left50','content'=>''],
                                    ['field_type'=>'span','class'=>'','content'=>'जिल्ला:'],
                                    ['field_type'=>'input','class'=>'','name'=>'birami_permanent_district','validation'=>'required|string|max:191','placeholder'=>'जिल्ला','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','class'=>'','content'=>'पालिका:'],
                                    ['field_type'=>'input','class'=>'','name'=>'birami_permanent_palika','validation'=>'required|string|max:191','placeholder'=>'पालिका','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','class'=>'','content'=>'बडा नं:'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'birami_permanent_ward_no','placeholder'=>'बडा नं','validation'=>'required|np_integer'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'margin-left50','content'=>''],
                                    ['field_type'=>'span','class'=>'','content'=>'अस्थायी ठेगाना: '],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'margin-left50','content'=>''],
                                    ['field_type'=>'span','class'=>'','content'=>'जिल्ला:'],
                                    ['field_type'=>'input','class'=>'','name'=>'birami_temporary_district','validation'=>'required|string|max:191','placeholder'=>'जिल्ला','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','class'=>'','content'=>'पालिका:'],
                                    ['field_type'=>'input','class'=>'','name'=>'birami_temporary_palika','validation'=>'required|string|max:191','placeholder'=>'पालिका','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','class'=>'','content'=>'बडा नं:'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'birami_temporary_ward_no','placeholder'=>'बडा नं','validation'=>'required|np_integer|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'margin-left50','content'=>''],
                                    ['field_type'=>'span','class'=>'','content'=>'जातिगत ववरण'],
                                    ['field_type'=>'select','class'=>'','name'=>'birami_cast','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['ब्रह्माण्ड',],'validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'margin-left50','content'=>''],
                                    ['field_type'=>'span','class'=>'','content'=>'परिवार संख्या:'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'birami_family_no','placeholder'=>'परिवार संख्या','validation'=>'required|np_integer'],

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
                                    ['field_type'=>'span','class'=>'','content'=>'२'],
                                    ['field_type'=>'span','class'=>'','content'=>'आय सोत:'],
                                    ['field_type'=>'select','class'=>'','name'=>'birami_income_source','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['पेसा','खेति']],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                    ['field_type'=>'span','class'=>'','content'=>'आनुमनित मासिक आय:'],
                                    ['field_type'=>'input','class'=>'','name'=>'birami_monthly_income','placeholder'=>'मासिक आय','validation'=>'required|string|max:191'],
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
                                    ['field_type'=>'span','class'=>'','content'=>'३. जग्गा जमिन (क्षेत्रफल र स्थान समेत): '],
                                )
                            ],
                            [
                                'fields'=>array(
                                    [
                                        'field_type'=>'custom_field',
                                        'view'=>'sifaris.pages.custom_views.bipanna_nagarik_nibedan.table',
                                        'js'=>'sifaris.pages.custom_views.bipanna_nagarik_nibedan.js',
                                        'css'=>''
                                    ],

                                )


                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                    ['field_type'=>'span','class'=>'','content'=>'भौतिक संरचना: '],
                                    ['field_type'=>'select','class'=>'','name'=>'physical_structure','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['कच्ची','पक्कि']],
                                    ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                    ['field_type'=>'span','class'=>'','content'=>' सवारी साधन: '],
                                    ['field_type'=>'input','class'=>'','name'=>'vehicle','placeholder'=>'सवारी साधन','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                    ['field_type'=>'span','class'=>'','content'=>' सुन चाँदी: '],
                                    ['field_type'=>'input','class'=>'','name'=>'gold_silver','placeholder'=>'सुन चाँदी','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(

                                    ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                    ['field_type'=>'span','class'=>'','content'=>' बैंक मौज्दात:'],
                                    ['field_type'=>'input','class'=>'','name'=>'bank_balance','placeholder'=>'बैंक मौज्दात','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                    ['field_type'=>'span','class'=>'','content'=>' नगद:  '],
                                    ['field_type'=>'input','class'=>'','name'=>'cash','placeholder'=>'नगद: ','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(

                                    ['field_type'=>'span','class'=>'','content'=>'४. बिरामीको रोगको किसिम :'],
                                    ['field_type'=>'select','class'=>'','name'=>'rog_type','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['मुटु राग']],
                                )
                            ],

                            [
                                'fields'=>array(

                                    ['field_type'=>'span','class'=>'','content'=>'५. सम्तामग्न कागजातहरु :'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                    ['field_type'=>'span','class'=>'','content'=>'क) विवरणको नागरिकताको प्रतिलिपी(बालकको हकमा जन्म दर्ता प्रतिलिपी)'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                    ['field_type'=>'span','class'=>'','content'=>'ख) रोग निदान भएको प्रेस्कीप्सन'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'','content'=>'६. उपचार सहुलियतका लागि सिफारिस माग गरेको अस्पताल:'],
                                    ['field_type'=>'input','class'=>'','name'=>'hospital','placeholder'=>'अस्पताल ','validation'=>'required|string|max:191'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'','content'=>'७. सिफारिसको व्यहोरा:'],
                                    ['field_type'=>'input','class'=>'','name'=>'sifaris_behora','placeholder'=>'अस्पताल ','validation'=>'required|string|max:191'],
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
                                            ['field_type'=>'span','class'=>'text_bold','content'=>'उपरोक्त बमोजिमको व्यहोरा साँचो हो झुठा ठहरे सहँला बुझाउला'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'निवेदकको नाम:'],
                                            ['field_type'=>'input','class'=>'','name'=>'nibedak_name','placeholder'=>'निवेदकको नाम','validation'=>'required|string|max:191'],
                                        )
                                    ],

                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'ठेगाना:'],
                                            ['field_type'=>'input','class'=>'','name'=>'nibedak_address','placeholder'=>'ठेगाना','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'दस्तखत:'],
                                            ['field_type'=>'input','class'=>'','name'=>'nibedak_sign','placeholder'=>'दस्तखत','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'मिति:'],
                                            ['field_type'=>'input','class'=>'date-picker','name'=>'nibedak_date','placeholder'=>'मिती','validation'=>'required|string|max:191'],
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
                                            ['field_type'=>'span','class'=>'','content'=>'सम्पर्क नं.:'],
                                            ['field_type'=>'input','class'=>'','name'=>'nibedak_phone_no','placeholder'=>'सम्पर्क नं.','validation'=>'required|np_phone:191'],
                                        )
                                    ],

                                ),
                            ],
                            [
                                'col_no'=>'6',
                                'rows'=>array(
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'text_bold','content'=>'सिफारिस गर्ने'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'नाम:'],
                                            ['field_type'=>'input','class'=>'','name'=>'sifaris_garne_name','placeholder'=>'नाम','validation'=>'required|string|max:191'],
                                        )
                                    ],

                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'पद:'],
                                            ['field_type'=>'select','class'=>'','name'=>'sifaris_garne_post','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['अधिकृत']],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'दर्जा:'],
                                            ['field_type'=>'input','class'=>'','name'=>'sifaris_garne_darja','placeholder'=>'दर्जा','validation'=>'required|string|max:191'],
                                        )
                                    ],
                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'मिति:'],
                                            ['field_type'=>'input','class'=>'date-picker','name'=>'sifaris_garne_date','placeholder'=>'मिती','validation'=>'required|string|max:191'],
                                        )
                                    ],

                                    [
                                        'fields'=>array(
                                            ['field_type'=>'span','class'=>'','content'=>'कार्यालयको छाप:']
                                        )
                                    ],

                                ),
                            ]

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
        //setting all validation errors
        foreach ($this->view_array['form_sections'] as $form_section)
        {
            if(array_key_exists('cols',$form_section['flex-div']))
            {
                foreach($form_section['flex-div']['cols'] as $col)
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
            }
            else
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
    }


    public function index(Request $request)
    {
        $data = BipannaNibedan::where('deleted','=','0')->get();
        if($request->ajax()){

            if (!empty($request->nibedak_name)) {
                $data = BipannaNibedan::where('deleted','=','0')
                    ->where('applicant_name_bibaran', 'LIKE', '%'.$request->nibedak_name.'%')->get();
            }
            if (!empty($request->citizenship_no)) {
                $data = BipannaNibedan::where('deleted','=','0')->
                where('applicant_citizenship_number', 'LIKE', '%'.$request->citizenship_no.'%')->get();
            }
            if(!empty($request->sifaris_no)){
                $data=BipannaNibedan::where('deleted','=','0')
                    ->where('id','=',$request->sifaris_no)->get();
            }

//                $data=AadhibasiPramanitNibedan::where('id','=',$request->sifaris_no)
//                                            ->orWhere('applicant_citizenship_number','=',$request->citizenship_no)
//                                            ->orWhere('applicant_name_bibaran','=',$request->nibedak_name)->get();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="'.route('bipanna-nagarik.show',$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="show" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.route('bipanna-nagarik.edit',['bipanna_nagarik'=>$row['id']]).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="edit" data-target="#myModal"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-sm btn-danger delete-nibedan" data-id="'.$row['id'].'" id="deleteDarta"><i class="fa fa-trash"></i></a>
                    </div>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        $data['date'] = DateConverter::fromEnglishDate(date('Y'), date('m'), date('d'))->toNepaliDate();
        return view('sifaris.nibedan.bipanna_nagarik.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        return view('sifaris.nibedan.bipanna_nagarik.create');
        return view('sifaris.pages.create_page',['view_array'=>$this->view_array]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
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
        $bipannaNibedan=new BipannaNibedan();
        $bipannaNibedan=$this->set_values_in_fields($request,$bipannaNibedan,$this->view_array);
//        dd($bipannaNibedan);
        $bipannaNibedan->submitted_by=Auth::id();
        if($bipannaNibedan->save())
        {
            if($request->has('land_areas') && $request->has('land_locations'))
            {

                foreach ($request->land_areas as $key=>$land_area)
                {
                    DB::table('bipanna_nibedan_jaggas')->insert(['bipanna_nibedan_id'=>$bipannaNibedan->id,'jagga_area'=>$land_area,'jagga_location'=>$request->land_locations[$key]]);
                }

            }
            return Redirect::route('bipanna-nagarik.show',$bipannaNibedan->id)->with('success','सफलतापूर्वक स्टोर गरियो');
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
        $bipanna_nibedan_jaggas=DB::table('bipanna_nibedan_jaggas')->where('bipanna_nibedan_id','=',$id)->get();
        $bipannaNibedan=BipannaNibedan::where('id','=',$id)->get()->first();
//        return view('sifaris.nibedan.bipanna_nagarik.show',['model'=>$bipannaNibedan,'view_array'=>$this->view_array,'bipanna_nibedan_jaggas'=>$bipanna_nibedan_jaggas]);
        return view('sifaris.pages.main_show_page',['model'=>$bipannaNibedan,'view_array'=>$this->view_array,'bipanna_nibedan_jaggas'=>$bipanna_nibedan_jaggas]);
    }

    public function show_default($id)
    {
        $bipanna_nibedan_jaggas=DB::table('bipanna_nibedan_jaggas')->where('bipanna_nibedan_id','=',$id)->get();
        $bipannaNibedan=BipannaNibedan::where('id','=',$id)->get()->first();
        return view('sifaris.pages.show_page',['model'=>$bipannaNibedan,'view_array'=>$this->view_array,'bipanna_nibedan_jaggas'=>$bipanna_nibedan_jaggas,'view_only'=>true]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bipanna_nibedan_jaggas=DB::table('bipanna_nibedan_jaggas')->where('bipanna_nibedan_id','=',$id)->get();
        $bipannaNibedan=BipannaNibedan::where('id','=',$id)->get()->first();
        return view('sifaris.pages.edit_page',['model'=>$bipannaNibedan,'view_array'=>$this->view_array,'bipanna_nibedan_jaggas'=>$bipanna_nibedan_jaggas]);
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
        $bipannaNibedan=BipannaNibedan::where('id','=',$id)->get()->first();
        $bipannaNibedan=$this->set_values_in_fields($request,$bipannaNibedan,$this->view_array);
//        dd($bipannaNibedan);
        $bipannaNibedan->submitted_by=Auth::id();
        if($bipannaNibedan->save())
        {
            if($request->has('land_areas') && $request->has('land_locations'))
            {
                $can_update=true;
                foreach ($request->land_areas as $key=>$land_area)
                {
                    if($land_area=='' || $request->land_locations[$key]=='')
                    {
                        $can_update=false;
                        break;
                    }
                }
                if($can_update==true)
                {
                    DB::table('bipanna_nibedan_jaggas')->where('bipanna_nibedan_id','=',$id)->delete();
                    foreach ($request->land_areas as $key=>$land_area)
                    {
                        DB::table('bipanna_nibedan_jaggas')->insert(['bipanna_nibedan_id'=>$bipannaNibedan->id,'jagga_area'=>$land_area,'jagga_location'=>$request->land_locations[$key]]);
                    }
                }

            }
            else{

                DB::table('bipanna_nibedan_jaggas')->where('bipanna_nibedan_id','=',$id)->delete();

            }

            return Redirect::route('bipanna-nagarik.show',$bipannaNibedan->id)->with('success','सफलतापूर्वक परिवर्तन गरियो');
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
        return (BipannaNibedan::where('id','=',$id)->update(['deleted'=>1])) ?
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

    function show_pdf($id)
    {
        $bipanna_nibedan_jaggas=DB::table('bipanna_nibedan_jaggas')->where('bipanna_nibedan_id','=',$id)->get();
        $bipannaNibedan=BipannaNibedan::where('id','=',$id)->get()->first();
        $pdf = SnappyPdf::loadView('sifaris.pages.show_page',['model'=>$bipannaNibedan,'view_array'=>$this->view_array,'bipanna_nibedan_jaggas'=>$bipanna_nibedan_jaggas,'view_only'=>true]);
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
