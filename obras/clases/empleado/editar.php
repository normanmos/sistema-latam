<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$IdEmpleado = (isset($_POST['IdEmpleado'])) ? $_POST['IdEmpleado'] : '';
$cmbempresa = (isset($_POST['cmbempresa'])) ? $_POST['cmbempresa'] : '';
$Nombres = (isset($_POST['Nombres'])) ? $_POST['Nombres'] : '';
$Apellidos = (isset($_POST['Apellidos'])) ? $_POST['Apellidos'] : '';
$Identificacion = (isset($_POST['Identificacion'])) ? $_POST['Identificacion'] : '';
$Direccion = (isset($_POST['Direccion'])) ? $_POST['Direccion'] : '';
$Telefono = (isset($_POST['Telefono'])) ? $_POST['Telefono'] : '';
$Email = (isset($_POST['Email'])) ? $_POST['Email'] : '';
$cmbcargo = (isset($_POST['cmbcargo'])) ? $_POST['cmbcargo'] : '';
$consulta = "UPDATE empleados SET IdEmpresa = '$cmbempresa',Nombres = '$Nombres',
Apellidos = '$Apellidos',Identificacion = '$Identificacion',Direccion = '$Direccion',
Telefono = '$Telefono',Email = '$Email',IdCargo = '$cmbcargo'
WHERE IdEmpleado = '$IdEmpleado'";			
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 
$conexion = NULL;
header("Location: ../../empleados.php");
?>