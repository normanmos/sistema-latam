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
        <br>
        <br>
        <h1>Lista de Usuarios</h1>
        <table>
            <tr>
                <th>Id</th>
                <th>Empleado</th>
                <th>Rol</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <?php 
            //Paginador
            include_once 'bd/conbd.php';
            $objeto = new Conexion();
            $conexion = $objeto->Conectar();
            $consulta = "SELECT COUNT(*) as total_reg FROM usuarios";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute();
            $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
            foreach($data as $dat){
                $tr = $dat['total_reg'];
            }
			$por_pagina = 10;
			if(empty($_GET['pagina']))
			{
				$pagina = 1;
			}else{
				$pagina = $_GET['pagina'];
			}
			$desde = ($pagina-1) * $por_pagina;
            $total_paginas = ceil($tr / $por_pagina);
            $consulta2 = "SELECT U.IdUsuario,CONCAT(E.Nombres,' ',E.Apellidos) AS 'Empleado',R.Descripcion AS 'Rol',U.Usuario,U.Clave,ES.Estado
            FROM usuarios U
            INNER JOIN roles R ON (U.IdRol=R.IdRol)
            INNER JOIN empleados E ON (U.IdEmpleado=E.IdEmpleado)
            INNER JOIN estados ES ON (U.IdEstado=ES.IdEstado) WHERE U.Elim =1 ORDER BY U.IdUsuario ASC LIMIT $desde,$por_pagina";
            $resultado2 = $conexion->prepare($consulta2);
            $resultado2->execute();
            $data2=$resultado2->fetchAll(PDO::FETCH_ASSOC);
				foreach($data2 as $dat) {
			 ?>
            <tr>
                <td><?php echo $dat['IdUsuario'] ?></td>
                <td><?php echo $dat['Empleado'] ?></td>
                <td><?php echo $dat['Rol'] ?></td>
                <td><?php echo $dat['Usuario'] ?></td>
                <td><?php echo $dat['Clave'] ?></td>
                <td><?php echo $dat['Estado'] ?></td>
                <td>
                    <a class="link_edit" href="edt_usuario.php?id=<?php echo $dat["IdUsuario"]; ?>"><img src="img/editar.png"/></a>
                    <a class="link_delete" href="elim_usuario.php?id=<?php echo $dat["IdUsuario"]; ?>"><img src="img/eliminar.png"/></a>
                </td>
            </tr>
            <?php } ?>
        </table>
        <div class="paginador">
            <ul>
                <?php
                if($pagina != 1)
				{
                    ?>
                    <li><a href="?pagina=<?php echo 1; ?>">|<<</a>
                    </li>
                <li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a>
                </li>
                <?php 
				}
				for ($i=1; $i <= $total_paginas; $i++) { 
					# code...
					if($i == $pagina)
					{
						echo '<li class="pageSelected">'.$i.'</li>';
					}else{
						echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
					}
				}
				if($pagina != $total_paginas)
				{
			    ?>
                <li><a href="?pagina=<?php echo $pagina + 1; ?>">>></a></li>
                <li><a href="?pagina=<?php echo $total_paginas; ?> ">>|</a></li>
                <?php } ?>
            </ul>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>
</html>