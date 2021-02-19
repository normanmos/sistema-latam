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
        <h1>Lista de Obras</h1>
        <table>
            <tr>
                <th>Id</th>
                <th>Empresa</th>
                <th>Obra</th>
                <th>Ubicación</th>
                <th>Fecha Inicio</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <?php 
            //Paginador
            include_once 'bd/conbd.php';
            $objeto = new Conexion();
            $conexion = $objeto->Conectar();
            $consulta = "SELECT COUNT(*) as total_reg FROM obras";
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
            $consulta2 = "SELECT O.IdObra,EM.Descripcion AS 'Empresa',O.Obra,O.Ubicacion,
            O.FechaInicio,E.Estado FROM obras O
            INNER JOIN empresas EM ON (O.IdEmpresa=EM.IdEmpresa)
            INNER JOIN estado_obra E ON (O.IdEstadoObra=E.IdEstadoObra)
            WHERE O.IdEstado = 1
            ORDER BY O.IdObra ASC LIMIT $desde,$por_pagina";
            $resultado2 = $conexion->prepare($consulta2);
            $resultado2->execute();
            $data2=$resultado2->fetchAll(PDO::FETCH_ASSOC);
				foreach($data2 as $dat) {
			 ?>
            <tr>
                <td><?php echo $dat['IdObra'] ?></td>
                <td><?php echo $dat['Empresa'] ?></td>
                <td><?php echo $dat['Obra'] ?></td>
                <td><?php echo $dat['Ubicacion'] ?></td>
                <td><?php echo $dat['FechaInicio'] ?></td>
                <td><?php echo $dat['Estado'] ?></td>
                <td>
                    <a class="link_edit" href="edt_obra.php?id=<?php echo $dat["IdObra"]; ?>"><img src="img/editar.png"/></a>
                    <a class="link_delete" href="elim_obra.php?id=<?php echo $dat["IdObra"]; ?>"><img src="img/eliminar.png"/></a>
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