@extends('layouts.main')

@section('title')
डिजिटल पालिका | परिचय पत्र
@endsection

@section('content')


<div class="row">

    <div class="col-md-9">
        <div class="card btn-card">
            <div class="card-header">
                <a href="{{ route('sewa.index') }}" style="float: left"><i class="fas fa-arrow-left arrow"></i></a>
                <div class="d-flex justify-content-center">

                        <p class="card-title"> परिचय पत्र</p>

                </div>
            </div>
            <div class="card-body">

                <div class="col-md-6">

                    <div class="d-flex justify-content-start boxs">
                          <a href="{{route('mahila.index')}}"><div class="button_box"><img src="{{url('icons/woman_icon.png')}}" alt=""><span class="sub_box_title_Nagarik">महिला</span> </div> </a>
                          <a href="{{route('baalbaalika.index')}}"><div class="button_box"><img src="{{url('icons/child_icon.png')}}" alt=""><span class="sub_box_title_Nagarik">बालबालिका</span></div> </a>
                          <a href="{{route('apaanga.index')}}"><div class="button_box"><img src="{{url('icons/disable_icon.png')}}" alt=""><span class="sub_box_title_Nagarik">आपाङ्गता</span></div> </a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card btn-card">
            <div class="card-header">
                quick list
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>

@endsection
