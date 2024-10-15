<?php

include('conexion.inc');

$id = $_POST['id'];


$query = "DELETE FROM ciudades WHERE id = $id";
$result = mysqli_query($link, $query) or die("Error en la consulta: " . mysqli_error($link));


if ($result) {
    echo "Ciudad eliminada exitosamente. <a href='Menu.html'>Volver al menú</a>";
} else {
    echo "Error al eliminar ciudad. <a href='Menu.html'>Volver al menú</a>";
}

mysqli_close($link);
?>
