<head>
<title>Modificacion</title>
</head>
<body>
<?php
include ("conexion.inc");
//Captura datos desde el Form anterior
$vUsuario = $_POST['Nombre'];
$vClave = $_POST['ClaveUsuario'];
$vDNI = $_POST['DNI'];
$vEmail = $_POST['eMail'];
//Arma la instrucción SQL y luego la ejecuta
$vSql = "UPDATE doc_utn set legajo='$vClave', apel_nom='$vUsuario', email='$vEmail' where
dni='$vDNI'";
mysqli_query($link,$vSql) or die (mysqli_error($link));
echo("El Usuario fue Modificado<br>");
echo("<A href= 'Menu.html'>Volver al Menu del ABM</A>");
// Cerrar la conexion
mysqli_close($link);
?>
</body>
</html>