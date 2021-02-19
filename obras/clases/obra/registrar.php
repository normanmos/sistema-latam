<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$Obra = (isset($_POST['Obra'])) ? $_POST['Obra'] : '';
$Ubicacion = (isset($_POST['Ubicacion'])) ? $_POST['Ubicacion'] : '';
$consulta = "SELECT Obra,Ubicacion FROM obras
WHERE Obra = '$Obra' AND Ubicacion = '$Ubicacion' AND IdEstado=1";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $dat){
        $Emp =  $dat['Obra'];
    }
    $alert = 'El Registro ya Existe'.$Emp;
    header("Location: ../../obras.php");
}else{
    $cmbempresa = (isset($_POST['cmbempresa'])) ? $_POST['cmbempresa'] : '';
    $Obra = (isset($_POST['Obra'])) ? $_POST['Obra'] : '';
    $Ubicacion = (isset($_POST['Ubicacion'])) ? $_POST['Ubicacion'] : '';
    $FechaInicio = (isset($_POST['FechaInicio'])) ? $_POST['FechaInicio'] : '';
    $consulta = "INSERT INTO obras (IdEmpresa,Obra,Ubicacion,FechaInicio)VALUES('$cmbempresa','$Obra','$Ubicacion','$FechaInicio')";			
    $resultado = $conexion->prepare($consulta);
    $resultado->execute(); 
    $conexion = NULL;
    header("Location: ../../obras.php");
}
?>