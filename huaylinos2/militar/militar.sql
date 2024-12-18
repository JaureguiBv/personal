-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2024 a las 16:03:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `militar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compania`
--

CREATE TABLE `compania` (
  `Numero_Compania` int(11) NOT NULL,
  `Actividad_Principal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compania`
--

INSERT INTO `compania` (`Numero_Compania`, `Actividad_Principal`) VALUES
(1, 'Patrullaje'),
(2, 'Entrenamiento'),
(3, 'Mantenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuartel`
--

CREATE TABLE `cuartel` (
  `Codigo_Cuartel` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Ubicacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuartel`
--

INSERT INTO `cuartel` (`Codigo_Cuartel`, `Nombre`, `Ubicacion`) VALUES
(1, 'Cuartel Central', 'Lima'),
(2, 'Cuartel Sur', 'Arequipa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuerpo`
--

CREATE TABLE `cuerpo` (
  `Codigo_Cuerpo` int(11) NOT NULL,
  `Denominacion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuerpo`
--

INSERT INTO `cuerpo` (`Codigo_Cuerpo`, `Denominacion`) VALUES
(1, 'Infantería'),
(2, 'Artillería'),
(3, 'Armada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `Codigo_Servicio` int(11) NOT NULL,
  `Actividad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`Codigo_Servicio`, `Actividad`) VALUES
(1, 'Guardia'),
(2, 'Cuartelero'),
(3, 'Descanso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soldado`
--

CREATE TABLE `soldado` (
  `Codigo_Soldado` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Apellidos` varchar(255) NOT NULL,
  `Grado` varchar(50) NOT NULL,
  `Codigo_Cuerpo` int(11) DEFAULT NULL,
  `Numero_Compania` int(11) DEFAULT NULL,
  `Codigo_Cuartel` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `soldado`
--

INSERT INTO `soldado` (`Codigo_Soldado`, `Nombre`, `Apellidos`, `Grado`, `Codigo_Cuerpo`, `Numero_Compania`, `Codigo_Cuartel`) VALUES
(1, 'Juan', 'Pérez', 'Sargento', 1, 1, 2),
(2, 'Pedro', 'Gómez', 'Cabo', 2, 2, 2),
(3, 'Luis', 'Martínez', 'Soldado', 3, 3, 1),
(5, 'Erwerwe', 'Rwerwerw', 'Rewrwerwe', 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soldado_servicio`
--

CREATE TABLE `soldado_servicio` (
  `Codigo_Soldado` int(11) NOT NULL,
  `Codigo_Servicio` int(11) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `soldado_servicio`
--

INSERT INTO `soldado_servicio` (`Codigo_Soldado`, `Codigo_Servicio`, `Fecha`) VALUES
(1, 1, '2024-12-01'),
(2, 2, '2024-12-02'),
(3, 3, '2024-12-03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compania`
--
ALTER TABLE `compania`
  ADD PRIMARY KEY (`Numero_Compania`);

--
-- Indices de la tabla `cuartel`
--
ALTER TABLE `cuartel`
  ADD PRIMARY KEY (`Codigo_Cuartel`);

--
-- Indices de la tabla `cuerpo`
--
ALTER TABLE `cuerpo`
  ADD PRIMARY KEY (`Codigo_Cuerpo`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`Codigo_Servicio`);

--
-- Indices de la tabla `soldado`
--
ALTER TABLE `soldado`
  ADD PRIMARY KEY (`Codigo_Soldado`),
  ADD KEY `Codigo_Cuerpo` (`Codigo_Cuerpo`),
  ADD KEY `Numero_Compania` (`Numero_Compania`),
  ADD KEY `Codigo_Cuartel` (`Codigo_Cuartel`);

--
-- Indices de la tabla `soldado_servicio`
--
ALTER TABLE `soldado_servicio`
  ADD PRIMARY KEY (`Codigo_Soldado`,`Codigo_Servicio`,`Fecha`),
  ADD KEY `Codigo_Servicio` (`Codigo_Servicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compania`
--
ALTER TABLE `compania`
  MODIFY `Numero_Compania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cuartel`
--
ALTER TABLE `cuartel`
  MODIFY `Codigo_Cuartel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `cuerpo`
--
ALTER TABLE `cuerpo`
  MODIFY `Codigo_Cuerpo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `Codigo_Servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `soldado`
--
ALTER TABLE `soldado`
  MODIFY `Codigo_Soldado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `soldado`
--
ALTER TABLE `soldado`
  ADD CONSTRAINT `soldado_ibfk_1` FOREIGN KEY (`Codigo_Cuerpo`) REFERENCES `cuerpo` (`Codigo_Cuerpo`),
  ADD CONSTRAINT `soldado_ibfk_2` FOREIGN KEY (`Numero_Compania`) REFERENCES `compania` (`Numero_Compania`),
  ADD CONSTRAINT `soldado_ibfk_3` FOREIGN KEY (`Codigo_Cuartel`) REFERENCES `cuartel` (`Codigo_Cuartel`);

--
-- Filtros para la tabla `soldado_servicio`
--
ALTER TABLE `soldado_servicio`
  ADD CONSTRAINT `soldado_servicio_ibfk_1` FOREIGN KEY (`Codigo_Soldado`) REFERENCES `soldado` (`Codigo_Soldado`),
  ADD CONSTRAINT `soldado_servicio_ibfk_2` FOREIGN KEY (`Codigo_Servicio`) REFERENCES `servicio` (`Codigo_Servicio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
