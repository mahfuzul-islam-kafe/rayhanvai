<?php

namespace App\Services\Api;

class Human
{
    public $name = [];
    public function __construct($name){
        $this->name = $name;
    }
   
}