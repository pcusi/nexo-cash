<?php

include_once('../config/connection.php');
require 'correos.php';

$nombres = $_POST['Nombres'];
$apellidos = $_POST['Apellidos'];
$dni = $_POST['Dni'];
$ocupacion = $_POST['Ocupacion'];
$inversion = $_POST['Inversion'];
$correo = $_POST['Correo'];

$sql = "INSERT INTO Inversion 
            (Nombres, Apellidos, Dni, Ocupacion, Inversion, Correo) 
            VALUES ('$nombres', '$apellidos', '$dni', '$ocupacion', $inversion, '$correo')";

$query = mysqli_query($conn, $sql);

//instancia de correo
$mail = new EmailSender();

if ($query) {

        $mailSender = $mail->sendEmailInversion($nombres, $apellidos, $correo, $inversion);

        $response = 'success';
} else {
        $response = 'failed';
}


echo $response;
