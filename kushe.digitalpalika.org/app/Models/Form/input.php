<?php


namespace App\Models\Form;


abstract class input
{
    private $classes;
    private $name;
    private $placeholder;
    private $validation;
     public function __construct($classes,$name,$placeholder,$validation)
     {
         $this->classes=$classes;
         $this->name=$name;
         $this->placeholder=$placeholder;
         $this->validation=$validation;
     }
}