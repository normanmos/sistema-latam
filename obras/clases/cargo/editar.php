<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$IdCargo = (isset($_POST['IdCargo'])) ? $_POST['IdCargo'] : '';
$cmbtipo = (isset($_POST['cmbtipo'])) ? $_POST['cmbtipo'] : '';
$Cargo = (isset($_POST['Cargo'])) ? $_POST['Cargo'] : '';
$Sueldo = (isset($_POST['Sueldo'])) ? $_POST['Sueldo'] : '';
$consulta = "UPDATE cargo SET IdTipo = '$cmbtipo',Descripcion = '$Cargo',Sueldo = '$Sueldo' WHERE IdCargo = '$IdCargo'";
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 
$conexion = NULL;
header("Location: ../../cargos.php");
?>