@extends('yojana.index')

@section('yojana-content')
    <x-card.card :headers="['title' => 'अपडेट ' . $data['title']]">
        <x-form.form :form="$data['form']"></x-form.form>
    </x-card.card>
    {{-- @foreach ($errors->all() as $error)
        {{ $error }}<br />
    @endforeach --}}
@endsection
