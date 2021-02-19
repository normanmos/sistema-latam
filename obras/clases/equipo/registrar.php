<?php
include_once '../bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar(); 
$Aleas = (isset($_POST['Aleas'])) ? $_POST['Aleas'] : '';
$consulta = "SELECT Aleas FROM equipos
WHERE Aleas = '$Aleas' AND IdEstado=1";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
if($resultado->rowCount() >= 1){
    $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
    foreach($data as $dat){
        $Emp =  $dat['Aleas'];
    }
    $alert = 'El Registro ya Existe'.$Emp;
    header("Location: ../../equipos.php");
}else{
    $Aleas = (isset($_POST['Aleas'])) ? $_POST['Aleas'] : '';
    $Tipo = (isset($_POST['Tipo'])) ? $_POST['Tipo'] : '';
    $Marca = (isset($_POST['Marca'])) ? $_POST['Marca'] : '';
    $Modelo = (isset($_POST['Modelo'])) ? $_POST['Modelo'] : '';
    $Potencia = (isset($_POST['Potencia'])) ? $_POST['Potencia'] : '';
    $Ano = (isset($_POST['Ano'])) ? $_POST['Ano'] : '';
    $Matricula = (isset($_POST['Matricula'])) ? $_POST['Matricula'] : '';
    $consulta = "INSERT INTO equipos (Aleas,Tipo,Marca,Modelo,Potencia,Ano,Matricula)
    VALUES('$Aleas','$Tipo','$Marca','$Modelo','$Potencia','$Ano','$Matricula')";			
    $resultado = $conexion->prepare($consulta);
    $resultado->execute(); 
    $conexion = NULL;
    header("Location: ../../equipos.php");
}
?>