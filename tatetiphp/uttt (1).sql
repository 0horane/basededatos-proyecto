-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-09-2021 a las 16:58:33
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uttt`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `games`
--

CREATE TABLE `games` (
  `gameid` int(11) NOT NULL,
  `useridX` int(11) NOT NULL,
  `useridO` int(11) NOT NULL,
  `board` longtext NOT NULL,
  `turn` tinyint(1) NOT NULL,
  `result` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `games`
--

INSERT INTO `games` (`gameid`, `useridX`, `useridO`, `board`, `turn`, `result`) VALUES
(1, 5, 6, '1111,1101,0122,2211,1112', 1, 0),
(2, 5, 6, '1111,1101,0122,2211,1110', 1, 0),
(3, 5, 5, '0022,2201', 0, 0),
(4, 5, 5, '', 0, 0),
(5, 6, 5, '', 0, 0),
(6, 5, 7, '', 0, 0),
(7, 8, 5, '0101,0120,2002,0221,2122,2211,1100,0012,1210,1012,1200,0022,2220,2010,1002,0201,0121,2120,2022,2210,1010,1021,2112,1220,2012,1201,0111,1111,1110,1022,2212,1212,1221,2102,0211,1121,2121,2110,1000', 1, 0),
(8, 9, 8, '', 0, 0),
(9, 9, 0, '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '1234'),
(2, 'orane', 'salamin'),
(3, 'horane', '1234'),
(4, 'adminmd5', 'md5(1234)'),
(5, 'adminmd5_2.0', '81dc9bdb52d04dc20036dbd8313ed055'),
(6, 'j2', 'ce3730b948e9fb2145a7f1b387551979'),
(7, 'chinchulin', 'c01aa684bca52eb7834ee057a918ee33'),
(8, 'chinchulin2', '75e01ccf732581866c7c288155d6697a'),
(9, 'aa', 'b6d767d2f8ed5d21a44b0e5886680cb9');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`gameid`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `games`
--
ALTER TABLE `games`
  MODIFY `gameid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
