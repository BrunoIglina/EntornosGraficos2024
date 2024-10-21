<?php

session_start();


if (isset($_POST['username']) && isset($_POST['password'])) {
   
    $_SESSION['username'] = $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    
    
    header("Location: mostrar_sesion.php");
    exit();
}
?>
