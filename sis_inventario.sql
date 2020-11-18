-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-11-2020 a las 15:50:28
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sis_inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `fecha`) VALUES
(7, 'batería ', '2020-11-08 02:54:57'),
(8, 'bujía', '2020-11-08 02:55:27'),
(9, 'aceite', '2020-11-08 02:55:42'),
(11, 'bomba', '2020-11-08 03:08:08'),
(12, 'pastilla de frenos', '2020-11-08 03:08:43'),
(13, 'bomba de gasolina', '2020-11-08 03:10:39'),
(14, 'servicio ', '2020-11-08 03:11:14'),
(16, 'pila', '2020-11-08 03:12:37'),
(17, 'filtro', '2020-11-08 03:12:53'),
(18, 'ligas', '2020-11-08 03:13:17'),
(19, 'tapa', '2020-11-08 03:13:29'),
(20, 'cables', '2020-11-08 03:13:49'),
(21, 'kit', '2020-11-08 03:14:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `compras` int(11) NOT NULL,
  `ultima_compra` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipodocumento` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `direccion`, `fecha_nacimiento`, `compras`, `ultima_compra`, `fecha`, `tipodocumento`) VALUES
(5, 'Miguel Murillo', 325235235, 'miguel@hotmail.com', '(254) 545-3446', 'calle 34 # 34 - 23', '1976-03-04', 34, '2020-11-15 23:53:45', '2020-11-16 04:53:45', NULL),
(15, 'Jhon Padilla', 1127615588, 'padilla102@gmail.com', '3004231566', 'Suba', '1984-07-02', 18, '2020-11-17 21:43:38', '2020-11-18 02:43:38', 'Cedula de Ciudadania'),
(17, 'Camilo Ayala', 123456789, 'camiloayala@gmail.com', '300123456', 'Bosa', '1996-02-04', 4, '2020-11-17 00:09:00', '2020-11-17 05:09:00', 'Cedula de Ciudadania'),
(18, 'Andrea Machado', 987654321, 'andreamachado@gmail.com', '(300) 123-4566', 'Chico norte', '1998-10-02', 5, '2020-11-17 21:50:35', '2020-11-18 02:50:35', 'Cedula de Ciudadania'),
(20, 'juan carlos cabello sojo', 27103467, 'jccs6087@gmail.com', '04122014410', 'centro suba', '2000-01-27', 3, '2020-11-17 21:44:21', '2020-11-18 02:44:21', 'Cedula de Ciudadania'),
(22, 'juan', 1111111111, 'jccs49@gmail.com', '123456', 'Chico norte', '2020-12-31', 1, '0000-00-00 00:00:00', '2020-11-18 02:54:54', 'Cedula de Ciudadania'),
(23, 'juan', 123321234, 'jcccccc@gmail.com', '123456', 'Chico norte', '2020-12-31', 1, '0000-00-00 00:00:00', '2020-11-18 02:56:13', 'Cedula de Ciudadania');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `imagen` text COLLATE utf8_spanish_ci NOT NULL,
  `stock` int(11) NOT NULL,
  `precio_compra` float NOT NULL,
  `precio_venta` float NOT NULL,
  `ventas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `id_categoria`, `codigo`, `descripcion`, `imagen`, `stock`, `precio_compra`, `precio_venta`, `ventas`, `fecha`) VALUES
