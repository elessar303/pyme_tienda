-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql
-- Tiempo de generación: 16-03-2020 a las 20:44:46
-- Versión del servidor: 5.7.29-log
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pyme_tienda_conf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomempresa`
--

CREATE TABLE `nomempresa` (
  `codigo` int(11) NOT NULL,
  `nombre` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `bd` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `bd_contabilidad` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `bd_nomina` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomempresa`
--

INSERT INTO `nomempresa` (`codigo`, `nombre`, `bd`, `bd_contabilidad`, `bd_nomina`) VALUES
(1, 'PRUEBA 001', 'pyme_pyme', 'pluginn_contabilidad', 'pluginn_planilla');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `nomempresa`
--
ALTER TABLE `nomempresa`
  ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `nomempresa`
--
ALTER TABLE `nomempresa`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
