<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="contacto.css"> 
</head>
<body>
    <h1>Recomendar este sitio a un amigo</h1>
    <form action="contacto.php" method="post">
        <label for="tu_nombre">Tu Nombre:</label>
        <input type="text" id="tu_nombre" name="tu_nombre" required>

        <label for="nombre_amigo">Nombre de tu amigo:</label>
        <input type="text" id="nombre_amigo" name="nombre_amigo" required>

        <label for="email_amigo">Correo Electrónico de tu amigo:</label>
        <input type="email" id="email_amigo" name="email_amigo" required>

        <input type="submit" value="Recomendar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $tu_nombre = htmlspecialchars(trim($_POST['tu_nombre']));
        $nombre_amigo = htmlspecialchars(trim($_POST['nombre_amigo']));
        $email_amigo = htmlspecialchars(trim($_POST['email_amigo']));

        
        $destinatario = $email_amigo; // 
        $asunto = "Te recomiendo este sitio";
        $cuerpo = "Hola $nombre_amigo,\n\n$tu_nombre te recomienda visitar este sitio:\nhttp://localhost:8080/PHP2/Ej3/contacto.php\n\n¡Espero que lo disfrutes!";
        $headers = "From: $tu_nombre <biprueba1@gmail.com>"; // 

        if (mail($destinatario, $asunto, $cuerpo, $headers)) {
            echo "<p>Recomendación enviada con éxito a $nombre_amigo.</p>";
        } else {
            echo "<p>Error al enviar la recomendación. Por favor, intenta nuevamente más tarde.</p>";
        }
    }
    ?>
</body>
</html>
