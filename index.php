<?php
require_once "./includes/dbh.inc.php";
require_once "./includes/funciones.php";

$empleados = obtenerEmpleados($pdo);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">

    <title>Lista de empleados</title>
</head>
<body style="background-color: #84b0f3">
<header style="background-color: #1c4e9b" class="py-2">
    <h1 class="text-center">Empleados</h1>
</header>



<div class="container-fluid d-flex flex-column justify-content-center align-items-center pt-5 px-0">
<Table   class="table table-bordered text-center  " style="background-color: #84b0f3; border: white !important;">
    <tr class="border border-dark">
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>Dni</th>
        <th>Profesión</th>
        <th>Acciones</th>
    </tr>
<?php



            foreach ($empleados as $empleado) : ?>
<tr class="border border-dark">
    <td class="border border-dark"><?= htmlspecialchars($empleado->nombre)?></td>
    <td class="border border-dark"> <?= htmlspecialchars($empleado->apellidos) ?></td>
    <td class="border border-dark"> <?= htmlspecialchars($empleado->dni) ?></td>
    <td class="border border-dark"><?= htmlspecialchars($empleado->profesion) ?></td>
    <td>
        <ul class="list-group list-group-horizontal d-flex justify-content-center">
            <a href="ficha.php?dni=<?=$empleado->dni?>"><li class="list-group-item border-0"><i class="fa-solid fa-id-card-clip" style="color: #63E6BE;"></i></li></a>
            <a href="editar.php?dni=<?=$empleado->dni ?>"><li class="list-group-item border-0"><i class="fas fa-edit" style="color: #74C0FC;"></i></li></a>
            <a href="eliminar.php?dni=<?= $empleado->dni?>" onclick="confirmarEliminacion(event, 'eliminar.php?dni=<?= $empleado->dni ?>')"><li class="list-group-item border-0"><i class="fa-solid fa-square-xmark" style="color: #f50018;"></i></li></a>

        </ul>
        </td>
</tr>

<?php endforeach; ?>

</Table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function confirmarEliminacion(e, url) {
        e.preventDefault();
        Swal.fire({

            title: '¿Estás seguro?',
            text: "No podrás revertir esto",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location = url;
            }
        })
    }
</script>

</body>
</html>