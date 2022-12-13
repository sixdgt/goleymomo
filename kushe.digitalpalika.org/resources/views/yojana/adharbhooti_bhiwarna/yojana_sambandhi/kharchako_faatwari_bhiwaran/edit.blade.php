@extends('yojana.index')
@section('yojana-content')
    <div class="card">
        <div class="card-header">
            <span class="card-title">नयाँ खार्चाको फाटवारी</span>
        </div>
        <form style="width: 100%;" id="add-form-chalani" method="POST"
            action="{{ route('kharcha-faatwari-bhiwaran.update',$data['id']) }}">
            @method('PUT')
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="full_name" class="mb-2 form-label"><span class="asterik">*</span>कोड</label>
                            <input type="text" class="form-control" name="code" placeholder="कोड" value="{{$data['code']}}">
                        </div>
                        @error('code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="full_name" class="mb-2 form-label"><span class="asterik">*</span>पुरा
                                नाम</label>
                            <input type="text" class="form-control" name="full_name" value="{{$data['full_name']}}" placeholder="पुरा नाम">
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
                            <input type="text" class="form-control" name="details" value="{{$data['details']}}" placeholder="वीवरण">
                        </div>
                        @error('details')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="name" class="mb-2 form-label"><span class="asterik">*</span>नाम</label>
                            <input type="text" class="form-control" name="name" value="{{$data['name']}}" placeholder="नाम">
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-2">
                        <label for="situtation">स्थिति</label>
                        <input class="form-check-input" type="checkbox"  id="situationclick"
                        @if ($data['situation'] == 1) checked @endif>


                        <input type="hidden" name="situation" id="situation" value="{{$data['situation']}}">
                        @error('situtation')
                            <br>
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="situtation">Is Addition ?</label>
                        <input class="form-check-input" type="checkbox" id="is_addition_click"
                         @if ($data['is_addition'] == 1) checked @endif>
                        <input type="hidden" name="is_addition" id="is_addition" value="{{$data['is_addition']}}">
                        @error('is_addition')
                            <br>
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn_palika float-end m-3"><i class="fa fa-save m-1"> सेव</i></button>
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        </form>
    </div>
@endsection
@section('custom-script')
    <script>
        $('#situationclick').click(function(e) {

            if ($(this).is(':checked')) {
                $('#situation').val(1);
            } else {
                $('#situation').val(0);
            }
        });
        $('#is_addition_click').click(function(e) {
            if ($(this).is(':checked')) {
                $('#is_addition').val(1);
            } else {
                $('#is_addition').val(0);
            }
        });
    </script>
@endsection
