<?php
$id_dominio=9999;

$v7='';
if (!$v7) {
    $v7="despliega";
}

if ($v7=="despliega") {
    echo "<br><br>";
    echo "<b><a href='index.php?v7=actualizar'>AGREGAR &raquo;</a></b>";
    echo "<br><br>";
    echo "<b>CONSULTA:</b>";
    echo "<br><br>";

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


    // Estructura de tabla para la tabla api_syscom_categorias
    $sql =  "CREATE TABLE IF NOT EXISTS api_syscom_categorias (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_categorias int(11) DEFAULT NULL,
        nombre text DEFAULT NULL,
        nivel int(11) DEFAULT NULL
    )";
  
    // Estructura de tabla para la tabla api_syscom_cfdi
    $sql =  " CREATE TABLE IF NOT EXISTS api_syscom_cfdi (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        codigo text DEFAULT NULL,
        nombre text DEFAULT NULL
    )";
  

    // Estructura de tabla para la tabla api_syscom_direcciones_guardadas
    $sql =  " CREATE TABLE IF NOT EXISTS api_syscom_direcciones_guardadas (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_direccion int(11) DEFAULT NULL,
        atencion_a text DEFAULT NULL,
        calle text DEFAULT NULL,
        num_ext int(11) DEFAULT NULL,
        num_int int(11) DEFAULT NULL,
        colonia text DEFAULT NULL,
        codigo_postal int(11) DEFAULT NULL,
        id_pais int(11) DEFAULT NULL,
        pais text DEFAULT NULL,
        codigo_estado text DEFAULT NULL,
        estado text DEFAULT NULL,
        ciudad text DEFAULT NULL,
        telefono int(11) DEFAULT NULL,
        id_cliente int(11) DEFAULT NULL,
        id_subcuenta int(11) DEFAULT NULL,
        tipo text DEFAULT NULL
    )";


    // Estructura de tabla para la tabla api_syscom_estado
    $sql =  " CREATE TABLE IF NOT EXISTS api_syscom_estado (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        codigo_postal int(11) DEFAULT NULL,
        municipio text DEFAULT NULL,
        estado_sat text DEFAULT NULL,
        zona_extendida text DEFAULT NULL,
        estado_nombre text DEFAULT NULL,
        codigo_estado text DEFAULT NULL
      )"; 


    // Estructura de tabla para la tabla api_syscom_existencia
    $sql =  " CREATE TABLE IF NOT EXISTS api_syscom_existencia (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        nuevo int(11) DEFAULT NULL,
        asterisco int(11) DEFAULT NULL
    )";


    // Estructura de tabla para la tabla api_syscom_facturas
    $sql ="CREATE TABLE IF NOT EXISTS api_syscom_facturas (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_obtener_facturas int(11) DEFAULT NULL,
        folio_factura text DEFAULT NULL,
        fecha datetime DEFAULT NULL,
        total decimal(10,2) DEFAULT NULL,
        texto text DEFAULT NULL,
        moneda text DEFAULT NULL,
        pago_aplicado decimal(10,2) DEFAULT NULL,
        estatus_fiscal text DEFAULT NULL,
        estatus text DEFAULT NULL,
        plazo int(11) DEFAULT NULL,
        folio_pedido text DEFAULT NULL,
        uuid text DEFAULT NULL
      )";
      

// Estructura de tabla para la tabla api_syscom_fleteras
    $sql ="CREATE TABLE IF NOT EXISTS api_syscom_fleteras (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        codigo text DEFAULT NULL,
        dia_siguiente tinyint(1) DEFAULT NULL,
        nombre text DEFAULT NULL
    )";
  


// Estructura de tabla para la tabla api_syscom_forma
    $sql ="CREATE TABLE IF NOT EXISTS api_syscom_forma (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        pue int(11) DEFAULT NULL
    )";
  


// Estructura de tabla para la tabla api_syscom_imagenes
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_imagenes (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    imagen text DEFAULT NULL,
    oren int(11) DEFAULT NULL
  )";
  


