<?php
include_once 'bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$idemp = $_REQUEST['id'];
$consulta = "SELECT IdOperacion,Fecha,NroParte,Horas,Combustible FROM operaciones
WHERE IdOperacion = '$idemp'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
foreach($data as $dato){
    $IdOperacion = $dato['IdOperacion'];
    $Fecha = $dato['Fecha'];
    $NroParte = $dato['NroParte'];
    $Horas = $dato['Horas'];
    $Combustible = $dato['Combustible'];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/scripts_user.php"; ?>
</head>

<body>
    <?php include "includes/header_user.php"; ?>
    <section id="container">
        <div class="form_register_user">
            <h3>Eliminar Registro</h3>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="clases/operaciones_user/eliminar.php" method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                <span class="label success">Fecha del Reporte &nbsp;Numero de
                        Parte</span>
                        <input type="hidden" name="IdOperacion" id="IdOperacion" value="<?php echo $IdOperacion?>">
                        <input type="date" class="fecha_reporte" name="Fecha" id="Fecha" value="<?php echo $fecha_actual ?>"
                        style='display: inline; width: 156px;' required>
                    <input type="text" step="0.01" class="text_small" name="NroParte" id="NroParte"
                        style='display: inline; width: 156px;' value="<?php echo $NroParte ?>" required>
                </div>
                <div class="form-group">
                <span class="label success"> Horas Trabajadas &nbsp;
                        Combustible (Glns)</span>
                    <input type="number" step="0.01" class="text_small" name="Horas" id="Horas"
                        style='display: inline; width: 156px;' value="<?php echo $Horas ?>" required>
                    <input type="number" step="0.01" class="text_small" name="Combustible" id="Combustible"
                        style='display: inline; width: 156px;' value="<?php echo $Combustible ?>" required>
                </div>
                <br>
                <a href="operaciones_user.php" type="button" class="btn_save_reporte"
                    style='display: inline; width: 205px;'>Cancelar &nbsp; &nbsp; 
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                <input type="submit" value="Eliminar registro" class="btn_save_reporte" style='display: inline; width: 159px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>
</html>