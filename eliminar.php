<?php

require_once "./includes/dbh.inc.php";
require_once "./includes/funciones.php";

if(isset($_GET["dni"])){
    $dni = $_GET["dni"];
    $eliminarEmpleado = eliminarEmpleado($pdo, $dni);

}