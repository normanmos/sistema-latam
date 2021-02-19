<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$IdObra = (isset($_POST['IdObra'])) ? $_POST['IdObra'] : '';
$consulta = "UPDATE obras SET IdEstado = 0 WHERE IdObra = '$IdObra'";		
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 
$conexion = NULL;
header("Location: ../../obras.php");
?>