@extends('layouts.main')

@section('title')
    डिजिटल पालिका | आपाङ्गता परिचय पत्र
@endsection

@section('custom-css')
    <style>
        dt{

            text-align: right;
        }

        .show-page-btns
        {
            padding: 10px;
            border-bottom:1px solid black;
        }



    </style>
@endsection
@section('content')

    <div class="card">
        <div class="card-header">

            <a href="{{ route('byabasaya-darkhasta.index') }}" style="float: left"><i class="fas fa-arrow-left arrow"></i></a>
            <p><b class="card-title">व्यवसाय दर्ता गर्ने दरखास्त</b></p>


        </div>
        <div class="card-body">
            <div class="row show-page-btns" style="">
                <div class="col-md-2"> </div>
                <div class="col-md-8 d-flex justify-content-between ">
                    <button type="button" class="btn btn-outline-primary active" id="btn-default" >देफौल्ट मा हेर्नुहोस</button>
                    <a href="{{route('byabasaya-darkhasta.edit',$model->id)}}" type="button" class="btn btn-outline-primary"><i class="fas fa-edit"></i> एडित गर्नुहोस</a>
                    <button type="button" class="btn btn-outline-primary" id="btn-pdf"> PDF मा हेर्नुहोस</button>
                    <button type="button" class="btn btn-outline-primary print-pdf"><i class="fas fa-print"></i> प्रिन्ट गर्नुहोस</button>
                    <a href="{{route('byabasaya-darkhasta.index')}}" type="button" class="btn btn-outline-primary"><i class="fas fa-arrow-left"></i> पछाडी</a>
                </div>
                <div class="col-md-2"> </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div hidden class="div-pdf-view">

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
            $('.div-default-view').load("{{route('byabasaya-darkhasta.default',$model->id)}}",function () {

            });
            load_pdf('div-pdf-view','{{route("byabasaya-darkhasta.pdf",['id'=>$model->id])}}');
        });

        $('#btn-default').click(function () {
            $(this).addClass('active');
            $('#btn-pdf').removeClass('active');

            if($(".div-default-view").html()=== '')
            {
                $('.div-default-view').load("{{route('byabasaya-darkhasta.default',$model->id)}}",function () {
                });
            }
            $(".div-default-view").removeAttr('hidden')
            $('.div-pdf-view').attr('hidden',true);
        });


        $('#btn-pdf').click(function () {

            $(this).addClass('active');
            $('#btn-default').removeClass('active');

            load_pdf('div-pdf-view','{{route("byabasaya-darkhasta.pdf",['id'=>$model->id])}}');
            {{--$('.div-pdf-view').html(--}}
            {{--    '<iframe src="' + '{{route("byabasaya-darkhasta.pdf",['id'=>$model->id])}}' + '" style="margin:auto;width: 100%; height: 148mm">\n' +--}}
            {{--    '                        \n' +--}}
            {{--    '</iframe>'--}}
            {{--)--}}


            $(".div-pdf-view").removeAttr('hidden');
            $('.div-default-view').attr('hidden',true);
            // alert('fdsa')
        })
    </script>
@endsection

