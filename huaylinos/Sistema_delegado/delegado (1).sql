-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2024 a las 14:47:56
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
-- Base de datos: `delegado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblalumnos`
--

CREATE TABLE `tblalumnos` (
  `aluCodigo` int(11) NOT NULL,
  `aluNombre` varchar(50) NOT NULL,
  `aluApellido` varchar(50) NOT NULL,
  `aluCandidato` enum('si','no') NOT NULL,
  `aluUsuario` varchar(50) NOT NULL,
  `aluPassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votaciones`
--

CREATE TABLE `votaciones` (
  `idVotacion` int(11) NOT NULL,
  `codCandidato` int(11) NOT NULL,
  `codVotante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblalumnos`
--
ALTER TABLE `tblalumnos`
  ADD PRIMARY KEY (`aluCodigo`);

--
-- Indices de la tabla `votaciones`
--
ALTER TABLE `votaciones`
  ADD PRIMARY KEY (`idVotacion`),
  ADD KEY `codCandidato` (`codCandidato`),
  ADD KEY `codVotante` (`codVotante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblalumnos`
--
ALTER TABLE `tblalumnos`
  MODIFY `aluCodigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `votaciones`
--
ALTER TABLE `votaciones`
  MODIFY `idVotacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `votaciones`
--
ALTER TABLE `votaciones`
  ADD CONSTRAINT `votaciones_ibfk_1` FOREIGN KEY (`codCandidato`) REFERENCES `tblalumnos` (`aluCodigo`),
  ADD CONSTRAINT `votaciones_ibfk_2` FOREIGN KEY (`codVotante`) REFERENCES `tblalumnos` (`aluCodigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
