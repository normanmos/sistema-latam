<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include "includes/scripts.php"; ?>
    <script>
    function PopupCenter(url, title, w, h) {
        // Fixes dual-screen position                         Most browsers      Firefox
        var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : window.screenX;
        var dualScreenTop = window.screenTop != undefined ? window.screenTop : window.screenY;
        var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document
            .documentElement.clientWidth : screen.width;
        var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document
            .documentElement.clientHeight : screen.height;
        var left = ((width / 2) - (w / 2)) + dualScreenLeft;
        var top = ((height / 2) - (h / 2)) + dualScreenTop;
        var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top +
            ', left=' + left);
        // Puts focus on the newWindow
        if (window.focus) {
            newWindow.focus();
        }
    }
    </script>
</head>

<body>
    <?php include "includes/header.php"; 
    include_once 'bd/conbd.php';
    $objeto = new Conexion();
    $conexion = $objeto->Conectar();
    ?>
    <section id="container">
        <br>
        <br>
        <h1>Reporte por Trabajador</h1>
        <form action="reportes/reporteExcelTrbajador.php" method="POST">
            <div class="form-group">
                <span class="inlineinput">
                    <span class="label success">Seleccione la Empresa</span>
                    <select class="con_estilos" id="idcmbempresa" name="cmbempresa" required>
                        <?php
                        $consulta = "SELECT IdEmpresa,Descripcion FROM empresas WHERE IdEstado =1";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $empresas=$resultado->fetchAll(PDO::FETCH_ASSOC);
                        foreach($empresas as $empre){
                            echo '<option value="'.$empre['IdEmpresa'].'">'.$empre['Descripcion'].'</option>';
                        }
                        ?>
                    </select>
            </div>
            <div class="form-group">
                <span class="label success">Seleccione el Trabajador</span>
                <select class="con_estilos" id="idcmbempleado" name="cmbempleado" required>
                    <?php
                        $consulta = "SELECT IdEmpleado,CONCAT(Nombres,' ',Apellidos) AS'Empleado' FROM empleados";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $empleado=$resultado->fetchAll(PDO::FETCH_ASSOC);
                        foreach($empleado as $emple){
                            echo '<option value="'.$emple['IdEmpleado'].'">'.$emple['Empleado'].'</option>';
                        }
                        ?>
                </select>
                <span class="label success">Fecha desde &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Fecha hasta</span>
                <input type="date" name="Fdesde" placeholder="Fecha desde" class="fecha_reporte"
                    style='display: inline; width: 150px;' required>
                <input type="date" name="Fhasta" placeholder="Fecha hasta" required class="fecha_reporte"
                    style='display: inline; width: 150px;' required>
                <button type="submit" class="btn_save_reporte"> Generar
                    Reporte</button>
            </div>
        </form>
        <table>
            <tr>
                <th>Id</th>
                <th>Empresa</th>
                <th>Obra</th>
                <th>Trabajador</th>
                <th>Equipo | Maquinaria</th>
                <th>Fecha</th>
                <th>Nro Parte</th>
                <th>Horas</th>
                <th>Combustible</th>
                <th>Foto</th>
                <th>Acciones</th>
            </tr>
            <?php 
            //Paginador
            $consulta = "SELECT COUNT(*) as total_reg FROM operaciones";
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
            $consulta2 = ("SELECT O.IdOperacion,EM.Descripcion'Empresa',OB.Obra AS 'Obra',
            CONCAT(EQ.Aleas,' ',EQ.Tipo,' ',EQ.Marca) AS'Equipo',
            CONCAT(E.Nombres,' ',E.Apellidos) AS'Trabajador',
            O.Fecha,O.NroParte,O.Horas,O.Combustible,O.Foto FROM operaciones O
            INNER JOIN empresas EM ON (O.IdEmpresa=EM.IdEmpresa)
            INNER JOIN obras OB ON (O.IdObra=OB.IdObra)
            INNER JOIN empleados E ON (O.IdEmpleado=E.IdEmpleado)
            INNER JOIN equipos EQ ON (O.IdEquipo=EQ.IdEquipo)
            WHERE O.IdEstado=1 ORDER BY O.IdOperacion ASC LIMIT $desde,$por_pagina");
            $resultado2 = $conexion->prepare($consulta2);
            $resultado2->execute();
            $data2=$resultado2->fetchAll(PDO::FETCH_ASSOC);
				foreach($data2 as $dat) {
			 ?>
            <tr>
                <td><?php echo $dat['IdOperacion'] ?></td>
                <td><?php echo $dat['Empresa'] ?></td>
                <td><?php echo $dat['Obra'] ?></td>
                <td><?php echo $dat['Trabajador'] ?></td>
                <td><?php echo $dat['Equipo'] ?></td>
                <td><?php echo $dat['Fecha'] ?></td>
                <td><?php echo $dat['NroParte'] ?></td>
                <td><?php echo $dat['Horas'] ?></td>
                <td><?php echo $dat['Combustible'] ?></td>
                <td><a href="#"> <img src="<?php echo $dat['Foto']?>" class="img-thumbnail" data-toggle="modal"
                            width="50px" onclick="PopupCenter(src='<?php echo $dat['Foto']?>','xtf','700','500')" /></a>
                </td>
                <td>
                    <a class="link_edit" href="edt_operacion.php?id=<?php echo $dat["IdOperacion"]; ?>"><img
                            src="img/editar.png" /></a>
                    <a class="link_delete" href="elim_operacion.php?id=<?php echo $dat["IdOperacion"]; ?>"><img
                            src="img/eliminar.png" /></a>
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
                <li><a href="?pagina=<?php echo 1; ?>">|<<< /a>
                </li>
                <li><a href="?pagina=<?php echo $pagina-1; ?>">
                        <<< /a>
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