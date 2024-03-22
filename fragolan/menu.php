<?php
// Muestra todos los errores excepto los de nivel de advertencia
error_reporting(E_ALL & ~E_WARNING);

// Mostrar los errores en el navegador
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


echo '<form action="consulta_productos.php" method="post">';
        echo '<input type="submit" name="consulta_btn" value="Productos en Pausa ">';
echo '</form>';
echo '<br>';

echo '<form action="todos_los_productos.php" method="post">';
        echo '<input type="submit" name="productos_btn" value="Todos los Productos ">';
echo '</form>';
echo '<br>';

echo '<form action="ejemplo_orden.php" method="post">';
        echo '<input type="submit" name="ejemplo_btn" value="Inserta ">';
echo '</form>';
echo '<br>';

echo '<form action="familias.php" method="post">';
        echo '<input type="submit" name="familias_btn" value="Consulta API por Familia ">';
echo '</form>';

echo '<form action="tipo_de_cambio.php" method="post">';
        echo '<input type="submit" name="tipo_de_cambio" value="Tipo de Campio ">';
echo '</form>';


?>