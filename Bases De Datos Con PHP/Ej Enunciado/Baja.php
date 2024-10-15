<html>
<head>
<title>Baja</title>
</head>
<body>
<?php
include ("conexion.inc");
$vDNI = $_POST ['DNI'];
$vSql = "SELECT * FROM doc_utn WHERE dni='$vDNI' ";
$vResultado = mysqli_query($link, $vSql);
if(mysqli_num_rows($vResultado) == 0)
 {
 echo ("Usuario Inexistente...!!! <br>");
 echo ("<A href='FormBajaIni.html'>Continuar</A>");
}
else{
//Arma la instrucción SQL y luego la ejecuta
$vSql= "DELETE FROM doc_utn WHERE dni = '$vDNI' ";
mysqli_query($link, $vSql);
 echo("El Usuario fue Borrado<br>");
 echo("<A href='Menu.html'>Volver al Menu del ABM</A>");
}
// Liberar conjunto de resultados
mysqli_free_result($vResultado);
// Cerrar la conexion
mysqli_close($link);
?>
</body>
</html>