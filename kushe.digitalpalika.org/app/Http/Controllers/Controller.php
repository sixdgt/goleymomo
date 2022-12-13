<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $msg = [
        "required" => "यो क्षेत्र आवश्यक छ।",
        "boolean" => "यो चिन्ह आवश्यक छ।।",
        "min"=>"यो क्षेत्र नकारात्मक मान हुनु हुँदैन।",
        "max"=>"यो क्षेत्र 100 भन्दा बढी मान हुनु हुँदैन।",
    ];
    public function getMessages(){
        return $this->msg;
    }
}
