<?php

namespace App\Http\Controllers\Sewa;
use App\Models\Sadasya;
use App\Models\Sakha;
use App\Models\Sewa\Yojana\DpDartaModel;
use App\Http\Controllers\Controller;

use App\Http\Controllers\Notification\NotificationController;
use App\Models\Notification\Notifications;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Krishnahimself\DateConverter\DateConverter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class DartaController extends Controller
{
    /**
     * Constructor.s
     *
     * @return \Illuminate\Http\Response
     */

    public $rules=[

        'dp_chalani_number' => 'required|string|max:191',
        'dp_darta_number' => 'required|string|max:191',
        'dp_darta_date' => 'required|string|max:191',
        'dp_darta_letter_department' => 'required|string|max:191',
        'dp_darta_letter_to' => 'required|string|max:191',
        'dp_darta_subject' => 'required|max:191',
        'dp_darta_letter_from' => 'required|max:191',
//            'dp_darta_file' => 'required|mimes:pdf,docx,excel,jpeg,jpg,png|max:2048',
        'dp_darta_description' => 'required|string|max:191',
        'dp_darta_kaifiyat' => 'required|string|max:191',
    ];

    public $messages=[

        'required' => 'यो क्षेत्र आवश्यक छ।',
        'string' => 'यो फिल्ड स्ट्रिङ हुनुपर्छ।',
        'max' => 'यो फिल्डले अधिकतम संख्या :max सम्म मात्र लिन्छ।',
    ];


    function __construct(){
        $this->middleware('permission:darta-list|darta-create|darta-edit|darta-delete', ['only' => ['index','store']]);
        $this->middleware('permission:darta-create', ['only' => ['create','store']]);
        $this->middleware('permission:darta-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:darta-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request){


//        $data = DpDartaModel::get();
        $data = DpDartaModel::join('sakhas','sakhas.id','=','dp_dartas.dp_darta_letter_department')
            ->join('sadasyas','sadasyas.id','=','dp_dartas.dp_darta_letter_to')
            ->join('users','users.id','=','sadasyas.user_id')
            ->get(['dp_dartas.*','sakhas.name as dp_darta_letter_department_name','users.name as dp_darta_letter_to_name']);
//        dd($data);
        if($request->ajax()){


//


            if(!empty($request->dartaNumber) || !empty($request->chalaniNumber) || !empty($request->startNpDate) || !empty($request->endNpDate)){
//                $data= DpDartaModel::where('dp_darta_number', $request->dartaNumber)
//                ->orWhere('dp_chalani_number', $request->chalaniNumber)
//                ->orWhereBetween('dp_darta_date', [$request->startNpDate, $request->endNpDate])
//                ->get();

                $data = DpDartaModel::join('sakhas','sakhas.id','=','dp_dartas.dp_darta_letter_department')
                    ->join('sadasyas','sadasyas.id','=','dp_dartas.dp_darta_letter_to')
                    ->join('users','users.id','=','sadasyas.user_id')
                    ->orwhere('dp_darta_number', $request->dartaNumber)
                    ->orWhere('dp_chalani_number', $request->chalaniNumber)
                    ->orWhereBetween('dp_darta_date', [$request->startNpDate, $request->endNpDate])
                    ->get(['dp_dartas.*','sakhas.name as dp_darta_letter_department_name','users.name as dp_darta_letter_to_name']);
            }else{
                if(Auth::user()->roles[0]->id==1){
//                    $data= DpDartaModel::all();
                    $data = DpDartaModel::join('sakhas','sakhas.id','=','dp_dartas.dp_darta_letter_department')
                        ->join('sadasyas','sadasyas.id','=','dp_dartas.dp_darta_letter_to')
                        ->join('users','users.id','=','sadasyas.user_id')
                        ->get(['dp_dartas.*','sakhas.name as dp_darta_letter_department_name','users.name as dp_darta_letter_to_name']);
                }else{
                    $data = DpDartaModel::join('sakhas','sakhas.id','=','dp_dartas.dp_darta_letter_department')
                        ->join('sadasyas','sadasyas.id','=','dp_dartas.dp_darta_letter_to')
                        ->join('users','users.id','=','sadasyas.user_id')
                        ->where('dp_dartas.user_id',Auth::user()->id)
                        ->where()
                        ->get(['dp_dartas.*','sakhas.name as dp_darta_letter_department_name','users.name as dp_darta_letter_to_name']);
//                    $data = DpDartaModel::where('user_id',Auth::user()->id)->get();
                }
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function($row){
                    return '<div class="text-center">
                    <a href="'.url('sewa/darta/'.$row['id'].'/edit').'" class="btn btn-sm btn-primary" data-id="'.$row['id'].'" id="edit" data-target="#myModal"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-sm btn-danger" data-id="'.$row['id'].'" id="deleteDarta"><i class="fa fa-trash"></i></a>
                    </div>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        $data['date'] = DateConverter::fromEnglishDate(date('Y'), date('m'), date('d'))->toNepaliDate();
        return view('sewa.darta.index', $data);
    }

    function store(Request $request){
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


                $darta = new DpDartaModel();
                if($request->session()->has('dp_darta_file'))
                {
                    $file_name_dp_darta_file=$request->session()->get('dp_darta_file');
//                    File::move(storage_path('app/files/temp-files/'.$file_name_dp_darta_file), public_path('files/darta/'.$file_name_dp_darta_file));
                    Storage::move('files/temp-files/'.$file_name_dp_darta_file,'public/files/darta/'.$file_name_dp_darta_file);
                    $darta->dp_darta_file='storage/files/darta/'.$file_name_dp_darta_file;
                    $request->session()->forget('dp_darta_file');

                }
                else{
                    return Redirect::back()->withErrors(['dp_darta_file'=> 'Please select the file']);
                }
                $darta->dp_chalani_number = $request->dp_chalani_number;
                $darta->dp_darta_number = $request->dp_darta_number;
                $darta->dp_darta_date = $request->dp_darta_date;
                $darta->dp_darta_letter_department = $request->dp_darta_letter_department;
                $darta->dp_darta_letter_to = $request->dp_darta_letter_to;
                $darta->dp_darta_subject = $request->dp_darta_subject;
                $darta->dp_darta_letter_from=$request->dp_darta_letter_from;
                $darta->dp_darta_description = $request->dp_darta_description;
                $darta->dp_darta_kaifiyat = $request->dp_darta_kaifiyat;
                $query =$darta->save();

                if(!$query){
                    return back()->with('fail' , 'Opss! सर्भर ERROR!');
                }else{
                    $data=array(
                        'notificaiton_message'=>$darta->dp_darta_description,
                        'notification_type'=>'Darta',
                        'notification_send_by'=>Auth::user()->id,
                        'notification_to'=>1,
                        'notification_type_id'=>$darta->id,
                        'notification_url'=>Route('darta.index'),
                    );
                    Notifications::create($data);
                    return Redirect::route('darta.index')->with(['dartaNumber'=>$darta->dp_darta_number,'message'=>'दर्ता सफलतापूर्वक स्टोर गरियो']);
                }

    }
    function create(Request $request)
    {
        $darta = DpDartaModel::latest()->first();
        $data['lists'] = DpDartaModel::all();
        $sadasyas=Sadasya::join('users','users.id','sadasyas.user_id')->select('users.name','sadasyas.*')->get();
        $data['sadasyas']=$sadasyas;
        $data['sakhas']=Sakha::all();
        if ($darta != NULL) {
            $data['darta_number'] = $darta->dp_darta_number;
            $data['chalani_number'] = $darta->dp_chalani_number;
        } else {
            $data['darta_number'] = 0;
            $data['chalani_number'] = 0;
        }
        $data['date'] = DateConverter::fromEnglishDate(date('Y'), date('m'), date('d'))->toNepaliDate();
        return view('sewa.darta.create', $data);
    }

    function edit($id){
        $darta = DpDartaModel::find($id,$columns = ['*']);
        $sakhas=Sakha::all();
        $sadasyas=Sadasya::join('users','users.id','sadasyas.user_id')->select('users.name','sadasyas.*')->get();
        return view('sewa.darta.edit', compact('darta','sadasyas','sakhas'));
    }

    function update(Request $request,$id)
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

        $darta = DpDartaModel::where('id',$id)->get()->first();
        if($request->session()->has('dp_darta_file'))
        {
            $file_name_dp_darta_file=$request->session()->get('dp_darta_file');
//                    File::move(storage_path('app/files/temp-files/'.$file_name_dp_darta_file), public_path('files/darta/'.$file_name_dp_darta_file));
            Storage::move('files/temp-files/'.$file_name_dp_darta_file,'public/files/darta/'.$file_name_dp_darta_file);
            $darta->dp_darta_file='storage/files/darta/'.$file_name_dp_darta_file;
            $request->session()->forget('dp_darta_file');
        }

        $darta->dp_chalani_number = $request->dp_chalani_number;
        $darta->dp_darta_number = $request->dp_darta_number;
        $darta->dp_darta_date = $request->dp_darta_date;
        $darta->dp_darta_letter_department = $request->dp_darta_letter_department;
        $darta->dp_darta_letter_to = $request->dp_darta_letter_to;
        $darta->dp_darta_subject = $request->dp_darta_subject;
        $darta->dp_darta_letter_from=$request->dp_darta_letter_from;
        $darta->dp_darta_description = $request->dp_darta_description;
        $darta->dp_darta_kaifiyat = $request->dp_darta_kaifiyat;
        $query =$darta->save();

        if(!$query){

            return back()->with('fail' , 'Opss! सर्भर ERROR!');
        }else{
            return Redirect::route('darta.index')->with(['dartaNumber'=>$darta->dp_darta_number,'message'=>'दर्ता सफलतापूर्वक परिवर्तन गरियो']);

        }
    }


    function destroy($id)
    {

        return (DpDartaModel::find($id)->delete($id)) ?
            response()->json(
                [
                    'status' => 200,

                    'message' => 'डाटा सिस्टमबाट मेटाइएको छ'

                ]
            ) : response()->json(
                [
                    'status' => 400,

                    'message' => 'सर्भर ERROR!'

                ]
            );

    }

    function delete($id){
    }


    function show($id)
    {
        return Redirect::route('darta.index')->with(['dartaNumber'=>$id]);

    }
}
