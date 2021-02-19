<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$IdOperacion = (isset($_POST['IdOperacion'])) ? $_POST['IdOperacion'] : '';
$cmbempresa = (isset($_POST['cmbempresa'])) ? $_POST['cmbempresa'] : '';
$cmbobra = (isset($_POST['cmbobra'])) ? $_POST['cmbobra'] : '';
$cmbequipo = (isset($_POST['cmbequipo'])) ? $_POST['cmbequipo'] : '';
$cmbempleado = (isset($_POST['cmbempleado'])) ? $_POST['cmbempleado'] : '';
$Fecha = (isset($_POST['Fecha'])) ? $_POST['Fecha'] : '';
$NroParte = (isset($_POST['NroParte'])) ? $_POST['NroParte'] : '';
$Horas = (isset($_POST['Horas'])) ? $_POST['Horas'] : '';
$Combustible = (isset($_POST['Combustible'])) ? $_POST['Combustible'] : '';
$Foto = (isset($_FILES['Foto'])) ? $_POST['Foto'] : '';
$rutaImg = $_POST['Foto'];
$ruta = "../../".$rutaImg;
unlink($ruta);
move_uploaded_file($_FILES["Foto"]["tmp_name"], "../../fotos_obra/".$_FILES['Foto']['name']);
$Foto = "fotos_obra/".$_FILES['Foto']['name'];
$consulta = "UPDATE operaciones SET IdEmpresa = '$cmbempresa',IdObra = '$cmbobra',IdEquipo = '$cmbequipo',
IdEmpleado = '$cmbempleado',Fecha = '$Fecha',NroParte = '$NroParte',Horas = '$Horas',
Combustible = '$Combustible',Foto = '$Foto' WHERE IdOperacion = '$IdOperacion'";			
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 
$conexion = NULL;
header("Location: ../../operaciones.php");
?>