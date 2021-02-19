<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$IdEquipo = (isset($_POST['IdEquipo'])) ? $_POST['IdEquipo'] : '';
$Aleas = (isset($_POST['Aleas'])) ? $_POST['Aleas'] : '';
$Tipo = (isset($_POST['Tipo'])) ? $_POST['Tipo'] : '';
$Marca = (isset($_POST['Marca'])) ? $_POST['Marca'] : '';
$Modelo = (isset($_POST['Modelo'])) ? $_POST['Modelo'] : '';
$Potencia = (isset($_POST['Potencia'])) ? $_POST['Potencia'] : '';
$Ano = (isset($_POST['Ano'])) ? $_POST['Ano'] : '';
$Matricula = (isset($_POST['Matricula'])) ? $_POST['Matricula'] : '';
$consulta = "UPDATE equipos SET Aleas = '$Aleas',Tipo = '$Tipo',Marca = '$Marca',Modelo = '$Modelo',
Potencia = '$Potencia',Ano = '$Ano',Matricula = '$Matricula'
WHERE IdEquipo = '$IdEquipo'";			
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 
$conexion = NULL;
header("Location: ../../equipos.php");
?>