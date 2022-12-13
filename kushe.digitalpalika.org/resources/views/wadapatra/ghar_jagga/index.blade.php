@extends('layouts.main')

@section('title')
डिजिटल पालिका | घर/ जग्गा/ बाटो
@endsection

@section('content')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
{{-- heading --}}
        <div class="d-flex justify-content-between p-2">
            <div class="nagarik-heading">
                <p><a href="{{ route('wada-patra.index') }}"><i class="fas fa-arrow-left arrow"></i></a>घर/ जग्गा/ बाटो</p>
            </div>
        <div>
        <button class="btn btn-success" type="button" class="btn btn-primary" data-toggle="modal" data-target="#ghar_jagga_modal">+नयाँ सिर्जना गर्नुहोस्</button>
        <div class="modal fade" id="ghar_jagga_modal" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">नयाँ थप्नुहोस्/Add New Categories</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="overflow: hidden;">
                        <form method="post" action="#" enctype="multipart/form-data">
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
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="dp_gharjagga_category" class="form-control" />
                                <span class="text-danger">@error('dp_gharjagga_category'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group">
                                <label><strong>Description:</strong></label>
                                <textarea class="ckeditor form-control" name="dp_gharjagga_category_desc"></textarea>
                                <span class="text-danger">@error('dp_gharjagga_category_desc'){{ $message }}@enderror</span>
                            </div>
                            <div class="form-group ">
                                <button type="submit" class="btn btn-success btn-md w-100">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- tabs --}}
<div class="tab">
    <button class="tablinks" onclick="openGhar(event, 'tabid')">Section</button>
</div>
{{-- tabs-contents --}}
<div id="tabid" class="gharjaggacontent ">
    <div class="d-flex justify-content-between container-fluid p-2 active">
        <div class="heading">
            <h6>Title</h6>
        </div>
        <div class="sub-btn">
            <a href="#" class="btn btn-info">Edit</a>
        </div>
    </div>
    <div class="ghar-content">
        <p class="container-fluid p-2 content"></p>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.ckeditor').ckeditor();
    });
</script>
@endsection
