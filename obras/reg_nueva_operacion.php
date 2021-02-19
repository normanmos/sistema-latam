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
            <h1>Registro Operaciones</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="clases/operaciones/registrar.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <span class="label success">Seleccione la empresa</span>
                    <select class="con_estilos" id="idcmbempresa" name="cmbempresa" required>
                        <?php
                        include_once 'bd/conbd.php';
                        $objeto = new Conexion();
                        $conexion = $objeto->Conectar();
                        $consulta = "SELECT IdEmpresa,Descripcion FROM empresas WHERE IdEstado=1";
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
                    <span class="label success">Seleccione la Obra</span>
                    <select class="con_estilos" id="idcmbobra" name="cmbobra" required>
                        <?php
                        include_once 'bd/conbd.php';
                        $objeto = new Conexion();
                        $conexion = $objeto->Conectar();
                        $consulta = "SELECT IdObra,Obra FROM obras WHERE IdEstadoObra =0";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $empresas=$resultado->fetchAll(PDO::FETCH_ASSOC);
                        foreach($empresas as $empre){
                            echo '<option value="'.$empre['IdObra'].'">'.$empre['Obra'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <span class="label success">Seleccione el Equipo/Maquinaria</span>
                    <select class="con_estilos" id="idcmbequipo" name="cmbequipo" required>
                        <?php
                        include_once 'bd/conbd.php';
                        $objeto = new Conexion();
                        $conexion = $objeto->Conectar();
                        $consulta = "SELECT IdEquipo,CONCAT(Aleas,' ',Tipo,' ',Marca) AS'Equipo' FROM equipos  WHERE IdEstado=1";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $empresas=$resultado->fetchAll(PDO::FETCH_ASSOC);
                        foreach($empresas as $empre){
                            echo '<option value="'.$empre['IdEquipo'].'">'.$empre['Equipo'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <span class="label success">Seleccione el Trabajador</span>
                    <select class="con_estilos" id="idcmbempleado" name="cmbempleado" required>
                        <?php
                        include_once 'bd/conbd.php';
                        $objeto = new Conexion();
                        $conexion = $objeto->Conectar();
                        $consulta = "SELECT IdEmpleado,CONCAT(Nombres,' ',Apellidos)AS'Empleado' FROM empleados  WHERE IdEstado=1";
                        $resultado = $conexion->prepare($consulta);
                        $resultado->execute();
                        $empleado=$resultado->fetchAll(PDO::FETCH_ASSOC);
                        foreach($empleado as $dato){
                            echo '<option value="'.$dato['IdEmpleado'].'">'.$dato['Empleado'].'</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <span class="label success">Fecha del Reporte &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Numero de
                        Parte</span>
                    <input type="date" class="fecha_reporte" name="Fecha" id="Fecha" value="<?php echo $fecha_actual ?>"
                        style='display: inline; width: 207px;' required>
                    <input type="text" step="0.01" class="text_small" name="NroParte" id="NroParte"
                        style='display: inline; width: 207px;' required>
                </div>
                <div class="form-group">
                    <span class="label success"> Horas Trabajadas &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        Combustible en Galones</span>
                    <input type="number" step="0.01" class="text_small" name="Horas" id="Horas"
                        style='display: inline; width: 207px;' required>
                    <input type="number" step="0.01" class="text_small" name="Combustible" id="Combustible"
                        style='display: inline; width: 207px;' required>
                    <span class="label success">
                        Foto</span>
                    <input type="file" accept="image/*" class="form-control-file" id="Foto" name="Foto"
                        style='display: inline; width: 418px;'>
                    </span>
                </div>
                <br>
                <a href="operaciones.php" type="button" class="btn_save_reporte"
                    style='display: inline; width: 205px;'>Cancelar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                <input type="submit" value="Crear registro" class="btn_save_reporte"
                    style='display: inline; width: 205px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>

</html>