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
    </style>
@endsection

@section('content')

    <section class="mr-4 mt-2">
        <div class="card">

            <div class="card-header">
                <a href="{{ route('apaanga.index') }}" style="float: left"><i class="fas fa-arrow-left arrow"></i></a>

                <span class="card-title">आपाङ्ग परिचय पत्र</span>


            </div>
            <div class="card-body">
                <form action="{{ route('apaanga.update',['id'=>$apaanga->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        {{--            --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b> पहिलो नाम</b></label>
                                        <input type="text" class="form-control np-input-text" id="" value="{{$apaanga->first_name}}" name="first_name" placeholder="पहिलो नाम">

                                        <input type="text" class="form-control" id="" value="{{$apaanga->first_name_english}}" name="first_name_english" placeholder="First Name">
                                        <span class="text-danger">
                                            @error('first_name'){{ $message }}@enderror
                                            @error('first_name_english'){{ $message }}@enderror
                                        </span>

                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>
                                        <input type="text" class="form-control np-input-text" id="" value="{{$apaanga->middle_name}}" name="middle_name" placeholder="बिचको नाम">

                                        <input type="text" class="form-control" id="" value="{{$apaanga->middle_name_english}}" name="middle_name_english" placeholder="middle name">
                                        <span class="text-danger">
                                            @error('middle_name'){{$message}}@enderror
                                            @error('middle_name_english'){{$message}}@enderror
                                        </span>

                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="last_name" class="form-label"><span class="asterik">*</span> <b> थर</b></label>
                                        <input type="text" class="form-control np-input-text" id="" value="{{$apaanga->last_name}}" name="last_name" placeholder="थर">

                                        <input type="text" class="form-control" id="" value="{{$apaanga->last_name_english}}" name="last_name_english" placeholder="last name">
                                        <span class="text-danger">
                                            @error('last_name'){{$message}}@enderror
                                            @error('last_name_english'){{$message}}@enderror
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
                                                <option value="{{$province['code']}}" {{$apaanga->address_pradesh==$province['code'] ? "selected":""}}>{{$province['nepali_name']}}({{$province['english_name']}})</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('address_pradesh'){{ $message }}@enderror
                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>जिल्ला</b></label>

                                        <select name="address_jilla" id="address_jilla" class="form-control">
                                            <option></option>
                                            @foreach($districts as $district)
                                                <option value="{{$district[1]}}" {{$apaanga->address_jilla==$district[1] ? "selected":""}}>{{$district[3]}} ( {{$district[2]}} )</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('address_jilla'){{ $message }}@enderror
                                        </span>


                                    </div>
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>गा.बी.स / न.पा</b></label>
                                        <select name="address_palika" id="address_palika" class="form-control">
                                            <option></option>
                                            @foreach($local_bodies as $local_bodie)
                                                <option value="{{$local_bodie[1]}}" {{$apaanga->address_palika==$local_bodie[1] ? "selected":""}}>{{$local_bodie[4]}} ( {{$local_bodie[3]}} )</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">
                                            @error('address_palika'){{ $message }}@enderror
                                        </span>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>वडा नं.</b></label>
                                        <input type="text" class="form-control" id="" value="{{$apaanga->address_ward_no}}" name="address_ward_no" placeholder="वडा नं">

                                        <span class="text-danger">
                                            @error('address_ward_no'){{ $message }}@enderror

                                        </span>
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>टोल </b></label>
                                        <input type="text" class="form-control np-input-text" id="" value="{{$apaanga->address_tol}}" name="address_tol" placeholder="टोल">

                                        <span class="text-danger">
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
                                        <input type="text" class="form-control np-input-text" id="" value="{{$apaanga->father_first_name}}" name="father_first_name" placeholder="बुवाको पहिलो नाम ">

                                        <input type="text" class="form-control" id="" value="{{$apaanga->father_first_name_english}}" name="father_first_name_english" placeholder="father's first name">
                                        <span class="text-danger">
                                            @error('father_first_name'){{ $message }}@enderror
                                            @error('father_first_name_english'){{ $message }}@enderror

                                        </span>

                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>
                                        <input type="text" class="form-control np-input-text" id="" value="{{$apaanga->father_middle_name}}" name="father_middle_name" placeholder="बुवाको बिचको नाम">

                                        <input type="text" class="form-control" id="" value="{{$apaanga->father_middle_name_english}}" name="father_middle_name_english" placeholder="father's middle name">
                                        <span class="text-danger">
                                            @error('father_middle_name'){{$message}}@enderror
                                            @error('father_middle_name_english'){{$message}}@enderror
                                        </span>

                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="last_name" class="form-label"><span class="asterik">*</span> <b>थर</b></label>
                                        <input type="text" class="form-control np-input-text" id="" value="{{$apaanga->father_last_name}}" name="father_last_name" placeholder="बुवाको थर">

                                        <input type="text" class="form-control" id="" value="{{$apaanga->father_last_name_english}}" name="father_last_name_english" placeholder="father's name">
                                        <span class="text-danger">
                                            @error('father_last_name'){{$message}}@enderror
                                            @error('father_last_name_english'){{$message}}@enderror
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
                                        <input type="text" class="form-control np-input-text" id="" value="{{$apaanga->mother_first_name}}" name="mother_first_name" placeholder="आमाको पहिलो नाम ">

                                        <input type="text" class="form-control" id="" value="{{$apaanga->mother_first_name_english}}" name="mother_first_name_english" placeholder="mother's first name ">
                                        <span class="text-danger">
                                            @error('mother_first_name'){{ $message }}@enderror
                                            @error('mother_first_name_english'){{ $message }}@enderror
                                        </span>

                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>
                                        <input type="text" class="form-control np-input-text" id="" value="{{$apaanga->mother_middle_name}}" name="mother_middle_name" placeholder="आमाको बिचको नाम">

                                        <input type="text" class="form-control" id="" value="{{$apaanga->mother_middle_name_english}}" name="mother_middle_name_english" placeholder="mother's middle name">
                                        <span class="text-danger">
                                            @error('mother_middle_name'){{$message}}@enderror
                                            @error('mother_middle_name_english'){{$message}}@enderror
                                        </span>

                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="last_name" class="form-label"><span class="asterik">*</span> <b>थर</b></label>
                                        <input type="text" class="form-control np-input-text" value="{{$apaanga->mother_last_name}}" id="" name="mother_last_name" placeholder="आमाको थर">

                                        <input type="text" class="form-control" value="{{$apaanga->mother_last_name_english}}" name="mother_last_name_english" placeholder="mother's last name">
                                        <span class="text-danger">
                                            @error('mother_last_name'){{$message}}@enderror
                                            @error('mother_last_name_english'){{$message}}@enderror
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

                                        <input type="text" class="form-control np-input-text" value="{{$apaanga->grand_father_first_name}}" name="grand_father_first_name" placeholder="बाजेको पहिलो नाम ">
                                        <input type="text" class="form-control" value="{{$apaanga->grand_father_first_name_english}}" name="grand_father_first_name_english" placeholder="grand father's first name">
                                        <span class="text-danger">
                                            @error('grand_father_first_name'){{ $message }}@enderror
                                            @error('grand_father_first_name_english'){{ $message }}@enderror
                                        </span>

                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>

                                        <input type="text" class="form-control np-input-text" value="{{$apaanga->grand_father_middle_name}}" name="grand_father_middle_name" placeholder="बाजेको बिचको नाम">
                                        <input type="text" class="form-control" value="{{$apaanga->grand_father_middle_name_english}}" name="grand_father_middle_name_english" placeholder="grand father's middle name">
                                        <span class="text-danger">
                                            @error('grand_father_middle_name'){{$message}}@enderror
                                            @error('grand_father_middle_name_english'){{$message}}@enderror
                                        </span>

                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="last_name" class="form-label"><span class="asterik">*</span> <b>थर</b></label>

                                        <input type="text" class="form-control np-input-text" value="{{$apaanga->grand_father_last_name}}" name="grand_father_last_name" placeholder="बाजेको थर">
                                        <input type="text" class="form-control" value="{{$apaanga->grand_father_last_name_english}}" name="grand_father_last_name_english" placeholder="grand father's last name">
                                        <span class="text-danger">
                                            @error('grand_father_last_name'){{$message}}@enderror
                                            @error('grand_father_last_name_english'){{$message}}@enderror
                                        </span>
