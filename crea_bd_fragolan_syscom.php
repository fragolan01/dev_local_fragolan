<?php
$id_dominio=9999;

if (!$v7) {
    $v7="despliega";
}

if ($v7=="despliega") {
    echo "<br><br>";
    echo "<b><a href='index.php?v7=actualizar'>AGREGAR &raquo;</a></b>";
    echo "<br><br>";
    echo "<b>CONSULTA:</b>";
    echo "<br><br>";

    $servername = "localhost"; // Cambia esto por tu servidor de base de datos
    $username = "fragcom_develop"; // Cambia esto por tu nombre de usuario de MySQL
    $password = "S15t3ma5@Fr4g0l4N"; // Cambia esto por tu contraseña de MySQL
    $database = "fragcom_develop"; // Cambia esto por el nombre de tu base de datos
    
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
    
    }


// Conexión a la base de datos
// $conn = new mysqli($servername, $username, $password, $database);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


// Cierra la conexión
$conn->close();
?>
