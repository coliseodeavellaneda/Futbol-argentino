<?php

require_once "controller/AbstractController.php";

class ErrorController extends AbstractController
{
    public function __call($name, $arguments)
    {
        $this->loadView('error', []);
    }
}






?>