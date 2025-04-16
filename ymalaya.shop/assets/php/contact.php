<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
     $tel = htmlspecialchars($_POST['phone']);
     $site = htmlspecialchars($_POST['sitio']);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Configuración del correo
    $para = "info@ymalaya.shop";  // Aquí va la dirección de destino
    $asunto = "Sitio: $site ; Telefono: $tel";
    $cuerpo = "
    <html>
    <head>
        <title>Nuevo mensaje de contacto</title>
    </head>
    <body>
        <h2>Nuevo mensaje</h2>
        <p><strong>Nombre:</strong> $nombre</p>
        <p><strong>Email:</strong> $email</p>
                <p><strong>Contacto:</strong> $asunto</p>
        <p><strong>Mensaje:</strong></p>
        <p>$mensaje</p>
    </body>
    </html>
    ";
    
    // Checamos si los campos no est¨¢n vac¨ªos, si s¨ª, respondemos.

        if ( empty($nombre) OR empty($mensaje) OR empty($email) OR empty($tel) OR empty($site) ) {

            // Set a 400 (bad request) response code and exit.

            http_response_code(400);

            echo "Favor de llenar los campos correctamente.";

            exit;

        }

    // Para enviar correos HTML, debes configurar el encabezado Content-type
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n";

    // Enviar el correo
    if (mail($para, $asunto, $cuerpo, $headers)) {
        echo "Correo enviado exitosamente.";
    } else {
        echo "Hubo un error al enviar el correo.";
    }
}
?>