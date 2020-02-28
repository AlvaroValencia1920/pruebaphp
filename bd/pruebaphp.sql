-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2020 a las 23:42:17
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebaphp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

CREATE TABLE `casos` (
  `id` int(11) NOT NULL,
  `motivo` text COLLATE utf16_spanish_ci NOT NULL,
  `direccion` varchar(70) COLLATE utf16_spanish_ci NOT NULL,
  `estado` enum('Activo','Inactivo') COLLATE utf16_spanish_ci NOT NULL,
  `consecutivo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `casos`
--

INSERT INTO `casos` (`id`, `motivo`, `direccion`, `estado`, `consecutivo`) VALUES
(1, 'Motivo de Prueba', 'Calle 89 # 40A-87', 'Inactivo', 1),
(2, 'Motivo de Prueba', 'Calle 89 # 40A-87', 'Inactivo', 2),
(3, 'preuba', 'final', 'Inactivo', 3),
(4, 'caso 4', 'sdafsd', 'Inactivo', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `item` varchar(100) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `items`
--

INSERT INTO `items` (`id`, `item`) VALUES
(1, 'Tipo de Documento'),
(2, 'Roles');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `tipo_documento` int(11) NOT NULL,
  `documento` bigint(20) NOT NULL,
  `nombre_completo` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf16_spanish_ci NOT NULL,
  `celular` bigint(20) NOT NULL,
  `password` varchar(70) COLLATE utf16_spanish_ci NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `tipo_documento`, `documento`, `nombre_completo`, `correo`, `celular`, `password`, `rol`) VALUES
(1, 2, 1140855289, 'Alvaro Andres Valencia Barrios', 'alvaroandres1927@gmail.com', 3005193151, '$2y$10$OWEr.DO/t6BVuWVPwNGuMex9KZq3ntOIo0YxtvmgwQbyIK1o9Ih5a', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_items`
--

CREATE TABLE `sub_items` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `nombre_subitem` varchar(150) COLLATE utf16_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_spanish_ci;

--
-- Volcado de datos para la tabla `sub_items`
--

INSERT INTO `sub_items` (`id`, `item_id`, `nombre_subitem`) VALUES
(1, 1, 'Tarjeta de Identidad'),
(2, 1, 'Cédula de Ciudadania'),
(3, 2, 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `casos`
--
ALTER TABLE `casos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sub_items`
--
ALTER TABLE `sub_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `casos`
--
ALTER TABLE `casos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sub_items`
--
ALTER TABLE `sub_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `sub_items`
--
ALTER TABLE `sub_items`
  ADD CONSTRAINT `sub_items_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
