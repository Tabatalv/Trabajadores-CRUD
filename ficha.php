<?php

require_once "./includes/dbh.inc.php";
require_once "./includes/funciones.php";

if(isset($_GET['dni'])){
    $dni = $_GET['dni'];
    $empleado = obtenerEmpleado($pdo, $dni);
    $nombre = $empleado->nombre;
    $apellidos = $empleado->apellidos;
    $genero = $empleado->genero;
    $profesion = $empleado->profesion;


    if ($genero == "H") {
        $img = "./Img/ficha-hombre.jpg";
    }
    else {
        $img = "./Img/ficha-mujer.jpg";
    }

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
    <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src=<?= $img ?> class="img-fluid rounded-start" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h3 class="card-title"><?=$nombre." ". $apellidos ?></h3>
                    <h4 class="card-text"><?=$dni?></h4>
                    <h4 class="card-text"><?=$profesion?></h4>
                </div>
            </div>
        </div>
    </div>
</main>
</body>
</html>
