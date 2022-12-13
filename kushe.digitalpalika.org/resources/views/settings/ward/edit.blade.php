<div class="modal-body">

    <div class="modal-body">
        <div class="form-group mb-3">
            <label for="text" class="form-label"><b>वडाको नाम</b></label>
            <input type="text" class="form-control" id="dp_ward_name" name="dp_ward_name" value="{{old('dp_ward_name')}}{{$ward->dp_ward_name}}" placeholder="वडाको नाम">
            <span class="text-danger">
                                                <p class="field-error" id="error-dp_ward_name">
                                                    @error('dp_ward_name'){{$message}}@enderror
                                                </p>
                                            </span>
        </div>

        <div class="form-group mb-3">
            <label for="text" class="form-label" value="description" placeholder="Title"><b>विवरन</b></label>
            <textarea class="form-control" id="dp_ward_description" placeholder="विवरन" name="dp_ward_description"  rows="3">{{old('dp_wada_description')}}{{$ward->dp_ward_description}}</textarea>
            <span class="text-danger">
                                                <p class="field-error" id="error-dp_ward_description">
                                                    @error('dp_ward_description'){{$message}}@enderror
                                                </p>
                                            </span>
        </div>

        <div class="form-group mb-3">
            <label for="text" class="form-label"><b>थेगना</b></label>
            <input type="text" class="form-control" id="dp_ward_address" name="dp_ward_address" value="{{old('dp_ward_address')}}{{$ward->dp_ward_address}}" placeholder="थेगना">
            <span class="text-danger">
                                                <p class="field-error" id="error-dp_ward_address">
                                                    @error('dp_ward_address'){{$message}}@enderror
                                                </p>
                                            </span>
        </div>

        <div class="form-group mb-3">
            <label for="text" class="form-label"><b>सम्पर्क</b></label>
            <input type="text" class="form-control" id="dp_ward_contact" name="dp_ward_contact" value="{{old('dp_ward_contact')}}{{$ward->dp_ward_contact}}" placeholder="सम्पर्क">
            <span class="text-danger">
                                                <p class="field-error" id="error-dp_ward_contact">
                                                    @error('dp_ward_contact'){{$message}}@enderror
                                                </p>
                                            </span>
        </div>
    </div>


</div>
<div class="modal-footer">

    <button type="button" id="btnUpdateWard" class="btn_palika" data-id="{{$ward->id}}"><i class="fas fa-save"></i>अपडेट गर्नुहोस् </button>
    <button type="button" class="btn_palika bg-danger" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> रद्ध गर्नुहोस</button>

</div>
