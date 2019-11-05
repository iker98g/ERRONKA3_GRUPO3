-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-10-2019 a las 14:33:22
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tresfpz1_grupo3`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`tresfpz1_iker`@`localhost` PROCEDURE `spAllHabitaciones` ()  NO SQL
SELECT * FROM habitaciones$$

CREATE DEFINER=`tresfpz1_iker`@`localhost` PROCEDURE `spAllReservas` ()  NO SQL
SELECT * FROM reservas$$

CREATE DEFINER=`tresfpz1_iker`@`localhost` PROCEDURE `spAllUsers` ()  NO SQL
SELECT * FROM usuarios$$

CREATE DEFINER=`tresfpz1_iker`@`localhost` PROCEDURE `spBorrarReserva` (IN `pId` INT)  NO SQL
DELETE FROM reservas
WHERE reservas.idReserva = pId$$

CREATE DEFINER=`tresfpz1_iker`@`localhost` PROCEDURE `spBorrarUsuario` (IN `pId` INT)  NO SQL
DELETE FROM usuarios
WHERE usuarios.idUsuario = pId$$

CREATE DEFINER=`tresfpz1_iker`@`localhost` PROCEDURE `spComprobarDisponibilidad` (IN `pFechaInicio` DATE, IN `pFechaFin` DATE)  NO SQL
SELECT reservas.idHabitacion FROM `reservas` 
WHERE pFechaInicio BETWEEN reservas.fechaInicio AND reservas.fechaFin
OR pFechaFin BETWEEN reservas.fechaInicio AND reservas.fechaFin
OR reservas.fechaInicio BETWEEN pFechaInicio AND pFechaFin
OR reservas.fechaFin BETWEEN pFechaInicio AND pFechaFin$$

CREATE DEFINER=`tresfpz1_iker`@`localhost` PROCEDURE `spCrearUsuario` (IN `pNombre` VARCHAR(50), IN `pApellido` VARCHAR(50), IN `pUsuario` VARCHAR(50), IN `pContrasena` VARCHAR(50), IN `pAdmin` TINYINT(1))  NO SQL
INSERT INTO usuarios (usuarios.nombre, usuarios.apellido, usuarios.usuario, usuarios.contrasena, usuarios.admin)
VALUES (pNombre, pApellido, pUsuario, pContrasena, pAdmin)$$

CREATE DEFINER=`tresfpz1_iker`@`localhost` PROCEDURE `spFindByType` (IN `pTipo` VARCHAR(50))  NO SQL
SELECT * FROM `habitaciones` WHERE habitaciones.tipo=pTipo$$

CREATE DEFINER=`tresfpz1_iker`@`localhost` PROCEDURE `spFindIdHabitacion` (IN `pId` INT)  NO SQL
SELECT * FROM `habitaciones` WHERE `habitaciones`.`idHabitacion`=pId$$

CREATE DEFINER=`tresfpz1_iker`@`localhost` PROCEDURE `spFindIdUsuario` (IN `pId` INT)  NO SQL
SELECT * FROM `usuarios` WHERE `usuarios`.`idUsuario`=pId$$

CREATE DEFINER=tresfpz1_iker`@`localhost` PROCEDURE `spFindUser` (IN `pUsername` VARCHAR(50))  NO SQL
SELECT * FROM `usuarios` WHERE usuarios.usuario = pUsername$$

CREATE DEFINER=`tresfpz1_iker`@`localhost` PROCEDURE `spInsertReserva` (IN `pIdHabitacion` INT, IN `pIdUsuario` INT, IN `pFechaInicio` DATE, IN `pFechaFin` DATE, IN `pPrecioTotal` DECIMAL(10,2))  NO SQL
BEGIN
INSERT INTO reservas (reservas.idHabitacion, reservas.idUsuario, reservas.fechaInicio, reservas.fechaFin, reservas.precioTotal)
VALUES (pIdHabitacion, pIdUsuario, pFechaInicio, pFechaFin, pPrecioTotal);
END$$

