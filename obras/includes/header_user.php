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
            <a href="../index.php"><span class="user"><?php echo $Usuario.' - '.$Rol; ?></span><img class="close" src="img/salida.png" alt="Salir" title="Salir"></a>
        </div>
    </div>
   
</header>