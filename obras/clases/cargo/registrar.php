<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$Cargo = (isset($_POST['Cargo'])) ? $_POST['Cargo'] : '';
$consulta = "SELECT Cargo FROM cargo
WHERE Cargo = '$Cargo' AND IdEstado=1";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $dat){
        $Emp =  $dat['Cargo'];
    }
    $alert = 'El Registro ya Existe'.$Emp;
    header("Location: ../../cargos.php");
}else{
    $cmbtipo = (isset($_POST['cmbtipo'])) ? $_POST['cmbtipo'] : '';
    $Cargo = (isset($_POST['Cargo'])) ? $_POST['Cargo'] : '';
    $Sueldo = (isset($_POST['Sueldo'])) ? $_POST['Sueldo'] : '';
    $consulta = "INSERT INTO cargo (IdTipo,Descripcion,Sueldo)VALUES('$cmbtipo','$Cargo','$Sueldo')";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute(); 
    $conexion = NULL;
    header("Location: ../../cargos.php");
}
?>