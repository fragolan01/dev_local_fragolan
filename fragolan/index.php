<?php

// Muestra todos los errores excepto los de nivel de advertencia
error_reporting(E_ALL & ~E_WARNING);

// Mostrar los errores en el navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


echo 'PRODUCTOS ACTIVOS Y PAUSA';
echo '<br>';
echo '<br>';

require 'menu.php';

?>
