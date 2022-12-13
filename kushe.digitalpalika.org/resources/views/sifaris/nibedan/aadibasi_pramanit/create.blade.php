
{{--@php--}}
{{--    $view_array=--}}
{{--    array(--}}
{{--        'form_store_url'=>'aadibasi-pramanit.store',--}}
{{--        'form_update_url'=>'',--}}
{{--        'form_title'=>'आदिबासी प्रमाणित सिफारिस',--}}
{{--        'form_sections'=>array(--}}
{{--            [--}}
{{--                'div-class-name'=>'div-nibedan-date',--}}
{{--                'flex-div'=>array(--}}
{{--                    'position'=>'end',--}}
{{--                    'rows'=>array(--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'b','content'=>'मिति : '],--}}
{{--                                    ['field_type'=>'input','class'=>'current-np-date','name'=>'applied_at','placeholder'=>'मिति'],--}}
{{--                            )--}}
{{--                        ]--}}
{{--                    )--}}
{{--                )--}}
{{--            ],--}}

{{--            [--}}
{{--                'div-class-name'=>'div-nibedan-to',--}}
{{--                'flex-div'=>array(--}}
{{--                    'position'=>'start',--}}
{{--                    'rows'=>array(--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'b','content'=>'श्री वडा सचिब ज्यु, '],--}}

{{--                            )--}}
{{--                        ],--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'input','class'=>'','name'=>'palika_name','placeholder'=>'पालिकाको नाम'],--}}
{{--                                    ['field_type'=>'input','class'=>'input-number','name'=>'palika_ward_no','placeholder'=>'वडा न.'],--}}
{{--                                    ['field_type'=>'b','content'=>'वडा कार्यालय'],--}}
{{--                            )--}}
{{--                        ],--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'input','class'=>'','name'=>'palika_address','placeholder'=>'पालिका ठेगाना'],--}}
{{--                                    ['field_type'=>'b','content'=>'।'],--}}
{{--                            )--}}
{{--                        ]--}}
{{--                    )--}}
{{--                )--}}
{{--            ],--}}

{{--            [--}}
{{--                'div-class-name'=>'div-nibedan-title',--}}
{{--                'flex-div'=>array(--}}
{{--                    'position'=>'center',--}}
{{--                    'rows'=>array(--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'b','content'=>'प्रस्तुत बिसयमा यस '],--}}
{{--                                    ['field_type'=>'select','class'=>'','name'=>'janajati_category','placeholder'=>'','option_type'=>'static','options'=>['जनजाती']],--}}
{{--                                    ['field_type'=>'b','content'=>'सिफारिस पऊ ।'],--}}
{{--                            )--}}
{{--                        ]--}}
{{--                    )--}}
{{--                )--}}
{{--            ],--}}

{{--            [--}}
{{--                'div-class-name'=>'div-nibedan-title',--}}
{{--                'flex-div'=>array(--}}
{{--                    'position'=>'left',--}}
{{--                    'rows'=>array(--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'b','class'=>'margin-left20','content'=>'प्रस्तुत बिसयमा यस'],--}}
{{--                                    ['field_type'=>'input','class'=>'','name'=>'palika_name_app_body','placeholder'=>'पालिकाको नाम'],--}}
{{--                                    ['field_type'=>'b','content'=>'वडा न.'],--}}
{{--                                    ['field_type'=>'input','class'=>'input-number','name'=>'ward_no','placeholder'=>'वडा न.'],--}}
{{--                                    ['field_type'=>'b','content'=>' निबासी '],--}}
{{--                                    ['field_type'=>'select','class'=>'','name'=>'applicant_parent_abbreviation','placeholder'=>'','option_type'=>'static','options'=>['श्री']],--}}
{{--                                    ['field_type'=>'input','class'=>'input-number','name'=>'applicant_parent_name','placeholder'=>''],--}}
{{--                                    ['field_type'=>'b','content'=>' को '],--}}
{{--                                    ['field_type'=>'select','class'=>'','name'=>'applicant_relationship','placeholder'=>'','option_type'=>'static','options'=>['छोरा','छोरि']],--}}
{{--                                    ['field_type'=>'select','class'=>'','name'=>'applicant_abbreviation','placeholder'=>'','option_type'=>'static','options'=>['श्री']],--}}
{{--                                    ['field_type'=>'input','class'=>'input-number','name'=>'applicant_name','placeholder'=>'नाम'],--}}
{{--                                    ['field_type'=>'b','content'=>'आदिबासी जनजाती अन्तर्गत'],--}}
{{--                                    ['field_type'=>'input','class'=>'input-number','name'=>'janajati_caste','placeholder'=>'जति'],--}}
{{--                                    ['field_type'=>'b','content'=>' जति भएको व्यहोराको सिफारिस उपलब्ध गराई पऊ यो निबेदन पेस गरेको छु ।'],--}}
{{--                            )--}}
{{--                        ]--}}
{{--                    )--}}
{{--                )--}}
{{--            ],--}}

