@extends('yojana.index')

@section('yojana-content')
    <x-card.card :headers="['title' => 'अपडेट '.$data['title']]">
        <x-form.form :form="[
            'route' => route($data['route_name'].'.update', $data['data']->id),
            'method' => 'put',
            'fields' => [
                [
                    [
                        'type' => 'text',
                        'name' => 'code',
                        'label' => 'कोड',
                        'value' => $data['data']->code,
                        'placeholder' => 'कोड',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'name',
                        'label' => 'नाम',
                        'value' => $data['data']->name,
                        'placeholder' => 'नाम',
                    ],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'details',
                        'label' => 'वीवरण',
                        'value' => $data['data']->details,
                        'placeholder' => 'वीवरण',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'full_name',
                        'label' => 'पुरा नाम',
                        'value' => $data['data']->full_name,
                        'placeholder' => 'पुरा नाम',
                    ],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'symbol',
                        'label' => 'प्रतीक',
                        'value' => $data['data']->symbol,
                        'placeholder' => 'प्रतीक',
                    ],
                    [],
                ],
                [
                    [
                        'type' => 'checkbox',
                        'name' => 'situation',
                        'label' => 'स्थिति',
                        'placeholder' => 'स्थिति',
                        'checked' => $data['data']->situation,
                    ],
                    // ['options'=>['key'=>'a','key1'=>'b','key2'=>'c'],'label'=>'options','value'=>'','name'=>'']
                ],
            ],
        ]"></x-form.form>
    </x-card.card>
    @foreach ($errors->all() as $error)
        {{ $error }}<br />
    @endforeach
@endsection
