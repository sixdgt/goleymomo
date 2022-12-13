@extends('yojana.index')

@section('yojana-content')
    {{-- start card --}}
    <x-card.card :headers="['title' => 'योजना क्रियाकलाप ', 'route' => route('yojana-kriyakalap.create')]">
        {{-- start table --}}
        <x-table.table :tableHeaders="['त्र .स', 'कोड', 'पुरा नाम', 'नाम', 'वीवरण', 'स्थिति']">
        </x-table.table>
        {{-- end table --}}
    </x-card.card>
    {{-- end of card --}}
@endsection
{{-- custom script start --}}
@section('custom-script')
    {{-- datatable --}}
    <x-script.datatable-script :options="[
        'route' => route('yojana-kriyakalap.index'),
        'columns' => ['code', 'full_name', 'name', 'details', 'situation'=>['name'=>'situation','whileTrue'=>'सक्रिय','whileFalse'=>'निष्कृय']],
    ]">
        {{-- datatable --}}
    </x-script.datatable-script>
    {{-- alert --}}
    <x-script.alert></x-script.alert>
    {{-- alert --}}
    <x-script.delete-script route="{{ route('yojana-kriyakalap.destroy', '') }}"></x-script.delete-script>
@endsection
{{-- custom script ends --}}
