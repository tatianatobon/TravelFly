-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2022 a las 17:43:08
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `travelfly`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id_genero` int(10) NOT NULL,
  `tipo_genero` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_genero`, `tipo_genero`) VALUES
(1, 'Hombre'),
(2, 'Mujer'),
(3, 'Sin especificar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(10) NOT NULL,
  `tipo_rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `tipo_rol`) VALUES
(1, 'root'),
(2, 'administrador'),
(3, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `documento` varchar(10) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `id_genero` int(10) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `confirmPass` varchar(30) DEFAULT NULL,
  `foto` longblob DEFAULT NULL,
  `id_rol` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `documento`, `celular`, `fechaNacimiento`, `id_genero`, `pais`, `estado`, `ciudad`, `direccion`, `email`, `user`, `pass`, `confirmPass`, `foto`, `id_rol`) VALUES
(1, 'Juan Esteban', 'Duque Posso', '1113456741', '3182950546', '2022-03-10', 1, 'Colombia', 'Valle del Cauca', 'Cartago', 'carrera 1G # 35 a 13', 'juanPosso@gmail.com', 'juan1', '123456', '123456', '', 3),
(2, 'Luis Sebastian', 'Urbano Luna ', '1112792007', '3145351793', '2022-03-01', 1, 'Colombia', 'Nariño', 'Belen', 'Carrera 1G # 35 A 13', 'sebastian.urbano1@utp.edu.co', 'Sebas1013', 'sebas1013', 'sebas1013', NULL, 1),
(3, 'Danna Sofia', 'Torrez Marin', '1112756778', '3203450546', '2022-03-01', 2, 'Colombia', 'Risaralda', 'Pereira', 'Carrera 10 # 21 13', 'danna_s@gmail.com', 'dannastar', 'danna12345', NULL, NULL, 2),
(4, 'Tatiana', 'Tobón Diaz', '1004678779', '3157235232', '2000-08-22', 2, '82', '1717', 'Pereira', 'calle 52 12 23', 'tatiana.tobon@utp.edu.co', 'tatianaT', '1234', '1234', '', 3),
(5, 'cristian', 'Ramirez', '1088023557', '2164389667', '1998-12-20', 1, '', 'Risaralda', 'Apía', 'calle 52 12 23', 'cristian.ramirez1@utp.edu.co', 'cristian1', '1234', '1234', '', 3),
(6, '          ', '          ', '1213323223', '3157235232', '2003-12-31', 1, '', 'Afghanistan', 'Baglan', 'ewee', 'cesar', '', 'Pereira-2022', 'Pereira-2022', '', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
