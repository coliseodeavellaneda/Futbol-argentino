<?php


require_once "../service/BdatosService.php";

$club = $_POST;

$values = [
    $club["club"], 
    $club["ncopas"], 
    $club["nnacionales"]
];

$id = $club["id"];

$return = $bdService->actualizar($values, $id);


header("Location: http://localhost/Mato/03crud/view/argentino.php");
exit;




?>
