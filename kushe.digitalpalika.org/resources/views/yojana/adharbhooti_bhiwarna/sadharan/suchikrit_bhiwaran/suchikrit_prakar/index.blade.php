@extends('yojana.index')

@section('yojana-content')
    {{-- start card --}}
    <x-card.card :headers="['title' => $data['title'], 'route' => route($data['route_name'].'.create')]">
        {{-- start table --}}
        <x-table.table :tableHeaders="['त्र .स','कोड','माथिल्लो समूह',  'पुरा नाम', 'दर्ता नं.','नाम', 'वीवरण', 'स्थिति']">
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
        'columns' => ['code','upper_group' ,'full_name', 'name', 'registration_no','details', 'situation'=>['name'=>'situation','whileTrue'=>'सक्रिय','whileFalse'=>'निष्कृय']],
    ]">
        {{-- datatable --}}
    </x-script.datatable-script>
    {{-- alert --}}
    <x-script.alert></x-script.alert>
    {{-- alert --}}
    <x-script.delete-script route="{{ route($data['route_name'].'.destroy', '') }}"></x-script.delete-script>
@endsection
{{-- custom script ends --}}