2
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-12 col-lg-4">

                                        <label for="contact" class="form-label"><span class="asterik">*</span> <b> राष्ट्रिय परिचय पत्र वा नागरिकता नं</b></label>
                                        <input type="text" class="form-control" id="" value="{{$apaanga->identity_card_no}}" name="identity_card_no" placeholder="राष्ट्रिय परिचय पत्र वा नागरिकता नं">
                                        <span class="text-danger">
                                            @error('identity_card_no'){{$message}}@enderror

                                        </span>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="dob" class="form-label"><span class="asterik">*</span> <b> जन्म मिति</b></label>
                                        <input type="text" class="form-control" id="apaanga_dob" value="{{$apaanga->dob}}" name="dob" placeholder="जन्म मिति">

                                        <span class="text-danger">
                                            @error('dob'){{$message}}@enderror

                                        </span>

                                    </div>


                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="gender" class="form-label"><span class="asterik">*</span> <b>लिङ्ग</b></label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option></option>

                                            @foreach($genders as $gender)
                                                <option value="{{$gender[0]}}" {{$apaanga->gender==$gender[0] ? "selected":""}}>{{$gender[2]}} ({{$gender[1]}})</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('gender'){{$message}}@enderror</span>
                                    </div>
                                </div>

                                <div class="row">
                                    {{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
                                    {{--                                        <label for="marital_status" class="mb-2"><span class="asterik">*</span><b> वैवाहिक स्थिति</b></label>--}}
                                    {{--                                        <select id="marital_status" name="marital_status" class="form-control">--}}
                                    {{--                                            <option></option>--}}
                                    {{--                                            <option value="विवाहीत" {{ ($apaanga->marital_status')=="विवाहीत") ? "selected": ""}}>विवाहीत</option>--}}
                                    {{--                                            <option value="अविवाहीत" {{ ($apaanga->marital_status')=="अविवाहीत") ? "selected": ""}}>अविवाहीत</option>--}}
                                    {{--                                            <option value="विधवा" {{ ($apaanga->marital_status')=="विधवा") ? "selected": ""}}>विधवा</option>--}}
                                    {{--                                        </select>--}}
                                    {{--                                        <span class="text-danger">@error('marital_status'){{$message}}@enderror</span>--}}
                                    {{--                                    </div>--}}
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="contact" class="form-label"><span class="asterik">*</span> <b> मोबाइल नं</b></label>
                                        <input type="text" class="form-control" id="" value="{{$apaanga->contact}}" name="contact" placeholder="मोबाइल नं">

                                        <span class="text-danger">
                                            @error('contact'){{$message}}@enderror


                                        </span>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="contact" class="form-label"><span class="asterik">*</span> <b> रक्त समूह</b></label>

                                        <select id="blood_group" name="blood_group" class="form-control">
                                            <option></option>
                                            @foreach($blood_groups as $blood_group)
                                                <option value="{{$blood_group[1]}}" {{ ($apaanga->blood_group==$blood_group[1]) ? "selected": ""}}>{{$blood_group[1]}}</option>
                                            @endforeach
                                        </select>

                                        <span class="text-danger">
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
                                        <select name="disability_type_nature" id="gender" class="form-control">
                                            <option></option>
                                            @foreach($diability_nature_types as $diability_nature_type)
                                                <option value="{{$diability_nature_type[0]}}" {{$apaanga->disability_type_nature==$diability_nature_type[0] ? "selected":""}}>{{$diability_nature_type[2]}} ({{$diability_nature_type[1]}})</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('disability_type_nature'){{ $message }}@enderror</span>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-6">
                                        <label for="middle_name" class="form-label"><b>गम्भीरता आधारमा</b></label>
                                        <select name="disability_type_severity" id="gender" class="form-control">
                                            <option></option>
                                            @foreach($diability_severity_types as $diability_severity_type)
                                                <option value="{{$diability_severity_type[0]}}" {{$apaanga->disability_type_severity==$diability_severity_type[0] ? "selected":""}}>{{$diability_severity_type[1]}}-{{$diability_severity_type[3]}} ({{$diability_severity_type[2]}})</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger">@error('disability_type_severity'){{$message}}@enderror</span>
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
                                        <span class="text-danger">@error('apaanga_citizenship'){{$message}}@enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <div class="d-flex bd-highlight mb-3">
                            <div class="me-auto bd-highlight alert alert-danger">नोट: क्रिपया आवश्यक सम्पूर्ण जानकारीहरु भर्नु होला |</div>
                            <div class="bd-highlight mr-2">
                                <button class="btn_palika" type="submit" id="btn-save"><i class="fas fa-save"></i> सेभ</button>

                            </div>

                            <div class="bd-highlight mr-2">
                                <a type="button" href="{{route('apaanga.index')}}" class="btn_palika" id="btn-back"><i class="fas fa-backspace"></i> पछाडी</a>
                            </div>
                        </div>
                    </div>
                </form>





{{--                <form action="{{ route('apaanga.update',['id'=>$apaanga->id]) }}" method="POST" enctype="multipart/form-data">--}}
{{--                    @csrf--}}
{{--                    <div class="card-body">--}}
{{--                        --}}{{--            --}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                            <label for="first_name" class="form-label"><span class="asterik">*</span> <b> पहिलो नाम</b></label>--}}
{{--                                            <input type="text" class="form-control" id="" value="{{old('first_name')}}" name="first_name" placeholder="पहिलो नाम">--}}
{{--                                            <input type="text" class="form-control" id="" value="{{old('first_name_english')}}" name="first_name_english" placeholder="First Name">--}}
{{--                                            <span class="text-danger">--}}
{{--                                            @error('first_name'){{ $message }}@enderror--}}
{{--                                                @error('first_name_english'){{ $message }}@enderror--}}
{{--                                        </span>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                            <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>--}}
{{--                                            <input type="text" class="form-control" id="" value="{{old('middle_name')}}" name="middle_name" placeholder="बिचको नाम">--}}
{{--                                            <input type="text" class="form-control" id="" value="{{old('middle_name_english')}}" name="middle_name_english" placeholder="middle name">--}}
{{--                                            <span class="text-danger">--}}
{{--                                            @error('middle_name'){{$message}}@enderror--}}
{{--                                                @error('middle_name_english'){{$message}}@enderror--}}
{{--                                        </span>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                            <label for="last_name" class="form-label"><span class="asterik">*</span> <b> थर</b></label>--}}
{{--                                            <input type="text" class="form-control" id="" value="{{old('last_name')}}" name="last_name" placeholder="थर">--}}
{{--                                            <input type="text" class="form-control" id="" value="{{old('last_name_english')}}" name="last_name_english" placeholder="last name">--}}
{{--                                            <span class="text-danger">--}}
{{--                                            @error('last_name'){{$message}}@enderror--}}
{{--                                                @error('last_name_english'){{$message}}@enderror--}}
{{--                                        </span>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <label for="first_name" class="form-label"><span class="asterik">*</span> <b> स्थायी ठेगाना </b></label>--}}
{{--                                <div class="row">--}}

{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>प्रदेश </b></label>--}}
{{--                                        <input type="text" class="form-control" id="" value="{{$apaanga->address_pradesh}}" name="address_pradesh" placeholder="प्रदेश">--}}
{{--                                        <span class="text-danger">@error('address_pradesh'){{ $message }}@enderror</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>जिल्ला</b></label>--}}
{{--                                        <input type="text" class="form-control" id="" value="{{$apaanga->address_jilla}}" name="address_jilla" placeholder="जिल्ला">--}}
{{--                                        <span class="text-danger">@error('address_jilla'){{ $message }}@enderror</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>गा.बी.स / न.पा</b></label>--}}
{{--                                        <input type="text" class="form-control" id="" value="{{$apaanga->address_palika}}" name="address_palika" placeholder="स्थायी ठेगाना">--}}
{{--                                        <span class="text-danger">@error('address_palika'){{ $message }}@enderror</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="row">--}}

{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>वडा नं.</b></label>--}}
{{--                                        <input type="text" class="form-control" id="" value="{{$apaanga->address_ward_no}}" name="address_ward_no" placeholder="वडा नं">--}}
{{--                                        <span class="text-danger">@error('address_ward_no'){{ $message }}@enderror</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>टोल </b></label>--}}
{{--                                        <input type="text" class="form-control" id="" value="{{$apaanga->address_tol}}" name="address_tol" placeholder="टोल">--}}
{{--                                        <span class="text-danger">@error('address_tol'){{ $message }}@enderror</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        --}}{{-- बुवाको            --}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <label for="first_name" class="form-label"><span class="asterik">*</span> <b> बुवाको   </b></label>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>पहिलो नाम  </b></label>--}}
{{--                                        <input type="text" class="form-control" id="" value="{{$apaanga->father_first_name}}" name="father_first_name" placeholder="बुवाको पहिलो नाम ">--}}
{{--                                        <span class="text-danger">@error('father_first_name'){{ $message }}@enderror</span>--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>--}}
{{--                                        <input type="text" class="form-control" id="" value="{{$apaanga->father_middle_name}}" name="father_middle_name" placeholder="बुवाको बिचको नाम">--}}
{{--                                        <span class="text-danger">@error('father_middle_name'){{$message}}@enderror</span>--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="last_name" class="form-label"><span class="asterik">*</span> <b>थर</b></label>--}}
{{--                                        <input type="text" class="form-control" id="" value="{{$apaanga->father_last_name}}" name="father_last_name" placeholder="बुवाको थर">--}}
{{--                                        <span class="text-danger">@error('father_last_name'){{$message}}@enderror</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <label for="first_name" class="form-label"><span class="asterik">*</span> <b> आमाको </b></label>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>पहिलो नाम  </b></label>--}}
{{--                                        <input type="text" class="form-control" id="" value="{{$apaanga->mother_first_name}}" name="mother_first_name" placeholder="आमाको पहिलो नाम ">--}}
{{--                                        <span class="text-danger">@error('mother_first_name'){{ $message }}@enderror</span>--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>--}}
{{--                                        <input type="text" class="form-control" id="" value="{{$apaanga->mother_middle_name}}" name="mother_middle_name" placeholder="आमाको बिचको नाम">--}}
{{--                                        <span class="text-danger">@error('mother_middle_name'){{$message}}@enderror</span>--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="last_name" class="form-label"><span class="asterik">*</span> <b>थर</b></label>--}}
{{--                                        <input type="text" class="form-control" value="{{$apaanga->mother_last_name}}" id="" name="mother_last_name" placeholder="आमाको थर">--}}
{{--                                        <span class="text-danger">@error('mother_last_name'){{$message}}@enderror</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <label for="first_name" class="form-label"><span class="asterik">*</span> <b> बाजेको </b></label>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>पहिलो नाम  </b></label>--}}
{{--                                        <input type="text" class="form-control" value="{{$apaanga->grand_father_first_name}}" id="" name="grand_father_first_name" placeholder="बाजेको पहिलो नाम ">--}}
{{--                                        <span class="text-danger">@error('grand_father_first_name'){{ $message }}@enderror</span>--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>--}}
{{--                                        <input type="text" class="form-control" value="{{$apaanga->grand_father_middle_name}}" id="" name="grand_father_middle_name" placeholder="बाजेको बिचको नाम">--}}
{{--                                        <span class="text-danger">@error('grand_father_middle_name'){{$message}}@enderror</span>--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="last_name" class="form-label"><span class="asterik">*</span> <b>थर</b></label>--}}
{{--                                        <input type="text" class="form-control" value="{{$apaanga->grand_father_last_name}}" id="" name="grand_father_last_name" placeholder="बाजेको थर">--}}
{{--                                        <span class="text-danger">@error('grand_father_last_name'){{$message}}@enderror</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="dob" class="form-label"><span class="asterik">*</span> <b> जन्म मिति</b></label>--}}
{{--                                        <input type="text" class="form-control" id="apaanga_dob" value="{{$apaanga->dob}}" name="dob" placeholder="जन्म मिति">--}}
{{--                                        <span class="text-danger">@error('dob'){{$message}}@enderror</span>--}}
{{--                                    </div>--}}


{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="gender" class="form-label"><span class="asterik">*</span> <b>लिङ्ग</b></label>--}}
{{--                                        <select name="gender" id="gender" class="form-control">--}}
{{--                                            <option></option>--}}
{{--                                            <option value="पुरुष" {{$apaanga->gender='पुरुष' ? "selected":""}}>पुरुष</option>--}}
{{--                                            <option value="महिला" {{$apaanga->gender=='महिला' ? "selected":""}}>महिला</option>--}}
{{--                                            <option value="तेश्रो लिङ्गी" {{$apaanga->gender=='तेश्रो लिङ्गी' ? "selected":""}}>तेश्रो लिङ्गी</option>--}}
{{--                                        </select>--}}
{{--                                        <span class="text-danger">@error('gender'){{$message}}@enderror</span>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="marital_status" class="mb-2"><span class="asterik">*</span><b> वैवाहिक स्थिति</b></label>--}}
{{--                                        <select id="marital_status" name="marital_status" class="form-control">--}}
{{--                                            <option></option>--}}
{{--                                            <option value="विवाहीत" {{ $apaanga->marital_status=="विवाहीत" ? "selected": ""}}>विवाहीत</option>--}}
{{--                                            <option value="अविवाहीत" {{ $apaanga->marital_status=="अविवाहीत" ? "selected": ""}}>अविवाहीत</option>--}}
{{--                                            <option value="विधवा" {{ $apaanga->marital_status=="विधवा" ? "selected": ""}}>विधवा</option>--}}
{{--                                        </select>--}}
{{--                                        <span class="text-danger">@error('marital_status'){{$message}}@enderror</span>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                                <div class="row">--}}
{{--                                    <div class="form-group col-sm-12 col-lg-4">--}}
{{--                                        <label for="contact" class="form-label"><span class="asterik">*</span> <b> मोबाइल नं</b></label>--}}
{{--                                        <input type="text" class="form-control" id="" value="{{$apaanga->contact}}" name="contact" placeholder="मोबाइल नं">--}}
{{--                                        <span class="text-danger">@error('contact'){{$message}}@enderror</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                            </div>--}}

{{--                        </div>--}}


{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row">--}}
{{--                                    <div class="form-group col-sm-12 col-lg-6">--}}
{{--                                        <label for="picture" class="form-label"><span class="asterik">*</span> <b> फोटो छान्नुहोस</b></label>--}}
{{--                                        <input type="file" class="form-control" id="apaanga_profile_picture" name="apaanga_profile_picture" placeholder="फोटो छान्नुहोस">--}}
{{--                                        <span class="text-danger">@error('apaanga_profile_picture'){{$message}}@enderror</span>--}}
{{--                                    </div>--}}

{{--                                    <div class="form-group col-sm-12 col-lg-6">--}}
{{--                                        <label for="citizenship" class="form-label"><span class="asterik">*</span> <b> राष्ट्रिय परिचय पत्र वा नागरिक्ता छान्नुहोस </b></label>--}}
{{--                                        <input type="file" class="form-control" id="apaanga_citizenship" name="apaanga_citizenship" placeholder="छान्नुहोस">--}}
{{--                                        <span class="text-danger">@error('apaanga_citizenship'){{$message}}@enderror</span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                    <div class="card-footer">--}}
{{--                        <div class="d-flex bd-highlight mb-3">--}}
{{--                            <div class="me-auto bd-highlight alert alert-danger">नोट: क्रिपया आवश्यक सम्पूर्ण जानकारीहरु भर्नु होला |</div>--}}
{{--                            <div class="bd-highlight mr-2">--}}
{{--                                <button class="btn_palika" type="submit" id="btn-save"><i class="fas fa-save"></i> सेभ</button>--}}

{{--                            </div>--}}

{{--                            <div class="bd-highlight mr-2">--}}
{{--                                <a type="button" href="{{route('apaanga.index')}}" class="btn_palika" id="btn-back"><i class="fas fa-backspace"></i> पछाडी</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}

            </div>
        </div>
    </section>
@endsection

@section('custom-script')
    <script>
        $("#apaanga_dob").nepaliDatePicker({
            dateFormat: "%D, %M %d, %y",
            closeOnDateSelect: true
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
    </script>
@endsection
