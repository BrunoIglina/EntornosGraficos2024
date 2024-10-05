<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="contacto.css">
</head>
<body>
    <h1>Contacto</h1>
    <form action="contacto.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="email">Correo Electrónico de consultante:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="mensaje">Consulta al Web Master:</label><br>
        <textarea id="mensaje" name="mensaje" rows="4" required></textarea><br><br>

        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = htmlspecialchars($_POST['nombre']);
        $email = htmlspecialchars($_POST['email']);
        $mensaje = htmlspecialchars($_POST['mensaje']);

        
        $to = "tu_correo@example.com"; 
        $subject = "Consulta de Contacto";
        $body = "Nombre: $nombre\nCorreo: $email\n\nMensaje:\n$mensaje";
        $headers = "From: $email";

        if (mail($to, $subject, $body, $headers)) {
            echo "<p>Tu mensaje ha sido enviado con éxito.</p>";
        } else {
            echo "<p>Error al enviar el mensaje. Por favor, intenta nuevamente más tarde.</p>";
        }
    }
    ?>
</body>
</html>
