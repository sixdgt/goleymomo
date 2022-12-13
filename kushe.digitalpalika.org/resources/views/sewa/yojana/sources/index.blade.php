@extends('layouts.main')

@section('title')
डिजिटल पालिका | श्रोत सेटिङ
@endsection

@section('content')
<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
    }
    
    .container-fluid {
        margin: 0px !important;
        padding: 0px !important;
        margin-top: 5px !important;
    }

    .yojana_navbar {
        overflow: hidden;
        background-color: #44a64b;
    }

    .yojana_navbar a {
        float: left;
        font-size: 14px;
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
        font-size: 14px !important;
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
        width: 97%;
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
        font-size: 1rem !important;
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
      <button class="subnavbtn">बिषयगत क्षेत्र<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a href="{{ route('subjective-area.create') }}">नयाँ थप गर्नुहोस</a>
          <a href="{{ route('subjective-area.index') }}">बिषयगत क्षेत्र</a>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">बिषयगत उप-क्षेत्र<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a href="{{ route('subjective-sub-area.create') }}">नयाँ थप गर्नुहोस</a>
          <a href="{{ route('subjective-sub-area.index') }}">बिषयगत उप-क्षेत्र</a>
        </div>
    </div>
    <div class="subnav">
      <button class="subnavbtn">बिषयगत उप-क्षेत्र प्रकार<i class="fa fa-caret-down"></i></button>
      <div class="subnav-content">
        <a href="{{ route('subjective-subarea-type.create') }}">नयाँ थप गर्नुहोस</a>
        <a href="{{ route('subjective-subarea-type.index') }}">बिषयगत उप-क्षेत्र प्रकार</a>
      </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">चरन<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a href="{{ route('process-level.create') }}">नयाँ थप गर्नुहोस</a>
          <a href="{{ route('process-level.index') }}">चरन</a>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">श्रोत<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a href="{{ route('sources.create') }}">नयाँ थप गर्नुहोस</a>
          <a href="{{ route('sources.index') }}">श्रोत</a>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">बिभाग छान्नुहोस्<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a href="{{ route('department.create') }}">नयाँ थप गर्नुहोस</a>
          <a href="{{ route('department.index') }}">बिभाग छान्नुहोस्</a>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">योजनाको स्थर<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a href="{{ route('level.create') }}">नयाँ थप गर्नुहोस</a>
          <a href="{{ route('level.index') }}">योजनाको स्थर</a>
        </div>
    </div>
</div>
<section class="container-fluid">
    <div class="card">
        <h5 class="text-center">श्रोत</h5> 
        <div class="card-header d-flex flex-row-reverse bd-highlight">
            <a href="{{ route('sources.create') }}" class="btn btn-sm btn-primary ml-2 bd-highlight btns" id="add-new"><i class="fas fa-plus-square"></i> श्रोत थप गर्नुहोस</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>श्रोत नो</th>
                        <th>श्रोतको नाम</th>
                        <th>कार्य</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>
<section>
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
                {data: 'actions', name: 'actions', orderable: true, searchable: true},
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

    $('#add-new').click(function(){
        $('#darta-content').hide();
        $('#darta-add-form').show();
    });

    $('#btn-back').click(function(){
        $('#darta-content').show();
        $('#darta-add-form').hide();
    });
</script>
@endsection
