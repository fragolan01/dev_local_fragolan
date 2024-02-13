<?php

// Datos de conexión a la base de datos
$servername = "localhost"; // Cambia esto por tu servidor de base de datos
$username = "root"; // Cambia esto por tu nombre de usuario de MySQL
$password = ""; // Cambia esto por tu contraseña de MySQL
$database = "prueba_syscom"; // Cambia esto por el nombre de tu base de datos

// Conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para crear una tabla
$sql = "CREATE TABLE IF NOT EXISTS Ejemplo (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(30) NOT NULL,
    apellido VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

// Ejecuta la consulta
if ($conn->query($sql) === TRUE) {
    echo "Tabla creada exitosamente";
} else {
    echo "Error al crear la tabla: " . $conn->error;
}

// Cierra la conexión
$conn->close();
?>
