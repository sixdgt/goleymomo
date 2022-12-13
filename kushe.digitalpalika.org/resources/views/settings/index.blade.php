@extends('layouts.main')

@section('title')
डिजिटल पालिका | सेटिङ्ग
@endsection

@section('custom-css')
    <style>

        .button_box img{
            height: 40px;
            width: 40px;
        }

    </style>
@endsection

@section('content')
    {{-- <div class="d-flex justify-content-between p-2">
        <div class="nagarik-heading">
           <p>सेटिङ्ग</p>
        </div>
    </div> --}}

{{--    <div class="d-flex boxs justify-content-center">--}}
{{--        <div class="button_box">--}}
{{--            <a href="{{ route('parichaya.index') }}"><img src="../icons/nagarpalika_badapatra/gharjagga.png"alt=""><span class="">परिचय</span></a>--}}
{{--        </div>--}}

{{--        <div class="button_box">--}}
{{--            <a href="{{ route('parichaya.index') }}"><img src="../icons/nagarpalika_badapatra/gharjagga.png"alt=""><span>परिचय</span></a>--}}
{{--        </div>--}}
{{--        <div class="button_box">--}}
{{--            <a href="{{ route('karmachari.index') }}"><img src="../icons/nagarpalika_badapatra/Panjikaran.png" he alt=""><span>कर्मचारी</span></a>--}}
{{--        </div>--}}
{{--        <div class="button_box">--}}
{{--            <a href="{{ route('ward.index') }}"><img src="../icons/nagarpalika_badapatra/Subidha.png" alt=""><span>वडा</span></a>--}}
{{--        </div>--}}



{{--    </div>--}}

{{--    <div class="d-flex boxs justify-content-center">--}}
{{--        <div class="button_box">--}}
{{--            <a href="{{ route('pratinidhi.index') }}"><img src="../icons/nagarpalika_badapatra/Byapaa.png" alt=""><span>प्रतिनिधी</span></a>--}}
{{--        </div>--}}
{{--        <div class="button_box">--}}
{{--            <a href="{{ route('patra-kisim.index') }}"><img src="../icons/nagarpalika_badapatra/Byapaa.png" alt=""><span>पत्रको किसिम थप्नुहोस्</span></a>--}}
{{--        </div>--}}
{{--        <div class="button_box">--}}
{{--            <a href="{{ route('sakha.index') }}"><img src="../icons/nagarpalika_badapatra/Byapaa.png" alt=""><span>साखा थप्नुहोस्</span></a>--}}
{{--        </div>--}}
{{--        <div class="button_box">--}}
{{--            <a href="{{ route('sadasya.index') }}"><img src="../icons/nagarpalika_badapatra/Byapaa.png" alt=""><span>सदस्य थप्नुहोस्</span></a>--}}
{{--        </div>--}}
{{--    </div>--}}



<div class="row">
    <div class="col-md-9">


            <div class="card btn-card">
                <div class="card-header">
                    <span class="card-title">सेटिङहरू</span>
                </div>
                <div class="card-body">
                    <div class="row">

                            <div class="d-flex flex-wrap justify-content-center">

                                    <a href="{{ route('parichaya.index') }}">
                                        <div class="button_box">
                                            <img src="{{url('icons/palika_parichya_icon.png')}}"alt=""><span class="">परिचय</span>
                                        </div>
                                    </a>

                                    <a href="{{ route('karmachari.index') }}">
                                        <div class="button_box">
                                            <img src="{{url('icons/staff_icon.png')}}" he alt=""><span>कर्मचारी</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('ward.index') }}">
                                        <div class="button_box">
                                            <img src="{{url('icons/ward_icon.png')}}" alt=""><span>वडा</span>
                                        </div>
                                    </a>

                                    <a href="{{ route('pratinidhi.index') }}">
                                        <div class="button_box">
                                            <img src="{{url('icons/pratinidhi_icon.png')}}" alt=""><span>प्रतिनिधी</span>
                                        </div>
                                    </a>
                                    <a href="{{ route('patra-kisim.index') }}">
                                        <div class="button_box">
                                            <img src="{{url('icons/pepper_icon.png')}}" alt=""><span>पत्रको किसिम थप्नुहोस्</span>
                                        </div>
                                    </a>
                                <a href="{{ route('sakha.index') }}">
                                    <div class="button_box">
                                        <img src="{{url('icons/branch_icon.png')}}" alt=""><span>साखा थप्नुहोस्</span>
                                    </div>
                                </a>
                                <a href="{{ route('sadasya.index') }}">
                                    <div class="button_box">
                                        <img src="{{url('icons/member_icon.png')}}" alt=""><span>सदस्य थप्नुहोस्</span>
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                quick list
            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>

@endsection

@section('custom-script')

@endsection