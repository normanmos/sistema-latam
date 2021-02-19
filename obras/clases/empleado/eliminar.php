<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$IdEmpleado = (isset($_POST['IdEmpleado'])) ? $_POST['IdEmpleado'] : '';
$consulta = "UPDATE empleados SET IdEstado = 0
WHERE IdEmpleado = '$IdEmpleado'";			
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 
$conexion = NULL;
header("Location: ../../empleados.php");
?>