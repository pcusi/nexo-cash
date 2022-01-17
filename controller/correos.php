<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';
require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

class EmailSender
{

    function sendEmail(string $correo, int $dni, float $monto, int $tipomonto, $telefono)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        $template = 'template/prestamo.html';
        $message = file_get_contents($template);
        $message = str_replace('%dni%', $dni, $message);
        $message = str_replace('%monto%', $monto, $message);
        $message = str_replace('%telefono%', $telefono, $message);

        if ($tipomonto == 1) {
            $message = str_replace('%tipomonto%', 'Cuotas fijas', $message);
        } else if ($tipomonto == 2) {
            $message = str_replace('%tipomonto%', 'Plazo', $message);
        }

        try {
            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host       = $_ENV['MAIL_HOST'];
            $mail->SMTPDebug = 2;
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = "ssl";
            $mail->Username   = $_ENV['MAIL_ACCOUNT'];
            $mail->Password   = $_ENV['MAIL_PASSWORD'];
            $mail->Port       = $_ENV['GMAIL_PORT'];

            //Recipients
            $mail->setFrom($correo, 'Cliente');
            $mail->addAddress($_ENV['MAIL_ACCOUNT'], 'Nexo Cash');     //Add a recipient

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Solicitud de Préstamo - Nexo Cash';

            $mail->msgHTML($message);

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

    function sendEmailInversion(string $nombres, string $apellidos, string $correo, $inversion)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        $template = 'template/inversion.html';
        $message = file_get_contents($template);
        $message = str_replace('%nombres%', $nombres, $message);
        $message = str_replace('%apellidos%', $apellidos, $message);
        $message = str_replace('%correo%', $correo, $message);
        $message = str_replace('%inversion%', $inversion, $message);

        try {
            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';
            $mail->Host       = $_ENV['MAIL_HOST'];
            $mail->SMTPDebug = 2;
            $mail->SMTPAuth   = true;
            $mail->SMTPSecure = "ssl";
            $mail->Username   = $_ENV['MAIL_ACCOUNT'];
            $mail->Password   = $_ENV['MAIL_PASSWORD'];
            $mail->Port       = $_ENV['GMAIL_PORT'];

            //Recipients
            $mail->setFrom($correo, 'Cliente');
            $mail->addAddress($_ENV['MAIL_ACCOUNT'], 'Nexo Cash');

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Solicitud de Inversión - Nexo Cash';

            $mail->msgHTML($message);

            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
