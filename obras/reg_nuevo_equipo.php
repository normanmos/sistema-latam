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
            <h1>Equipo/Maquinaria</h1>
            <hr>
            <div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
            <form action="clases/equipo/registrar.php" method="POST">
                <div class="form-group">
                    <span class="inlineinput">
                        <span class="label success">Aleas &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Tipo</span>
                        <input type="text" class="text_texto" name="Aleas" id="Aleas"
                            style='display: inline; width: 205px;' required>
                        <input type="text" class="text_texto" name="Tipo" id="Tipo"
                            style='display: inline; width: 205px;' required>
                        <span class="label success">Marca &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Modelo</span>
                        <input type="text" class="text_texto" name="Marca" id="Marca"
                            style='display: inline; width: 205px;' required>
                        <input type="text" class="text_texto" name="Modelo" id="Modelo"
                            style='display: inline; width: 205px;' required>
                        <span class="label success">Potencia &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Año &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            Matrícula</span>
                        <input type="text" class="text_texto" name="Potencia" id="Potencia"
                            style='display: inline; width: 205px;' required>
                        <input type="number" class="text_small" name="Ano" id="Ano"
                            style='display: inline; width: 80px;' required>
                        <input type="text" class="text_small" name="Matricula" id="Matricula"
                            style='display: inline; width: 120px;' required>
                    </span>
                </div>
                <br>
                <a href="equipos.php" type="button" class="btn_save_reporte"
                    style='display: inline; width: 205px;'>Cancelar &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</a>
                <input type="submit" value="Crear registro" class="btn_save_reporte" style='display: inline; width: 205px;'>
            </form>
        </div>
    </section>
    <?php include "includes/footer.php"; ?>
</body>

</html>