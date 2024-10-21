<?php

session_start();


$estiloActual = isset($_COOKIE['selectedStyle']) ? $_COOKIE['selectedStyle'] : 'estilo1.css';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página con estilos configurables</title>
    
    <link rel="stylesheet" href="<?php echo $estiloActual; ?>">
</head>
<body>
    <h1>Bienvenido a mi página</h1>
    <p>Elige el estilo que prefieras:</p>

    
    <form action="guardar_estilo.php" method="POST">
        <label for="styleSelect">Elige el estilo:</label>
        <select id="styleSelect" name="style">
            <option value="estilo1.css" <?php echo $estiloActual == 'estilo1.css' ? 'selected' : ''; ?>>Azul</option>
            <option value="estilo2.css" <?php echo $estiloActual == 'estilo2.css' ? 'selected' : ''; ?>>Salmon</option>
            <option value="estilo3.css" <?php echo $estiloActual == 'estilo3.css' ? 'selected' : ''; ?>>Verde</option>
        </select>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
