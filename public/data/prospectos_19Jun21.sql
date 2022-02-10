-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2021 a las 15:14:56
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `newprospectostwo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `nIdActividad` int(11) NOT NULL,
  `nIdProspecto` int(11) NOT NULL,
  `nIdUsuario` int(11) DEFAULT NULL,
  `nTipoActividad` int(11) NOT NULL COMMENT '1 Cita',
  `dFechaCreacion` datetime DEFAULT NULL,
  `nIdEstadoActividad` int(11) NOT NULL,
  `dFecha` date NOT NULL,
  `dHora` time NOT NULL,
  `sNota` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sLatitud` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sLongitud` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nEstado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`nIdActividad`, `nIdProspecto`, `nIdUsuario`, `nTipoActividad`, `dFechaCreacion`, `nIdEstadoActividad`, `dFecha`, `dHora`, `sNota`, `sLatitud`, `sLongitud`, `nEstado`) VALUES
(84, 60, 66, 1, '2021-02-28 11:52:36', 573, '2021-03-31', '06:30:00', 'Hola', NULL, '', 1),
(85, 61, 66, 1, '2021-02-28 11:56:03', 576, '2021-03-01', '06:30:00', 'Nota', NULL, '', 1),
(86, 70, 66, 1, '2021-02-28 12:11:41', 573, '2021-03-02', '22:02:00', 'asd', NULL, '', 1),
(87, 71, 66, 1, '2021-02-28 12:13:37', 573, '2021-03-01', '22:02:00', 'asdsadsda', NULL, '', 1),
(88, 72, 66, 1, '2021-02-28 12:15:59', 576, '2021-03-03', '21:12:00', 'sad', NULL, '', 1),
(89, 82, 66, 1, '2021-02-28 12:22:35', 573, '2021-03-01', '12:22:00', 'sasd', NULL, '', 1),
(90, 83, 66, 1, '2021-02-28 12:25:15', 573, '2021-03-01', '18:30:00', 'Hh', NULL, '', 1),
(91, 84, 66, 1, '2021-02-28 12:27:00', 573, '2021-03-01', '18:30:00', 'Coment', NULL, '', 1),
(92, 85, 66, 1, '2021-02-28 12:27:52', 576, '2021-02-28', '18:29:00', 'Foemn', NULL, '', 1),
(93, 86, 66, 1, '2021-02-28 12:28:18', 576, '2021-03-10', '18:30:00', 'Hsusu', NULL, '', 1),
(94, 87, 66, 1, '2021-02-28 12:32:06', 576, '2021-03-01', '18:30:00', 'Ksnsks', NULL, '', 1),
(95, 88, 66, 1, '2021-02-28 12:33:27', 576, '2021-02-28', '18:29:00', 'Kzksk', NULL, '', 1),
(96, 90, 66, 1, '2021-02-28 12:42:33', 576, '2021-02-28', '18:42:00', NULL, NULL, '', 1),
(97, 91, 66, 1, '2021-02-28 12:51:44', 573, '2021-03-31', '12:23:00', 'sadasd', NULL, '', 1),
(98, 93, 67, 1, '2021-02-28 23:17:52', 573, '2021-06-28', '12:13:00', 'sdasd', NULL, NULL, 1),
(99, 94, 67, 1, '2021-02-28 23:18:47', 573, '2021-03-01', '18:30:00', 'Kakak', NULL, NULL, 1),
(100, 95, 67, 1, '2021-02-28 23:19:39', 576, '2021-03-01', '18:30:00', 'Jajaj', NULL, NULL, 1),
(101, 96, 67, 1, '2021-02-28 23:21:30', 573, '2021-03-01', '18:29:00', 'Hsjsjsjsj', NULL, NULL, 1),
(102, 97, 67, 1, '2021-02-28 23:23:07', 573, '2021-03-01', '18:30:00', 'Jjsjsj', NULL, NULL, 1),
(103, 98, 69, 1, '2021-02-28 23:27:23', 576, '2021-03-11', '18:30:00', 'Jssj', NULL, NULL, 1),
(104, 99, 69, 1, '2021-02-28 23:28:17', 576, '2021-03-01', '18:29:00', 'Jajajaka', NULL, NULL, 1),
(105, 100, 69, 1, '2021-02-28 23:30:39', 576, '2021-03-25', '18:30:00', 'Kaiai', NULL, NULL, 1),
(106, 101, 69, 1, '2021-02-28 23:33:30', 576, '2021-03-01', '18:29:00', 'Kajakak', NULL, NULL, 1),
(107, 101, 69, 1, '2021-02-28 23:35:25', 576, '2021-03-01', '18:29:00', 'Jajaj', NULL, NULL, 1),
(108, 99, 69, 1, '2021-02-28 23:39:19', 573, '2021-03-01', '18:30:00', 'Kakaka', NULL, NULL, 1),
(109, 100, 69, 1, '2021-02-28 23:42:03', 576, '2021-03-01', '18:30:00', NULL, NULL, NULL, 1),
(110, 90, 66, 1, '2021-02-28 23:56:12', 576, '2021-03-01', '18:29:00', 'Ksksksk', NULL, NULL, 1),
(111, 88, 66, 1, '2021-03-01 00:00:00', 576, '2021-03-09', '18:29:00', NULL, NULL, NULL, 1),
(112, 72, 66, 1, '2021-03-01 00:00:34', 576, '2021-04-14', '05:30:00', 'Q', NULL, NULL, 1),
(113, 87, 66, 1, '2021-03-01 00:01:24', 576, '2021-03-16', '06:29:00', 'Jauua', NULL, NULL, 1),
(114, 86, 66, 1, '2021-03-01 00:02:20', 576, '2021-03-01', '06:29:00', 'Iwiw', NULL, NULL, 1),
(115, 61, 66, 1, '2021-03-01 00:03:21', 576, '2021-03-24', '06:30:00', 'Hwywy', NULL, NULL, 1),
(116, 85, 66, 1, '2021-03-01 00:04:54', 576, '2021-03-17', '05:30:00', NULL, NULL, NULL, 1),
(117, 102, 70, 1, '2021-03-01 10:43:42', 573, '2021-03-24', '06:28:00', '', NULL, NULL, 1),
(118, 103, 70, 1, '2021-03-01 10:44:29', 573, '2021-03-16', '06:30:00', 'Hsjwja', NULL, NULL, 1),
(119, 104, 70, 1, '2021-03-01 10:46:06', 576, '2021-03-24', '06:29:00', 'Jaja', NULL, NULL, 1),
(120, 105, 70, 1, '2021-03-01 10:50:39', 573, '2021-03-30', '06:30:00', 'Hyqyq', NULL, NULL, 1),
(121, 106, 70, 1, '2021-03-01 10:58:06', 576, '2021-03-01', '18:30:00', 'Usjsus', NULL, NULL, 1),
(122, 107, 70, 1, '2021-03-01 12:19:56', 573, '2021-03-09', '18:28:00', 'Uausua', NULL, NULL, 1),
(123, 108, 70, 1, '2021-03-01 12:22:39', 573, '2021-03-01', '18:30:00', 'J', NULL, NULL, 1),
(124, 104, 70, 1, '2021-03-01 12:40:00', 576, '2021-03-24', '18:30:00', 'Hajaja', NULL, NULL, 1),
(125, 109, 72, 1, '2021-03-01 15:29:06', 573, '2021-03-18', '18:30:00', '', NULL, NULL, 1),
(126, 110, 72, 1, '2021-03-01 15:33:42', 573, '2021-03-19', '23:03:00', 'asdasd', NULL, NULL, 1),
(127, 111, 72, 1, '2021-03-01 16:05:31', 576, '2021-03-02', '18:30:00', 'Jqjjsjjsk', NULL, NULL, 1),
(128, 114, 66, 1, '2021-03-04 15:22:43', 573, '2021-03-24', '12:23:00', '1dasd', NULL, NULL, 1),
(129, 115, 66, 1, '2021-03-12 11:01:02', 573, '2021-03-18', '12:22:00', 'dadasd', NULL, NULL, 1),
(130, 116, 66, 1, '2021-03-26 13:50:30', 573, '2021-03-26', '12:12:00', 'asdasd', NULL, NULL, 1),
(131, 117, 66, 1, '2021-03-26 14:06:08', 573, '2021-04-02', '22:02:00', '2asda', NULL, NULL, 1),
(132, 118, 66, 1, '2021-03-26 14:27:17', 573, '2021-03-27', '12:13:00', 'asdasd', NULL, NULL, 1),
(133, 119, 67, 1, '2021-05-14 11:35:31', 576, '2021-05-21', '12:03:00', 'dad', NULL, NULL, 1),
(134, 119, 67, 1, '2021-05-14 11:36:16', 576, '2021-12-12', '03:31:00', 'asds', NULL, NULL, 1),
(135, 120, 67, 1, '2021-05-14 12:52:17', 576, '2021-05-14', '12:21:00', 'adasd', NULL, NULL, 1),
(136, 120, 67, 1, '2021-05-14 13:04:43', 576, '2021-05-21', '12:23:00', 'asdd', NULL, NULL, 1),
(137, 121, 67, 1, '2021-06-01 12:14:55', 576, '2021-06-01', '12:03:00', 'asdsadad', NULL, NULL, 1),
(138, 122, 67, 1, '2021-06-01 12:15:40', 573, '2021-06-02', '12:03:00', 'asdsdasd', NULL, NULL, 1),
(139, 106, 70, 1, '2021-06-02 16:30:56', 576, '2021-06-25', '22:02:00', 'sadasd', NULL, NULL, 1),
(140, 121, 67, 1, '2021-06-09 19:34:23', 573, '2021-06-25', '14:22:00', 'assds', NULL, NULL, 1),
(141, 123, 67, 1, '2021-06-09 20:24:57', 576, '2021-06-09', '04:04:00', 'SDFSF', NULL, NULL, 1),
(143, 124, 67, 1, '2021-06-16 23:18:43', 576, '2021-06-16', '21:23:00', 'addsa', '-12.0412292', '-77.0951228', 1),
(146, 125, 70, 1, '2021-06-17 13:42:07', 576, '2021-06-18', '12:23:00', 'asdad', '-12.0684544', '-77.0506752', 1),
(147, 126, 67, 1, '2021-06-18 17:45:30', 576, '2021-06-18', '12:23:00', 'ASDASD', '-12.0411962', '-77.0951516', 1),
(148, 126, 67, 1, '2021-06-18 17:46:25', 576, '2021-06-19', '12:33:00', 'ADASD', '-12.0412097', '-77.0951723', 1),
(149, 127, 67, 1, '2021-06-18 17:48:21', 576, '2021-06-19', '12:03:00', 'sdasd', '-12.1012224', '-77.0277376', 1),
(150, 127, 67, 1, '2021-06-18 17:51:08', 576, '2021-06-19', '12:03:00', 'asdasd', '-12.0411973', '-77.0951611', 1),
(151, 128, 67, 1, '2021-06-23 13:59:19', 573, '2021-06-24', '12:23:00', 'SADAD', NULL, NULL, 1),
(152, 129, 67, 1, '2021-06-27 15:40:36', 573, '2021-06-28', '12:03:00', 'dasdasdd', NULL, NULL, 1),
(153, 130, 67, 1, '2021-06-28 08:58:57', 573, '2021-06-29', '12:23:00', 'adsd', NULL, NULL, 1),
(154, 131, 65, 1, '2021-08-09 14:09:05', 573, '2021-08-18', '21:23:00', '12asdsada', NULL, NULL, 1),
(155, 132, 64, 1, '2021-11-23 13:45:36', 573, '2021-11-24', '12:23:00', 'adsad', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cambiosprospecto`
--

CREATE TABLE `cambiosprospecto` (
  `nIdCambio` int(11) NOT NULL,
  `nIdProspecto` int(11) NOT NULL,
  `nIdUsuario` int(11) DEFAULT NULL,
  `nIdEtapa` int(11) DEFAULT NULL,
  `sCambio` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `dFechaCreacion` datetime NOT NULL,
  `nEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cambiosprospecto`
--

INSERT INTO `cambiosprospecto` (`nIdCambio`, `nIdProspecto`, `nIdUsuario`, `nIdEtapa`, `sCambio`, `dFechaCreacion`, `nEstado`) VALUES
(639, 60, 66, NULL, 'Se creo el prospecto - 28/02/2021 11:52:36', '2021-02-28 11:52:36', 0),
(640, 60, 66, NULL, 'Se creo 1 cita ', '2021-02-28 11:52:36', 0),
(641, 60, 66, NULL, 'Se actualizo una cita', '2021-02-28 11:52:51', 0),
(642, 60, 66, NULL, 'Se hizo una actualizacion en el campo COMPETENCIA 1 ', '2021-02-28 11:54:06', 0),
(643, 60, 66, NULL, 'Se hizo una actualizacion en el campo SEG1', '2021-02-28 11:54:08', 0),
(644, 61, 66, NULL, 'Se creo el prospecto - 28/02/2021 11:56:03', '2021-02-28 11:56:03', 0),
(645, 61, 66, NULL, 'Se creo 1 cita ', '2021-02-28 11:56:03', 0),
(662, 70, 66, NULL, 'Se creo el prospecto - 28/02/2021 12:11:41', '2021-02-28 12:11:41', 0),
(663, 70, 66, NULL, 'Se creo 1 cita ', '2021-02-28 12:11:41', 0),
(664, 71, 66, NULL, 'Se creo el prospecto - 28/02/2021 12:13:37', '2021-02-28 12:13:37', 0),
(665, 71, 66, NULL, 'Se creo 1 cita ', '2021-02-28 12:13:37', 0),
(666, 61, 66, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-02-28 12:14:00', 0),
(667, 72, 66, NULL, 'Se creo el prospecto - 28/02/2021 12:15:59', '2021-02-28 12:15:59', 0),
(668, 72, 66, NULL, 'Se creo 1 cita ', '2021-02-28 12:15:59', 0),
(687, 82, 66, NULL, 'Se creo el prospecto - 28/02/2021 12:22:35', '2021-02-28 12:22:35', 0),
(688, 82, 66, NULL, 'Se creo 1 cita ', '2021-02-28 12:22:35', 0),
(689, 83, 66, NULL, 'Se creo el prospecto - 28/02/2021 12:25:15', '2021-02-28 12:25:15', 0),
(690, 83, 66, NULL, 'Se creo 1 cita ', '2021-02-28 12:25:15', 0),
(691, 84, 66, NULL, 'Se creo el prospecto - 28/02/2021 12:27:00', '2021-02-28 12:27:00', 0),
(692, 84, 66, NULL, 'Se creo 1 cita ', '2021-02-28 12:27:00', 0),
(693, 85, 66, NULL, 'Se creo el prospecto - 28/02/2021 12:27:52', '2021-02-28 12:27:52', 0),
(694, 85, 66, NULL, 'Se creo 1 cita ', '2021-02-28 12:27:52', 0),
(695, 86, 66, NULL, 'Se creo el prospecto - 28/02/2021 12:28:18', '2021-02-28 12:28:18', 0),
(696, 86, 66, NULL, 'Se creo 1 cita ', '2021-02-28 12:28:18', 0),
(697, 87, 66, NULL, 'Se creo el prospecto - 28/02/2021 12:32:06', '2021-02-28 12:32:06', 0),
(698, 87, 66, NULL, 'Se creo 1 cita ', '2021-02-28 12:32:06', 0),
(699, 87, 66, NULL, 'Se actualizo una cita', '2021-02-28 12:32:16', 0),
(700, 88, 66, NULL, 'Se creo el prospecto - 28/02/2021 12:33:27', '2021-02-28 12:33:27', 0),
(701, 88, 66, NULL, 'Se creo 1 cita ', '2021-02-28 12:33:27', 0),
(702, 88, 66, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-02-28 12:33:52', 0),
(705, 90, 66, NULL, 'Se creo el prospecto - 28/02/2021 12:42:33', '2021-02-28 12:42:33', 0),
(706, 90, 66, NULL, 'Se creo 1 cita ', '2021-02-28 12:42:33', 0),
(707, 91, 66, NULL, 'Se creo el prospecto - 28/02/2021 12:51:44', '2021-02-28 12:51:44', 0),
(708, 91, 66, NULL, 'Se creo 1 cita ', '2021-02-28 12:51:44', 0),
(711, 93, 67, NULL, 'Se creo el prospecto - 28/02/2021 11:17:52', '2021-02-28 23:17:52', 0),
(712, 93, 67, NULL, 'Se creo 1 cita ', '2021-02-28 23:17:52', 0),
(713, 94, 67, NULL, 'Se creo el prospecto - 28/02/2021 11:18:47', '2021-02-28 23:18:47', 0),
(714, 94, 67, NULL, 'Se creo 1 cita ', '2021-02-28 23:18:47', 0),
(715, 94, 67, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-02-28 23:18:57', 0),
(716, 95, 67, NULL, 'Se creo el prospecto - 28/02/2021 11:19:39', '2021-02-28 23:19:39', 0),
(717, 95, 67, NULL, 'Se creo 1 cita ', '2021-02-28 23:19:39', 0),
(718, 95, 67, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-02-28 23:20:02', 0),
(719, 95, 67, NULL, 'Se actualizo una nota', '2021-02-28 23:20:39', 0),
(720, 95, 67, NULL, 'Se actualizo una nota', '2021-02-28 23:20:46', 0),
(721, 95, 67, NULL, 'Se actualizo una nota', '2021-02-28 23:20:51', 0),
(722, 95, 67, NULL, 'Se actualizo una cita', '2021-02-28 23:20:55', 0),
(723, 96, 67, NULL, 'Se creo el prospecto - 28/02/2021 11:21:30', '2021-02-28 23:21:30', 0),
(724, 96, 67, NULL, 'Se creo 1 cita ', '2021-02-28 23:21:30', 0),
(725, 97, 67, NULL, 'Se creo el prospecto - 28/02/2021 11:23:07', '2021-02-28 23:23:07', 0),
(726, 97, 67, NULL, 'Se creo 1 cita ', '2021-02-28 23:23:07', 0),
(727, 97, 67, 6, 'Se cambio de etapa a 0% - Rechazado', '2021-02-28 23:23:15', 0),
(728, 97, 67, NULL, 'Se creo una nueva nota', '2021-02-28 23:23:23', 0),
(729, 98, 69, NULL, 'Se creo el prospecto - 28/02/2021 11:27:23', '2021-02-28 23:27:23', 0),
(730, 98, 69, NULL, 'Se creo 1 cita ', '2021-02-28 23:27:23', 0),
(731, 98, 69, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-02-28 23:27:38', 0),
(732, 99, 69, NULL, 'Se creo el prospecto - 28/02/2021 11:28:17', '2021-02-28 23:28:17', 0),
(733, 99, 69, NULL, 'Se creo 1 cita ', '2021-02-28 23:28:17', 0),
(734, 100, 69, NULL, 'Se creo el prospecto - 28/02/2021 11:30:39', '2021-02-28 23:30:39', 0),
(735, 100, 69, NULL, 'Se creo 1 cita ', '2021-02-28 23:30:39', 0),
(736, 100, 69, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-02-28 23:30:51', 0),
(737, 101, 69, NULL, 'Se creo el prospecto - 28/02/2021 11:33:30', '2021-02-28 23:33:30', 0),
(738, 101, 69, NULL, 'Se creo 1 cita ', '2021-02-28 23:33:30', 0),
(739, 101, 69, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-02-28 23:33:39', 0),
(740, 101, 69, NULL, 'Se actualizo una cita', '2021-02-28 23:35:14', 0),
(741, 101, 69, NULL, 'Se agrego una nueva cita', '2021-02-28 23:35:25', 0),
(742, 101, 69, NULL, 'Se actualizo una cita', '2021-02-28 23:35:28', 0),
(743, 101, 69, 3, 'Se cambio de etapa a 50% - Negociacion ', '2021-02-28 23:35:28', 0),
(744, 101, 69, 4, 'Se cambio de etapa a 90% - En Proceso ', '2021-02-28 23:37:16', 0),
(745, 101, 69, NULL, 'Se agrego el contrato', '2021-02-28 23:37:16', 0),
(746, 101, 69, NULL, 'Se agrego 3 Adjuntos', '2021-02-28 23:37:16', 0),
(747, 101, NULL, 5, 'Se cambio de etapa a 100% - Cierre ', '2021-02-28 23:37:58', 0),
(748, 99, 69, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-02-28 23:39:02', 0),
(749, 99, 69, NULL, 'Se actualizo una cita', '2021-02-28 23:39:08', 0),
(750, 99, 69, NULL, 'Se agrego una nueva cita', '2021-02-28 23:39:19', 0),
(751, 99, 69, NULL, 'Se actualizo una nota', '2021-02-28 23:39:24', 0),
(752, 99, 69, NULL, 'Se creo una nueva nota', '2021-02-28 23:39:27', 0),
(753, 99, 69, NULL, 'Se creo una nueva nota', '2021-02-28 23:39:30', 0),
(754, 99, 69, NULL, 'Se elimino una nota', '2021-02-28 23:39:33', 0),
(755, 100, 69, NULL, 'Se actualizo una cita', '2021-02-28 23:40:40', 0),
(756, 100, 69, NULL, 'Se actualizo una cita', '2021-02-28 23:41:53', 0),
(757, 100, 69, NULL, 'Se agrego una nueva cita', '2021-02-28 23:42:03', 0),
(758, 100, 69, NULL, 'Se actualizo una cita', '2021-02-28 23:42:07', 0),
(759, 100, 69, 3, 'Se cambio de etapa a 50% - Negociacion ', '2021-02-28 23:42:07', 0),
(760, 100, 69, 4, 'Se cambio de etapa a 90% - En Proceso ', '2021-02-28 23:43:24', 0),
(761, 100, 69, NULL, 'Se agrego el contrato', '2021-02-28 23:43:24', 0),
(762, 100, NULL, 5, 'Se cambio de etapa a 100% - Cierre ', '2021-02-28 23:43:51', 0),
(763, 90, 66, NULL, 'Se actualizo una cita', '2021-02-28 23:55:52', 0),
(764, 90, 66, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-02-28 23:56:01', 0),
(765, 90, 66, NULL, 'Se agrego una nueva cita', '2021-02-28 23:56:12', 0),
(766, 90, 66, NULL, 'Se actualizo una cita', '2021-02-28 23:56:15', 0),
(767, 90, 66, 3, 'Se cambio de etapa a 50% - Negociacion ', '2021-02-28 23:56:15', 0),
(768, 90, 66, NULL, 'Se creo una nueva nota', '2021-02-28 23:56:24', 0),
(769, 88, 66, NULL, 'Se actualizo una cita', '2021-02-28 23:59:44', 0),
(770, 88, 66, NULL, 'Se agrego una nueva cita', '2021-03-01 00:00:00', 0),
(771, 88, 66, NULL, 'Se actualizo una cita', '2021-03-01 00:00:03', 0),
(772, 88, 66, 3, 'Se cambio de etapa a 50% - Negociacion ', '2021-03-01 00:00:03', 0),
(773, 72, 66, NULL, 'Se actualizo una cita', '2021-03-01 00:00:23', 0),
(774, 72, 66, NULL, 'Se agrego una nueva cita', '2021-03-01 00:00:34', 0),
(775, 72, 66, NULL, 'Se actualizo una cita', '2021-03-01 00:00:37', 0),
(776, 72, 66, 3, 'Se cambio de etapa a 50% - Negociacion ', '2021-03-01 00:00:37', 0),
(777, 87, 66, NULL, 'Se agrego una nueva cita', '2021-03-01 00:01:24', 0),
(778, 87, 66, NULL, 'Se actualizo una cita', '2021-03-01 00:01:28', 0),
(779, 87, 66, 3, 'Se cambio de etapa a 50% - Negociacion ', '2021-03-01 00:01:28', 0),
(780, 86, 66, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-03-01 00:01:54', 0),
(781, 86, 66, NULL, 'Se actualizo una cita', '2021-03-01 00:02:07', 0),
(782, 86, 66, NULL, 'Se agrego una nueva cita', '2021-03-01 00:02:20', 0),
(783, 86, 66, NULL, 'Se actualizo una cita', '2021-03-01 00:02:22', 0),
(784, 86, 66, 3, 'Se cambio de etapa a 50% - Negociacion ', '2021-03-01 00:02:22', 0),
(785, 60, 66, 6, 'Se cambio de etapa a 0% - Rechazado', '2021-03-01 00:02:44', 0),
(786, 60, 66, NULL, 'Se creo una nueva nota', '2021-03-01 00:02:54', 0),
(787, 61, 66, NULL, 'Se actualizo una cita', '2021-03-01 00:03:12', 0),
(788, 61, 66, NULL, 'Se agrego una nueva cita', '2021-03-01 00:03:21', 0),
(789, 61, 66, NULL, 'Se actualizo una cita', '2021-03-01 00:03:27', 0),
(790, 61, 66, 3, 'Se cambio de etapa a 50% - Negociacion ', '2021-03-01 00:03:27', 0),
(791, 61, 66, NULL, 'Se actualizo una cita', '2021-03-01 00:04:24', 0),
(792, 61, 66, 3, 'Se cambio de etapa a 50% - Negociacion ', '2021-03-01 00:04:24', 0),
(793, 85, 66, NULL, 'Se actualizo una cita', '2021-03-01 00:04:41', 0),
(794, 85, 66, NULL, 'Se agrego una nueva cita', '2021-03-01 00:04:54', 0),
(795, 85, 66, NULL, 'Se actualizo una cita', '2021-03-01 00:04:58', 0),
(796, 85, 66, 3, 'Se cambio de etapa a 50% - Negociacion ', '2021-03-01 00:04:58', 0),
(797, 90, 66, 4, 'Se cambio de etapa a 90% - En Proceso ', '2021-03-01 00:07:27', 0),
(798, 90, 66, NULL, 'Se agrego el contrato', '2021-03-01 00:07:27', 0),
(799, 88, 66, 4, 'Se cambio de etapa a 90% - En Proceso ', '2021-03-01 00:07:49', 0),
(800, 88, 66, NULL, 'Se agrego el contrato', '2021-03-01 00:07:49', 0),
(801, 87, 66, 4, 'Se cambio de etapa a 90% - En Proceso ', '2021-03-01 00:08:08', 0),
(802, 87, 66, NULL, 'Se agrego el contrato', '2021-03-01 00:08:08', 0),
(803, 86, 66, 4, 'Se cambio de etapa a 90% - En Proceso ', '2021-03-01 00:08:32', 0),
(804, 86, 66, NULL, 'Se agrego el contrato', '2021-03-01 00:08:32', 0),
(805, 85, 66, 4, 'Se cambio de etapa a 90% - En Proceso ', '2021-03-01 00:09:11', 0),
(806, 85, 66, NULL, 'Se agrego el contrato', '2021-03-01 00:09:11', 0),
(807, 90, NULL, 5, 'Se cambio de etapa a 100% - Cierre ', '2021-03-01 00:19:57', 0),
(808, 88, NULL, 5, 'Se cambio de etapa a 100% - Cierre ', '2021-03-01 00:20:10', 0),
(809, 86, NULL, 5, 'Se cambio de etapa a 100% - Cierre ', '2021-03-01 00:20:14', 0),
(810, 85, NULL, 5, 'Se cambio de etapa a 100% - Cierre ', '2021-03-01 00:20:24', 0),
(811, 87, NULL, 5, 'Se cambio de etapa a 100% - Cierre ', '2021-03-01 00:20:46', 0),
(812, 102, 70, NULL, 'Se creo el prospecto - 01/03/2021 10:43:42', '2021-03-01 10:43:42', 0),
(813, 102, 70, NULL, 'Se creo 1 cita ', '2021-03-01 10:43:42', 0),
(814, 103, 70, NULL, 'Se creo el prospecto - 01/03/2021 10:44:29', '2021-03-01 10:44:29', 0),
(815, 103, 70, NULL, 'Se creo 1 cita ', '2021-03-01 10:44:29', 0),
(816, 104, 70, NULL, 'Se creo el prospecto - 01/03/2021 10:46:06', '2021-03-01 10:46:06', 0),
(817, 104, 70, NULL, 'Se creo 1 cita ', '2021-03-01 10:46:06', 0),
(818, 104, 70, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-03-01 10:46:17', 0),
(819, 104, 70, NULL, 'Se actualizo una cita', '2021-03-01 10:48:12', 0),
(820, 104, 70, NULL, 'Se actualizo una nota', '2021-03-01 10:48:56', 0),
(821, 104, 70, NULL, 'Se elimino una nota', '2021-03-01 10:49:10', 0),
(822, 104, 70, NULL, 'Se creo una nueva nota', '2021-03-01 10:49:21', 0),
(823, 105, 70, NULL, 'Se creo el prospecto - 01/03/2021 10:50:39', '2021-03-01 10:50:39', 0),
(824, 105, 70, NULL, 'Se creo 1 cita ', '2021-03-01 10:50:39', 0),
(825, 102, 70, 6, 'Se cambio de etapa a 0% - Rechazado', '2021-03-01 10:50:56', 0),
(826, 102, 70, NULL, 'Se creo una nueva nota', '2021-03-01 10:51:07', 0),
(827, 106, 70, NULL, 'Se creo el prospecto - 01/03/2021 10:58:06', '2021-03-01 10:58:06', 0),
(828, 106, 70, NULL, 'Se creo 1 cita ', '2021-03-01 10:58:06', 0),
(829, 106, 70, NULL, 'Se actualizo una cita', '2021-03-01 10:58:21', 0),
(830, 106, 70, NULL, 'Se actualizo una cita', '2021-03-01 10:58:32', 0),
(831, 106, 70, NULL, 'Se creo una nueva nota', '2021-03-01 10:59:04', 0),
(832, 106, 70, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-03-01 10:59:12', 0),
(833, 106, 70, NULL, 'Se actualizo una cita', '2021-03-01 10:59:19', 0),
(834, 107, 70, NULL, 'Se creo el prospecto - 01/03/2021 12:19:56', '2021-03-01 12:19:56', 0),
(835, 107, 70, NULL, 'Se creo 1 cita ', '2021-03-01 12:19:56', 0),
(836, 108, 70, NULL, 'Se creo el prospecto - 01/03/2021 12:22:39', '2021-03-01 12:22:39', 0),
(837, 108, 70, NULL, 'Se creo 1 cita ', '2021-03-01 12:22:39', 0),
(838, 108, 70, NULL, 'Se actualizo una cita', '2021-03-01 12:23:01', 0),
(839, 108, 70, NULL, 'Se actualizo una cita', '2021-03-01 12:23:05', 0),
(840, 108, 70, NULL, 'Se actualizo una cita', '2021-03-01 12:23:17', 0),
(841, 108, 70, NULL, 'Se creo una nueva nota', '2021-03-01 12:23:53', 0),
(842, 108, 70, NULL, 'Se creo una nueva nota', '2021-03-01 12:23:57', 0),
(843, 108, 70, NULL, 'Se creo una nueva nota', '2021-03-01 12:24:03', 0),
(844, 108, 70, NULL, 'Se creo una nueva nota', '2021-03-01 12:24:13', 0),
(845, 108, 70, NULL, 'Se creo una nueva nota', '2021-03-01 12:24:24', 0),
(846, 106, 70, NULL, 'Se creo una nueva nota', '2021-03-01 12:34:11', 0),
(847, 108, 70, NULL, 'Se elimino una nota', '2021-03-01 12:38:44', 0),
(848, 108, 70, NULL, 'Se elimino una nota', '2021-03-01 12:38:47', 0),
(849, 104, 70, NULL, 'Se agrego una nueva cita', '2021-03-01 12:40:00', 0),
(850, 104, 70, NULL, 'Se actualizo una cita', '2021-03-01 12:40:03', 0),
(851, 104, 70, 3, 'Se cambio de etapa a 50% - Negociacion ', '2021-03-01 12:40:03', 0),
(852, 101, NULL, 5, 'Se cambio de etapa a 100% - Cierre ', '2021-03-01 14:04:29', 0),
(853, 109, 72, NULL, 'Se creo el prospecto - 01/03/2021 03:29:06', '2021-03-01 15:29:06', 0),
(854, 109, 72, NULL, 'Se creo 1 cita ', '2021-03-01 15:29:06', 0),
(855, 110, 72, NULL, 'Se creo el prospecto - 01/03/2021 03:33:42', '2021-03-01 15:33:42', 0),
(856, 110, 72, NULL, 'Se creo 1 cita ', '2021-03-01 15:33:42', 0),
(857, 111, 72, NULL, 'Se creo el prospecto - 01/03/2021 04:05:31', '2021-03-01 16:05:31', 0),
(858, 111, 72, NULL, 'Se creo 1 cita ', '2021-03-01 16:05:31', 0),
(859, 111, 72, NULL, 'Se actualizo una cita', '2021-03-02 12:42:34', 0),
(860, 112, 66, NULL, 'Se creo el prospecto - 03/03/2021 12:00:57', '2021-03-03 12:00:57', 0),
(861, 112, 66, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-03-03 12:03:44', 0),
(862, 112, 66, 4, 'Se cambio de etapa a 90% - En Proceso ', '2021-03-03 12:03:54', 0),
(863, 112, 66, NULL, 'Se agrego el contrato', '2021-03-03 12:03:54', 0),
(864, 112, 66, NULL, 'Se agrego 1 Adjuntos', '2021-03-03 12:03:54', 0),
(865, 113, 70, NULL, 'Se creo el prospecto - 03/03/2021 12:33:30', '2021-03-03 12:33:30', 0),
(866, 114, 66, NULL, 'Se creo el prospecto - 04/03/2021 03:22:43', '2021-03-04 15:22:43', 0),
(867, 114, 66, NULL, 'Se creo 1 cita ', '2021-03-04 15:22:43', 0),
(868, 114, 66, NULL, 'Se hizo una actualizacion en el campo SEG1', '2021-03-04 15:22:51', 0),
(869, 115, 66, NULL, 'Se creo el prospecto - 12/03/2021 11:01:02', '2021-03-12 11:01:02', 0),
(870, 115, 66, NULL, 'Se creo 1 cita ', '2021-03-12 11:01:02', 0),
(871, 91, 66, NULL, 'Se actualizo una cita', '2021-03-12 11:01:59', 0),
(872, 72, 66, NULL, 'Se creo una nueva nota', '2021-03-12 12:10:37', 0),
(873, 72, 66, NULL, 'Se creo una nueva nota', '2021-03-12 12:10:39', 0),
(874, 72, 66, NULL, 'Se creo una nueva nota', '2021-03-12 12:10:42', 0),
(875, 72, 66, NULL, 'Se creo una nueva nota', '2021-03-12 12:10:45', 0),
(876, 72, 66, NULL, 'Se elimino una nota', '2021-03-12 12:10:50', 0),
(877, 72, 66, NULL, 'Se elimino una nota', '2021-03-12 12:10:52', 0),
(878, 94, 67, NULL, 'Se creo una nueva nota', '2021-03-12 12:42:20', 0),
(879, 94, 67, NULL, 'Se creo una nueva nota', '2021-03-12 12:42:23', 0),
(880, 94, 67, NULL, 'Se elimino una nota', '2021-03-12 12:42:26', 0),
(881, 94, 67, NULL, 'Se elimino una nota', '2021-03-12 12:42:27', 0),
(882, 94, 67, NULL, 'Se creo una nueva nota', '2021-03-12 12:43:08', 0),
(883, 94, 67, NULL, 'Se elimino una nota', '2021-03-12 12:43:11', 0),
(884, 98, 69, NULL, 'Se creo una nueva nota', '2021-03-12 12:47:33', 0),
(885, 98, 69, NULL, 'Se elimino una nota', '2021-03-12 12:47:38', 0),
(886, 98, 69, NULL, 'Se actualizo una cita', '2021-03-12 12:47:49', 0),
(887, 70, 66, NULL, 'Se creo una nueva nota', '2021-03-12 16:57:00', 0),
(888, 112, NULL, 5, 'Se cambio de etapa a 100% - Cierre ', '2021-03-14 23:38:28', 0),
(889, 100, NULL, 5, 'Se cambio de etapa a 100% - Cierre ', '2021-03-14 23:38:30', 0),
(890, 104, 70, NULL, 'Se agrego 1 Adjuntos', '2021-03-26 10:26:55', 0),
(891, 104, 70, 4, 'Se cambio de etapa a 90% - En Proceso ', '2021-03-26 11:48:58', 0),
(892, 104, 70, NULL, 'Se actualizo el contrato', '2021-03-26 11:48:58', 0),
(893, 116, 66, NULL, 'Se creo el prospecto - 26/03/2021 01:50:30', '2021-03-26 13:50:30', 0),
(894, 116, 66, NULL, 'Se creo 1 cita ', '2021-03-26 13:50:30', 0),
(895, 116, 66, NULL, 'Se hizo una actualizacion en el campo prueba', '2021-03-26 13:50:36', 0),
(896, 116, 66, NULL, 'Se hizo una actualizacion en el campo prueba', '2021-03-26 13:50:41', 0),
(897, 116, 66, NULL, 'Se hizo una actualizacion en el campo prueba', '2021-03-26 13:50:42', 0),
(898, 117, 66, NULL, 'Se creo el prospecto - 26/03/2021 02:06:08', '2021-03-26 14:06:08', 0),
(899, 117, 66, NULL, 'Se creo 1 cita ', '2021-03-26 14:06:08', 0),
(900, 117, 66, NULL, 'Se hizo una actualizacion en el campo prueba', '2021-03-26 14:06:25', 0),
(901, 117, 66, NULL, 'Se hizo una actualizacion en el campo prueba2', '2021-03-26 14:06:27', 0),
(902, 117, 66, NULL, 'Se hizo una actualizacion en el campo prueba2', '2021-03-26 14:06:29', 0),
(903, 117, 66, NULL, 'Se hizo una actualizacion en el campo prueba2', '2021-03-26 14:06:30', 0),
(904, 117, 66, NULL, 'Se hizo una actualizacion en el campo prueba2', '2021-03-26 14:06:39', 0),
(905, 118, 66, NULL, 'Se creo el prospecto - 26/03/2021 02:27:17', '2021-03-26 14:27:17', 0),
(906, 118, 66, NULL, 'Se creo 1 cita ', '2021-03-26 14:27:17', 0),
(907, 106, 70, NULL, 'Se hizo una actualizacion en el campo prueba3', '2021-03-26 15:48:00', 0),
(908, 115, 66, NULL, 'Se hizo una actualizacion en el campo prueba3', '2021-03-26 16:22:55', 0),
(909, 115, 66, NULL, 'Se hizo una actualizacion en el campo prueba2', '2021-03-26 16:22:57', 0),
(910, 115, 66, NULL, 'Se hizo una actualizacion en el campo prueba', '2021-03-26 16:22:59', 0),
(911, 118, 66, NULL, 'Se elimino una nota', '2021-03-26 17:50:22', 0),
(912, 118, 66, NULL, 'Se elimino una nota', '2021-03-26 17:50:24', 0),
(913, 118, 66, NULL, 'Se elimino una nota', '2021-03-26 17:50:26', 0),
(914, 118, 66, NULL, 'Se elimino una nota', '2021-03-26 17:50:51', 0),
(915, 118, 66, NULL, 'Se elimino una nota', '2021-03-26 17:51:25', 0),
(916, 118, 66, NULL, 'Se elimino una nota', '2021-03-26 17:53:23', 0),
(917, 118, 66, NULL, 'Se elimino una nota', '2021-03-26 17:58:01', 0),
(918, 118, 66, NULL, 'Se elimino una nota', '2021-03-26 17:58:02', 0),
(919, 118, 66, NULL, 'Se elimino una nota', '2021-03-26 17:58:04', 0),
(920, 118, 66, NULL, 'Se hizo una actualizacion en el campo prueba', '2021-03-26 18:07:58', 0),
(921, 118, 66, NULL, 'Se hizo una actualizacion en el campo prueba', '2021-03-26 18:08:00', 0),
(922, 118, 66, NULL, 'Se hizo una actualizacion en el campo prueba2', '2021-03-26 18:08:02', 0),
(923, 118, 66, NULL, 'Se hizo una actualizacion en el campo prueba3', '2021-03-26 18:08:04', 0),
(924, 118, 66, NULL, 'Se elimino una nota', '2021-03-26 18:08:14', 0),
(925, 118, 66, NULL, 'Se elimino una nota', '2021-03-26 18:08:16', 0),
(926, 106, 70, NULL, 'Se hizo una actualizacion en el campo prueba', '2021-03-26 18:16:55', 0),
(927, 106, 70, NULL, 'Se elimino una nota', '2021-03-26 18:17:07', 0),
(928, 118, 66, 6, 'Se cambio de etapa a 0% - Rechazado', '2021-03-26 18:29:36', 0),
(929, 117, 66, NULL, 'Se hizo una actualizacion en el campo prueba', '2021-03-26 18:29:51', 0),
(930, 117, 66, 6, 'Se cambio de etapa a 0% - Rechazado', '2021-03-26 18:29:53', 0),
(931, 116, 66, 6, 'Se cambio de etapa a 0% - Rechazado', '2021-03-26 18:30:36', 0),
(932, 116, 66, 6, 'Se cambio de etapa a 0% - Rechazado', '2021-03-26 18:30:45', 0),
(933, 96, 67, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-05-12 10:23:02', 0),
(934, 96, 67, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-05-12 10:23:34', 0),
(935, 119, 67, NULL, 'Se creo el prospecto - 14/05/2021 11:35:31', '2021-05-14 11:35:31', 0),
(936, 119, 67, NULL, 'Se creo 1 cita ', '2021-05-14 11:35:31', 0),
(937, 119, 67, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-05-14 11:35:51', 0),
(938, 119, 67, NULL, 'Se actualizo una cita', '2021-05-14 11:36:07', 0),
(939, 119, 67, NULL, 'Se agrego una nueva cita', '2021-05-14 11:36:16', 0),
(940, 119, 67, NULL, 'Se actualizo una cita', '2021-05-14 11:36:20', 0),
(941, 119, 67, 3, 'Se cambio de etapa a 50% - Negociacion ', '2021-05-14 11:36:20', 0),
(942, 119, 67, 4, 'Se cambio de etapa a 90% - En Proceso ', '2021-05-14 11:36:36', 0),
(943, 119, 67, NULL, 'Se agrego el contrato', '2021-05-14 11:36:37', 0),
(944, 120, 67, NULL, 'Se creo el prospecto - 14/05/2021 12:52:17', '2021-05-14 12:52:17', 0),
(945, 120, 67, NULL, 'Se creo 1 cita ', '2021-05-14 12:52:17', 0),
(946, 120, 67, NULL, 'Se actualizo una cita', '2021-05-14 13:04:10', 0),
(947, 120, 67, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-05-14 13:04:20', 0),
(948, 120, 67, NULL, 'Se agrego una nueva cita', '2021-05-14 13:04:43', 0),
(949, 120, 67, NULL, 'Se actualizo una cita', '2021-05-14 13:04:48', 0),
(950, 120, 67, 3, 'Se cambio de etapa a 50% - Negociacion ', '2021-05-14 13:04:48', 0),
(951, 120, 67, 4, 'Se cambio de etapa a 90% - En Proceso ', '2021-05-14 13:05:00', 0),
(952, 120, 67, NULL, 'Se agrego el contrato', '2021-05-14 13:05:00', 0),
(953, 120, NULL, 5, 'Se cambio de etapa a 100% - Cierre ', '2021-05-14 13:06:21', 0),
(954, 94, 67, 6, 'Se cambio de etapa a 0% - Rechazado', '2021-05-14 13:10:24', 0),
(955, 121, 67, NULL, 'Se creo el prospecto - 01/06/2021 12:14:55', '2021-06-01 12:14:55', 0),
(956, 121, 67, NULL, 'Se creo 1 cita ', '2021-06-01 12:14:55', 0),
(957, 122, 67, NULL, 'Se creo el prospecto - 01/06/2021 12:15:40', '2021-06-01 12:15:40', 0),
(958, 122, 67, NULL, 'Se creo 1 cita ', '2021-06-01 12:15:40', 0),
(959, 106, 70, NULL, 'Se actualizo una cita', '2021-06-02 16:30:50', 0),
(960, 106, 70, NULL, 'Se agrego una nueva cita', '2021-06-02 16:30:56', 0),
(961, 106, 70, NULL, 'Se actualizo una cita', '2021-06-02 16:31:00', 0),
(962, 106, 70, 3, 'Se cambio de etapa a 50% - Negociacion ', '2021-06-02 16:31:00', 0),
(963, 122, 67, 6, 'Se cambio de etapa a 0% - Rechazado', '2021-06-03 17:52:50', 0),
(964, 121, 67, NULL, 'Se actualizo una cita', '2021-06-09 19:34:16', 0),
(965, 121, 67, NULL, 'Se agrego una nueva cita', '2021-06-09 19:34:23', 0),
(966, 123, 67, NULL, 'Se creo el prospecto - 09/06/2021 08:24:57', '2021-06-09 20:24:57', 0),
(967, 123, 67, NULL, 'Se creo 1 cita ', '2021-06-09 20:24:57', 0),
(968, 123, 67, NULL, 'Se hizo una actualizacion en el campo prueba', '2021-06-09 20:38:27', 0),
(969, 123, 67, NULL, 'Se actualizo una cita', '2021-06-10 17:55:46', 0),
(970, 123, 67, NULL, 'Se actualizo una cita', '2021-06-10 17:55:51', 0),
(971, 121, 67, NULL, 'Se hizo una actualizacion en el campo COMPETENCIA 1 ', '2021-06-13 11:27:20', 0),
(972, 121, 67, NULL, 'Se hizo una actualizacion en el campo prueba', '2021-06-13 12:09:33', 0),
(973, 124, 67, NULL, 'Se creo el prospecto - 16/06/2021 11:17:02', '2021-06-16 23:17:02', 0),
(974, 124, 67, NULL, 'Se creo 1 cita ', '2021-06-16 23:17:02', 0),
(975, 124, 67, NULL, 'Se agrego una nueva cita', '2021-06-16 23:18:43', 0),
(976, 124, 67, NULL, 'Se agrego una nueva cita', '2021-06-16 23:19:20', 0),
(977, 124, 67, NULL, 'Se agrego una nueva cita', '2021-06-16 23:22:35', 0),
(978, 124, 67, NULL, 'Se elimino una cita', '2021-06-16 23:29:22', 0),
(979, 124, 67, NULL, 'Se elimino una cita', '2021-06-16 23:29:24', 0),
(980, 124, 67, NULL, 'Se elimino una cita', '2021-06-16 23:29:28', 0),
(981, 125, 67, NULL, 'Se creo el prospecto - 17/06/2021 01:42:07', '2021-06-17 13:42:07', 0),
(982, 125, 67, NULL, 'Se creo 1 cita ', '2021-06-17 13:42:07', 0),
(983, 96, 67, NULL, 'Se hizo una actualizacion en el campo prueba3', '2021-06-17 14:09:42', 0),
(984, 96, 67, NULL, 'Se hizo una actualizacion en el campo prueba3', '2021-06-17 14:09:44', 0),
(985, 126, 67, NULL, 'Se creo el prospecto - 18/06/2021 05:45:30', '2021-06-18 17:45:30', 0),
(986, 126, 67, NULL, 'Se creo 1 cita ', '2021-06-18 17:45:30', 0),
(987, 126, 67, NULL, 'Se actualizo una cita', '2021-06-18 17:45:55', 0),
(988, 126, 67, NULL, 'Se agrego una nueva cita', '2021-06-18 17:46:25', 0),
(989, 126, 67, NULL, 'Se actualizo una cita', '2021-06-18 17:46:32', 0),
(990, 126, 67, 3, 'Se cambio de etapa a 50% - Negociacion ', '2021-06-18 17:46:32', 0),
(991, 124, 67, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-06-18 17:47:04', 0),
(992, 127, 67, NULL, 'Se creo el prospecto - 18/06/2021 05:48:21', '2021-06-18 17:48:21', 1),
(993, 127, 67, NULL, 'Se creo 1 cita ', '2021-06-18 17:48:21', 1),
(994, 127, 67, NULL, 'Se actualizo una cita', '2021-06-18 17:48:36', 1),
(995, 127, 67, 2, 'Se cambio de etapa a 25% - Envio de presupuesto ', '2021-06-18 17:48:41', 1),
(996, 127, 67, NULL, 'Se agrego una nueva cita', '2021-06-18 17:51:08', 1),
(997, 127, 67, NULL, 'Se actualizo una cita', '2021-06-18 17:51:14', 1),
(998, 127, 67, 3, 'Se cambio de etapa a 50% - Negociacion ', '2021-06-18 17:51:14', 1),
(999, 127, 67, 4, 'Se cambio de etapa a 90% - En Proceso ', '2021-06-18 17:51:22', 1),
(1000, 127, 67, NULL, 'Se agrego el contrato', '2021-06-18 17:51:22', 1),
(1001, 124, 67, NULL, 'Se actualizo una cita', '2021-06-18 19:13:32', 0),
(1002, 125, 70, NULL, 'Se actualizo una cita', '2021-06-22 17:08:30', 0),
(1003, 121, 67, NULL, 'Se actualizo una cita', '2021-06-23 11:45:15', 0),
(1004, 121, 67, NULL, 'Se elimino un producto o servicio', '2021-06-23 11:48:24', 0),
(1005, 93, 67, NULL, 'Se actualizo una cita', '2021-06-23 11:53:41', 0),
(1006, 127, NULL, 5, 'Se cambio de etapa a 100% - Cierre ', '2021-06-23 13:45:01', 1),
(1007, 119, NULL, 5, 'Se cambio de etapa a 100% - Cierre ', '2021-06-23 13:45:06', 0),
(1008, 128, 67, NULL, 'Se creo el prospecto - 23/06/2021 01:59:19', '2021-06-23 13:59:19', 1),
(1009, 128, 67, NULL, 'Se creo 1 cita ', '2021-06-23 13:59:19', 1),
(1010, 129, 67, NULL, 'Se creo el prospecto - 27/06/2021 03:40:36', '2021-06-27 15:40:36', 1),
(1011, 129, 67, NULL, 'Se creo 1 cita', '2021-06-27 15:40:36', 1),
(1012, 130, 67, NULL, 'Se creo el prospecto - 28/06/2021 08:58:57', '2021-06-28 08:58:57', 1),
(1013, 130, 67, NULL, 'Se creo 1 cita', '2021-06-28 08:58:57', 1),
(1014, 131, 65, NULL, 'Se creo el prospecto - 09/08/2021 02:09:05', '2021-08-09 14:09:05', 0),
(1015, 131, 65, NULL, 'Se creo 1 cita', '2021-08-09 14:09:05', 0),
(1016, 132, 64, NULL, 'Se creo el prospecto - 23/11/2021 01:45:36', '2021-11-23 13:45:36', 1),
(1017, 132, 64, NULL, 'Se creo 1 cita', '2021-11-23 13:45:36', 1),
(1018, 126, 67, NULL, 'Se agrego 1 Adjuntos', '2021-11-23 16:42:47', 1),
(1019, 126, 67, NULL, 'Se agrego 1 Adjuntos', '2021-11-23 16:43:03', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `campos`
--

CREATE TABLE `campos` (
  `nIdCampo` int(11) NOT NULL COMMENT 'Id Unico e incrementable',
  `sNombre` varchar(50) NOT NULL COMMENT 'Este campo es el que sistema usuara',
  `sNombreUsuario` varchar(50) NOT NULL COMMENT 'Este campo es que el usuario vera',
  `sPlaceHolder` varchar(50) DEFAULT NULL,
  `nTipoCampo` int(11) DEFAULT NULL,
  `sNombreConfig` varchar(250) DEFAULT NULL,
  `nTamano` int(2) NOT NULL,
  `nEstado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `campos`
--

INSERT INTO `campos` (`nIdCampo`, `sNombre`, `sNombreUsuario`, `sPlaceHolder`, `nTipoCampo`, `sNombreConfig`, `nTamano`, `nEstado`) VALUES
(1, 'nTipoDocumento', 'Tipo Documento', NULL, 2, 'TIPO_DOCUMENTO_IDENTIDAD', 6, 1),
(2, 'sNumeroDocumento', 'Numero de documento', NULL, 1, '', 6, 1),
(3, 'sNombre', 'Nombre', NULL, 1, '', 6, 1),
(6, 'sContacto', 'Contacto', NULL, 1, '', 6, 1),
(7, 'sCorreo', 'Correo', NULL, 1, NULL, 12, 1),
(8, 'nIdDistrito', 'Distrito', '', 2, 'UBIGEO_DISTRITO', 4, 1),
(9, 'sTelefono', 'Telefono', '', 5, '', 6, 1),
(10, 'nIdRelacionamiento', 'Relacionamiento', '', 2, 'TIPO_RELACIONAMIENTO', 6, 1),
(11, 'nTipoItem', 'Tipo Item', NULL, 2, 'TIPO_ITEM', 6, 1),
(12, 'nPrecio', 'Precio', NULL, 1, NULL, 6, 1),
(13, 'sDescripcion', 'Descripcion', NULL, 4, NULL, 12, 1),
(14, 'dFechaNacimiento', 'Fecha Nacimiento', 'dd/mm/yyyy', 6, '', 6, 1),
(15, 'nCantidadPersonasDependientes', 'Cantidad de personas dependientes', '0', 1, '', 6, 1),
(16, 'nExperienciaVentas', 'Experiencia en ventas', '', 2, 'CONDICIONAL', 6, 1),
(17, 'sRubroExperiencia', 'Rubro experiencia', 'Ej: Rubro de comida', 1, '', 6, 1),
(18, 'nIdEstudios', 'Estudios', NULL, 2, 'NIVEL_EDUCACION', 6, 1),
(19, 'nIdSituacionEstudios', 'Situacion Estudios', NULL, 2, 'SITUACION_ESTUDIO', 6, 1),
(20, 'sCarreraCiclo', 'Carrera y ciclo', NULL, 1, '', 6, 1),
(21, 'nEstado', 'Estado', NULL, 2, 'ESTADO', 6, 1),
(22, 'nIdDepartamento', 'Departamento', '', 2, 'UBIGEO_DEPARTAMENTO', 4, 1),
(23, 'nIdProvincia', 'Provincia', '', 2, 'UBIGEO_PROVINCIA', 4, 1),
(24, 'sNombreoRazonSocial', 'Nombre o Razon Social', NULL, 1, '', 6, 1),
(25, 'sClave', 'Contraseña', NULL, 1, '', 6, 1),
(26, 'sDireccion', 'Direccion', NULL, 1, NULL, 12, 1),
(27, 'sImagen', 'Imagen', 'Recomendado 128px x 128px', 8, NULL, 12, 1),
(28, 'nIdSexo', 'Sexo', '', 2, 'SEXO', 6, 1),
(29, 'nIdEstadoCivil', 'Estado civil', '', 2, 'ESTADO_CIVIL', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camposentidades`
--

CREATE TABLE `camposentidades` (
  `nIdCampoEntidad` int(11) NOT NULL,
  `nIdCampo` int(11) NOT NULL,
  `nIdEntidad` int(11) NOT NULL,
  `nOrden` int(11) NOT NULL,
  `nOrdenTabla` int(11) DEFAULT NULL,
  `nEstado` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `camposentidades`
--

INSERT INTO `camposentidades` (`nIdCampoEntidad`, `nIdCampo`, `nIdEntidad`, `nOrden`, `nOrdenTabla`, `nEstado`) VALUES
(1, 1, 1, 1, 1, 1),
(2, 2, 1, 2, 2, 1),
(7, 6, 1, 4, 4, 1),
(8, 7, 1, 5, 5, 1),
(9, 8, 1, 8, 8, 1),
(10, 9, 1, 10, 11, 1),
(11, 10, 1, 11, 10, 1),
(12, 3, 2, 1, 1, 1),
(13, 11, 2, 2, 2, 1),
(14, 12, 2, 3, 3, 1),
(15, 13, 2, 5, 5, 1),
(16, 1, 3, 1, 1, 1),
(17, 2, 3, 2, 2, 1),
(19, 3, 3, 3, 3, 1),
(21, 14, 3, 5, 5, 1),
(22, 15, 3, 6, 6, 1),
(23, 16, 3, 9, 9, 1),
(24, 17, 3, 10, 10, 1),
(25, 18, 3, 11, 11, 1),
(26, 19, 3, 12, 12, 1),
(27, 20, 3, 13, 13, 1),
(28, 1, 4, 1, 1, 1),
(29, 2, 4, 2, 2, 1),
(30, 3, 4, 3, 3, 1),
(32, 14, 4, 4, 4, 1),
(33, 15, 4, 5, 5, 1),
(34, 18, 4, 8, 8, 1),
(35, 19, 4, 9, 9, 1),
(36, 20, 4, 10, 10, 1),
(37, 21, 1, 12, 12, 1),
(38, 21, 3, 15, 16, 1),
(39, 21, 4, 14, 14, 1),
(40, 21, 2, 6, 6, 1),
(41, 22, 1, 6, 6, 1),
(42, 23, 1, 7, 7, 1),
(43, 24, 1, 3, 3, 1),
(46, 25, 3, 16, 15, 1),
(47, 7, 3, 4, 4, 1),
(48, 26, 1, 9, 9, 1),
(49, 27, 3, 14, 14, 1),
(50, 27, 4, 11, 11, 1),
(51, 28, 3, 7, 7, 1),
(52, 29, 3, 8, 8, 1),
(53, 28, 4, 7, 7, 1),
(54, 29, 4, 6, 6, 1),
(55, 27, 2, 4, 4, 1),
(56, 7, 4, 12, 12, 1),
(59, 25, 4, 13, 13, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogo`
--

CREATE TABLE `catalogo` (
  `nIdCatalogo` int(11) NOT NULL,
  `nIdNegocio` int(11) NOT NULL,
  `sNombre` varchar(150) DEFAULT NULL,
  `nTipoItem` int(11) DEFAULT NULL,
  `nPrecio` decimal(9,2) DEFAULT NULL,
  `sDescripcion` varchar(250) DEFAULT NULL,
  `sImagen` varchar(250) DEFAULT NULL,
  `nEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `catalogo`
--

INSERT INTO `catalogo` (`nIdCatalogo`, `nIdNegocio`, `sNombre`, `nTipoItem`, `nPrecio`, `sDescripcion`, `sImagen`, `nEstado`) VALUES
(31, 67, 'SERVICIO \'1 Q\"HAWA¿\'Y \"\"\'', 216, '350.00', 'ESTE SERVICIO 1 DE LA EMPRESA QHAAE .PE\r\n\r\nAD\'APSD\'ASDA\r\n\'ASD\'ASD\r\n\'ASD\'S´¿¿¿ **** \"´¿¿¿ \'\' \"\"\r\n\r\nDAS\r\nD\r\nAS\r\nD', '60d21a045a87e.png', 1),
(32, 67, 'SERVICIO 2 QHAT PE', 216, '100.00', NULL, NULL, 1),
(33, 67, 'SERVICIO 3 QWAY PE', 216, '120.00', ' ', NULL, 0),
(34, 67, 'SERVICIO 4', 216, '500.00', NULL, NULL, 0),
(35, 67, 'SERVICIO 5', 216, '50.00', NULL, NULL, 1),
(36, 67, 'SERVICIO 7', 216, '740.00', '\n', NULL, 1),
(37, 67, 'SERVICIO 8', 216, '150.00', NULL, NULL, 1),
(38, 67, 'PRODUCTO 1', 215, '50.00', 'ASD', NULL, 1),
(39, 67, 'PRODUCTO 2', 215, '140.00', NULL, NULL, 1),
(40, 67, 'PRODUCTO 3 ', 215, '10.00', ' ', NULL, 1),
(41, 67, 'PRODUCTO 4', 215, '50.00', NULL, NULL, 1),
(42, 67, '\'\'\'\"#\"#\'ADASD¡??--', 215, '222.00', 'ASDAS\r\nAS\'D\'AD0ASD0ASD\r\nA0DAS0DIA022\'\'\'\"\"!\r\n\r\n{{{ ññ ñññ\r\nasdad\r\n', NULL, 1),
(43, 67, 'asdasd', 215, '22.00', 'ASDASD', '60d219fc6c585.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalogotabla`
--

CREATE TABLE `catalogotabla` (
  `nIdCatalogoTabla` int(5) NOT NULL COMMENT 'Identificador único, sin signo y autoincrementable',
  `nIdCatalogoTablaPadre` int(5) DEFAULT NULL COMMENT 'Identificador del item de una tabla que tiene sub items o sub elementos. Como el tipo de Nota de Credito, Tipo de Nota de Debito o Tipo de Guia de Remision',
  `sNombreCatalogo` varchar(100) NOT NULL DEFAULT '' COMMENT 'Nombre de la tabla o item SUNAT o de dominio. Los valores pueden ser: "Tipo Comprobante", "Tipo Existencia", "Tipo Documento Identidad", "Tipo Nota Credito", "Tipo Nota Debito", etc.',
  `sCodigoItem` varchar(10) NOT NULL DEFAULT '' COMMENT 'Código asignado por la SUNAT al registro de cada tabla. Los posibles valores para la tabla "Tipo Documento Identidad" pueden ser 0 = Otros tipos de documentos, 1 = Documento Nacional de Identidad, etc.',
  `sDescripcionCortaItem` varchar(20) DEFAULT NULL COMMENT 'Descripción resumida del item de la tabla. Por defecto NULL',
  `sDescripcionLargaItem` varchar(300) NOT NULL COMMENT 'Descripción larga (SUNAT) del item de la tabla',
  `sTipoItem` char(1) NOT NULL DEFAULT '1' COMMENT 'Identificador del tipo de Item o registro. Sus posibles valores son "1" = Tributarios u Oficiales y "2" = Internos o no oficiales. El valor por defectos es "1"',
  `sMostrarCliente` char(1) NOT NULL DEFAULT '0' COMMENT 'Indica que el documento puede ser visto o no por el Cliente desde el modulo de consulta de clientes. Sus posibles valores son "0"=No mostrar y "1"=Mostrar. El valor por defecto es "0"=No mostrar',
  `sDefecto` char(1) NOT NULL DEFAULT '0' COMMENT 'Indicador de item por defecto para la tabla. Sus posibles valores son: "1"=Defecto, "0"=No. Por defecto "0".',
  `sDetalleItem` text DEFAULT NULL COMMENT 'Detalle descriptivo del item. Por defecto NULL.',
  `sEstado` char(1) NOT NULL DEFAULT '1' COMMENT 'Estado del registro. ''''1'''' = Activo y disponible para el resto del sistema, ''''0''''= Inactivo y no disponible para el resto del sistema. Los nuevos registros tienene por defecto el valor "1".',
  `nOrden` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Almacena datos relacionados con catalogo Sunat';

--
-- Volcado de datos para la tabla `catalogotabla`
--

INSERT INTO `catalogotabla` (`nIdCatalogoTabla`, `nIdCatalogoTablaPadre`, `sNombreCatalogo`, `sCodigoItem`, `sDescripcionCortaItem`, `sDescripcionLargaItem`, `sTipoItem`, `sMostrarCliente`, `sDefecto`, `sDetalleItem`, `sEstado`, `nOrden`) VALUES
(1, NULL, 'TIPO_COMPROBANTE', '01', 'FAC', 'FACTURA', '2', '0', '0', NULL, '1', NULL),
(2, NULL, 'TIPO_COMPROBANTE', '03', 'BOL', 'BOLETA DE VENTA', '2', '0', '0', NULL, '1', NULL),
(3, NULL, 'TIPO_COMPROBANTE', '07', 'N/C', 'NOTA DE CREDITO', '2', '0', '0', NULL, '1', NULL),
(4, NULL, 'TIPO_COMPROBANTE', '08', 'N/D', 'NOTA DE DEBITO', '2', '0', '0', NULL, '1', NULL),
(5, NULL, 'TIPO_COMPROBANTE', '09', 'GRR', 'GUIA DE REMISION REMITENTE', '2', '0', '0', NULL, '1', NULL),
(6, NULL, 'TIPO_COMPROBANTE', '12', 'TKT', 'TICKET O CINTA EMITIDO POR MAQUINA REGISTRADORA', '2', '0', '0', NULL, '0', NULL),
(7, NULL, 'TIPO_COMPROBANTE', '31', 'GRT', 'GUIA DE REMISION TRANSPORTISTA', '2', '0', '0', NULL, '1', NULL),
(8, NULL, 'TIPO_EXISTENCIA', '01', 'MRC', 'MERCADERIA', '2', '0', '0', NULL, '1', NULL),
(9, NULL, 'TIPO_EXISTENCIA', '02', 'PRD.TRM', 'PRODUCTO TERMINADO', '2', '0', '0', NULL, '1', NULL),
(10, NULL, 'TIPO_EXISTENCIA', '03', 'MPR.MAT', 'MATERIAS PRIMAS Y AUXILIARES MATERIALES', '2', '0', '0', NULL, '1', NULL),
(11, NULL, 'TIPO_EXISTENCIA', '04', 'ENV.EMB', 'ENVASES Y EMBALAJES', '2', '0', '0', NULL, '1', NULL),
(12, NULL, 'TIPO_EXISTENCIA', '05', 'SUM.DIV', 'SUMINISTROS DIVERSOS', '2', '0', '0', NULL, '1', NULL),
(13, NULL, 'TIPO_EXISTENCIA', '99', 'OTR', 'OTROS (ESPECIFICAR)', '2', '0', '0', NULL, '1', NULL),
(14, NULL, 'TIPO_EXISTENCIA', '98', 'NGN', 'NINGUNO', '2', '0', '0', NULL, '1', NULL),
(16, NULL, 'ENTIDAD_FINANCIERA', '02', 'BCP', 'BANCO DE CREDITO DEL PERU', '2', '0', '0', NULL, '1', NULL),
(17, NULL, 'ENTIDAD_FINANCIERA', '03', 'INTERBANK', 'BANCO INTERNACIONAL DEL PERU', '2', '0', '0', NULL, '1', NULL),
(18, NULL, 'ENTIDAD_FINANCIERA', '05', 'LATINO', 'BANCO LATINO', '2', '0', '0', NULL, '0', NULL),
(19, NULL, 'ENTIDAD_FINANCIERA', '07', 'CITIBANK', 'BANCO CITIBANK DEL PERU S.A.', '2', '0', '0', NULL, '0', NULL),
(20, NULL, 'ENTIDAD_FINANCIERA', '08', 'STANDARD', 'STANDARD CHARTERED', '2', '0', '0', NULL, '0', NULL),
(21, NULL, 'ENTIDAD_FINANCIERA', '09', 'SCOTIABANK', 'BANCO SCOTIABANK PERU', '2', '0', '0', NULL, '1', NULL),
(22, NULL, 'ENTIDAD_FINANCIERA', '11', 'BBVA', 'BANCO CONTINENTAL', '2', '0', '0', NULL, '1', NULL),
(23, NULL, 'ENTIDAD_FINANCIERA', '12', 'BDL', 'BANCO DE LIMA', '2', '0', '0', NULL, '0', NULL),
(24, NULL, 'ENTIDAD_FINANCIERA', '16', 'MERCANTIL', 'BANCO MERCANTIL', '2', '0', '0', NULL, '0', NULL),
(25, NULL, 'ENTIDAD_FINANCIERA', '18', 'BNP', 'BANCO DE LA NACION', '2', '0', '0', NULL, '1', NULL),
(26, NULL, 'ENTIDAD_FINANCIERA', '22', 'HISPANO', 'BANCO SANTANDER CENTRAL HISPANO', '2', '0', '0', NULL, '0', NULL),
(28, NULL, 'ENTIDAD_FINANCIERA', '25', 'REPUBLICA', 'BANCO REPUBLICA', '2', '0', '0', NULL, '0', NULL),
(29, NULL, 'ENTIDAD_FINANCIERA', '26', 'NBK', 'NBK BANK', '2', '0', '0', NULL, '0', NULL),
(31, NULL, 'ENTIDAD_FINANCIERA', '35', 'FINANCIERO', 'BANCO FINANCIERO DEL PERU', '2', '0', '0', NULL, '1', NULL),
(32, NULL, 'ENTIDAD_FINANCIERA', '37', 'PROGRESO', 'BANCO DEL PROGRESO', '2', '0', '0', NULL, '0', NULL),
(33, NULL, 'ENTIDAD_FINANCIERA', '38', 'INTERAMERICANO', 'BANCO INTERAMERICANO DE FINANZAS', '2', '0', '0', NULL, '0', NULL),
(34, NULL, 'ENTIDAD_FINANCIERA', '39', 'BANEX', 'BANCO BANEX', '2', '0', '0', NULL, '0', NULL),
(35, NULL, 'ENTIDAD_FINANCIERA', '40', 'NUEVOMUNDO', 'BANCO NUEVO MUNDO', '2', '0', '0', NULL, '0', NULL),
(36, NULL, 'ENTIDAD_FINANCIERA', '41', 'SUDAMERICANO', 'BANCO SUDAMERICANO', '2', '0', '0', NULL, '0', NULL),
(37, NULL, 'ENTIDAD_FINANCIERA', '42', 'LIBERTADOR', 'BANCO DEL LIBERTADOR', '2', '0', '0', NULL, '0', NULL),
(38, NULL, 'ENTIDAD_FINANCIERA', '43', 'BDT', 'BANCO DEL TRABAJO', '2', '0', '0', NULL, '0', NULL),
(39, NULL, 'ENTIDAD_FINANCIERA', '44', 'SOLVENTA', 'BANCO SOLVENTA', '2', '0', '0', NULL, '0', NULL),
(40, NULL, 'ENTIDAD_FINANCIERA', '45', 'SERBANCO', 'BANCO SERBANCO SA.', '2', '0', '0', NULL, '0', NULL),
(41, NULL, 'ENTIDAD_FINANCIERA', '46', 'BOB', 'BANCO BANK OF BOSTON', '2', '0', '0', NULL, '0', NULL),
(42, NULL, 'ENTIDAD_FINANCIERA', '47', 'ORION', 'BANCO ORION', '2', '0', '0', NULL, '0', NULL),
(43, NULL, 'ENTIDAD_FINANCIERA', '48', 'BDP', 'BANO DEL PAIS', '2', '0', '0', NULL, '0', NULL),
(44, NULL, 'ENTIDAD_FINANCIERA', '49', 'MIBANCO', 'BANCO MI BANCO', '2', '0', '0', NULL, '0', NULL),
(45, NULL, 'ENTIDAD_FINANCIERA', '50', 'PARIBAS', 'BANCO BNP PARIBAS', '2', '0', '0', NULL, '0', NULL),
(48, NULL, 'ENTIDAD_FINANCIERA', '54', 'FALABELLA', 'BANCO FALABELLA S.A.', '2', '0', '0', NULL, '1', NULL),
(49, NULL, 'ENTIDAD_FINANCIERA', '55', 'RIPLEY', 'BANCO RIPLEY', '2', '0', '0', NULL, '1', NULL),
(50, NULL, 'ENTIDAD_FINANCIERA', '56', 'SANTANDER', 'BANCO SANTANDER PERU S.A.', '2', '0', '0', NULL, '1', NULL),
(51, NULL, 'ENTIDAD_FINANCIERA', '58', 'AZTECA', 'BANCO AZTECA DEL PERU', '2', '0', '0', NULL, '1', NULL),
(52, NULL, 'ENTIDAD_FINANCIERA', '99', 'OTR', 'OTROS BANCOS', '2', '0', '0', NULL, '0', NULL),
(53, NULL, 'TIPO_CUENTA_BANCARIA', '1', 'AHORRO', 'CUENTA DE AHORROS', '2', '0', '0', NULL, '1', NULL),
(54, NULL, 'TIPO_CUENTA_BANCARIA', '2', 'CTA.CTE', 'CUENTA CORRIENTE', '2', '0', '0', NULL, '1', NULL),
(55, NULL, 'TIPO_CUENTA_BANCARIA', '3', 'DEP.PLZ', 'DEPOSITO A PLAZOS', '2', '0', '0', NULL, '1', NULL),
(56, NULL, 'TIPO_CUENTA_BANCARIA', '4', 'FND.MTO', 'FONDOS MUTUOS', '2', '0', '0', NULL, '1', NULL),
(57, NULL, 'TIPO_CUENTA_BANCARIA', '5', 'CTA.DTR', 'CUENTA DETRACCIONES', '2', '0', '0', NULL, '1', NULL),
(58, NULL, 'TIPO_CUENTA_BANCARIA', '6', 'CER.BNC', 'CERTIFICADO BANCARIO', '2', '0', '0', NULL, '1', NULL),
(59, NULL, 'TIPO_MONEDA', '1', 'S/', 'SOLES', '2', '0', '0', NULL, '1', NULL),
(60, NULL, 'TIPO_MONEDA', '2', '$.', 'DOLARES', '2', '0', '0', NULL, '1', NULL),
(61, NULL, 'TIPO_MONEDA', '9', 'OTR', 'OTROS', '2', '0', '0', NULL, '0', NULL),
(62, NULL, 'TIPO_DOCUMENTO_IDENTIDAD', '0', 'OTR', 'OTROS TIPOS DE DOCUMENTOS', '2', '0', '0', NULL, '1', NULL),
(63, NULL, 'TIPO_DOCUMENTO_IDENTIDAD', '1', 'DNI', 'DOCUMENTO NACIONAL DE IDENTIDAD', '2', '0', '0', NULL, '1', NULL),
(64, NULL, 'TIPO_DOCUMENTO_IDENTIDAD', '4', 'EXT', 'CARNET DE EXTRANJERIA', '2', '0', '0', NULL, '1', NULL),
(65, NULL, 'TIPO_DOCUMENTO_IDENTIDAD', '6', 'RUC', 'REGISTRO UNICO DE CONTRIBUYENTES', '2', '0', '0', NULL, '1', NULL),
(66, NULL, 'TIPO_DOCUMENTO_IDENTIDAD', '7', 'PAS', 'PASAPORTE', '2', '0', '0', NULL, '1', NULL),
(67, NULL, 'TIPO_MEDIO_PAGO', '001', 'DEP', 'DEPOSITO EN CUENTA', '2', '0', '0', NULL, '1', NULL),
(68, NULL, 'TIPO_MEDIO_PAGO', '002', 'GRO', 'GIRO', '2', '0', '0', NULL, '1', NULL),
(69, NULL, 'TIPO_MEDIO_PAGO', '003', 'TRN.FND', 'TRANSFERENCIA DE FONDOS', '2', '0', '0', NULL, '1', NULL),
(70, NULL, 'TIPO_MEDIO_PAGO', '004', 'OPG', 'ORDEN DE PAGO', '2', '0', '0', NULL, '1', NULL),
(71, NULL, 'TIPO_MEDIO_PAGO', '005', 'TAR.DBT', 'TARJETA DE DEBITO', '2', '0', '0', NULL, '1', NULL),
(72, NULL, 'TIPO_MEDIO_PAGO', '006', 'TAR.CDT', 'TARJETA DE CREDITO', '2', '0', '0', NULL, '1', NULL),
(73, NULL, 'TIPO_MEDIO_PAGO', '007', 'CHQ', 'CHEQUES CON LA CLAUSULA DE \"NO NEGOCIABLE\", \"INTRANSFERIBLES\", \"NO A LA ORDEN\" U OTRA EQUIVALENTE, A QUE SE REFIERE EL INCISO F) DEL ARTICULO 5° DEL DECRETO LEGISLATIVO.', '2', '0', '0', NULL, '1', NULL),
(74, NULL, 'TIPO_MEDIO_PAGO', '008', 'EFE.MDP', 'EFECTIVO, POR OPERACIONES EN LAS QUE NO EXISTE OBLIGACION DE UTILIZAR MEDIOS DE PAGO', '2', '0', '0', NULL, '1', NULL),
(75, NULL, 'TIPO_MEDIO_PAGO', '009', 'EFE', 'EFECTIVO, EN LOS DEMAS CASOS', '2', '0', '0', NULL, '1', NULL),
(76, NULL, 'TIPO_MEDIO_PAGO', '010', 'MDS.PGO.CEX', 'MEDIOS DE PAGO DE COMERCIO EXTERIOR', '2', '0', '0', NULL, '1', NULL),
(77, NULL, 'TIPO_MEDIO_PAGO', '011', 'LET', 'LETRAS DE CAMBIO', '2', '0', '0', NULL, '1', NULL),
(78, NULL, 'TIPO_MEDIO_PAGO', '101', 'TRN.CEX', 'TRANSFERENCIAS COMERCIO EXTERIOR', '2', '0', '0', NULL, '1', NULL),
(79, NULL, 'TIPO_MEDIO_PAGO', '102', 'CHQ.BNC.CEX', 'CHEQUES BANCARIOS  COMERCIO EXTERIOR', '2', '0', '0', NULL, '1', NULL),
(80, NULL, 'TIPO_MEDIO_PAGO', '103', 'OPG.SMP.CEX', 'ORDEN DE PAGO SIMPLE  COMERCIO EXTERIOR', '2', '0', '0', NULL, '1', NULL),
(81, NULL, 'TIPO_MEDIO_PAGO', '104', 'OPG.DCM.CEX', 'ORDEN DE PAGO DOCUMENTARIO  COMERCIO EXTERIOR', '2', '0', '0', NULL, '1', NULL),
(82, NULL, 'TIPO_MEDIO_PAGO', '105', 'RSM.CEX', 'REMESA SIMPLE  COMERCIO EXTERIOR', '2', '0', '0', NULL, '1', NULL),
(83, NULL, 'TIPO_MEDIO_PAGO', '106', 'RDM.CEX', 'REMESA DOCUMENTARIA  COMERCIO EXTERIOR', '2', '0', '0', NULL, '1', NULL),
(84, NULL, 'TIPO_MEDIO_PAGO', '107', 'CCS.CEX', 'CARTA DE CREDITO SIMPLE  COMERCIO EXTERIOR', '2', '0', '0', NULL, '1', NULL),
(85, NULL, 'TIPO_MEDIO_PAGO', '108', 'CCD.CEX', 'CARTA DE CREDITO DOCUMENTARIO  COMERCIO EXTERIOR', '2', '0', '0', NULL, '1', NULL),
(86, NULL, 'TIPO_MEDIO_PAGO', '109', 'TRN.ELE', 'TRANSFERENCIA ELECTRONICA', '2', '0', '0', NULL, '1', NULL),
(87, NULL, 'TIPO_MEDIO_PAGO', '999', 'OTR.MPG', 'OTROS MEDIOS DE PAGO (ESPECIFICAR)', '2', '0', '0', NULL, '1', NULL),
(88, NULL, 'UNIDAD_MEDIDA', '01', 'KGR', 'KILOGRAMOS', '2', '0', '0', NULL, '1', NULL),
(89, NULL, 'UNIDAD_MEDIDA', '02', 'LIB', 'LIBRAS', '2', '0', '0', NULL, '1', NULL),
(90, NULL, 'UNIDAD_MEDIDA', '03', 'TNL', 'TONELADAS LARGAS', '2', '0', '0', NULL, '1', NULL),
(91, NULL, 'UNIDAD_MEDIDA', '04', 'TNM', 'TONELADAS METRICAS', '2', '0', '0', NULL, '1', NULL),
(92, NULL, 'UNIDAD_MEDIDA', '05', 'TNC', 'TONELADAS CORTAS', '2', '0', '0', NULL, '1', NULL),
(93, NULL, 'UNIDAD_MEDIDA', '06', 'GRM', 'GRAMOS', '2', '0', '0', NULL, '1', NULL),
(94, NULL, 'UNIDAD_MEDIDA', '07', 'UND', 'UNIDADES', '2', '0', '0', NULL, '1', NULL),
(95, NULL, 'UNIDAD_MEDIDA', '08', 'LTS', 'LITROS', '2', '0', '0', NULL, '1', NULL),
(96, NULL, 'UNIDAD_MEDIDA', '09', 'GAL', 'GALONES', '2', '0', '0', NULL, '1', NULL),
(97, NULL, 'UNIDAD_MEDIDA', '10', 'BAR', 'BARRILES', '2', '0', '0', NULL, '1', NULL),
(98, NULL, 'UNIDAD_MEDIDA', '11', 'LAT', 'LATAS', '2', '0', '0', NULL, '1', NULL),
(99, NULL, 'UNIDAD_MEDIDA', '12', 'CJA', 'CAJAS', '2', '0', '0', NULL, '1', NULL),
(100, NULL, 'UNIDAD_MEDIDA', '13', 'MIL', 'MILLARES', '2', '0', '0', NULL, '1', NULL),
(101, NULL, 'UNIDAD_MEDIDA', '14', 'MT3', 'METROS CUBICOS', '2', '0', '0', NULL, '1', NULL),
(102, NULL, 'UNIDAD_MEDIDA', '15', 'MTR', 'METROS', '2', '0', '0', NULL, '1', NULL),
(103, NULL, 'UNIDAD_MEDIDA', '99', 'OTR', 'OTROS (ESPECIFICAR)', '2', '0', '0', NULL, '1', NULL),
(104, NULL, 'MOTIVO_TRASLADO', '1', 'VTA', 'VENTA', '2', '0', '1', NULL, '1', NULL),
(105, NULL, 'MOTIVO_TRASLADO', '2', 'COM', 'COMPRA', '2', '0', '0', NULL, '1', NULL),
(106, NULL, 'MOTIVO_TRASLADO', '3', 'DEV', 'DEVOLUCION', '2', '0', '0', NULL, '1', NULL),
(107, NULL, 'MOTIVO_TRASLADO', '4', 'CON', 'CONSIGNACION', '2', '0', '0', NULL, '1', NULL),
(108, NULL, 'MOTIVO_TRASLADO', '5', 'IMP', 'IMPORTACION', '2', '0', '0', NULL, '1', NULL),
(109, NULL, 'MOTIVO_TRASLADO', '6', 'EXP', 'EXPORTACION', '2', '0', '0', NULL, '1', NULL),
(110, NULL, 'MOTIVO_TRASLADO', '7', 'RBT', 'RECOJO DE BIENES TRANSFORMADOS', '2', '0', '0', NULL, '1', NULL),
(111, NULL, 'MOTIVO_TRASLADO', '8', 'TEICP', 'TRASLADO POR EMISOR ITINERANTE DE COMPROBANTE DE PAGO', '2', '0', '0', NULL, '1', NULL),
(112, NULL, 'MOTIVO_TRASLADO', '9', 'VET', 'VENTA CON ENTREGA A TERCEROS', '2', '0', '0', NULL, '1', NULL),
(113, NULL, 'MOTIVO_TRASLADO', '10', 'TZP', 'TRASLADO ZONA PRIMARIA', '2', '0', '0', NULL, '1', NULL),
(114, NULL, 'MOTIVO_TRASLADO', '11', 'VSC', 'VENTA SUJETA A CONFIRMACION', '2', '0', '0', NULL, '1', NULL),
(115, NULL, 'MOTIVO_TRASLADO', '12', 'TEME', 'TRASLADO ENTRE ESTABLECIMIENTOS DE LA MISMA EMPRESA', '2', '0', '0', NULL, '1', NULL),
(116, NULL, 'MOTIVO_TRASLADO', '13', 'TBT', 'TRASLADO DE BIENES PARA TRANSFORMACION', '2', '0', '0', NULL, '1', NULL),
(117, NULL, 'MOTIVO_TRASLADO', '14', 'OTR', 'OTRAS NO INCLUIDA EN LOS PUNTOS ANTERIORES', '2', '0', '0', NULL, '1', NULL),
(118, NULL, 'TIPO_OPERACION', '01', 'VTA', 'VENTA', '2', '0', '0', NULL, '1', NULL),
(119, NULL, 'TIPO_OPERACION', '02', 'CMP', 'COMPRA', '2', '0', '0', NULL, '1', NULL),
(120, NULL, 'TIPO_OPERACION', '03', 'CSG.RCB', 'CONSIGNACION RECIBIDA', '2', '0', '0', NULL, '1', NULL),
(121, NULL, 'TIPO_OPERACION', '04', 'CSG.ENT', 'CONSIGNACION ENTREGADA', '2', '0', '0', NULL, '1', NULL),
(122, NULL, 'TIPO_OPERACION', '05', 'DEV.RCB', 'DEVOLUCION RECIBIDA', '2', '0', '0', NULL, '1', NULL),
(123, NULL, 'TIPO_OPERACION', '06', 'DEV.ENT', 'DEVOLUCION ENTREGADA', '2', '0', '0', NULL, '1', NULL),
(124, NULL, 'TIPO_OPERACION', '07', 'PRM', 'PROMOCION', '2', '0', '0', NULL, '1', NULL),
(125, NULL, 'TIPO_OPERACION', '08', 'PMO', 'PREMIO', '2', '0', '0', NULL, '1', NULL),
(126, NULL, 'TIPO_OPERACION', '09', 'DNC', 'DONACION', '2', '0', '0', NULL, '1', NULL),
(127, NULL, 'TIPO_OPERACION', '10', 'SAL.PRD', 'SALIDA A PRODUCCION', '2', '0', '0', NULL, '1', NULL),
(128, NULL, 'TIPO_OPERACION', '11', 'TRN.ALM', 'TRANSFERENCIA ENTRE ALMACENES', '2', '0', '0', NULL, '1', NULL),
(129, NULL, 'TIPO_OPERACION', '12', 'RTR', 'RETIRO', '2', '0', '0', NULL, '1', NULL),
(130, NULL, 'TIPO_OPERACION', '13', 'MRM', 'MERMAS', '2', '0', '0', NULL, '1', NULL),
(131, NULL, 'TIPO_OPERACION', '14', 'DSM', 'DESMEDROS', '2', '0', '0', NULL, '1', NULL),
(132, NULL, 'TIPO_OPERACION', '15', 'DST', 'DESTRUCCION', '2', '0', '0', NULL, '1', NULL),
(133, NULL, 'TIPO_OPERACION', '16', 'SLD.INI', 'SALDO INICIAL', '2', '0', '0', NULL, '1', NULL),
(134, NULL, 'TIPO_OPERACION', '99', 'OTR', 'OTROS (ESPECIFICAR)', '2', '0', '0', NULL, '1', NULL),
(135, NULL, 'TIPO_TRANSPORTE_GUIA', '1', 'PRV', 'TRANSPORTE PRIVADO', '2', '0', '0', NULL, '1', NULL),
(136, NULL, 'TIPO_TRANSPORTE_GUIA', '2', 'PUB', 'TRANSPORTE PUBLICO', '2', '0', '0', NULL, '1', NULL),
(137, NULL, 'TIPO_COMPROBANTE', '101', 'RM', 'ORDEN DE TRABAJO RM', '2', '0', '0', NULL, '1', NULL),
(138, NULL, 'TIPO_COMPROBANTE', '102', 'CTZ', 'COTIZACION O PRESUPUESTO', '2', '0', '0', NULL, '1', NULL),
(139, NULL, 'TIPO_COMPROBANTE', '103', 'RQ', 'REQUERIMIENTO', '2', '0', '0', NULL, '1', NULL),
(140, NULL, 'TIPO_COMPROBANTE', '104', 'OT', 'ORDEN DE TRABAJO CLIENTE', '2', '0', '0', NULL, '1', NULL),
(141, NULL, 'TIPO_COMPROBANTE', '105', 'IT', 'INFORME TECNICO', '2', '0', '0', NULL, '1', NULL),
(142, NULL, 'TIPO_COMPROBANTE', '106', 'O/C', 'ORDEN DE COMPRA', '2', '0', '0', NULL, '1', NULL),
(143, NULL, 'TIPO_COMPROBANTE', '107', 'CF', 'ACTA DE CONFORMIDAD', '2', '0', '0', NULL, '1', NULL),
(144, NULL, 'TIPO_COMPROBANTE', '108', 'CE', 'CONSTANCIA O ACTA DE ENTREGA', '2', '0', '0', NULL, '1', NULL),
(145, NULL, 'TIPO_DOCUMENTO_RELACIONADO_GUIA', '01', 'OE', 'ORDEN DE ENTREGA', '2', '0', '0', NULL, '1', NULL),
(146, NULL, 'TIPO_DOCUMENTO_RELACIONADO_GUIA', '02', 'SCOP', 'SCOP', '2', '0', '0', NULL, '1', NULL),
(147, NULL, 'TIPO_DOCUMENTO_RELACIONADO_GUIA', '03', 'MC', 'MANIFIESTO DE CARGA', '2', '0', '0', NULL, '1', NULL),
(148, NULL, 'TIPO_DOCUMENTO_RELACIONADO_GUIA', '04', 'CD', 'CONSTANCIA DE DETRACCION', '2', '0', '0', NULL, '1', NULL),
(149, NULL, 'TIPO_DOCUMENTO_RELACIONADO_GUIA', '05', 'OTR', 'OTROS', '2', '0', '0', NULL, '1', NULL),
(150, NULL, 'ESTADO_APROBACION_COTIZACION', '1', 'PDT', 'PENDIENTE', '2', '0', '0', NULL, '1', NULL),
(151, NULL, 'ESTADO_APROBACION_COTIZACION', '2', 'APB', 'APROBADA', '2', '0', '0', NULL, '1', NULL),
(152, NULL, 'ESTADO_APROBACION_COTIZACION', '3', 'RZD', 'RECHAZADA', '2', '0', '0', NULL, '1', NULL),
(153, NULL, 'TIPO_VEHICULO', '001', 'SDN', 'SEDAN', '2', '0', '0', NULL, '1', NULL),
(154, NULL, 'TIPO_VEHICULO', '002', 'SWG', 'STATION WAGON', '2', '0', '0', NULL, '1', NULL),
(155, NULL, 'TIPO_VEHICULO', '003', 'SUV', 'SUV', '2', '0', '0', NULL, '1', NULL),
(156, NULL, 'TIPO_VEHICULO', '004', 'BRN', 'BARANDA', '2', '0', '0', NULL, '1', NULL),
(157, NULL, 'TIPO_VEHICULO', '005', 'PCK', 'PICK UP', '2', '0', '0', NULL, '1', NULL),
(158, NULL, 'TIPO_VEHICULO', '006', 'FRG', 'FURGON', '2', '0', '0', NULL, '1', NULL),
(159, NULL, 'TIPO_VEHICULO', '007', 'MLT', 'MULTIPROPOSITO', '2', '0', '0', NULL, '1', NULL),
(160, NULL, 'TIPO_VEHICULO', '008', 'MTC', 'MONTACARGA', '2', '0', '0', NULL, '1', NULL),
(161, NULL, 'MARCA_VEHICULO', '001', 'TYT', 'TOYOTA', '2', '0', '0', NULL, '0', NULL),
(163, NULL, 'MARCA_VEHICULO', '003', 'MTS', 'MITSUBISHI', '2', '0', '0', NULL, '0', NULL),
(164, NULL, 'MARCA_VEHICULO', '004', 'HIN', 'HINO', '2', '0', '0', NULL, '1', NULL),
(165, NULL, 'MARCA_VEHICULO', '005', 'DDG', 'DODGE', '2', '0', '0', NULL, '1', NULL),
(166, NULL, 'MARCA_VEHICULO', '006', 'GMC', 'GMC', '2', '0', '0', NULL, '1', NULL),
(168, NULL, 'MARCA_VEHICULO', '008', 'ITN', 'INTERNATIONAL', '2', '0', '0', NULL, '1', NULL),
(169, NULL, 'MARCA_VEHICULO', '009', 'IZS', 'IZUSU', '2', '0', '0', NULL, '1', NULL),
(170, NULL, 'MARCA_VEHICULO', '010', 'SCN', 'SCANIA', '2', '0', '0', NULL, '1', NULL),
(171, NULL, 'MARCA_VEHICULO', '011', 'VLV', 'VOLVO', '2', '0', '0', NULL, '1', NULL),
(172, NULL, 'MARCA_VEHICULO', '012', 'MCK', 'MACK', '2', '0', '0', NULL, '1', NULL),
(173, NULL, 'MARCA_VEHICULO', '013', 'MBZ', 'MERCEDES BENZ', '2', '0', '0', NULL, '1', NULL),
(174, 161, 'MODELO_VEHICULO', '001', 'HLX', 'HILUX', '2', '0', '0', NULL, '1', NULL),
(175, 161, 'MODELO_VEHICULO', '002', 'TCM', 'TACOMA', '2', '0', '0', NULL, '1', NULL),
(176, 161, 'MODELO_VEHICULO', '003', 'TND', 'TUNDRA', '2', '0', '0', NULL, '1', NULL),
(177, 162, 'MODELO_VEHICULO', '001', 'FNT', 'FRONTIER', '2', '0', '0', NULL, '1', NULL),
(178, 162, 'MODELO_VEHICULO', '002', 'NP3', 'NP 300', '2', '0', '0', NULL, '1', NULL),
(179, 162, 'MODELO_VEHICULO', '003', 'NPF', 'NP 300 FRONTIER', '2', '0', '0', NULL, '1', NULL),
(181, 163, 'MODELO_VEHICULO', '002', 'TRT', 'TRITON', '2', '0', '0', NULL, '1', NULL),
(182, 164, 'MODELO_VEHICULO', '001', '514', 'S3514', '2', '0', '0', NULL, '0', NULL),
(183, 164, 'MODELO_VEHICULO', '002', '616', 'S3616', '2', '0', '0', NULL, '0', NULL),
(184, 164, 'MODELO_VEHICULO', '003', '816', 'S3816', '2', '0', '0', NULL, '1', NULL),
(185, NULL, 'TIPO_LICENCIA_CONDUCIR', '01', 'A-I', 'CLASE A CATEGORIA I', '2', '0', '0', NULL, '1', NULL),
(186, NULL, 'TIPO_LICENCIA_CONDUCIR', '02', 'A-II-A', 'CLASE A CATEGORIA IIA', '2', '0', '0', NULL, '1', NULL),
(187, NULL, 'TIPO_LICENCIA_CONDUCIR', '03', 'A-II-B', 'CLASE A CATEGORIA IIB', '2', '0', '0', NULL, '1', NULL),
(188, NULL, 'TIPO_LICENCIA_CONDUCIR', '04', 'A-III-A', 'CLASE A CATEGORIA IIIA', '2', '0', '0', NULL, '1', NULL),
(189, NULL, 'TIPO_LICENCIA_CONDUCIR', '05', 'A-III-B', 'CLASE A CATEGORIA IIIB', '2', '0', '0', NULL, '1', NULL),
(190, NULL, 'TIPO_LICENCIA_CONDUCIR', '06', 'A-III-C', 'CLASE A CATEGORIA IIIC', '2', '0', '0', NULL, '1', NULL),
(191, NULL, 'TIPO_DIRECCION', '01', 'FSC', 'DIRECCION FISCAL', '2', '0', '1', NULL, '1', NULL),
(192, NULL, 'TIPO_DIRECCION', '02', 'PRT', 'DIRECCIÓN DE PARTIDA', '2', '0', '0', NULL, '1', NULL),
(193, NULL, 'TIPO_DIRECCION', '03', 'LGD', 'DIRECCION DE LLEGADA', '2', '0', '0', NULL, '1', NULL),
(204, NULL, 'CARGO_CONTACTO', '01', 'DEC', 'DECANO(A)', '2', '0', '0', NULL, '1', NULL),
(205, NULL, 'CARGO_CONTACTO', '02', 'JDCM', 'JEFE(A) DEL DEPARTAMENTO DE CIENCIAS MORFOLÓGICAS', '2', '0', '0', NULL, '1', NULL),
(206, NULL, 'CARGO_CONTACTO', '03', 'LSC', 'LABORATORIO DE SIMULACIÓN CLÍNICA', '2', '0', '0', NULL, '1', NULL),
(207, NULL, 'PROCEDENCIA', '01', 'CH', 'CHINA', '2', '0', '0', NULL, '1', NULL),
(208, NULL, 'PROCEDENCIA', '02', 'USA', 'USA', '2', '0', '0', NULL, '1', NULL),
(209, NULL, 'PROCEDENCIA', '03', 'BR', 'BRASIL', '2', '0', '0', NULL, '1', NULL),
(210, NULL, 'PROCEDENCIA', '04', 'GER', 'ALEMANIA', '2', '0', '0', NULL, '1', NULL),
(211, NULL, 'PROCEDENCIA', '05', 'ES', 'ESPAÑA', '2', '0', '0', NULL, '1', NULL),
(212, NULL, 'TIPO_CONTACTO', '1', 'CLI', 'CLIENTE', '2', '0', '0', NULL, '1', NULL),
(213, NULL, 'TIPO_CONTACTO', '2', 'PRO', 'PROVEEDOR', '2', '0', '0', NULL, '1', NULL),
(215, NULL, 'TIPO_ITEM', '01', 'PRD', 'PRODUCTO', '2', '0', '0', NULL, '1', NULL),
(216, NULL, 'TIPO_ITEM', '02', 'SRV', 'SERVICIO', '2', '0', '0', NULL, '1', NULL),
(217, 138, 'TIPO_COTIZACION', '01', 'INICIAL', 'ESTUDIO DE MERCADO', '2', '0', '0', NULL, '1', NULL),
(218, 138, 'TIPO_COTIZACION', '02', 'FINAL', 'COTIZACION FINAL', '2', '0', '0', NULL, '1', NULL),
(219, NULL, 'TIPO_PRECIO', '01', 'PVL', 'PRECIO VENTA LOCAL', '2', '0', '0', NULL, '1', NULL),
(220, NULL, 'TIPO_PRECIO', '02', 'PVS', 'PRECIO VENTA SUCESIVA', '2', '0', '0', NULL, '1', NULL),
(221, NULL, 'VIGENCIA', '1', '10', '10 DÍAS', '2', '0', '0', NULL, '1', NULL),
(222, NULL, 'VIGENCIA', '2', '20', '20 DÍAS', '2', '0', '0', NULL, '1', NULL),
(223, NULL, 'VIGENCIA', '3', '30', '30 DÍAS', '2', '0', '0', NULL, '1', NULL),
(224, NULL, 'PROCEDENCIA', '06', 'PE', 'PERU', '2', '0', '0', NULL, '1', NULL),
(225, NULL, 'PROCEDENCIA', '07', 'OT', 'OTRO', '2', '0', '0', NULL, '1', NULL),
(226, NULL, 'VIGENCIA', '4', '40', '40 DIAS', '2', '0', '0', NULL, '1', NULL),
(227, NULL, 'VIGENCIA', '5', '50', '50 DIAS', '2', '0', '0', NULL, '1', NULL),
(228, NULL, 'VIGENCIA', '6', '60', '60 DIAS', '2', '0', '0', NULL, '1', NULL),
(229, NULL, 'CARGO_CONTACTO', '04', 'JFE-LOG', 'JEFE(A) DE LOGÍSTICA', '2', '0', '0', NULL, '1', NULL),
(230, NULL, 'PAÍSES BAJOS', 'XX', 'XXX', 'XXXXXXXXXX', '2', '0', '0', NULL, '1', NULL),
(232, NULL, 'PROCEDENCIA', '08', 'HOL', 'HOLANDA', '2', '0', '0', NULL, '1', NULL),
(234, NULL, 'CARGO_CONTACTO', '05', 'ANAT', 'JEFE(A) DEL LABORATORIO DE ANATOMíA', '2', '0', '0', NULL, '1', NULL),
(235, NULL, 'CARGO_CONTACTO', '06', 'DOC', 'DOCENTE', '2', '0', '0', NULL, '1', NULL),
(236, NULL, 'CARGO_CONTACTO', '07', 'INV-PRI', 'INVESTIGADOR(A) PRINCIPAL', '2', '0', '0', NULL, '1', NULL),
(237, NULL, 'CARGO_CONTACTO', '08', 'CIRUG - EXP', 'JEFE(A) DEL DEPARTAMENTO DE CIRUGíA EXPERIMENTAL', '2', '0', '0', NULL, '1', NULL),
(238, NULL, 'CARGO_CONTACTO', '09', 'INV', 'INVESTIGADOR(A)', '2', '0', '0', NULL, '1', NULL),
(239, NULL, 'CARGO_CONTACTO', '10', 'DIREC', 'DIRECTOR(A)', '2', '0', '0', NULL, '1', NULL),
(240, NULL, 'CARGO_CONTACTO', '11', 'VIC ACAD', 'VICERRECTOR(A) ACADéMICO', '2', '0', '0', NULL, '1', NULL),
(241, NULL, 'CARGO_CONTACTO', '12', 'ABAST', 'OFICINA DE ABASTECIMIENTO', '2', '0', '0', NULL, '1', NULL),
(242, NULL, 'CARGO_CONTACTO', '13', 'VIC INV', 'VICERRECTOR (A) DE INVESTIGACIÓN', '2', '0', '0', NULL, '1', NULL),
(243, NULL, 'CARGO_CONTACTO', '14', 'COORD ACAD', 'COORDINADOR ACADéMICO', '2', '0', '0', NULL, '1', NULL),
(244, NULL, 'CARGO_CONTACTO', '15', 'COORD GEN LAB', 'COORDINADOR GENERAL DE LABORATORIOS', '2', '0', '0', NULL, '1', NULL),
(245, NULL, 'CARGO_CONTACTO', '245', 'ADQUISICIONES', 'AREA DE ADQUISICIONES', '2', '0', '0', NULL, '1', NULL),
(246, NULL, 'PROCEDENCIA', '09', 'CANAD', 'CANADA', '2', '0', '0', NULL, '1', NULL),
(247, NULL, 'ESTADO_OPORTUNIDAD', '00', 'E0', 'CADUCADA', '2', '0', '0', NULL, '1', NULL),
(248, NULL, 'ESTADO_OPORTUNIDAD', '01', 'E1', 'USUARIO', '2', '0', '0', NULL, '1', NULL),
(249, NULL, 'ESTADO_OPORTUNIDAD', '02', 'E2', 'ESTUDIO DE MERCADO (LOGISTICA)', '2', '0', '0', NULL, '1', NULL),
(250, NULL, 'ESTADO_OPORTUNIDAD', '03', 'E3', 'PROCESO DE COMPRA (SEACE)', '2', '0', '0', NULL, '1', NULL),
(251, NULL, 'ESTADO_OPORTUNIDAD', '04', 'E4', 'VENTA CONCRETADA', '2', '0', '0', NULL, '1', NULL),
(252, NULL, 'ESTADO_OPORTUNIDAD', '05', 'E5', 'FACTURADA', '2', '0', '0', NULL, '1', NULL),
(253, NULL, 'ESTADO_OPORTUNIDAD', '06', 'E6', 'COBRADA', '2', '0', '0', NULL, '1', NULL),
(254, NULL, 'AVANCE_OPORTUNIDAD', '01', '0%', '0%', '2', '0', '0', NULL, '1', NULL),
(255, NULL, 'AVANCE_OPORTUNIDAD', '02', '1-15%', '1% 15%', '2', '0', '0', NULL, '1', NULL),
(256, NULL, 'AVANCE_OPORTUNIDAD', '03', '16-30%', '16% 30%', '2', '0', '0', NULL, '1', NULL),
(257, NULL, 'AVANCE_OPORTUNIDAD', '04', '31-45%', '31% 45%', '2', '0', '0', NULL, '1', NULL),
(258, NULL, 'AVANCE_OPORTUNIDAD', '05', '46-60%', '46% 60%', '2', '0', '0', NULL, '1', NULL),
(259, NULL, 'AVANCE_OPORTUNIDAD', '06', '61-75%', '61% 75%', '2', '0', '0', NULL, '1', NULL),
(260, NULL, 'AVANCE_OPORTUNIDAD', '07', '76-90%', '76% 90%', '2', '0', '0', NULL, '1', NULL),
(261, NULL, 'AVANCE_OPORTUNIDAD', '08', '91-99%', '91% 99%', '2', '0', '0', NULL, '1', NULL),
(262, NULL, 'AVANCE_OPORTUNIDAD', '09', '100%', '100%', '2', '0', '0', NULL, '1', NULL),
(263, NULL, 'PROBABILIDAD', '01', '0%', '0%', '2', '0', '0', NULL, '1', NULL),
(264, NULL, 'PROBABILIDAD', '02', '1-20%', '1% 20%', '2', '0', '0', NULL, '1', NULL),
(265, NULL, 'PROBABILIDAD', '03', '21-40%', '21% 40%', '2', '0', '0', NULL, '1', NULL),
(266, NULL, 'PROBABILIDAD', '04', '41-60%', '41% 60%', '2', '0', '0', NULL, '1', NULL),
(267, NULL, 'PROBABILIDAD', '05', '61-80%', '61% 80%', '2', '0', '0', NULL, '1', NULL),
(268, NULL, 'PROBABILIDAD', '06', '81-99%', '81% 99%', '2', '0', '0', NULL, '1', NULL),
(269, NULL, 'PROBABILIDAD', '07', '100%', '100%', '2', '0', '0', NULL, '1', NULL),
(270, NULL, 'CARGO_CONTACTO', '020', 'AS-CO', 'ASESOR COMERCIAL', '2', '0', '0', NULL, '1', NULL),
(271, NULL, 'CARGO_CONTACTO', '20', 'PERSONAL', 'RECURSOS HUMANOS', '2', '0', '0', NULL, '1', NULL),
(272, NULL, 'PROCEDENCIA', '10', 'POR', 'PORTUGAL', '2', '0', '0', NULL, '1', NULL),
(273, NULL, 'CARGO_CONTACTO', '22', 'RECTOR', 'RECTOR', '2', '0', '0', NULL, '1', NULL),
(274, NULL, 'CARGO_CONTACTO', '247', 'ADM', 'ADMINISTRADOR', '2', '0', '0', NULL, '1', NULL),
(276, NULL, 'PROCEDENCIA', '11', 'SUI', 'SUIZA', '2', '0', '0', NULL, '1', NULL),
(277, NULL, 'PROCEDENCIA', '12', 'IRLAN', 'IRLANDA', '2', '0', '0', NULL, '1', NULL),
(278, NULL, 'CARGO_CONTACTO', '21', 'JEF', 'JEFE DE LABORATORIO', '2', '0', '0', NULL, '1', NULL),
(279, NULL, 'PROCEDENCIA', '13', 'UK', 'REINO UNIDO', '2', '0', '0', NULL, '1', NULL),
(280, NULL, 'CARGO_CONTACTO', '23', 'SUB-DIR', 'SUBDIRECTOR', '2', '0', '0', NULL, '1', NULL),
(282, NULL, 'CARGO_CONTACTO', '17', 'ASESOR', 'ASESOR PEDAGÓGICO', '2', '0', '0', NULL, '1', NULL),
(283, NULL, 'CARGO_CONTACTO', '18', 'ASIST', 'ASISTENTE', '2', '0', '0', NULL, '1', NULL),
(284, NULL, 'TIPO_COMPROBANTE', '109', 'WKF', 'WORKFLOW', '2', '0', '0', NULL, '1', NULL),
(285, NULL, 'TIPO_COMPROBANTE', '110', 'O/X', 'ORDEN DE PAGO', '2', '0', '0', NULL, '1', NULL),
(286, NULL, 'TIPO_COMPROBANTE', '111', 'O/S', 'ORDEN DE SERVICIO', '2', '0', '0', NULL, '1', NULL),
(287, NULL, 'TIPO_COMPROBANTE', '112', 'O/P', 'ORDEN DE PEDIDO', '2', '0', '0', NULL, '1', NULL),
(288, NULL, 'TIPO_COMPROBANTE', '113', 'MNT', 'ACTA MANTENIMIENTO', '2', '0', '0', NULL, '1', NULL),
(289, NULL, 'TIPO_COMPROBANTE', '114', 'CRT', 'CARTA', '2', '0', '0', NULL, '1', NULL),
(290, NULL, 'TIPO_COMPROBANTE', '115', 'ARC', 'ACTA DE REUNION', '2', '0', '0', NULL, '1', NULL),
(291, NULL, 'TIPO_COMPROBANTE', '116', 'ACE', 'ACTA DE ENTREGA', '2', '0', '0', NULL, '1', NULL),
(292, NULL, 'ESTADO_APROBACION', '01', 'APB', 'APROBADO', '2', '0', '0', NULL, '1', NULL),
(293, NULL, 'ESTADO_APROBACION', '02', 'OBS', 'OBSERVADO', '2', '0', '0', NULL, '1', NULL),
(294, NULL, 'ESTADO_APROBACION', '03', 'PDT', 'PENDIENTE', '2', '0', '1', NULL, '1', NULL),
(295, NULL, 'ESTADO_APROBACION', '04', 'PRC', 'EN PROCESO', '2', '0', '0', NULL, '1', NULL),
(296, NULL, 'ESTADO_APROBACION', '05', 'RNV', 'REENVIADO', '2', '0', '0', NULL, '1', NULL),
(297, NULL, 'ESTADO_APROBACION', '06', 'RZD', 'RECHAZADO', '2', '0', '0', NULL, '1', NULL),
(298, NULL, 'ESTADO_ATENCION', '01', 'PDT', 'PENDIENTE', '2', '0', '1', NULL, '1', NULL),
(299, NULL, 'ESTADO_ATENCION', '02', 'ATD', 'ATENDIDO', '2', '0', '0', NULL, '1', NULL),
(300, NULL, 'ESTADO_ATENCION', '03', 'PRC', 'PARCIAL', '2', '0', '0', NULL, '1', NULL),
(301, NULL, 'PRIORIDAD', '0', 'BJA', 'BAJA', '2', '0', '1', NULL, '1', NULL),
(302, NULL, 'PRIORIDAD', '02', 'MED', 'MEDIA', '2', '0', '0', NULL, '1', NULL),
(303, NULL, 'PRIORIDAD', '03', 'ALT', 'ALTA', '2', '0', '0', NULL, '1', NULL),
(304, NULL, 'PRIORIDAD', '04', 'EMG', 'EMERGENCIA', '2', '0', '0', NULL, '1', NULL),
(305, NULL, 'CENTRO_COSTO', '001', 'CEM', '001 COSTO ENS. MEDICA', '2', '0', '1', NULL, '1', NULL),
(306, NULL, 'CENTRO_COSTO', '002', 'CEC', '002 COSTO ENS. CIENCIA NATURALES', '2', '0', '0', NULL, '1', NULL),
(307, NULL, 'CENTRO_COSTO', '003', 'CIB', '003 COSTO INV. CIENCIAS BASICAS', '2', '0', '0', NULL, '1', NULL),
(308, NULL, 'CENTRO_COSTO', '004', 'CAL', '004 COSTO ADEC. LABORATORIOS', '2', '0', '0', NULL, '1', NULL),
(309, NULL, 'CENTRO_COSTO', '005', 'CSR', '005 COSTO SERVICIOS', '2', '0', '0', NULL, '1', NULL),
(310, NULL, 'CARGO_CONTACTO', '001', 'COMPRAS-CONTRATOS-MK', 'ASISTENTE DE LOGÍSTICA', '2', '0', '0', NULL, '1', NULL),
(311, NULL, 'CARGO_CONTACTO', '002', 'CONTABILIDAD-RRHH', 'ASISTENTE DE CONTABILIDAD', '2', '0', '0', NULL, '1', NULL),
(312, NULL, 'CARGO_CONTACTO', '003', 'SGC-POSTVENTA-ADM', 'ASISTENTE DE CALIDAD', '2', '0', '0', NULL, '1', NULL),
(313, NULL, 'CARGO_CONTACTO', '004', 'AUXILIAR', 'PRACTICANTE', '2', '0', '0', NULL, '1', NULL),
(314, NULL, 'CARGO_CONTACTO', '01010', 'GTE', 'GERENTE', '2', '0', '0', NULL, '1', NULL),
(315, NULL, 'PREFIJO_NOMBRE', '01', 'SRS.', 'SEÑORES', '2', '0', '0', NULL, '1', NULL),
(316, NULL, 'PREFIJO_NOMBRE', '02', 'SR.', 'SEÑOR', '2', '0', '0', NULL, '1', NULL),
(317, NULL, 'PREFIJO_NOMBRE', '03', 'SRA.', 'SEÑORA', '2', '0', '0', NULL, '1', NULL),
(318, NULL, 'PREFIJO_NOMBRE', '04', 'SRTA.', 'SEÑORITA', '2', '0', '0', NULL, '1', NULL),
(319, NULL, 'PREFIJO_NOMBRE', '05', 'DR.', 'DOCTOR', '2', '0', '0', NULL, '1', NULL),
(320, NULL, 'PREFIJO_NOMBRE', '06', 'DRA.', 'DOCTORA', '2', '0', '0', NULL, '1', NULL),
(321, NULL, 'ACTA_REUNION', '01', 'CRN', 'COORDINACION', '2', '0', '0', NULL, '1', NULL),
(323, NULL, 'ACTA_REUNION', '03', 'CTC', 'CAPACITACION', '2', '0', '0', NULL, '1', NULL),
(324, NULL, 'ACTA_REUNION', '04', 'RDC', 'REVISION DE DOCUMENTOS', '2', '0', '0', NULL, '1', NULL),
(326, 288, 'TIPO_MANTENIMIENTO', '01', 'PVR', 'PREVENTIVO', '2', '0', '0', NULL, '1', NULL),
(327, 288, 'TIPO_MANTENIMIENTO', '02', 'CRV', 'CORRECTIVO', '2', '0', '0', NULL, '1', NULL),
(328, NULL, 'ACCION_APROBACION', '01', 'APB', 'APROBADO', '2', '0', '0', NULL, '1', NULL),
(329, NULL, 'ACCION_APROBACION', '02', 'OBS', 'OBSERVADO', '2', '0', '0', NULL, '1', NULL),
(330, NULL, 'ACCION_APROBACION', '03', 'RZD', 'RECHAZADO', '2', '0', '0', NULL, '1', NULL),
(334, NULL, 'TIPO_EVENTO', '3', 'MANTENIMIENTO', 'E004 POSTVENTA - 4TO MANTENIMIENTO REALIZADO', '2', '0', '0', NULL, '1', NULL),
(337, NULL, 'TIPO_EVENTO', '2', 'CLIENTE Y WAREM', 'B002 CIERRE - CONTRATO FIRMADO POR AMBAS PARTES', '2', '0', '0', NULL, '1', NULL),
(339, NULL, 'TIPO_EVENTO', '6', 'O/C', 'B003 CIERRE - RECEPCION DE ORDEN DE COMPRA', '2', '0', '0', NULL, '1', NULL),
(341, NULL, 'CARGO_CONTACTO', '00111', 'SG', 'Sub Gerente', '2', '1', '0', NULL, '1', NULL),
(342, NULL, 'CARGO_CONTACTO', '00011112', 'O', 'OFICINA DE UNIVERSIDAD', '2', '0', '0', NULL, '1', NULL),
(343, NULL, 'CARGO_CONTACTO', '0001113', 'JA', 'JEFA DE ADMINISTRACIÓN', '2', '1', '0', NULL, '1', NULL),
(344, NULL, 'CARGO_CONTACTO', '0001114', 'DGA', 'DIRECTOR GENERAL DE ADMINISTRACIÓN', '2', '1', '0', NULL, '1', NULL),
(345, NULL, 'CARGO_CONTACTO', '0001115', 'O', 'OFICINA', '2', '0', '0', NULL, '1', NULL),
(346, NULL, 'CARGO_CONTACTO', '0001116', 'JUM', 'JEFE DE UNIDAD DE MONITOREO', '2', '1', '0', NULL, '1', NULL),
(347, NULL, 'CARGO_CONTACTO', '0001117', 'JACC', 'JEFE DEL ÁREA DE CRÉDITOS Y COBRANZAS', '2', '1', '0', NULL, '1', NULL),
(348, NULL, 'CARGO_CONTACTO', '0001118', 'DE', 'DEPARTAMENTAL DE EDUCACIÓN', '2', '1', '0', NULL, '1', NULL),
(349, NULL, 'CARGO_CONTACTO', '0001119', 'AT', 'ÁREA DE TESORERÍA', '2', '1', '0', NULL, '1', NULL),
(350, NULL, 'CARGO_CONTACTO', '00011110', 'JUAC', 'JEFE DE UNIDAD DE ALMACÉN CENTRAL', '2', '1', '0', NULL, '1', NULL),
(351, NULL, 'CARGO_CONTACTO', '00011111', 'PAE', 'Presidente de la Asociación Educativa', '2', '1', '0', NULL, '1', NULL),
(352, NULL, 'CARGO_CONTACTO', '00011113', 'JAM', 'Jefe de área de Matemáticas', '2', '1', '0', NULL, '1', NULL),
(353, NULL, 'CARGO_CONTACTO', '00011114', 'J', 'Jefe', '2', '1', '0', NULL, '1', NULL),
(354, NULL, 'CARGO_CONTACTO', '00011115', 'HM', 'HEAD MASTER', '2', '1', '0', NULL, '1', NULL),
(355, NULL, 'CARGO_CONTACTO', '00011119', 'T', 'TESORERO', '2', '1', '0', NULL, '1', NULL),
(356, NULL, 'CARGO_CONTACTO', '00011120', 'JDACM', 'Jefe del Departamento Académica de Clínicas Médicas', '2', '1', '0', NULL, '1', NULL),
(357, NULL, 'CARGO_CONTACTO', '00011121', 'CM', 'Coordinadora de Matemáticas', '2', '1', '0', NULL, '1', NULL),
(358, NULL, 'CARGO_CONTACTO', '00011122', 'DA', 'Dirección académica', '2', '1', '0', NULL, '1', NULL),
(359, NULL, 'CARGO_CONTACTO', '00011123', 'JOA', 'Jefa de la Oficina de Abastecimiento', '2', '1', '0', NULL, '1', NULL),
(360, NULL, 'CARGO_CONTACTO', '00011124', 'UFP', 'Unidad Formuladora de Proyectos', '2', '1', '0', NULL, '1', NULL),
(361, NULL, 'CARGO_CONTACTO', '00011126', 'JCFFAA', 'Jefe del Comando Conjunto de las Fuerzas Armadas', '2', '1', '0', NULL, '1', NULL),
(362, NULL, 'TIPO_EVENTO', '8', 'PROD EN TRANSPORTE', 'C002 IMPORTACION - PRODUCTO EN TRANSITO', '2', '0', '0', NULL, '1', NULL),
(363, NULL, 'TIPO_EVENTO', '9', 'SE REALIZO LA TRANSF', 'C001 IMPORTACION - TRANSFERENCIA INTERN. REALIZADA', '2', '0', '0', NULL, '1', NULL),
(365, NULL, 'TIPO_EVENTO', '11', 'PROD EN ADUANAS', 'C003 IMPORTACION - PRODUCTO EN ADUANAS', '2', '0', '0', NULL, '1', NULL),
(366, NULL, 'TIPO_EVENTO', '12', 'PROD EN WAREM', 'C004 IMPORTACION - PRODUCTO EN WAREM', '2', '0', '0', NULL, '1', NULL),
(367, NULL, 'TIPO_EVENTO', '13', 'C DE ENT', 'D001 ENTREGA - COORDINACION  CON LAS PARTES INTERESADAS', '2', '0', '0', NULL, '1', NULL),
(369, NULL, 'TIPO_EVENTO', '15', 'MTO PREV', 'E001 POSTVENTA - 1ER MANTENIMIENTO REALIZADO', '2', '0', '0', NULL, '1', NULL),
(370, NULL, 'TIPO_EVENTO', '16', 'MTO PREV', 'E002 POSTVENTA - 2DO MANTENIMIENTO REALIZADO', '2', '0', '0', NULL, '1', NULL),
(371, NULL, 'TIPO_EVENTO', '17', 'MTO PREV', 'E003 POSTVENTA - 3ER MANTENIMIENTO REALIZADO', '2', '0', '0', NULL, '1', NULL),
(374, NULL, 'TIPO_EVENTO', '20', 'ELAB DE PROP', 'A002 PRECIERRE - ELABORACION DE PROPUESTA TECNICA', '2', '0', '0', NULL, '1', NULL),
(375, NULL, 'AREA_ADMINISTRATIVA', '01', 'CMC', 'COMERCIAL', '2', '0', '0', NULL, '1', NULL),
(376, NULL, 'AREA_ADMINISTRATIVA', '02', 'VTS', 'VENTAS', '2', '0', '0', NULL, '1', NULL),
(377, NULL, 'AREA_ADMINISTRATIVA', '03', 'CTD', 'CONTABILIDAD', '2', '0', '0', NULL, '1', NULL),
(378, NULL, 'AREA_ADMINISTRATIVA', '04', 'LGC', 'LOGISTICA', '2', '0', '0', NULL, '1', NULL),
(380, NULL, 'TIPO_EVENTO', '24', 'P.P.TECNICA', 'A003 PRECIERRE - PRESENTACION DE PROPUESTA TECNICA', '2', '0', '0', NULL, '1', NULL),
(381, NULL, 'CENTRO_COSTO', '006', 'GEM', '006 GASTO ENS. MEDICA', '2', '0', '0', NULL, '1', NULL),
(382, NULL, 'CENTRO_COSTO', '007', 'GEC', '007 GASTO ENS. CIENCIA NATURALES', '2', '0', '0', NULL, '1', NULL),
(383, NULL, 'CENTRO_COSTO', '008', 'GIB', '008 GASTO ENS. CIENCIAS BASICAS', '2', '0', '0', NULL, '1', NULL),
(384, NULL, 'CENTRO_COSTO', '009', 'GAL', '009 GASTO ADEC. LABORATORIOS', '2', '0', '0', NULL, '1', NULL),
(385, NULL, 'CENTRO_COSTO', '010', 'GSR', '010 GASTO SERVICIOS', '2', '0', '0', NULL, '1', NULL),
(386, NULL, 'TIPO_MONEDA', '03', 'EUR', 'EURO', '2', '0', '0', NULL, '1', NULL),
(387, NULL, 'INCOTERMS', '01', 'EXW', 'EN FÁBRICA', '2', '0', '0', NULL, '1', NULL),
(388, NULL, 'INCOTERMS', '02', 'FCA', 'FRANCO TRANSPORTISTA', '2', '0', '0', NULL, '1', NULL),
(389, NULL, 'INCOTERMS', '03', 'CPT', 'PORTE PAGADO HASTA', '2', '0', '0', NULL, '1', NULL),
(390, NULL, 'INCOTERMS', '04', 'DAT', 'ENTREGADO EN LA TERMINAL', '2', '0', '0', NULL, '1', NULL),
(391, NULL, 'INCOTERMS', '05', 'DAP', 'ENTREGADO EN EL LUGAR', '2', '0', '0', NULL, '1', NULL),
(392, NULL, 'INCOTERMS', '06', 'DDP', 'ENTREGA DERECHOS PAGADOS', '2', '0', '0', NULL, '1', NULL),
(393, NULL, 'INCOTERMS', '07', 'FAS', 'FRANCO AL COSTADO DEL BUQUE', '2', '0', '0', NULL, '1', NULL),
(394, NULL, 'INCOTERMS', '08', 'FOB', 'FRANCO A BORDO', '2', '0', '0', NULL, '1', NULL),
(395, NULL, 'INCOTERMS', '09', 'CFR', 'COSTE Y FLETE', '2', '0', '0', NULL, '1', NULL),
(396, NULL, 'INCOTERMS', '10', 'CIF', 'COSTE SEGURO Y FLETE', '2', '0', '0', NULL, '1', NULL),
(397, NULL, 'CENTRO_COSTO', '011', 'GAD', '011 GASTOS ADMINISTRATIVOS', '2', '0', '0', NULL, '1', NULL),
(398, NULL, 'TIPO_EVENTO', '10', 'ENCUESTA', 'E005 POSTVENTA - FORMULARIO DE SATISFACCIÓN  REGISTRADO', '2', '0', '0', NULL, '1', NULL),
(399, NULL, 'TIPO_COMPROBANTE', '117', 'LDC', 'LIQUIDACION DE COMPRA', '2', '0', '0', NULL, '1', NULL),
(400, NULL, 'TIPO_COMPROBANTE', '118', 'BTA', 'BOLETOS DE TRANSPORTE AEREO', '2', '0', '0', NULL, '1', NULL),
(401, NULL, 'TIPO_COMPROBANTE', '119', 'CPA', 'CARTA DE PORTE AEREO', '2', '0', '0', NULL, '1', NULL),
(402, NULL, 'TIPO_COMPROBANTE', '120', 'RPA', 'RECIBO POR ARRENDAMIENTO', '2', '0', '0', NULL, '1', NULL),
(403, NULL, 'TIPO_COMPROBANTE', '121', 'PAG', 'PAGARE', '2', '0', '0', NULL, '1', NULL),
(404, NULL, 'TIPO_COMPROBANTE', '122', 'RSP', 'RECIBO POR SERVICIOS PUBLICOS', '2', '0', '0', NULL, '1', NULL),
(405, NULL, 'TIPO_COMPROBANTE', '123', 'BTT', 'BOLETOS EMITIDOS POR EL SERVICIO DE TRANSPORTE TERRESTRE', '2', '0', '0', NULL, '1', NULL),
(406, NULL, 'TIPO_COMPROBANTE', '124', 'CRO', 'COMPROBANTE DE RETENCION', '2', '0', '0', NULL, '1', NULL),
(407, NULL, 'TIPO_COMPROBANTE', '125', 'CEE', 'CONOCIMIENTO DE EMBARQUE', '2', '0', '0', NULL, '1', NULL),
(408, NULL, 'TIPO_COMPROBANTE', '126', 'TRS', 'TRIBUTOS', '2', '0', '0', NULL, '1', NULL),
(409, NULL, 'TIPO_COMPROBANTE', '127', 'FPB', 'FORMULARIO DE DECLARACION PAGO BOLETA TRIBUTO', '2', '0', '0', NULL, '1', NULL),
(410, NULL, 'TIPO_COMPROBANTE', '128', 'LDB', 'LIQUIDACION DE BANCOS', '2', '0', '0', NULL, '1', NULL),
(411, NULL, 'TIPO_COMPROBANTE', '129', 'DTC', 'DETRACCION', '2', '0', '0', NULL, '1', NULL),
(412, NULL, 'TIPO_COMPROBANTE', '130', 'DSS', 'DESPACHO SIMPLIFICADO IMP SIMP', '2', '0', '0', NULL, '1', NULL),
(413, NULL, 'TIPO_COMPROBANTE', '131', 'RLA', 'RESUMEN LIQUIDACION ADUANAS', '2', '0', '0', NULL, '1', NULL),
(414, NULL, 'TIPO_COMPROBANTE', '132', 'LCZ', 'LIQUIDACION DE COBRANZA', '2', '0', '0', NULL, '1', NULL),
(415, NULL, 'TIPO_COMPROBANTE', '133', 'PRT', 'PRESTAMO', '2', '0', '0', NULL, '1', NULL),
(416, NULL, 'TIPO_COMPROBANTE', '134', 'IVC', 'INVOICE', '2', '0', '0', NULL, '1', NULL),
(417, NULL, 'TIPO_COMPROBANTE', '135', 'NCD', 'NOTA DE CONTABILIDAD', '2', '0', '0', NULL, '1', NULL),
(418, NULL, 'TIPO_COMPROBANTE', '136', 'OTR', 'OTROS', '2', '0', '0', NULL, '1', NULL),
(419, NULL, 'CARGO_CONTACTO', '0111', 'cdc', 'coordinador de compras', '2', '0', '0', NULL, '1', NULL),
(420, NULL, 'CARGO_CONTACTO', '012', 'jdc', 'jefe de compras', '2', '0', '0', NULL, '1', NULL),
(422, NULL, 'TIPO_EVENTO', '29', 'CTZ', 'A001 PRECIERRE - COTIZACION ACTUALIZADA', '2', '0', '0', NULL, '1', NULL),
(423, NULL, 'CARGO_CONTACTO', '0114', 'DGI', 'DIRECTOR GENERAL DE INVESTIGACIÓN', '2', '0', '0', NULL, '1', NULL),
(427, NULL, 'TIPO_EVENTO', '33', 'EXP ENTREGA CONSOLI', 'D002 ENTREGA - EXPEDIENTE DE ENTREGA CONSOLIDADO', '2', '0', '0', NULL, '1', NULL),
(431, NULL, 'TIPO_EVENTO', '37', 'ENVIO DE DOC. PERFEC', 'B001 CIERRE - ENVIO DE DOCS PERFECCIONAMIENTO DE CONTRATO', '2', '0', '0', NULL, '1', NULL),
(433, NULL, 'TIPO_EVENTO', '41', 'RECEPCION DE PAGO AN', 'B000 CIERRE - PAGO ANTICIPADO', '2', '0', '0', NULL, '1', NULL),
(434, NULL, 'TIPO_EVENTO', '23', 'CONF USUARIO', 'D003 ENTREGA - CONFORMIDAD DE USUARIO', '2', '0', '0', NULL, '1', NULL),
(435, NULL, 'COLOMBIA', '00', 'XXX', 'XXXXXXXXXX', '2', '0', '0', NULL, '1', NULL),
(436, NULL, 'CARGO_CONTACTO', '275', 'PRESIDENTE', 'PRESIDENTE', '2', '0', '0', NULL, '1', NULL),
(437, NULL, 'CARGO_CONTACTO', '437', 'DIRECTOR(A) ACADÉMIC', 'DIRECTOR(A) ACADÉMICO- MEDICINA HUMANA', '2', '0', '0', NULL, '1', NULL),
(438, NULL, 'CARGO_CONTACTO', '0023', 'CEPI', 'Coordinador de la Escuela Profesional de Ingeniería Ambiental y Forestal', '2', '0', '0', NULL, '1', NULL),
(439, NULL, 'CARGO_CONTACTO', '111', 'FEFE DE ADQUISICIONE', 'JEFE DE LA UNIDAD DE ADQUISICIONES Y ALMACENAMIENTO', '2', '0', '1', NULL, '1', NULL),
(440, NULL, 'CARGO_CONTACTO', '014', 'rt', 'revisora técnica', '2', '0', '0', NULL, '1', NULL),
(441, NULL, 'FINANCIAL_MOVEMENTS', '01', 'IGE', 'INGRESO', '2', '0', '0', NULL, '1', 1),
(442, NULL, 'FINANCIAL_MOVEMENTS', '02', 'ERS', 'EGRESO', '2', '0', '0', NULL, '1', 2),
(443, 442, 'FINANCIAL_GROUP', '01', 'CCS', 'COMPROMISOS CERRADOS', '2', '0', '0', NULL, '1', 1),
(444, 442, 'FINANCIAL_GROUP', '02', 'PSL', 'PERSONAL', '2', '0', '0', NULL, '1', 3),
(445, 442, 'FINANCIAL_GROUP', '03', 'PYN', 'PROYECCION', '2', '0', '0', NULL, '1', 4),
(446, 441, 'FINANCIAL_GROUP', '04', 'VEN', 'VENTA', '2', '0', '0', NULL, '1', 1),
(447, 443, 'FINANCIAL_CONCEPTS', '01', 'OC', 'ORDEN DE COMPRA', '2', '0', '0', NULL, '1', 1),
(448, 443, 'FINANCIAL_CONCEPTS', '02', 'OS', 'ORDEN DE SERVICIO', '2', '0', '0', NULL, '1', 2),
(449, 443, 'FINANCIAL_CONCEPTS', '03', 'OP', 'ORDEN DE PEDIDO', '2', '0', '0', NULL, '1', 3),
(450, 491, 'FINANCIAL_CONCEPTS', '04', 'IT', 'IMPUESTOS Y TRIBUTOS', '2', '0', '0', NULL, '1', 1),
(451, 491, 'FINANCIAL_CONCEPTS', '05', 'GF', 'GASTOS FINANCIEROS', '2', '0', '0', NULL, '1', 2),
(452, 491, 'FINANCIAL_CONCEPTS', '06', 'OCP', 'OTROS - COMPROMISOS', '2', '0', '0', NULL, '1', 3),
(453, 444, 'FINANCIAL_CONCEPTS', '07', 'PL', 'PLANILLA', '2', '0', '0', NULL, '1', 1),
(454, 444, 'FINANCIAL_CONCEPTS', '08', 'HN', 'HONORARIOS', '2', '0', '0', NULL, '1', 2),
(455, 444, 'FINANCIAL_CONCEPTS', '09', 'OPS', 'OTROS - PERSONAL', '2', '0', '0', NULL, '1', 4),
(456, 445, 'FINANCIAL_CONCEPTS', '10', 'CT', 'COSTOS', '2', '0', '0', NULL, '1', 1),
(457, 445, 'FINANCIAL_CONCEPTS', '11', 'GT', 'GASTOS VENTAS', '2', '0', '0', NULL, '1', 2),
(458, 445, 'FINANCIAL_CONCEPTS', '12', 'GAD', 'GASTOS ADMIN', '2', '0', '0', NULL, '1', 3),
(459, 446, 'FINANCIAL_CONCEPTS', '13', 'VFV', 'VENTA (FACTURA POR VENTA)', '2', '0', '0', NULL, '1', 1),
(460, 446, 'FINANCIAL_CONCEPTS', '14', 'VFS', 'VENTA (FACTURA POR SERVICIOS)', '2', '0', '0', NULL, '1', 2),
(461, 492, 'FINANCIAL_CONCEPTS', '15', 'OIS', 'OTROS INGRESOS', '2', '0', '0', NULL, '1', 1),
(462, NULL, 'FINANCIAL_SITUATION', '01', 'ACT', 'ACTIVO', '2', '0', '0', NULL, '1', 1),
(463, NULL, 'FINANCIAL_SITUATION', '02', 'PAM', 'PASIVO Y PATRIMONIO', '2', '0', '0', NULL, '1', 2),
(464, 462, 'FINANCIAL_GROUP_SITUATION', '01', 'ACC', 'ACTIVO CORRIENTE', '2', '0', '0', NULL, '1', 1),
(465, 462, 'FINANCIAL_GROUP_SITUATION', '02', 'ANC', 'ACTIVO NO CORRIENTE', '2', '0', '0', NULL, '1', 3),
(466, 463, 'FINANCIAL_GROUP_SITUATION', '03', 'PVC', 'PASIVO CORRIENTE', '2', '0', '0', NULL, '1', 2),
(467, 463, 'FINANCIAL_GROUP_SITUATION', '04', 'PNC', 'PASIVO NO CORRIENTE', '2', '0', '0', NULL, '1', 4),
(468, 463, 'FINANCIAL_GROUP_SITUATION', '05', 'PAT', 'PATRIMONIO', '2', '0', '0', NULL, '1', 6),
(469, 464, 'FINANCIAL_TABLE_SITUATION', '01', 'EEDE', 'EFECTIVO Y EQUIVALENTES DE EFECTIVO', '2', '0', '0', NULL, '1', NULL),
(470, 464, 'FINANCIAL_TABLE_SITUATION', '02', 'CCCT', 'CUENTAS POR COBRAR COMERCIALES - TERCEROS', '2', '0', '0', NULL, '1', NULL),
(471, 464, 'FINANCIAL_TABLE_SITUATION', '03', 'OCCR', 'OTRAS CUENTAS POR COBRAR PARTES RELACIONADAS', '2', '0', '0', NULL, '1', NULL),
(472, 464, 'FINANCIAL_TABLE_SITUATION', '04', 'CPCD', 'CUENTAS POR COBRAR DIVERSAS', '2', '0', '0', NULL, '1', NULL),
(473, 464, 'FINANCIAL_TABLE_SITUATION', '05', 'EXTC', 'EXISTENCIAS', '2', '0', '0', NULL, '1', NULL),
(474, 464, 'FINANCIAL_TABLE_SITUATION', '06', 'OACT', 'OTROS ACTIVOS CORRIENTES', '2', '0', '0', NULL, '1', NULL),
(475, 465, 'FINANCIAL_TABLE_SITUATION', '07', 'IMEN', 'INMUEBLES MAQUINARIA Y EQUIPOS (NETO)', '2', '0', '0', NULL, '1', NULL),
(476, 465, 'FINANCIAL_TABLE_SITUATION', '08', 'OTAC', 'OTROS ACTIVOS', '2', '0', '0', NULL, '1', NULL),
(477, 466, 'FINANCIAL_TABLE_SITUATION', '09', 'PCTC', 'PROVEEDORES (CTAS X PAGAR COMERCIALES)', '2', '0', '0', NULL, '1', NULL),
(478, 466, 'FINANCIAL_TABLE_SITUATION', '10', 'CPPR', 'CUENTAS POR PAGAR A PARTES RELACIONADAS', '2', '0', '0', NULL, '1', NULL),
(479, 466, 'FINANCIAL_TABLE_SITUATION', '11', 'TRPG', 'TRIBUTOS POR PAGAR', '2', '0', '0', NULL, '1', NULL),
(480, 466, 'FINANCIAL_TABLE_SITUATION', '12', 'RMPG', 'REMUNERACIONES POR PAGAR', '2', '0', '0', NULL, '1', NULL),
(481, 466, 'FINANCIAL_TABLE_SITUATION', '13', 'OCPG', 'OTRAS CUENTAS POR PAGAR', '2', '0', '0', NULL, '1', NULL),
(482, 466, 'FINANCIAL_TABLE_SITUATION', '14', 'ATIU', 'ANTICIPOS  - INNOVATE Y ULCIMA', '2', '0', '0', NULL, '1', NULL),
(483, 467, 'FINANCIAL_TABLE_SITUATION', '15', 'OBFN', 'OBLIGACIONES FINANCIERAS', '2', '0', '0', NULL, '1', NULL),
(484, 468, 'FINANCIAL_TABLE_SITUATION', '16', 'CPSC', 'CAPITAL SOCIAL', '2', '0', '0', NULL, '1', NULL),
(485, 468, 'FINANCIAL_TABLE_SITUATION', '17', 'REAN', 'RESULTADOS DEL EJERCICIO ANTERIORES', '2', '0', '0', NULL, '1', NULL),
(486, 468, 'FINANCIAL_TABLE_SITUATION', '18', 'RTEJ', 'RESULTADOS DEL EJERCICIO', '2', '0', '0', NULL, '1', NULL),
(487, NULL, 'FINANCIAL_SITUATION', '03', 'OTS', 'OTROS', '2', '0', '0', NULL, '1', 3),
(488, 487, 'FINANCIAL_GROUP_SITUATION', '06', 'NOAPLICA', 'NO APLICA REFLEJADO EN LA CUENTAS DE TRANFERENCIA CLASE 9', '2', '0', '0', NULL, '1', 8),
(489, 487, 'FINANCIAL_GROUP_SITUATION', '07', 'NREFLEJADO', 'NINGUNO REFLEJADO EN CUENTAS DE TRANSFERENCIA', '2', '0', '0', NULL, '1', 9),
(490, 487, 'FINANCIAL_GROUP_SITUATION', '08', 'ERESULTADO', 'ESTADO DE RESULTADOS (EGYP)', '2', '0', '0', NULL, '1', 7),
(491, 442, 'FINANCIAL_GROUP', '05', 'GFT', 'GASTOS FINANCIEROS Y TRIBUTOS', '2', '0', '0', NULL, '1', 2),
(492, 441, 'FINANCIAL_GROUP', '06', 'OIG', 'OTROS INGRESOS', '2', '0', '0', NULL, '1', 2),
(493, NULL, 'FINANCIAL_CONCEPTS', '16', 'SRO', 'SERVICIOS', '2', '0', '0', NULL, '1', 3),
(494, NULL, 'TIPO_PERIODO', '01', 'MSL', 'MENSUAL', '2', '0', '0', NULL, '1', NULL),
(495, NULL, 'TIPO_PERIODO', '02', 'TML', 'TRIMESTRAL', '2', '0', '0', NULL, '1', NULL),
(496, NULL, 'TIPO_PERIODO', '03', 'SML', 'SEMESTRAL', '2', '0', '0', NULL, '1', NULL),
(497, NULL, 'TIPO_PERIODO', '04', 'AUL', 'ANUAL', '2', '0', '0', NULL, '1', NULL),
(498, 445, 'FINANCIAL_CONCEPTS', '13', 'GOR', 'GASTOS OFICINA', '2', '0', '0', NULL, '1', 4),
(499, 445, 'FINANCIAL_CONCEPTS', '14', 'OPY', 'OTROS - PROYECCION', '2', '0', '0', NULL, '1', 5),
(500, NULL, 'EGP_AGRUPACION', '70', 'VNT', 'VENTAS', '2', '0', '0', NULL, '1', NULL),
(501, NULL, 'EGP_AGRUPACION', '69', 'CVT', 'COSTO DE VENTAS', '2', '0', '0', NULL, '1', NULL),
(502, NULL, 'EGP_AGRUPACION', '95', 'GVT', 'GASTOS DE VENTAS', '2', '0', '0', NULL, '1', NULL),
(503, NULL, 'EGP_AGRUPACION', '94', 'GAD', 'GASTOS ADMINISTRATIVOS', '2', '0', '0', NULL, '1', NULL),
(504, NULL, 'CARGO_CONTACTO', '441', 'USUA', 'USUARIO FINAL', '2', '0', '0', NULL, '1', NULL),
(505, NULL, 'CARGO_CONTACTO', '442', 'DOCENCIA', 'JEFE DE LA UNIDAD FUNCIONAL DE DOCENCIA', '2', '0', '0', NULL, '1', NULL),
(506, NULL, 'CARGO_CONTACTO', '30', 'logistica', 'jefe de logistica', '2', '0', '0', NULL, '1', NULL),
(507, NULL, 'CARGO_CONTACTO', '0003', 'GTE', 'GERENTE GENERAL', '2', '0', '0', NULL, '1', NULL),
(508, NULL, 'PROCEDENCIA', '14', 'DK', 'DINAMARCA', '2', '0', '0', NULL, '1', NULL),
(509, NULL, 'TIPO_CONTACTO', '3', 'CTT', 'CONTACTO', '2', '0', '0', NULL, '1', NULL),
(511, NULL, 'SEXO', '002', 'MCL', 'MASCULINO', '2', '0', '0', NULL, '1', NULL),
(512, NULL, 'SEXO', '003', 'FMN', 'FEMENINO', '2', '0', '0', NULL, '1', NULL),
(513, NULL, 'TITULO', '001', 'NGN', 'NINGUNO', '2', '0', '1', NULL, '1', NULL),
(514, NULL, 'TITULO', '002', 'SR.', 'SEÑOR', '2', '0', '0', NULL, '1', NULL),
(515, NULL, 'TITULO', '003', 'SRA.', 'SEÑORA', '2', '0', '0', NULL, '1', NULL),
(516, NULL, 'TITULO', '004', 'DR.', 'DOCTOR', '2', '0', '0', NULL, '1', NULL),
(517, NULL, 'TITULO', '005', 'DRA.', 'DOCTORA', '2', '0', '0', NULL, '1', NULL),
(518, NULL, 'TITULO', '006', 'ING.', 'INGENIERO(A)', '2', '0', '0', NULL, '1', NULL),
(519, NULL, 'TITULO', '007', 'SRTA.', 'SEÑORITA', '2', '0', '0', NULL, '1', NULL),
(521, NULL, 'ESTADO_CIVIL', '002', 'CSD', 'CASADO(A)', '2', '0', '0', NULL, '1', NULL),
(522, NULL, 'ESTADO_CIVIL', '003', 'SLT', 'SOLTERO(A)', '2', '0', '0', NULL, '1', NULL),
(523, NULL, 'ESTADO_CIVIL', '004', 'VUD', 'VIUDO(A)', '2', '0', '0', NULL, '1', NULL),
(524, NULL, 'ESTADO_CIVIL', '005', 'DVC', 'DIVORCIADO(A)', '2', '0', '0', NULL, '1', NULL),
(525, NULL, 'ESTADO_CIVIL', '006', 'CVV', 'CONVIVIENTE', '2', '0', '0', NULL, '1', NULL),
(526, NULL, 'ORIGEN_CONTACTO', '001', 'NGN', 'NINGUNO', '2', '0', '1', NULL, '1', NULL),
(527, NULL, 'ORIGEN_CONTACTO', '002', 'LMD', 'LLAMADA', '2', '0', '0', NULL, '1', NULL),
(528, NULL, 'ORIGEN_CONTACTO', '003', 'VST.', 'VISITA', '2', '0', '0', NULL, '1', NULL),
(529, NULL, 'ORIGEN_CONTACTO', '004', 'RFD', 'REFERIDO', '2', '0', '0', NULL, '1', NULL),
(530, NULL, 'ORIGEN_CONTACTO', '005', 'CGR', 'CONGRESO', '2', '0', '0', NULL, '1', NULL),
(531, NULL, 'ORIGEN_CONTACTO', '006', 'CFR', 'CONFERENCIA', '2', '0', '0', NULL, '1', NULL),
(532, NULL, 'ORIGEN_CONTACTO', '007', 'SMP', 'SIMPOSIO', '2', '0', '0', NULL, '1', NULL),
(533, NULL, 'NIVEL_DECISION', '001', 'NGN', 'NINGUNO', '2', '0', '1', NULL, '1', NULL),
(534, NULL, 'NIVEL_DECISION', '002', 'USR', 'USUARIO', '2', '0', '0', NULL, '1', NULL),
(535, NULL, 'NIVEL_DECISION', '003', 'TCN', 'TECNICO', '2', '0', '0', NULL, '1', NULL),
(536, NULL, 'NIVEL_DECISION', '004', 'APB', 'APROBADOR', '2', '0', '0', NULL, '1', NULL),
(537, NULL, 'NIVEL_DECISION', '005', 'LGC', 'LOGISTICA', '2', '0', '0', NULL, '1', NULL),
(538, NULL, 'MEDIO_CONTACTO', '001', 'NGN', 'NINGUNO', '2', '0', '1', NULL, '1', NULL),
(539, NULL, 'MEDIO_CONTACTO', '002', 'TEL', 'TELEFONO', '2', '0', '0', NULL, '1', NULL),
(540, NULL, 'MEDIO_CONTACTO', '003', 'CEL', 'CELULAR', '2', '0', '0', NULL, '1', NULL),
(541, NULL, 'MEDIO_CONTACTO', '004', 'EML', 'CORREO ELECTRONICO', '2', '0', '0', NULL, '1', NULL),
(542, NULL, 'MEDIO_CONTACTO', '005', 'WEB', 'SITIO WEB', '2', '0', '0', NULL, '1', NULL),
(543, NULL, 'MEDIO_CONTACTO', '006', 'FCB', 'FACEBOOK', '2', '0', '0', NULL, '1', NULL),
(544, NULL, 'MEDIO_CONTACTO', '007', 'TWT', 'TWITTER', '2', '0', '0', NULL, '1', NULL),
(545, NULL, 'MEDIO_CONTACTO', '008', 'LKD', 'LINKEDIN', '2', '0', '0', NULL, '1', NULL),
(546, NULL, 'MEDIO_CONTACTO', '009', 'ITG', 'INSTAGRAM', '2', '0', '0', NULL, '1', NULL),
(547, NULL, 'MEDIO_CONTACTO', '010', 'YTB', 'YOUTUBE', '2', '0', '0', NULL, '1', NULL),
(548, NULL, 'MEDIO_CONTACTO', '011', 'WSA', 'WHATSAPP', '2', '0', '0', NULL, '1', NULL),
(549, NULL, 'SECTOR_ECONOMICO', '001', 'NGN', 'NO ESTABLECIDO', '2', '0', '1', NULL, '1', NULL),
(550, NULL, 'SECTOR_ECONOMICO', '002', 'EDU', 'EDUCACION', '2', '0', '0', NULL, '1', NULL),
(551, NULL, 'SECTOR_ECONOMICO', '003', 'SLD', 'SALUD', '2', '0', '0', NULL, '1', NULL),
(552, NULL, 'SECTOR_ECONOMICO', '004', 'IND', 'INDUSTRIA', '2', '0', '0', NULL, '1', NULL);
INSERT INTO `catalogotabla` (`nIdCatalogoTabla`, `nIdCatalogoTablaPadre`, `sNombreCatalogo`, `sCodigoItem`, `sDescripcionCortaItem`, `sDescripcionLargaItem`, `sTipoItem`, `sMostrarCliente`, `sDefecto`, `sDetalleItem`, `sEstado`, `nOrden`) VALUES
(553, NULL, 'SECTOR_ECONOMICO', '005', 'MIN', 'MINERIA', '2', '0', '0', NULL, '1', NULL),
(554, 549, 'CATEGORIA_SECTOR_ECONOMICO', '001', 'NGN', 'NO ESTABLECIDO', '2', '0', '1', NULL, '1', NULL),
(555, 550, 'CATEGORIA_SECTOR_ECONOMICO', '002', 'UNI', 'UNIVERSIDAD', '2', '0', '0', NULL, '1', NULL),
(556, 550, 'CATEGORIA_SECTOR_ECONOMICO', '003', 'COL', 'COLEGIO', '2', '0', '0', NULL, '1', NULL),
(557, 550, 'CATEGORIA_SECTOR_ECONOMICO', '004', 'INS', 'INSTITUTO', '2', '0', '0', NULL, '1', NULL),
(558, 551, 'CATEGORIA_SECTOR_ECONOMICO', '005', 'HOS', 'HOSPITAL', '2', '0', '0', NULL, '1', NULL),
(559, NULL, 'TIPO_CLIENTE', '001', 'NGN', 'NO ESTABLECIDO', '2', '0', '1', NULL, '1', NULL),
(560, NULL, 'TIPO_CLIENTE', '002', 'PUB', 'PUBLICO', '2', '0', '0', NULL, '1', NULL),
(561, NULL, 'TIPO_CLIENTE', '003', 'PVD', 'PRIVADO', '2', '0', '0', NULL, '1', NULL),
(562, NULL, 'TIPO_CLIENTE', '004', 'MXT', 'MIXTO', '2', '0', '0', NULL, '1', NULL),
(563, NULL, 'ETAPA_PROYECTO', '001', 'EVL', 'EVALUADO', '2', '0', '1', NULL, '1', NULL),
(564, NULL, 'ETAPA_PROYECTO', '002', 'REQ', 'REQUERIDO', '2', '0', '0', NULL, '1', NULL),
(565, NULL, 'ETAPA_PROYECTO', '003', 'EMC', 'E. MERCADO', '2', '0', '0', NULL, '1', NULL),
(566, NULL, 'ETAPA_PROYECTO', '004', 'PPT', 'PRESUPUESTO', '2', '0', '0', NULL, '1', NULL),
(567, NULL, 'ETAPA_PROYECTO', '005', 'CVD', 'CONVOCADO', '2', '0', '0', NULL, '1', NULL),
(568, NULL, 'TIPO_ACTIVIDAD', '001', 'OTR', 'OTRO', '2', '0', '1', NULL, '1', NULL),
(569, NULL, 'TIPO_ACTIVIDAD', '002', 'LMD', 'LLAMADA', '2', '0', '0', NULL, '1', NULL),
(570, NULL, 'TIPO_ACTIVIDAD', '003', 'EML', 'EMAIL', '2', '0', '0', NULL, '1', NULL),
(571, NULL, 'TIPO_ACTIVIDAD', '004', 'REU', 'REUNION', '2', '0', '0', NULL, '1', NULL),
(572, NULL, 'TIPO_ACTIVIDAD', '005', 'SGM', 'SEGUIMIENTO', '2', '0', '0', NULL, '1', NULL),
(573, NULL, 'ESTADO_ACTIVIDAD', '001', 'PDT', 'PENDIENTE', '2', '0', '1', NULL, '1', NULL),
(574, NULL, 'ESTADO_ACTIVIDAD', '002', 'CLD', 'CANCELADA', '2', '0', '0', NULL, '1', NULL),
(575, NULL, 'ESTADO_ACTIVIDAD', '003', 'CPG', 'CANCELADA Y POSTERGADA', '2', '0', '0', NULL, '1', NULL),
(576, NULL, 'ESTADO_ACTIVIDAD', '004', 'ETD', 'EJECUTADA', '2', '0', '0', NULL, '1', NULL),
(577, NULL, 'MEDIO_CONTACTO', '012', 'OMC', 'OTRO MEDIO DE CONTACTO', '2', '0', '0', NULL, '1', NULL),
(578, NULL, 'MEDIO_CONTACTO', '013', 'PCR', 'PROBANDO CREACION', '2', '0', '0', NULL, '1', NULL),
(580, NULL, 'UNA_PRUEBA_DE_TABLA', '00', 'XXX', 'XXXXXXXXXX', '2', '0', '0', NULL, '1', NULL),
(581, NULL, 'SEGUNDA_PRUEBA_TABLA', '00', 'XXX', 'XXXXXXXXXX', '2', '0', '0', NULL, '1', NULL),
(582, NULL, 'MI_TABLA', '00', 'XXX', 'XXXXXXXXXX', '2', '0', '0', NULL, '1', NULL),
(586, NULL, 'TIPO_PROSPECTO', '001', 'CRT', 'CORTO', '2', '0', '0', NULL, '1', NULL),
(587, NULL, 'TIPO_PROSPECTO', '002', 'LRG', 'LARGO', '2', '0', '0', NULL, '1', NULL),
(588, NULL, 'TIPO_EMPLEADO', '001', 'SUPER', 'SUPERVISOR', '2', '0', '0', NULL, '1', NULL),
(589, NULL, 'TIPO_EMPLEADO', '002', 'EMP', 'ASESOR DE VENTAS', '2', '0', '0', NULL, '1', NULL),
(590, NULL, 'COLORES', '001', 'ROJO', 'ROJO', '2', '0', '0', NULL, '1', NULL),
(591, NULL, 'COLORES', '002', 'AMARILLO', 'AMARILLO', '2', '0', '0', NULL, '1', NULL),
(592, NULL, 'COLORES', '003', 'VERDE', 'VERDE', '2', '0', '0', NULL, '1', NULL),
(593, NULL, 'COLORES', '004', 'AZUL', 'AZUL', '2', '0', '0', NULL, '1', NULL),
(594, NULL, 'COLORES', '005', 'MORADO', 'MORADO', '2', '0', '0', NULL, '1', NULL),
(595, NULL, 'COLORES', '006', 'NEGRO', 'NEGRO', '2', '0', '0', NULL, '1', NULL),
(596, NULL, 'COLORES', '0087', 'PLOMO', 'PLOMO', '2', '0', '0', NULL, '1', NULL),
(597, NULL, 'COLORES', '008', 'NARANJA', 'NARANJA', '2', '0', '0', NULL, '1', NULL),
(598, NULL, 'COLORES', '009', 'ROSA', 'ROSA', '2', '0', '0', NULL, '1', NULL),
(599, NULL, 'COLORES', '010', 'MARRON', 'MARRON', '2', '0', '0', NULL, '1', NULL),
(602, NULL, 'NIVEL_EDUCACION', '001', 'EB', 'EDUCACION BASICA', '2', '0', '0', NULL, '1', NULL),
(603, NULL, 'NIVEL_EDUCACION', '002', 'ET', 'EDUCACIÓN TECNICA', '2', '0', '0', NULL, '1', NULL),
(604, NULL, 'NIVEL_EDUCACION', '003', 'ES', 'EDUCACION SUPERIOR', '2', '0', '0', NULL, '1', NULL),
(605, NULL, 'NIVEL_EDUCACION', '004', 'NGN', 'NINGUNO', '2', '0', '0', NULL, '1', NULL),
(606, NULL, 'SITUACION_ESTUDIO', '001', 'TR', 'TRUNCO', '2', '0', '0', NULL, '1', NULL),
(607, NULL, 'SITUACION_ESTUDIO', '002', 'EC', 'EN CURSO', '2', '0', '0', NULL, '1', NULL),
(608, NULL, 'SITUACION_ESTUDIO', '003', 'CMP', 'COMPLETADO', '2', '0', '0', NULL, '1', NULL),
(609, NULL, 'TIPO_RELACIONAMIENTO', '001', 'GRN', 'GERENTE', '2', '0', '0', NULL, '1', NULL),
(610, NULL, 'TIPO_RELACIONAMIENTO', '002', 'EMP', 'EMPLEADO', '2', '0', '0', NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `nIdCliente` int(11) NOT NULL,
  `nIdNegocio` int(11) NOT NULL,
  `nTipoCliente` int(11) NOT NULL COMMENT '1 EMPRESA ,\r\n2 PERSONA',
  `nTipoDocumento` int(11) DEFAULT NULL,
  `sNumeroDocumento` varchar(250) DEFAULT NULL,
  `sNombreoRazonSocial` varchar(250) DEFAULT NULL,
  `sContacto` varchar(250) DEFAULT NULL,
  `sCorreo` varchar(250) DEFAULT NULL,
  `nIdDepartamento` varchar(2) DEFAULT NULL,
  `nIdProvincia` varchar(4) DEFAULT NULL,
  `nIdDistrito` varchar(6) DEFAULT NULL,
  `sDireccion` varchar(250) DEFAULT NULL,
  `sTelefono` varchar(250) DEFAULT NULL,
  `dFechaCreacion` datetime DEFAULT NULL,
  `nIdRelacionamiento` int(11) DEFAULT NULL,
  `nEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`nIdCliente`, `nIdNegocio`, `nTipoCliente`, `nTipoDocumento`, `sNumeroDocumento`, `sNombreoRazonSocial`, `sContacto`, `sCorreo`, `nIdDepartamento`, `nIdProvincia`, `nIdDistrito`, `sDireccion`, `sTelefono`, `dFechaCreacion`, `nIdRelacionamiento`, `nEstado`) VALUES
(29, 67, 2, 63, '75447123', 'RAMIREZ RODRIGUEZ DIANA NICOLLE cccccc', NULL, 'ramirez@gmail.com', '15', '1501', '150141', 'sadasd', '914353359', '2021-02-28 10:23:22', 0, 1),
(30, 67, 2, 63, '75348122', '\"GARCIA\" ALEJO, J\' \"ORG\'\'\'\'\'\"\' \"E IMANOL', NULL, 'Garcia@gmsil.com', '20', '2001', '200101', 'Av Piura 123', '91535888', '2021-02-28 11:55:28', 0, 1),
(31, 67, 2, 63, '75435683', 'NAVARRO RIVERA, LOURDES MERCEDES', NULL, 'Nav@gmail.col', '07', '701', '70103', 'JR libertad 400', '7634813', '2021-02-28 12:07:50', NULL, 0),
(32, 67, 2, 63, '75341825', 'SORIANO CORONEL, JOSE', NULL, 'sorianocoro@gmial.com', '01', '0101', '010101', 'av lima12', '222', '2021-02-28 12:13:07', 0, 1),
(33, 67, 2, 63, '75348121', 'LEON TEJEDA, CHARLY OSWALDO', NULL, 'lyon@gmail.com', '01', '0101', '010101', 'av lima 123', 'av lima123', '2021-02-28 12:15:15', 0, 1),
(34, 67, 2, 63, '75348125', 'DIAZ GIRALDO, CORAIMA CAMILA', NULL, 'díaz@gmail.com', '02', '0204', '20402', 'MM', '991715417', '2021-02-28 12:19:29', NULL, 1),
(35, 67, 2, 63, '7534121', 'BEDOYA BAZAN, JOSUE ISRAEL', NULL, 'Jose@gmail.cim', '01', '0102', '10203', 'MM', '991715417', '2021-02-28 12:26:36', NULL, 1),
(36, 67, 2, 63, '75436232', 'DURAN LANDEO, CELSO ARTURO', NULL, 'Duram@gmail.com', '01', '0101', '', 'Av lima123', '991715417', '2021-02-28 12:35:02', 0, 1),
(37, 67, 2, 63, '75347133', 'CALLE QUISPE, ELIZABETHss', NULL, 'calle@gmsil.com', '01', '0101', '', 'Av lima 123', '91534586', '2021-02-28 12:51:18', 0, 1),
(38, 67, 2, 63, '06243211', 'CESPEDES BRAVO, NORA VICTORIA', NULL, 'Cespedes@gmail.com', '07', '0701', '070103', 'Av lima 123', '64 64646466464', '2021-02-28 23:22:40', NULL, 1),
(42, 67, 2, 63, '5555555', 'jerry', NULL, '22', '07', '0701', '070101', 'abv lima12', '914353359', '2021-03-26 12:40:23', NULL, 1),
(43, 67, 1, 63, ' 2222222', 'LEON TEJEDA, CHARLY OSWALDO ___', 'addada', 'dasdasdasd', '01', '0101', '010101', 'dasdas', 'dasdadasd', '2021-05-12 09:57:11', 609, 1),
(44, 67, 1, 65, '7534813310', 'pepito', 'ada', 'adsadasd@gmail.com', '01', '0101', '010101', 'asdad', 'sdadsad', '2021-06-10 17:29:07', 609, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configprospecto`
--

CREATE TABLE `configprospecto` (
  `nIdConfigProspecto` int(11) NOT NULL,
  `nIdNegocio` int(11) NOT NULL,
  `nIdWidget` int(11) NOT NULL,
  `nOrden` int(11) DEFAULT NULL,
  `nEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `configprospecto`
--

INSERT INTO `configprospecto` (`nIdConfigProspecto`, `nIdNegocio`, `nIdWidget`, `nOrden`, `nEstado`) VALUES
(214, 67, 1, 0, 1),
(215, 67, 2, 1, 1),
(216, 67, 3, 5, 1),
(217, 67, 4, 2, 1),
(218, 67, 5, 3, 1),
(219, 67, 6, 4, 1),
(220, 67, 47, 6, 1),
(221, 67, 48, 7, 1),
(222, 67, 49, 8, 1),
(223, 68, 1, 1, 1),
(224, 68, 2, 2, 1),
(225, 68, 3, 3, 1),
(226, 68, 4, 4, 1),
(227, 68, 5, 5, 1),
(228, 68, 6, 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracioncampos`
--

CREATE TABLE `configuracioncampos` (
  `nIdConfiguracionCampo` int(11) NOT NULL,
  `nIdNegocio` int(11) NOT NULL,
  `nIdCampoEntidad` int(11) NOT NULL,
  `nEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `configuracioncampos`
--

INSERT INTO `configuracioncampos` (`nIdConfiguracionCampo`, `nIdNegocio`, `nIdCampoEntidad`, `nEstado`) VALUES
(1990, 67, 1, 1),
(1991, 67, 2, 1),
(1992, 67, 43, 1),
(1993, 67, 7, 1),
(1994, 67, 8, 1),
(1995, 67, 41, 1),
(1996, 67, 42, 1),
(1997, 67, 9, 1),
(1998, 67, 48, 1),
(1999, 67, 10, 1),
(2000, 67, 11, 1),
(2001, 67, 37, 1),
(2002, 67, 12, 1),
(2003, 67, 13, 1),
(2004, 67, 14, 1),
(2005, 67, 40, 1),
(2006, 67, 15, 1),
(2007, 67, 16, 1),
(2008, 67, 17, 1),
(2009, 67, 19, 1),
(2010, 67, 47, 1),
(2011, 67, 21, 1),
(2012, 67, 22, 1),
(2013, 67, 51, 1),
(2014, 67, 52, 1),
(2015, 67, 23, 1),
(2016, 67, 24, 1),
(2017, 67, 25, 1),
(2018, 67, 26, 1),
(2019, 67, 27, 1),
(2020, 67, 49, 1),
(2021, 67, 38, 1),
(2022, 67, 46, 1),
(2023, 67, 28, 1),
(2024, 67, 29, 1),
(2025, 67, 30, 1),
(2026, 67, 32, 1),
(2027, 67, 33, 1),
(2028, 67, 54, 1),
(2029, 67, 53, 1),
(2030, 67, 34, 1),
(2031, 67, 35, 1),
(2032, 67, 36, 1),
(2033, 67, 39, 1),
(2034, 67, 50, 1),
(2035, 68, 1, 1),
(2036, 68, 2, 1),
(2037, 68, 43, 1),
(2038, 68, 7, 1),
(2039, 68, 8, 1),
(2040, 68, 41, 1),
(2041, 68, 42, 1),
(2042, 68, 9, 1),
(2043, 68, 48, 1),
(2044, 68, 10, 1),
(2045, 68, 11, 1),
(2046, 68, 37, 1),
(2047, 68, 12, 1),
(2048, 68, 13, 1),
(2049, 68, 14, 1),
(2050, 68, 40, 1),
(2051, 68, 15, 1),
(2052, 68, 16, 1),
(2053, 68, 17, 1),
(2054, 68, 19, 1),
(2055, 68, 47, 1),
(2056, 68, 21, 1),
(2057, 68, 22, 1),
(2058, 68, 51, 1),
(2059, 68, 52, 1),
(2060, 68, 23, 1),
(2061, 68, 24, 1),
(2062, 68, 25, 1),
(2063, 68, 26, 1),
(2064, 68, 27, 1),
(2065, 68, 49, 1),
(2066, 68, 38, 1),
(2067, 68, 46, 1),
(2068, 68, 28, 1),
(2069, 68, 29, 1),
(2070, 68, 30, 1),
(2071, 68, 32, 1),
(2072, 68, 33, 1),
(2073, 68, 54, 1),
(2074, 68, 53, 1),
(2075, 68, 34, 1),
(2076, 68, 35, 1),
(2077, 68, 36, 1),
(2078, 68, 39, 1),
(2079, 68, 50, 1),
(2080, 67, 55, 1),
(2082, 68, 56, 1),
(2083, 67, 56, 1),
(2084, 68, 56, 1),
(2085, 67, 59, 1),
(2086, 68, 59, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `nIdDepartamento` varchar(2) NOT NULL,
  `sNombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`nIdDepartamento`, `sNombre`) VALUES
('01', 'Amazonas'),
('02', 'Áncash'),
('03', 'Apurímac'),
('04', 'Arequipa'),
('05', 'Ayacucho'),
('06', 'Cajamarca'),
('07', 'Callao'),
('08', 'Cusco'),
('09', 'Huancavelica'),
('10', 'Huánuco'),
('11', 'Ica'),
('12', 'Junín'),
('13', 'La Libertad'),
('14', 'Lambayeque'),
('15', 'Lima'),
('16', 'Loreto'),
('17', 'Madre de Dios'),
('18', 'Moquegua'),
('19', 'Pasco'),
('20', 'Piura'),
('21', 'Puno'),
('22', 'San Martín'),
('23', 'Tacna'),
('24', 'Tumbes'),
('25', 'Ucayali');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallesegmentacion`
--

CREATE TABLE `detallesegmentacion` (
  `nIdDetalleSegmentacion` int(11) NOT NULL,
  `nIdSegmentacion` int(11) NOT NULL,
  `sNombre` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detallesegmentacion`
--

INSERT INTO `detallesegmentacion` (`nIdDetalleSegmentacion`, `nIdSegmentacion`, `sNombre`, `nEstado`) VALUES
(70, 44, 'V1', 1),
(71, 44, 'V2', 1),
(72, 44, 'V3', 0),
(75, 46, 'VAL1', 1),
(76, 46, 'VAL2', 1),
(77, 46, 'VAL3', 1),
(78, 47, 'fsfdsd', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `nIdDistrito` varchar(6) NOT NULL,
  `sNombre` varchar(45) DEFAULT NULL,
  `nIdProvincia` varchar(4) DEFAULT NULL,
  `nIdDepartamento` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`nIdDistrito`, `sNombre`, `nIdProvincia`, `nIdDepartamento`) VALUES
('010101', 'Chachapoyas', '0101', '01'),
('010102', 'Asunción', '0101', '01'),
('010103', 'Balsas', '0101', '01'),
('010104', 'Cheto', '0101', '01'),
('010105', 'Chiliquin', '0101', '01'),
('010106', 'Chuquibamba', '0101', '01'),
('010107', 'Granada', '0101', '01'),
('010108', 'Huancas', '0101', '01'),
('010109', 'La Jalca', '0101', '01'),
('010110', 'Leimebamba', '0101', '01'),
('010111', 'Levanto', '0101', '01'),
('010112', 'Magdalena', '0101', '01'),
('010113', 'Mariscal Castilla', '0101', '01'),
('010114', 'Molinopampa', '0101', '01'),
('010115', 'Montevideo', '0101', '01'),
('010116', 'Olleros', '0101', '01'),
('010117', 'Quinjalca', '0101', '01'),
('010118', 'San Francisco de Daguas', '0101', '01'),
('010119', 'San Isidro de Maino', '0101', '01'),
('010120', 'Soloco', '0101', '01'),
('010121', 'Sonche', '0101', '01'),
('010201', 'Bagua', '0102', '01'),
('010202', 'Aramango', '0102', '01'),
('010203', 'Copallin', '0102', '01'),
('010204', 'El Parco', '0102', '01'),
('010205', 'Imaza', '0102', '01'),
('010206', 'La Peca', '0102', '01'),
('010301', 'Jumbilla', '0103', '01'),
('010302', 'Chisquilla', '0103', '01'),
('010303', 'Churuja', '0103', '01'),
('010304', 'Corosha', '0103', '01'),
('010305', 'Cuispes', '0103', '01'),
('010306', 'Florida', '0103', '01'),
('010307', 'Jazan', '0103', '01'),
('010308', 'Recta', '0103', '01'),
('010309', 'San Carlos', '0103', '01'),
('010310', 'Shipasbamba', '0103', '01'),
('010311', 'Valera', '0103', '01'),
('010312', 'Yambrasbamba', '0103', '01'),
('010401', 'Nieva', '0104', '01'),
('010402', 'El Cenepa', '0104', '01'),
('010403', 'Río Santiago', '0104', '01'),
('010501', 'Lamud', '0105', '01'),
('010502', 'Camporredondo', '0105', '01'),
('010503', 'Cocabamba', '0105', '01'),
('010504', 'Colcamar', '0105', '01'),
('010505', 'Conila', '0105', '01'),
('010506', 'Inguilpata', '0105', '01'),
('010507', 'Longuita', '0105', '01'),
('010508', 'Lonya Chico', '0105', '01'),
('010509', 'Luya', '0105', '01'),
('010510', 'Luya Viejo', '0105', '01'),
('010511', 'María', '0105', '01'),
('010512', 'Ocalli', '0105', '01'),
('010513', 'Ocumal', '0105', '01'),
('010514', 'Pisuquia', '0105', '01'),
('010515', 'Providencia', '0105', '01'),
('010516', 'San Cristóbal', '0105', '01'),
('010517', 'San Francisco de Yeso', '0105', '01'),
('010518', 'San Jerónimo', '0105', '01'),
('010519', 'San Juan de Lopecancha', '0105', '01'),
('010520', 'Santa Catalina', '0105', '01'),
('010521', 'Santo Tomas', '0105', '01'),
('010522', 'Tingo', '0105', '01'),
('010523', 'Trita', '0105', '01'),
('010601', 'San Nicolás', '0106', '01'),
('010602', 'Chirimoto', '0106', '01'),
('010603', 'Cochamal', '0106', '01'),
('010604', 'Huambo', '0106', '01'),
('010605', 'Limabamba', '0106', '01'),
('010606', 'Longar', '0106', '01'),
('010607', 'Mariscal Benavides', '0106', '01'),
('010608', 'Milpuc', '0106', '01'),
('010609', 'Omia', '0106', '01'),
('010610', 'Santa Rosa', '0106', '01'),
('010611', 'Totora', '0106', '01'),
('010612', 'Vista Alegre', '0106', '01'),
('010701', 'Bagua Grande', '0107', '01'),
('010702', 'Cajaruro', '0107', '01'),
('010703', 'Cumba', '0107', '01'),
('010704', 'El Milagro', '0107', '01'),
('010705', 'Jamalca', '0107', '01'),
('010706', 'Lonya Grande', '0107', '01'),
('010707', 'Yamon', '0107', '01'),
('020101', 'Huaraz', '0201', '02'),
('020102', 'Cochabamba', '0201', '02'),
('020103', 'Colcabamba', '0201', '02'),
('020104', 'Huanchay', '0201', '02'),
('020105', 'Independencia', '0201', '02'),
('020106', 'Jangas', '0201', '02'),
('020107', 'La Libertad', '0201', '02'),
('020108', 'Olleros', '0201', '02'),
('020109', 'Pampas Grande', '0201', '02'),
('020110', 'Pariacoto', '0201', '02'),
('020111', 'Pira', '0201', '02'),
('020112', 'Tarica', '0201', '02'),
('020201', 'Aija', '0202', '02'),
('020202', 'Coris', '0202', '02'),
('020203', 'Huacllan', '0202', '02'),
('020204', 'La Merced', '0202', '02'),
('020205', 'Succha', '0202', '02'),
('020301', 'Llamellin', '0203', '02'),
('020302', 'Aczo', '0203', '02'),
('020303', 'Chaccho', '0203', '02'),
('020304', 'Chingas', '0203', '02'),
('020305', 'Mirgas', '0203', '02'),
('020306', 'San Juan de Rontoy', '0203', '02'),
('020401', 'Chacas', '0204', '02'),
('020402', 'Acochaca', '0204', '02'),
('020501', 'Chiquian', '0205', '02'),
('020502', 'Abelardo Pardo Lezameta', '0205', '02'),
('020503', 'Antonio Raymondi', '0205', '02'),
('020504', 'Aquia', '0205', '02'),
('020505', 'Cajacay', '0205', '02'),
('020506', 'Canis', '0205', '02'),
('020507', 'Colquioc', '0205', '02'),
('020508', 'Huallanca', '0205', '02'),
('020509', 'Huasta', '0205', '02'),
('020510', 'Huayllacayan', '0205', '02'),
('020511', 'La Primavera', '0205', '02'),
('020512', 'Mangas', '0205', '02'),
('020513', 'Pacllon', '0205', '02'),
('020514', 'San Miguel de Corpanqui', '0205', '02'),
('020515', 'Ticllos', '0205', '02'),
('020601', 'Carhuaz', '0206', '02'),
('020602', 'Acopampa', '0206', '02'),
('020603', 'Amashca', '0206', '02'),
('020604', 'Anta', '0206', '02'),
('020605', 'Ataquero', '0206', '02'),
('020606', 'Marcara', '0206', '02'),
('020607', 'Pariahuanca', '0206', '02'),
('020608', 'San Miguel de Aco', '0206', '02'),
('020609', 'Shilla', '0206', '02'),
('020610', 'Tinco', '0206', '02'),
('020611', 'Yungar', '0206', '02'),
('020701', 'San Luis', '0207', '02'),
('020702', 'San Nicolás', '0207', '02'),
('020703', 'Yauya', '0207', '02'),
('020801', 'Casma', '0208', '02'),
('020802', 'Buena Vista Alta', '0208', '02'),
('020803', 'Comandante Noel', '0208', '02'),
('020804', 'Yautan', '0208', '02'),
('020901', 'Corongo', '0209', '02'),
('020902', 'Aco', '0209', '02'),
('020903', 'Bambas', '0209', '02'),
('020904', 'Cusca', '0209', '02'),
('020905', 'La Pampa', '0209', '02'),
('020906', 'Yanac', '0209', '02'),
('020907', 'Yupan', '0209', '02'),
('021001', 'Huari', '0210', '02'),
('021002', 'Anra', '0210', '02'),
('021003', 'Cajay', '0210', '02'),
('021004', 'Chavin de Huantar', '0210', '02'),
('021005', 'Huacachi', '0210', '02'),
('021006', 'Huacchis', '0210', '02'),
('021007', 'Huachis', '0210', '02'),
('021008', 'Huantar', '0210', '02'),
('021009', 'Masin', '0210', '02'),
('021010', 'Paucas', '0210', '02'),
('021011', 'Ponto', '0210', '02'),
('021012', 'Rahuapampa', '0210', '02'),
('021013', 'Rapayan', '0210', '02'),
('021014', 'San Marcos', '0210', '02'),
('021015', 'San Pedro de Chana', '0210', '02'),
('021016', 'Uco', '0210', '02'),
('021101', 'Huarmey', '0211', '02'),
('021102', 'Cochapeti', '0211', '02'),
('021103', 'Culebras', '0211', '02'),
('021104', 'Huayan', '0211', '02'),
('021105', 'Malvas', '0211', '02'),
('021201', 'Caraz', '0212', '02'),
('021202', 'Huallanca', '0212', '02'),
('021203', 'Huata', '0212', '02'),
('021204', 'Huaylas', '0212', '02'),
('021205', 'Mato', '0212', '02'),
('021206', 'Pamparomas', '0212', '02'),
('021207', 'Pueblo Libre', '0212', '02'),
('021208', 'Santa Cruz', '0212', '02'),
('021209', 'Santo Toribio', '0212', '02'),
('021210', 'Yuracmarca', '0212', '02'),
('021301', 'Piscobamba', '0213', '02'),
('021302', 'Casca', '0213', '02'),
('021303', 'Eleazar Guzmán Barron', '0213', '02'),
('021304', 'Fidel Olivas Escudero', '0213', '02'),
('021305', 'Llama', '0213', '02'),
('021306', 'Llumpa', '0213', '02'),
('021307', 'Lucma', '0213', '02'),
('021308', 'Musga', '0213', '02'),
('021401', 'Ocros', '0214', '02'),
('021402', 'Acas', '0214', '02'),
('021403', 'Cajamarquilla', '0214', '02'),
('021404', 'Carhuapampa', '0214', '02'),
('021405', 'Cochas', '0214', '02'),
('021406', 'Congas', '0214', '02'),
('021407', 'Llipa', '0214', '02'),
('021408', 'San Cristóbal de Rajan', '0214', '02'),
('021409', 'San Pedro', '0214', '02'),
('021410', 'Santiago de Chilcas', '0214', '02'),
('021501', 'Cabana', '0215', '02'),
('021502', 'Bolognesi', '0215', '02'),
('021503', 'Conchucos', '0215', '02'),
('021504', 'Huacaschuque', '0215', '02'),
('021505', 'Huandoval', '0215', '02'),
('021506', 'Lacabamba', '0215', '02'),
('021507', 'Llapo', '0215', '02'),
('021508', 'Pallasca', '0215', '02'),
('021509', 'Pampas', '0215', '02'),
('021510', 'Santa Rosa', '0215', '02'),
('021511', 'Tauca', '0215', '02'),
('021601', 'Pomabamba', '0216', '02'),
('021602', 'Huayllan', '0216', '02'),
('021603', 'Parobamba', '0216', '02'),
('021604', 'Quinuabamba', '0216', '02'),
('021701', 'Recuay', '0217', '02'),
('021702', 'Catac', '0217', '02'),
('021703', 'Cotaparaco', '0217', '02'),
('021704', 'Huayllapampa', '0217', '02'),
('021705', 'Llacllin', '0217', '02'),
('021706', 'Marca', '0217', '02'),
('021707', 'Pampas Chico', '0217', '02'),
('021708', 'Pararin', '0217', '02'),
('021709', 'Tapacocha', '0217', '02'),
('021710', 'Ticapampa', '0217', '02'),
('021801', 'Chimbote', '0218', '02'),
('021802', 'Cáceres del Perú', '0218', '02'),
('021803', 'Coishco', '0218', '02'),
('021804', 'Macate', '0218', '02'),
('021805', 'Moro', '0218', '02'),
('021806', 'Nepeña', '0218', '02'),
('021807', 'Samanco', '0218', '02'),
('021808', 'Santa', '0218', '02'),
('021809', 'Nuevo Chimbote', '0218', '02'),
('021901', 'Sihuas', '0219', '02'),
('021902', 'Acobamba', '0219', '02'),
('021903', 'Alfonso Ugarte', '0219', '02'),
('021904', 'Cashapampa', '0219', '02'),
('021905', 'Chingalpo', '0219', '02'),
('021906', 'Huayllabamba', '0219', '02'),
('021907', 'Quiches', '0219', '02'),
('021908', 'Ragash', '0219', '02'),
('021909', 'San Juan', '0219', '02'),
('021910', 'Sicsibamba', '0219', '02'),
('022001', 'Yungay', '0220', '02'),
('022002', 'Cascapara', '0220', '02'),
('022003', 'Mancos', '0220', '02'),
('022004', 'Matacoto', '0220', '02'),
('022005', 'Quillo', '0220', '02'),
('022006', 'Ranrahirca', '0220', '02'),
('022007', 'Shupluy', '0220', '02'),
('022008', 'Yanama', '0220', '02'),
('030101', 'Abancay', '0301', '03'),
('030102', 'Chacoche', '0301', '03'),
('030103', 'Circa', '0301', '03'),
('030104', 'Curahuasi', '0301', '03'),
('030105', 'Huanipaca', '0301', '03'),
('030106', 'Lambrama', '0301', '03'),
('030107', 'Pichirhua', '0301', '03'),
('030108', 'San Pedro de Cachora', '0301', '03'),
('030109', 'Tamburco', '0301', '03'),
('030201', 'Andahuaylas', '0302', '03'),
('030202', 'Andarapa', '0302', '03'),
('030203', 'Chiara', '0302', '03'),
('030204', 'Huancarama', '0302', '03'),
('030205', 'Huancaray', '0302', '03'),
('030206', 'Huayana', '0302', '03'),
('030207', 'Kishuara', '0302', '03'),
('030208', 'Pacobamba', '0302', '03'),
('030209', 'Pacucha', '0302', '03'),
('030210', 'Pampachiri', '0302', '03'),
('030211', 'Pomacocha', '0302', '03'),
('030212', 'San Antonio de Cachi', '0302', '03'),
('030213', 'San Jerónimo', '0302', '03'),
('030214', 'San Miguel de Chaccrampa', '0302', '03'),
('030215', 'Santa María de Chicmo', '0302', '03'),
('030216', 'Talavera', '0302', '03'),
('030217', 'Tumay Huaraca', '0302', '03'),
('030218', 'Turpo', '0302', '03'),
('030219', 'Kaquiabamba', '0302', '03'),
('030220', 'José María Arguedas', '0302', '03'),
('030301', 'Antabamba', '0303', '03'),
('030302', 'El Oro', '0303', '03'),
('030303', 'Huaquirca', '0303', '03'),
('030304', 'Juan Espinoza Medrano', '0303', '03'),
('030305', 'Oropesa', '0303', '03'),
('030306', 'Pachaconas', '0303', '03'),
('030307', 'Sabaino', '0303', '03'),
('030401', 'Chalhuanca', '0304', '03'),
('030402', 'Capaya', '0304', '03'),
('030403', 'Caraybamba', '0304', '03'),
('030404', 'Chapimarca', '0304', '03'),
('030405', 'Colcabamba', '0304', '03'),
('030406', 'Cotaruse', '0304', '03'),
('030407', 'Ihuayllo', '0304', '03'),
('030408', 'Justo Apu Sahuaraura', '0304', '03'),
('030409', 'Lucre', '0304', '03'),
('030410', 'Pocohuanca', '0304', '03'),
('030411', 'San Juan de Chacña', '0304', '03'),
('030412', 'Sañayca', '0304', '03'),
('030413', 'Soraya', '0304', '03'),
('030414', 'Tapairihua', '0304', '03'),
('030415', 'Tintay', '0304', '03'),
('030416', 'Toraya', '0304', '03'),
('030417', 'Yanaca', '0304', '03'),
('030501', 'Tambobamba', '0305', '03'),
('030502', 'Cotabambas', '0305', '03'),
('030503', 'Coyllurqui', '0305', '03'),
('030504', 'Haquira', '0305', '03'),
('030505', 'Mara', '0305', '03'),
('030506', 'Challhuahuacho', '0305', '03'),
('030601', 'Chincheros', '0306', '03'),
('030602', 'Anco_Huallo', '0306', '03'),
('030603', 'Cocharcas', '0306', '03'),
('030604', 'Huaccana', '0306', '03'),
('030605', 'Ocobamba', '0306', '03'),
('030606', 'Ongoy', '0306', '03'),
('030607', 'Uranmarca', '0306', '03'),
('030608', 'Ranracancha', '0306', '03'),
('030609', 'Rocchacc', '0306', '03'),
('030610', 'El Porvenir', '0306', '03'),
('030611', 'Los Chankas', '0306', '03'),
('030701', 'Chuquibambilla', '0307', '03'),
('030702', 'Curpahuasi', '0307', '03'),
('030703', 'Gamarra', '0307', '03'),
('030704', 'Huayllati', '0307', '03'),
('030705', 'Mamara', '0307', '03'),
('030706', 'Micaela Bastidas', '0307', '03'),
('030707', 'Pataypampa', '0307', '03'),
('030708', 'Progreso', '0307', '03'),
('030709', 'San Antonio', '0307', '03'),
('030710', 'Santa Rosa', '0307', '03'),
('030711', 'Turpay', '0307', '03'),
('030712', 'Vilcabamba', '0307', '03'),
('030713', 'Virundo', '0307', '03'),
('030714', 'Curasco', '0307', '03'),
('040101', 'Arequipa', '0401', '04'),
('040102', 'Alto Selva Alegre', '0401', '04'),
('040103', 'Cayma', '0401', '04'),
('040104', 'Cerro Colorado', '0401', '04'),
('040105', 'Characato', '0401', '04'),
('040106', 'Chiguata', '0401', '04'),
('040107', 'Jacobo Hunter', '0401', '04'),
('040108', 'La Joya', '0401', '04'),
('040109', 'Mariano Melgar', '0401', '04'),
('040110', 'Miraflores', '0401', '04'),
('040111', 'Mollebaya', '0401', '04'),
('040112', 'Paucarpata', '0401', '04'),
('040113', 'Pocsi', '0401', '04'),
('040114', 'Polobaya', '0401', '04'),
('040115', 'Quequeña', '0401', '04'),
('040116', 'Sabandia', '0401', '04'),
('040117', 'Sachaca', '0401', '04'),
('040118', 'San Juan de Siguas', '0401', '04'),
('040119', 'San Juan de Tarucani', '0401', '04'),
('040120', 'Santa Isabel de Siguas', '0401', '04'),
('040121', 'Santa Rita de Siguas', '0401', '04'),
('040122', 'Socabaya', '0401', '04'),
('040123', 'Tiabaya', '0401', '04'),
('040124', 'Uchumayo', '0401', '04'),
('040125', 'Vitor', '0401', '04'),
('040126', 'Yanahuara', '0401', '04'),
('040127', 'Yarabamba', '0401', '04'),
('040128', 'Yura', '0401', '04'),
('040129', 'José Luis Bustamante Y Rivero', '0401', '04'),
('040201', 'Camaná', '0402', '04'),
('040202', 'José María Quimper', '0402', '04'),
('040203', 'Mariano Nicolás Valcárcel', '0402', '04'),
('040204', 'Mariscal Cáceres', '0402', '04'),
('040205', 'Nicolás de Pierola', '0402', '04'),
('040206', 'Ocoña', '0402', '04'),
('040207', 'Quilca', '0402', '04'),
('040208', 'Samuel Pastor', '0402', '04'),
('040301', 'Caravelí', '0403', '04'),
('040302', 'Acarí', '0403', '04'),
('040303', 'Atico', '0403', '04'),
('040304', 'Atiquipa', '0403', '04'),
('040305', 'Bella Unión', '0403', '04'),
('040306', 'Cahuacho', '0403', '04'),
('040307', 'Chala', '0403', '04'),
('040308', 'Chaparra', '0403', '04'),
('040309', 'Huanuhuanu', '0403', '04'),
('040310', 'Jaqui', '0403', '04'),
('040311', 'Lomas', '0403', '04'),
('040312', 'Quicacha', '0403', '04'),
('040313', 'Yauca', '0403', '04'),
('040401', 'Aplao', '0404', '04'),
('040402', 'Andagua', '0404', '04'),
('040403', 'Ayo', '0404', '04'),
('040404', 'Chachas', '0404', '04'),
('040405', 'Chilcaymarca', '0404', '04'),
('040406', 'Choco', '0404', '04'),
('040407', 'Huancarqui', '0404', '04'),
('040408', 'Machaguay', '0404', '04'),
('040409', 'Orcopampa', '0404', '04'),
('040410', 'Pampacolca', '0404', '04'),
('040411', 'Tipan', '0404', '04'),
('040412', 'Uñon', '0404', '04'),
('040413', 'Uraca', '0404', '04'),
('040414', 'Viraco', '0404', '04'),
('040501', 'Chivay', '0405', '04'),
('040502', 'Achoma', '0405', '04'),
('040503', 'Cabanaconde', '0405', '04'),
('040504', 'Callalli', '0405', '04'),
('040505', 'Caylloma', '0405', '04'),
('040506', 'Coporaque', '0405', '04'),
('040507', 'Huambo', '0405', '04'),
('040508', 'Huanca', '0405', '04'),
('040509', 'Ichupampa', '0405', '04'),
('040510', 'Lari', '0405', '04'),
('040511', 'Lluta', '0405', '04'),
('040512', 'Maca', '0405', '04'),
('040513', 'Madrigal', '0405', '04'),
('040514', 'San Antonio de Chuca', '0405', '04'),
('040515', 'Sibayo', '0405', '04'),
('040516', 'Tapay', '0405', '04'),
('040517', 'Tisco', '0405', '04'),
('040518', 'Tuti', '0405', '04'),
('040519', 'Yanque', '0405', '04'),
('040520', 'Majes', '0405', '04'),
('040601', 'Chuquibamba', '0406', '04'),
('040602', 'Andaray', '0406', '04'),
('040603', 'Cayarani', '0406', '04'),
('040604', 'Chichas', '0406', '04'),
('040605', 'Iray', '0406', '04'),
('040606', 'Río Grande', '0406', '04'),
('040607', 'Salamanca', '0406', '04'),
('040608', 'Yanaquihua', '0406', '04'),
('040701', 'Mollendo', '0407', '04'),
('040702', 'Cocachacra', '0407', '04'),
('040703', 'Dean Valdivia', '0407', '04'),
('040704', 'Islay', '0407', '04'),
('040705', 'Mejia', '0407', '04'),
('040706', 'Punta de Bombón', '0407', '04'),
('040801', 'Cotahuasi', '0408', '04'),
('040802', 'Alca', '0408', '04'),
('040803', 'Charcana', '0408', '04'),
('040804', 'Huaynacotas', '0408', '04'),
('040805', 'Pampamarca', '0408', '04'),
('040806', 'Puyca', '0408', '04'),
('040807', 'Quechualla', '0408', '04'),
('040808', 'Sayla', '0408', '04'),
('040809', 'Tauria', '0408', '04'),
('040810', 'Tomepampa', '0408', '04'),
('040811', 'Toro', '0408', '04'),
('050101', 'Ayacucho', '0501', '05'),
('050102', 'Acocro', '0501', '05'),
('050103', 'Acos Vinchos', '0501', '05'),
('050104', 'Carmen Alto', '0501', '05'),
('050105', 'Chiara', '0501', '05'),
('050106', 'Ocros', '0501', '05'),
('050107', 'Pacaycasa', '0501', '05'),
('050108', 'Quinua', '0501', '05'),
('050109', 'San José de Ticllas', '0501', '05'),
('050110', 'San Juan Bautista', '0501', '05'),
('050111', 'Santiago de Pischa', '0501', '05'),
('050112', 'Socos', '0501', '05'),
('050113', 'Tambillo', '0501', '05'),
('050114', 'Vinchos', '0501', '05'),
('050115', 'Jesús Nazareno', '0501', '05'),
('050116', 'Andrés Avelino Cáceres Dorregaray', '0501', '05'),
('050201', 'Cangallo', '0502', '05'),
('050202', 'Chuschi', '0502', '05'),
('050203', 'Los Morochucos', '0502', '05'),
('050204', 'María Parado de Bellido', '0502', '05'),
('050205', 'Paras', '0502', '05'),
('050206', 'Totos', '0502', '05'),
('050301', 'Sancos', '0503', '05'),
('050302', 'Carapo', '0503', '05'),
('050303', 'Sacsamarca', '0503', '05'),
('050304', 'Santiago de Lucanamarca', '0503', '05'),
('050401', 'Huanta', '0504', '05'),
('050402', 'Ayahuanco', '0504', '05'),
('050403', 'Huamanguilla', '0504', '05'),
('050404', 'Iguain', '0504', '05'),
('050405', 'Luricocha', '0504', '05'),
('050406', 'Santillana', '0504', '05'),
('050407', 'Sivia', '0504', '05'),
('050408', 'Llochegua', '0504', '05'),
('050409', 'Canayre', '0504', '05'),
('050410', 'Uchuraccay', '0504', '05'),
('050411', 'Pucacolpa', '0504', '05'),
('050412', 'Chaca', '0504', '05'),
('050501', 'San Miguel', '0505', '05'),
('050502', 'Anco', '0505', '05'),
('050503', 'Ayna', '0505', '05'),
('050504', 'Chilcas', '0505', '05'),
('050505', 'Chungui', '0505', '05'),
('050506', 'Luis Carranza', '0505', '05'),
('050507', 'Santa Rosa', '0505', '05'),
('050508', 'Tambo', '0505', '05'),
('050509', 'Samugari', '0505', '05'),
('050510', 'Anchihuay', '0505', '05'),
('050511', 'Oronccoy', '0505', '05'),
('050601', 'Puquio', '0506', '05'),
('050602', 'Aucara', '0506', '05'),
('050603', 'Cabana', '0506', '05'),
('050604', 'Carmen Salcedo', '0506', '05'),
('050605', 'Chaviña', '0506', '05'),
('050606', 'Chipao', '0506', '05'),
('050607', 'Huac-Huas', '0506', '05'),
('050608', 'Laramate', '0506', '05'),
('050609', 'Leoncio Prado', '0506', '05'),
('050610', 'Llauta', '0506', '05'),
('050611', 'Lucanas', '0506', '05'),
('050612', 'Ocaña', '0506', '05'),
('050613', 'Otoca', '0506', '05'),
('050614', 'Saisa', '0506', '05'),
('050615', 'San Cristóbal', '0506', '05'),
('050616', 'San Juan', '0506', '05'),
('050617', 'San Pedro', '0506', '05'),
('050618', 'San Pedro de Palco', '0506', '05'),
('050619', 'Sancos', '0506', '05'),
('050620', 'Santa Ana de Huaycahuacho', '0506', '05'),
('050621', 'Santa Lucia', '0506', '05'),
('050701', 'Coracora', '0507', '05'),
('050702', 'Chumpi', '0507', '05'),
('050703', 'Coronel Castañeda', '0507', '05'),
('050704', 'Pacapausa', '0507', '05'),
('050705', 'Pullo', '0507', '05'),
('050706', 'Puyusca', '0507', '05'),
('050707', 'San Francisco de Ravacayco', '0507', '05'),
('050708', 'Upahuacho', '0507', '05'),
('050801', 'Pausa', '0508', '05'),
('050802', 'Colta', '0508', '05'),
('050803', 'Corculla', '0508', '05'),
('050804', 'Lampa', '0508', '05'),
('050805', 'Marcabamba', '0508', '05'),
('050806', 'Oyolo', '0508', '05'),
('050807', 'Pararca', '0508', '05'),
('050808', 'San Javier de Alpabamba', '0508', '05'),
('050809', 'San José de Ushua', '0508', '05'),
('050810', 'Sara Sara', '0508', '05'),
('050901', 'Querobamba', '0509', '05'),
('050902', 'Belén', '0509', '05'),
('050903', 'Chalcos', '0509', '05'),
('050904', 'Chilcayoc', '0509', '05'),
('050905', 'Huacaña', '0509', '05'),
('050906', 'Morcolla', '0509', '05'),
('050907', 'Paico', '0509', '05'),
('050908', 'San Pedro de Larcay', '0509', '05'),
('050909', 'San Salvador de Quije', '0509', '05'),
('050910', 'Santiago de Paucaray', '0509', '05'),
('050911', 'Soras', '0509', '05'),
('051001', 'Huancapi', '0510', '05'),
('051002', 'Alcamenca', '0510', '05'),
('051003', 'Apongo', '0510', '05'),
('051004', 'Asquipata', '0510', '05'),
('051005', 'Canaria', '0510', '05'),
('051006', 'Cayara', '0510', '05'),
('051007', 'Colca', '0510', '05'),
('051008', 'Huamanquiquia', '0510', '05'),
('051009', 'Huancaraylla', '0510', '05'),
('051010', 'Hualla', '0510', '05'),
('051011', 'Sarhua', '0510', '05'),
('051012', 'Vilcanchos', '0510', '05'),
('051101', 'Vilcas Huaman', '0511', '05'),
('051102', 'Accomarca', '0511', '05'),
('051103', 'Carhuanca', '0511', '05'),
('051104', 'Concepción', '0511', '05'),
('051105', 'Huambalpa', '0511', '05'),
('051106', 'Independencia', '0511', '05'),
('051107', 'Saurama', '0511', '05'),
('051108', 'Vischongo', '0511', '05'),
('060101', 'Cajamarca', '0601', '06'),
('060102', 'Asunción', '0601', '06'),
('060103', 'Chetilla', '0601', '06'),
('060104', 'Cospan', '0601', '06'),
('060105', 'Encañada', '0601', '06'),
('060106', 'Jesús', '0601', '06'),
('060107', 'Llacanora', '0601', '06'),
('060108', 'Los Baños del Inca', '0601', '06'),
('060109', 'Magdalena', '0601', '06'),
('060110', 'Matara', '0601', '06'),
('060111', 'Namora', '0601', '06'),
('060112', 'San Juan', '0601', '06'),
('060201', 'Cajabamba', '0602', '06'),
('060202', 'Cachachi', '0602', '06'),
('060203', 'Condebamba', '0602', '06'),
('060204', 'Sitacocha', '0602', '06'),
('060301', 'Celendín', '0603', '06'),
('060302', 'Chumuch', '0603', '06'),
('060303', 'Cortegana', '0603', '06'),
('060304', 'Huasmin', '0603', '06'),
('060305', 'Jorge Chávez', '0603', '06'),
('060306', 'José Gálvez', '0603', '06'),
('060307', 'Miguel Iglesias', '0603', '06'),
('060308', 'Oxamarca', '0603', '06'),
('060309', 'Sorochuco', '0603', '06'),
('060310', 'Sucre', '0603', '06'),
('060311', 'Utco', '0603', '06'),
('060312', 'La Libertad de Pallan', '0603', '06'),
('060401', 'Chota', '0604', '06'),
('060402', 'Anguia', '0604', '06'),
('060403', 'Chadin', '0604', '06'),
('060404', 'Chiguirip', '0604', '06'),
('060405', 'Chimban', '0604', '06'),
('060406', 'Choropampa', '0604', '06'),
('060407', 'Cochabamba', '0604', '06'),
('060408', 'Conchan', '0604', '06'),
('060409', 'Huambos', '0604', '06'),
('060410', 'Lajas', '0604', '06'),
('060411', 'Llama', '0604', '06'),
('060412', 'Miracosta', '0604', '06'),
('060413', 'Paccha', '0604', '06'),
('060414', 'Pion', '0604', '06'),
('060415', 'Querocoto', '0604', '06'),
('060416', 'San Juan de Licupis', '0604', '06'),
('060417', 'Tacabamba', '0604', '06'),
('060418', 'Tocmoche', '0604', '06'),
('060419', 'Chalamarca', '0604', '06'),
('060501', 'Contumaza', '0605', '06'),
('060502', 'Chilete', '0605', '06'),
('060503', 'Cupisnique', '0605', '06'),
('060504', 'Guzmango', '0605', '06'),
('060505', 'San Benito', '0605', '06'),
('060506', 'Santa Cruz de Toledo', '0605', '06'),
('060507', 'Tantarica', '0605', '06'),
('060508', 'Yonan', '0605', '06'),
('060601', 'Cutervo', '0606', '06'),
('060602', 'Callayuc', '0606', '06'),
('060603', 'Choros', '0606', '06'),
('060604', 'Cujillo', '0606', '06'),
('060605', 'La Ramada', '0606', '06'),
('060606', 'Pimpingos', '0606', '06'),
('060607', 'Querocotillo', '0606', '06'),
('060608', 'San Andrés de Cutervo', '0606', '06'),
('060609', 'San Juan de Cutervo', '0606', '06'),
('060610', 'San Luis de Lucma', '0606', '06'),
('060611', 'Santa Cruz', '0606', '06'),
('060612', 'Santo Domingo de la Capilla', '0606', '06'),
('060613', 'Santo Tomas', '0606', '06'),
('060614', 'Socota', '0606', '06'),
('060615', 'Toribio Casanova', '0606', '06'),
('060701', 'Bambamarca', '0607', '06'),
('060702', 'Chugur', '0607', '06'),
('060703', 'Hualgayoc', '0607', '06'),
('060801', 'Jaén', '0608', '06'),
('060802', 'Bellavista', '0608', '06'),
('060803', 'Chontali', '0608', '06'),
('060804', 'Colasay', '0608', '06'),
('060805', 'Huabal', '0608', '06'),
('060806', 'Las Pirias', '0608', '06'),
('060807', 'Pomahuaca', '0608', '06'),
('060808', 'Pucara', '0608', '06'),
('060809', 'Sallique', '0608', '06'),
('060810', 'San Felipe', '0608', '06'),
('060811', 'San José del Alto', '0608', '06'),
('060812', 'Santa Rosa', '0608', '06'),
('060901', 'San Ignacio', '0609', '06'),
('060902', 'Chirinos', '0609', '06'),
('060903', 'Huarango', '0609', '06'),
('060904', 'La Coipa', '0609', '06'),
('060905', 'Namballe', '0609', '06'),
('060906', 'San José de Lourdes', '0609', '06'),
('060907', 'Tabaconas', '0609', '06'),
('061001', 'Pedro Gálvez', '0610', '06'),
('061002', 'Chancay', '0610', '06'),
('061003', 'Eduardo Villanueva', '0610', '06'),
('061004', 'Gregorio Pita', '0610', '06'),
('061005', 'Ichocan', '0610', '06'),
('061006', 'José Manuel Quiroz', '0610', '06'),
('061007', 'José Sabogal', '0610', '06'),
('061101', 'San Miguel', '0611', '06'),
('061102', 'Bolívar', '0611', '06'),
('061103', 'Calquis', '0611', '06'),
('061104', 'Catilluc', '0611', '06'),
('061105', 'El Prado', '0611', '06'),
('061106', 'La Florida', '0611', '06'),
('061107', 'Llapa', '0611', '06'),
('061108', 'Nanchoc', '0611', '06'),
('061109', 'Niepos', '0611', '06'),
('061110', 'San Gregorio', '0611', '06'),
('061111', 'San Silvestre de Cochan', '0611', '06'),
('061112', 'Tongod', '0611', '06'),
('061113', 'Unión Agua Blanca', '0611', '06'),
('061201', 'San Pablo', '0612', '06'),
('061202', 'San Bernardino', '0612', '06'),
('061203', 'San Luis', '0612', '06'),
('061204', 'Tumbaden', '0612', '06'),
('061301', 'Santa Cruz', '0613', '06'),
('061302', 'Andabamba', '0613', '06'),
('061303', 'Catache', '0613', '06'),
('061304', 'Chancaybaños', '0613', '06'),
('061305', 'La Esperanza', '0613', '06'),
('061306', 'Ninabamba', '0613', '06'),
('061307', 'Pulan', '0613', '06'),
('061308', 'Saucepampa', '0613', '06'),
('061309', 'Sexi', '0613', '06'),
('061310', 'Uticyacu', '0613', '06'),
('061311', 'Yauyucan', '0613', '06'),
('070101', 'Callao', '0701', '07'),
('070102', 'Bellavista', '0701', '07'),
('070103', 'Carmen de la Legua Reynoso', '0701', '07'),
('070104', 'La Perla', '0701', '07'),
('070105', 'La Punta', '0701', '07'),
('070106', 'Ventanilla', '0701', '07'),
('070107', 'Mi Perú', '0701', '07'),
('080101', 'Cusco', '0801', '08'),
('080102', 'Ccorca', '0801', '08'),
('080103', 'Poroy', '0801', '08'),
('080104', 'San Jerónimo', '0801', '08'),
('080105', 'San Sebastian', '0801', '08'),
('080106', 'Santiago', '0801', '08'),
('080107', 'Saylla', '0801', '08'),
('080108', 'Wanchaq', '0801', '08'),
('080201', 'Acomayo', '0802', '08'),
('080202', 'Acopia', '0802', '08'),
('080203', 'Acos', '0802', '08'),
('080204', 'Mosoc Llacta', '0802', '08'),
('080205', 'Pomacanchi', '0802', '08'),
('080206', 'Rondocan', '0802', '08'),
('080207', 'Sangarara', '0802', '08'),
('080301', 'Anta', '0803', '08'),
('080302', 'Ancahuasi', '0803', '08'),
('080303', 'Cachimayo', '0803', '08'),
('080304', 'Chinchaypujio', '0803', '08'),
('080305', 'Huarocondo', '0803', '08'),
('080306', 'Limatambo', '0803', '08'),
('080307', 'Mollepata', '0803', '08'),
('080308', 'Pucyura', '0803', '08'),
('080309', 'Zurite', '0803', '08'),
('080401', 'Calca', '0804', '08'),
('080402', 'Coya', '0804', '08'),
('080403', 'Lamay', '0804', '08'),
('080404', 'Lares', '0804', '08'),
('080405', 'Pisac', '0804', '08'),
('080406', 'San Salvador', '0804', '08'),
('080407', 'Taray', '0804', '08'),
('080408', 'Yanatile', '0804', '08'),
('080501', 'Yanaoca', '0805', '08'),
('080502', 'Checca', '0805', '08'),
('080503', 'Kunturkanki', '0805', '08'),
('080504', 'Langui', '0805', '08'),
('080505', 'Layo', '0805', '08'),
('080506', 'Pampamarca', '0805', '08'),
('080507', 'Quehue', '0805', '08'),
('080508', 'Tupac Amaru', '0805', '08'),
('080601', 'Sicuani', '0806', '08'),
('080602', 'Checacupe', '0806', '08'),
('080603', 'Combapata', '0806', '08'),
('080604', 'Marangani', '0806', '08'),
('080605', 'Pitumarca', '0806', '08'),
('080606', 'San Pablo', '0806', '08'),
('080607', 'San Pedro', '0806', '08'),
('080608', 'Tinta', '0806', '08'),
('080701', 'Santo Tomas', '0807', '08'),
('080702', 'Capacmarca', '0807', '08'),
('080703', 'Chamaca', '0807', '08'),
('080704', 'Colquemarca', '0807', '08'),
('080705', 'Livitaca', '0807', '08'),
('080706', 'Llusco', '0807', '08'),
('080707', 'Quiñota', '0807', '08'),
('080708', 'Velille', '0807', '08'),
('080801', 'Espinar', '0808', '08'),
('080802', 'Condoroma', '0808', '08'),
('080803', 'Coporaque', '0808', '08'),
('080804', 'Ocoruro', '0808', '08'),
('080805', 'Pallpata', '0808', '08'),
('080806', 'Pichigua', '0808', '08'),
('080807', 'Suyckutambo', '0808', '08'),
('080808', 'Alto Pichigua', '0808', '08'),
('080901', 'Santa Ana', '0809', '08'),
('080902', 'Echarate', '0809', '08'),
('080903', 'Huayopata', '0809', '08'),
('080904', 'Maranura', '0809', '08'),
('080905', 'Ocobamba', '0809', '08'),
('080906', 'Quellouno', '0809', '08'),
('080907', 'Kimbiri', '0809', '08'),
('080908', 'Santa Teresa', '0809', '08'),
('080909', 'Vilcabamba', '0809', '08'),
('080910', 'Pichari', '0809', '08'),
('080911', 'Inkawasi', '0809', '08'),
('080912', 'Villa Virgen', '0809', '08'),
('080913', 'Villa Kintiarina', '0809', '08'),
('080914', 'Megantoni', '0809', '08'),
('081001', 'Paruro', '0810', '08'),
('081002', 'Accha', '0810', '08'),
('081003', 'Ccapi', '0810', '08'),
('081004', 'Colcha', '0810', '08'),
('081005', 'Huanoquite', '0810', '08'),
('081006', 'Omachaç', '0810', '08'),
('081007', 'Paccaritambo', '0810', '08'),
('081008', 'Pillpinto', '0810', '08'),
('081009', 'Yaurisque', '0810', '08'),
('081101', 'Paucartambo', '0811', '08'),
('081102', 'Caicay', '0811', '08'),
('081103', 'Challabamba', '0811', '08'),
('081104', 'Colquepata', '0811', '08'),
('081105', 'Huancarani', '0811', '08'),
('081106', 'Kosñipata', '0811', '08'),
('081201', 'Urcos', '0812', '08'),
('081202', 'Andahuaylillas', '0812', '08'),
('081203', 'Camanti', '0812', '08'),
('081204', 'Ccarhuayo', '0812', '08'),
('081205', 'Ccatca', '0812', '08'),
('081206', 'Cusipata', '0812', '08'),
('081207', 'Huaro', '0812', '08'),
('081208', 'Lucre', '0812', '08'),
('081209', 'Marcapata', '0812', '08'),
('081210', 'Ocongate', '0812', '08'),
('081211', 'Oropesa', '0812', '08'),
('081212', 'Quiquijana', '0812', '08'),
('081301', 'Urubamba', '0813', '08'),
('081302', 'Chinchero', '0813', '08'),
('081303', 'Huayllabamba', '0813', '08'),
('081304', 'Machupicchu', '0813', '08'),
('081305', 'Maras', '0813', '08'),
('081306', 'Ollantaytambo', '0813', '08'),
('081307', 'Yucay', '0813', '08'),
('090101', 'Huancavelica', '0901', '09'),
('090102', 'Acobambilla', '0901', '09'),
('090103', 'Acoria', '0901', '09'),
('090104', 'Conayca', '0901', '09'),
('090105', 'Cuenca', '0901', '09'),
('090106', 'Huachocolpa', '0901', '09'),
('090107', 'Huayllahuara', '0901', '09'),
('090108', 'Izcuchaca', '0901', '09'),
('090109', 'Laria', '0901', '09'),
('090110', 'Manta', '0901', '09'),
('090111', 'Mariscal Cáceres', '0901', '09'),
('090112', 'Moya', '0901', '09'),
('090113', 'Nuevo Occoro', '0901', '09'),
('090114', 'Palca', '0901', '09'),
('090115', 'Pilchaca', '0901', '09'),
('090116', 'Vilca', '0901', '09'),
('090117', 'Yauli', '0901', '09'),
('090118', 'Ascensión', '0901', '09'),
('090119', 'Huando', '0901', '09'),
('090201', 'Acobamba', '0902', '09'),
('090202', 'Andabamba', '0902', '09'),
('090203', 'Anta', '0902', '09'),
('090204', 'Caja', '0902', '09'),
('090205', 'Marcas', '0902', '09'),
('090206', 'Paucara', '0902', '09'),
('090207', 'Pomacocha', '0902', '09'),
('090208', 'Rosario', '0902', '09'),
('090301', 'Lircay', '0903', '09'),
('090302', 'Anchonga', '0903', '09'),
('090303', 'Callanmarca', '0903', '09'),
('090304', 'Ccochaccasa', '0903', '09'),
('090305', 'Chincho', '0903', '09'),
('090306', 'Congalla', '0903', '09'),
('090307', 'Huanca-Huanca', '0903', '09'),
('090308', 'Huayllay Grande', '0903', '09'),
('090309', 'Julcamarca', '0903', '09'),
('090310', 'San Antonio de Antaparco', '0903', '09'),
('090311', 'Santo Tomas de Pata', '0903', '09'),
('090312', 'Secclla', '0903', '09'),
('090401', 'Castrovirreyna', '0904', '09'),
('090402', 'Arma', '0904', '09'),
('090403', 'Aurahua', '0904', '09'),
('090404', 'Capillas', '0904', '09'),
('090405', 'Chupamarca', '0904', '09'),
('090406', 'Cocas', '0904', '09'),
('090407', 'Huachos', '0904', '09'),
('090408', 'Huamatambo', '0904', '09'),
('090409', 'Mollepampa', '0904', '09'),
('090410', 'San Juan', '0904', '09'),
('090411', 'Santa Ana', '0904', '09'),
('090412', 'Tantara', '0904', '09'),
('090413', 'Ticrapo', '0904', '09'),
('090501', 'Churcampa', '0905', '09'),
('090502', 'Anco', '0905', '09'),
('090503', 'Chinchihuasi', '0905', '09'),
('090504', 'El Carmen', '0905', '09'),
('090505', 'La Merced', '0905', '09'),
('090506', 'Locroja', '0905', '09'),
('090507', 'Paucarbamba', '0905', '09'),
('090508', 'San Miguel de Mayocc', '0905', '09'),
('090509', 'San Pedro de Coris', '0905', '09'),
('090510', 'Pachamarca', '0905', '09'),
('090511', 'Cosme', '0905', '09'),
('090601', 'Huaytara', '0906', '09'),
('090602', 'Ayavi', '0906', '09'),
('090603', 'Córdova', '0906', '09'),
('090604', 'Huayacundo Arma', '0906', '09'),
('090605', 'Laramarca', '0906', '09'),
('090606', 'Ocoyo', '0906', '09'),
('090607', 'Pilpichaca', '0906', '09'),
('090608', 'Querco', '0906', '09'),
('090609', 'Quito-Arma', '0906', '09'),
('090610', 'San Antonio de Cusicancha', '0906', '09'),
('090611', 'San Francisco de Sangayaico', '0906', '09'),
('090612', 'San Isidro', '0906', '09'),
('090613', 'Santiago de Chocorvos', '0906', '09'),
('090614', 'Santiago de Quirahuara', '0906', '09'),
('090615', 'Santo Domingo de Capillas', '0906', '09'),
('090616', 'Tambo', '0906', '09'),
('090701', 'Pampas', '0907', '09'),
('090702', 'Acostambo', '0907', '09'),
('090703', 'Acraquia', '0907', '09'),
('090704', 'Ahuaycha', '0907', '09'),
('090705', 'Colcabamba', '0907', '09'),
('090706', 'Daniel Hernández', '0907', '09'),
('090707', 'Huachocolpa', '0907', '09'),
('090709', 'Huaribamba', '0907', '09'),
('090710', 'Ñahuimpuquio', '0907', '09'),
('090711', 'Pazos', '0907', '09'),
('090713', 'Quishuar', '0907', '09'),
('090714', 'Salcabamba', '0907', '09'),
('090715', 'Salcahuasi', '0907', '09'),
('090716', 'San Marcos de Rocchac', '0907', '09'),
('090717', 'Surcubamba', '0907', '09'),
('090718', 'Tintay Puncu', '0907', '09'),
('090719', 'Quichuas', '0907', '09'),
('090720', 'Andaymarca', '0907', '09'),
('090721', 'Roble', '0907', '09'),
('090722', 'Pichos', '0907', '09'),
('090723', 'Santiago de Tucuma', '0907', '09'),
('100101', 'Huanuco', '1001', '10'),
('100102', 'Amarilis', '1001', '10'),
('100103', 'Chinchao', '1001', '10'),
('100104', 'Churubamba', '1001', '10'),
('100105', 'Margos', '1001', '10'),
('100106', 'Quisqui (Kichki)', '1001', '10'),
('100107', 'San Francisco de Cayran', '1001', '10'),
('100108', 'San Pedro de Chaulan', '1001', '10'),
('100109', 'Santa María del Valle', '1001', '10'),
('100110', 'Yarumayo', '1001', '10'),
('100111', 'Pillco Marca', '1001', '10'),
('100112', 'Yacus', '1001', '10'),
('100113', 'San Pablo de Pillao', '1001', '10'),
('100201', 'Ambo', '1002', '10'),
('100202', 'Cayna', '1002', '10'),
('100203', 'Colpas', '1002', '10'),
('100204', 'Conchamarca', '1002', '10'),
('100205', 'Huacar', '1002', '10'),
('100206', 'San Francisco', '1002', '10'),
('100207', 'San Rafael', '1002', '10'),
('100208', 'Tomay Kichwa', '1002', '10'),
('100301', 'La Unión', '1003', '10'),
('100307', 'Chuquis', '1003', '10'),
('100311', 'Marías', '1003', '10'),
('100313', 'Pachas', '1003', '10'),
('100316', 'Quivilla', '1003', '10'),
('100317', 'Ripan', '1003', '10'),
('100321', 'Shunqui', '1003', '10'),
('100322', 'Sillapata', '1003', '10'),
('100323', 'Yanas', '1003', '10'),
('100401', 'Huacaybamba', '1004', '10'),
('100402', 'Canchabamba', '1004', '10'),
('100403', 'Cochabamba', '1004', '10'),
('100404', 'Pinra', '1004', '10'),
('100501', 'Llata', '1005', '10'),
('100502', 'Arancay', '1005', '10'),
('100503', 'Chavín de Pariarca', '1005', '10'),
('100504', 'Jacas Grande', '1005', '10'),
('100505', 'Jircan', '1005', '10'),
('100506', 'Miraflores', '1005', '10'),
('100507', 'Monzón', '1005', '10'),
('100508', 'Punchao', '1005', '10'),
('100509', 'Puños', '1005', '10'),
('100510', 'Singa', '1005', '10'),
('100511', 'Tantamayo', '1005', '10'),
('100601', 'Rupa-Rupa', '1006', '10'),
('100602', 'Daniel Alomía Robles', '1006', '10'),
('100603', 'Hermílio Valdizan', '1006', '10'),
('100604', 'José Crespo y Castillo', '1006', '10'),
('100605', 'Luyando', '1006', '10'),
('100606', 'Mariano Damaso Beraun', '1006', '10'),
('100607', 'Pucayacu', '1006', '10'),
('100608', 'Castillo Grande', '1006', '10'),
('100609', 'Pueblo Nuevo', '1006', '10'),
('100610', 'Santo Domingo de Anda', '1006', '10'),
('100701', 'Huacrachuco', '1007', '10'),
('100702', 'Cholon', '1007', '10'),
('100703', 'San Buenaventura', '1007', '10'),
('100704', 'La Morada', '1007', '10'),
('100705', 'Santa Rosa de Alto Yanajanca', '1007', '10'),
('100801', 'Panao', '1008', '10'),
('100802', 'Chaglla', '1008', '10'),
('100803', 'Molino', '1008', '10'),
('100804', 'Umari', '1008', '10'),
('100901', 'Puerto Inca', '1009', '10'),
('100902', 'Codo del Pozuzo', '1009', '10'),
('100903', 'Honoria', '1009', '10'),
('100904', 'Tournavista', '1009', '10'),
('100905', 'Yuyapichis', '1009', '10'),
('101001', 'Jesús', '1010', '10'),
('101002', 'Baños', '1010', '10'),
('101003', 'Jivia', '1010', '10'),
('101004', 'Queropalca', '1010', '10'),
('101005', 'Rondos', '1010', '10'),
('101006', 'San Francisco de Asís', '1010', '10'),
('101007', 'San Miguel de Cauri', '1010', '10'),
('101101', 'Chavinillo', '1011', '10'),
('101102', 'Cahuac', '1011', '10'),
('101103', 'Chacabamba', '1011', '10'),
('101104', 'Aparicio Pomares', '1011', '10'),
('101105', 'Jacas Chico', '1011', '10'),
('101106', 'Obas', '1011', '10'),
('101107', 'Pampamarca', '1011', '10'),
('101108', 'Choras', '1011', '10'),
('110101', 'Ica', '1101', '11'),
('110102', 'La Tinguiña', '1101', '11'),
('110103', 'Los Aquijes', '1101', '11'),
('110104', 'Ocucaje', '1101', '11'),
('110105', 'Pachacutec', '1101', '11'),
('110106', 'Parcona', '1101', '11'),
('110107', 'Pueblo Nuevo', '1101', '11'),
('110108', 'Salas', '1101', '11'),
('110109', 'San José de Los Molinos', '1101', '11'),
('110110', 'San Juan Bautista', '1101', '11'),
('110111', 'Santiago', '1101', '11'),
('110112', 'Subtanjalla', '1101', '11'),
('110113', 'Tate', '1101', '11'),
('110114', 'Yauca del Rosario', '1101', '11'),
('110201', 'Chincha Alta', '1102', '11'),
('110202', 'Alto Laran', '1102', '11'),
('110203', 'Chavin', '1102', '11'),
('110204', 'Chincha Baja', '1102', '11'),
('110205', 'El Carmen', '1102', '11'),
('110206', 'Grocio Prado', '1102', '11'),
('110207', 'Pueblo Nuevo', '1102', '11'),
('110208', 'San Juan de Yanac', '1102', '11'),
('110209', 'San Pedro de Huacarpana', '1102', '11'),
('110210', 'Sunampe', '1102', '11'),
('110211', 'Tambo de Mora', '1102', '11'),
('110301', 'Nasca', '1103', '11'),
('110302', 'Changuillo', '1103', '11'),
('110303', 'El Ingenio', '1103', '11'),
('110304', 'Marcona', '1103', '11'),
('110305', 'Vista Alegre', '1103', '11'),
('110401', 'Palpa', '1104', '11'),
('110402', 'Llipata', '1104', '11'),
('110403', 'Río Grande', '1104', '11'),
('110404', 'Santa Cruz', '1104', '11'),
('110405', 'Tibillo', '1104', '11'),
('110501', 'Pisco', '1105', '11'),
('110502', 'Huancano', '1105', '11'),
('110503', 'Humay', '1105', '11'),
('110504', 'Independencia', '1105', '11'),
('110505', 'Paracas', '1105', '11'),
('110506', 'San Andrés', '1105', '11'),
('110507', 'San Clemente', '1105', '11'),
('110508', 'Tupac Amaru Inca', '1105', '11'),
('120101', 'Huancayo', '1201', '12'),
('120104', 'Carhuacallanga', '1201', '12'),
('120105', 'Chacapampa', '1201', '12'),
('120106', 'Chicche', '1201', '12'),
('120107', 'Chilca', '1201', '12'),
('120108', 'Chongos Alto', '1201', '12'),
('120111', 'Chupuro', '1201', '12'),
('120112', 'Colca', '1201', '12'),
('120113', 'Cullhuas', '1201', '12'),
('120114', 'El Tambo', '1201', '12'),
('120116', 'Huacrapuquio', '1201', '12'),
('120117', 'Hualhuas', '1201', '12'),
('120119', 'Huancan', '1201', '12'),
('120120', 'Huasicancha', '1201', '12'),
('120121', 'Huayucachi', '1201', '12'),
('120122', 'Ingenio', '1201', '12'),
('120124', 'Pariahuanca', '1201', '12'),
('120125', 'Pilcomayo', '1201', '12'),
('120126', 'Pucara', '1201', '12'),
('120127', 'Quichuay', '1201', '12'),
('120128', 'Quilcas', '1201', '12'),
('120129', 'San Agustín', '1201', '12'),
('120130', 'San Jerónimo de Tunan', '1201', '12'),
('120132', 'Saño', '1201', '12'),
('120133', 'Sapallanga', '1201', '12'),
('120134', 'Sicaya', '1201', '12'),
('120135', 'Santo Domingo de Acobamba', '1201', '12'),
('120136', 'Viques', '1201', '12'),
('120201', 'Concepción', '1202', '12'),
('120202', 'Aco', '1202', '12'),
('120203', 'Andamarca', '1202', '12'),
('120204', 'Chambara', '1202', '12'),
('120205', 'Cochas', '1202', '12'),
('120206', 'Comas', '1202', '12'),
('120207', 'Heroínas Toledo', '1202', '12'),
('120208', 'Manzanares', '1202', '12'),
('120209', 'Mariscal Castilla', '1202', '12'),
('120210', 'Matahuasi', '1202', '12'),
('120211', 'Mito', '1202', '12'),
('120212', 'Nueve de Julio', '1202', '12'),
('120213', 'Orcotuna', '1202', '12'),
('120214', 'San José de Quero', '1202', '12'),
('120215', 'Santa Rosa de Ocopa', '1202', '12'),
('120301', 'Chanchamayo', '1203', '12'),
('120302', 'Perene', '1203', '12'),
('120303', 'Pichanaqui', '1203', '12'),
('120304', 'San Luis de Shuaro', '1203', '12'),
('120305', 'San Ramón', '1203', '12'),
('120306', 'Vitoc', '1203', '12'),
('120401', 'Jauja', '1204', '12'),
('120402', 'Acolla', '1204', '12'),
('120403', 'Apata', '1204', '12'),
('120404', 'Ataura', '1204', '12'),
('120405', 'Canchayllo', '1204', '12'),
('120406', 'Curicaca', '1204', '12'),
('120407', 'El Mantaro', '1204', '12'),
('120408', 'Huamali', '1204', '12'),
('120409', 'Huaripampa', '1204', '12'),
('120410', 'Huertas', '1204', '12'),
('120411', 'Janjaillo', '1204', '12'),
('120412', 'Julcán', '1204', '12'),
('120413', 'Leonor Ordóñez', '1204', '12'),
('120414', 'Llocllapampa', '1204', '12'),
('120415', 'Marco', '1204', '12'),
('120416', 'Masma', '1204', '12'),
('120417', 'Masma Chicche', '1204', '12'),
('120418', 'Molinos', '1204', '12'),
('120419', 'Monobamba', '1204', '12'),
('120420', 'Muqui', '1204', '12'),
('120421', 'Muquiyauyo', '1204', '12'),
('120422', 'Paca', '1204', '12'),
('120423', 'Paccha', '1204', '12'),
('120424', 'Pancan', '1204', '12'),
('120425', 'Parco', '1204', '12'),
('120426', 'Pomacancha', '1204', '12'),
('120427', 'Ricran', '1204', '12'),
('120428', 'San Lorenzo', '1204', '12'),
('120429', 'San Pedro de Chunan', '1204', '12'),
('120430', 'Sausa', '1204', '12'),
('120431', 'Sincos', '1204', '12'),
('120432', 'Tunan Marca', '1204', '12'),
('120433', 'Yauli', '1204', '12'),
('120434', 'Yauyos', '1204', '12'),
('120501', 'Junin', '1205', '12'),
('120502', 'Carhuamayo', '1205', '12'),
('120503', 'Ondores', '1205', '12'),
('120504', 'Ulcumayo', '1205', '12'),
('120601', 'Satipo', '1206', '12'),
('120602', 'Coviriali', '1206', '12'),
('120603', 'Llaylla', '1206', '12'),
('120604', 'Mazamari', '1206', '12'),
('120605', 'Pampa Hermosa', '1206', '12'),
('120606', 'Pangoa', '1206', '12'),
('120607', 'Río Negro', '1206', '12'),
('120608', 'Río Tambo', '1206', '12'),
('120609', 'Vizcatan del Ene', '1206', '12'),
('120701', 'Tarma', '1207', '12'),
('120702', 'Acobamba', '1207', '12'),
('120703', 'Huaricolca', '1207', '12'),
('120704', 'Huasahuasi', '1207', '12'),
('120705', 'La Unión', '1207', '12'),
('120706', 'Palca', '1207', '12'),
('120707', 'Palcamayo', '1207', '12'),
('120708', 'San Pedro de Cajas', '1207', '12'),
('120709', 'Tapo', '1207', '12'),
('120801', 'La Oroya', '1208', '12'),
('120802', 'Chacapalpa', '1208', '12'),
('120803', 'Huay-Huay', '1208', '12'),
('120804', 'Marcapomacocha', '1208', '12'),
('120805', 'Morococha', '1208', '12'),
('120806', 'Paccha', '1208', '12'),
('120807', 'Santa Bárbara de Carhuacayan', '1208', '12'),
('120808', 'Santa Rosa de Sacco', '1208', '12'),
('120809', 'Suitucancha', '1208', '12'),
('120810', 'Yauli', '1208', '12'),
('120901', 'Chupaca', '1209', '12'),
('120902', 'Ahuac', '1209', '12'),
('120903', 'Chongos Bajo', '1209', '12'),
('120904', 'Huachac', '1209', '12'),
('120905', 'Huamancaca Chico', '1209', '12'),
('120906', 'San Juan de Iscos', '1209', '12'),
('120907', 'San Juan de Jarpa', '1209', '12'),
('120908', 'Tres de Diciembre', '1209', '12'),
('120909', 'Yanacancha', '1209', '12'),
('130101', 'Trujillo', '1301', '13'),
('130102', 'El Porvenir', '1301', '13'),
('130103', 'Florencia de Mora', '1301', '13'),
('130104', 'Huanchaco', '1301', '13'),
('130105', 'La Esperanza', '1301', '13'),
('130106', 'Laredo', '1301', '13'),
('130107', 'Moche', '1301', '13'),
('130108', 'Poroto', '1301', '13'),
('130109', 'Salaverry', '1301', '13'),
('130110', 'Simbal', '1301', '13'),
('130111', 'Victor Larco Herrera', '1301', '13'),
('130201', 'Ascope', '1302', '13'),
('130202', 'Chicama', '1302', '13'),
('130203', 'Chocope', '1302', '13'),
('130204', 'Magdalena de Cao', '1302', '13'),
('130205', 'Paijan', '1302', '13'),
('130206', 'Rázuri', '1302', '13'),
('130207', 'Santiago de Cao', '1302', '13'),
('130208', 'Casa Grande', '1302', '13'),
('130301', 'Bolívar', '1303', '13'),
('130302', 'Bambamarca', '1303', '13'),
('130303', 'Condormarca', '1303', '13'),
('130304', 'Longotea', '1303', '13'),
('130305', 'Uchumarca', '1303', '13'),
('130306', 'Ucuncha', '1303', '13'),
('130401', 'Chepen', '1304', '13'),
('130402', 'Pacanga', '1304', '13'),
('130403', 'Pueblo Nuevo', '1304', '13'),
('130501', 'Julcan', '1305', '13'),
('130502', 'Calamarca', '1305', '13'),
('130503', 'Carabamba', '1305', '13'),
('130504', 'Huaso', '1305', '13'),
('130601', 'Otuzco', '1306', '13'),
('130602', 'Agallpampa', '1306', '13'),
('130604', 'Charat', '1306', '13'),
('130605', 'Huaranchal', '1306', '13'),
('130606', 'La Cuesta', '1306', '13'),
('130608', 'Mache', '1306', '13'),
('130610', 'Paranday', '1306', '13'),
('130611', 'Salpo', '1306', '13'),
('130613', 'Sinsicap', '1306', '13'),
('130614', 'Usquil', '1306', '13'),
('130701', 'San Pedro de Lloc', '1307', '13'),
('130702', 'Guadalupe', '1307', '13'),
('130703', 'Jequetepeque', '1307', '13'),
('130704', 'Pacasmayo', '1307', '13'),
('130705', 'San José', '1307', '13'),
('130801', 'Tayabamba', '1308', '13'),
('130802', 'Buldibuyo', '1308', '13'),
('130803', 'Chillia', '1308', '13'),
('130804', 'Huancaspata', '1308', '13'),
('130805', 'Huaylillas', '1308', '13'),
('130806', 'Huayo', '1308', '13'),
('130807', 'Ongon', '1308', '13'),
('130808', 'Parcoy', '1308', '13'),
('130809', 'Pataz', '1308', '13'),
('130810', 'Pias', '1308', '13'),
('130811', 'Santiago de Challas', '1308', '13'),
('130812', 'Taurija', '1308', '13'),
('130813', 'Urpay', '1308', '13'),
('130901', 'Huamachuco', '1309', '13'),
('130902', 'Chugay', '1309', '13'),
('130903', 'Cochorco', '1309', '13'),
('130904', 'Curgos', '1309', '13'),
('130905', 'Marcabal', '1309', '13'),
('130906', 'Sanagoran', '1309', '13'),
('130907', 'Sarin', '1309', '13'),
('130908', 'Sartimbamba', '1309', '13'),
('131001', 'Santiago de Chuco', '1310', '13'),
('131002', 'Angasmarca', '1310', '13'),
('131003', 'Cachicadan', '1310', '13'),
('131004', 'Mollebamba', '1310', '13'),
('131005', 'Mollepata', '1310', '13'),
('131006', 'Quiruvilca', '1310', '13'),
('131007', 'Santa Cruz de Chuca', '1310', '13'),
('131008', 'Sitabamba', '1310', '13'),
('131101', 'Cascas', '1311', '13'),
('131102', 'Lucma', '1311', '13'),
('131103', 'Marmot', '1311', '13'),
('131104', 'Sayapullo', '1311', '13'),
('131201', 'Viru', '1312', '13'),
('131202', 'Chao', '1312', '13'),
('131203', 'Guadalupito', '1312', '13'),
('140101', 'Chiclayo', '1401', '14'),
('140102', 'Chongoyape', '1401', '14'),
('140103', 'Eten', '1401', '14'),
('140104', 'Eten Puerto', '1401', '14'),
('140105', 'José Leonardo Ortiz', '1401', '14'),
('140106', 'La Victoria', '1401', '14'),
('140107', 'Lagunas', '1401', '14'),
('140108', 'Monsefu', '1401', '14'),
('140109', 'Nueva Arica', '1401', '14'),
('140110', 'Oyotun', '1401', '14'),
('140111', 'Picsi', '1401', '14'),
('140112', 'Pimentel', '1401', '14'),
('140113', 'Reque', '1401', '14'),
('140114', 'Santa Rosa', '1401', '14'),
('140115', 'Saña', '1401', '14'),
('140116', 'Cayalti', '1401', '14'),
('140117', 'Patapo', '1401', '14'),
('140118', 'Pomalca', '1401', '14'),
('140119', 'Pucala', '1401', '14'),
('140120', 'Tuman', '1401', '14'),
('140201', 'Ferreñafe', '1402', '14'),
('140202', 'Cañaris', '1402', '14'),
('140203', 'Incahuasi', '1402', '14'),
('140204', 'Manuel Antonio Mesones Muro', '1402', '14'),
('140205', 'Pitipo', '1402', '14'),
('140206', 'Pueblo Nuevo', '1402', '14'),
('140301', 'Lambayeque', '1403', '14'),
('140302', 'Chochope', '1403', '14'),
('140303', 'Illimo', '1403', '14'),
('140304', 'Jayanca', '1403', '14'),
('140305', 'Mochumi', '1403', '14'),
('140306', 'Morrope', '1403', '14'),
('140307', 'Motupe', '1403', '14'),
('140308', 'Olmos', '1403', '14'),
('140309', 'Pacora', '1403', '14'),
('140310', 'Salas', '1403', '14'),
('140311', 'San José', '1403', '14'),
('140312', 'Tucume', '1403', '14'),
('150101', 'Lima', '1501', '15'),
('150102', 'Ancón', '1501', '15'),
('150103', 'Ate', '1501', '15'),
('150104', 'Barranco', '1501', '15'),
('150105', 'Breña', '1501', '15'),
('150106', 'Carabayllo', '1501', '15'),
('150107', 'Chaclacayo', '1501', '15'),
('150108', 'Chorrillos', '1501', '15'),
('150109', 'Cieneguilla', '1501', '15'),
('150110', 'Comas', '1501', '15'),
('150111', 'El Agustino', '1501', '15'),
('150112', 'Independencia', '1501', '15'),
('150113', 'Jesús María', '1501', '15'),
('150114', 'La Molina', '1501', '15'),
('150115', 'La Victoria', '1501', '15'),
('150116', 'Lince', '1501', '15'),
('150117', 'Los Olivos', '1501', '15'),
('150118', 'Lurigancho', '1501', '15'),
('150119', 'Lurin', '1501', '15'),
('150120', 'Magdalena del Mar', '1501', '15'),
('150121', 'Pueblo Libre', '1501', '15'),
('150122', 'Miraflores', '1501', '15'),
('150123', 'Pachacamac', '1501', '15'),
('150124', 'Pucusana', '1501', '15'),
('150125', 'Puente Piedra', '1501', '15'),
('150126', 'Punta Hermosa', '1501', '15'),
('150127', 'Punta Negra', '1501', '15'),
('150128', 'Rímac', '1501', '15'),
('150129', 'San Bartolo', '1501', '15'),
('150130', 'San Borja', '1501', '15'),
('150131', 'San Isidro', '1501', '15'),
('150132', 'San Juan de Lurigancho', '1501', '15'),
('150133', 'San Juan de Miraflores', '1501', '15'),
('150134', 'San Luis', '1501', '15'),
('150135', 'San Martín de Porres', '1501', '15'),
('150136', 'San Miguel', '1501', '15'),
('150137', 'Santa Anita', '1501', '15'),
('150138', 'Santa María del Mar', '1501', '15'),
('150139', 'Santa Rosa', '1501', '15'),
('150140', 'Santiago de Surco', '1501', '15'),
('150141', 'Surquillo', '1501', '15'),
('150142', 'Villa El Salvador', '1501', '15'),
('150143', 'Villa María del Triunfo', '1501', '15'),
('150201', 'Barranca', '1502', '15'),
('150202', 'Paramonga', '1502', '15'),
('150203', 'Pativilca', '1502', '15'),
('150204', 'Supe', '1502', '15'),
('150205', 'Supe Puerto', '1502', '15'),
('150301', 'Cajatambo', '1503', '15'),
('150302', 'Copa', '1503', '15'),
('150303', 'Gorgor', '1503', '15'),
('150304', 'Huancapon', '1503', '15'),
('150305', 'Manas', '1503', '15'),
('150401', 'Canta', '1504', '15'),
('150402', 'Arahuay', '1504', '15'),
('150403', 'Huamantanga', '1504', '15'),
('150404', 'Huaros', '1504', '15'),
('150405', 'Lachaqui', '1504', '15'),
('150406', 'San Buenaventura', '1504', '15'),
('150407', 'Santa Rosa de Quives', '1504', '15');
INSERT INTO `distrito` (`nIdDistrito`, `sNombre`, `nIdProvincia`, `nIdDepartamento`) VALUES
('150501', 'San Vicente de Cañete', '1505', '15'),
('150502', 'Asia', '1505', '15'),
('150503', 'Calango', '1505', '15'),
('150504', 'Cerro Azul', '1505', '15'),
('150505', 'Chilca', '1505', '15'),
('150506', 'Coayllo', '1505', '15'),
('150507', 'Imperial', '1505', '15'),
('150508', 'Lunahuana', '1505', '15'),
('150509', 'Mala', '1505', '15'),
('150510', 'Nuevo Imperial', '1505', '15'),
('150511', 'Pacaran', '1505', '15'),
('150512', 'Quilmana', '1505', '15'),
('150513', 'San Antonio', '1505', '15'),
('150514', 'San Luis', '1505', '15'),
('150515', 'Santa Cruz de Flores', '1505', '15'),
('150516', 'Zúñiga', '1505', '15'),
('150601', 'Huaral', '1506', '15'),
('150602', 'Atavillos Alto', '1506', '15'),
('150603', 'Atavillos Bajo', '1506', '15'),
('150604', 'Aucallama', '1506', '15'),
('150605', 'Chancay', '1506', '15'),
('150606', 'Ihuari', '1506', '15'),
('150607', 'Lampian', '1506', '15'),
('150608', 'Pacaraos', '1506', '15'),
('150609', 'San Miguel de Acos', '1506', '15'),
('150610', 'Santa Cruz de Andamarca', '1506', '15'),
('150611', 'Sumbilca', '1506', '15'),
('150612', 'Veintisiete de Noviembre', '1506', '15'),
('150701', 'Matucana', '1507', '15'),
('150702', 'Antioquia', '1507', '15'),
('150703', 'Callahuanca', '1507', '15'),
('150704', 'Carampoma', '1507', '15'),
('150705', 'Chicla', '1507', '15'),
('150706', 'Cuenca', '1507', '15'),
('150707', 'Huachupampa', '1507', '15'),
('150708', 'Huanza', '1507', '15'),
('150709', 'Huarochiri', '1507', '15'),
('150710', 'Lahuaytambo', '1507', '15'),
('150711', 'Langa', '1507', '15'),
('150712', 'Laraos', '1507', '15'),
('150713', 'Mariatana', '1507', '15'),
('150714', 'Ricardo Palma', '1507', '15'),
('150715', 'San Andrés de Tupicocha', '1507', '15'),
('150716', 'San Antonio', '1507', '15'),
('150717', 'San Bartolomé', '1507', '15'),
('150718', 'San Damian', '1507', '15'),
('150719', 'San Juan de Iris', '1507', '15'),
('150720', 'San Juan de Tantaranche', '1507', '15'),
('150721', 'San Lorenzo de Quinti', '1507', '15'),
('150722', 'San Mateo', '1507', '15'),
('150723', 'San Mateo de Otao', '1507', '15'),
('150724', 'San Pedro de Casta', '1507', '15'),
('150725', 'San Pedro de Huancayre', '1507', '15'),
('150726', 'Sangallaya', '1507', '15'),
('150727', 'Santa Cruz de Cocachacra', '1507', '15'),
('150728', 'Santa Eulalia', '1507', '15'),
('150729', 'Santiago de Anchucaya', '1507', '15'),
('150730', 'Santiago de Tuna', '1507', '15'),
('150731', 'Santo Domingo de Los Olleros', '1507', '15'),
('150732', 'Surco', '1507', '15'),
('150801', 'Huacho', '1508', '15'),
('150802', 'Ambar', '1508', '15'),
('150803', 'Caleta de Carquin', '1508', '15'),
('150804', 'Checras', '1508', '15'),
('150805', 'Hualmay', '1508', '15'),
('150806', 'Huaura', '1508', '15'),
('150807', 'Leoncio Prado', '1508', '15'),
('150808', 'Paccho', '1508', '15'),
('150809', 'Santa Leonor', '1508', '15'),
('150810', 'Santa María', '1508', '15'),
('150811', 'Sayan', '1508', '15'),
('150812', 'Vegueta', '1508', '15'),
('150901', 'Oyon', '1509', '15'),
('150902', 'Andajes', '1509', '15'),
('150903', 'Caujul', '1509', '15'),
('150904', 'Cochamarca', '1509', '15'),
('150905', 'Navan', '1509', '15'),
('150906', 'Pachangara', '1509', '15'),
('151001', 'Yauyos', '1510', '15'),
('151002', 'Alis', '1510', '15'),
('151003', 'Allauca', '1510', '15'),
('151004', 'Ayaviri', '1510', '15'),
('151005', 'Azángaro', '1510', '15'),
('151006', 'Cacra', '1510', '15'),
('151007', 'Carania', '1510', '15'),
('151008', 'Catahuasi', '1510', '15'),
('151009', 'Chocos', '1510', '15'),
('151010', 'Cochas', '1510', '15'),
('151011', 'Colonia', '1510', '15'),
('151012', 'Hongos', '1510', '15'),
('151013', 'Huampara', '1510', '15'),
('151014', 'Huancaya', '1510', '15'),
('151015', 'Huangascar', '1510', '15'),
('151016', 'Huantan', '1510', '15'),
('151017', 'Huañec', '1510', '15'),
('151018', 'Laraos', '1510', '15'),
('151019', 'Lincha', '1510', '15'),
('151020', 'Madean', '1510', '15'),
('151021', 'Miraflores', '1510', '15'),
('151022', 'Omas', '1510', '15'),
('151023', 'Putinza', '1510', '15'),
('151024', 'Quinches', '1510', '15'),
('151025', 'Quinocay', '1510', '15'),
('151026', 'San Joaquín', '1510', '15'),
('151027', 'San Pedro de Pilas', '1510', '15'),
('151028', 'Tanta', '1510', '15'),
('151029', 'Tauripampa', '1510', '15'),
('151030', 'Tomas', '1510', '15'),
('151031', 'Tupe', '1510', '15'),
('151032', 'Viñac', '1510', '15'),
('151033', 'Vitis', '1510', '15'),
('160101', 'Iquitos', '1601', '16'),
('160102', 'Alto Nanay', '1601', '16'),
('160103', 'Fernando Lores', '1601', '16'),
('160104', 'Indiana', '1601', '16'),
('160105', 'Las Amazonas', '1601', '16'),
('160106', 'Mazan', '1601', '16'),
('160107', 'Napo', '1601', '16'),
('160108', 'Punchana', '1601', '16'),
('160110', 'Torres Causana', '1601', '16'),
('160112', 'Belén', '1601', '16'),
('160113', 'San Juan Bautista', '1601', '16'),
('160201', 'Yurimaguas', '1602', '16'),
('160202', 'Balsapuerto', '1602', '16'),
('160205', 'Jeberos', '1602', '16'),
('160206', 'Lagunas', '1602', '16'),
('160210', 'Santa Cruz', '1602', '16'),
('160211', 'Teniente Cesar López Rojas', '1602', '16'),
('160301', 'Nauta', '1603', '16'),
('160302', 'Parinari', '1603', '16'),
('160303', 'Tigre', '1603', '16'),
('160304', 'Trompeteros', '1603', '16'),
('160305', 'Urarinas', '1603', '16'),
('160401', 'Ramón Castilla', '1604', '16'),
('160402', 'Pebas', '1604', '16'),
('160403', 'Yavari', '1604', '16'),
('160404', 'San Pablo', '1604', '16'),
('160501', 'Requena', '1605', '16'),
('160502', 'Alto Tapiche', '1605', '16'),
('160503', 'Capelo', '1605', '16'),
('160504', 'Emilio San Martín', '1605', '16'),
('160505', 'Maquia', '1605', '16'),
('160506', 'Puinahua', '1605', '16'),
('160507', 'Saquena', '1605', '16'),
('160508', 'Soplin', '1605', '16'),
('160509', 'Tapiche', '1605', '16'),
('160510', 'Jenaro Herrera', '1605', '16'),
('160511', 'Yaquerana', '1605', '16'),
('160601', 'Contamana', '1606', '16'),
('160602', 'Inahuaya', '1606', '16'),
('160603', 'Padre Márquez', '1606', '16'),
('160604', 'Pampa Hermosa', '1606', '16'),
('160605', 'Sarayacu', '1606', '16'),
('160606', 'Vargas Guerra', '1606', '16'),
('160701', 'Barranca', '1607', '16'),
('160702', 'Cahuapanas', '1607', '16'),
('160703', 'Manseriche', '1607', '16'),
('160704', 'Morona', '1607', '16'),
('160705', 'Pastaza', '1607', '16'),
('160706', 'Andoas', '1607', '16'),
('160801', 'Putumayo', '1608', '16'),
('160802', 'Rosa Panduro', '1608', '16'),
('160803', 'Teniente Manuel Clavero', '1608', '16'),
('160804', 'Yaguas', '1608', '16'),
('170101', 'Tambopata', '1701', '17'),
('170102', 'Inambari', '1701', '17'),
('170103', 'Las Piedras', '1701', '17'),
('170104', 'Laberinto', '1701', '17'),
('170201', 'Manu', '1702', '17'),
('170202', 'Fitzcarrald', '1702', '17'),
('170203', 'Madre de Dios', '1702', '17'),
('170204', 'Huepetuhe', '1702', '17'),
('170301', 'Iñapari', '1703', '17'),
('170302', 'Iberia', '1703', '17'),
('170303', 'Tahuamanu', '1703', '17'),
('180101', 'Moquegua', '1801', '18'),
('180102', 'Carumas', '1801', '18'),
('180103', 'Cuchumbaya', '1801', '18'),
('180104', 'Samegua', '1801', '18'),
('180105', 'San Cristóbal', '1801', '18'),
('180106', 'Torata', '1801', '18'),
('180201', 'Omate', '1802', '18'),
('180202', 'Chojata', '1802', '18'),
('180203', 'Coalaque', '1802', '18'),
('180204', 'Ichuña', '1802', '18'),
('180205', 'La Capilla', '1802', '18'),
('180206', 'Lloque', '1802', '18'),
('180207', 'Matalaque', '1802', '18'),
('180208', 'Puquina', '1802', '18'),
('180209', 'Quinistaquillas', '1802', '18'),
('180210', 'Ubinas', '1802', '18'),
('180211', 'Yunga', '1802', '18'),
('180301', 'Ilo', '1803', '18'),
('180302', 'El Algarrobal', '1803', '18'),
('180303', 'Pacocha', '1803', '18'),
('190101', 'Chaupimarca', '1901', '19'),
('190102', 'Huachon', '1901', '19'),
('190103', 'Huariaca', '1901', '19'),
('190104', 'Huayllay', '1901', '19'),
('190105', 'Ninacaca', '1901', '19'),
('190106', 'Pallanchacra', '1901', '19'),
('190107', 'Paucartambo', '1901', '19'),
('190108', 'San Francisco de Asís de Yarusyacan', '1901', '19'),
('190109', 'Simon Bolívar', '1901', '19'),
('190110', 'Ticlacayan', '1901', '19'),
('190111', 'Tinyahuarco', '1901', '19'),
('190112', 'Vicco', '1901', '19'),
('190113', 'Yanacancha', '1901', '19'),
('190201', 'Yanahuanca', '1902', '19'),
('190202', 'Chacayan', '1902', '19'),
('190203', 'Goyllarisquizga', '1902', '19'),
('190204', 'Paucar', '1902', '19'),
('190205', 'San Pedro de Pillao', '1902', '19'),
('190206', 'Santa Ana de Tusi', '1902', '19'),
('190207', 'Tapuc', '1902', '19'),
('190208', 'Vilcabamba', '1902', '19'),
('190301', 'Oxapampa', '1903', '19'),
('190302', 'Chontabamba', '1903', '19'),
('190303', 'Huancabamba', '1903', '19'),
('190304', 'Palcazu', '1903', '19'),
('190305', 'Pozuzo', '1903', '19'),
('190306', 'Puerto Bermúdez', '1903', '19'),
('190307', 'Villa Rica', '1903', '19'),
('190308', 'Constitución', '1903', '19'),
('200101', 'Piura', '2001', '20'),
('200104', 'Castilla', '2001', '20'),
('200105', 'Catacaos', '2001', '20'),
('200107', 'Cura Mori', '2001', '20'),
('200108', 'El Tallan', '2001', '20'),
('200109', 'La Arena', '2001', '20'),
('200110', 'La Unión', '2001', '20'),
('200111', 'Las Lomas', '2001', '20'),
('200114', 'Tambo Grande', '2001', '20'),
('200115', 'Veintiseis de Octubre', '2001', '20'),
('200201', 'Ayabaca', '2002', '20'),
('200202', 'Frias', '2002', '20'),
('200203', 'Jilili', '2002', '20'),
('200204', 'Lagunas', '2002', '20'),
('200205', 'Montero', '2002', '20'),
('200206', 'Pacaipampa', '2002', '20'),
('200207', 'Paimas', '2002', '20'),
('200208', 'Sapillica', '2002', '20'),
('200209', 'Sicchez', '2002', '20'),
('200210', 'Suyo', '2002', '20'),
('200301', 'Huancabamba', '2003', '20'),
('200302', 'Canchaque', '2003', '20'),
('200303', 'El Carmen de la Frontera', '2003', '20'),
('200304', 'Huarmaca', '2003', '20'),
('200305', 'Lalaquiz', '2003', '20'),
('200306', 'San Miguel de El Faique', '2003', '20'),
('200307', 'Sondor', '2003', '20'),
('200308', 'Sondorillo', '2003', '20'),
('200401', 'Chulucanas', '2004', '20'),
('200402', 'Buenos Aires', '2004', '20'),
('200403', 'Chalaco', '2004', '20'),
('200404', 'La Matanza', '2004', '20'),
('200405', 'Morropon', '2004', '20'),
('200406', 'Salitral', '2004', '20'),
('200407', 'San Juan de Bigote', '2004', '20'),
('200408', 'Santa Catalina de Mossa', '2004', '20'),
('200409', 'Santo Domingo', '2004', '20'),
('200410', 'Yamango', '2004', '20'),
('200501', 'Paita', '2005', '20'),
('200502', 'Amotape', '2005', '20'),
('200503', 'Arenal', '2005', '20'),
('200504', 'Colan', '2005', '20'),
('200505', 'La Huaca', '2005', '20'),
('200506', 'Tamarindo', '2005', '20'),
('200507', 'Vichayal', '2005', '20'),
('200601', 'Sullana', '2006', '20'),
('200602', 'Bellavista', '2006', '20'),
('200603', 'Ignacio Escudero', '2006', '20'),
('200604', 'Lancones', '2006', '20'),
('200605', 'Marcavelica', '2006', '20'),
('200606', 'Miguel Checa', '2006', '20'),
('200607', 'Querecotillo', '2006', '20'),
('200608', 'Salitral', '2006', '20'),
('200701', 'Pariñas', '2007', '20'),
('200702', 'El Alto', '2007', '20'),
('200703', 'La Brea', '2007', '20'),
('200704', 'Lobitos', '2007', '20'),
('200705', 'Los Organos', '2007', '20'),
('200706', 'Mancora', '2007', '20'),
('200801', 'Sechura', '2008', '20'),
('200802', 'Bellavista de la Unión', '2008', '20'),
('200803', 'Bernal', '2008', '20'),
('200804', 'Cristo Nos Valga', '2008', '20'),
('200805', 'Vice', '2008', '20'),
('200806', 'Rinconada Llicuar', '2008', '20'),
('210101', 'Puno', '2101', '21'),
('210102', 'Acora', '2101', '21'),
('210103', 'Amantani', '2101', '21'),
('210104', 'Atuncolla', '2101', '21'),
('210105', 'Capachica', '2101', '21'),
('210106', 'Chucuito', '2101', '21'),
('210107', 'Coata', '2101', '21'),
('210108', 'Huata', '2101', '21'),
('210109', 'Mañazo', '2101', '21'),
('210110', 'Paucarcolla', '2101', '21'),
('210111', 'Pichacani', '2101', '21'),
('210112', 'Plateria', '2101', '21'),
('210113', 'San Antonio', '2101', '21'),
('210114', 'Tiquillaca', '2101', '21'),
('210115', 'Vilque', '2101', '21'),
('210201', 'Azángaro', '2102', '21'),
('210202', 'Achaya', '2102', '21'),
('210203', 'Arapa', '2102', '21'),
('210204', 'Asillo', '2102', '21'),
('210205', 'Caminaca', '2102', '21'),
('210206', 'Chupa', '2102', '21'),
('210207', 'José Domingo Choquehuanca', '2102', '21'),
('210208', 'Muñani', '2102', '21'),
('210209', 'Potoni', '2102', '21'),
('210210', 'Saman', '2102', '21'),
('210211', 'San Anton', '2102', '21'),
('210212', 'San José', '2102', '21'),
('210213', 'San Juan de Salinas', '2102', '21'),
('210214', 'Santiago de Pupuja', '2102', '21'),
('210215', 'Tirapata', '2102', '21'),
('210301', 'Macusani', '2103', '21'),
('210302', 'Ajoyani', '2103', '21'),
('210303', 'Ayapata', '2103', '21'),
('210304', 'Coasa', '2103', '21'),
('210305', 'Corani', '2103', '21'),
('210306', 'Crucero', '2103', '21'),
('210307', 'Ituata', '2103', '21'),
('210308', 'Ollachea', '2103', '21'),
('210309', 'San Gaban', '2103', '21'),
('210310', 'Usicayos', '2103', '21'),
('210401', 'Juli', '2104', '21'),
('210402', 'Desaguadero', '2104', '21'),
('210403', 'Huacullani', '2104', '21'),
('210404', 'Kelluyo', '2104', '21'),
('210405', 'Pisacoma', '2104', '21'),
('210406', 'Pomata', '2104', '21'),
('210407', 'Zepita', '2104', '21'),
('210501', 'Ilave', '2105', '21'),
('210502', 'Capazo', '2105', '21'),
('210503', 'Pilcuyo', '2105', '21'),
('210504', 'Santa Rosa', '2105', '21'),
('210505', 'Conduriri', '2105', '21'),
('210601', 'Huancane', '2106', '21'),
('210602', 'Cojata', '2106', '21'),
('210603', 'Huatasani', '2106', '21'),
('210604', 'Inchupalla', '2106', '21'),
('210605', 'Pusi', '2106', '21'),
('210606', 'Rosaspata', '2106', '21'),
('210607', 'Taraco', '2106', '21'),
('210608', 'Vilque Chico', '2106', '21'),
('210701', 'Lampa', '2107', '21'),
('210702', 'Cabanilla', '2107', '21'),
('210703', 'Calapuja', '2107', '21'),
('210704', 'Nicasio', '2107', '21'),
('210705', 'Ocuviri', '2107', '21'),
('210706', 'Palca', '2107', '21'),
('210707', 'Paratia', '2107', '21'),
('210708', 'Pucara', '2107', '21'),
('210709', 'Santa Lucia', '2107', '21'),
('210710', 'Vilavila', '2107', '21'),
('210801', 'Ayaviri', '2108', '21'),
('210802', 'Antauta', '2108', '21'),
('210803', 'Cupi', '2108', '21'),
('210804', 'Llalli', '2108', '21'),
('210805', 'Macari', '2108', '21'),
('210806', 'Nuñoa', '2108', '21'),
('210807', 'Orurillo', '2108', '21'),
('210808', 'Santa Rosa', '2108', '21'),
('210809', 'Umachiri', '2108', '21'),
('210901', 'Moho', '2109', '21'),
('210902', 'Conima', '2109', '21'),
('210903', 'Huayrapata', '2109', '21'),
('210904', 'Tilali', '2109', '21'),
('211001', 'Putina', '2110', '21'),
('211002', 'Ananea', '2110', '21'),
('211003', 'Pedro Vilca Apaza', '2110', '21'),
('211004', 'Quilcapuncu', '2110', '21'),
('211005', 'Sina', '2110', '21'),
('211101', 'Juliaca', '2111', '21'),
('211102', 'Cabana', '2111', '21'),
('211103', 'Cabanillas', '2111', '21'),
('211104', 'Caracoto', '2111', '21'),
('211105', 'San Miguel', '2111', '21'),
('211201', 'Sandia', '2112', '21'),
('211202', 'Cuyocuyo', '2112', '21'),
('211203', 'Limbani', '2112', '21'),
('211204', 'Patambuco', '2112', '21'),
('211205', 'Phara', '2112', '21'),
('211206', 'Quiaca', '2112', '21'),
('211207', 'San Juan del Oro', '2112', '21'),
('211208', 'Yanahuaya', '2112', '21'),
('211209', 'Alto Inambari', '2112', '21'),
('211210', 'San Pedro de Putina Punco', '2112', '21'),
('211301', 'Yunguyo', '2113', '21'),
('211302', 'Anapia', '2113', '21'),
('211303', 'Copani', '2113', '21'),
('211304', 'Cuturapi', '2113', '21'),
('211305', 'Ollaraya', '2113', '21'),
('211306', 'Tinicachi', '2113', '21'),
('211307', 'Unicachi', '2113', '21'),
('220101', 'Moyobamba', '2201', '22'),
('220102', 'Calzada', '2201', '22'),
('220103', 'Habana', '2201', '22'),
('220104', 'Jepelacio', '2201', '22'),
('220105', 'Soritor', '2201', '22'),
('220106', 'Yantalo', '2201', '22'),
('220201', 'Bellavista', '2202', '22'),
('220202', 'Alto Biavo', '2202', '22'),
('220203', 'Bajo Biavo', '2202', '22'),
('220204', 'Huallaga', '2202', '22'),
('220205', 'San Pablo', '2202', '22'),
('220206', 'San Rafael', '2202', '22'),
('220301', 'San José de Sisa', '2203', '22'),
('220302', 'Agua Blanca', '2203', '22'),
('220303', 'San Martín', '2203', '22'),
('220304', 'Santa Rosa', '2203', '22'),
('220305', 'Shatoja', '2203', '22'),
('220401', 'Saposoa', '2204', '22'),
('220402', 'Alto Saposoa', '2204', '22'),
('220403', 'El Eslabón', '2204', '22'),
('220404', 'Piscoyacu', '2204', '22'),
('220405', 'Sacanche', '2204', '22'),
('220406', 'Tingo de Saposoa', '2204', '22'),
('220501', 'Lamas', '2205', '22'),
('220502', 'Alonso de Alvarado', '2205', '22'),
('220503', 'Barranquita', '2205', '22'),
('220504', 'Caynarachi', '2205', '22'),
('220505', 'Cuñumbuqui', '2205', '22'),
('220506', 'Pinto Recodo', '2205', '22'),
('220507', 'Rumisapa', '2205', '22'),
('220508', 'San Roque de Cumbaza', '2205', '22'),
('220509', 'Shanao', '2205', '22'),
('220510', 'Tabalosos', '2205', '22'),
('220511', 'Zapatero', '2205', '22'),
('220601', 'Juanjuí', '2206', '22'),
('220602', 'Campanilla', '2206', '22'),
('220603', 'Huicungo', '2206', '22'),
('220604', 'Pachiza', '2206', '22'),
('220605', 'Pajarillo', '2206', '22'),
('220701', 'Picota', '2207', '22'),
('220702', 'Buenos Aires', '2207', '22'),
('220703', 'Caspisapa', '2207', '22'),
('220704', 'Pilluana', '2207', '22'),
('220705', 'Pucacaca', '2207', '22'),
('220706', 'San Cristóbal', '2207', '22'),
('220707', 'San Hilarión', '2207', '22'),
('220708', 'Shamboyacu', '2207', '22'),
('220709', 'Tingo de Ponasa', '2207', '22'),
('220710', 'Tres Unidos', '2207', '22'),
('220801', 'Rioja', '2208', '22'),
('220802', 'Awajun', '2208', '22'),
('220803', 'Elías Soplin Vargas', '2208', '22'),
('220804', 'Nueva Cajamarca', '2208', '22'),
('220805', 'Pardo Miguel', '2208', '22'),
('220806', 'Posic', '2208', '22'),
('220807', 'San Fernando', '2208', '22'),
('220808', 'Yorongos', '2208', '22'),
('220809', 'Yuracyacu', '2208', '22'),
('220901', 'Tarapoto', '2209', '22'),
('220902', 'Alberto Leveau', '2209', '22'),
('220903', 'Cacatachi', '2209', '22'),
('220904', 'Chazuta', '2209', '22'),
('220905', 'Chipurana', '2209', '22'),
('220906', 'El Porvenir', '2209', '22'),
('220907', 'Huimbayoc', '2209', '22'),
('220908', 'Juan Guerra', '2209', '22'),
('220909', 'La Banda de Shilcayo', '2209', '22'),
('220910', 'Morales', '2209', '22'),
('220911', 'Papaplaya', '2209', '22'),
('220912', 'San Antonio', '2209', '22'),
('220913', 'Sauce', '2209', '22'),
('220914', 'Shapaja', '2209', '22'),
('221001', 'Tocache', '2210', '22'),
('221002', 'Nuevo Progreso', '2210', '22'),
('221003', 'Polvora', '2210', '22'),
('221004', 'Shunte', '2210', '22'),
('221005', 'Uchiza', '2210', '22'),
('230101', 'Tacna', '2301', '23'),
('230102', 'Alto de la Alianza', '2301', '23'),
('230103', 'Calana', '2301', '23'),
('230104', 'Ciudad Nueva', '2301', '23'),
('230105', 'Inclan', '2301', '23'),
('230106', 'Pachia', '2301', '23'),
('230107', 'Palca', '2301', '23'),
('230108', 'Pocollay', '2301', '23'),
('230109', 'Sama', '2301', '23'),
('230110', 'Coronel Gregorio Albarracín Lanchipa', '2301', '23'),
('230111', 'La Yarada los Palos', '2301', '23'),
('230201', 'Candarave', '2302', '23'),
('230202', 'Cairani', '2302', '23'),
('230203', 'Camilaca', '2302', '23'),
('230204', 'Curibaya', '2302', '23'),
('230205', 'Huanuara', '2302', '23'),
('230206', 'Quilahuani', '2302', '23'),
('230301', 'Locumba', '2303', '23'),
('230302', 'Ilabaya', '2303', '23'),
('230303', 'Ite', '2303', '23'),
('230401', 'Tarata', '2304', '23'),
('230402', 'Héroes Albarracín', '2304', '23'),
('230403', 'Estique', '2304', '23'),
('230404', 'Estique-Pampa', '2304', '23'),
('230405', 'Sitajara', '2304', '23'),
('230406', 'Susapaya', '2304', '23'),
('230407', 'Tarucachi', '2304', '23'),
('230408', 'Ticaco', '2304', '23'),
('240101', 'Tumbes', '2401', '24'),
('240102', 'Corrales', '2401', '24'),
('240103', 'La Cruz', '2401', '24'),
('240104', 'Pampas de Hospital', '2401', '24'),
('240105', 'San Jacinto', '2401', '24'),
('240106', 'San Juan de la Virgen', '2401', '24'),
('240201', 'Zorritos', '2402', '24'),
('240202', 'Casitas', '2402', '24'),
('240203', 'Canoas de Punta Sal', '2402', '24'),
('240301', 'Zarumilla', '2403', '24'),
('240302', 'Aguas Verdes', '2403', '24'),
('240303', 'Matapalo', '2403', '24'),
('240304', 'Papayal', '2403', '24'),
('250101', 'Calleria', '2501', '25'),
('250102', 'Campoverde', '2501', '25'),
('250103', 'Iparia', '2501', '25'),
('250104', 'Masisea', '2501', '25'),
('250105', 'Yarinacocha', '2501', '25'),
('250106', 'Nueva Requena', '2501', '25'),
('250107', 'Manantay', '2501', '25'),
('250201', 'Raymondi', '2502', '25'),
('250202', 'Sepahua', '2502', '25'),
('250203', 'Tahuania', '2502', '25'),
('250204', 'Yurua', '2502', '25'),
('250301', 'Padre Abad', '2503', '25'),
('250302', 'Irazola', '2503', '25'),
('250303', 'Curimana', '2503', '25'),
('250304', 'Neshuya', '2503', '25'),
('250305', 'Alexander Von Humboldt', '2503', '25'),
('250401', 'Purus', '2504', '25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `nIdUsuario` int(11) NOT NULL,
  `nIdNegocio` int(11) NOT NULL,
  `nIdRol` int(11) DEFAULT NULL,
  `nTipoDocumento` int(11) DEFAULT NULL,
  `sNumeroDocumento` varchar(250) DEFAULT NULL,
  `sNombre` varchar(250) DEFAULT NULL,
  `sCorreo` varchar(250) DEFAULT NULL,
  `nIdSexo` int(11) DEFAULT NULL,
  `nIdEstadoCivil` int(11) DEFAULT NULL,
  `nIdColor` int(11) DEFAULT NULL,
  `dFechaNacimiento` date DEFAULT NULL,
  `nCantidadPersonasDependientes` int(11) DEFAULT NULL,
  `nExperienciaVentas` int(1) DEFAULT NULL,
  `sRubroExperiencia` varchar(250) DEFAULT NULL,
  `nIdEstudios` int(1) DEFAULT NULL,
  `nIdSituacionEstudios` int(1) DEFAULT NULL COMMENT 'Completado\r\nTrunco\r\nCurso',
  `sCarreraCiclo` varchar(250) DEFAULT NULL,
  `dFechaHoraRegistro` datetime DEFAULT NULL,
  `dFechaHoraEdicion` datetime DEFAULT NULL,
  `dFechaHoraUltimoAcceso` datetime DEFAULT NULL,
  `nIdSupervisor` int(11) DEFAULT NULL,
  `sClave` varchar(250) DEFAULT NULL,
  `sImagen` varchar(250) DEFAULT NULL,
  `nEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`nIdUsuario`, `nIdNegocio`, `nIdRol`, `nTipoDocumento`, `sNumeroDocumento`, `sNombre`, `sCorreo`, `nIdSexo`, `nIdEstadoCivil`, `nIdColor`, `dFechaNacimiento`, `nCantidadPersonasDependientes`, `nExperienciaVentas`, `sRubroExperiencia`, `nIdEstudios`, `nIdSituacionEstudios`, `sCarreraCiclo`, `dFechaHoraRegistro`, `dFechaHoraEdicion`, `dFechaHoraUltimoAcceso`, `nIdSupervisor`, `sClave`, `sImagen`, `nEstado`) VALUES
(62, 67, 588, 63, '123', '123', '123@gmail.com', 511, 522, 590, '2000-02-21', 0, NULL, NULL, 604, 608, 'INGENIERIA DE SISTEMAS', '2020-08-01 09:42:55', '2021-06-23 13:39:32', '2021-06-23 13:39:32', NULL, '123@gmail.com', '603babef51bed.jpg', 0),
(63, 67, 588, 63, '75048132', 'RAMOS MOYA, JENIFER PAOLA', NULL, 512, 521, 591, '1980-02-25', 2, NULL, NULL, 602, NULL, NULL, '2021-02-28 09:45:03', NULL, '2021-02-28 09:45:03', NULL, NULL, '603bac6f1ae42.jpg', 1),
(64, 67, 588, 63, '75348130', 'VALDIVIA RENGIFO, ALEXANDRA XIMENA', NULL, 511, 522, 592, '1999-10-02', 0, NULL, NULL, 602, NULL, NULL, '2021-02-28 09:47:36', NULL, '2021-02-28 09:47:36', NULL, NULL, '603bad089b44d.jpg', 1),
(65, 67, 588, 63, '06241211', 'CHIRRE SANTIAGO, GLADYS', NULL, 512, 521, 593, '1975-05-12', 2, NULL, NULL, 602, NULL, NULL, '2020-10-13 09:50:59', NULL, '2021-02-28 09:50:59', NULL, NULL, '603badd3a94fe.jpg', 1),
(66, 67, 589, 63, '75248132', 'URBIOLA RIVERA, ANGEL EDUARDO', 'urbriv@gmail.com', 511, 522, NULL, '1999-10-30', 0, 1, 'JUGETES', 602, NULL, NULL, '2020-08-06 09:56:42', '2021-05-11 18:00:03', '2021-05-11 18:00:03', 62, '123', '603baf2aaeb28.jpg', 0),
(67, 67, 589, 63, '42149211', 'castillo', 'castillo@gmail.com', 512, 522, NULL, '1995-05-11', 2, 0, 'mi rubro', 602, NULL, NULL, '2021-02-10 09:58:02', '2021-06-23 13:03:30', '2021-06-23 13:03:30', 62, '123', '603baf7a54107.jpg', 1),
(68, 67, 589, 63, '74125896', 'MAYTA PEREZ, SADITH JHUSSELY', 'castillo@gmail.com', 512, 521, NULL, '1990-05-01', 0, 0, NULL, 602, NULL, NULL, '2021-02-28 09:59:40', NULL, '2021-05-14 10:14:29', 63, '123', '603bafdc8ca2a.jpg', 1),
(69, 67, 589, 63, '74125863', 'TACO QUISPE, MIRIAN NISE', 'taco@gmail.com', 512, 524, NULL, '1980-01-14', 2, 0, NULL, 602, NULL, NULL, '2021-02-28 10:02:23', NULL, '2021-02-28 23:35:05', 63, '123', '603bb07f1c4b9.jpg', 1),
(70, 67, 589, 63, '75348139', 'GARCIA BRENIS, JEAN PIERE JOSSUETH', 'garcia@gmail.com', 511, 521, NULL, '1980-02-08', 0, 1, 'AUTOS', 602, NULL, NULL, '2021-02-28 10:04:45', NULL, '2021-03-03 12:33:09', 64, '123', '603bb10d4038f.jpg', 1),
(71, 67, 589, 63, '74525896', 'AZABAMBA RAFAEL, ANGHELO NICK', 'aza@gmail.com', 511, 522, NULL, '1998-10-25', 2, 0, NULL, 602, NULL, NULL, '2021-02-28 10:12:49', NULL, '2021-02-28 10:12:49', 64, '123', '603bb2f1bfcd7.jpg', 1),
(72, 67, 589, 63, '75415220', 'TORRES GONZALES, SHERLYN ZUMEY', 'torres@gmail.com', 512, 522, NULL, '2000-05-21', 2, 1, 'COMIDA', 602, NULL, NULL, '2021-02-28 10:16:14', NULL, '2021-03-01 16:03:17', 65, '123', '603bb3be91544.jpg', 1),
(73, 67, 589, 63, '75248132', 'URBIOLA RIVERA, ANGEL EDUARDO', 'urbri__v@gmail.com', 511, 521, NULL, '2021-03-10', 2, 0, 'asddsa', 602, NULL, NULL, '2021-03-03 11:59:56', NULL, '2021-03-12 10:52:48', 62, '123', '603fc08ce973e.jpg', 1),
(74, 67, 589, 63, '74125865', 'LIZANO LOPEZ, BEATRIZ ROMINA', 'liz@gmail.com', 512, 521, NULL, '2021-03-27', 2, 0, NULL, 602, NULL, NULL, '2021-03-12 16:26:46', NULL, '2021-03-12 16:26:46', 62, '123', '604bdc96a2fab.jpg', 1),
(75, 67, 589, 63, '74195135', 'CARRANZA CASTRO, CESAR FABRIZIO', 'carranza@gmail.com', 511, 521, NULL, '2021-03-19', 2, 0, NULL, 602, NULL, NULL, '2021-03-12 16:28:15', NULL, '2021-03-12 16:28:15', 62, '123', '604bdcef8092f.jpg', 1),
(76, 67, 589, 63, '75348101', 'BELLIDO LEON, ALBERTO ANGEL', 'belindo@gmail.com', 511, 521, NULL, '2021-03-19', 2, 0, NULL, 602, NULL, NULL, '2021-03-12 16:31:25', NULL, '2021-03-12 16:31:25', 62, '123', '604bddadefc7d.jpg', 1),
(77, 67, 589, 63, '75348110', 'REJAS MORALES, ROSYSELA KATHERINE', 'reja@gmail.com', 511, 521, NULL, '2021-03-12', 0, 0, NULL, 602, NULL, NULL, '2021-03-12 16:34:23', NULL, '2021-03-12 16:34:23', 62, '123', '604bde5f74539.jpg', 1),
(78, 67, 589, 63, '72121452', 'MENESES ROMAN, NANCY ROSA', 'men@gmail.com', 511, 521, NULL, '2021-03-12', 2, 1, '13123', 602, NULL, NULL, '2021-03-12 16:35:13', NULL, '2021-03-12 16:35:13', 62, '123', '604bde91005cb.jpg', 1),
(79, 67, 589, 63, '06241255', 'CHIRINOS RIVERA, ELIZABETH EMILDA', 'chirinos@gmioal.com', 511, 521, NULL, '0000-00-00', 2, 1, '2', 602, NULL, NULL, '2021-03-12 16:36:45', NULL, '2021-03-12 16:36:45', 62, '123', '604bdeed7086e.jpg', 1),
(80, 67, 589, 63, '74125411', 'JERRY RIVERA', 'jerr@gmail.com', 511, 521, NULL, '1995-11-01', 2, 0, NULL, 602, NULL, NULL, '2021-03-12 16:40:36', NULL, '2021-03-12 16:40:36', 62, '123', '604bdfd42ff7c.jpg', 1),
(81, 67, 588, 64, '122222222222', 'dasdasdas', 'anglotr@gmail.com', 511, 522, 594, '2021-11-24', 2, NULL, NULL, NULL, NULL, NULL, '2021-11-17 23:00:14', NULL, '2021-11-17 23:00:14', NULL, '1233', '6195cfceb4a86.jpeg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidades`
--

CREATE TABLE `entidades` (
  `nIdEntidad` int(11) NOT NULL,
  `sNombre` varchar(50) DEFAULT NULL COMMENT 'Este nombre es el que utilizara el sistema',
  `sNombreUsuario` varchar(50) DEFAULT NULL COMMENT 'Este campo es el que se mostrara al usuario',
  `nEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entidades`
--

INSERT INTO `entidades` (`nIdEntidad`, `sNombre`, `sNombreUsuario`, `nEstado`) VALUES
(1, 'clientes', 'Clientes', 1),
(2, 'catalogo', ' Productos o servicios', 1),
(3, 'empleados', 'Vendedores ', 1),
(4, 'empleados', 'Supervisores', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapaprospecto`
--

CREATE TABLE `etapaprospecto` (
  `nIdEtapa` int(11) NOT NULL,
  `sNombre` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `sNombreVendedor` varchar(250) CHARACTER SET utf8 NOT NULL,
  `nPorcentaje` int(2) DEFAULT NULL,
  `nEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `etapaprospecto`
--

INSERT INTO `etapaprospecto` (`nIdEtapa`, `sNombre`, `sNombreVendedor`, `nPorcentaje`, `nEstado`) VALUES
(1, '1% - Programada ', 'Programada ', 1, 1),
(2, '25% - Envio de presupuesto ', 'Enviar Propuesta', 25, 1),
(3, '50% - Negociacion ', 'Negociacion ', 50, 1),
(4, '90% - En Proceso ', 'Adjuntar Archivos', 90, 1),
(5, '100% - Cierre ', 'Finalizar ', 100, 1),
(6, '0% - Rechazado', 'Rechazado ', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `nidModulo` int(11) NOT NULL,
  `sNombreModulo` varchar(250) NOT NULL,
  `sIconoModulo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`nidModulo`, `sNombreModulo`, `sIconoModulo`) VALUES
(1, 'Dashboard', ''),
(2, 'Configuracion', ''),
(3, 'Mantenimientos', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocios`
--

CREATE TABLE `negocios` (
  `nIdNegocio` int(11) NOT NULL,
  `sNombre` varchar(250) NOT NULL,
  `sDireccion` varchar(250) NOT NULL,
  `sImagen` varchar(250) DEFAULT NULL,
  `nTipoProspecto` int(1) NOT NULL,
  `nEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `negocios`
--

INSERT INTO `negocios` (`nIdNegocio`, `sNombre`, `sDireccion`, `sImagen`, `nTipoProspecto`, `nEstado`) VALUES
(67, 'QHAWAY PE', 'AV LIMA 123', '60ca6998d1e9d.jpeg', 587, 1),
(68, 'asdasd', 'sadasd', '609e8e6916d5f.png', 587, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `nIdNota` int(11) NOT NULL,
  `nIdProspecto` int(11) NOT NULL,
  `nIdTipoEntidad` int(11) DEFAULT NULL,
  `nTipoEntidad` int(11) DEFAULT NULL COMMENT '1 Empleado,\r\n2 Admin',
  `sNota` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `dFechaCreacion` datetime NOT NULL,
  `dFechaActualizacion` datetime NOT NULL,
  `nEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`nIdNota`, `nIdProspecto`, `nIdTipoEntidad`, `nTipoEntidad`, `sNota`, `dFechaCreacion`, `dFechaActualizacion`, `nEstado`) VALUES
(99, 60, 66, 1, 'Una noya', '2021-02-28 11:52:36', '2021-02-28 11:52:36', 1),
(100, 61, 66, 1, 'Una nota para agregar como incial', '2021-02-28 11:56:03', '2021-02-28 11:56:03', 1),
(109, 70, 66, 1, 's', '2021-02-28 12:11:41', '2021-02-28 12:11:41', 1),
(119, 83, 66, 1, 'Akks', '2021-02-28 12:25:15', '2021-02-28 12:25:15', 1),
(120, 84, 66, 1, 'MLala', '2021-02-28 12:27:00', '2021-02-28 12:27:00', 1),
(121, 85, 66, 1, 'Kaksks', '2021-02-28 12:27:52', '2021-02-28 12:27:52', 1),
(122, 87, 66, 1, 'Akkak', '2021-02-28 12:32:06', '2021-02-28 12:32:06', 1),
(123, 91, 66, 1, 'Akska', '2021-02-28 12:51:44', '2021-02-28 12:51:44', 1),
(125, 95, 67, 1, 'Jajaja xxxjjdkd', '2021-02-28 23:19:39', '2021-02-28 23:20:51', 1),
(126, 97, 67, 1, 'Kakaka', '2021-02-28 23:23:07', '2021-02-28 23:23:07', 1),
(127, 97, 67, 1, 'Se rechazo', '2021-02-28 23:23:23', '2021-02-28 23:23:23', 1),
(129, 99, 69, 1, 'Jajajjakakakakakakakj', '2021-02-28 23:28:17', '2021-02-28 23:39:24', 1),
(130, 100, 69, 1, 'Kakakaka', '2021-02-28 23:30:39', '2021-02-28 23:30:39', 1),
(131, 101, 69, 1, 'Jajajjs', '2021-02-28 23:33:30', '2021-02-28 23:33:30', 1),
(132, 99, 69, 1, 'Ajkaka', '2021-02-28 23:39:27', '2021-02-28 23:39:27', 1),
(134, 90, 66, 1, 'Kskak', '2021-02-28 23:56:24', '2021-02-28 23:56:24', 1),
(135, 60, 66, 1, 'Se redhazo', '2021-03-01 00:02:54', '2021-03-01 00:02:54', 1),
(136, 102, 70, 1, 'Jaj', '2021-03-01 10:43:42', '2021-03-01 10:43:42', 1),
(137, 103, 70, 1, 'Kakaka', '2021-03-01 10:44:29', '2021-03-01 10:44:29', 1),
(139, 104, 70, 1, 'Mi primer anota', '2021-03-01 10:49:21', '2021-03-01 10:49:21', 1),
(140, 102, 70, 1, 'Ggt', '2021-03-01 10:51:07', '2021-03-01 10:51:07', 1),
(141, 106, 70, 1, 'Kakaka', '2021-03-01 10:58:06', '2021-03-01 10:58:06', 1),
(142, 106, 70, 1, 'Ksks', '2021-03-01 10:59:04', '2021-03-01 10:59:04', 1),
(143, 107, 70, 1, 'Kwkwkwjswww', '2021-03-01 12:19:56', '2021-03-01 12:19:56', 1),
(144, 108, 70, 1, 'La primer anota', '2021-03-01 12:23:53', '2021-03-01 12:23:53', 1),
(147, 108, 70, 1, 'Una cuarta kota', '2021-03-01 12:24:13', '2021-03-01 12:24:13', 1),
(148, 108, 70, 1, 'Una quinta koya', '2021-03-01 12:24:24', '2021-03-01 12:24:24', 1),
(149, 106, 70, 1, 'ultima nota', '2021-03-01 12:34:11', '2021-03-01 12:34:11', 1),
(150, 109, 72, 1, 'Una nueva nota', '2021-03-01 15:29:06', '2021-03-01 15:29:06', 1),
(151, 110, 72, 1, 'dadadsa', '2021-03-01 15:33:42', '2021-03-01 15:33:42', 1),
(152, 111, 72, 1, 'Kakakakai', '2021-03-01 16:05:31', '2021-03-01 16:05:31', 1),
(153, 113, 70, 1, 'adasd', '2021-03-03 12:33:30', '2021-03-03 12:33:30', 1),
(154, 114, 66, 1, 'sdad', '2021-03-04 15:22:43', '2021-03-04 15:22:43', 1),
(155, 115, 66, 1, 'asdadad', '2021-03-12 11:01:02', '2021-03-12 11:01:02', 1),
(158, 72, 66, 1, 'dasds', '2021-03-12 12:10:42', '2021-03-12 12:10:42', 1),
(159, 72, 66, 1, 'sdad', '2021-03-12 12:10:45', '2021-03-12 12:10:45', 1),
(162, 94, 67, 1, 'asdada', '2021-03-12 12:43:08', '2021-03-12 12:43:08', 1),
(163, 98, 69, 1, 'fsdf', '2021-03-12 12:47:33', '2021-03-12 12:47:33', 1),
(164, 70, 66, 1, 'asdsd', '2021-03-12 16:57:00', '2021-03-12 16:57:00', 1),
(165, 116, 66, 1, 'asdasdaasdad', '2021-03-26 13:50:30', '2021-03-26 13:50:30', 1),
(166, 117, 66, 1, 'asdasd', '2021-03-26 14:06:08', '2021-03-26 14:06:08', 1),
(176, 118, 66, 1, 'asdadsasdfsdfqedd \"\'sdad\'\"\"dsfds', '2021-03-26 17:53:56', '2021-03-26 18:13:34', 1),
(179, 118, 19, 2, 'asdasd', '2021-03-26 18:08:18', '2021-03-26 18:08:18', 1),
(181, 106, 19, 2, 'ss', '2021-03-26 18:17:05', '2021-03-26 18:17:05', 1),
(182, 117, 19, 2, 'dansdkasndad', '2021-03-26 18:30:01', '2021-03-26 18:30:01', 1),
(183, 115, 19, 2, 'asdas', '2021-03-26 18:33:07', '2021-03-26 18:33:07', 1),
(184, 119, 67, 1, 'asdad', '2021-05-14 11:35:31', '2021-05-14 11:35:31', 1),
(185, 120, 67, 1, 'dsadas', '2021-05-14 12:52:17', '2021-05-14 12:52:17', 1),
(186, 121, 67, 1, 'asdasd', '2021-06-01 12:14:55', '2021-06-01 12:14:55', 1),
(187, 122, 67, 1, 'asda', '2021-06-03 17:52:53', '2021-06-03 17:52:53', 1),
(188, 123, 67, 1, 'ASDASD', '2021-06-09 20:24:57', '2021-06-09 20:24:57', 1),
(189, 124, 67, NULL, 'dsadsd', '2021-06-16 23:17:02', '2021-06-16 23:17:02', 1),
(190, 125, 67, NULL, 'dasdas', '2021-06-17 13:42:07', '2021-06-17 13:42:07', 1),
(191, 126, 67, NULL, 'ASDASDA', '2021-06-18 17:45:30', '2021-06-18 17:45:30', 1),
(192, 127, 67, NULL, 'assdasd', '2021-06-18 17:48:21', '2021-06-18 17:48:21', 1),
(193, 121, 67, 1, 'nota 2', '2021-06-23 13:07:34', '2021-06-23 13:07:34', 1),
(194, 121, 19, 2, 'mi nota pues asdasd', '2021-06-23 13:08:06', '2021-06-23 13:08:10', 1),
(195, 121, 19, 2, 'sadsdasdsa', '2021-06-23 13:08:21', '2021-06-23 13:08:21', 1),
(196, 121, 62, 1, 'dsdasd', '2021-06-23 13:40:06', '2021-06-23 13:40:06', 1),
(197, 121, 62, 1, 'adsqda', '2021-06-23 13:40:09', '2021-06-23 13:40:09', 1),
(198, 128, 67, NULL, 'sdasd', '2021-06-23 13:59:19', '2021-06-23 13:59:19', 1),
(199, 128, 62, 1, 'sdasdad', '2021-06-23 13:59:30', '2021-06-23 13:59:30', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prospectoadjunto`
--

CREATE TABLE `prospectoadjunto` (
  `nIdAdjunto` int(11) NOT NULL,
  `nIdProspecto` int(11) NOT NULL,
  `sNombreArchivo` varchar(250) NOT NULL,
  `dFechaCreacion` date NOT NULL,
  `nContrato` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prospectoadjunto`
--

INSERT INTO `prospectoadjunto` (`nIdAdjunto`, `nIdProspecto`, `sNombreArchivo`, `dFechaCreacion`, `nContrato`) VALUES
(91, 101, 'Screenshot_20210228_195830_com.whatsapp_PRT101.jpg', '2021-02-28', 1),
(92, 101, 'Screenshot_20210228_195830_com.whatsapp_PRT101_1.jpg', '2021-02-28', 0),
(93, 101, 'Screenshot_20210228_170829_com.android.chrome_PRT101.jpg', '2021-02-28', 0),
(94, 101, 'VID-20210228-WA0000_PRT101.mp4', '2021-02-28', 0),
(95, 100, 'Screenshot_20210228_195830_com.whatsapp_PRT100.jpg', '2021-02-28', 1),
(96, 90, 'Screenshot_20210228_195830_com.whatsapp_PRT90.jpg', '2021-03-01', 1),
(97, 88, 'Screenshot_20210228_195830_com.whatsapp_PRT88.jpg', '2021-03-01', 1),
(98, 87, 'Screenshot_20210228_195830_com.whatsapp_PRT87.jpg', '2021-03-01', 1),
(99, 86, 'Screenshot_20210228_195830_com.whatsapp_PRT86.jpg', '2021-03-01', 1),
(100, 85, 'VID-20210228-WA0000_PRT85.mp4', '2021-03-01', 1),
(101, 112, 'avatar_PRT112.jpg', '2021-03-03', 1),
(102, 112, 'avatar_PRT112_1.jpg', '2021-03-03', 0),
(103, 104, 'avatar_PRT104.jpg', '2021-03-26', 0),
(104, 104, 'avatar_PRT104_1.jpg', '2021-03-26', 1),
(105, 119, 'zoomwoocmer_PRT119.txt', '2021-05-14', 1),
(106, 120, 'zoomwoocmer_PRT120.txt', '2021-05-14', 1),
(107, 127, 'WhatsApp-Image-2021-05-31-at-12.10.19-AM_PRT127.jpeg', '2021-06-18', 1),
(108, 126, 'audio_PRT126.mp3', '2021-11-23', 0),
(109, 126, 'video_PRT126.mp4', '2021-11-23', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prospectocatalogo`
--

CREATE TABLE `prospectocatalogo` (
  `nIdProspectoCatalogo` int(11) NOT NULL,
  `nIdProspecto` int(11) DEFAULT NULL,
  `nIdCatalogo` int(11) DEFAULT NULL,
  `nCantidad` int(11) NOT NULL,
  `nPrecio` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prospectocatalogo`
--

INSERT INTO `prospectocatalogo` (`nIdProspectoCatalogo`, `nIdProspecto`, `nIdCatalogo`, `nCantidad`, `nPrecio`) VALUES
(85, 60, 38, 1, '140.00'),
(86, 60, 39, 1, '140.00'),
(87, 61, 31, 1, '350.00'),
(88, 61, 32, 1, '100.00'),
(97, 70, 31, 1, '350.00'),
(98, 71, 31, 1, '350.00'),
(99, 72, 41, 1, '50.00'),
(117, 82, 31, 1, '350.00'),
(118, 83, 33, 1, '120.00'),
(119, 84, 34, 1, '500.00'),
(120, 85, 34, 1, '500.00'),
(121, 86, 35, 1, '50.00'),
(122, 87, 38, 1, '50.00'),
(123, 88, 41, 1, '50.00'),
(125, 90, 38, 1, '50.00'),
(126, 91, 36, 1, '740.00'),
(128, 93, 33, 1, '120.00'),
(129, 94, 34, 1, '500.00'),
(130, 95, 33, 1, '140.00'),
(131, 96, 34, 1, '500.00'),
(132, 97, 33, 1, '120.00'),
(133, 97, 33, 1, '120.00'),
(134, 98, 34, 1, '500.00'),
(135, 98, 39, 1, '140.00'),
(136, 99, 34, 1, '500.00'),
(137, 99, 38, 1, '50.00'),
(138, 100, 34, 1, '500.00'),
(139, 101, 37, 1, '150.00'),
(140, 101, 41, 1, '50.00'),
(141, 102, 34, 1, '500.00'),
(142, 103, 34, 1, '500.00'),
(143, 103, 34, 1, '500.00'),
(144, 104, 35, 1, '50.00'),
(145, 105, 34, 1, '500.00'),
(146, 106, 37, 1, '150.00'),
(147, 107, 35, 1, '50.00'),
(148, 108, 35, 1, '50.00'),
(149, 109, 34, 1, '500.00'),
(150, 110, 33, 1, '120.00'),
(151, 111, 33, 1, '140.00'),
(152, 112, 31, 1, '350.00'),
(153, 113, 31, 1, '350.00'),
(154, 114, 31, 1, '350.00'),
(155, 115, 31, 1, '350.00'),
(156, 115, 38, 1, '50.00'),
(157, 116, 31, 1, '350.00'),
(158, 117, 31, 1, '350.00'),
(159, 118, 31, 1, '350.00'),
(160, 119, 31, 1, '350.00'),
(161, 120, 31, 1, '2.00'),
(162, 121, 32, 1, '50.00'),
(163, 121, 35, 1, '150.00'),
(164, 122, 36, 1, '740.00'),
(165, 106, 36, 1, '740.00'),
(166, 123, 31, 1, '350.00'),
(168, 124, 31, 1, '350.00'),
(169, 125, 31, 1, '350.00'),
(170, 126, 32, 1, '100.00'),
(171, 127, 31, 1, '350.00'),
(172, 128, 31, 1, '350.00'),
(173, 129, 31, 1, '350.00'),
(174, 129, 40, 1, '10.00'),
(175, 131, 31, 1, '350.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prospectos`
--

CREATE TABLE `prospectos` (
  `nIdProspecto` int(11) NOT NULL,
  `nIdNegocio` int(11) NOT NULL,
  `sTitulo` varchar(300) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nIdCliente` int(11) DEFAULT NULL,
  `dFechaCreacion` datetime DEFAULT NULL,
  `dFechaActualizacion` datetime DEFAULT NULL,
  `dFechaHoraUltimoAcceso` datetime DEFAULT NULL,
  `nIdUsuario` int(11) DEFAULT NULL,
  `nIdEtapa` int(11) DEFAULT NULL,
  `nValidacionAdmin` int(1) NOT NULL DEFAULT 0,
  `dFechaCierre` datetime DEFAULT NULL,
  `nEstado` int(1) NOT NULL,
  `67prueba` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `67prueba2` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `67prueba3` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prospectos`
--

INSERT INTO `prospectos` (`nIdProspecto`, `nIdNegocio`, `sTitulo`, `nIdCliente`, `dFechaCreacion`, `dFechaActualizacion`, `dFechaHoraUltimoAcceso`, `nIdUsuario`, `nIdEtapa`, `nValidacionAdmin`, `dFechaCierre`, `nEstado`, `67prueba`, `67prueba2`, `67prueba3`) VALUES
(60, 67, NULL, 29, '2021-02-28 11:52:36', NULL, '2021-03-01 00:02:40', 66, 6, 1, NULL, 1, NULL, NULL, NULL),
(61, 67, NULL, 30, '2021-02-28 11:56:03', NULL, '2021-03-12 12:05:14', 66, 3, 1, NULL, 1, NULL, NULL, NULL),
(70, 67, NULL, 29, '2021-02-28 12:11:41', NULL, '2021-03-12 17:02:05', 66, 1, 1, NULL, 1, NULL, NULL, NULL),
(71, 67, NULL, 32, '2021-02-28 12:13:37', NULL, '2021-03-12 11:09:45', 66, 1, 1, NULL, 1, NULL, NULL, NULL),
(72, 67, NULL, 33, '2021-02-28 12:15:59', NULL, '2021-03-14 12:19:46', 66, 3, 1, NULL, 1, NULL, NULL, NULL),
(82, 67, NULL, 34, '2021-02-28 12:22:35', NULL, '2021-03-12 11:11:03', 66, 1, 1, NULL, 1, NULL, NULL, NULL),
(83, 67, NULL, 34, '2021-02-28 12:25:15', NULL, '2021-02-28 12:25:15', 66, 1, 1, NULL, 1, NULL, NULL, NULL),
(84, 67, NULL, 35, '2021-02-28 12:27:00', NULL, '2021-03-12 12:10:16', 66, 1, 1, NULL, 1, NULL, NULL, NULL),
(85, 67, NULL, 35, '2021-02-28 12:27:52', NULL, '2021-03-01 00:08:43', 66, 5, 1, '2021-03-01 00:20:24', 1, NULL, NULL, NULL),
(86, 67, NULL, 35, '2021-02-28 12:28:18', NULL, '2021-03-01 00:08:22', 66, 5, 1, '2021-03-01 00:20:14', 1, NULL, NULL, NULL),
(87, 67, NULL, 35, '2021-02-28 12:32:06', NULL, '2021-03-04 00:07:58', 66, 5, 1, '2021-03-11 00:20:46', 1, NULL, NULL, NULL),
(88, 67, NULL, 33, '2021-02-28 12:33:27', NULL, '2021-03-03 00:07:39', 66, 5, 1, '2021-03-08 00:20:10', 1, NULL, NULL, NULL),
(90, 67, NULL, 35, '2021-02-28 12:42:33', NULL, '2021-03-01 00:08:16', 66, 5, 1, '2021-03-01 00:19:57', 1, NULL, NULL, NULL),
(91, 67, NULL, 37, '2021-02-28 12:51:44', NULL, '2021-03-12 12:03:27', 66, 1, 1, NULL, 1, NULL, NULL, NULL),
(93, 67, NULL, 34, '2021-02-28 23:17:52', NULL, '2021-06-23 11:53:28', 67, 1, 1, NULL, 1, NULL, NULL, NULL),
(94, 67, NULL, 34, '2021-02-28 23:18:47', NULL, '2021-05-14 13:10:17', 67, 6, 1, NULL, 1, NULL, NULL, NULL),
(95, 67, 'wefafdsfssdfd', 30, '2021-02-28 23:19:39', NULL, '2021-06-18 19:12:51', 67, 2, 1, NULL, 1, NULL, NULL, NULL),
(96, 67, NULL, 29, '2021-02-28 23:21:30', NULL, '2021-05-12 10:22:43', 67, 2, 1, NULL, 1, NULL, NULL, 'valor2'),
(97, 67, NULL, 38, '2021-02-28 23:23:07', NULL, '2021-02-28 23:23:11', 67, 6, 1, NULL, 1, NULL, NULL, NULL),
(98, 67, NULL, 31, '2021-02-28 23:27:23', NULL, '2021-03-12 12:47:26', 69, 2, 1, NULL, 1, NULL, NULL, NULL),
(99, 67, NULL, 29, '2021-02-28 23:28:17', NULL, '2021-03-14 12:19:56', 69, 2, 1, NULL, 1, NULL, NULL, NULL),
(100, 67, NULL, 31, '2021-02-28 23:30:39', NULL, '2021-03-01 15:20:57', 69, 5, 1, '2021-03-14 23:38:30', 1, NULL, NULL, NULL),
(101, 67, NULL, 32, '2021-03-03 23:33:30', NULL, '2021-02-10 23:37:43', 69, 5, 1, '2021-03-10 14:04:29', 1, NULL, NULL, NULL),
(102, 67, NULL, 38, '2021-03-01 10:43:42', NULL, '2021-03-01 10:50:48', 70, 6, 1, NULL, 1, NULL, NULL, NULL),
(103, 67, NULL, 33, '2021-03-01 10:44:29', NULL, '2021-03-12 16:53:45', 70, 1, 1, NULL, 1, NULL, NULL, NULL),
(104, 67, NULL, 30, '2021-03-01 10:46:06', NULL, '2021-03-26 10:26:45', 70, 4, 1, NULL, 1, NULL, NULL, NULL),
(105, 67, NULL, 36, '2021-03-01 10:50:39', NULL, '2021-03-01 10:50:39', 70, 1, 1, NULL, 1, NULL, NULL, NULL),
(106, 67, NULL, 38, '2021-03-01 10:58:06', NULL, '2021-03-26 10:26:42', 70, 3, 1, NULL, 1, 'asdf', NULL, 'valor1'),
(107, 67, NULL, 31, '2021-03-01 12:19:56', NULL, '2021-03-01 12:19:56', 70, 1, 1, NULL, 1, NULL, NULL, NULL),
(108, 67, NULL, 31, '2021-03-01 12:22:39', NULL, '2021-03-03 12:33:11', 70, 1, 1, NULL, 1, NULL, NULL, NULL),
(109, 67, NULL, 31, '2021-03-01 15:29:06', NULL, '2021-03-01 15:29:06', 72, 1, 1, NULL, 1, NULL, NULL, NULL),
(110, 67, NULL, 38, '2021-03-01 15:33:42', NULL, '2021-03-03 12:31:26', 72, 1, 1, NULL, 1, NULL, NULL, NULL),
(111, 67, NULL, 31, '2021-03-01 16:05:31', NULL, '2021-03-03 12:31:42', 72, 1, 1, NULL, 1, NULL, NULL, NULL),
(112, 67, NULL, 35, '2021-03-03 12:00:57', NULL, '2021-03-14 23:38:15', 66, 5, 1, '2021-03-14 23:38:28', 1, NULL, NULL, NULL),
(113, 67, NULL, 35, '2021-03-03 12:33:30', NULL, '2021-03-03 12:56:24', 70, 1, 1, NULL, 1, NULL, NULL, NULL),
(114, 67, NULL, 35, '2021-03-04 15:22:43', NULL, '2021-03-12 12:09:02', 66, 1, 1, NULL, 1, NULL, NULL, NULL),
(115, 67, NULL, 35, '2021-03-12 11:01:02', NULL, '2021-03-26 11:29:31', 66, 1, 1, NULL, 1, 'asdasd', 'sadsd', 'valor1'),
(116, 67, NULL, 29, '2021-03-26 13:50:30', NULL, '2021-03-26 13:50:32', 66, 6, 1, NULL, 1, 'asdasdasdadsd  \'\'\' \"\"sadasd\"adasdas', NULL, NULL),
(117, 67, NULL, 29, '2021-03-26 14:06:08', NULL, '2021-03-26 14:06:41', 66, 6, 1, NULL, 1, 'adÑÑÑasdaa\'s\"d\"\'sad', 'pru\'00\'eññba}}\'\'\'222332323\'\'\'\' ___Asdad\"\"\"\"', 'valor2'),
(118, 67, NULL, 29, '2021-03-26 14:27:17', NULL, '2021-03-26 18:13:12', 66, 6, 1, NULL, 1, '\"32323\"¿\'dasdasdñdsa\'dasdsadasd', 'asdasd', 'valor1'),
(119, 67, 'mi titulo', 29, '2021-05-14 11:35:31', NULL, '2021-06-09 19:35:20', 67, 5, 1, '2021-06-23 13:45:06', 1, 'asdasdas', 'dasda', 'valor1'),
(120, 67, NULL, 29, '2021-05-14 12:52:17', NULL, '2021-05-14 13:06:01', 67, 5, 1, '2021-05-14 13:06:21', 1, 'asdasd', 'sda', 'valor1'),
(121, 67, 'mi tutlo update', 29, '2021-06-01 12:14:55', NULL, '2021-06-23 13:07:22', 67, 1, 0, NULL, 1, 'sdadsa', 'dsadasd', 'valor1'),
(122, 67, NULL, 38, '2021-06-01 12:15:40', NULL, '2021-06-03 17:52:47', 67, 6, 0, NULL, 1, 'asdad', 'dadasd', 'valor1'),
(123, 67, 'asdasdasd', 44, '2021-06-09 20:24:57', NULL, '2021-06-12 23:13:26', 69, 1, 0, NULL, 1, 'SADASD', 'ADASDSAD', 'valor1'),
(124, 67, 'mi tituoofdsfsdfsddfsdfsdfs', 33, '2021-06-16 23:17:02', NULL, '2021-06-28 09:47:18', 70, 2, 0, NULL, 1, 'asd', 'asdasd', 'valor1'),
(125, 67, 'kjajajdsadasdkjfenkjnasfkosdfoksdokfdskfnsdf', 29, '2021-06-17 13:42:07', NULL, '2021-06-17 13:42:07', 70, 1, 0, NULL, 1, 'asdasd', 'asdasd', 'valor1'),
(126, 67, 'xxxxxxxxxxjdskadasdkasdsdsadxxxxxxxxxxjdskadasdkasdsdsadxxxxxxxxxxjdskadasdkasdsdsadxxxxxxxxxxjdskadasdkasdsdsadxxxxxxxxxxjdskadasdkasdsdsad', 44, '2021-06-18 17:45:30', NULL, '2021-06-23 12:11:14', 67, 3, 0, NULL, 1, '12313', 'ASDASDASD', 'valor1'),
(127, 67, 'asdsdsad', NULL, '2021-06-18 17:48:21', NULL, '2021-06-23 13:03:51', 67, 5, 1, '2021-06-23 13:45:01', 1, 'asdasd', 'adasd', 'valor1'),
(128, 67, 'SADASDASDASD', NULL, '2021-06-23 13:59:19', NULL, '2021-06-23 13:59:19', 67, 1, 0, NULL, 1, 'asdad', 'asdadad', 'valor1'),
(129, 67, 'asdasda', NULL, '2021-06-27 15:40:36', NULL, '2021-06-27 15:40:51', 67, 1, 0, NULL, 1, NULL, NULL, NULL),
(130, 67, 'xxxxx', NULL, '2021-06-28 08:58:57', NULL, '2021-06-28 09:47:02', 67, 1, 0, NULL, 1, NULL, NULL, NULL),
(131, 67, 'asdsd', 30, '2021-08-09 14:09:05', NULL, '2021-08-09 14:09:05', 78, 1, 0, NULL, 1, NULL, NULL, NULL),
(132, 67, 'un titulo', 33, '2021-11-23 13:45:36', NULL, '2021-11-23 13:45:36', 67, 1, 0, NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prospectosegmentacion`
--

CREATE TABLE `prospectosegmentacion` (
  `nIdProspectoSegmentacion` int(11) NOT NULL,
  `nIdProspecto` int(11) DEFAULT NULL,
  `nIdSegmentacion` int(11) DEFAULT NULL,
  `nIdDetalleSegmentacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `prospectosegmentacion`
--

INSERT INTO `prospectosegmentacion` (`nIdProspectoSegmentacion`, `nIdProspecto`, `nIdSegmentacion`, `nIdDetalleSegmentacion`) VALUES
(115, 60, 44, 72),
(117, 60, 46, 76),
(118, 61, 44, 71),
(119, 61, 46, 76),
(136, 70, 44, 70),
(137, 70, 46, 75),
(138, 71, 44, 70),
(139, 71, 46, 75),
(140, 72, 44, 71),
(141, 72, 46, 75),
(160, 82, 44, 70),
(161, 82, 46, 75),
(162, 83, 44, 71),
(163, 83, 46, 75),
(164, 84, 44, 71),
(165, 84, 46, 75),
(166, 85, 44, 70),
(167, 85, 46, 75),
(168, 86, 44, 72),
(169, 86, 46, 76),
(170, 87, 44, 71),
(171, 87, 46, 75),
(172, 88, 44, 71),
(173, 88, 46, 75),
(176, 90, 44, 70),
(177, 90, 46, 75),
(178, 91, 44, 70),
(179, 91, 46, 75),
(180, 114, 44, 70),
(181, 114, 46, 76),
(182, 114, 47, 78),
(183, 115, 46, 75),
(184, 115, 47, 78),
(185, 115, 44, 70),
(186, 116, 46, 75),
(187, 116, 47, 78),
(188, 116, 44, 70),
(189, 117, 46, 75),
(190, 117, 47, 78),
(191, 117, 44, 71),
(192, 118, 46, 75),
(193, 118, 47, 78),
(194, 118, 44, 70),
(195, 119, 46, 75),
(196, 119, 47, 78),
(197, 119, 44, 70),
(198, 120, 46, 75),
(199, 120, 47, 78),
(200, 120, 44, NULL),
(201, 121, 46, 75),
(202, 121, 47, 78),
(203, 121, 44, 71),
(204, 122, 46, 75),
(205, 122, 47, 78),
(206, 122, 44, 70),
(207, 123, 46, 75),
(208, 123, 47, 78),
(209, 123, 44, 71),
(210, 124, 46, 75),
(211, 124, 47, 78),
(212, 124, 44, 70),
(213, 125, 46, 75),
(214, 125, 47, 78),
(215, 125, 44, 70),
(216, 126, 46, 75),
(217, 126, 47, 78),
(218, 126, 44, 71),
(219, 127, 46, 75),
(220, 127, 47, 78),
(221, 127, 44, 70),
(222, 128, 46, 75),
(223, 128, 47, 78),
(224, 128, 44, 70);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `nIdProvincia` varchar(4) NOT NULL,
  `sNombre` varchar(45) NOT NULL,
  `nIdDepartamento` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`nIdProvincia`, `sNombre`, `nIdDepartamento`) VALUES
('0101', 'Chachapoyas', '01'),
('0102', 'Bagua', '01'),
('0103', 'Bongará', '01'),
('0104', 'Condorcanqui', '01'),
('0105', 'Luya', '01'),
('0106', 'Rodríguez de Mendoza', '01'),
('0107', 'Utcubamba', '01'),
('0201', 'Huaraz', '02'),
('0202', 'Aija', '02'),
('0203', 'Antonio Raymondi', '02'),
('0204', 'Asunción', '02'),
('0205', 'Bolognesi', '02'),
('0206', 'Carhuaz', '02'),
('0207', 'Carlos Fermín Fitzcarrald', '02'),
('0208', 'Casma', '02'),
('0209', 'Corongo', '02'),
('0210', 'Huari', '02'),
('0211', 'Huarmey', '02'),
('0212', 'Huaylas', '02'),
('0213', 'Mariscal Luzuriaga', '02'),
('0214', 'Ocros', '02'),
('0215', 'Pallasca', '02'),
('0216', 'Pomabamba', '02'),
('0217', 'Recuay', '02'),
('0218', 'Santa', '02'),
('0219', 'Sihuas', '02'),
('0220', 'Yungay', '02'),
('0301', 'Abancay', '03'),
('0302', 'Andahuaylas', '03'),
('0303', 'Antabamba', '03'),
('0304', 'Aymaraes', '03'),
('0305', 'Cotabambas', '03'),
('0306', 'Chincheros', '03'),
('0307', 'Grau', '03'),
('0401', 'Arequipa', '04'),
('0402', 'Camaná', '04'),
('0403', 'Caravelí', '04'),
('0404', 'Castilla', '04'),
('0405', 'Caylloma', '04'),
('0406', 'Condesuyos', '04'),
('0407', 'Islay', '04'),
('0408', 'La Uniòn', '04'),
('0501', 'Huamanga', '05'),
('0502', 'Cangallo', '05'),
('0503', 'Huanca Sancos', '05'),
('0504', 'Huanta', '05'),
('0505', 'La Mar', '05'),
('0506', 'Lucanas', '05'),
('0507', 'Parinacochas', '05'),
('0508', 'Pàucar del Sara Sara', '05'),
('0509', 'Sucre', '05'),
('0510', 'Víctor Fajardo', '05'),
('0511', 'Vilcas Huamán', '05'),
('0601', 'Cajamarca', '06'),
('0602', 'Cajabamba', '06'),
('0603', 'Celendín', '06'),
('0604', 'Chota', '06'),
('0605', 'Contumazá', '06'),
('0606', 'Cutervo', '06'),
('0607', 'Hualgayoc', '06'),
('0608', 'Jaén', '06'),
('0609', 'San Ignacio', '06'),
('0610', 'San Marcos', '06'),
('0611', 'San Miguel', '06'),
('0612', 'San Pablo', '06'),
('0613', 'Santa Cruz', '06'),
('0701', 'Prov. Const. del Callao', '07'),
('0801', 'Cusco', '08'),
('0802', 'Acomayo', '08'),
('0803', 'Anta', '08'),
('0804', 'Calca', '08'),
('0805', 'Canas', '08'),
('0806', 'Canchis', '08'),
('0807', 'Chumbivilcas', '08'),
('0808', 'Espinar', '08'),
('0809', 'La Convención', '08'),
('0810', 'Paruro', '08'),
('0811', 'Paucartambo', '08'),
('0812', 'Quispicanchi', '08'),
('0813', 'Urubamba', '08'),
('0901', 'Huancavelica', '09'),
('0902', 'Acobamba', '09'),
('0903', 'Angaraes', '09'),
('0904', 'Castrovirreyna', '09'),
('0905', 'Churcampa', '09'),
('0906', 'Huaytará', '09'),
('0907', 'Tayacaja', '09'),
('1001', 'Huánuco', '10'),
('1002', 'Ambo', '10'),
('1003', 'Dos de Mayo', '10'),
('1004', 'Huacaybamba', '10'),
('1005', 'Huamalíes', '10'),
('1006', 'Leoncio Prado', '10'),
('1007', 'Marañón', '10'),
('1008', 'Pachitea', '10'),
('1009', 'Puerto Inca', '10'),
('1010', 'Lauricocha ', '10'),
('1011', 'Yarowilca ', '10'),
('1101', 'Ica ', '11'),
('1102', 'Chincha ', '11'),
('1103', 'Nasca ', '11'),
('1104', 'Palpa ', '11'),
('1105', 'Pisco ', '11'),
('1201', 'Huancayo ', '12'),
('1202', 'Concepción ', '12'),
('1203', 'Chanchamayo ', '12'),
('1204', 'Jauja ', '12'),
('1205', 'Junín ', '12'),
('1206', 'Satipo ', '12'),
('1207', 'Tarma ', '12'),
('1208', 'Yauli ', '12'),
('1209', 'Chupaca ', '12'),
('1301', 'Trujillo ', '13'),
('1302', 'Ascope ', '13'),
('1303', 'Bolívar ', '13'),
('1304', 'Chepén ', '13'),
('1305', 'Julcán ', '13'),
('1306', 'Otuzco ', '13'),
('1307', 'Pacasmayo ', '13'),
('1308', 'Pataz ', '13'),
('1309', 'Sánchez Carrión ', '13'),
('1310', 'Santiago de Chuco ', '13'),
('1311', 'Gran Chimú ', '13'),
('1312', 'Virú ', '13'),
('1401', 'Chiclayo ', '14'),
('1402', 'Ferreñafe ', '14'),
('1403', 'Lambayeque ', '14'),
('1501', 'Lima ', '15'),
('1502', 'Barranca ', '15'),
('1503', 'Cajatambo ', '15'),
('1504', 'Canta ', '15'),
('1505', 'Cañete ', '15'),
('1506', 'Huaral ', '15'),
('1507', 'Huarochirí ', '15'),
('1508', 'Huaura ', '15'),
('1509', 'Oyón ', '15'),
('1510', 'Yauyos ', '15'),
('1601', 'Maynas ', '16'),
('1602', 'Alto Amazonas ', '16'),
('1603', 'Loreto ', '16'),
('1604', 'Mariscal Ramón Castilla ', '16'),
('1605', 'Requena ', '16'),
('1606', 'Ucayali ', '16'),
('1607', 'Datem del Marañón ', '16'),
('1608', 'Putumayo', '16'),
('1701', 'Tambopata ', '17'),
('1702', 'Manu ', '17'),
('1703', 'Tahuamanu ', '17'),
('1801', 'Mariscal Nieto ', '18'),
('1802', 'General Sánchez Cerro ', '18'),
('1803', 'Ilo ', '18'),
('1901', 'Pasco ', '19'),
('1902', 'Daniel Alcides Carrión ', '19'),
('1903', 'Oxapampa ', '19'),
('2001', 'Piura ', '20'),
('2002', 'Ayabaca ', '20'),
('2003', 'Huancabamba ', '20'),
('2004', 'Morropón ', '20'),
('2005', 'Paita ', '20'),
('2006', 'Sullana ', '20'),
('2007', 'Talara ', '20'),
('2008', 'Sechura ', '20'),
('2101', 'Puno ', '21'),
('2102', 'Azángaro ', '21'),
('2103', 'Carabaya ', '21'),
('2104', 'Chucuito ', '21'),
('2105', 'El Collao ', '21'),
('2106', 'Huancané ', '21'),
('2107', 'Lampa ', '21'),
('2108', 'Melgar ', '21'),
('2109', 'Moho ', '21'),
('2110', 'San Antonio de Putina ', '21'),
('2111', 'San Román ', '21'),
('2112', 'Sandia ', '21'),
('2113', 'Yunguyo ', '21'),
('2201', 'Moyobamba ', '22'),
('2202', 'Bellavista ', '22'),
('2203', 'El Dorado ', '22'),
('2204', 'Huallaga ', '22'),
('2205', 'Lamas ', '22'),
('2206', 'Mariscal Cáceres ', '22'),
('2207', 'Picota ', '22'),
('2208', 'Rioja ', '22'),
('2209', 'San Martín ', '22'),
('2210', 'Tocache ', '22'),
('2301', 'Tacna ', '23'),
('2302', 'Candarave ', '23'),
('2303', 'Jorge Basadre ', '23'),
('2304', 'Tarata ', '23'),
('2401', 'Tumbes ', '24'),
('2402', 'Contralmirante Villar ', '24'),
('2403', 'Zarumilla ', '24'),
('2501', 'Coronel Portillo ', '25'),
('2502', 'Atalaya ', '25'),
('2503', 'Padre Abad ', '25'),
('2504', 'Purús', '25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `nIdRol` int(11) NOT NULL,
  `sNombreRol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`nIdRol`, `sNombreRol`) VALUES
(1, 'SUDO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolesmodulos`
--

CREATE TABLE `rolesmodulos` (
  `nIdRolModulo` int(11) NOT NULL,
  `nIdRol` int(11) NOT NULL,
  `nIdModulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `segmentacion`
--

CREATE TABLE `segmentacion` (
  `nIdSegmentacion` int(11) NOT NULL,
  `nIdNegocio` int(11) NOT NULL,
  `nTipoSegmento` int(1) DEFAULT NULL COMMENT '1 Segmentacion ,\r\n2 Competencia',
  `sNombre` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `segmentacion`
--

INSERT INTO `segmentacion` (`nIdSegmentacion`, `nIdNegocio`, `nTipoSegmento`, `sNombre`, `nEstado`) VALUES
(44, 67, 2, 'COMPETENCIA 1 ', 1),
(46, 67, 1, 'SEG1', 1),
(47, 67, 1, 'asdsff', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submodulos`
--

CREATE TABLE `submodulos` (
  `nIdSubModulo` int(11) NOT NULL,
  `nIdModulo` int(11) NOT NULL,
  `sNombreSubmodulo` varchar(250) NOT NULL,
  `sIconoSubmodulo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposcampos`
--

CREATE TABLE `tiposcampos` (
  `nTipoCampo` int(11) NOT NULL,
  `sNombre` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `sNombreUsuario` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tiposcampos`
--

INSERT INTO `tiposcampos` (`nTipoCampo`, `sNombre`, `sNombreUsuario`, `nEstado`) VALUES
(1, 'text', 'Texto', 1),
(2, 'select', 'Combo', 1),
(3, 'radio', 'Radio', 1),
(4, 'textarea', 'Text Area', 1),
(5, 'tel', 'Telefono', 1),
(6, 'date', 'Fecha', 1),
(7, 'password', 'Contraseña', 1),
(8, 'file', 'Archivo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nIdUsuario` int(11) NOT NULL,
  `sNombre` varchar(250) NOT NULL,
  `sApellidos` varchar(250) NOT NULL,
  `sEmail` varchar(250) NOT NULL,
  `sLogin` varchar(250) NOT NULL,
  `sClave` varchar(250) NOT NULL,
  `sImagen` varchar(250) DEFAULT NULL,
  `nIdRol` int(11) DEFAULT NULL,
  `nestado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nIdUsuario`, `sNombre`, `sApellidos`, `sEmail`, `sLogin`, `sClave`, `sImagen`, `nIdRol`, `nestado`) VALUES
(1, 'SUDO', 'SUDO', '', 'sudo', 'abc123', NULL, 1, 1),
(19, 'Angelo', 'Trujillo', 'angelotrujillo210200@gmail.com', 'angelo21', 'abc123', '600055d57db7b.jpg', 1, 1),
(22, 'pedro', 'perez gomez', 'angelotrujillo210200@gmail.com', 'perez', '123', '605dfb5b2960d.jpg', 1, 1),
(23, 'pepito', 'perez gomez', 'peputoperez@gmail.com', 'pepe123', 'pepe123', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosnegocios`
--

CREATE TABLE `usuariosnegocios` (
  `nIdUsuarioNegocio` int(11) NOT NULL,
  `nIdUsuario` int(11) DEFAULT NULL,
  `nIdNegocio` int(11) DEFAULT NULL,
  `nRol` int(1) NOT NULL COMMENT '1 Administrador.\r\n2 Visitante'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuariosnegocios`
--

INSERT INTO `usuariosnegocios` (`nIdUsuarioNegocio`, `nIdUsuario`, `nIdNegocio`, `nRol`) VALUES
(75, 19, 67, 1),
(79, 19, 68, 1),
(80, 22, 68, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variblesconfiguracion`
--

CREATE TABLE `variblesconfiguracion` (
  `nIdConfiguracion` int(1) NOT NULL,
  `sNombre` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `sValorPrincipal` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `sValorAlternativo` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `sComentario` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nEstado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `variblesconfiguracion`
--

INSERT INTO `variblesconfiguracion` (`nIdConfiguracion`, `sNombre`, `sValorPrincipal`, `sValorAlternativo`, `sComentario`, `nEstado`) VALUES
(1, 'nIdEntidadCliente', '1', '', NULL, 1),
(2, 'nIdEntidadCatalogo', '2', '', NULL, 1),
(3, 'nIdEntidadVendedor', '3', '', NULL, 1),
(4, 'nIdSupervisor', '4', '', NULL, 1),
(5, 'nIdEstadoActividadPendiente', '573', '', NULL, 1),
(6, 'nIdEstadoActividadEjecutado', '576', '', NULL, 1),
(7, 'nIdRolSupervisor', '588', '', NULL, 1),
(8, 'nIdRolAsesorVentas', '589', '', NULL, 1),
(9, 'nIdEtapaCierre', '5', '', NULL, 1),
(10, 'nTipoProspectoCorto', '586', '', NULL, 1),
(11, 'nTipoProspectoLargo', '587', '', NULL, 1),
(12, 'nPorcentajesProspectoCorto', '0,1,100', '', NULL, 1),
(13, 'nPorcentajesProspectoLargo', '0,1,25,50,90,100', '', NULL, 1),
(14, 'nIdEtapaNegociacion', '3', '', NULL, 1),
(15, 'nIdEtapaEnvioPropuesta', '2', '', NULL, 1),
(16, 'nTipoActividadCita', '1', '', NULL, 1),
(17, 'nIdEtapaEnProceso', '4', '', NULL, 1),
(18, 'nIdEtapaProgramada', '1', '', NULL, 1),
(19, 'nIdEtapaRechazado', '6', '', NULL, 1),
(20, 'nRolProspectoAdmin', '1', '', NULL, 1),
(21, 'nRolProspectoVisitante', '2', '', NULL, 1),
(27, 'nIdClienteWidget', '1', ' ', NULL, 1),
(28, 'nIdCatalogoWidget', '2', '', NULL, 1),
(29, 'nIdSegCompetenciaWidget', '3', '', NULL, 1),
(30, 'nIdSegWidget', '4', '', NULL, 1),
(31, 'nIdActividadesWidget', '5', '', NULL, 1),
(32, 'nIdNotasWidget', '6', '', NULL, 1),
(33, 'nTipoItemCatalogoProducto', '215', '', NULL, 1),
(34, 'nTipoItemCatalogoServicio', '216', '', NULL, 1),
(35, 'nTipoClienteEmpresa', '1', '', NULL, 1),
(36, 'nTipoClientePersona', '2', '', NULL, 1),
(37, 'nIdSexoMasculino', '511', '', NULL, 1),
(38, 'nIdSexoFemenino', '512', '', NULL, 1),
(39, 'nIdEstadoCivilCasado', '521', '', NULL, 1),
(40, 'nIdEstadoCivilSoltero', '522', '', NULL, 1),
(41, 'nIdEstadoCivilViudo', '523', '', NULL, 1),
(42, 'nIdEstadoCivilDivorciado', '524', '', NULL, 1),
(43, 'nIdEstadoCivilConviviente', '525', '', NULL, 1),
(45, 'nTipoEntidadNotaEmpleado', '1', '', NULL, 1),
(46, 'nTipoEntidadNotaAdmin', '2', '', NULL, 1),
(47, 'sRolUser', 'USER', '', NULL, 1),
(48, 'sRolEmp', 'EMPLEADO', '', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `widgetprospectos`
--

CREATE TABLE `widgetprospectos` (
  `nIdWidget` int(11) NOT NULL,
  `sNombre` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sNombreUsuario` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sValores` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nTipoWidget` int(1) DEFAULT NULL COMMENT '1 Entidad ,\r\n2 Campo',
  `nTipoCampo` int(11) DEFAULT NULL,
  `nEdit` int(1) NOT NULL DEFAULT 1,
  `nDefault` int(1) DEFAULT NULL,
  `nTamano` int(11) DEFAULT NULL,
  `nRequerido` int(1) DEFAULT NULL,
  `nDisabled` int(1) DEFAULT NULL,
  `nEstado` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `widgetprospectos`
--

INSERT INTO `widgetprospectos` (`nIdWidget`, `sNombre`, `sNombreUsuario`, `sValores`, `nTipoWidget`, `nTipoCampo`, `nEdit`, `nDefault`, `nTamano`, `nRequerido`, `nDisabled`, `nEstado`) VALUES
(1, 'CLIENTE', 'Cliente', NULL, 1, NULL, 1, 1, 6, 0, 1, 1),
(2, 'CATALOGO', 'Productos o servicios', NULL, 1, NULL, 1, 1, 6, 0, 1, 1),
(3, 'SEGMENTACION_COMPETENCIA', 'Competencia', NULL, 1, NULL, 1, 1, 6, 0, NULL, 1),
(4, 'SEGMENTACION', 'Segmentacion', NULL, 1, NULL, 1, 1, 6, 0, NULL, 1),
(5, 'ACTIVIDADES', 'Citas', NULL, 1, NULL, 0, 1, 6, 0, NULL, 1),
(6, 'NOTAS', 'Notas', NULL, 1, NULL, 0, 1, 6, 0, 1, 1),
(47, '67prueba', 'prueba', NULL, 2, 1, 1, 0, NULL, 0, NULL, 1),
(48, '67prueba2', 'prueba2', NULL, 2, 1, 1, 0, NULL, 1, NULL, 1),
(49, '67prueba3', 'prueba3', 'valor1,valor2', 2, 2, 1, 0, NULL, 0, NULL, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`nIdActividad`),
  ADD KEY `nIdProspecto` (`nIdProspecto`),
  ADD KEY `nIdUsuario` (`nIdUsuario`);

--
-- Indices de la tabla `cambiosprospecto`
--
ALTER TABLE `cambiosprospecto`
  ADD PRIMARY KEY (`nIdCambio`),
  ADD KEY `nIdProspecto` (`nIdProspecto`),
  ADD KEY `nIdUsuario` (`nIdUsuario`),
  ADD KEY `nIdEtapa` (`nIdEtapa`);

--
-- Indices de la tabla `campos`
--
ALTER TABLE `campos`
  ADD PRIMARY KEY (`nIdCampo`),
  ADD KEY `nTipoCampo` (`nTipoCampo`);

--
-- Indices de la tabla `camposentidades`
--
ALTER TABLE `camposentidades`
  ADD PRIMARY KEY (`nIdCampoEntidad`),
  ADD KEY `camposentidades_ibfk_2` (`nIdEntidad`),
  ADD KEY `camposentidades_ibfk_1` (`nIdCampo`);

--
-- Indices de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD PRIMARY KEY (`nIdCatalogo`),
  ADD KEY `nIdNegocio` (`nIdNegocio`);

--
-- Indices de la tabla `catalogotabla`
--
ALTER TABLE `catalogotabla`
  ADD PRIMARY KEY (`nIdCatalogoTabla`),
  ADD KEY `CatalogoItem` (`nIdCatalogoTabla`,`sNombreCatalogo`,`sCodigoItem`),
  ADD KEY `DescripcionCorta` (`sNombreCatalogo`,`sDescripcionCortaItem`),
  ADD KEY `NombreCatalogo` (`sNombreCatalogo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`nIdCliente`),
  ADD KEY `nIdNegocio` (`nIdNegocio`);

--
-- Indices de la tabla `configprospecto`
--
ALTER TABLE `configprospecto`
  ADD PRIMARY KEY (`nIdConfigProspecto`),
  ADD KEY `nIdNegocio` (`nIdNegocio`),
  ADD KEY `configprospecto_ibfk_2` (`nIdWidget`);

--
-- Indices de la tabla `configuracioncampos`
--
ALTER TABLE `configuracioncampos`
  ADD PRIMARY KEY (`nIdConfiguracionCampo`),
  ADD KEY `nIdNegocio` (`nIdNegocio`),
  ADD KEY `configuracioncampos_ibfk_3` (`nIdCampoEntidad`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`nIdDepartamento`);

--
-- Indices de la tabla `detallesegmentacion`
--
ALTER TABLE `detallesegmentacion`
  ADD PRIMARY KEY (`nIdDetalleSegmentacion`),
  ADD KEY `detallesegmentacion_ibfk_1` (`nIdSegmentacion`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`nIdDistrito`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`nIdUsuario`),
  ADD KEY `nIdNegocio` (`nIdNegocio`);

--
-- Indices de la tabla `entidades`
--
ALTER TABLE `entidades`
  ADD PRIMARY KEY (`nIdEntidad`);

--
-- Indices de la tabla `etapaprospecto`
--
ALTER TABLE `etapaprospecto`
  ADD PRIMARY KEY (`nIdEtapa`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`nidModulo`);

--
-- Indices de la tabla `negocios`
--
ALTER TABLE `negocios`
  ADD PRIMARY KEY (`nIdNegocio`),
  ADD KEY `idImagen` (`sImagen`);

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`nIdNota`),
  ADD KEY `nIdProspecto` (`nIdProspecto`);

--
-- Indices de la tabla `prospectoadjunto`
--
ALTER TABLE `prospectoadjunto`
  ADD PRIMARY KEY (`nIdAdjunto`),
  ADD KEY `nIdProspecto` (`nIdProspecto`);

--
-- Indices de la tabla `prospectocatalogo`
--
ALTER TABLE `prospectocatalogo`
  ADD PRIMARY KEY (`nIdProspectoCatalogo`),
  ADD KEY `nIdProspecto` (`nIdProspecto`),
  ADD KEY `nIdCatalogo` (`nIdCatalogo`);

--
-- Indices de la tabla `prospectos`
--
ALTER TABLE `prospectos`
  ADD PRIMARY KEY (`nIdProspecto`),
  ADD KEY `nIdCliente` (`nIdCliente`),
  ADD KEY `nIdUsuario` (`nIdUsuario`),
  ADD KEY `nIdNegocio` (`nIdNegocio`),
  ADD KEY `nIdEtapa` (`nIdEtapa`);

--
-- Indices de la tabla `prospectosegmentacion`
--
ALTER TABLE `prospectosegmentacion`
  ADD PRIMARY KEY (`nIdProspectoSegmentacion`),
  ADD KEY `nIdProspecto` (`nIdProspecto`),
  ADD KEY `nIdSegmentacion` (`nIdSegmentacion`),
  ADD KEY `nIdDetalleSegmentacion` (`nIdDetalleSegmentacion`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`nIdProvincia`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`nIdRol`);

--
-- Indices de la tabla `rolesmodulos`
--
ALTER TABLE `rolesmodulos`
  ADD PRIMARY KEY (`nIdRolModulo`),
  ADD KEY `nIdModulo` (`nIdModulo`),
  ADD KEY `nIdRol` (`nIdRol`);

--
-- Indices de la tabla `segmentacion`
--
ALTER TABLE `segmentacion`
  ADD PRIMARY KEY (`nIdSegmentacion`),
  ADD KEY `nIdNegocio` (`nIdNegocio`);

--
-- Indices de la tabla `submodulos`
--
ALTER TABLE `submodulos`
  ADD PRIMARY KEY (`nIdSubModulo`),
  ADD KEY `nIdModulo` (`nIdModulo`);

--
-- Indices de la tabla `tiposcampos`
--
ALTER TABLE `tiposcampos`
  ADD PRIMARY KEY (`nTipoCampo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`nIdUsuario`),
  ADD KEY `nIdRol` (`nIdRol`);

--
-- Indices de la tabla `usuariosnegocios`
--
ALTER TABLE `usuariosnegocios`
  ADD PRIMARY KEY (`nIdUsuarioNegocio`),
  ADD KEY `nIdUsuario` (`nIdUsuario`),
  ADD KEY `nIdNegocio` (`nIdNegocio`);

--
-- Indices de la tabla `variblesconfiguracion`
--
ALTER TABLE `variblesconfiguracion`
  ADD PRIMARY KEY (`nIdConfiguracion`);

--
-- Indices de la tabla `widgetprospectos`
--
ALTER TABLE `widgetprospectos`
  ADD PRIMARY KEY (`nIdWidget`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `nIdActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de la tabla `cambiosprospecto`
--
ALTER TABLE `cambiosprospecto`
  MODIFY `nIdCambio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1020;

--
-- AUTO_INCREMENT de la tabla `campos`
--
ALTER TABLE `campos`
  MODIFY `nIdCampo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id Unico e incrementable', AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `camposentidades`
--
ALTER TABLE `camposentidades`
  MODIFY `nIdCampoEntidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT de la tabla `catalogo`
--
ALTER TABLE `catalogo`
  MODIFY `nIdCatalogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `catalogotabla`
--
ALTER TABLE `catalogotabla`
  MODIFY `nIdCatalogoTabla` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Identificador único, sin signo y autoincrementable', AUTO_INCREMENT=611;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `nIdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `configprospecto`
--
ALTER TABLE `configprospecto`
  MODIFY `nIdConfigProspecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT de la tabla `configuracioncampos`
--
ALTER TABLE `configuracioncampos`
  MODIFY `nIdConfiguracionCampo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2087;

--
-- AUTO_INCREMENT de la tabla `detallesegmentacion`
--
ALTER TABLE `detallesegmentacion`
  MODIFY `nIdDetalleSegmentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `nIdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `entidades`
--
ALTER TABLE `entidades`
  MODIFY `nIdEntidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `etapaprospecto`
--
ALTER TABLE `etapaprospecto`
  MODIFY `nIdEtapa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `nidModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `negocios`
--
ALTER TABLE `negocios`
  MODIFY `nIdNegocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `nIdNota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT de la tabla `prospectoadjunto`
--
ALTER TABLE `prospectoadjunto`
  MODIFY `nIdAdjunto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `prospectocatalogo`
--
ALTER TABLE `prospectocatalogo`
  MODIFY `nIdProspectoCatalogo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;

--
-- AUTO_INCREMENT de la tabla `prospectos`
--
ALTER TABLE `prospectos`
  MODIFY `nIdProspecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT de la tabla `prospectosegmentacion`
--
ALTER TABLE `prospectosegmentacion`
  MODIFY `nIdProspectoSegmentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `nIdRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rolesmodulos`
--
ALTER TABLE `rolesmodulos`
  MODIFY `nIdRolModulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `segmentacion`
--
ALTER TABLE `segmentacion`
  MODIFY `nIdSegmentacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `submodulos`
--
ALTER TABLE `submodulos`
  MODIFY `nIdSubModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tiposcampos`
--
ALTER TABLE `tiposcampos`
  MODIFY `nTipoCampo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `nIdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `usuariosnegocios`
--
ALTER TABLE `usuariosnegocios`
  MODIFY `nIdUsuarioNegocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT de la tabla `variblesconfiguracion`
--
ALTER TABLE `variblesconfiguracion`
  MODIFY `nIdConfiguracion` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `widgetprospectos`
--
ALTER TABLE `widgetprospectos`
  MODIFY `nIdWidget` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`nIdProspecto`) REFERENCES `prospectos` (`nIdProspecto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `actividades_ibfk_2` FOREIGN KEY (`nIdUsuario`) REFERENCES `empleados` (`nIdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cambiosprospecto`
--
ALTER TABLE `cambiosprospecto`
  ADD CONSTRAINT `cambiosprospecto_ibfk_1` FOREIGN KEY (`nIdProspecto`) REFERENCES `prospectos` (`nIdProspecto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cambiosprospecto_ibfk_2` FOREIGN KEY (`nIdUsuario`) REFERENCES `empleados` (`nIdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cambiosprospecto_ibfk_3` FOREIGN KEY (`nIdEtapa`) REFERENCES `etapaprospecto` (`nIdEtapa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `campos`
--
ALTER TABLE `campos`
  ADD CONSTRAINT `campos_ibfk_1` FOREIGN KEY (`nTipoCampo`) REFERENCES `tiposcampos` (`nTipoCampo`);

--
-- Filtros para la tabla `camposentidades`
--
ALTER TABLE `camposentidades`
  ADD CONSTRAINT `camposentidades_ibfk_1` FOREIGN KEY (`nIdCampo`) REFERENCES `campos` (`nIdCampo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `camposentidades_ibfk_2` FOREIGN KEY (`nIdEntidad`) REFERENCES `entidades` (`nIdEntidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `catalogo`
--
ALTER TABLE `catalogo`
  ADD CONSTRAINT `catalogo_ibfk_1` FOREIGN KEY (`nIdNegocio`) REFERENCES `negocios` (`nIdNegocio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`nIdNegocio`) REFERENCES `negocios` (`nIdNegocio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `configprospecto`
--
ALTER TABLE `configprospecto`
  ADD CONSTRAINT `configprospecto_ibfk_1` FOREIGN KEY (`nIdNegocio`) REFERENCES `negocios` (`nIdNegocio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `configprospecto_ibfk_2` FOREIGN KEY (`nIdWidget`) REFERENCES `widgetprospectos` (`nIdWidget`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `configuracioncampos`
--
ALTER TABLE `configuracioncampos`
  ADD CONSTRAINT `configuracioncampos_ibfk_2` FOREIGN KEY (`nIdNegocio`) REFERENCES `negocios` (`nIdNegocio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `configuracioncampos_ibfk_3` FOREIGN KEY (`nIdCampoEntidad`) REFERENCES `camposentidades` (`nIdCampoEntidad`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallesegmentacion`
--
ALTER TABLE `detallesegmentacion`
  ADD CONSTRAINT `detallesegmentacion_ibfk_1` FOREIGN KEY (`nIdSegmentacion`) REFERENCES `segmentacion` (`nIdSegmentacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_1` FOREIGN KEY (`nIdNegocio`) REFERENCES `negocios` (`nIdNegocio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`nIdProspecto`) REFERENCES `prospectos` (`nIdProspecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prospectoadjunto`
--
ALTER TABLE `prospectoadjunto`
  ADD CONSTRAINT `prospectoadjunto_ibfk_1` FOREIGN KEY (`nIdProspecto`) REFERENCES `prospectos` (`nIdProspecto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prospectocatalogo`
--
ALTER TABLE `prospectocatalogo`
  ADD CONSTRAINT `prospectocatalogo_ibfk_1` FOREIGN KEY (`nIdProspecto`) REFERENCES `prospectos` (`nIdProspecto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prospectocatalogo_ibfk_2` FOREIGN KEY (`nIdCatalogo`) REFERENCES `catalogo` (`nIdCatalogo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prospectos`
--
ALTER TABLE `prospectos`
  ADD CONSTRAINT `prospectos_ibfk_1` FOREIGN KEY (`nIdCliente`) REFERENCES `clientes` (`nIdCliente`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `prospectos_ibfk_2` FOREIGN KEY (`nIdUsuario`) REFERENCES `empleados` (`nIdUsuario`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `prospectos_ibfk_3` FOREIGN KEY (`nIdNegocio`) REFERENCES `negocios` (`nIdNegocio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prospectos_ibfk_4` FOREIGN KEY (`nIdEtapa`) REFERENCES `etapaprospecto` (`nIdEtapa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prospectosegmentacion`
--
ALTER TABLE `prospectosegmentacion`
  ADD CONSTRAINT `prospectosegmentacion_ibfk_1` FOREIGN KEY (`nIdProspecto`) REFERENCES `prospectos` (`nIdProspecto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prospectosegmentacion_ibfk_2` FOREIGN KEY (`nIdSegmentacion`) REFERENCES `segmentacion` (`nIdSegmentacion`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prospectosegmentacion_ibfk_3` FOREIGN KEY (`nIdDetalleSegmentacion`) REFERENCES `detallesegmentacion` (`nIdDetalleSegmentacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rolesmodulos`
--
ALTER TABLE `rolesmodulos`
  ADD CONSTRAINT `rolesmodulos_ibfk_1` FOREIGN KEY (`nIdModulo`) REFERENCES `modulos` (`nidModulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rolesmodulos_ibfk_2` FOREIGN KEY (`nIdRol`) REFERENCES `roles` (`nIdRol`);

--
-- Filtros para la tabla `segmentacion`
--
ALTER TABLE `segmentacion`
  ADD CONSTRAINT `segmentacion_ibfk_1` FOREIGN KEY (`nIdNegocio`) REFERENCES `negocios` (`nIdNegocio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `submodulos`
--
ALTER TABLE `submodulos`
  ADD CONSTRAINT `submodulos_ibfk_1` FOREIGN KEY (`nIdModulo`) REFERENCES `modulos` (`nidModulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`nIdRol`) REFERENCES `roles` (`nIdRol`);

--
-- Filtros para la tabla `usuariosnegocios`
--
ALTER TABLE `usuariosnegocios`
  ADD CONSTRAINT `usuariosnegocios_ibfk_1` FOREIGN KEY (`nIdUsuario`) REFERENCES `usuarios` (`nIdUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuariosnegocios_ibfk_2` FOREIGN KEY (`nIdNegocio`) REFERENCES `negocios` (`nIdNegocio`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
