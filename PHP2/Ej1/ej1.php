<?php
$destinatario = "brunoiglina@gmail.com";  
$asunto = "Prueba de correo HTML";  

$mensaje = "
<html>
<head>
  <title>Correo de prueba</title>
</head>
<body>
  <h1>Esto es una prueba de correo HTML</h1>
  <p>Este correo fue enviado desde un servidor local con PHP a través de XAMPP.</p>
  <p><b>Texto en negrita</b> y <i>texto en cursiva</i></p>
</body>
</html>
";

$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: biprueba1@gmail.com' . "\r\n";  
$headers .= 'Reply-To: biprueba1@gmail.com' . "\r\n";  
$headers .= 'X-Mailer: PHP/' . phpversion();

if(mail($destinatario, $asunto, $mensaje, $headers)){
    echo "Correo enviado correctamente.";
} else {
    echo "El correo no pudo ser enviado.";
}
?>
