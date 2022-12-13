@extends('yojana.index')

@section('yojana-content')
    <x-card.card :headers="['title' => 'नयाँ '.$data['title']]">
        <x-form.form :form="[
            'route' => route($data['route_name'].'.store'),
            'method' => 'Post',
            'fields' => [
                [
                    ['type' => 'text', 'name' => 'date', 'label' => 'मिति', 'value' => '', 'placeholder' => 'मिति'],
                    ['type' => 'text', 'name' => 'type', 'label' => 'प्रकार', 'value' => '', 'placeholder' => 'प्रकार'],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'institution',
                        'label' => 'संस्था',
                        'value' => '',
                        'placeholder' => 'संस्था',
                        'checked' => true,
                    ],
                    []

                ],
                [
                    ['type' => 'checkbox', 'name' => 'situation', 'label' => 'स्थिति', 'placeholder' => 'स्थिति'],
                    // ['options'=>['key'=>'a','key1'=>'b','key2'=>'c'],'label'=>'options','value'=>'','name'=>'']
                ],
            ],
        ]"></x-form.form>

    </x-card.card>
@endsection
