-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2018 a las 10:55:20
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

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

--
-- Volcado de datos para la tabla `numismatica`
--

INSERT INTO `numismatica` (`Id`, `Pais`, `Anyo`, `Conservacion`) VALUES
(1, 'Grecia', 732, 'Baúl de madera'),
(2, 'España', 1953, 'Desván antiguo'),
(3, 'Italia', 1990, 'Obra'),
(4, 'EEUU', 1853, 'Vitrina'),
(5, 'China', 500, 'En cajón'),
(6, 'Rusia', 2015, 'En caja'),
(7, 'Alemania', 1992, 'Monedero viejo'),
(8, 'España', 2018, 'Nueva');

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
  `EnPuja` tinyint(1) NOT NULL,
  `Foto` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `producto_ofrecido`
--

INSERT INTO `producto_ofrecido` (`ID`, `Nombre`, `Usuario`, `Fecha`, `Disponible`, `Precio`, `Descripcion`, `Categoria`, `EnPuja`, `Foto`) VALUES
(1, 'Moneda griega', 'alvo', '2000-02-25 04:28:00', 1, 25, 'Moneda griega posterior Cristo.', 0, 0, ''),
(2, 'Peseta rara', 'JGuti', '2015-05-06 19:59:00', 1, 5.6, 'Peseta rara encontrada en el desván de mi abuelo', 0, 1, ''),
(3, 'Moneda antigua', 'alexp', '2013-05-05 09:49:08', 1, 500, 'Moneda antigua. Algo sucia.', 0, 1, ''),
(4, 'Céntimo Americano', 'alvo', '2015-03-23 12:38:00', 1, 1000, 'Céntimo americano original', 0, 1, ''),
(5, 'Moneda china antigua', 'alvo', '2015-03-01 04:00:00', 1, 120, 'Creo que es china por las letras. Fecha no asegurada.', 0, 1, ''),
(6, 'Moneda rusa', 'Pepe', '2015-03-15 09:10:00', 1, 15, 'Moneda rusa de mi viaje.', 0, 0, ''),
(7, 'Moneda Alemana', 'rodribarro', '2015-03-10 00:00:00', 1, 15, 'Creo que es un marco alemán', 0, 0, ''),
(8, 'Mnda oro nueva', 'manu', '2018-05-06 00:00:00', 1, 100, 'Oro puro.', 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puja`
--

CREATE TABLE `puja` (
  `Id` int(11) NOT NULL,
  `IdProducto` int(11) NOT NULL,
  `IdPostor` varchar(20) COLLATE utf8_bin NOT NULL,
  `Precio` float NOT NULL,
  `IdTrueque` int(11) DEFAULT NULL,
  `Fecha` datetime NOT NULL,
  `Estado` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `puja`
--

INSERT INTO `puja` (`Id`, `IdProducto`, `IdPostor`, `Precio`, `IdTrueque`, `Fecha`, `Estado`) VALUES
(1, 7, 'alexp', 20, NULL, '2018-05-01 05:09:00', 'PENDIENTE'),
(2, 2, 'alexp', 16, NULL, '2018-05-01 09:04:00', 'PERDIDA'),
(3, 2, 'JGuti', 50, NULL, '2018-05-03 16:22:00', 'GANADA'),
(4, 1, 'JGuti', 1005, NULL, '2018-05-04 08:05:00', 'PENDIENTE'),
(5, 1, 'alexp', 0, 3, '2018-05-04 20:00:00', 'PENDIENTE'),
(6, 4, 'manu', 21, NULL, '2018-05-05 01:33:23', 'PENDIENTE');

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
  `Valoracion` decimal(10,2) NOT NULL,
  `Numvaloraciones` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Nombre`, `Apellido`, `Nickname`, `Pass`, `Correo`, `Activo`, `Foto`, `Valoracion`, `Numvaloraciones`) VALUES
