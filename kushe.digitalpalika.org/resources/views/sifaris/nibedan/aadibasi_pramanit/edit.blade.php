


@extends('layouts.main')

@section('title')
    डिजिटल पालिका | सिफारिस
@endsection

@section('custom-css')
    <style>




    </style>

@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{route($view_array['form_store_url'])}}" method="post">
                @csrf
                <div class="card-header">
                    <span class="card-title">{{$view_array['form_title']}}</span>
                </div>

                {{--            मिति--}}
                @foreach($view_array['form_sections'] as $section)
                    <div class="row {{$section['div-class-name']}} div-nibedan">

                        @foreach($section['flex-div']['rows'] as $row)
                            <div class="d-flex flex-wrap flex-nibedan justify-content-{{$section['flex-div']['position']}}">
                                @foreach($row['fields'] as $field)

                                    @if($field['field_type']=='b')
                                        <b class="nibedan-b {{(array_key_exists('class',$field) ? $field['class']:'')}}">{{$field['content']}} </b>
                                    @endif

                                    @if($field['field_type']=='input')
                                            <span hidden>{{$field_name=$field['name']}}</span>
                                        <input class="input-text {{(array_key_exists('class',$field) ? $field['class']:'')}}" id="{{$field['name']}}" name="{{$field['name']}}" type="text" placeholder="{{$field['placeholder']}}" value="{{$aadhibasiPramanitNibedan->$field_name}}">
                                        <span class="text-danger " id="error_{{$field['name']}}">@error($field['name'])({{$message}})@enderror</span>
                                    @endif

                                    @if($field['field_type']=='select')
                                            <span hidden>{{$field_name=$field['name']}}</span>
                                        <select class="input-text{{$field['class']}}" name="{{$field['name']}}">

                                            <option></option>
                                            @foreach($field['options'] as $option)
                                                <option value="{{$option}}" {{ ($aadhibasiPramanitNibedan->$field_name==$option) ? "selected": ""}}>{{$option}}</option>
                                            @endforeach
                                        </select>
                                        <span class="text-danger " id="error_{{$field['name']}}">@error($field['name'])({{$message}})@enderror</span>
                                    @endif
                                    @if($field['field_type']=='file')
                                        @if($field['file_display']=='dynamic')
                                            <div class="kagajpatra">
                                            </div>
                                            <br><div class="d-flex flex-nibedan justify-content-end">
                                                <button  id="add_kagajpatra" class="btn_palika" type="button" data-kagajpatra_no="0" style="align-self: flex-end;"> कागज पत्र थप्नुहोस </button>
                                            </div>
                                        @endif
                                        <span class="text-danger " id="error_{{$field['name']}}">@error($field['name'])({{$message}})@enderror</span>
                                    @endif
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <div class="row div-nibedank-detail div-nibedan">
                    <div class="d-flex flex-nibedan justify-content-center">
                        <button class="btn_palika" type="submit">save and print record</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection


@section('custom-script')
    <script>
        @if(!$errors->isEmpty())
        @foreach(\GuzzleHttp\json_decode($errors) as $key=>$error)
        {{--                 {{$error[0]}}--}}
        $('#{{$key}}').addClass('error-input');
        @endforeach
        @endif

        $('.error-input').click(function () {
            $(this).removeClass('error-input');
            var name=$(this).attr('name');
            $('#error_'+name).html('');

        });
    </script>







    <script>

        // $(document).on('change','.document_file',function () {
        //     // Get a reference to the file input element
        //     console.log('input[id="nibedan_document_file'+$(this).data('id')+'"]')
        //     const inputElement = document.querySelector('input[id="nibedan_document_file'+$(this).data('id')+'"]');
        //     // Create a FilePond instance
        //
        //     const pond = FilePond.create(inputElement);
        //
        //
        //
        //
        //
        // })


        document.addEventListener('FilePond:removefile', (e) => {
            console.log('FilePond ready for use', e.detail);

        });


    </script>
@endsection