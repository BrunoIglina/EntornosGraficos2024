<?php
function comprobar_nombre_usuario($nombre_usuario){
    // Compruebo que el tamaño del string sea válido
    if (strlen($nombre_usuario) < 3 || strlen($nombre_usuario) > 20){
        echo $nombre_usuario . " no es válido<br>";
        return false;
    }

    // Compruebo que los caracteres sean los permitidos
    $permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789-_";
    for ($i = 0; $i < strlen($nombre_usuario); $i++){
        if (strpos($permitidos, substr($nombre_usuario, $i, 1)) === false){
            echo $nombre_usuario . " no es válido<br>";
            return false;
        }
    }

    echo $nombre_usuario . " es válido<br>";
    return true;
}


$usuarios = [
    "Juan23",
    "Ana_Maria",
    "Luis$32",
    "a",
    "NombreMuyLargoQueNoDebeSerValido",
    "Correcto123",
    "Invalido#Char",
    "12345",
    "user-name",
    "OK_user"
];


foreach ($usuarios as $usuario) {
    comprobar_nombre_usuario($usuario);
}
?>