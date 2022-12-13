@extends('layouts.main')

@section('title')
डिजिटल पालिका | चरन सेटिङ
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
      <button class="subnavbtn">नयाँ<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a href="{{ route('darta.index') }}">रकम समायोजन</a>
          <a href="{{ route('darta.index') }}">योजनाको खन्डीकरन </a>
          <a href="{{ route('darta.index') }}">अभिलेख</a>
          <a href="{{ route('darta.index') }}">अनुदान</a>
        </div>
    </div>
    <div class="subnav">
        <button class="subnavbtn">उपभोक्ता समिति गठन<i class="fa fa-caret-down"></i></button>
        <div class="subnav-content">
          <a href="{{ route('darta.index') }}">कागजात</a>
          <a href="{{ route('darta.index') }}">उपभोक्ता समिति</a>
          <a href="{{ route('darta.index') }}">सिफरिस वा चिठ्ठी</a>
          <a href="{{ route('darta.index') }}">अभिलेख</a>
          <a href="{{ route('darta.index') }}">उपभोक्ता समिति सदस्य </a>
        </div>
    </div>
    <div class="subnav">
      <button class="subnavbtn">अनुमान लागत<i class="fa fa-caret-down"></i></button>
      <div class="subnav-content">
        <a href="{{ route('yojana.create') }}">अनुमान</a>
        <a href="#">कागजात</a>
        <a href="#">अभिलेख</a>
      </div>
    </div>
    <div class="subnav">
      <button class="subnavbtn">सम्झौता<i class="fa fa-caret-down"></i></button>
      <div class="subnav-content">
        <a href="{{ route('yojana.create') }}">टिप्पनी</a>
        <a href="{{ route('yojana.create') }}">कर्यदेश</a>
        <a href="{{ route('yojana.create') }}">सम्झौता</a>
        <a href="{{ route('yojana.create') }}">अनुमान</a>
        <a href="#">कागजात</a>
        <a href="#">अभिलेख</a>
      </div>
    </div>
    <div class="subnav">
      <button class="subnavbtn">अनुगमन<i class="fa fa-caret-down"></i></button>
      <div class="subnav-content">
        <a href="{{ route('yojana.create') }}">मुल्यङ्कन</a>
        <a href="#">कागजात</a>
        <a href="#">अभिलेख</a>
      </div>
    </div>
    <div class="subnav">
      <button class="subnavbtn">भुक्तानी<i class="fa fa-caret-down"></i></button>
      <div class="subnav-content">
        <a href="{{ route('yojana.create') }}">टिप्पनी</a>
        <a href="#">पेश्की</a>
        <a href="#">भुक्तानी</a>
        <a href="#">कागजात</a>
        <a href="#">अभिलेख</a>
      </div>
    </div>
    <!-- वर्तमान चरण:- -->
    <div class="subnav">
      <button class="subnavbtn">सम्पन्न<i class="fa fa-caret-down"></i></button>
      <div class="subnav-content">
        <a href="{{ route('yojana.create') }}">अनुगमन तथा सुपरिवेक्षण</a>
        <a href="#">अभिलेख</a>
        <a href="#">सम्म्पन्न मिति</a>   
        <a href="#">सम्म्पन्न कार्य रिपोर्ट</a>
        <a href="#">योजना पुरा गर्नुहोस</a>
      </div>
    </div>
</div>
<section class="container-fluid">
    <div class="card">
        <h5 class="text-center">चरन</h5> 
        <div class="card-header d-flex flex-row-reverse bd-highlight">
            <a href="{{ route('process-level.create') }}" class="btn btn-sm btn-primary ml-2 bd-highlight btns" id="add-new"><i class="fas fa-plus-square"></i> चरन थप गर्नुहोस</a>
        </div>
        <div class="card-body"> 
        <form class="row g-3">
                <div class="col-md-6">
                <label for="customer" class="form-label">उपभोक्ता समितिको पदाधिकारीको नाम <span id="star">*</span></label>
                <input type="text" class="form-control " id="customer" placeholder="Server Resource Upgrade उपभोक्ता समिति" required>
                </div>
                <div class="col-md-6">
                    <label for="address" class="form-label">ठेगाना <span id="star">*</span></label>
                    <select class="form-select" aria-label="Default select example" style="display: inline-block;">
                        <option selected>ठेगाना उपलब्ध गराउनुहोस्</option>
                        <option value="1">दमक नगरपालिका</option>
                        <option value="2">ललितपुर नगरपालिका</option>
                        <option value="3">काठमाडौँ नगरपालिका</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="darta" class="form-label">दर्ता नम्बर <span id="star">*</span></label>
                    <input type="text" class="form-control " id="darta" placeholder="दर्ता नम्बर उपलब्ध गराउनुहोस्" required>
                </div>
                <div class="col-md-4 date">
                <label for="miti" class="form-label">
                    दर्ता भएको मिति <span id="star">*</span>
                </label>
                <input type="text" class="form-control" id="miti" placeholder="यहाँ क्लिक गर्नुहोस्
                " required>
                </div>
                <div class="col-md-4 date">
                <label for="samiti" class="form-label">
                    समिति/टोल विकास सन्स्था गठन भएको मिति <span id="star">*</span>
                </label>
                <input type="text" class="form-control" id="samiti" placeholder="यहाँ क्लिक गर्नुहोस्
                " required>
                </div>
                <div class="col-md-6 ">
                <label for="aim" class="form-label">
                    उद्देश्य <span id="star">*</span>
                </label>
                <textarea rows="5" type="text" class="form-control" id="aim" placeholder="Server Resource Upgrade
                " required></textarea>
                </div>
                <div class="col-md-6 ">
                <label for="aim" class="form-label">
                    उ. स. गठन गर्ने पदाधिकारी <span id="star">*</span>
                </label>
                <textarea rows="5" type="text" class="form-control" id="aim" required></textarea>
                </div>
                <div class="col-12">
                <button data-bs-dismiss="modal"
                    style="background-color: #55A858 !important; border: none; font-size: 15px;" class="btn btn-primary"
                    type="submit">पेश
                    गर्नुहोस्</button>

                <button data-bs-dismiss="modal" style="background-color: #E45F4B; border: none; font-size: 15px;"
                    class="btn btn-primary" type="submit">रद्द
                    गर्नुहोस्</button>
                </div>
            </form>
        </div>
    </div>
</section>
<section>
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
</script>
@endsection
