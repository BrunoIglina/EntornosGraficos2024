<?php 
ob_start("ob_gzhandler"); 
session_start(); 
//Rescatamos los valores guardados en la variable de sesión y los asignamos a $carro. Si no existen valores, ponemos a false en el valor de $carro 
$carro = (isset($_SESSION['carro']))? $_SESSION['carro'] : false; 
//y hacemos la consulta 
include("conexion.inc");
$qry=mysqli_query($link,"select * from catalogo order by producto asc"); 
?> 
<html> 
<head> 
<title>CATALOGO</title> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"> 
<style type="text/css"> 

.catalogo { 
 font-family: Verdana, Arial, Helvetica, sans-serif; 
 font-size: 9px; 
 color: #333333; 
} 

</style> 
</head> 
<body> 
<table width="272" align="center" cellpadding="0" cellspacing="0" style="border: 1px solid #000000;"> 
    <tr valign="middle" bordercolor="#FFFFFF" bgcolor="#DFDFDF" class="catalogo"> 
        <td width="170"><strong>Producto</strong></td> 
        <td width="77"><strong> Precio</strong></td> 
        <td width="25" align="right">
            <a href="vercarrito.php?<?php echo SID ?>" title="Ver el contenido del carrito">
                <img src="assets/vercarrito.gif" width="25" height="21" border="0">
            </a>
        </td> 
    </tr> 

<?php 
 
//mostramos todos nuestros artículos, viendo si han sido agregados o no a nuestro carro de compra 
while($row=mysqli_fetch_assoc($qry)){ 
?> 
    <tr valign="middle" class="catalogo"> 
        <td><?php echo $row['producto'] ?></td> 
        <td><?php echo $row['precio'] ?></td> 
        <td align="center">
        <?php

        if(!$carro || !isset($carro[md5($row['idcatalogo'])]['identificador']) || $carro[md5($row['idcatalogo'])]['identificador']!=md5($row['idcatalogo']))
        //si el producto no ha sido agregado, mostramos la imagen de no agregado, linkeada a nuestra página de agregar producto y transmitíéndole a dicha página el id del artículo y el identificador de la sesión 
        {?>
            <a href="agregaCarrito.php?<?php echo SID; ?>&id=<?php echo $row['idcatalogo'];?>">
                <img src="assets/productonoagregado.png" border="0" title="Agregar al Carrito">
            </a><?php
        }

        else 
        //en caso contrario mostramos la otra imagen linkeada., a la página que sirve para borrar el artículo del carro. 
        {?>
            <a href="borrarCarrito.php?<?php echo SID; ?>&id=<?php echo $row['idcatalogo'];?>">
                <img src="assets/productoagregado.png" border="0" title="Quitar del Carrito">
            </a><?php 
        }?>

        </td> 
    </tr><?php 
}?> 
</table> 
</body> 
</html> 
<?php 
ob_end_flush(); 
?> 
