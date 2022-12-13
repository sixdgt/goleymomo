<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SharedController extends Controller
{

    public $messages;
    public function __construct()
    {
        $this->messages = $this->getMessages();
    }
    public $title;
    public $class_instance;
    public $route_name;
    public $view_path;
    public $rules;
    public $table_headers;
    public $columns;
    public $form;

    public function index(Request $request)
    {
        // return $this->currentFiscalYear();
        if ($request->ajax()) {
            $data = $this->class_instance::all()
                ->where('is_deleted', 0);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<div class="text-center">
                                <a href="' . route("{$this->route_name}.edit", "{$row['id']}") . '">
                                     <button  type="button" class="s btn-sm btn-primary" ><i class="fa fa-pencil"></i></button>
                                </a>
                               <button onclick="del(' . $row['id'] . ')" type="button" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $data['title'] = $this->title;
        $data['route_name'] = $this->route_name;
        $data['table_headers'] = $this->table_headers;
        $data['columns'] = $this->columns;
        return view($this->view_path . '.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['route_name'] = $this->route_name;
        $data['title'] = $this->title;
        /*
            createForm() :- createes a form araay and set to $form variable of class
        */
        $this->createForm();
        /*
            $data['form'] :- this variable gets the array of form with various fields
            which will be use in the shared view of create as well as edit form
            in which array will be pass to the form compnenet params in the view
        */
        $data['form'] = $this->form;
        return view($this->view_path . '.create', compact('data'));
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
        if ($this->class_instance::create($request->all())) {
            session()->flash("success", "डाटा सफलतापूर्वक थपिएको छ।");
            return redirect()->route("{$this->route_name}.index");
        } else {
            session()->flash("error", "डाटा थप्ने क्रिप्टीयर गर्नु भएको छ।");
            return redirect()->route("{$this->route_name}.index");
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
        $data['route_name'] = $this->route_name;
        $data['title'] = $this->title;
        $data['data'] = $this->class_instance::find($id);
        /*
            createForm() :- createes a form araay and set to $form variable of class
        */

            // $this->createForm();
            $this->createForm($data['data'], 'put', 'update');
            $data['form'] = $this->form;
        /*
            $data['form'] :- this variable gets the array of form with various fields
            which will be use in the shared view of create as well as edit form
            in which array will be pass to the form compnenet params in the view
        */
        return view($this->view_path . '.edit', compact('data'));
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

        $data = $this->class_instance::find($id);
        if ($data->update($request->all())) {
            session()->flash("success", "डाटा सफलतापूर्वक परिवर्तन गरियो छ।");
            return redirect()->route("{$this->route_name}.index");
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
        $yojanaSanchalanPrakriya = $this->class_instance::find($id);
        $yojanaSanchalanPrakriya->id = $id;
        $yojanaSanchalanPrakriya->is_deleted = 1;
        return ($yojanaSanchalanPrakriya->save()) ?
            response()->json(
                [
                    'status' => 200,
                    'message' => 'डाटा मेटाइएको छ।',
                    'data' => $yojanaSanchalanPrakriya
                ]
            ) : response()->json(
                [
                    'status' => 400,
                    'message' => 'सर्भर त्रुटि।'
                ]
            );
    }

    public function engToNepNumbers($num): string
    {
        $nep_nums = array('१', '२', '३', '४', '५', '६', '७', '८', '९', '०');
        $eng_num = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
        $nep_num = str_replace($eng_num, $nep_nums, str_split($num));
        return implode($nep_num);
    }

    public function nepToEngNumbers($num): string
    {
        $nep_nums = array('१', '२', '३', '४', '५', '६', '७', '८', '९', '०');
        $eng_num = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
        $nep_num = str_replace($eng_num, $nep_nums, str_split($num));
        return implode($nep_num);
    }
    public function fiscal_year_generate_with_list($up_to_years = 20)
    {
        $todaysDateInGregorian = Carbon::now();
        $currentDateInNepal = $todaysDateInGregorian->addYears(56)->addMonths(8)->addDays(15);
        $fiscal_year = [];
        $current_year = $currentDateInNepal->format('Y');
        $previous_year = $currentDateInNepal->format('Y') - 1;

        for ($i = 1; $i <= $up_to_years; $i++) {
            $c_y = $this->engToNepNumbers($current_year);
            $p_y = $this->engToNepNumbers($previous_year);
            array_push($fiscal_year, ($c_y) . "-" . ($p_y));
            $current_year = $previous_year;
            $previous_year = $current_year - 1;
        }
        return $fiscal_year;
    }
    public function currentFiscalYear():string
    {
        $todaysDateInGregorian = Carbon::now();
        $currentDateInNepal = $todaysDateInGregorian->addYears(56)->addMonths(8)->addDays(15);
        return $this->engToNepNumbers($currentDateInNepal->format('Y')) ."-". $this->engToNepNumbers($currentDateInNepal->format('Y')-1);
    }
    // will be override in child class
    public function createForm(){}
}
