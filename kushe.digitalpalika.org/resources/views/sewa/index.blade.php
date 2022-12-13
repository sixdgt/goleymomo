@extends('layouts.main')

@section('title')
डिजिटल पालिका | सेवा
@endsection

@section('content')
<div class="row">
    <div class="col-md-9">
        <div class="card btn-card">
            <div class="card-header">

                    <a href="{{ route('home') }}" style="float: left;"><i class="fas fa-arrow-left arrow"></i></a>
                    <div class="d-flex justify-content-center">
                        <div class="">
                            <p class="card-title"> सेवा </p>
                        </div>
                    </div>

            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex flex-wrap justify-content-center boxs">


                                <a href="{{ route('parichaya-patra.index') }}"><div class="button_box"><img src="{{url('icons/idcard_icon.png')}}" alt=""><span class="">परिचय पत्र</span></div></a>


                            <a href="{{ route('ghatana-darta.index') }}"><div class="button_box"><img src="{{url('icons/event_icon.png')}}" alt=""><span class="">घटना दर्ता</span></div></a>

                            <a href="{{ route('darta.index') }}"><div class="button_box"><img src="{{ asset('icons/dashboard/darta.png')}}" alt=""><span class="">दर्ता</span></div></a>


                            <a href="{{ route('chalani.index') }}"><div class="button_box"><img src="{{ asset('/icons/dashboard/form.png')}}" alt=""><span class="">चलानी</span></div></a>

                            <a href="{{ route('suchana-prabidhi.index') }}"><div class="button_box"><img src="{{url('icons/information_icon.png')}}" alt=""><span class="">सुचना प्रविधि</span><span id="prabidhi"></span></div></a>


                            <a href="{{ route('yojana.index') }}"><div class="button_box"><img src="{{url('icons/plan_icon.png')}}" alt=""><span class="">योजना</span></div></a>

                            <a href="{{ route('siksha.index') }}"><div class="button_box"><img src="{{url('icons/education_icon.png')}}" alt=""><span class="">शिक्षा</span></div></a>


                            <a href="{{ route('swasthya.index') }}"><div class="button_box"><img src="{{url('icons/health_icon.png')}}" alt=""><span class="">स्वास्थ</span></div></a>

                            <a href="{{ route('krishi.index') }}"><div class="button_box"><img src="{{url('icons/agriculture_icon.png')}}" alt=""><span class="">कृषि</span></div></a>


                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="d-flex justify-content-around boxs">

                        </div>

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
