<?php
require_once('conexion.php');

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
            orden,
            ROW_NUMBER() OVER (PARTITION BY id_syscom ORDER BY fecha DESC) AS rn
        FROM plataforma_ventas_temp
    ) AS t1
    WHERE t1.rn = 1
    ORDER BY t1.orden

";

$result = $conn->query($sql);

// Obtener la fecha actual
$currentDate = date('Y-m-d');

// Crear un archivo CSV en memoria
$output = fopen('php://temp', 'w');

// Escribir los encabezados CSV
fputcsv($output, array('ORDEN', 'FECHA', 'ID_SYSCOM', 'NOMBRE', 'STOCK', 'IN_MIN', 'STATUS', 'PRECIO_AYER', 'PRECIO_HOY', 'DIFERENCIA'));


// Verifica si se encontraron resultados
if ($result->num_rows > 0) {


    // Output data of each row
    while($row = $result->fetch_assoc()) {
        fputcsv($output, array($row["orden"], $row["fecha"], $row["id_syscom"], $row["titulo"], $row["stock"], $row["inv_min"], $row["status"], $row['precio_anterior'], $row['precio_hoy'], $row['precio_difference']));
    }
    
    
} else {
    // Si no se encontraron resultados, muestra un mensaje
    echo "No se encontraron resultados";
}

// Configurar cabeceras para la descarga del archivo CSV
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="productos_' . $currentDate . '.csv"');
// header('Content-Disposition: attachment; filename="productos.csv"');

// Volver al principio del archivo CSV
rewind($output);

// Mostrar el contenido del archivo CSV y cerrar la conexión
fpassthru($output);

// Cierra la conexión a la base de datos
$conn->close();

?>

