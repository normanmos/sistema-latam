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
            <h3>Registro Operaciones</h3>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="clases/operaciones_user/registrar.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <span class="label success">Seleccione la Obra</span>
                    <select class="con_estilos_user" id="idcmbobra" name="cmbobra" required>
                        <?php
                        include_once 'bd/conbd.php';
                        $objeto = new Conexion();
                        $conexion = $objeto->Conectar();
                        $consulta = "SELECT IdObra,Obra FROM obras WHERE IdEstado =1 AND IdEmpresa = '$IdEmpresa'";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $empresas=$resultado->fetchAll(PDO::FETCH_ASSOC);
                        foreach($empresas as $empre){
                            echo '<option value="'.$empre['IdObra'].'">'.$empre['Obra'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <span class="label success">Seleccione el Equipo/Maquinaria</span>
                    <select class="con_estilos_user" id="idcmbequipo" name="cmbequipo" required>
                        <?php
                        include_once 'bd/conbd.php';
                        $objeto = new Conexion();
                        $conexion = $objeto->Conectar();
                        $consulta = "SELECT IdEquipo,CONCAT(Aleas,' ',Tipo,' ',Marca) AS'Equipo' FROM equipos WHERE IdEstado=1";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $empresas=$resultado->fetchAll(PDO::FETCH_ASSOC);
                        foreach($empresas as $empre){
                            echo '<option value="'.$empre['IdEquipo'].'">'.$empre['Equipo'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <span class="label success">Fecha del Reporte &nbsp;Numero de
                        Parte</span>
                    <input type="hidden" class="text_texto" name="IdEmpresa" id="IdEmpresa"
                        value="<?php echo $IdEmpresa?>">
                    <input type="hidden" class="text_texto" name="IdEmpleado" id="IdEmpleado"
                        value="<?php echo $IdEmpleado?>">
                    <input type="date" class="fecha_reporte" name="Fecha" id="Fecha" value="<?php echo $fecha_actual ?>"
                        style='display: inline; width: 156px;' required>
                    <input type="number" class="text_small" name="NroParte" id="NroParte"
                        style='display: inline; width: 156px;' required>
                </div>
                <div class="form-group">
                    <span class="label success"> Horas Trabajadas &nbsp;
                        Combustible (Glns)</span>
                    <input type="number" step="0.01" class="text_small" name="Horas" id="Horas"
                        style='display: inline; width: 156px;' required>
                    <input type="number" step="0.01" class="text_small" name="Combustible" id="Combustible"
                        style='display: inline; width: 156px;' required>
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
                <input type="submit" value="Crear registro" class="btn_save_reporte" style='display: inline; width: 159px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>

</html>