<?php

namespace AppBundle\Model;

class HelloWorld
{
    /**
     * @var string
     */
    public $salutacio;


    public function __construct($saluda = 'Hola ')
    {
        $this->salutacio = $saluda;
    }
}