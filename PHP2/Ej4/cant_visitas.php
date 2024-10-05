<?php
session_start();
?>
<html>
<body>
<?php
echo "Has visitado " . $_SESSION["contador"] . " la página";
?>
<br>
<br>
<a href="cuenta.php">Volver a la página principal</a>
</body>
</html>
