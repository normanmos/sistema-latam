<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$IdObra = (isset($_POST['IdObra'])) ? $_POST['IdObra'] : '';
$cmbempresa = (isset($_POST['cmbempresa'])) ? $_POST['cmbempresa'] : '';
$Obra = (isset($_POST['Obra'])) ? $_POST['Obra'] : '';
$Ubicacion = (isset($_POST['Ubicacion'])) ? $_POST['Ubicacion'] : '';
$FechaInicio = (isset($_POST['FechaInicio'])) ? $_POST['FechaInicio'] : '';
$cmbestado = (isset($_POST['cmbestado'])) ? $_POST['cmbestado'] : '';
$consulta = "UPDATE obras SET IdEmpresa = '$cmbempresa',Obra = '$Obra',Ubicacion = '$Ubicacion',
FechaInicio = '$FechaInicio',IdEstadoObra = '$cmbestado' WHERE IdObra = '$IdObra'";		
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 
$conexion = NULL;
header("Location: ../../obras.php");
?>