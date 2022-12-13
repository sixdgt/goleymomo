@extends('yojana.index')

@section('yojana-content')
    <x-card.card :headers="['title' => 'नयाँ याजनाका उदश्य']">
        <x-form.form :form="
        [
            'route'=>route('yojana-udesya.update',$data->id),
            'method'=>'put',
            'fields'=>[
            [
                ['type'=>'text','name'=>'code','label'=>'कोड','value'=>$data->code,'placeholder'=>'कोड'],
                ['type'=>'text','name'=>'name','label'=>'नाम','value'=>$data->name,'placeholder'=>'नाम'],
            ],
            [
                ['type'=>'text','name'=>'details','label'=>'वीवरण','value'=>$data->details,'placeholder'=>'वीवरण'],
                ['type'=>'text','name'=>'full_name','label'=>'पुरा नाम','value'=>$data->full_name,'placeholder'=>'पुरा नाम'],
            ],
            [
                ['type'=>'checkbox','name'=>'situation','label'=>'स्थिति','placeholder'=>'स्थिति','checked'=>$data->situation],
                // ['options'=>['key'=>'a','key1'=>'b','key2'=>'c'],'label'=>'options','value'=>'','name'=>'']
            ]
        ]
    ]
    "></x-form.form>

    </x-card.card>
@endsection


