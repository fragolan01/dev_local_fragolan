-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-01-2024 a las 20:12:15
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
-- Base de datos: `stock_syscom`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma_ventas_categos`
--

CREATE TABLE `plataforma_ventas_categos` (
  `id` int(11) NOT NULL,
  `id_dominio` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_catego` int(11) DEFAULT NULL,
  `nombre` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma_ventas_envios`
--

CREATE TABLE `plataforma_ventas_envios` (
  `id` int(11) NOT NULL,
  `id_dominio` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_envio` int(11) DEFAULT NULL,
  `costo` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma_ventas_marcas`
--

CREATE TABLE `plataforma_ventas_marcas` (
  `id` int(11) NOT NULL,
  `id_dominio` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `nombre` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma_ventas_plataformas`
--

CREATE TABLE `plataforma_ventas_plataformas` (
  `id` int(11) NOT NULL,
  `id_dominio` int(11) DEFAULT NULL,
  `id_plataforma` int(11) DEFAULT NULL,
  `nombre` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma_ventas_plataformas_publicidad`
--

CREATE TABLE `plataforma_ventas_plataformas_publicidad` (
  `id` int(11) NOT NULL,
  `id_dominio` int(11) DEFAULT NULL,
  `id_plataforma` int(11) DEFAULT NULL,
  `id_campania` int(11) DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `acos` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma_ventas_precio`
--

CREATE TABLE `plataforma_ventas_precio` (
  `id` int(11) NOT NULL,
  `id_dominio` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `precio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma_ventas_productos`
--

CREATE TABLE `plataforma_ventas_productos` (
  `id` int(11) NOT NULL,
  `id_dominio` int(11) DEFAULT NULL,
  `id_plataforma` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_catego` int(11) DEFAULT NULL,
  `id_sub_catego` int(11) DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `modelo` text DEFAULT NULL,
  `num_piezas` int(11) DEFAULT NULL,
  `inventario_minimo` int(11) DEFAULT NULL,
  `precio_venta` decimal(10,0) DEFAULT NULL,
  `descuento` decimal(10,0) DEFAULT NULL,
  `comision_plataforma` decimal(10,0) DEFAULT NULL,
  `fijo_plataforma` decimal(10,0) DEFAULT NULL,
  `id_campania` decimal(10,0) DEFAULT NULL,
  `id_costo_envio` int(11) DEFAULT NULL,
  `url_proveedor_1` text DEFAULT NULL,
  `url_proveedor_2` text DEFAULT NULL,
  `url_proveedor_3` text DEFAULT NULL,
  `url_proveedor_4` text DEFAULT NULL,
  `url_proveedor_5` text DEFAULT NULL,
  `url_proveedor_6` text DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma_ventas_proveedores`
--

CREATE TABLE `plataforma_ventas_proveedores` (
  `id` int(11) NOT NULL,
  `id_dominio` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `nombre` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma_ventas_stock`
--

CREATE TABLE `plataforma_ventas_stock` (
  `id` int(11) NOT NULL,
  `id_dominio` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma_ventas_sub_categos`
--

CREATE TABLE `plataforma_ventas_sub_categos` (
  `id` int(11) NOT NULL,
  `id_dominio` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `id_catego` int(11) DEFAULT NULL,
  `id_sub_catego` int(11) DEFAULT NULL,
  `nombre` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma_ventas_tipo_cambio`
--

CREATE TABLE `plataforma_ventas_tipo_cambio` (
  `id` int(11) NOT NULL,
  `id_dominio` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `normal` decimal(10,0) DEFAULT NULL,
  `preferencial` decimal(10,0) DEFAULT NULL,
  `un_dia` decimal(10,0) DEFAULT NULL,
  `una_semana` decimal(10,0) DEFAULT NULL,
  `dos_semanas` decimal(10,0) DEFAULT NULL,
  `tres_semanas` decimal(10,0) DEFAULT NULL,
  `un_mes` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `plataforma_ventas_categos`
--
ALTER TABLE `plataforma_ventas_categos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plataforma_ventas_envios`
--
ALTER TABLE `plataforma_ventas_envios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plataforma_ventas_marcas`
--
ALTER TABLE `plataforma_ventas_marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plataforma_ventas_plataformas`
--
ALTER TABLE `plataforma_ventas_plataformas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plataforma_ventas_plataformas_publicidad`
--
ALTER TABLE `plataforma_ventas_plataformas_publicidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plataforma_ventas_precio`
--
ALTER TABLE `plataforma_ventas_precio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plataforma_ventas_productos`
--
ALTER TABLE `plataforma_ventas_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plataforma_ventas_proveedores`
--
ALTER TABLE `plataforma_ventas_proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plataforma_ventas_stock`
--
ALTER TABLE `plataforma_ventas_stock`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plataforma_ventas_sub_categos`
--
ALTER TABLE `plataforma_ventas_sub_categos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `plataforma_ventas_tipo_cambio`
--
ALTER TABLE `plataforma_ventas_tipo_cambio`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `plataforma_ventas_categos`
--
ALTER TABLE `plataforma_ventas_categos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plataforma_ventas_envios`
--
ALTER TABLE `plataforma_ventas_envios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plataforma_ventas_marcas`
--
ALTER TABLE `plataforma_ventas_marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plataforma_ventas_plataformas`
--
ALTER TABLE `plataforma_ventas_plataformas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plataforma_ventas_plataformas_publicidad`
--
ALTER TABLE `plataforma_ventas_plataformas_publicidad`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plataforma_ventas_precio`
--
ALTER TABLE `plataforma_ventas_precio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plataforma_ventas_productos`
--
ALTER TABLE `plataforma_ventas_productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plataforma_ventas_proveedores`
--
ALTER TABLE `plataforma_ventas_proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plataforma_ventas_stock`
--
ALTER TABLE `plataforma_ventas_stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plataforma_ventas_sub_categos`
--
ALTER TABLE `plataforma_ventas_sub_categos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plataforma_ventas_tipo_cambio`
--
ALTER TABLE `plataforma_ventas_tipo_cambio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
