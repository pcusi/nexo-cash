<?php

include_once('../config/connection.php');
require 'correos.php';

$correo = $_POST['Correo'];
$dni = $_POST['Dni'];
$telefono = $_POST['Telefono'];
$motivo = $_POST['Motivo'];
$tipomonto = $_POST['TipoMonto'];
$monto = $_POST['Monto'];
$inscritoen = $_POST['InscritoEn'];
$tipoingreso = $_POST['TipoIngreso'];
$ingreso = $_POST['Ingreso'];
$tipopropiedad = $_POST['TipoPropiedad'];
$valorpropiedad = $_POST['ValorPropiedad'];
$ubicacionpropiedad = $_POST['UbicacionPropiedad'];

$sql = "INSERT INTO Prestamo 
            (Correo, Dni, Telefono, Motivo, TipoMonto, Monto, InscritoEn, TipoIngreso,
            Ingreso, TipoPropiedad, ValorPropiedad, UbicacionPropiedad) 
            VALUES ('$correo', '$dni', '$telefono', $motivo, $tipomonto, $monto, $inscritoen,
            $tipoingreso, $ingreso, $tipopropiedad, $valorpropiedad, $ubicacionpropiedad)";

$query = mysqli_query($conn, $sql);

//instancia de correo
$mail = new EmailSender();

if ($query) {

        $mailSender = $mail->sendEmail($correo, $dni, $monto, $tipomonto, $telefono);

        echo $mailSender;

        $response = 'success';
} else {
        $response = 'failed';
}


echo $response;
