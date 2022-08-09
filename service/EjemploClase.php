<?php

require_once "../config.php";

class BdatosService     
//VAS A PONER REGLAS PARA CREAR OBJETOS
{
    public $config;
//ATRIBUTO PUBLICO DE LA CLASE/OBJETO

    public function __construct($configu)
//METODO QUE SE EJECUTARA AL CREAR EL OBJETO     
    {
        $this->config = $configu;
//AL CREAR EL OBJETO GUARDA LA INFO EN EL ATRIBUTO DE LA CLASE
    }

    public function insertar()
//METODO PUBLICO QUE SE PUEDE EJECURAR DESDE AFUERA DE LA CLASE   
    {
        var_dump($this->config);
//IMPRIME EL CONTENIDO DE CONFIG
    }
}

$bdService = new BdatosService($configuracion);
//CREAMOS UN OBJETO NUEVO Y LO GUARDAMOS EN LA VARIABLE

$bdService->insertar();

// var_dump($configuracion);

?>





























?>