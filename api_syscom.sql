-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-02-2024 a las 21:01:59
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `api_syscom`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_categorias`
--

CREATE TABLE `api_syscom_categorias` (
  `id` int(11) NOT NULL,
  `id_categorias` int(11) DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_cfdi`
--

CREATE TABLE `api_syscom_cfdi` (
  `id` int(11) NOT NULL,
  `codigo` text DEFAULT NULL,
  `nombre` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_direcciones_guardadas`
--

CREATE TABLE `api_syscom_direcciones_guardadas` (
  `id` int(11) NOT NULL,
  `id_direccion` int(11) DEFAULT NULL,
  `atencion_a` text DEFAULT NULL,
  `calle` text DEFAULT NULL,
  `num_ext` int(11) DEFAULT NULL,
  `num_int` int(11) DEFAULT NULL,
  `colonia` text DEFAULT NULL,
  `codigo_postal` int(11) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL,
  `pais` text DEFAULT NULL,
  `codigo_estado` text DEFAULT NULL,
  `estado` text DEFAULT NULL,
  `ciudad` text DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_subcuenta` int(11) DEFAULT NULL,
  `tipo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_estado`
--

CREATE TABLE `api_syscom_estado` (
  `id` int(11) NOT NULL,
  `codigo_postal` int(11) DEFAULT NULL,
  `municipio` text DEFAULT NULL,
  `estado_sat` text DEFAULT NULL,
  `zona_extendida` text DEFAULT NULL,
  `estado_nombre` text DEFAULT NULL,
  `codigo_estado` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_existencia`
--

CREATE TABLE `api_syscom_existencia` (
  `id` int(11) NOT NULL,
  `nuevo` int(11) DEFAULT NULL,
  `asterisco` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_facturas`
--

CREATE TABLE `api_syscom_facturas` (
  `id` int(11) NOT NULL,
  `id_obtener_facturas` int(11) DEFAULT NULL,
  `folio_factura` text DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `texto` text DEFAULT NULL,
  `moneda` text DEFAULT NULL,
  `pago_aplicado` decimal(10,2) DEFAULT NULL,
  `estatus_fiscal` text DEFAULT NULL,
  `estatus` text DEFAULT NULL,
  `plazo` int(11) DEFAULT NULL,
  `folio_pedido` text DEFAULT NULL,
  `uuid` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_fleteras`
--

CREATE TABLE `api_syscom_fleteras` (
  `id` int(11) NOT NULL,
  `codigo` text DEFAULT NULL,
  `dia_siguiente` tinyint(1) DEFAULT NULL,
  `nombre` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_forma`
--

CREATE TABLE `api_syscom_forma` (
  `id` int(11) NOT NULL,
  `pue` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_imagenes`
--

CREATE TABLE `api_syscom_imagenes` (
  `id` int(11) NOT NULL,
  `imagen` text DEFAULT NULL,
  `oren` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_marcas`
--

CREATE TABLE `api_syscom_marcas` (
  `id` int(11) NOT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `nombre` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_marcas_id`
--

CREATE TABLE `api_syscom_marcas_id` (
  `id` int(11) NOT NULL,
  `id_marcas` int(11) DEFAULT NULL,
  `id_categorias` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `logo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_marcas_productos`
--

CREATE TABLE `api_syscom_marcas_productos` (
  `id` int(11) NOT NULL,
  `id_marcas` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `pagina` int(11) DEFAULT NULL,
  `paginas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_metodos_de_pago`
--

CREATE TABLE `api_syscom_metodos_de_pago` (
  `id` int(11) NOT NULL,
  `nombre` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_metodo_paynet`
--

CREATE TABLE `api_syscom_metodo_paynet` (
  `id` int(11) NOT NULL,
  `id_forma` int(11) DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `tipo_cambio` text DEFAULT NULL,
  `plazo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_metodo_transferencia`
--

CREATE TABLE `api_syscom_metodo_transferencia` (
  `id` int(11) NOT NULL,
  `id_forma` int(11) DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `tipo_cambio` text DEFAULT NULL,
  `plazo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_obtener_facturas`
--

CREATE TABLE `api_syscom_obtener_facturas` (
  `id` int(11) NOT NULL,
  `total_facturas` int(11) DEFAULT NULL,
  `pagina` int(11) DEFAULT NULL,
  `paginas` int(11) DEFAULT NULL,
  `mostrando` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_origen`
--

CREATE TABLE `api_syscom_origen` (
  `id` int(11) NOT NULL,
  `id_categorias` int(11) DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_paises`
--

CREATE TABLE `api_syscom_paises` (
  `id` int(11) NOT NULL,
  `codigo` text DEFAULT NULL,
  `id_codigo` int(11) DEFAULT NULL,
  `nombre` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_precios`
--

CREATE TABLE `api_syscom_precios` (
  `id` int(11) NOT NULL,
  `precio_1` decimal(10,2) DEFAULT NULL,
  `precio_especial` decimal(10,2) DEFAULT NULL,
  `precio_descuento` decimal(10,2) DEFAULT NULL,
  `precio_lista` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_productos`
--

CREATE TABLE `api_syscom_productos` (
  `id` int(11) NOT NULL,
  `id_marcas` int(11) DEFAULT NULL,
  `id_categorias_id` int(11) DEFAULT NULL,
  `id_unidad_de_medida` int(11) DEFAULT NULL,
  `id_precios` int(11) DEFAULT NULL,
  `id_existencia` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `modelo` text DEFAULT NULL,
  `total_existencia` int(11) DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `marca` text DEFAULT NULL,
  `sat_key` int(11) DEFAULT NULL,
  `img_portada` text DEFAULT NULL,
  `link_privado` text DEFAULT NULL,
  `pvol` decimal(10,2) DEFAULT NULL,
  `marca_logo` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `iconos` text DEFAULT NULL,
  `peso` decimal(10,2) DEFAULT NULL,
  `alto` decimal(10,2) DEFAULT NULL,
  `largo` decimal(10,2) DEFAULT NULL,
  `ancho` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_productos_busqueda`
--

CREATE TABLE `api_syscom_productos_busqueda` (
  `id` int(11) NOT NULL,
  `id_productos` int(11) DEFAULT NULL,
  `pagina` int(11) DEFAULT NULL,
  `paginas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_productos_info`
--

CREATE TABLE `api_syscom_productos_info` (
  `id` int(11) NOT NULL,
  `categorias_id` int(11) DEFAULT NULL,
  `id_unidad_de_medida` int(11) DEFAULT NULL,
  `id_precios` int(11) DEFAULT NULL,
  `id_imagen` int(11) DEFAULT NULL,
  `id_recursos` int(11) DEFAULT NULL,
  `id_existencia` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `modelo` text DEFAULT NULL,
  `total_existencia` int(11) DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `marca` text DEFAULT NULL,
  `sat_key` int(11) DEFAULT NULL,
  `img_portada` text DEFAULT NULL,
  `link_privado` text DEFAULT NULL,
  `pvol` decimal(10,2) DEFAULT NULL,
  `marca_logo` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `iconos` text DEFAULT NULL,
  `peso` decimal(10,2) DEFAULT NULL,
  `alto` decimal(10,2) DEFAULT NULL,
  `largo` decimal(10,2) DEFAULT NULL,
  `ancho` decimal(10,2) DEFAULT NULL,
  `caracteristicas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_productos_relacionados`
--

CREATE TABLE `api_syscom_productos_relacionados` (
  `id` int(11) NOT NULL,
  `id_categorias` int(11) DEFAULT NULL,
  `id_existencia` int(11) DEFAULT NULL,
  `id_unidad_de_medida` int(11) DEFAULT NULL,
  `id_precios` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `modelo` text DEFAULT NULL,
  `total_existencia` int(11) DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `marca` text DEFAULT NULL,
  `sat_key` int(11) DEFAULT NULL,
  `img_portada` text DEFAULT NULL,
  `link_privado` text DEFAULT NULL,
  `pvol` decimal(10,2) DEFAULT NULL,
  `marca_logo` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `iconos` text DEFAULT NULL,
  `peso` decimal(10,2) DEFAULT NULL,
  `alto` decimal(10,2) DEFAULT NULL,
  `largo` decimal(10,2) DEFAULT NULL,
  `ancho` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_recuirsos`
--

CREATE TABLE `api_syscom_recuirsos` (
  `id` int(11) NOT NULL,
  `imagen` text DEFAULT NULL,
  `oren` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_scredito_1`
--

CREATE TABLE `api_syscom_scredito_1` (
  `id` int(11) NOT NULL,
  `id_tipo_de_cambio` int(11) DEFAULT NULL,
  `id_forma` int(11) DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `plazo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_scredito_7`
--

CREATE TABLE `api_syscom_scredito_7` (
  `id` int(11) NOT NULL,
  `id_tipo_de_cambio` int(11) DEFAULT NULL,
  `id_forma` int(11) DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `plazo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_scredito_15`
--

CREATE TABLE `api_syscom_scredito_15` (
  `id` int(11) NOT NULL,
  `id_tipo_de_cambio` int(11) DEFAULT NULL,
  `id_forma` int(11) DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `plazo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_scredito_30`
--

CREATE TABLE `api_syscom_scredito_30` (
  `id` int(11) NOT NULL,
  `id_tipo_de_cambio` int(11) DEFAULT NULL,
  `id_forma` int(11) DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `plazo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_scredito_45`
--

CREATE TABLE `api_syscom_scredito_45` (
  `id` int(11) NOT NULL,
  `id_tipo_de_cambio` int(11) DEFAULT NULL,
  `id_forma` int(11) DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `plazo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_subcategorias`
--

CREATE TABLE `api_syscom_subcategorias` (
  `id` int(11) NOT NULL,
  `id_categorias` int(11) DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_sucursales`
--

CREATE TABLE `api_syscom_sucursales` (
  `id` int(11) NOT NULL,
  `nombre_sucursal` text DEFAULT NULL,
  `calle` text DEFAULT NULL,
  `num_ext` text DEFAULT NULL,
  `num_int` int(11) DEFAULT NULL,
  `codigo_postal` int(11) DEFAULT NULL,
  `colonia` text DEFAULT NULL,
  `estado` text DEFAULT NULL,
  `ciudad` text DEFAULT NULL,
  `pais` text DEFAULT NULL,
  `telefono` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_sucursal_cheque`
--

CREATE TABLE `api_syscom_sucursal_cheque` (
  `id` int(11) NOT NULL,
  `id_forma` int(11) DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `tipo_cambio` text DEFAULT NULL,
  `plazo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_sucursal_credito`
--

CREATE TABLE `api_syscom_sucursal_credito` (
  `id` int(11) NOT NULL,
  `id_forma` int(11) DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `tipo_cambio` text DEFAULT NULL,
  `plazo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_sucursal_debito`
--

CREATE TABLE `api_syscom_sucursal_debito` (
  `id` int(11) NOT NULL,
  `id_forma` int(11) DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `tipo_cambio` text DEFAULT NULL,
  `plazo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_sucursal_efectivo`
--

CREATE TABLE `api_syscom_sucursal_efectivo` (
  `id` int(11) NOT NULL,
  `id_forma` int(11) DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `tipo_cambio` text DEFAULT NULL,
  `plazo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_tipo_de_cambio`
--

CREATE TABLE `api_syscom_tipo_de_cambio` (
  `id` int(11) NOT NULL,
  `normal` decimal(10,2) DEFAULT NULL,
  `preferencial` decimal(10,2) DEFAULT NULL,
  `un_dia` decimal(10,2) DEFAULT NULL,
  `una_semana` decimal(10,2) DEFAULT NULL,
  `dos_semanas` decimal(10,2) DEFAULT NULL,
  `tres_semanas` decimal(10,2) DEFAULT NULL,
  `un_mes` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `api_syscom_unidad_de_medida`
--

CREATE TABLE `api_syscom_unidad_de_medida` (
  `id` int(11) NOT NULL,
  `codigo_unidad` int(11) DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `clave_unidad_sat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `api_syscom_categorias`
--
ALTER TABLE `api_syscom_categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_cfdi`
--
ALTER TABLE `api_syscom_cfdi`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_direcciones_guardadas`
--
ALTER TABLE `api_syscom_direcciones_guardadas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_estado`
--
ALTER TABLE `api_syscom_estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_existencia`
--
ALTER TABLE `api_syscom_existencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_facturas`
--
ALTER TABLE `api_syscom_facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_fleteras`
--
ALTER TABLE `api_syscom_fleteras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_forma`
--
ALTER TABLE `api_syscom_forma`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_imagenes`
--
ALTER TABLE `api_syscom_imagenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_marcas`
--
ALTER TABLE `api_syscom_marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_marcas_id`
--
ALTER TABLE `api_syscom_marcas_id`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_marcas_productos`
--
ALTER TABLE `api_syscom_marcas_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_metodos_de_pago`
--
ALTER TABLE `api_syscom_metodos_de_pago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_metodo_paynet`
--
ALTER TABLE `api_syscom_metodo_paynet`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_metodo_transferencia`
--
ALTER TABLE `api_syscom_metodo_transferencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_obtener_facturas`
--
ALTER TABLE `api_syscom_obtener_facturas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_origen`
--
ALTER TABLE `api_syscom_origen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_paises`
--
ALTER TABLE `api_syscom_paises`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_precios`
--
ALTER TABLE `api_syscom_precios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_productos`
--
ALTER TABLE `api_syscom_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_productos_busqueda`
--
ALTER TABLE `api_syscom_productos_busqueda`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_productos_info`
--
ALTER TABLE `api_syscom_productos_info`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_productos_relacionados`
--
ALTER TABLE `api_syscom_productos_relacionados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_recuirsos`
--
ALTER TABLE `api_syscom_recuirsos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_scredito_1`
--
ALTER TABLE `api_syscom_scredito_1`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_scredito_7`
--
ALTER TABLE `api_syscom_scredito_7`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_scredito_15`
--
ALTER TABLE `api_syscom_scredito_15`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_scredito_30`
--
ALTER TABLE `api_syscom_scredito_30`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_scredito_45`
--
ALTER TABLE `api_syscom_scredito_45`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_subcategorias`
--
ALTER TABLE `api_syscom_subcategorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_sucursales`
--
ALTER TABLE `api_syscom_sucursales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_sucursal_cheque`
--
ALTER TABLE `api_syscom_sucursal_cheque`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_sucursal_credito`
--
ALTER TABLE `api_syscom_sucursal_credito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_sucursal_debito`
--
ALTER TABLE `api_syscom_sucursal_debito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_sucursal_efectivo`
--
ALTER TABLE `api_syscom_sucursal_efectivo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_tipo_de_cambio`
--
ALTER TABLE `api_syscom_tipo_de_cambio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `api_syscom_unidad_de_medida`
--
ALTER TABLE `api_syscom_unidad_de_medida`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `api_syscom_categorias`
--
ALTER TABLE `api_syscom_categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_cfdi`
--
ALTER TABLE `api_syscom_cfdi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_direcciones_guardadas`
--
ALTER TABLE `api_syscom_direcciones_guardadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_estado`
--
ALTER TABLE `api_syscom_estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_existencia`
--
ALTER TABLE `api_syscom_existencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_facturas`
--
ALTER TABLE `api_syscom_facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_fleteras`
--
ALTER TABLE `api_syscom_fleteras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_forma`
--
ALTER TABLE `api_syscom_forma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_imagenes`
--
ALTER TABLE `api_syscom_imagenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_marcas`
--
ALTER TABLE `api_syscom_marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_marcas_id`
--
ALTER TABLE `api_syscom_marcas_id`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_marcas_productos`
--
ALTER TABLE `api_syscom_marcas_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_metodos_de_pago`
--
ALTER TABLE `api_syscom_metodos_de_pago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_metodo_paynet`
--
ALTER TABLE `api_syscom_metodo_paynet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_metodo_transferencia`
--
ALTER TABLE `api_syscom_metodo_transferencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_obtener_facturas`
--
ALTER TABLE `api_syscom_obtener_facturas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_origen`
--
ALTER TABLE `api_syscom_origen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_paises`
--
ALTER TABLE `api_syscom_paises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_precios`
--
ALTER TABLE `api_syscom_precios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_productos`
--
ALTER TABLE `api_syscom_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_productos_busqueda`
--
ALTER TABLE `api_syscom_productos_busqueda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_productos_info`
--
ALTER TABLE `api_syscom_productos_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_productos_relacionados`
--
ALTER TABLE `api_syscom_productos_relacionados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_recuirsos`
--
ALTER TABLE `api_syscom_recuirsos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_scredito_1`
--
ALTER TABLE `api_syscom_scredito_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_scredito_7`
--
ALTER TABLE `api_syscom_scredito_7`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_scredito_15`
--
ALTER TABLE `api_syscom_scredito_15`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_scredito_30`
--
ALTER TABLE `api_syscom_scredito_30`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_scredito_45`
--
ALTER TABLE `api_syscom_scredito_45`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_subcategorias`
--
ALTER TABLE `api_syscom_subcategorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_sucursales`
--
ALTER TABLE `api_syscom_sucursales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_sucursal_cheque`
--
ALTER TABLE `api_syscom_sucursal_cheque`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_sucursal_credito`
--
ALTER TABLE `api_syscom_sucursal_credito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_sucursal_debito`
--
ALTER TABLE `api_syscom_sucursal_debito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_sucursal_efectivo`
--
ALTER TABLE `api_syscom_sucursal_efectivo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_tipo_de_cambio`
--
ALTER TABLE `api_syscom_tipo_de_cambio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `api_syscom_unidad_de_medida`
--
ALTER TABLE `api_syscom_unidad_de_medida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
