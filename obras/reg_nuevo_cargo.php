
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
            <form action="clases/cargo/registrar.php" method="POST">
                <div class="form-group">
                    <span class="label success">Seleccione el tipo de cargo</span>
                    <select class="con_estilos" id="idcmbtipo" name="cmbtipo" required>
                        <?php
                        include_once 'bd/conbd.php';
                        $objeto = new Conexion();
                        $conexion = $objeto->Conectar();
                        $consulta = "SELECT IdTipo,Tipo FROM tipo_cargo WHERE IdEstado = 1";
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
                    <input type="text" class="text_small" name="Cargo" id="Cargo"
                        style='display: inline; width: 205px;' required>
                    <input type="text" class="text_small" name="Sueldo" id="Sueldo"
                        style='display: inline; width: 205px;' required>
                </div>
                <br>
                <a href="cargos.php" type="button" class="btn_save_reporte" style='display: inline; width: 205px;'>Cancelar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                <input type="submit" value="Crear registro" class="btn_save_reporte" style='display: inline; width: 205px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>

</html>