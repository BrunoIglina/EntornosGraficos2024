<?php
// Verificamos si ya existe una cookie con la selección de titular
if (isset($_COOKIE['titular'])) {
    $titularSeleccionado = $_COOKIE['titular'];
} else {
    $titularSeleccionado = 'todos'; // Si no hay cookie, mostrar todos los titulares.
}

// Si se envió el formulario, se guarda la selección en la cookie
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titularSeleccionado = $_POST['titular'];
    setcookie('titular', $titularSeleccionado, time() + (86400 * 30)); // Cookie válida por 30 días
}

function mostrarTitulares($tipo) {
    if ($tipo == 'politica' || $tipo == 'todos') {
        echo "<h2>Noticia política: El nuevo proyecto de ley fue aprobado</h2>";
    }
    if ($tipo == 'economia' || $tipo == 'todos') {
        echo "<h2>Noticia económica: El dólar cerró en alza</h2>";
    }
    if ($tipo == 'deportes' || $tipo == 'todos') {
        echo "<h2>Noticia deportiva: El equipo local ganó el campeonato</h2>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periódico Simulado</title>
</head>
<body>
    <h1>Bienvenido a nuestro periódico</h1>
    
    <!-- Formulario para seleccionar tipo de titular -->
    <form method="POST">
        <label>
            <input type="radio" name="titular" value="politica" <?php if ($titularSeleccionado == 'politica') echo 'checked'; ?>> Política
        </label>
        <label>
            <input type="radio" name="titular" value="economia" <?php if ($titularSeleccionado == 'economia') echo 'checked'; ?>> Economía
        </label>
        <label>
            <input type="radio" name="titular" value="deportes" <?php if ($titularSeleccionado == 'deportes') echo 'checked'; ?>> Deportes
        </label>
        <button type="submit">Mostrar titular</button>
    </form>

    <hr>

    <!-- Mostrar los titulares según la selección -->
    <?php mostrarTitulares($titularSeleccionado); ?>

    <br>
    <a href="borrarCookkie.php">Ver todos los titulares</a>
</body>
</html>
