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

/*
    $servername = "localhost"; // Servidor de base de datos
    $username = "fragcom_syscom"; // Usuario de MySQL
    $password = "S15t3ma5@Fr4g0l4N"; // Contraseña de MySQL
    $database = "fragcom_syscom"; // base de datos
*/

    $servername = "localhost"; // Servidor de base de datos
    $username = "root"; // Usuario de MySQL
    $password = ""; // Contraseña de MySQL
    $database = "api_syscom"; // base de datos


  
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
 
 /*     
    // Consulta para eliminar una tabla
    $tabla = 'plataforma_ventas_productos';
    $sql = "DROP TABLE IF EXISTS $tabla";
    if ($conn->query($sql)=== TRUE){
        echo 'La tabla: '.'<strong>'. $tabla.'</strong>'.' se ha eliminado';
    }else{
        echo "Error al eliminar la tabla".$conn-error;
    }


    // Consulta para crear plataforma_ventas_productos
    $sql = "CREATE TABLE IF NOT EXISTS plataforma_ventas_productos (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_dominio int(11) DEFAULT NULL,
        id_plataforma int(11) DEFAULT NULL,
        id_proveedor int(11) DEFAULT NULL,
        id_marca int(11) DEFAULT NULL,
        id_catego int(11) DEFAULT NULL,
        id_sub_catego int(11) DEFAULT NULL,
        producto text DEFAULT NULL,
        modelo text DEFAULT NULL,
        num_piezas int(11) DEFAULT NULL,
        inventario_minimo int(11) DEFAULT NULL,
        precio_venta decimal(10,0) DEFAULT NULL,
        descuento decimal(10,0) DEFAULT NULL,
        comision_plataforma decimal(10,0) DEFAULT NULL,
        fijo_plataforma decimal(10,0) DEFAULT NULL,
        id_campania decimal(10,0) DEFAULT NULL,
        id_costo_envio int(11) DEFAULT NULL,
        url_proveedor_1 text DEFAULT NULL,
        url_proveedor_2 text DEFAULT NULL,
        url_proveedor_3 text DEFAULT NULL,
        url_proveedor_4 text DEFAULT NULL,
        url_proveedor_5 text DEFAULT NULL,
        url_proveedor_6 text DEFAULT NULL,
        observaciones text DEFAULT NULL
    )";


    // Consulta para crear plataforma_ventas_publicidad
    $sql = "CREATE TABLE IF NOT EXISTS plataforma_ventas_plataformas_publicidad (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_dominio int(11) DEFAULT NULL,
        id_plataforma int(11) DEFAULT NULL,
        id_campania int(11) DEFAULT NULL,
        publicidad text DEFAULT NULL,
        acos decimal(10,0) DEFAULT NULL
    )";



    // Consulta para crear plataforma_ventas_marcas
    $sql = "CREATE TABLE IF NOT EXISTS plataforma_ventas_marcas (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_dominio int(11) DEFAULT NULL,
        id_proveedor int(11) DEFAULT NULL,
        id_marca int(11) DEFAULT NULL,
        marca text DEFAULT NULL
    )";


    // Consulta para crear plataforma_ventas_plataformas
    $sql =  "CREATE TABLE IF NOT EXISTS plataforma_ventas_plataformas (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_dominio int(11) DEFAULT NULL,
        id_plataforma int(11) DEFAULT NULL,
        plataforma text DEFAULT NULL
    )";


    // Consulta para crear plataforma_ventas_sub_categos
    $sql = "CREATE TABLE IF NOT EXISTS plataforma_ventas_sub_categos (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_dominio int(11) DEFAULT NULL,
        id_proveedor int(11) DEFAULT NULL,
        id_catego int(11) DEFAULT NULL,
        id_sub_catego int(11) DEFAULT NULL,
        sub_catego text DEFAULT NULL
    )";



    // Consulta para crear tabla plataforma_ventas_envios
    $sql = "CREATE TABLE IF NOT EXISTS plataforma_ventas_proveedores (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_dominio int(11) DEFAULT NULL,
        id_proveedor int(11) DEFAULT NULL,
        id_envio int(11) DEFAULT NULL,
        envio text DEFAULT NULL,
        costo decimal(10,0) DEFAULT NULL,
        moneda int(11) DEFAULT NULL
    )";

    

    // Consulta para crear tabla plataforma_ventas_categos
    $sql = "CREATE TABLE IF NOT EXISTS plataforma_ventas_categos (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_dominio int(11) DEFAULT NULL,
        id_proveedor int(11) DEFAULT NULL,
        categoria text DEFAULT NULL
        )";
        

    // Consulta para crear plataforma_ventas_precio
    $sql = "CREATE TABLE IF NOT EXISTS plataforma_ventas_precio (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_dominio int(11) DEFAULT NULL,
        id_producto int(11) DEFAULT NULL,
        fecha datetime DEFAULT NULL,
        precio int(11) DEFAULT NULL
    )";


    // Consulta para crear plataforma_ventas_proveedores
    $sql = "CREATE TABLE IF NOT EXISTS plataforma_ventas_proveedores (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_dominio int(11) DEFAULT NULL,
        id_proveedor int(11) DEFAULT NULL,
        nombre text DEFAULT NULL
    )";


    // Consulta para crear plataforma_ventas_stock
    $sql = "CREATE TABLE IF NOT EXISTS plataforma_ventas_stock (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_dominio int(11) DEFAULT NULL,
        id_producto int(11) DEFAULT NULL,
        fecha datetime DEFAULT NULL,
        stock int(11) DEFAULT NULL
    )";
    


    // Consulta para crear plataforma_ventas_tipo_cambio
    $sql = "CREATE TABLE IF NOT EXISTS plataforma_ventas_tipo_cambio (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_dominio int(11) DEFAULT NULL,
        id_producto int(11) DEFAULT NULL,
        fecha datetime DEFAULT NULL,
        normal decimal(10,0) DEFAULT NULL,
        preferencial decimal(10,0) DEFAULT NULL,
        un_dia decimal(10,0) DEFAULT NULL,
        una_semana decimal(10,0) DEFAULT NULL,
        dos_semanas decimal(10,0) DEFAULT NULL,
        tres_semanas decimal(10,0) DEFAULT NULL,
        un_mes decimal(10,0) DEFAULT NULL
    )";

*/    
    
    // Ejecuta la consulta
    if ($conn->query($sql) === TRUE) {
        echo "<br>Las tablas se han creado exitosamente";
    } else {
        echo "Error al crear las tablas: " . $conn->error;
    }
    
    
}
    

// Cierra la conexión
$conn->close();
?>
