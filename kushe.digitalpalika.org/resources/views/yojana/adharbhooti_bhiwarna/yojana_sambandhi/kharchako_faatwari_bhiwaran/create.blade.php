@extends('yojana.index')
@section('yojana-content')
    <div class="card">
        <div class="card-header">
            <span class="card-title">नयाँ खार्चाको फाटवारी</span>
        </div>
        <form style="width: 100%;" id="add-form-chalani" method="POST"
            action="{{ route('kharcha-faatwari-bhiwaran.store') }}">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="full_name" class="mb-2 form-label"><span class="asterik">*</span>कोड</label>
                            <input type="text" class="form-control" name="code" placeholder="कोड">
                        </div>
                        @error('code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="full_name" class="mb-2 form-label"><span class="asterik">*</span>पुरा
                                नाम</label>
                            <input type="text" class="form-control" name="full_name" placeholder="पुरा नाम">
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
                            <input type="text" class="form-control" name="details" placeholder="वीवरण">
                        </div>
                        @error('details')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col">
                        <div class="form-group mb-2">
                            <label for="name" class="mb-2 form-label"><span class="asterik">*</span>नाम</label>
                            <input type="text" class="form-control" name="name" placeholder="नाम">
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-2">
                        <label for="situtation">स्थिति</label>
                        <input class="form-check-input" type="checkbox" name="#" id="situtationclick" checked>
                        <input type="hidden" name="situation" id="situtation" value="1">
                        @error('situation')
                            <br>
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label for="is_addtiton">Is Addition ?</label>
                        <input class="form-check-input" type="checkbox" id="is_addition_click" checked>
                        <input type="hidden" name="is_addition" id="is_addition" value="1">
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
        $('#situtationclick').click(function(e) {

            if ($(this).is(':checked')) {
                $('#situtation').val(1);
            } else {
                $('#situtation').val(0);
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

