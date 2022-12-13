@extends('yojana.index')

@section('yojana-content')
    {{-- start card --}}
    <x-card.card :headers="['title' => $data['title'], 'route' => route($data['route_name'].'.create')]">
        {{-- start table --}}
        <x-table.table :tableHeaders="$data['table_headers']">
        </x-table.table>
        {{-- end table --}}
    </x-card.card>
    {{-- end of card --}}
@endsection
{{-- custom script start --}}
@section('custom-script')
    {{-- datatable --}}
    <x-script.datatable-script :options="[
        'route' => route($data['route_name'].'.index'),
        'columns' => $data['columns'],
    ]">
        {{-- datatable --}}
    </x-script.datatable-script>
    {{-- alert --}}
    <x-script.alert></x-script.alert>
    {{-- alert --}}
    <x-script.delete-script route="{{ route($data['route_name'].'.destroy', '') }}"></x-script.delete-script>
@endsection
{{-- custom script ends --}}
