<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$IdCargo = (isset($_POST['IdCargo'])) ? $_POST['IdCargo'] : '';
$consulta = "UPDATE cargo SET IdEstado = 0 WHERE IdCargo = '$IdCargo'";
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 
$conexion = NULL;
header("Location: ../../cargos.php");
?>