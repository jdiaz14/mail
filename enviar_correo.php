<?php
// Cargar PHPMailer
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Crear una nueva instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // C servidor SMTP de Mailtrap
    $mail->isSMTP();
    $mail->Host = 'smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Username = '520ea93e2a1086:225633920252f6';
    $mail->Password = 'Julibdm811';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 2525;

    //  correo electrónico
    $mail->setFrom($_POST['email'], $_POST['nombre']);
    $mail->addAddress('destinatario@example.com', 'Destinatario');
    $mail->Subject = 'Nuevo mensaje del formulario de contacto';
    $mail->Body = 'Nombre: ' . $_POST['nombre'] . '<br>' .
                  'Email: ' . $_POST['email'] . '<br>' .
                  'Mensaje: ' . $_POST['mensaje'];

    // Enviar el correo electrónico
    $mail->send();
    echo 'El correo electrónico se envió correctamente';
} catch (Exception $e) {
    echo 'No se pudo enviar el correo electrónico. Error: ' . $mail->ErrorInfo;
}
?>
