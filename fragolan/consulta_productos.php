<?php

require_once('conexion.php');

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


echo '<form action="index.php" method="post">';
    echo '<input type="submit" name="consulta_btn" value="Inicio">';
echo '</form>';
echo '<br>';

// Realiza la consulta SQL
$sql = "SELECT id_syscom, stock, inv_min, status, fecha, orden FROM plataforma_ventas_temp AS t1 WHERE t1.fecha = (SELECT MAX(t2.fecha) FROM plataforma_ventas_temp AS t2 WHERE t1.id_syscom = t2.id_syscom) AND status = 0 ORDER BY orden";

$result = $conn->query($sql);

// Verifica si se encontraron resultados
if ($result->num_rows > 0) {
    // Imprime los resultados en una tabla HTML
    echo "<table border='1'>
    <tr>
    <th>ID Syscom</th>
    <th>Stock</th>
    <th>Inv Min</th>
    <th>Status</th>
    <th>Fecha</th>
    <th>Orden</th>
    </tr>";

    // Imprime los datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['id_syscom'] . "</td>";
        echo "<td>" . $row['stock'] . "</td>";
        echo "<td>" . $row['inv_min'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "<td>" . $row['fecha'] . "</td>";
        echo "<td>" . $row['orden'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    // Si no se encontraron resultados, muestra un mensaje
    echo "No se encontraron resultados";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