//  Estructura de tabla para la tabla api_syscom_marcas
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_marcas (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_marca int(11) DEFAULT NULL,
    nombre text DEFAULT NULL
  )";
  


// Estructura de tabla para la tabla api_syscom_marcas_id
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_marcas_id (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_marcas int(11) DEFAULT NULL,
    id_categorias int(11) DEFAULT NULL,
    descripcion text DEFAULT NULL,
    titulo text DEFAULT NULL,
    logo text DEFAULT NULL
  )";
  

//  Estructura de tabla para la tabla api_syscom_marcas_productos
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_marcas_productos (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_marcas int(11) DEFAULT NULL,
    cantidad int(11) DEFAULT NULL,
    pagina int(11) DEFAULT NULL,
    paginas int(11) DEFAULT NULL
  )";
  

// Estructura de tabla para la tabla api_syscom_metodos_de_pago
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_metodos_de_pago (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombre text DEFAULT NULL
  )";
  


// Estructura de tabla para la tabla api_syscom_metodo_paynet
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_metodo_paynet (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_forma int(11) DEFAULT NULL,
    titulo text DEFAULT NULL,
    codigo int(11) DEFAULT NULL,
    descuento int(11) DEFAULT NULL,
    tipo_cambio text DEFAULT NULL,
    plazo int(11) DEFAULT NULL
  )";
  

// Estructura de tabla para la tabla api_syscom_metodo_transferencia
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_metodo_transferencia (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_forma int(11) DEFAULT NULL,
    titulo text DEFAULT NULL,
    codigo int(11) DEFAULT NULL,
    descuento int(11) DEFAULT NULL,
    tipo_cambio text DEFAULT NULL,
    plazo int(11) DEFAULT NULL
  )";
  


// Estructura de tabla para la tabla api_syscom_obtener_facturas
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_obtener_facturas (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    total_facturas int(11) DEFAULT NULL,
    pagina int(11) DEFAULT NULL,
    paginas int(11) DEFAULT NULL,
    mostrando int(11) DEFAULT NULL
  )";


// Estructura de tabla para la tabla api_syscom_origen
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_origen (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_categorias int(11) DEFAULT NULL,
    nombre text DEFAULT NULL,
    nivel int(11) DEFAULT NULL
  )";
  


// Estructura de tabla para la tabla api_syscom_paises
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_paises (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    codigo text DEFAULT NULL,
    id_codigo int(11) DEFAULT NULL,
    nombre text DEFAULT NULL
  )";
  


// Estructura de tabla para la tabla api_syscom_precios
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_precios (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    precio_1 decimal(10,2) DEFAULT NULL,
    precio_especial decimal(10,2) DEFAULT NULL,
    precio_descuento decimal(10,2) DEFAULT NULL,
    precio_lista decimal(10,2) DEFAULT NULL
  )";
  


// Estructura de tabla para la tabla api_syscom_productos
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_productos (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_marcas int(11) DEFAULT NULL,
    id_categorias_id int(11) DEFAULT NULL,
    id_unidad_de_medida int(11) DEFAULT NULL,
    id_precios int(11) DEFAULT NULL,
    id_existencia int(11) DEFAULT NULL,
    producto_id int(11) DEFAULT NULL,
    modelo text DEFAULT NULL,
    total_existencia int(11) DEFAULT NULL,
    titulo text DEFAULT NULL,
    marca text DEFAULT NULL,
    sat_key int(11) DEFAULT NULL,
    img_portada text DEFAULT NULL,
    link_privado text DEFAULT NULL,
    pvol decimal(10,2) DEFAULT NULL,
    marca_logo text DEFAULT NULL,
    link text DEFAULT NULL,
    iconos text DEFAULT NULL,
    peso decimal(10,2) DEFAULT NULL,
    alto decimal(10,2) DEFAULT NULL,
    largo decimal(10,2) DEFAULT NULL,
    ancho decimal(10,2) DEFAULT NULL
  )";



