<?php
session_start();
include("conexion.inc");

// Rescatar el correo ingresado
$mail = $_POST['email'];

// Consulta para verificar si el correo existe en la tabla alumnos
$qry = mysqli_query($link, "SELECT nombre FROM alumnos WHERE mail='".$mail."'");
if ($row = mysqli_fetch_assoc($qry)) {
    // Si el correo existe, almacenar el nombre en la variable de sesión
    $_SESSION['nombre_alumno'] = $row['nombre'];
    header("Location: bienvenida.php");
} else {
    // Si no existe, redirigir a una página de error
    header("Location: error.php");
}
?>
