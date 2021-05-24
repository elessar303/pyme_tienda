-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql
-- Tiempo de generación: 24-05-2021 a las 17:40:58
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
-- Estructura de tabla para la tabla `cotizaciones_dolar`
--

CREATE TABLE `cotizaciones_dolar` (
  `id` int(11) NOT NULL,
  `cotizacion` decimal(15,2) NOT NULL COMMENT 'Cotizacion de la fecha',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de la cotizacion',
  `id_usuario` int(11) NOT NULL COMMENT 'id del usuario',
  `detalle_usuario` varchar(200) NOT NULL COMMENT 'login y nombre del usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cotizaciones_dolar`
--
ALTER TABLE `cotizaciones_dolar`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cotizaciones_dolar`
--
ALTER TABLE `cotizaciones_dolar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
