<?php

// Datos de conexión a la base de datos
$servername = "localhost"; // Servidor local
$username = "root"; // usurio root
$password = ""; // password mysql
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
    // Mostrar nombres tablas
    echo "<h2>Nombre de las tablas de la base de datos </h2>";
    echo "<ul>";
    while($row = $result->fetch_assoc()){
        echo "<li>".$row["Tables_in_".$database]."</li>";
    }
    echo"</ul>";

    } else {
        echo "La base de datos no tiene tablas.";

    }

/*
    // Consulta para eliminar una tabla
    $tabla = 'plataforma_ventas_tipo_cambio';
    $sql = "DROP TABLE IF EXISTS $tabla";
    if ($conn->query($sql)=== TRUE){
        echo 'La tabla: '.'<strong>'. $tabla.'</strong>'.' se ha eliminado';
    }else{
        echo "Error al eliminar la tabla".$conn-error;
    }
*/
    // Consulta para crear tabla plataforma_ventas_categos
    $sql = "CREATE TABLE IF NOT EXISTS plataforma_ventas_categos (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_dominio int(11) DEFAULT NULL,
        id_proveedor int(11) DEFAULT NULL,
        nombre text DEFAULT NULL,
        )";

    
    // Consulta para crear tabla plataforma_ventas_envios
    $sql = "CREATE TABLE IF NOT EXISTS plataforma_ventas_envios (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        id_dominio int(11) DEFAULT NULL,
        id_proveedor int(11) DEFAULT NULL,
        id_envio int(11) DEFAULT NULL,
        costo decimal(10,0) DEFAULT NULL
    )";


    // Consulta para crear plataforma_ventas_marcas
    $sql = "CREATE TABLE IF NOT EXISTS plataforma_ventas_marcas (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_dominio int(11) DEFAULT NULL,
        id_proveedor int(11) DEFAULT NULL,
        id_marca int(11) DEFAULT NULL,
        nombre text DEFAULT NULL
    )";


    // Consulta para crear plataforma_ventas_plataformas
    $sql =  "CREATE TABLE TABLE IF NOT EXISTS plataforma_ventas_plataformas (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_dominio int(11) DEFAULT NULL,
        id_plataforma int(11) DEFAULT NULL,
        nombre text DEFAULT NULL
    )";


    // Consulta para crear plataforma_ventas_publicidad
    $sql = "CREATE TABLE IF NOT EXISTS plataforma_ventas_plataformas_publicidad (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_dominio int(11) DEFAULT NULL,
        id_plataforma int(11) DEFAULT NULL,
        id_campania int(11) DEFAULT NULL,
        nombre text DEFAULT NULL,
        acos decimal(10,0) DEFAULT NULL
    )";


    // Consulta para crear plataforma_ventas_precio
    $sql = "CREATE TABLE IF NOT EXISTS plataforma_ventas_precio (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_dominio int(11) DEFAULT NULL,
        id_producto int(11) DEFAULT NULL,
        fecha datetime DEFAULT NULL,
        precio int(11) DEFAULT NULL
    )";


    // Consulta para crear plataforma_ventas_productos
    $sql = "CREATE TABLE IF NOT EXISTS plataforma_ventas_productos (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_dominio int(11) DEFAULT NULL,
        id_plataforma int(11) DEFAULT NULL,
        id_proveedor int(11) DEFAULT NULL,
        id_marca int(11) DEFAULT NULL,
        id_catego int(11) DEFAULT NULL,
        id_sub_catego int(11) DEFAULT NULL,
        nombre text DEFAULT NULL,
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
  

    // Consulta para crear plataforma_ventas_sub_categos
    $sql = "CREATE TABLE IF NOT EXISTS plataforma_ventas_sub_categos (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_dominio int(11) DEFAULT NULL,
        id_proveedor int(11) DEFAULT NULL,
        id_catego int(11) DEFAULT NULL,
        id_sub_catego int(11) DEFAULT NULL,
        nombre text DEFAULT NULL
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

  // Ejecuta la consulta
    if ($conn->query($sql) === TRUE) {
        echo "<br>Las tablas se han creado exitosamente";
    } else {
        echo "Error al crear las tablas: " . $conn->error;
    }

// Cierra la conexión
$conn->close();

?>
