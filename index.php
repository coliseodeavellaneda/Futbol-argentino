<?php
require_once "config.php";

// include("view/arribaplantilla.php");

// var_dump($_GET);
// echo $_GET['url'];
if ($_GET['url'] == 'argentino') {
    require_once "view/argentino.php";
    // header("Location: " . $configuracion['baseUrl'] ."view/argentino.php");
} else {
    require_once "view/argentino.php";
    // header("Location: " . $configuracion['baseUrl'] ."view/argentino.php");
}

// include("view/abajoplantilla.php");
?>