// Estructura de tabla para la tabla api_syscom_productos_busqueda
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_productos_busqueda (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_productos int(11) DEFAULT NULL,
    pagina int(11) DEFAULT NULL,
    paginas int(11) DEFAULT NULL
  )";



// Estructura de tabla para la tabla api_syscom_productos_info
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_productos_info (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    categorias_id int(11) DEFAULT NULL,
    id_unidad_de_medida int(11) DEFAULT NULL,
    id_precios int(11) DEFAULT NULL,
    id_imagen int(11) DEFAULT NULL,
    id_recursos int(11) DEFAULT NULL,
    id_existencia int(11) DEFAULT NULL,
    id_producto int(11) DEFAULT NULL,
    modelo text DEFAULT NULL,
    total_existencia int(11) DEFAULT NULL,
    titulo text DEFAULT NULL,
    marca text DEFAULT NULL,
    sat_key int(11) DEFAULT NULL,
    img_portada text DEFAULT NULL,
    link_privado text DEFAULT NULL,
    pvol decimal(10,2) DEFAULT NULL,
    marca_logo text DEFAULT NULL,
    link text DEFAULT NULL,
    descripcion text DEFAULT NULL,
    iconos text DEFAULT NULL,
    peso decimal(10,2) DEFAULT NULL,
    alto decimal(10,2) DEFAULT NULL,
    largo decimal(10,2) DEFAULT NULL,
    ancho decimal(10,2) DEFAULT NULL,
    caracteristicas text DEFAULT NULL
  )";


// Estructura de tabla para la tabla api_syscom_productos_relacionados
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_productos_relacionados (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_categorias int(11) DEFAULT NULL,
    id_existencia int(11) DEFAULT NULL,
    id_unidad_de_medida int(11) DEFAULT NULL,
    id_precios int(11) DEFAULT NULL,
    id_producto int(11) DEFAULT NULL,
    modelo text DEFAULT NULL,
    total_existencia int(11) DEFAULT NULL,
    titulo text DEFAULT NULL,
    marca text DEFAULT NULL,
    sat_key int(11) DEFAULT NULL,
    img_portada text DEFAULT NULL,
    link_privado text DEFAULT NULL,
    pvol decimal(10,2) DEFAULT NULL,
    marca_logo text DEFAULT NULL,
    link text DEFAULT NULL,
    iconos text DEFAULT NULL,
    peso decimal(10,2) DEFAULT NULL,
    alto decimal(10,2) DEFAULT NULL,
    largo decimal(10,2) DEFAULT NULL,
    ancho decimal(10,2) DEFAULT NULL
  )";
  

// Estructura de tabla para la tabla api_syscom_recuirsos
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_recuirsos (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    imagen text DEFAULT NULL,
    oren int(11) DEFAULT NULL
  )";
  


// Estructura de tabla para la tabla api_syscom_scredito_1
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_scredito_1 (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_tipo_de_cambio int(11) DEFAULT NULL,
    id_forma int(11) DEFAULT NULL,
    titulo text DEFAULT NULL,
    codigo int(11) DEFAULT NULL,
    descuento int(11) DEFAULT NULL,
    plazo int(11) DEFAULT NULL
  )";


// Estructura de tabla para la tabla api_syscom_scredito_7
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_scredito_7 (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_tipo_de_cambio int(11) DEFAULT NULL,
    id_forma int(11) DEFAULT NULL,
    titulo text DEFAULT NULL,
    codigo int(11) DEFAULT NULL,
    descuento int(11) DEFAULT NULL,
    plazo int(11) DEFAULT NULL
  )";
  


// Estructura de tabla para la tabla api_syscom_scredito_15
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_scredito_15 (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_tipo_de_cambio int(11) DEFAULT NULL,
    id_forma int(11) DEFAULT NULL,
    titulo text DEFAULT NULL,
    codigo int(11) DEFAULT NULL,
    descuento int(11) DEFAULT NULL,
    plazo int(11) DEFAULT NULL
  )";


    // Estructura de tabla para la tabla api_syscom_scredito_30
    $sql ="CREATE TABLE IF NOT EXISTS api_syscom_scredito_30 (
        id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
        id_tipo_de_cambio int(11) DEFAULT NULL,
        id_forma int(11) DEFAULT NULL,
        titulo text DEFAULT NULL,
        codigo int(11) DEFAULT NULL,
        descuento int(11) DEFAULT NULL,
        plazo int(11) DEFAULT NULL
    )";
  


