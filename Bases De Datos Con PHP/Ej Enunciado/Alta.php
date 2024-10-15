<html>
<head>
<title>Alta Usuario</title>
</head>
<body>
<?php
include("conexion.inc");
//Captura datos desde el Form anterior
$vNomApel = $_POST['Nom'];
$vLegajo = $_POST['Legajo'];
$vDNI = $_POST['DNI'];
$vEmail = $_POST['eMail'];
//Arma la instrucción SQL y luego la ejecuta
$vSql = "SELECT Count(dni) as canti FROM doc_utn WHERE dni='$vDNI'";
$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));;
$vCantUsuarios = mysqli_fetch_assoc($vResultado);
//$vCantUsuarios = mysqli_result($vResultado, 0);
if ($vCantUsuarios ['canti']!=0){
 echo ("El Usuario ya Existe<br>");
 echo ("<A href='Menu.html'>VOLVER AL ABM</A>");
}
else {
$vSql = "INSERT INTO doc_utn (legajo, apel_nom, dni, email)
values ('$vLegajo','$vNomApel', '$vDNI', '$vEmail')";
 mysqli_query($link, $vSql) or die (mysqli_error($link));
 echo("El Usuario fue Registrado, Pronto recibirás un email, confirmandote la actualizaciòn a
nuestra pagina<br>");
echo ("<A href='Menu.html'>VOLVER AL MENU</A>");
// Liberar conjunto de resultados
mysqli_free_result($vResultado);
}
// Cerrar la conexion
mysqli_close($link);
?></body></html>