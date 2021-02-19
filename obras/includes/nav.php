<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>

<body>
    <nav>
        <ul>
            <?php 
				if($_SESSION['id_rol'] == 1){
			 ?>
            <li><a href="index.php">Inicio</a></li>

            <li class="principal">
                <a href="empresas.php">Empresas</a>
                <ul>
                    <li><a href="reg_nueva_empresa.php">Crear Registro</a></li>
                </ul>
            </li>
            <li class="principal">
                <a href="clientes.php">Clientes</a>
                <ul>
                    <li><a href="reg_nuevo_cliente.php">Crear Registro</a></li>
                </ul>
            </li>
            <li class="principal">
                <a href="tipos_cargo.php">Tipo Cargo</a>
                <ul>
                    <li><a href="reg_nuevo_tipo_cargo.php">Crear Registro</a></li>
                    <li><a href="cargos.php">Cargo</a></li>
                    <li><a href="reg_nuevo_cargo.php">Crear Registro</a></li>
                </ul>
            </li>
            <li class="principal">
                <a href="empleados.php">Trabajador</a>
                <ul>
                    <li><a href="reg_nuevo_empleado.php">Crear Registro</a></li>
                </ul>
            </li>
            <li class="principal">
                <a href="usuarios.php">Usuario</a>
                <ul>
                    <li><a href="reg_nuevo_usuario.php">Crear Usuario</a></li>
                </ul>
            </li>
            <li class="principal">
                <a href="obras.php">Obras</a>
                <ul>
                    <li><a href="reg_nueva_obra.php">Crear Registro</a></li>
                </ul>
            </li>
            <li class="principal">
                <a href="equipos.php">Equipos</a>
                <ul>
                    <li><a href="reg_nuevo_equipo.php">Crear Registro</a></li>
                </ul>
            </li>
            <li class="principal">
                <a href="operaciones.php">Operaciones</a>
                <ul>
                    <li><a href="reg_nueva_operacion.php">Crear Nuevo</a></li>
                </ul>
            </li>
            <li class="principal">
                <a href="reporte_general_empresa.php">Reportes</a>
                <ul>
                    <li><a href="reporte_por_empresa.php">Por Empresa</a></li>
                    <li><a href="reporte_por_obra.php">Por Obra</a></li>
                    <li><a href="reporte_por_trabajador.php">Por Trabajador</a></li>
                </ul>
            </li>
            <?php } ?>
            <?php 
				if($_SESSION['id_rol'] == 2){
			?>
            <li class="principal">
                <a href="reg_nueva_operacion_user.php">Operaciones</a>
            </li>
            <?php } ?>
        </ul>
    </nav>
</body>

</html>