// Estructura de tabla para la tabla api_syscom_scredito_45
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_scredito_45 (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_tipo_de_cambio int(11) DEFAULT NULL,
    id_forma int(11) DEFAULT NULL,
    titulo text DEFAULT NULL,
    codigo int(11) DEFAULT NULL,
    descuento int(11) DEFAULT NULL,
    plazo int(11) DEFAULT NULL
  )";
  


// Estructura de tabla para la tabla api_syscom_subcategorias
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_subcategorias (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_categorias int(11) DEFAULT NULL,
    nombre text DEFAULT NULL,
    nivel int(11) DEFAULT NULL
  )";
  


// Estructura de tabla para la tabla api_syscom_sucursales
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_sucursales (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    nombre_sucursal text DEFAULT NULL,
    calle text DEFAULT NULL,
    num_ext text DEFAULT NULL,
    num_int int(11) DEFAULT NULL,
    codigo_postal int(11) DEFAULT NULL,
    colonia text DEFAULT NULL,
    estado text DEFAULT NULL,
    ciudad text DEFAULT NULL,
    pais text DEFAULT NULL,
    telefono text DEFAULT NULL
  )";
  


// Estructura de tabla para la tabla api_syscom_sucursal_cheque
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_sucursal_cheque (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_forma int(11) DEFAULT NULL,
    titulo text DEFAULT NULL,
    codigo int(11) DEFAULT NULL,
    descuento int(11) DEFAULT NULL,
    tipo_cambio text DEFAULT NULL,
    plazo int(11) DEFAULT NULL
  )";
  

// Estructura de tabla para la tabla api_syscom_sucursal_credito
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_sucursal_credito (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_forma int(11) DEFAULT NULL,
    titulo text DEFAULT NULL,
    codigo int(11) DEFAULT NULL,
    descuento int(11) DEFAULT NULL,
    tipo_cambio text DEFAULT NULL,
    plazo int(11) DEFAULT NULL
  )";
  


// Estructura de tabla para la tabla api_syscom_sucursal_efectivo
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_sucursal_efectivo (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    id_forma int(11) DEFAULT NULL,
    titulo text DEFAULT NULL,
    codigo int(11) DEFAULT NULL,
    descuento int(11) DEFAULT NULL,
    tipo_cambio text DEFAULT NULL,
    plazo int(11) DEFAULT NULL
  )";
  

// Estructura de tabla para la tabla api_syscom_tipo_de_cambio
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_tipo_de_cambio (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    normal decimal(10,2) DEFAULT NULL,
    preferencial decimal(10,2) DEFAULT NULL,
    un_dia decimal(10,2) DEFAULT NULL,
    una_semana decimal(10,2) DEFAULT NULL,
    dos_semanas decimal(10,2) DEFAULT NULL,
    tres_semanas decimal(10,2) DEFAULT NULL,
    un_mes decimal(10,2) DEFAULT NULL
  )";
  

// Estructura de tabla para la tabla api_syscom_unidad_de_medida
$sql ="CREATE TABLE IF NOT EXISTS api_syscom_unidad_de_medida (
    id int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    codigo_unidad int(11) DEFAULT NULL,
    nombre text DEFAULT NULL,
    clave_unidad_sat text DEFAULT NULL
  )";
  
*/



    // Ejecuta la consulta
    if ($conn->query($sql) === TRUE) {
        echo "<br>Las tablas se han creado exitosamente";
    } else {
        echo "\n Error al crear las tablas: " . $conn->error;
    }


    
    
}
    

// Cierra la conexión
$conn->close();
?>