(70, 11, '1112', 'bomba de combustible marussi', 'vistas/img/productos/1112/925.jpg', 18, 65000, 91000, 2, '2020-11-18 02:50:35'),
(71, 12, '1111', 'pastilla de frenos marussi', 'vistas/img/productos/1111/949.jpg', 209, 119999, 167999, 1, '2020-11-17 05:10:34'),
(72, 17, '1111', 'Filtro de aceite ksu', 'vistas/img/productos/1111/870.jpg', 100, 45000, 63000, 0, '2020-11-08 03:29:10'),
(73, 8, '1114', 'Bujia Bosh', 'vistas/img/productos/1114/738.jpg', 1995, 20000, 28000, 5, '2020-11-17 05:12:02'),
(74, 11, '1116', 'Bomba de gasolina Marussi', 'vistas/img/productos/1116/554.jpg', 148, 15000, 21000, 2, '2020-11-17 05:18:15'),
(75, 14, '1117', 'Servicio de limpieza de Inyectores', 'vistas/img/productos/1117/299.jpg', 0, 100000, 140000, 1, '2020-11-16 20:16:56'),
(76, 19, '1118', 'tapa radiador', 'vistas/img/productos/1118/329.jpg', 999, 10000, 14000, 1, '2020-11-16 20:16:56'),
(78, 16, '1111', 'Pila gasolina Denso', 'vistas/img/productos/1111/328.jpg', 97, 25000, 35000, 3, '2020-11-18 02:44:21'),
(79, 17, '1112', 'Filtro de gasolina Aksu', 'vistas/img/productos/1112/433.jpg', 31, 28000, 39200, 4, '2020-11-18 02:56:13'),
(80, 18, '1120', 'Ligas de freno Marussi', 'vistas/img/productos/1120/543.jpg', 628, 12000, 16800, 22, '2020-11-18 02:56:13'),
(81, 19, '1119', 'Tapa de gasolina con llave', 'vistas/img/productos/1119/548.jpg', 97, 8000, 11200, 27, '2020-11-18 02:56:13'),
(82, 20, '1234', 'Cables para bujías Yukazo', 'vistas/img/productos/1234/588.jpg', 126, 15000, 21000, 24, '2020-11-18 02:54:54'),
(83, 21, '1243', 'Kit de tiempo para Aveo', 'vistas/img/productos/1243/304.jpg', 4, 21000, 29400, 16, '2020-11-18 02:50:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `perfil`, `foto`, `estado`, `ultimo_login`, `fecha`) VALUES
(1, 'Administrador', 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'Administrador', 'vistas/img/usuarios/admin/206.jpg', 1, '2020-11-17 21:56:31', '2020-11-18 02:56:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_vendedor` int(11) NOT NULL,
  `productos` text COLLATE utf8_spanish_ci NOT NULL,
  `impuesto` float NOT NULL,
  `neto` float NOT NULL,
  `total` float NOT NULL,
  `metodo_pago` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `codigo`, `id_cliente`, `id_vendedor`, `productos`, `impuesto`, `neto`, `total`, `metodo_pago`, `fecha`) VALUES
(69, 1001, 15, 1, '[{\"id\":\"81\",\"descripcion\":\"Tapa de gasolina con llave\",\"cantidad\":\"1\",\"stock\":97,\"precio\":\"11200\",\"total\":11200},{\"id\":\"82\",\"descripcion\":\"Cables para buj\\u00edas Yukazo\",\"cantidad\":\"2\",\"stock\":127,\"precio\":\"21000\",\"total\":42000}]', 0, 62200, 62200, 'Efectivo', '2020-11-17 05:24:23'),
(70, 1001, 15, 1, '[{\"id\":\"83\",\"descripcion\":\"Kit de tiempo para Aveo\",\"cantidad\":\"1\",\"stock\":7,\"precio\":\"29400\",\"total\":29400}]', 0, 38400, 38400, 'Efectivo', '2020-11-18 02:18:11'),
(71, 1001, 15, 1, '[{\"id\":\"83\",\"descripcion\":\"Kit de tiempo para Aveo\",\"cantidad\":\"1\",\"stock\":6,\"precio\":\"29400\",\"total\":29400},{\"id\":\"82\",\"descripcion\":\"Cables para buj\\u00edas Yukazo\",\"cantidad\":\"1\",\"stock\":128,\"precio\":\"21000\",\"total\":21000}]', 0, 59400, 59400, 'Efectivo', '2020-11-18 02:39:21'),
(72, 1001, 15, 1, '[{\"id\":\"82\",\"descripcion\":\"Cables para buj\\u00edas Yukazo\",\"cantidad\":\"1\",\"stock\":127,\"precio\":\"21000\",\"total\":21000},{\"id\":\"83\",\"descripcion\":\"Kit de tiempo para Aveo\",\"cantidad\":\"1\",\"stock\":5,\"precio\":\"29400\",\"total\":29400}]', 0, 59400, 59400, 'Efectivo', '2020-11-18 02:43:38'),
(73, 1001, 20, 1, '[{\"id\":\"80\",\"descripcion\":\"Ligas de freno Marussi\",\"cantidad\":\"1\",\"stock\":630,\"precio\":\"16800\",\"total\":16800},{\"id\":\"78\",\"descripcion\":\"Pila gasolina Denso\",\"cantidad\":\"1\",\"stock\":97,\"precio\":\"35000\",\"total\":35000}]', 0, 60800, 60800, 'Efectivo', '2020-11-18 02:44:21'),
(74, 1001, 18, 1, '[{\"id\":\"70\",\"descripcion\":\"bomba de combustible marussi\",\"cantidad\":\"1\",\"stock\":18,\"precio\":\"91000\",\"total\":91000},{\"id\":\"83\",\"descripcion\":\"Kit de tiempo para Aveo\",\"cantidad\":\"1\",\"stock\":4,\"precio\":\"29400\",\"total\":29400}]', 0, 129400, 129400, 'Efectivo', '2020-11-18 02:50:35'),
(75, 1001, 22, 1, '[{\"id\":\"82\",\"descripcion\":\"Cables para buj\\u00edas Yukazo\",\"cantidad\":\"1\",\"stock\":126,\"precio\":\"21000\",\"total\":21000},{\"id\":\"80\",\"descripcion\":\"Ligas de freno Marussi\",\"cantidad\":\"1\",\"stock\":629,\"precio\":\"16800\",\"total\":16800},{\"id\":\"79\",\"descripcion\":\"Filtro de gasolina Aksu\",\"cantidad\":\"1\",\"stock\":32,\"precio\":\"39200\",\"total\":39200}]', 0, 86000, 86000, 'Efectivo', '2020-11-18 02:54:54'),
(76, 1001, 23, 1, '[{\"id\":\"81\",\"descripcion\":\"Tapa de gasolina con llave\",\"cantidad\":\"1\",\"stock\":97,\"precio\":\"11200\",\"total\":11200},{\"id\":\"80\",\"descripcion\":\"Ligas de freno Marussi\",\"cantidad\":\"1\",\"stock\":628,\"precio\":\"16800\",\"total\":16800},{\"id\":\"79\",\"descripcion\":\"Filtro de gasolina Aksu\",\"cantidad\":\"1\",\"stock\":31,\"precio\":\"39200\",\"total\":39200}]', 0, 76200, 76200, 'Efectivo', '2020-11-18 02:56:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
