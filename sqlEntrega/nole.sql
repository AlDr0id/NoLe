-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2018 a las 18:32:32
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

--
-- Volcado de datos para la tabla `cromos`
--

INSERT INTO `cromos` (`Id`, `Anyo`, `Coleccion`, `Ncromo_idcromo`) VALUES
(9, 2015, 'liga este', '');

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

--
-- Volcado de datos para la tabla `figuras`
--

INSERT INTO `figuras` (`Id`, `Alto`, `Ancho`, `Largo`, `Tema`, `Material`, `Fabricante`) VALUES
(5, 29, 5, 5, 'ACTION MAN', 'Plastico', 'ACTION MAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filatelia`
--

CREATE TABLE `filatelia` (
  `Id` int(11) NOT NULL,
  `Anyo` int(4) NOT NULL,
  `Pais` varchar(60) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `filatelia`
--

INSERT INTO `filatelia` (`Id`, `Anyo`, `Pais`) VALUES
(6, 1951, 'EspaÃ±a'),
(7, 2010, 'EspaÃ±a');

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

--
-- Volcado de datos para la tabla `libros_comics`
--

INSERT INTO `libros_comics` (`Id`, `Anyo`, `Autor`, `Editorial`, `Genero`, `Idioma`, `Formato`) VALUES
(10, 1989, 'Marcus Pfister', 'Penguin Random House', 'Accion', 'EspaÃ±ol', 'Tapa Blanda');

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
(1, 'Armenia', 2015, 'Bueno'),
(2, 'Marruecos', 1299, 'Bueno');

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

--
-- Volcado de datos para la tabla `producto_ofrecido`
--

INSERT INTO `producto_ofrecido` (`ID`, `Nombre`, `Usuario`, `Fecha`, `Disponible`, `Precio`, `Descripcion`, `Categoria`, `EnPuja`) VALUES
(1, 'Onza Armenia', 'marcos', '2018-05-24 05:37:52', 1, 30, '1 Onza Armenia  (500 Drams) 2015 &quot;Arca de NoÃ©&quot; de plata. \r\n\r\nComposiciÃ³n: Plata 999.\r\n\r\nDiÃ¡metro: 38,6 mm\r\n\r\nGrosor:2,8mm \r\n\r\nPeso: 31,1 gr.', 0, 1),
(2, 'MARRUECOS DIRHANS', 'marcos', '2018-05-24 05:46:00', 1, 70, 'MARRUECOS - K-080 - 10 DIRHANS 1299 , EBC plata', 0, 0),
(3, 'DEDAL DE TIAHUANACO ', 'marcos', '2018-05-24 05:48:56', 1, 6, 'DEDAL DE TIAHUANACO BOLIVIA DE CERÃMICA ORIGINAL', 1, 1),
(4, 'ImÃ¡n de nevera 3-D ', 'marcos', '2018-05-24 05:56:32', 1, 3, 'Los imanes de Londres estÃ¡n fabricados con colores vivos y viejos recuerdos. Un ornamento super detallado de colecciÃ³n para cualquier superficie magnÃ©tica. Muy divertido, iconos de Londres entre las que incluye el London Bridge y la torre de Londres, este extraordinario Souvenir britannico de colecciÃ³n serÃ¡ realmente sorprendente.', 1, 0),
(5, 'FIGURA ACTION MAN', 'marcos', '2018-05-24 05:59:25', 1, 15, 'FIGURA ACTION MAN AÃ‘O 2006 REF.C-023', 2, 1),
(6, 'Sellos AÃ‘O 1951', 'marcos', '2018-05-24 06:04:04', 1, 950, 'Serie compuesta por 18 sellos, en nuevo sin charnela.', 3, 1),
(7, 'Sellos AÃ‘O 2010', 'marcos', '2018-05-24 06:05:49', 1, 110, 'Incluye todos los sellos del aÃ±o, un juego completo de hojitas bloque y carnet de AutonomÃ­as', 3, 1),
(8, 'Abbey Road (Vinilo)', 'marcos', '2018-05-24 06:16:04', 1, 20, 'Abbey Road (Vinilo)', 4, 0),
(9, 'Cromos liga este', 'marcos', '2018-05-24 06:18:57', 1, 100, 'Cromos conmemorativos y exclusivos no se pueden conseguir en ningun sitio liga este 2015-16.', 5, 1),
(10, 'Pilares de la Tierra', 'marcos', '2018-05-24 06:26:25', 1, 12, 'Los pilares de la Tierra es la obra maestra de Ken Follett y constituye una excepcional evocaciÃ³n de una Ã©poca de violentas pasiones.\r\n\r\nEl gran maestro de la narrativa de acciÃ³n y suspense nos transporta a la Edad Media, a un fascinante mundo de reyes, damas, caballeros, pugnas feudales, castillos y ciudades amuralladas. El amor y la muerte se entrecruzan vibrantemente en este magistral tapiz cuyo centro es la construcciÃ³n de una catedral gÃ³tica. La historia se inicia con el ahorcamiento pÃºblico de un inocente y finaliza con la humillaciÃ³n de un rey.', 6, 0),
(11, 'Consola de nogal', 'marcos', '2018-05-24 06:29:20', 1, 800, 'Consola de nogal barnizada en muy buena conservaciÃ³n', 7, 1);

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

--
-- Volcado de datos para la tabla `rincon_de_la_abuela`
--

INSERT INTO `rincon_de_la_abuela` (`Id`, `Tipo`, `Origen`) VALUES
(3, 0, 'Bolivia'),
(4, 2, 'Italia');

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

--
-- Volcado de datos para la tabla `trastero`
--

INSERT INTO `trastero` (`Id`, `Anyo`, `Origen`) VALUES
(11, 1990, 'EspaÃ±ol');

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

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Nombre`, `Apellido`, `Nickname`, `Pass`, `Correo`, `Activo`, `Foto`, `Valoracion`, `Numvaloraciones`) VALUES
('marcos', 'marcos', 'marcos', '$2y$10$uX3hcX7748WgmzVvj16iA.0yvO4UTuQZTaImKdCPSzZAhW2gbe8WO', 'marcos@marcos.com', 1, '', '0', 0);

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
-- Volcado de datos para la tabla `vinilos_discos`
--

INSERT INTO `vinilos_discos` (`Id`, `Anyo`, `Autor_compositor`, `Grupo_cantante`, `Genero`) VALUES
(8, 2012, 'George Martin', 'The Beatles', 'Rock');

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
