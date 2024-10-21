<?php
if(isset($_POST["nombre"])){
    $nombre = $_POST["nombre"];
    setcookie ("nombre", $nombre, time() + (60*60*24*365));
}else{
    if(isset($_COOKIE["nombre"])){
        $nombre = $_COOKIE["nombre"];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nombre del usuario</title>
</head>
<body>
    <form action="cookies.php" method="post">
        <div>Ingrese su nombre: <input type="text" name="nombre" value= <?php if (isset($nombre)){echo $nombre;}?>></div>
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>