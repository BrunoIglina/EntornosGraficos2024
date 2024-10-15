<?php
$link = mysqli_connect("localhost", "root") or die("Problemas de conexión a la base de datos");
mysqli_select_db($link, "Capitales") or die("No se pudo seleccionar la base de datos");
?>
