<?php
include_once 'bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$idemp = $_REQUEST['id'];
$consulta = "SELECT IdEmpresa,Descripcion,Ruc,Direccion,Telefono,Email FROM empresas
WHERE IdEmpresa = '$idemp' AND IdEstado = 1";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
foreach($data as $dato){
    $IdEmpresaModificar = $dato['IdEmpresa'];
    $Descripcion = $dato['Descripcion'];
    $Ruc = $dato['Ruc'];
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
            <h1>Modificar Empresa</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="clases/empresa/editar.php" method="POST">
                <div class="form-group">
                    <span class="label success">Descripción</span>
                    <input type="hidden" name="IdEmpresa" id="IdEmpresa" value="<?php echo $IdEmpresaModificar?>">
                    <input type="text" class="text_texto" name="Descripcion" id="Descripcion"
                        value="<?php echo $Descripcion?>">
                </div>
                <div class="form-group">
				<span class="label success">Ruc</span>
                    <input type="text" class="text_texto" name="Ruc" id="Ruc" value="<?php echo $Ruc?>">
                </div>
                <div class="form-group">
				<span class="label success">Dirección</span>
                    <input type="text" class="text_texto" name="Direccion" id="Direccion" value="<?php echo $Direccion?>">
                </div>
                <div class="form-group">
				<span class="label success">Teléfono</span>
                    <input type="text" class="text_texto" name="Telefono" id="Telefono" value="<?php echo $Telefono?>">
                </div>
                <div class="form-group">
				<span class="label success">Email</span>
                    <input type="email" class="text_texto" name="Email" id="Email" value="<?php echo $Email?>">
                </div>
                <br>
                <a href="empresas.php" type="button" class="btn_save_reporte" style='display: inline; width: 500px;'>Cancelar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                <input type="submit" value="Modificar registro" class="btn_save_reporte" style='display: inline; width: 205px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>
</html>