
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $nombre = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $telefono = htmlspecialchars($_POST['phone']);
    $asunto1 = htmlspecialchars($_POST['asunto1']);
    $mensaje = htmlspecialchars($_POST['message']);

    // Configuraci贸n del correo
    $para = "info@medinacomercio.com.mx";  // Aqu铆 va la direcci贸n de destino
    $asunto = "$asunto1";
    $cuerpo = "
    <html>
    <head>
        <title>Nuevo mensaje de contacto</title>
    </head>
    <body>
        <h2>Nuevo mensaje</h2>
        <p><strong>Nombre:</strong> $nombre</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Phone:</strong> $telefono</p>
        <p><strong>Asunto:</strong> $asunto1</p>
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
        echo "Correo enviado con exito.";
    } else {
        echo "Hubo un error al enviar el correo.";
    }
}
?>