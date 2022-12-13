<?php

namespace App\Http\Controllers\Sifaris\Nagarikta;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sifaris\SifarisAbstractController;
use App\Models\Sifaris\Nagarikta\NagariktaPramanPatra;
use App\Models\Sifaris\Nagarikta\NagariktaPramanPatraFromPati;
use App\Models\Sifaris\Nagarikta\NepaliNagariktaSifaris;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Krishnahimself\DateConverter\DateConverter;
use Yajra\DataTables\Facades\DataTables;

class NagariktaPramanPatraFromPatiController extends SifarisAbstractController
{
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
        $this->model=new NagariktaPramanPatraFromPati();
        $this->setViewArray(
            array(
                'form_store_url'=>'nagarikta-pramanpatra-frompati.store',
                'form_update_url'=>'nagarikta-pramanpatra-frompati.update',
                'form_destroy_url'=>'nagarikta-pramanpatra-frompati.destroy',
                'back_url'=>'nagarikta-pramanpatra-frompati.index',
                'form_title'=>'पतिको नाममा नेपाली नागरिकताको प्रमाण-पत्र ।',


                'create_page_url'=>'nagarikta-pramanpatra-frompati.create',
                'index_page_url'=>'nagarikta-pramanpatra-frompati.index',
                'show_page_url'=>'nagarikta-pramanpatra-frompati.show',
                'form_edit_url'=>'nagarikta-pramanpatra-frompati.edit',
                'default_view_url'=>'nagarikta-pramanpatra-frompati.default',
                'pdf_view_url'=>'nagarikta-pramanpatra-frompati.pdf',
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
                        'div-class-name'=>'',
                        'flex-div'=>array(
                            'position'=>'center',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','class'=>'text_bold','content'=>'विषय: सिफारिस सम्बन्धमा ।'],
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
                            'position'=>'start',
                            'rows'=>array(
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'प्रस्तुत विषयमा यस'],
                                        ['field_type'=>'input','class'=>'','name'=>'palika_name','placeholder'=>'','validation'=>'required|string|max:191'],

                                        ['field_type'=>'span','content'=>'वडा नं.'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'palika_ward_no','placeholder'=>'वडा नं','validation'=>'required|np_integer'],
                                        ['field_type'=>'span','content'=>','],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'bajar_no','placeholder'=>'','validation'=>'required|np_integer'],
                                        ['field_type'=>'span','content'=>'नं. बजार निवासी'],
                                        ['field_type'=>'input','class'=>'','name'=>'husband_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'को श्रीमति'],
                                        ['field_type'=>'input','class'=>'','name'=>'wife_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'ले विवाह पूर्व'],
                                        ['field_type'=>'select','class'=>'','name'=>'body_prasasan_type','placeholder'=>'','option_type'=>'static','options'=>['जिल्ला'],'validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'प्रशासन कार्यालय'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_prasasan_address','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'बाट ना.प्र.न.'],
                                        ['field_type'=>'input','class'=>'','name'=>'citizenship_no','placeholder'=>'ना.प्र.न.','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'को नेपाली नागरिकताको प्रमाण-पत्र मिति'],
                                        ['field_type'=>'input','class'=>'date-picker','name'=>'citizenship_taken_date','placeholder'=>'मिति','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'मा लिनु भई निजको विवाह'],
                                        ['field_type'=>'input','class'=>'','name'=>'husband_district_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'जिल्ला'],
                                        ['field_type'=>'input','class'=>'','name'=>'husband_palika_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'वडा नं.'],
                                        ['field_type'=>'input','class'=>'input-number','name'=>'husband_ward_no','placeholder'=>'','validation'=>'required|np_integer'],
                                        ['field_type'=>'span','content'=>'निवासी'],
                                        ['field_type'=>'input','class'=>'','name'=>'body_husband_name','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'संग मिति'],
                                        ['field_type'=>'input','class'=>'date-picker','name'=>'married_date','placeholder'=>'','validation'=>'required|string|max:191'],
                                        ['field_type'=>'span','content'=>'मा भएको हुँदा निजलाई पतिको थर र ठेगाना राखी नेपाली नागरिकताको प्रमाण-पत्र उपलब्ध गराई दिन हुन सिफारिस साथ अनुरोध छ ।'],
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

                                        ['field_type'=>'input','class'=>'','name'=>'staff_name','placeholder'=>'','validation'=>'required|string|max:191'],

                                    )
                                ],
                                [
                                    'fields'=>array(
                                        ['field_type'=>'span','content'=>'पद छनौट गर्नुहोस्‌'],
                                        ['field_type'=>'select','class'=>'','name'=>'staff_post','placeholder'=>'','option_type'=>'static','options'=>['jfalskd'],'validation'=>'required|string|max:191'],

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
                                        ['field_type'=>'input','name'=>'applicant_phone_number','validation'=>'required|string|max:191','placeholder'=>'निवेदकको फोन न.  '],

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
        $data = NagariktaPramanPatraFromPati::where('deleted','=','0')->get();
        if($request->ajax()) {
            if (!empty($request->nibedak_name)) {
                $data = NagariktaPramanPatraFromPati::where('deleted','=','0')
                    ->where('applicant_name_bibaran', 'LIKE', '%'.$request->nibedak_name.'%')
                    ->get();
            }
            if (!empty($request->citizenship_no)) {
                $data = NagariktaPramanPatraFromPati::where('deleted','=','0')->
                where('applicant_citizenship_number', 'LIKE', '%'.$request->citizenship_no.'%')->get();
            }
            if(!empty($request->sifaris_no)){
                $data=NagariktaPramanPatraFromPati::where('deleted','=','0')
                    ->where('id','=',$request->sifaris_no)->get();
            }


            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="'.route('nagarikta-pramanpatra-frompati.show',$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="show" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.route('nagarikta-pramanpatra-frompati.edit',['nagarikta_pramanpatra_frompati'=>$row['id']]).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="edit" data-target="#myModal"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-sm btn-danger delete-nibedan" data-id="'.$row['id'].'" id="deleteDarta"><i class="fa fa-trash"></i></a>
                    </div>';
                })
                ->rawColumns(['actions','files'])
                ->make(true);
        }
        $data['date'] = DateConverter::fromEnglishDate(date('Y'), date('m'), date('d'))->toNepaliDate();
        return view('sifaris.pages.index_page', ['data'=>$data,'view_array'=>$this->getViewArray()]);
    }

//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        return view('sifaris.pages.create_page',['view_array'=>$this->getViewArray()]);
//    }
//
//    /**
//     * Store a newly created resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @return \Illuminate\Http\Response
//     */
//    public function store(Request $request)
//    {
//
//    }
//
//    /**
//     * Display the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function show($id)
//    {
//        //
//    }
//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        //
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        //
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        //
//    }


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
        $nagariktaPramanPatraFromPati=NagariktaPramanPatraFromPati::where('id','=',$id)->get()->first();
        $nagariktaPramanPatraFromPati=$this->set_values_in_fields($request,$nagariktaPramanPatraFromPati,$this->getViewArray());
        if($nagariktaPramanPatraFromPati->save())
        {
            return Redirect::route('nagarikta-pramanpatra.index',$nagariktaPramanPatraFromPati->id)->with('success','सफलतापूर्वक स्टोर गरियो');
        }
    }
}
