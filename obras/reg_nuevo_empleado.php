<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/scripts.php"; ?>
    <script src="js/jquery-3.3.1.min.js"></script>
</head>

<body>
    <?php include "includes/header.php"; ?>
    <section id="container">
        <div class="form_register">
            <br>
            <br>
            <h1>Registro Trabajador</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="clases/empleado/registrar.php" method="POST">
                <div class="form-group">
                    <span class="label success">Seleccione la empresa</span>
                    <select class="con_estilos" id="idcmbempresa" name="cmbempresa" required>
                        <?php
                        include_once 'bd/conbd.php';
                        $objeto = new Conexion();
                        $conexion = $objeto->Conectar();
                        $consulta = "SELECT IdEmpresa,Descripcion FROM empresas WHERE IdEstado=1";
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
                    <span class="label success">Nombres &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; Appellidos</span>
                    <input type="text" class="text_small" name="Nombres" id="Nombres"
                        style='display: inline; width: 205px;' required>
                    <input type="text" class="text_small" name="Apellidos" id="Apellidos"
                        style='display: inline; width: 205px;' required>
                    <span class="label success">Identificación &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; Teléfono</span>
                    <input type="text" class="text_small" name="Identificacion" id="Identificacion"
                        style='display: inline; width: 205px;' required>
                    <input type="text" class="text_texto" name="Telefono" id="Telefono"
                        style='display: inline; width: 205px;' required>
                    </span>
                </div>
                <div class="form-group">
                    <span class="label success">Dirección</span>
                    <input type="text" class="text_texto" name="Direccion" id="Direccion" required>
                </div>
                <div class="form-group">
                    <span class="label success">Email</span>
                    <input type="email" class="text_texto" name="Email" id="Email" required>
                </div>
                <div class="form-group">
                    <span class="label success">Seleccione el tipo del cargo</span>
                    <select class="con_estilos" id="idcmbtipocargo" name="cmbtipocargo" required>
                        <?php
                    $consulta = "SELECT IdTipo,Tipo FROM tipo_cargo WHERE IdEstado =1";
                    $resultado = $conexion->prepare($consulta);
                    $resultado->execute();
                    $tpcargo=$resultado->fetchAll(PDO::FETCH_ASSOC);
                    foreach($tpcargo as $carg){
                        echo '<option value="'.$carg['IdTipo'].'">'.$carg['Tipo'].'</option>';
                    }
                   ?>
                    </select>
                    <div id="select2lista"></div>
                </div>

                <br>
                <a href="empleados.php" type="button" class="btn_save_reporte" style='display: inline; width: 205px;'>Cancelar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                <input type="submit" value="Crear registro" class="btn_save_reporte" style='display: inline; width: 205px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>

</html>
<script type="text/javascript">
$(document).ready(function() {
    $('#idcmbtipocargo').val(1);
    recargarLista();
    $('#idcmbtipocargo').change(function() {
        recargarLista();
    });
})
</script>
<script type="text/javascript">
function recargarLista() {
    $.ajax({
        type: "POST",
        url: "datos_combo_tipo.php",
        data: "id=" + $('#idcmbtipocargo').val(),
        success: function(r) {
            $('#select2lista').html(r);
        }
    });
}
</script>