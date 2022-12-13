<?php

namespace App\Http\Controllers\Sewa;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Setting\PatraController;
use App\Models\DpParichaya;

use App\Models\Notification\Notifications;
use App\Models\Patra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Krishnahimself\DateConverter\DateConverter;
use App\Models\Sewa\Yojana\DpChalaniModel;
//use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ChalaniController extends Controller
{
    /**
     * Constructor.
     *
     * @return \Illuminate\Http\Response
     */

    public $rules = [
        'dp_chalani_number' => 'required|string|max:191',
        'dp_chalani_date' => 'required|string|max:191',
        'dp_chalani_subject' => 'required|string|max:191',
        'dp_chalani_letter_type' => 'required|string|max:191',
        'dp_chalani_letter_department' => 'required|string|max:191',
        'dp_chalani_letter_to' => 'required|string|max:191',
        'dp_chalani_letter_address' => 'required|max:191',
        //                'dp_chalani_file' => 'required|mimes:pdf,docx,excel,jpeg,jpg,png|max:2048',
        'dp_chalani_bodartha' => 'required|string|max:191',
        'dp_chalani_kaifiyat' => 'required|string|max:191',
    ];

    public $messages = [
        'required' => 'यो क्षेत्र आवश्यक छ।',
        'string' => 'यो फिल्ड स्ट्रिङ हुनुपर्छ।',
        'max' => 'यो फिल्डले अधिकतम संख्या :max सम्म मात्र लिन्छ।',
    ];

    function __construct()
    {
        $this->middleware('permission:chalani-list|chalani-create|chalani-edit|chalani-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:chalani-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:chalani-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:chalani-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {

//        $chalani = DpChalaniModel::latest()->first();
        $data = DpChalaniModel::join('patras','patras.id','=','dp_chalanis.dp_chalani_letter_type')
            ->get(['dp_chalanis.*','patras.type as dp_chalani_letter_type_name']);

        if ($request->ajax()) {
            if(!empty($request->chalaniNumber) || !empty($request->startNpDate) || !empty($request->endNpDate)){
                if (Auth::user()->roles[0]->id==1) {
                    $data= DpChalaniModel::join('patras','patras.id','=','dp_chalanis.dp_chalani_letter_type')
                        ->where('dp_chalanis.dp_chalani_number', $request->chalaniNumber)
                        ->orWhereBetween('dp_chalanis.dp_chalani_date', [$request->startNpDate, $request->endNpDate])
                        ->get(['dp_chalanis.*','patras.type as dp_chalani_letter_type_name']);

                }else{
                    $data= DpChalaniModel::join('patras','patras.id','=','dp_chalanis.dp_chalani_letter_type')
                        ->where('user_id', Auth::user()->id)
                        ->orWhere('dp_chalani_number', $request->chalaniNumber)
                        ->orWhereBetween('dp_chalanis.dp_chalani_date', [$request->startNpDate, $request->endNpDate])
                        ->get(['dp_chalanis.*','patras.type as dp_chalani_letter_type_name']);
                }
            }else{
                if(Auth::user()->roles[0]->id==1){
//                    $data= DpChalaniModel::all();
                    $data = DpChalaniModel::join('patras','patras.id','=','dp_chalanis.dp_chalani_letter_type')
                        ->get(['dp_chalanis.*','patras.type as dp_chalani_letter_type_name']);
                }else{
//                    $data= DpChalaniModel::where('user_id', Auth::user()->id)->get();
                    $data = DpChalaniModel::join('patras','patras.id','=','dp_chalanis.dp_chalani_letter_type')
                        ->where('dp_chalanis.user_id', Auth::user()->id)
                        ->get(['dp_chalanis.*','patras.type as dp_chalani_letter_type_name']);
                }
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    return
                        '<div class="text-center">
                            <a href="' . url('sewa/chalani/' . $row['id'] . '/edit') . '" class="btn btn-sm btn-primary" data-id="' . $row['id'] . '" id="editYojana" data-target="#myModal"><i class="fa fa-pencil"></i></a>
                            <a class="btn btn-sm btn-danger" data-id="' . $row['id'] . '" id="deleteChalani"><i class="fa fa-trash"></i></a>
                        </div>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        $data['date'] = DateConverter::fromEnglishDate(date('Y'), date('m'), date('d'))->toNepaliDate();
        return view('sewa.chalani.index', $data);
    }

    function store(Request $request)
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
        //
        //                $file_name = time().'_'.$request->file('dp_chalani_file')->getClientOriginalName();
        //                $file_path = $request->file('dp_chalani_file')->storeAs('uploads/chalani', $file_name, 'public');

        $chalani = new DpChalaniModel();
        if ($request->session()->has('dp_chalani_file')) {
            $file_name_dp_chalani_file = $request->session()->get('dp_chalani_file');
//            File::move(storage_path('app/files/temp-files/' . $file_name_dp_chalani_file), public_path('files/chalani/' . $file_name_dp_chalani_file));
            Storage::move('files/temp-files/'.$file_name_dp_chalani_file,'public/files/chalani/'.$file_name_dp_chalani_file);

            $chalani->dp_chalani_file = 'storage/files/chalani/'.$file_name_dp_chalani_file;
            $request->session()->forget('dp_chalani_file');
        } else {

            return Redirect::back()->withErrors(['dp_chalani_file' => 'कृपया फाइल चयन गर्नुहोस्']);

        }
        $chalani->dp_chalani_number = $request->dp_chalani_number;
        $chalani->dp_chalani_date = $request->dp_chalani_date;
        $chalani->dp_chalani_subject = $request->dp_chalani_subject;
        $chalani->dp_chalani_letter_type = $request->dp_chalani_letter_type;
        $chalani->dp_chalani_letter_department = $request->dp_chalani_letter_department;
        $chalani->dp_chalani_letter_to = $request->dp_chalani_letter_to;
        $chalani->dp_chalani_letter_address = $request->dp_chalani_letter_address;
        //                $chalani->dp_chalani_file = '/storage/' . $file_path;
        $chalani->dp_chalani_bodartha = $request->dp_chalani_bodartha;
        $chalani->dp_chalani_kaifiyat = $request->dp_chalani_kaifiyat;

        $query = $chalani->save();

        if (!$query) {

            return back()->with('fail', 'Opss! something went wrong');
        } else {

            return Redirect::route('chalani.index')->with(['chalaniNumber'=>$chalani->dp_chalani_number,'message'=>'चलानी सफलतापूर्वक स्टोर गरियो']);

        }
    }

    function create(Request $request)
    {
        $chalani = DpChalaniModel::latest()->first();
        $data['lists'] = DpChalaniModel::all();
        $data['patra_types'] = Patra::all();
        if ($chalani != NULL) {
            $data['chalani_number'] = $chalani->dp_chalani_number;
        } else {
            $data['chalani_number'] = 0;
        }
        if ($request->ajax()) {
            $data = DpChalaniModel::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('actions', function ($row) {
                    return '<div class="text-center">
                    <button class="btn btn-sm btn-primary" data-id="' . $row['id'] . '" id="editYojana" data-target="#myModal"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-sm btn-danger" data-id="' . $row['id'] . '" id="deleteYojana"><i class="fa fa-trash"></i></button>
                    </div>';
                })
                ->rawColumns(['actions'])
                ->make(true);
        }
        $data['date'] = DateConverter::fromEnglishDate(date('Y'), date('m'), date('d'))->toNepaliDate();

        return view('sewa.chalani.create', $data);
    }

    function edit($id)
    {
        $patra_types = Patra::all();
        $chalani = DpChalaniModel::find($id, $columns = ['*']);
        return view('sewa.chalani.edit', compact('chalani', 'patra_types'));
    }

    function update(Request $request, $id)
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


        //
        //                $file_name = time().'_'.$request->file('dp_chalani_file')->getClientOriginalName();
        //                $file_path = $request->file('dp_chalani_file')->storeAs('uploads/chalani', $file_name, 'public');

        $chalani = DpChalaniModel::where('id', $id)->get()->first();
        if ($request->session()->has('dp_chalani_file')) {
            $file_name_dp_chalani_file = $request->session()->get('dp_chalani_file');
//            File::move(storage_path('app/files/temp-files/' . $file_name_dp_chalani_file), public_path('files/chalani/' . $file_name_dp_chalani_file));
            Storage::move('files/temp-files/'.$file_name_dp_chalani_file,'public/files/chalani/'.$file_name_dp_chalani_file);

            $chalani->dp_chalani_file = 'storage/files/chalani/'.$file_name_dp_chalani_file;
//            $chalani->dp_chalani_file = 'files/chalani/' . $file_name_dp_chalani_file;
            $request->session()->forget('dp_chalani_file');
        }

        $chalani->dp_chalani_number = $request->dp_chalani_number;
        $chalani->dp_chalani_date = $request->dp_chalani_date;
        $chalani->dp_chalani_subject = $request->dp_chalani_subject;
        $chalani->dp_chalani_letter_type = $request->dp_chalani_letter_type;
        $chalani->dp_chalani_letter_department = $request->dp_chalani_letter_department;
        $chalani->dp_chalani_letter_to = $request->dp_chalani_letter_to;
        $chalani->dp_chalani_letter_address = $request->dp_chalani_letter_address;
        //                $chalani->dp_chalani_file = '/storage/' . $file_path;
        $chalani->dp_chalani_bodartha = $request->dp_chalani_bodartha;
        $chalani->dp_chalani_kaifiyat = $request->dp_chalani_kaifiyat;

        $query = $chalani->save();

        if (!$query) {

            return back()->with('fail', 'Opss! something went wrong');
        } else {

            $data=array(
                'notificaiton_message'=>$chalani->dp_chalani_subject,
                'notification_type'=>'Chalani',
                'notification_send_by'=>Auth::user()->id,
                'notification_to'=>1,
                'notification_type_id'=>$chalani->id,
                'notification_url'=>Route('darta.index'),
            );
            Notifications::create($data);
            return Redirect::route('chalani.index')->with(['chalaniNumber'=>$chalani->dp_chalani_number,'message'=>'चलानी सफलतापूर्वक परिवर्तन गरियो']);
        }
    }


    function destroy($id)
    {
        return (DpChalaniModel::find($id)->delete($id)) ?
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
}
