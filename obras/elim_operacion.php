<?php
include_once 'bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$idemp = $_REQUEST['id'];
$consulta = "SELECT IdOperacion,Fecha,Horas,Combustible FROM operaciones
WHERE IdOperacion = '$idemp'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
foreach($data as $dato){
    $IdOperacion = $dato['IdOperacion'];
    $Fecha = $dato['Fecha'];
    $Horas = $dato['Horas'];
    $Combustible = $dato['Combustible'];
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/scripts.php"; ?>
</head>

<body>
    <?php include "includes/header.php"; ?>
    <section id="container">
        <div class="form_register">
            <br>
            <br>
            <h1>Eliminar Operación</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="clases/operaciones/eliminar.php" method="POST" enctype="multipart/form-data">
                
                <div class="form-group">
                    <span class="label success">Fecha del Reporte &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Horas
                        Trabajadas </span>
                        <input type="hidden" name="IdOperacion" id="IdOperacion" value="<?php echo $IdOperacion?>">
                        <input type="date" class="fecha_reporte" name="Fecha" id="Fecha"
                        value="<?php echo $Fecha ?>" style='display: inline; width: 230px;' required>
                        <input type="number" step="0.01" class="text_small" name="Horas" id="Horas"
                            style='display: inline; width: 180px;' value="<?php echo $Horas ?>" required>
                </div>
                <div class="form-group">
                    <span class="label success"> Combustible en Galones &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        Foto</span>
                    <span class="inlineinput">
                        <input type="number" step="0.01" class="text_small" name="Combustible" id="Combustible"
                            style='display: inline; width: 180px;' value="<?php echo $Combustible ?>" required>
                        <input type="file" accept="image/*" class="form-control-file" id="Foto" name="Foto"
                            style='display: inline; width: 230px;'>
                    </span>
                </div>
                <br>
                <a href="operaciones.php" type="button" class="btn_save_reporte"
                    style='display: inline; width: 205px;'>Cancelar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                <input type="submit" value="Eliminar registro" class="btn_save_reporte" style='display: inline; width: 205px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>
</html>