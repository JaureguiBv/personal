-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2024 a las 17:51:13
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
-- Base de datos: `controlmilitar`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compania`
--

CREATE TABLE `compania` (
  `numero_compania` int(11) NOT NULL,
  `actividad_principal` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compania`
--

INSERT INTO `compania` (`numero_compania`, `actividad_principal`) VALUES
(1, 'Defensa de fronteras'),
(2, 'Mantenimiento de equipos'),
(3, 'Operaciones especiales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuartel`
--

CREATE TABLE `cuartel` (
  `codigo_cuartel` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ubicacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuartel`
--

INSERT INTO `cuartel` (`codigo_cuartel`, `nombre`, `ubicacion`) VALUES
(1, 'Cuartel Central', 'Lima, Perú'),
(2, 'Cuartel Sur', 'Arequipa, Perú'),
(3, 'Cuartel Norte', 'Trujillo, Perú');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuerpo`
--

CREATE TABLE `cuerpo` (
  `codigo_cuerpo` int(11) NOT NULL,
  `denominacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuerpo`
--

INSERT INTO `cuerpo` (`codigo_cuerpo`, `denominacion`) VALUES
(1, 'Infantería'),
(2, 'Artillería'),
(3, 'Ingeniería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

CREATE TABLE `servicio` (
  `codigo_servicio` int(11) NOT NULL,
  `actividad` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`codigo_servicio`, `actividad`) VALUES
(1, 'Vigilancia de frontera'),
(2, 'Mantenimiento de vehículos'),
(3, 'Entrenamiento militar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soldado`
--

CREATE TABLE `soldado` (
  `codigo_soldado` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `grado` varchar(20) NOT NULL,
  `id_cuerpo` int(11) NOT NULL,
  `id_cuartel` int(11) NOT NULL,
  `id_compania` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `soldado`
--

INSERT INTO `soldado` (`codigo_soldado`, `nombre`, `apellido`, `grado`, `id_cuerpo`, `id_cuartel`, `id_compania`) VALUES
(1, 'Juan', 'Pérez', 'Sargento', 1, 1, 1),
(3, 'Pedro', 'Martínez', 'Soldado', 3, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soldado_servicio`
--

CREATE TABLE `soldado_servicio` (
  `codigo_soldado` int(11) NOT NULL,
  `codigo_servicio` int(11) NOT NULL,
  `fecha_realizacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `soldado_servicio`
--

INSERT INTO `soldado_servicio` (`codigo_soldado`, `codigo_servicio`, `fecha_realizacion`) VALUES
(1, 1, '2024-12-01'),
(3, 3, '2024-12-03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compania`
--
ALTER TABLE `compania`
  ADD PRIMARY KEY (`numero_compania`);

--
-- Indices de la tabla `cuartel`
--
ALTER TABLE `cuartel`
  ADD PRIMARY KEY (`codigo_cuartel`);

--
-- Indices de la tabla `cuerpo`
--
ALTER TABLE `cuerpo`
  ADD PRIMARY KEY (`codigo_cuerpo`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`codigo_servicio`);

--
-- Indices de la tabla `soldado`
--
ALTER TABLE `soldado`
  ADD PRIMARY KEY (`codigo_soldado`),
  ADD KEY `id_cuerpo` (`id_cuerpo`),
  ADD KEY `id_cuartel` (`id_cuartel`),
  ADD KEY `id_compania` (`id_compania`);

--
-- Indices de la tabla `soldado_servicio`
--
ALTER TABLE `soldado_servicio`
  ADD PRIMARY KEY (`codigo_soldado`,`codigo_servicio`,`fecha_realizacion`),
  ADD KEY `codigo_servicio` (`codigo_servicio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `compania`
--
ALTER TABLE `compania`
  MODIFY `numero_compania` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cuartel`
--
ALTER TABLE `cuartel`
  MODIFY `codigo_cuartel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cuerpo`
--
ALTER TABLE `cuerpo`
  MODIFY `codigo_cuerpo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `codigo_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `soldado`
--
ALTER TABLE `soldado`
  MODIFY `codigo_soldado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `soldado`
--
ALTER TABLE `soldado`
  ADD CONSTRAINT `soldado_ibfk_1` FOREIGN KEY (`id_cuerpo`) REFERENCES `cuerpo` (`codigo_cuerpo`) ON DELETE CASCADE,
  ADD CONSTRAINT `soldado_ibfk_2` FOREIGN KEY (`id_cuartel`) REFERENCES `cuartel` (`codigo_cuartel`) ON DELETE CASCADE,
  ADD CONSTRAINT `soldado_ibfk_3` FOREIGN KEY (`id_compania`) REFERENCES `compania` (`numero_compania`) ON DELETE CASCADE;

--
-- Filtros para la tabla `soldado_servicio`
--
ALTER TABLE `soldado_servicio`
  ADD CONSTRAINT `soldado_servicio_ibfk_1` FOREIGN KEY (`codigo_soldado`) REFERENCES `soldado` (`codigo_soldado`) ON DELETE CASCADE,
  ADD CONSTRAINT `soldado_servicio_ibfk_2` FOREIGN KEY (`codigo_servicio`) REFERENCES `servicio` (`codigo_servicio`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
