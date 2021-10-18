<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/scss/styles-prestamo.css">
    <link rel="icon" type="image/png" sizes="16x16" href="public/assets/img/nexo_cash_logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="public/assets/img/nexo_cash_logo.png">
    <link rel="icon" type="image/png" sizes="96x96" href="public/assets/img/nexo_cash_logo.png">
    <meta name="description" content="Nexo Cash - Conectamos a personas emprendedoras como tú.">
    <META NAME="reply-to" CONTENT="nexocash@gmail.com">
    <link rev="made" href="mailto:nexocash@gmail.com">
    <meta name="author" content="Nexo Cash">
    <meta name="keywords" content="Nexo Cash, Préstamos, préstamos, Invertir, Invertir, Nexo, Cash, nexo, cash">
    <meta name="copyright" content="Nexo Cash, Todos los derechos reservados">
    <title>Nexo Cash - Préstamo</title>
</head>

<body>
    <?php include_once('./shared/header_simple.php'); ?>
    <div class="container">
        <div class="container__form">
            <div class="container__tax">
                <div class="form-group">
                    <label for="cuota" class="input-label">Quiero solicitar</label>
                    <select name="cuota" id="cuota" class="input-select"></select>
                </div>
                <div class="form-group">
                    <label for="cuota" class="input-label">En un plazo de</label>
                    <select name="plazo" id="plazo" class="input-select"></select>
                </div>
                <button class="btn" id="calcular-btn">Calcular</button>
                <p class="tax-title">Tu cuota mensual sería</p>
                <p class="tax-price" id="total">
                    Sin calcular
                </p>
                <div class="container__tax__month">
                    <p class="tax-month">Tasa de interés mensual promedio de: <span><b id="interes">0.00%</b></span></p>
                </div>
                <small>La información de esta tabla es referencial, está sujeta a cambios en función de la TCEA.</small>
            </div>
            <div class="container__contact">
                <form id="form-prestamo">
                    <h1 class="title">Contacto</h1>
                    <div class="form">
                        <div class="item">
                            <div class="form-group">
                                <label for="correo" class="input-label">Correo</label>
                                <input type="email" name="Correo" id="correo" class="input-text" placeholder="ejemplo@gmail.com" required />
                            </div>
                        </div>
                        <div class="item">
                            <div class="form-group">
                                <label for="dni" class="input-label">DNI</label>
                                <input type="number" name="Dni" id="dni" class="input-text" placeholder="Ingresa tu dni" required />
                            </div>
                        </div>
                        <div class="item">
                            <div class="form-group">
                                <label for="telefono" class="input-label">Número</label>
                                <input type="number" name="Telefono" id="telefono" class="input-text" placeholder="+51934567890" required/>
                            </div>
                        </div>
                    </div>
                    <h1 class="title">Solicitud de préstamo</h1>
                    <div class="form">
                        <div class="item">
                            <div class="form-group">
                                <label for="motivo" class="input-label">¿Para qué necesitas el préstamo?</label>
                                <select name="Motivo" id="motivo" class="input-select" required>
                                    <option selected disabled class="input-select-option">Selecciona una opción</option>
                                    <option value="1" class="input-select-option">Soy empresario y necesito capital</option>
                                    <option value="2" class="input-select-option">Quiero comenzar un emprendimiento</option>
                                    <option value="3" class="input-select-option">Quiero consolidar mis deudas</option>
                                    <option value="4" class="input-select-option">Remodelación o compra de vivienda</option>
                                    <option value="5" class="input-select-option">Otro</option>
                                </select>
                            </div>
                        </div>
                        <div class="item">
                            <div class="form-group">
                                <label for="tipomonto" class="input-label">¿Cuál es el monto que deseas prestar?</label>
                                <div class="select-text">
                                    <select name="TipoMonto" id="tipomonto" class="input-select-wrap" required>
                                        <option selected disabled class="input-select-option">¿Pagará en?</option>
                                        <option value="1">Cuotas fijas</option>
                                        <option value="2">Plazo</option>
                                    </select>
                                    <input type="number" name="Monto" id="monto" placeholder="S/ 20,000" class="input-text-wrap">
                                </div>
                                <small>Nota: No debe ser menor a S/ 20,000.</small>
                            </div>
                        </div>
                        <div class="item">
                            <div class="form-group">
                                <label for="inscritoen" class="input-label">¿Tu inmueble está inscrito en SUNARP?</label>
                                <select name="InscritoEn" id="inscritoen" class="input-select" required>
                                    <option selected disabled class="input-select-option">Selecciona una opción</option>
                                    <option value="1" class="input-select-option">Sí, está inscrito</option>
                                    <option value="2" class="input-select-option">No está inscrito</option>
                                    <option value="3" class="input-select-option">No lo sé</option>
                                </select>
                            </div>
                        </div>
                        <div class="item">
                            <div class="form-group">
                                <label for="tipoingreso" class="input-label">¿Cómo percibes tus ingresos?</label>
                                <select name="TipoIngreso" id="tipoingreso" class="input-select" required>
                                    <option selected disabled class="input-select-option">Selecciona una opción</option>
                                    <option value="1" class="input-select-option">5ta planilla</option>
                                    <option value="2" class="input-select-option">4ta planilla</option>
                                    <option value="3" class="input-select-option">No declarados</option>
                                    <option value="4" class="input-select-option">1ra alquiler de bienes o inmuebles</option>
                                    <option value="5" class="input-select-option">3era actividades empresariales</option>
                                </select>
                            </div>
                        </div>
                        <div class="item">
                            <div class="form-group">
                                <label for="ingreso" class="input-label">Necesitamos conocer tus ingresos</label>
                                <input type="number" name="Ingreso" id="ingreso" class="input-text" placeholder="S/ 20,000" required/>
                                <small>Tus datos están protegidos.</small>
                            </div>
                        </div>
                        <div class="item">
                            <div class="form-group">
                                <label for="TipoPropiedad" class="input-label">¿Qué tipo de propiedad tienes?</label>
                                <select name="TipoPropiedad" id="tipopropiedad" class="input-select" required>
                                    <option selected disabled class="input-select-option">Selecciona una opción</option>
                                    <option value="1" class="input-select-option">Inmueble sin construir</option>
                                    <option value="2" class="input-select-option">Inmueble construido</option>
                                    <option value="3" class="input-select-option">Local comercial</option>
                                </select>
                            </div>
                        </div>
                        <div class="item">
                            <div class="form-group">
                                <label for="ValorPropiedad" class="input-label">¿Cuánto vale la propiedad que quieres dejar en garantía?</label>
                                <input type="number" name="ValorPropiedad" id="valorpropiedad" class="input-text" placeholder="S/ 20,000" required/>
                                <small>Nota: No debe ser menor a S/ 100,000</small>
                            </div>
                        </div>
                        <div class="item">
                            <div class="form-group">
                                <label for="UbicacionPropiedad" class="input-label">¿En dónde se encuentra ubicado?</label>
                                <select name="UbicacionPropiedad" id="ubicacionpropiedad" class="input-select" required>
                                    <option selected disabled class="input-select-option">Selecciona una opción</option>
                                    <option value="1" class="input-select-option">Departamento</option>
                                    <option value="2" class="input-select-option">Provincia</option>
                                    <option value="3" class="input-select-option">Distrito</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <button id="btn-enviar" class="btn">Enviar</button>
                </form>
            </div>
        </div>
        <?php  include_once('./shared/toast.php'); ?>
    </div>
    <?php include_once('./shared/footer.php'); ?>
</body>

</html>
<?php include_once('./shared/script.php'); ?>
<script src="./public/js/prestamo.js"></script>