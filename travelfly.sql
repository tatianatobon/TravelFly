-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-04-2022 a las 06:47:43
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.13

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
  `id_genero` int(10) DEFAULT NULL,
  `pais` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `user` varchar(30) DEFAULT NULL,
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
(4, 'Alice', 'Matius Haunter', '1117451781', '3203124578', '2012-04-03', 1, 'Colombia', 'Nariño', 'Belen', 'calle 25 A 13', 'alice.sao@gmail.com', 'Alice123', '123456789', '123456789', NULL, 2),
(5, 'Alejandra', 'Salazar Martinez', '1117547895', '3182950355', '2003-10-01', 1, 'Colombia', 'Amazonas', 'Córdoba', 'calle 13 12-56', 'salazar.m@gmail.com', 'Salazar_Aleja', '12345678', '12345678', '', 2),
(6, 'Miguel Angel', 'Botero Cardenas', '1110774156', '3147895244', '2000-02-17', 1, 'Colombia', 'Guayas', 'Acacia', 'transversal 1ra #13-55', 'mm_angel@gmail.com', 'Migue_Angel', '98745612', '78945612', '', 2),
(8, 'Severus Thomas', 'Wallas Wayne', '1113754111', '3152950355', '1997-05-10', 1, 'Estados Unidos', 'Ohio', 'Marysville', 'avenida 33 #15A32', 'stww.13@gmail.com', 'snape', 'facil12345', 'facil12345', '', 2),
(9, 'Harry', 'percibal Nuñez', '1117895456', '3122145678', '1997-10-31', 1, 'Estados Unidos', 'Alabama', 'Vernon', 'carrera 1234', 'hhpercibal@gmail.com', 'harry1', 'potter123', 'potter123', '', 2),
(10, 'Lola Mento', 'Garcia Noreña', '1112475125', '3214569841', '2000-06-16', 2, 'Mónaco', 'Monaco', 'La Condamine', 'calle 1ra # 32-78', 'Ll.garcia@gmail.com', 'Garcia12', 'garcia12345', 'Lola Mento', '', 2),
(11, 'Ignacio ', 'Peña Alberdi', '1115789551', '3174567899', '2003-09-11', 1, 'Argentina', 'Buenos Aires', 'Arbolito', 'carrera 12 # 45G13', 'pena_A12@gmail.com', 'Peña_ign', 'ignacio12345', 'Peña Alberdi', '', 2),
(13, 'Walter Josep ', 'Costa Maza', '7855112266', '3225588411', '2001-06-14', 1, 'Brasil', 'Parana', 'Alto Piquiri', 'calle 1T12-6', 'walter123@gmail.com', 'walter_bra', 'bra123456', 'bra123456', '', 2),
(14, 'Angelly Sofia', 'Lozano Muñoz', '1110787455', '3203215447', '1999-02-10', 2, 'Alemania', 'Bayern', 'München', 'carrera 1Q # 45-55', 'angelly@gmail.com', 'ange1233', '123456789', '123456789', '', 2),
(15, 'Joshua Gabriel', 'Urbano Arias', '1110789410', '3211547852', '2003-12-31', 1, 'Colombia', 'Valle del Cauca', 'Cartago', 'carrera 1G # 35 a 13', 'joshua@gmail.com', 'joshua_guia', 'joshua123', 'joshua123', '', 2),
(16, 'Angela Estefanía', 'Jimenez Ordoñez', '1117851122', '3147852115', '2000-06-15', 2, 'Colombia', 'Narino', 'Pasto', 'calle 13 con 5ta ', 'angela.j@gmail.com', 'angela_jimenez', 'jimenez123', 'jimenez123', '', 2),
(18, 'Richard', 'Simpson Ramirez', '1117855411', '3217894455', '2000-02-24', 1, 'Estados Unidos', 'Illinois', 'Carlinville', 'avenida 1f #14-55', 'simpson@gmail.com', 'Rsimpson', '12345678', '12345678', '', 2),
(26, 'tarzan', 'Urbano Luna ', '1113552659', '3145857898', '2003-12-29', 1, 'Tailandia', 'Amnat Charoen', 'Amnat Charoen', 'carrera 1G # 35 a 13', 'tarzan@1013', 'rey', '123456789', '123456789', '', 3),
(27, 'Felipe', 'Rangel Palacios', '98358265', '3115226622', '2003-12-29', 1, 'Afganistán', 'Afghanistan', 'Baglan', 'carrera 1G # 35 a 13', 'fpalacios@gmail.com', 'felipe13', '12345678', '12345678', '', 3),
(31, 'Gohan', 'Torrez Lozano', '1112225548', '3214755112', '0000-00-00', NULL, 'Japón', 'Osaka', 'Daito', NULL, 'gohan@gmail.com', NULL, '12345678', NULL, NULL, 2),
(37, 'Luis Sebastian', 'Torrez Lozano', '1214454887', '1215121202', '2003-12-30', 1, 'Afganistán', 'Afghanistan', 'Baglan', 'carrera 1G # 35 a 13', 'ssgi@gmail.com', '11211', '112345678', '12345678', '', 3),
(38, 'Sebastian', 'Torrez Lozano', '1544871212', '3122154595', '0000-00-00', NULL, 'Afganistán', 'Afghanistan', 'Baglan', NULL, 'sluna@utp.edu.co', NULL, '12345678', NULL, NULL, 2),
(39, 'luis', 'suarez', '1445421212', '3351121212', '0000-00-00', NULL, 'Afganistán', 'Afghanistan', 'Baglan', NULL, 'ssuarez@gmail.com', NULL, '12345678', NULL, NULL, 2),
(40, 'juanito', 'perez arcila', '1114788552', '3202145875', '2003-12-30', 1, 'Afganistán', 'Afghanistan', 'Baglan', 'carrera 1G # 35 a 13', 'arci@gmail.com', '12345678', '12345678', '12345678', '', 3);

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
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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
