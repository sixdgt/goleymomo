@extends('yojana.index')

@section('yojana-content')
    <x-card.card :headers="['title' => 'नयाँ योजना संचालन प्रक्रिया']">
        <x-form.form :form="
        [
            'route'=>route('yojana-sanchalan-prakriya.store'),
            'method'=>'Post',
            'fields'=>[
            [
                ['type'=>'text','name'=>'code','label'=>'कोड','value'=>'','placeholder'=>'कोड'],
                ['type'=>'text','name'=>'name','label'=>'नाम','value'=>'','placeholder'=>'नाम'],
            ],
            [
                ['type'=>'text','name'=>'details','label'=>'वीवरण','value'=>'','placeholder'=>'वीवरण','checked'=>true],
                ['type'=>'text','name'=>'full_name','label'=>'पुरा नाम','value'=>'','placeholder'=>'पुरा नाम'],
            ],
            [
                ['type'=>'checkbox','name'=>'situation','label'=>'स्थिति','placeholder'=>'स्थिति'],
                // ['options'=>['key'=>'a','key1'=>'b','key2'=>'c'],'label'=>'options','value'=>'','name'=>'']
                ]
        ]
    ]
    "></x-form.form>

    </x-card.card>



@endsection


