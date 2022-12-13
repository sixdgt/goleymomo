<?php

namespace App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan\Sadak;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\SharedController;
use App\Models\Yojana\AdharBhooti\Sadharan\Sadak\DhalNikasKissim;
use Illuminate\Http\Request;

class DhalNikasKissimController extends SharedController
{
    public $messages;
    public function __construct()
    {
        $this->messages=$this->getMessages();
    }
    public $title="ढल निकासको किसिम";
    public $class_instance = DhalNikasKissim::class;
    public $route_name = "dhal-nikas-kissim";
    public $view_path = "yojana.adharbhooti_bhiwarna.sadharan.sadak.dhal_nikas_kissim";
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
