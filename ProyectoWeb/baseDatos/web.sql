-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-06-2020 a las 18:32:21
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
  `curp` varchar(18) NOT NULL,
  `nombre` varchar(64) NOT NULL,
  `primerApe` varchar(64) NOT NULL,
  `segundoApe` varchar(64) NOT NULL,
  `correo` varchar(128) DEFAULT NULL,
  `contrasena` varchar(32) DEFAULT NULL,
  `telefono` varchar(12) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`boleta`),
  UNIQUE KEY `curp` (`curp`),
  UNIQUE KEY `boleta` (`boleta`),
  UNIQUE KEY `correo` (`correo`,`contrasena`),
  UNIQUE KEY `contrasena` (`contrasena`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`boleta`, `curp`, `nombre`, `primerApe`, `segundoApe`, `correo`, `contrasena`, `telefono`, `activo`) VALUES
('1234567890', 'jjjjjjjjjjjjjjjjjj', 'registro', 'rere', 'gis', 'prueba@p.com', 'c893bad68927b457dbed39460e6afd62', '1234567890', 1),
('2015121245', 'aaaaaaaaaaaaaaaaaa', 'Registro', 'R', 'R', 'registro@r.com', '688076062d6513e29967e70d2cdade24', '1234567890', 1),
('2015121247', 'TOPJ990801MDFLRZ02', 'Jazmin Yaneli ', 'Tolentino', 'Pérez', 'jazmin@hotmail.com', '848069be239e0652978632c56c11b487', '5517973286', 1);

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

--
-- Volcado de datos para la tabla `matalumno`
--

INSERT INTO `matalumno` (`boletaAlum`, `claveMat`, `recurse`) VALUES
('1234567890', 'C104', 1),
('1234567890', 'C217', 0),
('2015121245', 'C101', 0),
('2015121245', 'C107', 1),
('2015121245', 'C215', 0),
('2015121245', 'C217', 1),
('2015121245', 'C218', 0),
('2015121247', 'C103', 0),
('2015121247', 'C105', 0),
('2015121247', 'C107', 1),
('2015121247', 'C220', 1);

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
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`clave`, `nombre`) VALUES
('C101', 'ANALISIS VECTORIAL'),
('C102', 'CALCULO'),
('C103', 'MATEMATICAS DISCRETAS'),
('C104', 'ALGORITMIA Y PROGRAMACION ESTRUCTURADA'),
('C105', 'FISICA'),
('C106', 'INGENIERIA ETICA Y SOCIEDAD'),
('C107', 'ECUACIONES DIFERENCIALES'),
('C108', 'ALGEBRA LINEAL'),
('C109', 'CALCULO APLICADO'),
('C110', 'ESTRUCTURAS DE DATOS'),
('C111', 'COMUNICACION ORAL Y ESCRITA'),
('C112', 'ANALISIS FUNDAMENTAL DE CIRCUITOS'),
('C213', 'MATEMATICAS AVANZADAS PARA LA INGENIERIA'),
('C214', 'FUNDAMENTOS ECONOMICOS'),
('C215', 'FUNDAMENTOS DE DISEÑO DIGITAL'),
('C216', 'TEORIA COMPUTACIONAL'),
('C217', 'BASES DE DATOS'),
('C218', 'PROGRAMACION ORIENTADA A OBJETOS'),
('C219', 'ELECTRONICA ANALOGICA'),
('C220', 'REDES DE COMPUTADORAS'),
('C221', 'DISEÑO DE SISTEMAS DIGITALES'),
('C222', 'PROBABILIDAD Y ESTADISTICA'),
('C223', 'SISTEMAS OPERATIVOS'),
('C224', 'ANALISIS Y DISEÑO ORIENTADO A OBJETOS'),
('C225', 'TECNOLOGIAS PARA LA WEB'),
('C226', 'ADMINISTRACION FINANCIERA'),
('C327', 'ARQUITECTURA DE COMPUTADORAS'),
('C328', 'COMPILADORES'),
('C329', 'INGENIERIA DE SOFTWARE'),
('C330', 'ADMINISTRACION DE PROYECTOS'),
('C331', 'INSTRUMENTACION'),
('C332', 'TEORIA DE COMUNICACIONES Y SEÑALES'),
('C333', 'APLICACIONES PARA COMUNICACIONES DE RED'),
('C334', 'INTRODUCCION A LOS MICROCONTROLADORES'),
('C335', 'ANALISIS DE ALGORITMOS'),
('C380', 'METODOS CUANTITATIVOS PARA LA TOMA DE DECISIONES'),
('C401', 'GESTION EMPRESARIAL'),
('C402', 'TRABAJO TERMINAL 1'),
('C403', 'LIDERAZGO Y DESARROLLO PROFESIONAL'),
('C404', 'ADMINISTRACION DE SERVICIOS EN RED'),
('C405', 'DESARROLLO DE SISTEMAS DISTRIBUIDOS'),
('C501', 'TRABAJO TERMINAL 2');

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