{{--            [--}}
{{--                'div-class-name'=>'div-nibedan-to',--}}
{{--                'flex-div'=>array(--}}
{{--                    'position'=>'start',--}}
{{--                    'rows'=>array(--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'b','content'=>'संलग्न कागज पत्रहरु :-'],--}}

{{--                            )--}}
{{--                        ],--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'file','file_type'=>'','file_display'=>'dynamic','class'=>'','name'=>'palika_name','placeholder'=>'पालिकाको नाम'],--}}
{{--                            )--}}
{{--                        ]--}}
{{--                    )--}}
{{--                )--}}
{{--            ],--}}

{{--            [--}}
{{--                'div-class-name'=>'div-nibedan-to',--}}
{{--                'flex-div'=>array(--}}
{{--                    'position'=>'end',--}}
{{--                    'rows'=>array(--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'b','content'=>'निवेदक/निबेदिका'],--}}

{{--                            )--}}
{{--                        ],--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'b','content'=>'नाम, थर :-'],--}}
{{--                                    ['field_type'=>'input','name'=>'applicant_name','placeholder'=>'निवेदकको नाम'],--}}

{{--                            )--}}
{{--                        ],--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}

{{--                                    ['field_type'=>'b','content'=>'ठेगाना :-'],--}}
{{--                                    ['field_type'=>'input','name'=>'applicant_name','placeholder'=>'निवेदकको ठेगाना'],--}}
{{--                            )--}}
{{--                        ]--}}
{{--                    )--}}
{{--                )--}}
{{--            ],--}}
{{--            [--}}
{{--                'div-class-name'=>'div-nibedan-to',--}}
{{--                'flex-div'=>array(--}}
{{--                    'position'=>'start',--}}
{{--                    'rows'=>array(--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'b','class'=>'b_title','content'=>'निवेदकको विवरण'],--}}

{{--                            )--}}
{{--                        ],--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'b','class'=>'','content'=>'निवेदकको नाम  '],--}}

{{--                            )--}}
{{--                        ],--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'input','name'=>'applicant_name_bibaran','placeholder'=>'निवेदकको नाम'],--}}

{{--                            )--}}
{{--                        ],--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'b','class'=>'','content'=>'निवेदकको ठेगाना  '],--}}

{{--                            )--}}
{{--                        ],--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'input','name'=>'applicant_address_bibaran','placeholder'=>'निवेदकको ठेगाना'],--}}

{{--                            )--}}
{{--                        ],--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'b','class'=>'','content'=>'निवेदकको नागरिकता नं.'],--}}

{{--                            )--}}
{{--                        ],--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'input','name'=>'applicant_citizenship_number','placeholder'=>'निवेदकको नागरिकता नं.'],--}}

{{--                            )--}}
{{--                        ],--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'b','class'=>'','content'=>'निवेदकको फोन न.  '],--}}

{{--                            )--}}
{{--                        ],--}}
{{--                        [--}}
{{--                            'fields'=>array(--}}
{{--                                    ['field_type'=>'input','name'=>'applicant_phone_number','placeholder'=>'निवेदकको फोन न.  '],--}}

{{--                            )--}}
{{--                        ],--}}
{{--                    )--}}
{{--                )--}}
{{--            ],--}}


{{--        )--}}

{{--    )--}}
{{--@endphp--}}



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
                                                        <input class="input-text {{(array_key_exists('class',$field) ? $field['class']:'')}}" id="{{$field['name']}}" name="{{$field['name']}}" type="text" placeholder="{{$field['placeholder']}}" value="{{old($field['name'])}}">
                                                        <span class="text-danger " id="error_{{$field['name']}}">@error($field['name'])({{$message}})@enderror</span>
                                                @endif

                                                @if($field['field_type']=='select')
                                                        <select class="input-text{{$field['class']}}" name="{{$field['name']}}">

                                                            <option></option>
                                                            @foreach($field['options'] as $option)
                                                                <option value="{{$option}}" {{ (old($field['name'])==$option) ? "selected": ""}}>{{$option}}</option>
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





