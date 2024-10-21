<?php

session_start();

if (isset($_POST['style'])) {
  
    $selectedStyle = $_POST['style'];
    setcookie('selectedStyle', $selectedStyle, time() + (30 * 24 * 60 * 60), "/");

   
    header("Location: index.php");
    exit();
}
?>
