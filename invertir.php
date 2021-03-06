<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/scss/styles-prestamo.css">
    <link rel="icon" type="image/png" sizes="16x16" href="public/assets/img/nexo_cash_favicon.jpeg">
    <link rel="icon" type="image/png" sizes="32x32" href="public/assets/img/nexo_cash_favicon.jpeg">
    <link rel="icon" type="image/png" sizes="96x96" href="public/assets/img/nexo_cash_favicon.jpeg">
    <meta name="description" content="Nexo Cash - Conectamos a personas emprendedoras como tú.">
    <META NAME="reply-to" CONTENT="nexocash@gmail.com">
    <link rev="made" href="mailto:nexocash@gmail.com">
    <meta name="author" content="Nexo Cash">
    <meta name="keywords" content="Nexo Cash, Préstamos, préstamos, Invertir, Invertir, Nexo, Cash, nexo, cash">
    <meta name="copyright" content="Nexo Cash, Todos los derechos reservados">
    <title>Nexo Cash - Invertir</title>
</head>

<body>
    <?php include_once('./shared/header_simple.php'); ?>
    <div class="container">
        <div class="container__inversion">
            <form id="form-invertir">
                <div class="container__inversion__form">
                    <div class="item">
                        <div class="form-group">
                            <label for="nombres" class="input-label">Nombres</label>
                            <input type="text" name="Nombres" id="nombres" class="input-text" placeholder="Ingresa tus nombres" required>
                        </div>
                    </div>
                    <div class="item">
                        <div class="form-group">
                            <label for="apellidos" class="input-label">Apellidos</label>
                            <input type="text" name="Apellidos" id="apellidos" class="input-text" placeholder="Ingresa tus apellidos" required>
                        </div>
                    </div>
                    <div class="item">
                        <div class="form-group">
                            <label for="dni" class="input-label">DNI</label>
                            <input type="text" name="Dni" id="dni" class="input-text" placeholder="Ingresa tu DNI" required>
                        </div>
                    </div>
                    <div class="item">
                        <div class="form-group">
                            <label for="ocupacion" class="input-label">Ocupación</label>
                            <input type="text" name="Ocupacion" id="ocupacion" class="input-text" placeholder="Ingresa tu ocupación" required>
                        </div>
                    </div>
                    <div class="item">
                        <div class="form-group">
                            <label for="inversion" class="input-label">Inversión</label>
                            <input type="number" min="20001" max="999999" name="Inversion" id="inversion" class="input-text" placeholder="Ingresa el monto de tu inversión" required>
                        </div>
                    </div>
                    <div class="item">
                        <div class="form-group">
                            <label for="correo" class="input-label">Correo</label>
                            <input type="text" name="Correo" id="correo" class="input-text" placeholder="ejemplo@gmail.com" required>
                        </div>
                    </div>
                </div>
                <button id="btn-invertir" class="btn">Invertir</button>
            </form>
        </div>
        <?php include_once('./shared/toast.php'); ?>
    </div>
    <?php include_once('./shared/footer.php'); ?>
</body>

</html>
<?php include_once('./shared/script.php'); ?>
<script src="./public/js/invertir.js"></script>