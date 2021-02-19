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
            <h3>Modificar Operaciones</h3>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="clases/operaciones_user/editar.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <span class="label success">Seleccione la Obra</span>
                    <select class="con_estilos_user" id="idcmbobra" name="cmbobra" required>
                        <?php
                        $consulta = "SELECT IdObra,Obra FROM obras WHERE IdEstado = 1 AND IdEmpresa = '$IdEmpresa'";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $obra=$resultado->fetchAll(PDO::FETCH_ASSOC);
                        foreach($obra as $obr){
                            echo '<option value="'.$obr['IdObra'].'">'.$obr['Obra'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <span class="label success">Seleccione el Equipo/Maquinaria</span>
                    <select class="con_estilos_user" id="idcmbequipo" name="cmbequipo" required>
                        <?php
                        $consulta = "SELECT IdEquipo,CONCAT(Aleas,' ',Tipo,' ',Marca) AS'Equipo' FROM equipos WHERE IdEstado =1";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $equipo=$resultado->fetchAll(PDO::FETCH_ASSOC);
                        foreach($equipo as $eqp){
                            echo '<option value="'.$eqp['IdEquipo'].'">'.$eqp['Equipo'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <span class="label success">Fecha del Reporte &nbsp;Numero de
                        Parte</span>
                    <input type="hidden" class="text_texto" name="IdOperacion" id="IdOperacion"
                        value="<?php echo $IdOperacion?>">
                    <input type="hidden" class="text_texto" name="IdEmpresa" id="IdEmpresa"
                        value="<?php echo $IdEmpresa?>">
                    <input type="hidden" class="text_texto" name="IdEmpleado" id="IdEmpleado"
                        value="<?php echo $IdEmpleado?>">
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
                    <span class="label success">
                        Foto</span>
                    <input type="file" accept="image/*" class="form-control-file" id="Foto" name="Foto"
                        style='display: inline; width: 316px;'>
                    </span>
                </div>
                <br>
                <a href="operaciones_user.php" type="button" class="btn_save_reporte"
                    style='display: inline; width: 200px;'>Cancelar &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                <input type="submit" value="Modificar registro" class="btn_save_reporte" style='display: inline; width: 159px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>

</html>