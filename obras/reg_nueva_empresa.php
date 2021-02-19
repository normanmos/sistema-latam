
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
            <h1>Registro Empresa</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="clases/empresa/registrar.php" method="POST">
                <div class="form-group">
                    <span class="label success">Descripción</span>
                    <input type="text" class="text_texto" name="Descripcion" id="Descripcion" required>
                </div>
                <div class="form-group">
                    <span class="label success">Ruc</span>
                    <input type="text" class="text_texto" name="Ruc" id="Ruc" required>
                </div>
                <div class="form-group">
                    <span class="label success">Dirección</span>
                    <input type="text" class="text_texto" name="Direccion" id="Direccion" required>
                </div>
                <div class="form-group">
                    <span class="label success">Teléfono</span>
                    <input type="text" class="text_texto" name="Telefono" id="Telefono" required>
                </div>
                <div class="form-group">
                    <span class="label success">Email</span>
                    <input type="email" class="text_texto" name="Email" id="Email" required>
                </div>
                <br>
                <a href="empresas.php" type="button" class="btn_save_reporte" style='display: inline; width: 205px;'>Cancelar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                <input type="submit" value="Crear registro" class="btn_save_reporte" style='display: inline; width: 205px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>

</html>