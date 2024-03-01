<?php

$servername = "localhost"; // Servidor de base de datos
$username = "root"; // Usuario de MySQL
$password = ""; // Contraseña de MySQL
$database = "fragcom_syscom"; // base de datos

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para seleccionar todos los datos de la tabla
echo "<br><br>";

$sql = "SELECT id, nombre, nivel FROM api_syscom_categorias"; // Reemplazar 'nombre_de_la_tabla' con el nombre real de tu tabla

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Imprimir los datos de cada fila
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nombre: " . $row["nombre"]. " - Nivel: " . $row["nivel"]. "<br>";
    }
} else {
    echo "0 resultados";
}

// Cerrar la conexión
$conn->close();

?>
