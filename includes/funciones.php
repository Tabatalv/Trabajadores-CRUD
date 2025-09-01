<?php

function obtenerEmpleados($pdo){
    $query = "SELECT * FROM empleados";
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $empleados = $stmt->fetchAll(PDO::FETCH_OBJ);
    return $empleados;
}

function obtenerEmpleado($pdo, $dni)
{
    $query = "SELECT * FROM empleados WHERE dni = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$dni]);
    $empleado = $stmt->fetch(PDO::FETCH_OBJ);
    return $empleado;

}

function editarEmpleado($pdo, $dniOriginal, $nombreEditar, $apellidosEditar, $dniEditar, $profesionEditar)
{
    $empleado = obtenerEmpleado($pdo, $dniOriginal);


    if($nombreEditar != $empleado->nombre){
        $query = "UPDATE empleados SET nombre = ? WHERE dni = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$nombreEditar, $dniOriginal]);
    }
    if($apellidosEditar != $empleado->apellidos){
        $query = "UPDATE empleados SET apellidos = ? WHERE dni = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$apellidosEditar, $dniOriginal]);

    }
    if($dni != $empleado->dni){
        $query = "UPDATE empleados SET dni = ? WHERE dni = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$dniEditar, $dniOriginal]);
    }
    if($profesionEditar != $empleado->profesion){
        $query = "UPDATE empleados SET profesion = ? WHERE dni = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$profesionEditar, $dniOriginal]);
    }
    header("location: index.php");


}

function eliminarEmpleado($pdo, $dni)
{
    $query = "DELETE FROM empleados WHERE dni = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$dni]);
    header("location: index.php");
}