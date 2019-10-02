-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-10-2019 a las 19:53:37
-- Versión del servidor: 10.1.29-MariaDB
-- Versión de PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rest_app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambiente`
--

CREATE TABLE `ambiente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ambiente`
--

INSERT INTO `ambiente` (`id`, `nombre`, `descripcion`) VALUES
(1, 'AMBIENTE 01', 'AMBIENTE UBICADO EN LA ENTRADA DEL LOCAL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta`
--

CREATE TABLE `carta` (
  `id` int(11) NOT NULL,
  `version` varchar(10) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `tipo_carta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carta`
--

INSERT INTO `carta` (`id`, `version`, `fecha`, `estado`, `tipo_carta_id`) VALUES
(1, 'primera', '2019-08-15 05:00:00', 0, 1),
(2, 'segunda', '2019-08-06 05:00:00', 1, 1),
(3, 'tercera', '2019-08-18 17:09:56', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta_item`
--

CREATE TABLE `carta_item` (
  `id` int(11) NOT NULL,
  `carta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `stock` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carta_item`
--

INSERT INTO `carta_item` (`id`, `carta_id`, `producto_id`, `stock`) VALUES
(1, 1, 3, 0),
(3, 1, 8, 0),
(4, 1, 5, 2),
(5, 1, 6, 0),
(6, 2, 2, 1),
(8, 2, 5, 2),
(9, 2, 8, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'PARRILLAS'),
(2, 'ENTRADAS'),
(3, 'BEBIDAS'),
(4, 'SEGUNDOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comprobantepago`
--

CREATE TABLE `comprobantepago` (
  `id` int(11) NOT NULL,
  `orden_id` int(11) NOT NULL,
  `id_comprobante` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_orden`
--

CREATE TABLE `detalle_orden` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `orden_id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `subtotal` decimal(19,7) DEFAULT NULL,
  `promociones_id` int(11) DEFAULT NULL,
  `comentario` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_orden`
--

INSERT INTO `detalle_orden` (`id`, `producto_id`, `orden_id`, `cantidad`, `subtotal`, `promociones_id`, `comentario`) VALUES
(1, 8, 3, 3, '12.0000000', NULL, 'nada'),
(2, 2, 3, 1, '40.0000000', NULL, 'nada'),
(3, 7, 3, 1, '20.0000000', NULL, 'nada'),
(4, 5, 4, 1, '20.0000000', NULL, 'nada'),
(5, 2, 6, 1, '40.0000000', NULL, 'nada'),
(6, 2, 7, 2, '40.0000000', NULL, 'nada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id` int(11) NOT NULL,
  `tipo_empleado_id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nrodocumento` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `tipo_documento_id` int(11) NOT NULL,
  `zonas_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id`, `tipo_empleado_id`, `nombre`, `apellido`, `username`, `password`, `nrodocumento`, `telefono`, `celular`, `direccion`, `tipo_documento_id`, `zonas_id`) VALUES
(1, 2, 'Jonathan', 'Manchego', 'manchas', '$2y$10$TJINAB4GWDRuCMLo6vPOtuD.Hb1bYp/HJekm7YZcnmbmOh1.NudbG', '73393135', NULL, '937081722', 'Mi casa', 1, 1),
(2, 4, 'Admin', 'admin', 'admin', '$2y$10$BxtP9Z0uV3EErK0bfnRaZuwhq3/EmfysWjoN1aT72r03bK7fJeqxu', '987654321', NULL, '987654321', 'null', 1, 1),
(3, 1, 'Moises', 'Fernandez', 'moises', '$2y$10$TLdkKFF.lkZQCbDJD5YklOVxOfcbDD0tMMOlQdgSyymwvNts1ssAe', '458431519', NULL, '654987321', 'su casa', 3, 1),
(4, 1, 'DELIVERY', 'DELIVERY', 'DELIVERY', '$2y$10$98nOV0i925q5fmQD.n5SEu1zNpm6dzga9fzuyTwESxdvffcSTh8ji', '321123211', NULL, NULL, NULL, 1, 1),
(5, 2, 'local', 'cuayla', 'dono', '$2y$10$dUBot.fR8d7hR/soEPbWAulLwsXjd2JO40Oiq1lmLriZDibCesYHi', '21239299', '999999', '999999999', 'calle 200', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_mesas`
--

CREATE TABLE `estado_mesas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_mesas`
--

INSERT INTO `estado_mesas` (`id`, `nombre`) VALUES
(1, 'LIBRE'),
(2, 'OCUPADA'),
(3, 'RESERVADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_ordenes`
--

CREATE TABLE `estado_ordenes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado_ordenes`
--

INSERT INTO `estado_ordenes` (`id`, `nombre`) VALUES
(1, 'PREPARANDOSE'),
(2, 'SERVIDO'),
(3, 'EN CAMINO'),
(4, 'EN ESPERA'),
(5, 'POR SERVIR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `igv`
--

CREATE TABLE `igv` (
  `id` int(11) NOT NULL,
  `porcentaje` decimal(5,2) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_ingreso` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `precio_compra` decimal(8,2) DEFAULT NULL,
  `unidad_medida_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`id`, `nombre`, `cantidad`, `fecha_ingreso`, `precio_compra`, `unidad_medida_id`) VALUES
(1, 'pollo', 5, '2019-08-14 08:00:33', '15.00', 2),
(2, 'arroz', 100, '2019-08-14 08:00:55', '2.30', 2),
(3, 'Ají', 8, '2019-08-14 08:01:44', '5.00', 3),
(4, 'PAPA', 4, '2019-08-14 08:03:04', '2.00', 2),
(5, 'carne de Chancho', 10, '2019-08-14 08:03:46', '14.00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes_reserva`
--

CREATE TABLE `ingredientes_reserva` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `cantidad_actual` int(11) DEFAULT NULL,
  `cantidad_minima` int(11) DEFAULT NULL,
  `cantidad_maxima` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) DEFAULT '0',
  `nombre` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `orden` tinyint(3) DEFAULT '0',
  `icono` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_usuario`
--

CREATE TABLE `menu_usuario` (
  `menu_id` int(11) NOT NULL,
  `tipo_usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesa`
--

CREATE TABLE `mesa` (
  `id` int(11) NOT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `estado_mesas_id` int(11) NOT NULL,
  `ambiente_id` int(11) DEFAULT NULL,
  `coordenadas` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mesa`
--

INSERT INTO `mesa` (`id`, `capacidad`, `nombre`, `numero`, `estado_mesas_id`, `ambiente_id`, `coordenadas`) VALUES
(1, 4, NULL, '01', 1, 1, '138/413'),
(2, 5, NULL, '02', 1, 1, '386/105'),
(3, 4, NULL, '03', 1, 1, '304/106'),
(4, 2, NULL, '05', 2, 1, '62/312'),
(5, 6, NULL, '06', 2, 1, '136/311'),
(6, 3, NULL, '07', 1, 1, '66/416'),
(7, 4, NULL, '08', 1, 1, '62/30'),
(8, 5, NULL, '09', 1, 1, '62/195'),
(9, 5, NULL, '10', 1, 1, NULL),
(10, 5, NULL, '11', 1, 1, '225/104'),
(11, 5, NULL, '12', 1, 1, '63/108'),
(12, 4, NULL, '13', 1, 1, NULL),
(13, 5, NULL, '14', 1, NULL, NULL),
(14, 5, NULL, '15', 1, NULL, NULL),
(15, 99, 'DELIVERY', '99', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `id` int(11) NOT NULL,
  `tipo_orden_id` int(11) NOT NULL,
  `mesa_id` int(11) NOT NULL,
  `total` decimal(19,7) DEFAULT NULL,
  `total_redondeado` decimal(19,7) DEFAULT NULL,
  `comprobante` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tiempo_espera_total` int(11) DEFAULT NULL,
  `estado_ordenes_id` int(11) NOT NULL,
  `empleado_usuario_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`id`, `tipo_orden_id`, `mesa_id`, `total`, `total_redondeado`, `comprobante`, `fecha`, `tiempo_espera_total`, `estado_ordenes_id`, `empleado_usuario_id`, `usuario_id`) VALUES
(1, 1, 12, '120.0000000', '120.0000000', 1, '2019-06-22 16:06:07', 12, 4, 1, 1),
(2, 2, 15, '72.0000000', '72.0000000', 0, '2019-08-26 16:38:25', 30, 1, 4, 1),
(3, 2, 15, '72.0000000', '72.0000000', 0, '2019-08-26 16:39:26', 30, 1, 4, 1),
(4, 2, 15, '20.0000000', '20.0000000', 0, '2019-07-27 19:40:51', 10, 1, 4, 1),
(6, 1, 5, '40.0000000', '40.0000000', 0, '2019-08-27 22:41:08', NULL, 1, 5, 1),
(7, 1, 4, '40.0000000', '40.0000000', 0, '2019-08-27 23:08:42', NULL, 1, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_usuario`
--

CREATE TABLE `permiso_usuario` (
  `tipo_usuario_id` int(11) NOT NULL,
  `permiso_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` longtext,
  `imagen` varchar(100) DEFAULT NULL,
  `precio` decimal(19,7) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `eliminado` char(1) DEFAULT '0',
  `fecha_validez` date DEFAULT NULL,
  `tiempo_espera` int(11) DEFAULT NULL,
  `video` varchar(100) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `imagen`, `precio`, `codigo`, `eliminado`, `fecha_validez`, `tiempo_espera`, `video`, `categoria_id`) VALUES
(2, 'CHICHARRON DE CHANCHO', 'CHICHARRON DE CARNE DE PORCINO', 'CHICHARRON DE CHANCHO.jpeg', '40.0000000', 'P001', '1', '2019-11-28', 15, 'CHICHARRON DE CHANCHO.mp4', 4),
(3, 'CALDO DE GALLINA', 'CALDO HECHO CON GALLINA', 'CALDO DE GALLINA.jpeg', '10.0000000', 'P002', '1', '2019-11-29', 5, NULL, 2),
(4, 'CHICHARRON DE CUY', 'CHICHARRON HECHO DE CARNE DE CUY', 'CHICHARRON DE CUY.jpeg', '40.0000000', 'P003', '1', '2019-12-31', 15, NULL, 4),
(5, 'PICANTE', 'PLATO ELABORADO CON PAPA E INGREDIENTES DE LA MEJOR CALIDAD', 'PICANTE.jpeg', '20.0000000', 'P004', '1', '2019-12-31', 10, NULL, 4),
(6, 'ROCOTO RELLENO', 'PLATO ELABORADO CON LOS MEJORES INGREDIENTES DE LA CIUDAD', 'ROCOTO RELLENO.jpeg', '20.0000000', 'P005', '1', '2019-11-28', 10, NULL, 4),
(7, 'POLLO AL HORNO', 'PLATO ELABORADO Y HORNEADO', 'POLLO AL HORNO.jpeg', '20.0000000', 'P007', '1', '2019-12-31', 10, NULL, 4),
(8, 'CERVEZA HEINEKEN PERSONAL', 'CERVEZA PEQUEÑA', 'CERVEZA HEINEKEN PERSONAL.jpeg', '4.0000000', 'B001', '1', '2019-11-27', 5, NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_composicion`
--

CREATE TABLE `productos_composicion` (
  `id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `ingredientes_id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos_composicion`
--

INSERT INTO `productos_composicion` (`id`, `producto_id`, `ingredientes_id`, `cantidad`) VALUES
(1, 2, 5, 0),
(3, 3, 2, 0),
(4, 3, 1, 0),
(5, 5, 4, 0),
(6, 5, 3, 0),
(7, 4, 4, 0),
(8, 6, 4, 0),
(9, 7, 4, 0),
(10, 7, 1, 0),
(11, 7, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE `promociones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `descripcion` longtext,
  `precio` decimal(19,7) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `total_real` decimal(19,7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion_producto`
--

CREATE TABLE `promocion_producto` (
  `promociones_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_producto`
--

CREATE TABLE `registro_producto` (
  `id` int(11) NOT NULL,
  `accion` varchar(45) DEFAULT NULL,
  `fecha` varchar(45) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `producto` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `precio` decimal(19,7) DEFAULT NULL,
  `codigo` varchar(10) DEFAULT NULL,
  `eliminado` smallint(1) DEFAULT '0',
  `igv_id` int(11) NOT NULL,
  `fecha_validez` datetime DEFAULT NULL,
  `video` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `ruc` varchar(20) DEFAULT NULL,
  `telefono1` varchar(20) DEFAULT NULL,
  `telefono2` varchar(20) DEFAULT NULL,
  `celular1` varchar(20) DEFAULT NULL,
  `celular2` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `restaurant`
--

INSERT INTO `restaurant` (`id`, `nombre`, `direccion`, `ruc`, `telefono1`, `telefono2`, `celular1`, `celular2`) VALUES
(1, 'La chozita', 'los angeles 102', '12128920810', '898989', '232390', '953242511', '927651255');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`id`, `nombre`, `restaurant_id`) VALUES
(1, 'Restaurant 01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_carta`
--

CREATE TABLE `tipo_carta` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_carta`
--

INSERT INTO `tipo_carta` (`id`, `nombre`) VALUES
(1, 'L-M-V'),
(2, 'M-J-S'),
(3, 'D');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_documento`
--

INSERT INTO `tipo_documento` (`id`, `nombre`, `descripcion`) VALUES
(1, 'DNI', 'Documento nacional de identidad usado en Perú.'),
(2, 'PASAPORTE', 'Documento usado por viajeros.'),
(3, 'LIBRETA MILITAR', 'Documento usado opcionalmente en caso de no contar con DNI.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_empleado`
--

CREATE TABLE `tipo_empleado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_empleado`
--

INSERT INTO `tipo_empleado` (`id`, `nombre`) VALUES
(1, 'CHEF'),
(2, 'MOZO'),
(3, 'CAJERO'),
(4, 'ADMIN'),
(5, 'DELIVERY');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_orden`
--

CREATE TABLE `tipo_orden` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo_orden`
--

INSERT INTO `tipo_orden` (`id`, `nombre`) VALUES
(1, 'LOCAL'),
(2, 'DELIVERY');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`id`, `nombre`) VALUES
(1, 'unidad'),
(2, 'kilogramos'),
(3, 'litro'),
(4, 'atado'),
(5, 'SaCo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tipo_documento_id` int(11) NOT NULL,
  `nrodocumento` varchar(20) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `zonas_id` int(11) NOT NULL,
  `fecha_reg` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `total_pedidos` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `username`, `password`, `tipo_documento_id`, `nrodocumento`, `telefono`, `celular`, `direccion`, `zonas_id`, `fecha_reg`, `total_pedidos`) VALUES
(1, 'LOCAL', 'Cuayla', 'adww', '$2y$10$BxtP9Z0uV3EErK0bfnRaZuwhq3/EmfysWjoN1aT72r03bK7fJeqxu', 3, '71540177', '953922522', '93672166', 'calle 200', 5, '2019-08-14 07:09:17', 0),
(2, 'Jonathan', 'Manchego', 'manchas', '$2y$10$fXay1ju0yb5cz8o6gzJeKu1AellrcIWrjST1CDjBredfG5TBzhesi', 1, '73393135', NULL, '937081722', 'mi casa', 3, '2019-08-15 00:27:06', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id`, `nombre`) VALUES
(1, 'MOQUEGUA - CERCADO'),
(2, 'SAMEGUA'),
(3, 'SAN ANTONIO'),
(4, 'CHEN-CHEN'),
(5, 'SAN FRANCISCO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `carta`
--
ALTER TABLE `carta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_carta_tipo_carta1_idx` (`tipo_carta_id`);

--
-- Indices de la tabla `carta_item`
--
ALTER TABLE `carta_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_menu_item_producto1_idx` (`producto_id`),
  ADD KEY `fk_carta_item_carta1_idx` (`carta_id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comprobantepago`
--
ALTER TABLE `comprobantepago`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comprobantePago_orden1_idx` (`orden_id`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_factura_producto1_idx` (`producto_id`);

--
-- Indices de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detalle_orden_producto1_idx` (`producto_id`),
  ADD KEY `fk_detalle_orden_orden1_idx` (`orden_id`),
  ADD KEY `fk_detalle_orden_promociones1_idx` (`promociones_id`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empleado_tipo_empleado1_idx` (`tipo_empleado_id`),
  ADD KEY `fk_empleado_tipo_documento1_idx` (`tipo_documento_id`),
  ADD KEY `fk_empleado_zonas1_idx` (`zonas_id`);

--
-- Indices de la tabla `estado_mesas`
--
ALTER TABLE `estado_mesas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado_ordenes`
--
ALTER TABLE `estado_ordenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `igv`
--
ALTER TABLE `igv`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ingredientes_unidad_medida1_idx` (`unidad_medida_id`);

--
-- Indices de la tabla `ingredientes_reserva`
--
ALTER TABLE `ingredientes_reserva`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu_usuario`
--
ALTER TABLE `menu_usuario`
  ADD KEY `fk_menu_usuario_menu1_idx` (`menu_id`);

--
-- Indices de la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mesa_estado_mesas1_idx` (`estado_mesas_id`),
  ADD KEY `ambiente_id` (`ambiente_id`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orden_tipo_orden1_idx` (`tipo_orden_id`),
  ADD KEY `fk_orden_mesa1_idx` (`mesa_id`),
  ADD KEY `fk_orden_estado_ordenes1_idx` (`estado_ordenes_id`),
  ADD KEY `fk_orden_empleado1_idx` (`empleado_usuario_id`),
  ADD KEY `fk_orden_usuario1_idx` (`usuario_id`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  ADD KEY `fk_permiso_usuario_permiso1_idx` (`permiso_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_producto_categoria1_idx` (`categoria_id`);

--
-- Indices de la tabla `productos_composicion`
--
ALTER TABLE `productos_composicion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_productos_composicion_producto1_idx` (`producto_id`),
  ADD KEY `fk_productos_composicion_registro_ingredientes1_idx` (`ingredientes_id`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promocion_producto`
--
ALTER TABLE `promocion_producto`
  ADD KEY `fk_promocion_producto_promociones1_idx` (`promociones_id`),
  ADD KEY `fk_promocion_producto_producto1_idx` (`producto_id`);

--
-- Indices de la tabla `registro_producto`
--
ALTER TABLE `registro_producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sucursal_restaurant1_idx` (`restaurant_id`);

--
-- Indices de la tabla `tipo_carta`
--
ALTER TABLE `tipo_carta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_orden`
--
ALTER TABLE `tipo_orden`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuario_tipo_documento1_idx` (`tipo_documento_id`),
  ADD KEY `fk_usuario_zonas1_idx` (`zonas_id`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ambiente`
--
ALTER TABLE `ambiente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `carta`
--
ALTER TABLE `carta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `carta_item`
--
ALTER TABLE `carta_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `comprobantepago`
--
ALTER TABLE `comprobantepago`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `estado_mesas`
--
ALTER TABLE `estado_mesas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estado_ordenes`
--
ALTER TABLE `estado_ordenes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `igv`
--
ALTER TABLE `igv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ingredientes_reserva`
--
ALTER TABLE `ingredientes_reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mesa`
--
ALTER TABLE `mesa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos_composicion`
--
ALTER TABLE `productos_composicion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_producto`
--
ALTER TABLE `registro_producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipo_carta`
--
ALTER TABLE `tipo_carta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_empleado`
--
ALTER TABLE `tipo_empleado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo_orden`
--
ALTER TABLE `tipo_orden`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `zonas`
--
ALTER TABLE `zonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carta`
--
ALTER TABLE `carta`
  ADD CONSTRAINT `fk_carta_tipo_carta1` FOREIGN KEY (`tipo_carta_id`) REFERENCES `tipo_carta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `carta_item`
--
ALTER TABLE `carta_item`
  ADD CONSTRAINT `fk_carta_item_carta1` FOREIGN KEY (`carta_id`) REFERENCES `carta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_menu_item_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comprobantepago`
--
ALTER TABLE `comprobantepago`
  ADD CONSTRAINT `fk_comprobantePago_orden1` FOREIGN KEY (`orden_id`) REFERENCES `orden` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD CONSTRAINT `fk_detalle_factura_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_orden`
--
ALTER TABLE `detalle_orden`
  ADD CONSTRAINT `fk_detalle_orden_orden1` FOREIGN KEY (`orden_id`) REFERENCES `orden` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_orden_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detalle_orden_promociones1` FOREIGN KEY (`promociones_id`) REFERENCES `promociones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `fk_empleado_tipo_documento1` FOREIGN KEY (`tipo_documento_id`) REFERENCES `tipo_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_tipo_empleado1` FOREIGN KEY (`tipo_empleado_id`) REFERENCES `tipo_empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_empleado_zonas1` FOREIGN KEY (`zonas_id`) REFERENCES `zonas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD CONSTRAINT `fk_ingredientes_unidad_medida1` FOREIGN KEY (`unidad_medida_id`) REFERENCES `unidad_medida` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `menu_usuario`
--
ALTER TABLE `menu_usuario`
  ADD CONSTRAINT `fk_menu_usuario_menu1` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mesa`
--
ALTER TABLE `mesa`
  ADD CONSTRAINT `fk_mesa_estado_mesas1` FOREIGN KEY (`estado_mesas_id`) REFERENCES `estado_mesas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `mesa_ibfk_1` FOREIGN KEY (`ambiente_id`) REFERENCES `ambiente` (`id`);

--
-- Filtros para la tabla `orden`
--
ALTER TABLE `orden`
  ADD CONSTRAINT `fk_orden_empleado1` FOREIGN KEY (`empleado_usuario_id`) REFERENCES `empleado` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orden_estado_ordenes1` FOREIGN KEY (`estado_ordenes_id`) REFERENCES `estado_ordenes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orden_mesa1` FOREIGN KEY (`mesa_id`) REFERENCES `mesa` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orden_tipo_orden1` FOREIGN KEY (`tipo_orden_id`) REFERENCES `tipo_orden` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orden_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permiso_usuario`
--
ALTER TABLE `permiso_usuario`
  ADD CONSTRAINT `fk_permiso_usuario_permiso1` FOREIGN KEY (`permiso_id`) REFERENCES `permiso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `fk_producto_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_composicion`
--
ALTER TABLE `productos_composicion`
  ADD CONSTRAINT `fk_productos_composicion_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_composicion_registro_ingredientes1` FOREIGN KEY (`ingredientes_id`) REFERENCES `ingredientes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `promocion_producto`
--
ALTER TABLE `promocion_producto`
  ADD CONSTRAINT `fk_promocion_producto_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_promocion_producto_promociones1` FOREIGN KEY (`promociones_id`) REFERENCES `promociones` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `fk_sucursal_restaurant1` FOREIGN KEY (`restaurant_id`) REFERENCES `restaurant` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_tipo_documento1` FOREIGN KEY (`tipo_documento_id`) REFERENCES `tipo_documento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_zonas1` FOREIGN KEY (`zonas_id`) REFERENCES `zonas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
