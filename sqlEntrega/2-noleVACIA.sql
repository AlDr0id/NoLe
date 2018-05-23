-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2018 a las 01:31:02
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nole`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Id`, `Nombre`) VALUES
(0, 'Numismática'),
(1, 'Rincón de la Abuela'),
(2, 'Figuras'),
(3, 'Filatelia'),
(4, 'Vinilos/Discos'),
(5, 'Cromos'),
(6, 'Libros/Comics'),
(7, 'Trastero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cromos`
--

CREATE TABLE `cromos` (
  `Id` int(11) NOT NULL,
  `Anyo` int(4) NOT NULL,
  `Coleccion` varchar(60) COLLATE utf8_bin NOT NULL,
  `Ncromo_idcromo` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `figuras`
--

CREATE TABLE `figuras` (
  `Id` int(11) NOT NULL,
  `Alto` float NOT NULL,
  `Ancho` float NOT NULL,
  `Largo` float NOT NULL,
  `Tema` varchar(60) COLLATE utf8_bin NOT NULL,
  `Material` varchar(100) COLLATE utf8_bin NOT NULL,
  `Fabricante` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filatelia`
--

CREATE TABLE `filatelia` (
  `Id` int(11) NOT NULL,
  `Anyo` int(4) NOT NULL,
  `Pais` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros_comics`
--

CREATE TABLE `libros_comics` (
  `Id` int(11) NOT NULL,
  `Anyo` int(4) NOT NULL,
  `Autor` varchar(60) COLLATE utf8_bin NOT NULL,
  `Editorial` varchar(60) COLLATE utf8_bin NOT NULL,
  `Genero` varchar(60) COLLATE utf8_bin NOT NULL,
  `Idioma` varchar(60) COLLATE utf8_bin NOT NULL,
  `Formato` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numismatica`
--

CREATE TABLE `numismatica` (
  `Id` int(11) NOT NULL,
  `Pais` varchar(20) COLLATE utf8_bin NOT NULL,
  `Anyo` int(4) NOT NULL,
  `Conservacion` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_ofrecido`
--

CREATE TABLE `producto_ofrecido` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(20) COLLATE utf8_bin NOT NULL,
  `Usuario` varchar(20) COLLATE utf8_bin NOT NULL,
  `Fecha` datetime NOT NULL,
  `Disponible` tinyint(1) NOT NULL DEFAULT '1',
  `Precio` float NOT NULL,
  `Descripcion` text COLLATE utf8_bin NOT NULL,
  `Categoria` int(11) NOT NULL,
  `EnPuja` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_solicitado`
--

CREATE TABLE `producto_solicitado` (
  `id` int(11) NOT NULL,
  `id_user` varchar(20) COLLATE utf8_bin NOT NULL,
  `nombreP` varchar(50) COLLATE utf8_bin NOT NULL,
  `palabrasClave` varchar(50) COLLATE utf8_bin NOT NULL,
  `categoria` int(11) NOT NULL,
  `id_Producto` int(11) DEFAULT NULL,
  `activo` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puja`
--

CREATE TABLE `puja` (
  `Id` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdVendedor` varchar(50) COLLATE utf8_bin NOT NULL,
  `IdPostor` varchar(20) COLLATE utf8_bin NOT NULL,
  `Precio` float NOT NULL,
  `IdTrueque` int(11) DEFAULT NULL,
  `Fecha` datetime NOT NULL,
  `Estado` varchar(20) COLLATE utf8_bin NOT NULL,
  `Valorada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rincon_de_la_abuela`
--

CREATE TABLE `rincon_de_la_abuela` (
  `Id` int(11) NOT NULL,
  `Tipo` int(11) NOT NULL,
  `Origen` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`Id`, `Nombre`) VALUES
(0, 'Dedal'),
(1, 'Vajilla'),
(2, 'Iman');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trastero`
--

CREATE TABLE `trastero` (
  `Id` int(11) NOT NULL,
  `Anyo` int(4) NOT NULL,
  `Origen` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Nombre` varchar(20) COLLATE utf8_bin NOT NULL,
  `Apellido` varchar(20) COLLATE utf8_bin NOT NULL,
  `Nickname` varchar(20) COLLATE utf8_bin NOT NULL,
  `Pass` varchar(260) COLLATE utf8_bin NOT NULL,
  `Correo` varchar(50) COLLATE utf8_bin NOT NULL,
  `Activo` tinyint(1) NOT NULL DEFAULT '1',
  `Foto` varchar(100) COLLATE utf8_bin NOT NULL,
  `Valoracion` decimal(10,0) NOT NULL,
  `Numvaloraciones` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vinilos_discos`
--

CREATE TABLE `vinilos_discos` (
  `Id` int(11) NOT NULL,
  `Anyo` int(4) NOT NULL,
  `Autor_compositor` varchar(60) COLLATE utf8_bin NOT NULL,
  `Grupo_cantante` varchar(60) COLLATE utf8_bin NOT NULL,
  `Genero` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `cromos`
--
ALTER TABLE `cromos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indices de la tabla `figuras`
--
ALTER TABLE `figuras`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indices de la tabla `filatelia`
--
ALTER TABLE `filatelia`
  ADD KEY `Id` (`Id`);

--
-- Indices de la tabla `libros_comics`
--
ALTER TABLE `libros_comics`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indices de la tabla `numismatica`
--
ALTER TABLE `numismatica`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indices de la tabla `producto_ofrecido`
--
ALTER TABLE `producto_ofrecido`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Categoria` (`Categoria`),
  ADD KEY `Usuario` (`Usuario`);

--
-- Indices de la tabla `producto_solicitado`
--
ALTER TABLE `producto_solicitado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`,`categoria`,`id_Producto`),
  ADD KEY `categoria` (`categoria`),
  ADD KEY `id_Producto` (`id_Producto`);

--
-- Indices de la tabla `puja`
--
ALTER TABLE `puja`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdProducto` (`IdProducto`),
  ADD KEY `IdPostor` (`IdPostor`),
  ADD KEY `IdTrueque` (`IdTrueque`),
  ADD KEY `IdVendedor` (`IdVendedor`);

--
-- Indices de la tabla `rincon_de_la_abuela`
--
ALTER TABLE `rincon_de_la_abuela`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`),
  ADD KEY `Tipo` (`Tipo`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD KEY `Id` (`Id`);

--
-- Indices de la tabla `trastero`
--
ALTER TABLE `trastero`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Nickname`);

--
-- Indices de la tabla `vinilos_discos`
--
ALTER TABLE `vinilos_discos`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id` (`Id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cromos`
--
ALTER TABLE `cromos`
  ADD CONSTRAINT `cromos_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `producto_ofrecido` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `figuras`
--
ALTER TABLE `figuras`
  ADD CONSTRAINT `figuras_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `producto_ofrecido` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `filatelia`
--
ALTER TABLE `filatelia`
  ADD CONSTRAINT `filatelia_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `producto_ofrecido` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `libros_comics`
--
ALTER TABLE `libros_comics`
  ADD CONSTRAINT `libros_comics_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `producto_ofrecido` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `numismatica`
--
ALTER TABLE `numismatica`
  ADD CONSTRAINT `numismatica_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `producto_ofrecido` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_ofrecido`
--
ALTER TABLE `producto_ofrecido`
  ADD CONSTRAINT `producto_ofrecido_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Nickname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ofrecido_ibfk_2` FOREIGN KEY (`Categoria`) REFERENCES `categoria` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_solicitado`
--
ALTER TABLE `producto_solicitado`
  ADD CONSTRAINT `producto_solicitado_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`Nickname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_solicitado_ibfk_2` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_solicitado_ibfk_3` FOREIGN KEY (`id_Producto`) REFERENCES `producto_ofrecido` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `puja`
--
ALTER TABLE `puja`
  ADD CONSTRAINT `puja_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto_ofrecido` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `puja_ibfk_2` FOREIGN KEY (`IdTrueque`) REFERENCES `producto_ofrecido` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `puja_ibfk_3` FOREIGN KEY (`IdPostor`) REFERENCES `usuario` (`Nickname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rincon_de_la_abuela`
--
ALTER TABLE `rincon_de_la_abuela`
  ADD CONSTRAINT `rincon_de_la_abuela_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `producto_ofrecido` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rincon_de_la_abuela_ibfk_2` FOREIGN KEY (`Tipo`) REFERENCES `tipo` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trastero`
--
ALTER TABLE `trastero`
  ADD CONSTRAINT `trastero_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `producto_ofrecido` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vinilos_discos`
--
ALTER TABLE `vinilos_discos`
  ADD CONSTRAINT `vinilos_discos_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `producto_ofrecido` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
