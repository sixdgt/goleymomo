<?php

namespace App\Http\Controllers\Sewa\Sifaris\Nibedan;

use App\Http\Controllers\Controller;
use App\Models\Sifraris\Nibedan\BriddhaBhattaNibedan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class BriddhaBhattaNibedanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $messages = [
        'designation.required' => 'पदनाम क्षेत्र आवश्यक छ।',
        'from_palika.required' => 'पालिका क्षेत्र आवश्यक छ।',
        'to_palika.required' => 'पालिका क्षेत्र आवश्यक छ।',
        'application_date.required' => 'आवेदन क्षेत्र आवश्यक छ।',
        'category.required' => 'श्रेणी आवश्यक छ।',
        'name.required' => 'नाम आवश्यक छ।',
        'father_name.required' => 'बुबाको नाम आवश्यक छ।',
        'mother_name.required' => 'आमाको नाम आवश्यक छ।',
        'date_of_birth.required' => 'जन्म मिति आवश्यक छ।',
        'address.required' => 'ठेगाना आवश्यक छ।',
        'gender.required' => 'लिङ्ग आवश्यक छ।',
        'citizenship_number.required' => 'नागरिक संख्या आवश्यक छ।',
        'issued_district.required' => 'जारी जिल्ला आवश्यक छ।',
        'date_of_old_age_citizen.required' => 'वृद्ध नागरिकको मिति आवश्यक छ।',
        'contact_number.required' => 'सम्पर्क नम्बर आवश्यक छ।',
        'widow_spouse_name.required' => 'विवाहित सहयोगी नाम आवश्यक छ।',
        'window_spouse_death_date.required' => 'विवाहित सहयोगी मृत्यु मिति आवश्यक छ।',
        'signature.required' => 'हस्ताक्षर आवश्यक छ।',
        'registered_date.required' => 'पंजीकरण मिति आवश्यक छ।',
        'type.required' => 'प्रकार आवश्यक छ।',
        'card_number.required' => 'कार्ड नम्बर आवश्यक छ।',
        'bhatta_started_date.required' => 'भट्टा सुरु मिति आवश्यक छ।',
        'month_type.required' => 'महिना प्रकार आवश्यक छ।',
        'applicant_name.required' => 'आवेदक नाम आवश्यक छ।',
        'applicant_address.required' => 'आवेदक ठेगाना आवश्यक छ।',
        'applicant_citizenship_no.required' => 'आवेदक नागरिक संख्या आवश्यक छ।',
        'applicant_contact.required' => 'आवेदक सम्पर्क नम्बर आवश्यक छ।'
    ];
    public $rules = [
        'designation' => "required",
        'from_palika' => "required",
        'to_palika' => "required",
        'application_date' => "required",
        'category' => "required",
        'name' => "required",
        'father_name' => "required",
        'mother_name' => "required",
        'date_of_birth' => "required",
        'address' => "required",
        'gender' => "required",
        'citizenship_number' => "required",
        'issued_district' => "required",
        'date_of_old_age_citizen' => "required",
        'contact_number' => "required",
        'widow_spouse_name' => "required",
        'window_spouse_death_date' => "required",
        'signature' => "required",
        'registered_date' => "required",
        'type' => "required",
        'card_number' => "required",
        'bhatta_started_date' => "required",
        'month_type' => "required",
        'applicant_name' => "required",
        'applicant_address' => "required",
        'applicant_citizenship_no' => "required",
        'applicant_contact' => "required"
    ];
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = BriddhaBhattaNibedan::all();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    return '<div class="text-center">
                    <a href="' . route("briddha-bhatta.edit", "{$row['id']}") . '">
                               <button  type="button" class="btn btn-sm btn-primary" ><i class="fa fa-pencil"></i></button>
                               </a>
                               <button onclick="deleteNibedan(' . $row['id'] . ')" type="button" class="btn btn-sm btn-danger" ><i class="fa fa-trash"></i></button>
                               </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('sewa.sifaris.nibedan.briddha_bhatta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sewa.sifaris.nibedan.briddha_bhatta.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        if (BriddhaBhattaNibedan::create($request->all())) {
            // return 'inserted';
            session()->flash('success', 'डाटा सफलतापूर्वक भण्डारण गरिएको छ।');
            return redirect(route('briddha-bhatta.index'));
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
        $data = BriddhaBhattaNibedan::find($id);
        return view('sewa.sifaris.nibedan.briddha_bhatta.edit', compact('data'));
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
        if (BriddhaBhattaNibedan::find($id)->update($request->all())) {
            session()->flash('success', 'डाटा सफलतापूर्वक अद्यावधिक गरिएको छ।');
            return redirect(route('briddha-bhatta.index'));
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
        return (BriddhaBhattaNibedan::find($id)->delete($id)) ?
            response()->json(
                [
                    'status' => 200,
                    'message' => 'डाटा सफलतापूर्वक मेटिएको छ।'
                ]
            ) : response()->json(
                [
                    'status' => 400,
                    'message' => 'सर्भर त्रुटि।'
                ]
            );
    }
}
