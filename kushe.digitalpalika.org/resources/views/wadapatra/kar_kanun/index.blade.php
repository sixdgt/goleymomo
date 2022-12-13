@extends('layouts.main')

@section('title')
डिजिटल पालिका | कर/कानुन
@endsection

@section('content')

    {{-- heading --}}
    <div class="d-flex justify-content-between p-2">
        <div class="nagarik-heading">
            <p><a href="{{ route('wada-patra.index') }}"><i class="fas fa-arrow-left arrow"></i></a>कर/कानुन</p>
        </div>
        <div>
            <button  class="btn btn-success" type="button" class="btn btn-primary" data-toggle="modal" data-target="#ghar_jagga_modal">+नयाँ सिर्जना गर्नुहोस्</button>
            <div class="modal fade" id="ghar_jagga_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">नयाँ थप्नुहोस्/Add New Categories</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="overflow: hidden;">
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
                                <label for="text" class="form-label"><b>शीर्षक/Title</b></label>
                                <input type="text" class="form-control" id="" name="dp_law_category" placeholder="Title">
                                <span class="text-danger">@error('dp_law_category'){{$message}}@enderror</span>
                              </div>


                              <div class="mb-3">
                                <label for="text" class="form-label" placeholder="description" value="description" placeholder="Title"><b>विवरण/Description</b></label>
                                <textarea class="form-control" placeholder="Describe yourself here..." id=""name="dp_law_dec" rows="3"></textarea>
                                <span class="text-danger">@error('dp_law_dec'){{$message}}@enderror</span>
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
        </div>
    </div>

    {{-- tabs --}}
    <div class="tab">
            <button class="tablinks" onclick="openGhar(event, 'tabid')">asdas</button>
    </div>

    {{-- tabs-contents --}}
        <div id="tabid" class="gharjaggacontent ">
            <div class="d-flex justify-content-between container-fluid p-2 active">

                <div class="heading"><h6></h6></div>
                <div class="sub-btn"><a href="#"><button data-toggle="modal" data-target="#ghar_sub_edit">Edit</button></a></div>

            </div>
            <div class="ghar-content">
            <div class="p-2 content">
            </div>

                <p class="container-fluid p-2 content"></p>

            </div>

        </div>
</div>
    <!-- ModalEdit -->

    <div class="modal fade" id="ghar_sub_edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                <span aria-hidden="false">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post">

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
                        <input type="text" class="form-control" id="" name="dp_gharjagga_category" placeholder="Heading">
                        <span class="text-danger">@error('ghar_edti_heading'){{$message}}@enderror</span>
                    </div>

                    <div class="mb-3">
                        <label for="text" class="form-label" value="description"placeholder="Title"><b>Description</b></label>
                        <textarea class="form-control" placeholder="Describe yourself here..."" id=""name="dp_gharjagga_category_desc" rows="3"></textarea>
                        <span class="text-danger">@error('ghar_edti_description'){{$message}}@enderror</span>
                    </div>


                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


@endsection

