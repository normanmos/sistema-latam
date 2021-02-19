<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$IdEquipo = (isset($_POST['IdEquipo'])) ? $_POST['IdEquipo'] : '';
$consulta = "UPDATE equipos SET IdEstado = 0
WHERE IdEquipo = '$IdEquipo'";			
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 
$conexion = NULL;
header("Location: ../../equipos.php");
?>