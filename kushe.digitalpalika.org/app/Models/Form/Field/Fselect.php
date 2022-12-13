<?php


namespace App\Models\Form\Field;


use App\Models\Form\input;
use Hamcrest\Thingy;

class Fselect extends input
{
    private $option_type;
    private $options;
     public function __construct($classes, $name, $placeholder, $validation,$option_type,$options)
     {
         parent::__construct($classes, $name, $placeholder, $validation);
         $this->option_type=$option_type;
         $this->options=$options;
     }
}