<?php

include('conexion.inc');


$id = $_POST['id'];


$query = "SELECT * FROM ciudades WHERE id = $id";
$result = mysqli_query($link, $query) or die("Error en la consulta: " . mysqli_error($link));


if ($fila = mysqli_fetch_array($result)) {
    ?>
    <html>
    <head>
        <title>Modificar Ciudad</title>
    </head>
    <body>
        <form action="Actualizar.php" method="POST">
            <table>
                <tr>
                    <td>ID:</td>
                    <td><input type="hidden" name="id" value="<?php echo $fila['id']; ?>"><?php echo $fila['id']; ?></td>
                </tr>
                <tr>
                    <td>Ciudad:</td>
                    <td><input type="text" name="ciudad" value="<?php echo $fila['ciudad']; ?>" required></td>
                </tr>
                <tr>
                    <td>País:</td>
                    <td><input type="text" name="pais" value="<?php echo $fila['pais']; ?>" required></td>
                </tr>
                <tr>
                    <td>Habitantes:</td>
                    <td><input type="number" name="habitantes" value="<?php echo $fila['habitantes']; ?>" required></td>
                </tr>
                <tr>
                    <td>Superficie:</td>
                    <td><input type="number" name="superficie" value="<?php echo $fila['superficie']; ?>" required></td>
                </tr>
                <tr>
                    <td>Tiene Metro:</td>
                    <td>
                        <select name="tieneMetro" required>
                            <option value="1" <?php if($fila['tieneMetro'] == 1) echo 'selected'; ?>>Sí</option>
                            <option value="0" <?php if($fila['tieneMetro'] == 0) echo 'selected'; ?>>No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Actualizar">
                        <p><a href="Menu.html">Volver al menú</a></p>
                    </td>
                </tr>
            </table>
        </form>
    </body>
    </html>
    <?php
} else {
    echo "No se encontró la ciudad con el ID: $id. <a href='Menu.html'>Volver al menú</a>";
}

mysqli_free_result($result);
mysqli_close($link);
?>
