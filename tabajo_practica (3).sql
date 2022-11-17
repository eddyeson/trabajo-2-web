-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2022 a las 01:50:03
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tabajo practica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipos` int(11) NOT NULL,
  `equipo` varchar(30) NOT NULL,
  `nacionalidad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipos`, `equipo`, `nacionalidad`) VALUES
(1, 'navi', 'europa'),
(7, 'vitality', 'europa'),
(9, 'faze clan', 'estados unidos'),
(12, 'virtus pro', 'europa'),
(13, 'ninjas en pijamas', 'europa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugador`
--

CREATE TABLE `jugador` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `sensibilidad` float NOT NULL,
  `dpi` int(11) NOT NULL,
  `rango` varchar(30) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `jugador`
--

INSERT INTO `jugador` (`id`, `nombre`, `sensibilidad`, `dpi`, `rango`, `id_equipo`, `rol`) VALUES
(31, 'alejandro', 3.1, 0, 'ak-cruzada', 7, 'awp'),
(32, 'alejandro', 3.1, 800, 'ak-cruzada', 1, 'entry'),
(40, 'asdas', 0, 0, 'asdasd', 7, 'asdasd'),
(42, 'AAAAAAAAA', 0, 0, 'AAAAAAAAA', 9, 'sAAAAAAAAAA'),
(43, 'alejandro', 0, 0, 'sdasda', 9, 'sdasd'),
(44, 'Alejnadro Federico', 0, 0, 'asdasd', 7, 'sdasd'),
(45, 'Z', 3.8, 300, 'AAAAAAAAA', 9, 'sadasdasd'),
(46, 'ZA', 3.8, 300, 'AAAAAAAAA', 9, 'sadasdasd'),
(47, 'JAVIER', 3.8, 300, 'AAAAAAAAA', 9, 'sadasdasd'),
(51, '11', 3.8, 300, 'AAAAAAAAA', 7, 'sadasdasd'),
(52, '11', 3.8, 300, 'AAAAAAAAA', 7, 'sadasdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '$2a$12$JNJYzkWFZ4M21qLWFe7LmeC4H2.JNmkoiSnZA25kfC48PEy1XYj2m');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipos`);

--
-- Indices de la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id_equipos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `jugador`
--
ALTER TABLE `jugador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `jugador`
--
ALTER TABLE `jugador`
  ADD CONSTRAINT `jugador_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipos`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
