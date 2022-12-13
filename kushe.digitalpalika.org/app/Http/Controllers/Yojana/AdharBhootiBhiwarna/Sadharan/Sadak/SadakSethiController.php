<?php

namespace App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan\Sadak;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\SharedController;
use App\Models\Yojana\AdharBhooti\Sadharan\Sadak\SadakSethi;
use Illuminate\Http\Request;

class SadakSethiController extends SharedController
{
    public $messages;
    public function __construct()
    {
        $this->messages=$this->getMessages();
    }
    public $title="सडक स्थिति";
    public $class_instance = SadakSethi::class;
    public $route_name = "sadak-sethiti";
    public $view_path = "yojana.adharbhooti_bhiwarna.sadharan.sadak.sadak_sethi";
    public $rules = [
        "code"=>"required",
        "full_name"=>"required",
        "name"=>"required",
        "details"=>"required",
        "consecutive"=>"required",
        "situation"=>"required",
        "user_id"=>"required",
    ];
}
