<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle stock syscom</title>

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

        table {
            width: 50%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>

</head>
<h1><center>DETALLE PRODUCTOS SYSCOM</center></h1>
<body>
    
</body>
</html>

<?php

echo '<form action="menu.php" method="post">';
echo '<input type="submit" name="menu" value="inicio ">';
echo "\t";
echo '<form action="menu.php" method="post">';
echo '<input type="submit" name="menu" value="Descarga reporte ">';
echo '</form>';
echo '<br>';



require_once('conexion.php');


// Dominio
$id_dominio=9999;

// Archivo .txt
$archivo = 'lista_ids.txt';

// Abrir el archivo en modo lectura
$manejador = fopen($archivo, 'r',FILE_IGNORE_NEW_LINES);

// Fecha
date_default_timezone_set('America/Mexico_city');
$fecha = new DateTime();

// Establece el límite de tiempo a 300 segundos (5 minutos)
set_time_limit(300); 

// Definir la frecuencia de serie en segundos (2.5 minuto)
$frecuencia_serie = 120; 

// Dolar
$dolar = 0.0;

//Descuento
$descuento = 0.04;

//IVA
$iva = 0.16;

// Comision ML
$comisionMl = 0.19;

// MXN TOT COMISION
$mxnTotComision = 0.0;

// Variables aleatorias
$mxn_precio_ml = rand(5, 13000);
$descuento_ml = rand(5, 0.40);


$sql_tc = "
SELECT fecha, normal 
FROM plataforma_ventas_tipo_cambio AS t1 
WHERE t1.fecha = (
    SELECT MAX(t1.fecha) 
    FROM plataforma_ventas_tipo_cambio AS t1)
";

$result = $conn->query($sql_tc);

if( $result->num_rows > 0 ){
    echo '<table>';
    echo '<tr><th>Fecha Consulta</th><th>T.C</th><th>IVA</th></tr>';
    while($row = $result->fetch_assoc()){
        echo '<tr>';
        echo '<td>' . $row["fecha"] . '</td>';
        echo '<td>' . $row["normal"] . '</td>';
        $float_tc = floatval($row["normal"]);
        echo '<td>' . "16%" . '</td>';

        echo '</tr>';
    }
    echo '</table>';
} else {
    echo "No se encontraron resultados";
}

echo "<br><br>";

$sql = "

    SELECT
        t1.orden,
        t1.fecha,
        t1.id_syscom,
        t1.titulo,
        t1.stock,
        t1.inv_min,
        t1.status,
        t1.precio AS precio_hoy,
        t1.mxn_tot_venta,
        (SELECT precio FROM plataforma_ventas_temp WHERE id_syscom = t1.id_syscom AND fecha < t1.fecha ORDER BY fecha DESC LIMIT 1) AS precio_anterior,
        t1.precio - COALESCE((SELECT precio FROM plataforma_ventas_temp WHERE id_syscom = t1.id_syscom AND fecha < t1.fecha ORDER BY fecha DESC LIMIT 1), 0) AS precio_difference
    FROM (
        SELECT
            status,
            id_syscom,
            titulo,
            stock,
            inv_min,
            fecha,
            precio,
            mxn_tot_venta,
            orden,
            ROW_NUMBER() OVER (PARTITION BY id_syscom ORDER BY fecha DESC) AS rn
        FROM plataforma_ventas_temp
    ) AS t1
    WHERE t1.rn = 1
    ORDER BY t1.orden

";

$result_all = $conn->query($sql);

if($result_all-> num_rows > 0){
    echo '<table>';
    echo '<tr>
            <th><center>ORDEN</center></th>
            <th><center>ID_SYSCOM</center></th>
            <th><center>NOMBRE</center></th>
            <th><centr>STOCK</center></th>
            <th><center>INV. MINIMO</center></th>
            <th><center>STATUS</center></th>
            <th><center>PRECIO AYER (USD)</center></th>
            <th><center>PRECIO HOY (USD)</center></th>
            <th><center>DIFERENCIA (USD)</center></th>
            <th><center>IVA (USD)</center></th>
            <th><center>TOTAL (USD)</center></th>
            <th><center>COSTO (MXN)</center></th>
            <th><center> TOT VENTA (MXN)</center></th>
            <th><center> UTILIDAD (MXN)</center></th>


        </tr>';

    while($row = $result_all->fetch_assoc()) {
        echo "<tr>";    
            echo "<td><center>" . $row['orden'] . "</td></center>";
            echo "<td><center>" . $row['id_syscom'] . "</td></center>";
            echo "<td>" . $row['titulo'] . "</td>";
            echo "<td><center>" . $row['stock'] . "</td></center>";
            echo "<td><center>" . $row['inv_min'] . "</td></center>";

            echo "<td>"; 
            if ($row['status'] == 1) {
                echo "<b><center><font color=green> ACTIVO</font></b></center>";
    
            } elseif ($row['status'] == 0) {
                echo "<b><center><font  color=red> PAUSA</font></b></center>";
    
            } else {
                echo 'Desconocido'; // Si el estado no es ni 0 ni 1
            }
            "</td>";

            echo "<td><center>" . $row['precio_anterior'] . "</td></center>";
            echo "<td><center>" . $row['precio_hoy']. "</td><center>";

            echo "<td><center>";
                if($row['precio_difference']<0){
                    echo "<b><center> <font color=green>" . $row['precio_difference'] . "</font></b><center>";
                }elseif($row['precio_difference']>0){
                    echo "<b><center> <font color=red>" ."+". $row['precio_difference'] . "</font></b><center>";
                }else{
                    echo "<b><center><font >  S/C </font></b></center>";
                }
            "</td><center>";

            echo "<td><center>". $precio_iva = floatval(round($row['precio_hoy']))*$iva."</td></center>";
            echo "<td><center>". $precio_total = floatval($precio_iva) + floatval($row["precio_hoy"]) ."</td></center>";
            echo "<td><center>". $costo_total_mxn = floatval($precio_total) * $float_tc ."</td></center>";
            echo "<td><center>". $mxn_tot_venta = floatval($row['mxn_tot_venta'])."</td></center>";

            
            echo "<td><center>"; 
                    $utilidad = floatval($mxn_tot_venta) - floatval($costo_total_mxn);

                    if($utilidad>0){
                        echo "<b><center> <font color=green>" . $utilidad . "</font></b><center>";
                    }elseif($utilidad<0){
                        echo "<b><center> <font color=red>". $utilidad . "</font></b><center>";
                    }else{
                        echo "<b><center><font >  S/C </font></b></center>";
                    }
        
            echo "</td></center>";

        echo"</tr>";

    }
}


?>
