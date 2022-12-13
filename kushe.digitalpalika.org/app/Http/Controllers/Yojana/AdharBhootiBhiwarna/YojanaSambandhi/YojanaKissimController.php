<?php

namespace App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi;

use App\Http\Controllers\Controller;
use App\Models\Yojana\AdharBhooti\YojanaSambandhi\YojanaKissim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class YojanaKissimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $rules = [
        "code" => "required",
        "full_name" => "required",
        "name" => "required",
        "details" => "required",
        "upper_group" => "required",
    ];
    private $messages = [
        "required" => "यो क्षेत्र आवश्यक छ।",
        "boolean" => "यो क्षेत्र बूल्यूम हुनु पर्छ।",
    ];
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = YojanaKissim::all()
                ->where('is_deleted', 0);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<div class="text-center">
                    <a href="' . route("yojana-kissim.edit", "{$row['id']}") . '">
                               <button  type="button" class="btn btn-sm btn-primary" ><i class="fa fa-pencil"></i></button>
                               </a>
                               <button onclick="del(' . $row['id'] . ')" type="button" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button>
                               </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('yojana.adharbhooti_bhiwarna.yojana_sambandhi.yojana_kissim.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('yojana.adharbhooti_bhiwarna.yojana_sambandhi.yojana_kissim.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules, $this->messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        if (YojanaKissim::create($request->all())) {
            session()->flash("success", "डाटा सफलतापूर्वक थपिएको छ।");
            return redirect()->route('yojana-kissim.index');
        } else {
            session()->flash("error", "डाटा थप्ने क्रिप्टीयर गर्नु भएको छ।");
            return redirect()->route('yojana-kissim.index');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('yojana.adharbhooti_bhiwarna.yojana_sambandhi.yojana_kissim.edit', [
            'data' => YojanaKissim::find($id)
        ]);
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
        $validator = Validator::make($request->all(), $this->rules, $this->messages);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        $data = YojanaKissim::find($id);
        if ($data->update($request->all())) {
            session()->flash("success", "डाटा सफलतापूर्वक परिवर्तन गरियो छ।");
            return redirect()->route('yojana-kissim.index');
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
        $yojanaKissim = YojanaKissim::find($id);
        $yojanaKissim->id = $id;
        $yojanaKissim->is_deleted = 1;
        return ($yojanaKissim->save()) ?
            response()->json(
                [
                    'status' => 200,
                    'message' => 'डाटा मेटाइएको छ।',
                    'data' => $yojanaKissim
                ]
            ) : response()->json(
                [
                    'status' => 400,
                    'message' => 'सर्भर त्रुटि।'
                ]
            );

    }
}
