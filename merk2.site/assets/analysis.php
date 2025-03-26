<?php

if(!$_POST) exit;

// Email verification, do not edit.
function isEmail($email_site_url) {
	return(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/",$email_site_url ));
}

if (!defined("PHP_EOL")) define("PHP_EOL", "\r\n");

$site_url    = $_POST['site_url'];
$email_site_url    = $_POST['email_site_url'];

if(trim($site_url ) == '') {
	echo '<div class="error_message">Enter your Site URL with http://.</div>';
	exit();
} else if(trim($email_site_url) == '') {
	echo '<div class="error_message">Por favor introduzca un correo electronico valido.</div>';
	exit();
}
else if(!isEmail($email_site_url)) {
	echo '<div class="error_message">Se ha introducido un correo electronico invalido, intentelo de nuevo.</div>';
	exit();
}
//$address = "your email address";
$address = "merik-2@hotmail.com";

// Below the subject of the email
$e_subject = 'New Site URL Analysis';

// You can change this if you feel that you need to.
$e_body = " $email_site_url request a free analysis for the following website: $site_url" . PHP_EOL . PHP_EOL;
$e_content = "\"$email_site_url\"" . PHP_EOL . PHP_EOL;

$msg = wordwrap( $e_body . $e_content, 70 );

$headers = "From: $email_site_url" . PHP_EOL;
$headers .= "Reply-To: $email_site_url" . PHP_EOL;
$headers .= "MIME-Version: 1.0" . PHP_EOL;
$headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
$headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;

$user = "$email_site_url";
$usersubject = "Gracias";
$userheaders = "De: merik-2@hotmail.com\n";
$userheaders .= "MIME-Version: 1.0" . PHP_EOL;
$userheaders .= "Tipo de contenido: text/plain; charset=utf-8" . PHP_EOL;
$userheaders .= "Codificación-Transferencia-Contenido: quoted-printable" . PHP_EOL;
$usermessage = "Gracias por solicitar un análisis gratuito para el siguiente sitio web: $site_url";
mail($user,$usersubject,$usermessage,$userheaders);

if(mail($address, $e_subject, $msg, $headers)) {

	// Success message
	echo "<div id='success_page' style='padding-top:11px'>";
	echo "Gracias <strong>$email_site_url</strong>, la peticion sera atendia !!";
	echo "</div>";

} else {

	echo 'ERROR!';

}