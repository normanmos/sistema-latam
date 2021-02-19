<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$IdEmpresa = (isset($_POST['IdEmpresa'])) ? $_POST['IdEmpresa'] : '';
$Descripcion = (isset($_POST['Descripcion'])) ? $_POST['Descripcion'] : '';
$Ruc = (isset($_POST['Ruc'])) ? $_POST['Ruc'] : '';
$Direccion = (isset($_POST['Direccion'])) ? $_POST['Direccion'] : '';
$Telefono = (isset($_POST['Telefono'])) ? $_POST['Telefono'] : '';
$Email = (isset($_POST['Email'])) ? $_POST['Email'] : '';
$consulta = "UPDATE empresas SET Descripcion = '$Descripcion',Ruc = '$Ruc',Direccion = '$Direccion',
Telefono = '$Telefono',Email = '$Email'
WHERE IdEmpresa = '$IdEmpresa'";			
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 
$conexion = NULL;
header("Location: ../../empresas.php");
?>