<?php

$host = 'localhost'; 
$dbname = 'prueba';
$username = 'root'; 
$password = ''; 

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}


if (isset($_POST['insertar'])) {
    $nuevaCancion = $_POST['nuevaCancion'];
    if (!empty($nuevaCancion)) {
        $stmt = $conn->prepare("INSERT INTO buscador (canciones) VALUES (:cancion)");
        $stmt->execute(['cancion' => $nuevaCancion]);
    }
}


$resultados = [];
if (isset($_POST['buscar'])) {
    $busqueda = $_POST['busqueda'];

   
    $stmt = $conn->prepare("SELECT * FROM buscador WHERE canciones LIKE :busqueda");
    $stmt->execute(['busqueda' => "%$busqueda%"]);
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscador de Canciones</title>
</head>
<body>
    <h1>Buscador de Canciones</h1>
    
    
    <h2>Agregar Nueva Canción</h2>
    <form method="POST" action="">
        <input type="text" name="nuevaCancion" placeholder="Ingrese el nombre de la nueva canción" required>
        <button type="submit" name="insertar">Agregar</button>
    </form>

   
    <h2>Buscar Canción</h2>
    <form method="POST" action="">
        <input type="text" name="busqueda" placeholder="Ingrese el nombre de la canción" required>
        <button type="submit" name="buscar">Buscar</button>
    </form>

    
    <?php if (!empty($resultados)): ?>
        <h2>Resultados de la búsqueda:</h2>
        <ul>
            <?php foreach ($resultados as $cancion): ?>
                <li><?php echo htmlspecialchars($cancion['canciones']); ?></li>
            <?php endforeach; ?>
        </ul>
    <?php elseif (isset($_POST['buscar'])): ?>
        <p>No se encontraron resultados.</p>
    <?php endif; ?>
</body>
</html>