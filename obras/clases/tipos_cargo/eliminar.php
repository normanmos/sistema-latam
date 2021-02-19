<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$IdTipo = (isset($_POST['IdTipo'])) ? $_POST['IdTipo'] : '';
$consulta = "UPDATE tipo_cargo SET IdEstado = 0 WHERE IdTipo = '$IdTipo'";			
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 
$conexion = NULL;
header("Location: ../../tipos_cargo.php");
?>