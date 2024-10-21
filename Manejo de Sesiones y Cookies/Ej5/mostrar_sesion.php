<?php

session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de Sesión</title>
</head>
<body>
    <h1>Datos de Sesión</h1>
    
    <?php if (isset($_SESSION['username']) && isset($_SESSION['password'])): ?>
        <p><strong>Nombre de Usuario:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
        <p><strong>Clave:</strong> <?php echo htmlspecialchars($_SESSION['password']); ?></p>
    <?php else: ?>
        <p>No se han establecido variables de sesión.</p>
    <?php endif; ?>

    <a href="index.php">Volver al formulario</a>
</body>
</html>
