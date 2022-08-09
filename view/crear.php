<?php

require_once "../service/BdatosService.php";

$club = $_POST;

$return = $bdService->insertar([$club["club"], $club["ncopas"], $club["nnacionales"]]);

header("Location: http://localhost/Mato/03crud/view/argentino.php");
exit;

?>
