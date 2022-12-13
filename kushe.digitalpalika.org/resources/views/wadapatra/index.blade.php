@extends('layouts.main')

@section('title')
डिजिटल पालिका | वडापत्र
@endsection

@section('content')
<div class="d-flex justify-content-between p-2">
    <div class="nagarik-heading">
       <p>नागरीक वडापत्र</p>
    </div>
</div>
<div class="nagarik-sub-box ">
    <div class="d-flex">
        <div class="box">
            <a href="{{ route('ghar-jagga.index') }}"><img src="{{ asset('icons/nagarpalika_badapatra/gharjagga.png')}}"alt=""><span class="sub-box-title-ghar">घर/ जग्गा/ बाटो</span><span id="bato"></span></a>

        </div>
        <div class="box">
            <a href="{{ route('panji-karan.index') }}"><img src="{{ asset('icons/nagarpalika_badapatra/Panjikaran.png')}}" he alt=""><span class="sub-box-title">पञ्जीकरण</span></a>
        </div>
        <div class="box" id="sewa">
            <a href="{{ route('sewa-subidha.index') }}"><img src="{{ asset('icons/nagarpalika_badapatra/Subidha.png')}}" alt=""><span class="sub-box-title-sewa">सेवा सुविधा</span> <span id="subidha"></span> </a>
        </div>
        <div class="box">
            <a href="{{ route('byapar-byawasaya.index') }}"><img src="{{ asset('icons/nagarpalika_badapatra/Byapaa.png')}}" alt=""><span class="sub-box-title-byapaar">व्यापार/व्यावसाय/</span><span class="sewa">उद्योग</span></a>
        </div>
    </div>
    <div class="d-flex">
        <div class="box">
            <a href="{{ route('kar-kanun.index') }}"><img src="{{ asset('icons/nagarpalika_badapatra/tax.png')}}" alt=""><span class="sub-box-title">कर/कानुन</span></a>
        </div>
        <div class="box">
            <a href="{{ route('krishi-siksha-swastha.index') }}"><img src="{{ asset('icons/nagarpalika_badapatra/edu.png')}}" alt=""><span class="sub-box-title-bides">कृषि/शिक्षा/स्वास्थ</span><span class="bides"></span></a>
        </div>
        <div class="box">
            <a href="{{ route('basai-sarai.index') }}"><img src="{{ asset('icons/nagarpalika_badapatra/basobas.png')}}" alt=""><span class="sub-box-title-basobas">वसोवास/बसाईसराई</span></a>
        </div>
        <div class="box other">
            <a href="#"><img src="" alt=""><span class="sub-box-title-anya">अन्य</span></a>
        </div>
    </div>
</div>
@endsection
