<?php 
session_start();

// Recuperar el carrito de la sesión
$carro = $_SESSION['carro'];

// Variables para mostrar productos y enviar a PayPal
$products = '';
$products2 = '';

// Recorrer el carrito y construir las cadenas de productos
foreach ($carro as $k => $v) {
    $unidad = $v['cantidad'] > 1 ? " unidades de " : " unidad de ";
    $products .= $v['cantidad'] . $unidad . $v['producto'] . "+";
    $products2 .= $v['cantidad'] . $unidad . $v['producto'] . ", ";
}

// Eliminar el último '+' de la cadena $products
$products = substr($products, 0, strlen($products) - 1);

// Eliminar la última coma y espacio de la cadena $products2
$products2 = substr($products2, 0, strlen($products2) - 2);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="ISO-8859-1">
    <title>Finalizar Compra</title>
    <style type="text/css">
        .tit {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9px;
            color: #FFFFFF;
        }
        .prod {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 9px;
            color: #333333;
        }
        h1 {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 20px;
            color: #990000;
        }
    </style>
</head>
<body>
    <!-- Formulario para enviar a PayPal -->
    <form action="https://www.paypal.com/cgi-bin/webscr" name="f1" id="f1" method="post">
        <fieldset>
            <legend class="prod"><strong>Finalizar la Compra</strong>
                <a href="#" onClick="javascript:window.open('https://www.paypal.com/cgi-bin/webscr?cmd=xpt/popup/OLCWhatIsPayPal-outside','olcwhatispaypal','toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=no, width=400, height=350');">
                    <img src="https://www.paypal.com/en_US/i/bnr/horizontal_solution_PP.gif" alt="Solution Graphics" border="0" align="absmiddle">
                </a>
            </legend>
            <input type="hidden" name="shipping" value="0">
            <input type="hidden" name="cbt" value="Presione aquí para volver a www.nuestrositio.com >>">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="rm" value="2">
            <input type="hidden" name="bn" value="nombre de la empresa vendedora">
            <input type="hidden" name="business" value="maildelvendedor@dominio.com">
            <input type="hidden" name="item_name" value="<?php echo htmlspecialchars($products2); ?>">
            <input type="hidden" name="item_number" value="Nombre del comprador">
            <input type="hidden" name="amount" value="<?php echo number_format($_GET['costo'], 2); ?>">
            <input type="hidden" name="custom" value="<?php echo htmlspecialchars($_GET['costo']); ?>">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="image_url" value="">
            <input type="hidden" name="return" value="http://www.nuestrodominio.com/ipn_success.php">
            <input type="hidden" name="cancel_return" value="http://www.nuestrodominio.com/ipn_error.php">
            <input type="hidden" name="no_shipping" value="0">
            <input type="hidden" name="no_note" value="0">
            <!-- Detalle de la compra -->
            <table width="50%" border="0" align="center" cellpadding="3" cellspacing="0" bgcolor="#EABB5D" style="border-color: #000000; border-style: solid; border-width: 1px;">
                <tr>
                    <td align="left" valign="top">
                        <span class="prod"><strong>Detalle de los Productos Seleccionados:</strong></span><br>
                        <span class="texto1negro"></span><span class="prod"><strong>Productos:</strong> <?php echo htmlspecialchars($products); ?><br>
                        <strong>Precio Total:</strong> $<?php echo number_format($_GET['costo'], 2); ?></span>
                    </td>
                </tr>
            </table>
            <input type="submit" name="Submit" value="Enviar">
        </fieldset>
    </form>
</body>
</html>
