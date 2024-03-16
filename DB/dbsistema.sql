-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-11-2023 a las 09:23:25
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbsistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `idalumno` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `nombres` text NOT NULL,
  `apellidos` text NOT NULL,
  `direccion` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `foto` text DEFAULT NULL,
  `aula_asignada` int(11) NOT NULL,
  `pension` decimal(10,2) NOT NULL,
  `descuento` decimal(4,2) NOT NULL,
  `pension_final` decimal(10,2) NOT NULL,
  `apoderado` text NOT NULL,
  `fecha_registro` text NOT NULL,
  `usuario_registro` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`idalumno`, `dni`, `nombres`, `apellidos`, `direccion`, `telefono`, `foto`, `aula_asignada`, `pension`, `descuento`, `pension_final`, `apoderado`, `fecha_registro`, `usuario_registro`, `estado`) VALUES
(1, 91214653, 'Jefri Danilo', 'Lopez Pacherrez', 'Pampa Chica', 11111111, '', 2, '120.00', '0.00', '0.00', 'xxxxxxxxxxx', '14-03-2023 11:19:05', 'shawol', 1),
(2, 91214633, 'Donal Andre', 'Lopez Pacherrez', 'Pampa chica', 11111111, '', 2, '120.00', '0.00', '0.00', 'xxxxxxx', '14-03-2023 11:22:54', 'shawol', 1),
(3, 90837295, 'Thaisa Veronica', 'Sanca Loayza', 'Pampa Chica', 111111, '', 2, '120.00', '0.00', '0.00', 'xxxxxx', '14-03-2023 12:12:23', 'shawol', 1),
(4, 90244925, 'Christelle Alexia', 'Chacón Salcedo', 'Pampa Chica', 11111, '', 3, '120.00', '0.00', '0.00', 'xxxxxx', '14-03-2023 12:13:53', 'shawol', 1),
(5, 90633752, 'Adait Victoria', 'Macedo Rojas', 'Pampa Chica', 111111, '', 3, '120.00', '0.00', '0.00', 'xxxxxx', '14-03-2023 12:27:39', 'shawol', 1),
(6, 90478449, 'Liam Gabriel', 'Rojas Palacios', 'Pampa Chica', 11111, '', 3, '120.00', '0.00', '0.00', 'xxxxxx', '14-03-2023 12:28:36', 'shawol', 1),
(7, 90207209, 'Jaren Pedro', 'Llanos Patiño', 'Pampa Chica', 11111, '', 3, '120.00', '0.00', '0.00', 'xxxxx', '14-03-2023 12:29:30', 'shawol', 1),
(8, 90039437, 'José Luis', 'Durand Rojas', 'Pampa Chica', 11111, '', 4, '150.00', '0.00', '0.00', 'xxxxx', '14-03-2023 12:30:34', 'shawol', 1),
(9, 90120514, 'Dylan Eder', 'Maximiliano Chuquivilca', 'Pampa Chica', 111111, '', 4, '150.00', '0.00', '0.00', 'xxxxxx', '14-03-2023 12:31:28', 'shawol', 1),
(10, 79994470, 'Leonardo Salvador', 'Huánuco Chirinos', 'Pampa Chica', 11111, '', 4, '0.00', '0.00', '0.00', 'xxxxx', '14-03-2023 12:32:25', 'shawol', 1),
(11, 79278598, 'Asael Goethe', 'Sanca Loayza', 'Pampa Chica', 11111, '', 5, '150.00', '0.00', '0.00', 'xxxxx', '14-03-2023 12:33:22', 'shawol', 1),
(12, 79256559, 'Dylan Yamir', 'Guerra Fernandez', 'Pampa Chica', 111111, '', 5, '150.00', '0.00', '0.00', 'xxxxxxx', '14-03-2023 12:34:57', 'shawol', 1),
(13, 90827842, 'Abdiel Jesús', 'Peraza Miranda', 'Pampa Chica', 11111, '', 5, '150.00', '0.00', '0.00', 'xxxxxx', '14-03-2023 12:35:51', 'shawol', 1),
(14, 90323930, 'Felipe David', 'Mamani Gonzales', 'Pampa Chica', 11111111, '', 4, '160.00', '0.00', '0.00', 'xxxxxxxxx', '21-04-2023 03:31:39', 'shawol', 1),
(15, 78914331, 'Rosa Estrella', 'Saccaco Casapaico', 'Pampa Chica', 111111111, '', 6, '160.00', '0.00', '0.00', 'xxxxxxxxxxx', '21-04-2023 03:32:53', 'shawol', 1),
(16, 79687857, 'Lian Edgar', 'Sulca Cano', 'Pampa Chica', 111111111, '', 4, '160.00', '0.00', '0.00', 'xxxxxxxxxxx', '21-04-2023 03:33:52', 'shawol', 1),
(17, 90996465, 'Adriano Dilan Valentino', 'Sulca Cano', 'Pampa Chica', 111111111, '', 2, '130.00', '0.00', '0.00', 'xxxxxxxxxxxxx', '21-04-2023 03:34:47', 'shawol', 1),
(18, 91289206, 'Adayra Luciana', 'Bances Morales', 'Pampa Chica', 111111111, '', 1, '130.00', '0.00', '0.00', 'xxxxxxxxxxx', '21-04-2023 03:36:05', 'shawol', 1),
(19, 91282153, 'Kalessy Akira', 'Soles Machoa', 'Pampa Chica', 111111111, '', 1, '130.00', '0.00', '0.00', 'xxxxxxxxxxx', '21-04-2023 03:37:17', 'shawol', 1),
(20, 91994253, 'Raiza Killari', 'Quispe Garcia', 'Pampa Chica', 111111111, '', 1, '130.00', '0.00', '0.00', 'xxxxxxxxxxx', '21-04-2023 03:38:22', 'shawol', 1),
(21, 91550116, 'Wilbelys Gisell', 'Fuentes Acosta', 'Pampa Chica', 111111111, '', 1, '130.00', '0.00', '0.00', 'xxxxxxxxxxx', '21-04-2023 03:47:41', 'shawol', 1),
(22, 90651442, 'Jolly Aymar', 'Sinche Leyva', 'Pampa Chica', 1111111111, '', 3, '120.00', '0.00', '0.00', 'xxxxxxxxxxx', '21-04-2023 03:51:14', 'shawol', 1),
(23, 78840222, 'Thiago Neyzan', 'Machoa Tuanama', 'Pampa Chica', 111111111, '', 6, '150.00', '0.00', '0.00', 'xxxxxxxxxxx', '21-04-2023 03:54:54', 'shawol', 1),
(24, 79729620, 'Noha Benjamin', 'Garcia Ceron', 'Pampa Chica', 11111111, '', 4, '150.00', '0.00', '0.00', 'xxxxxxxxxxx', '25-04-2023 02:28:20', 'shawol', 2),
(25, 81859153, 'Steven Zaid', 'Chacon Salcedo', 'Pampa Chica', 11111111, '', 1, '120.00', '0.00', '0.00', 'xxxxxxxxxxx', '25-04-2023 02:48:56', 'shawol', 1),
(26, 91585935, 'Sebastian Jair', 'Soto Leyva', 'Pampa Chica', 11111111, '', 1, '130.00', '0.00', '0.00', 'xxxxxxxxxxx', '25-04-2023 02:49:51', 'shawol', 1),
(27, 90781648, 'Kaela Kristel', 'Lozada Alva', 'Pampa Chica', 11111111, '', 2, '120.00', '0.00', '0.00', 'xxxxxxxxxxx', '25-04-2023 03:07:08', 'shawol', 1),
(28, 90664519, 'Valeria Katerin', 'Avendaño Montalvo', 'Pampa Chica', 11111111, '', 3, '120.00', '0.00', '0.00', 'xxxxxxxxxxx', '25-04-2023 03:09:07', 'shawol', 1),
(29, 91276907, 'Luna Dalila', 'Palacios Leon', 'Pampa Chica', 11111111, '', 2, '120.00', '0.00', '0.00', 'xxxxxxxxxxx', '26-04-2023 03:35:48', 'shawol', 1),
(30, 81551151, 'Jesus Jahel', 'Anton Padilla', 'Pampa Chica', 11111111, '', 7, '150.00', '0.00', '0.00', 'xxxxxxxxxxx', '26-04-2023 03:37:51', 'shawol', 1),
(31, 90304307, 'Ashley Keith', 'Raqui Zevallos', 'Pampa Chica', 11111111, '', 3, '120.00', '0.00', '0.00', 'xxxxxxxxxx', '26-04-2023 03:39:57', 'shawol', 1),
(32, 79394173, 'Stivend Junior', 'Avila Baldeon', 'Pampa Chica', 11111111, '', 4, '160.00', '0.00', '0.00', 'xxxxxxxxxx', '26-04-2023 03:48:13', 'shawol', 2),
(33, 91596788, 'Nathaniel Alexsa', 'Chavez Robles', 'Pampa Chica', 953947797, '', 1, '130.00', '0.00', '0.00', 'Beatriz Robles Loarte', '06-06-2023 11:35:52', 'shawol', 2),
(34, 1111111, '11111111', '111111111', 'Pampa Chica', 958190375, '', 1, '0.00', '0.00', '0.00', 'Nerida Morales Dias', '06-06-2023 11:40:42', 'shawol', 0),
(35, 0, 'Felipe David', 'Mamani Gonzales', 'Pampa Chica', 11111111, '', 4, '0.00', '0.00', '0.00', 'xxxxxxxxxxx', '09-06-2023 10:41:40', 'shawol', 0),
(36, 0, 'Stivend Junior', 'Avila Baldeon', 'Pampa Chica', 111111111, '', 4, '0.00', '0.00', '0.00', 'xxxxxxxxxxx', '09-06-2023 10:44:02', 'shawol', 0),
(37, 90024449, 'Samuel Daniel', 'Segura Contreras', 'Pampa Chica', 111111111, '', 4, '160.00', '0.00', '0.00', 'xxxxxxxxxxx', '09-06-2023 10:47:10', 'shawol', 2),
(38, 90106314, 'Ruth Aracely', 'Pozo Rodriguez', 'Pampa Chica', 111111111, '', 4, '160.00', '0.00', '0.00', 'N/N', '25-10-2023 06:53:07', 'shawol', 2),
(39, 79515215, 'Henry Abraham', 'Aybar Vilcapoma', 'Pampa Chica', 111111111, '', 4, '160.00', '0.00', '0.00', 'N/N', '25-10-2023 06:55:05', 'shawol', 2),
(40, 78182507, 'Moises David Daniel', 'Aybar Vilcapoma', 'Pampa Chica', 111111111, '', 6, '160.00', '0.00', '0.00', 'N/N', '25-10-2023 06:57:17', 'shawol', 2),
(41, 91739304, 'Yosef Liam', 'Bautista Cruz', 'Pampa Chica', 111111111, '', 1, '130.00', '0.00', '0.00', 'N/N', '25-10-2023 06:58:29', 'shawol', 2),
(42, 90410675, 'Jeicko Anderson', 'Bautista Cruz', 'Pampa Chica', 111111111, '', 3, '120.00', '0.00', '0.00', 'N/N', '25-10-2023 06:59:28', 'shawol', 2),
(43, 91521065, 'Yako Artemio', 'Munguia Colonio', 'Pampa Chica', 111111111, '', 1, '120.00', '0.00', '0.00', 'N/N', '25-10-2023 07:02:04', 'shawol', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `dir_archivo` text NOT NULL,
  `user_subir` int(11) NOT NULL,
  `alumno_doc` int(11) NOT NULL,
  `fecha_subida` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pago`
--

CREATE TABLE `detalle_pago` (
  `iddetallepago` int(11) NOT NULL,
  `idpago` int(11) NOT NULL,
  `concepto` text NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha_registro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_pago`
--

INSERT INTO `detalle_pago` (`iddetallepago`, `idpago`, `concepto`, `total`, `fecha_registro`) VALUES
(1, 1001, 'Mensualidad marzo', '120.00', '21-04-2023 13:37:24'),
(2, 1002, 'Mensualidad marzo', '150.00', '25-04-2023 14:10:01'),
(3, 1003, 'Mensualidad marzo', '150.00', '25-04-2023 14:11:57'),
(4, 1004, 'Mensualidad marzo', '120.00', '25-04-2023 14:12:53'),
(5, 1005, 'Mensualidad marzo', '120.00', '25-04-2023 14:13:43'),
(6, 1006, 'Mensualidad marzo', '120.00', '25-04-2023 14:14:39'),
(7, 1007, 'Mensualidad marzo', '120.00', '25-04-2023 14:15:17'),
(8, 1008, 'Mensualidad marzo', '120.00', '25-04-2023 14:16:11'),
(9, 1009, 'Mensualidad marzo', '150.00', '25-04-2023 14:17:31'),
(10, 1010, 'Mensualidad marzo', '150.00', '25-04-2023 14:18:41'),
(11, 1011, 'Mensualidad marzo', '130.00', '25-04-2023 14:19:43'),
(12, 1012, 'Mensualidad marzo', '130.00', '25-04-2023 14:20:42'),
(13, 1013, 'Mensualidad marzo', '160.00', '25-04-2023 14:21:28'),
(14, 1014, 'Mensualidad marzo', '130.00', '25-04-2023 14:22:19'),
(15, 1015, 'Mensualidad marzo', '160.00', '25-04-2023 14:23:14'),
(16, 1016, 'Mensualidad marzo', '150.00', '25-04-2023 14:24:03'),
(17, 1017, 'Mensualidad marzo', '150.00', '25-04-2023 14:24:54'),
(18, 1018, 'Mensualidad marzo', '120.00', '25-04-2023 14:25:32'),
(19, 1019, 'Mensualidad marzo', '120.00', '25-04-2023 15:26:10'),
(20, 1020, 'Mensualidad marzo - Libre', '130.00', '25-04-2023 15:27:37'),
(21, 1021, 'Mensualidad marzo', '130.00', '25-04-2023 15:28:33'),
(22, 1022, 'Mensualidad marzo', '130.00', '26-04-2023 15:50:04'),
(23, 1023, 'Mensualidad marzo', '150.00', '26-04-2023 15:51:10'),
(24, 1024, 'Mensualidad marzo', '120.00', '26-04-2023 15:52:35'),
(25, 1025, 'Mensualidad marzo', '160.00', '26-04-2023 15:53:22'),
(26, 1026, 'Mensualidad marzo', '160.00', '26-04-2023 15:54:23'),
(27, 1027, 'Mensualidad marzo', '130.00', '06-06-2023 11:36:33'),
(28, 1028, 'Mensualidad marzo', '130.00', '06-06-2023 11:42:13'),
(29, 1029, 'Mensualidad marzo', '120.00', '06-06-2023 11:43:13'),
(30, 1030, 'Mensualidad marzo', '120.00', '06-06-2023 11:43:55'),
(31, 1031, 'Mensualidad marzo', '120.00', '06-06-2023 11:44:32'),
(32, 1032, 'Mensualidad abril', '120.00', '06-06-2023 12:00:38'),
(33, 1033, 'Mensualidad abril', '130.00', '06-06-2023 12:01:12'),
(34, 1034, 'Mensualidad abril', '130.00', '06-06-2023 12:01:38'),
(35, 1035, 'Mensualidad abril', '130.00', '06-06-2023 12:02:28'),
(36, 1036, 'Mensualidad abril', '130.00', '06-06-2023 12:02:43'),
(37, 1037, 'Mensualidad abril - Libre', '130.00', '06-06-2023 12:03:15'),
(38, 1038, 'Mensualidad abril', '120.00', '06-06-2023 12:03:27'),
(39, 1039, 'Mensualidad abril', '120.00', '06-06-2023 12:03:39'),
(40, 1040, 'Mensualidad abril', '120.00', '06-06-2023 12:03:50'),
(41, 1041, 'Mensualidad abril', '130.00', '06-06-2023 12:04:02'),
(42, 1042, 'Mensualidad abril', '130.00', '06-06-2023 12:04:16'),
(43, 1043, 'Mensualidad abril', '120.00', '06-06-2023 12:04:34'),
(44, 1044, 'Mensualidad abril', '120.00', '06-06-2023 12:04:49'),
(45, 1045, 'Mensualidad abril', '120.00', '06-06-2023 12:05:03'),
(46, 1046, 'Mensualidad abril', '120.00', '06-06-2023 12:16:18'),
(47, 1047, 'Mensualidad abril', '120.00', '06-06-2023 12:16:29'),
(48, 1048, 'Mensualidad abril', '120.00', '06-06-2023 12:17:39'),
(49, 1049, 'Mensualidad abril', '120.00', '06-06-2023 12:17:59'),
(50, 1050, 'Mensualidad abril', '150.00', '06-06-2023 12:18:22'),
(51, 1051, 'Mensualidad abril', '150.00', '06-06-2023 12:18:49'),
(52, 1052, 'Mensualidad abril', '160.00', '06-06-2023 12:19:05'),
(53, 1053, 'Mensualidad abril', '160.00', '06-06-2023 12:19:34'),
(54, 1054, 'Mensualidad abril', '150.00', '06-06-2023 12:19:50'),
(55, 1055, 'Mensualidad abril', '150.00', '06-06-2023 12:20:15'),
(56, 1056, 'Mensualidad abril', '150.00', '06-06-2023 12:20:33'),
(57, 1057, 'Mensualidad abril', '150.00', '06-06-2023 12:20:45'),
(58, 1058, 'Mensualidad abril', '160.00', '06-06-2023 12:20:55'),
(59, 1059, 'Mensualidad abril', '150.00', '06-06-2023 12:21:19'),
(60, 1060, 'Mensualidad mayo', '120.00', '06-06-2023 12:37:58'),
(61, 1061, 'Mensualidad mayo - Libre', '130.00', '06-06-2023 12:38:28'),
(62, 1062, 'Mensualidad mayo', '120.00', '06-06-2023 12:38:38'),
(63, 1063, 'Mensualidad mayo', '120.00', '06-06-2023 12:38:47'),
(64, 1064, 'Mensualidad mayo', '130.00', '06-06-2023 12:38:58'),
(65, 1065, 'Mensualidad mayo', '120.00', '06-06-2023 12:39:23'),
(66, 1066, 'Mensualidad mayo', '120.00', '06-06-2023 12:42:16'),
(67, 1067, 'Mensualidad mayo', '120.00', '06-06-2023 12:42:28'),
(68, 1068, 'Mensualidad mayo', '160.00', '06-06-2023 12:42:55'),
(69, 1069, 'Mensualidad mayo', '150.00', '06-06-2023 12:43:16'),
(70, 1070, 'Mensualidad mayo', '150.00', '06-06-2023 12:43:30'),
(71, 1071, 'Mensualidad mayo', '160.00', '06-06-2023 12:43:46'),
(72, 1072, 'Mensualidad mayo', '150.00', '06-06-2023 12:43:55'),
(73, 1073, 'Mensualidad mayo', '130.00', '06-06-2023 12:44:59'),
(74, 1074, 'Mensualidad mayo', '120.00', '06-06-2023 03:27:49'),
(75, 1075, 'Mensualidad mayo', '130.00', '06-06-2023 03:28:04'),
(76, 1076, 'Mensualidad mayo', '120.00', '06-06-2023 03:28:36'),
(77, 1077, 'Mensualidad mayo', '120.00', '06-06-2023 03:28:48'),
(78, 1078, 'Mensualidad mayo', '120.00', '06-06-2023 03:29:01'),
(79, 1079, 'Mensualidad abril', '160.00', '06-06-2023 03:29:27'),
(80, 1080, 'Mensualidad mayo', '160.00', '06-06-2023 03:29:40'),
(81, 1081, 'Mensualidad mayo', '150.00', '08-06-2023 10:01:43'),
(82, 1082, 'Mensualidad mayo', '150.00', '08-06-2023 10:01:59'),
(83, 1083, 'Mensualidad mayo', '150.00', '08-06-2023 10:02:12'),
(84, 1084, 'Mensualidad mayo', '120.00', '08-06-2023 10:02:31'),
(85, 1085, 'Mensualidad mayo', '120.00', '14-09-2023 09:52:47'),
(86, 1086, 'Mensualidad mayo', '150.00', '14-09-2023 09:54:59'),
(87, 1087, 'Mensualidad mayo', '160.00', '14-09-2023 09:55:32'),
(88, 1088, 'Mensualidad mayo', '150.00', '14-09-2023 09:59:12'),
(89, 1089, 'Mensualidad junio', '120.00', '19-09-2023 08:55:05'),
(90, 1090, 'Mensualidad junio', '120.00', '19-09-2023 08:55:18'),
(91, 1091, 'Mensualidad junio', '130.00', '19-09-2023 08:55:36'),
(92, 1092, 'Mensualidad junio', '130.00', '19-09-2023 08:55:55'),
(93, 1093, 'Mensualidad junio', '130.00', '19-09-2023 08:56:09'),
(94, 1094, 'Mensualidad junio', '130.00', '19-09-2023 08:56:32'),
(95, 1095, 'Mensualidad junio', '120.00', '19-09-2023 08:56:51'),
(96, 1096, 'Mensualidad junio', '120.00', '19-09-2023 08:57:09'),
(97, 1097, 'Mensualidad junio', '120.00', '19-09-2023 08:57:19'),
(98, 1098, 'Mensualidad junio', '130.00', '19-09-2023 08:57:29'),
(99, 1099, 'Mensualidad junio', '130.00', '19-09-2023 08:57:41'),
(100, 1100, 'Mensualidad junio', '120.00', '19-09-2023 08:57:54'),
(101, 1101, 'Mensualidad junio', '120.00', '19-09-2023 08:58:39'),
(102, 1102, 'Mensualidad junio', '120.00', '19-09-2023 08:59:00'),
(103, 1103, 'Mensualidad junio', '120.00', '19-09-2023 08:59:13'),
(104, 1104, 'Mensualidad junio', '120.00', '19-09-2023 08:59:32'),
(105, 1105, 'Mensualidad junio', '120.00', '19-09-2023 08:59:45'),
(106, 1106, 'Mensualidad junio', '120.00', '19-09-2023 09:00:03'),
(107, 1107, 'Mensualidad junio', '150.00', '19-09-2023 09:00:22'),
(108, 1108, 'Mensualidad junio', '150.00', '19-09-2023 09:00:41'),
(109, 1109, 'Mensualidad junio', '160.00', '19-09-2023 09:00:52'),
(110, 1110, 'Mensualidad junio', '160.00', '19-09-2023 09:01:11'),
(111, 1111, 'Mensualidad junio', '150.00', '19-09-2023 09:01:23'),
(112, 1112, 'Mensualidad junio', '160.00', '19-09-2023 09:01:40'),
(113, 1113, 'Mensualidad junio', '150.00', '19-09-2023 09:01:55'),
(114, 1114, 'Mensualidad junio', '150.00', '19-09-2023 09:02:08'),
(115, 1115, 'Mensualidad junio', '150.00', '19-09-2023 09:02:33'),
(116, 1116, 'Mensualidad junio', '150.00', '19-09-2023 09:02:59'),
(117, 1117, 'Mensualidad junio', '160.00', '19-09-2023 09:03:12'),
(118, 1118, 'Mensualidad junio', '150.00', '19-09-2023 09:03:29'),
(119, 1119, 'Mensualidad julio', '150.00', '19-09-2023 09:04:13'),
(120, 1120, 'Mensualidad julio', '160.00', '19-09-2023 09:04:23'),
(121, 1121, 'Mensualidad julio', '150.00', '19-09-2023 09:04:38'),
(122, 1122, 'Mensualidad julio', '150.00', '19-09-2023 09:04:49'),
(123, 1123, 'Mensualidad julio', '150.00', '19-09-2023 09:05:02'),
(124, 1124, 'Mensualidad julio', '160.00', '19-09-2023 09:05:17'),
(125, 1125, 'Mensualidad julio', '150.00', '19-09-2023 09:05:33'),
(126, 1126, 'Mensualidad julio', '150.00', '19-09-2023 09:05:51'),
(127, 1127, 'Mensualidad julio', '150.00', '19-09-2023 09:06:04'),
(128, 1128, 'Mensualidad julio', '120.00', '19-09-2023 09:06:37'),
(129, 1129, 'Mensualidad julio', '120.00', '19-09-2023 09:06:52'),
(130, 1130, 'Mensualidad julio', '120.00', '19-09-2023 09:07:05'),
(131, 1131, 'Mensualidad julio', '120.00', '19-09-2023 09:07:30'),
(132, 1132, 'Mensualidad julio', '120.00', '19-09-2023 09:07:46'),
(133, 1133, 'Mensualidad julio', '130.00', '19-09-2023 09:08:00'),
(134, 1134, 'Mensualidad julio', '120.00', '19-09-2023 09:08:13'),
(135, 1135, 'Mensualidad julio', '120.00', '19-09-2023 09:08:25'),
(136, 1136, 'Mensualidad julio', '120.00', '19-09-2023 09:08:40'),
(137, 1137, 'Mensualidad julio', '130.00', '19-09-2023 09:09:06'),
(138, 1138, 'Mensualidad julio', '120.00', '19-09-2023 09:09:18'),
(139, 1139, 'Mensualidad marzo', '160.00', '25-10-2023 07:04:00'),
(140, 1140, 'Mensualidad abril', '160.00', '25-10-2023 07:04:26'),
(141, 1141, 'Mensualidad junio', '160.00', '25-10-2023 07:04:54'),
(142, 1142, 'Mensualidad julio', '160.00', '25-10-2023 07:05:07'),
(143, 1143, 'Mensualidad agosto', '160.00', '25-10-2023 07:05:29'),
(144, 1144, 'Mensualidad marzo', '160.00', '25-10-2023 07:06:12'),
(145, 1145, 'Mensualidad abril', '160.00', '25-10-2023 07:06:38'),
(146, 1146, 'Mensualidad mayo', '160.00', '25-10-2023 07:07:02'),
(147, 1147, 'Mensualidad junio', '160.00', '25-10-2023 07:07:16'),
(148, 1148, 'Mensualidad julio', '160.00', '25-10-2023 07:07:28'),
(149, 1149, 'Mensualidad mayo', '160.00', '25-10-2023 07:08:38'),
(150, 1150, 'Mensualidad agosto', '160.00', '25-10-2023 07:09:22'),
(151, 1151, 'Mensualidad mayo', '120.00', '25-10-2023 07:20:40'),
(152, 1152, 'Mensualidad junio', '120.00', '25-10-2023 07:20:57'),
(153, 1153, 'Mensualidad julio', '120.00', '25-10-2023 07:21:10'),
(154, 1154, 'Mensualidad julio', '130.00', '25-10-2023 07:22:52'),
(155, 1155, 'Mensualidad agosto', '130.00', '25-10-2023 07:23:10'),
(156, 1156, 'Mensualidad setiembre', '130.00', '25-10-2023 07:23:38'),
(157, 1157, 'Mensualidad julio', '120.00', '25-10-2023 07:25:47'),
(158, 1158, 'Mensualidad agosto', '120.00', '25-10-2023 07:26:03'),
(159, 1159, 'Mensualidad setiembre', '120.00', '25-10-2023 07:26:15'),
(160, 1160, 'Mensualidad agosto', '120.00', '25-10-2023 07:28:22'),
(161, 1161, 'Mensualidad setiembre', '120.00', '25-10-2023 07:29:14'),
(162, 1162, 'Mensualidad julio', '120.00', '25-10-2023 07:30:10'),
(163, 1163, 'Mensualidad agosto', '120.00', '25-10-2023 07:30:28'),
(164, 1164, 'Mensualidad mayo', '130.00', '25-10-2023 07:32:27'),
(165, 1165, 'Mensualidad agosto', '130.00', '25-10-2023 07:35:10'),
(166, 1166, 'Mensualidad mayo', '130.00', '25-10-2023 07:36:16'),
(167, 1167, 'Mensualidad agosto', '120.00', '25-10-2023 07:39:24'),
(168, 1168, 'Mensualidad agosto', '120.00', '25-10-2023 07:43:18'),
(169, 1169, 'Mensualidad agosto', '120.00', '25-10-2023 07:43:53'),
(170, 1170, 'Mensualidad agosto', '120.00', '25-10-2023 07:44:39'),
(171, 1171, 'Mensualidad setiembre', '120.00', '25-10-2023 07:45:00'),
(172, 1172, 'Mensualidad octubre', '120.00', '25-10-2023 07:45:13'),
(173, 1173, 'Mensualidad noviembre', '120.00', '25-10-2023 07:45:27'),
(174, 1174, 'Mensualidad julio', '130.00', '25-10-2023 08:27:18'),
(175, 1175, 'Mensualidad agosto', '130.00', '25-10-2023 08:27:34'),
(176, 1176, 'Mensualidad agosto', '120.00', '25-10-2023 08:39:45'),
(177, 1177, 'Mensualidad setiembre', '120.00', '25-10-2023 08:39:59'),
(178, 1178, 'Mensualidad agosto', '120.00', '25-10-2023 08:41:46'),
(179, 1179, 'Mensualidad setiembre', '120.00', '25-10-2023 08:41:58'),
(180, 1180, 'Mensualidad agosto', '120.00', '25-10-2023 08:42:25'),
(181, 1181, 'Mensualidad setiembre', '120.00', '25-10-2023 08:42:41'),
(182, 1182, 'Mensualidad octubre', '120.00', '25-10-2023 08:42:54'),
(183, 1183, 'Mensualidad agosto', '120.00', '25-10-2023 08:44:20'),
(184, 1184, 'Mensualidad setiembre', '120.00', '25-10-2023 08:44:37'),
(185, 1185, 'Mensualidad abril', '120.00', '25-10-2023 08:45:26'),
(186, 1186, 'Mensualidad julio', '120.00', '25-10-2023 08:46:03'),
(187, 1187, 'Mensualidad agosto', '120.00', '25-10-2023 08:46:43'),
(188, 1188, 'Mensualidad setiembre', '120.00', '25-10-2023 08:46:57'),
(189, 1189, 'Mensualidad agosto', '150.00', '25-10-2023 08:48:53'),
(190, 1190, 'Mensualidad agosto', '150.00', '25-10-2023 08:49:30'),
(191, 1191, 'Mensualidad julio', '160.00', '25-10-2023 08:50:05'),
(192, 1192, 'Mensualidad agosto - exonerado por salud', '0.00', '25-10-2023 08:51:24'),
(193, 1193, 'Mensualidad setiembre - exonerado por salud', '0.00', '25-10-2023 08:52:17'),
(194, 1194, 'Mensualidad julio', '160.00', '25-10-2023 08:53:06'),
(195, 1195, 'Mensualidad agosto', '160.00', '25-10-2023 08:53:24'),
(196, 1196, 'Mensualidad abril', '160.00', '25-10-2023 08:54:13'),
(197, 1197, 'Mensualidad mayo', '160.00', '25-10-2023 08:55:41'),
(198, 1198, 'Mensualidad junio', '160.00', '25-10-2023 08:55:57'),
(199, 1199, 'Mensualidad julio', '160.00', '25-10-2023 08:56:10'),
(200, 1200, 'Mensualidad agosto', '160.00', '25-10-2023 08:56:20'),
(201, 1201, 'Mensualidad agosto', '160.00', '25-10-2023 08:57:33'),
(202, 1202, 'Mensualidad agosto', '150.00', '25-10-2023 08:58:39'),
(203, 1203, 'Mensualidad julio', '150.00', '25-10-2023 08:59:17'),
(204, 1204, 'Mensualidad agosto', '150.00', '25-10-2023 08:59:32'),
(205, 1205, 'Mensualidad agosto', '150.00', '25-10-2023 09:00:01'),
(206, 1206, 'Mensualidad setiembre', '150.00', '25-10-2023 09:00:18'),
(207, 1207, 'Mensualidad agosto', '150.00', '25-10-2023 09:02:21'),
(208, 1208, 'Mensualidad setiembre', '150.00', '25-10-2023 09:02:36'),
(209, 1209, 'Mensualidad agosto', '160.00', '25-10-2023 09:03:31'),
(210, 1210, 'Mensualidad setiembre', '160.00', '25-10-2023 09:03:43'),
(211, 1211, 'Mensualidad agosto', '150.00', '25-10-2023 09:04:24'),
(212, 1212, 'Mensualidad setiembre', '150.00', '25-10-2023 09:04:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `id` int(11) NOT NULL,
  `dni` text COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` text COLLATE utf8_spanish_ci NOT NULL,
  `nombres` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `aula_asignada` int(11) DEFAULT NULL,
  `foto` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` text COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`id`, `dni`, `apellidos`, `nombres`, `direccion`, `telefono`, `aula_asignada`, `foto`, `email`, `fecha_registro`, `estado`) VALUES
(1, '77648103', 'Colonio Vargas', 'Gabriela Leonora', 'Pampa chica', '11111111', 1, '', 'a@a.com', '2023-08-15 18:14:14', 1),
(2, '70784091', 'Tapia Garivay', 'Jazmin Geonela', 'Pampa chica', '11111111', 2, '', 'a@a.com', '2023-08-15 18:15:07', 1),
(3, '77281342', 'Bustamante Gutierrez', 'Cintia Estephany', 'Pampa chica', '11111111', 3, '', 'a@a.com', '2023-08-15 18:16:38', 1),
(4, '47726092', 'Falcon Ubilla', 'Jahnnisse Stacey', 'Pampa chica', '11111111', 4, '', 'a@a.com', '2023-08-15 18:18:15', 1),
(5, '0', 'Falcon Ubilla', 'Jahnnisse Stacey', 'Pampa Chica', '11111111', 5, '', 'a@a.com', '2023-08-15 19:45:10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `idpago` int(11) NOT NULL,
  `idalumno` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pago`
--

INSERT INTO `pago` (`idpago`, `idalumno`, `idusuario`, `estado`) VALUES
(1001, 4, 1, 1),
(1002, 8, 1, 1),
(1003, 9, 1, 1),
(1004, 5, 1, 1),
(1005, 6, 1, 1),
(1006, 7, 1, 1),
(1007, 1, 1, 1),
(1008, 2, 1, 1),
(1009, 12, 1, 1),
(1010, 23, 1, 1),
(1011, 19, 1, 1),
(1012, 21, 1, 1),
(1013, 14, 1, 1),
(1014, 17, 1, 1),
(1015, 16, 1, 1),
(1016, 13, 1, 1),
(1017, 11, 1, 1),
(1018, 3, 1, 1),
(1019, 27, 1, 1),
(1020, 20, 1, 1),
(1021, 26, 1, 1),
(1022, 29, 1, 1),
(1023, 30, 1, 1),
(1024, 25, 1, 1),
(1025, 15, 1, 1),
(1026, 32, 1, 1),
(1027, 33, 1, 1),
(1028, 18, 1, 1),
(1029, 22, 1, 1),
(1030, 28, 1, 1),
(1031, 31, 1, 1),
(1032, 25, 1, 1),
(1033, 21, 1, 1),
(1034, 26, 1, 1),
(1035, 33, 1, 1),
(1036, 18, 1, 1),
(1037, 20, 1, 1),
(1038, 1, 1, 1),
(1039, 2, 1, 1),
(1040, 27, 1, 1),
(1041, 29, 1, 1),
(1042, 17, 1, 1),
(1043, 3, 1, 1),
(1044, 4, 1, 1),
(1045, 5, 1, 1),
(1046, 6, 1, 1),
(1047, 7, 1, 1),
(1048, 28, 1, 1),
(1049, 31, 1, 1),
(1050, 8, 1, 1),
(1051, 9, 1, 1),
(1052, 16, 1, 1),
(1053, 24, 1, 1),
(1054, 12, 1, 1),
(1055, 13, 1, 1),
(1056, 11, 1, 1),
(1057, 23, 1, 1),
(1058, 15, 1, 1),
(1059, 30, 1, 1),
(1060, 21, 1, 1),
(1061, 20, 1, 1),
(1062, 1, 1, 1),
(1063, 2, 1, 1),
(1064, 17, 1, 1),
(1065, 3, 1, 1),
(1066, 6, 1, 1),
(1067, 31, 1, 1),
(1068, 16, 1, 1),
(1069, 12, 1, 1),
(1070, 11, 1, 1),
(1071, 15, 1, 1),
(1072, 30, 1, 1),
(1073, 29, 1, 1),
(1074, 25, 1, 1),
(1075, 18, 1, 1),
(1076, 4, 1, 1),
(1077, 5, 1, 1),
(1078, 7, 1, 1),
(1079, 14, 1, 1),
(1080, 14, 1, 1),
(1081, 8, 1, 1),
(1082, 9, 1, 1),
(1083, 13, 1, 1),
(1084, 27, 1, 1),
(1085, 22, 1, 1),
(1086, 24, 1, 1),
(1087, 32, 1, 1),
(1088, 23, 1, 1),
(1089, 25, 1, 1),
(1090, 21, 1, 1),
(1091, 26, 1, 1),
(1092, 33, 1, 1),
(1093, 18, 1, 1),
(1094, 20, 1, 1),
(1095, 1, 1, 1),
(1096, 2, 1, 1),
(1097, 27, 1, 1),
(1098, 29, 1, 1),
(1099, 17, 1, 1),
(1100, 3, 1, 1),
(1101, 4, 1, 1),
(1102, 5, 1, 1),
(1103, 6, 1, 1),
(1104, 7, 1, 1),
(1105, 22, 1, 1),
(1106, 31, 1, 1),
(1107, 8, 1, 1),
(1108, 9, 1, 1),
(1109, 14, 1, 1),
(1110, 16, 1, 1),
(1111, 24, 1, 1),
(1112, 32, 1, 1),
(1113, 12, 1, 1),
(1114, 13, 1, 1),
(1115, 11, 1, 1),
(1116, 23, 1, 1),
(1117, 15, 1, 1),
(1118, 30, 1, 1),
(1119, 30, 1, 1),
(1120, 15, 1, 1),
(1121, 23, 1, 1),
(1122, 11, 1, 1),
(1123, 12, 1, 1),
(1124, 32, 1, 1),
(1125, 24, 1, 1),
(1126, 9, 1, 1),
(1127, 8, 1, 1),
(1128, 31, 1, 1),
(1129, 7, 1, 1),
(1130, 5, 1, 1),
(1131, 4, 1, 1),
(1132, 3, 1, 1),
(1133, 29, 1, 1),
(1134, 27, 1, 1),
(1135, 2, 1, 1),
(1136, 1, 1, 1),
(1137, 18, 1, 1),
(1138, 25, 1, 1),
(1139, 39, 1, 1),
(1140, 39, 1, 1),
(1141, 39, 1, 1),
(1142, 39, 1, 1),
(1143, 39, 1, 1),
(1144, 40, 1, 1),
(1145, 40, 1, 1),
(1146, 40, 1, 1),
(1147, 40, 1, 1),
(1148, 40, 1, 1),
(1149, 39, 1, 1),
(1150, 40, 1, 1),
(1151, 43, 1, 1),
(1152, 43, 1, 1),
(1153, 43, 1, 1),
(1154, 41, 1, 1),
(1155, 41, 1, 1),
(1156, 41, 1, 1),
(1157, 42, 1, 1),
(1158, 42, 1, 1),
(1159, 42, 1, 1),
(1160, 25, 1, 1),
(1161, 25, 1, 1),
(1162, 21, 1, 1),
(1163, 21, 1, 1),
(1164, 26, 1, 1),
(1165, 26, 1, 1),
(1166, 33, 1, 1),
(1167, 1, 1, 1),
(1168, 2, 1, 1),
(1169, 27, 1, 1),
(1170, 29, 1, 1),
(1171, 29, 1, 1),
(1172, 29, 1, 1),
(1173, 29, 1, 1),
(1174, 17, 1, 1),
(1175, 17, 1, 1),
(1176, 3, 1, 1),
(1177, 3, 1, 1),
(1178, 4, 1, 1),
(1179, 4, 1, 1),
(1180, 5, 1, 1),
(1181, 5, 1, 1),
(1182, 5, 1, 1),
(1183, 7, 1, 1),
(1184, 7, 1, 1),
(1185, 22, 1, 1),
(1186, 22, 1, 1),
(1187, 31, 1, 1),
(1188, 31, 1, 1),
(1189, 8, 1, 1),
(1190, 9, 1, 1),
(1191, 14, 1, 1),
(1192, 14, 1, 1),
(1193, 14, 1, 1),
(1194, 16, 1, 1),
(1195, 16, 1, 1),
(1196, 32, 1, 1),
(1197, 37, 1, 1),
(1198, 37, 1, 1),
(1199, 37, 1, 1),
(1200, 37, 1, 1),
(1201, 38, 1, 1),
(1202, 12, 1, 1),
(1203, 13, 1, 1),
(1204, 13, 1, 1),
(1205, 11, 1, 1),
(1206, 11, 1, 1),
(1207, 23, 1, 1),
(1208, 23, 1, 1),
(1209, 15, 1, 1),
(1210, 15, 1, 1),
(1211, 30, 1, 1),
(1212, 30, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`) VALUES
(1, 'Super Administrador'),
(2, 'Administrador'),
(3, 'Supervisor'),
(4, 'Docente'),
(5, 'Caja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seccion`
--

CREATE TABLE `seccion` (
  `idseccion` int(11) NOT NULL,
  `nombre_seccion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `seccion`
--

INSERT INTO `seccion` (`idseccion`, `nombre_seccion`) VALUES
(1, 'inicial'),
(2, 'primaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectores`
--

CREATE TABLE `sectores` (
  `id` int(11) NOT NULL,
  `nombres` text COLLATE utf8_spanish_ci NOT NULL,
  `seccion` int(11) NOT NULL,
  `bgColor` text COLLATE utf8_spanish_ci NOT NULL,
  `icon` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sectores`
--

INSERT INTO `sectores` (`id`, `nombres`, `seccion`, `bgColor`, `icon`) VALUES
(1, '3 Años', 1, '#F781D8', '<i class=\"fas fa-archive\"></i>'),
(2, '4 Años', 1, '#EEA9FB', '<i class=\"fas fa-users\"></i>'),
(3, '5 Años', 1, '#BDBDBD', '<i class=\"fab fa-audible\"></i>'),
(4, '1° Grado', 2, '#F1AC9D', '<i class=\"fas fa-chart-line\"></i>'),
(5, '2° Grado', 2, '#B1F59F', '<i class=\"fab fa-accusoft\"></i>'),
(6, '3° Grado', 2, '#79c2d0', '<i class=\"fa fa-fw fa-star\"></i>'),
(7, '4° Grado', 2, '#dde0ab', '<i class=\"fa fa-fw fa-tree\"></i>'),
(8, '5° Grado', 2, '#9ccc65', '<i class=\"fa fa-paperclip\"></i>'),
(9, '6° Grado', 2, '#FFA3FD', '<i class=\"fa fa-briefcase\"></i>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` text COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` text COLLATE utf8_spanish_ci NOT NULL,
  `dni` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `rol` int(11) NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `clave` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` text COLLATE utf8_spanish_ci NOT NULL,
  `ultimo_logueo` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `apellidos`, `dni`, `direccion`, `telefono`, `foto`, `rol`, `usuario`, `clave`, `fecha_registro`, `ultimo_logueo`, `estado`) VALUES
(1, 'Estefany', 'Esplana', '45759392', 'Henri Fayol Km. 10.5', '965086015', 'Vistas/img/users/45759392/961.png', 1, 'shawol', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', '14-03-2023 10:45:19', '31-10-2023 08:51:05', 1),
(2, 'Cinthia', 'Apellido', '123456789', 'colegio', '9658478', 'Vistas/img/users/123456789/296.png', 5, 'cinthia', '$2a$07$asxx54ahjppf45sd87a5auFL5K1.Cmt9ZheoVVuudOi5BCi10qWly', '14-03-2023 10:45:19', '26-08-2023 10:52:36', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`idalumno`);

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pago`
--
ALTER TABLE `detalle_pago`
  ADD PRIMARY KEY (`iddetallepago`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD UNIQUE KEY `idpago` (`idpago`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seccion`
--
ALTER TABLE `seccion`
  ADD PRIMARY KEY (`idseccion`);

--
-- Indices de la tabla `sectores`
--
ALTER TABLE `sectores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `idalumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_pago`
--
ALTER TABLE `detalle_pago`
  MODIFY `iddetallepago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT de la tabla `docentes`
--
ALTER TABLE `docentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `seccion`
--
ALTER TABLE `seccion`
  MODIFY `idseccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sectores`
--
ALTER TABLE `sectores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
