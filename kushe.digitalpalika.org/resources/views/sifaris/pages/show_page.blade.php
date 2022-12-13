{{--<!DOCTYPE html>--}}
{{--<html>--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="IE=edge">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">--}}


{{--    <style>--}}
{{--        body{--}}
{{--            font-size: 15px;--}}
{{--            /*font-family: Preeti;*/--}}
{{--        }--}}

{{--        span{--}}
{{--            /*font-family: Preeti;*/--}}
{{--        }--}}

{{--        .div-main--}}
{{--        {--}}
{{--            font-size: 20px;--}}
{{--            padding: 10px;--}}
{{--        }--}}
{{--        .row-div--}}
{{--        {--}}
{{--            margin-top: 40px;--}}
{{--            width: 100%;--}}
{{--            float: left;--}}

{{--        }--}}

{{--        .flex-div-end--}}
{{--        {--}}

{{--            /*float: right;*/--}}
{{--            text-align: right;--}}
{{--        }--}}

{{--        .flex-div-start--}}
{{--        {--}}

{{--            /*float: left;*/--}}
{{--            text-align: left;--}}
{{--        }--}}

{{--        .flex-div-center--}}
{{--        {--}}

{{--            /*float: ;*/--}}
{{--            text-align: center;--}}

{{--        }--}}

{{--        .col_no-6--}}
{{--        {--}}
{{--            float: left;--}}
{{--            width: 50%;--}}
{{--        }--}}

{{--        .col_no-4--}}
{{--        {--}}
{{--            float: left;--}}
{{--            width: 33%;--}}
{{--        }--}}


{{--        .col_no-8--}}
{{--        {--}}
{{--            float: left;--}}
{{--            width: 66%;--}}
{{--        }--}}

{{--        .col_no-10--}}
{{--        {--}}
{{--            float: left;--}}
{{--            width: 83.33%;--}}
{{--        }--}}


{{--        .col_no-2--}}
{{--        {--}}
{{--            float: left;--}}
{{--            width: 16%;--}}
{{--        }--}}


{{--        .input-number--}}
{{--        {--}}
{{--            width: 50px--}}
{{--        }--}}

{{--        .margin-left20--}}
{{--        {--}}
{{--            margin-left: 50px;--}}
{{--        }--}}

{{--        .b_title--}}
{{--        {--}}
{{--            /*margin-right: 50px; */--}}
{{--            font-size: 30px--}}
{{--        }--}}

{{--        .text_bold--}}
{{--        {--}}
{{--            font-weight: bold;--}}
{{--            /*font-size: 25px;*/--}}
{{--        }--}}

{{--        .input-number--}}
{{--        {--}}
{{--            width: 50px--}}
{{--        }--}}

{{--        .margin-left50--}}
{{--        {--}}
{{--            margin-left: 50px;--}}
{{--        }--}}

{{--        .margin-left20--}}
{{--        {--}}
{{--            margin-left: 20px;--}}
{{--        }--}}

{{--        .margin-left60--}}
{{--        {--}}
{{--            margin-left: 80px;--}}
{{--        }--}}
{{--        .margin-left5{--}}
{{--            margin-left: 5px;--}}
{{--        }--}}

{{--        .b_title--}}
{{--        {--}}
{{--            margin-right: 50px; font-size: 30px--}}
{{--        }--}}

{{--        .width300{--}}
{{--            width: 300px!important;--}}
{{--        }--}}

{{--        .height150{--}}
{{--            height: 150px!important;--}}
{{--        }--}}




{{--        .page_table--}}
{{--        {--}}
{{--            text-align: center;--}}
{{--            /*float: right;*/--}}
{{--            width: 100%;--}}
{{--            font-weight: 500;--}}

{{--        }--}}

{{--        .page_table td,th--}}
{{--        {--}}
{{--            height: 25px;--}}
{{--            border: 1px solid black--}}

{{--        }--}}

{{--        .page_table tbody td--}}
{{--        {--}}
{{--            /*height: 150px;*/--}}

{{--        }--}}
{{--        .text-center--}}
{{--        {--}}
{{--            text-align: center!important;--}}
{{--            width: 100%;--}}
{{--        }--}}
{{--        .text_bold{--}}
{{--            font-weight: bold;--}}
{{--        }--}}

{{--        .text_light{--}}
{{--            font-weight: 50;--}}
{{--        }--}}

{{--        .margin-left100--}}
{{--        {--}}
{{--            position: absolute;--}}
{{--            margin-left: 400px;--}}
{{--            margin-top: 0px;--}}
{{--        }--}}

{{--        .div-border{--}}
{{--            border: 1px solid black;--}}
{{--            padding-bottom: 15px;--}}
{{--        }--}}


{{--        .margin-top-10{--}}
{{--            margin-top: 3px!important;--}}
{{--        }--}}
{{--        --}}
{{--        --}}
{{--        .float-right{--}}
{{--            float: right;--}}
{{--        }--}}
{{--        --}}
{{--        .float-left--}}
{{--        {--}}
{{--            float: left;--}}
{{--        }--}}

{{--        .text-red--}}
{{--        {--}}
{{--            color: red;--}}
{{--        }--}}

{{--        .font-size30--}}
{{--        {--}}
{{--            font-size: 30px;--}}
{{--        }--}}

{{--        .div-center{--}}
{{--            /*position: absolute;*/--}}
{{--            margin-left:auto;--}}
{{--            margin-right:auto;--}}
{{--        }--}}

{{--        .margin-top3--}}
{{--        {--}}
{{--            margin-top: 3px;--}}
{{--        }--}}

{{--    </style>--}}

{{--</head>--}}
{{--<body>--}}


<div class="div-main" style="padding: 30px" id="show_view">
    @foreach($view_array['form_sections'] as $section)
        <div class="row {{$section['div-class-name']}} div-nibedan">
            @if(array_key_exists('cols',$section['flex-div']))
                @foreach($section['flex-div']['cols'] as $col)
                    <div class="col-{{$col['col_no']}}">
                        @foreach($col['rows'] as $row)
                            <div class="d-flex flex-wrap flex-nibedan justify-content-{{$section['flex-div']['position']}}">
                                @foreach($row['fields'] as $field)

                                    @if($field['field_type']=='span')
                                        @if($field['content']=="")
                                            <span class="nibedan-b {{(array_key_exists('class',$field) ? $field['class']:'')}}">{{(array_key_exists('dynamic_content',$field) ? $sifaris_datas[$field['dynamic_content']]:'')}}</span>
                                        @else
                                            @foreach(explode(" ", $field['content']) as $word)
                                                @if(!$word=='')
                                                    <span class="nibedan-b {{(array_key_exists('class',$field) ? $field['class']:'')}}">{{$word}}</span>
                                                @endif

                                            @endforeach
                                        @endif
                                    @endif

                                    @if($field['field_type']=='input')
                                        <span hidden>{{$field_name=$field['name']}}</span>
                                        <span class="input-span-text {{(array_key_exists('class',$field) ? $field['class']:'')}}">{{$model->$field_name}}</span>
                                    @endif


                                    @if($field['field_type']=='select')
                                        <span hidden>{{$field_name=$field['name']}}</span>
                                        <span class="input-span-text{{$field['class']}}">{{$model->$field_name}}</span>
                                    @endif

                                    @if($field['field_type']=='radio')
                                        <span class="input-span-text{{$field['class']}}">{{$model->$field_name}}</span>
                                    @endif

                                    {{--                            @if($field['field_type']=='file')--}}
                                    {{--                                @if($field['file_display']=='dynamic')--}}
                                    {{--                                    <div class="kagajpatra">--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <br><div class="d-flex flex-nibedan justify-content-end">--}}
                                    {{--                                        <button  id="add_kagajpatra" class="btn_palika" type="button" data-kagajpatra_no="0" style="align-self: flex-end;"> कागज पत्र थप्नुहोस </button>--}}
                                    {{--                                    </div>--}}
                                    {{--                                @endif--}}
                                    {{--                                <span class="text-danger " id="error_{{$field['name']}}">@error($field['name'])({{$message}})@enderror</span>--}}
                                    {{--                            @endif--}}
                                    @if($field['field_type']=='table')

                                        <table style="" class="page_table @if(array_key_exists('table_class',$field)){{$field['table_class']}}  @endif">
                                            <thead>
                                            <tr>
                                                @foreach($field['table_title'] as $title)
                                                    <th style="">
                                                        {{$title}}
                                                    </th>
                                                @endforeach
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @for($i=$field['row_num']; $i>0; $i--)

                                                <tr>
                                                    @foreach($field['table_title'] as $title)

                                                        <td class="@if(array_key_exists('td_class',$field)){{$field['td_class']}}  @endif">

                                                        </td>

                                                    @endforeach
                                                </tr>

                                            @endfor
                                            </tbody>

                                        </table>
                                    @endif


                                    @if($field['field_type']=='custom_field')
                                        @include($field['view'])
                                    @endif
                                    @if($field['field_type']=='div')

                                        <div class="{{(key_exists('class',$field)? $field['class']:'')}}" style="{{(key_exists('style',$field)? $field['style']:'')}}">
                                                             <span>
                                                                 {{$field['content']}}
                                                             </span>
                                        </div>
                                    @endif

                                    @if($field['field_type']=='textarea')
                                        <span hidden>{{$field_name=$field['name']}}</span>
                                        <span class="input-span-text{{$field['class']}}">{{$model->$field_name}}</span>
                                    @endif

                                @endforeach
                            </div>
                        @endforeach
                    </div>

                @endforeach
            @else
                @foreach($section['flex-div']['rows'] as $row)
                    <div class="d-flex flex-wrap flex-nibedan justify-content-{{$section['flex-div']['position']}}">
                        @foreach($row['fields'] as $field)

                            @if($field['field_type']=='span')
                                @if($field['content']=="")
                                    <span class="nibedan-b {{(array_key_exists('class',$field) ? $field['class']:'')}}">{{(array_key_exists('dynamic_content',$field) ? $sifaris_datas[$field['dynamic_content']]:'')}}</span>
                                @else
                                    @foreach(explode(" ", $field['content']) as $word)
                                        @if(!$word=='')
                                            <span class="nibedan-b {{(array_key_exists('class',$field) ? $field['class']:'')}}">{{$word}}</span>
                                        @endif

                                    @endforeach
                                @endif
                            @endif

                            @if($field['field_type']=='input')
                                    <span hidden>{{$field_name=$field['name']}}</span>
                                    <span class="input-span-text {{(array_key_exists('class',$field) ? $field['class']:'')}}">{{$model->$field_name}}</span>
                            @endif


                            @if($field['field_type']=='select')
                                    <span hidden>{{$field_name=$field['name']}}</span>
                                    <span class="input-span-text{{$field['class']}}">{{$model->$field_name}}</span>
                            @endif

                            @if($field['field_type']=='radio')
                                    <span class="input-span-text{{$field['class']}}">{{$model->$field_name}}</span>
                            @endif

{{--                            @if($field['field_type']=='file')--}}
{{--                                @if($field['file_display']=='dynamic')--}}
{{--                                    <div class="kagajpatra">--}}
{{--                                    </div>--}}
{{--                                    <br><div class="d-flex flex-nibedan justify-content-end">--}}
{{--                                        <button  id="add_kagajpatra" class="btn_palika" type="button" data-kagajpatra_no="0" style="align-self: flex-end;"> कागज पत्र थप्नुहोस </button>--}}
{{--                                    </div>--}}
{{--                                @endif--}}
{{--                                <span class="text-danger " id="error_{{$field['name']}}">@error($field['name'])({{$message}})@enderror</span>--}}
{{--                            @endif--}}
                            @if($field['field_type']=='table')

                                <table style="" class="page_table @if(array_key_exists('table_class',$field)){{$field['table_class']}}  @endif">
                                    <thead>
                                    <tr>
                                        @foreach($field['table_title'] as $title)
                                            <th style="">
                                                {{$title}}
                                            </th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @for($i=$field['row_num']; $i>0; $i--)

                                        <tr>
                                            @foreach($field['table_title'] as $title)

                                                <td class="@if(array_key_exists('td_class',$field)){{$field['td_class']}}  @endif">

                                                </td>

                                            @endforeach
                                        </tr>

                                    @endfor
                                    </tbody>

                                </table>
                            @endif


                            @if($field['field_type']=='custom_field')
                                @include($field['view'])
                            @endif
                            @if($field['field_type']=='div')

                                <div class="{{(key_exists('class',$field)? $field['class']:'')}}" style="{{(key_exists('style',$field)? $field['style']:'')}}">
                                                             <span>
                                                                 {{$field['content']}}
                                                             </span>
                                </div>
                            @endif

                            @if($field['field_type']=='textarea')
                                    <span hidden>{{$field_name=$field['name']}}</span>
                                    <span class="input-span-text{{$field['class']}}">{{$model->$field_name}}</span>
                            @endif

                        @endforeach
                    </div>
                @endforeach
            @endif

        </div>
    @endforeach


{{--    @foreach($view_array['form_sections'] as $section)--}}
{{--        <div class="row row-div {{$section['div-class-name']}} div-nibedan">--}}
{{--            @if(array_key_exists('cols',$section['flex-div']))--}}

{{--                    @foreach($section['flex-div']['cols'] as $col)--}}
{{--                        <div class="col_no-{{$col['col_no']}}">--}}
{{--                            @foreach($col['rows'] as $row)--}}
{{--                                <div class=" flex-div-{{$section['flex-div']['position']}}">--}}

{{--                                    @foreach($row['fields'] as $field)--}}

{{--                                        @if($field['field_type']=='span')--}}
{{--                                            @if($field['content']=="")--}}
{{--                                                <span class="nibedan-b {{(array_key_exists('class',$field) ? $field['class']:'')}}"></span>--}}
{{--                                            @else--}}
{{--                                                @foreach(explode(" ", $field['content']) as $word)--}}
{{--                                                    @if(!$word=='')--}}
{{--                                                        <span style="" {{(array_key_exists('hide_in_view',$field)? "hidden":"")}} class="nibedan-b {{(array_key_exists('class',$field) ? $field['class']:'')}}">{{$word}}</span>--}}
{{--                                                    @endif--}}

{{--                                                @endforeach--}}
{{--                                            @endif--}}



{{--                                        @endif--}}

{{--                                        @if($field['field_type']=='input' || $field['field_type']=='date')--}}
{{--                                            <span hidden>{{$field_name=$field['name']}}</span>--}}
{{--                                            <span class="input-span-text">{{$model->$field_name}}</span>--}}

{{--                                        @endif--}}

{{--                                        @if($field['field_type']=='select')--}}
{{--                                            <span hidden>{{$field_name=$field['name']}}</span>--}}
{{--                                            <b class="input-span-text">{{$model->$field_name}}</b>--}}
{{--                                        @endif--}}


{{--                                            @if($field['field_type']=='radio')--}}

{{--                                                @foreach($field['options'] as $key=>$option)--}}
{{--                                                    <span class="nibedan-b {{(array_key_exists('class',$field) ? $field['class']:'')}}">--}}
{{--                                                        {{ ($model->$field_name==$key && !$model->$field_name=="") ? $option: ""}}--}}
{{--                                                    </span>--}}
{{--                                                @endforeach--}}
{{--                                            @endif--}}


{{--                                        @if($field['field_type']=='file')--}}

{{--                                        @endif--}}
{{--                                            @if($field['field_type']=='table')--}}

{{--                                                <table style="" class="page_table @if(array_key_exists('table_class',$field)){{$field['table_class']}}  @endif">--}}
{{--                                                    <thead>--}}
{{--                                                    <tr>--}}
{{--                                                        @foreach($field['table_title'] as $title)--}}

{{--                                                            <td style="">--}}
{{--                                                                {{$title}}--}}
{{--                                                            </td>--}}

{{--                                                        @endforeach--}}
{{--                                                    </tr>--}}
{{--                                                    </thead>--}}
{{--                                                    <tbody>--}}
{{--                                                    @for($i=$field['row_num']; $i>0; $i--)--}}

{{--                                                        <tr>--}}
{{--                                                            @foreach($field['table_title'] as $title)--}}

{{--                                                                <td class="{{(array_key_exists('td_class',$field) ? $field['td_class']:'')}}">--}}

{{--                                                                </td>--}}

{{--                                                            @endforeach--}}
{{--                                                        </tr>--}}

{{--                                                    @endfor--}}
{{--                                                    </tbody>--}}

{{--                                                </table>--}}
{{--                                            @endif--}}

{{--                                            @if($field['field_type']=='custom_field')--}}
{{--                                                @include($field['view'])--}}
{{--                                            @endif--}}

{{--                                            @if($field['field_type']=='div')--}}

{{--                                                <div class="{{(key_exists('class',$field)? $field['class']:'')}}" style="{{(key_exists('style',$field)? $field['style']:'')}}">--}}
{{--                                                             <span>--}}
{{--                                                                 {{$field['content']}}--}}
{{--                                                             </span>--}}
{{--                                                </div>--}}
{{--                                            @endif--}}

{{--                                            @if($field['field_type']=='textarea')--}}
{{--                                                <br>--}}
{{--                                                <span hidden>{{$field_name=$field['name']}}</span>--}}
{{--                                                <span class="input-span-text">{{$model->$field_name}}</span>--}}

{{--                                            @endif--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    @endforeach--}}


{{--            @else--}}
{{--                @foreach($section['flex-div']['rows'] as $row)--}}
{{--                    <div class=" flex-div-{{$section['flex-div']['position']}}">--}}

{{--                        @foreach($row['fields'] as $field)--}}

{{--                            @if($field['field_type']=='span')--}}
{{--                                @if($field['content']=="")--}}
{{--                                    <span class="nibedan-b {{(array_key_exists('class',$field) ? $field['class']:'')}}"></span>--}}
{{--                                @else--}}
{{--                                    @foreach(explode(" ", $field['content']) as $word)--}}
{{--                                        @if(!$word=='')--}}
{{--                                            <span style="" {{(array_key_exists('hide_in_view',$field)? "hidden":"")}} class="nibedan-b {{(array_key_exists('class',$field) ? $field['class']:'')}}">{{$word}}</span>--}}
{{--                                        @endif--}}

{{--                                    @endforeach--}}
{{--                                @endif--}}



{{--                            @endif--}}

{{--                            @if($field['field_type']=='input' || $field['field_type']=='date')--}}
{{--                                <span hidden>{{$field_name=$field['name']}}</span>--}}
{{--                                <span class="input-span-text">{{$model->$field_name}}</span>--}}

{{--                            @endif--}}

{{--                            @if($field['field_type']=='select')--}}
{{--                                <span hidden>{{$field_name=$field['name']}}</span>--}}
{{--                                <b class="input-span-text">{{$model->$field_name}}</b>--}}
{{--                            @endif--}}


{{--                                @if($field['field_type']=='radio')--}}

{{--                                    @foreach($field['options'] as $key=>$option)--}}
{{--                                        <span class="nibedan-b {{(array_key_exists('class',$field) ? $field['class']:'')}}">--}}
{{--                                                        {{ ($model->$field_name==$key && !$model->$field_name=="") ? $option: ""}}--}}
{{--                                                    </span>--}}
{{--                                    @endforeach--}}
{{--                                @endif--}}


{{--                            @if($field['field_type']=='file')--}}

{{--                            @endif--}}

{{--                            @if($field['field_type']=='table')--}}

{{--                                <table style="" class="page_table @if(array_key_exists('table_class',$field)){{$field['table_class']}}  @endif">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        @foreach($field['table_title'] as $title)--}}

{{--                                            <td style="">--}}
{{--                                                {{$title}}--}}
{{--                                            </td>--}}

{{--                                        @endforeach--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    @for($i=$field['row_num']; $i>0; $i--)--}}

{{--                                        <tr>--}}
{{--                                            @foreach($field['table_title'] as $title)--}}

{{--                                                <td class="{{(array_key_exists('td_class',$field) ? $field['td_class']:'')}}">--}}

{{--                                                </td>--}}

{{--                                            @endforeach--}}
{{--                                        </tr>--}}

{{--                                    @endfor--}}
{{--                                    </tbody>--}}

{{--                                </table>--}}

{{--                            @endif--}}
{{--                                @if($field['field_type']=='custom_field')--}}
{{--                                    @include($field['view'])--}}
{{--                                @endif--}}

{{--                                @if($field['field_type']=='div')--}}

{{--                                    <div class="{{(key_exists('class',$field)? $field['class']:'')}}" style="{{(key_exists('style',$field)? $field['style']:'')}}">--}}
{{--                                                             <span>--}}
{{--                                                                 {{$field['content']}}--}}
{{--                                                             </span>--}}
{{--                                    </div>--}}
{{--                                @endif--}}

{{--                                @if($field['field_type']=='textarea')--}}
{{--                                    <br>--}}
{{--                                    <span hidden>{{$field_name=$field['name']}}</span>--}}
{{--                                    <span class="input-span-text">{{$model->$field_name}}</span>--}}

{{--                                @endif--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            @endif--}}

{{--        </div>--}}
{{--    @endforeach--}}

</div>

{{--@php--}}
{{--    function getDataURI($imagePath) {--}}
{{--        $finfo = new finfo(FILEINFO_MIME_TYPE);--}}
{{--        $type = $finfo->file($imagePath);--}}
{{--        return 'data:' . $type . ';base64,' . base64_encode(file_get_contents($imagePath));--}}
{{--    }--}}
{{--@endphp--}}
{{--</body>--}}
{{--@include('pages.js_page')--}}

{{--</html>--}}














