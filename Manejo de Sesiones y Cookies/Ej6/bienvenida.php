<?php
session_start();
if (isset($_SESSION['nombre_alumno'])) {
    echo "<h1>Bienvenido, " . htmlspecialchars($_SESSION['nombre_alumno']) . "!</h1>";
} else {
    echo "<h1>No puedes visitar esta página.</h1>";
}
?>
