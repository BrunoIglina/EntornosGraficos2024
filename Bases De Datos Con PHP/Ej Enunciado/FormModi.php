<title>Modificacion</title>
</head>
<boby>
<?php
include ("conexion.inc");
//Captura datos desde el Form anterior
$vDNI = $_POST['DNI'];
//Arma la instrucción SQL y luego la ejecuta
$vSql = "SELECT * FROM doc_utn WHERE dni ='$vDNI' ";
$vResultado = mysqli_query($link, $vSql) or die (mysqli_error($link));;
$fila = mysqli_fetch_array($vResultado);
if(mysqli_num_rows($vResultado) == 0) {
 echo ("Usuario Inexistente...!!! <br>");
 echo ("<A href='FormModiIni.html'>Continuar</A>");
}
else{
?>
<FORM action="Modi.php" method="POST" name="FormModi">
<table width="356">
<tr>
 <td width="103"> Nombre: </td>
 <td width="243"> <input type="text" name="Nombre" value="<?php
echo($fila['apel_nom']); ?>">
 </td>
</tr>
<tr>
 <td width="103"> Ingrese su Legajo: </td>
 <td width="243"> <input type="TEXT" name="ClaveUsuario" size="20" maxlength="20"
 value="<?php echo($fila['legajo']); ?>">
 </td>
 </tr>
 <tr>
 <td width="103"> D.N.I.: </td>
 <td width="243"> <input type="TEXT" name="DNI" size="20" maxlength="20"
 value="<?php echo($fila['dni']); ?>">
 </td>
</tr>
<tr>
 <td width="103"> eMail: </td>
 <td width="243"> <input type="TEXT" name="eMail" size="20" maxlength="40"
 value="<?php echo($fila['email']); ?>">
 </td>
 </tr>
 <tr>
 <td colspan="2" align:center> <input type="SUBMIT" name="Submit"
value="Modificar">
 </td>
 </tr>
</table>
</FORM>
<?php
}
// Liberar conjunto de resultados
mysqli_free_result($vResultado);
// Cerrar la conexion
mysqli_close($link);
?>