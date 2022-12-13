@extends('layouts.main')

@section('title')
    डिजिटल पालिका | सिफारिस | निबेदन
@endsection

@section('content')


    {{-- created box --}}
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="d-flex justify-content-between p-2">
                            <div class="nagarik-heading">
                                <p><a href="{{route('sifaris.index')}}"><i class="fas fa-arrow-left arrow"></i></a> निबेदन</p>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-flex flex-wrap justify-content-center boxs">
                                <div class="button_box">
                                    <a href="{{route('aadibasi-pramanit.create')}}"><img src="{{ asset('icons/Inventory/plans.png') }}" alt=""><span class="sub_box_title_address">अधिबसी प्रमाणिकरण</span></a>
                                </div>
                                <div class="button_box">
                                    <a href="{{route('bipanna-nagarik.create')}}"><img src="{{ asset('icons/Inventory/plans.png') }}" alt=""><span class="sub_box_title_address">बिप्पन्न नागरिक आबेदन</span></a>
                                </div>

                                <div class="button_box">
                                    <a href="{{route('briddha-bhatta.create')}}"><img src="{{ asset('icons/Inventory/plans.png') }}" alt=""><span class="sub_box_title_address">बृद्ध वत्त निबेदन </span></a>
                                </div>
                                <div class="button_box">
                                    <a href="#"><img src="{{ asset('icons/Inventory/plans.png') }}" alt=""><span class="sub_box_title_address">ब्यबसाय दर्ता</span></a>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
    {{-- sifaris create modal --}}
    <div class="modal fade" id="sifarisModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                            <input type="text" class="form-control" id="" name="dp_category_menu " placeholder="Title">
                            <span class="text-danger">@error('dp_category_menu '){{$message}}@enderror</span>
                        </div>

                        <div class="mb-3">
                            <label for="text" class="form-label"><b>Icon/Photo</b></label>
                            <input type="file" class="form-control" id="" name="dp_category_menu_icon">
                            <span class="text-danger">@error('dp_category_menu_icon'){{$message}}@enderror</span>
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
