<?php
include_once 'bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$idemp = $_REQUEST['id'];
$consulta = "SELECT IdTipo,Tipo FROM tipo_cargo
WHERE IdTipo = '$idemp'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
foreach($data as $dato){
    $IdTipo = $dato['IdTipo'];
    $Tipo = $dato['Tipo'];
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
            <h1>Modificar Tipo de Cargo</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="clases/tipos_cargo/editar.php" method="POST">
                <div class="form-group">
                    <span class="label success">Tipo Cargo</span>
                    <input type="hidden" name="IdTipo" id="IdTipo" value="<?php echo $IdTipo?>">
                    <input type="text" class="text_small" name="Tipo" id="Tipo"
                        style='display: inline; width: 205px;' value="<?php echo $Tipo?>" required>
                </div>
                <br>
                <a href="tipos_cargo.php" type="button" class="btn_save_reporte" style='display: inline; width: 250px;'>Cancelar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                <input type="submit" value="Modificar registro" class="btn_save_reporte" style='display: inline; width: 205px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>

</html>