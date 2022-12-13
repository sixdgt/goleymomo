<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\Sadasya;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class SadasyaController extends Controller
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
            $sadasyas = DB::table('sadasyas')
                ->join('users', 'sadasyas.user_id', '=', 'users.id')
                ->select('users.id','sadasyas.id as sid', 'users.name')
                ->get();

            foreach ($sadasyas as $key => $sadasya) {
                $eachSadasya = array('no' => $key + 1, 'sadasya_name' => $sadasya->name, 'id' => $sadasya->id,'sid' => $sadasya->sid);
                array_push($data, $eachSadasya);
            }
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<div class="text-center">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" onclick="editSadasya(' . $row['id'] . ')" data-id="' . $row['no'] . '" id="editSadasya" data-target="#myModal"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-sm btn-danger" onclick="deleteSadasya(' . $row['sid'] . ')" data-id="' . $row['no'] . '" id="deleteSadasya"><i class="fa fa-trash"></i></button>
                    </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('settings.sadasya.index');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

                'sadasyaKoNam' => 'required|min:3|max:255',
            ],
            [
                'sadasyaKoNam.required' => 'नाम आवश्यक छ।',
                'sadasyaKoNam.min' => '',
                'sadasyaKoNam.max'=>''
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'डाटा मा त्रुटि छ',

                'errors' => $validator->errors(),
            ]);
        } else {
            if ($request->sadasyaKoNamKoId == '') {
                if (count($user = User::find($request->sadasyaKoNam))) {
                    $request->sadasyaKoNamId = $user->id;
                } else {
                    return  response()->json(
                        [
                            'status' => 404,
                            'message' => 'Not found!'
                        ]
                    );
                }
            }
            $sadasya = new Sadasya();
            $sadasya->user_id = $request->sadasyaKoNamKoId;
            return ($sadasya->save()) ?
                response()->json(
                    [
                        'status' => 200,

                        'message' => 'सदस्य सफलतापूर्वक थप गरियो',

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
//    public function show($id)
//    {
//        $sadasyas = DB::table('users')
//
//            ->select('id', 'name')
//
//            ->where('name', 'like', "%$id%")
//            ->get();
//
//        $suggestionHtml = '<ul class="dropdown-menu display-block d-block position-relative" id="suggestions">';
//        if (count($sadasyas) < 1) {
//            $suggestionHtml .= "<li>Data Not Found!!! Try Inserting data in User Management</li>";
//        }
//        foreach ($sadasyas as $key => $sadasya) {
//            $suggestionHtml .= "<li value='" . $sadasya->id . "'><a href='#'>" . $sadasya->name . "</a></li>";
//        }
//        $suggestionHtml .= '</ul>';
//
//        return $suggestionHtml;
//    }


    public function show($id)
    {
        $sadasyas = DB::table('users')
            ->select('id', 'name',)
            ->where('name', 'like', "%$id%")
            ->get();

        $suggestionHtml = '<ul class="dropdown-menu display-block p-3 d-block position-relative" id="suggestions">';
        if (count($sadasyas) < 1) {

            $suggestionHtml .= "डाटा फेला परेन!!! <a style='color:red' href='".route('users.create')."' target='_blank'>नयाँ प्रयोगकर्ता थप्नुहोस् । <i class='fas fa-plus-square'></i></a>";

        }
        foreach ($sadasyas as $key => $sadasya) {
            $suggestionHtml .= "<li value='" . $sadasya->id . "'><a href='#'>" . $sadasya->name . "</a></li>";
        }
        $suggestionHtml .= '</ul>';

        return $suggestionHtml;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sadasya = DB::table('sadasyas')
        ->join('users', 'sadasyas.user_id', '=', 'users.id')
        ->select('users.id', 'users.name')
        ->where('users.id','=',$id)
        ->get();

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
            'updatedSadasyaKoNam' => 'required|min:3|max:255',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'message' => 'Validation errors',
                'errors' => $validator->errors(),
            ]);
        }
        $sadasya = User::find($id);
        $sadasya->id = $id;
        $sadasya->name = $request->updatedSadasyaKoNam;
        return ($sadasya->save()) ?
            response()->json(
                [
                    'status' => 200,

                    'message' => 'डाटा अपडेट गरिएको छ',

                    'data' => $sadasya
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
        return (Sadasya::find($id)->delete($id)) ?
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
