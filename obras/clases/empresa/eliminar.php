<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$IdEmpresa = (isset($_POST['IdEmpresa'])) ? $_POST['IdEmpresa'] : '';
$consulta = "UPDATE empresas SET IdEstado = 0 WHERE IdEmpresa = '$IdEmpresa'";			
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 
$conexion = NULL;
header("Location: ../../empresas.php");
?>