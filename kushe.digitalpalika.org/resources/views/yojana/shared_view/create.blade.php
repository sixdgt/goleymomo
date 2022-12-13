@extends('yojana.index')
@section('yojana-content')
    <x-card.card :headers="['title' => 'नयाँ '.$data['title']]">
        <x-form.form :form="$data['form']"></x-form.form>
    </x-card.card>
@endsection
