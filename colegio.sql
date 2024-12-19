-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-12-2024 a las 19:14:50
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativos`
--

CREATE TABLE `administrativos` (
  `id_administrativo` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaciones`
--

CREATE TABLE `asignaciones` (
  `id_asignacion` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `nivel_id` int(11) NOT NULL,
  `grado_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `asignaciones`
--

INSERT INTO `asignaciones` (`id_asignacion`, `docente_id`, `nivel_id`, `grado_id`, `materia_id`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 1, 3, 9, 5, '2024-01-23 10:44:32', NULL, '1'),
(3, 1, 3, 10, 5, '2024-01-23 11:04:16', '2024-01-23 15:40:40', '1'),
(7, 2, 3, 9, 4, '2024-01-23 15:09:35', NULL, '1'),
(8, 2, 3, 10, 4, '2024-01-23 15:40:55', NULL, '1'),
(9, 1, 3, 11, 5, '2024-01-23 16:51:06', NULL, '1'),
(10, 1, 3, 13, 3, '2024-11-12 17:31:35', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE `calificaciones` (
  `id_calificacion` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `nota1` varchar(10) NOT NULL,
  `nota2` varchar(10) NOT NULL,
  `nota3` varchar(10) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`id_calificacion`, `docente_id`, `estudiante_id`, `materia_id`, `nota1`, `nota2`, `nota3`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 1, 3, 5, '80', '100', '53', '2024-01-25 00:18:18', '2024-01-25 00:20:46', '1'),
(2, 1, 1, 5, '100', '80', '51', '2024-01-25 00:18:18', '2024-01-25 00:20:46', '1'),
(3, 1, 2, 5, '90', '90', '52', '2024-01-25 00:18:18', '2024-01-25 00:20:46', '1'),
(4, 1, 4, 5, '10', '100', '100', '2024-01-25 00:18:48', '2024-01-25 00:21:25', '1'),
(5, 2, 2, 4, '100', '100', '100', '2024-01-26 02:22:14', NULL, '1'),
(6, 2, 1, 4, '100', '90', '80', '2024-01-26 02:22:14', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion_instituciones`
--

CREATE TABLE `configuracion_instituciones` (
  `id_config_institucion` int(11) NOT NULL,
  `nombre_institucion` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) NOT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  `celular` varchar(100) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `configuracion_instituciones`
--

INSERT INTO `configuracion_instituciones` (`id_config_institucion`, `nombre_institucion`, `logo`, `direccion`, `telefono`, `celular`, `correo`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 'CETPRO JOSÉ FAUSTINO SÁNCHEZ CARRIÓN', '2024-11-20-02-20-502024-11-10-13-48-49cetpro.png', 'Calle Castilla s/n 5ta/c Lurín Cercado', '', '992494361', 'cetpro.josefaustinosanchezcarrion@ugel01.gob.pe', '2023-12-28 20:29:10', '2024-12-01 13:04:52', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id_docente` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `especialidad` varchar(255) NOT NULL,
  `antiguedad` varchar(255) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id_docente`, `persona_id`, `especialidad`, `antiguedad`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 6, 'CIENCIAS SOCIALES', '5', '2024-01-16 10:19:28', '2024-01-26 01:30:40', '1'),
(2, 7, 'COMUNICACIÓN Y LENGUAJES', '5', '2024-01-16 11:18:29', '2024-01-26 02:21:12', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `id_estudiante` int(11) NOT NULL,
  `persona_id` int(11) NOT NULL,
  `nivel_id` int(11) NOT NULL,
  `grado_id` int(11) NOT NULL,
  `rude` varchar(50) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `persona_id`, `nivel_id`, `grado_id`, `rude`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 8, 2, 4, '443', '2024-01-18 08:44:24', '2024-12-02 03:26:34', '1'),
(2, 9, 3, 9, '4343421111', '2024-01-23 15:18:28', NULL, '1'),
(3, 10, 3, 9, '545334', '2024-01-23 15:20:20', '2024-01-23 19:23:10', '1'),
(4, 11, 3, 9, '44532322', '2024-01-23 15:31:39', '2024-01-23 19:40:15', '1'),
(5, 12, 3, 9, '66453434', '2024-01-25 11:29:36', NULL, '1'),
(6, 13, 3, 9, '2025-1', '2024-01-25 11:31:18', NULL, '1'),
(7, 18, 3, 9, '2024-2', '2024-01-30 20:49:33', '2024-01-30 21:17:37', '1'),
(8, 17, 3, 9, '40003', '2024-01-30 20:49:33', NULL, '1'),
(9, 16, 3, 9, '40004', '2024-01-30 20:49:33', NULL, '1'),
(10, 15, 3, 9, '40005', '2024-01-30 20:49:33', NULL, '1'),
(11, 20, 3, 9, '40007', '2024-01-30 20:49:33', NULL, '1'),
(12, 19, 3, 9, '40008', '2024-01-30 20:49:33', NULL, '1'),
(13, 21, 3, 9, '40009', '2024-01-30 20:49:33', NULL, '1'),
(14, 22, 3, 9, '40011', '2024-01-30 20:49:33', NULL, '1'),
(15, 26, 3, 9, '2025-1', '2024-01-30 20:49:33', NULL, '1'),
(16, 23, 3, 9, '2024-2', '2024-01-30 20:49:33', NULL, '1'),
(17, 24, 3, 9, '40014', '2024-01-30 20:49:33', NULL, '1'),
(18, 25, 3, 9, '40013', '2024-01-30 20:49:33', NULL, '1'),
(19, 27, 3, 9, '2026-1', '2024-01-30 20:49:33', NULL, '1'),
(20, 28, 3, 9, '2025', '2024-01-30 20:49:33', NULL, '1'),
(21, 30, 3, 9, '2025', '2024-01-30 20:49:33', NULL, '1'),
(22, 29, 3, 9, '2025', '2024-01-30 20:49:33', NULL, '1'),
(23, 31, 3, 9, '2026-1', '2024-01-30 20:49:33', NULL, '1'),
(24, 32, 3, 9, '2025', '2024-02-05 20:49:33', NULL, '1'),
(25, 33, 3, 9, '2025', '2024-02-05 20:49:33', NULL, '1'),
(26, 34, 3, 9, '40022', '2024-01-30 20:49:33', NULL, '1'),
(29, 35, 3, 9, '40025', '2024-01-30 20:49:33', NULL, '1'),
(31, 39, 3, 9, '40027', '2024-01-30 20:49:33', NULL, '1'),
(32, 40, 3, 9, '40028', '2024-01-30 20:49:33', NULL, '1'),
(33, 41, 3, 9, '40029', '2024-01-30 20:49:33', NULL, '1'),
(34, 42, 3, 9, '40031', '2024-01-30 20:49:33', NULL, '1'),
(35, 43, 3, 9, '40032', '2024-01-30 20:49:33', NULL, '1'),
(36, 44, 3, 9, '40030', '2024-01-30 20:49:33', NULL, '1'),
(37, 45, 3, 9, '40033', '2024-01-30 20:49:33', NULL, '1'),
(38, 46, 3, 9, '40034', '2024-01-30 20:49:33', NULL, '1'),
(39, 47, 3, 9, '40035', '2024-01-30 20:49:33', NULL, '1'),
(40, 48, 3, 9, '40036', '2024-01-30 20:49:33', NULL, '1'),
(41, 49, 3, 9, '40037', '2024-01-30 20:49:33', NULL, '1'),
(42, 50, 3, 9, '40038', '2024-01-30 20:49:33', NULL, '1'),
(43, 51, 3, 9, '40039', '2024-01-30 20:49:33', NULL, '1'),
(44, 52, 3, 9, '40040', '2024-01-30 20:49:33', NULL, '1'),
(45, 53, 3, 9, '40041', '2024-01-30 20:49:33', NULL, '1'),
(46, 54, 3, 9, '40042', '2024-01-30 20:49:33', NULL, '1'),
(47, 55, 3, 9, '40043', '2024-01-30 20:49:33', NULL, '1'),
(48, 56, 3, 9, '40044', '2024-01-30 20:49:33', NULL, '1'),
(49, 57, 3, 9, '40045', '2024-01-30 20:49:33', NULL, '1'),
(50, 58, 3, 9, '40046', '2024-01-30 20:49:33', NULL, '1'),
(51, 59, 3, 9, '40047', '2024-01-30 20:49:33', NULL, '1'),
(52, 60, 3, 9, '40048', '2024-01-30 20:49:33', NULL, '1'),
(53, 61, 3, 9, '40050', '2024-01-30 20:49:33', NULL, '1'),
(54, 62, 2, 2, '2025-1', '2024-01-30 20:49:33', '2024-11-21 05:08:42', '1'),
(55, 63, 2, 2, '40051', '2024-01-30 20:49:33', '2024-11-21 05:07:46', '1'),
(56, 64, 3, 9, '40052', '2024-01-30 20:49:33', '2024-01-31 15:04:14', '1'),
(57, 65, 2, 4, '2026-1', '2024-11-12 23:18:39', '2024-11-21 05:07:07', '1'),
(58, 66, 2, 2, '2026-1', '2024-11-14 03:18:07', '2024-11-21 05:07:27', '1'),
(59, 67, 2, 1, '2024-2', '2024-11-18 14:38:50', '2024-11-21 04:17:53', '1'),
(60, 68, 3, 4, '2025', '2024-11-28 21:10:56', NULL, '1'),
(61, 69, 3, 2, '2025', '2024-11-28 23:45:43', NULL, '1'),
(62, 70, 3, 4, '2025', '2024-11-29 02:28:14', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestiones`
--

CREATE TABLE `gestiones` (
  `id_gestion` int(11) NOT NULL,
  `gestion` varchar(255) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `gestiones`
--

INSERT INTO `gestiones` (`id_gestion`, `gestion`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 'GESTIÓN 2024', '2023-12-28 20:29:10', NULL, '1'),
(2, 'GESTIÓN 2025', '2024-11-12 16:51:35', NULL, '1'),
(3, 'GESTIÓN 2026', '2024-12-01 12:32:31', NULL, '1'),
(4, 'GESTIÓN 2027', '2024-12-01 12:32:41', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id_grado` int(11) NOT NULL,
  `nivel_id` int(11) NOT NULL,
  `semestre` varchar(6) NOT NULL,
  `codigo` varchar(6) NOT NULL,
  `nivel_grado` varchar(100) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `frecuencia` varchar(100) NOT NULL,
  `paralelo` varchar(255) NOT NULL,
  `apellido_docente` varchar(255) NOT NULL,
  `nombre_docente` varchar(255) NOT NULL,
  `inicio` date NOT NULL,
  `termino` date NOT NULL,
  `turno_grado` varchar(50) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id_grado`, `nivel_id`, `semestre`, `codigo`, `nivel_grado`, `curso`, `frecuencia`, `paralelo`, `apellido_docente`, `nombre_docente`, `inicio`, `termino`, `turno_grado`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 2, '202402', 'PE2411', 'Programa de Estudio', 'Peluquería y Barberia - 1', 'lunes a viernes 6 :00 pm - 10:30pm', 'Estética Personal', 'ALBAN', 'MABEL', '2024-02-05', '2024-04-12', 'NOCHE', '2023-12-28 20:29:10', '2024-11-25 17:16:50', '1'),
(2, 2, '202402', 'MO2401', 'Módulo Ocupacional', 'Muñecos Country Decorativos - 2', 'lunes a viernes 6 :00 pm - 10:30pm', 'Artesanía y Manualidades', 'HERRERA H.', 'GISLENY', '2024-10-10', '2024-10-28', 'NOCHE', '2024-01-17 08:26:34', NULL, '1'),
(4, 2, '202402', 'PE2403', 'Módulo Ocupacional', 'Muñecos Country Decorativos - 2', 'Martes y jueves 6 :00 pm - 10:30pm', 'Estética Personal', 'Castro Pérez', 'Joaquín', '2024-10-16', '2024-10-28', 'NOCHE', '2024-01-17 08:26:45', '2024-11-14 02:08:25', '1'),
(5, 2, '202402', 'PE2408', 'Programa de Estudio', 'Corte y Ensamblaje - 1', 'lunes a viernes 6 :00 pm - 10:30pm', 'Estética Personal', 'Calla', 'Aldo', '2024-10-31', '2024-11-01', 'TARDE', '2024-01-22 21:29:23', '2024-01-22 21:29:52', '1'),
(9, 3, '202402', 'MO2407', 'Módulo Ocupacional', 'Ofimática - 2', 'Martes y jueves 6 :00 pm - 10:30pm', 'Computación e Informática', 'Capillo Paredes', 'Ivan', '2024-11-12', '2024-12-12', 'NOCHE', '2024-01-22 21:30:14', '2024-11-14 02:08:02', '1'),
(10, 3, '0', '', '', 'SECUNDARIA - 2', '', 'A', '', '', '0000-00-00', '0000-00-00', '', '2024-01-22 21:30:20', NULL, '1'),
(11, 3, '0', '', '', 'SECUNDARIA - 3', '', 'A', '', '', '0000-00-00', '0000-00-00', '', '2024-01-22 21:30:27', '2024-01-22 21:30:35', '1'),
(12, 3, '0', '', '', 'SECUNDARIA - 4', '', 'A', '', '', '0000-00-00', '0000-00-00', '', '2024-01-22 21:30:42', NULL, '1'),
(13, 2, '0', '', '', 'SECUNDARIA - 5', '', 'A', '', '', '0000-00-00', '0000-00-00', '', '2024-01-22 21:30:49', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardexs`
--

CREATE TABLE `kardexs` (
  `id_kardex` int(11) NOT NULL,
  `docente_id` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `observacion` varchar(255) NOT NULL,
  `nota` text NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `kardexs`
--

INSERT INTO `kardexs` (`id_kardex`, `docente_id`, `estudiante_id`, `materia_id`, `fecha`, `observacion`, `nota`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(6, 1, 2, 5, '2024-01-08', 'ASISTENCIA', 'No asistio a clases.', '2024-01-26 02:05:33', NULL, '1'),
(7, 1, 1, 5, '2024-01-19', 'RENDIMIENTO ACADÉMICO', 'No presentó práctica nro 3', '2024-01-26 02:05:52', NULL, '1'),
(8, 1, 2, 5, '2024-01-19', 'RENDIMIENTO ACADÉMICO', 'No presentó la práctica nro 3', '2024-01-26 02:13:25', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(255) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre_materia`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(3, 'FÍSICA', '2024-01-22 21:20:56', NULL, '1'),
(4, 'COMUNICACIÓN Y LENGUAJES', '2024-01-22 21:21:08', NULL, '1'),
(5, 'CIENCIAS SOCIALES', '2024-01-22 21:21:18', NULL, '1'),
(6, 'EDUCACIÓN FÍSICA Y DEPORTES', '2024-01-22 21:21:33', NULL, '1'),
(7, 'EDUCACIÓN MUSICAL', '2024-01-22 21:21:47', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `id_nivel` int(11) NOT NULL,
  `gestion_id` int(11) NOT NULL,
  `nivel` varchar(255) NOT NULL,
  `turno` varchar(255) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`id_nivel`, `gestion_id`, `nivel`, `turno`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(2, 1, 'GESTIÓN 2024', 'MAÑANA', '2024-01-17 08:24:10', '2024-11-13 23:42:42', '1'),
(3, 2, 'GESTIÓN 2025', 'MAÑANA', '2024-01-17 08:24:14', '2024-11-13 23:42:52', '1'),
(5, 3, 'GESTIÓN 2026', 'MAÑANA', '2024-12-01 15:03:17', NULL, '1'),
(6, 4, 'GESTIÓN 2027', 'MAÑANA', '2024-12-01 15:06:51', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `mes_pagado` varchar(50) NOT NULL,
  `monto_pagado` varchar(10) NOT NULL,
  `fecha_pagado` varchar(20) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `estudiante_id`, `mes_pagado`, `monto_pagado`, `fecha_pagado`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(6, 1, 'ENERO', '500', '2024-01-22', '2024-01-22 15:11:30', NULL, '1'),
(8, 56, 'ENERO', '500', '2024-05-30', '2024-05-30 20:10:49', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permiso` int(11) NOT NULL,
  `nombre_url` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `nombre_url`, `url`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 'Configuraciones - Institución', '/admin/configuraciones/institucion/index.php', '2024-01-29 07:59:34', '2024-01-29 15:04:54', '1'),
(2, 'Configuraciones - Institución - Create', '/admin/configuraciones/institucion/create.php', '2024-01-29 08:00:04', '2024-01-29 15:05:02', '1'),
(3, 'Niveles', '/admin/niveles/index.php', '2024-01-29 08:01:21', '2024-01-29 15:06:12', '1'),
(4, 'Niveles - Create', '/admin/niveles/create.php', '2024-01-29 08:01:39', '2024-01-29 15:06:20', '1'),
(5, 'Grados', '/admin/grados/index.php', '2024-01-29 08:01:57', '2024-01-29 15:05:36', '1'),
(6, 'Grados - Create', '/admin/grados/create.php', '2024-01-29 08:02:16', '2024-01-29 15:05:46', '1'),
(7, 'Materias', '/admin/materias/index.php', '2024-01-29 08:09:17', '2024-01-29 15:05:58', '1'),
(8, 'Materias - Create', '/admin/materias/create.php', '2024-01-29 08:09:32', '2024-01-29 15:06:04', '1'),
(9, 'Roles', '/admin/roles/index.php', '2024-01-29 08:09:51', '2024-01-29 15:06:52', '1'),
(10, 'Roles - Create', '/admin/roles/create.php', '2024-01-29 08:10:03', '2024-01-29 15:06:58', '1'),
(11, 'Permisos', '/admin/roles/permisos.php', '2024-01-29 08:10:15', '2024-01-29 15:06:34', '1'),
(12, 'Permisos - create', '/admin/roles/create_permisos.php', '2024-01-29 08:10:55', '2024-01-29 15:06:42', '1'),
(13, 'Usuarios', '/admin/usuarios/index.php', '2024-01-29 08:11:21', '2024-01-29 15:07:04', '1'),
(15, 'Administrativos', '/admin/administrativos/index.php', '2024-01-29 08:12:13', '2024-01-29 15:04:33', '1'),
(16, 'Administrativos - Create', '/admin/administrativos/create.php', '2024-01-29 08:12:44', '2024-01-29 15:04:38', '1'),
(17, 'Docentes', '/admin/docentes/index.php', '2024-01-29 08:13:24', '2024-01-29 15:05:11', '1'),
(18, 'Docentes - Create', '/admin/docentes/create.php', '2024-01-29 08:14:13', '2024-01-29 15:05:17', '1'),
(19, 'Asignación de materias', '/admin/docentes/asignacion.php', '2024-01-29 08:14:34', '2024-01-29 15:04:43', '1'),
(20, 'Kardex del estudiante', '/admin/kardex/index.php', '2024-01-29 08:15:12', '2024-01-29 15:05:52', '1'),
(21, 'Calificaciones', '/admin/calificaciones/index.php', '2024-01-29 08:15:29', '2024-01-29 15:04:49', '1'),
(22, 'Estudiantes - Inscripción', '/admin/inscripciones/create.php', '2024-01-29 08:16:09', '2024-01-29 15:05:30', '1'),
(23, 'Estudiantes', '/admin/estudiantes/index.php', '2024-01-29 08:16:37', '2024-01-29 15:05:24', '1'),
(25, 'Usuarios - Create', '/admin/usuarios/create.php', '2024-01-29 08:51:17', '2024-01-29 15:07:11', '1'),
(26, 'Pagos', '/admin/pagos/index.php', '2024-01-29 08:51:36', '2024-01-29 15:06:27', '1'),
(27, 'Principal', '/admin/index.php', '2024-01-29 16:26:13', '2024-01-29 16:26:59', '1'),
(28, 'Configuración', '/admin/configuraciones/index.php', '2024-01-29 17:38:04', NULL, '1'),
(29, 'Configuraciones - Institución - Show', '/admin/configuraciones/institucion/show.php', '2024-01-29 17:39:53', NULL, '1'),
(30, 'Configuraciones - Institución - Update', '/admin/configuraciones/institucion/edit.php', '2024-01-29 17:41:18', NULL, '1'),
(31, 'Configuración - Gestión Educativa', '/admin/configuraciones/gestion/index.php', '2024-01-29 17:42:46', NULL, '1'),
(32, 'Configuración - Gestión Educativa - Create', '/admin/configuraciones/gestion/create.php', '2024-01-29 17:43:58', NULL, '1'),
(33, 'Configuración - Gestión Educativa - Show', '/admin/configuraciones/gestion/show.php', '2024-01-29 17:45:04', NULL, '1'),
(34, 'Configuración - Gestión Educativa - Update', '/admin/configuraciones/gestion/edit.php', '2024-01-29 17:46:17', NULL, '1'),
(35, 'Niveles - Show', '/admin/niveles/show.php', '2024-01-29 17:47:34', NULL, '1'),
(36, 'Niveles - Update', '/admin/niveles/edit.php', '2024-01-29 17:48:54', NULL, '1'),
(37, 'Grados - Show', '/admin/grados/show.php', '2024-01-29 17:50:19', NULL, '1'),
(38, 'Grados - Update', '/admin/grados/edit.php', '2024-01-29 17:52:02', NULL, '1'),
(39, 'Materias - Show', '/admin/materias/show.php', '2024-01-29 18:05:44', NULL, '1'),
(40, 'Materias - Update', '/admin/materias/edit.php', '2024-01-29 18:06:58', NULL, '1'),
(41, 'Roles - Show', '/admin/roles/show.php', '2024-01-29 18:08:43', NULL, '1'),
(42, 'Roles - Update', '/admin/roles/edit.php', '2024-01-29 18:09:32', NULL, '1'),
(43, 'Permisos - Update', '/admin/roles/edit_permiso.php', '2024-01-29 18:11:15', NULL, '1'),
(44, 'Usuarios - Show', '/admin/usuarios/show.php', '2024-01-29 18:13:01', NULL, '1'),
(45, 'Usuarios - Update', '/admin/usuarios/edit.php', '2024-01-29 18:13:53', NULL, '1'),
(46, 'Administrativos - Show', '/admin/administrativos/show.php', '2024-01-29 18:20:25', NULL, '1'),
(47, 'Administrativos - Update', '/admin/administrativos/edit.php', '2024-01-29 18:21:43', NULL, '1'),
(48, 'Docentes - Show', '/admin/docentes/show.php', '2024-01-29 18:32:57', NULL, '1'),
(49, 'Docentes - Update', '/admin/docentes/edit.php', '2024-01-29 18:34:27', NULL, '1'),
(50, 'Estudiantes - Inscripción - Principal', '/admin/inscripciones/index.php', '2024-01-29 18:36:48', NULL, '1'),
(51, 'Estudiantes - Show', '/admin/estudiantes/show.php', '2024-01-29 18:38:41', NULL, '1'),
(52, 'Estudiantes - Update', '/admin/estudiantes/edit.php', '2024-01-29 18:40:10', NULL, '1'),
(53, 'Pagos - Create', '/admin/pagos/create.php', '2024-01-29 18:41:57', NULL, '1'),
(54, 'Estudiantes - Inscripción - Importar', '/admin/inscripciones/importar/index.php', '2024-01-30 20:06:01', NULL, '1'),
(55, 'Calificaciones - Create', '/admin/calificaciones/create.php', '2024-01-30 20:53:00', NULL, '1'),
(56, 'Kardex - reporte del estudiante', '/admin/kardex/reporte_estudiante.php', '2024-07-22 16:41:12', NULL, '1'),
(57, 'Calificaciones - Reporte del estudiante', '/admin/calificaciones/reporte_estudiante.php', '2024-07-22 16:43:22', NULL, '1'),
(58, 'Reportes', '/admin/reportes/index.php', '2024-11-17 14:17:19', NULL, '1'),
(59, 'Reportes de Cursos', '/admin/reportes/cursos.php', '2024-11-17 17:02:16', NULL, '1'),
(60, 'Estudiantes 2025', '/admin/reportes/alumnos_2025.php', '2024-11-24 12:00:39', '2024-11-24 12:27:05', '1'),
(61, 'Estudiantes - Show2025	', '/admin/estudiantes/show25.php', '2024-11-27 16:59:01', '2024-11-27 17:01:55', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id_persona` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `foto` varchar(250) DEFAULT NULL,
  `conadis` varchar(250) DEFAULT NULL,
  `ci` varchar(20) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `apellidosM` varchar(100) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `fecha_nacimiento` varchar(20) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `provincia` varchar(50) NOT NULL,
  `distrito` varchar(50) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `trabaja` varchar(20) NOT NULL,
  `ocupacion` varchar(100) NOT NULL,
  `estado_civil` varchar(50) NOT NULL,
  `gradoinst` varchar(250) NOT NULL,
  `inclusivo` varchar(20) NOT NULL,
  `discapacidad` varchar(250) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `profesion` varchar(50) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id_persona`, `usuario_id`, `foto`, `conadis`, `ci`, `nombres`, `apellidos`, `apellidosM`, `sexo`, `fecha_nacimiento`, `pais`, `lugar`, `departamento`, `provincia`, `distrito`, `direccion`, `trabaja`, `ocupacion`, `estado_civil`, `gradoinst`, `inclusivo`, `discapacidad`, `celular`, `profesion`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 1, '', '', '07887297', 'FELICITA', 'MARTINEZ ', 'MALASQUEZ', '', '10/10/1990', '', '', '', '', '', 'Zona Los Pinos Av. Las Rosas Nro 100', '', '', '', '', '', '', '75657007', 'ADMINISTRACIÓN', '2023-12-28 20:29:10', NULL, '1'),
(4, 4, '', '', '333333333', '1', '2', '', '', '2024-01-15', '', '', '', '', '', 'Av. del Maestro S/N 7777777777777', '', '', '', '', '', '', '44444444', '5555555555', '2024-01-15 17:45:20', '2024-01-15 20:35:21', '1'),
(5, 5, '', '', '222222222', 'BENJAMIN', 'HILARI', '', '', '2024-01-11', '', '', '', '', '', 'Av. del Maestro S/N', '', '', '', '', '', '', '75657007', 'LICENCIADO EN CIENCIAS DE LA EDUCACIÓN', '2024-01-15 17:47:25', NULL, '1'),
(6, 7, '', '', '888888888', 'BRIGIDA', 'MENDOZA', '', '', '2024-01-16', '', '', '', '', '', 'Av. del Maestro S/N', '', '', '', '', '', '', '77777777', 'LICENCIADO EN CIENCIAS DE LA EDUCACIÓN', '2024-01-16 10:19:28', '2024-01-26 01:30:40', '1'),
(7, 8, '', '', '43437766', 'Christina', 'Halvorson', '', '', '1991-06-13', '', '', '', '', '', 'Av. del Maestro S/N', '', '', '', '', '', '', '7666655', 'LICENCIADO EN CIENCIAS DE LA EDUCACIÓN', '2024-01-16 11:18:29', '2024-01-26 02:21:12', '1'),
(8, 9, '2024-12-02-03-26-34-WhatsApp Image 2024-05-03 at 3.24.47 PM.jpeg', '', '47388377', 'BENJAMIN', 'MAMANI QUISPE', '', '', '2024-01-18', '', '', '', '', '', 'Av. del Maestro S/N', '', '', '', '', '', '', '77366377', 'ESTUDIANTE', '2024-01-18 08:44:24', '2024-12-02 03:26:34', '1'),
(9, 10, '', '', '75670921', 'Gordon', 'Klein', '', '', '2010-06-17', '', '', '', '', '', '89196 Bartell GlensMcLaughlinhaven, HI 79783', '', '', '', '', '', '', '756709213', 'ESTUDIANTE', '2024-01-23 15:18:28', NULL, '1'),
(10, 11, '', '', '77734922', 'Alden', 'Kuvalis', '', '', '2016-11-09', '', '', '', '', '', '674 Laurianne Roads Apt. 729West Melany, NH 29431-4199', '', '', '', '', '', '', '777349222', 'ESTUDIANTE', '2024-01-23 15:20:20', '2024-01-23 19:23:10', '1'),
(11, 12, '', '', '74812144', 'Heath', 'Klocko', '', '', '2015-07-18', '', '', '', '', '', '4336 Burdette ViewElmiraberg, OR 41297-2057', '', '', '', '', '', '', '748121443', 'ESTUDIANTE', '2024-01-23 15:31:39', '2024-01-23 19:40:15', '1'),
(12, 13, '', '', '778913051', 'Caterina', 'Dicki', '', '', '2018-06-25', '', '', '', '', '', '7154 Brice OverpassLake Mariliestad, KY 75278', '', '', '', '', '', '', '778913054', 'ESTUDIANTE', '2024-01-25 11:29:36', NULL, '1'),
(13, 14, '', '', '71535742', ' Rigoberto', 'Grant', '', '', '2009-07-16', '', '', '', '', '', '57871 Halvorson ForkPort Dimitri, PA 59071', '', '', '', '', 'SI', 'DISCAPACIDAD AUDITIVA - SORDERA TOTAL', '715357421', 'ESTUDIANTE', '2024-01-25 11:31:18', NULL, '1'),
(14, 15, '', '', '77148105', 'Rodrigo', 'Hamill', '', '', '1988-07-13', '', '', '', '', '', 'Av. del Maestro S/N', '', '', '', '', '', '', '771481054', 'LICENCIADO EN CIENCIAS DE LA EDUCACIÓN', '2024-01-29 15:57:38', NULL, '1'),
(15, 16, '', '', '70255849', 'Scarlett Balistreri', 'Scarlett Balistreri', '', '', '40348', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '70255849', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(16, 18, '', '', '79339647', 'Ms. Lola', 'Lola Abshire', '', '', '40347', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '79339647', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(17, 17, '', '', '70845355', 'Miss Jessika', 'Prohaska IV', '', '', '40346', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '--', 'NINGUNA', '70845355', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(18, 20, '', '', '75938291', 'Prof. Sterling', 'Sporer Sr.', '', '', '2024-01-30', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', 'SI', 'DISCAPACIDAD AUDITIVA - HIPOACUSIA', '75938291', 'ESTUDIANTE', '2024-01-30 20:49:33', '2024-01-30 21:17:37', '1'),
(19, 19, '', '', '77204234', 'Lafayette Mayer', 'Lafayette Mayer', '', '', '40351', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '77204234', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(20, 21, '', '', '78043543', 'Prof. Kennith', 'Keebler Jr.', '', '', '40350', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '78043543', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(21, 22, '', '', '78114948', 'Rodrigo Hamill', 'Rodrigo Hamill', '', '', '40352', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '78114948', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(22, 23, '', '', '74796098', 'Ms. Winnifred', 'Winnifred Blick', '', '', '40354', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '74796098', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(23, 24, '', '', '75639368', 'Camille Gibson', 'Gibson V', '', '', '40355', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', 'SI', 'DISCAPACIDAD AUDITIVA - HIPOACUSIA', '75639368', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(24, 25, '', '', '71352552', 'Miss Mara', 'Mara Brekke', '', '', '40357', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '71352552', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(25, 26, '', '', '70352456', 'Dr. Gustave', 'Gustave Bradtke', '', '', '40356', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '70352456', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(26, 27, '', '', '74405989', 'Ms. Kasandra', 'Rodriguez Jr.', '', '', '40353', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', 'SI', 'DISCAPACIDAD AUDITIVA - SORDERA TOTAL', '74405989', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(27, 28, '', '', '74568049', 'Cale Franecki', 'Cale Franecki', '', '', '40358', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '74568049', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(28, 29, '', '', '73073789', 'Ignacio Rowe', 'Ignacio Rowe', '', '', '40359', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '73073789', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(29, 30, '', '', '77009454', 'Marty Armstrong', 'Marty Armstrong', '', '', '40360', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '77009454', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(30, 31, '', '', '76399702', 'Anika Hoeger', 'Anika Hoeger', '', '', '40363', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '76399702', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(31, 32, '', '', '77958036', 'Aubrey Pouros', 'Aubrey Pouros', '', '', '40362', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '77958036', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(32, 33, '', '', '75209919', 'Fern Jast', 'Fern Jast', '', '', '40361', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '75209919', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(33, 34, '', '', '70410159', 'Graciela Lemke', 'Graciela Lemke', '', '', '40364', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '70410159', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(34, 35, '', '', '72037011', 'Nicholas Heathcote', 'Heathcote DDS', '', '', '40365', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '72037011', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(35, 37, '', '', '79200273', 'Veronica Lemke', 'Veronica Lemke', '', '', '40368', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '79200273', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(39, 40, '', '', '77939061', 'Freeman Marvin', 'Freeman Marvin', '', '', '40370', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '77939061', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(40, 41, '', '', '73000132', 'Oscar Dooley', 'Oscar Dooley', '', '', '40371', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '73000132', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(41, 43, '', '', '71327893', 'Alexanne Dibbert', 'Alexanne Dibbert', '', '', '40372', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '71327893', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(42, 42, '', '', '73817643', 'Alberta Toy', 'Toy MD', '', '', '40374', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '73817643', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(43, 44, '', '', '76787327', 'Amely Stroman', 'Stroman V', '', '', '40375', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '76787327', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(44, 45, '', '', '73824343', 'Micaela Marvin', 'Micaela Marvin', '', '', '40373', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '73824343', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(45, 46, '', '', '78756643', 'Buford Kunze', 'Buford Kunze', '', '', '40376', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '78756643', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(46, 47, '', '', '71325441', 'Ms. Hettie', 'Hettie Beatty', '', '', '40377', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '71325441', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(47, 48, '', '', '75189007', 'Toy Kub', 'Toy Kub', '', '', '40378', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '75189007', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(48, 49, '', '', '74729079', 'Miss Emilia', 'Emilia Mohr', '', '', '40379', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '74729079', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(49, 50, '', '', '75831570', 'Mrs. Dandre', 'Purdy III', '', '', '40380', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '75831570', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(50, 51, '', '', '73114906', 'William Auer', 'William Auer', '', '', '40381', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '73114906', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(51, 52, '', '', '78604695', 'Lucio Franecki', 'Lucio Franecki', '', '', '40382', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '78604695', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(52, 53, '', '', '79398021', 'Alia Green', 'Green Jr.', '', '', '40383', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '79398021', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(53, 54, '', '', '70317977', 'Britney Wehner', 'Britney Wehner', '', '', '40384', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '70317977', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(54, 55, '', '', '74216038', 'Miss Loyce', 'PhD', '', '', '40385', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '74216038', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(55, 56, '', '', '71078454', 'Minnie Smitham', 'Minnie Smitham', '', '', '40386', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '71078454', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(56, 57, '', '', '77154292', 'Prof. Emile', 'Emile Aufderhar', '', '', '40387', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '77154292', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(57, 58, '', '', '74309259', 'Jana Auer', 'Jana Auer', '', '', '40388', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '74309259', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(58, 59, '', '', '74204837', 'Jayme Bashirian', 'Jayme Bashirian', '', '', '40389', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '74204837', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(59, 60, '', '', '78082424', 'Roberta Schulist', 'Roberta Schulist', '', '', '40390', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '78082424', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(60, 61, '', '', '72539522', 'Dr. Ransom', 'Yundt I', '', '', '40391', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '72539522', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(61, 62, '', '', '79943252', 'Abe Rutherford', 'Rutherford DDS', '', '', '40393', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '79943252', 'ESTUDIANTE', '2024-01-30 20:49:33', NULL, '1'),
(62, 63, '2024-11-21-05-08-42-luis.jpg', '', '74285882', 'Newton Wunsch', 'Newton Wunsch', '', '', '2024-01-31', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '74285882', 'ESTUDIANTE', '2024-01-30 20:49:33', '2024-11-21 05:08:42', '1'),
(63, 64, '2024-11-21-05-07-46-gabriel.jpg', '', '74156827', 'Dallin Kuvalis', 'Dallin Kuvalis', '', '', '2024-01-19', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '74156827', 'ESTUDIANTE', '2024-01-30 20:49:33', '2024-11-21 05:07:46', '1'),
(64, 65, '', '', '79404562', 'Garfield DuBuque', 'DuBuque', '', 'Hombre', '2015-06-30', '', '', '', '', '', 'Av. Sin nombre ', '', '', '', '', '', '', '79404562', 'ESTUDIANTE', '2024-01-30 20:49:33', '2024-01-31 15:04:14', '1'),
(65, 75, '2024-11-21-05-07-07-risco.jpg', '', '44573950', 'Milton', 'CASTRO', 'Peña', 'HOMBRE', '1987-02-04', 'Perú', 'Trujillo', 'Lima', 'Lima', 'Miraflores', 'Jr. Punkaria 345', 'NO', 'Soporte Técnico', 'SOLTERO', 'TECNICO', 'NO', 'NINGUNA', '925813086', 'ESTUDIANTE', '2024-11-12 23:18:39', '2024-11-21 05:07:07', '1'),
(66, 76, '2024-11-21-05-07-27-pocoyo.jpg', '', '44573933', 'Esto ', 'Prueba de', 'Funcionamiento', 'MUJER', '1900-12-12', 'Perú', 'Huacho', 'Lima', 'Lima', 'Chosica', 'Av. 1 ro de Mayo 234', 'SI', 'Soporte Técnico', 'CONVIVIENTE', 'PROFESIONAL TECNICO', 'SI', 'DISCAPACIDAD AUDITIVA - HIPOACUSIA', '965818123', 'ESTUDIANTE', '2024-11-14 03:18:07', '2024-11-21 05:07:27', '1'),
(67, 77, '', '', '05212323', 'Jhon', 'Seminario', 'Acosta', 'HOMBRE', '1985-04-23', 'Perú', 'Lima', 'Lima', 'Lima', 'Chorrillos', 'Av. Los Nodales 567', 'SI', 'Auxiliar de almacén', 'SOLTERO', 'EDUCACION SECUNDARIA', 'NO', 'NINGUNA', '1222', 'ESTUDIANTE', '2024-11-18 14:38:50', '2024-11-21 04:17:53', '1'),
(68, 78, NULL, '', '05212333', 'Emma', 'Curitima', 'Curitima', 'MUJER', '1960-06-13', 'Perú', 'Trujillo', 'Lima', 'Lima', 'Lima', 'las margaritas 567', 'SI', 'Auditor', 'SOLTERO', 'PROFESIONAL TECNICO', 'NO', 'NINGUNA', '111', 'ESTUDIANTE', '2024-11-28 21:10:56', NULL, '1'),
(69, 79, NULL, '', '05212366', 'Victoria', 'Secret', 'Dior', 'HOMBRE', '2004-12-12', 'Perú', 'Arequipa', 'Lima', 'Lima', 'Lima', 'los olvidades de pamplona 345', 'SI', 'cobrador', 'SOLTERO', 'PROFESIONAL  NO  UNIVERSITARIO', 'NO', 'NINGUNA', '5555', 'ESTUDIANTE', '2024-11-28 23:45:43', NULL, '1'),
(70, 90, '2024-11-29-02-28-14-67495efe0c2be.png', '', '05212377', 'Jesica', 'Barrientos', 'Perez', 'MUJER', '2000-02-02', 'Perú', 'Chiclayo', 'Lima', 'Lima', 'Lima', 'los olvidades de torres 678', 'SI', 'Seguridad', 'SOLTERO', 'PROFESIONAL TECNICO', 'NO', 'NINGUNA', '89776', 'ESTUDIANTE', '2024-11-29 02:28:14', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ppffs`
--

CREATE TABLE `ppffs` (
  `id_ppff` int(11) NOT NULL,
  `estudiante_id` int(11) NOT NULL,
  `ref_nombre` varchar(50) NOT NULL,
  `ref_parentezco` varchar(50) NOT NULL,
  `ref_celular` varchar(50) NOT NULL,
  `nombres_apellidos_ppff` varchar(50) NOT NULL,
  `ci_ppf` varchar(20) NOT NULL,
  `celular_ppff` varchar(20) NOT NULL,
  `ocupacion_ppff` varchar(50) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `ppffs`
--

INSERT INTO `ppffs` (`id_ppff`, `estudiante_id`, `ref_nombre`, `ref_parentezco`, `ref_celular`, `nombres_apellidos_ppff`, `ci_ppf`, `celular_ppff`, `ocupacion_ppff`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 1, 'NINGUNA', 'NINGUNA', '77366663', 'MAMANI MAMANI MARIO', '3886647873', '7736663', 'CHOFER', '2024-01-18 08:44:24', '2024-12-02 03:26:34', '1'),
(2, 2, 'Esta Watsica', 'TIA', '79947047', 'Renner Griffin', '74772213', '747722132', 'POLICIA', '2024-01-23 15:18:28', NULL, '1'),
(3, 3, 'Trycia Reilly', 'TIA', '75110234', 'Turner Malika', '79453177', '794531772', 'ABOGADA', '2024-01-23 15:20:20', '2024-01-23 19:23:10', '1'),
(4, 4, 'Carissa Dibbert', 'TIA', '70252028', 'Hailey Gorczany', '70954930', '709549303', 'INGENIERO', '2024-01-23 15:31:39', '2024-01-23 19:40:15', '1'),
(5, 5, 'Elaina Kutch', 'TIA', '77666386', 'Mary Fisher', '73760969', '7376096912', 'POLICIA', '2024-01-25 11:29:36', NULL, '1'),
(6, 6, 'Eve Watsica', 'TIO', '70682284', 'Octavia Buckridge', '75595597', '755955972', 'ABOGADA', '2024-01-25 11:31:18', NULL, '1'),
(7, 7, 'NINGUNO', '-', '43434', 'Jerrell Hintz', '7748840', '73664539', 'EMPLEADO', '2024-01-30 20:49:33', '2024-01-30 21:17:37', '1'),
(8, 9, 'NINGUNO', '-', '-', 'Rahul Doyle', '7748838', '73664537', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(9, 11, 'NINGUNO', '-', '-', 'Luciano Sauer Jr.', '7748841', '73664540', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(10, 8, 'NINGUNO', '-', '-', 'Eliane Barrows', '7748837', '73664536', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(11, 12, 'NINGUNO', '-', '-', 'Maeve Hilpert', '7748842', '73664541', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(12, 10, 'NINGUNO', '-', '-', 'Aisha Bechtelar DVM', '7748839', '73664538', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(13, 13, 'NINGUNO', '-', '-', 'Mr. Zakary Purdy II', '7748843', '73664542', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(14, 14, 'NINGUNO', '-', '-', 'Delpha Kuhic', '7748845', '73664544', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(15, 16, 'NINGUNO', '-', '-', 'Cleveland Bosco', '7748846', '73664545', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(16, 17, 'NINGUNO', '-', '-', 'Dennis Ziemann', '7748848', '73664547', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(17, 15, 'NINGUNO', '-', '-', 'Deion Terry', '7748844', '73664543', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(18, 18, 'NINGUNO', '-', '-', 'Benny McGlynn', '7748847', '73664546', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(19, 19, 'NINGUNO', '-', '-', 'Dr. Samson Lakin Sr.', '7748849', '73664548', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(20, 20, 'NINGUNO', '-', '-', 'Prof. Clifford Dibbert', '7748850', '73664549', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(21, 21, 'NINGUNO', '-', '-', 'Yasmeen Gerhold', '7748854', '73664553', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(22, 22, 'NINGUNO', '-', '-', 'Consuelo Oberbrunner', '7748851', '73664550', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(23, 24, 'NINGUNO', '-', '-', 'Felicity Moen V', '7748852', '73664551', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(24, 23, 'NINGUNO', '-', '-', 'Wilson Quigley', '7748853', '73664552', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(25, 25, 'NINGUNO', '-', '-', 'Lenny Kris II', '7748855', '73664554', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(26, 26, 'NINGUNO', '-', '-', 'Donnie Mertz', '7748856', '73664555', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(27, 29, 'NINGUNO', '-', '-', 'Dr. Brandyn O\'Kon', '7748859', '73664558', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(31, 31, 'NINGUNO', '-', '-', 'Zaria Kertzmann', '7748861', '73664560', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(32, 32, 'NINGUNO', '-', '-', 'Dr. Marco Wolff III', '7748862', '73664561', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(33, 34, 'NINGUNO', '-', '-', 'Prof. Rico Huel I', '7748865', '73664564', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(34, 33, 'NINGUNO', '-', '-', 'Nasir Lynch', '7748863', '73664562', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(35, 35, 'NINGUNO', '-', '-', 'Prof. Isaiah Douglas DDS', '7748866', '73664565', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(36, 36, 'NINGUNO', '-', '-', 'Felicita Legros', '7748864', '73664563', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(37, 37, 'NINGUNO', '-', '-', 'Dennis Ziemann', '7748867', '73664566', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(38, 38, 'NINGUNO', '-', '-', 'Dr. Samson Lakin Sr.', '7748868', '73664567', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(39, 40, 'NINGUNO', '-', '-', 'Consuelo Oberbrunner', '7748870', '73664569', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(40, 41, 'NINGUNO', '-', '-', 'Felicity Moen V', '7748871', '73664570', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(41, 39, 'NINGUNO', '-', '-', 'Prof. Clifford Dibbert', '7748869', '73664568', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(42, 42, 'NINGUNO', '-', '-', 'Wilson Quigley', '7748872', '73664571', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(43, 43, 'NINGUNO', '-', '-', 'Yasmeen Gerhold', '7748873', '73664572', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(44, 44, 'NINGUNO', '-', '-', 'Lenny Kris II', '7748874', '73664573', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(45, 45, 'NINGUNO', '-', '-', 'Dennis Ziemann', '7748875', '73664574', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(46, 46, 'NINGUNO', '-', '-', 'Dr. Samson Lakin Sr.', '7748876', '73664575', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(47, 47, 'NINGUNO', '-', '-', 'Dennis Ziemann', '7748877', '73664576', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(48, 48, 'NINGUNO', '-', '-', 'Dr. Samson Lakin Sr.', '7748878', '73664577', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(49, 49, 'NINGUNO', '-', '-', 'Dennis Ziemann', '7748879', '73664578', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(50, 50, 'NINGUNO', '-', '-', 'Dr. Samson Lakin Sr.', '7748880', '73664579', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(51, 51, 'NINGUNO', '-', '-', 'Prof. Clifford Dibbert', '7748881', '73664580', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(52, 52, 'NINGUNO', '-', '-', 'Consuelo Oberbrunner', '7748882', '73664581', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(53, 53, 'NINGUNO', '-', '-', 'Wilson Quigley', '7748884', '73664583', 'EMPLEADO', '2024-01-30 20:49:33', NULL, '1'),
(54, 54, 'NINGUNA', 'NINGUNA', '0', 'Felicity Moen V', '7748883', '73664582', 'EMPLEADO', '2024-01-30 20:49:33', '2024-11-21 05:08:42', '1'),
(55, 55, 'NINGUNA', 'NINGUNA', '0', 'Yasmeen Gerhold', '7748885', '73664584', 'EMPLEADO', '2024-01-30 20:49:33', '2024-11-21 05:07:46', '1'),
(56, 56, 'NINGUNO', '-', '0', 'Lenny Kris II', '7748886', '73664585', 'EMPLEADO', '2024-01-30 20:49:33', '2024-01-31 15:04:14', '1'),
(57, 57, 'NINGUNA', 'NINGUNA', 'scsc', 'Curitima Ramirez Emma', '05212326', '991657650', 'Profesora', '2024-11-12 23:18:39', '2024-11-21 05:07:07', '1'),
(58, 58, 'NINGUNA', 'NINGUNA', '444', 'bfghh', '05212355', '12345', 'fgdfg', '2024-11-14 03:18:07', '2024-11-21 05:07:27', '1'),
(59, 59, 'NINGUNA', 'NINGUNA', '-', 'gfhfgh', '8788', '56566', 'fghg', '2024-11-18 14:38:50', '2024-11-21 04:17:53', '1'),
(60, 60, 'NINGUNA', 'NINGUNA', '-', '-', '-', '11', '-', '2024-11-28 21:10:56', NULL, '1'),
(61, 61, 'NINGUNA', 'NINGUNA', '-', '-', '-', '66', '-', '2024-11-28 23:45:43', NULL, '1'),
(62, 62, 'NINGUNA', 'NINGUNA', '-', '-', '-', '88', '-', '2024-11-29 02:28:14', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(255) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 'ADMINISTRADOR', '2024-01-03 16:20:20', NULL, '1'),
(2, 'DIRECTOR ACADÉMICO', '2024-01-03 16:20:20', NULL, '1'),
(3, 'DIRECTOR ADMINISTRATIVO', '2024-01-03 16:20:20', NULL, '1'),
(4, 'CONTADOR', '2024-01-03 16:20:20', NULL, '1'),
(5, 'SECRETARIA', '2024-01-03 16:20:20', NULL, '1'),
(6, 'DOCENTE', '2024-01-03 16:20:20', NULL, '1'),
(7, 'ESTUDIANTE', '2024-01-17 08:15:10', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles_permisos`
--

CREATE TABLE `roles_permisos` (
  `id_rol_permiso` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `permiso_id` int(11) NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `roles_permisos`
--

INSERT INTO `roles_permisos` (`id_rol_permiso`, `rol_id`, `permiso_id`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(5, 1, 1, '2024-01-29 12:55:45', NULL, '1'),
(6, 1, 2, '2024-01-29 12:55:49', NULL, '1'),
(8, 1, 18, '2024-01-29 12:55:56', NULL, '1'),
(9, 1, 23, '2024-01-29 12:55:59', NULL, '1'),
(10, 1, 22, '2024-01-29 12:56:02', NULL, '1'),
(11, 1, 5, '2024-01-29 12:56:04', NULL, '1'),
(12, 1, 6, '2024-01-29 12:56:07', NULL, '1'),
(13, 1, 20, '2024-01-29 12:56:11', NULL, '1'),
(16, 1, 3, '2024-01-29 12:56:21', NULL, '1'),
(17, 1, 4, '2024-01-29 12:56:24', NULL, '1'),
(18, 1, 26, '2024-01-29 12:56:27', NULL, '1'),
(19, 1, 11, '2024-01-29 12:56:30', NULL, '1'),
(20, 1, 12, '2024-01-29 12:56:34', NULL, '1'),
(21, 2, 15, '2024-01-29 12:56:49', NULL, '1'),
(22, 2, 16, '2024-01-29 12:56:52', NULL, '1'),
(23, 2, 19, '2024-01-29 12:56:56', NULL, '1'),
(24, 2, 1, '2024-01-29 12:57:05', NULL, '1'),
(25, 2, 2, '2024-01-29 12:57:08', NULL, '1'),
(26, 2, 17, '2024-01-29 12:57:12', NULL, '1'),
(27, 2, 18, '2024-01-29 12:57:15', NULL, '1'),
(28, 2, 23, '2024-01-29 12:57:18', NULL, '1'),
(29, 2, 22, '2024-01-29 12:57:22', NULL, '1'),
(30, 2, 5, '2024-01-29 12:57:25', NULL, '1'),
(31, 2, 6, '2024-01-29 12:57:29', NULL, '1'),
(32, 2, 7, '2024-01-29 12:57:45', NULL, '1'),
(33, 2, 8, '2024-01-29 12:57:48', NULL, '1'),
(34, 2, 3, '2024-01-29 12:57:50', NULL, '1'),
(35, 2, 4, '2024-01-29 12:57:53', NULL, '1'),
(36, 1, 9, '2024-01-29 12:58:26', NULL, '1'),
(37, 1, 10, '2024-01-29 12:58:30', NULL, '1'),
(38, 1, 13, '2024-01-29 12:58:32', NULL, '1'),
(39, 1, 25, '2024-01-29 12:58:35', NULL, '1'),
(40, 3, 15, '2024-01-29 12:58:55', NULL, '1'),
(41, 3, 16, '2024-01-29 12:58:58', NULL, '1'),
(42, 3, 1, '2024-01-29 12:59:07', NULL, '1'),
(43, 3, 2, '2024-01-29 12:59:09', NULL, '1'),
(44, 3, 23, '2024-01-29 12:59:18', NULL, '1'),
(45, 3, 22, '2024-01-29 12:59:20', NULL, '1'),
(46, 3, 26, '2024-01-29 12:59:30', NULL, '1'),
(50, 5, 15, '2024-01-29 12:59:59', NULL, '1'),
(51, 5, 16, '2024-01-29 13:00:05', NULL, '1'),
(58, 7, 20, '2024-01-29 13:01:02', NULL, '1'),
(60, 6, 21, '2024-01-29 13:02:56', NULL, '1'),
(61, 6, 20, '2024-01-29 15:52:08', NULL, '1'),
(62, 1, 27, '2024-01-29 16:26:26', NULL, '1'),
(63, 2, 27, '2024-01-29 16:26:34', NULL, '1'),
(64, 3, 27, '2024-01-29 16:26:42', NULL, '1'),
(65, 4, 27, '2024-01-29 16:27:15', NULL, '1'),
(67, 6, 27, '2024-01-29 16:27:29', NULL, '1'),
(68, 7, 27, '2024-01-29 16:27:37', NULL, '1'),
(69, 1, 28, '2024-01-29 17:38:15', NULL, '1'),
(70, 2, 28, '2024-01-29 17:38:36', NULL, '1'),
(71, 3, 28, '2024-01-29 17:38:43', NULL, '1'),
(72, 1, 29, '2024-01-29 17:40:07', NULL, '1'),
(73, 2, 29, '2024-01-29 17:40:17', NULL, '1'),
(74, 3, 29, '2024-01-29 17:40:26', NULL, '1'),
(75, 1, 30, '2024-01-29 17:41:29', NULL, '1'),
(76, 2, 30, '2024-01-29 17:41:35', NULL, '1'),
(77, 3, 30, '2024-01-29 17:41:41', NULL, '1'),
(78, 1, 31, '2024-01-29 17:43:01', NULL, '1'),
(79, 2, 31, '2024-01-29 17:43:07', NULL, '1'),
(80, 3, 31, '2024-01-29 17:43:12', NULL, '1'),
(81, 1, 32, '2024-01-29 17:44:09', NULL, '1'),
(82, 2, 32, '2024-01-29 17:44:14', NULL, '1'),
(83, 3, 32, '2024-01-29 17:44:20', NULL, '1'),
(84, 1, 33, '2024-01-29 17:45:16', NULL, '1'),
(85, 2, 33, '2024-01-29 17:45:24', NULL, '1'),
(86, 3, 33, '2024-01-29 17:45:30', NULL, '1'),
(87, 1, 34, '2024-01-29 17:46:24', NULL, '1'),
(88, 2, 34, '2024-01-29 17:46:34', NULL, '1'),
(89, 3, 34, '2024-01-29 17:46:42', NULL, '1'),
(90, 1, 35, '2024-01-29 17:47:51', NULL, '1'),
(91, 2, 35, '2024-01-29 17:48:05', NULL, '1'),
(92, 1, 36, '2024-01-29 17:49:05', NULL, '1'),
(93, 2, 36, '2024-01-29 17:49:14', NULL, '1'),
(94, 1, 37, '2024-01-29 17:50:34', NULL, '1'),
(95, 2, 37, '2024-01-29 17:50:46', NULL, '1'),
(96, 1, 38, '2024-01-29 17:52:11', NULL, '1'),
(97, 2, 38, '2024-01-29 17:52:19', NULL, '1'),
(99, 2, 39, '2024-01-29 18:06:14', NULL, '1'),
(101, 2, 40, '2024-01-29 18:07:29', NULL, '1'),
(102, 1, 41, '2024-01-29 18:08:55', NULL, '1'),
(103, 1, 42, '2024-01-29 18:09:47', NULL, '1'),
(104, 1, 43, '2024-01-29 18:11:26', NULL, '1'),
(105, 1, 44, '2024-01-29 18:13:10', NULL, '1'),
(106, 1, 45, '2024-01-29 18:14:00', NULL, '1'),
(108, 2, 46, '2024-01-29 18:20:40', NULL, '1'),
(109, 3, 46, '2024-01-29 18:20:51', NULL, '1'),
(110, 5, 46, '2024-01-29 18:21:10', NULL, '1'),
(112, 2, 47, '2024-01-29 18:21:55', NULL, '1'),
(113, 3, 47, '2024-01-29 18:22:01', NULL, '1'),
(114, 5, 47, '2024-01-29 18:22:07', NULL, '1'),
(115, 1, 48, '2024-01-29 18:33:06', NULL, '1'),
(116, 2, 48, '2024-01-29 18:33:23', NULL, '1'),
(118, 1, 49, '2024-01-29 18:34:34', NULL, '1'),
(119, 2, 49, '2024-01-29 18:34:40', NULL, '1'),
(120, 5, 47, '2024-01-29 18:34:49', NULL, '1'),
(121, 1, 50, '2024-01-29 18:36:59', NULL, '1'),
(122, 2, 50, '2024-01-29 18:37:11', NULL, '1'),
(123, 3, 50, '2024-01-29 18:37:21', NULL, '1'),
(125, 1, 51, '2024-01-29 18:38:51', NULL, '1'),
(126, 2, 51, '2024-01-29 18:39:04', NULL, '1'),
(127, 3, 51, '2024-01-29 18:39:13', NULL, '1'),
(128, 4, 51, '2024-01-29 18:39:21', NULL, '1'),
(130, 1, 52, '2024-01-29 18:40:20', NULL, '1'),
(131, 2, 52, '2024-01-29 18:40:27', NULL, '1'),
(132, 3, 52, '2024-01-29 18:40:35', NULL, '1'),
(134, 3, 53, '2024-01-29 18:42:50', NULL, '1'),
(135, 1, 53, '2024-01-29 18:43:30', NULL, '1'),
(136, 1, 54, '2024-01-30 20:06:15', NULL, '1'),
(137, 2, 54, '2024-01-30 20:06:29', NULL, '1'),
(139, 6, 55, '2024-01-30 20:53:11', NULL, '1'),
(142, 7, 21, '2024-07-22 16:39:47', NULL, '1'),
(143, 7, 56, '2024-07-22 16:41:31', NULL, '1'),
(144, 7, 57, '2024-07-22 16:44:00', NULL, '1'),
(145, 1, 56, '2024-11-12 19:59:24', NULL, '1'),
(148, 1, 58, '2024-11-17 14:18:09', NULL, '1'),
(149, 1, 59, '2024-11-17 17:02:38', NULL, '1'),
(153, 1, 60, '2024-11-24 12:16:14', NULL, '1'),
(156, 1, 61, '2024-11-27 17:02:31', NULL, '1'),
(157, 4, 37, '2024-12-01 17:12:35', NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `rol_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `estado` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol_id`, `email`, `password`, `fyh_creacion`, `fyh_actualizacion`, `estado`) VALUES
(1, 1, 'admin@admin.com', '$2y$10$0tYmdHU9uGCIxY1f90W1EuIm54NQ8axowkxL1WzLbqO2LdNa8m3l2', '2023-12-28 20:29:10', NULL, '1'),
(4, 1, 'cetpro@gmail.com', '$2y$10$816nGY5VZ3lr.R8ToIF8QuRTcc/QVQqdcD8AOv6rYTKi7idyXXGh6', '2024-01-15 17:45:20', '2024-11-28 21:32:38', '1'),
(5, 7, 'brigida@gmail.com', '$2y$10$J2AaQCjT9IoLFpboU85mPOX9kbshT99GGyDVQtYhn996MN/VYeezK', '2024-01-15 17:47:25', '2024-12-01 13:00:15', '1'),
(7, 7, 'brigidamendoza@gmail.com', '$2y$10$QU0TgWuk2Ziwq4mrQyxpyOuSvSqK0PpOoOIM5VZUWbwaw0niV37me', '2024-01-16 10:19:28', '2024-12-01 12:56:55', '1'),
(8, 7, 'jtillman@example.com', '$2y$10$AqKBZ9iv3D9qOA3Vv7GjMOijlv1bmUP9MVFWg54Ofgc4BsaU0xJAS', '2024-01-16 11:18:29', '2024-12-01 12:58:27', '1'),
(9, 7, 'benjamin222@gamil.com', '$2y$10$2O03b06jjuyGYC3FqAjl/eKkKc4p3IwlehXSRb3TjrUSHb4WenY6y', '2024-01-18 08:44:24', '2024-12-02 03:26:34', '1'),
(10, 7, 'willms.drew@example.org', '$2y$10$fgf7m.T8h/76HQIdk3z7/eH/B5dYuZrWUaVyAyYga6EGCQzNYo.fi', '2024-01-23 15:18:28', NULL, '1'),
(11, 7, 'schultz.thomas@example.org', '$2y$10$/gkWCCdiV63m8o7ERog40.LZct9p2.Jw7rjT67mXzvwHg9S3e2YgC', '2024-01-23 15:20:20', '2024-01-23 19:23:10', '1'),
(12, 7, 'marquise.rogahn@example.net', '$2y$10$vVDAaRkU8KSCyQbucLAKH.Th.0B01kNn6BO448nSP3O2RJ0SQs.HG', '2024-01-23 15:31:39', '2024-01-23 19:40:15', '1'),
(13, 7, 'jason.marvin@example.com', '$2y$10$icPwbdaXPyxAgLCyZyw8RORyBkYxTOKfvPsDLB94RlBEtjyq9MCX.', '2024-01-25 11:29:36', NULL, '1'),
(14, 7, 'bret.dickens@example.net', '$2y$10$xCcPlihQGlflSWq4Uahr0ewXCFEkxwuxjlZWspI5B0ctj0CiBWyKu', '2024-01-25 11:31:18', NULL, '1'),
(15, 2, 'patriciaquice@cetpro.com', '$2y$10$AS7kGk4X0dToJr1udtqWmOvbDrVoIDPKskq209m2Zguf6YaGTxDc2', '2024-01-29 15:57:38', '2024-12-02 00:56:44', '1'),
(16, 7, 'brent28@example.net', '$2y$10$DUWdcxZ73PQKtR./xGaAYuBexATt6CkVQvZmZttjE9KHJKEY23pPO', '2024-01-30 20:49:33', NULL, '1'),
(17, 7, 'xlockman@example.com', '$2y$10$myunwxSMI/BD4KQ3XeqFnOT6/XoCrHFDYFIyW8mU5LVHLGqtSXC8u', '2024-01-30 20:49:33', NULL, '1'),
(18, 7, 'otis.hills@example.com', '$2y$10$8JHih3vOVKHKlS6lrI5bbuWpoYlGqAHWP5IbIPD9LBthYBEGG6g6u', '2024-01-30 20:49:33', NULL, '1'),
(19, 7, 'rsatterfield@example.org', '$2y$10$08CeTYRNUgYmgr6rNX3QreF8NBUYKYlBQO/C/7DFfY17LTb2CWomK', '2024-01-30 20:49:33', NULL, '1'),
(20, 7, 'jace86@example.org', '$2y$10$.CAxZ6y5vWufYiht741bV.aL8nAPd0LagjyNACuzmVCoqKhJsMSVK', '2024-01-30 20:49:33', '2024-01-30 21:17:37', '1'),
(21, 7, 'morris.rosenbaum@example.org', '$2y$10$nCuP5OjEuSYIubGhlg6iMeN3Jtsm9EkhWI6wUB9GZdxN8jBGyKjou', '2024-01-30 20:49:33', NULL, '1'),
(22, 7, 'fwilkinson@example.net', '$2y$10$ALpV4CoPcG8hJKOPc6D/DuL1/ChwjWws0el47BGtWJhaZ.ZFiVOFK', '2024-01-30 20:49:33', NULL, '1'),
(23, 7, 'kiehn.shawn@example.net', '$2y$10$Dji6nIDdHoh9u7WuLybO9eQ38gw0zKMVvqE2ddoXdaF6s6hT7aO0C', '2024-01-30 20:49:33', NULL, '1'),
(24, 7, 'valentin32@example.com', '$2y$10$m5fT5U/nv9HlF9WUEKgnCOZ90/EwCbPYUkb.SiJgklr3v3UNU6NNS', '2024-01-30 20:49:33', NULL, '1'),
(25, 7, 'ankunding.shane@example.org', '$2y$10$D8D60SZ9eJe3I4/mHoAP6eZ60q3Qfovl0eu7Qa6i9TjHfYir2zkYS', '2024-01-30 20:49:33', NULL, '1'),
(26, 7, 'josiane84@example.net', '$2y$10$RV2KIIdYJ/o9YmPMfG7TgO7ixGuHzrUZBOu/VQlZXo2oTjRQCAha.', '2024-01-30 20:49:33', NULL, '1'),
(27, 7, 'alessandra.gottlieb@example.org', '$2y$10$t7Mt93oRb3g0Ydhb79aTSe72n.avCIl7fBdNO8Q5AX9eQTHcaR6Cm', '2024-01-30 20:49:33', NULL, '1'),
(28, 7, 'mhand@example.org', '$2y$10$72urW22Aqg4H3d031BDzo.VqWVlZxdSyqm5SSLYHTpgCogShnDtLO', '2024-01-30 20:49:33', NULL, '1'),
(29, 7, 'wintheiser.flo@example.net', '$2y$10$gFayevrljbTPDFfjUoXp7uy4IB5ptWUrgmdIeZJ6qiHJpDqv8oRFO', '2024-01-30 20:49:33', NULL, '1'),
(30, 7, 'daija.koch@example.com', '$2y$10$1Js85pX0cZiteNzjxsZqdO.hIbfyJgL8wa4Dzgp.FS62lC9idfOF.', '2024-01-30 20:49:33', NULL, '1'),
(31, 7, 'wlubowitz@example.com', '$2y$10$EMnCudfd05xUE6YOnGIGdOJxPvvZ516uB1zUasyEepspD9RjJBRy2', '2024-01-30 20:49:33', NULL, '1'),
(32, 7, 'grady.carmella@example.com', '$2y$10$fz3Wa1yxhhOqyoT9kHGAj.APhCu.hdWBSgMKqt3hlXhNPU0WqdWmy', '2024-01-30 20:49:33', NULL, '1'),
(33, 7, 'clement44@example.org', '$2y$10$x2CXCJtG3WcwbwANrbr5V.EpdjPEq0ky0Z92fBVM3mOff6W02ciei', '2024-01-30 20:49:33', NULL, '1'),
(34, 7, 'albina79@example.com', '$2y$10$kMTtLuklEkFAl6fbG7sLae3QTG4xD2.TSoIOFMYvPvDO6jE4oRApe', '2024-01-30 20:49:33', NULL, '1'),
(35, 7, 'sigrid35@example.net', '$2y$10$mQbDlBCmho2wU6KbVDac8uSGVMibv2eSf1M4Tmi5zdoT3g.aeO/yG', '2024-01-30 20:49:33', NULL, '1'),
(37, 7, 'beryl95@example.net', '$2y$10$hBaq3WLk5FR2H0Go3D4/beT/iq9tRjovh8MmboWVqKlTZ.HQJ3x9y', '2024-01-30 20:49:33', NULL, '1'),
(40, 7, 'alison63@example.net', '$2y$10$mCIBtM7Oidox9ravKM8L1.XQH4NjqoTgGiVWKA942f9AhPlE8AD.m', '2024-01-30 20:49:33', NULL, '1'),
(41, 7, 'alf78@example.org', '$2y$10$xJivxeO6yI6nBAt1UJFikuW89MbvhnnLfM4F1ovSJzFSSY.JdASaK', '2024-01-30 20:49:33', NULL, '1'),
(42, 7, 'dorn@example.org', '$2y$10$LH19i5/fDbRTk3JRYkbOGegreZbkuKKmvyVRft5uNK6TQL60It5Gu', '2024-01-30 20:49:33', NULL, '1'),
(43, 7, 'rosina33@example.org', '$2y$10$eqZxKO7BLt1j2CNzNWPru.J5p2BOvKvvPhb22uQbZDqgjWBSeiCuC', '2024-01-30 20:49:33', NULL, '1'),
(44, 7, 'dicki.alvah@example.org', '$2y$10$/mLNPgSxw8gEqbVRF17hy.vsJEe.JAL4Yc7Gp1drJNBVZ4WLDZoP.', '2024-01-30 20:49:33', NULL, '1'),
(45, 7, 'sandrine.hyatt@example.net', '$2y$10$Lsezv9RU1viQfYEaYy1tyen/iBiuorDGojsBO3r/xen7O8a.Xnr46', '2024-01-30 20:49:33', NULL, '1'),
(46, 7, 'kerluke.jaunita@example.org', '$2y$10$eAzL9JdWb3vIRCLFpdBtseV0Ua.K8ETuNAaul9K/dPUQY3.AYbo0G', '2024-01-30 20:49:33', NULL, '1'),
(47, 7, 'napoleon.kris@example.com', '$2y$10$aYe.BEMSJSvc6PH54Y5ohe0vShzJdesMgyo5ZGgaTXbc.I6kS2epy', '2024-01-30 20:49:33', NULL, '1'),
(48, 7, 'terrill.bednar@example.net', '$2y$10$oCLTCZTyvxOCUmssmchlheQKPxyLd6HgZc/wzSdvFSK0HIvv/v0GC', '2024-01-30 20:49:33', NULL, '1'),
(49, 7, 'mercedes65@example.org', '$2y$10$r/gOkt4Yy4hvYtaoW41lTOYrv4WD6IJeR37KfuZI69o2iUQJEYEJC', '2024-01-30 20:49:33', NULL, '1'),
(50, 7, 'lubowitz.adrianna@example.com', '$2y$10$xMj29ik.Y3VfdVn47YdEXepm.0dv7zw6SzkYWxcCH7BZPL7f6TfV2', '2024-01-30 20:49:33', NULL, '1'),
(51, 7, 'monica.bauch@example.org', '$2y$10$HPzRzipr0TIP3MNdfWLFmOkDhp.4tUoSF1nAwpq3J.qJC9XPmK9eG', '2024-01-30 20:49:33', NULL, '1'),
(52, 7, 'pquigley@example.net', '$2y$10$bztgIbUXvndEAwsiKqCaMe/Olj8QvRAKmS5H4jHQQo3tmApkAyZLW', '2024-01-30 20:49:33', NULL, '1'),
(53, 7, 'william.runolfsson@example.org', '$2y$10$0BXRg.HDUICySMb89JnjO.SjgDi6w/Qu6gb.1VzjGwifYZKyBGEIa', '2024-01-30 20:49:33', NULL, '1'),
(54, 7, 'lind.keshawn@example.net', '$2y$10$Bakm3L50xRFRaUPH1XruAOTZq.tIcpZXG/BrupL/MppxnY7/MoOwm', '2024-01-30 20:49:33', NULL, '1'),
(55, 7, 'ernser.jesus@example.net', '$2y$10$UDF2yvrrLStJYabM8Qtk9.SGS.CRpnbvDlv.sTIsoTR6IHRW6hzii', '2024-01-30 20:49:33', NULL, '1'),
(56, 7, 'wcollier@example.org', '$2y$10$7i73flZTI0TJNyGQSUMUmOkv39j2PCzE5RORMYpFeLRYE21tGTE2y', '2024-01-30 20:49:33', NULL, '1'),
(57, 7, 'murphy.mateo@example.com', '$2y$10$t0AGHijyIgnzNPYSb61XX.JqJqtzFS2p7ghI4zbrzOOwvjNaDaKoO', '2024-01-30 20:49:33', NULL, '1'),
(58, 7, 'elvera.schaden@example.org', '$2y$10$J91hGZOIB.kak/sq1eeCue607mcHfRhvgCPpcw3plM.SssADFP8Rq', '2024-01-30 20:49:33', NULL, '1'),
(59, 7, 'hand.jordi@example.net', '$2y$10$P5PU4hPZs4hmrD8N9OBT.OQd16CVFqyUXz4zfQM/38k6PdKQMU0BC', '2024-01-30 20:49:33', NULL, '1'),
(60, 7, 'lang.efren@example.org', '$2y$10$YS4mRmfgp2PinZlr9b3V0eGDODep/1JYNKODSYAceBvgbXZ3GdLbK', '2024-01-30 20:49:33', NULL, '1'),
(61, 7, 'nina15@example.org', '$2y$10$DVXmdeKy/vK0LXd.MIn8w.9iddPEXKEaQCIBnqRAXxI1ZyB9j7nuO', '2024-01-30 20:49:33', NULL, '1'),
(62, 7, 'vada.spencer@example.org', '$2y$10$8wctogGc7IUiXly9nd7nWeMTQEayDIPDX509fS6Gc6oXuY8zluA4.', '2024-01-30 20:49:33', NULL, '1'),
(63, 7, 'king.janis@example.com', '$2y$10$RFyv4Y4a27Zb.nzSafW5ReHx.kL1ZbCDxKuO7FK0PyFVfhEXQRUIu', '2024-01-30 20:49:33', '2024-11-21 05:08:42', '1'),
(64, 7, 'erich.franecki@example.com', '$2y$10$jvyyrVWrDKgWsZGRjtrOEeGRAXnQYISna6CCLLJwjts.aekI0tYuO', '2024-01-30 20:49:33', '2024-11-21 05:07:46', '1'),
(65, 7, 'kunze.anais@example.com', '$2y$10$LyJ0kOaFUZIuVkCgCtSHYuUswlWHMf/zyW/9Y.Db0B.hvWQyDtp6K', '2024-01-30 20:49:33', '2024-01-31 15:04:14', '1'),
(75, 7, 'milton87@autnomoa.edu.pe', '$2y$10$mGex0ZfCyiSlDm.M6wb7UuTDcRlltWAIqLuDYu5ZLhcGUWTIqbuMO', '2024-11-12 23:18:39', '2024-11-21 05:07:07', '1'),
(76, 7, 'squispe@autonoma.edu.pe', '$2y$10$DRDE0D1OtHtulc0c6Zh.D.ObKyHzg4F2vOc5vmOQHuH9tVMAwicbe', '2024-11-14 03:18:07', '2024-11-21 05:07:27', '1'),
(77, 7, 'joncito@gmail.com', '$2y$10$U77vKglQruWE4/YYQIxfsuTunHT9h.gr5RyPNrS3MBKQKs.05E9x6', '2024-11-18 14:38:50', '2024-11-21 04:17:53', '1'),
(78, 7, 'emma@curitima.com', '$2y$10$bL1qhoO1kqcM0SedxbbUxeJozxqSsEvkttYMTCeCfbqYbBugG4SnW', '2024-11-28 21:10:56', NULL, '1'),
(79, 7, 'victoria@victoria.com', '$2y$10$ObnRvn5IYIMBYqCZjMm84O3f8hceB2RZJ03pUnNl.XRDWXLfCvI/a', '2024-11-28 23:45:43', NULL, '1'),
(90, 7, 'jesica@gmail.com', '$2y$10$ne4XjICXg3pnx/Wb73iS/ORbGVTpiXMMJ2j1OYCKyosIf35Q0wLuC', '2024-11-29 02:28:14', NULL, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrativos`
--
ALTER TABLE `administrativos`
  ADD PRIMARY KEY (`id_administrativo`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD PRIMARY KEY (`id_asignacion`),
  ADD KEY `docente_id` (`docente_id`),
  ADD KEY `nivel_id` (`nivel_id`),
  ADD KEY `materia_id` (`materia_id`),
  ADD KEY `grado_id` (`grado_id`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD PRIMARY KEY (`id_calificacion`),
  ADD KEY `docente_id` (`docente_id`),
  ADD KEY `materia_id` (`materia_id`),
  ADD KEY `estudiante_id` (`estudiante_id`);

--
-- Indices de la tabla `configuracion_instituciones`
--
ALTER TABLE `configuracion_instituciones`
  ADD PRIMARY KEY (`id_config_institucion`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id_docente`),
  ADD KEY `persona_id` (`persona_id`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`id_estudiante`),
  ADD KEY `persona_id` (`persona_id`),
  ADD KEY `nivel_id` (`nivel_id`),
  ADD KEY `grado_id` (`grado_id`);

--
-- Indices de la tabla `gestiones`
--
ALTER TABLE `gestiones`
  ADD PRIMARY KEY (`id_gestion`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id_grado`),
  ADD KEY `nivel_id` (`nivel_id`);

--
-- Indices de la tabla `kardexs`
--
ALTER TABLE `kardexs`
  ADD PRIMARY KEY (`id_kardex`),
  ADD KEY `docente_id` (`docente_id`),
  ADD KEY `materia_id` (`materia_id`),
  ADD KEY `estudiante_id` (`estudiante_id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`id_nivel`),
  ADD KEY `gestion_id` (`gestion_id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `estudiante_id` (`estudiante_id`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permiso`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id_persona`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `ppffs`
--
ALTER TABLE `ppffs`
  ADD PRIMARY KEY (`id_ppff`),
  ADD KEY `estudiante_id` (`estudiante_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`),
  ADD UNIQUE KEY `nombre_rol` (`nombre_rol`);

--
-- Indices de la tabla `roles_permisos`
--
ALTER TABLE `roles_permisos`
  ADD PRIMARY KEY (`id_rol_permiso`),
  ADD KEY `rol_id` (`rol_id`),
  ADD KEY `permiso_id` (`permiso_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrativos`
--
ALTER TABLE `administrativos`
  MODIFY `id_administrativo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  MODIFY `id_asignacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  MODIFY `id_calificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `configuracion_instituciones`
--
ALTER TABLE `configuracion_instituciones`
  MODIFY `id_config_institucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id_docente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  MODIFY `id_estudiante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `gestiones`
--
ALTER TABLE `gestiones`
  MODIFY `id_gestion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id_grado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `kardexs`
--
ALTER TABLE `kardexs`
  MODIFY `id_kardex` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `ppffs`
--
ALTER TABLE `ppffs`
  MODIFY `id_ppff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `roles_permisos`
--
ALTER TABLE `roles_permisos`
  MODIFY `id_rol_permiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrativos`
--
ALTER TABLE `administrativos`
  ADD CONSTRAINT `administrativos_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id_persona`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `asignaciones`
--
ALTER TABLE `asignaciones`
  ADD CONSTRAINT `asignaciones_ibfk_1` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id_docente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asignaciones_ibfk_2` FOREIGN KEY (`nivel_id`) REFERENCES `niveles` (`id_nivel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asignaciones_ibfk_3` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id_materia`) ON UPDATE CASCADE,
  ADD CONSTRAINT `asignaciones_ibfk_4` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`id_grado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
  ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id_docente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id_materia`) ON UPDATE CASCADE,
  ADD CONSTRAINT `calificaciones_ibfk_3` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id_estudiante`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `docentes_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id_persona`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id_persona`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_2` FOREIGN KEY (`nivel_id`) REFERENCES `niveles` (`id_nivel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_3` FOREIGN KEY (`grado_id`) REFERENCES `grados` (`id_grado`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `grados`
--
ALTER TABLE `grados`
  ADD CONSTRAINT `grados_ibfk_1` FOREIGN KEY (`nivel_id`) REFERENCES `niveles` (`id_nivel`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `kardexs`
--
ALTER TABLE `kardexs`
  ADD CONSTRAINT `kardexs_ibfk_1` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id_docente`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kardexs_ibfk_2` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id_materia`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kardexs_ibfk_3` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id_estudiante`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD CONSTRAINT `niveles_ibfk_1` FOREIGN KEY (`gestion_id`) REFERENCES `gestiones` (`id_gestion`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id_estudiante`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `ppffs`
--
ALTER TABLE `ppffs`
  ADD CONSTRAINT `ppffs_ibfk_1` FOREIGN KEY (`estudiante_id`) REFERENCES `estudiantes` (`id_estudiante`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `roles_permisos`
--
ALTER TABLE `roles_permisos`
  ADD CONSTRAINT `roles_permisos_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `roles_permisos_ibfk_2` FOREIGN KEY (`permiso_id`) REFERENCES `permisos` (`id_permiso`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id_rol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
