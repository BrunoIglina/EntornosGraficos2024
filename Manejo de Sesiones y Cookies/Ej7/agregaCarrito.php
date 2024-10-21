
<?php 
session_start(); 
extract($_REQUEST); 
include("conexion.inc");
if(!isset($cantidad)){$cantidad=1;} 
//cuando la cantidad no esté indicada, no se seleccionaron anteriormente productos para el carrito, la cantidad de debe ser 1. 
$qry=mysqli_query($link,"select * from catalogo where idcatalogo='".$id."'"); 
$row=mysqli_fetch_array($qry); 
//Si ya hemos introducido algún producto en el carro lo tendremos guardado temporalmente en el array superglobal $_SESSION['carro'], de manera que rescatamos los valores de dicho array y se los asignamos a la variable $carro, previa comprobación con isset de que $_SESSION['carro'] ya haya sido definida 
if(isset($_SESSION['carro'])) $carro=$_SESSION['carro']; 
//Ahora introducimos el nuevo producto en la matriz $carro, utilizando como índice el id del producto en cuestión, encriptado con md5. Utilizamos md5 porque genera un valor alfanumérico que luego, cuando busquemos un producto en particular dentro de la matriz, no podrá ser confundido con la posición que ocupa dentro de dicha matriz, como podría ocurrir si fuera sólo numérico. 
//Cabe aclarar que si el producto ya había sido agregado antes, los nuevos valores que le asignemos reemplazarán a los viejos. 
$carro[md5($id)]=array(
    'identificador'=>md5($id),
    'cantidad'=>$cantidad,
    'producto'=>$row['producto'],
    'precio'=>$row['precio'],
    'id'=>$id
); 
//Ahora dentro de la sesión ($_SESSION['carro']) tenemos sólo los valores que teníamos (si es que teníamos alguno) antes de ingresar a esta página y en la variable $carro tenemos esos mismos valores más el que acabamos de sumar. De manera que tenemos que actualizar (reemplazar) la variable de sesión por la variable $carro. 
$_SESSION['carro']=$carro; 
//La cadena SID representa al identificador de la sesión, que, dependiendo de la configuración del servidor y de si el usuario tiene o no activadas las cookies puede no ser necesario pasarla por la url. Pero para que nuestro carro funcione, independientemente de esos factores, conviene escribirla siempre.
header("Location:catalogo.php?".SID); 
?> 