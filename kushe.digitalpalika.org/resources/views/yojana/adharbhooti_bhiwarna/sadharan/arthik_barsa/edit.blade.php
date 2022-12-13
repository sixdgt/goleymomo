@extends('yojana.index')

@section('yojana-content')
    <x-card.card :headers="['title' => 'अपडेट ' . $data['title']]">
        <x-form.form :form="[
            'route' => route($data['route_name'] . '.update', $data['data']->id),
            'method' => 'put',
            'fields' => [
                [
                    ['type' => 'text', 'name' => 'code', 'label' => 'कोड', 'value' => $data['data']->code, 'placeholder' => 'कोड'],
                    [
                        'type' => 'text',
                        'name' => 'consecutive',
                        'label' => 'क्रमागत',
                        'value' => $data['data']->consecutive,
                        'placeholder' => 'क्रमागत',
                    ],
                ],
                [
                    [
                        'type' => 'text',
                        'class' => 'ndp-nepali-calendar',
                        'name' => 'date_from_bs',
                        'label' => 'मिति देखि ब.स',
                        'value' => $data['data']->date_from_bs,
                        'placeholder' => 'मिति देखि ब.स',
                    ],
                    [
                        'type' => 'text',
                        'class' => 'ndp-nepali-calendar',
                        'name' => 'date_to_bs',
                        'label' => 'मिति सम्म ब.स',
                        'value' =>  $data['data']->date_to_bs,
                        'placeholder' => 'मिति सम्म ब.स',
                    ],
                ],
                [
                    [
                        'type' => 'date',
                        'name' => 'date_from_ad',
                        'label' => 'मिति देखि ए.डी',
                        'value' => $data['data']->date_from_ad,
                        'placeholder' => 'मिति',
                    ],
                    [
                        'type' => 'date',
                        'name' => 'date_to_ad',
                        'label' => 'मिति सम्म ए.डी',
                        'value' => $data['data']->date_to_ad,
                        'placeholder' => 'मिति',
                    ],
                ],
                [
                    ['type' => 'checkbox', 'name' => 'situation', 'label' => 'स्थिति', 'placeholder' => 'स्थिति','checked'=>$data['data']->situation],
                    // ['options'=>['key'=>'a','key1'=>'b','key2'=>'c'],'label'=>'options','value'=>'','name'=>'']
                ],
            ],
        ]"></x-form.form>
    </x-card.card>
    @foreach ($errors->all() as $error)
        {{ $error }}<br />
    @endforeach
@endsection
