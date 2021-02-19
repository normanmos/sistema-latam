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
    $IdUsuarioModifica = $dato['IdUsuario'];
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
            <h1>Modificar Usuario</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="clases/usuario/editar.php" method="POST">
                <div class="form-group">
                    <span class="label success">Seleccione el Empleado</span>
                    <select class="con_estilos" id="idcmbempleado" name="cmbempleado" required>
                        <?php
                        $consulta = "SELECT IdEmpleado,CONCAT(Nombres,' ',Apellidos) AS'Empleados' FROM empleados WHERE IdEstado =1";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $empleados=$resultado->fetchAll(PDO::FETCH_ASSOC);
                        foreach($empleados as $dato){
                            echo '<option value="'.$dato['IdEmpleado'].'">'.$dato['Empleados'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <span class="label success">Seleccione el Rol</span>
                    <select class="con_estilos" id="idcmbrol" name="cmbrol" required>
                        <?php
                        $consulta = "SELECT IdRol,Descripcion FROM roles;";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $rol=$resultado->fetchAll(PDO::FETCH_ASSOC);
                        foreach($rol as $dato){
                            echo '<option value="'.$dato['IdRol'].'">'.$dato['Descripcion'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <span class="label success">Seleccione el Estado</span>
                    <select class="con_estilos" id="idcmbestado" name="cmbestado" required>
                        <?php
                        $consulta = "SELECT IdEstado,Estado FROM estados";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $estado=$resultado->fetchAll(PDO::FETCH_ASSOC);
                        foreach($estado as $dato){
                            echo '<option value="'.$dato['IdEstado'].'">'.$dato['Estado'].'</option>';
                        }
                        ?>
                    </select>
                    <span class="label success">Usuario &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Contraseña</span>
                            <input type="hidden" name="IdUsuario" id="IdUsuario" value="<?php echo $IdUsuarioModifica?>">
                        <input type="text" class="text_small" name="Usuario" id="Usuario"
                            style='display: inline; width: 205px;' value="<?php echo $NombreUsuario?>" required>
                        <input type="text" class="text_small" name="Clave" id="Clave"
                            style='display: inline; width: 205px;' value="<?php echo $Clave?>" required>
                    </span>
                </div>
                <br>
                <a href="usuarios.php" type="button" class="btn_save_reporte" style='display: inline; width: 205px;'>Cancelar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                <input type="submit" value="Modificar registro" class="btn_save_reporte" style='display: inline; width: 205px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>

</html>