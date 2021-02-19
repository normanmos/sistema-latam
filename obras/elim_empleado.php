<?php
include_once 'bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$idemp = $_REQUEST['id'];
$consulta = "SELECT IdEmpleado,Nombres,Apellidos,Identificacion,Direccion,Telefono,Email 
FROM empleados
WHERE IdEmpleado = '$idemp'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
foreach($data as $dato){
    $IdEmpleadoModifica = $dato['IdEmpleado'];
    $Nombres = $dato['Nombres'];
    $Apellidos = $dato['Apellidos'];
    $Identificacion = $dato['Identificacion'];
    $Direccion = $dato['Direccion'];
    $Telefono = $dato['Telefono'];
    $Email = $dato['Email'];
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
            <h1>Eliminar Trabajador</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="clases/empleado/eliminar.php" method="POST">
                
                <div class="form-group">
                    <span class="label success">Nombres &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; Appellidos</span>
                    <input type="hidden" name="IdEmpleado" id="IdEmpleado" value="<?php echo $IdEmpleadoModifica?>">
                    <input type="text" class="text_small" name="Nombres" id="Nombres"
                        style='display: inline; width: 205px;' value="<?php echo $Nombres?>" readonly>
                    <input type="text" class="text_small" name="Apellidos" id="Apellidos"
                        style='display: inline; width: 205px;' value="<?php echo $Apellidos?>" readonly>
                    <span class="label success">Identificación &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; Teléfono</span>
                    <input type="text" class="text_small" name="Identificacion" id="Identificacion"
                        style='display: inline; width: 205px;' value="<?php echo $Identificacion?>" readonly>
                    <input type="text" class="text_texto" name="Telefono" id="Telefono"
                        style='display: inline; width: 205px;' value="<?php echo $Telefono?>" readonly>
                    </span>
                </div>
                <div class="form-group">
                    <span class="label success">Dirección</span>
                    <input type="text" class="text_texto" name="Direccion" id="Direccion"
                        value="<?php echo $Direccion?>" readonly>
                </div>
                <div class="form-group">
                    <span class="label success">Email</span>
                    <input type="email" class="text_texto" name="Email" id="Email" value="<?php echo $Email?>" readonly>
                </div>
                
                <br>
                <a href="empleados.php" type="button" class="btn_save_reporte" style='display: inline; width: 250px;'>Cancelar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                <input type="submit" value="Eliminar registro" class="btn_save_reporte" style='display: inline; width: 205px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>

</html>