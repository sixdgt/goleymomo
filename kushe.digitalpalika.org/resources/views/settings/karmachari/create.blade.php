@extends('layouts.main')
@section('content')


<div class="card">
    <div class="card-header">

        <a href="{{ route('karmachari.index') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
        <span class="card-title" id="wadaModalLabel">कर्मचारी</span>

    </div>
    <div class="card-body">
        <form action="{{route('karmachari.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            @if(Session::get('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            @endif

            @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}
                </div>
            @endif
            <div class="mb-3">
                <div class="col">
                    <div class="form-group mb-2">
                        <label for="text" class="form-label"><b>वडा छान्नुहोस्</b></label>

                        <select class="form-control" name="dp_wada_id">
                            <option value="">-- वडा छान्नुहोस् --</option>
                            @foreach($wards as $ward)
                                <option value="{{$ward->id}}">{{$ward->	dp_ward_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- <input type="text" class="form-control" id="" name="dp_wada_id" placeholder="Wada Name..."> --}}

                <span class="text-danger" id="error_dp_wada_id">@error('dp_wada_id'){{$message}}@enderror</span>

            </div>

            <div class="mb-3">


                <div class="col">
                    <div class="form-group mb-2">
                        <label for="text" class="form-label"><b>कर्मचारी प्रकार</b></label>
                        <select class="form-control" name="dp_karmachari_type_id">
                            <option value="">-- कर्मचारी प्रकार छान्नुहोस् --</option>
                            @foreach($karmachariTypes as $karmachariType)
                                <option value="{{$karmachariType->id}}">{{$karmachariType->types}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- <input type="text" class="form-control" id="" name="dp_wada_id" placeholder="Wada Name..."> --}}

                <span class="text-danger" id="error_dp_karmachari_type_id">@error('dp_wada_id'){{$message}}@enderror</span>


            </div>

            <div class="mb-3">
                <label for="text" class="form-label" value="description"placeholder="Title"><b>पहिलो नाम</b></label>
                <input type="text" class="form-control" id="" name="dp_karmachari_first_name" placeholder="कर्मचारीको पहिलो नाम">

                <span class="text-danger" id="error_dp_karmachari_first_name">@error('dp_karmachari_first_name'){{$message}}@enderror</span>

            </div>

            <div class="mb-3">
                <label for="text" class="form-label" value="description"placeholder="Title"><b>बीचको नाम</b></label>
                <input type="text" class="form-control" id="" name="dp_karmachari_middle_name" placeholder="कर्मचारीको बीचको नाम">

                <span class="text-danger" id="error_dp_karmachari_middle_name">@error('dp_karmachari_middle_name'){{$message}}@enderror</span>

            </div>

            <div class="mb-3">
                <label for="text" class="form-label" value="description"placeholder="Title"><b>थर</b></label>
                <input type="text" class="form-control" id="" name="dp_karmachari_last_name" placeholder="कर्मचारीको थर">

                <span class="text-danger" id="error_dp_karmachari_last_name">@error('dp_karmachari_first_name'){{$message}}@enderror</span>

            </div>

            <div class="mb-3">
                <label for="text" class="form-label" value="description"placeholder="Title"><b>कर्मचारीको प्रकार</b></label>
                <input type="text" class="form-control" id="" name="dp_karmachari_type" placeholder="कर्मचारीको प्रकार">

                <span class="text-danger" id="error_dp_karmachari_type">@error('dp_karmachari_type'){{$message}}@enderror</span>

            </div>


            <div class="mb-3">
                <label for="text" class="form-label"><b>पद</b></label>
                <input type="text" class="form-control" id="" name="dp_karmachari_designation" placeholder="कर्मचारीको पद">

                <span class="text-danger" id="error_dp_karmachari_designation">@error('dp_karmachari_designation'){{$message}}@enderror</span>

            </div>

            <div class="mb-3">
                <label for="text" class="form-label"><b>सम्पर्क नम्बर</b></label>
                <input type="text" class="form-control" id="" name="dp_karmachari_phone_number" placeholder="कर्मचारीको सम्पर्क नम्बर">

                <span class="text-danger" id="error_dp_karmachari_phone_number">@error('dp_karmachari_phone_number'){{$message}}@enderror</span>

            </div>

            <div class="mb-3">
                <label for="text" class="form-label"><b>फोटो</b></label>
                <input type="file" class="form-control" id="karmachari_profile_pic" name="dp_karmachari_profile_pic" placeholder="सम्पर्क नम्बर फोटो">

                <span class="text-danger" id="error_dp_karmachari_profile_pic">@error('dp_karmachari_profile_pic'){{$message}}@enderror</span>
            </div>

            <div class="modal-footer">
                <input type="submit" class="btn_palika" value="स्टोर गर्नुहोस्">
                <a href="{{ route('karmachari.index') }}" class="btn_palika">रद्द गर्नुहोस्</a>

            </div>

        </form>
    </div>
</div>


@endsection


@section('custom-script')
    <script>
        // Get a reference to the file input element
        const inputElement = document.querySelector('input[id="karmachari_profile_pic"]');
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
