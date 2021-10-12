<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PhpMailer\PhpMailer\PHPMailer;
use PhpMailer\PhpMailer\SMTP;
use PhpMailer\PhpMailer\Exception;

require '../PhpMailer/PHPMailer.php';
require '../PhpMailer/SMTP.php';
require '../PhpMailer/Exception.php';

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
            //Server settings             
            $mail->SMTPDebug = SMTP::DEBUG_LOWLEVEL;      //Enable verbose debug output
            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';                             //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'pcusir@gmail.com';                     //SMTP username
            $mail->Password   = 'kbirgmruxiwifxvt';                       //SMTP password         //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($correo, 'Cliente');
            $mail->addAddress('pcusir@gmail.com', 'Piero Cusi');     //Add a recipient

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
            //Server settings             
            $mail->SMTPDebug = SMTP::DEBUG_LOWLEVEL;      //Enable verbose debug output
            $mail->isSMTP();
            $mail->CharSet = 'UTF-8';                             //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'pcusir@gmail.com';                     //SMTP username
            $mail->Password   = 'kbirgmruxiwifxvt';                       //SMTP password         //Enable implicit TLS encryption
            $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($correo, 'Cliente');
            $mail->addAddress('pcusir@gmail.com', 'Piero Cusi');     //Add a recipient

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
