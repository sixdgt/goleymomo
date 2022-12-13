@extends('layouts.main')

@section('title')
डिजिटल पालिका | घटना दर्ता
@endsection

@section('content')
<div class="d-flex justify-content-between p-2">
    <div class="nagarik-heading">
        <p><a href="{{ route('sewa.index') }}"><i class="fas fa-arrow-left arrow"></i></a>घटना दर्ता</p>
    </div>
</div>
<div class="nagarik-sub-box ">
    <div class="d-flex">
        <div id="darta">
            <a href="{{ route('janma-darta.index') }}"><img src="../icons/Inventory/resource.png" alt=""><span class="sub_box_title_Nagarik">जन्म दर्ता</span></a>
        </div>
        <div id="darta">
            <a href="{{ route('mrityu-darta.index') }}"><img src="../icons/Inventory/paper.png" alt=""><span class="sub_box_title_Nagarik">मृत्यु दर्ता</span></a>
        </div>
        <div id="darta">
            <a href="{{ route('bibaha-darta.index') }}"><img src="../icons/Inventory/issue paper.png" alt=""><span class="sub_box_title_Nagarik">विबाह दर्ता</span></a>
        </div>
    </div>
</div>

<div class="modal fade" id="ghatnaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add New Categories</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                @if(Session::get('success'))
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
                @endif

                @if(Session::get('fail'))
                <div class="alert alert-danger">
                    {{Session::get('fail')}}
                </div>
                @endif

                @csrf
                <div class="mb-3">
                    <label for="text" class="form-label"><b>Title</b></label>
                    <input type="text" class="form-control" id="" name="ghatna_title" placeholder="Title">
                    <span class="text-danger">@error('ghatna_title'){{$message}}@enderror</span>
                  </div>

                  <div class="mb-3">
                    <label for="text" class="form-label"><b>Icon/Photo</b></label>
                    <input type="file" class="form-control" id="" name="ghatna_title_icon">
                    <span class="text-danger">@error('ghatna_title_icon'){{$message}}@enderror</span>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
      </div>
    </div>
</div>
@endsection
