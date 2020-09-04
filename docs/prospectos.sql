-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2020 a las 01:34:07
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
-- Base de datos: `prospectos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `idModulo` int(11) NOT NULL,
  `nombreModulo` varchar(250) NOT NULL,
  `iconoModulo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`idModulo`, `nombreModulo`, `iconoModulo`) VALUES
(1, 'Dashboard', ''),
(2, 'Configuracion', ''),
(3, 'Mantenimientos', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocios`
--

CREATE TABLE `negocios` (
  `idNegocio` int(11) NOT NULL,
  `nombreNegocio` varchar(250) NOT NULL,
  `direccionNegocio` varchar(250) NOT NULL,
  `imagenNegocio` varchar(250) DEFAULT NULL,
  `estadoNegocio` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `negocios`
--

INSERT INTO `negocios` (`idNegocio`, `nombreNegocio`, `direccionNegocio`, `imagenNegocio`, `estadoNegocio`) VALUES
(1, 'QWAY', 'PIURA', '01.png', 1),
(3, 'KP CORPORACION', 'PIURA', '02.png', 1),
(4, 'DESIGNED', 'PIURA', '03.png', 1),
(5, 'DESIGNED', 'CMY', '04.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `nombreRol` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `nombreRol`) VALUES
(1, 'SUDO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolesmodulos`
--

CREATE TABLE `rolesmodulos` (
  `idRolModulo` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  `idModulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submodulos`
--

CREATE TABLE `submodulos` (
  `idSubModulo` int(11) NOT NULL,
  `idModulo` int(11) NOT NULL,
  `nombreSubmodulo` varchar(250) NOT NULL,
  `iconoSubmodulo` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` varchar(250) NOT NULL,
  `apellidoUsuario` varchar(250) NOT NULL,
  `loginUsuario` varchar(250) NOT NULL,
  `claveUsuario` varchar(250) NOT NULL,
  `imagenUsuario` varchar(250) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL,
  `estadoUsuario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `apellidoUsuario`, `loginUsuario`, `claveUsuario`, `imagenUsuario`, `idRol`, `estadoUsuario`) VALUES
(1, 'SUDO', 'SUDO', 'sudo', 'abc123', NULL, 1, 1),
(2, 'Administrador', 'Administrador', 'admin', 'abc123', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosnegocios`
--

CREATE TABLE `usuariosnegocios` (
  `idUsuarioNegocio` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idNegocio` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuariosnegocios`
--

INSERT INTO `usuariosnegocios` (`idUsuarioNegocio`, `idUsuario`, `idNegocio`) VALUES
(1, 2, 1),
(2, 2, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`idModulo`);

--
-- Indices de la tabla `negocios`
--
ALTER TABLE `negocios`
  ADD PRIMARY KEY (`idNegocio`),
  ADD KEY `idImagen` (`imagenNegocio`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `rolesmodulos`
--
ALTER TABLE `rolesmodulos`
  ADD PRIMARY KEY (`idRolModulo`),
  ADD KEY `idModulo` (`idModulo`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `submodulos`
--
ALTER TABLE `submodulos`
  ADD PRIMARY KEY (`idSubModulo`),
  ADD KEY `idModulo` (`idModulo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idImagen` (`imagenUsuario`),
  ADD KEY `idRol` (`idRol`);

--
-- Indices de la tabla `usuariosnegocios`
--
ALTER TABLE `usuariosnegocios`
  ADD PRIMARY KEY (`idUsuarioNegocio`),
  ADD KEY `usuariosnegocios_ibfk_1` (`idNegocio`),
  ADD KEY `usuariosnegocios_ibfk_2` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `idModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `negocios`
--
ALTER TABLE `negocios`
  MODIFY `idNegocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `rolesmodulos`
--
ALTER TABLE `rolesmodulos`
  MODIFY `idRolModulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `submodulos`
--
ALTER TABLE `submodulos`
  MODIFY `idSubModulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuariosnegocios`
--
ALTER TABLE `usuariosnegocios`
  MODIFY `idUsuarioNegocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `rolesmodulos`
--
ALTER TABLE `rolesmodulos`
  ADD CONSTRAINT `rolesmodulos_ibfk_1` FOREIGN KEY (`idModulo`) REFERENCES `modulos` (`idModulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rolesmodulos_ibfk_2` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `submodulos`
--
ALTER TABLE `submodulos`
  ADD CONSTRAINT `submodulos_ibfk_1` FOREIGN KEY (`idModulo`) REFERENCES `modulos` (`idModulo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `usuariosnegocios`
--
ALTER TABLE `usuariosnegocios`
  ADD CONSTRAINT `usuariosnegocios_ibfk_1` FOREIGN KEY (`idNegocio`) REFERENCES `negocios` (`idNegocio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuariosnegocios_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
