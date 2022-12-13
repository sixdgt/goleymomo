@extends('yojana.index')

@section('yojana-content')
    <x-card.card :headers="['title' => 'नयाँ कार्यालय']">
        <x-form.form :form="[
            'route' => route('karyalaya.store'),
            'method' => 'Post',
            'fields' => [
                [
                    [
                        'type' => 'text',
                        'name' => 'type',
                        'label' => 'संस्थाको प्रकार',
                        'value' => '',
                        'placeholder' => 'संस्थाको प्रकार',
                    ],
                    ['type' => 'text', 'name' => 'code', 'label' => 'कोड', 'value' => '', 'placeholder' => 'कोड'],
                    ['type' => 'checkbox', 'name' => 'situation', 'label' => 'स्थिति', 'placeholder' => 'स्थिति'],
                ],
                [
                    [
                        'label' => 'बिवरण',
                    ],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'full_name',
                        'label' => 'पुरा नाम',
                        'value' => '',
                        'placeholder' => 'पुरा नाम',
                    ],
                    ['type' => 'text', 'name' => 'name', 'label' => 'नाम', 'value' => '', 'placeholder' => 'नाम'],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'full_name',
                        'label' => 'पुरा नाम',
                        'value' => '',
                        'placeholder' => 'पुरा नाम',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'registration_no',
                        'label' => 'डार्टा नं ',
                        'value' => '',
                        'placeholder' => 'डार्टा नं',
                    ],
                    [
                        'type' => 'date',
                        'name' => 'date_in_bs',
                        'label' => 'डर्ता मिति (बि.स)',
                        'value' => '',
                        'placeholder' => 'डर्ता मिति (बि.स)',
                    ],
                    [
                        'type' => 'date',
                        'name' => 'date_in_ad',
                        'label' => 'डर्ता मिति (ई.सं.)',
                        'value' => '',
                        'placeholder' => 'डर्ता मिति (बि.स)',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'karyalaya',
                        'label' => 'कार्यालय',
                        'value' => '',
                        'placeholder' => 'कार्यालय',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'other_details',
                        'label' => 'अन्य बिवरण',
                        'value' => '',
                        'placeholder' => 'अन्य बिवरण',
                    ],
                ],
                [
                    [
                        'label' => 'ठेगाना बिवरण',
                    ],
                ],
                [
                    // [
                    //     'label' => 'साविक',
                    // ],
                    [
                        'type' => 'text',
                        'name' => 'savik_zone',
                        'label' => 'अंचल',
                        'value' => '',
                        'placeholder' => 'अंचल',
                        'checked' => true,
                    ],
                    [
                        'type' => 'text',
                        'name' => 'savik_district',
                        'label' => 'जिल्ला',
                        'value' => '',
                        'placeholder' => 'जिल्ला',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'savik_palika',
                        'label' => ' गा.पा./न.पा. ',
                        'value' => '',
                        'placeholder' => ' गा.पा./न.पा.',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'savik_ward_no',
                        'label' => ' बढा नम्बर ',
                        'value' => '',
                        'placeholder' => 'बढा नम्बर',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'savik_house_no',
                        'label' => 'घर नम्बर',
                        'value' => '',
                        'placeholder' => 'घर नम्बर',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'savik_toll_no',
                        'label' => 'टोल',
                        'value' => '',
                        'placeholder' => 'टोल',
                    ],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'halko_provinces',
                        'label' => 'प्रदेश',
                        'value' => '',
                        'placeholder' => 'प्रदेश',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'halko_district',
                        'label' => 'जिल्ला',
                        'value' => '',
                        'placeholder' => 'जिल्ला',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'halko_palika',
                        'label' => ' गा.पा./न.पा. ',
                        'value' => '',
                        'placeholder' => ' गा.पा./न.पा.',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'halko_ward_no',
                        'label' => ' बढा नम्बर ',
                        'value' => '',
                        'placeholder' => 'बढा नम्बर',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'halko_street_name',
                        'label' => 'सडकको नाम',
                        'value' => '',
                        'placeholder' => 'सडकको नाम',
                    ],
                    // ['options'=>['key'=>'a','key1'=>'b','key2'=>'c'],'label'=>'options','value'=>'','name'=>'']
                ],

                [
                    [
                        'label' => 'सम्पर्क विवरण ',
                    ],
                ],

                [
                    [
                        'type' => 'text',
                        'name' => 'phone_number',
                        'label' => 'फोन',
                        'value' => '',
                        'placeholder' => 'फोन',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'mobile_number',
                        'label' => 'मोबैल',
                        'value' => '',
                        'placeholder' => 'मोबैल',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'fax',
                        'label' => 'फ्याक्स',
                        'value' => '',
                        'placeholder' => 'फ्याक्स',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'email',
                        'label' => 'इमेल',
                        'value' => '',
                        'placeholder' => 'इमेल',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'correspondence_address',
                        'label' => 'पत्राचार गर्ने ठेगाना',
                        'value' => '',
                        'placeholder' => 'पत्राचार गर्ने ठेगाना',
                    ],
                ],
                [
                    [
                        'label' => 'सम्पर्क व्यक्ति ',
                    ],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'contact_person_full_name',
                        'label' => 'पुरा नाम ',
                        'value' => '',
                        'placeholder' => 'पुरा नाम',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'full_name',
                        'label' => 'मोबैल',
                        'value' => '',
                        'placeholder' => 'पुरा नाम',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'contact_person_name',
                        'label' => 'नाम',
                        'value' => '',
                        'placeholder' => 'नाम',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'contact_person_post',
                        'label' => 'पद ',
                        'value' => '',
                        'placeholder' => 'पद',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'contact_person_phone_number',
                        'label' => 'फोन',
                        'value' => '',
                        'placeholder' => 'फोन',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'contact_person_mobile_number',
                        'label' => 'मोबैल',
                        'value' => '',
                        'placeholder' => 'मोबैल',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'contact_person_email',
                        'label' => 'इमेल',
                        'value' => '',
                        'placeholder' => 'इमेल',
                    ],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'apology',
                        'label' => 'कैफियत',
                        'value' => '',
                        'placeholder' => 'कैफियत',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'continuous',
                        'label' => 'क्रमागत ',
                        'value' => '',
                        'placeholder' => 'क्रमागत ',
                    ],
                ],
            ],
        ]"></x-form.form>

    </x-card.card>
@endsection