{{--        <div class="card">--}}
{{--            <div class="card-body">--}}
{{--                <form action="{{route('aadibasi-pramanit.store')}}" method="post">--}}
{{--                    @csrf--}}
{{--                    <div class="card-header">--}}
{{--                        आदिबासी प्रमाणित सिफारिस--}}
{{--                    </div>--}}

{{--                    --}}{{--            मिति--}}
{{--                    <div class="row div-nibedan-date div-nibedan">--}}
{{--                        <div class="d-flex flex-nibedan justify-content-end">--}}
{{--                            <b class="nibedan-b">मिति : </b> <input class="input-text current-np-date" id="applied_at" name="applied_at" type="text" placeholder="मिति" value="{{old('applied_at')}}">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="error-div pull-right">--}}
{{--                        <p class="text-danger" id="">@error('applied_at'){{$message}}@enderror</p>--}}
{{--                    </div>--}}
{{--                    --}}{{--            मिति--}}


{{--                    --}}{{--            पालिका ठेगाना --}}
{{--                    <div class="row div-nibedan-address div-nibedan">--}}
{{--                        <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                            <b class="nibedan-b">श्री वडा सचिब ज्यु  </b>--}}
{{--                        </div>--}}
{{--                        <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                            <input class="input-text" id="paika_name" name="palika_name" value="{{old('palika_name')}}" type="text" placeholder="पालिकाको नाम">--}}
{{--                            <input class="input-text input-number" id="palika_ward_no" name="palika_ward_no" value="{{old('palika_ward_no')}}" type="text" placeholder="वडा न.">--}}
{{--                            <b class="nibedan-b">वडा कार्यालय </b>--}}

{{--                        </div>--}}

{{--                        <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                            <input class="input-text" id="palika_address" name="palika_address" value="{{old('palika_address')}}" type="text" placeholder="पालिका ठेगाना">--}}
{{--                            <b class="nibedan-b"> । </b>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="error-div pull-left">--}}
{{--                        <p class="text-danger" id="">@error('palika_name'){{$message}}@enderror</p>--}}
{{--                        <p class="text-danger" id="">@error('palika_ward_no'){{$message}}@enderror</p>--}}
{{--                        <p class="text-danger" id="">@error('palika_address'){{$message}}@enderror</p>--}}
{{--                    </div>--}}
{{--                    --}}{{--            पालिका ठेगाना --}}



{{--                    --}}{{--            शीर्षक--}}
{{--                    <div class="row div-nibedan-title div-nibedan">--}}
{{--                        <div class="d-flex flex-nibedan justify-content-center">--}}
{{--                            <b class="nibedan-b">विषय: आदिबासी--}}
{{--                                <select name="janajati_category">--}}
{{--                                    <option value="जनजाती" {{ (old('marital_status')=="जनजाती") ? "selected": ""}}>जनजाती</option>--}}
{{--                                    <option></option>--}}
{{--                                    <option></option>--}}
{{--                                </select>--}}
{{--                                सिफारिस पऊ ।--}}
{{--                            </b>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    --}}{{--            शीर्षक--}}

{{--                    <div class="row  div-nibedan">--}}
{{--                        <div class="d-flex flex-wrap flex-nibedan justify-content-start">--}}
{{--                            <b class="nibedan-b"><samp style="margin-left: 100px"></samp> प्रस्तुत बिसयमा यस <input class="input-text" id="palika_name_app_body" name="palika_name_app_body" value="{{old('palika_name_app_body')}}" type="text" placeholder="पालिकाको नाम">--}}
{{--                            वडा न.<input class="input-text" style="width: 50px;" id="ward_no" name="ward_no" value="{{old('ward_no')}}" type="text" placeholder="वडा न.">--}}
{{--                            निबासी--}}
{{--                                <select name="applicant_parent_abbreviation">--}}
{{--                                    <option {{ (old('marital_status')=="श्री") ? "selected": ""}}>श्री</option>--}}
{{--                                    <option></option>--}}
{{--                                </select>--}}

{{--                            <input class="input-text" id="applicant_parent_name" name="applicant_parent_name" value="{{old('applicant_parent_name')}}" type="text" placeholder="">--}}

