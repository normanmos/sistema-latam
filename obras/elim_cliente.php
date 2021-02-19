<?php
include_once 'bd/conbd.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
$idcli = $_REQUEST['id'];
$consulta = "SELECT idCliente,Descripcion,Ruc,Direccion,Telefono,Email,iiva,irenta FROM clientes
WHERE idCliente = '$idcli' AND IdEstado = 1";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
foreach($data as $dato){
    $IdClienteModificar = $dato['idCliente'];
    $Descripcion = $dato['Descripcion'];
    $Ruc = $dato['Ruc'];
    $Direccion = $dato['Direccion'];
    $Telefono = $dato['Telefono'];
    $Email = $dato['Email'];
    $iiva = $dato['iiva'];
    $irenta = $dato['irenta'];
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
            <h1>Eliminar Clientes</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="clases/cliente/eliminar.php" method="POST">
                <div class="form-group">
                    <span class="label success">Descripción</span>
                    <input type="hidden" name="idCliente" id="idCliente" value="<?php echo $IdClienteModificar?>">
                    <input type="text" class="text_texto" name="Descripcion" id="Descripcion"
                        value="<?php echo $Descripcion?>" readonly>
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
                <div class="form-group">
				<span class="label success">% R. IVA</span>
                    <input type="text" class="text_texto" name="iiva" id="iiva" value="<?php echo $iiva?>">
                </div>
                <div class="form-group">
				<span class="label success">% R. Renta</span>
                    <input type="text" class="text_texto" name="irenta" id="irenta" value="<?php echo $irenta?>">
                </div>
                <br>
                <a href="clientes.php" type="button" class="btn_save_reporte" style='display: inline; width: 205px;'>Cancelar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                <input type="submit" value="Eliminar registro" class="btn_save_reporte" style='display: inline; width: 205px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>
</html>