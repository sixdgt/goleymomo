<?php


namespace App\Models\Form\Field;


use App\Models\Form\input;

class Finterger extends input
{
    public function __construct($classes, $name, $placeholder, $validation)
    {
        parent::__construct($classes, $name, $placeholder, $validation);
    }
}