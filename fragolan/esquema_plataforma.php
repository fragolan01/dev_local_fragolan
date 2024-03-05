<?php
// Conexión a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "fragcom_develop";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión ha fallado: " . $conn->connect_error);
}


// Consulta para obtener las tablas de la base de datos
$sql = "SHOW TABLES";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Crear un array para almacenar la estructura de las tablas
    $schema = '';
    
    // Iterar sobre las tablas y obtener su estructura
    while($row = $result->fetch_row()) {
        $table = $row[0];
        // Consulta para obtener la estructura de la tabla
        $table_sql = "SHOW CREATE TABLE $table";
        $table_result = $conn->query($table_sql);
        
        if ($table_result->num_rows > 0) {
            $table_row = $table_result->fetch_assoc();
            $create_table_query = $table_row["Create Table"];
            // Concatenar la estructura de la tabla al esquema
            $schema .= $create_table_query . ";\n\n";
        }
    }
    
    // Guardar el esquema en un archivo
    file_put_contents('schema.sql', $schema);
    echo "Esquema de base de datos guardado exitosamente en schema.sql";
} else {
    echo "No se encontraron tablas en la base de datos.";
}

$conn->close();

?>


