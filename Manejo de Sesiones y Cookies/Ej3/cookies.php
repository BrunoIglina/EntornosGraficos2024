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