<?php

$id_dominio=9999;

if (!$v7) {
    $v7="despliega";
}

if ($v7=="despliega") {
    echo "<br><br>";
    // echo "<b><a href='index.php?v7=actualizar'>AGREGAR &raquo;</a></b>";
    echo "<br><br>";
    echo "<b>CONSULTA BASE DE DATOS :</b>";
    echo "<br><br>";

    $servername = "localhost"; // Servidor de base de datos
    $username = "fragcom_syscom"; // Usuario de MySQL
    $password = "S15t3ma5@Fr4g0l4N"; // Contraseña de MySQL
    $database = "fragcom_syscom"; // base de datos


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



    // Consulta para eliminar una tabla
    // $tabla = 'api_syscom_imagenes';
    // $sql = "DROP TABLE IF EXISTS $tabla";
    // if ($conn->query($sql)=== TRUE){
    //     echo 'La tabla: '.'<strong>'. $tabla.'</strong>'.' se ha eliminado';
    // }else{
    //     echo "Error al eliminar la tabla".$conn-error;
    // }
    


    // Estructura de tabla para la tabla api_syscom_imagenes
    $sql = "CREATE TABLE IF NOT EXISTS api_syscom_imagenes (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        imagen text DEFAULT NULL,
        orden int(11) DEFAULT NULL
    )";




    // Ejecuta la consulta
    if ($conn->query($sql) === TRUE) {
        echo "<br>Las tablas se han creado exitosamente";
    } else {
        echo "Error al crear las tablas: " . $conn->error;
    }

    
    // Cierra la conexión
    $conn->close();
    

}


?>
