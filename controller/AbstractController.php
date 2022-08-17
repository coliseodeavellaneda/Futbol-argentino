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

// $objetoController = new AbstractController;

// $objetoController->setModel("argentino");
// $objetoController->setService("BdatosService");
// $objetoController->setModel("europeo");
// $objetoController->loadView("tabla", [
//     "titulo" => "esto es el titulo",
//     "columnas" => ["col1", "col2", "col3"],
//     "contenido" => [
//         "cont1" => ["el0", "el1", "el2", "el3"], 
//         "cont2" => ["el0", "el1", "el2", "el3"], 
//         "cont3" => ["el0", "el1", "el2", "el3"]
//     ]
// ]);
// $objetoController->loadView("crear", []);

?>