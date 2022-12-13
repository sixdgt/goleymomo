@extends('yojana.index')

@section('yojana-content')
    {{-- start card --}}
    <x-card.card :headers="['title' => 'कार्यालय ', 'route' => route('karyalaya.create')]">
        {{-- start table --}}
        <x-table.table :tableHeaders="[
            'त्र .स',
            'कोड',
            'संस्थाको प्रकार',
            'नाम',
            'दर्ता नं',
            'दर्ता मिति',
            'स्थाई ठेगाना',
            'सम्पर्क नम्बर',
            'फ्याक्स',
            'इमेल',
            'स्थिति',
        ]">
        </x-table.table>
        {{-- end table --}}
    </x-card.card>
    {{-- end of card --}}
@endsection
{{-- custom script start --}}
@section('custom-script')
    {{-- datatable --}}
    <x-script.datatable-script :options="[
        'route' => route('karyalaya.index'),
        'columns' => [
            'code',
            'type',
            'name',
            'registration_no',
            'date_in_bs',
            'savik_district',
            'phone_number',
            'fax',
            'email',
            'situation' => ['name' => 'situation', 'whileTrue' => 'सक्रिय', 'whileFalse' => 'निष्कृय'],
        ],
    ]">
        {{-- datatable --}}
    </x-script.datatable-script>
    {{-- alert --}}
    <x-script.alert></x-script.alert>
    {{-- alert --}}
    <x-script.delete-script route="{{ route('karyalaya.destroy', '') }}"></x-script.delete-script>
@endsection
{{-- custom script ends --}}
