<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$IdUsuario = (isset($_POST['IdUsuario'])) ? $_POST['IdUsuario'] : '';
$cmbempleado = (isset($_POST['cmbempleado'])) ? $_POST['cmbempleado'] : '';
$cmbrol = (isset($_POST['cmbrol'])) ? $_POST['cmbrol'] : '';
$cmbestado = (isset($_POST['cmbestado'])) ? $_POST['cmbestado'] : '';
$Usuario = (isset($_POST['Usuario'])) ? $_POST['Usuario'] : '';
$Clave = (isset($_POST['Clave'])) ? $_POST['Clave'] : '';
$consulta = "UPDATE usuarios SET IdEmpleado = '$cmbempleado',IdRol = '$cmbrol',
Usuario = '$Usuario',Clave = '$Clave',IdEstado = '$cmbestado' WHERE IdUsuario = '$IdUsuario'";
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 
$conexion = NULL;
header("Location: ../../usuarios.php");
?>