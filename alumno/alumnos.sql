-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2024 a las 17:35:39
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
-- Base de datos: `alumnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id_carrera` int(11) NOT NULL,
  `nombre_carrera` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`id_carrera`, `nombre_carrera`) VALUES
(1, 'Ingeniería de Sistemas'),
(2, 'Administración'),
(3, 'Derecho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id_docente` int(11) NOT NULL,
  `nombre_docente` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `genero` enum('M','F') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_docente`, `nombre_docente`, `edad`, `genero`) VALUES
(1, 'Carlos Pérez', 35, 'M'),
(3, 'Juan Torres', 30, 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiante` int(11) NOT NULL,
  `nombre_estudiante` varchar(100) NOT NULL,
  `genero` enum('M','F') NOT NULL,
  `id_carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `nombre_estudiante`, `genero`, `id_carrera`) VALUES
(1, 'María Gómez', 'F', 1),
(2, 'Luis Fernández', 'M', 1),
(3, 'Elena Rojas', 'F', 2),
(4, 'Pedro Sánchez', 'M', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(100) NOT NULL,
  `creditos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre_materia`, `creditos`) VALUES
(1, 'Matemáticas', 4),
(2, 'Programación', 3),
(3, 'Derecho Civil', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_carreras`
--

CREATE TABLE `materias_carreras` (
  `id_materia_carrera` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_carrera` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias_carreras`
--

INSERT INTO `materias_carreras` (`id_materia_carrera`, `id_materia`, `id_carrera`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_docentes`
--

CREATE TABLE `materias_docentes` (
  `id_materia_docente` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias_docentes`
--

INSERT INTO `materias_docentes` (`id_materia_docente`, `id_materia`, `id_docente`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_estudiantes`
--

CREATE TABLE `materias_estudiantes` (
  `id_materia_estudiante` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias_estudiantes`
--

INSERT INTO `materias_estudiantes` (`id_materia_estudiante`, `id_materia`, `id_estudiante`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id_carrera`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id_docente`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `materias_carreras`
--
ALTER TABLE `materias_carreras`
  ADD PRIMARY KEY (`id_materia_carrera`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_carrera` (`id_carrera`);

--
-- Indices de la tabla `materias_docentes`
--
ALTER TABLE `materias_docentes`
  ADD PRIMARY KEY (`id_materia_docente`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_docente` (`id_docente`);

--
-- Indices de la tabla `materias_estudiantes`
--
ALTER TABLE `materias_estudiantes`
  ADD PRIMARY KEY (`id_materia_estudiante`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `id_estudiante` (`id_estudiante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `materias_carreras`
--
ALTER TABLE `materias_carreras`
  MODIFY `id_materia_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `materias_docentes`
--
ALTER TABLE `materias_docentes`
  MODIFY `id_materia_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `materias_estudiantes`
--
ALTER TABLE `materias_estudiantes`
  MODIFY `id_materia_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`) ON DELETE CASCADE;

--
-- Filtros para la tabla `materias_carreras`
--
ALTER TABLE `materias_carreras`
  ADD CONSTRAINT `materias_carreras_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE,
  ADD CONSTRAINT `materias_carreras_ibfk_2` FOREIGN KEY (`id_carrera`) REFERENCES `carreras` (`id_carrera`) ON DELETE CASCADE;

--
-- Filtros para la tabla `materias_docentes`
--
ALTER TABLE `materias_docentes`
  ADD CONSTRAINT `materias_docentes_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE,
  ADD CONSTRAINT `materias_docentes_ibfk_2` FOREIGN KEY (`id_docente`) REFERENCES `docentes` (`id_docente`) ON DELETE CASCADE;

--
-- Filtros para la tabla `materias_estudiantes`
--
ALTER TABLE `materias_estudiantes`
  ADD CONSTRAINT `materias_estudiantes_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE,
  ADD CONSTRAINT `materias_estudiantes_ibfk_2` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id_estudiante`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
