<?php
include('conexion.inc');


$id = $_POST['id'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$habitantes = $_POST['habitantes'];
$superficie = $_POST['superficie'];
$tieneMetro = $_POST['tieneMetro'];


$query = "UPDATE ciudades SET ciudad='$ciudad', pais='$pais', habitantes=$habitantes, superficie=$superficie, tieneMetro=$tieneMetro WHERE id=$id";
$result = mysqli_query($link, $query) or die("Error en la consulta: " . mysqli_error($link));


if ($result) {
    echo "Ciudad actualizada exitosamente. <a href='Menu.html'>Volver al menú</a>";
} else {
    echo "Error al actualizar ciudad. <a href='Menu.html'>Volver al menú</a>";
}


mysqli_close($link);
?>
