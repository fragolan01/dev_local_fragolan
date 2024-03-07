<?php
$id_dominio=9999;
$v7='';

if (!$v7) {
    $v7="despliega";
}

if ($v7=="despliega") {

    $servername = "localhost"; // Servidor de base de datos
    $username = "root"; // Usuario de MySQL
    $password = ""; // Contraseña de MySQL
    $database = "fragcom_develop"; // base de datos
    
    // Conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $database);
    
    // Verifica la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    $sql = 'SHOW TABLES';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los nombres de las tablas
        echo "<h2>Nombres de las tablas en la base de datos:</h2>";
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . $row["Tables_in_" . $database] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "La base de datos no tiene tablas.";
    }    
    
        // Ejecuta la consulta
        if ($conn->query($sql) === TRUE) {
            echo "<br>Las tablas se han creado exitosamente";
        } else {
            echo "Error al crear las tablas: <br><br>" . $conn->error;
        } 
}

    $tabla = 'plataforma_ventas_temp';
    $sql = "SHOW COLUMNS FROM $tabla";

    // $nom_tabla = "titulo";
    // $sql_alter = "alter table $tabla add $nom_tabla TEXT(250)";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los nombres de los campos
        echo "<br> Los campos en la tabla: $tabla <br>";
        while ($row = $result->fetch_assoc()) {
            echo $row['Field'] . "<br>";
        }
    } else {
        echo "No se encontraron campos en la tabla.";
    }
  

// Cierra la conexión
$conn->close();
?>