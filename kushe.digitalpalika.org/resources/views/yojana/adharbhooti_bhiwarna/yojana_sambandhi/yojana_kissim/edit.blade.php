@extends('yojana.index')
@section('yojana-content')
    <div class="card">
        <div class="card-header">
            <span class="card-title">नयाँ खार्चाको फाटवारी</span>
        </div>
        <form style="width: 100%;" id="add-form-chalani" method="POST" action="{{ route('yojana-kissim.update',$data->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="full_name" class="mb-2 form-label"><span class="asterik">*</span>कोड</label>
                            <input type="text" class="form-control" name="code" value="{{$data->code}}" placeholder="कोड">
                        </div>
                        @error('code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="full_name" class="mb-2 form-label"><span class="asterik">*</span>पुरा
                                नाम</label>
                            <input type="text" class="form-control" name="full_name" placeholder="पुरा नाम" value="{{$data->full_name}}">
                        </div>
                        @error('full_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="full_name" class="mb-2 form-label"><span
                                    class="asterik">*</span>वीवरण</label>
                            <input type="text" class="form-control" name="details" value="{{$data->details}}" placeholder="वीवरण">
                        </div>
                        @error('details')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="name" class="mb-2 form-label"><span class="asterik">*</span>नाम</label>
                            <input type="text" class="form-control"  value="{{$data->name}}" name="name" placeholder="नाम">
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="name" class="mb-2 form-label"><span class="asterik">*</span>माथिल्लो समूह</label>

                            <input type="text" class="form-control" value="{{$data->upper_group}}" name="upper_group" id="माथिल्लो समूह"
                                placeholder="माथिल्लो समूह">
                        </div>
                        @error('upper_group')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col"></div>
                </div>
                <button type="submit" class="btn_palika float-end m-3"><i class="fa fa-save m-1"> सेव</i></button>
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        </form>
    </div>
@endsection
