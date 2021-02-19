<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$Identificacion = (isset($_POST['Identificacion'])) ? $_POST['Identificacion'] : '';
$consulta = "SELECT Identificacion FROM empleados
WHERE Identificacion = '$Identificacion' AND IdEstado=1";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $dat){
        $Emp =  $dat['Identificacion'];
    }
    $alert = 'El Registro ya Existe'.$Emp;
    header("Location: ../../empleados.php");
}else{
    $cmbempresa = (isset($_POST['cmbempresa'])) ? $_POST['cmbempresa'] : '';
    $Nombres = (isset($_POST['Nombres'])) ? $_POST['Nombres'] : '';
    $Apellidos = (isset($_POST['Apellidos'])) ? $_POST['Apellidos'] : '';
    $Identificacion = (isset($_POST['Identificacion'])) ? $_POST['Identificacion'] : '';
    $Direccion = (isset($_POST['Direccion'])) ? $_POST['Direccion'] : '';
    $Telefono = (isset($_POST['Telefono'])) ? $_POST['Telefono'] : '';
    $Email = (isset($_POST['Email'])) ? $_POST['Email'] : '';
    $cmbcargo = (isset($_POST['cmbcargo'])) ? $_POST['cmbcargo'] : '';
    $consulta = "INSERT INTO empleados (IdEmpresa,Nombres,Apellidos,Identificacion,Direccion,Telefono,
    Email,IdCargo)VALUES('$cmbempresa','$Nombres','$Apellidos','$Identificacion','$Direccion','$Telefono',
    '$Email','$cmbcargo')";			
    $resultado = $conexion->prepare($consulta); 
    $resultado->execute(); 
    $conexion = NULL;
    header("Location: ../../empleados.php");
}
?>