@extends('layouts.main')
@section('title')
    डिजिटल पालिका | प्रतिनिधि विवरण थप्नुहोस्
@endsection
@section('content')
    <div class="card">

        <div class="card-header">

            <a href="{{ route('pratinidhi.index') }}" style="float: left"><i class="fas fa-arrow-left arrow"></i></a>
            <span class="card-title">प्रतिनिधि विवरण</span>

        </div>
        <div class="card-body">

            <form action="{{route('pratinidhi.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label for="text" class="form-label"><b>पहिलो नाम</b></label>
                        <input value="{{old('dp_pratinidhi_first_name')}}" type="text" class="form-control" id="" name="dp_pratinidhi_first_name" placeholder="पहिलो नाम" >
                        <span class="text-danger" id="error_dp_pratinidhi_first_name">@error('dp_pratinidhi_first_name'){{ $message }}@enderror</span>

                    </div>

                    <div class="form-group mb-3">
                        <label for="text" class="form-label"><b>बिचको नाम</b></label>
                        <input value="{{old('dp_pratinidhi_middle_name')}}" type="text" class="form-control" id="" name="dp_pratinidhi_middle_name" placeholder="बिचको नाम">

                        <span class="text-danger" id="error_dp_pratinidhi_middle_name">@error('dp_pratinidhi_middle_name'){{$message}}@enderror</span>

                    </div>

                    <div class="form-group mb-3">
                        <label for="text" class="form-label"><b>थर</b></label>
                        <input value="{{old('dp_pratinidhi_last_name')}}" type="text" class="form-control" id="" name="dp_pratinidhi_last_name" placeholder="थर">

                        <span class="text-danger" id="error_dp_pratinidhi_last_name">@error('dp_pratinidhi_last_name'){{$message}}@enderror</span>

                    </div>

                    <div class="form-group mb-3">
                        <label for="text" class="form-label"><b>पद</b></label>
                        <input value="{{old('dp_pratinidhi_designation')}}" type="text" class="form-control" id="" name="dp_pratinidhi_designation" placeholder="पद">

                        <span class="text-danger" id="error_dp_pratinidhi_designation">@error('dp_pratinidhi_designation'){{$message}}@enderror</span>

                    </div>

                    <div class="form-group mb-3">
                        <label for="text" class="form-label"><b>लिङ्ग</b></label>
                        <select name="dp_pratinidhi_gender" id="dp_pratinidhi_gender" class="form-control">
                            <option value="">- छान्नुहोस -</option>

                            <option value="पुरुष" {{(old('dp_pratinidhi_designation')=='पुरुष')?'selected':''}}>पुरुष</option>
                            <option value="महिला" {{(old('dp_pratinidhi_designation')=='महिला')?'selected':''}}>महिला</option>
                            <option value="तेश्रो लिङ्गी" {{(old('dp_pratinidhi_designation')=='तेश्रो लिङ्गी')?'selected':''}}>तेश्रो लिङ्गी</option>
                        </select>
                        <span class="text-danger" id="error_dp_pratinidhi_gender">@error('dp_pratinidhi_last_name'){{$message}}@enderror</span>

                    </div>

                    <div class="form-group mb-3">
                        <label for="text" class="form-label"><b>जन्म मिति</b></label>

                        <input value="{{old('dp_pratinidhi_designation')}}" type="text" class="form-control date-picker" id="" name="dp_pratinidhi_dob" placeholder="जन्म मिति">
                        <span class="text-danger" id="error_dp_pratinidhi_designation">@error('dp_pratinidhi_designation'){{$message}}@enderror</span>

                    </div>

                    <div class="form-group mb-3">
                        <label for="text" class="form-label"><b>मोबाइल नं</b></label>
                        <input value="{{old('dp_pratinidhi_contact')}}" type="text" class="form-control" id="" name="dp_pratinidhi_contact" placeholder="मोबाइल नं">

                        <span class="text-danger" id="error_dp_pratinidhi_contact">@error('dp_pratinidhi_contact'){{$message}}@enderror</span>

                    </div>

                    <div class="form-group mb-3">
                        <label for="text" class="form-label"><b>फोटो छान्नुहोस</b></label>
                        <input type="file" class="form-control" id="dp_pratinidhi_profile_pic" name="dp_pratinidhi_profile_pic" placeholder="फोटो छान्नुहोस">
                        <input hidden type="text" id="dp_pratinidhi_profile_pic_fname" name="dp_pratinidhi_profile_pic_fname" value="">
                        <span class="text-danger" id="error_dp_pratinidhi_profile_pic">
                            @if(Session::has('errors'))
                                {{Session::get('errors')->first()}};
                            @endif
                        </span>

                    </div>

                    <div class="form-group mb-3">
                        <label for="text" class="form-label"><b>राष्ट्रिय परिचय पत्र छान्नुहोस</b></label>
                        <input type="file" class="form-control" id="dp_pratinidhi_parichayapatra_file" name="dp_pratinidhi_parichayapatra_file" placeholder="फोटो छान्नुहोस">
                        <input hidden type="text" id="dp_pratinidhi_parichayapatra_file_fname" name="dp_pratinidhi_parichayapatra_file_fname" value="">
                        <span class="text-danger" id="error_dp_pratinidhi_profile_pic">
                            @if(Session::has('errors'))
                                {{Session::get('errors')->first()}};
                            @endif
                        </span>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn_palika">पेश गर्नुहोस</button>

                    <a href="{{ route('pratinidhi.index') }}" type="button" class="btn_palika bg-danger">रद्ध गर्नुहोस</a>

                </div>
            </form>
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
    // Get a reference to the file input element
    const input_dp_pratinidhi_profile_pic = document.querySelector('input[id="dp_pratinidhi_profile_pic"]');
    const input_dp_pratinidhi_parichayapatra_file = document.querySelector('input[id="dp_pratinidhi_parichayapatra_file"]');
    // Create a FilePond instance
    const pond = FilePond.create(input_dp_pratinidhi_profile_pic);
    const pond1=FilePond.create(input_dp_pratinidhi_parichayapatra_file);
    FilePond.setOptions({
        server:
            {
                url:"{{route('file.upload')}}",
                headers:{
                    'X-CSRF-TOKEN':'{{csrf_token()}}'
                },
                process: {
                    onload: (res) => {

                        // select the right value in the response here and return
                        // var file_name_list=$('#uploaded_file_names').val();
                        // if(file_name_list=="")
                        // {
                        //     file_name_list=res;
                        // }
                        // else {
                        //     file_name_list=file_name_list+','+res;
                        // }
                        // $('#uploaded_file_names').attr('value',file_name_list);
                        // $('#uploaded_file_name'+kagajpatra_no).attr('value',res);
                        let response_obj=JSON.parse(res);
                        $('#'+response_obj.input_field_name+'_fname').attr('value',response_obj.file_name);
                        // console.log('#'+response_obj.input_field_name+'fname')
                        // console.log(response_obj.file_name)


                    }
                }
            }

    });
</script>
@endsection