@extends('layouts.main')

@section('title')
    नयाँ दर्ता
@endsection
@section('back_url'){{route('darta.index')}} @endsection
@section('back_page_title')दर्ता @endsection
{{--<link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />--}}

@section('custom-css')
    <style>

    </style>
@endsection
@section('content')

    <section id="darta-add-form" class="darta-add-form mt-2 mr-4">

        <div class="card">

            <div class="card-header" >
                <a href="{{ route('darta.index') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
                <span class='card-title'>एडित दर्ता</span>


            </div>
            <form style="width: 100%;" id="add-form-darta" method="POST" action="{{ route('darta.update', ['id'=>$darta->id]) }}" enctype="multipart/form-data">
                <div class="card-body">
                    @csrf
{{--                    <p class="form-label">चलानी गरिएको अन्तिम नम्बर:- {{ $chalani_number }}</p>--}}
{{--                    <p class="form-label">दर्ता गरिएको अन्तिम नम्बर:- {{ $darta_number }}</p>--}}

                    <div class="row">

                        <div class="col-sm-12 col-lg-4">

                            <div class="form-group mb-2">
                                <label for="dp_darta_number" class="mb-2 form-label"><span class="asterik">*</span> दर्ता नम्बर </label>
                                <input type="text" class="form-control" name="dp_darta_number" id="dp_darta_number"
                                       aria-describedby="emailHelp" placeholder="दर्ता नम्बर" value="{{ $darta->dp_darta_number }}" readonly>
                            </div>

                            <span class="text-danger" id="error_dp_darta_number">@error('dp_darta_number'){{$message}}@enderror</span>
                        </div>
                        <div class="col-sm-12 col-lg-4">

                            <div class="form-group mb-2">
                                <label for="dp_darta_date" class="mb-2 form-label"><span class="asterik">*</span> दर्ता मिती / Date</label>
                                <input type="text" class="form-control" name="dp_darta_date" id="dp_darta_date"
                                       aria-describedby="emailHelp" placeholder="दर्ता मिती" value="{{ $darta->dp_darta_date }}" readonly>
                            </div>

                            <span class="text-danger" id="error_dp_darta_date">@error('dp_darta_date'){{$message}}@enderror</span>
                        </div>
                        <div class="col-sm-12 col-lg-4">

                            <div class="form-group mb-2">
                                <label for="dp_chalani_number" class="mb-2 form-label"><span class="asterik">*</span> चलानी नम्बर </label>
                                <input type="text" class="form-control" name="dp_chalani_number" id="dp_chalani_number"
                                       aria-describedby="emailHelp" placeholder="चलानी नम्बर" value="{{ $darta->dp_chalani_number }}" readonly>
                            </div>

                            <span class="text-danger" id="error_dp_chalani_number">@error('dp_chalani_number'){{$message}}@enderror</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">

                            <div class="form-group mb-2">
                                <label for="dp_darta_letter_from" class="mb-2 form-label"><span class="asterik">*</span>पठाउने</label>
                                <input type="text" class="form-control" name="dp_darta_letter_from" id="dp_darta_letter_from"
                                       aria-describedby="emailHelp" placeholder="पठाउने" value="{{ Auth::user()->name }}" readonly>
                            </div>
                        </div>

                        <span class="text-danger" id="error_dp_darta_letter_from">@error('dp_darta_letter_from'){{$message}}@enderror</span>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">

                            <div class="form-group mb-2">
                                <label for="dp_darta_letter_department" class="mb-2 form-label"><span class="asterik">*</span>बर्तमान क्षेत्र तथा बिभागका साखाहरु</label>
                                <select class="form-control" name="dp_darta_letter_department">
                                    <option value="">-- साखा छान्नुहोस् --</option>
                                    @foreach($sakhas as $sakha)
                                        @if($sakha->id==$darta->dp_darta_letter_department)
                                            <option value="{{$sakha->id}}" selected>{{$sakha->name}}</option>
                                        @else
                                            <option value="{{$sakha->id}}">{{$sakha->name}}</option>
                                        @endif


                                    @endforeach
                                    {{--                                            <option value="साखा 1">साखा 1</option>--}}

                                </select>
                            </div>

                            <span class="text-danger" id="error_dp_darta_letter_department">@error('dp_darta_letter_department'){{$message}}@enderror</span>
                        </div>
                        <div class="col-sm-12 col-lg-4">

                            <div class="form-group mb-2">
                                <label for="dp_darta_letter_to" class="mb-2 form-label"><span class="asterik">*</span>बर्तमान क्षेत्र तथा साखाका सदस्यहरु</label>
                                <select class="form-control" name="dp_darta_letter_to">
                                    <option value="">-- सदस्य छान्नुहोस् --</option>
                                    @foreach($sadasyas as $sadasya)



                                            @if($sadasya->id==$darta->dp_darta_letter_to)
                                                <option value="{{$sadasya->user_id}}" selected>{{$sadasya->name}}</option>
                                            @else
                                                <option value="{{$sadasya->user_id}}" >{{$sadasya->name}}</option>
                                            @endif


                                    @endforeach

                                </select>
                            </div>

                            <span class="text-danger" id="error_dp_darta_letter_to">@error('dp_darta_letter_to'){{$message}}@enderror</span>
                        </div>
                        <div class="col-sm-12 col-lg-4">

                            <div class="form-group mb-2">
                                <label for="dp_darta_kaifiyat" class="mb-2 form-label"><span class="asterik">*</span>कैफियत</label>
                                <input type="text" class="form-control" name="dp_darta_kaifiyat" value="{{$darta->dp_darta_kaifiyat}}" id="dp_darta_kaifiyat" aria-describedby="emailHelp" placeholder="कैफियत">
                            </div>

                            <span class="text-danger" id="error_dp_darta_kaifiyat">@error('dp_darta_kaifiyat'){{$message}}@enderror</span>

                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="dp_darta_subject" class="mb-2 form-label"><span class="asterik">*</span> बिषय / Subject</label>
                        <input type="text" class="form-control" name="dp_darta_subject" value="{{$darta->dp_darta_subject}}" id="dp_darta_subject" aria-describedby="emailHelp" placeholder="बिषय">

                        <span class="text-danger" id="error_dp_darta_subject">@error('dp_darta_subject'){{$message}}@enderror</span>
                    </div>
                    <div class="form-group mb-2">
                        <label for="dp_darta_description" class="mb-2 form-label"><span class="asterik">*</span> विवरन / Description</label>
                        <textarea class="form-control" name="dp_darta_description">{{$darta->dp_darta_description}}</textarea>

                        <span class="text-danger" id="error_dp_darta_description">@error('dp_darta_description'){{$message}}@enderror</span>

                    </div>
                    <div class="form-group mb-2">
                        <label for="dp_darta_file" class="form-label"><span class="asterik">*</span> अपलोड गर्नुहोस वा तान्नुहोस </label>
                        <input type="file" name="dp_darta_file" id="application_doc">

                        <span class="text-danger" id="error_dp_darta_file">@error('dp_darta_file'){{$message}}@enderror</span>


                    </div>
                </div>

                <div class="card-footer">
                    <div class="d-flex bd-highlight mb-3">
                        <div class="me-auto bd-highlight alert alert-danger">नोट: क्रिपया आवश्यक सम्पूर्ण जानकारीहरु भर्नु होला |</div>


                        <div class="bd-highlight mr-2">
                            <button class="btn_palika" type="submit" id="btn-save"><i class="fas fa-save"></i> सेभ</button>
                        </div>

                        <div class="bd-highlight mr-2">
                            <a type="button" href="{{route('darta.index')}}" class="btn_palika" id="btn-back"><i class="fas fa-backspace"></i> पछाडी</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </section>


@endsection

@section('custom-script')
    <script>
        $(function () {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var table = $('.darta-data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('darta.index') }}",
                columns: [
                    {data: 'dp_chalani_number', name: 'dp_chalani_number'},
                    {data: 'dp_darta_number', name: 'dp_darta_number'},
                    {data: 'dp_darta_date', name: 'dp_darta_date'},
                    {data: 'dp_darta_letter_to', name: 'dp_darta_letter_to'},
                    {data: 'dp_darta_letter_department', name: 'dp_darta_letter_department'},
                    {data: 'dp_darta_subject', name: 'dp_darta_subject'},
                    {data: 'dp_darta_file', render: function (data, type, row, meta) {
                            return '<a href="' + data + '" target="_blank"">View <a/>';
                        }
                    },
                    {data: 'dp_darta_kaifiyat', name: 'dp_darta_kaifiyat'},
                ],
            });
        });

        $('#add-new').click(function(){
            $('#darta-content').hide();
            $('#darta-add-form').show();
        });

        $('#btn-back').click(function(){
            $('#darta-content').show();
            $('#darta-add-form').hide();
        });
    </script>


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

