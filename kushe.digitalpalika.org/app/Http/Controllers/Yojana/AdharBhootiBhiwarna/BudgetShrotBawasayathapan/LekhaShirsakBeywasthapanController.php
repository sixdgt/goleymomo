<?php

namespace App\Http\Controllers\Yojana\AdharBhootiBhiwarna\BudgetShrotBawasayathapan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\SharedController;
use App\Models\Yojana\AdharBhooti\BudgetShrotBawasayathapan\LekhaShirsakBeywasthapan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LekhaShirsakBeywasthapanController extends SharedController
{
    public $messages;
    public function __construct()
    {
        $this->messages = $this->getMessages();
    }
    public $title = 'लेखा शीर्षक व्यवस्थापन';
    public $class_instance = LekhaShirsakBeywasthapan::class;
    public $route_name = 'lekha-shirsak-beywasthanpan';
    public $view_path = 'yojana.shared_view';
    public $table_headers = ['त्र .स', 'कोड', 'पुरा नाम', 'नाम', 'मोड्युल', 'स्थिति'];
    public $columns = ['code', 'full_name', 'name', 'module', 'situation'=>['name'=>'situation','whileTrue'=>'सक्रिय','whileFalse'=>'निष्कृय']];
    /*
        this can be set by creating createForm function in this controller class
        since the it will be called by the parent functions

    */
    public $form;
    public $rules = [
        "code"=>"required",
        "alternate_code"=>"required",
        "full_name"=>"required",
        "name"=>"required",
        "module"=>"required",
        "alternate_code"=>"required",
        "show_name"=>"required",
        "sub_module"=>"required",
        "display_name"=>"required",
        "top_account"=>"required",
        "fiscal_year"=>"required",
        "budget"=>"required",
        "sapati"=>"required",
        "transfer_account"=>"required",
        "fund_account"=>"required",
        "current_capital"=>"required",
        "current_ratio"=>"required|min:0|max:100",
        "capital_ratio"=>"required|min:0|max:100",
        "situation"=>"required",
        "details"=>"required",
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
                    ['type'=>'text','name'=>'alternate_code','label'=>'बैंकल्पिक कोड','value'=>(isset($data->alternate_code))?$data->alternate_code:null,'placeholder'=>'बैंकल्पिक कोड'],
                ],
                [
                    ['type'=>'text','name'=>'full_name','label'=>'पुरा नाम','value'=>(isset($data->full_name))?$data->full_name:null,'placeholder'=>'पुरा नाम',],
                    ['type'=>'text','name'=>'show_name','label'=>'देखाउने नाम','value'=>(isset($data->show_name))?$data->show_name:null,'placeholder'=>'देखाउने नाम',],
                ],[
                    ['type'=>'text','name'=>'name','label'=>'नाम','value'=>(isset($data->name))?$data->name:null,'placeholder'=>'नाम'],
                    ['type'=>'text','name'=>'display_name','label'=>'नाम देखाउने','value'=>(isset($data->display_name))?$data->display_name:null,'placeholder'=>'नाम देखाउने'],
                ],
                [
                    ['options'=>[1,2,3,4],'label'=>'मोड्युल','value'=>(isset($data->module))?$data->module:null,'name'=>'module'],
                    ['options'=>[1,2,3,4],'label'=>'उप-मोड्युल','value'=>(isset($data->sub_module))?$data->sub_module:null,'name'=>'sub_module'],

                ],
                [
                    ['options'=>[1,2,3,4,5],'label'=>'माथिलो खाता','value'=>(isset($data->top_account))?$data->top_account:null,'name'=>'top_account'],
                    ['options'=>[1,2,3,4,5],'label'=>'आर्थिक वर्ष ','value'=>(isset($data->sub_module))?$data->module:null,'name'=>'fiscal_year'],
                ],
                [
                    ['type'=>'checkbox','name'=>'budget','label'=>'बजेट','placeholder'=>'बजेट','checked'=>(isset($data->budget))?$data->budget:null],
                    ['type'=>'checkbox','name'=>'sapati','label'=>'सापटी','placeholder'=>'सापटी','checked'=>(isset($data->sapati))?$data->sapati:null],
                    ['type'=>'checkbox','name'=>'transfer_account','label'=>'ट्रांस्फेर  खाता','placeholder'=>'ट्रांस्फेर  खाता ','checked'=>(isset($data->transfer_account))?$data->transfer_account:null],
                    ['type'=>'checkbox','name'=>'fund_account','label'=>'कोष खाता','placeholder'=>'कोष खाता','checked'=>(isset($data->fund_account))?$data->transfer_account:null],
                ],
                [
                    ['options'=>[1,2,3,4,5],'label'=>'चालू पूँजीगत ','value'=>(isset($data->current_capital))?$data->current_capital:null,'name'=>'current_capital'],
                    ['type'=>'number','name'=>'current_ratio','label'=>'चालू अनूपात(%)','value'=>(isset($data->current_ratio))?$data->current_ratio:null,'placeholder'=>'चालू अनूपात(%)',],
                    ['type'=>'number','name'=>'capital_ratio','label'=>'पूँजीगत अनूपात(%)','value'=>(isset($data->capital_ratio))?$data->capital_ratio:null,'placeholder'=>'पूँजीगत अनूपात(%)',],
                ],
                [
                    ['type'=>'text','name'=>'details','label'=>'वीवरण','value'=>(isset($data->full_name))?$data->full_name:null,'placeholder'=>'वीवरण','checked'=>true],
                    []
                ],

                [
                    ['type'=>'checkbox','name'=>'situation','label'=>'स्थिति','placeholder'=>'स्थिति','checked'=>(isset($data->situation))?$data->situation:null],
                    []
                    // ['options'=>['key'=>'a','key1'=>'b','key2'=>'c'],'label'=>'options','value'=>'','name'=>'']
                ]
            ],
        ];
    }



}
