<?php 
$alert = '';
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$Ruc = (isset($_POST['Ruc'])) ? $_POST['Ruc'] : '';
$consulta = "SELECT Descripcion,Ruc FROM empresas
WHERE Ruc = '$Ruc' AND IdEstado=1";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $dat){
        $Emp =  $dat['Descripcion'];
    }
    $alert = 'La Empresa ya esta Registrada'.$Emp;
    header("Location: ../../empresas.php");
}else{
    $Descripcion = (isset($_POST['Descripcion'])) ? $_POST['Descripcion'] : '';
    $Ruc = (isset($_POST['Ruc'])) ? $_POST['Ruc'] : '';
    $Direccion = (isset($_POST['Direccion'])) ? $_POST['Direccion'] : '';
    $Telefono = (isset($_POST['Telefono'])) ? $_POST['Telefono'] : '';
    $Email = (isset($_POST['Email'])) ? $_POST['Email'] : '';
    $consulta2 = "INSERT INTO empresas (Descripcion,Ruc,Direccion,Telefono,
    Email)VALUES('$Descripcion','$Ruc','$Direccion','$Telefono','$Email')";			
    $resultado2 = $conexion->prepare($consulta2);
    $resultado2->execute(); 
    $conexion = NULL;
    header("Location: ../../empresas.php");
    $alert = 'El usuario o la clave son incorrectos';            
}
?>