<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Envío de correo electrónico</title>
</head>
<body>
    <?php
    // Cargar PHPMailer
    require 'vendor/autoload.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Crear una nueva instancia de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurar el servidor SMTP de Mailtrap
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Username = '520ea93e2a1086:225633920252f6';
        $mail->Password = 'Julibdm811';
        $mail->SMTPSecure = 'tls';
        $mail->Port = 2525;

        // Configurar el correo electrónico
        $mail->setFrom('juli.andgu16@gmail.com', 'Julian Diaz');
        $mail->addAddress('jujudidiaz@gmail.com', 'Andres Guevara');
        $mail->Subject = 'Asunto del correo electrónico';
        $mail->Body = 'Cuerpo del correo electrónico';

        // Adjuntar un archivo (opcional)
        //$mail->addAttachment('ruta/al/archivo.pdf');

        // Enviar el correo electrónico
        $mail->send();
        echo 'El correo electrónico se envió correctamente';
    } catch (Exception $e) {
        echo 'No se pudo enviar el correo electrónico. Error: ' . $mail->ErrorInfo;
    }
    ?>
</body>
</html>
