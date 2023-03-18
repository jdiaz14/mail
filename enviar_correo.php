<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if (isset($_POST['enviar'])) {
    // Obtener los datos del formulario HTML
    $destinatario = $_POST['destinatario'];

    // Configurar PHPMailer
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'juli.andgu16@gmail.com';
    $mail->Password = 'BarceloNa20-';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom('Juli.andgu16@gmail.com', 'Julian Diaz');
    $mail->addAddress($destinatario);
    $mail->Subject = 'Prueba phpmailer';
    $mail->Body = 'esto es una prueba';

    try {
        $mail->send();
        echo 'Correo enviado exitosamente';
    } catch (Exception $e) {
        echo 'Error al enviar el correo: ' . $mail->ErrorInfo;
    }
}
?>