CREATE DEFINER=`tresfpz1_iker`@`localhost` PROCEDURE `spModificarHabitacion` (IN `pId` INT, IN `pTipo` VARCHAR(50), IN `pImagen` VARCHAR(100), IN `pPrecio` DECIMAL(10,2))  NO SQL
UPDATE habitaciones
SET habitaciones.tipo = pTipo, habitaciones.imagen = pImagen, habitaciones.precio = pPrecio
WHERE habitaciones.idHabitacion = pId$$

CREATE DEFINER=`tresfpz1_iker`@`localhost` PROCEDURE `spModificarReserva` (IN `pId` INT, IN `pIdHabitacion` INT, IN `pIdUsuario` INT, IN `pFechaInicio` DATE, IN `pFechaFin` DATE, IN `pPrecioTotal` DECIMAL(10,2))  NO SQL
UPDATE reservas
SET reservas.idHabitacion = pIdHabitacion, reservas.idUsuario = pIdUsuario, reservas.fechaInicio = pFechaInicio, reservas.fechaFin = pFechaFin, reservas.precioTotal = pPrecioTotal
WHERE reservas.idReserva = pId$$

CREATE DEFINER=`tresfpz1_iker`@`localhost` PROCEDURE `spModificarUsuario` (IN `pId` INT, IN `pNombre` VARCHAR(50), IN `pApellido` VARCHAR(50), IN `pUsuario` VARCHAR(50), IN `pAdmin` TINYINT(1))  NO SQL
UPDATE usuarios
SET usuarios.nombre = pNombre, usuarios.apellido = pApellido, usuarios.usuario = pUsuario, usuarios.admin = pAdmin
WHERE usuarios.idUsuario = pId$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `idHabitacion` int(11) NOT NULL,
  `tipo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`idHabitacion`, `tipo`, `imagen`, `precio`) VALUES
(1, 'suite', 'img/suite1.jpg', '90.00'),
(2, 'suite', 'img/suite2.jpg', '90.00'),
(3, 'suite', 'img/suite3.jpg', '90.00'),
(4, 'suite', 'img/suite4.jpg', '90.00'),
(5, 'estandar', 'img/estandar1.jpg', '65.00'),
(6, 'estandar', 'img/estandar2.jpg', '65.00'),
(7, 'estandar', 'img/estandar3.jpg', '65.00'),
(8, 'estandar', 'img/estandar4.jpg', '65.00'),
(9, 'superior', 'img/superior1.jpg', '75.00'),
(10, 'superior', 'img/superior2.jpg', '75.00'),
(11, 'superior', 'img/superior3.jpg', '75.00'),
(12, 'superior', 'img/superior4.jpg', '75.00');

--
-- Disparadores `habitaciones`
--
DELIMITER $$
CREATE TRIGGER `spHabitacionesAfterDelete` AFTER DELETE ON `habitaciones` FOR EACH ROW INSERT INTO `historicohabitaciones`(`historicoIdHabitacion`, `historicoTipo`, `historicoImagen`, `historicoPrecio`) VALUES (old.idHabitacion,old.tipo,old.imagen,old.precio)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicohabitaciones`
--

