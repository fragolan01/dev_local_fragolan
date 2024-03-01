-- Conectar con Mysql
-- mysql -u root -p

-- Creacion base de datos
CREATE DATABASE fragcom_syscom;
CREATE DATABASE fragcom_develop;


-- Acceder a base de datos
USE api_syscom;

-- Ver las tablas de BD
SHOW TABLES;

-- Describiendo la tabla
/* DESCRIBE nombre_tabla; */

-- Eliminar una tabla
DROP TABLE subcategorias;

-- Creacion de tablas
CREATE TABLE api_syscom_categorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_categorias INT,
    nombre TEXT,
    nivel INT
);


CREATE TABLE api_syscom_origen (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_categorias INT,
    nombre TEXT,
    nivel INT
);


CREATE TABLE api_syscom_subcategorias (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_categorias INT,
    nombre TEXT,
    nivel INT
);


CREATE TABLE api_syscom_obtener_facturas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    total_facturas INT,
    pagina INT,
    paginas INT,
    mostrando INT  
);


CREATE TABLE api_syscom_facturas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_obtener_facturas INT,
    folio_factura TEXT,
    fecha DATETIME,
    total DECIMAL(10,2),
    texto TEXT,
    moneda TEXT,
    pago_aplicado DECIMAL(10,2),
    estatus_fiscal TEXT,
    estatus TEXT,
    plazo INT,
    folio_pedido TEXT,
    uuid TEXT
);


CREATE TABLE api_syscom_marcas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_marca INT,
    nombre TEXT
);


CREATE TABLE api_syscom_marcas_id (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_marcas INT,
    id_categorias INT,
    descripcion TEXT,
    titulo TEXT,
    logo TEXT
);


CREATE TABLE api_syscom_marcas_productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_marcas INT,
    cantidad INT,
    pagina INT,
    paginas INT
);


CREATE TABLE api_syscom_productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_marcas INT,
    id_categorias_id INT,
    id_unidad_de_medida INT,
    id_precios INT,
    id_existencia INT,
    producto_id INT,
    modelo TEXT,
    total_existencia INT,
    titulo TEXT,
    marca TEXT,
    sat_key INT,
    img_portada TEXT,
    link_privado TEXT,
    pvol DECIMAL(10,2),
    marca_logo TEXT,
    link TEXT,
    iconos TEXT,
    peso DECIMAL(10,2),
    alto DECIMAL(10,2),
    largo DECIMAL(10,2),
    ancho DECIMAL(10,2)
);


CREATE TABLE api_syscom_unidad_de_medida (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo_unidad INT,
    nombre TEXT,
    clave_unidad_sat TEXT
);


CREATE TABLE api_syscom_precios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    precio_1 DECIMAL(10,2),
    precio_especial DECIMAL(10,2),
    precio_descuento DECIMAL(10,2),
    precio_lista DECIMAL(10,2)
);


CREATE TABLE api_syscom_productos_busqueda (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_productos INT,
    pagina INT,
    paginas INT
);


CREATE TABLE api_syscom_productos_info (
    id INT AUTO_INCREMENT PRIMARY KEY,
    categorias_id INT,
    id_unidad_de_medida INT,
    id_precios INT,
    id_imagen INT,
    id_recursos INT,
    id_existencia INT,
    id_producto INT,
    modelo TEXT,
    total_existencia INT,
    titulo TEXT,
    marca TEXT,
    sat_key INT,
    img_portada TEXT,
    link_privado TEXT,
    pvol DECIMAL(10,2),
    marca_logo TEXT,
    link TEXT,
    descripcion TEXT,
    iconos TEXT,
    peso DECIMAL(10,2),
    alto DECIMAL(10,2),
    largo DECIMAL(10,2),
    ancho DECIMAL(10,2),
    caracteristicas TEXT
);


CREATE TABLE api_syscom_imagenes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagen TEXT,
    oren INT
);



CREATE TABLE api_syscom_recuirsos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    imagen TEXT,
    oren INT
);


CREATE TABLE api_syscom_existencia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nuevo INT,
    asterisco INT
);


CREATE TABLE api_syscom_productos_relacionados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_categorias INT,
    id_existencia INT,
    id_unidad_de_medida INT,
    id_precios INT,
    id_producto INT,
    modelo TEXT,
    total_existencia INT,
    titulo TEXT,
    marca TEXT,
    sat_key INT,
    img_portada TEXT,
    link_privado TEXT,
    pvol DECIMAL (10,2),
    marca_logo TEXT,
    link TEXT,
    iconos TEXT,
    peso DECIMAL(10,2),
    alto DECIMAL(10,2),
    largo DECIMAL(10,2),
    ancho DECIMAL(10,2)
);



