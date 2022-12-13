@extends('yojana.index')

@section('yojana-content')
    <x-card.card :headers="['title' => 'नयाँ '.$data['title']]">
        <x-form.form :form="[
            'route' => route($data['route_name'].'.store'),
            'method' => 'Post',
            'fields' => [
                [
                    ['type' => 'text', 'name' => 'code', 'label' => 'कोड', 'value' => '', 'placeholder' => 'कोड'],
                    ['type' => 'text', 'name' => 'consecutive', 'label' => 'क्रमागत', 'value' => '', 'placeholder' => 'क्रमागत'],

                ],
                [
                    ['type' => 'text','class'=>'ndp-nepali-calendar' ,'name' => 'date_from_bs', 'label' => 'मिति देखि ब.स', 'value' => '', 'placeholder' => 'मिति देखि ब.स'],
                    ['type' => 'text','class'=>'ndp-nepali-calendar' ,'name' => 'date_to_bs', 'label' => 'मिति सम्म ब.स', 'value' => '', 'placeholder' => 'मिति सम्म ब.स'],
                ],
                [
                    ['type' => 'date', 'name' => 'date_from_ad', 'label' => 'मिति देखि ए.डी', 'value' => '', 'placeholder' => 'मिति'],
                    ['type' => 'date', 'name' => 'date_to_ad', 'label' => 'मिति सम्म ए.डी', 'value' => '', 'placeholder' => 'मिति'],
                 ],
                [
                    ['type' => 'checkbox', 'name' => 'situation', 'label' => 'स्थिति', 'placeholder' => 'स्थिति'],
                    // ['options'=>['key'=>'a','key1'=>'b','key2'=>'c'],'label'=>'options','value'=>'','name'=>'']
                ],
            ],
        ]"></x-form.form>

    </x-card.card>
@endsection
