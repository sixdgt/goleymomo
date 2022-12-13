@extends('layouts.main')

@section('title')
    डिजिटल पालिका | बालबालिका परिचय पत्र
@endsection

@section('custom-css')
    <style>
        .asterik {
            color: red;
        }

        i {
            color: white !important;
        }

        .asterik {
            color: red;
        }

        form {
            box-shadow: 0 0 0 rgba(240,240,240,0);
        }

        .card {
            box-shadow: 0 10px 25px rgba(92,99,105,.2);
        }

        .btns {
            font-size: 1.2rem !important;
            border-radius: 0px !important;
        }


        .select2-selection
        {
            /*border:solid!important;*/
            /*width: 100%!important;*/
            height: 33px!important;
            border: none!important;
            background-color: #f7f7f7!important;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19)!important;
            padding-top: 0.2rem!important;
            padding-right: 0.75rem!important;
            padding-bottom: 0.375rem!important;
            padding-left: 0.75rem!important;

        }

    </style>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />


@endsection

@section('content')

    <section class="mr-4 mt-2">
        <div class="card">

            <div class="card-header">

                <a href="{{ route('apaanga.index') }}" style="float: left"><i class="fas fa-arrow-left arrow"></i></a>

                <span class="card-title">आपाङ्ग परिचय पत्र</span>

            </div>
            <div class="card-body">
                <form action="{{ route('apaanga.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        {{--            --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b> पहिलो नाम</b></label>
                                        <input type="text" class="form-control np-input-text" id="" value="{{old('first_name')}}" name="first_name" placeholder="पहिलो नाम">

                                        <input type="text" class="form-control" id="" value="{{old('first_name_english')}}" name="first_name_english" placeholder="First Name">
                                        <span class="text-danger" >
                                            <span id="error_first_name">@error('first_name'){{ $message }}@enderror</span>
                                            <span id="error_first_name_english">@error('first_name_english'){{ $message }}@enderror</span>
                                        </span>

                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>
                                        <input type="text" class="form-control np-input-text" id="" value="{{old('middle_name')}}" name="middle_name" placeholder="बिचको नाम">

                                        <input type="text" class="form-control" id="" value="{{old('middle_name_english')}}" name="middle_name_english" placeholder="middle name">
                                        <span class="text-danger">
                                            <span id="error_middle_name"> @error('middle_name'){{$message}}@enderror</span>
                                            <span id="error_middle_name_english"> @error('middle_name_english'){{$message}}@enderror</span>
                                        </span>

                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="last_name" class="form-label"><span class="asterik">*</span> <b> थर</b></label>
                                        <input type="text" class="form-control np-input-text" id="" value="{{old('last_name')}}" name="last_name" placeholder="थर">

                                        <input type="text" class="form-control" id="" value="{{old('last_name_english')}}" name="last_name_english" placeholder="last name">
                                        <span class="text-danger">
                                            <span id="error_last_name"> @error('last_name'){{$message}}@enderror</span>
                                            <span id="error_last_name_english"> @error('last_name_english'){{$message}}@enderror</span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="card">
                            <div class="card-body">
                                <label for="first_name" class="form-label"><span class="asterik">*</span> <b> स्थायी ठेगाना </b></label>
                                <div class="row">

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>प्रदेश </b></label>
                                        <select name="address_pradesh" id="address_pradesh" class="form-control">
                                            <option></option>
                                            @foreach($provinces as $province)
                                                <option value="{{$province['code']}}" {{old('address_pradesh')==$province['code'] ? "selected":""}}>{{$province['nepali_name']}}({{$province['english_name']}})</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" id="error_address_pradesh">
                                            @error('address_pradesh'){{ $message }}@enderror
                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>जिल्ला</b></label>

                                        <select name="address_jilla" id="address_jilla" class="form-control">
                                            <option></option>
                                            @foreach($districts as $district)
                                                <option value="{{$district[1]}}" {{old('address_jilla')==$district[1] ? "selected":""}}>{{$district[3]}} ( {{$district[2]}} )</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" id="error_address_jilla">
                                            @error('address_jilla'){{ $message }}@enderror
                                        </span>


                                    </div>
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>गा.बी.स / न.पा</b></label>
                                        <select name="address_palika" id="address_palika" class="form-control">
                                            <option></option>
                                            @foreach($local_bodies as $local_bodie)
                                                <option value="{{$local_bodie[1]}}" {{old('address_palika')==$local_bodie[1] ? "selected":""}}>{{$local_bodie[4]}} ( {{$local_bodie[3]}} )</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" id="error_address_palika">
                                            @error('address_palika'){{ $message }}@enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>वडा नं.</b></label>
                                        <input type="text" class="form-control" id="" value="{{old('address_ward_no')}}" name="address_ward_no" placeholder="वडा नं">

                                        <span class="text-danger" id="error_address_ward_no">
                                            @error('address_ward_no'){{ $message }}@enderror

                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>टोल </b></label>
                                        <input type="text" class="form-control np-input-text" id="" value="{{old('address_tol')}}" name="address_tol" placeholder="टोल">

                                        <span class="text-danger" id="error_address_tol">
                                            @error('address_tol'){{ $message }}@enderror

                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- बुवाको            --}}
                        <div class="card">
                            <div class="card-body">
                                <label for="first_name" class="form-label"><span class="asterik">*</span> <b> बुवाको   </b></label>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>पहिलो नाम  </b></label>
                                        <input type="text" class="form-control np-input-text" id="" value="{{old('father_first_name')}}" name="father_first_name" placeholder="बुवाको पहिलो नाम ">

                                        <input type="text" class="form-control" id="" value="{{old('father_first_name_english')}}" name="father_first_name_english" placeholder="father's first name">
                                        <span class="text-danger">
                                            <span id="error_father_first_name"> @error('father_first_name'){{ $message }}@enderror</span>
                                            <span id="error_father_first_name_english"> @error('father_first_name_english'){{ $message }}@enderror</span>

                                        </span>

                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>
                                        <input type="text" class="form-control np-input-text" id="" value="{{old('father_middle_name')}}" name="father_middle_name" placeholder="बुवाको बिचको नाम">

                                        <input type="text" class="form-control" id="" value="{{old('father_middle_name_english')}}" name="father_middle_name_english" placeholder="father's middle name">
                                        <span class="text-danger">
                                            <span id="error_father_middle_name"> @error('father_middle_name'){{$message}}@enderror</span>
                                            <span id="error_father_middle_name_english"> @error('father_middle_name_english'){{$message}}@enderror</span>
                                        </span>

                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="last_name" class="form-label"><span class="asterik">*</span> <b>थर</b></label>
                                        <input type="text" class="form-control np-input-text" id="" value="{{old('father_last_name')}}" name="father_last_name" placeholder="बुवाको थर">

                                        <input type="text" class="form-control" id="" value="{{old('father_last_name_english')}}" name="father_last_name_english" placeholder="father's name">
                                        <span class="text-danger">
                                            <span id="error_father_last_name"> @error('father_last_name'){{$message}}@enderror</span>
                                            <span id="error_father_last_name_english"> @error('father_last_name_english'){{$message}}@enderror</span>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-body">
                                <label for="first_name" class="form-label"><span class="asterik">*</span> <b> आमाको </b></label>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>पहिलो नाम  </b></label>
                                        <input type="text" class="form-control np-input-text" id="" value="{{old('mother_first_name')}}" name="mother_first_name" placeholder="आमाको पहिलो नाम ">

                                        <input type="text" class="form-control" id="" value="{{old('mother_first_name_english')}}" name="mother_first_name_english" placeholder="mother's first name ">
                                        <span class="text-danger">
                                            <span id="error_mother_first_name"> @error('mother_first_name'){{ $message }}@enderror</span>
                                            <span id="error_mother_first_name_english"> @error('mother_first_name_english'){{ $message }}@enderror</span>
                                        </span>

                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>
                                        <input type="text" class="form-control np-input-text" id="" value="{{old('mother_middle_name')}}" name="mother_middle_name" placeholder="आमाको बिचको नाम">

                                        <input type="text" class="form-control" id="" value="{{old('mother_middle_name_english')}}" name="mother_middle_name_english" placeholder="mother's middle name">
                                        <span class="text-danger">
                                            <span id="error_mother_middle_name"> @error('mother_middle_name'){{$message}}@enderror</span>
                                            <span id="error_mother_middle_name_english"> @error('mother_middle_name_english'){{$message}}@enderror</span>
                                        </span>

                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="last_name" class="form-label"><span class="asterik">*</span> <b>थर</b></label>
                                        <input type="text" class="form-control np-input-text" value="{{old('mother_last_name')}}" id="" name="mother_last_name" placeholder="आमाको थर">

                                        <input type="text" class="form-control" value="{{old('mother_last_name_english')}}" id="" name="mother_last_name_english" placeholder="mother's last name">
                                        <span class="text-danger">
                                            <span id="error_mother_last_name"> @error('mother_last_name'){{$message}}@enderror</span>
                                            <span id="error_mother_last_name_english"> @error('mother_last_name_english'){{$message}}@enderror</span>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-body">
                                <label for="first_name" class="form-label"><span class="asterik">*</span> <b> बाजेको </b></label>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>पहिलो नाम  </b></label>
                                        <input type="text" class="form-control np-input-text" value="{{old('grand_father_first_name')}}" id="" name="grand_father_first_name" placeholder="बाजेको पहिलो नाम ">

                                        <input type="text" class="form-control" value="{{old('grand_father_first_name_english')}}" id="" name="grand_father_first_name_english" placeholder="grand father's first name">
                                        <span class="text-danger">
                                            <span id="error_grand_father_first_name"> @error('grand_father_first_name'){{ $message }}@enderror</span>
                                            <span id="error_grand_father_first_name_english"> @error('grand_father_first_name_english'){{ $message }}@enderror</span>
                                        </span>

                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>
                                        <input type="text" class="form-control np-input-text" value="{{old('grand_father_middle_name')}}" id="" name="grand_father_middle_name" placeholder="बाजेको बिचको नाम">

                                        <input type="text" class="form-control" value="{{old('grand_father_middle_name_english')}}" id="" name="grand_father_middle_name_english" placeholder="grand father's middle name">
                                        <span class="text-danger">
                                            <span id="error_grand_father_middle_name"> @error('grand_father_middle_name'){{$message}}@enderror</span>
                                            <span id="error_grand_father_middle_name_english"> @error('grand_father_middle_name_english'){{$message}}@enderror</span>
                                        </span>

                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="last_name" class="form-label"><span class="asterik">*</span> <b>थर</b></label>
                                        <input type="text" class="form-control np-input-text" value="{{old('grand_father_last_name')}}" id="" name="grand_father_last_name" placeholder="बाजेको थर">

                                        <input type="text" class="form-control" value="{{old('grand_father_last_name_english')}}" id="" name="grand_father_last_name_english" placeholder="grand father's last name">
                                        <span class="text-danger">
                                            <span id="error_grand_father_last_name"> @error('grand_father_last_name'){{$message}}@enderror</span>
                                            <span id="error_grand_father_last_name_english"> @error('grand_father_last_name_english'){{$message}}@enderror</span>
                                        </span>

                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div>
                                        <label for="contact" class="form-label"><span class="asterik">*</span> <b> राष्ट्रिय परिचय पत्र वा नागरिकता नं</b></label>
                                        <input type="text" class="form-control" id="" value="{{old('identity_card_no')}}" name="identity_card_no" placeholder="राष्ट्रिय परिचय पत्र वा नागरिकता नं">
                                        <span class="text-danger" id="error_identity_card_no">
                                            @error('identity_card_no'){{$message}}@enderror

                                        </span>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="dob" class="form-label"><span class="asterik">*</span> <b> जन्म मिति</b></label>
                                        <input type="text" class="form-control" id="apaanga_dob" value="{{old('dob')}}" name="dob" placeholder="जन्म मिति">

                                        <span class="text-danger" id="error_dob">
                                            @error('dob'){{$message}}@enderror

                                        </span>

                                    </div>


                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="gender" class="form-label"><span class="asterik">*</span> <b>लिङ्ग</b></label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option></option>

                                            @foreach($genders as $gender)
                                                <option value="{{$gender[0]}}" {{old('gender')==$gender[0] ? "selected":""}}>{{$gender[2]}} ({{$gender[1]}})</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger" id="error_gender">@error('gender'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="row">
{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="marital_status" class="mb-2"><span class="asterik">*</span><b> वैवाहिक स्थिति</b></label>--}}
{{--                                        <select id="marital_status" name="marital_status" class="form-control">--}}
{{--                                            <option></option>--}}
{{--                                            <option value="विवाहीत" {{ (old('marital_status')=="विवाहीत") ? "selected": ""}}>विवाहीत</option>--}}
{{--                                            <option value="अविवाहीत" {{ (old('marital_status')=="अविवाहीत") ? "selected": ""}}>अविवाहीत</option>--}}
{{--                                            <option value="विधवा" {{ (old('marital_status')=="विधवा") ? "selected": ""}}>विधवा</option>--}}
{{--                                        </select>--}}
{{--                                        <span class="text-danger">@error('marital_status'){{$message}}@enderror</span>--}}
{{--                                    </div>--}}
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="contact" class="form-label"><span class="asterik">*</span> <b> मोबाइल नं</b></label>
                                        <input type="text" class="form-control" id="" value="{{old('contact')}}" name="contact" placeholder="मोबाइल नं">

                                        <span class="text-danger" id="error_contact">
                                            @error('contact'){{$message}}@enderror


                                        </span>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="contact" class="form-label"><span class="asterik">*</span> <b> रक्त समूह</b></label>

                                        <select id="blood_group" name="blood_group" class="form-control">
                                            <option></option>
                                            @foreach($blood_groups as $blood_group)
                                                <option value="{{$blood_group[1]}}" {{ (old('blood_group')==$blood_group[1]) ? "selected": ""}}>{{$blood_group[1]}}</option>
                                            @endforeach
                                        </select>

                                        <span class="text-danger" id="error_blood_group">
                                            @error('blood_group'){{$message}}@enderror

                                        </span>

                                    </div>
                                </div>

                            </div>

                        </div>


                        <div class="card">
                            <div class="card-body">
                                <label for="first_name" class="form-label"><span class="asterik">*</span> <b>अपाङ्गताको किसिम</b></label>
                                <div class="row">
                                    <div class="form-group col-sm-12 col-lg-6">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>प्रकृतिको आधारमा</b></label>
                                        <select name="disability_type_nature" id="disability_type_nature" class="form-control">
                                            <option></option>
                                            @foreach($diability_nature_types as $diability_nature_type)
                                                <option value="{{$diability_nature_type[0]}}" {{old('disability_type_nature')==$diability_nature_type[0] ? "selected":""}}>{{$diability_nature_type[2]}} ({{$diability_nature_type[1]}})</option>
                                            @endforeach

                                        </select>
                                        <span class="text-danger" id="error_disability_type_nature">@error('disability_type_nature'){{ $message }}@enderror</span>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-6">
                                        <label for="middle_name" class="form-label"><b>गम्भीरता आधारमा</b></label>
                                        <select name="disability_type_severity" id="disability_type_severity" class="form-control">
                                            <option></option>
                                            @foreach($diability_severity_types as $diability_severity_type)
                                                <option value="{{$diability_severity_type[0]}}" {{old('disability_type_severity')==$diability_severity_type[0] ? "selected":""}}>{{$diability_severity_type[1]}}-{{$diability_severity_type[3]}} ({{$diability_severity_type[2]}})</option>
                                            @endforeach

                                        </select>
                                        <span class="text-danger" id="error_disability_type_severity">@error('disability_type_severity'){{$message}}@enderror</span>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-12 col-lg-6">
                                        <label for="picture" class="form-label"><span class="asterik">*</span> <b> फोटो छान्नुहोस</b></label>
                                        <input type="file" class="form-control" id="apaanga_profile_picture" name="apaanga_profile_picture" placeholder="फोटो छान्नुहोस">
                                        <span class="text-danger">@error('apaanga_profile_picture'){{$message}}@enderror</span>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-6">
                                        <label for="citizenship" class="form-label"><span class="asterik">*</span> <b> राष्ट्रिय परिचय पत्र वा नागरिकता छान्नुहोस </b></label>
                                        <input type="file" class="form-control" id="apaanga_citizenship" name="apaanga_citizenship" placeholder="छान्नुहोस">
                                        <span class="text-danger" id="error_apaanga_citizenship">@error('apaanga_citizenship'){{$message}}@enderror</span>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex bd-highlight mb-3">
                            <div class="me-auto bd-highlight alert alert-danger col-sm-12 col-lg-12">नोट: क्रिपया आवश्यक सम्पूर्ण जानकारीहरु भर्नु होला |</div>
                        </div>
                        <div class="d-flex bd-highlight mb-3">

                            <div class="bd-highlight mr-2">
                                <button class="btn_palika" type="submit" id="btn-save"><i class="fas fa-save"></i> सेभ</button>
                            </div>

                            <div class="bd-highlight mr-2">
                                <a type="button" href="{{route('apaanga.index')}}" class="btn_palika" id="btn-back"><i class="fas fa-backspace"></i> पछाडी</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('custom-script')

    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v3.7.min.js"
            type="text/javascript"></script>
    <script>
        // $("#apaanga_dob").nepaliDatePicker();

        var endPick = document.getElementById("apaanga_dob");
        endPick.nepaliDatePicker({

        });
    </script>

    <script>
        // Get a reference to the file input element
        const inputElement_profile = document.querySelector('input[id="apaanga_profile_picture"]');
        const inputElement_citizenship = document.querySelector('input[id="apaanga_citizenship"]');
        // Create a FilePond instance
        const pond_profile = FilePond.create(inputElement_profile);
        const pond_ccitizenship = FilePond.create(inputElement_citizenship);
        FilePond.setOptions({
            server:
                {
                    url:'{{route('file.upload')}}',
                    headers:{
                        'X-CSRF-TOKEN':'{{csrf_token()}}'
                    }
                }
        });

        $(document).ready(function() {
            $('#address_jilla').select2({
                width: 'resolve'

            });
            $('#address_palika').select2();
        });

    </script>
@endsection
