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
            <h1>Registro Obra</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="clases/obra/registrar.php" method="POST">
                <div class="form-group">
                    <span class="label success">Seleccione la empresa</span>
                    <select class="con_estilos" id="idcmbempresa" name="cmbempresa" required>
                        <?php
                        include_once 'bd/conbd.php';
                        $objeto = new Conexion();
                        $conexion = $objeto->Conectar();
                        $consulta = "SELECT IdEmpresa,Descripcion FROM empresas WHERE IdEstado =1";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $empresas=$resultado->fetchAll(PDO::FETCH_ASSOC);
                        foreach($empresas as $empre){
                            echo '<option value="'.$empre['IdEmpresa'].'">'.$empre['Descripcion'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <span class="label success">Obra</span>
                    <input type="text" class="text_texto" name="Obra" id="Obra" required>
                </div>
                <div class="form-group">
                    <span class="label success">Ubicación &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Fecha de
                        Inicio</span>
                    <input type="text" class="text_texto" name="Ubicacion" id="Ubicacion"
                        style='display: inline; width: 260px;' required>
                    <input type="date" class="text_texto" name="FechaInicio" id="FechaInicio"
                        value="<?php echo $fecha_actual ?>" style='display: inline; width: 150px;' required>
                </div>
                <br>
                <a href="obras.php" type="button" class="btn_save_reporte"
                    style='display: inline; width: 205px;'>Cancelar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                <input type="submit" value="Crear registro" class="btn_save_reporte"
                    style='display: inline; width: 205px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>

</html>