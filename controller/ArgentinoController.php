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
        $this->config['route'] = 'argentino';
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

    public function create()
    {
        $parametros = [
            "labels" => [
                "club" => "Nombre", 
                "ncopas" => "Copas", 
                "nnacionales" => "Nacionales"
            ]
        ];

        $this->loadView('crear', $parametros);
    }
    
    public function store()
    {
        $values = [];

        $values[0] = $_POST["club"];
        $values[1] = $_POST["ncopas"];
        $values[2] = $_POST["nnacionales"];
        
        $this->service->insertar($values, $this->config);

        $this->index();
    }

    public function edit()
    {
        $idClub = $_GET["id"];
        [$club] = $this->service->traerPorId($idClub, $this->config);

        // var_dump($club);

        $parametros = [
            "id" => $idClub,
            "labels" => [
                "club" => ["Nombre", $club[1]],
                "ncopas" => ["Copas", $club[2]],
                "nnacionales" => ["Nacionales", $club[3]]
            ]
        ];

        $this->loadView('editar', $parametros);
    }

    public function update()
    {
        $values = [];

        $values[0] = $_POST["club"];
        $values[1] = $_POST["ncopas"];
        $values[2] = $_POST["nnacionales"];

        $id = $_POST["id"];

        $this->service->actualizar($values, $id, $this->config);

        $this->index();
    }

    public function destroy()    
    {
        $clubId = $_GET["id"];
        $this->service->eliminar($clubId, $this->config);

        $this->index();
    }
}

?>