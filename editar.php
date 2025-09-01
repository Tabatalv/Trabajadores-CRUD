<?php


require_once "./includes/dbh.inc.php";
require_once "./includes/funciones.php";




if(isset($_GET["dni"])){
    $dni = $_GET["dni"];
    $empleado = obtenerEmpleado($pdo, $dni);
    $nombre = $empleado->nombre;
    $apellidos = $empleado->apellidos;
    $profesion = $empleado->profesion;

}

//Formulario recibido

if(isset($_POST["submit"])){
    $dniOriginal = $_POST["dniOriginal"];
    $nombreEditar = $_POST["nombreEditar"];
    $apellidosEditar = $_POST["apellidosEditar"];
    $dniEditar = $_POST["dniEditar"];
    $profesionEditar = $_POST["profesionEditar"];

    $editarEmpleado = editarEmpleado($pdo, $dniOriginal, $nombreEditar, $apellidosEditar, $dniEditar, $profesionEditar);
    exit();
}





?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<main>
    <form action="editar.php" method="post" class="d-flex justify-content-center align-items-center">
        <div class="form-group row w-50">
        <div class="col-md-6">
            <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
                <input type="text" name="nombreEditar"  class="form-control" id="staticEmail" value=<?= $nombre ?? "" ?>>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputPassword" class="col-sm-2 col-form-label">Apellidos</label>
            <div class="col-sm-10">
                <input type="text" name="apellidosEditar" class="form-control" id="inputPassword" value=<?= $apellidos ?? "" ?>>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputPassword" class="col-sm-2 col-form-label">Dni</label>
            <div class="col-sm-10">
                <input type="text" name="dniEditar" class="form-control" id="inputPassword" value=<?= $dni ?? "" ?>>
                <input type="hidden" name="dniOriginal" value=<?=$empleado->dni?>>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputPassword" class="col-sm-2 col-form-label">Profesión</label>
            <div class="col-sm-10">
                <input type="text" name="profesionEditar" class="form-control" id="inputPassword" value=<?= $profesion ?? "" ?> >
            </div>
        </div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary mb-2">Confirm identity</input>

    </form>
</main>

</body>
</html>