<?php
if (isset($_COOKIE['contador'])) {
    $contador = $_COOKIE['contador'] + 1;
    setcookie('contador', $contador, time() + 3600);
    echo "Numero de visitas: " . $contador;
} else {
    setcookie('contador', 1, time() + 3600);
    echo "Bienvenido a la pagina";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejer2cookies</title>
</head>
<body>
    <h1>contador</h1>
</body>
</html>