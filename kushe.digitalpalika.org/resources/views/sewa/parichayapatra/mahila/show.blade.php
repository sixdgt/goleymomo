@extends('layouts.main')

@section('title')
डिजिटल पालिका | महिला परिचय पत्र
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
        <a href="{{ route('mahila.index') }}" style="float: left"><i class="fas fa-arrow-left arrow"></i></a>

        <span class="card-title">महिला परिचय पत्र</span>
{{--        <a href="{{route("parichaya-patra.mahila.pdf",['id'=>$mahilaParichayapatra->id])}}">--}}
{{--            check--}}
{{--        </a>--}}


    </div>
    <div class="card-body">

            <div class="row">
                <div class="col-12">
                    <div hidden class="div-pdf-view">

                    </div>




                    <div class="div-default-view" style="width: 100%; height: auto; overflow-x: scroll">


                    </div>
                </div>
            </div>
            <div class="row prichayapatra-show-btns" style="padding: 10px">
                <div class="col-md-2"> </div>
                <div class="col-md-8 d-flex justify-content-between ">
                        <button type="button" class="btn btn-outline-primary active" id="btn-default" >देफौल्ट मा हेर्नुहोस</button>
                        <a href="{{route('mahila.edit',$mahilaParichayapatra->id)}}" type="button" class="btn btn-outline-primary"><i class="fas fa-edit"></i> एडित गर्नुहोस</a>
                        <button type="button" class="btn btn-outline-primary" id="btn-pdf"> PDF मा हेर्नुहोस</button>
                        <button type="button" class="btn btn-outline-primary"><i class="fas fa-print"></i> प्रिन्ट गर्नुहोस</button>
                        <a href="{{route('mahila.index')}}" type="button" class="btn btn-outline-primary"><i class="fas fa-arrow-left"></i> पछाडी</a>
                </div>
                <div class="col-md-2"> </div>
            </div>

        </div>


    <div class="card-body">

    </div>
</div>
@endsection

@section('custom-script')
    <script>

        $(document).ready(function () {
            $('.div-default-view').load("{{route('parichaya-patra.mahila.default',1)}}",function () {

            });
        });

        $('#btn-default').click(function () {
            $(this).addClass('active');
            $('#btn-pdf').removeClass('active');

            if($(".div-default-view").html()=== '')
            {
                $('.div-default-view').load("{{route('parichaya-patra.mahila.default',1)}}",function () {
                });
            }
            $(".div-default-view").removeAttr('hidden')
            $('.div-pdf-view').attr('hidden',true);
        });


        $('#btn-pdf').click(function () {

            $(this).addClass('active');
            $('#btn-default').removeClass('active');


            $('.div-pdf-view').html(

                    '<iframe src="' + '{{route("parichaya-patra.mahila.pdf",['id'=>$mahilaParichayapatra->id])}}' + '" style="margin:auto;width: 100%; height: 148mm">\n' +

                    '                        \n' +
                    '</iframe>'
            )


            $(".div-pdf-view").removeAttr('hidden');
            $('.div-default-view').attr('hidden',true);
            // alert('fdsa')
        })
    </script>
@endsection
