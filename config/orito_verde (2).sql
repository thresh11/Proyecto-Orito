-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2023 a las 03:34:29
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `orito_verde`
--
CREATE DATABASE IF NOT EXISTS `orito_verde` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `orito_verde`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(10) NOT NULL,
  `nombre_producto` varchar(200) NOT NULL,
  `2nombre_producto` varchar(200) NOT NULL,
  `descripcion_producto` text NOT NULL,
  `precio_producto` decimal(10,2) NOT NULL,
  `unidad_producto` varchar(100) NOT NULL,
  `activo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `2nombre_producto`, `descripcion_producto`, `precio_producto`, `unidad_producto`, `activo`) VALUES
(1, 'Brawnie de aguacate y arroz \r\n', 'Brawnie de aguacate y arroz ', '', 5000.00, 'la unidad', 1),
(2, 'Brawnie de aguacate y avena ', 'Brawnie de aguacate y avena ', '', 5000.00, 'la unidad', 1),
(3, 'Brawnie de aguacate y almendras ', 'Brawnie de aguacate y almendras ', '', 5500.00, 'la unidad', 1),
(4, 'Caja de brownies de aguacate y almendras', 'Caja de brownies de aguacate y almendras', '', 32000.00, '6 unidades', 1),
(5, 'Caja de brownies de aguacate y avena', 'Caja de brownies de aguacate y avena', '', 30000.00, '6 unidades', 1),
(6, 'Caja de brownies de aguacate y arroz', 'Caja de brownies de aguacate y arroz', '', 30000.00, '6 unidades ', 1),
(7, 'Libra café tostado molido', 'Café tostado molido de Gaitanía Planadas ', '', 25000.00, '1 libra', 1),
(8, '1/2 Libra café tostado molido', 'Café tostado molido de Gaitanía Planadas ', '', 15500.00, '1/2 libra ', 1),
(9, 'Aromática 100% orgánica', 'Aromática 100% orgánica raíces Anzoátegas de Anzoátegui', '', 8000.00, 'Caja con bolsas reutilizables', 1),
(10, 'Aguacate Hass de Fresno', 'Aguacate Hass de Fresno', '', 6000.00, '1 kilo', 1),
(11, 'Miel 100% natural ', 'Botella de miel 100% natural del Líbano y Fresno ', '', 43000.00, 'Precio botella', 1),
(12, 'Miel 100% natural ', 'Media botella de miel 100% natural del Líbano y Fresno ', '', 22000.00, 'Media botella', 1),
(13, 'Kumis sin azúcar natural', 'Kumis sin azúcar natural', '', 11000.00, '1 Litro', 1),
(14, 'Panela pulverizada ', 'Panela pulverizada 100% originaria de Fresno ', '', 5000.00, '1 libra ', 1),
(15, 'Mantequilla de mani sin sal', 'Mantequilla de mani tostado sin sal', '', 11000.00, '250 gramos ', 1),
(16, 'Chocolate artesanal sin azúcar ', 'Chocolate artesanal hecho con cacao de mejor aroma sin azúcar ', '', 14000.00, '250 gramos ', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
