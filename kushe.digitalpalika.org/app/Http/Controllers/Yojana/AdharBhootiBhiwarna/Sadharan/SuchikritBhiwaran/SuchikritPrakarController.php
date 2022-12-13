<?php

namespace App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan\SuchikritBhiwaran;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\SharedController;
use App\Models\Yojana\AdharBhooti\Sadharan\SuchikritBhiwaran\SuchikritPrakar;
use Illuminate\Http\Request;

class SuchikritPrakarController extends SharedController
{
    public $messages;
    public function __construct()
    {
        $this->messages=$this->getMessages();
    }
    public $title="सुचिकृत प्रकार";
    public $class_instance = SuchikritPrakar::class;
    public $route_name = "suchikrit-prakar";
    public $view_path = "yojana.adharbhooti_bhiwarna.sadharan.suchikrit_bhiwaran.suchikrit_prakar";
    public $rules = [
        "code"=>'required',
        "upper_group"=>'required',
        "full_name"=>'required',
        "name"=>'required',
        "registration_no"=>'required',
        "details"=>'required',
        "situation"=>'required',
    ];
}
