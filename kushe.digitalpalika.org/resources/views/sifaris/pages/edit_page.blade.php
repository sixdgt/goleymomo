@extends('layouts.main')

@section('title')
    {{$view_array['form_title']}}
@endsection

@section('custom-css')
    <style>




    </style>

@endsection

@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{route($view_array['form_update_url'],$model->id)}}" method="post">
                @csrf
                <div class="card-header">
                    <a href="{{ route($view_array['back_url']) }}" style="float: left"><i class="fas fa-arrow-left arrow"></i></a>
                    <span class="card-title">{{$view_array['form_title']}}(अपडेट)</span>
                </div>

                {{--            मिति--}}
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
                                                    <input class="input-text {{(array_key_exists('class',$field) ? $field['class']:'')}}" id="{{$field['name']}}" name="{{$field['name']}}" type="text" placeholder="{{$field['placeholder']}}" value="{{$model->$field_name}}">
                                                    <span class="text-danger " id="error_{{$field['name']}}">@error($field['name'])({{$message}})@enderror</span>
                                                @endif


                                                @if($field['field_type']=='select')
                                                    <span hidden>{{$field_name=$field['name']}}</span>
                                                    <select class="input-text{{$field['class']}}" name="{{$field['name']}}">

                                                        <option></option>

                                                        @foreach($field['options'] as $option)
                                                            <option value="{{$option}}" {{ ($model->$field_name==$option) ? "selected": ""}}>{{$option}}</option>
                                                        @endforeach
                                                    </select>
                                                    <span class="text-danger " id="error_{{$field['name']}}">@error($field['name'])({{$message}})@enderror</span>
                                                @endif

                                                    @if($field['field_type']=='radio')

                                                        @foreach($field['options'] as $key=>$option)
                                                            {{old($field['name'])}}
                                                            <input type="radio" id="radio{{$key}}" class="margin-left5" name="{{$field['name']}}" value="{{$key}}" {{ ($model->$field_name==$key && !$model->$field_name=="") ? "checked": ""}}>
                                                            <label for="radio{{$key}}" class="margin-left5">{{$option}} </label><br>

                                                        @endforeach

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

                                                        <textarea class="input-text {{(array_key_exists('class',$field) ? $field['class']:'')}}" id="{{$field['name']}}" name="{{$field['name']}}" type="textarea" placeholder="{{$field['placeholder']}}" value="{{$model->$field_name}}">{{$model->$field_name}}</textarea>
                                                        <span class="text-danger " id="error_{{$field['name']}}">@error($field['name'])({{$message}})@enderror</span>
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
                                            <input class="input-text {{(array_key_exists('class',$field) ? $field['class']:'')}}" id="{{$field['name']}}" name="{{$field['name']}}" type="text" placeholder="{{$field['placeholder']}}" value="{{$model->$field_name}}">
                                            <span class="text-danger " id="error_{{$field['name']}}">@error($field['name'])({{$message}})@enderror</span>
                                        @endif


                                        @if($field['field_type']=='select')
                                            <span hidden>{{$field_name=$field['name']}}</span>
                                            <select class="input-text{{$field['class']}}" name="{{$field['name']}}">

                                                <option></option>

                                                @foreach($field['options'] as $option)
                                                    <option value="{{$option}}" {{ ($model->$field_name==$option) ? "selected": ""}}>{{$option}}</option>
                                                @endforeach
                                            </select>
                                            <span class="text-danger " id="error_{{$field['name']}}">@error($field['name'])({{$message}})@enderror</span>
                                        @endif

                                            @if($field['field_type']=='radio')

                                                @foreach($field['options'] as $key=>$option)
                                                    {{old($field['name'])}}
                                                    <input type="radio" id="radio{{$key}}" class="margin-left5" name="{{$field['name']}}" value="{{$key}}" {{ ($model->$field_name==$key && !$model->$field_name=="") ? "checked": ""}}>
                                                    <label for="radio{{$key}}" class="margin-left5">{{$option}} </label><br>

                                                @endforeach

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
                                                <textarea class="input-text {{(array_key_exists('class',$field) ? $field['class']:'')}}" id="{{$field['name']}}" name="{{$field['name']}}" type="textarea" placeholder="{{$field['placeholder']}}" value="{{$model->$field_name}}">{{$model->$field_name}}</textarea>
                                                <span class="text-danger " id="error_{{$field['name']}}">@error($field['name'])({{$message}})@enderror</span>
                                            @endif

                                    @endforeach
                                </div>
                            @endforeach
                        @endif

                    </div>
                @endforeach
                <div class="row div-nibedank-detail div-nibedan">
                    <div class="d-flex flex-nibedan justify-content-center">
                        <button class="btn_palika" type="submit"> अपडेट गर्नुहोस् </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection


@section('custom-script')
    @include('sifaris.pages.js_page')

@endsection