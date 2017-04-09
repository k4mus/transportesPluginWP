-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-04-2017 a las 08:06:54
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_wordpress`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wp_ciudad`
--

CREATE TABLE `wp_ciudad` (
  `ID_CIUDAD` int(3) NOT NULL DEFAULT '0',
  `NAME_CIUDAD` varchar(23) DEFAULT NULL,
  `id_Region` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `wp_ciudad`
--

INSERT INTO `wp_ciudad` (`ID_CIUDAD`, `NAME_CIUDAD`, `id_Region`) VALUES
(1, 'Arica', 15),
(2, 'Parinacota', 15),
(3, 'Iquique', 1),
(4, 'Tamarugal', 1),
(5, 'Antofagasta', 2),
(6, 'El Loa', 2),
(7, 'Tocopilla', 2),
(8, 'Copiapó', 3),
(9, 'Chañaral', 3),
(10, 'Huasco', 3),
(11, 'Elqui', 4),
(12, 'Choapa', 4),
(13, 'Limarí', 4),
(14, 'Valparaíso', 5),
(15, 'Isla de Pascua', 5),
(16, 'Los Andes', 5),
(17, 'Petorca', 5),
(18, 'Quillota', 5),
(19, 'San Antonio', 5),
(20, 'San Felipe de Aconcagua', 5),
(21, 'Marga Marga', 5),
(22, 'Cachapoal', 6),
(23, 'Cardenal Caro', 6),
(24, 'Colchagua', 6),
(25, 'Talca', 7),
(26, 'Cauquenes', 7),
(27, 'Curicó', 7),
(28, 'Linares', 7),
(29, 'Concepción', 8),
(30, 'Arauco', 8),
(31, 'Biobío', 8),
(32, 'Ñuble', 8),
(33, 'Cautín', 9),
(34, 'Malleco', 9),
(35, 'Valdivia', 14),
(36, 'Ranco', 14),
(37, 'Llanquihue', 10),
(38, 'Chiloé', 10),
(39, 'Osorno', 10),
(40, 'Palena', 10),
(41, 'Coihaique', 11),
(42, 'Aisén', 11),
(43, 'Capitán Prat', 11),
(44, 'General Carrera', 11),
(45, 'Magallanes', 12),
(46, 'Antártica Chilena', 12),
(47, 'Tierra del Fuego', 12),
(48, 'Última Esperanza', 12),
(49, 'Santiago', 13),
(50, 'Cordillera', 13),
(51, 'Chacabuco', 13),
(52, 'Maipo', 13),
(53, 'Melipilla', 13),
(54, 'Talagante', 13);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `wp_ciudad`
--
ALTER TABLE `wp_ciudad`
  ADD PRIMARY KEY (`ID_CIUDAD`),
  ADD KEY `PROVINCIA_REGION_ID` (`id_Region`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `wp_ciudad`
--
ALTER TABLE `wp_ciudad`
  ADD CONSTRAINT `wp_ciudad_ibfk_1` FOREIGN KEY (`id_Region`) REFERENCES `wp_region` (`ID_REGION`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
