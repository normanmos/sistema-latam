<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include "includes/scripts.php"; ?>
</head>
<body>
    <?php include "includes/header.php"; ?>
    <section id="container">
        <br>
        <br>
        <h1>Lista de Empresas</h1>
        <table>
            <tr>
                <th>Id</th>
                <th>Descripcion</th>
                <th>Ruc</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
            <?php 
            //Paginador
            include_once 'bd/conbd.php';
            $objeto = new Conexion();
            $conexion = $objeto->Conectar();
            $consulta = "SELECT COUNT(*) as total_reg FROM empresas";
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
            $consulta2 = ("SELECT IdEmpresa,Descripcion,Ruc,Direccion,Telefono,Email FROM empresas WHERE IdEstado =1 ORDER BY IdEmpresa ASC LIMIT $desde,$por_pagina");
            $resultado2 = $conexion->prepare($consulta2);
            $resultado2->execute();
            $data2=$resultado2->fetchAll(PDO::FETCH_ASSOC);
				foreach($data2 as $dat) {
			 ?>
            <tr>
                <td><?php echo $dat['IdEmpresa'] ?></td>
                <td><?php echo $dat['Descripcion'] ?></td>
                <td><?php echo $dat['Ruc'] ?></td>
                <td><?php echo $dat['Direccion'] ?></td>
                <td><?php echo $dat['Telefono'] ?></td>
                <td><?php echo $dat['Email'] ?></td>
                <td>
                    <a class="link_edit" href="edt_empresa.php?id=<?php echo $dat["IdEmpresa"]; ?>"><img src="img/editar.png"/></a>
                    <a class="link_delete" href="elim_empresa.php?id=<?php echo $dat["IdEmpresa"]; ?>"><img src="img/eliminar.png"/></a>
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
    <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
</body>
</html>