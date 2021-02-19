<?php
session_start();
$IdEmpleado = $_SESSION["id_empleado"];
$IdEmpresa = $_SESSION["id_empresa"];
$IdRol = $_SESSION["id_rol"];
$Rol =  $_SESSION["r_rol"];
$Usuario = $_SESSION["u_usuario"];
if($_SESSION["u_usuario"] === null){
    header("Location: ../index.php");
}
$fecha_actual = date('Y-m-d');
?>

<header>
    <div class="header">
    <img src="img/logo_header1.png" alt="Logo"width="150" height="50">
   
        <div class="optionsBar">
            <p>Guayaquil, <?php echo fechaC(); ?></p>
            <span>|</span>
            <span class="user"><?php echo $Usuario.' - '.$Rol; ?></span>
            <img class="photouser" src="img/user.png" alt="Usuario">
            <a href="../index.php"><img class="close" src="img/salida.png" alt="Salir" title="Salir"></a>
        </div>
    </div>
    <?php include "nav.php"; ?>
</header>

