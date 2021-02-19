<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$IdUsuario = (isset($_POST['IdUsuario'])) ? $_POST['IdUsuario'] : '';
$consulta = "UPDATE usuarios SET Elim = 0 WHERE IdUsuario = '$IdUsuario'";
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 
$conexion = NULL;
header("Location: ../../usuarios.php");
?>