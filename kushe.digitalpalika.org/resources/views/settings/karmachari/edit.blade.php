@extends('layouts.main')
@section('content')

    <div class="card">
        <div class="card-header">
            <a href="{{ route('karmachari.index') }}" style="float:left;"><i class="fas fa-arrow-left arrow"></i></a>
            <span class="card-title" id="wadaModalLabel">कर्मचारी</span>
        </div>
        <div class="card-body">
            <form action="{{route('karmachari.update',$id)}}" method="post" enctype="multipart/form-data">
                @method('patch')
                @csrf
                @if (Session::get('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif

                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                @endif
                <div class="mb-3">
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="text" class="form-label"><b>वडा छान्नुहोस्</b></label>

                            <select class="form-control" name="dp_wada_id">
                                <option value="{{$karmacharis[0]->dp_wada_id}}">{{$karmacharis[0]->dp_ward_name}}</option>
                                @foreach ($wards as $ward)
                                    <option value="{{ $ward->id }}">{{ $ward->dp_ward_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <input type="text" class="form-control" id="" name="dp_wada_id" placeholder="Wada Name..."> --}}
                    <span class="text-danger">
                @error('dp_wada_id')
                        {{ $message }}
                        @enderror
            </span>
                </div>

                <div class="mb-3">


                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="text" class="form-label"><b>कर्मचारी प्रकार</b></label>
                            <select class="form-control" name="dp_karmachari_type_id">
                                <option value="{{$karmacharis[0]->dp_karmachari_type_id}}">{{$karmacharis[0]->types}}</option>
                                @foreach ($karmachariTypes as $karmachariType)
                                    <option value="{{ $karmachariType->id }}">{{ $karmachariType->types }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <input type="text" class="form-control" id="" name="dp_wada_id" placeholder="Wada Name..."> --}}
                    <span class="text-danger" id="error-dp_karmachari_type_id">
                @error('dp_wada_id')
                        {{ $message }}
                        @enderror
            </span>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label" value="description" placeholder="Title"><b>पहिलो नाम</b></label>
                    <input type="text" value="{{$karmacharis[0]->dp_karmachari_first_name}}" class="form-control" id="" name="dp_karmachari_first_name"
                           placeholder="कर्मचारीको पहिलो नाम">
                    <span class="text-danger" id="error-dp_karmachari_first_name">
                @error('dp_karmachari_first_name')
                        {{ $message }}
                        @enderror
            </span>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label" value="description" placeholder="Title"><b>बीचको नाम</b></label>
                    <input type="text" class="form-control" value="{{$karmacharis[0]->dp_karmachari_middle_name}}" id="" name="dp_karmachari_middle_name"
                           placeholder="कर्मचारीको बीचको नाम">
                    <span class="text-danger" id="error-dp_karmachari_middle_name">
                @error('dp_karmachari_middle_name')
                        {{ $message }}
                        @enderror
            </span>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label" value="description" placeholder="Title"><b>थर</b></label>
                    <input type="text" class="form-control" id="" value="{{$karmacharis[0]->dp_karmachari_last_name}}" name="dp_karmachari_last_name" placeholder="कर्मचारीको थर">
                    <span class="text-danger" id="error-dp_karmachari_last_name">
                @error('dp_karmachari_first_name')
                        {{ $message }}
                        @enderror
            </span>
                </div>





                <div class="mb-3">
                    <label for="text" class="form-label"><b>पद</b></label>
                    <input type="text" class="form-control" id="" value="{{$karmacharis[0]->dp_karmachari_designation}}" name="dp_karmachari_designation" placeholder="कर्मचारीको पद">
                    <span class="text-danger" id="error-dp_karmachari_designation">
                @error('dp_karmachari_designation')
                        {{ $message }}
                        @enderror
            </span>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label"><b>सम्पर्क नम्बर</b></label>
                    <input type="text" class="form-control" id="" value="{{$karmacharis[0]->dp_karmachari_phone_number}}" name="dp_karmachari_phone_number"
                           placeholder="कर्मचारीको सम्पर्क नम्बर">
                    <span class="text-danger" id="error-dp_karmachari_mobile_number">
                @error('dp_karmachari_mobile_number')
                        {{ $message }}
                        @enderror
            </span>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label"><b>फोटो</b></label>
                    <input type="file" class="form-control" id="" value="{{$karmacharis[0]->dp_ward_bg_image}}" name="dp_karmachari_profile_pic"
                           placeholder="सम्पर्क नम्बर फोटो">
                    <span class="text-danger" id="error-dp_karmachari_profile_pic">
                @error('dp_karmachari_profile_pic')
                        {{ $message }}
                        @enderror
            </span>
                </div>

                <div class="modal-footer">
                    <input type="submit" class="btn_palika" value="अपडेट गर्नुहोस्">
                    <button type="button" class="btn_palika bg-danger" data-bs-dismiss="modal">रद्द गर्नुहोस्</button>
                </div>
            </form>
        </div>
    </div>



@endsection
@section('custom-script')
<script>

</script>
@endsection
