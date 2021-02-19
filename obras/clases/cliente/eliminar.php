<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$idCliente = (isset($_POST['idCliente'])) ? $_POST['idCliente'] : '';
$consulta = "UPDATE clientes SET IdEstado = 0 WHERE idCliente = '$idCliente'";			
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 
$conexion = NULL;
header("Location: ../../clientes.php");
?>