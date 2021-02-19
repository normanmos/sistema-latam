<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$Tipo = (isset($_POST['Tipo'])) ? $_POST['Tipo'] : '';
$consulta = "SELECT Tipo FROM tipo_cargo
WHERE Tipo = '$Tipo' AND IdEstado=1";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $dat){
        $Emp =  $dat['Tipo'];
    }
    $alert = 'El Registro ya Existe'.$Emp;
    header("Location: ../../tipos_cargo.php");
}else{
    $Tipo = (isset($_POST['Tipo'])) ? $_POST['Tipo'] : '';
    $consulta = "INSERT INTO tipo_cargo (Tipo)VALUES('$Tipo')";
    $resultado = $conexion->prepare($consulta);
    $resultado->execute(); 
    $conexion = NULL;
    header("Location: ../../tipos_cargo.php");
}
?>