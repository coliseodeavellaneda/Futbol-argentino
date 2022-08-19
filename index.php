<?php
require_once "config.php";                                    // trae $configuracion

if (key_exists("url", $_GET)) {                               // "argentino/index"
    $url = explode("/", $_GET['url']);                        // [ 0 => "argentino", 1 => "index" ]
    $controllerName = $url[0];                                // "argentino"
    $methodName = $url[1];                                      
    $controller = ucfirst($controllerName) . "Controller";    // "ArgentinoController"
    
    if (file_exists("controller/" . $controller . ".php")) {
        require_once "controller/" . $controller . ".php";    // "controller/ArgentinoController.php"
        $object = new $controller($configuracion);                            // nuevo objeto de clase ArgentinoController
    } else {
        require_once "controller/ErrorController.php";        // "controller/ArgentinoController.php"
        $object = new ErrorController;
        $object->index();
    }

    if (method_exists($object, $methodName)) {
        $object->$methodName();                               // ejecuta index en objeto de clase ArgentinoController
    } else {
        $object->index();
    }

} else {
    require_once "controller/ArgentinoController.php";        // "controller/ArgentinoController.php"
    $object = new ArgentinoController($configuracion);        // nuevo objeto de clase ArgentinoController
    $object->index();                                         // ejecuta index en objeto de clase ArgentinoController
}

?>
