<?php
require_once('conexion.php');

$sql = "SELECT 
t1.orden,
t1.fecha,
t1.id_syscom, 
t1.titulo,
t1.stock, 
t1.inv_min, 
t1.status, 
t1.precio AS precio_ayer,
(SELECT precio FROM plataforma_ventas_temp WHERE id_syscom = t1.id_syscom AND fecha < t1.fecha ORDER BY fecha DESC LIMIT 1) AS precio_hoy
FROM (
SELECT 
    status, 
    id_syscom, 
    titulo, 
    stock, 
    inv_min, 
    fecha, 
    precio, 
    orden,
    ROW_NUMBER() OVER (PARTITION BY id_syscom ORDER BY fecha DESC) AS rn
FROM plataforma_ventas_temp
) AS t1
WHERE t1.rn = 1
ORDER BY t1.orden;
";



$result = $conn->query($sql);

// Verifica si se encontraron resultados
if ($result->num_rows > 0) {

    
    // Imprime los resultados en una tabla HTML
    echo "<table border='1'>
    <tr>
    </tr>";

    echo "<tr>
            <th>ORDEN</th>
            <th>FECHA</th>
            <th>ID_SYSCOM</th>
            <th>TITULO</th>
            <th>STOCK</th>
            <th>INV_MINIMO</th>
            <th>STATUS</th>
            <th>PRECIO_AYER</th>
            <th>PRECIO_HOY</th>
        </tr>";
    

    while($row = $result->fetch_assoc()) {
        echo "<tr>";    
            // Imprimir los demás datos de la fila
            echo "<td>" . $row['orden'] . "</td>";
            echo "<td>" . $row['fecha'] . "</td>";
            echo "<td>" . $row['id_syscom'] . "</td>";
            echo "<td>" . $row['titulo'] . "</td>";
            echo "<td>" . $row['stock'] . "</td>";
            echo "<td>" . $row['inv_min'] . "</td>";
            echo "<td>" . $row['status'] . "</td>";
            echo "<td>" . $row['precio_ayer'] . "</td>";
            echo "<td>" . $row['precio_hoy'] . "</td>";

        echo "</tr>";
    }
    echo "</table>";
    
} else {
    // Si no se encontraron resultados, muestra un mensaje
    echo "No se encontraron resultados";
}

// Cierra la conexión a la base de datos
$conn->close();


        // Imprimir el estado
        // echo "<td>";
        // if ($row['status'] == 1) {
        //     // echo 'ACTIVO';
        //     echo "<font color=green> ACTIVO</font>";

        // } elseif ($row['status'] == 0) {
        //     echo "<b><font  color=red> PAUSA</font></b>";

        // } else {
        //     echo 'Desconocido'; // Si el estado no es ni 0 ni 1
        // }
        // echo "</td>";




?>


