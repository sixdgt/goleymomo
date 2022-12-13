@extends('yojana.index')

@section('yojana-content')
    <x-card.card :headers="['title' => 'अपडेट कार्यक्रम ']">
        <x-form.form :form="[
            'route' => route('karyakram.update', $data->id),
            'method' => 'put',
            'fields' => [
                [
                    [
                        'type' => 'text',
                        'name' => 'code',
                        'label' => 'कोड',
                        'value' => $data->code,
                        'placeholder' => 'कोड',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'name',
                        'label' => 'नाम',
                        'value' => $data->name,
                        'placeholder' => 'नाम',
                    ],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'details',
                        'label' => 'वीवरण',
                        'value' => $data->details,
                        'placeholder' => 'वीवरण',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'full_name',
                        'label' => 'पुरा नाम',
                        'value' => $data->full_name,
                        'placeholder' => 'पुरा नाम',
                    ],
                ],
                [
                    [
                        'options' => [
                            'key1' => '००१ - आर्थिक बिकास - १',
                            'key2' => '००२ - सामाजिक विकास - २',
                            'key3' => '००३ - पूर्वाधार विकास - ३',
                            'key4' => '००४ - बाताबरण तथा विपद व्यवस्थापन ४',
                            'key5' => '००५ - संयनगत विकास तथा सेवा प्रबाह - ५',
                            'key6' => '००६ - वित्तीयव्यवस्थापन र सूशासन - ६',
                            'key7' => '००७ - कार्यालय संचालन तथा पशासनिक - ७',
                            'key8' => '००८ - मनोरन्जन तथा खेलकूद - ८',
                            'key9' => '००९ - औषधि खरिद - ९',
                            'key10' => '००१० - शैक्षिक बिकास - १०',
                        ],
                        'label' => 'माथिलो कार्यक्षेत्र ',
                        'value' => $data->upper_workspace,
                        'name' => 'upper_workspace',
                    ],
                    [],
                    []
                    // ['options'=>['key'=>'a','key1'=>'b','key2'=>'c'],'label'=>'options','value'=>'','name'=>'']
                ],
                [
                    [
                        'type' => 'checkbox',
                        'name' => 'situation',
                        'label' => 'स्थिति',
                        'placeholder' => 'स्थिति',
                        'checked' => $data->situation,
                    ],
                ],
            ],
        ]"></x-form.form>
    </x-card.card>
@endsection
