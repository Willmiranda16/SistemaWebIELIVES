-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2023 a las 04:36:50
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
-- Base de datos: `sistema_academico_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aa_operacion`
--

CREATE TABLE `aa_operacion` (
  `us_id` bigint(20) NOT NULL,
  `asis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ad_operacion`
--

CREATE TABLE `ad_operacion` (
  `us_id` bigint(20) NOT NULL,
  `asis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `alu_id` int(11) NOT NULL,
  `per_id` int(11) DEFAULT NULL,
  `apo_id` int(11) DEFAULT NULL,
  `name_libreta_notas` varchar(255) DEFAULT NULL,
  `name_ficha_matricula` varchar(255) DEFAULT NULL,
  `alu_estado` char(1) DEFAULT '0' COMMENT '1: Activo; 2:Inactivo; 3:Retirado',
  `is_deleted` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`alu_id`, `per_id`, `apo_id`, `name_libreta_notas`, `name_ficha_matricula`, `alu_estado`, `is_deleted`) VALUES
(1, 2, 1, NULL, NULL, '1', '0'),
(2, 4, 2, NULL, NULL, '1', '0'),
(3, 16, 3, NULL, NULL, '1', '0'),
(4, 18, 4, NULL, NULL, '1', '0'),
(5, 20, 5, NULL, NULL, '1', '0'),
(6, 23, 6, NULL, NULL, '1', '0'),
(7, 25, 7, NULL, NULL, '1', '0'),
(8, 27, 8, NULL, NULL, '1', '0'),
(9, 29, 9, NULL, NULL, '1', '0'),
(10, 31, 10, NULL, NULL, '1', '0'),
(11, 33, 11, NULL, NULL, '1', '0'),
(12, 38, 79, NULL, NULL, '1', '0'),
(13, 41, 12, NULL, NULL, '1', '0'),
(14, 43, 13, NULL, NULL, '1', '0'),
(15, 45, 14, NULL, NULL, '1', '0'),
(16, 47, 15, NULL, NULL, '1', '0'),
(17, 49, 16, NULL, NULL, '1', '0'),
(18, 51, 17, NULL, NULL, '1', '0'),
(19, 53, 18, NULL, NULL, '1', '0'),
(20, 55, 19, NULL, NULL, '1', '0'),
(21, 57, 20, NULL, NULL, '1', '0'),
(22, 59, 21, NULL, NULL, '1', '0'),
(23, 61, 22, NULL, NULL, '1', '0'),
(24, 63, 23, NULL, NULL, '1', '0'),
(25, 65, 25, NULL, NULL, '1', '0'),
(26, 66, 24, NULL, NULL, '1', '0'),
(27, 69, 26, NULL, NULL, '1', '0'),
(28, 71, 27, NULL, NULL, '1', '0'),
(29, 73, 28, NULL, NULL, '1', '0'),
(30, 75, 29, NULL, NULL, '1', '0'),
(31, 77, 30, NULL, NULL, '1', '0'),
(32, 79, 31, NULL, NULL, '1', '0'),
(33, 81, 32, NULL, NULL, '1', '0'),
(34, 83, 33, NULL, NULL, '1', '0'),
(35, 85, 34, NULL, NULL, '1', '0'),
(36, 87, 35, NULL, NULL, '1', '0'),
(37, 89, 36, NULL, NULL, '1', '0'),
(38, 91, 37, NULL, NULL, '1', '0'),
(39, 93, 38, NULL, NULL, '1', '0'),
(40, 95, 39, NULL, NULL, '1', '0'),
(41, 97, 40, NULL, NULL, '1', '0'),
(42, 99, 41, NULL, NULL, '1', '0'),
(43, 101, 42, NULL, NULL, '1', '0'),
(44, 103, 43, NULL, NULL, '1', '0'),
(45, 105, 44, NULL, NULL, '1', '0'),
(46, 107, 45, NULL, NULL, '1', '0'),
(47, 109, 46, NULL, NULL, '1', '0'),
(48, 111, 47, NULL, NULL, '1', '0'),
(49, 113, 48, NULL, NULL, '1', '0'),
(50, 115, 49, NULL, NULL, '1', '0'),
(51, 117, 50, NULL, NULL, '1', '0'),
(52, 119, 51, NULL, NULL, '1', '0'),
(53, 121, 52, NULL, NULL, '1', '0'),
(54, 123, 53, NULL, NULL, '1', '0'),
(55, 125, 54, NULL, NULL, '1', '0'),
(56, 127, 55, NULL, NULL, '1', '0'),
(57, 129, 56, NULL, NULL, '1', '0'),
(58, 131, 57, NULL, NULL, '1', '0'),
(59, 133, 58, NULL, NULL, '1', '0'),
(60, 135, 59, NULL, NULL, '1', '0'),
(61, 137, 60, NULL, NULL, '1', '0'),
(62, 139, 61, NULL, NULL, '1', '0'),
(63, 141, 62, NULL, NULL, '1', '0'),
(64, 143, 63, NULL, NULL, '1', '0'),
(65, 145, 64, NULL, NULL, '1', '0'),
(66, 147, 65, NULL, NULL, '1', '0'),
(67, 149, 66, NULL, NULL, '1', '0'),
(68, 151, 67, NULL, NULL, '1', '0'),
(69, 153, 68, NULL, NULL, '1', '0'),
(70, 155, 69, NULL, NULL, '1', '0'),
(71, 157, 70, NULL, NULL, '1', '0'),
(72, 159, 71, NULL, NULL, '1', '0'),
(73, 161, 72, NULL, NULL, '1', '0'),
(74, 163, 73, NULL, NULL, '1', '0'),
(75, 165, 74, NULL, NULL, '1', '0'),
(76, 167, 75, NULL, NULL, '1', '0'),
(77, 169, 76, NULL, NULL, '1', '0'),
(78, 171, 77, NULL, NULL, '1', '0'),
(79, 173, 78, NULL, NULL, '1', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apoderado`
--

CREATE TABLE `apoderado` (
  `apo_id` int(11) NOT NULL,
  `per_id` int(11) DEFAULT NULL,
  `apo_parentesco` varchar(50) DEFAULT NULL,
  `apo_vive_con_estudiante` char(1) DEFAULT '1' COMMENT '1: SI; 2:No',
  `is_deleted` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `apoderado`
--

INSERT INTO `apoderado` (`apo_id`, `per_id`, `apo_parentesco`, `apo_vive_con_estudiante`, `is_deleted`) VALUES
(1, 3, 'Madre', '2', '0'),
(2, 5, 'TUTOR', '2', '0'),
(3, 17, 'MADRE', '1', '0'),
(4, 19, 'PADRE', '1', '0'),
(5, 21, 'MADRE', '1', '0'),
(6, 24, 'MADRE', '2', '0'),
(7, 26, 'PADRE', '2', '0'),
(8, 28, 'MADRE', '1', '0'),
(9, 30, 'MADRE', '1', '0'),
(10, 32, 'PADRE', '1', '0'),
(11, 34, 'Madre', '1', '0'),
(12, 42, 'Madre', '1', '0'),
(13, 44, 'Padre', '1', '0'),
(14, 46, 'PADRE', '1', '0'),
(15, 48, 'PADRE', '1', '0'),
(16, 50, 'PADRE', '1', '0'),
(17, 52, 'MADRE', '1', '0'),
(18, 54, 'MADRE', '1', '0'),
(19, 56, 'Padre', '2', '0'),
(20, 58, 'MADRE', '1', '0'),
(21, 60, 'MADRE', '1', '0'),
(22, 62, 'MADRE', '1', '0'),
(23, 64, 'MADRE', '1', '0'),
(24, 67, 'MADRE', '1', '0'),
(25, 68, 'Madre', '1', '0'),
(26, 70, 'PADRE', '1', '0'),
(27, 72, 'PADRE', '1', '0'),
(28, 74, 'MADRE', '1', '0'),
(29, 76, 'PADRE', '1', '0'),
(30, 78, 'MADRE', '1', '0'),
(31, 80, 'MADRE', '1', '0'),
(32, 82, 'PADRE', '1', '0'),
(33, 84, 'PADRE', '1', '0'),
(34, 86, 'MADRE', '1', '0'),
(35, 88, 'PADRE', '1', '0'),
(36, 90, 'PADRE', '1', '0'),
(37, 92, 'MADRE', '1', '0'),
(38, 94, 'Padre', '1', '0'),
(39, 96, 'TUTOR', '1', '0'),
(40, 98, 'PADRE', '1', '0'),
(41, 100, 'PADRE', '1', '0'),
(42, 102, 'MADRE', '1', '0'),
(43, 104, 'MADRE', '1', '0'),
(44, 106, 'PADRE', '1', '0'),
(45, 108, 'PADRE', '1', '0'),
(46, 110, 'MADRE', '1', '0'),
(47, 112, 'MADRE', '1', '0'),
(48, 114, 'MADRE', '1', '0'),
(49, 116, 'MADRE', '1', '0'),
(50, 118, 'MADRE', '1', '0'),
(51, 120, 'MADRE', '1', '0'),
(52, 122, 'PADRE', '1', '0'),
(53, 124, 'PADRE', '1', '0'),
(54, 126, 'MADRE', '1', '0'),
(55, 128, 'MADRE', '1', '0'),
(56, 130, 'MADRE', '1', '0'),
(57, 132, 'MADRE', '1', '0'),
(58, 134, 'MADRE', '1', '0'),
(59, 136, 'MADRE', '1', '0'),
(60, 138, 'MADRE', '1', '0'),
(61, 140, 'MADRE', '1', '0'),
(62, 142, 'PADRE', '1', '0'),
(63, 144, 'PADRE', '1', '0'),
(64, 146, 'MADRE', '1', '0'),
(65, 148, 'MADRE', '1', '0'),
(66, 150, 'MADRE', '1', '0'),
(67, 152, 'MADRE', '1', '0'),
(68, 154, 'PADRE', '1', '0'),
(69, 156, 'MADRE', '1', '0'),
(70, 158, 'PADRE', '1', '0'),
(71, 160, 'PADRE', '1', '0'),
(72, 162, 'PADRE', '1', '0'),
(73, 164, 'PADRE', '2', '0'),
(74, 166, 'PADRE', '1', '0'),
(75, 168, 'PADRE', '1', '0'),
(76, 170, 'PADRE', '1', '0'),
(77, 172, 'MADRE', '1', '0'),
(78, 174, 'MADRE', '1', '0'),
(79, 176, 'MADRE', '1', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_curso`
--

CREATE TABLE `asignacion_curso` (
  `asig_id` int(11) NOT NULL,
  `pa_id` int(11) DEFAULT NULL,
  `niv_id` int(11) DEFAULT NULL,
  `curso` varchar(255) DEFAULT NULL,
  `asig_is_deleted` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `asignacion_curso`
--

INSERT INTO `asignacion_curso` (`asig_id`, `pa_id`, `niv_id`, `curso`, `asig_is_deleted`) VALUES
(1, 58, 1, 'Arte y Cultura', '0'),
(2, 58, 1, 'Ciencias y Tecnología', '0'),
(3, 58, 1, 'Comunicación', '0'),
(4, 58, 1, 'Educación Física', '0'),
(5, 58, 1, 'Formación Religiosa', '0'),
(6, 58, 1, 'Matemáticas', '0'),
(7, 58, 1, 'Personal Ambiente', '0'),
(8, 52, 1, 'Arte y Cultura', '0'),
(9, 52, 1, 'Ciencias y Tecnología', '0'),
(10, 52, 1, 'Comunicación', '0'),
(11, 52, 1, 'Educación Física', '0'),
(12, 54, 1, 'Arte y Cultura', '0'),
(13, 54, 1, 'Ciencias y Tecnología', '0'),
(14, 53, 1, 'Arte y Cultura', '0'),
(15, 53, 1, 'Ciencias y Tecnología', '0'),
(16, 49, 1, 'Arte y Cultura', '0'),
(17, 55, 1, 'Arte y Cultura', '0'),
(18, 51, 1, 'Arte y Cultura', '0'),
(19, 50, 1, 'Arte y Cultura', '0'),
(20, 50, 1, 'Comunicación', '0'),
(21, 51, 1, 'Comunicación', '0'),
(22, 49, 1, 'Educación Física', '0'),
(23, 52, 1, 'Formación Religiosa', '0'),
(24, 52, 1, 'Matemáticas', '0'),
(25, 52, 1, 'Personal Ambiente', '0'),
(26, 54, 1, 'Comunicación', '0'),
(27, 54, 1, 'Educación Física', '0'),
(28, 54, 1, 'Formación Religiosa', '0'),
(29, 54, 1, 'Matemáticas', '0'),
(30, 54, 1, 'Personal Ambiente', '0'),
(31, 53, 1, 'Comunicación', '0'),
(32, 53, 1, 'Educación Física', '0'),
(33, 53, 1, 'Formación Religiosa', '0'),
(34, 53, 1, 'Matemáticas', '0'),
(35, 53, 1, 'Personal Ambiente', '0'),
(36, 49, 1, 'Ciencias y Tecnología', '0'),
(37, 49, 1, 'Comunicación', '0'),
(38, 49, 1, 'Formación Religiosa', '0'),
(39, 49, 1, 'Matemáticas', '0'),
(40, 49, 1, 'Personal Ambiente', '0'),
(41, 55, 1, 'Ciencias y Tecnología', '0'),
(42, 55, 1, 'Comunicación', '0'),
(43, 55, 1, 'Educación Física', '0'),
(44, 55, 1, 'Formación Religiosa', '0'),
(45, 55, 1, 'Matemáticas', '0'),
(46, 55, 1, 'Personal Ambiente', '0'),
(47, 51, 1, 'Ciencias y Tecnología', '0'),
(48, 51, 1, 'Educación Física', '0'),
(49, 51, 1, 'Formación Religiosa', '0'),
(50, 51, 1, 'Matemáticas', '0'),
(51, 51, 1, 'Personal Ambiente', '0'),
(52, 50, 1, 'Ciencias y Tecnología', '0'),
(53, 50, 1, 'Educación Física', '0'),
(54, 50, 1, 'Formación Religiosa', '0'),
(55, 50, 1, 'Matemáticas', '0'),
(56, 50, 1, 'Personal Ambiente', '0'),
(57, 52, 1, 'Educación Religiosa', '0'),
(58, 52, 1, 'Personal Social', '0'),
(59, 54, 1, 'Educación Religiosa', '0'),
(60, 54, 1, 'Personal Social', '0'),
(61, 53, 1, 'Educación Religiosa', '0'),
(62, 53, 1, 'Personal Social', '0'),
(63, 49, 1, 'Educación Religiosa', '0'),
(64, 49, 1, 'Personal Social', '0'),
(65, 55, 1, 'Educación Religiosa', '0'),
(66, 55, 1, 'Personal Social', '0'),
(67, 51, 1, 'Educación Religiosa', '0'),
(68, 51, 1, 'Personal Social', '0'),
(69, 50, 1, 'Educación Religiosa', '0'),
(70, 50, 1, 'Personal Social', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignacion_grado`
--

CREATE TABLE `asignacion_grado` (
  `asig_id` int(11) NOT NULL,
  `pa_id` int(11) DEFAULT NULL,
  `niv_id` int(11) DEFAULT NULL,
  `gra_id` int(11) DEFAULT NULL,
  `seccion` varchar(255) DEFAULT NULL,
  `asig_is_deleted` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `asignacion_grado`
--

INSERT INTO `asignacion_grado` (`asig_id`, `pa_id`, `niv_id`, `gra_id`, `seccion`, `asig_is_deleted`) VALUES
(295, 52, 1, 13, 'A', '1'),
(296, 52, 1, 18, 'A', '0'),
(297, 54, 1, 17, 'A', '0'),
(298, 53, 1, 15, 'A', '0'),
(299, 49, 1, 14, 'A', '0'),
(300, 55, 1, 17, 'B', '0'),
(301, 51, 1, 13, 'A', '0'),
(302, 50, 1, 16, 'A', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_alumno`
--

CREATE TABLE `asistencia_alumno` (
  `asis_id` int(11) NOT NULL,
  `asis_fecha` char(18) DEFAULT NULL,
  `asis_estado` char(18) DEFAULT NULL,
  `alu_id` int(11) DEFAULT NULL,
  `asis_justificado` char(18) DEFAULT NULL,
  `jus_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia_personal_academico`
--

CREATE TABLE `asistencia_personal_academico` (
  `asis_id` int(11) NOT NULL,
  `asis_fecha` char(18) DEFAULT NULL,
  `asis_estado` char(18) DEFAULT NULL,
  `pa_id` int(11) DEFAULT NULL,
  `asis_justificado` char(18) DEFAULT NULL,
  `jus_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aula`
--

CREATE TABLE `aula` (
  `ala_id` int(11) NOT NULL,
  `ala_descripcion` varchar(255) DEFAULT NULL,
  `ala_tipo` varchar(255) DEFAULT NULL,
  `ala_aforo` int(11) DEFAULT NULL,
  `ala_ubicacion` varchar(255) DEFAULT NULL,
  `ala_estado` char(1) DEFAULT '1' COMMENT '1: Bueno; 2: Regular; 3: Malo',
  `ala_is_delete` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado',
  `ala_en_uso` char(1) DEFAULT '2' COMMENT '1: Ocupada; 2: Vacia'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `aula`
--

INSERT INTO `aula` (`ala_id`, `ala_descripcion`, `ala_tipo`, `ala_aforo`, `ala_ubicacion`, `ala_estado`, `ala_is_delete`, `ala_en_uso`) VALUES
(3, 'Oficinas Adminitrativas', 'Oficina', 10, 'Pabellon 1 - Primer Piso', '1', '1', '2'),
(4, 'A-012222', 'Aula de Clases', 40, 'Pabellon 1 - Primer Piso', '1', '1', '1'),
(5, 'A-02', 'Aula de Clases', 40, 'Pabellon 1 - Primer Piso', '1', '1', '1'),
(6, 'A-03', 'Aula de Clases', 40, 'Pabellon 1 - Primer Piso', '1', '1', '1'),
(7, 'A-04', 'Aula de Clases', 40, 'Pabellon 1 - Segundo Piso', '1', '1', '1'),
(8, 'A-05', 'Aula de Clases', 40, 'Pabellon 1 - Segundo Piso', '1', '1', '1'),
(9, 'A-06', 'Aula de Clases', 40, 'Pabellon 1 - Segundo Piso', '1', '1', '1'),
(10, 'A-07', 'Aula de Clases', 40, 'Pabellon 1 - Segundo Piso', '1', '1', '1'),
(11, 'A-08', 'Aula de Clases', 40, 'Pabellon 1 - Segundo Piso', '1', '1', '1'),
(12, 'A-09', 'Aula de Clases', 40, 'Pabellon 1 - Tercer Piso', '1', '1', '1'),
(13, 'A-10', 'Aula de Clases', 40, 'Pabellon 1 - Tercer Piso', '1', '1', '1'),
(14, 'A-11', 'Aula de Clases', 40, 'Pabellon 1 - Tercer Piso', '1', '1', '1'),
(15, 'A-12', 'Aula de Clases', 40, 'Pabellon 1 - Tercer Piso', '1', '1', '1'),
(16, 'A-13', 'Aula de Clases', 40, 'Pabellon 1 - Tercer Piso', '1', '1', '1'),
(17, 'Cocina', 'Extra', 5, 'Pabellon 2 - Primer Piso', '1', '1', '2'),
(18, 'Salon Multi Usos', 'Extra', 15, 'Pabellon 2 - Primer Piso', '1', '1', '2'),
(19, 'A-14', 'Aula de Clases', 40, 'Pabellon 2 - Primer Piso', '1', '1', '1'),
(20, 'Deposito', 'Extra', 10, 'Pabellon 2 - Segundo Piso', '1', '1', '2'),
(21, 'Laboratorio', 'Aula de Clases', 40, 'Pabellon 2 - Segundo Piso', '1', '1', '1'),
(22, 'A-15', 'Aula de Clases', 40, 'Pabellon 2 - Segundo Piso', '1', '1', '1'),
(23, 'AIP - PRIMARIA', 'Aula de Clases', 40, 'Pabellon 2 - Tercer Piso', '1', '1', '2'),
(24, ' AIP - SECUNDARIA', 'Aula de Clases', 40, 'Pabellon 2 - Tercer Piso', '1', '1', '2'),
(25, 'Deposito', 'Extra', 10, 'Pabellon 2 - Tercer Piso', '1', '1', '2'),
(26, 'A-16', 'Aula de Clases', 40, 'Pabellon 3 - Primer Piso', '1', '1', '1'),
(27, 'A-17', 'Aula de Clases', 40, 'Pabellon 3 - Primer Piso', '1', '1', '1'),
(28, 'A-18', 'Aula de Clases', 40, 'Pabellon 3 - Primer Piso', '1', '1', '1'),
(29, 'A-19', 'Aula de Clases', 40, 'Pabellon 3 - Segundo Piso', '1', '1', '1'),
(30, 'A-20', 'Aula de Clases', 40, 'Pabellon 3 - Segundo Piso', '1', '1', '1'),
(31, 'A-21', 'Aula de Clases', 40, 'Pabellon 3 - Segundo Piso', '1', '1', '1'),
(32, 'A-22', 'Aula de Clases', 40, 'Pabellon 3 - Tercer Piso', '1', '1', '1'),
(33, 'A-23', 'Aula de Clases', 40, 'Pabellon 3 - Tercer Piso', '1', '1', '1'),
(34, 'A-24', 'Aula de Clases', 40, 'Pabellon 3 - Tercer Piso', '1', '1', '1'),
(35, 'Aula 1° Grado', 'Aula de Clases', 20, 'Pabellon 1', '1', '0', '1'),
(36, 'Aula 2° Grado', 'Aula de Clases', 20, 'Pabellon 1', '1', '0', '1'),
(37, 'Aula 3° Grado', 'Aula de Clases', 20, 'Pabellon 2', '1', '0', '1'),
(38, 'Aula 4° Grado', 'Aula de Clases', 20, 'Pabellon 2', '1', '0', '1'),
(39, 'Aula 5° Grado A', 'Aula de Clases', 20, 'Pabellon 2', '1', '0', '1'),
(40, 'Aula 5° Grado B', 'Aula de Clases', 20, 'Pabellon 2', '1', '0', '1'),
(41, 'Aula 6° Grado', 'Aula de Clases', 20, 'Pabellon 2', '1', '0', '1'),
(42, 'Deposito', 'Extra', 10, 'Pabellon 1', '1', '0', '2'),
(43, 'Cocina', 'Extra', 10, 'Pabellon 1', '1', '0', '2'),
(44, 'Salon Multi Usos', 'Extra', 100, 'Pabellon 2', '1', '0', '2'),
(45, 'Oficinas Administrativas', 'Oficina', 5, 'Pabellon 2', '1', '0', '2'),
(46, 'Centro de Computo', 'Aula de Clases', 20, 'Pabellon 2', '1', '0', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `año`
--

CREATE TABLE `año` (
  `año_id` int(11) NOT NULL,
  `año_descripcion` varchar(50) NOT NULL DEFAULT '0',
  `año_fechaInicio` date DEFAULT NULL,
  `año_fechaFin` date DEFAULT NULL,
  `año_duracionHoraAcademica` varchar(255) DEFAULT NULL,
  `año_duracionHoraLibre` varchar(255) DEFAULT NULL,
  `año_cantidadPersonal` int(11) DEFAULT NULL,
  `año_tallerSeleccionable` char(1) DEFAULT NULL COMMENT '1: SI; 2: NO',
  `año_estado` char(1) DEFAULT NULL COMMENT '1: Activo; 2: Inactivo',
  `is_deleted` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `año`
--

INSERT INTO `año` (`año_id`, `año_descripcion`, `año_fechaInicio`, `año_fechaFin`, `año_duracionHoraAcademica`, `año_duracionHoraLibre`, `año_cantidadPersonal`, `año_tallerSeleccionable`, `año_estado`, `is_deleted`) VALUES
(1, '2022', '2022-03-01', '2022-12-31', '45 min', '15 min', 50, '2', '0', '0'),
(2, '2023', '2023-03-01', '2023-12-31', '45 min', '15 min', 50, '2', '1', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capacidad`
--

CREATE TABLE `capacidad` (
  `cap_id` int(11) NOT NULL,
  `cap_descripcion` varchar(255) NOT NULL DEFAULT '',
  `cur_id` int(11) DEFAULT NULL,
  `cap_is_deleted` int(11) DEFAULT 0 COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `capacidad`
--

INSERT INTO `capacidad` (`cap_id`, `cap_descripcion`, `cur_id`, `cap_is_deleted`) VALUES
(155, 'Capacidad de comunicar ideas de manera efectiva, tanto de forma oral como escrita.', 1, 1),
(156, 'Capacidad de comunicar ideas de manera efectiva, tanto de forma oral como escrita.', 2, 1),
(157, 'Capacidad de comunicar ideas de manera efectiva, tanto de forma oral como escrita.', 3, 1),
(158, 'Capacidad de comunicar ideas de manera efectiva, tanto de forma oral como escrita.', 4, 1),
(159, 'Capacidad de comunicar ideas de manera efectiva, tanto de forma oral como escrita.', 5, 1),
(160, 'Capacidad de comunicar ideas de manera efectiva, tanto de forma oral como escrita.', 6, 1),
(161, 'Capacidad para resolver problemas complejos utilizando conceptos matemáticos y razonamiento lógico.', 7, 1),
(162, 'Capacidad para resolver problemas complejos utilizando conceptos matemáticos y razonamiento lógico.', 8, 1),
(163, 'Capacidad para resolver problemas complejos utilizando conceptos matemáticos y razonamiento lógico.', 9, 1),
(164, 'Capacidad para resolver problemas complejos utilizando conceptos matemáticos y razonamiento lógico.', 10, 1),
(165, 'Capacidad para resolver problemas complejos utilizando conceptos matemáticos y razonamiento lógico.', 11, 1),
(166, 'Capacidad para resolver problemas complejos utilizando conceptos matemáticos y razonamiento lógico.', 12, 1),
(167, 'Capacidad para comprender y aplicar conceptos científicos y tecnológicos en la resolución de problemas del mundo real.', 13, 1),
(168, 'Capacidad para comprender y aplicar conceptos científicos y tecnológicos en la resolución de problemas del mundo real.', 14, 1),
(169, 'Capacidad para comprender y aplicar conceptos científicos y tecnológicos en la resolución de problemas del mundo real.', 15, 1),
(170, 'Capacidad para comprender y aplicar conceptos científicos y tecnológicos en la resolución de problemas del mundo real.', 16, 1),
(171, 'Capacidad para comprender y aplicar conceptos científicos y tecnológicos en la resolución de problemas del mundo real.', 17, 1),
(172, 'Capacidad para comprender y aplicar conceptos científicos y tecnológicos en la resolución de problemas del mundo real.', 18, 1),
(173, 'Capacidad para desarrollar habilidades sociales y emocionales, incluida la empatía y la autorregulación emocional.', 19, 1),
(174, 'Capacidad para desarrollar habilidades sociales y emocionales, incluida la empatía y la autorregulación emocional.', 20, 1),
(175, 'Capacidad para desarrollar habilidades sociales y emocionales, incluida la empatía y la autorregulación emocional.', 21, 1),
(176, 'Capacidad para desarrollar habilidades sociales y emocionales, incluida la empatía y la autorregulación emocional.', 22, 1),
(177, 'Capacidad para desarrollar habilidades sociales y emocionales, incluida la empatía y la autorregulación emocional.', 23, 1),
(178, 'Capacidad para desarrollar habilidades sociales y emocionales, incluida la empatía y la autorregulación emocional.', 24, 1),
(179, 'Capacidad para comprender y respetar diferentes creencias religiosas y éticas, así como explorar preguntas espirituales y éticas personales.', 26, 1),
(180, 'Capacidad para comprender y respetar diferentes creencias religiosas y éticas, así como explorar preguntas espirituales y éticas personales.', 27, 1),
(181, 'Capacidad para comprender y respetar diferentes creencias religiosas y éticas, así como explorar preguntas espirituales y éticas personales.', 28, 1),
(182, 'Capacidad para comprender y respetar diferentes creencias religiosas y éticas, así como explorar preguntas espirituales y éticas personales.', 29, 1),
(183, 'Capacidad para comprender y respetar diferentes creencias religiosas y éticas, así como explorar preguntas espirituales y éticas personales.', 30, 1),
(184, 'Capacidad para comprender y respetar diferentes creencias religiosas y éticas, así como explorar preguntas espirituales y éticas personales.', 31, 1),
(185, 'Capacidad para apreciar y participar en actividades artísticas y culturales, así como expresar la creatividad de forma visual o escénica.', 32, 1),
(186, 'Capacidad para apreciar y participar en actividades artísticas y culturales, así como expresar la creatividad de forma visual o escénica.', 33, 1),
(187, 'Capacidad para apreciar y participar en actividades artísticas y culturales, así como expresar la creatividad de forma visual o escénica.', 34, 1),
(188, 'Capacidad para apreciar y participar en actividades artísticas y culturales, así como expresar la creatividad de forma visual o escénica.', 35, 1),
(189, 'Capacidad para apreciar y participar en actividades artísticas y culturales, así como expresar la creatividad de forma visual o escénica.', 36, 1),
(190, 'Capacidad para apreciar y participar en actividades artísticas y culturales, así como expresar la creatividad de forma visual o escénica.', 37, 1),
(191, 'Capacidad para mantener un estilo de vida activo y saludable, así como desarrollar habilidades físicas y coordinación motora.', 38, 1),
(192, 'Capacidad para mantener un estilo de vida activo y saludable, así como desarrollar habilidades físicas y coordinación motora.', 39, 1),
(193, 'Capacidad para mantener un estilo de vida activo y saludable, así como desarrollar habilidades físicas y coordinación motora.', 40, 1),
(194, 'Capacidad para mantener un estilo de vida activo y saludable, así como desarrollar habilidades físicas y coordinación motora.', 41, 1),
(195, 'Capacidad para mantener un estilo de vida activo y saludable, así como desarrollar habilidades físicas y coordinación motora.', 42, 1),
(196, 'Capacidad para mantener un estilo de vida activo y saludable, así como desarrollar habilidades físicas y coordinación motora.', 43, 1),
(197, 'Se desenvuelve de manera autónoma a través de su motricidad.', 43, 0),
(198, 'Asume una vida saludable.', 43, 0),
(199, 'Interactúa a través de sus habilidades socio motrices.', 43, 0),
(200, 'Se desenvuelve de manera autónoma a través de su motricidad.', 42, 0),
(201, 'Asume una vida saludable.', 42, 0),
(202, 'Interactúa a través de sus habilidades socio motrices.', 42, 0),
(203, 'Se desenvuelve de manera autónoma a través de su motricidad.', 41, 0),
(204, 'Asume una vida saludable.', 41, 0),
(205, 'Interactúa a través de sus habilidades socio motrices.', 41, 0),
(206, 'Se desenvuelve de manera autónoma a través de su motricidad.', 40, 0),
(207, 'Asume una vida saludable.', 40, 0),
(208, 'Interactúa a través de sus habilidades socio motrices.', 40, 0),
(209, 'Se desenvuelve de manera autónoma a través de su motricidad.', 39, 0),
(210, 'Asume una vida saludable.', 39, 0),
(211, 'Interactúa a través de sus habilidades socio motrices.', 39, 0),
(212, 'Se desenvuelve de manera autónoma a través de su motricidad.', 38, 0),
(213, 'Asume una vida saludable.', 38, 0),
(214, 'Interactúa a través de sus habilidades socio motrices.', 38, 0),
(215, 'Aprecia de manera critica manifestaciones artístico-cultural.', 37, 0),
(216, 'Crea proyectos desde los lenguajes artísticos.', 37, 0),
(217, 'Aprecia de manera critica manifestaciones artístico-cultural.', 36, 0),
(218, 'Crea proyectos desde los lenguajes artísticos.', 36, 0),
(219, 'Aprecia de manera critica manifestaciones artístico-cultural.', 35, 0),
(220, 'Crea proyectos desde los lenguajes artísticos.', 35, 0),
(221, 'Aprecia de manera critica manifestaciones artístico-cultural.', 34, 0),
(222, 'Crea proyectos desde los lenguajes artísticos.', 34, 0),
(223, 'Aprecia de manera critica manifestaciones artístico-cultural.', 33, 0),
(224, 'Crea proyectos desde los lenguajes artísticos.', 33, 0),
(225, 'Aprecia de manera critica manifestaciones artístico-cultural.', 32, 0),
(226, 'Crea proyectos desde los lenguajes artísticos.', 32, 0),
(227, 'Construye su identidad como persona humana, amada por Dios, digna, libre y trascendente, comprendiendo la doctrina de su propia religión, abierto al diálogo con las que le son cercanas.', 31, 0),
(228, 'Asume la experiencia del encuentro personal y comunitario con Dios en su proyecto de vida en coherencia con su creencia religiosa.', 31, 0),
(229, 'Construye su identidad como persona humana, amada por Dios, digna, libre y trascendente, comprendiendo la doctrina de su propia religión, abierto al diálogo con las que le son cercanas.', 30, 0),
(230, 'Asume la experiencia del encuentro personal y comunitario con Dios en su proyecto de vida en coherencia con su creencia religiosa.', 30, 0),
(231, 'Construye su identidad como persona humana, amada por Dios, digna, libre y trascendente, comprendiendo la doctrina de su propia religión, abierto al diálogo con las que le son cercanas.', 29, 0),
(232, 'Asume la experiencia del encuentro personal y comunitario con Dios en su proyecto de vida en coherencia con su creencia religiosa.', 29, 0),
(233, 'Construye su identidad como persona humana, amada por Dios, digna, libre y trascendente, comprendiendo la doctrina de su propia religión, abierto al diálogo con las que le son cercanas.', 28, 0),
(234, 'Asume la experiencia del encuentro personal y comunitario con Dios en su proyecto de vida en coherencia con su creencia religiosa.', 28, 0),
(235, 'Construye su identidad como persona humana, amada por Dios, digna, libre y trascendente, comprendiendo la doctrina de su propia religión, abierto al diálogo con las que le son cercanas.', 27, 0),
(236, 'Asume la experiencia del encuentro personal y comunitario con Dios en su proyecto de vida en coherencia con su creencia religiosa.', 27, 0),
(237, 'Construye su identidad como persona humana, amada por Dios, digna, libre y trascendente, comprendiendo la doctrina de su propia religión, abierto al diálogo con las que le son cercanas.', 26, 0),
(238, 'Asume la experiencia del encuentro personal y comunitario con Dios en su proyecto de vida en coherencia con su creencia religiosa.', 26, 0),
(239, 'Construye su identidad.', 24, 0),
(240, 'Convive y participa democráticamente en la búsqueda del bien común.', 24, 0),
(241, 'Construye interpretaciones históricas.', 24, 0),
(242, 'Gestiona responsablemente el espacio y el ambiente.', 24, 0),
(243, 'Gestiona responsablemente los recursos económicos.', 24, 0),
(244, 'Construye su identidad.', 23, 0),
(245, 'Convive y participa democráticamente en la búsqueda del bien común.', 23, 0),
(246, 'Construye interpretaciones históricas.', 23, 0),
(247, 'Gestiona responsablemente el espacio y el ambiente.', 23, 0),
(248, 'Gestiona responsablemente los recursos económicos.', 23, 0),
(249, 'Construye su identidad.', 22, 0),
(250, 'Convive y participa democráticamente en la búsqueda del bien común.', 22, 0),
(251, 'Construye interpretaciones históricas.', 22, 0),
(252, 'Gestiona responsablemente el espacio y el ambiente.', 22, 0),
(253, 'Gestiona responsablemente los recursos económicos.', 22, 0),
(254, 'Construye su identidad.', 21, 0),
(255, 'Convive y participa democráticamente en la búsqueda del bien común.', 21, 0),
(256, 'Construye interpretaciones históricas.', 21, 0),
(257, 'Gestiona responsablemente el espacio y el ambiente.', 21, 0),
(258, 'Gestiona responsablemente los recursos económicos.', 21, 0),
(259, 'Construye su identidad.', 20, 0),
(260, 'Convive y participa democráticamente en la búsqueda del bien común.', 20, 0),
(261, 'Construye interpretaciones históricas.', 20, 0),
(262, 'Gestiona responsablemente el espacio y el ambiente.', 20, 0),
(263, 'Gestiona responsablemente los recursos económicos.', 20, 0),
(264, 'Construye su identidad.', 19, 0),
(265, 'Convive y participa democráticamente en la búsqueda del bien común.', 19, 0),
(266, 'Construye interpretaciones históricas.', 19, 0),
(267, 'Gestiona responsablemente el espacio y el ambiente.', 19, 0),
(268, 'Gestiona responsablemente los recursos económicos.', 19, 0),
(269, 'Indaga mediante métodos científicos para construir sus conocimientos.', 18, 0),
(270, 'Explica el mundo físico basándose en conocimientos sobre los seres vivos, materia, energía, biodiversidad, tierra y universo.', 18, 0),
(271, 'Diseña y construye soluciones tecnológicas para resolver problemas de su entorno.', 18, 0),
(272, 'Indaga mediante métodos científicos para construir sus conocimientos.', 17, 0),
(273, 'Explica el mundo físico basándose en conocimientos sobre los seres vivos, materia, energía, biodiversidad, tierra y universo.', 17, 0),
(274, 'Diseña y construye soluciones tecnológicas para resolver problemas de su entorno.', 17, 0),
(275, 'Indaga mediante métodos científicos para construir sus conocimientos.', 16, 0),
(276, 'Explica el mundo físico basándose en conocimientos sobre los seres vivos, materia, energía, biodiversidad, tierra y universo.', 16, 0),
(277, 'Diseña y construye soluciones tecnológicas para resolver problemas de su entorno.', 16, 0),
(278, 'Indaga mediante métodos científicos para construir sus conocimientos.', 15, 0),
(279, 'Explica el mundo físico basándose en conocimientos sobre los seres vivos, materia, energía, biodiversidad, tierra y universo.', 15, 0),
(280, 'Diseña y construye soluciones tecnológicas para resolver problemas de su entorno.', 15, 0),
(281, 'Indaga mediante métodos científicos para construir sus conocimientos.', 14, 0),
(282, 'Explica el mundo físico basándose en conocimientos sobre los seres vivos, materia, energía, biodiversidad, tierra y universo.', 14, 0),
(283, 'Diseña y construye soluciones tecnológicas para resolver problemas de su entorno.', 14, 0),
(284, 'Indaga mediante métodos científicos para construir sus conocimientos.', 13, 0),
(285, 'Explica el mundo físico basándose en conocimientos sobre los seres vivos, materia, energía, biodiversidad, tierra y universo.', 13, 0),
(286, 'Diseña y construye soluciones tecnológicas para resolver problemas de su entorno.', 13, 0),
(287, 'Resuelve problemas de cantidad.', 12, 0),
(288, 'Resuelve problemas de regularidad, equivalencia y cambio.', 12, 0),
(289, 'Resuelve problemas de forma, movimiento y localización.', 12, 0),
(290, 'Resuelve problemas de gestión de datos e incertidumbre.', 12, 0),
(291, 'Resuelve problemas de cantidad.', 11, 0),
(292, 'Resuelve problemas de regularidad, equivalencia y cambio.', 11, 0),
(293, 'Resuelve problemas de forma, movimiento y localización.', 11, 0),
(294, 'Resuelve problemas de gestión de datos e incertidumbre.', 11, 0),
(295, 'Resuelve problemas de cantidad.', 10, 0),
(296, 'Resuelve problemas de regularidad, equivalencia y cambio.', 10, 0),
(297, 'Resuelve problemas de forma, movimiento y localización.', 10, 0),
(298, 'Resuelve problemas de gestión de datos e incertidumbre.', 10, 0),
(299, 'Resuelve problemas de cantidad.', 9, 0),
(300, 'Resuelve problemas de regularidad, equivalencia y cambio.', 9, 0),
(301, 'Resuelve problemas de forma, movimiento y localización.', 9, 0),
(302, 'Resuelve problemas de gestión de datos e incertidumbre.', 9, 0),
(303, 'Resuelve problemas de cantidad.', 8, 0),
(304, 'Resuelve problemas de regularidad, equivalencia y cambio.', 8, 0),
(305, 'Resuelve problemas de forma, movimiento y localización.', 8, 0),
(306, 'Resuelve problemas de gestión de datos e incertidumbre.', 8, 0),
(307, 'Resuelve problemas de cantidad.', 7, 0),
(308, 'Resuelve problemas de regularidad, equivalencia y cambio.', 7, 0),
(309, 'Resuelve problemas de forma, movimiento y localización.', 7, 0),
(310, 'Resuelve problemas de gestión de datos e incertidumbre.', 7, 0),
(311, 'Se comunica oralmente en su lengua materna.', 6, 0),
(312, 'Lee diversos tipos de textos en su lengua materna.', 6, 0),
(313, 'Escribe diversos tipos de textos en su lengua materna.', 6, 0),
(314, 'Se comunica oralmente en su lengua materna.', 5, 0),
(315, 'Lee diversos tipos de textos en su lengua materna.', 5, 0),
(316, 'Escribe diversos tipos de textos en su lengua materna.', 5, 0),
(317, 'Se comunica oralmente en su lengua materna.', 4, 0),
(318, 'Lee diversos tipos de textos en su lengua materna.', 4, 0),
(319, 'Escribe diversos tipos de textos en su lengua materna.', 4, 0),
(320, 'Se comunica oralmente en su lengua materna.', 3, 0),
(321, 'Lee diversos tipos de textos en su lengua materna.', 3, 0),
(322, 'Escribe diversos tipos de textos en su lengua materna.', 3, 0),
(323, 'Se comunica oralmente en su lengua materna.', 2, 0),
(324, 'Lee diversos tipos de textos en su lengua materna.', 2, 0),
(325, 'Escribe diversos tipos de textos en su lengua materna.', 2, 0),
(326, 'Se comunica oralmente en su lengua materna.', 1, 0),
(327, 'Lee diversos tipos de textos en su lengua materna.', 1, 0),
(328, 'Escribe diversos tipos de textos en su lengua materna.', 1, 0),
(329, 'Rendimiento académico', 44, 0),
(330, 'Habilidades de estudio', 44, 0),
(331, 'Motivación y actitud hacia el aprendizaje', 44, 0),
(332, 'Rendimiento académico', 45, 0),
(333, 'Habilidades de estudio', 45, 0),
(334, 'Motivación y actitud hacia el aprendizaje', 45, 0),
(335, 'Rendimiento académico', 46, 0),
(336, 'Habilidades de estudio', 46, 0),
(337, 'Motivación y actitud hacia el aprendizaje', 46, 0),
(338, 'Rendimiento académico', 47, 0),
(339, 'Habilidades de estudio', 47, 0),
(340, 'Motivación y actitud hacia el aprendizaje', 47, 0),
(341, 'Rendimiento académico', 48, 0),
(342, 'Habilidades de estudio', 48, 0),
(343, 'Motivación y actitud hacia el aprendizaje', 48, 0),
(344, 'Rendimiento académico', 49, 0),
(345, 'Habilidades de estudio', 49, 0),
(346, 'Motivación y actitud hacia el aprendizaje', 49, 0),
(347, 'Habilidades Básicas en Informática', 50, 0),
(348, 'Resolución de Problemas', 50, 0),
(349, 'Creatividad y Proyectos Personales', 50, 0),
(350, 'Habilidades Básicas en Informática', 51, 0),
(351, 'Resolución de Problemas', 51, 0),
(352, 'Creatividad y Proyectos Personales', 51, 0),
(353, 'Habilidades Básicas en Informática', 52, 0),
(354, 'Resolución de Problemas', 52, 0),
(355, 'Creatividad y Proyectos Personales', 52, 0),
(356, 'Habilidades Básicas en Informática', 53, 0),
(357, 'Resolución de Problemas', 53, 0),
(358, 'Creatividad y Proyectos Personales', 53, 0),
(359, 'Habilidades Básicas en Informática', 54, 0),
(360, 'Resolución de Problemas', 54, 0),
(361, 'Creatividad y Proyectos Personales', 54, 0),
(362, 'Habilidades Básicas en Informática', 55, 0),
(363, 'Resolución de Problemas', 55, 0),
(364, 'Creatividad y Proyectos Personales', 55, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `cur_id` int(11) NOT NULL,
  `cur_nombre` varchar(50) DEFAULT NULL,
  `cur_abreviatura` varchar(50) DEFAULT NULL,
  `cur_horas` int(11) DEFAULT NULL,
  `gra_id` int(11) DEFAULT NULL,
  `niv_id` int(11) DEFAULT NULL,
  `per_id` int(11) DEFAULT NULL,
  `cur_estado` varchar(50) DEFAULT '1' COMMENT '1: Activo; 2: Inactivo',
  `is_deleted` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`cur_id`, `cur_nombre`, `cur_abreviatura`, `cur_horas`, `gra_id`, `niv_id`, `per_id`, `cur_estado`, `is_deleted`) VALUES
(1, 'Comunicación', 'COM', 5, 13, 1, NULL, '1', '0'),
(2, 'Comunicación', 'COM', 5, 14, 1, NULL, '1', '0'),
(3, 'Comunicación', 'COM', 5, 15, 1, NULL, '1', '0'),
(4, 'Comunicación', 'COM', 5, 16, 1, NULL, '1', '0'),
(5, 'Comunicación', 'COM', 5, 17, 1, NULL, '1', '0'),
(6, 'Comunicación', 'COM', 5, 18, 1, NULL, '1', '0'),
(7, 'Matemáticas', 'MAT', 5, 13, 1, NULL, '1', '0'),
(8, 'Matemáticas', 'MAT', 5, 14, 1, NULL, '1', '0'),
(9, 'Matemáticas', 'MAT', 5, 15, 1, NULL, '1', '0'),
(10, 'Matemáticas', 'MAT', 5, 16, 1, NULL, '1', '0'),
(11, 'Matemáticas', 'MAT', 5, 17, 1, NULL, '1', '0'),
(12, 'Matemáticas', 'MAT', 5, 18, 1, NULL, '1', '0'),
(13, 'Ciencias y Tecnología', 'CYT', 4, 13, 1, NULL, '1', '0'),
(14, 'Ciencias y Tecnología', 'CYT', 4, 14, 1, NULL, '1', '0'),
(15, 'Ciencias y Tecnología', 'CYT', 4, 15, 1, NULL, '1', '0'),
(16, 'Ciencias y Tecnología', 'CYT', 4, 16, 1, NULL, '1', '0'),
(17, 'Ciencias y Tecnología', 'CYT', 4, 17, 1, NULL, '1', '0'),
(18, 'Ciencias y Tecnología', 'CYT', 4, 18, 1, NULL, '1', '0'),
(19, 'Personal Social', 'PS', 4, 13, 1, NULL, '1', '0'),
(20, 'Personal Social', 'PS', 4, 14, 1, NULL, '1', '0'),
(21, 'Personal Social', 'PS', 4, 15, 1, NULL, '1', '0'),
(22, 'Personal Social', 'PS', 4, 16, 1, NULL, '1', '0'),
(23, 'Personal Social', 'PS', 4, 17, 1, NULL, '1', '0'),
(24, 'Personal Social', 'PS', 4, 18, 1, NULL, '1', '0'),
(26, 'Educación Religiosa', 'ER', 1, 13, 1, NULL, '1', '0'),
(27, 'Educación Religiosa', 'ER', 1, 14, 1, NULL, '1', '0'),
(28, 'Educación Religiosa', 'ER', 1, 15, 1, NULL, '1', '0'),
(29, 'Educación Religiosa', 'ER', 1, 16, 1, NULL, '1', '0'),
(30, 'Educación Religiosa', 'ER', 1, 17, 1, NULL, '1', '0'),
(31, 'Educación Religiosa', 'ER', 1, 18, 1, NULL, '1', '0'),
(32, 'Arte y Cultura', 'AC', 3, 13, 1, NULL, '1', '0'),
(33, 'Arte y Cultura', 'AC', 3, 14, 1, NULL, '1', '0'),
(34, 'Arte y Cultura', 'AC', 3, 15, 1, NULL, '1', '0'),
(35, 'Arte y Cultura', 'AC', 3, 16, 1, NULL, '1', '0'),
(36, 'Arte y Cultura', 'AC', 3, 17, 1, NULL, '1', '0'),
(37, 'Arte y Cultura', 'AC', 3, 18, 1, NULL, '1', '0'),
(38, 'Educación Física', 'EF', 3, 13, 1, NULL, '1', '0'),
(39, 'Educación Física', 'EF', 3, 14, 1, NULL, '1', '0'),
(40, 'Educación Física', 'EF', 3, 15, 1, NULL, '1', '0'),
(41, 'Educación Física', 'EF', 3, 16, 1, NULL, '1', '0'),
(42, 'Educación Física', 'EF', 3, 17, 1, NULL, '1', '0'),
(43, 'Educación Física', 'EF', 3, 18, 1, NULL, '1', '0'),
(44, 'Tutoria', 'Tut', 2, 13, 1, NULL, '1', '0'),
(45, 'Tutoria', 'Tut', 2, 14, 1, NULL, '1', '0'),
(46, 'Tutoria', 'Tut', 2, 15, 1, NULL, '1', '0'),
(47, 'Tutoria', 'Tut', 2, 16, 1, NULL, '1', '0'),
(48, 'Tutoria', 'Tut', 2, 17, 1, NULL, '1', '0'),
(49, 'Tutoria', 'Tut', 2, 18, 1, NULL, '1', '0'),
(50, 'COMPUTACIÓN', 'COMP', 2, 13, 1, NULL, '1', '0'),
(51, 'COMPUTACIÓN', 'COMP', 2, 14, 1, NULL, '1', '0'),
(52, 'COMPUTACIÓN', 'COMP', 2, 15, 1, NULL, '1', '0'),
(53, 'COMPUTACIÓN', 'COMP', 2, 16, 1, NULL, '1', '0'),
(54, 'COMPUTACIÓN', 'COMP', 2, 17, 1, NULL, '1', '0'),
(55, 'COMPUTACIÓN', 'COMP', 2, 18, 1, NULL, '1', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `gra_id` int(11) NOT NULL,
  `gra_descripcion` varchar(255) DEFAULT NULL,
  `niv_id` int(11) DEFAULT NULL,
  `gra_estado` char(1) DEFAULT '1' COMMENT '1: Activo; 2: Inactivo',
  `gra_is_delete` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`gra_id`, `gra_descripcion`, `niv_id`, `gra_estado`, `gra_is_delete`) VALUES
(13, 'Primero', 1, '1', '0'),
(14, 'Segundo', 1, '1', '0'),
(15, 'Tercero', 1, '1', '0'),
(16, 'Cuarto', 1, '1', '0'),
(17, 'Quinto', 1, '1', '0'),
(18, 'Sexto', 1, '1', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gsa`
--

CREATE TABLE `gsa` (
  `ags_id` int(11) NOT NULL,
  `ala_id` int(11) DEFAULT NULL,
  `niv_id` int(11) DEFAULT NULL,
  `gra_id` int(11) DEFAULT NULL,
  `sec_id` int(11) DEFAULT NULL,
  `is_deleted` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `gsa`
--

INSERT INTO `gsa` (`ags_id`, `ala_id`, `niv_id`, `gra_id`, `sec_id`, `is_deleted`) VALUES
(714, 36, 1, 14, 51, '0'),
(715, 36, 1, 14, 51, '0'),
(716, 35, 1, 13, 50, '0'),
(717, 35, 1, 13, 50, '0'),
(718, 35, 1, 13, 50, '0'),
(719, 35, 1, 13, 50, '0'),
(720, 35, 1, 13, 50, '0'),
(721, 35, 1, 13, 50, '0'),
(722, 35, 1, 13, 50, '0'),
(723, 35, 1, 13, 50, '0'),
(724, 35, 1, 13, 50, '0'),
(725, 35, 1, 13, 50, '0'),
(726, 35, 1, 13, 50, '0'),
(727, 36, 1, 14, 51, '0'),
(728, 36, 1, 14, 51, '0'),
(729, 36, 1, 14, 51, '0'),
(730, 36, 1, 14, 51, '0'),
(731, 36, 1, 14, 51, '0'),
(732, 36, 1, 14, 51, '0'),
(733, 36, 1, 14, 51, '0'),
(734, 36, 1, 14, 51, '0'),
(735, 36, 1, 14, 51, '0'),
(736, 36, 1, 14, 51, '0'),
(737, 36, 1, 14, 51, '0'),
(738, 36, 1, 14, 51, '0'),
(739, 36, 1, 14, 51, '0'),
(740, 36, 1, 14, 51, '0'),
(741, 37, 1, 15, 52, '0'),
(742, 37, 1, 15, 52, '0'),
(743, 37, 1, 15, 52, '0'),
(744, 37, 1, 15, 52, '0'),
(745, 37, 1, 15, 52, '0'),
(746, 37, 1, 15, 52, '0'),
(747, 37, 1, 15, 52, '0'),
(748, 37, 1, 15, 52, '0'),
(749, 37, 1, 15, 52, '0'),
(750, 38, 1, 16, 53, '0'),
(751, 38, 1, 16, 53, '0'),
(752, 38, 1, 16, 53, '0'),
(753, 38, 1, 16, 53, '0'),
(754, 38, 1, 16, 53, '0'),
(755, 38, 1, 16, 53, '0'),
(756, 38, 1, 16, 53, '0'),
(757, 38, 1, 16, 53, '0'),
(758, 38, 1, 16, 53, '0'),
(759, 38, 1, 16, 53, '0'),
(760, 39, 1, 17, 54, '0'),
(761, 39, 1, 17, 54, '0'),
(762, 39, 1, 17, 54, '0'),
(763, 39, 1, 17, 54, '0'),
(764, 39, 1, 17, 54, '0'),
(765, 39, 1, 17, 54, '0'),
(766, 39, 1, 17, 54, '0'),
(767, 39, 1, 17, 54, '0'),
(768, 39, 1, 17, 54, '0'),
(769, 39, 1, 17, 54, '0'),
(770, 39, 1, 17, 54, '0'),
(771, 39, 1, 17, 54, '0'),
(772, 40, 1, 17, 55, '0'),
(773, 40, 1, 17, 55, '0'),
(774, 40, 1, 17, 55, '0'),
(775, 40, 1, 17, 55, '0'),
(776, 40, 1, 17, 55, '0'),
(777, 40, 1, 17, 55, '0'),
(778, 40, 1, 17, 55, '0'),
(779, 40, 1, 17, 55, '0'),
(780, 40, 1, 17, 55, '0'),
(781, 40, 1, 17, 55, '0'),
(782, 40, 1, 17, 55, '0'),
(783, 40, 1, 17, 55, '0'),
(784, 41, 1, 18, 56, '0'),
(785, 41, 1, 18, 56, '0'),
(786, 41, 1, 18, 56, '0'),
(787, 41, 1, 18, 56, '0'),
(788, 41, 1, 18, 56, '0'),
(789, 41, 1, 18, 56, '0'),
(790, 41, 1, 18, 56, '0'),
(791, 41, 1, 18, 56, '0'),
(792, 41, 1, 18, 56, '0'),
(793, 41, 1, 18, 56, '0'),
(794, 41, 1, 18, 56, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `hor_id` int(11) NOT NULL,
  `per_id` int(11) DEFAULT NULL,
  `ags_id` int(11) DEFAULT NULL,
  `cur_id` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `editable` varchar(50) DEFAULT NULL,
  `is_deleted` int(11) DEFAULT 0 COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`hor_id`, `per_id`, `ags_id`, `cur_id`, `fecha`, `hora_inicio`, `hora_fin`, `color`, `editable`, `is_deleted`) VALUES
(11, 1, 784, 6, '2023-10-16', '08:00:00', '08:45:00', 'green', NULL, 0),
(12, 1, 784, 24, '2023-10-16', '08:45:00', '10:15:00', 'blue', NULL, 0),
(13, 1, 784, 24, '2023-10-16', '10:45:00', '11:30:00', 'blue', NULL, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucion_educativa`
--

CREATE TABLE `institucion_educativa` (
  `ie_id` int(11) NOT NULL,
  `ie_codigo_modular` varchar(255) DEFAULT NULL,
  `ie_anexo` varchar(255) DEFAULT NULL,
  `ie_nivel` varchar(255) DEFAULT NULL,
  `ie_nombre` varchar(255) DEFAULT NULL,
  `ie_gestion` varchar(255) DEFAULT NULL,
  `ie_departamento` varchar(255) DEFAULT NULL,
  `ie_provincia` varchar(255) DEFAULT NULL,
  `ie_distrito` varchar(255) DEFAULT NULL,
  `ie_direccion` varchar(255) DEFAULT NULL,
  `ie_dre` varchar(255) DEFAULT NULL,
  `ie_ugel` varchar(255) DEFAULT NULL,
  `ie_genero` varchar(255) DEFAULT NULL,
  `ie_turno` varchar(255) DEFAULT NULL,
  `ie_dias_laborales` varchar(255) DEFAULT NULL,
  `ie_director` varchar(255) DEFAULT NULL,
  `ie_telefono` varchar(255) DEFAULT NULL,
  `ie_email` varchar(255) DEFAULT NULL,
  `ie_web` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `institucion_educativa`
--

INSERT INTO `institucion_educativa` (`ie_id`, `ie_codigo_modular`, `ie_anexo`, `ie_nivel`, `ie_nombre`, `ie_gestion`, `ie_departamento`, `ie_provincia`, `ie_distrito`, `ie_direccion`, `ie_dre`, `ie_ugel`, `ie_genero`, `ie_turno`, `ie_dias_laborales`, `ie_director`, `ie_telefono`, `ie_email`, `ie_web`) VALUES
(1, '0444240-0', '0', 'PRIMARIA', '82857 Lives', 'PÚBLICA', '6', '194', '1844', 'AV. SAN MIGUEL S/N', 'DRE SAN MIGUEL', 'UGEL SAN MIGUEL', 'MIXTO', 'MAÑANA - TARDE', 'LUNES - VIERNES', 'PAUCAR IGNACIO, YMELDA AFRODICIA', '456789', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `justificacion`
--

CREATE TABLE `justificacion` (
  `jus_id` int(11) NOT NULL,
  `jus_motivo` char(18) DEFAULT NULL,
  `jus_tipo` char(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `mat_id` int(11) NOT NULL,
  `per_id` int(11) DEFAULT NULL,
  `alu_id` int(11) DEFAULT NULL,
  `ags_id` int(11) DEFAULT NULL,
  `mat_fecha` date DEFAULT NULL,
  `mat_situacion` varchar(255) DEFAULT NULL,
  `mat_tipo_procedencia` varchar(255) DEFAULT NULL,
  `mat_colegio_procedencia` varchar(255) DEFAULT NULL,
  `mat_observacion` varchar(255) DEFAULT NULL,
  `mat_estado` char(1) DEFAULT '1' COMMENT '1: Activa; 2: Inactiva',
  `is_deleted` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`mat_id`, `per_id`, `alu_id`, `ags_id`, `mat_fecha`, `mat_situacion`, `mat_tipo_procedencia`, `mat_colegio_procedencia`, `mat_observacion`, `mat_estado`, `is_deleted`) VALUES
(3, 1, 3, 716, '2023-10-11', 'Ingresante', 'Misma IE', NULL, NULL, '1', '0'),
(4, 1, 4, 717, '2023-10-11', 'Ingresante', 'Otra IE', NULL, NULL, '1', '0'),
(5, 1, 5, 718, '2023-10-11', 'Ingresante', 'Otra IE', NULL, NULL, '1', '0'),
(6, 1, 6, 719, '2023-10-11', 'Ingresante', 'Otra IE', NULL, NULL, '1', '0'),
(7, 1, 1, 720, '2023-10-11', 'Ingresante', 'Otra IE', NULL, NULL, '1', '0'),
(8, 1, 7, 721, '2023-10-11', 'Ingresante', 'Otra IE', NULL, NULL, '1', '0'),
(9, 1, 8, 722, '2023-10-11', 'Ingresante', 'Otra IE', NULL, NULL, '1', '0'),
(10, 1, 9, 723, '2023-10-11', 'Ingresante', 'Otra IE', NULL, NULL, '1', '0'),
(11, 1, 10, 724, '2023-10-11', 'Ingresante', 'Otra IE', NULL, NULL, '1', '0'),
(12, 1, 11, 725, '2023-10-11', 'Ingresante', 'Otra IE', NULL, NULL, '1', '0'),
(13, 1, 2, 726, '2023-10-11', 'Ingresante', 'Otra IE', NULL, NULL, '1', '0'),
(14, 1, 13, 727, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(15, 1, 14, 728, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(16, 1, 15, 729, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(17, 1, 16, 730, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(18, 1, 17, 731, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(19, 1, 18, 732, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(20, 1, 19, 733, '2023-10-11', 'Ingresante', 'Misma IE', NULL, NULL, '1', '0'),
(21, 1, 20, 734, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(22, 1, 21, 735, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(23, 1, 22, 736, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(24, 1, 23, 737, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(25, 1, 24, 738, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(26, 1, 25, 739, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(27, 1, 26, 740, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(28, 1, 27, 741, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(29, 1, 28, 742, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(30, 1, 29, 743, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(31, 1, 30, 744, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(32, 1, 31, 745, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(33, 1, 32, 746, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(34, 1, 33, 747, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(35, 1, 34, 748, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(36, 1, 35, 749, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(37, 1, 36, 750, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(38, 1, 37, 751, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(39, 1, 38, 752, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(40, 1, 39, 753, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(41, 1, 40, 754, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(42, 1, 41, 755, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(43, 1, 42, 756, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(44, 1, 43, 757, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(45, 1, 44, 758, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(46, 1, 45, 759, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(47, 1, 46, 760, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(48, 1, 47, 761, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(49, 1, 48, 762, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(50, 1, 49, 763, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(51, 1, 50, 764, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(52, 1, 51, 765, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(53, 1, 52, 766, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(54, 1, 53, 767, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(55, 1, 54, 768, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(56, 1, 55, 769, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(57, 1, 56, 770, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(58, 1, 57, 771, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(59, 1, 58, 772, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(60, 1, 59, 773, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(61, 1, 60, 774, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(62, 1, 61, 775, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(63, 1, 62, 776, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(64, 1, 63, 777, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(65, 1, 64, 778, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(66, 1, 65, 779, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(67, 1, 66, 780, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(68, 1, 67, 781, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(69, 1, 68, 782, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(70, 1, 69, 783, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(71, 1, 70, 784, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(72, 1, 71, 785, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(73, 1, 72, 786, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(74, 1, 73, 787, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(75, 1, 74, 788, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(76, 1, 75, 789, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(77, 1, 76, 790, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(78, 1, 77, 791, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(79, 1, 78, 792, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0'),
(80, 1, 79, 793, '2023-10-11', 'Promovido', 'Misma IE', NULL, NULL, '1', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nd_operacion`
--

CREATE TABLE `nd_operacion` (
  `us_id` bigint(20) NOT NULL,
  `nd_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `niv_id` int(11) NOT NULL,
  `niv_descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`niv_id`, `niv_descripcion`) VALUES
(1, 'Primaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota`
--

CREATE TABLE `nota` (
  `nt_id` int(11) NOT NULL,
  `per_id` int(11) DEFAULT NULL,
  `alu_id` int(11) DEFAULT NULL,
  `pa_id` int(11) DEFAULT NULL,
  `ags_id` int(11) DEFAULT NULL,
  `nt_bimestre` int(11) DEFAULT NULL,
  `nt_nota` char(18) DEFAULT NULL,
  `nt_is_deleted` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_capacidad`
--

CREATE TABLE `nota_capacidad` (
  `nc_id` int(11) NOT NULL,
  `nc_descripcion` char(18) DEFAULT NULL,
  `nc_nota` int(11) DEFAULT NULL,
  `nt_id` int(11) DEFAULT NULL,
  `nc_is_deleted` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodo`
--

CREATE TABLE `periodo` (
  `per_id` int(11) NOT NULL,
  `año_id` int(11) DEFAULT NULL,
  `per_inicio_matriculas` date DEFAULT NULL,
  `per_final_matricula` date DEFAULT NULL,
  `per_limite_cierre` date DEFAULT NULL,
  `per_tp_notas` int(11) DEFAULT NULL,
  `per_estado` char(1) DEFAULT '0' COMMENT '1: Aperturado; 2:Finalizado',
  `is_deleted` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `periodo`
--

INSERT INTO `periodo` (`per_id`, `año_id`, `per_inicio_matriculas`, `per_final_matricula`, `per_limite_cierre`, `per_tp_notas`, `per_estado`, `is_deleted`) VALUES
(1, 2, '2023-01-01', '2023-12-31', '2023-12-31', 3, '1', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `per_id` int(11) NOT NULL,
  `per_dni` char(8) DEFAULT NULL,
  `per_nombres` varchar(255) DEFAULT NULL,
  `per_apellidos` varchar(255) DEFAULT NULL,
  `per_nombre_completo` varchar(255) DEFAULT NULL,
  `per_email` varchar(255) DEFAULT NULL,
  `per_sexo` varchar(50) DEFAULT NULL COMMENT 'M: Masculino; F:Femenino',
  `per_fecha_nacimiento` date DEFAULT NULL,
  `per_estado_civil` varchar(50) DEFAULT '0' COMMENT 'S: Soltero; C: Casado; D: Divorciado; V: Viudo',
  `per_celular` varchar(50) DEFAULT NULL,
  `per_pais` varchar(50) DEFAULT NULL,
  `per_departamento` int(11) DEFAULT NULL,
  `per_provincia` int(11) DEFAULT NULL,
  `per_distrito` int(11) DEFAULT NULL,
  `per_direccion` varchar(255) DEFAULT NULL,
  `is_deleted` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`per_id`, `per_dni`, `per_nombres`, `per_apellidos`, `per_nombre_completo`, `per_email`, `per_sexo`, `per_fecha_nacimiento`, `per_estado_civil`, `per_celular`, `per_pais`, `per_departamento`, `per_provincia`, `per_distrito`, `per_direccion`, `is_deleted`) VALUES
(1, '76341435', 'WILLIAM SAMUEL', 'MIRANDA HUAMAN', NULL, 'willmirandahuaman20@gmail.com', 'M', '2000-08-31', 'S', '981422271', 'PERÚ', 13, 115, 1154, 'Urb. La ALameda lt 26', '0'),
(2, '81753752', 'YEYLY MILAGROS', 'DE LA CRUZ ZELADA', NULL, NULL, 'F', '2016-10-18', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(3, '27811245', 'ANA STHEPHANIE', 'ZELADA LOZANO', NULL, NULL, 'F', '1995-03-22', 'S', '-', 'PERU', 13, 115, 1154, '-', '0'),
(4, '80790250', 'KESLIN MELANIA', 'ZELADA LOZANO', NULL, NULL, 'F', '2016-10-03', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(5, '76341436', 'MAICOL ANTONY', 'HERNANDEZ HUAMAN', NULL, 'MAYCOL@GMAIL.COM', 'M', '2000-02-15', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(6, '43276824', 'LUIS ENRIQUE', 'NAMOC CHAVEZ', NULL, NULL, 'M', '1980-10-10', 'C', NULL, 'PERÚ', 13, 112, 1129, NULL, '0'),
(7, '44874568', 'TATIANA ROSALYN', 'DÍAZ CRUZ', NULL, NULL, 'F', '1985-12-10', 'C', NULL, 'PERÚ', 13, 112, 1132, NULL, '0'),
(8, '27169762', 'ROSA ELVIRA', 'JARA VENTURA', NULL, NULL, 'F', '1990-01-15', 'S', NULL, 'PERÚ', 6, 54, 550, NULL, '0'),
(9, '19258170', 'AMARO NOE', 'ROMERO LOZANO', NULL, NULL, 'M', '1975-10-10', 'S', NULL, 'PERÚ', 13, 112, 1129, NULL, '0'),
(10, '27980510', 'GLADIS OLINDA', 'CASTRO QUISPE', NULL, NULL, 'F', '1982-10-05', 'C', NULL, 'PERÚ', 7, 66, 672, NULL, '0'),
(11, '27983060', 'DAISIE MAGALY', 'LOZANO MENDOZA', NULL, NULL, 'F', '1986-02-20', 'S', NULL, 'PERÚ', 13, 112, 1130, NULL, '0'),
(12, '27809002', 'MARIA SOLEDAD', 'DAVALOS BURGOS', NULL, NULL, 'F', '1980-12-10', 'C', NULL, 'PERÚ', 6, 55, 563, NULL, '0'),
(13, '70859060', 'YMELDA AFRODICIA', 'PAUCAR IGNACIO', NULL, NULL, 'F', '1975-10-10', 'C', NULL, 'PERÚ', 6, 54, 550, NULL, '0'),
(14, '27985068', 'LUZ DEL CARMEN', 'SERRANO RODAS DE ESPINOZA', NULL, NULL, 'F', '1990-02-10', 'C', NULL, 'PERÚ', 6, 194, 1832, NULL, '0'),
(15, '27985040', 'EDELMITA', 'VASQUEZ VASQUEZ DE SERRANO', NULL, NULL, 'F', '1988-10-01', 'C', NULL, 'PERÚ', 6, 194, 1838, NULL, '0'),
(16, '81753753', 'YARIXA MAHELY', 'ESPINOZA QUIROZ', NULL, NULL, 'F', '2017-03-30', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(17, '27012030', 'ESTEFANIA', 'QUIROZ PASADAS', NULL, NULL, 'F', '1964-03-20', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(18, '79702909', 'DIEGO YANPIER', 'MENDOZA HERNANDEZ', NULL, NULL, 'M', '2016-06-06', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(19, '24875263', 'CARLOS ELIAS', 'MENDOZA COTRINA', NULL, NULL, 'F', '1970-01-01', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(20, '79733369', 'EMIR ALEXANDER', 'MENDOZA SARABIA', NULL, NULL, 'M', '2016-06-25', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(21, '22478512', 'MARIANA', 'SARABIA JIMENEZ', NULL, NULL, 'F', '1980-05-13', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(23, '79782335', 'Ida Rosalia', 'RODAS CUBAS', NULL, NULL, 'F', '2016-07-18', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(24, '24513585', 'MARIANA', 'CUBAS CHAFLOQUE', NULL, NULL, 'F', '1998-02-14', 'S', NULL, 'PERÚ', 6, 55, 563, NULL, '0'),
(25, '79872117', 'Ivanna Alexandra', 'SOLANO QUIROZ', NULL, NULL, 'F', '2016-09-23', 'S', NULL, 'PERÚ', 6, 194, 1843, NULL, '0'),
(26, '25479163', 'ALEXANDER', 'SOLANO LOZANO', NULL, NULL, 'M', '1999-02-01', 'S', NULL, 'PERÚ', 6, 54, 560, NULL, '0'),
(27, '79740504', 'JASIEL DAVID', 'SOLIS BAZAN', NULL, NULL, 'M', '2016-06-25', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(28, '34521424', 'KIARA', 'BAZAN CORTEZ', NULL, NULL, 'F', '1990-04-22', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(29, '79600859', 'KEILA', 'TUCTO CORREA', NULL, NULL, 'F', '2016-04-03', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(30, '28965413', 'SOFIA', 'CORREA CORREA', NULL, NULL, 'F', '1994-02-02', 'C', NULL, 'PERÚ', 6, 54, 550, NULL, '0'),
(31, '79924972', 'ALEXANDER JAIR', 'VASQUEZ SANCHEZ', NULL, NULL, 'M', '2016-10-28', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(32, '32154263', 'MARTIN', 'VASQUEZ VERA', NULL, NULL, 'M', '1995-09-11', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(33, '79845748', 'DIEGO YAEL SAID', 'VERA DAVALOS', NULL, NULL, 'M', '2016-08-11', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(34, '29857462', 'ERIKA', 'DAVALOS MERINO', NULL, NULL, 'F', '1998-04-02', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(38, '70425014', 'KEILA', 'MARTOS', NULL, NULL, '0', NULL, '0', NULL, 'PERÚ', 0, 0, 0, NULL, '0'),
(41, '80790240', 'GRISELY VICTORIA', 'ALCANTARA ESPINOZA', NULL, NULL, 'F', '2016-06-16', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(42, '45123670', 'VICTORIA', 'ESPINOZA VALE', NULL, NULL, 'F', '1978-05-04', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(43, '79527013', 'THIAGO DOMINICIANO', 'ALCANTARA MALCA', NULL, NULL, 'M', '2016-01-30', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(44, '52142365', 'JAVIER', 'ALCANTARA VERA', NULL, NULL, 'M', '1998-06-14', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(45, '80790239', 'LIA CAROLINA', 'BAZAN ESPINOZA', NULL, NULL, 'F', '2018-05-29', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(46, '36584127', 'ELMER', 'BAZAN PAREDES', NULL, NULL, 'M', '1987-02-13', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(47, '79179340', 'GIA AISHA', 'BERMEJO CAYETANO', NULL, NULL, 'F', '2015-06-24', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(48, '54123687', 'CARLOS', 'BERMEJO FLORENTINO', NULL, NULL, 'M', '1994-07-14', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(49, '79134417', 'DHARWIN ISAAC', 'CARLOS BAZAN', NULL, NULL, 'M', '2015-05-29', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(50, '45712589', 'SAMUEL', 'CARLOS', NULL, NULL, 'F', '1988-10-10', 'S', NULL, 'PERÚ', 6, 64, 663, NULL, '0'),
(51, '80790242', 'BRIANA OLGUITA', 'DIAZ BAZAN', NULL, NULL, 'F', '2015-08-23', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(52, '32145687', 'CLARA', 'BAZAN VELA', NULL, NULL, 'F', '1984-07-22', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(53, '80790247', 'SIOMARA MARITHZA', 'HERNANDEZ CHUQUIJAJAS', NULL, NULL, 'F', '2016-02-04', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(54, '35879641', 'MARIA', 'CHUQUIJAJAS MONTE', NULL, NULL, 'F', '1993-02-01', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(55, '81700018', 'DARWIN KEVIN', 'HUANGAL HUAMAN', NULL, NULL, 'M', '2015-08-14', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(56, '14257896', 'LEANDRO', 'HUANGAL PEREZ', NULL, NULL, 'M', '1990-02-02', 'C', NULL, 'PERÚ', 19, 149, 1503, NULL, '0'),
(57, '81516082', 'JOSE GADIEL', 'HUANGAL INUMA', NULL, NULL, 'M', '0015-11-21', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(58, '35216498', 'MARTINA', 'INUMA CHAVEZ', NULL, NULL, 'F', '1995-05-05', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(59, '80790238', 'LUANA ELIZABETH', 'LOZANO MENDOZA', NULL, NULL, 'F', '2015-04-21', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(60, '25143620', 'MANUEL', 'LOZANO MERINO', NULL, NULL, 'M', '1996-02-20', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(61, '81357255', 'NANCY FIORELA', 'MENDOZA SOLIS', NULL, NULL, 'F', '2015-11-02', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(62, '25631087', 'FLOR', 'MENDOZA DIAZ', NULL, NULL, 'F', '1970-08-04', 'D', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(63, '79438662', 'DEYSI JACKELINE', 'MOLINA ALVA', NULL, NULL, 'F', '2015-12-16', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(64, '56123402', 'KEYCO', 'MOLINA MORALES', NULL, NULL, 'F', '1996-12-20', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(65, '80790243', 'GREYS YHAJAIRA', 'MONDRAGON MENDOZA', NULL, NULL, 'F', '2015-12-14', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(66, '80790248', 'KHALEEXI CRISTEL', 'SALAZAR LOZANO', NULL, NULL, 'F', '2016-02-21', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(67, '41875290', 'ESTEFANI', 'LOZANO ALBARRAN', NULL, NULL, 'F', '1996-04-22', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(68, '41276580', 'MANUEL', 'MONDRAGON PEREZ', NULL, NULL, 'M', '1990-01-01', 'S', '-', 'PERU', 6, 194, 1844, '-', '0'),
(69, '81263673', 'CARMEN ROSA', 'AGIP CHUQUICAJAS', NULL, NULL, 'F', '2014-06-01', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(70, '28549102', 'LUIS', 'AGIP MENDO', NULL, NULL, 'M', '1970-03-13', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(71, '80790241', 'JHAN MESSY', 'CUBAS CHUQUILIN', NULL, NULL, 'M', '2015-02-15', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(72, '21498201', 'JUNIOR', 'CUBAS ALVA', NULL, NULL, 'M', '1996-05-14', 'S', NULL, 'PERÚ', 0, 0, 0, NULL, '0'),
(73, '78810707', 'SUGEILY YULISSA', 'GOMEZ ALCANTARA', NULL, NULL, 'F', '2014-01-10', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(74, '14253325', 'MIRIAM', 'ALCANTARA TAUCETT', NULL, NULL, 'F', '1977-02-11', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(75, '80790227', 'EDUAR OTONIEL', 'HERNANDEZ CHUQUIJAJAS,', NULL, NULL, 'M', '2014-06-30', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(76, '25468744', 'FERNANDO', 'HERNANDEZ PAREDES', NULL, NULL, 'M', '1982-04-15', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(77, '80790234', 'NICOLE VALENTINA', 'HUANGAL PAUCAR,', NULL, NULL, 'F', '2015-02-14', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(78, '35102460', 'DINA', 'PAUCAR PAUCAR', NULL, NULL, 'F', '1975-11-11', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(79, '80790229', 'LIAN JOSUE', 'LOZANO MIRANDA', NULL, NULL, 'M', '2014-10-31', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(80, '26541301', 'MIRIAM', 'MIRANDA CHAVEZ', NULL, NULL, 'F', '1996-02-14', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(81, '80790230', 'MELISA LIZETH', 'MESTANZA ALCANTARA', NULL, NULL, 'F', '2014-12-05', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(82, '30145266', 'SAUL', 'MESTANZA QUIROZ', NULL, NULL, 'M', '1990-10-10', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(83, '80790232', 'HAROLD FABIAN', 'SARABIA PEREZ', NULL, NULL, 'M', '1994-09-09', 'S', NULL, 'PERÚ', 0, 0, 0, NULL, '0'),
(84, '36221455', 'FRANCHESKO', 'SARABIA VIN', NULL, NULL, 'M', '1994-06-09', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(85, '80790231', 'ELDER AVIEL', 'VENTURA RAMIREZ', NULL, NULL, 'M', '2015-01-14', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(86, '32541065', 'JUANA', 'RAMIREZ ZENIZ', NULL, NULL, 'F', '1996-05-14', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(87, '81263653', 'DAMARIS GABRIELA', 'BARDALES CUBAS', NULL, NULL, 'F', '2013-12-31', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(88, '21342256', 'DAVID', 'BARDALES CUEVA', NULL, NULL, 'M', '1990-12-12', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(89, '80790220', 'ESTEBAN ORLANDO', 'CHUQUIMANGO LOZANO', NULL, NULL, 'M', '2014-01-19', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(90, '12554463', 'JAVIER', 'CHUQUIMANGO SOLIER', NULL, NULL, 'M', '1990-12-12', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(91, '80790218', 'MILEYDI', 'ESPINOZA ROJAS', NULL, NULL, 'F', '2013-11-18', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(92, '22154360', 'KAHTY', 'ESPINOZA MENDEZ', NULL, NULL, 'F', '1996-03-04', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(93, '78496751', 'DORILA VALESKA', 'HUANGAL INUMA', NULL, NULL, 'F', '2014-03-12', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(94, '26504478', 'SEVERO', 'HUANGAL IGLESIA', NULL, NULL, 'M', '1984-12-08', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(95, '80790219', 'KELITA NOEMI', 'LOBATO HERNANDEZ', NULL, NULL, 'F', '2013-12-31', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(96, '28305060', 'MARDONIO', 'TUEROS SAUÑE', NULL, NULL, 'M', '1990-04-16', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(97, '80790223', 'WILLAN ABRAHAM', 'MOLINA CASTAÑEDA', NULL, NULL, 'M', '2014-01-13', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(98, '50602123', 'MATÍAS MAURICIO', 'MOLINA BARRERA', NULL, NULL, 'M', '1984-05-14', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(99, '78354112', 'THIAGO YAHIR', 'MONDRAGON CUBAS', NULL, NULL, 'M', '2013-12-06', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(100, '50213044', 'VICTORIANO', 'MONDRAGON CABANILLAS', NULL, NULL, 'M', '1981-03-06', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(101, '80790214', 'WINNER ELISEO', 'MUJICA CHUQUIJAJAS', NULL, NULL, 'M', '2013-04-17', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(102, '60253089', 'ANGELINA', 'DE MUJICA', NULL, NULL, 'F', '1980-04-18', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(103, '80790221', 'KELY MARDELY', 'PADILLA MONDRAGON', NULL, NULL, 'F', '2013-10-22', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(104, '27890560', 'JACINTA', 'MONDRAGON GARCÉS', NULL, NULL, 'F', '1981-03-13', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(105, '80790212', 'ANSHI MARICIELO', 'SANCHEZ CHUQUIJAJAS', NULL, NULL, 'F', '2013-05-09', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(106, '27928014', 'FELIPE', 'SANCHEZ SILVA', NULL, NULL, 'M', '1980-04-28', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(107, '63422912', 'JUAN DAVID', 'AGIP CHUQUICAJAS', NULL, NULL, 'M', '2011-11-29', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(108, '27504421', 'PATRICIO', 'AGIP POMARES', NULL, NULL, 'M', '1987-07-01', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(109, '81074870', 'HAYDEE KATHERINE', 'CARLOS BAZAN', NULL, NULL, 'F', '2012-09-12', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(110, '27012326', 'NURIA DANIELA', 'BAZAN TEJERO', NULL, NULL, 'F', '1987-07-02', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(111, '63731080', 'LITZY ABIGAIL', 'CARRERA RIVERA', NULL, NULL, 'F', '2012-10-12', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(112, '27012589', 'OTILIA', 'RIVERA JIMENEZ', NULL, NULL, 'F', '1986-03-26', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(113, '80806962', 'DARWIN DANIEL', 'CHUQUIJAJAS ESPINOZA', NULL, NULL, 'M', '2012-11-10', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(114, '27892053', 'MELISA', 'ESPINOZA ROSADO', NULL, NULL, 'F', '1990-09-28', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(115, '80806961', 'YEIMER DANIEL', 'CHUQUIJAJAS ESPINOZA', NULL, NULL, 'M', '2012-11-10', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(116, '27234320', 'ANASTASIA', 'ESPINOZA PEDRERO', NULL, NULL, 'F', '1982-06-15', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(117, '63422936', 'NELSON NEYMAR', 'CUBAS MOLINA', NULL, NULL, 'M', '2012-06-07', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(118, '27896301', 'ROSARIO', 'MOLINA FALCÓN', NULL, NULL, 'F', '1984-06-24', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(119, '63422927', 'SAYURI NICOLL', 'ESPINOZA QUIROZ', NULL, NULL, 'F', '2012-04-14', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(120, '27856418', 'MAGDALENA', 'QUIROZ VILAPLENA', NULL, NULL, 'F', '1985-03-25', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(121, '63422929', 'MAYRA ELIZABETH', 'HUAMAN MENDOZA', NULL, NULL, 'F', '2012-05-05', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(122, '27506012', 'ADELARDO', 'HUAMAN NOVOA', NULL, NULL, 'M', '1985-06-12', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(123, '63422901', 'ESNEIDER', 'HUANGAL QUIROZ', NULL, NULL, 'M', '2011-09-27', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(124, '28905263', 'ABEL ALEX', 'HUANGAL LOPEZ', NULL, NULL, 'M', '1984-04-07', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(125, '80806974', 'CARLOS ALBERTO', 'LOZANO CUBAS', NULL, NULL, 'M', '2013-02-18', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(126, '27136080', 'NARCISA', 'CUBAS MONTES', NULL, NULL, 'F', '1989-11-17', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(127, '80790206', 'RAQUEL LIZET', 'LOZANO MENDOZA', NULL, NULL, 'F', '2013-01-09', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(128, '28101470', 'MARÍA CARMEN', 'MENDOZA CUBAS', NULL, NULL, 'F', '1982-09-28', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(129, '63422944', 'KENIA LUANA', 'LOZANO VARGAS', NULL, NULL, 'F', '2012-05-09', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(130, '28401753', 'ROSALINDA', 'VARGAS ROMERO', NULL, NULL, 'F', '1980-08-28', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(131, '78029548', 'HANZ JOSEPH', 'LAZARTE MORALES', NULL, NULL, 'M', '2013-03-09', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(132, '28530759', 'MARISELA', 'MORALES ROMERO', NULL, NULL, 'F', '1977-05-11', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(133, '63422909', 'ANGHELA SELENE', 'LLEPEN CHUQUILIN', NULL, NULL, 'F', '2011-06-09', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(134, '27891234', 'EMPERATRIZ SABINA', 'CHUQUILIN', NULL, NULL, 'F', '1976-09-18', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(135, '80806965', 'ESNAYDER DAVID', 'MENDOZA MONDRAGON', NULL, NULL, 'M', '2012-11-26', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(136, '29605243', 'NORMA SUSANA', 'MONDRAGON BUTRON', NULL, NULL, 'F', '1982-08-07', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(137, '77734242', 'EMERSON DAMIAN', 'MENDOZA SARABIA', NULL, NULL, 'M', '2012-06-07', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(138, '27142536', 'XIMENA', 'SARABIA MATA', NULL, NULL, 'F', '1985-07-05', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(139, '80806963', 'YASELI YOSELIN', 'QUIROZ CHUQUIJAJAS', NULL, NULL, 'F', '2012-06-04', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(140, '27855255', 'FELICIA', 'CHUQUIJAJAS PALOMINO', NULL, NULL, 'F', '1978-02-15', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(141, '80806951', 'KEYNER JOSE', 'QUIROZ HERRERA', NULL, NULL, 'M', '2012-10-04', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(142, '27885566', 'ABEL', 'QUIROZ URIBE', NULL, NULL, 'M', '1990-05-18', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(143, '80790201', 'ARNOL FABIAN', 'SALAZAR ESPINOZA', NULL, NULL, 'M', '2012-12-27', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(144, '27456123', 'JESUS', 'SALAZAR SANCHEZ', NULL, NULL, 'M', '1986-12-16', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(145, '63422926', 'JOSUE OTONIEL', 'SANCHEZ LOZANO', NULL, NULL, 'M', '2012-03-23', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(146, '27852963', 'LILIA', 'LOZANO SARABIA', NULL, NULL, 'F', '1982-02-05', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(147, '80790203', 'ANDERSON AIMAR', 'SARABIA HERNANDEZ', NULL, NULL, 'M', '2012-12-28', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(148, '28457219', 'EMILIANA MARIA', 'HERNANDEZ PEÑA', NULL, NULL, '0', '1983-02-15', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(149, '77827415', 'MARILYN YOVANI', 'SARABIA MONDRAGON', NULL, NULL, 'F', '2012-09-09', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(150, '25973481', 'TRINIDAD AURELIA', 'MONDRAGON TORRES', NULL, NULL, 'F', '1981-09-22', 'D', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(151, '63771548', 'WARNER XOEL', 'VASQUEZ CHUQUIJAJAS', NULL, NULL, 'M', '2012-09-12', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(152, '27142435', 'SUSANITA', 'CHUQUIJAJAS ZARAGOZA', NULL, NULL, 'F', '1988-02-15', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(153, '77770640', 'BRAYAN SMITH', 'VASQUEZ SANCHEZ', NULL, NULL, 'M', '2012-08-08', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(154, '27159872', 'RAFA', 'VASQUEZ ALVAREZ', NULL, NULL, 'M', '1980-05-17', 'V', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(155, '63364295', 'CHRISTIAN HERNAN', 'ESPINOZA ALCANTARA', NULL, NULL, 'M', '2011-09-11', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(156, '27885521', 'LUZ ABILA', 'ALCANTARA TAPIA', NULL, NULL, 'F', '1980-02-18', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(157, '63364269', 'NICOLAS JHANPIER', 'ESPINOZA CASTAÑEDA', NULL, NULL, 'M', '2011-04-15', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(158, '27414758', 'ELPIDIO LUIS', 'ESPINOZA CASTRO', NULL, NULL, 'M', '1981-05-17', 'C', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(159, '63422900', 'DILMER EHUNER', 'GALVEZ CUBAS', NULL, NULL, 'M', '2011-09-30', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(160, '27845196', 'ELIAS', 'GALVEZ TEJERO', NULL, NULL, 'M', '1980-05-17', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(161, '63422913', 'DEISY SOFIA', 'HERNANDEZ CHUQUIJAJAS', NULL, NULL, 'F', '2012-01-05', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(162, '27231562', 'JAVIER LUIS', 'HERNANDEZ CHAVEZ', NULL, NULL, 'M', '1979-05-18', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(163, '80806960', 'SARITA YUBITH', 'LEYVA BAZAN', NULL, NULL, 'F', '2012-01-13', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(164, '27849562', 'ROBERTO', 'LEYVA RIOS', NULL, NULL, 'M', '1975-02-17', 'D', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(165, '63364297', 'YAMER DAVID', 'MENDOZA PEREZ', NULL, NULL, 'M', '2011-09-01', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(166, '27891245', 'JOSE JUAN', 'MENDOZA ANAYA', NULL, NULL, 'M', '1978-05-28', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(167, '63334326', 'WILDER JOSUE', 'ROJAS HERNANDEZ', NULL, NULL, 'M', '2011-07-26', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(168, '27741736', 'HELBER', 'ROJAS PEREZ', NULL, NULL, 'M', '1980-07-18', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(169, '63364272', 'JHENIFER ESPERANZA', 'SOLANO QUIROZ', NULL, NULL, 'F', '2011-05-10', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(170, '27456137', 'JUANCARLOS', 'SOLANO GUERRERO', NULL, NULL, 'M', '1976-12-04', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(171, '63422910', 'SHEYDER FERNANDO', 'VENTURA CUBAS', NULL, NULL, 'M', '2011-12-20', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(172, '27458939', 'BEATRIS', 'CUBAS TORRES', NULL, NULL, 'F', '1970-06-17', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(173, '77316109', 'EVER EFRAIN', 'ZELADA VENTURA', NULL, NULL, 'M', '2011-09-24', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0'),
(174, '27567119', 'ISABELA', 'VENTURA GALAN', NULL, NULL, 'F', '1984-06-12', 'S', NULL, 'PERÚ', 6, 194, 1844, NULL, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_academico`
--

CREATE TABLE `personal_academico` (
  `pa_id` int(11) NOT NULL,
  `per_id` int(11) DEFAULT NULL,
  `pa_turno` varchar(255) DEFAULT NULL,
  `pa_condicion_laboral` varchar(255) DEFAULT NULL,
  `niv_id` int(11) DEFAULT NULL,
  `pa_especialidad` varchar(255) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `pa_is_tutor` char(1) DEFAULT '0' COMMENT '1: Si es tutor; 2: No es tutor',
  `is_deleted` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `personal_academico`
--

INSERT INTO `personal_academico` (`pa_id`, `per_id`, `pa_turno`, `pa_condicion_laboral`, `niv_id`, `pa_especialidad`, `rol_id`, `pa_is_tutor`, `is_deleted`) VALUES
(49, 6, 'MAÑANA-TARDE', 'CONTRATADO', 1, 'EDUCACION FISICA', 4, '1', '0'),
(50, 7, 'MAÑANA-TARDE', 'CONTRATADO', 1, 'COMUNICACIÓN', 4, '1', '0'),
(51, 8, 'MAÑANA-TARDE', 'CONTRATADO', 1, 'CIENCIAS Y TECNOLOGIA', 4, '1', '0'),
(52, 9, 'MAÑANA-TARDE', 'CONTRATADO', 1, 'PERSONAL AMBIENTE', 4, '1', '0'),
(53, 10, 'MAÑANA-TARDE', 'CONTRATADO', 1, 'ARTE Y CULTURA', 4, '1', '0'),
(54, 11, 'MAÑANA-TARDE', 'CONTRATADO', 1, 'FORMACION RELIGIOSA', 4, '1', '0'),
(55, 12, 'MAÑANA-TARDE', 'CONTRATADO', 1, 'MATEMATICA', 4, '1', '0'),
(56, 13, 'MAÑANA-TARDE', 'CONTRATADO', 1, 'MATEMATICA', 2, '1', '0'),
(57, 14, 'MAÑANA-TARDE', 'CONTRATADO', 1, 'CONTABILIDAD', 6, '2', '0'),
(58, 15, 'MAÑANA-TARDE', 'CONTRATADO', 1, 'AUXILIAR', 5, '2', '0'),
(59, 1, 'MAÑANA-TARDE', 'CONTRATADO', 1, 'Programacion', 5, '2', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` int(11) NOT NULL,
  `rol_descripcion` varchar(255) NOT NULL,
  `rol_estado` char(1) DEFAULT '0' COMMENT '1: Habilitado; 0:Deshabilitado',
  `is_deleted` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `rol_descripcion`, `rol_estado`, `is_deleted`) VALUES
(1, 'Administrador', '1', '0'),
(2, 'Director', '1', '0'),
(3, 'Alumno', '1', '0'),
(4, 'Docente', '1', '0'),
(5, 'Auxiliar', '1', '0'),
(6, 'Secretaria', '1', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `sec_id` int(11) NOT NULL,
  `sec_descripcion` char(18) DEFAULT NULL,
  `sec_tutor` int(11) DEFAULT NULL,
  `sec_aula` int(11) DEFAULT NULL,
  `gra_id` int(11) DEFAULT NULL,
  `sec_periodo` int(11) DEFAULT NULL,
  `sec_vacantes` int(11) DEFAULT NULL,
  `sec_is_delete` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`sec_id`, `sec_descripcion`, `sec_tutor`, `sec_aula`, `gra_id`, `sec_periodo`, `sec_vacantes`, `sec_is_delete`) VALUES
(50, 'A', 51, 35, 13, 1, 9, '0'),
(51, 'A', 49, 36, 14, 1, 4, '0'),
(52, 'A', 53, 37, 15, 1, 11, '0'),
(53, 'A', 50, 38, 16, 1, 10, '0'),
(54, 'A', 54, 39, 17, 1, 8, '0'),
(55, 'B', 55, 40, 17, 1, 8, '0'),
(56, 'A', 52, 41, 18, 1, 9, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_periodo`
--

CREATE TABLE `tipo_periodo` (
  `tp_id` int(11) NOT NULL,
  `tp_tipo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tipo_periodo`
--

INSERT INTO `tipo_periodo` (`tp_id`, `tp_tipo`) VALUES
(1, 'Registro de Notas Anuales'),
(2, 'Registro de Notas Bimestrales'),
(3, 'Registro de Notas Trimestrales'),
(4, 'Registro de Notas Semestrales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubdepartamento`
--

CREATE TABLE `ubdepartamento` (
  `idDepa` int(5) NOT NULL DEFAULT 0,
  `departamento` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ubdepartamento`
--

INSERT INTO `ubdepartamento` (`idDepa`, `departamento`) VALUES
(1, 'AMAZONAS'),
(2, 'ANCASH'),
(3, 'APURIMAC'),
(4, 'AREQUIPA'),
(5, 'AYACUCHO'),
(6, 'CAJAMARCA'),
(7, 'CALLAO'),
(8, 'CUSCO'),
(9, 'HUANCAVELICA'),
(10, 'HUANUCO'),
(11, 'ICA'),
(12, 'JUNIN'),
(13, 'LA LIBERTAD'),
(14, 'LAMBAYEQUE'),
(15, 'LIMA'),
(16, 'LORETO'),
(17, 'MADRE DE DIOS'),
(18, 'MOQUEGUA'),
(19, 'PASCO'),
(20, 'PIURA'),
(21, 'PUNO'),
(22, 'SAN MARTIN'),
(23, 'TACNA'),
(24, 'TUMBES'),
(25, 'UCAYALI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubdistrito`
--

CREATE TABLE `ubdistrito` (
  `idDist` int(5) NOT NULL DEFAULT 0,
  `distrito` varchar(50) DEFAULT NULL,
  `idProv` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ubdistrito`
--

INSERT INTO `ubdistrito` (`idDist`, `distrito`, `idProv`) VALUES
(1, 'CHACHAPOYAS', 1),
(2, 'ASUNCION', 1),
(3, 'BALSAS', 1),
(4, 'CHETO', 1),
(5, 'CHILIQUIN', 1),
(6, 'CHUQUIBAMBA', 1),
(7, 'GRANADA', 1),
(8, 'HUANCAS', 1),
(9, 'LA JALCA', 1),
(10, 'LEIMEBAMBA', 1),
(11, 'LEVANTO', 1),
(12, 'MAGDALENA', 1),
(13, 'MARISCAL CASTILLA', 1),
(14, 'MOLINOPAMPA', 1),
(15, 'MONTEVIDEO', 1),
(16, 'OLLEROS', 1),
(17, 'QUINJALCA', 1),
(18, 'SAN FRANCISCO DE DAGUAS', 1),
(19, 'SAN ISIDRO DE MAINO', 1),
(20, 'SOLOCO', 1),
(21, 'SONCHE', 1),
(22, 'LA PECA', 2),
(23, 'ARAMANGO', 2),
(24, 'COPALLIN', 2),
(25, 'EL PARCO', 2),
(26, 'IMAZA', 2),
(27, 'JUMBILLA', 3),
(28, 'CHISQUILLA', 3),
(29, 'CHURUJA', 3),
(30, 'COROSHA', 3),
(31, 'CUISPES', 3),
(32, 'FLORIDA', 3),
(33, 'JAZAN', 3),
(34, 'RECTA', 3),
(35, 'SAN CARLOS', 3),
(36, 'SHIPASBAMBA', 3),
(37, 'VALERA', 3),
(38, 'YAMBRASBAMBA', 3),
(39, 'NIEVA', 4),
(40, 'EL CENEPA', 4),
(41, 'RIO SANTIAGO', 4),
(42, 'LAMUD', 5),
(43, 'CAMPORREDONDO', 5),
(44, 'COCABAMBA', 5),
(45, 'COLCAMAR', 5),
(46, 'CONILA', 5),
(47, 'INGUILPATA', 5),
(48, 'LONGUITA', 5),
(49, 'LONYA CHICO', 5),
(50, 'LUYA', 5),
(51, 'LUYA VIEJO', 5),
(52, 'MARIA', 5),
(53, 'OCALLI', 5),
(54, 'OCUMAL', 5),
(55, 'PISUQUIA', 5),
(56, 'PROVIDENCIA', 5),
(57, 'SAN CRISTOBAL', 5),
(58, 'SAN FRANCISCO DEL YESO', 5),
(59, 'SAN JERONIMO', 5),
(60, 'SAN JUAN DE LOPECANCHA', 5),
(61, 'SANTA CATALINA', 5),
(62, 'SANTO TOMAS', 5),
(63, 'TINGO', 5),
(64, 'TRITA', 5),
(65, 'SAN NICOLAS', 6),
(66, 'CHIRIMOTO', 6),
(67, 'COCHAMAL', 6),
(68, 'HUAMBO', 6),
(69, 'LIMABAMBA', 6),
(70, 'LONGAR', 6),
(71, 'MARISCAL BENAVIDES', 6),
(72, 'MILPUC', 6),
(73, 'OMIA', 6),
(74, 'SANTA ROSA', 6),
(75, 'TOTORA', 6),
(76, 'VISTA ALEGRE', 6),
(77, 'BAGUA GRANDE', 7),
(78, 'CAJARURO', 7),
(79, 'CUMBA', 7),
(80, 'EL MILAGRO', 7),
(81, 'JAMALCA', 7),
(82, 'LONYA GRANDE', 7),
(83, 'YAMON', 7),
(84, 'HUARAZ', 8),
(85, 'COCHABAMBA', 8),
(86, 'COLCABAMBA', 8),
(87, 'HUANCHAY', 8),
(88, 'INDEPENDENCIA', 8),
(89, 'JANGAS', 8),
(90, 'LA LIBERTAD', 8),
(91, 'OLLEROS', 8),
(92, 'PAMPAS', 8),
(93, 'PARIACOTO', 8),
(94, 'PIRA', 8),
(95, 'TARICA', 8),
(96, 'AIJA', 9),
(97, 'CORIS', 9),
(98, 'HUACLLAN', 9),
(99, 'LA MERCED', 9),
(100, 'SUCCHA', 9),
(101, 'LLAMELLIN', 10),
(102, 'ACZO', 10),
(103, 'CHACCHO', 10),
(104, 'CHINGAS', 10),
(105, 'MIRGAS', 10),
(106, 'SAN JUAN DE RONTOY', 10),
(107, 'CHACAS', 11),
(108, 'ACOCHACA', 11),
(109, 'CHIQUIAN', 12),
(110, 'ABELARDO PARDO LEZAMETA', 12),
(111, 'ANTONIO RAYMONDI', 12),
(112, 'AQUIA', 12),
(113, 'CAJACAY', 12),
(114, 'CANIS', 12),
(115, 'COLQUIOC', 12),
(116, 'HUALLANCA', 12),
(117, 'HUASTA', 12),
(118, 'HUAYLLACAYAN', 12),
(119, 'LA PRIMAVERA', 12),
(120, 'MANGAS', 12),
(121, 'PACLLON', 12),
(122, 'SAN MIGUEL DE CORPANQUI', 12),
(123, 'TICLLOS', 12),
(124, 'CARHUAZ', 13),
(125, 'ACOPAMPA', 13),
(126, 'AMASHCA', 13),
(127, 'ANTA', 13),
(128, 'ATAQUERO', 13),
(129, 'MARCARA', 13),
(130, 'PARIAHUANCA', 13),
(131, 'SAN MIGUEL DE ACO', 13),
(132, 'SHILLA', 13),
(133, 'TINCO', 13),
(134, 'YUNGAR', 13),
(135, 'SAN LUIS', 14),
(136, 'SAN NICOLAS', 14),
(137, 'YAUYA', 14),
(138, 'CASMA', 15),
(139, 'BUENA VISTA ALTA', 15),
(140, 'COMANDANTE NOEL', 15),
(141, 'YAUTAN', 15),
(142, 'CORONGO', 16),
(143, 'ACO', 16),
(144, 'BAMBAS', 16),
(145, 'CUSCA', 16),
(146, 'LA PAMPA', 16),
(147, 'YANAC', 16),
(148, 'YUPAN', 16),
(149, 'HUARI', 17),
(150, 'ANRA', 17),
(151, 'CAJAY', 17),
(152, 'CHAVIN DE HUANTAR', 17),
(153, 'HUACACHI', 17),
(154, 'HUACCHIS', 17),
(155, 'HUACHIS', 17),
(156, 'HUANTAR', 17),
(157, 'MASIN', 17),
(158, 'PAUCAS', 17),
(159, 'PONTO', 17),
(160, 'RAHUAPAMPA', 17),
(161, 'RAPAYAN', 17),
(162, 'SAN MARCOS', 17),
(163, 'SAN PEDRO DE CHANA', 17),
(164, 'UCO', 17),
(165, 'HUARMEY', 18),
(166, 'COCHAPETI', 18),
(167, 'CULEBRAS', 18),
(168, 'HUAYAN', 18),
(169, 'MALVAS', 18),
(170, 'CARAZ', 26),
(171, 'HUALLANCA', 26),
(172, 'HUATA', 26),
(173, 'HUAYLAS', 26),
(174, 'MATO', 26),
(175, 'PAMPAROMAS', 26),
(176, 'PUEBLO LIBRE', 26),
(177, 'SANTA CRUZ', 26),
(178, 'SANTO TORIBIO', 26),
(179, 'YURACMARCA', 26),
(180, 'PISCOBAMBA', 27),
(181, 'CASCA', 27),
(182, 'ELEAZAR GUZMAN BARRON', 27),
(183, 'FIDEL OLIVAS ESCUDERO', 27),
(184, 'LLAMA', 27),
(185, 'LLUMPA', 27),
(186, 'LUCMA', 27),
(187, 'MUSGA', 27),
(188, 'OCROS', 21),
(189, 'ACAS', 21),
(190, 'CAJAMARQUILLA', 21),
(191, 'CARHUAPAMPA', 21),
(192, 'COCHAS', 21),
(193, 'CONGAS', 21),
(194, 'LLIPA', 21),
(195, 'SAN CRISTOBAL DE RAJAN', 21),
(196, 'SAN PEDRO', 21),
(197, 'SANTIAGO DE CHILCAS', 21),
(198, 'CABANA', 22),
(199, 'BOLOGNESI', 22),
(200, 'CONCHUCOS', 22),
(201, 'HUACASCHUQUE', 22),
(202, 'HUANDOVAL', 22),
(203, 'LACABAMBA', 22),
(204, 'LLAPO', 22),
(205, 'PALLASCA', 22),
(206, 'PAMPAS', 22),
(207, 'SANTA ROSA', 22),
(208, 'TAUCA', 22),
(209, 'POMABAMBA', 23),
(210, 'HUAYLLAN', 23),
(211, 'PAROBAMBA', 23),
(212, 'QUINUABAMBA', 23),
(213, 'RECUAY', 24),
(214, 'CATAC', 24),
(215, 'COTAPARACO', 24),
(216, 'HUAYLLAPAMPA', 24),
(217, 'LLACLLIN', 24),
(218, 'MARCA', 24),
(219, 'PAMPAS CHICO', 24),
(220, 'PARARIN', 24),
(221, 'TAPACOCHA', 24),
(222, 'TICAPAMPA', 24),
(223, 'CHIMBOTE', 25),
(224, 'CACERES DEL PERU', 25),
(225, 'COISHCO', 25),
(226, 'MACATE', 25),
(227, 'MORO', 25),
(228, 'NEPE&Ntilde;A', 25),
(229, 'SAMANCO', 25),
(230, 'SANTA', 25),
(231, 'NUEVO CHIMBOTE', 25),
(232, 'SIHUAS', 26),
(233, 'ACOBAMBA', 26),
(234, 'ALFONSO UGARTE', 26),
(235, 'CASHAPAMPA', 26),
(236, 'CHINGALPO', 26),
(237, 'HUAYLLABAMBA', 26),
(238, 'QUICHES', 26),
(239, 'RAGASH', 26),
(240, 'SAN JUAN', 26),
(241, 'SICSIBAMBA', 26),
(242, 'YUNGAY', 27),
(243, 'CASCAPARA', 27),
(244, 'MANCOS', 27),
(245, 'MATACOTO', 27),
(246, 'QUILLO', 27),
(247, 'RANRAHIRCA', 27),
(248, 'SHUPLUY', 27),
(249, 'YANAMA', 27),
(250, 'ABANCAY', 28),
(251, 'CHACOCHE', 28),
(252, 'CIRCA', 28),
(253, 'CURAHUASI', 28),
(254, 'HUANIPACA', 28),
(255, 'LAMBRAMA', 28),
(256, 'PICHIRHUA', 28),
(257, 'SAN PEDRO DE CACHORA', 28),
(258, 'TAMBURCO', 28),
(259, 'ANDAHUAYLAS', 29),
(260, 'ANDARAPA', 29),
(261, 'CHIARA', 29),
(262, 'HUANCARAMA', 29),
(263, 'HUANCARAY', 29),
(264, 'HUAYANA', 29),
(265, 'KISHUARA', 29),
(266, 'PACOBAMBA', 29),
(267, 'PACUCHA', 29),
(268, 'PAMPACHIRI', 29),
(269, 'POMACOCHA', 29),
(270, 'SAN ANTONIO DE CACHI', 29),
(271, 'SAN JERONIMO', 29),
(272, 'SAN MIGUEL DE CHACCRAMPA', 29),
(273, 'SANTA MARIA DE CHICMO', 29),
(274, 'TALAVERA', 29),
(275, 'TUMAY HUARACA', 29),
(276, 'TURPO', 29),
(277, 'KAQUIABAMBA', 29),
(278, 'ANTABAMBA', 30),
(279, 'EL ORO', 30),
(280, 'HUAQUIRCA', 30),
(281, 'JUAN ESPINOZA MEDRANO', 30),
(282, 'OROPESA', 30),
(283, 'PACHACONAS', 30),
(284, 'SABAINO', 30),
(285, 'CHALHUANCA', 31),
(286, 'CAPAYA', 31),
(287, 'CARAYBAMBA', 31),
(288, 'CHAPIMARCA', 31),
(289, 'COLCABAMBA', 31),
(290, 'COTARUSE', 31),
(291, 'HUAYLLO', 31),
(292, 'JUSTO APU SAHUARAURA', 31),
(293, 'LUCRE', 31),
(294, 'POCOHUANCA', 31),
(295, 'SAN JUAN DE CHAC&Ntilde;A', 31),
(296, 'SA&Ntilde;AYCA', 31),
(297, 'SORAYA', 31),
(298, 'TAPAIRIHUA', 31),
(299, 'TINTAY', 31),
(300, 'TORAYA', 31),
(301, 'YANACA', 31),
(302, 'TAMBOBAMBA', 32),
(303, 'COTABAMBAS', 32),
(304, 'COYLLURQUI', 32),
(305, 'HAQUIRA', 32),
(306, 'MARA', 32),
(307, 'CHALLHUAHUACHO', 32),
(308, 'CHINCHEROS', 33),
(309, 'ANCO-HUALLO', 33),
(310, 'COCHARCAS', 33),
(311, 'HUACCANA', 33),
(312, 'OCOBAMBA', 33),
(313, 'ONGOY', 33),
(314, 'URANMARCA', 33),
(315, 'RANRACANCHA', 33),
(316, 'CHUQUIBAMBILLA', 34),
(317, 'CURPAHUASI', 34),
(318, 'GAMARRA', 34),
(319, 'HUAYLLATI', 34),
(320, 'MAMARA', 34),
(321, 'MICAELA BASTIDAS', 34),
(322, 'PATAYPAMPA', 34),
(323, 'PROGRESO', 34),
(324, 'SAN ANTONIO', 34),
(325, 'SANTA ROSA', 34),
(326, 'TURPAY', 34),
(327, 'VILCABAMBA', 34),
(328, 'VIRUNDO', 34),
(329, 'CURASCO', 34),
(330, 'AREQUIPA', 35),
(331, 'ALTO SELVA ALEGRE', 35),
(332, 'CAYMA', 35),
(333, 'CERRO COLORADO', 35),
(334, 'CHARACATO', 35),
(335, 'CHIGUATA', 35),
(336, 'JACOBO HUNTER', 35),
(337, 'LA JOYA', 35),
(338, 'MARIANO MELGAR', 35),
(339, 'MIRAFLORES', 35),
(340, 'MOLLEBAYA', 35),
(341, 'PAUCARPATA', 35),
(342, 'POCSI', 35),
(343, 'POLOBAYA', 35),
(344, 'QUEQUE&Ntilde;A', 35),
(345, 'SABANDIA', 35),
(346, 'SACHACA', 35),
(347, 'SAN JUAN DE SIGUAS', 35),
(348, 'SAN JUAN DE TARUCANI', 35),
(349, 'SANTA ISABEL DE SIGUAS', 35),
(350, 'SANTA RITA DE SIGUAS', 35),
(351, 'SOCABAYA', 35),
(352, 'TIABAYA', 35),
(353, 'UCHUMAYO', 35),
(354, 'VITOR', 35),
(355, 'YANAHUARA', 35),
(356, 'YARABAMBA', 35),
(357, 'YURA', 35),
(358, 'JOSE LUIS BUSTAMANTE Y RIVERO', 35),
(359, 'CAMANA', 36),
(360, 'JOSE MARIA QUIMPER', 36),
(361, 'MARIANO NICOLAS VALCARCEL', 36),
(362, 'MARISCAL CACERES', 36),
(363, 'NICOLAS DE PIEROLA', 36),
(364, 'OCO&Ntilde;A', 36),
(365, 'QUILCA', 36),
(366, 'SAMUEL PASTOR', 36),
(367, 'CARAVELI', 37),
(368, 'ACARI', 37),
(369, 'ATICO', 37),
(370, 'ATIQUIPA', 37),
(371, 'BELLA UNION', 37),
(372, 'CAHUACHO', 37),
(373, 'CHALA', 37),
(374, 'CHAPARRA', 37),
(375, 'HUANUHUANU', 37),
(376, 'JAQUI', 37),
(377, 'LOMAS', 37),
(378, 'QUICACHA', 37),
(379, 'YAUCA', 37),
(380, 'APLAO', 38),
(381, 'ANDAGUA', 38),
(382, 'AYO', 38),
(383, 'CHACHAS', 38),
(384, 'CHILCAYMARCA', 38),
(385, 'CHOCO', 38),
(386, 'HUANCARQUI', 38),
(387, 'MACHAGUAY', 38),
(388, 'ORCOPAMPA', 38),
(389, 'PAMPACOLCA', 38),
(390, 'TIPAN', 38),
(391, 'U&Ntilde;ON', 38),
(392, 'URACA', 38),
(393, 'VIRACO', 38),
(394, 'CHIVAY', 39),
(395, 'ACHOMA', 39),
(396, 'CABANACONDE', 39),
(397, 'CALLALLI', 39),
(398, 'CAYLLOMA', 39),
(399, 'COPORAQUE', 39),
(400, 'HUAMBO', 39),
(401, 'HUANCA', 39),
(402, 'ICHUPAMPA', 39),
(403, 'LARI', 39),
(404, 'LLUTA', 39),
(405, 'MACA', 39),
(406, 'MADRIGAL', 39),
(407, 'SAN ANTONIO DE CHUCA', 39),
(408, 'SIBAYO', 39),
(409, 'TAPAY', 39),
(410, 'TISCO', 39),
(411, 'TUTI', 39),
(412, 'YANQUE', 39),
(413, 'MAJES', 39),
(414, 'CHUQUIBAMBA', 40),
(415, 'ANDARAY', 40),
(416, 'CAYARANI', 40),
(417, 'CHICHAS', 40),
(418, 'IRAY', 40),
(419, 'RIO GRANDE', 40),
(420, 'SALAMANCA', 40),
(421, 'YANAQUIHUA', 40),
(422, 'MOLLENDO', 41),
(423, 'COCACHACRA', 41),
(424, 'DEAN VALDIVIA', 41),
(425, 'ISLAY', 41),
(426, 'MEJIA', 41),
(427, 'PUNTA DE BOMBON', 41),
(428, 'COTAHUASI', 42),
(429, 'ALCA', 42),
(430, 'CHARCANA', 42),
(431, 'HUAYNACOTAS', 42),
(432, 'PAMPAMARCA', 42),
(433, 'PUYCA', 42),
(434, 'QUECHUALLA', 42),
(435, 'SAYLA', 42),
(436, 'TAURIA', 42),
(437, 'TOMEPAMPA', 42),
(438, 'TORO', 42),
(439, 'AYACUCHO', 43),
(440, 'ACOCRO', 43),
(441, 'ACOS VINCHOS', 43),
(442, 'CARMEN ALTO', 43),
(443, 'CHIARA', 43),
(444, 'OCROS', 43),
(445, 'PACAYCASA', 43),
(446, 'QUINUA', 43),
(447, 'SAN JOSE DE TICLLAS', 43),
(448, 'SAN JUAN BAUTISTA', 43),
(449, 'SANTIAGO DE PISCHA', 43),
(450, 'SOCOS', 43),
(451, 'TAMBILLO', 43),
(452, 'VINCHOS', 43),
(453, 'JESUS NAZARENO', 43),
(454, 'CANGALLO', 44),
(455, 'CHUSCHI', 44),
(456, 'LOS MOROCHUCOS', 44),
(457, 'MARIA PARADO DE BELLIDO', 44),
(458, 'PARAS', 44),
(459, 'TOTOS', 44),
(460, 'SANCOS', 45),
(461, 'CARAPO', 45),
(462, 'SACSAMARCA', 45),
(463, 'SANTIAGO DE LUCANAMARCA', 45),
(464, 'HUANTA', 46),
(465, 'AYAHUANCO', 46),
(466, 'HUAMANGUILLA', 46),
(467, 'IGUAIN', 46),
(468, 'LURICOCHA', 46),
(469, 'SANTILLANA', 46),
(470, 'SIVIA', 46),
(471, 'LLOCHEGUA', 46),
(472, 'SAN MIGUEL', 47),
(473, 'ANCO', 47),
(474, 'AYNA', 47),
(475, 'CHILCAS', 47),
(476, 'CHUNGUI', 47),
(477, 'LUIS CARRANZA', 47),
(478, 'SANTA ROSA', 47),
(479, 'TAMBO', 47),
(480, 'PUQUIO', 48),
(481, 'AUCARA', 48),
(482, 'CABANA', 48),
(483, 'CARMEN SALCEDO', 48),
(484, 'CHAVI&Ntilde;A', 48),
(485, 'CHIPAO', 48),
(486, 'HUAC-HUAS', 48),
(487, 'LARAMATE', 48),
(488, 'LEONCIO PRADO', 48),
(489, 'LLAUTA', 48),
(490, 'LUCANAS', 48),
(491, 'OCA&Ntilde;A', 48),
(492, 'OTOCA', 48),
(493, 'SAISA', 48),
(494, 'SAN CRISTOBAL', 48),
(495, 'SAN JUAN', 48),
(496, 'SAN PEDRO', 48),
(497, 'SAN PEDRO DE PALCO', 48),
(498, 'SANCOS', 48),
(499, 'SANTA ANA DE HUAYCAHUACHO', 48),
(500, 'SANTA LUCIA', 48),
(501, 'CORACORA', 49),
(502, 'CHUMPI', 49),
(503, 'CORONEL CASTA&Ntilde;EDA', 49),
(504, 'PACAPAUSA', 49),
(505, 'PULLO', 49),
(506, 'PUYUSCA', 49),
(507, 'SAN FRANCISCO DE RAVACAYCO', 49),
(508, 'UPAHUACHO', 49),
(509, 'PAUSA', 50),
(510, 'COLTA', 50),
(511, 'CORCULLA', 50),
(512, 'LAMPA', 50),
(513, 'MARCABAMBA', 50),
(514, 'OYOLO', 50),
(515, 'PARARCA', 50),
(516, 'SAN JAVIER DE ALPABAMBA', 50),
(517, 'SAN JOSE DE USHUA', 50),
(518, 'SARA SARA', 50),
(519, 'QUEROBAMBA', 51),
(520, 'BELEN', 51),
(521, 'CHALCOS', 51),
(522, 'CHILCAYOC', 51),
(523, 'HUACA&Ntilde;A', 51),
(524, 'MORCOLLA', 51),
(525, 'PAICO', 51),
(526, 'SAN PEDRO DE LARCAY', 51),
(527, 'SAN SALVADOR DE QUIJE', 51),
(528, 'SANTIAGO DE PAUCARAY', 51),
(529, 'SORAS', 51),
(530, 'HUANCAPI', 52),
(531, 'ALCAMENCA', 52),
(532, 'APONGO', 52),
(533, 'ASQUIPATA', 52),
(534, 'CANARIA', 52),
(535, 'CAYARA', 52),
(536, 'COLCA', 52),
(537, 'HUAMANQUIQUIA', 52),
(538, 'HUANCARAYLLA', 52),
(539, 'HUAYA', 52),
(540, 'SARHUA', 52),
(541, 'VILCANCHOS', 52),
(542, 'VILCAS HUAMAN', 53),
(543, 'ACCOMARCA', 53),
(544, 'CARHUANCA', 53),
(545, 'CONCEPCION', 53),
(546, 'HUAMBALPA', 53),
(547, 'INDEPENDENCIA', 53),
(548, 'SAURAMA', 53),
(549, 'VISCHONGO', 53),
(550, 'CAJAMARCA', 54),
(551, 'CAJAMARCA', 54),
(552, 'ASUNCION', 54),
(553, 'CHETILLA', 54),
(554, 'COSPAN', 54),
(555, 'ENCA&Ntilde;ADA', 54),
(556, 'JESUS', 54),
(557, 'LLACANORA', 54),
(558, 'LOS BA&Ntilde;OS DEL INCA', 54),
(559, 'MAGDALENA', 54),
(560, 'MATARA', 54),
(561, 'NAMORA', 54),
(562, 'SAN JUAN', 54),
(563, 'CAJABAMBA', 55),
(564, 'CACHACHI', 55),
(565, 'CONDEBAMBA', 55),
(566, 'SITACOCHA', 55),
(567, 'CELENDIN', 56),
(568, 'CHUMUCH', 56),
(569, 'CORTEGANA', 56),
(570, 'HUASMIN', 56),
(571, 'JORGE CHAVEZ', 56),
(572, 'JOSE GALVEZ', 56),
(573, 'MIGUEL IGLESIAS', 56),
(574, 'OXAMARCA', 56),
(575, 'SOROCHUCO', 56),
(576, 'SUCRE', 56),
(577, 'UTCO', 56),
(578, 'LA LIBERTAD DE PALLAN', 56),
(579, 'CHOTA', 57),
(580, 'ANGUIA', 57),
(581, 'CHADIN', 57),
(582, 'CHIGUIRIP', 57),
(583, 'CHIMBAN', 57),
(584, 'CHOROPAMPA', 57),
(585, 'COCHABAMBA', 57),
(586, 'CONCHAN', 57),
(587, 'HUAMBOS', 57),
(588, 'LAJAS', 57),
(589, 'LLAMA', 57),
(590, 'MIRACOSTA', 57),
(591, 'PACCHA', 57),
(592, 'PION', 57),
(593, 'QUEROCOTO', 57),
(594, 'SAN JUAN DE LICUPIS', 57),
(595, 'TACABAMBA', 57),
(596, 'TOCMOCHE', 57),
(597, 'CHALAMARCA', 57),
(598, 'CONTUMAZA', 58),
(599, 'CHILETE', 58),
(600, 'CUPISNIQUE', 58),
(601, 'GUZMANGO', 58),
(602, 'SAN BENITO', 58),
(603, 'SANTA CRUZ DE TOLED', 58),
(604, 'TANTARICA', 58),
(605, 'YONAN', 58),
(606, 'CUTERVO', 59),
(607, 'CALLAYUC', 59),
(608, 'CHOROS', 59),
(609, 'CUJILLO', 59),
(610, 'LA RAMADA', 59),
(611, 'PIMPINGOS', 59),
(612, 'QUEROCOTILLO', 59),
(613, 'SAN ANDRES DE CUTERVO', 59),
(614, 'SAN JUAN DE CUTERVO', 59),
(615, 'SAN LUIS DE LUCMA', 59),
(616, 'SANTA CRUZ', 59),
(617, 'SANTO DOMINGO DE LA CAPILLA', 59),
(618, 'SANTO TOMAS', 59),
(619, 'SOCOTA', 59),
(620, 'TORIBIO CASANOVA', 59),
(621, 'BAMBAMARCA', 60),
(622, 'CHUGUR', 60),
(623, 'HUALGAYOC', 60),
(624, 'JAEN', 61),
(625, 'BELLAVISTA', 61),
(626, 'CHONTALI', 61),
(627, 'COLASAY', 61),
(628, 'HUABAL', 61),
(629, 'LAS PIRIAS', 61),
(630, 'POMAHUACA', 61),
(631, 'PUCARA', 61),
(632, 'SALLIQUE', 61),
(633, 'SAN FELIPE', 61),
(634, 'SAN JOSE DEL ALTO', 61),
(635, 'SANTA ROSA', 61),
(636, 'SAN IGNACIO', 62),
(637, 'CHIRINOS', 62),
(638, 'HUARANGO', 62),
(639, 'LA COIPA', 62),
(640, 'NAMBALLE', 62),
(641, 'SAN JOSE DE LOURDES', 62),
(642, 'TABACONAS', 62),
(643, 'PEDRO GALVEZ', 63),
(644, 'CHANCAY', 63),
(645, 'EDUARDO VILLANUEVA', 63),
(646, 'GREGORIO PITA', 63),
(647, 'ICHOCAN', 63),
(648, 'JOSE MANUEL QUIROZ', 63),
(649, 'JOSE SABOGAL', 63),
(650, 'SAN MIGUEL', 64),
(651, 'SAN MIGUEL', 64),
(652, 'BOLIVAR', 64),
(653, 'CALQUIS', 64),
(654, 'CATILLUC', 64),
(655, 'EL PRADO', 64),
(656, 'LA FLORIDA', 64),
(657, 'LLAPA', 64),
(658, 'NANCHOC', 64),
(659, 'NIEPOS', 64),
(660, 'SAN GREGORIO', 64),
(661, 'SAN SILVESTRE DE COCHAN', 64),
(662, 'TONGOD', 64),
(663, 'UNION AGUA BLANCA', 64),
(664, 'SAN PABLO', 65),
(665, 'SAN BERNARDINO', 65),
(666, 'SAN LUIS', 65),
(667, 'TUMBADEN', 65),
(668, 'SANTA CRUZ', 66),
(669, 'ANDABAMBA', 66),
(670, 'CATACHE', 66),
(671, 'CHANCAYBA&Ntilde;OS', 66),
(672, 'LA ESPERANZA', 66),
(673, 'NINABAMBA', 66),
(674, 'PULAN', 66),
(675, 'SAUCEPAMPA', 66),
(676, 'SEXI', 66),
(677, 'UTICYACU', 66),
(678, 'YAUYUCAN', 66),
(679, 'CALLAO', 67),
(680, 'BELLAVISTA', 67),
(681, 'CARMEN DE LA LEGUA REYNOSO', 67),
(682, 'LA PERLA', 67),
(683, 'LA PUNTA', 67),
(684, 'VENTANILLA', 67),
(685, 'CUSCO', 67),
(686, 'CCORCA', 67),
(687, 'POROY', 67),
(688, 'SAN JERONIMO', 67),
(689, 'SAN SEBASTIAN', 67),
(690, 'SANTIAGO', 67),
(691, 'SAYLLA', 67),
(692, 'WANCHAQ', 67),
(693, 'ACOMAYO', 68),
(694, 'ACOPIA', 68),
(695, 'ACOS', 68),
(696, 'MOSOC LLACTA', 68),
(697, 'POMACANCHI', 68),
(698, 'RONDOCAN', 68),
(699, 'SANGARARA', 68),
(700, 'ANTA', 69),
(701, 'ANCAHUASI', 69),
(702, 'CACHIMAYO', 69),
(703, 'CHINCHAYPUJIO', 69),
(704, 'HUAROCONDO', 69),
(705, 'LIMATAMBO', 69),
(706, 'MOLLEPATA', 69),
(707, 'PUCYURA', 69),
(708, 'ZURITE', 69),
(709, 'CALCA', 70),
(710, 'COYA', 70),
(711, 'LAMAY', 70),
(712, 'LARES', 70),
(713, 'PISAC', 70),
(714, 'SAN SALVADOR', 70),
(715, 'TARAY', 70),
(716, 'YANATILE', 70),
(717, 'YANAOCA', 71),
(718, 'CHECCA', 71),
(719, 'KUNTURKANKI', 71),
(720, 'LANGUI', 71),
(721, 'LAYO', 71),
(722, 'PAMPAMARCA', 71),
(723, 'QUEHUE', 71),
(724, 'TUPAC AMARU', 71),
(725, 'SICUANI', 72),
(726, 'CHECACUPE', 72),
(727, 'COMBAPATA', 72),
(728, 'MARANGANI', 72),
(729, 'PITUMARCA', 72),
(730, 'SAN PABLO', 72),
(731, 'SAN PEDRO', 72),
(732, 'TINTA', 72),
(733, 'SANTO TOMAS', 73),
(734, 'CAPACMARCA', 73),
(735, 'CHAMACA', 73),
(736, 'COLQUEMARCA', 73),
(737, 'LIVITACA', 73),
(738, 'LLUSCO', 73),
(739, 'QUI&Ntilde;OTA', 73),
(740, 'VELILLE', 73),
(741, 'ESPINAR', 74),
(742, 'CONDOROMA', 74),
(743, 'COPORAQUE', 74),
(744, 'OCORURO', 74),
(745, 'PALLPATA', 74),
(746, 'PICHIGUA', 74),
(747, 'SUYCKUTAMBO', 74),
(748, 'ALTO PICHIGUA', 74),
(749, 'SANTA ANA', 75),
(750, 'ECHARATE', 75),
(751, 'HUAYOPATA', 75),
(752, 'MARANURA', 75),
(753, 'OCOBAMBA', 75),
(754, 'QUELLOUNO', 75),
(755, 'KIMBIRI', 75),
(756, 'SANTA TERESA', 75),
(757, 'VILCABAMBA', 75),
(758, 'PICHARI', 75),
(759, 'PARURO', 76),
(760, 'ACCHA', 76),
(761, 'CCAPI', 76),
(762, 'COLCHA', 76),
(763, 'HUANOQUITE', 76),
(764, 'OMACHA', 76),
(765, 'PACCARITAMBO', 76),
(766, 'PILLPINTO', 76),
(767, 'YAURISQUE', 76),
(768, 'PAUCARTAMBO', 77),
(769, 'CAICAY', 77),
(770, 'CHALLABAMBA', 77),
(771, 'COLQUEPATA', 77),
(772, 'HUANCARANI', 77),
(773, 'KOS&Ntilde;IPATA', 77),
(774, 'URCOS', 78),
(775, 'ANDAHUAYLILLAS', 78),
(776, 'CAMANTI', 78),
(777, 'CCARHUAYO', 78),
(778, 'CCATCA', 78),
(779, 'CUSIPATA', 78),
(780, 'HUARO', 78),
(781, 'LUCRE', 78),
(782, 'MARCAPATA', 78),
(783, 'OCONGATE', 78),
(784, 'OROPESA', 78),
(785, 'QUIQUIJANA', 78),
(786, 'URUBAMBA', 79),
(787, 'CHINCHERO', 79),
(788, 'HUAYLLABAMBA', 79),
(789, 'MACHUPICCHU', 79),
(790, 'MARAS', 79),
(791, 'OLLANTAYTAMBO', 79),
(792, 'YUCAY', 79),
(793, 'HUANCAVELICA', 80),
(794, 'ACOBAMBILLA', 80),
(795, 'ACORIA', 80),
(796, 'CONAYCA', 80),
(797, 'CUENCA', 80),
(798, 'HUACHOCOLPA', 80),
(799, 'HUAYLLAHUARA', 80),
(800, 'IZCUCHACA', 80),
(801, 'LARIA', 80),
(802, 'MANTA', 80),
(803, 'MARISCAL CACERES', 80),
(804, 'MOYA', 80),
(805, 'NUEVO OCCORO', 80),
(806, 'PALCA', 80),
(807, 'PILCHACA', 80),
(808, 'VILCA', 80),
(809, 'YAULI', 80),
(810, 'ASCENSION', 80),
(811, 'HUANDO', 80),
(812, 'ACOBAMBA', 81),
(813, 'ANDABAMBA', 81),
(814, 'ANTA', 81),
(815, 'CAJA', 81),
(816, 'MARCAS', 81),
(817, 'PAUCARA', 81),
(818, 'POMACOCHA', 81),
(819, 'ROSARIO', 81),
(820, 'LIRCAY', 82),
(821, 'ANCHONGA', 82),
(822, 'CALLANMARCA', 82),
(823, 'CCOCHACCASA', 82),
(824, 'CHINCHO', 82),
(825, 'CONGALLA', 82),
(826, 'HUANCA-HUANCA', 82),
(827, 'HUAYLLAY GRANDE', 82),
(828, 'JULCAMARCA', 82),
(829, 'SAN ANTONIO DE ANTAPARCO', 82),
(830, 'SANTO TOMAS DE PATA', 82),
(831, 'SECCLLA', 82),
(832, 'CASTROVIRREYNA', 83),
(833, 'ARMA', 83),
(834, 'AURAHUA', 83),
(835, 'CAPILLAS', 83),
(836, 'CHUPAMARCA', 83),
(837, 'COCAS', 83),
(838, 'HUACHOS', 83),
(839, 'HUAMATAMBO', 83),
(840, 'MOLLEPAMPA', 83),
(841, 'SAN JUAN', 83),
(842, 'SANTA ANA', 83),
(843, 'TANTARA', 83),
(844, 'TICRAPO', 83),
(845, 'CHURCAMPA', 84),
(846, 'ANCO', 84),
(847, 'CHINCHIHUASI', 84),
(848, 'EL CARMEN', 84),
(849, 'LA MERCED', 84),
(850, 'LOCROJA', 84),
(851, 'PAUCARBAMBA', 84),
(852, 'SAN MIGUEL DE MAYOCC', 84),
(853, 'SAN PEDRO DE CORIS', 84),
(854, 'PACHAMARCA', 84),
(855, 'HUAYTARA', 85),
(856, 'AYAVI', 85),
(857, 'CORDOVA', 85),
(858, 'HUAYACUNDO ARMA', 85),
(859, 'LARAMARCA', 85),
(860, 'OCOYO', 85),
(861, 'PILPICHACA', 85),
(862, 'QUERCO', 85),
(863, 'QUITO-ARMA', 85),
(864, 'SAN ANTONIO DE CUSICANCHA', 85),
(865, 'SAN FRANCISCO DE SANGAYAICO', 85),
(866, 'SAN ISIDRO', 85),
(867, 'SANTIAGO DE CHOCORVOS', 85),
(868, 'SANTIAGO DE QUIRAHUARA', 85),
(869, 'SANTO DOMINGO DE CAPILLAS', 85),
(870, 'TAMBO', 85),
(871, 'PAMPAS', 86),
(872, 'ACOSTAMBO', 86),
(873, 'ACRAQUIA', 86),
(874, 'AHUAYCHA', 86),
(875, 'COLCABAMBA', 86),
(876, 'DANIEL HERNANDEZ', 86),
(877, 'HUACHOCOLPA', 86),
(878, 'HUARIBAMBA', 86),
(879, '&Ntilde;AHUIMPUQUIO', 86),
(880, 'PAZOS', 86),
(881, 'QUISHUAR', 86),
(882, 'SALCABAMBA', 86),
(883, 'SALCAHUASI', 86),
(884, 'SAN MARCOS DE ROCCHAC', 86),
(885, 'SURCUBAMBA', 86),
(886, 'TINTAY PUNCU', 86),
(887, 'HUANUCO', 87),
(888, 'AMARILIS', 87),
(889, 'CHINCHAO', 87),
(890, 'CHURUBAMBA', 87),
(891, 'MARGOS', 87),
(892, 'QUISQUI', 87),
(893, 'SAN FRANCISCO DE CAYRAN', 87),
(894, 'SAN PEDRO DE CHAULAN', 87),
(895, 'SANTA MARIA DEL VALLE', 87),
(896, 'YARUMAYO', 87),
(897, 'PILLCO MARCA', 87),
(898, 'AMBO', 88),
(899, 'CAYNA', 88),
(900, 'COLPAS', 88),
(901, 'CONCHAMARCA', 88),
(902, 'HUACAR', 88),
(903, 'SAN FRANCISCO', 88),
(904, 'SAN RAFAEL', 88),
(905, 'TOMAY KICHWA', 88),
(906, 'LA UNION', 89),
(907, 'CHUQUIS', 89),
(908, 'MARIAS', 89),
(909, 'PACHAS', 89),
(910, 'QUIVILLA', 89),
(911, 'RIPAN', 89),
(912, 'SHUNQUI', 89),
(913, 'SILLAPATA', 89),
(914, 'YANAS', 89),
(915, 'HUACAYBAMBA', 90),
(916, 'CANCHABAMBA', 90),
(917, 'COCHABAMBA', 90),
(918, 'PINRA', 90),
(919, 'LLATA', 91),
(920, 'ARANCAY', 91),
(921, 'CHAVIN DE PARIARCA', 91),
(922, 'JACAS GRANDE', 91),
(923, 'JIRCAN', 91),
(924, 'MIRAFLORES', 91),
(925, 'MONZON', 91),
(926, 'PUNCHAO', 91),
(927, 'PU&Ntilde;OS', 91),
(928, 'SINGA', 91),
(929, 'TANTAMAYO', 91),
(930, 'RUPA-RUPA', 92),
(931, 'DANIEL ALOMIA ROBLES', 92),
(932, 'HERMILIO VALDIZAN', 92),
(933, 'JOSE CRESPO Y CASTILLO', 92),
(934, 'LUYANDO', 92),
(935, 'MARIANO DAMASO BERAUN', 92),
(936, 'HUACRACHUCO', 93),
(937, 'CHOLON', 93),
(938, 'SAN BUENAVENTURA', 93),
(939, 'PANAO', 94),
(940, 'CHAGLLA', 94),
(941, 'MOLINO', 94),
(942, 'UMARI', 94),
(943, 'PUERTO INCA', 95),
(944, 'CODO DEL POZUZO', 95),
(945, 'HONORIA', 95),
(946, 'TOURNAVISTA', 95),
(947, 'YUYAPICHIS', 95),
(948, 'JESUS', 96),
(949, 'BA&Ntilde;OS', 96),
(950, 'JIVIA', 96),
(951, 'QUEROPALCA', 96),
(952, 'RONDOS', 96),
(953, 'SAN FRANCISCO DE ASIS', 96),
(954, 'SAN MIGUEL DE CAURI', 96),
(955, 'CHAVINILLO', 97),
(956, 'CAHUAC', 97),
(957, 'CHACABAMBA', 97),
(958, 'APARICIO POMARES', 97),
(959, 'JACAS CHICO', 97),
(960, 'OBAS', 97),
(961, 'PAMPAMARCA', 97),
(962, 'CHORAS', 97),
(963, 'ICA', 98),
(964, 'LA TINGUI&Ntilde;A', 98),
(965, 'LOS AQUIJES', 98),
(966, 'OCUCAJE', 98),
(967, 'PACHACUTEC', 98),
(968, 'PARCONA', 98),
(969, 'PUEBLO NUEVO', 98),
(970, 'SALAS', 98),
(971, 'SAN JOSE DE LOS MOLINOS', 98),
(972, 'SAN JUAN BAUTISTA', 98),
(973, 'SANTIAGO', 98),
(974, 'SUBTANJALLA', 98),
(975, 'TATE', 98),
(976, 'YAUCA DEL ROSARIO', 98),
(977, 'CHINCHA ALTA', 99),
(978, 'ALTO LARAN', 99),
(979, 'CHAVIN', 99),
(980, 'CHINCHA BAJA', 99),
(981, 'EL CARMEN', 99),
(982, 'GROCIO PRADO', 99),
(983, 'PUEBLO NUEVO', 99),
(984, 'SAN JUAN DE YANAC', 99),
(985, 'SAN PEDRO DE HUACARPANA', 99),
(986, 'SUNAMPE', 99),
(987, 'TAMBO DE MORA', 99),
(988, 'NAZCA', 100),
(989, 'CHANGUILLO', 100),
(990, 'EL INGENIO', 100),
(991, 'MARCONA', 100),
(992, 'VISTA ALEGRE', 100),
(993, 'PALPA', 101),
(994, 'LLIPATA', 101),
(995, 'RIO GRANDE', 101),
(996, 'SANTA CRUZ', 101),
(997, 'TIBILLO', 101),
(998, 'PISCO', 102),
(999, 'HUANCANO', 102),
(1000, 'HUMAY', 102),
(1001, 'INDEPENDENCIA', 102),
(1002, 'PARACAS', 102),
(1003, 'SAN ANDRES', 102),
(1004, 'SAN CLEMENTE', 102),
(1005, 'TUPAC AMARU INCA', 102),
(1006, 'HUANCAYO', 103),
(1007, 'CARHUACALLANGA', 103),
(1008, 'CHACAPAMPA', 103),
(1009, 'CHICCHE', 103),
(1010, 'CHILCA', 103),
(1011, 'CHONGOS ALTO', 103),
(1012, 'CHUPURO', 103),
(1013, 'COLCA', 103),
(1014, 'CULLHUAS', 103),
(1015, 'EL TAMBO', 103),
(1016, 'HUACRAPUQUIO', 103),
(1017, 'HUALHUAS', 103),
(1018, 'HUANCAN', 103),
(1019, 'HUASICANCHA', 103),
(1020, 'HUAYUCACHI', 103),
(1021, 'INGENIO', 103),
(1022, 'PARIAHUANCA', 103),
(1023, 'PILCOMAYO', 103),
(1024, 'PUCARA', 103),
(1025, 'QUICHUAY', 103),
(1026, 'QUILCAS', 103),
(1027, 'SAN AGUSTIN', 103),
(1028, 'SAN JERONIMO DE TUNAN', 103),
(1029, 'SA&Ntilde;O', 103),
(1030, 'SAPALLANGA', 103),
(1031, 'SICAYA', 103),
(1032, 'SANTO DOMINGO DE ACOBAMBA', 103),
(1033, 'VIQUES', 103),
(1034, 'CONCEPCION', 104),
(1035, 'ACO', 104),
(1036, 'ANDAMARCA', 104),
(1037, 'CHAMBARA', 104),
(1038, 'COCHAS', 104),
(1039, 'COMAS', 104),
(1040, 'HEROINAS TOLEDO', 104),
(1041, 'MANZANARES', 104),
(1042, 'MARISCAL CASTILLA', 104),
(1043, 'MATAHUASI', 104),
(1044, 'MITO', 104),
(1045, 'NUEVE DE JULIO', 104),
(1046, 'ORCOTUNA', 104),
(1047, 'SAN JOSE DE QUERO', 104),
(1048, 'SANTA ROSA DE OCOPA', 104),
(1049, 'CHANCHAMAYO', 105),
(1050, 'PERENE', 105),
(1051, 'PICHANAQUI', 105),
(1052, 'SAN LUIS DE SHUARO', 105),
(1053, 'SAN RAMON', 105),
(1054, 'VITOC', 105),
(1055, 'JAUJA', 106),
(1056, 'ACOLLA', 106),
(1057, 'APATA', 106),
(1058, 'ATAURA', 106),
(1059, 'CANCHAYLLO', 106),
(1060, 'CURICACA', 106),
(1061, 'EL MANTARO', 106),
(1062, 'HUAMALI', 106),
(1063, 'HUARIPAMPA', 106),
(1064, 'HUERTAS', 106),
(1065, 'JANJAILLO', 106),
(1066, 'JULCAN', 106),
(1067, 'LEONOR ORDO&Ntilde;EZ', 106),
(1068, 'LLOCLLAPAMPA', 106),
(1069, 'MARCO', 106),
(1070, 'MASMA', 106),
(1071, 'MASMA CHICCHE', 106),
(1072, 'MOLINOS', 106),
(1073, 'MONOBAMBA', 106),
(1074, 'MUQUI', 106),
(1075, 'MUQUIYAUYO', 106),
(1076, 'PACA', 106),
(1077, 'PACCHA', 106),
(1078, 'PANCAN', 106),
(1079, 'PARCO', 106),
(1080, 'POMACANCHA', 106),
(1081, 'RICRAN', 106),
(1082, 'SAN LORENZO', 106),
(1083, 'SAN PEDRO DE CHUNAN', 106),
(1084, 'SAUSA', 106),
(1085, 'SINCOS', 106),
(1086, 'TUNAN MARCA', 106),
(1087, 'YAULI', 106),
(1088, 'YAUYOS', 106),
(1089, 'JUNIN', 107),
(1090, 'CARHUAMAYO', 107),
(1091, 'ONDORES', 107),
(1092, 'ULCUMAYO', 107),
(1093, 'SATIPO', 108),
(1094, 'COVIRIALI', 108),
(1095, 'LLAYLLA', 108),
(1096, 'MAZAMARI', 108),
(1097, 'PAMPA HERMOSA', 108),
(1098, 'PANGOA', 108),
(1099, 'RIO NEGRO', 108),
(1100, 'RIO TAMBO', 108),
(1101, 'TARMA', 109),
(1102, 'ACOBAMBA', 109),
(1103, 'HUARICOLCA', 109),
(1104, 'HUASAHUASI', 109),
(1105, 'LA UNION', 109),
(1106, 'PALCA', 109),
(1107, 'PALCAMAYO', 109),
(1108, 'SAN PEDRO DE CAJAS', 109),
(1109, 'TAPO', 109),
(1110, 'LA OROYA', 110),
(1111, 'CHACAPALPA', 110),
(1112, 'HUAY-HUAY', 110),
(1113, 'MARCAPOMACOCHA', 110),
(1114, 'MOROCOCHA', 110),
(1115, 'PACCHA', 110),
(1116, 'SANTA BARBARA DE CARHUACAYAN', 110),
(1117, 'SANTA ROSA DE SACCO', 110),
(1118, 'SUITUCANCHA', 110),
(1119, 'YAULI', 110),
(1120, 'CHUPACA', 111),
(1121, 'AHUAC', 111),
(1122, 'CHONGOS BAJO', 111),
(1123, 'HUACHAC', 111),
(1124, 'HUAMANCACA CHICO', 111),
(1125, 'SAN JUAN DE ISCOS', 111),
(1126, 'SAN JUAN DE JARPA', 111),
(1127, 'TRES DE DICIEMBRE', 111),
(1128, 'YANACANCHA', 111),
(1129, 'TRUJILLO', 112),
(1130, 'EL PORVENIR', 112),
(1131, 'FLORENCIA DE MORA', 112),
(1132, 'HUANCHACO', 112),
(1133, 'LA ESPERANZA', 112),
(1134, 'LAREDO', 112),
(1135, 'MOCHE', 112),
(1136, 'POROTO', 112),
(1137, 'SALAVERRY', 112),
(1138, 'SIMBAL', 112),
(1139, 'VICTOR LARCO HERRERA', 112),
(1140, 'ASCOPE', 113),
(1141, 'CHICAMA', 113),
(1142, 'CHOCOPE', 113),
(1143, 'MAGDALENA DE CAO', 113),
(1144, 'PAIJAN', 113),
(1145, 'RAZURI', 113),
(1146, 'SANTIAGO DE CAO', 113),
(1147, 'CASA GRANDE', 113),
(1148, 'BOLIVAR', 114),
(1149, 'BAMBAMARCA', 114),
(1150, 'CONDORMARCA', 114),
(1151, 'LONGOTEA', 114),
(1152, 'UCHUMARCA', 114),
(1153, 'UCUNCHA', 114),
(1154, 'CHEPEN', 115),
(1155, 'PACANGA', 115),
(1156, 'PUEBLO NUEVO', 115),
(1157, 'JULCAN', 116),
(1158, 'CALAMARCA', 116),
(1159, 'CARABAMBA', 116),
(1160, 'HUASO', 116),
(1161, 'OTUZCO', 117),
(1162, 'AGALLPAMPA', 117),
(1163, 'CHARAT', 117),
(1164, 'HUARANCHAL', 117),
(1165, 'LA CUESTA', 117),
(1166, 'MACHE', 117),
(1167, 'PARANDAY', 117),
(1168, 'SALPO', 117),
(1169, 'SINSICAP', 117),
(1170, 'USQUIL', 117),
(1171, 'SAN PEDRO DE LLOC', 118),
(1172, 'GUADALUPE', 118),
(1173, 'JEQUETEPEQUE', 118),
(1174, 'PACASMAYO', 118),
(1175, 'SAN JOSE', 118),
(1176, 'TAYABAMBA', 119),
(1177, 'BULDIBUYO', 119),
(1178, 'CHILLIA', 119),
(1179, 'HUANCASPATA', 119),
(1180, 'HUAYLILLAS', 119),
(1181, 'HUAYO', 119),
(1182, 'ONGON', 119),
(1183, 'PARCOY', 119),
(1184, 'PATAZ', 119),
(1185, 'PIAS', 119),
(1186, 'SANTIAGO DE CHALLAS', 119),
(1187, 'TAURIJA', 119),
(1188, 'URPAY', 119),
(1189, 'HUAMACHUCO', 120),
(1190, 'CHUGAY', 120),
(1191, 'COCHORCO', 120),
(1192, 'CURGOS', 120),
(1193, 'MARCABAL', 120),
(1194, 'SANAGORAN', 120),
(1195, 'SARIN', 120),
(1196, 'SARTIMBAMBA', 120),
(1197, 'SANTIAGO DE CHUCO', 121),
(1198, 'ANGASMARCA', 121),
(1199, 'CACHICADAN', 121),
(1200, 'MOLLEBAMBA', 121),
(1201, 'MOLLEPATA', 121),
(1202, 'QUIRUVILCA', 121),
(1203, 'SANTA CRUZ DE CHUCA', 121),
(1204, 'SITABAMBA', 121),
(1205, 'GRAN CHIMU', 122),
(1206, 'CASCAS', 122),
(1207, 'LUCMA', 122),
(1208, 'MARMOT', 122),
(1209, 'SAYAPULLO', 122),
(1210, 'VIRU', 123),
(1211, 'CHAO', 123),
(1212, 'GUADALUPITO', 123),
(1213, 'CHICLAYO', 124),
(1214, 'CHONGOYAPE', 124),
(1215, 'ETEN', 124),
(1216, 'ETEN PUERTO', 124),
(1217, 'JOSE LEONARDO ORTIZ', 124),
(1218, 'LA VICTORIA', 124),
(1219, 'LAGUNAS', 124),
(1220, 'MONSEFU', 124),
(1221, 'NUEVA ARICA', 124),
(1222, 'OYOTUN', 124),
(1223, 'PICSI', 124),
(1224, 'PIMENTEL', 124),
(1225, 'REQUE', 124),
(1226, 'SANTA ROSA', 124),
(1227, 'SA&Ntilde;A', 124),
(1228, 'CAYALTI', 124),
(1229, 'PATAPO', 124),
(1230, 'POMALCA', 124),
(1231, 'PUCALA', 124),
(1232, 'TUMAN', 124),
(1233, 'FERRE&Ntilde;AFE', 125),
(1234, 'CA&Ntilde;ARIS', 125),
(1235, 'INCAHUASI', 125),
(1236, 'MANUEL ANTONIO MESONES MURO', 125),
(1237, 'PITIPO', 125),
(1238, 'PUEBLO NUEVO', 125),
(1239, 'LAMBAYEQUE', 126),
(1240, 'CHOCHOPE', 126),
(1241, 'ILLIMO', 126),
(1242, 'JAYANCA', 126),
(1243, 'MOCHUMI', 126),
(1244, 'MORROPE', 126),
(1245, 'MOTUPE', 126),
(1246, 'OLMOS', 126),
(1247, 'PACORA', 126),
(1248, 'SALAS', 126),
(1249, 'SAN JOSE', 126),
(1250, 'TUCUME', 126),
(1251, 'LIMA', 127),
(1252, 'ANCON', 127),
(1253, 'ATE', 127),
(1254, 'BARRANCO', 127),
(1255, 'BRE&Ntilde;A', 127),
(1256, 'CARABAYLLO', 127),
(1257, 'CHACLACAYO', 127),
(1258, 'CHORRILLOS', 127),
(1259, 'CIENEGUILLA', 127),
(1260, 'COMAS', 127),
(1261, 'EL AGUSTINO', 127),
(1262, 'INDEPENDENCIA', 127),
(1263, 'JESUS MARIA', 127),
(1264, 'LA MOLINA', 127),
(1265, 'LA VICTORIA', 127),
(1266, 'LINCE', 127),
(1267, 'LOS OLIVOS', 127),
(1268, 'LURIGANCHO', 127),
(1269, 'LURIN', 127),
(1270, 'MAGDALENA DEL MAR', 127),
(1271, 'MAGDALENA VIEJA', 127),
(1272, 'MIRAFLORES', 127),
(1273, 'PACHACAMAC', 127),
(1274, 'PUCUSANA', 127),
(1275, 'PUENTE PIEDRA', 127),
(1276, 'PUNTA HERMOSA', 127),
(1277, 'PUNTA NEGRA', 127),
(1278, 'RIMAC', 127),
(1279, 'SAN BARTOLO', 127),
(1280, 'SAN BORJA', 127),
(1281, 'SAN ISIDRO', 127),
(1282, 'SAN JUAN DE LURIGANCHO', 127),
(1283, 'SAN JUAN DE MIRAFLORES', 127),
(1284, 'SAN LUIS', 127),
(1285, 'SAN MARTIN DE PORRES', 127),
(1286, 'SAN MIGUEL', 127),
(1287, 'SANTA ANITA', 127),
(1288, 'SANTA MARIA DEL MAR', 127),
(1289, 'SANTA ROSA', 127),
(1290, 'SANTIAGO DE SURCO', 127),
(1291, 'SURQUILLO', 127),
(1292, 'VILLA EL SALVADOR', 127),
(1293, 'VILLA MARIA DEL TRIUNFO', 127),
(1294, 'BARRANCA', 128),
(1295, 'PARAMONGA', 128),
(1296, 'PATIVILCA', 128),
(1297, 'SUPE', 128),
(1298, 'SUPE PUERTO', 128),
(1299, 'CAJATAMBO', 129),
(1300, 'COPA', 129),
(1301, 'GORGOR', 129),
(1302, 'HUANCAPON', 129),
(1303, 'MANAS', 129),
(1304, 'CANTA', 130),
(1305, 'ARAHUAY', 130),
(1306, 'HUAMANTANGA', 130),
(1307, 'HUAROS', 130),
(1308, 'LACHAQUI', 130),
(1309, 'SAN BUENAVENTURA', 130),
(1310, 'SANTA ROSA DE QUIVES', 130),
(1311, 'SAN VICENTE DE CA&Ntilde;ETE', 131),
(1312, 'ASIA', 131),
(1313, 'CALANGO', 131),
(1314, 'CERRO AZUL', 131),
(1315, 'CHILCA', 131),
(1316, 'COAYLLO', 131),
(1317, 'IMPERIAL', 131),
(1318, 'LUNAHUANA', 131),
(1319, 'MALA', 131),
(1320, 'NUEVO IMPERIAL', 131),
(1321, 'PACARAN', 131),
(1322, 'QUILMANA', 131),
(1323, 'SAN ANTONIO', 131),
(1324, 'SAN LUIS', 131),
(1325, 'SANTA CRUZ DE FLORES', 131),
(1326, 'ZU&Ntilde;IGA', 131),
(1327, 'HUARAL', 132),
(1328, 'ATAVILLOS ALTO', 132),
(1329, 'ATAVILLOS BAJO', 132),
(1330, 'AUCALLAMA', 132),
(1331, 'CHANCAY', 132),
(1332, 'IHUARI', 132),
(1333, 'LAMPIAN', 132),
(1334, 'PACARAOS', 132),
(1335, 'SAN MIGUEL DE ACOS', 132),
(1336, 'SANTA CRUZ DE ANDAMARCA', 132),
(1337, 'SUMBILCA', 132),
(1338, 'VEINTISIETE DE NOVIEMBRE', 132),
(1339, 'MATUCANA', 133),
(1340, 'ANTIOQUIA', 133),
(1341, 'CALLAHUANCA', 133),
(1342, 'CARAMPOMA', 133),
(1343, 'CHICLA', 133),
(1344, 'CUENCA', 133),
(1345, 'HUACHUPAMPA', 133),
(1346, 'HUANZA', 133),
(1347, 'HUAROCHIRI', 133),
(1348, 'LAHUAYTAMBO', 133),
(1349, 'LANGA', 133),
(1350, 'LARAOS', 133),
(1351, 'MARIATANA', 133),
(1352, 'RICARDO PALMA', 133),
(1353, 'SAN ANDRES DE TUPICOCHA', 133),
(1354, 'SAN ANTONIO', 133),
(1355, 'SAN BARTOLOME', 133),
(1356, 'SAN DAMIAN', 133),
(1357, 'SAN JUAN DE IRIS', 133),
(1358, 'SAN JUAN DE TANTARANCHE', 133),
(1359, 'SAN LORENZO DE QUINTI', 133),
(1360, 'SAN MATEO', 133),
(1361, 'SAN MATEO DE OTAO', 133),
(1362, 'SAN PEDRO DE CASTA', 133),
(1363, 'SAN PEDRO DE HUANCAYRE', 133),
(1364, 'SANGALLAYA', 133),
(1365, 'SANTA CRUZ DE COCACHACRA', 133),
(1366, 'SANTA EULALIA', 133),
(1367, 'SANTIAGO DE ANCHUCAYA', 133),
(1368, 'SANTIAGO DE TUNA', 133),
(1369, 'SANTO DOMINGO DE LOS OLLEROS', 133),
(1370, 'SURCO', 133),
(1371, 'HUACHO', 134),
(1372, 'AMBAR', 134),
(1373, 'CALETA DE CARQUIN', 134),
(1374, 'CHECRAS', 134),
(1375, 'HUALMAY', 134),
(1376, 'HUAURA', 134),
(1377, 'LEONCIO PRADO', 134),
(1378, 'PACCHO', 134),
(1379, 'SANTA LEONOR', 134),
(1380, 'SANTA MARIA', 134),
(1381, 'SAYAN', 134),
(1382, 'VEGUETA', 134),
(1383, 'OYON', 135),
(1384, 'ANDAJES', 135),
(1385, 'CAUJUL', 135),
(1386, 'COCHAMARCA', 135),
(1387, 'NAVAN', 135),
(1388, 'PACHANGARA', 135),
(1389, 'YAUYOS', 136),
(1390, 'ALIS', 136),
(1391, 'AYAUCA', 136),
(1392, 'AYAVIRI', 136),
(1393, 'AZANGARO', 136),
(1394, 'CACRA', 136),
(1395, 'CARANIA', 136),
(1396, 'CATAHUASI', 136),
(1397, 'CHOCOS', 136),
(1398, 'COCHAS', 136),
(1399, 'COLONIA', 136),
(1400, 'HONGOS', 136),
(1401, 'HUAMPARA', 136),
(1402, 'HUANCAYA', 136),
(1403, 'HUANGASCAR', 136),
(1404, 'HUANTAN', 136),
(1405, 'HUA&Ntilde;EC', 136),
(1406, 'LARAOS', 136),
(1407, 'LINCHA', 136),
(1408, 'MADEAN', 136),
(1409, 'MIRAFLORES', 136),
(1410, 'OMAS', 136),
(1411, 'PUTINZA', 136),
(1412, 'QUINCHES', 136),
(1413, 'QUINOCAY', 136),
(1414, 'SAN JOAQUIN', 136),
(1415, 'SAN PEDRO DE PILAS', 136),
(1416, 'TANTA', 136),
(1417, 'TAURIPAMPA', 136),
(1418, 'TOMAS', 136),
(1419, 'TUPE', 136),
(1420, 'VI&Ntilde;AC', 136),
(1421, 'VITIS', 136),
(1422, 'IQUITOS', 137),
(1423, 'ALTO NANAY', 137),
(1424, 'FERNANDO LORES', 137),
(1425, 'INDIANA', 137),
(1426, 'LAS AMAZONAS', 137),
(1427, 'MAZAN', 137),
(1428, 'NAPO', 137),
(1429, 'PUNCHANA', 137),
(1430, 'PUTUMAYO', 137),
(1431, 'TORRES CAUSANA', 137),
(1432, 'BELEN', 137),
(1433, 'SAN JUAN BAUTISTA', 137),
(1434, 'YURIMAGUAS', 138),
(1435, 'BALSAPUERTO', 138),
(1436, 'BARRANCA', 138),
(1437, 'CAHUAPANAS', 138),
(1438, 'JEBEROS', 138),
(1439, 'LAGUNAS', 138),
(1440, 'MANSERICHE', 138),
(1441, 'MORONA', 138),
(1442, 'PASTAZA', 138),
(1443, 'SANTA CRUZ', 138),
(1444, 'TENIENTE CESAR LOPEZ ROJAS', 138),
(1445, 'NAUTA', 139),
(1446, 'PARINARI', 139),
(1447, 'TIGRE', 139),
(1448, 'TROMPETEROS', 139),
(1449, 'URARINAS', 139),
(1450, 'RAMON CASTILLA', 140),
(1451, 'PEBAS', 140),
(1452, 'YAVARI', 140),
(1453, 'SAN PABLO', 140),
(1454, 'REQUENA', 141),
(1455, 'ALTO TAPICHE', 141),
(1456, 'CAPELO', 141),
(1457, 'EMILIO SAN MARTIN', 141),
(1458, 'MAQUIA', 141),
(1459, 'PUINAHUA', 141),
(1460, 'SAQUENA', 141),
(1461, 'SOPLIN', 141),
(1462, 'TAPICHE', 141),
(1463, 'JENARO HERRERA', 141),
(1464, 'YAQUERANA', 141),
(1465, 'CONTAMANA', 142),
(1466, 'INAHUAYA', 142),
(1467, 'PADRE MARQUEZ', 142),
(1468, 'PAMPA HERMOSA', 142),
(1469, 'SARAYACU', 142),
(1470, 'VARGAS GUERRA', 142),
(1471, 'TAMBOPATA', 143),
(1472, 'INAMBARI', 143),
(1473, 'LAS PIEDRAS', 143),
(1474, 'LABERINTO', 143),
(1475, 'MANU', 144),
(1476, 'FITZCARRALD', 144),
(1477, 'MADRE DE DIOS', 144),
(1478, 'HUEPETUHE', 144),
(1479, 'I&Ntilde;APARI', 145),
(1480, 'IBERIA', 145),
(1481, 'TAHUAMANU', 145),
(1482, 'MOQUEGUA', 146),
(1483, 'CARUMAS', 146),
(1484, 'CUCHUMBAYA', 146),
(1485, 'SAMEGUA', 146),
(1486, 'SAN CRISTOBAL', 146),
(1487, 'TORATA', 146),
(1488, 'OMATE', 147),
(1489, 'CHOJATA', 147),
(1490, 'COALAQUE', 147),
(1491, 'ICHU&Ntilde;A', 147),
(1492, 'LA CAPILLA', 147),
(1493, 'LLOQUE', 147),
(1494, 'MATALAQUE', 147),
(1495, 'PUQUINA', 147),
(1496, 'QUINISTAQUILLAS', 147),
(1497, 'UBINAS', 147),
(1498, 'YUNGA', 147),
(1499, 'ILO', 148),
(1500, 'EL ALGARROBAL', 148),
(1501, 'PACOCHA', 148),
(1502, 'CHAUPIMARCA', 149),
(1503, 'HUACHON', 149),
(1504, 'HUARIACA', 149),
(1505, 'HUAYLLAY', 149),
(1506, 'NINACACA', 149),
(1507, 'PALLANCHACRA', 149),
(1508, 'PAUCARTAMBO', 149),
(1509, 'SAN FCO.DE ASIS DE YARUSYACAN', 149),
(1510, 'SIMON BOLIVAR', 149),
(1511, 'TICLACAYAN', 149),
(1512, 'TINYAHUARCO', 149),
(1513, 'VICCO', 149),
(1514, 'YANACANCHA', 149),
(1515, 'YANAHUANCA', 150),
(1516, 'CHACAYAN', 150),
(1517, 'GOYLLARISQUIZGA', 150),
(1518, 'PAUCAR', 150),
(1519, 'SAN PEDRO DE PILLAO', 150),
(1520, 'SANTA ANA DE TUSI', 150),
(1521, 'TAPUC', 150),
(1522, 'VILCABAMBA', 150),
(1523, 'OXAPAMPA', 151),
(1524, 'CHONTABAMBA', 151),
(1525, 'HUANCABAMBA', 151),
(1526, 'PALCAZU', 151),
(1527, 'POZUZO', 151),
(1528, 'PUERTO BERMUDEZ', 151),
(1529, 'VILLA RICA', 151),
(1530, 'PIURA', 152),
(1531, 'CASTILLA', 152),
(1532, 'CATACAOS', 152),
(1533, 'CURA MORI', 152),
(1534, 'EL TALLAN', 152),
(1535, 'LA ARENA', 152),
(1536, 'LA UNION', 152),
(1537, 'LAS LOMAS', 152),
(1538, 'TAMBO GRANDE', 152),
(1539, 'AYABACA', 153),
(1540, 'FRIAS', 153),
(1541, 'JILILI', 153),
(1542, 'LAGUNAS', 153),
(1543, 'MONTERO', 153),
(1544, 'PACAIPAMPA', 153),
(1545, 'PAIMAS', 153),
(1546, 'SAPILLICA', 153),
(1547, 'SICCHEZ', 153),
(1548, 'SUYO', 153),
(1549, 'HUANCABAMBA', 154),
(1550, 'CANCHAQUE', 154),
(1551, 'EL CARMEN DE LA FRONTERA', 154),
(1552, 'HUARMACA', 154),
(1553, 'LALAQUIZ', 154),
(1554, 'SAN MIGUEL DE EL FAIQUE', 154),
(1555, 'SONDOR', 154),
(1556, 'SONDORILLO', 154),
(1557, 'CHULUCANAS', 155),
(1558, 'BUENOS AIRES', 155),
(1559, 'CHALACO', 155),
(1560, 'LA MATANZA', 155),
(1561, 'MORROPON', 155),
(1562, 'SALITRAL', 155),
(1563, 'SAN JUAN DE BIGOTE', 155),
(1564, 'SANTA CATALINA DE MOSSA', 155),
(1565, 'SANTO DOMINGO', 155),
(1566, 'YAMANGO', 155),
(1567, 'PAITA', 156),
(1568, 'AMOTAPE', 156),
(1569, 'ARENAL', 156),
(1570, 'COLAN', 156),
(1571, 'LA HUACA', 156),
(1572, 'TAMARINDO', 156),
(1573, 'VICHAYAL', 156),
(1574, 'SULLANA', 157),
(1575, 'BELLAVISTA', 157),
(1576, 'IGNACIO ESCUDERO', 157),
(1577, 'LANCONES', 157),
(1578, 'MARCAVELICA', 157),
(1579, 'MIGUEL CHECA', 157),
(1580, 'QUERECOTILLO', 157),
(1581, 'SALITRAL', 157),
(1582, 'PARI&Ntilde;AS', 158),
(1583, 'EL ALTO', 158),
(1584, 'LA BREA', 158),
(1585, 'LOBITOS', 158),
(1586, 'LOS ORGANOS', 158),
(1587, 'MANCORA', 158),
(1588, 'SECHURA', 159),
(1589, 'BELLAVISTA DE LA UNION', 159),
(1590, 'BERNAL', 159),
(1591, 'CRISTO NOS VALGA', 159),
(1592, 'VICE', 159),
(1593, 'RINCONADA LLICUAR', 159),
(1594, 'PUNO', 160),
(1595, 'ACORA', 160),
(1596, 'AMANTANI', 160),
(1597, 'ATUNCOLLA', 160),
(1598, 'CAPACHICA', 160),
(1599, 'CHUCUITO', 160),
(1600, 'COATA', 160),
(1601, 'HUATA', 160),
(1602, 'MA&Ntilde;AZO', 160),
(1603, 'PAUCARCOLLA', 160),
(1604, 'PICHACANI', 160),
(1605, 'PLATERIA', 160),
(1606, 'SAN ANTONIO', 160),
(1607, 'TIQUILLACA', 160),
(1608, 'VILQUE', 160),
(1609, 'AZANGARO', 161),
(1610, 'ACHAYA', 161),
(1611, 'ARAPA', 161),
(1612, 'ASILLO', 161),
(1613, 'CAMINACA', 161),
(1614, 'CHUPA', 161),
(1615, 'JOSE DOMINGO CHOQUEHUANCA', 161),
(1616, 'MU&Ntilde;ANI', 161),
(1617, 'POTONI', 161),
(1618, 'SAMAN', 161),
(1619, 'SAN ANTON', 161),
(1620, 'SAN JOSE', 161),
(1621, 'SAN JUAN DE SALINAS', 161),
(1622, 'SANTIAGO DE PUPUJA', 161),
(1623, 'TIRAPATA', 161),
(1624, 'MACUSANI', 162),
(1625, 'AJOYANI', 162),
(1626, 'AYAPATA', 162),
(1627, 'COASA', 162),
(1628, 'CORANI', 162),
(1629, 'CRUCERO', 162),
(1630, 'ITUATA', 162),
(1631, 'OLLACHEA', 162),
(1632, 'SAN GABAN', 162),
(1633, 'USICAYOS', 162),
(1634, 'JULI', 163),
(1635, 'DESAGUADERO', 163),
(1636, 'HUACULLANI', 163),
(1637, 'KELLUYO', 163),
(1638, 'PISACOMA', 163),
(1639, 'POMATA', 163),
(1640, 'ZEPITA', 163),
(1641, 'ILAVE', 164),
(1642, 'CAPAZO', 164),
(1643, 'PILCUYO', 164),
(1644, 'SANTA ROSA', 164),
(1645, 'CONDURIRI', 164),
(1646, 'HUANCANE', 165),
(1647, 'COJATA', 165),
(1648, 'HUATASANI', 165),
(1649, 'INCHUPALLA', 165),
(1650, 'PUSI', 165),
(1651, 'ROSASPATA', 165),
(1652, 'TARACO', 165),
(1653, 'VILQUE CHICO', 165),
(1654, 'LAMPA', 166),
(1655, 'CABANILLA', 166),
(1656, 'CALAPUJA', 166),
(1657, 'NICASIO', 166),
(1658, 'OCUVIRI', 166),
(1659, 'PALCA', 166),
(1660, 'PARATIA', 166),
(1661, 'PUCARA', 166),
(1662, 'SANTA LUCIA', 166),
(1663, 'VILAVILA', 166),
(1664, 'AYAVIRI', 167),
(1665, 'ANTAUTA', 167),
(1666, 'CUPI', 167),
(1667, 'LLALLI', 167),
(1668, 'MACARI', 167),
(1669, 'NU&Ntilde;OA', 167),
(1670, 'ORURILLO', 167),
(1671, 'SANTA ROSA', 167),
(1672, 'UMACHIRI', 167),
(1673, 'MOHO', 168),
(1674, 'CONIMA', 168),
(1675, 'HUAYRAPATA', 168),
(1676, 'TILALI', 168),
(1677, 'PUTINA', 169),
(1678, 'ANANEA', 169),
(1679, 'PEDRO VILCA APAZA', 169),
(1680, 'QUILCAPUNCU', 169),
(1681, 'SINA', 169),
(1682, 'JULIACA', 170),
(1683, 'CABANA', 170),
(1684, 'CABANILLAS', 170),
(1685, 'CARACOTO', 170),
(1686, 'SANDIA', 171),
(1687, 'CUYOCUYO', 171),
(1688, 'LIMBANI', 171),
(1689, 'PATAMBUCO', 171),
(1690, 'PHARA', 171),
(1691, 'QUIACA', 171),
(1692, 'SAN JUAN DEL ORO', 171),
(1693, 'YANAHUAYA', 171),
(1694, 'ALTO INAMBARI', 171),
(1695, 'YUNGUYO', 172),
(1696, 'ANAPIA', 172),
(1697, 'COPANI', 172),
(1698, 'CUTURAPI', 172),
(1699, 'OLLARAYA', 172),
(1700, 'TINICACHI', 172),
(1701, 'UNICACHI', 172),
(1702, 'MOYOBAMBA', 173),
(1703, 'CALZADA', 173),
(1704, 'HABANA', 173),
(1705, 'JEPELACIO', 173),
(1706, 'SORITOR', 173),
(1707, 'YANTALO', 173),
(1708, 'BELLAVISTA', 174),
(1709, 'ALTO BIAVO', 174),
(1710, 'BAJO BIAVO', 174),
(1711, 'HUALLAGA', 174),
(1712, 'SAN PABLO', 174),
(1713, 'SAN RAFAEL', 174),
(1714, 'SAN JOSE DE SISA', 175),
(1715, 'AGUA BLANCA', 175),
(1716, 'SAN MARTIN', 175),
(1717, 'SANTA ROSA', 175),
(1718, 'SHATOJA', 175),
(1719, 'SAPOSOA', 176),
(1720, 'ALTO SAPOSOA', 176),
(1721, 'EL ESLABON', 176),
(1722, 'PISCOYACU', 176),
(1723, 'SACANCHE', 176),
(1724, 'TINGO DE SAPOSOA', 176),
(1725, 'LAMAS', 177),
(1726, 'ALONSO DE ALVARADO', 177),
(1727, 'BARRANQUITA', 177),
(1728, 'CAYNARACHI', 177),
(1729, 'CU&Ntilde;UMBUQUI', 177),
(1730, 'PINTO RECODO', 177),
(1731, 'RUMISAPA', 177),
(1732, 'SAN ROQUE DE CUMBAZA', 177),
(1733, 'SHANAO', 177),
(1734, 'TABALOSOS', 177),
(1735, 'ZAPATERO', 177),
(1736, 'JUANJUI', 178),
(1737, 'CAMPANILLA', 178),
(1738, 'HUICUNGO', 178),
(1739, 'PACHIZA', 178),
(1740, 'PAJARILLO', 178),
(1741, 'PICOTA', 179),
(1742, 'BUENOS AIRES', 179),
(1743, 'CASPISAPA', 179),
(1744, 'PILLUANA', 179),
(1745, 'PUCACACA', 179),
(1746, 'SAN CRISTOBAL', 179),
(1747, 'SAN HILARION', 179),
(1748, 'SHAMBOYACU', 179),
(1749, 'TINGO DE PONASA', 179),
(1750, 'TRES UNIDOS', 179),
(1751, 'RIOJA', 180),
(1752, 'AWAJUN', 180),
(1753, 'ELIAS SOPLIN VARGAS', 180),
(1754, 'NUEVA CAJAMARCA', 180),
(1755, 'PARDO MIGUEL', 180),
(1756, 'POSIC', 180),
(1757, 'SAN FERNANDO', 180),
(1758, 'YORONGOS', 180),
(1759, 'YURACYACU', 180),
(1760, 'TARAPOTO', 181),
(1761, 'ALBERTO LEVEAU', 181),
(1762, 'CACATACHI', 181),
(1763, 'CHAZUTA', 181),
(1764, 'CHIPURANA', 181),
(1765, 'EL PORVENIR', 181),
(1766, 'HUIMBAYOC', 181),
(1767, 'JUAN GUERRA', 181),
(1768, 'LA BANDA DE SHILCAYO', 181),
(1769, 'MORALES', 181),
(1770, 'PAPAPLAYA', 181),
(1771, 'SAN ANTONIO', 181),
(1772, 'SAUCE', 181),
(1773, 'SHAPAJA', 181),
(1774, 'TOCACHE', 182),
(1775, 'NUEVO PROGRESO', 182),
(1776, 'POLVORA', 182),
(1777, 'SHUNTE', 182),
(1778, 'UCHIZA', 182),
(1779, 'TACNA', 183),
(1780, 'ALTO DE LA ALIANZA', 183),
(1781, 'CALANA', 183),
(1782, 'CIUDAD NUEVA', 183),
(1783, 'INCLAN', 183),
(1784, 'PACHIA', 183),
(1785, 'PALCA', 183),
(1786, 'POCOLLAY', 183),
(1787, 'SAMA', 183),
(1788, 'CORONEL GREGORIO ALBARRACIN LANCHIPA', 183),
(1789, 'CANDARAVE', 184),
(1790, 'CAIRANI', 184),
(1791, 'CAMILACA', 184),
(1792, 'CURIBAYA', 184),
(1793, 'HUANUARA', 184),
(1794, 'QUILAHUANI', 184),
(1795, 'LOCUMBA', 185),
(1796, 'ILABAYA', 185),
(1797, 'ITE', 185),
(1798, 'TARATA', 186),
(1799, 'CHUCATAMANI', 186),
(1800, 'ESTIQUE', 186),
(1801, 'ESTIQUE-PAMPA', 186),
(1802, 'SITAJARA', 186),
(1803, 'SUSAPAYA', 186),
(1804, 'TARUCACHI', 186),
(1805, 'TICACO', 186),
(1806, 'TUMBES', 187),
(1807, 'CORRALES', 187),
(1808, 'LA CRUZ', 187),
(1809, 'PAMPAS DE HOSPITAL', 187),
(1810, 'SAN JACINTO', 187),
(1811, 'SAN JUAN DE LA VIRGEN', 187),
(1812, 'ZORRITOS', 188),
(1813, 'CASITAS', 188),
(1814, 'ZARUMILLA', 189),
(1815, 'AGUAS VERDES', 189),
(1816, 'MATAPALO', 189),
(1817, 'PAPAYAL', 189),
(1818, 'CALLERIA', 190),
(1819, 'CAMPOVERDE', 190),
(1820, 'IPARIA', 190),
(1821, 'MASISEA', 190),
(1822, 'YARINACOCHA', 190),
(1823, 'NUEVA REQUENA', 190),
(1824, 'RAYMONDI', 191),
(1825, 'SEPAHUA', 191),
(1826, 'TAHUANIA', 191),
(1827, 'YURUA', 191),
(1828, 'PADRE ABAD', 192),
(1829, 'IRAZOLA', 192),
(1830, 'CURIMANA', 192),
(1831, 'PURUS', 193),
(1832, 'BOLÍVAR', 194),
(1833, 'CALQUIS', 194),
(1834, 'CATILLUC', 194),
(1835, 'EL PRADO', 194),
(1836, 'LA FLORIDA', 194),
(1837, 'LLAPA', 194),
(1838, 'NANCHOC', 194),
(1839, 'NIEPOS', 194),
(1840, 'SAN GREGORIO', 194),
(1841, 'SAN MIGUEL', 194),
(1842, 'SAN SILVESTRE DE CONCHÁN', 194),
(1843, 'TONGOD', 194),
(1844, 'UNIÓN AGUA BLANCA', 194);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubprovincia`
--

CREATE TABLE `ubprovincia` (
  `idProv` int(5) NOT NULL DEFAULT 0,
  `provincia` varchar(50) DEFAULT NULL,
  `idDepa` int(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ubprovincia`
--

INSERT INTO `ubprovincia` (`idProv`, `provincia`, `idDepa`) VALUES
(1, 'CHACHAPOYAS ', 1),
(2, 'BAGUA', 1),
(3, 'BONGARA', 1),
(4, 'CONDORCANQUI', 1),
(5, 'LUYA', 1),
(6, 'RODRIGUEZ DE MENDOZA', 1),
(7, 'UTCUBAMBA', 1),
(8, 'HUARAZ', 2),
(9, 'AIJA', 2),
(10, 'ANTONIO RAYMONDI', 2),
(11, 'ASUNCION', 2),
(12, 'BOLOGNESI', 2),
(13, 'CARHUAZ', 2),
(14, 'CARLOS FERMIN FITZCARRALD', 2),
(15, 'CASMA', 2),
(16, 'CORONGO', 2),
(17, 'HUARI', 2),
(18, 'HUARMEY', 2),
(19, 'HUAYLAS', 2),
(20, 'MARISCAL LUZURIAGA', 2),
(21, 'OCROS', 2),
(22, 'PALLASCA', 2),
(23, 'POMABAMBA', 2),
(24, 'RECUAY', 2),
(25, 'SANTA', 2),
(26, 'SIHUAS', 2),
(27, 'YUNGAY', 2),
(28, 'ABANCAY', 3),
(29, 'ANDAHUAYLAS', 3),
(30, 'ANTABAMBA', 3),
(31, 'AYMARAES', 3),
(32, 'COTABAMBAS', 3),
(33, 'CHINCHEROS', 3),
(34, 'GRAU', 3),
(35, 'AREQUIPA', 4),
(36, 'CAMANA', 4),
(37, 'CARAVELI', 4),
(38, 'CASTILLA', 4),
(39, 'CAYLLOMA', 4),
(40, 'CONDESUYOS', 4),
(41, 'ISLAY', 4),
(42, 'LA UNION', 4),
(43, 'HUAMANGA', 5),
(44, 'CANGALLO', 5),
(45, 'HUANCA SANCOS', 5),
(46, 'HUANTA', 5),
(47, 'LA MAR', 5),
(48, 'LUCANAS', 5),
(49, 'PARINACOCHAS', 5),
(50, 'PAUCAR DEL SARA SARA', 5),
(51, 'SUCRE', 5),
(52, 'VICTOR FAJARDO', 5),
(53, 'VILCAS HUAMAN', 5),
(54, 'CAJAMARCA', 6),
(55, 'CAJABAMBA', 6),
(56, 'CELENDIN', 6),
(57, 'CHOTA ', 6),
(58, 'CONTUMAZA', 6),
(59, 'CUTERVO', 6),
(60, 'HUALGAYOC', 6),
(61, 'JAEN', 6),
(62, 'SAN IGNACIO', 6),
(63, 'SAN MARCOS', 6),
(64, 'SAN PABLO', 6),
(65, 'SANTA CRUZ', 6),
(66, 'CALLAO', 7),
(67, 'CUSCO', 8),
(68, 'ACOMAYO', 8),
(69, 'ANTA', 8),
(70, 'CALCA', 8),
(71, 'CANAS', 8),
(72, 'CANCHIS', 8),
(73, 'CHUMBIVILCAS', 8),
(74, 'ESPINAR', 8),
(75, 'LA CONVENCION', 8),
(76, 'PARURO', 8),
(77, 'PAUCARTAMBO', 8),
(78, 'QUISPICANCHI', 8),
(79, 'URUBAMBA', 8),
(80, 'HUANCAVELICA', 9),
(81, 'ACOBAMBA', 9),
(82, 'ANGARAES', 9),
(83, 'CASTROVIRREYNA', 9),
(84, 'CHURCAMPA', 9),
(85, 'HUAYTARA', 9),
(86, 'TAYACAJA', 9),
(87, 'HUANUCO', 10),
(88, 'AMBO', 10),
(89, 'DOS DE MAYO', 10),
(90, 'HUACAYBAMBA', 10),
(91, 'HUAMALIES', 10),
(92, 'LEONCIO PRADO', 10),
(93, 'MARA&Ntilde;ON', 10),
(94, 'PACHITEA', 10),
(95, 'PUERTO INCA', 10),
(96, 'LAURICOCHA', 10),
(97, 'YAROWILCA', 10),
(98, 'ICA', 11),
(99, 'CHINCHA', 11),
(100, 'NAZCA', 11),
(101, 'PALPA', 11),
(102, 'PISCO', 11),
(103, 'HUANCAYO', 12),
(104, 'CONCEPCION', 12),
(105, 'CHANCHAMAYO', 12),
(106, 'JAUJA', 12),
(107, 'JUNIN', 12),
(108, 'SATIPO', 12),
(109, 'TARMA', 12),
(110, 'YAULI', 12),
(111, 'CHUPACA', 12),
(112, 'TRUJILLO', 13),
(113, 'ASCOPE', 13),
(114, 'BOLIVAR', 13),
(115, 'CHEPEN', 13),
(116, 'JULCAN', 13),
(117, 'OTUZCO', 13),
(118, 'PACASMAYO', 13),
(119, 'PATAZ', 13),
(120, 'SANCHEZ CARRION', 13),
(121, 'SANTIAGO DE CHUCO', 13),
(122, 'GRAN CHIMU', 13),
(123, 'VIRU', 13),
(124, 'CHICLAYO', 14),
(125, 'FERRE&Ntilde;AFE', 14),
(126, 'LAMBAYEQUE', 14),
(127, 'LIMA', 15),
(128, 'BARRANCA', 15),
(129, 'CAJATAMBO', 15),
(130, 'CANTA', 15),
(131, 'CA&Ntilde;ETE', 15),
(132, 'HUARAL', 15),
(133, 'HUAROCHIRI', 15),
(134, 'HUAURA', 15),
(135, 'OYON', 15),
(136, 'YAUYOS', 15),
(137, 'MAYNAS', 16),
(138, 'ALTO AMAZONAS', 16),
(139, 'LORETO', 16),
(140, 'MARISCAL RAMON CASTILLA', 16),
(141, 'REQUENA', 16),
(142, 'UCAYALI', 16),
(143, 'TAMBOPATA', 17),
(144, 'MANU', 17),
(145, 'TAHUAMANU', 17),
(146, 'MARISCAL NIETO', 18),
(147, 'GENERAL SANCHEZ CERRO', 18),
(148, 'ILO', 18),
(149, 'PASCO', 19),
(150, 'DANIEL ALCIDES CARRION', 19),
(151, 'OXAPAMPA', 19),
(152, 'PIURA', 20),
(153, 'AYABACA', 20),
(154, 'HUANCABAMBA', 20),
(155, 'MORROPON', 20),
(156, 'PAITA', 20),
(157, 'SULLANA', 20),
(158, 'TALARA', 20),
(159, 'SECHURA', 20),
(160, 'PUNO', 21),
(161, 'AZANGARO', 21),
(162, 'CARABAYA', 21),
(163, 'CHUCUITO', 21),
(164, 'EL COLLAO', 21),
(165, 'HUANCANE', 21),
(166, 'LAMPA', 21),
(167, 'MELGAR', 21),
(168, 'MOHO', 21),
(169, 'SAN ANTONIO DE PUTINA', 21),
(170, 'SAN ROMAN', 21),
(171, 'SANDIA', 21),
(172, 'YUNGUYO', 21),
(173, 'MOYOBAMBA', 22),
(174, 'BELLAVISTA', 22),
(175, 'EL DORADO', 22),
(176, 'HUALLAGA', 22),
(177, 'LAMAS', 22),
(178, 'MARISCAL CACERES', 22),
(179, 'PICOTA', 22),
(180, 'RIOJA', 22),
(181, 'SAN MARTIN', 22),
(182, 'TOCACHE', 22),
(183, 'TACNA', 23),
(184, 'CANDARAVE', 23),
(185, 'JORGE BASADRE', 23),
(186, 'TARATA', 23),
(187, 'TUMBES', 24),
(188, 'CONTRALMIRANTE VILLAR', 24),
(189, 'ZARUMILLA', 24),
(190, 'CORONEL PORTILLO', 25),
(191, 'ATALAYA', 25),
(192, 'PADRE ABAD', 25),
(193, 'PURUS', 25),
(194, 'SAN MIGUEL', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `per_id` int(11) DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `estado` char(1) DEFAULT '0' COMMENT '1: Habilitado; 0:Deshabilitado',
  `is_deleted` char(1) DEFAULT '0' COMMENT '1: Eliminado; 0:No Eliminado',
  `remenber_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `per_id`, `rol_id`, `name`, `email`, `email_verified_at`, `password`, `estado`, `is_deleted`, `remenber_token`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Willian Samuel Miranda Huaman', 'willmirandahuaman20@gmail.com', NULL, '$2y$10$tBX8Bw470Z.6k.b8tah3VeVmXOAahgsUjtiQ9k0FVk8oa6ZT4/6zi', '1', '0', NULL, '2023-09-17 05:00:00', '2022-11-17 05:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aa_operacion`
--
ALTER TABLE `aa_operacion`
  ADD PRIMARY KEY (`us_id`,`asis_id`),
  ADD KEY `aa_operacion_ibfk_2` (`asis_id`);

--
-- Indices de la tabla `ad_operacion`
--
ALTER TABLE `ad_operacion`
  ADD PRIMARY KEY (`us_id`,`asis_id`),
  ADD KEY `ad_operacion_ibfk_2` (`asis_id`);

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`alu_id`),
  ADD KEY `FK_alumno_persona` (`per_id`);

--
-- Indices de la tabla `apoderado`
--
ALTER TABLE `apoderado`
  ADD PRIMARY KEY (`apo_id`),
  ADD KEY `R_6` (`per_id`);

--
-- Indices de la tabla `asignacion_curso`
--
ALTER TABLE `asignacion_curso`
  ADD PRIMARY KEY (`asig_id`) USING BTREE,
  ADD KEY `FK_asignacion_curso_nivel` (`niv_id`),
  ADD KEY `FK_asignacion_curso_personal_academico` (`pa_id`);

--
-- Indices de la tabla `asignacion_grado`
--
ALTER TABLE `asignacion_grado`
  ADD PRIMARY KEY (`asig_id`) USING BTREE,
  ADD KEY `FK_asignacion_curso_nivel` (`niv_id`) USING BTREE,
  ADD KEY `FK_asignacion_curso_personal_academico` (`pa_id`) USING BTREE,
  ADD KEY `FK_asignacion_grado_grado` (`gra_id`);

--
-- Indices de la tabla `asistencia_alumno`
--
ALTER TABLE `asistencia_alumno`
  ADD PRIMARY KEY (`asis_id`),
  ADD KEY `R_38` (`alu_id`),
  ADD KEY `R_40` (`jus_id`);

--
-- Indices de la tabla `asistencia_personal_academico`
--
ALTER TABLE `asistencia_personal_academico`
  ADD PRIMARY KEY (`asis_id`),
  ADD KEY `R_39` (`pa_id`),
  ADD KEY `R_41` (`jus_id`);

--
-- Indices de la tabla `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`ala_id`);

--
-- Indices de la tabla `año`
--
ALTER TABLE `año`
  ADD KEY `Índice 1` (`año_id`);

--
-- Indices de la tabla `capacidad`
--
ALTER TABLE `capacidad`
  ADD PRIMARY KEY (`cap_id`),
  ADD KEY `R_48` (`cur_id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`cur_id`),
  ADD KEY `FK_curso_grado` (`gra_id`),
  ADD KEY `FK_curso_periodo` (`per_id`),
  ADD KEY `FK_curso_nivel` (`niv_id`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`gra_id`),
  ADD KEY `FK_grado_nivel` (`niv_id`);

--
-- Indices de la tabla `gsa`
--
ALTER TABLE `gsa`
  ADD PRIMARY KEY (`ags_id`),
  ADD KEY `gsa_ibfk_1` (`ala_id`),
  ADD KEY `FK_gsa_grado` (`gra_id`),
  ADD KEY `FK_gsa_seccion` (`sec_id`),
  ADD KEY `FK_gsa_nivel` (`niv_id`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`hor_id`),
  ADD KEY `R_33` (`cur_id`),
  ADD KEY `R_34` (`per_id`),
  ADD KEY `R_32` (`ags_id`) USING BTREE;

--
-- Indices de la tabla `institucion_educativa`
--
ALTER TABLE `institucion_educativa`
  ADD PRIMARY KEY (`ie_id`);

--
-- Indices de la tabla `justificacion`
--
ALTER TABLE `justificacion`
  ADD PRIMARY KEY (`jus_id`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`mat_id`),
  ADD KEY `R_20` (`alu_id`),
  ADD KEY `Índice 4` (`ags_id`),
  ADD KEY `FK_matricula_periodo` (`per_id`);

--
-- Indices de la tabla `nd_operacion`
--
ALTER TABLE `nd_operacion`
  ADD PRIMARY KEY (`us_id`,`nd_id`),
  ADD KEY `nd_operacion_ibfk_2` (`nd_id`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`niv_id`);

--
-- Indices de la tabla `nota`
--
ALTER TABLE `nota`
  ADD PRIMARY KEY (`nt_id`) USING BTREE,
  ADD KEY `R_30` (`alu_id`),
  ADD KEY `R_54` (`ags_id`),
  ADD KEY `FK_nota_personal_academico` (`pa_id`),
  ADD KEY `FK_nota_año` (`per_id`) USING BTREE;

--
-- Indices de la tabla `nota_capacidad`
--
ALTER TABLE `nota_capacidad`
  ADD PRIMARY KEY (`nc_id`) USING BTREE,
  ADD KEY `FK_nota_capacidad_nota` (`nt_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `Índice 1` (`email`);

--
-- Indices de la tabla `periodo`
--
ALTER TABLE `periodo`
  ADD PRIMARY KEY (`per_id`),
  ADD KEY `FK_periodo_año` (`año_id`),
  ADD KEY `R_52` (`per_tp_notas`) USING BTREE;

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`per_id`),
  ADD UNIQUE KEY `per_dni` (`per_dni`) USING BTREE;

--
-- Indices de la tabla `personal_academico`
--
ALTER TABLE `personal_academico`
  ADD PRIMARY KEY (`pa_id`),
  ADD KEY `personal_academico_ibfk_1` (`per_id`),
  ADD KEY `FK_personal_academico_nivel` (`niv_id`),
  ADD KEY `FK_personal_academico_roles` (`rol_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`),
  ADD UNIQUE KEY `rol_descripcion` (`rol_descripcion`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`sec_id`),
  ADD KEY `FK_seccion_grado` (`gra_id`),
  ADD KEY `FK_seccion_persona` (`sec_tutor`),
  ADD KEY `FK_seccion_aula` (`sec_aula`),
  ADD KEY `FK_seccion_periodo` (`sec_periodo`);

--
-- Indices de la tabla `tipo_periodo`
--
ALTER TABLE `tipo_periodo`
  ADD PRIMARY KEY (`tp_id`);

--
-- Indices de la tabla `ubdepartamento`
--
ALTER TABLE `ubdepartamento`
  ADD PRIMARY KEY (`idDepa`);

--
-- Indices de la tabla `ubdistrito`
--
ALTER TABLE `ubdistrito`
  ADD PRIMARY KEY (`idDist`);

--
-- Indices de la tabla `ubprovincia`
--
ALTER TABLE `ubprovincia`
  ADD PRIMARY KEY (`idProv`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Índice 4` (`email`),
  ADD KEY `usuarios_ibfk_1` (`per_id`),
  ADD KEY `FK_usuarios_roles` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `alu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `apoderado`
--
ALTER TABLE `apoderado`
  MODIFY `apo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT de la tabla `asignacion_curso`
--
ALTER TABLE `asignacion_curso`
  MODIFY `asig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `asignacion_grado`
--
ALTER TABLE `asignacion_grado`
  MODIFY `asig_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT de la tabla `aula`
--
ALTER TABLE `aula`
  MODIFY `ala_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `año`
--
ALTER TABLE `año`
  MODIFY `año_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `capacidad`
--
ALTER TABLE `capacidad`
  MODIFY `cap_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=365;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `cur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `gra_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `gsa`
--
ALTER TABLE `gsa`
  MODIFY `ags_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=795;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `hor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `mat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `niv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `nota`
--
ALTER TABLE `nota`
  MODIFY `nt_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `nota_capacidad`
--
ALTER TABLE `nota_capacidad`
  MODIFY `nc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1508;

--
-- AUTO_INCREMENT de la tabla `periodo`
--
ALTER TABLE `periodo`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT de la tabla `personal_academico`
--
ALTER TABLE `personal_academico`
  MODIFY `pa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `tipo_periodo`
--
ALTER TABLE `tipo_periodo`
  MODIFY `tp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
