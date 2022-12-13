<?php

namespace App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\SharedController;
use App\Models\Yojana\AdharBhooti\Sadharan\SahayakModule;
use Illuminate\Http\Request;

class SahayakModuleController extends SharedController
{
    public $messages;
    public function __construct()
    {
        $this->messages = $this->getMessages();
    }
    public $title = 'सहायक मोङ्युल';
    public $class_instance = SahayakModule::class;
    public $route_name = 'sahayak-module';
    public $view_path = 'yojana.shared_view';
    public $table_headers = ['त्र .स', 'कोड', 'पुरा नाम', 'नाम', 'मोङ्युल', 'केफियत', 'स्थिति'];
    public $columns = ['code', 'full_name', 'name', 'module', 'efficiency', 'situation' => ['name' => 'situation', 'whileTrue' => 'सक्रिय', 'whileFalse' => 'निष्कृय']];
    /*
        this can be set by creating createForm function in this controller class
        since the it will be called by the parent functions

    */
    public $form;
    public $rules = [
        "code" => 'required',
        "full_name" => 'required',
        "name" => 'required',
        "module" => 'required',
        "efficiency" => 'required',
        "situation" => 'required',
        "user_id" => 'required',
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
                    ['type' => 'text', 'name' => 'name', 'label' => 'नाम', 'value' => (isset($data->name)) ? $data->name : null, 'placeholder' => 'नाम'],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'full_name',
                        'label' => 'पुरा नाम',
                        'value' => (isset($data->full_name)) ? $data->full_name : null,
                        'placeholder' => 'पुरा नाम',
                    ],
                    [
                        'options' => ['key' => 'a', 'key1' => 'b', 'key2' => 'c'],
                        'label' => 'मोङ्युल',
                        'value' => '',
                        'name' => 'module',
                    ],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'efficiency',
                        'label' => 'केफियत',
                        'value' => (isset($data->efficiency)) ? $data->efficiency : null,
                        'placeholder' => 'केफियत',
                    ],
                    []
                ],
                [
                    ['type' => 'checkbox', 'name' => 'situation', 'label' => 'स्थिति', 'placeholder' => 'स्थिति', 'checked' => (isset($data->situation)) ? $data->situation : null],
                    // ['options'=>['key'=>'a','key1'=>'b','key2'=>'c'],'label'=>'options','value'=>'','name'=>'']
                ],
            ],
        ];
    }
}
