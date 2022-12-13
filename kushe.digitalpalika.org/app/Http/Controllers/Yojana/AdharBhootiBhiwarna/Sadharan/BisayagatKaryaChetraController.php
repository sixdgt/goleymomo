<?php

namespace App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\SharedController;
use App\Models\Yojana\AdharBhooti\Sadharan\BisayagatKaryaChetra;
use Illuminate\Http\Request;

class BisayagatKaryaChetraController extends SharedController
{
    public $messages;
    public function __construct()
    {
        $this->messages=$this->getMessages();
    }
    public $title='विषयगत कार्यक्षेत्र';
    public $class_instance=BisayagatKaryaChetra::class;
    public $route_name='bisayagat-karya-chetras';
    public $view_path='yojana.shared_view';
    public $table_headers=['त्र .स','कोड','माथिलो कार्यक्षेत्र','पुरा नाम','नाम','विवरण','स्थिति'];
    public $columns=['code','upper_workspace','full_name','name','details','situation'=>['name'=>'situation','whileTrue'=>'सक्रिय','whileFalse'=>'निष्कृय']];
    /*
        this can be set by creating createForm function in this controller class
        since the it will be called by the parent functions

    */
    public $form;
    public $rules=[
        'code'=>'required',
        'upper_workspace'=>'required',
        'full_name'=>'required',
        'name'=>'required',
        'details'=>'required',
        'situation'=>'required',
        'user_id'=>'required'
    ];
    /*
        Wondering why not set the variable ?
            #this is because the params might is set in the parent class
            #can reuse  the code to varible  of this class

        wordering how can a parent class can access the child class variable
            #as the class is called by the child class via route and parent class that is Shard
            controller is not required
    */
    public function createForm($data=null){
        $this->form=[
            'route' => route($this->route_name.'.store'),
            'method' => 'Post',
            'fields' => [
                [
                    ['type' => 'text', 'name' => 'code', 'label' => 'कोड', 'value' => (isset($data->code))?$data->code:null, 'placeholder' => 'कोड'],
                    ['type' => 'text', 'name' => 'name', 'label' => 'नाम', 'value' => (isset($data->name))?$data->name:null, 'placeholder' => 'नाम'],
                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'full_name',
                        'label' => 'पुरा नाम',
                        'value' => (isset($data->full_name))?$data->full_name:null,
                        'placeholder' => 'पुरा नाम',
                    ],
                    [
                        'type' => 'text',
                        'name' => 'details',
                        'label' => 'वीवरण',
                        'value' => (isset($data->details))?$data->details:null,
                        'placeholder' => 'वीवरण',
                        'checked' => true,
                    ],

                ],
                [
                    [
                        'type' => 'text',
                        'name' => 'upper_workspace',
                        'label' => 'माथिलो कार्यक्षेत्र',
                        'value' => (isset($data->upper_workspace))?$data->upper_workspace:null,
                        'placeholder' => 'माथिलो कार्यक्षेत्र',
                    ],
                    []
                ],
                [
                    ['type' => 'checkbox', 'name' => 'situation', 'label' => 'स्थिति', 'placeholder' => 'स्थिति','checked'=>(isset($data->situation))?$data->situation:null],
                    // ['options'=>['key'=>'a','key1'=>'b','key2'=>'c'],'label'=>'options','value'=>'','name'=>'']
                ],
            ],
        ];
    }
}
