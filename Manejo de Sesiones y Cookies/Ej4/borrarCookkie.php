<?php
// Borramos la cookie
setcookie('titular', '', time() - 3600); // Cookie expirada

// Redirigimos de nuevo a la página principal
header('Location: index.php');
exit;
?>