{{--                                को--}}
{{--                                <select name="applicant_relationship">--}}
{{--                                    <option {{ (old('marital_status')=="बाबु") ? "selected": ""}}>बाबु</option>--}}
{{--                                    <option></option>--}}
{{--                                </select>--}}
{{--                                <select name="applicant_abbreviation">--}}
{{--                                    <option value="श्री" {{ (old('marital_status')=="श्री") ? "selected": ""}}>श्री</option>--}}
{{--                                    <option></option>--}}
{{--                                </select>--}}

{{--                            <input class="input-text" id="applicant_name" name="applicant_name" value="{{old('applicant_name')}}" type="text" placeholder="नाम">--}}
{{--                            आदिबासी जनजाती अन्तर्गत<input class="input-text" id="janajati_caste" name="janajati_caste" value="{{old('janajati_caste')}}" type="text" placeholder="जति">--}}
{{--                            जति भएको व्यहोराको सिफारिस उपलब्ध गराई पऊ यो निबेदन पेस गरेको छु </b>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="error-div pull-center">--}}
{{--                        <p class="text-danger" id="">@error('palika_name_app_body'){{$message}}@enderror</p>--}}
{{--                        <p class="text-danger" id="">@error('ward_no'){{$message}}@enderror</p>--}}
{{--                        <p class="text-danger" id="">@error('applicant_parent_abbreviation'){{$message}}@enderror</p>--}}
{{--                        <p class="text-danger" id="">@error('applicant_relationship'){{$message}}@enderror</p>--}}
{{--                        <p class="text-danger" id="">@error('applicant_abbreviation'){{$message}}@enderror</p>--}}
{{--                        <p class="text-danger" id="">@error('applicant_name'){{$message}}@enderror</p>--}}
{{--                        <p class="text-danger" id="">@error('janajati_caste'){{$message}}@enderror</p>--}}
{{--                    </div>--}}


{{--                    <div class="row div-nibedan">--}}
{{--                        <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                            <b class="nibedan-b">संलग्न कागज पत्रहरु :-</b>--}}
{{--                        </div>--}}

{{--                        <div class="kagajpatra">--}}
{{--                        </div>--}}
{{--                        <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                            <button  id="add_kagajpatra" class="btn_palika" type="button" data-kagajpatra_no="0"> कागज पत्र थप्नुहोस </button>--}}
{{--                        </div>--}}


{{--                        <div class="kagajpatra">--}}
{{--                            <div id="0" class="file_upload_div">--}}
{{--                                <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                                    <b class="nibedan-b"> कागज पत्र :-</b>--}}
{{--                                </div>--}}

{{--                                <div>--}}
{{--                                    <div class="d-flex flex-nibedan justify-content-end">--}}


{{--                                        <input class="input-text" id="document_file_title" name="document_file_title" type="text" placeholder="कागज पत्र विवरण">--}}

