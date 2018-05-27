-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-05-2018 a las 19:38:19
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

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
(9, 2015, 'liga este', ''),
(12, 2010, 'MUNDIAL 2010 SUDAFRICA', '');

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
(5, 29, 5, 5, 'ACTION MAN', 'Plastico', 'ACTION MAN'),
(17, 10, 5, 5, ' Marvel', 'PVC/ABS', 'Marvel');

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
(7, 2010, 'EspaÃ±a'),
(20, 1850, 'EspaÃ±a');

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
(10, 1989, 'Marcus Pfister', 'Penguin Random House', 'Accion', 'EspaÃ±ol', 'Tapa Blanda'),
(18, 2015, 'JuliÃ¡n M. Clemente', 'Panini', 'Accion', 'EspaÃ±ol', 'Tapa blanda'),
(22, 2018, 'Marcos Vazquez Garcia', 'ANAYA', 'Deportes', 'EspaÃ±ol', 'Tapa blanda'),
(23, 2018, 'Akira Toriyama', 'Planeta DeAgostini', 'Manga', 'EspaÃ±ol', 'Tapa blanda');

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
(2, 'Marruecos', 1299, 'Bueno'),
(15, 'Grecia', 2004, 'Bueno'),
(16, 'Italia', 2004, 'Bueno'),
(25, 'Rusia', 1998, 'bueno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_ofrecido`
--

CREATE TABLE `producto_ofrecido` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(200) COLLATE utf8_bin NOT NULL,
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
(11, 'Consola de nogal', 'marcos', '2018-05-24 06:29:20', 1, 800, 'Consola de nogal barnizada en muy buena conservaciÃ³n', 7, 1),
(12, 'COLECCION COMPLETA MUNDIAL 2010 SUDAFRICA', 'alberto', '2018-05-27 19:07:52', 1, 50, 'COLECCION COMPLETA MUNDIAL 2010 SUDAFRICA DE PANINI\r\n\r\nSE COMPONE DE LOS 640 CROMOS DE LA COLECCION SIN PEGAR + EL ALBUM OFICIAL DE LA COLECCION ( TODO TOTALMENTE NUEVO )\r\n\r\nSE AÃ‘ADEN 4 CROMOS EXCLUSIVOS ( KLOSE  - ALEMANIA )', 5, 0),
(13, 'Disco red hot chili peppers californication', 'alejandro', '2018-05-25 11:00:51', 1, 8, '', 4, 1),
(14, 'NUNCHAKUS BOIS', 'alejandro', '2018-05-25 11:04:02', 1, 23, 'Nunchakus Bois de entrenamiento\r\nFuertes y Resistentes\r\nMaterial: Madera clara', 1, 1),
(15, '2 â‚¬ CONMEMORATIVOS GRECIA 2004', 'javier', '2018-05-25 11:09:40', 1, 6, '2 â‚¬ conmemorativos Grecia 2004 -OLIMPIADA DE ATENAS', 0, 1),
(16, '2 â‚¬ CONMEMORATIVOS ITALIA 2004', 'javier', '2018-05-25 11:13:11', 1, 7, '2 â‚¬ conmemorativos Italia 2004 - F.A.O.', 0, 0),
(17, 'FIGURA SPIDER-MAN MILES MORALES - MARVEL NOW ARTFX', 'alberto', '2018-05-27 19:04:23', 1, 70, 'Kotobukiya presenta la estatua de Spider-man, en su versiÃ³n del traje perteneciente a Miles Morales, para la colecciÃ³n ART FX+. Este personaje pertenecÃ­a al universo Ultimate de Marvel aunque actualmente, despues de la Ãºltima Secret War, pertenece al nuevo universo Marvel. Esta realizada en PVC/ABS y mide unos 10 cm de alto. Escala 1/10. Esta figura incluye base soporte para exposiciÃ³nn. Es parte de la serie dedicada Esta nueva estatua es la segunda en una serie de figuras basadas en el universo Spider-Man, que ya tuvo su primera versiÃ³n con la estatua de The Amazing Spider-Man y que se proyecta siga en el futuro con las figuras de Spider-Man 2099, Spider-Gwen, Veneno clÃ¡sico, Veneno Moderno y Matanza.', 2, 0),
(18, 'Spiderman. La Historia JamÃ¡s Contada', 'daniel', '2018-05-25 11:21:09', 1, 23, 'Icono de la cultura popular del siglo XX, personificaciÃ³n de todos los nerds que hayan existido, hÃ©roe de la calle, sÃ­mbolo de Marvel Comicsâ€¦ En su mÃ¡s de medio siglo de existencia, Spider-Man ha sido todo eso y mÃ¡s. Su historia es la historia del cÃ³mic americano, en una Ã©poca apasionante en que Marvel se reinventÃ³ una y otra vez, de pequeÃ±a editorial a lÃ­der del mercado, de empresa en bancarrota a gigante del entretenimiento. JuliÃ¡n M. Clemente, autor de multitud de libros, artÃ­culos y estudios sobre La Casa de las Ideas y Editor Marvel en EspaÃ±a, ha buscado en los rincones mÃ¡s oscuros de innumerables archivos, ha preguntado a autores y editores y ha investigado mÃ¡s allÃ¡ de toda medida, a la caza de secretos nunca antes desvelados, para ofrecer el mÃ¡s exhaustivo y completo anÃ¡lisis de la historia de Spider-Man que se haya realizado jamÃ¡s, en una obra que ha tardado mÃ¡s de quince aÃ±os en completar. No lo sabrÃ¡s todo sobre el trepamuros hasta que no hayas leÃ­do Spider-Man: La historia jamÃ¡s contada.', 6, 1),
(19, 'ImÃ¡n para nevera acrÃ­lico El Greco Toledo', 'daniel', '2018-05-25 11:23:13', 1, 7, '2,75 pulgadas x 2 pulgadas imÃ¡n acrÃ­lico transparente con imagen impresa en calidad papel fotogrÃ¡fico brillante y recubierto', 1, 1),
(20, '6 CUARTOS 1850 NUEVO SIN GOMA', 'daniel', '2018-05-25 11:26:15', 1, 300, 'NÂº 001 - 6 CUARTOS 1850 NUEVO SIN GOMA - 2 MARGENES CORTOS', 3, 0),
(21, 'mercers furniture Corona â€“ Mesa de comedor y 2 s', 'alberto', '2018-05-25 11:31:02', 1, 110, 'Madera maciza de pino.\r\nAcabado de cera antiguo.\r\nAutomontaje.', 7, 1),
(22, 'Fitness revolucionario', 'alejandro', '2018-05-27 19:07:52', 1, 17, 'La civilizaciÃ³n tiene una relaciÃ³n paradÃ³jica con la salud. Por un lado, vivimos ahora mÃ¡s que nunca y tenemos acceso a comodidades impensables hace unas pocas dÃ©cadas. Por otro lado, las nuevas tecnologÃ­as crean nuevos problemas, dando lugar a las enfermedades del progreso, como obesidad, diabetes, cÃ¡ncer, aterosclerosis y depresiÃ³n. Vivimos mÃ¡s pero pasamos mÃ¡s tiempo enfermos. Este libro detalla cÃ³mo evitar este triste destino. EntenderÃ¡s por quÃ© los genes tienen el secreto para deshacerse fÃ¡cilmente del sobrepeso y conocerÃ¡s los aspectos del mundo moderno que contribuyen a los trastornos del progreso. Te familiarizarÃ¡s con las tradiciones de las poblaciones mÃ¡s saludables del planeta y aprenderÃ¡s a aplicar la sabidurÃ­a del pasado para mejorar tu cuerpo en el presente. En un mundo plagado de mitos y falsas promesas, Fitness Revolucionario ofrece una visiÃ³n cientÃ­fica y global para eliminar esos kilos de mÃ¡s, pero tambiÃ©n para descansar mejor y vivir con mÃ¡s energÃ­a. Miles de personas han logrado su objetivo siguiendo los principios que encontrarÃ¡s en este libro. Es el momento de experimentar una salud salvaje.', 6, 0),
(23, 'Dragon Ball Serie roja nÂº 218', 'alberto', '2018-05-25 11:38:43', 1, 3, 'Trunks ha vuelto una vez mÃ¡s del futuro. En su mundo, un hombre idÃ©ntico a Goku, Goku Black, se dispone a exterminar a la humanidad. Â¿Â¡QuÃ© serÃ¡ de Goku y Vegeta, que se dirigen al futuro!? Mientras tanto, Zamasu, candidato a KaiÃ´shin del dÃ©cimo universo, se fija en Goku...', 6, 1),
(24, 'Victorinox Huntsman 1.3713 - Cuchillo navaja con 9 funciones', 'manuel', '2018-05-25 06:52:06', 1, 50, 'Cuchilla grande, cuchilla pequeÃ±a, abrelatas ,destornillador 3 mm, abrebotellas, pelacables ,destornillador 6 mm ,escariador, punzÃ³n y punzÃ³n de costura ,sacacorchos ,tijeras ,sierra de madera, gancho multipropÃ³sito ,palillo ,pinzas, llavero.', 7, 1),
(25, 'Moneda rusa', 'daniel', '2018-05-27 06:54:59', 1, 8, 'Moneda rusa de un rublo', 0, 1),
(26, 'Vajilla de Zara decorativa', 'marcos', '2018-05-27 07:17:16', 1, 50, 'Preciosa vajilla decorativa', 1, 1);

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

--
-- Volcado de datos para la tabla `producto_solicitado`
--

INSERT INTO `producto_solicitado` (`id`, `id_user`, `nombreP`, `palabrasClave`, `categoria`, `id_Producto`, `activo`) VALUES
(1, 'alberto', 'Moneda de 1 rublo', 'rublo rusa', 0, 25, 1),
(2, 'alejandro', 'vajilla de zara', 'completa', 1, 26, 1),
(3, 'daniel', 'Figura Berserk', 'Berserk Guts Dragonslayer', 2, NULL, 1);

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

--
-- Volcado de datos para la tabla `puja`
--

INSERT INTO `puja` (`Id`, `IdProducto`, `IdVendedor`, `IdPostor`, `Precio`, `IdTrueque`, `Fecha`, `Estado`, `Valorada`) VALUES
(1, 17, 'javier', 'alberto', 70, NULL, '2018-05-27 07:02:51', 'GANADA', 0),
(2, 12, 'alejandro', 'alberto', 0, 22, '2018-05-27 07:03:35', 'GANADA', 0),
(3, 7, 'marcos', 'manuel', 110, NULL, '2018-05-27 07:23:17', 'PENDIENTE', 0),
(4, 23, 'alberto', 'manuel', 5, NULL, '2018-05-27 07:23:33', 'PENDIENTE', 0),
(5, 23, 'alberto', 'daniel', 4, NULL, '2018-05-27 07:24:10', 'PENDIENTE', 0);

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
(4, 2, 'Italia'),
(19, 2, 'UK'),
(26, 1, 'Zara');

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
(11, 1990, 'EspaÃ±ol'),
(21, 2014, 'Desconocido'),
(24, 0, 'Suiza');

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
('alberto', 'alberto', 'alberto', '$2y$10$J4.0fFMUebr1AOQq1CnbJO3eDy7/.UZhnsLHJRoorEeE6.KjkBGl.', 'alberto@alberto.com', 1, '', '0', 0),
('alejandro', 'alejandro', 'alejandro', '$2y$10$HmrDRMEZGn8igRHjJ1iHi.rx4R/0ZgQnxgkL7tafTrEi4PqDWCpG2', 'alejandro@alejandro.com', 1, '', '0', 0),
('alvaro', 'alvaro', 'alvaro', '$2y$10$0zoz2BDQiUpoCfIM.YxtmeHnLPi0SzqyNY5kmxOdHd1kau9tesvki', 'alvaro@alvaro.com', 1, '', '0', 0),
('daniel', 'daniel', 'daniel', '$2y$10$AvQdfqCnxZ4NY8Q304zOKO7jm0.louKRf7pgy.E/nRWfZEPXoUY/C', 'daniel@daniel.com', 1, '', '0', 0),
('javier', 'javier', 'javier', '$2y$10$/NtuCSg/49OkQPiJyilQb.VIIcDdR/i2/CVzvVQLc3sTuudNUPRv.', 'javier@javier.com', 1, '', '0', 0),
('manuel', 'manuel', 'manuel', '$2y$10$EJvxYYQn3Pey5UW.5UQOjOKJo0iua088TpvdzUFx4dcopbH9bRjS6', 'manuel@manuel.com', 1, '', '0', 0),
('marcos', 'marcos', 'marcos', '$2y$10$uX3hcX7748WgmzVvj16iA.0yvO4UTuQZTaImKdCPSzZAhW2gbe8WO', 'marcos@marcos.com', 1, '', '0', 0),
('rodrigo', 'rodrigo', 'rodrigo', '$2y$10$4DWnNlTyqfzel56mOk0wkuLpSnDHSn6U4/GLHkUCOzwAUxHpHRBoG', 'rodrigo@rodrigo.com', 1, '', '0', 0);

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
(8, 2012, 'George Martin', 'The Beatles', 'Rock'),
(13, 1999, 'red hot chili peppers', 'red hot chili peppers', 'Rock');

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
