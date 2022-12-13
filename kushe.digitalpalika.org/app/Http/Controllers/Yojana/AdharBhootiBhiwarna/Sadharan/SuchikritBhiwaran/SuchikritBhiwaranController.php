<?php

namespace App\Http\Controllers\Yojana\AdharBhootiBhiwarna\Sadharan\SuchikritBhiwaran;
use App\Http\Controllers\Shared\SharedController;
use App\Models\Yojana\AdharBhooti\Sadharan\SuchikritBhiwaran\SuchikritBhiwaran;
use Illuminate\Http\Request;

class SuchikritBhiwaranController extends SharedController
{
    public $messages;
    public function __construct()
    {
        $this->messages=$this->getMessages();
    }
    public $title="सुचिकृत विवरण";
    public $class_instance = SuchikritBhiwaran::class;
    public $route_name = "suchikrit-bhiwaran";
    public $view_path = "yojana.adharbhooti_bhiwarna.sadharan.suchikrit_bhiwaran.suchikrit_bhiwaran";
    public $rules = [
        "date"=>"required",
        "type"=>"required",
        "institution"=>"required",
        "user_id"=>"required",
    ];
}
