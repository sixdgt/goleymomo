@extends('yojana.index')

@section('yojana-content')
    <x-card.card :headers="['title' => 'नयाँ कार्यक्रम ']">
        <x-form.form :form="[
            'route' => route('karyakram.store'),
            'method' => 'Post',
            'fields' => [
                [
                    ['type' => 'text', 'name' => 'code', 'label' => 'कोड', 'value' => '', 'placeholder' => 'कोड'],
                    ['type' => 'text', 'name' => 'name', 'label' => 'नाम', 'value' => '', 'placeholder' => 'नाम'],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'details',
                        'label' => 'वीवरण',
                        'value' => '',
                        'placeholder' => 'वीवरण',
                        'checked' => true,
                    ],
                    [
                        'type' => 'text',
                        'name' => 'full_name',
                        'label' => 'पुरा नाम',
                        'value' => '',
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
                        'value' => '',
                        'name' => 'upper_workspace',
                    ],
                    ['type' => 'checkbox', 'name' => 'situation', 'label' => 'स्थिति', 'placeholder' => 'स्थिति'],
                ],
            ],
        ]"></x-form.form>

    </x-card.card>
@endsection
