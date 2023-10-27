-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2023 a las 04:39:32
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdworkshoptenorio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int(9) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nombre_usuario` varchar(100) NOT NULL,
  `contrasena` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `nombre`, `email`, `nombre_usuario`, `contrasena`) VALUES
(1, 'aric', 'aric@gmail.com', 'arictenorio', ''),
(2, 'a', 'a@gmail.com', 'a', ''),
(3, 'a', 'a', 'a', ''),
(4, 'b', 'b', 'b', ''),
(5, 'd', 'd', 'd', '123d'),
(6, 'd', 'd', 'd', '123d'),
(7, 'Juan', 'juan@gmail.com', 'Juan Perez', '123juan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taller`
--

CREATE TABLE `taller` (
  `num_taller` int(50) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `cant_tecnicos` int(50) NOT NULL,
  `tamano_mts` decimal(50,2) NOT NULL,
  `num_oficinas` int(50) NOT NULL,
  `cant_maquinas` int(50) NOT NULL,
  `contacto` varchar(50) NOT NULL,
  `cod_postal` int(11) NOT NULL,
  `login_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `taller`
--

INSERT INTO `taller` (`num_taller`, `ubicacion`, `cant_tecnicos`, `tamano_mts`, `num_oficinas`, `cant_maquinas`, `contacto`, `cod_postal`, `login_id`) VALUES
(2, 'Aztecas #1245', 4, '50.00', 6, 8, '6564342632', 5463, 4),
(8, 'a', 1, '1.00', 1, 1, 'a', 1, 7);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `taller`
--
ALTER TABLE `taller`
  ADD PRIMARY KEY (`num_taller`),
  ADD KEY `FK_products_1` (`login_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `taller`
--
ALTER TABLE `taller`
  MODIFY `num_taller` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `taller`
--
ALTER TABLE `taller`
  ADD CONSTRAINT `FK_products_1` FOREIGN KEY (`login_id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
