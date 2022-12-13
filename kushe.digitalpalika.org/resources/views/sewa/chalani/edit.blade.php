@extends('layouts.main')

@section('title')नयाँ चलानी @endsection

@section('custom-css')
    <style>
        /*i {*/
        /*    color: white !important;*/
        /*}*/




    </style>
@endsection

@section('back_url'){{route('chalani.index')}} @endsection
@section('back_page_title')चलानी @endsection
@section('content')

    <section id="chalani-add-form" class="chalani-add-form mt-2 container-fluid">
        <div class="card">
            <div class="card-header">

                <a href="{{ route('chalani.index') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
                <span class="card-title">चलानी एडित</span>

            </div>
            <form style="width: 100%;" id="add-form-chalani" method="POST" action="{{ route('chalani.update',['id'=>$chalani->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="row">
{{--                        <p class="form-label">चलानी गरिएको अन्तिम नम्बर:---}}
{{--                            @if ($chalani_number)--}}

{{--                            @endif{{ $chalani_number }}--}}
{{--                        </p>--}}
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="dp_chalani_number" class="mb-2 form-label"><span class="asterik">*</span>चलानी नम्बर</label>
                                <input type="text" class="form-control" name="dp_chalani_number" placeholder="चलानी नम्बर" readonly
                                       value="{{ $chalani->dp_chalani_number }}" >
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="dp_chalani_date" class="mb-2 form-label"><span class="asterik">*</span> चलानी मिती</label>
                                <input type="text" class="form-control" name="dp_chalani_date" placeholder="चलानी मिती" readonly
                                       value="{{ $chalani->dp_chalani_date }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="dp_chalani_letter_type" class="mb-2 form-label"><span class="asterik">*</span>पत्रको किसिम</label>
                                <select class="form-control" name="dp_chalani_letter_type">
                                    <option value=""></option>
                                    @foreach($patra_types as $patra_type)
                                        @if($patra_type->id==$chalani->dp_chalani_letter_type)
                                            <option value="{{$patra_type->id}}" selected>{{$patra_type->type}}</option>
                                        @else
                                            <option value="{{$patra_type->id}}">{{$patra_type->type}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <span class="text-danger" id="error_dp_chalani_letter_type">@error('dp_chalani_letter_type'){{$message}}@enderror</span>

                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="dp_chalani_letter_department" class="mb-2 form-label"><span class="asterik">*</span>पत्र बुज्ने शाखा</label>
                                <input type="text" class="form-control" name="dp_chalani_letter_department" value="{{ $chalani->dp_chalani_letter_department }}" id="applicant_name" aria-describedby="emailHelp" placeholder="पत्र बुज्ने शाखा">

                            </div>

                            <span class="text-danger" id="error_dp_chalani_letter_department">@error('dp_chalani_letter_department'){{$message}}@enderror</span>

                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="dp_chalani_letter_to" class="mb-2 form-label"><span class="asterik">*</span>पत्र पाउने कार्यालय वा व्यक्तिको नाम</label>
                                <input type="text" class="form-control" name="dp_chalani_letter_to" value="{{ $chalani->dp_chalani_letter_to }}" id="application_subject" aria-describedby="emailHelp" placeholder="पत्र पाउने कार्यालय वा व्यक्तिको नाम">
                            </div>

                            <span class="text-danger" id="error_dp_chalani_letter_to">@error('dp_chalani_letter_to'){{$message}}@enderror</span>
b552
                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="dp_chalani_letter_address" class="mb-2 form-label"><span class="asterik">*</span>पत्र पाउने कार्यालय वा व्यक्तिको ठेगाना</label>
                                <input type="text" class="form-control" name="dp_chalani_letter_address" value="{{ $chalani->dp_chalani_letter_address }}" id="application_subject" aria-describedby="emailHelp" placeholder="पत्र पाउने कार्यालय वा व्यक्तिको ठेगाना">
                            </div>

                            <span class="text-danger" id="error_dp_chalani_letter_address">@error('dp_chalani_letter_address'){{$message}}@enderror</span>

                        </div>
                    </div>
                    <div class="form-group mb-2 mt-2">
                        <label for="dp_chalani_subject" class="mb-2 form-label"><span class="asterik">*</span> बिषय</label>
                        <textarea class="ckeditor form-control" name="dp_chalani_subject">{{ $chalani->dp_chalani_subject }}</textarea>

                        <span class="text-danger" id="error_dp_chalani_subject">@error('dp_chalani_subject'){{$message}}@enderror</span>

                    </div>

                    <div class="form-group mb-2">
                        <label for="" class="form-label"><span class="asterik ">*</span> अपलोड गर्नुहोस वा तान्नुहोस </label>
                        <input type="file" name="dp_chalani_file" id="application_doc">

                        <span class="text-danger" id="error_dp_chalani_file">@error('dp_chalani_file'){{$message}}@enderror</span>

                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="dp_chalani_bodartha" class="mb-2 form-label">बोदार्थ</label>
                                <input type="text" class="form-control" name="dp_chalani_bodartha" value="{{ $chalani->dp_chalani_bodartha }}" id="applicant_name" aria-describedby="emailHelp" placeholder="बोदार्थ">
                            </div>

                            <span class="text-danger" id="error_dp_chalani_bodartha">@error('dp_chalani_bodartha'){{$message}}@enderror</span>

                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="dp_chalani_kaifiyat" class="mb-2 form-label">कैफियत</label>
                                <input type="text" class="form-control" name="dp_chalani_kaifiyat" value="{{ $chalani->dp_chalani_kaifiyat }}" id="applied_at" aria-describedby="emailHelp" placeholder="कैफियत">
                            </div>

                            <span class="text-danger" id="error_dp_chalani_kaifiyat">@error('dp_chalani_kaifiyat'){{$message}}@enderror</span>

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
                            <a type="button" href="{{route('chalani.index')}}" class="btn_palika" id="btn-back"><i class="fas fa-backspace"></i> पछाडी</a>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('custom-script')
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[id="application_doc"]');
        // Create a FilePond instance
        const pond = FilePond.create(inputElement);
        FilePond.setOptions({
            server:
                {
                    url:"{{route('file.upload')}}",
                    headers:{
                        'X-CSRF-TOKEN':'{{csrf_token()}}'
                    }
                }
        });
    </script>
@endsection