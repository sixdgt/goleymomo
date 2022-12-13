<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\DpWard;
use App\Models\Patra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PatraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->ajax()){
            $data = [];
            $patra = Patra::all();

            foreach ($patra as $key => $patra) {
                $eachpatra = array('no' => $key + 1, 'patra_type' => $patra->type, 'id' => $patra->id,'sid' => $patra->sid);
                array_push($data, $eachpatra);
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    return '<div class="text-center">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editPatra(' . $row['id'] . ')" data-id="' . $row['no'] . '" id="editSadasya" data-target="#myModal"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-sm btn-danger" onclick="deletePatra(' . $row['id'] . ')" data-id="' . $row['id'] . '" id="deletePatra"><i class="fa fa-trash"></i></button>                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('settings.patra.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('settings.patra.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'type' => 'required|min:3|max:255',
                    ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ]);
        } else {

            $patra = new Patra();
            $patra->type= $request->type;
            return ($patra->save()) ?
                response()->json(
                    [
                        'status' => 200,

                        'message' => 'पत्र किसिम सफलतापूर्वक थप गरियो',

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sadasya = Patra::all()
        ->where('id','=',$id);
        return ($sadasya) ?
            response()->json(
                [
                    'status' => 200,
                    'message' => 'data  has been found for editing',
                    'data' => $sadasya
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'updatedPatra' => 'required|min:3|max:255',

        ],
        [
            'updatedPatra.required'=>'पत्र किसिम आवश्यक छ'
        ]
        );

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ]);
        }
        $patra = Patra::find($id);
        $patra->id = $id;
        $patra->type = $request->updatedPatra;
        return ($patra->save()) ?
            response()->json(
                [
                    'status' => 200,

                    'message' => 'डाटा अपडेट गरिएको छ',

                    'data' => $patra
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return (Patra::find($id)->delete($id)) ?
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
