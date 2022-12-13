<?php

namespace App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\SharedController;
use App\Models\Yojana\AdharBhooti\Sadharan\ArthikBarsa;
use Illuminate\Http\Request;

class ArthikBharsaController extends SharedController
{
    public $messages;
    public function __construct()
    {
        $this->messages=$this->getMessages();
    }
    public $title="आर्थिक वर्ष";
    public $class_instance = ArthikBarsa::class;
    public $route_name = "arthik-barsa";
    public $view_path = "yojana.adharbhooti_bhiwarna.sadharan.arthik_barsa";
    public $rules = [
        "code"=>'required',
        "date_from_bs"=>'required',
        "date_to_bs"=>'required',
        "date_from_ad"=>'required',
        "date_to_ad"=>'required',
        "consecutive"=>'required',
        "situation"=>'required',
        "user_id"=>'required',
    ];
}
