@extends('layouts.main')

@section('title')
डिजिटल पालिका | महिला परिचय पत्र
@endsection

@section('custom-css')
<style>

</style>
@endsection

@section('content')

<section class="mr-4 mt-2">
    <div class="card">

        <div class="card-header">
            <a href="{{ route('mahila.index') }}" style="float: left"><i class="fas fa-arrow-left arrow"></i></a>



            <span class="card-title">महिला परिचय पत्र</span>

{{--            <a href="{{ route('mahila.index') }}" class="btn_palika"><i class="fas fa-arrow-left"></i> पछाडी</a>--}}


        </div>
        <form action="{{ route('mahila.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="card-body">
            {{--            --}}
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="first_name" class="form-label"><span class="asterik">*</span> <b> पहिलो नाम</b></label>
                            <input type="text" class="form-control" id="" value="{{old('first_name')}}" name="first_name" placeholder="पहिलो नाम">
                            <span class="text-danger">@error('first_name'){{ $message }}@enderror</span>
                        </div>

                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>
                            <input type="text" class="form-control" id="" value="{{old('middle_name')}}" name="middle_name" placeholder="बिचको नाम">
                            <span class="text-danger">@error('middle_name'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="last_name" class="form-label"><span class="asterik">*</span> <b> थर</b></label>
                            <input type="text" class="form-control" id="" value="{{old('last_name')}}" name="last_name" placeholder="थर">
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
                            <input type="text" class="form-control" id="" value="{{old('address_pradesh')}}" name="address_pradesh" placeholder="प्रदेश">
                            <span class="text-danger">@error('address_pradesh'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="first_name" class="form-label"><span class="asterik">*</span> <b>जिल्ला</b></label>
                            <input type="text" class="form-control" id="" value="{{old('address_jilla')}}" name="address_jilla" placeholder="जिल्ला">
                            <span class="text-danger">@error('address_jilla'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="first_name" class="form-label"><span class="asterik">*</span> <b>गा.बी.स / न.पा</b></label>
                            <input type="text" class="form-control" id="" value="{{old('address_palika')}}" name="address_palika" placeholder="स्थायी ठेगाना">
                            <span class="text-danger">@error('address_palika'){{ $message }}@enderror</span>
                        </div>
                    </div>
                    <div class="row">

                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="first_name" class="form-label"><span class="asterik">*</span> <b>वडा नं.</b></label>
                            <input type="text" class="form-control" id="" value="{{old('address_ward_no')}}" name="address_ward_no" placeholder="वडा नं">
                            <span class="text-danger">@error('address_ward_no'){{ $message }}@enderror</span>
                        </div>
                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="first_name" class="form-label"><span class="asterik">*</span> <b>टोल </b></label>
                            <input type="text" class="form-control" id="" value="{{old('address_tol')}}" name="address_tol" placeholder="टोल">
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
                            <input type="text" class="form-control" id="" value="{{old('father_first_name')}}" name="father_first_name" placeholder="बुवाको पहिलो नाम ">
                            <span class="text-danger">@error('father_first_name'){{ $message }}@enderror</span>
                        </div>

                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>
                            <input type="text" class="form-control" id="" value="{{old('father_middle_name')}}" name="father_middle_name" placeholder="बुवाको बिचको नाम">
                            <span class="text-danger">@error('father_middle_name'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="last_name" class="form-label"><span class="asterik">*</span> <b>थर</b></label>
                            <input type="text" class="form-control" id="" value="{{old('father_last_name')}}" name="father_last_name" placeholder="बुवाको थर">
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
                            <input type="text" class="form-control" id="" value="{{old('mother_first_name')}}" name="mother_first_name" placeholder="आमाको पहिलो नाम ">
                            <span class="text-danger">@error('mother_first_name'){{ $message }}@enderror</span>
                        </div>

                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>
                            <input type="text" class="form-control" id="" value="{{old('mother_middle_name')}}" name="mother_middle_name" placeholder="आमाको बिचको नाम">
                            <span class="text-danger">@error('mother_middle_name'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="last_name" class="form-label"><span class="asterik">*</span> <b>थर</b></label>
                            <input type="text" class="form-control" value="{{old('mother_last_name')}}" id="" name="mother_last_name" placeholder="आमाको थर">
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
                            <input type="text" class="form-control" value="{{old('grand_father_first_name')}}" id="" name="grand_father_first_name" placeholder="बाजेको पहिलो नाम ">
                            <span class="text-danger">@error('grand_father_first_name'){{ $message }}@enderror</span>
                        </div>

                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>
                            <input type="text" class="form-control" value="{{old('grand_father_middle_name')}}" id="" name="grand_father_middle_name" placeholder="बाजेको बिचको नाम">
                            <span class="text-danger">@error('grand_father_middle_name'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="last_name" class="form-label"><span class="asterik">*</span> <b>थर</b></label>
                            <input type="text" class="form-control" value="{{old('grand_father_last_name')}}" id="" name="grand_father_last_name" placeholder="बाजेको थर">
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
                            <input type="text" class="form-control" id="mahila_dob" value="{{old('dob')}}" name="dob" placeholder="जन्म मिति">
                            <span class="text-danger">@error('dob'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="contact" class="form-label"><span class="asterik">*</span> <b> मोबाइल नं</b></label>
                            <input type="text" class="form-control" id="" value="{{old('contact')}}" name="contact" placeholder="मोबाइल नं">
                            <span class="text-danger">@error('contact'){{$message}}@enderror</span>
                        </div>
                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="marital_status" class="mb-2"><span class="asterik">*</span><b> वैवाहिक स्थिति</b></label>
                            <select id="marital_status" name="marital_status" class="form-control">
                                <option></option>
                                <option value="विवाहीत" {{ (old('marital_status')=="विवाहीत") ? "selected": ""}}>विवाहीत</option>
                                <option value="अविवाहीत" {{ (old('marital_status')=="अविवाहीत") ? "selected": ""}}>अविवाहीत</option>
                                <option value="विधवा" {{ (old('marital_status')=="विधवा") ? "selected": ""}}>विधवा</option>
                            </select>
                            <span class="text-danger">@error('marital_status'){{$message}}@enderror</span>
                        </div>
                    </div>
                </div>

            </div>

            {{-- पति--}}

            <div class="card" id="pati_div" {{ (old('marital_status')=="अविवाहीत" || old('marital_status')=="") ? "hidden": ""}}>

                <div class="card-body">
                    <label for="first_name" class="form-label"><span class="asterik">*</span> <b id="pati_label"> {{ (old('marital_status')=="विवाहीत") ? "पतिको": " दिवंगत पतिको  "}}  </b></label>
{{--                    <label for="first_name" class="form-label"><span class="asterik">*</span> <b> दिवंगत पतिको  </b></label>--}}
                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="first_name" class="form-label"><span class="asterik">*</span> <b>पहिलो नाम  </b></label>
                            <input type="text" class="form-control" id=""  value="{{old('husband_first_name')}}" name="husband_first_name" placeholder="पतिको पहिलो नाम ">
                            <span class="text-danger">@error('husband_first_name'){{ $message }}@enderror</span>
                        </div>

                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="middle_name" class="form-label"><b>बिचको नाम</b></label>
                            <input type="text" class="form-control" id="" value="{{old('husband_middle_name')}}"  name="husband_middle_name" placeholder="पतिको बिचको नाम">
                            <span class="text-danger">@error('husband_middle_name'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group col-sm-12 col-lg-4">
                            <label for="last_name" class="form-label"><span class="asterik">*</span> <b>थर</b></label>
                            <input type="text" class="form-control" id="" value="{{old('husband_last_name')}}"  name="husband_last_name" placeholder="पतिको थर">
                            <span class="text-danger">@error('husband_last_name'){{$message}}@enderror</span>
                        </div>
                    </div>

                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-12 col-lg-6">
                            <label for="picture" class="form-label"><span class="asterik">*</span> <b> फोटो छान्नुहोस</b></label>
                            <input type="file" class="form-control" id="mahila_profile_picture" name="mahila_profile_picture" placeholder="फोटो छान्नुहोस">
                            <span class="text-danger">@error('mahila_profile_picture'){{$message}}@enderror</span>
                        </div>

                        <div class="form-group col-sm-12 col-lg-6">
                            <label for="citizenship" class="form-label"><span class="asterik">*</span> <b> राष्ट्रिय परिचय पत्र वा नागरिक्ता छान्नुहोस</b></label>
                            <input type="file" class="form-control" id="mahila_citizenship" name="mahila_citizenship" placeholder="फोटो छान्नुहोस">
                            <span class="text-danger">@error('mahila_citizenship'){{$message}}@enderror</span>
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
                    <a type="button" href="{{route('mahila.index')}}" class="btn_palika" id="btn-back"><i class="fas fa-backspace"></i> पछाडी</a>
                </div>
            </div>
        </div>
        </form>

    </div>
</section>
@endsection

@section('custom-script')
    <script>
        $('#marital_status').change(function () {
            var marital_status=$(this).val();

            if(marital_status=="विधवा")
            {
                $('#pati_label').html('दिवंगत पतिको')
                $('#pati_div').removeAttr('hidden')
            }
            if(marital_status=="विवाहीत")
            {
                $('#pati_label').html('पतिको')
                $('#pati_div').removeAttr('hidden')
            }
            if(marital_status=="अविवाहीत")
            {
                $('#pati_div').attr('hidden','ture')
            }
            // alert(marital_status)

        })

        $("#mahila_dob").nepaliDatePicker({

            // dateFormat: "%D, %M %d, %y",
            dateFormat: "%y-%m-%d",

            closeOnDateSelect: true
        });
    </script>
    <script>
        // Get a reference to the file input element
        const inputElement_profile = document.querySelector('input[id="mahila_profile_picture"]');
        const inputElement_citizenship = document.querySelector('input[id="mahila_citizenship"]');
        // Create a FilePond instance
        const pond_profile = FilePond.create(inputElement_profile);
        const pond_citizenship = FilePond.create(inputElement_citizenship);
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
