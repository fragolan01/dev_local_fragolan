<?php
        // Muestra todos los errores excepto los de nivel de advertencia
        error_reporting(E_ALL & ~E_WARNING);

        // Mostrar los errores en el navegador
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>PRODUCTOS SYSCOM</title>
    <style>
        /* Estilo para los botones */
        form {
            display: inline-block;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<h1><center>CONSULTA PRODUCTOS SYSCOM LOCAL</center></h1>
<body>

<?php

        // echo '<form action="consulta_productos.php" method="post">';
        //         echo '<input type="submit" name="consulta_btn" value="Productos en Pausa ">';
        // echo '</form>';
        // echo '<br>';

        echo '<form action="todos_los_productos.php" method="post">';
                echo '<input type="submit" name="productos_btn" value="Descarga .CSV ">';
        echo '</form>';
        echo '<br>';

        echo '<form action="ejemplo_orden.php" method="post">';
                echo '<input type="submit" name="ejemplo_btn" value="Genera Consulta ">';
        echo '</form>';
        echo '<br>';

        echo '<form action="familias.php" method="post">';
                echo '<input type="submit" name="familias_btn" value="Muestra consulta ">';
        echo '</form>';
        echo '<br>';

        echo '<form action="tipo_de_cambio.php" method="post">';
                echo '<input type="submit" name="tipo_de_cambio" value="Tipo de Campio ">';
        echo '</form>';
        echo '<br>';

        echo '<form action="detalles_stock.php" method="post">';
        echo '<input type="submit" name="detalles_stock" value="Detalle Stock">';
        echo '</form>';

?>
