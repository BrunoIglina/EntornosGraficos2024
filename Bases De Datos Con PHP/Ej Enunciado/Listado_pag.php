<body>
<html>
<head>
<title> Listados completo con PAGINACIÓN </title>
</head>
<body>
<?php
include("conexion.inc");
$Cant_por_Pag = 2;
$pagina = isset ( $_GET['pagina']) ? $_GET['pagina'] : null ;
if (!$pagina) {
$inicio = 0;
$pagina=1;
}
else {
$inicio = ($pagina - 1) * $Cant_por_Pag;
}// total de páginas
$vSql = "SELECT * FROM doc_utn";
$vResultado = mysqli_query($link, $vSql);
$total_registros=mysqli_num_rows($vResultado);
$total_paginas = ceil($total_registros/ $Cant_por_Pag);
echo "Numero de registros encontrados: " . $total_registros . "<br>";
echo "Se muestran paginas de " . $Cant_por_Pag . " registros cada una<br>";
echo "Mostrando la pagina " . $pagina . " de " . $total_paginas . "<p>";
$vSql = "SELECT * FROM doc_utn"." limit " . $inicio . "," . $Cant_por_Pag;
$vResultado = mysqli_query($link, $vSql);
$total_registros=mysqli_num_rows($vResultado);
?>
<table border:1>
<tr>
<td><b>Nombre y Apellido</b></td>
<td><b>DNI</b></td>
<td><b>Email</b></td>
</tr>
<?php
while ($fila = mysqli_fetch_array($vResultado))
{
?>
<tr>
 <td><?php echo ($fila['apel_nom']); ?></td>
 <td><?php echo ($fila['dni']); ?></td>
 <td><?php echo ($fila['email']); ?></td>
 <td><?php echo ($fila['legajo']); ?></td>
</tr>
<tr>
 <td colspan="5">

<?php
}
// Liberar conjunto de resultados
mysqli_free_result($vResultado);
// Cerrar la conexion
mysqli_close($link);
?>
 </td>
</tr>
</table>
<?php
if ($total_paginas > 1){
for ($i=1;$i<=$total_paginas;$i++){
if ($pagina == $i)
//si muestro el índice de la página actual, no coloco enlace
echo $pagina . " ";
else
//si la página no es la actual, coloco el enlace para ir a esa página
echo "<a href='Listado_pag.php?pagina=" . $i ."'>" . $i . "</a> ";}}?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align:center><a href="Menu.html">Volver al men&uacute; del ABM</a></p>
</body>
</html>