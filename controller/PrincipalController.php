<?php

require_once "controller/AbstractController.php";

class PrincipalController extends AbstractController
{
    public $config;

    public function __construct($config)
    {
        $this->config = $config;
    }

    public function __call($name, $arguments)
    {
        $this->loadview('principal', []);
    }
}






?>