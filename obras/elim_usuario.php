<?php
include_once 'bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$idemp = $_REQUEST['id'];
$consulta = "SELECT IdUsuario,Usuario,Clave
FROM usuarios 
WHERE IdUsuario = '$idemp'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
foreach($data as $dato){
    $IdUsuarioElimina = $dato['IdUsuario'];
    $NombreUsuario = $dato['Usuario'];
    $Clave = $dato['Clave'];
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
    <?php include "includes/header.php"; 
    ?>
    <section id="container">
        <div class="form_register">
            <br>
            <br>
            <h1>Elimina Usuario</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="clases/usuario/eliminar.php" method="POST">
                <div class="form-group">
                    <span class="label success">Usuario &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Contraseña</span>
                    <input type="hidden" name="IdUsuario" id="IdUsuario" value="<?php echo $IdUsuarioElimina?>">
                    <input type="text" class="text_small" name="Usuario" id="Usuario"
                        style='display: inline; width: 205px;' value="<?php echo $NombreUsuario?>" readonly>
                    <input type="text" class="text_small" name="Clave" id="Clave" style='display: inline; width: 205px;'
                        value="<?php echo $Clave?>" readonly>
                    </span>
                </div>
                <br>
                <a href="usuarios.php" type="button" class="btn_save_reporte"
                    style='display: inline; width: 205px;'>Cancelar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                <input type="submit" value="Eliminar registro" class="btn_save_reporte"
                    style='display: inline; width: 205px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>

</html>