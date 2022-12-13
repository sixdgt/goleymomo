<?php

namespace App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\SharedController;
use App\Models\Yojana\AdharBhooti\Sadharan\PatraPatrikaBhiwaran;
use Illuminate\Http\Request;

class PatraPatrikaBhiwaranController extends SharedController
{
    public $messages;
    public function __construct()
    {
        $this->messages = $this->getMessages();
    }
    public $title = 'पत्र-पत्रिका विवरण';
    public $class_instance = PatraPatrikaBhiwaran::class;
    public $route_name = 'patra-patrika-bhiwaran';
    public $view_path = 'yojana.shared_view';
    public $table_headers = ['त्र .स', 'कोड', 'पत्रिकाको नाम', 'पत्रिकाको ठेगाना', 'छापाखाना गृह', 'सम्पर्क व्यत्ति', 'सम्पर्क नम्बर'];
    public $columns = [ "code","magazine_name","magazine_address","printing_house","contact_person","contact_number",];
    /*
        this can be set by creating createForm function in this controller class
        since the it will be called by the parent functions

    */
    public $form;
    public $rules = [
        "code"=>'required',
        "magazine_name"=>'required',
        "magazine_address"=>'required',
        "printing_house"=>'required',
        "contact_person"=>'required',
        "contact_number"=>'required',
        "user_id"=>'required',
    ];
    /*
        Wondering why not set the variable ?
            #this is because the params might is set in the parent class
            #can reuse  the code to varible  of this class

        wordering how can a parent class can access the child class variable
            #as the class is called by the child class via route and parent class that is Shard
            controller is not required
    */
    public function createForm($data = null,$method='post',$action='store')
    {
        $this->form = [
            'route' => route($this->route_name . '.'.$action,(isset($data->id)?$data->id:null)),
            'method' => $method,
            'fields' => [
                [
                    ['type' => 'text', 'name' => 'code', 'label' => 'कोड', 'value' => (isset($data->code)) ? $data->code : null, 'placeholder' => 'कोड'],
                    ['type' => 'text', 'name' => 'magazine_name', 'label' => 'पत्रिकाको नाम', 'value' => (isset($data->magazine_name)) ? $data->magazine_address : null, 'placeholder' => 'नाम'],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'magazine_address',
                        'label' => 'पत्रिकाको ठेगाना',
                        'value' => (isset($data->magazine_address)) ? $data->magazine_address : null,
                        'placeholder' => 'पुरा नाम',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'magazine_address',
                        'label' => 'पत्रिकाको ठेगाना',
                        'value' => (isset($data->magazine_address)) ? $data->magazine_address : null,
                        'placeholder' => 'पुरा नाम',
                    ],

                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'printing_house',
                        'label' => 'छापाखाना गृह',
                        'value' => (isset($data->printing_house)) ? $data->printing_house : null,
                        'placeholder' => 'छापाखाना गृह',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'contact_person',
                        'label' => 'सम्पर्क व्यत्ति',
                        'value' => (isset($data->contact_person)) ? $data->contact_person : null,
                        'placeholder' => 'सम्पर्क व्यत्ति',
                    ],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'contact_number',
                        'label' => 'सम्पर्क नम्बर',
                        'value' => (isset($data->contact_number)) ? $data->contact_number : null,
                        'placeholder' => 'सम्पर्क नम्बर',
                    ],[]
                ],
            ],
        ];
    }
}
