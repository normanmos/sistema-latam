<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$Usuario = (isset($_POST['Usuario'])) ? $_POST['Usuario'] : '';
$Clave = (isset($_POST['Clave'])) ? $_POST['Clave'] : '';
$consulta = "SELECT Usuario,Clave FROM usuarios
WHERE Usuario = '$Usuario' AND Clave = '$Clave' AND IdEstado=1";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $dat){
        $Emp =  $dat['Usuario'];
    }
    $alert = 'El Registro ya Existe'.$Emp;
    header("Location: ../../usuarios.php");
}else{
    $cmbempleado = (isset($_POST['cmbempleado'])) ? $_POST['cmbempleado'] : '';
    $cmbrol = (isset($_POST['cmbrol'])) ? $_POST['cmbrol'] : '';
    $Usuario = (isset($_POST['Usuario'])) ? $_POST['Usuario'] : '';
    $Clave = (isset($_POST['Clave'])) ? $_POST['Clave'] : '';
    $consulta = "INSERT INTO usuarios (IdEmpleado,IdRol,Usuario,Clave)VALUES('$cmbempleado','$cmbrol',
    '$Usuario','$Clave')";			
    $resultado = $conexion->prepare($consulta);
    $resultado->execute(); 
    $conexion = NULL;
    header("Location: ../../usuarios.php");
}
?>