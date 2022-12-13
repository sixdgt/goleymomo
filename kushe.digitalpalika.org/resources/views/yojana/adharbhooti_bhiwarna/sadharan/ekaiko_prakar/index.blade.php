@extends('yojana.index')

@section('yojana-content')
    {{-- start card --}}
    <x-card.card :headers="['title' => 'इकाईको प्रकार ', 'route' => route('sadharan-ekaiko-prakar.create')]">
        {{-- start table --}}
        <x-table.table :tableHeaders="['त्र .स', 'कोड', 'पुरा नाम', 'नाम','क्रमागत','वीवरण', 'स्थिति']">
        </x-table.table>
        {{-- end table --}}
    </x-card.card>
    {{-- end of card --}}
@endsection
{{-- custom script start --}}
@section('custom-script')
    {{-- datatable --}}
    <x-script.datatable-script :options="[
        'route' => route('sadharan-ekaiko-prakar.index'),
        'columns' => ['code', 'full_name', 'name','continuous','details', 'situation'=>['name'=>'situation','whileTrue'=>'सक्रिय','whileFalse'=>'निष्कृय']],
    ]">
        {{-- datatable --}}
    </x-script.datatable-script>
    {{-- alert --}}
    <x-script.alert></x-script.alert>
    {{-- alert --}}
    <x-script.delete-script route="{{ route('sadharan-ekaiko-prakar.destroy', '') }}"></x-script.delete-script>
@endsection
{{-- custom script ends --}}
