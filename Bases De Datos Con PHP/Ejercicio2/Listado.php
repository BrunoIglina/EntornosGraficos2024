<?php

include('conexion.inc');


$query = "SELECT * FROM ciudades";
$result = mysqli_query($link, $query) or die("Error en la consulta: " . mysqli_error($link));


if (mysqli_num_rows($result) > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Ciudad</th><th>País</th><th>Habitantes</th><th>Superficie</th><th>Tiene Metro</th></tr>";
    while ($fila = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $fila['id'] . "</td>";
        echo "<td>" . $fila['ciudad'] . "</td>";
        echo "<td>" . $fila['pais'] . "</td>";
        echo "<td>" . $fila['habitantes'] . "</td>";
        echo "<td>" . $fila['superficie'] . "</td>";
        echo "<td>" . ($fila['tieneMetro'] ? 'Sí' : 'No') . "</td>"; 
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron ciudades.";
}


mysqli_free_result($result);
mysqli_close($link);
?>
