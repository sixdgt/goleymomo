@extends('yojana.index')

@section('yojana-content')
    <x-card.card :headers="['title' => 'नयाँ लक्षित समह ']">
        <x-form.form :form="[
            'route' => route('lachit-samaha.store'),
            'method' => 'Post',
            'fields' => [
                [
                    ['type' => 'text', 'name' => 'code', 'label' => 'कोड', 'value' => '', 'placeholder' => 'कोड'],
                    ['type' => 'text', 'name' => 'name', 'label' => 'नाम', 'value' => '', 'placeholder' => 'नाम'],
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
                        'label' => 'लक्षित समह प्रकार',
                        'value' => '',
                        'name' => 'target_group',
                    ],
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
                        'label' => 'क्रमागत',
                        'value' => '',
                        'name' => 'consecutive',
                    ],
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
                [['type' => 'checkbox', 'name' => 'situation', 'label' => 'स्थिति', 'placeholder' => 'स्थिति']],
            ],
        ]"></x-form.form>

    </x-card.card>
@endsection
