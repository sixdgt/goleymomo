<?php
//
//namespace App\Http\Controllers\Setting;
//
//use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
//use Yajra\DataTables\Facades\DataTables;
//
//class SakhaController extends Controller
//{
//    /**
//     * Display a listing of the resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function index(Request $request)
//    {
//        if($request->ajax()){
//            $data = array(
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//                ['no'=>1,'sakha_name'=>'fdsafasd'],
//                ['no'=>2,'sakha_name'=>'dfas'],
//            );
//
//            return Datatables::of($data)
//                ->addIndexColumn()
//                ->addColumn('action', function($row){
//                    return '<div class="text-center">
//                    <button class="btn btn-sm btn-primary" data-id="'.$row['no'].'" id="editSakhaBtn" data-bs-target="#sakhaModal" data-bs-toggle="modal"><i class="fa fa-pencil"></i></button>
//                    <button class="btn btn-sm btn-danger" data-id="'.$row['no'].'" id="deleteSakhaBtn"><i class="fa fa-trash"></i></button>
//                    </div>';
//                })
//                ->rawColumns(['action'])
//                ->make(true);
//        }
//        return view('settings.sakha.index');
//    }
//
//    /**
//     * Show the form for creating a new resource.
//     *
//     * @return \Illuminate\Http\Response
//     */
//    public function create()
//    {
//        //
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
//        //
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
//}


namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Sakha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SakhaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = [];
            $sakha = Sakha::all();

            foreach ($sakha as $key => $sakha) {
                $eachsakha = array('no' => $key + 1, 'sakha_name' => $sakha->name, 'id' => $sakha->id,);
                array_push($data, $eachsakha);
            }

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<div class="text-center">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editSakha(' . $row['id'] . ')" data-id="' . $row['id'] . '" id="editSakha" data-bs-target="#sakhaModal" data-bs-toggle="modal"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-sm btn-danger" onclick="deleteSakha(' . $row['id'] . ')" data-id="' . $row['id'] . '" id="deleteSakha"><i class="fa fa-trash"></i></button>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('settings.sakha.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ]);
        } else {

            $sakha = new Sakha();
            $sakha->name = $request->name;
            return ($sakha->save()) ?
                response()->json(
                    [
                        'status' => 200,

                        'message' => 'साखा  सफलतापूर्वक थप गरियो',

                    ]
                ) : response()->json(
                    [
                        'status' => 400,
                        'message' => 'सर्भर ERROR!'
                    ]
                );
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sakha = Sakha::find($id);
        return ($sakha) ?
            response()->json(
                [
                    'status' => 200,
                    'message' => 'data  has been found for editing',
                    'data' => $sakha
                ]
            ) : response()->json(
                [
                    'status' => 400,
                    'message' => 'Something went wrong'
                ]
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'updatedSakha' => 'required|min:3|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ]);
        }
        $sakha = Sakha::find($id);
        $sakha->id = $id;
        $sakha->name = $request->updatedSakha;
        return ($sakha->save()) ?
            response()->json(
                [
                    'status' => 200,

                    'message' => 'डाटा अपडेट गरिएको छ',

                    'data' => $sakha
                ]
            ) : response()->json(
                [
                    'status' => 400,

                    'message' => 'सर्भर ERROR!'

                ]
            );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return (Sakha::find($id)->delete($id)) ?
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

