<?php 
include_once 'bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$id=$_POST['id'];
$consulta = "SELECT C.IdCargo,T.Tipo,C.Descripcion
FROM cargo C INNER JOIN tipo_cargo T ON (C.IdTipo=T.IdTipo)
WHERE C.IdTipo = '$id' AND C.IdEstado = 1";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
	$cadena="<span class='label success'>Seleccione el cargo</span>
			<select class='con_estilos' id='idcmbcargo' name='cmbcargo' required>";
			foreach($data as $dato) {
		$cadena=$cadena.'<option value='.$dato['IdCargo'].'>'.$dato["Descripcion"].'</option>';
	}
	echo  $cadena."</select>";
?>