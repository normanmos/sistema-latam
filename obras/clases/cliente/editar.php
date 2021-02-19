<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$idCliente = (isset($_POST['idCliente'])) ? $_POST['idCliente'] : '';
$Descripcion = (isset($_POST['Descripcion'])) ? $_POST['Descripcion'] : '';
$Ruc = (isset($_POST['Ruc'])) ? $_POST['Ruc'] : '';
$Direccion = (isset($_POST['Direccion'])) ? $_POST['Direccion'] : '';
$Telefono = (isset($_POST['Telefono'])) ? $_POST['Telefono'] : '';
$Email = (isset($_POST['Email'])) ? $_POST['Email'] : '';
$iiva = (isset($_POST['iiva'])) ? $_POST['iiva'] : '';
$irenta = (isset($_POST['irenta'])) ? $_POST['irenta'] : '';
$consulta = "UPDATE clientes SET Descripcion = '$Descripcion',Ruc = '$Ruc',Direccion = '$Direccion',
Telefono = '$Telefono',Email = '$Email', iiva = '$iiva', irenta = '$irenta'
WHERE idCliente = '$idCliente'";			
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 
$conexion = NULL;
header("Location: ../../clientes.php");
?>