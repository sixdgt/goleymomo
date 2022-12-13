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


                <a href="{{ route('baalbaalika.index') }}" style="float: left"><i class="fas fa-arrow-left arrow"></i></a>



                <span class="card-title">बालबालिका परिचय पत्र</span>


            </div>
            <div class="card-body">
                <form action="{{ route('baalbaalika.update', ['id'=>$baalBaalikaParichayapatra->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        {{--            --}}
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b> पहिलो नाम</b></label>
                                        <input type="text" class="form-control" id="" value="{{$baalBaalikaParichayapatra->first_name}}" name="first_name" placeholder="पहिलो नाम">
                                        <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>
                                        <input type="text" class="form-control" id="" value="{{$baalBaalikaParichayapatra->middle_name}}" name="middle_name" placeholder="बिचको नाम">
                                        <span class="text-danger">@error('middle_name'){{$message}}@enderror</span>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="last_name" class="form-label"><span class="asterik">*</span> <b> थर</b></label>
                                        <input type="text" class="form-control" id="" value="{{$baalBaalikaParichayapatra->last_name}}" name="last_name" placeholder="थर">
                                        <span class="text-danger">@error('last_name'){{$message}}@enderror</span>
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
                                        <input type="text" class="form-control" id="" value="{{$baalBaalikaParichayapatra->address_pradesh}}" name="address_pradesh" placeholder="प्रदेश">
                                        <span class="text-danger">@error('address_pradesh'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>जिल्ला</b></label>
                                        <input type="text" class="form-control" id="" value="{{$baalBaalikaParichayapatra->address_jilla}}" name="address_jilla" placeholder="जिल्ला">
                                        <span class="text-danger">@error('address_jilla'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>गा.बी.स / न.पा</b></label>
                                        <input type="text" class="form-control" id="" value="{{$baalBaalikaParichayapatra->address_palika}}" name="address_palika" placeholder="स्थायी ठेगाना">
                                        <span class="text-danger">@error('address_palika'){{ $message }}@enderror</span>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>वडा नं.</b></label>
                                        <input type="text" class="form-control" id="" value="{{$baalBaalikaParichayapatra->address_ward_no}}" name="address_ward_no" placeholder="वडा नं">
                                        <span class="text-danger">@error('address_ward_no'){{ $message }}@enderror</span>
                                    </div>
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="first_name" class="form-label"><span class="asterik">*</span> <b>टोल </b></label>
                                        <input type="text" class="form-control" id="" value="{{$baalBaalikaParichayapatra->address_tol}}" name="address_tol" placeholder="टोल">
                                        <span class="text-danger">@error('address_tol'){{ $message }}@enderror</span>
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
                                        <input type="text" class="form-control" id="" value="{{$baalBaalikaParichayapatra->father_first_name}}" name="father_first_name" placeholder="बुवाको पहिलो नाम ">
                                        <span class="text-danger">@error('father_first_name'){{ $message }}@enderror</span>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>
                                        <input type="text" class="form-control" id="" value="{{$baalBaalikaParichayapatra->father_middle_name}}" name="father_middle_name" placeholder="बुवाको बिचको नाम">
                                        <span class="text-danger">@error('father_middle_name'){{$message}}@enderror</span>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="last_name" class="form-label"><span class="asterik">*</span> <b>थर</b></label>
                                        <input type="text" class="form-control" id="" value="{{$baalBaalikaParichayapatra->father_last_name}}" name="father_last_name" placeholder="बुवाको थर">
                                        <span class="text-danger">@error('father_last_name'){{$message}}@enderror</span>
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
                                        <input type="text" class="form-control" id="" value="{{$baalBaalikaParichayapatra->mother_first_name}}" name="mother_first_name" placeholder="आमाको पहिलो नाम ">
                                        <span class="text-danger">@error('mother_first_name'){{ $message }}@enderror</span>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>
                                        <input type="text" class="form-control" id="" value="{{$baalBaalikaParichayapatra->mother_middle_name}}" name="mother_middle_name" placeholder="आमाको बिचको नाम">
                                        <span class="text-danger">@error('mother_middle_name'){{$message}}@enderror</span>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="last_name" class="form-label"><span class="asterik">*</span> <b>थर</b></label>
                                        <input type="text" class="form-control" value="{{$baalBaalikaParichayapatra->mother_last_name}}" id="" name="mother_last_name" placeholder="आमाको थर">
                                        <span class="text-danger">@error('mother_last_name'){{$message}}@enderror</span>
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
                                        <input type="text" class="form-control" value="{{$baalBaalikaParichayapatra->grand_father_first_name}}" id="" name="grand_father_first_name" placeholder="बाजेको पहिलो नाम ">
                                        <span class="text-danger">@error('grand_father_first_name'){{ $message }}@enderror</span>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>
                                        <input type="text" class="form-control" value="{{$baalBaalikaParichayapatra->grand_father_middle_name}}" id="" name="grand_father_middle_name" placeholder="बाजेको बिचको नाम">
                                        <span class="text-danger">@error('grand_father_middle_name'){{$message}}@enderror</span>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="last_name" class="form-label"><span class="asterik">*</span> <b>थर</b></label>
                                        <input type="text" class="form-control" value="{{$baalBaalikaParichayapatra->grand_father_last_name}}" id="" name="grand_father_last_name" placeholder="बाजेको थर">
                                        <span class="text-danger">@error('grand_father_last_name'){{$message}}@enderror</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="dob" class="form-label"><span class="asterik">*</span> <b> जन्म मिति</b></label>
                                        <input type="text" class="form-control" id="baalbaalika_dob" value="{{$baalBaalikaParichayapatra->dob}}" name="dob" placeholder="जन्म मिति">
                                        <span class="text-danger">@error('dob'){{$message}}@enderror</span>
                                    </div>


                                    <div class="form-group col-sm-12 col-lg-4">
                                        <label for="gender" class="form-label"><span class="asterik">*</span> <b>लिङ्ग</b></label>
                                        <select name="gender" id="gender" class="form-control">
                                            <option></option>
                                            <option value="पुरुष" {{$baalBaalikaParichayapatra->gender=='पुरुष' ? "selected":""}}>पुरुष</option>
                                            <option value="महिला" {{$baalBaalikaParichayapatra->gender=='महिला' ? "selected":""}}>महिला</option>
                                            <option value="तेश्रो लिङ्गी" {{$baalBaalikaParichayapatra->gender=='तेश्रो लिङ्गी' ? "selected":""}}>तेश्रो लिङ्गी</option>
                                        </select>
                                        <span class="text-danger">@error('gender'){{$message}}@enderror</span>
                                    </div>

                                </div>
                            </div>

                        </div>


                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-sm-12 col-lg-6">
                                        <label for="picture" class="form-label"><span class="asterik">*</span> <b> फोटो छान्नुहोस</b></label>
                                        <input type="file" class="form-control" id="baalbaalika_profile_picture" name="baalbaalika_profile_picture" placeholder="फोटो छान्नुहोस">
                                        <span class="text-danger">@error('baalbaalika_profile_picture'){{$message}}@enderror</span>
                                    </div>

                                    <div class="form-group col-sm-12 col-lg-6">
                                        <label for="citizenship" class="form-label"><span class="asterik">*</span> <b> जन्म दर्ता </b></label>
                                        <input type="file" class="form-control" id="baalbaalika_birth_certificate" name="baalbaalika_birth_certificate" placeholder="छान्नुहोस">
                                        <span class="text-danger">@error('baalbaalika_birth_certificate'){{$message}}@enderror</span>
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
                                <a type="button" href="{{route('baalbaalika.index')}}" class="btn_palika" id="btn-back"><i class="fas fa-backspace"></i> पछाडी</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

@section('custom-script')
    <script>
        $("#baalbaalika_dob").nepaliDatePicker({
            dateFormat: "%D, %M %d, %y",
            closeOnDateSelect: true
        });
    </script>

    <script>
        // Get a reference to the file input element
        const inputElement_profile = document.querySelector('input[id="baalbaalika_profile_picture"]');
        const inputElement_certificate = document.querySelector('input[id="baalbaalika_birth_certificate"]');
        // Create a FilePond instance
        const pond_profile = FilePond.create(inputElement_profile);
        const pond_certificate = FilePond.create(inputElement_certificate);
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
