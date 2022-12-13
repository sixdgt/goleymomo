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
                        'name' => 'date',
                        'label' => 'मिति',
                        'value' => $data['data']->date,
                        'placeholder' => 'मिति',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'type',
                        'label' => 'प्रकार',
                        'value' => $data['data']->type,
                        'placeholder' => 'प्रकार',
                    ],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'institution',
                        'label' => 'संस्था',
                        'value' => $data['data']->institution,
                        'placeholder' => 'संस्था',
                    ],[]
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