CREATE TABLE api_syscom_tipo_de_cambio (
    id INT AUTO_INCREMENT PRIMARY KEY,
    normal DECIMAL(10,2),
    preferencial DECIMAL(10,2),
    un_dia DECIMAL(10,2),
    una_semana DECIMAL(10,2),
    dos_semanas DECIMAL(10,2),
    tres_semanas DECIMAL(10,2),
    un_mes DECIMAL(10,2)
);



CREATE TABLE api_syscom_direcciones_guardadas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_direccion INT,
    atencion_a TEXT,
    calle TEXT,
    num_ext INT,
    num_int INT,
    colonia TEXT,
    codigo_postal INT,
    id_pais INT,
    pais TEXT,
    codigo_estado TEXT,
    estado TEXT,
    ciudad TEXT,
    telefono INT,
    id_cliente INT,
    id_subcuenta INT,
    tipo TEXT
);



CREATE TABLE api_syscom_paises (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo TEXT,
    id_codigo INT,
    nombre TEXT
);



CREATE TABLE api_syscom_estado (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo_postal INT,
    municipio TEXT,
    estado_sat TEXT,
    zona_extendida TEXT,
    estado_nombre TEXT,
    codigo_estado TEXT

);



CREATE TABLE api_syscom_metodos_de_pago (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre TEXT
);



CREATE TABLE api_syscom_forma (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pue INT
);


CREATE TABLE api_syscom_metodo_transferencia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_forma INT,
    titulo TEXT,
    codigo INT,
    descuento INT,
    tipo_cambio TEXT,
    plazo INT
);



CREATE TABLE api_syscom_metodo_paynet (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_forma INT,
    titulo TEXT,
    codigo INT,
    descuento INT,
    tipo_cambio TEXT,
    plazo INT
);


CREATE TABLE api_syscom_sucursal_efectivo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_forma INT,
    titulo TEXT,
    codigo INT,
    descuento INT,
    tipo_cambio TEXT,
    plazo INT
);



CREATE TABLE api_syscom_sucursal_cheque (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_forma INT,
    titulo TEXT,
    codigo INT,
    descuento INT,
    tipo_cambio TEXT,
    plazo INT
);


CREATE TABLE api_syscom_sucursal_credito (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_forma INT,
    titulo TEXT,
    codigo INT,
    descuento INT,
    tipo_cambio TEXT,
    plazo INT
);


CREATE TABLE api_syscom_sucursal_debito (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_forma INT,
    titulo TEXT,
    codigo INT,
    descuento INT,
    tipo_cambio TEXT,
    plazo INT
);


CREATE TABLE api_syscom_scredito_1 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_tipo_de_cambio INT,
    id_forma INT,
    titulo TEXT,
    codigo INT,
    descuento INT,
    plazo INT
);



CREATE TABLE api_syscom_scredito_7 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_tipo_de_cambio INT,
    id_forma INT,
    titulo TEXT,
    codigo INT,
    descuento INT,
    plazo INT
);


CREATE TABLE api_syscom_scredito_15 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_tipo_de_cambio INT,
    id_forma INT,
    titulo TEXT,
    codigo INT,
    descuento INT,
    plazo INT
);



CREATE TABLE api_syscom_scredito_30 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_tipo_de_cambio INT,
    id_forma INT,
    titulo TEXT,
    codigo INT,
    descuento INT,
    plazo INT
);


CREATE TABLE api_syscom_scredito_45 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_tipo_de_cambio INT,
    id_forma INT,
    titulo TEXT,
    codigo INT,
    descuento INT,
    plazo INT
);


CREATE TABLE api_syscom_fleteras (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo TEXT,
    dia_siguiente BOOLEAN,
    nombre TEXT
);


CREATE TABLE api_syscom_sucursales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre_sucursal TEXT,
    calle TEXT,
    num_ext TEXT,
    num_int INT,
    codigo_postal INT,
    colonia TEXT,
    estado TEXT,
    ciudad TEXT,
    pais TEXT,
    telefono TEXT
);


CREATE TABLE api_syscom_cfdi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    codigo TEXT,
    nombre TEXT
);
