
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
            <h1>Registro Tipo de Cargo</h1>
            <hr>
            <form action="clases/tipos_cargo/registrar.php" method="POST">
                <div class="form-group">
                    <span class="label success">Tipo Cargo</span>
                    <input type="text" class="text_small" name="Tipo" id="Tipo"
                        style='display: inline; width: 205px;' required>
                </div>
                <br>
                <a href="tipos_cargo.php" type="button" class="btn_save_reporte" style='display: inline; width: 205px;'>Cancelar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                <input type="submit" value="Crear registro" class="btn_save_reporte" style='display: inline; width: 205px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>

</html>