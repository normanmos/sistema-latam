<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$NroParte = (isset($_POST['NroParte'])) ? $_POST['NroParte'] : '';
$consulta = "SELECT NroParte FROM operaciones
WHERE NroParte = '$NroParte' AND IdEstado=1";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $dat){
        $NroParte =  $dat['NroParte'];
    }
    echo ($NroParte) ;
    header("Location: ../../operaciones_user.php");
}else{
    $IdEmpresa = (isset($_POST['IdEmpresa'])) ? $_POST['IdEmpresa'] : '';
    $cmbobra = (isset($_POST['cmbobra'])) ? $_POST['cmbobra'] : '';
    $cmbequipo = (isset($_POST['cmbequipo'])) ? $_POST['cmbequipo'] : '';
    $IdEmpleado = (isset($_POST['IdEmpleado'])) ? $_POST['IdEmpleado'] : '';
    $Fecha = (isset($_POST['Fecha'])) ? $_POST['Fecha'] : '';
    $NroParte = (isset($_POST['NroParte'])) ? $_POST['NroParte'] : '';
    $Horas = (isset($_POST['Horas'])) ? $_POST['Horas'] : '';
    $Combustible = (isset($_POST['Combustible'])) ? $_POST['Combustible'] : '';
    $Foto = (isset($_FILES['Foto'])) ? $_POST['Foto'] : '';
    move_uploaded_file($_FILES["Foto"]["tmp_name"], "../../fotos_obra/".$_FILES['Foto']['name']);
    $Foto = "fotos_obra/".$_FILES['Foto']['name'];
    $consulta = "INSERT INTO operaciones (IdEmpresa,IdObra,IdEquipo,IdEmpleado,Fecha,NroParte,Horas,Combustible,Foto)
    VALUES('$IdEmpresa','$cmbobra','$cmbequipo','$IdEmpleado','$Fecha','$NroParte','$Horas','$Combustible','$Foto')";			
    $resultado = $conexion->prepare($consulta);
    $resultado->execute(); 
    $conexion = NULL;
    header("Location: ../../operaciones_user.php");
} 
?>