{{--                                        <img class="remove_kagajpatra" data-kagajpatra_no="0" src="http://localhost:8000/icons/nibedan/remove.png" height="25px" width="25px">--}}
{{--                                    </div>--}}
{{--                                    <div class="">--}}
{{--                                        <div class="filepond--root document_file filepond--hopper" id="0" data-style-button-remove-item-position="left" data-style-button-process-item-position="right" data-style-load-indicator-position="right" data-style-progress-indicator-position="right" data-style-button-remove-item-align="false" style="height: 71px;"><input class="filepond--browser" type="file" id="filepond--browser-qjwal68xl" name="nibedan_document_file" aria-controls="filepond--assistant-qjwal68xl" aria-labelledby="filepond--drop-label-qjwal68xl"><a class="filepond--credits" aria-hidden="true" href="https://pqina.nl/" target="_blank" rel="noopener noreferrer" style="transform: translateY(64px);">Powered by PQINA</a><div class="filepond--drop-label" style="transform: translate3d(0px, 0px, 0px); opacity: 1;"><label for="filepond--browser-qjwal68xl" id="filepond--drop-label-qjwal68xl" aria-hidden="true">Drag &amp; Drop your files or <span class="filepond--label-action" tabindex="0">Browse</span></label></div><div class="filepond--list-scroller" style="transform: translate3d(0px, 0px, 0px);"><ul class="filepond--list" role="list"></ul></div><div class="filepond--panel filepond--panel-root" data-scalable="true"><div class="filepond--panel-top filepond--panel-root"></div><div class="filepond--panel-center filepond--panel-root" style="transform: translate3d(0px, 7px, 0px) scale3d(1, 0.57, 1);"></div><div class="filepond--panel-bottom filepond--panel-root" style="transform: translate3d(0px, 64px, 0px);"></div></div><span class="filepond--assistant" id="filepond--assistant-qjwal68xl" role="status" aria-live="polite" aria-relevant="additions"></span><div class="filepond--drip"></div><fieldset class="filepond--data"></fieldset></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}




{{--                    </div>--}}

{{--                    <div class="row div-nibedan">--}}
{{--                        <div class="d-flex flex-nibedan justify-content-end">--}}
{{--                            <b class="nibedan-b" style="margin-right: 50px">निवेदक/निबेदिका </b>--}}
{{--                        </div>--}}

{{--                        <div class="d-flex flex-nibedan flex-nibedan justify-content-end ">--}}
{{--                            <b class="nibedan-b">नाम, थर :-</b><input class="input-text" id="applicant_name" name="applicant_name" value="{{old('applicant_name')}}" type="text" placeholder="निवेदकको नाम">--}}

{{--                        </div>--}}
{{--                        <div class="d-flex flex-nibedan justify-content-end">--}}
{{--                            <b class="nibedan-b">ठेगाना :-</b><input class="input-text" id="applicant_address" name="applicant_address" value="{{old('applicant_address')}}" type="text" placeholder="निवेदकको ठेगाना">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="error-div pull-right">--}}
{{--                        <p class="text-danger" id="">@error('applicant_name'){{$message}}@enderror</p>--}}
{{--                        <p class="text-danger" id="">@error('applicant_address'){{$message}}@enderror</p>--}}

{{--                    </div>--}}


{{--                    <div class="row div-nibedank-detail div-nibedan">--}}
{{--                        <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                            <b class="nibedan-b" style="margin-right: 50px; font-size: 30px">निवेदकको विवरण </b>--}}
{{--                        </div>--}}
{{--                        <div class="row" >--}}
{{--                            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                                <b class="nibedan-b" style="margin-right: 50px">निवेदकको नाम  </b>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                                <input class="input-text" style="" id="applicant_name_bibaran" name="applicant_name_bibaran" value="{{old('applicant_name_bibaran')}}" type="text" placeholder="निवेदकको नाम ">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row" >--}}
{{--                            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                                <b class="nibedan-b" style="margin-right: 50px">निवेदकको ठेगाना  </b>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                                <input class="input-text" style="" id="applicant_address_bibaran" name="applicant_address_bibaran" value="{{old('applicant_address_bibaran')}}" type="text" placeholder="निवेदकको ठेगाना">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row" >--}}
{{--                            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                                <b class="nibedan-b" style="margin-right: 50px">--}}
{{--                                    निवेदकको नागरिकता नं.--}}
{{--                                </b>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                                <input class="input-text" style="" id="applicant_citizenship_number" name="applicant_citizenship_number" value="{{old('applicant_citizenship_number')}}" type="text" placeholder="निवेदकको नागरिकता नं.">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row" >--}}
{{--                            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                                <b class="nibedan-b" style="margin-right: 50px">निवेदकको फोन न.  </b>--}}
{{--                            </div>--}}
{{--                            <div class="d-flex flex-nibedan justify-content-start">--}}
{{--                                <input class="input-text" style="" id="applicant_phone_number" name="applicant_phone_number" value="{{old('applicant_phone_number')}}" type="text" placeholder="निवेदकको फोन न. ">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="error-div pull-left">--}}
{{--                        <p class="text-danger" id="">@error('applicant_name_bibaran'){{$message}}@enderror</p>--}}
{{--                        <p class="text-danger" id="">@error('applicant_address_bibaran'){{$message}}@enderror</p>--}}
{{--                        <p class="text-danger" id="">@error('applicant_citizenship_number'){{$message}}@enderror</p>--}}

{{--                        <p class="text-danger" id="">@error('applicant_phone_number'){{$message}}@enderror</p>--}}

{{--                    </div>--}}

{{--                    <div class="row div-nibedank-detail div-nibedan">--}}
{{--                        <div class="d-flex flex-nibedan justify-content-center">--}}
{{--                            <button class="btn_palika" type="submit">save and print record</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--        </div>--}}



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