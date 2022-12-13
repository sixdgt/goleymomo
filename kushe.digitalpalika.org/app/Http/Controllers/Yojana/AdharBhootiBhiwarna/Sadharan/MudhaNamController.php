<?php

namespace App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\SharedController;
use App\Models\Yojana\AdharBhooti\Sadharan\MudhaNam;
use Illuminate\Http\Request;

class MudhaNamController extends SharedController
{
    public $messages;
    public function __construct()
    {
        $this->messages=$this->getMessages();
    }
    public $title="मुद्राको नाम";
    public $class_instance = MudhaNam::class;
    public $route_name = "mudha-nam";
    public $view_path = "yojana.adharbhooti_bhiwarna.sadharan.mudha_nam";
    public $rules = [
        "code"=>'required',
        "full_name"=>'required',
        "name"=>'required',
        "symbol"=>'required',
        "details"=>'required',
        "situation"=>'required',
        "user_id"=>'required',
    ];
}
