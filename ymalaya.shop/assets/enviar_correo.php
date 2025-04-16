<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $email = htmlspecialchars($_POST['email']);
     $tel = htmlspecialchars($_POST['phone']);
    
    $mensaje = htmlspecialchars($_POST['mensaje']);

    // Configuración del correo
    $para = "info@ymalaya.shop";  // Aquí va la dirección de destino
    $asunto = "Telefono: $tel";
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