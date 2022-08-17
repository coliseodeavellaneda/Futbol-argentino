<?php

require_once "controller/AbstractController.php";

class ArgentinoController extends AbstractController
{
    public $config;

    public function __construct($config)
    {
        $this->setModel('argentino');
        $this->setService('bdatosService');
        $this->config = $config;
        $this->config['tabla'] = $this->model->modeloTabla;
    }

    public function index()
    {
        $parametros = [
            'titulo' => 'Datos de tabla ' . ucfirst($this->model->modeloTabla),
            'columnas' => $this->model->modeloColumnas
        ];

        $parametros['contenido'] = $this->service->traerTodo($this->config);
        
        $this->loadView('tabla', $parametros);
    }
}

?>