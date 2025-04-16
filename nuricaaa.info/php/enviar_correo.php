<?php
error_reporting(0);
header('Content-Type: text/html; charset=utf-8');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos usando los nombres correctos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
    $asunto1 = htmlspecialchars($_POST['asunto1']);  // Este es el campo del tel¨¦fono
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Configurar correo
    $para = "admin@nuricaaa.info";
    $asunto = "Nuevo mensaje de contacto: $asunto1"; // Usar tel¨¦fono como parte del asunto
    $cuerpo = "
    <html>
    <head>
        <title>Nuevo mensaje</title>
    </head>
    <body>
        <h2>Contacto desde el sitio web</h2>
        <p><strong>Nombre:</strong> $nombre</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Telefono:</strong> $asunto1</p>
        <p><strong>Mensaje:</strong></p>
        <p>".nl2br($mensaje)."</p>
    </body>
    </html>
    ";

    // Cabeceras
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: $nombre <$email>" . "\r\n"; // Mejor formato para remitente

    if (mail($para, $asunto, $cuerpo, $headers)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>