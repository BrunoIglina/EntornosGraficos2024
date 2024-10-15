<?php

include('conexion.inc');


$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$habitantes = $_POST['habitantes'];
$superficie = $_POST['superficie'];
$tieneMetro = $_POST['tieneMetro'];


$query = "INSERT INTO ciudades (ciudad, pais, habitantes, superficie, tieneMetro) VALUES ('$ciudad', '$pais', $habitantes, $superficie, $tieneMetro)";
$result = mysqli_query($link, $query) or die("Error en la consulta: " . mysqli_error($link));


if ($result) {
    echo "Ciudad agregada exitosamente. <a href='Menu.html'>Volver al menú</a>";
} else {
    echo "Error al agregar ciudad. <a href='Menu.html'>Volver al menú</a>";
}


mysqli_close($link);
?>
