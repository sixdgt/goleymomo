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

    button {
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
    <a href="{{ route('sewa.index') }}"><i class="fas fa-arrow-left fs-2x"></i></a>
    <div class="subnav">
      <button class="subnavbtn">योजना<i class="fa fa-caret-down"></i></button>
      <div class="subnav-content">
        <a href="{{ route('yojana.create') }}">नयाँ थप गर्नुहोस</a>
        <a href="#">योजना प्रकार</a>
        <a href="#">पुर्व ​योजना</a>
        <a href="{{ route('yojana.settings') }}">योजना सेटिङ</a>
      </div>
    </div>
</div>

<section id="darta-content">
    <div class="card">
        <h5 class="text-center">योजना</h5> 
        <div class="card-header d-flex flex-row-reverse bd-highlight">
            <a href="{{ route('yojana.create') }}" class="btn btn-sm btn-primary bd-highlight"><i class="fas fa-file-download"></i> योजना थप गर्नुहोस</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>योजना नो</th>
                        <th>योजनाको नाम</th>
                        <th>बजेट रकम</th>
                        <th>अवस्था</th>
                        <th>चरन</th>
                        <th>कार्य गरियो </th>
                        <th>क्षेत्रगत शिर्षक</th>
                        <th>कार्य</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

@section('custom_script')

    
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>

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
            ajax: "{{ route('yojana.index') }}",
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