('Jaime', 'Gutierrez', 'JGuti', 'jaimeguti', 'JG@ucm.es', 0, '', '0.00', 0),
('Pepe', 'Levis', 'Pepe', 'pepetrousers', 'pepo@hotmail.com', 0, '', '0.00', 0),
('aaa', 'aaa', 'aaa', '$2y$10$lDIjVE/GZRsXCN7LAjVqQ.Mg7zU.0s9IVEemBItFYPyeHqF8XDp4O', 'aaa@gmail.com', 1, '', '0.00', 0),
('Alex', 'Pascua', 'alexp', 'lol1234', 'alexp@ucm.es', 0, '', '0.00', 0),
('Alvaro', 'Ochoa', 'alvo', 'hck3r', 'alvo@mail.com', 0, '', '0.00', 0),
('bbb', 'bbb', 'bbb', '$2y$10$AYUBSzm6Q.y653tBqTcrGO.lFFg4HApFSUVevfWEDnEBY5kl2rgZq', 'bbb', 1, '', '0.00', 0),
('elPiernas', 'cojo', 'elPiernas69', '$2y$10$FheTevNBlYyvk', 'a@gmail.com', 1, '', '0.00', 0),
('manu', 'oreja', 'manu', 'lolo97', 'manu@hotmail.com', 0, '', '0.00', 0),
('raul', 'gomez', 'raul', '$2y$10$eB4GAL9DQHu/MDf6sLxmAOnQWt4tF71ikMbFX1J2I4x00T7IsU.XK', 'raul@m.m', 1, '', '1.79', 15),
('Rodrigo', 'Barroso', 'rodribarro', 'puma69', 'rodric@gmail.com', 0, '', '0.00', 0);

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
-- Indices de la tabla `puja`
--
ALTER TABLE `puja`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdProducto` (`IdProducto`),
  ADD KEY `IdPostor` (`IdPostor`),
  ADD KEY `IdTrueque` (`IdTrueque`);

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
  ADD CONSTRAINT `cromos_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `producto_ofrecido` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `figuras`
--
ALTER TABLE `figuras`
  ADD CONSTRAINT `figuras_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `producto_ofrecido` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `filatelia`
--
ALTER TABLE `filatelia`
  ADD CONSTRAINT `filatelia_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `producto_ofrecido` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `libros_comics`
--
ALTER TABLE `libros_comics`
  ADD CONSTRAINT `libros_comics_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `producto_ofrecido` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `numismatica`
--
ALTER TABLE `numismatica`
  ADD CONSTRAINT `numismatica_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `producto_ofrecido` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_ofrecido`
--
ALTER TABLE `producto_ofrecido`
  ADD CONSTRAINT `producto_ofrecido_ibfk_1` FOREIGN KEY (`Usuario`) REFERENCES `usuario` (`Nickname`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ofrecido_ibfk_2` FOREIGN KEY (`Categoria`) REFERENCES `categoria` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `puja`
--
ALTER TABLE `puja`
  ADD CONSTRAINT `puja_ibfk_1` FOREIGN KEY (`IdProducto`) REFERENCES `producto_ofrecido` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `puja_ibfk_2` FOREIGN KEY (`IdTrueque`) REFERENCES `producto_ofrecido` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `puja_ibfk_3` FOREIGN KEY (`IdPostor`) REFERENCES `usuario` (`Nickname`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `rincon_de_la_abuela`
--
ALTER TABLE `rincon_de_la_abuela`
  ADD CONSTRAINT `rincon_de_la_abuela_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `producto_ofrecido` (`ID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `rincon_de_la_abuela_ibfk_2` FOREIGN KEY (`Tipo`) REFERENCES `tipo` (`Id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `trastero`
--
ALTER TABLE `trastero`
  ADD CONSTRAINT `trastero_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `producto_ofrecido` (`ID`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `vinilos_discos`
--
ALTER TABLE `vinilos_discos`
  ADD CONSTRAINT `vinilos_discos_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `producto_ofrecido` (`ID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