CREATE TABLE `historicohabitaciones` (
  `historicoIdHabitacion` int(11) NOT NULL,
  `historicoTipo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `historicoImagen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `historicoPrecio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicoreservas`
--

CREATE TABLE `historicoreservas` (
  `historicoIdReserva` int(11) NOT NULL,
  `historicoIdHabitacion` int(11) NOT NULL,
  `historicoIdUsuario` int(11) NOT NULL,
  `historicoFechaInicio` date NOT NULL,
  `historicoFechaFin` date NOT NULL,
  `historicoPrecioTotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historicousuarios`
--

CREATE TABLE `historicousuarios` (
  `historicoIdUsuario` int(11) NOT NULL,
  `historicoNombre` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `historicoApellido` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `historicoUsuario` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `historicoContrasena` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `historicoAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `idReserva` int(11) NOT NULL,
  `idHabitacion` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `precioTotal` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`idReserva`, `idHabitacion`, `idUsuario`, `fechaInicio`, `fechaFin`, `precioTotal`) VALUES
(1, 1, 5, '2019-10-29', '2019-10-31', '180.01'),
(19, 5, 5, '2019-10-29', '2019-10-31', '130.00'),
(32, 2, 6, '2019-11-01', '2019-12-01', '2700.00'),
(35, 3, 5, '2019-10-29', '2019-11-01', '270.00'),
(36, 9, 9, '2019-10-29', '2019-11-01', '225.00'),
(37, 10, 11, '2019-10-29', '2019-11-09', '990.00'),
(38, 4, 11, '2019-10-29', '2019-11-09', '990.00'),
(39, 2, 12, '2019-10-30', '2019-10-31', '90.00'),
(40, 1, 5, '2019-11-15', '2019-11-27', '1080.00');

--
-- Disparadores `reservas`
--
DELIMITER $$
CREATE TRIGGER `spResrvasAfterDelete` AFTER DELETE ON `reservas` FOR EACH ROW INSERT INTO `historicoreservas`(`historicoIdReserva`, `historicoIdHabitacion`, `historicoIdUsuario`, `historicoFechaInicio`, `historicoFechaFin`, `historicoPrecioTotal`) VALUES (old.idReserva, old.idHabitacion, old.idUsuario, old.fechaInicio, old.fechaFin, old.precioTotal)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contrasena` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `apellido`, `usuario`, `contrasena`, `admin`) VALUES
(2, 'Markel', 'Rodriguez', 'mrodriguez', '123456', 1),
(5, 'Adrian', 'Lopez', 'alopez', '123', 0),
(6, 'Ibai', 'Acha', 'iacha', '12345', 0),
(9, 'Roberto', 'Lopez', 'rlopez', '123', 0),
(10, 'Bogdan', 'Guapo', 'bguapo', 'qwerty', 1),
(11, 'Carlos', 'Isla', 'cisla', '123', 0),
(12, 'Andoni', 'Tome', 'atome', '123456', 0),
(13, 'Asier', 'Gusmano', 'agusmano', '123', 0);

--
-- Disparadores `usuarios`
--
DELIMITER $$
CREATE TRIGGER `spUsuariosAfterDelete` AFTER DELETE ON `usuarios` FOR EACH ROW INSERT INTO `historicousuarios`(`historicoIdUsuario`, `historicoNombre`, `historicoApellido`, `historicoUsuario`, `historicoContrasena`, `historicoAdmin`) VALUES (old.idUsuario,old.nombre,old.apellido,old.usuario,old.contrasena,old.Admin)
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`idHabitacion`);

--
-- Indices de la tabla `historicohabitaciones`
--
ALTER TABLE `historicohabitaciones`
  ADD PRIMARY KEY (`historicoIdHabitacion`);

--
-- Indices de la tabla `historicoreservas`
--
ALTER TABLE `historicoreservas`
  ADD PRIMARY KEY (`historicoIdReserva`),
  ADD KEY `idHistoricoHabitacion` (`historicoIdHabitacion`),
  ADD KEY `idHistoricoUsuario` (`historicoIdUsuario`);

--
-- Indices de la tabla `historicousuarios`
--
ALTER TABLE `historicousuarios`
  ADD PRIMARY KEY (`historicoIdUsuario`);
  
--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `idHabitacion` (`idHabitacion`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `idHabitacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservas_ibfk_2` FOREIGN KEY (`idHabitacion`) REFERENCES `habitaciones` (`idHabitacion`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`tresfpz1_iker`@`localhost` EVENT `spHistoricoReservas` ON SCHEDULE EVERY 1 DAY STARTS '2019-11-05 23:59:59' ENDS '2019-11-06 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO DELETE FROM `reservas` WHERE reservas.fechaFin < NOW()$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
