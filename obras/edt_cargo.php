<?php
include_once 'bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$idemp = $_REQUEST['id'];
$consulta = "SELECT IdCargo,Descripcion AS 'Cargo',Sueldo FROM cargo
WHERE IdCargo = '$idemp'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
foreach($data as $dato){
    $IdCargo = $dato['IdCargo'];
    $Cargo = $dato['Cargo'];
    $Sueldo = $dato['Sueldo'];
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
            <h1>Modificar Cargo</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="clases/cargo/editar.php" method="POST">
                <div class="form-group">
                    <span class="label success">Seleccione el tipo de cargo</span>
                    <select class="con_estilos" id="idcmbtipo" name="cmbtipo" required>
                        <?php
                    $consulta = "SELECT IdTipo,Tipo FROM tipo_cargo";
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute();
                    $empresas=$resultado->fetchAll(PDO::FETCH_ASSOC);
                    foreach($empresas as $empre){
                        echo '<option value="'.$empre['IdTipo'].'">'.$empre['Tipo'].'</option>';
                    }
                   ?>
                    </select>
                </div>
                <div class="form-group">
                    <span class="label success">Cargo &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sueldo</span>
                    <input type="hidden" name="IdCargo" id="IdCargo" value="<?php echo $IdCargo?>">
                    <input type="text" class="text_small" name="Cargo" id="Cargo"
                        style='display: inline; width: 205px;' value="<?php echo $Cargo?>" required>
                    <input type="text" class="text_small" name="Sueldo" id="Sueldo"
                        style='display: inline; width: 205px;' value="<?php echo $Sueldo?>" required>
                </div>
                <br>
                <a href="cargos.php" type="button" class="btn_save_reporte" style='display: inline; width: 250px;'>Cancelar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                <input type="submit" value="Modificar registro" class="btn_save_reporte" style='display: inline; width: 205px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>

</html>