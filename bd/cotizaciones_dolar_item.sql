-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql
-- Tiempo de generación: 24-05-2021 a las 17:41:42
-- Versión del servidor: 5.7.34-log
-- Versión de PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pyme_pyme`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones_dolar_item`
--

CREATE TABLE `cotizaciones_dolar_item` (
  `id` int(11) NOT NULL,
  `id_cotizacion_dolar` int(11) NOT NULL COMMENT 'id cotizacion dolar',
  `id_item` int(11) NOT NULL COMMENT 'id item',
  `precio_item` decimal(15,2) NOT NULL,
  `valor_cotizacion` decimal(15,2) NOT NULL,
  `valor_dolar` decimal(15,2) NOT NULL,
  `codigo_barras` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cotizaciones_dolar_item`
--
ALTER TABLE `cotizaciones_dolar_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cotizacion_dolar` (`id_cotizacion_dolar`),
  ADD KEY `id_item` (`id_item`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cotizaciones_dolar_item`
--
ALTER TABLE `cotizaciones_dolar_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
