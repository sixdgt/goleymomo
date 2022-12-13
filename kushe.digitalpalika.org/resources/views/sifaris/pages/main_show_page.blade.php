@extends('layouts.main')

@section('title')
    {{$view_array['form_title']}}
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

            <a href="{{ route($view_array['index_page_url']) }}" style="float: left"><i class="fas fa-arrow-left arrow"></i></a>
            <p><b class="card-title">{{$view_array['form_title']}}</b></p>

        </div>
        <div class="card-body">
            <div class="row show-page-btns" style="">
                <div class="col-md-2"> </div>
                <div class="col-md-8 d-flex justify-content-between ">
                    <button type="button" class="btn btn-outline-primary active" id="btn-default" ><i class="fa fa-eye"></i><span class="show-btn-text"> देफौल्ट मा हेर्नुहोस </span></button>
                    <a href="{{route($view_array['form_edit_url'],$model->id)}}" type="button" class="btn btn-outline-primary"><i class="fas fa-edit"></i><span class="show-btn-text"> एडित गर्नुहोस</span></a>
                    <button type="button" class="btn btn-outline-primary" id="btn-pdf"><i class="fa fa-file-pdf"></i><span class="show-btn-text"> PDF मा हेर्नुहोस</span></button>
                    <button type="button" class="btn btn-outline-primary print-pdf"><i class="fas fa-print"></i><span class="show-btn-text"> प्रिन्ट गर्नुहोस</span></button>
                    <a href="{{route($view_array['index_page_url'])}}" type="button" class="btn btn-outline-primary"><i class="fas fa-arrow-left"></i><span class="show-btn-text"> पछाडी</span></a>
                </div>
                <div class="col-md-2"> </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div hidden class="div-pdf-view">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="margin:auto;background:#fff;display:block;" width="200px" height="200px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
                            <path d="M10 50A40 40 0 0 0 90 50A40 42 0 0 1 10 50" fill="#e15b64" stroke="none">
                                <animateTransform attributeName="transform" type="rotate" dur="1s" repeatCount="indefinite" keyTimes="0;1" values="0 50 51;360 50 51"></animateTransform>
                            </path>
                        </svg>
                    </div>
                    <div class="div-default-view" style="width: 100%; height: auto">
                        <div style="padding-left:auto ;padding-right: auto">
                            <img src="{{url('/loading.svg')}}" style="margin:auto;display:block;">
                        </div>

                    </div>
                </div>
            </div>


        </div>


        <div class="card-body">

        </div>
    </div>
@endsection

@section('custom-script')
{{--    <script src="{{asset('js/htmltopdf.js')}}" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
    <script src="{{asset('js/htmltopdf.js')}}"></script>
    <script>
        @if(session('success'))

        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '',
            text: '{{session('success')}}',
            showConfirmButton: false,
            timer: 2100
        })
        @endif
        $(document).ready(function () {
            $('.div-default-view').load("{{route($view_array['default_view_url'],$model->id)}}",function () {
                htmltopdf('show_view',function (filename) {
                    load_pdf('div-pdf-view','{{route("pdf",'')}}/'+filename);
                });
            });
            {{--load_pdf('div-pdf-view','{{route($view_array['pdf_view_url'],['id'=>$model->id])}}');--}}

        });

        $('#btn-default').click(function () {
            $(this).addClass('active');
            $('#btn-pdf').removeClass('active');

            if($(".div-default-view").html()=== '')
            {
                $('.div-default-view').load("{{route($view_array['default_view_url'],$model->id)}}",function () {
                });
            }
            $(".div-default-view").removeAttr('hidden')
            $('.div-pdf-view').attr('hidden',true);
        });


        $('#btn-pdf').click(function () {

            //setting the htmltopdf option property
            //here the htmltopdf function will converts html whose id is show_view
            htmltopdf('show_view',function (filename) {
                $(this).addClass('active');
                $('#btn-default').removeClass('active');
                load_pdf('div-pdf-view','{{route("pdf",'')}}/'+filename);
                $(".div-pdf-view").removeAttr('hidden');
                $('.div-default-view').attr('hidden',true);
            });

        })




    </script>
@endsection

