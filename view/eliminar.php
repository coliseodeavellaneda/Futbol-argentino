<?php

require_once "../service/BdatosService.php";

$clubId = $_GET["id"];

$result = $bdService->eliminar($clubId);

header("Location: http://localhost/Mato/03crud/view/argentino.php");
exit;

?>