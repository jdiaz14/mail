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
    $mail->addAddress('jujudidiaz@gmail.com', 'julian');
    $mail->Subject = 'Nuevo mensaje del formulario de contacto';
    $mail->Body = 'Nombre: ' . $_POST['nombre'] . '<br>' .
                  'Email: ' . $_POST['correo'] . '<br>' .
                  'Mensaje: ' . $_POST['mensaje'];

    // Enviar el correo electrónico
    $mail->send();
    echo 'El correo electrónico se envió correctamente';
} catch (Exception $e) {
    echo 'No se pudo enviar el correo electrónico. Error: ' . $mail->ErrorInfo;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verifica el Recaptcha
    $recaptcha_secret = '6LdxsBElAAAAAIIyVCxeQ73KVVK_3d1nfXtJB82M';
    $recaptcha_response = $_POST['g-recaptcha-response'];
    $recaptcha = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$recaptcha_secret&response=$recaptcha_response");
    $recaptcha = json_decode($recaptcha);
    if ($recaptcha->success) {
      // El Recaptcha es válido, procesa el formulario
    } else {
      // El Recaptcha es inválido, muestra un mensaje de error
      $error = 'El Recaptcha no se ha completado correctamente.';
    }
  }
?>
