<?php

class AbstractController
{
    public $service;
    public $model;

    public function setModel($name)
    {
        $fileName = ucfirst($name);
        require_once "model/" . $fileName . ".php";
        $this->model = new $fileName;
    }

    public function setService($name)
    {
        $fileName = ucfirst($name);
        require_once "service/" . $fileName . ".php";
        $this->service = new $fileName;
    }

    public function loadView($name, $parametros)
    {
        require_once "view/" . $name . ".php";
    }
}
?>