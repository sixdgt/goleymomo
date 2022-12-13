<?php

namespace App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\SharedController;
use App\Models\Yojana\AdharBhooti\Sadharan\NirmanSamagriBhiwaran;
use Illuminate\Http\Request;

class NirmanSamagriBhiwaranController extends SharedController
{
    public $messages;
    public function __construct()
    {
        $this->messages = $this->getMessages();
    }
    public $title = 'निर्माण सामग्रीको विवरण';
    public $class_instance = NirmanSamagriBhiwaran::class;
    public $route_name = 'nirman-samagri-bhiwaran';
    public $view_path = 'yojana.shared_view';
    public $table_headers = ['त्र .स', 'कोड', 'पुरा नाम', 'नाम', 'वीवरण', 'स्थिति'];
    public $columns = ['code', 'full_name', 'name', 'details', 'situation'=>['name'=>'situation','whileTrue'=>'सक्रिय','whileFalse'=>'निष्कृय']];
    /*
        this can be set by creating createForm function in this controller class
        since the it will be called by the parent functions

    */
    public $form;
    public $rules = [
        "code"=>"required",
        "full_name"=>"required",
        "name"=>"required",
        "details"=>"required",
        "situation"=>"required",
        "user_id"=>"required",
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
            'fields' =>
            [
                [
                    ['type'=>'text','name'=>'code','label'=>'कोड','value'=>(isset($data->code))?$data->code:null,'placeholder'=>'कोड'],
                    ['type'=>'text','name'=>'name','label'=>'नाम','value'=>(isset($data->name))?$data->name:null,'placeholder'=>'नाम'],
                ],
                [
                    ['type'=>'text','name'=>'full_name','label'=>'पुरा नाम','value'=>(isset($data->details))?$data->details:null,'placeholder'=>'पुरा नाम','checked'=>true],
                    ['type'=>'text','name'=>'details','label'=>'वीवरण','value'=>(isset($data->full_name))?$data->full_name:null,'placeholder'=>'वीवरण','checked'=>true],

                ],
                [
                    ['type'=>'checkbox','name'=>'situation','label'=>'स्थिति','placeholder'=>'स्थिति','checked'=>(isset($data->situation))?$data->situation:null],
                    // ['options'=>['key'=>'a','key1'=>'b','key2'=>'c'],'label'=>'options','value'=>'','name'=>'']
                    ]
            ],
        ];
    }
}
