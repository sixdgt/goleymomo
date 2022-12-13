@extends('layouts.main')

@section('title')
डिजिटल पालिका | योजना
@endsection

@section('content')

<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
    }

    .yojana_navbar {
        overflow: hidden;
        background-color: #44a64b;
    }

    .yojana_navbar a {
        float: left;
        font-size: 16px;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    .subnav {
        float: left;
        overflow: hidden;
    }

    .subnav .subnavbtn {
        font-size: 16px;
        border: none;
        outline: none;
        color: white;
        padding: 14px 16px;
        background-color: inherit;
        font-family: inherit;
        margin: 0;
    }

    .yojana_navbar a:hover, .subnav:hover .subnavbtn {
        background-color: #1b25b9;
    }

    .subnav-content {
        display: none;
        position: absolute;
        left:15px;
        background-color: #1b25b9;
        width: 97.50%;
        z-index: 1;
    }

    .subnav-content a {
        float: left;
        color: white;
        text-decoration: none;
    }

    .subnav-content a:hover {
        background-color: #44a64b;
        color: black;
    }

    .subnav:hover .subnav-content {
        display: block;
    }

    i {
        color: white !important;
    }

    .asterik {
        color: red;
    }

    form {
        box-shadow: 0 0 0 rgba(240,240,240,0);
    }

    .card {
        box-shadow: 0 10px 25px rgba(92,99,105,.2);
    }

    .btns {
        font-size: 1.2rem !important;
        border-radius: 0px !important;
    }
    .card-header, .modal-header {
        background-color: #44a64b !important;
        color: #fff;
        text-align: center;
    }

    .modal-title {
        text-align: center;
    }
</style>

<div class="yojana_navbar">
    <a href="{{ route('yojana.index') }}"><i class="fas fa-arrow-left fs-2x"></i></a>
    <div class="subnav">
      <button class="subnavbtn">दर्ता<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a href="{{ route('darta.index') }}">नयाँ थप गर्नुहोस</a>
          <a href="{{ route('darta.index') }}">दर्ता थप्नुहोस्</a>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">चलानी<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a href="{{ route('darta.index') }}">नयाँ थप गर्नुहोस</a>
          <a href="{{ route('darta.index') }}">चलानी हेर्नुहोस्</a>
        </div>
    </div>
    <div class="subnav">
      <button class="subnavbtn">योजना<i class="fa fa-caret-down"></i></button>
      <div class="subnav-content">
        <a href="#">नयाँ थप गर्नुहोस</a>
        <a href="#">योजना प्रकार</a>
        <a href="#">पुर्व ​योजना</a>
        <a href="{{ route('yojana.settings') }}">योजना सेटिङ</a>
      </div>
    </div>
</div>


<section id="darta-add-form" class="darta-add-form">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <span class=>योजनाको विवरन समाबेश गर्नुहोस्</span>
                <span class="pull-right">
                </span>
                </div>
                <div class="card-body">
                    <form style="width: 100%;" id="add-form-darta">
                    @csrf
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="plan_subjective_area">बिषयगत क्षेत्र</label>
                                <select name="plan_subjective_area" id="plan_subjective_area" class="form-control">
                                    <option value="सुचना प्रविधी">सुचना प्रविधी</option>
                                    <option value="बिकास निर्माण">बिकास निर्माण</option>
                                    <option value="सुचना प्रविधी">नगर/गाउ पुर्वधार</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="plan_subjective_area">बिषयगत उप-क्षेत्र</label>
                                <select name="plan_subjective_area" id="plan_subjective_area" class="form-control">
                                    <option value="सुचना प्रविधी">बिषयगत उप शिर्षक</option>
                                    <option value="बिकास निर्माण">बिकास निर्माण</option>
                                    <option value="सुचना प्रविधी">N/A</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                            <label for="plan_subjective_area">बिषयगत उप-क्षेत्र प्रकार</label>
                                <select name="plan_subjective_area" id="plan_subjective_area" class="form-control">
                                    <option value="सुचना प्रविधी">बिषयगत उप शिर्षक</option>
                                    <option value="बिकास निर्माण">बिकास निर्माण</option>
                                    <option value="सुचना प्रविधी">नN/A</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="application_name" class="mb-2"><span class="asterik">*</span> लक्षित समुह</label>
                                <input type="text" class="form-control" name="applicant_name" id="applicant_name" aria-describedby="emailHelp" placeholder="लक्षित समुह">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="application_name" class="mb-2"><span class="asterik">*</span> योजनाको नाम</label>
                                <input type="text" class="form-control" name="application_contact" id="application_contact" aria-describedby="emailHelp" placeholder="योजनाको नाम">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="application_name" class="mb-2"><span class="asterik">*</span>योजनाको स्थर </label>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    नगर स्तरिय
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    वडा स्तरिय
                                </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="plan_subjective_area"><span class="asterik">*</span>बिभाग छान्नुहोस्</label>
                                <select name="plan_subjective_area" id="plan_subjective_area" class="form-control">
                                    <option value="सुचना प्रविधी">सुचना प्रविधी</option>
                                    <option value="बिकास निर्माण">बिकास निर्माण</option>
                                    <option value="सुचना प्रविधी">नगर/गाउ पुर्वधार</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="plan_subjective_area"><span class="asterik">*</span>श्रोत</label>
                                <select name="plan_subjective_area" id="plan_subjective_area" class="form-control">
                                    <option value="सुचना प्रविधी">बिषयगत उप शिर्षक</option>
                                    <option value="बिकास निर्माण">बिकास निर्माण</option>
                                    <option value="सुचना प्रविधी">N/A</option>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                            <label for="application_name" class="mb-2"><span class="asterik">*</span>चरन</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                चालु
                                </label>
                                </div>
                                <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                पुजिगत
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="application_name" class="mb-2"><span class="asterik">*</span> योजनाको बजेट</label>
                                <input type="text" class="form-control" name="applicant_name" id="applicant_name" aria-describedby="emailHelp" placeholder="लक्षित समुह">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="application_name" class="mb-2"><span class="asterik">*</span> योजनाको कोड</label>
                                <input type="text" class="form-control" name="application_contact" id="application_contact" aria-describedby="emailHelp" placeholder="योजनाको नाम">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group mb-2">
                                <label for="plan_subjective_area"><span class="asterik">*</span>कर्मचारी</label>
                                <select name="plan_subjective_area" id="plan_subjective_area" class="form-control">
                                    <option value="सुचना प्रविधी">कर्मचारी</option>
                                    <option value="बिकास निर्माण">कर्मचारी</option>
                                    <option value="सुचना प्रविधी">N/A</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-2">
                            <label for="application_name" class="mb-2"><span class="asterik">*</span>योजनाको विवरन </label>
                            <textarea class="ckeditor form-control" name="application_description"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="alert alert-danger">नोट: क्रिपया आवश्यक सम्पूर्ण जानकारीहरु भर्नु होला |</div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <button class="btn btn-sm btn-primary btns" type="submit" id="btn-save"><i class="fas fa-save"></i> सेभ</button>
                                <a href="{{ route('yojana.index') }}" class="btn btn-sm btn-primary btns" id="btn-back"><i class="fas fa-backspace"></i> पछाडी</a>
                                <button class="btn btn-sm btn-primary btns"><i class="fas fa-undo-alt"></i> रिसेट</button>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        
        </div>
    </div>
</section>
@endsection

@section('custom_script')

    
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
    // Get a reference to the file input element
    const inputElement = document.querySelector('input[id="application_doc"]');

    // Create a FilePond instance
    const pond = FilePond.create(inputElement);
</script>
<script>
    $(function () {

        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
    
        var table = $('.data-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "#",
            "pageLength":6,
            "aLengthMenu":[[5,10,25,50,-1], [5,10,25,50,"All"]],
            columns: [
                {data: 'id', name: 'id'},
                {data: 'plan_title', name: 'plan_title'},
                {data: 'plan_budget', name: 'plan_budget'},
                {data: 'plan_process', name: 'plan_process'},
                {data: 'plan_level', name: 'plan_level'},  
                {data: 'plan_subjective_area', name: 'plan_subjective_area'},
                {data: 'plan_targeted_public', name: 'plan_targeted_public '},
                {data: 'actions', name: 'actions', orderable: true, searchable: true},
                // {
                //     "fnRender": function ( oObj ) {
                //     return '<a href="url?var='+oObj.Data[1]+'">SomeLink</a>';
                //     }
                // },
            ]
        });


        $('#btn-save').click(function (e) {
            e.preventDefault();
            $(this).html('Sending..');

            $.ajax({
                data: $('#add-form-darta').serialize(),
                url: "#",
                type: "POST",
                dataType: 'json',
                success: function (data) {

                    $('#add-form-darta').trigger("reset");
                    table.draw();

                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });

        $('body').on('click', '.editCustomer', function () {
        var Customer_id = $(this).data('id');
        $.get("" +'/' + Customer_id +'/edit', function (data) {
            $('#modelHeading').html("Edit Customer");
            $('#saveBtn').val("edit-user");
            $('#ajaxModel').modal('show');
            $('#Customer_id').val(data.id);
            $('#name').val(data.name);
            $('#detail').val(data.detail);
        })
    });

    });

</script>
@endsection
