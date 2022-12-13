<?php

namespace App\Http\Controllers\Yojana\AdharBhootiBhiwarna\BudgetShrotBawasayathapan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\SharedController;
use App\Models\Yojana\AdharBhooti\BudgetShrotBawasayathapan\BudgetShrot;
use Illuminate\Http\Request;

class BudgetShrotController extends SharedController
{
    public $messages;
    public function __construct()
    {
        $this->messages = $this->getMessages();
    }
    public $title = 'बजेट स्रोत';
    public $class_instance = BudgetShrot::class;
    public $route_name = 'budget-shrot';
    public $view_path = 'yojana.shared_view';
    public $table_headers = ['त्र .स','कोड','माथिल्लो स्रोत', 'पुरा नाम', 'नाम','फोन', 'ई-मेल','देश','ठेगाना','वीवरण', 'स्थिति'];
    public $columns = ['code', 'top_source','full_name', 'name', 'phone_number','details','email','country','address','situation'=>['name'=>'situation','whileTrue'=>'सक्रिय','whileFalse'=>'निष्कृय']];
    /*
        this can be set by creating createForm function in this controller class
        since the it will be called by the parent functions

    */
    public $form;
    public $rules = [
        "code"=>"required",
        "top_source"=>"required",
        "full_name"=>"required",
        "name"=>"required",
        "phone_number"=>"required",
        "email"=>"required",
        "country"=>"required",
        "address"=>"required",
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
                    ['type'=>'text','name'=>'top_source','label'=>'माथिल्लो स्रोत','value'=>(isset($data->top_source))?$data->top_source:null,'placeholder'=>'माथिल्लो स्रोत'],
                ],
                [
                    ['type'=>'text','name'=>'full_name','label'=>'पुरा नाम','value'=>(isset($data->details))?$data->details:null,'placeholder'=>'पुरा नाम',],
                    ['type'=>'text','name'=>'name','label'=>'नाम','value'=>(isset($data->name))?$data->name:null,'placeholder'=>'नाम'],
                ],
                [
                    ['type'=>'text','name'=>'phone_number','label'=>'फोन','value'=>(isset($data->phone_number))?$data->phone_number:null,'placeholder'=>'फोन',],
                    ['type'=>'text','name'=>'email','label'=>'ई-मेल','value'=>(isset($data->email))?$data->email:null,'placeholder'=>'ई-मेल',],
                ],
                [
                    ['options'=>['key'=>'a','key1'=>'b','key2'=>'c'],'label'=>'देश','value'=>(isset($data->country))?$data->country:null,'name'=>'country'],
                    ['type'=>'text','name'=>'address','label'=>'ठेगाना','value'=>(isset($data->address))?$data->address:null,'placeholder'=>'ठेगाना',],
                ],
                [
                    ['type'=>'text','name'=>'details','label'=>'वीवरण','value'=>(isset($data->full_name))?$data->full_name:null,'placeholder'=>'वीवरण',],
                    []
                ],
                [
                    ['type'=>'checkbox','name'=>'situation','label'=>'स्थिति','placeholder'=>'स्थिति','checked'=>(isset($data->situation))?$data->situation:null],
                    // ['options'=>['key'=>'a','key1'=>'b','key2'=>'c'],'label'=>'options','value'=>'','name'=>'']
                ]
            ],
        ];
    }
}
