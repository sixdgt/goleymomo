@extends('layouts.main')

@section('title')
    डिजिटल पालिका | आपाङ्गता परिचय पत्र
@endsection

@section('style')
    <style>
        dt{

            text-align: right;
        }


    </style>
@endsection
@section('content')

    <div class="card">

        <div class="card-header">

            <a href="{{ route('apaanga.index') }}" style="float: left"><i class="fas fa-arrow-left arrow"></i></a>
            <p><b class="card-title">आपाङ्गता परिचय पत्र</b></p>

        </div>
        <div class="card-body">

            <div class="row prichayapatra-show-btns" style="padding: 10px">
                <div class="col-md-2"> </div>
                <div class="col-md-8 d-flex justify-content-between ">
                    <button type="button" class="btn btn-outline-primary active" id="btn-default" > <span class="show-btn-text"> <i class="fa fa-eye"></i><span class="show-btn-text"> देफौल्ट मा हेर्नुहोस</span></span></button>
                    <a href="{{route('apaanga.edit',$apaangaParichayapatra->id)}}" type="button" class="btn btn-outline-primary"><i class="fas fa-edit"></i><span class="show-btn-text"> एडित गर्नुहोस</span></a>
                    <button type="button" class="btn btn-outline-primary" id="btn-pdf"><i class="fa fa-file-pdf"></i><span class="show-btn-text"> PDF मा हेर्नुहोस</span></button>

                    <button type="button" class="btn btn-outline-primary print-pdf"><i class="fas fa-print"></i><span class="show-btn-text"> प्रिन्ट गर्नुहोस</span></button>

                    <a href="{{route('apaanga.index')}}" type="button" class="btn btn-outline-primary"><i class="fas fa-arrow-left"></i><span class="show-btn-text"> पछाडी</span></a>
                </div>
                <div class="col-md-2"> </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div hidden class="div-pdf-view" id="">

                    </div>
                    <div class="div-default-view" style="width: 100%; height: auto">

                    </div>
                </div>
            </div>



        </div>


        <div class="card-body">

        </div>
    </div>
@endsection

@section('custom-script')
    <script>



        @if(session('success'))

            Swal.fire({
                position: 'center',
                icon: 'success',
                title: '',
                text: '{{session('success')}}',
                showConfirmButton: false,
                timer: 1500
            })
        @endif
        $(document).ready(function () {
            $('.div-default-view').load("{{route('parichaya-patra.apaanga.default',$apaangaParichayapatra->id)}}",function () {

            });
            load_pdf('div-pdf-view','{{route("parichaya-patra.apaanga.pdf",['id'=>$apaangaParichayapatra->id])}}');

        });



        $('#btn-default').click(function () {
            $(this).addClass('active');
            $('#btn-pdf').removeClass('active');

            if($(".div-default-view").html()=== '')
            {

                $('.div-default-view').load("{{route('parichaya-patra.apaanga.default',$apaangaParichayapatra->id)}}",function () {

                });
            }
            $(".div-default-view").removeAttr('hidden')
            $('.div-pdf-view').attr('hidden',true);
        });


        $('#btn-pdf').click(function () {

            $(this).addClass('active');
            $('#btn-default').removeClass('active');

            $(".div-pdf-view").removeAttr('hidden');
            $('.div-default-view').attr('hidden',true);

            load_pdf('div-pdf-view','{{route("parichaya-patra.apaanga.pdf",['id'=>$apaangaParichayapatra->id])}}');
            {{--$('.div-pdf-view').html(--}}
            {{--    '<iframe class="iframe-pdf" src="' + '{{route("parichaya-patra.apaanga.pdf",['id'=>$apaangaParichayapatra->id])}}' + '" style="margin:auto;width: 100%; height: 148mm">\n' +--}}
            {{--    '\n' +--}}
            {{--    '</iframe>'--}}
            {{--)--}}

            // alert('fdsa')
        })
    </script>
@endsection
