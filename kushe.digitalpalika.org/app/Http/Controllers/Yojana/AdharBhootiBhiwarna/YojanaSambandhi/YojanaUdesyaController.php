<?php

namespace App\Http\Controllers\Yojana\AdharBhootiBhiwarna\YojanaSambandhi;

use App\Http\Controllers\Controller;
use App\Models\Yojana\AdharBhooti\YojanaSambandhi\YojanaUdesya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class YojanaUdesyaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $rules=[
        "code"=>"required",
        "name"=>"required",
        "full_name"=>"required",
        "details"=>"required",
    ];
    private $messages=[
        "required"=>"यो क्षेत्र आवश्यक छ।",
        "boolean"=>"यो क्षेत्र बूल्यूम हुनु पर्छ।",
    ];
    public function index(Request $request)
    {
        //
        if ($request->ajax()) {
            $data = YojanaUdesya::all()
                ->where('is_deleted', 0);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<div class="text-center">
                    <a href="' . route("yojana-udesya.edit", "{$row['id']}") . '">
                               <button  type="button" class="btn btn-sm btn-primary" ><i class="fa fa-pencil"></i></button>
                               </a>
                               <button onclick="del(' . $row['id'] . ')" type="button" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button>
                               </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('yojana.adharbhooti_bhiwarna.yojana_sambandhi.yojana_udesya.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('yojana.adharbhooti_bhiwarna.yojana_sambandhi.yojana_udesya.create');

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
        if (YojanaUdesya::create($request->all())) {
            session()->flash("success", "डाटा सफलतापूर्वक थपिएको छ।");
            return redirect()->route('yojana-udesya.index');
        } else {
            session()->flash("error", "डाटा थप्ने क्रिप्टीयर गर्नु भएको छ।");
            return redirect()->route('yojana-udesya.index');

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
        return view('yojana.adharbhooti_bhiwarna.yojana_sambandhi.yojana_udesya.edit', [
            'data' => YojanaUdesya::find($id)
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
        $data = YojanaUdesya::find($id);
        if ($data->update($request->all())) {
            session()->flash("success", "डाटा सफलतापूर्वक परिवर्तन गरियो छ।");
            return redirect()->route('yojana-udesya.index');
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
        $yojanaUdesya = YojanaUdesya::find($id);
        $yojanaUdesya->id = $id;
        $yojanaUdesya->is_deleted = 1;
        return ($yojanaUdesya->save()) ?
            response()->json(
                [
                    'status' => 200,
                    'message' => 'डाटा मेटाइएको छ।',
                    'data' => $yojanaUdesya
                ]
            ) : response()->json(
                [
                    'status' => 400,
                    'message' => 'सर्भर त्रुटि।'
                ]
            );
    }
}
