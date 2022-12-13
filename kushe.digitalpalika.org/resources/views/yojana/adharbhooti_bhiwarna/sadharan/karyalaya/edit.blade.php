@extends('yojana.index')

@section('yojana-content')
    <x-card.card :headers="['title' => 'अपडेट  कार्यालय']">
        <x-form.form :form="[
            'route' => route('karyalaya.update',$data->id),
            'method' => 'put',
            'fields' => [
                [
                    [
                        'type' => 'text',
                        'name' => 'type',
                        'label' => 'संस्थाको प्रकार',
                        'value' =>  $data->type ,
                        'placeholder' => 'संस्थाको प्रकार',
                    ],
                    ['type' => 'text', 'name' => 'code', 'label' => 'कोड', 'value' => $data->code, 'placeholder' => 'कोड'],
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
                        'value' =>  $data->full_name ,
                        'placeholder' => 'पुरा नाम',
                    ],
                    ['type' => 'text', 'name' => 'name', 'label' => 'नाम', 'value' => $data->name, 'placeholder' => 'नाम'],
                ],
                [

                    [
                        'type' => 'text',
                        'name' => 'registration_no',
                        'label' => 'डार्टा नं ',
                        'value' => $data->registration_no,
                        'placeholder' => 'डार्टा नं',
                    ],
                    [
                        'type' => 'date',
                        'name' => 'date_in_bs',
                        'label' => 'डर्ता मिति (बि.स)',
                        'value' => $data->date_in_bs,
                        'placeholder' => 'डर्ता मिति (बि.स)',
                    ],
                    [
                        'type' => 'date',
                        'name' => 'date_in_ad',
                        'label' => 'डर्ता मिति (ई.सं.)',
                        'value' => $data->date_in_ad,
                        'placeholder' => 'डर्ता मिति (बि.स)',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'karyalaya',
                        'label' => 'कार्यालय',
                        'value' => $data->karyalaya,
                        'placeholder' => 'कार्यालय',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'other_details',
                        'label' => 'अन्य बिवरण',
                        'value' => $data->other_details,
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
                        'value' => $data->savik_zone,
                        'placeholder' => 'अंचल',
                        'checked' => true,
                    ],
                    [
                        'type' => 'text',
                        'name' => 'savik_district',
                        'label' => 'जिल्ला',
                        'value' => $data->savik_district,
                        'placeholder' => 'जिल्ला',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'savik_palika',
                        'label' => ' गा.पा./न.पा. ',
                        'value' => $data->savik_palika,
                        'placeholder' => ' गा.पा./न.पा.',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'savik_ward_no',
                        'label' => ' बढा नम्बर ',
                        'value' => $data->savik_ward_no,
                        'placeholder' => 'बढा नम्बर',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'savik_house_no',
                        'label' => 'घर नम्बर',
                        'value' => $data->savik_house_no,
                        'placeholder' => 'घर नम्बर',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'savik_toll_no',
                        'label' => 'टोल',
                        'value' => $data->savik_toll_no,
                        'placeholder' => 'टोल',
                    ],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'halko_provinces',
                        'label' => 'प्रदेश',
                        'value' => $data->halko_provinces,
                        'placeholder' => 'प्रदेश',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'halko_district',
                        'label' => 'जिल्ला',
                        'value' => $data->halko_district,
                        'placeholder' => 'जिल्ला',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'halko_palika',
                        'label' => ' गा.पा./न.पा. ',
                        'value' => $data->halko_palika,
                        'placeholder' => ' गा.पा./न.पा.',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'halko_ward_no',
                        'label' => ' बढा नम्बर ',
                        'value' => $data->registration_no,
                        'placeholder' => 'बढा नम्बर',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'halko_street_name',
                        'label' => 'सडकको नाम',
                        'value' => $data->halko_street_name,
                        'placeholder' => 'सडकको नाम',
                    ],
                    // ['options'=>['key'=>'a','key1'=>'b','key2'=>'c'],'label'=>'options','value'=>ASDS,'name'=>ASDS]
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
                        'value' => $data->phone_number,
                        'placeholder' => 'फोन',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'mobile_number',
                        'label' => 'मोबैल',
                        'value' => $data->mobile_number,
                        'placeholder' => 'मोबैल',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'fax',
                        'label' => 'फ्याक्स',
                        'value' => $data->fax,
                        'placeholder' => 'फ्याक्स',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'email',
                        'label' => 'इमेल',
                        'value' => $data->email,
                        'placeholder' => 'इमेल',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'correspondence_address',
                        'label' => 'पत्राचार गर्ने ठेगाना',
                        'value' => $data->correspondence_address,
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
                        'value' => $data->contact_person_full_name,
                        'placeholder' => 'पुरा नाम',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'full_name',
                        'label' => 'मोबैल',
                        'value' => $data->full_name,
                        'placeholder' => 'पुरा नाम',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'contact_person_name',
                        'label' => 'नाम',
                        'value' => $data->contact_person_name,
                        'placeholder' => 'नाम',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'contact_person_post',
                        'label' => 'पद ',
                        'value' => $data->contact_person_post,
                        'placeholder' => 'पद',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'contact_person_phone_number',
                        'label' => 'फोन',
                        'value' => $data->contact_person_phone_number,
                        'placeholder' => 'फोन',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'contact_person_mobile_number',
                        'label' => 'मोबैल',
                        'value' => $data->contact_person_mobile_number,
                        'placeholder' => 'मोबैल',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'contact_person_email',
                        'label' => 'इमेल',
                        'value' => $data->contact_person_email,
                        'placeholder' => 'इमेल',
                    ],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'apology',
                        'label' => 'कैफियत',
                        'value' => $data->apology,
                        'placeholder' => 'कैफियत',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'continuous',
                        'label' => 'क्रमागत ',
                        'value' => $data->continuous,
                        'placeholder' => 'क्रमागत ',
                    ],
                ],
            ],
        ]"></x-form.form>

    </x-card.card>
@endsection
