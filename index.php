<?php 
$alert = '';
session_start();
if(!empty($_SESSION['active']))
{
    header('location: obras/');
}else{

    if(!empty($_POST))
    {
        if(empty($_POST['usuario']) || empty($_POST['clave']))
        {
            $alert = 'Ingrese su usuario y su clave';
        }else{
            include_once 'bd/conbd.php';
            $objeto = new Conexion();
            $conexion = $objeto->Conectar();
            $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : '';
            $clave = (isset($_POST['clave'])) ? $_POST['clave'] : '';
            $consulta = "SELECT E.IdEmpleado,EM.IdEmpresa,R.IdRol,R.Descripcion AS 'Rol',U.Usuario,U.Clave FROM usuarios U
            INNER JOIN empleados E ON (U.IdEmpleado=E.IdEmpleado)
            INNER JOIN empresas EM ON (E.IdEmpresa=EM.IdEmpresa)
            INNER JOIN roles R ON (U.IdRol=R.IdRol)
            WHERE U.Usuario = '$usuario' AND U.Clave = '$clave' AND U.IdEstado=1";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            if($resultado->rowCount() >= 1){
                $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
                foreach($data as $dat){
                    $_SESSION["id_empleado"] =  $dat['IdEmpleado'];
                    $_SESSION["id_empresa"] =  $dat['IdEmpresa'];
                    $_SESSION["id_rol"] =  $dat['IdRol'];
                    $_SESSION["r_rol"] =  $dat['Rol'];
                    $_SESSION["u_usuario"] =  $dat['Usuario'];
                }  
                if($_SESSION['id_rol'] == 2){
                    header('location: obras/operaciones_user.php');
                }else{
                    header('location: obras/');
                } 
            }else{
                $alert = 'El usuario o la clave son incorrectos';
                session_destroy();
            }
        }

    }
}
	
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link  rel="icon"   href="img/logo.png" type="image/png"/>
</head>

<body>
    <section id="container">
        <form action="" method="post">
            <h3>Iniciar Sesión</h3>
            <img src="img/login.png" alt="Login">
            <input type="text" name="usuario" placeholder="Usuario">
            <input type="password" name="clave" placeholder="Contraseña">
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <input type="submit" value="INGRESAR">
        </form>
    </section>
</body>

</html>