<?php

namespace App\Http\Controllers\Sifaris\Nibedan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Sifaris\SifarisAbstractController;
use App\Models\Sifaris\Nibedan\AadhibasiPramanitNibedan;

use Barryvdh\Snappy\Facades\SnappyPdf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Schema;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Krishnahimself\DateConverter\DateConverter;
use function PHPUnit\Framework\isEmpty;
use TCPDF;
use Yajra\DataTables\Facades\DataTables;

class AadibasiPramanitNibedanController extends SifarisAbstractController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->view_array= array(


            'form_store_url'=>'aadibasi-pramanit.store',
            'form_update_url'=>'aadibasi-pramanit.update',
            'back_url'=>'aadibasi-pramanit.index',
            'form_title'=>'आदिबासी प्रमाणित सिफारिस',


            'index_page_url'=>'aadibasi-pramanit.index',
            'form_edit_url'=>'aadibasi-pramanit.edit',
            'default_view_url'=>'aadibasi-pramanit.default',
            'pdf_view_url'=>'aadibasi-pramanit.pdf',

            'form_sections'=>array(
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
                    'div-class-name'=>'div-nibedan-to',
                    'flex-div'=>array(
                        'position'=>'start',
                        'rows'=>array(
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'श्री वडा सचिब ज्यु, '],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'input','class'=>'','name'=>'palika_name','validation'=>'required|string|max:191','placeholder'=>'पालिकाको नाम','validation'=>'required|string|max:191'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'palika_ward_no','validation'=>'required|np_integer','placeholder'=>'वडा न.','validation'=>'required|np_integer'],
                                    ['field_type'=>'span','content'=>'वडा कार्यालय'],
                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'input','class'=>'','name'=>'palika_address','validation'=>'required|string|max:191','placeholder'=>'पालिका ठेगाना','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'।'],
                                )
                            ]
                        )
                    )
                ],

                [
                    'div-class-name'=>'div-nibedan-title',
                    'flex-div'=>array(
                        'position'=>'center',
                        'rows'=>array(
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'प्रस्तुत बिसयमा यस '],
                                    ['field_type'=>'select','class'=>'','name'=>'janajati_category','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['जनजाती'],'validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'सिफारिस पऊ ।'],
                                )
                            ]
                        )
                    )
                ],

                [
                    'div-class-name'=>'div-nibedan-title',
                    'flex-div'=>array(
                        'position'=>'left',
                        'rows'=>array(
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','class'=>'margin-left20','content'=>''],
                                    ['field_type'=>'span','class'=>'','content'=>'प्रस्तुत बिसयमा यस'],
                                    ['field_type'=>'input','class'=>'','name'=>'palika_name_app_body','validation'=>'required|string|max:191','placeholder'=>'पालिकाको नाम','validation'=>'required|string|max:191'],
                                    ['field_type'=>'span','content'=>'वडा न.'],
                                    ['field_type'=>'input','class'=>'input-number','name'=>'ward_no','validation'=>'required|np_integer','placeholder'=>'वडा न.','validation'=>'required|np_integer'],
                                    ['field_type'=>'span','content'=>' निबासी '],
                                    ['field_type'=>'select','class'=>'','name'=>'applicant_parent_abbreviation','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['श्री'],'validation'=>'required|string|max:191'],
                                    ['field_type'=>'input','class'=>'','name'=>'applicant_parent_name','validation'=>'required|string|max:191','placeholder'=>''],
                                    ['field_type'=>'span','content'=>' को '],
                                    ['field_type'=>'select','class'=>'','name'=>'applicant_relationship','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['छोरा','छोरी']],
                                    ['field_type'=>'select','class'=>'','name'=>'applicant_abbreviation','validation'=>'required|string|max:191','placeholder'=>'','option_type'=>'static','options'=>['श्री']],
                                    ['field_type'=>'input','class'=>'','name'=>'applicant_name_page','validation'=>'required|string|max:191','placeholder'=>'नाम'],
                                    ['field_type'=>'span','content'=>'आदिबासी जनजाती अन्तर्गत'],
                                    ['field_type'=>'input','class'=>'','name'=>'janajati_caste','validation'=>'required|string|max:191','placeholder'=>'जति'],
                                    ['field_type'=>'span','content'=>' जाति भएको व्यहोराको सिफारिस उपलब्ध गराई पऊ यो निबेदन पेस गरेको छु ।'],
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
                                    ['field_type'=>'span','content'=>'संलग्न कागज पत्रहरु :-','hide_in_view'=>true],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'file','file_type'=>'','file_display'=>'dynamic','class'=>'','name'=>'palika_name','validation'=>'required|string|max:191','placeholder'=>'पालिकाको नाम'],
                                )
                            ]
                        )
                    )
                ],

                [
                    'div-class-name'=>'div-nibedan-to',
                    'flex-div'=>array(
                        'position'=>'end',
                        'rows'=>array(
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'निवेदक/निबेदिका'],

                                )
                            ],
                            [
                                'fields'=>array(
                                    ['field_type'=>'span','content'=>'नाम, थर :-'],
                                    ['field_type'=>'input','name'=>'applicant_name','validation'=>'required|string|max:191','placeholder'=>'निवेदकको नाम'],

                                )
                            ],
                            [
                                'fields'=>array(

                                    ['field_type'=>'span','content'=>'ठेगाना :-'],
                                    ['field_type'=>'input','name'=>'applicant_address','validation'=>'required|string|max:191','placeholder'=>'निवेदकको ठेगाना'],
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
                                    ['field_type'=>'span','class'=>'b_title','content'=>'निवेदकको विवरण'],

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

    public function index(Request $request)
    {
        $data = AadhibasiPramanitNibedan::where('deleted','=','0')->get();
        if($request->ajax()) {
            if (!empty($request->nibedak_name)) {
                $data = AadhibasiPramanitNibedan::where('deleted','=','0')
                    ->where('applicant_name_bibaran', 'LIKE', '%'.$request->nibedak_name.'%')
                    ->get();
            }
            if (!empty($request->citizenship_no)) {
                $data = AadhibasiPramanitNibedan::where('deleted','=','0')->
                                                where('applicant_citizenship_number', 'LIKE', '%'.$request->citizenship_no.'%')->get();
            }
            if(!empty($request->sifaris_no)){
                $data=AadhibasiPramanitNibedan::where('deleted','=','0')
                                                ->where('id','=',$request->sifaris_no)->get();
            }


            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('files', function($row){
                    $aadhibasiPramanitNibedan=new AadhibasiPramanitNibedan();
                    $aadhibasiPramanitNibedan->id=$row['id'];
                    $files=$aadhibasiPramanitNibedan->files()->get();
                    $buttons='';
                    foreach ($files as $file)
                    {

                        $buttons=$buttons.'<a href="'.url($file->url).'" target="_blank" weight="50" height="50" style="font-size:18px;color:#00a2e8;"> '.$file->file_title.' </a></br>';
                    }
                    return $buttons;
                })
                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="'.route('aadibasi-pramanit.show',$row['id']).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="show" data-target="#myModal"><i class="fa fa-eye"></i></a>
                    <a href="'.route('aadibasi-pramanit.edit',['aadibasi_pramanit'=>$row['id']]).'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="edit" data-target="#myModal"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-sm btn-danger delete-nibedan" data-id="'.$row['id'].'" id="deleteDarta"><i class="fa fa-trash"></i></a>
                    </div>';
                })
                ->rawColumns(['actions','files'])
                ->make(true);
        }
        $data['date'] = DateConverter::fromEnglishDate(date('Y'), date('m'), date('d'))->toNepaliDate();
        return view('sifaris.nibedan.aadibasi_pramanit.index', $data);

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
        $aadhibasiPramanitNibedan=new AadhibasiPramanitNibedan();
        $aadhibasiPramanitNibedan=$this->set_values_in_fields($request,$aadhibasiPramanitNibedan,$this->view_array);

//        $table_fields=Schema::getColumnListing($aadhibasiPramanitNibedan->getTable());
//        foreach ($table_fields as $table_field)
//        {
//            foreach ($this->view_array['form_sections'] as $form_section)
//            {
//                foreach ($form_section['flex-div']['rows'] as $row)
//                {
//                    foreach ($row['fields'] as $field)
//                    {
//                        if($field['field_type']=='input' || $field['field_type']=='select'){
//                            if($table_field==$field['name'])
//                            {
//                                $aadhibasiPramanitNibedan->$table_field=$request->$table_field;
//                            }
//                        }
//                    }
//                }
//            }
//
//        }
        $aadhibasiPramanitNibedan->is_janajati='1';
        $aadhibasiPramanitNibedan->submitted_by=Auth::id();
        if($aadhibasiPramanitNibedan->save())
        {
            if($request->has('uploaded_file_names') && $request->has('document_file_title'))
            {

                foreach ($request->document_file_title as $key=>$file_title)

                {
                    $file_name=$request->uploaded_file_names[$key];
//                    File::move(storage_path('app/files/temp-files/'.$request->uploaded_file_names[$key]), public_path($file_path));
                    Storage::move('files/temp-files/'.$file_name,'public/files/sifaris/nibedan/'.$file_name);
                    $aadhibasiPramanitNibedan->files()->create(["file_title"=>$file_title, "url"=>'storage/files/sifaris/nibedan/'.$file_name]);
                }
            }
            return Redirect::route('aadibasi-pramanit.show',$aadhibasiPramanitNibedan->id)->with('success','सफलतापूर्वक स्टोर गरियो');

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

        $aadhibasiPramanitNibedan=AadhibasiPramanitNibedan::where('id','=',$id)->get()->first();
//        return view('sifaris.nibedan.aadibasi_pramanit.show',['model'=>$aadhibasiPramanitNibedan,'view_array'=>$this->view_array]);
        return view('sifaris.pages.main_show_page',['model'=>$aadhibasiPramanitNibedan,'view_array'=>$this->view_array]);
    }

    public function show_default($id)
    {
        $aadhibasiPramanitNibedan=AadhibasiPramanitNibedan::where('id','=',$id)->get()->first();
        return view('sifaris.pages.show_page',['model'=>$aadhibasiPramanitNibedan,'view_array'=>$this->view_array]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $aadhibasiPramanitNibedan=AadhibasiPramanitNibedan::where('id','=',$id)->get()->first();
        return view('sifaris.pages.edit_page',['model'=>$aadhibasiPramanitNibedan,'view_array'=>$this->view_array]);
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
        $aadhibasiPramanitNibedan=AadhibasiPramanitNibedan::where('id','=',$id)->get()->first();
        $aadhibasiPramanitNibedan=$this->set_values_in_fields($request,$aadhibasiPramanitNibedan,$this->view_array);
        $aadhibasiPramanitNibedan->is_janajati='1';
        $aadhibasiPramanitNibedan->submitted_by=Auth::id();
        if($aadhibasiPramanitNibedan->save())
        {
            if($request->has('uploaded_file_names') && $request->has('document_file_title'))
            {


                foreach ($request->document_file_title as $key=>$file_title)
                {
                    $file_name=$request->uploaded_file_names[$key];
//                    File::move(storage_path('app/files/temp-files/'.$request->uploaded_file_names[$key]), public_path($file_path));
                    Storage::move('files/temp-files/'.$file_name,'public/files/sifaris/nibedan/'.$file_name);
                    $aadhibasiPramanitNibedan->files()->create(["file_title"=>$file_title, "url"=>'storage/files/sifaris/nibedan/'.$file_name]);
                }
            }
            return Redirect::route('aadibasi-pramanit.show',$aadhibasiPramanitNibedan->id)->with('success','सफलतापूर्वक परिवर्तन गरियो');
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

        return (AadhibasiPramanitNibedan::where('id','=',$id)->update(['deleted'=>1])) ?
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


//    function show_pdf($id)
//    {
//        $aadhibasiPramanitNibedan=AadhibasiPramanitNibedan::where('id','=',$id)->get()->first();
////        return view('sifaris.pages.show_page',['model'=>$aadhibasiPramanitNibedan,'view_array'=>$this->view_array]);
//        $pdf = SnappyPdf::loadView('sifaris.pages.show_page',['model'=>$aadhibasiPramanitNibedan,'view_array'=>$this->view_array]);
//        $pdf->setOption('enable-javascript', true);
//        $pdf->setOption('javascript-delay', 2000);
//        $pdf->setOption('enable-smart-shrinking', true);
//        $pdf->setOption('no-stop-slow-scripts', true);
////        $pdf->setOption('viewport-size', '400x200');
////    $pdf->setOption('no-outline', true);
//        $pdf->setOption('page-size','A4');
//        $pdf->setOption('margin-left','0mm');
//        $pdf->setOption('margin-right','0mm');
//        $pdf->setOption('margin-top','0mm');
//        $pdf->setOption('margin-bottom','0mm');
//        $pdf->setOption('orientation', 'Portrait');
////        $pdf->setOption('page-height','100');
////        $pdf->setOption('page-width','106.5');
//        return $pdf->stream();
//
//    }


    public function show_pdf($id){

        $aadhibasiPramanitNibedan=AadhibasiPramanitNibedan::where('id','=',$id)->get()->first();
        $html =  view('sifaris.pages.show_page',['model'=>$aadhibasiPramanitNibedan,'view_array'=>$this->view_array]);



        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setFontSubSetting(true);
        $pdf->setFont('preeti','',12,'', true);
        // $pdf->SetFont('dejavusans', '', 14, '', true);
        $pdf->AddPage();
        $pdf->writeHTML($html, true, 0, true, true);
        $output = $pdf->Output('001.pdf', 'I');
        return $output;
    }
}
