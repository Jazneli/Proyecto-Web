-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 27-05-2020 a las 11:24:46
-- Versión del servidor: 5.7.25-log
-- Versión de PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

DROP TABLE IF EXISTS `alumno`;
CREATE TABLE IF NOT EXISTS `alumno` (
  `boleta` varchar(10) NOT NULL,
  `curp` varchar(18) DEFAULT NULL,
  `nombre` varchar(64) DEFAULT NULL,
  `primerApe` varchar(64) DEFAULT NULL,
  `segundoApe` varchar(64) DEFAULT NULL,
  `correo` varchar(128) DEFAULT NULL,
  `contrasena` varchar(32) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`boleta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matalumno`
--

DROP TABLE IF EXISTS `matalumno`;
CREATE TABLE IF NOT EXISTS `matalumno` (
  `boletaAlum` varchar(10) NOT NULL,
  `claveMat` varchar(10) NOT NULL,
  `recurse` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`boletaAlum`,`claveMat`),
  KEY `claveMat` (`claveMat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE IF NOT EXISTS `materia` (
  `clave` varchar(10) NOT NULL,
  `nombre` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`clave`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `matalumno`
--
ALTER TABLE `matalumno`
  ADD CONSTRAINT `matalumno_ibfk_1` FOREIGN KEY (`boletaAlum`) REFERENCES `alumno` (`boleta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matalumno_ibfk_2` FOREIGN KEY (`claveMat`) REFERENCES `materia` (`clave`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
