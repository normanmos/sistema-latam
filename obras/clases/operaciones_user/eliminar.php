<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$IdOperacion = (isset($_POST['IdOperacion'])) ? $_POST['IdOperacion'] : '';
$Foto = (isset($_FILES['Foto'])) ? $_POST['Foto'] : '';
$rutaImg = $_POST['Foto'];
$ruta = "../../".$rutaImg;
unlink($ruta);
move_uploaded_file($_FILES["Foto"]["tmp_name"], "../../fotos_obra/".$_FILES['Foto']['name']);
$Foto = "fotos_obra/".$_FILES['Foto']['name'];
$consulta = "UPDATE operaciones SET IdEstado = 0 WHERE IdOperacion = '$IdOperacion'";			
$resultado = $conexion->prepare($consulta);
$resultado->execute(); 
$conexion = NULL;
header("Location: ../../operaciones_user.php");
?>