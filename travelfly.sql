-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-06-2022 a las 05:24:30
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

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

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `suma_vuelo_internacional` () RETURNS INT(10) NO SQL BEGIN 
DECLARE cantidad int;
SELECT COUNT(id_vuelo) INTO cantidad FROM vuelo INNER JOIN tipo_vuelo ON vuelo.id_tipo_vuelo = tipo_vuelo.id_tipo_vuelo WHERE tipo_vuelo.id_tipo_vuelo = '2' AND vuelo.estado = 'Activo' OR tipo_vuelo.id_tipo_vuelo = '3' AND vuelo.estado = 'Activo';
RETURN cantidad;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `suma_vuelo_internacional_realizado` () RETURNS INT(10) NO SQL BEGIN 
DECLARE cantidad int;
SELECT COUNT(id_vuelo) INTO cantidad FROM vuelo INNER JOIN tipo_vuelo ON vuelo.id_tipo_vuelo = tipo_vuelo.id_tipo_vuelo WHERE tipo_vuelo.id_tipo_vuelo = '2' AND vuelo.estado = 'Realizado' OR tipo_vuelo.id_tipo_vuelo = '3' AND vuelo.estado = 'Realizado';
RETURN cantidad;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `suma_vuelo_nacional` () RETURNS INT(10) NO SQL BEGIN 
DECLARE cantidad int;
SELECT COUNT(id_vuelo) INTO cantidad FROM vuelo INNER JOIN tipo_vuelo ON vuelo.id_tipo_vuelo = tipo_vuelo.id_tipo_vuelo WHERE tipo_vuelo.id_tipo_vuelo = '1' AND vuelo.estado = 'Activo';
RETURN cantidad;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `suma_vuelo_nacional_realizado` () RETURNS INT(10) NO SQL BEGIN 
DECLARE cantidad int;
SELECT COUNT(id_vuelo) INTO cantidad FROM vuelo INNER JOIN tipo_vuelo ON vuelo.id_tipo_vuelo = tipo_vuelo.id_tipo_vuelo WHERE tipo_vuelo.id_tipo_vuelo = '1' AND vuelo.estado = 'Realizado';
RETURN cantidad;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aerolineas`
--

CREATE TABLE `aerolineas` (
  `id_aerolinea` int(10) NOT NULL,
  `nombre_aerolinea` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aerolineas`
--

INSERT INTO `aerolineas` (`id_aerolinea`, `nombre_aerolinea`) VALUES
(1, 'Avianca Airlines'),
(2, 'Viva Air'),
(3, 'LATAM Airlines'),
(4, 'United Airlines'),
(5, 'American Airlines');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento`
--

CREATE TABLE `asiento` (
  `id_asiento` int(10) NOT NULL,
  `estado_asiento` enum('Libre','Ocupado','','') NOT NULL DEFAULT 'Libre',
  `numAsiento` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_compras`
--

CREATE TABLE `carrito_compras` (
  `id_carrito` int(10) NOT NULL,
  `id_tiquete` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `check-in`
--

CREATE TABLE `check-in` (
  `id_check_in` int(10) NOT NULL,
  `id_tiquete` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clase_viaje`
--

CREATE TABLE `clase_viaje` (
  `id_clase` int(10) NOT NULL,
  `tipo_clase` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clase_viaje`
--

INSERT INTO `clase_viaje` (`id_clase`, `tipo_clase`) VALUES
(1, 'Primera Clase'),
(2, 'Clase Turista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(10) NOT NULL,
  `numTarjeta` varchar(16) NOT NULL,
  `id_carrito` int(10) NOT NULL,
  `fecha_pago` datetime NOT NULL,
  `total_pago` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `id_ciudad_destino` int(10) NOT NULL,
  `ciudad_destino` varchar(30) NOT NULL,
  `tiempo_dif_ida` int(10) NOT NULL,
  `tiempo_dif_regreso` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `destino`
--

INSERT INTO `destino` (`id_ciudad_destino`, `ciudad_destino`, `tiempo_dif_ida`, `tiempo_dif_regreso`) VALUES
(1, 'Madrid', 7, -7),
(2, 'Londres', 6, -6),
(3, 'New York', 1, -1),
(4, 'Buenos Aires', 2, -2),
(5, 'Miami', 1, -1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino_nacional`
--

CREATE TABLE `destino_nacional` (
  `id_nacional_destino` int(10) NOT NULL,
  `ciudad_destino` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `destino_nacional`
--

INSERT INTO `destino_nacional` (`id_nacional_destino`, `ciudad_destino`) VALUES
(1, 'Leticia'),
(2, 'Medellín'),
(3, 'Arauca'),
(4, 'Barranquilla'),
(5, 'Bogotá'),
(6, 'Cartagena de Indias'),
(7, 'Tunja'),
(8, 'Manizales'),
(9, 'Florencia'),
(10, 'Yopal'),
(11, 'Popayán'),
(12, 'Valledupar'),
(13, 'Quibdó'),
(14, 'Montería'),
(15, 'Inírida'),
(16, 'San José del Guaviare'),
(17, 'Neiva'),
(18, 'Riohacha'),
(19, 'Santa Marta'),
(20, 'Villavicencio'),
(21, 'Pasto'),
(22, 'San José de Cúcuta'),
(23, 'Mocoa'),
(24, 'Armenia'),
(25, 'Pereira'),
(26, 'San Andrés'),
(27, 'Bucaramanga'),
(28, 'Sincelejo'),
(29, 'Ibagué'),
(30, 'Cali'),
(31, 'Mitú'),
(32, 'Puerto Carreño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foro`
--

CREATE TABLE `foro` (
  `id_mensaje` int(10) NOT NULL,
  `user` varchar(30) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `respuestaAdministrador` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `foro`
--

INSERT INTO `foro` (`id_mensaje`, `user`, `mensaje`, `respuestaAdministrador`) VALUES
(3, '0', 'Cuales son los tipos de vuelos?', 'Primera Clase y Clase Economica'),
(4, '0', 'Que destinos internacionales tienen?', 'gran variedad entre los que estan new york y miami'),
(12, 'juan12', 'hola', 'hola'),
(13, 'juan12', 'Cuales son los tipos de vuelos?', 'varios');

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
-- Estructura de tabla para la tabla `num_tiquetes`
--

CREATE TABLE `num_tiquetes` (
  `id_num_personas` int(10) NOT NULL,
  `cantidad_personas` int(10) NOT NULL,
  `tipo_personas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `num_tiquetes`
--

INSERT INTO `num_tiquetes` (`id_num_personas`, `cantidad_personas`, `tipo_personas`) VALUES
(10, 1, '1 Adulto'),
(11, 2, '2 Adultos'),
(12, 3, '3 Adultos'),
(13, 4, '4 Adultos'),
(14, 5, '5 Adultos'),
(15, 2, '1 Niño y 1 Adulto'),
(16, 3, '1 Niño y 2 Adultos'),
(17, 4, '2 Niños y 2 Adultos'),
(18, 5, '3 niños y 2 Adultos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `origen`
--

CREATE TABLE `origen` (
  `id_ciudad_origen` int(10) NOT NULL,
  `ciudad_origen` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `origen`
--

INSERT INTO `origen` (`id_ciudad_origen`, `ciudad_origen`) VALUES
(1, 'Pereira'),
(2, 'Bogotá'),
(3, 'Medellin'),
(4, 'Cali'),
(5, 'Cartagena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `origen_nacional`
--

CREATE TABLE `origen_nacional` (
  `id_nacional_origen` int(10) NOT NULL,
  `ciudad_origen` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `origen_nacional`
--

INSERT INTO `origen_nacional` (`id_nacional_origen`, `ciudad_origen`) VALUES
(1, 'Leticia'),
(2, 'Medellín'),
(3, 'Arauca'),
(4, 'Barranquilla'),
(5, 'Bogotá'),
(6, 'Cartagena de Indias'),
(7, 'Tunja'),
(8, 'Manizales'),
(9, 'Florencia'),
(10, 'Yopal'),
(11, 'Popayán'),
(12, 'Valledupar'),
(13, 'Quibdó'),
(14, 'Montería'),
(15, 'Inírida'),
(16, 'San José del Guaviare'),
(17, 'Neiva'),
(18, 'Riohacha'),
(19, 'Santa Marta'),
(20, 'Villavicencio'),
(21, 'Pasto'),
(22, 'San José de Cúcuta'),
(23, 'Mocoa'),
(24, 'Armenia'),
(25, 'Pereira'),
(26, 'San Andrés'),
(27, 'Bucaramanga'),
(28, 'Sincelejo'),
(29, 'Ibagué'),
(30, 'Cali'),
(31, 'Mitú'),
(32, 'Puerto Carreño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(10) NOT NULL,
  `id_tiquete` int(10) NOT NULL,
  `fecha_reserva` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Estructura de tabla para la tabla `tarjeta`
--

CREATE TABLE `tarjeta` (
  `id_tipo_tarjeta` int(11) NOT NULL,
  `numTarjeta` varchar(16) NOT NULL,
  `nombre_propietario` varchar(30) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `saldo_actual` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarjeta`
--

INSERT INTO `tarjeta` (`id_tipo_tarjeta`, `numTarjeta`, `nombre_propietario`, `fecha_vencimiento`, `cvv`, `saldo_actual`, `id_usuario`) VALUES
(1, '4004542121177524', 'Juan Esteban Duque Posso', '2026-05-20', '755', 70000000, 44),
(1, '4004542121178512', 'Tarzar rey de la selva', '2025-05-14', '789', 70000000, 26),
(2, '4005488444512121', 'Tarzan rey', '2024-06-16', '013', 70000000, 26);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiempo_vuelo`
--

CREATE TABLE `tiempo_vuelo` (
  `id_cant_horas` int(10) NOT NULL,
  `cantidad_horas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiempo_vuelo`
--

INSERT INTO `tiempo_vuelo` (`id_cant_horas`, `cantidad_horas`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_tarjeta`
--

CREATE TABLE `tipo_tarjeta` (
  `id_tipo_tarjeta` int(11) NOT NULL,
  `tipo_tarjeta` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_tarjeta`
--

INSERT INTO `tipo_tarjeta` (`id_tipo_tarjeta`, `tipo_tarjeta`) VALUES
(1, 'Tarjeta de Credito'),
(2, 'Tarjeta de Debito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_vuelo`
--

CREATE TABLE `tipo_vuelo` (
  `id_tipo_vuelo` int(10) NOT NULL,
  `tipo_vuelo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_vuelo`
--

INSERT INTO `tipo_vuelo` (`id_tipo_vuelo`, `tipo_vuelo`) VALUES
(1, 'Vuelo Nacional'),
(2, 'Vuelo Internacional Ida'),
(3, 'Vuelo Internacional Regreso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiquete`
--

CREATE TABLE `tiquete` (
  `id_tiquete` int(10) NOT NULL,
  `id_clase` int(10) NOT NULL,
  `id_usuario` int(10) NOT NULL,
  `id_viajero` int(10) NOT NULL,
  `id_asiento` int(10) NOT NULL,
  `id_vuelo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `fechaNacimiento` date DEFAULT NULL,
  `id_genero` int(10) DEFAULT NULL,
  `pais` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `direccion` varchar(30) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `user` varchar(30) DEFAULT NULL,
  `pass` varchar(30) NOT NULL,
  `confirmPass` varchar(30) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL,
  `id_rol` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `documento`, `celular`, `fechaNacimiento`, `id_genero`, `pais`, `estado`, `ciudad`, `direccion`, `email`, `user`, `pass`, `confirmPass`, `foto`, `id_rol`) VALUES
(2, 'Luis Sebastian', 'Urbano Luna ', '1112792007', '3145351793', '2022-03-01', 1, 'Colombia', 'Nariño', 'Belen', 'Carrera 1G # 35 A 13', 'sebastian.urbano1@utp.edu.co', 'Sebas1013', 'sebas1013', 'sebas1013', NULL, 1),
(3, 'Danna Sofia', 'Torrez Marin', '1112756778', '3203450546', '2004-01-01', 2, 'Colombia', 'Risaralda', 'Pereira', 'Carrera 10 # 21 13', 'danna_s@gmail.com', 'dannastar', 'danna12345', '', '', 2),
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
(40, 'juanito', 'perez arcila', '1114788552', '3202145875', '2003-12-30', 1, 'Afganistán', 'Afghanistan', 'Baglan', 'carrera 1G # 35 a 13', 'arci@gmail.com', '12345678', '12345678', '12345678', '', 3),
(41, 'Olivia', 'Rodrigo de Luna', '1124478551', '3214578855', '2000-02-10', 2, 'Estados Unidos', 'New York', 'New York', 'carrera 1A # 3 a 10', 'oli_rodrigo@gamil.com', 'Olivia_R', 'olivia123', 'olivia123', '', 2),
(44, 'Juan Esteban', 'Duque Posso', '1101554874', '3214785221', '2003-12-31', 1, 'Afganistán', 'Afghanistan', 'Baglan', 'carrera 1G # 35 a 13', 'juanPosso@gmail.com', 'juan12', 'juan12345', 'juan12345', '', 3),
(45, 'ana angel', 'ruiz toro', '1117885556', '3203451414', NULL, 2, 'Colombia', 'Amazonas', 'Abisinia', NULL, 'angel_@gmail.com', NULL, '1117885556', NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajero`
--

CREATE TABLE `viajero` (
  `id_viajero` int(10) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `documento` varchar(10) NOT NULL,
  `id_genero` int(10) NOT NULL,
  `telefono` int(10) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo`
--

CREATE TABLE `vuelo` (
  `id_vuelo` int(10) NOT NULL,
  `id_aerolinea` int(10) NOT NULL,
  `codVuelo` varchar(5) NOT NULL,
  `id_tipo_vuelo` int(10) NOT NULL,
  `fecha_hora_salida` datetime NOT NULL,
  `id_nacional_origen` int(10) DEFAULT NULL,
  `id_nacional_destino` int(10) DEFAULT NULL,
  `id_ciudad_origen` int(10) DEFAULT NULL,
  `id_ciudad_destino` int(10) DEFAULT NULL,
  `costo_vuelo` int(10) NOT NULL,
  `foto_vuelo` varchar(50) DEFAULT NULL,
  `estado` enum('Activo','Completo','Realizado','Cancelado') NOT NULL DEFAULT 'Activo',
  `id_cant_horas` int(10) NOT NULL,
  `cant_sillas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vuelo`
--

INSERT INTO `vuelo` (`id_vuelo`, `id_aerolinea`, `codVuelo`, `id_tipo_vuelo`, `fecha_hora_salida`, `id_nacional_origen`, `id_nacional_destino`, `id_ciudad_origen`, `id_ciudad_destino`, `costo_vuelo`, `foto_vuelo`, `estado`, `id_cant_horas`, `cant_sillas`) VALUES
(52, 3, 'FG447', 1, '2022-07-26 15:45:00', 3, 5, NULL, NULL, 250000, 'bogota.jpeg', 'Activo', 4, 150),
(53, 5, 'SL103', 2, '2022-07-26 08:47:00', NULL, NULL, 4, 3, 1500000, 'new_york.jpg', 'Activo', 7, 250),
(54, 4, 'C10P5', 3, '2022-08-18 22:47:00', NULL, NULL, 1, 5, 1300000, 'pereira.webp', 'Activo', 9, 250),
(55, 2, 'SD788', 1, '2022-05-17 23:16:00', 2, 1, NULL, NULL, 152000, '', 'Realizado', 1, 150),
(56, 3, 'Pe455', 1, '2022-05-21 23:30:00', 3, 25, NULL, NULL, 145000, 'pere.webp', 'Realizado', 3, 150),
(57, 2, 'KK785', 1, '2022-05-28 23:26:00', 1, 6, NULL, NULL, 180000, '', 'Cancelado', 3, 150),
(59, 5, 'ED145', 2, '2022-05-20 23:34:00', NULL, NULL, 1, 5, 460000, 'miami.jpg', 'Realizado', 5, 250),
(60, 4, 'YU345', 2, '2022-05-17 23:39:00', NULL, NULL, 2, 1, 452000, '', 'Realizado', 1, 250),
(61, 4, 'SS234', 2, '2022-05-28 23:38:00', NULL, NULL, 1, 4, 458000, '', 'Cancelado', 4, 250),
(62, 4, 'SQ754', 3, '2022-05-17 23:49:00', NULL, NULL, 2, 3, 1500000, '', 'Realizado', 1, 250),
(63, 1, 'ME789', 3, '2022-05-21 23:50:00', NULL, NULL, 3, 1, 980000, 'Medellín.jpg', 'Realizado', 1, 250),
(64, 2, '78FGT', 1, '2022-05-21 23:44:00', 2, 6, NULL, NULL, 78000, '', 'Cancelado', 3, 150),
(65, 5, '45TDF', 3, '2022-05-21 23:49:00', NULL, NULL, 1, 1, 780000, '', 'Realizado', 4, 250);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vuelo_cantpersonas`
--

CREATE TABLE `vuelo_cantpersonas` (
  `id_vuelo_cantpersonas` int(10) NOT NULL,
  `id_vuelo` int(10) NOT NULL,
  `id_num_personas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aerolineas`
--
ALTER TABLE `aerolineas`
  ADD PRIMARY KEY (`id_aerolinea`);

--
-- Indices de la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD PRIMARY KEY (`id_asiento`);

--
-- Indices de la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_tiquete` (`id_tiquete`);

--
-- Indices de la tabla `check-in`
--
ALTER TABLE `check-in`
  ADD PRIMARY KEY (`id_check_in`),
  ADD KEY `id_tiquete` (`id_tiquete`);

--
-- Indices de la tabla `clase_viaje`
--
ALTER TABLE `clase_viaje`
  ADD PRIMARY KEY (`id_clase`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `numTarjeta` (`numTarjeta`),
  ADD KEY `id_carrito` (`id_carrito`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`id_ciudad_destino`);

--
-- Indices de la tabla `destino_nacional`
--
ALTER TABLE `destino_nacional`
  ADD PRIMARY KEY (`id_nacional_destino`);

--
-- Indices de la tabla `foro`
--
ALTER TABLE `foro`
  ADD PRIMARY KEY (`id_mensaje`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id_genero`);

--
-- Indices de la tabla `num_tiquetes`
--
ALTER TABLE `num_tiquetes`
  ADD PRIMARY KEY (`id_num_personas`);

--
-- Indices de la tabla `origen`
--
ALTER TABLE `origen`
  ADD PRIMARY KEY (`id_ciudad_origen`);

--
-- Indices de la tabla `origen_nacional`
--
ALTER TABLE `origen_nacional`
  ADD PRIMARY KEY (`id_nacional_origen`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id_reserva`),
  ADD KEY `id_tiquete` (`id_tiquete`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD PRIMARY KEY (`numTarjeta`),
  ADD KEY `id_tipo_tarjeta` (`id_tipo_tarjeta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tiempo_vuelo`
--
ALTER TABLE `tiempo_vuelo`
  ADD PRIMARY KEY (`id_cant_horas`);

--
-- Indices de la tabla `tipo_tarjeta`
--
ALTER TABLE `tipo_tarjeta`
  ADD PRIMARY KEY (`id_tipo_tarjeta`);

--
-- Indices de la tabla `tipo_vuelo`
--
ALTER TABLE `tipo_vuelo`
  ADD PRIMARY KEY (`id_tipo_vuelo`);

--
-- Indices de la tabla `tiquete`
--
ALTER TABLE `tiquete`
  ADD PRIMARY KEY (`id_tiquete`),
  ADD KEY `id_clase` (`id_clase`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_viajero` (`id_viajero`),
  ADD KEY `id_silla` (`id_asiento`),
  ADD KEY `id_vuelo` (`id_vuelo`),
  ADD KEY `id_asiento` (`id_asiento`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_rol` (`id_rol`);

--
-- Indices de la tabla `viajero`
--
ALTER TABLE `viajero`
  ADD PRIMARY KEY (`id_viajero`),
  ADD KEY `id_genero` (`id_genero`);

--
-- Indices de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD PRIMARY KEY (`id_vuelo`),
  ADD KEY `id_tipo_vuelo` (`id_tipo_vuelo`),
  ADD KEY `id_nacional_origen` (`id_nacional_origen`),
  ADD KEY `id_nacional_destino` (`id_nacional_destino`),
  ADD KEY `id_ciudad_origen` (`id_ciudad_origen`),
  ADD KEY `id_ciudad_destino` (`id_ciudad_destino`),
  ADD KEY `id_estado` (`estado`),
  ADD KEY `id_cant_horas` (`id_cant_horas`),
  ADD KEY `id_aerolinea` (`id_aerolinea`);

--
-- Indices de la tabla `vuelo_cantpersonas`
--
ALTER TABLE `vuelo_cantpersonas`
  ADD PRIMARY KEY (`id_vuelo_cantpersonas`),
  ADD KEY `id_vuelo` (`id_vuelo`),
  ADD KEY `id_num_personas` (`id_num_personas`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aerolineas`
--
ALTER TABLE `aerolineas`
  MODIFY `id_aerolinea` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `asiento`
--
ALTER TABLE `asiento`
  MODIFY `id_asiento` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  MODIFY `id_carrito` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `check-in`
--
ALTER TABLE `check-in`
  MODIFY `id_check_in` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clase_viaje`
--
ALTER TABLE `clase_viaje`
  MODIFY `id_clase` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `id_compra` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `id_ciudad_destino` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `destino_nacional`
--
ALTER TABLE `destino_nacional`
  MODIFY `id_nacional_destino` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `foro`
--
ALTER TABLE `foro`
  MODIFY `id_mensaje` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id_genero` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `num_tiquetes`
--
ALTER TABLE `num_tiquetes`
  MODIFY `id_num_personas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `origen`
--
ALTER TABLE `origen`
  MODIFY `id_ciudad_origen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `origen_nacional`
--
ALTER TABLE `origen_nacional`
  MODIFY `id_nacional_origen` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tiempo_vuelo`
--
ALTER TABLE `tiempo_vuelo`
  MODIFY `id_cant_horas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `tipo_tarjeta`
--
ALTER TABLE `tipo_tarjeta`
  MODIFY `id_tipo_tarjeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipo_vuelo`
--
ALTER TABLE `tipo_vuelo`
  MODIFY `id_tipo_vuelo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tiquete`
--
ALTER TABLE `tiquete`
  MODIFY `id_tiquete` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `viajero`
--
ALTER TABLE `viajero`
  MODIFY `id_viajero` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vuelo`
--
ALTER TABLE `vuelo`
  MODIFY `id_vuelo` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de la tabla `vuelo_cantpersonas`
--
ALTER TABLE `vuelo_cantpersonas`
  MODIFY `id_vuelo_cantpersonas` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito_compras`
--
ALTER TABLE `carrito_compras`
  ADD CONSTRAINT `carrito_compras_ibfk_1` FOREIGN KEY (`id_tiquete`) REFERENCES `tiquete` (`id_tiquete`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `check-in`
--
ALTER TABLE `check-in`
  ADD CONSTRAINT `check-in_ibfk_1` FOREIGN KEY (`id_tiquete`) REFERENCES `tiquete` (`id_tiquete`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_carrito`) REFERENCES `carrito_compras` (`id_carrito`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`numTarjeta`) REFERENCES `tarjeta` (`numTarjeta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`id_tiquete`) REFERENCES `tiquete` (`id_tiquete`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarjeta`
--
ALTER TABLE `tarjeta`
  ADD CONSTRAINT `tarjeta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tarjeta_ibfk_2` FOREIGN KEY (`id_tipo_tarjeta`) REFERENCES `tipo_tarjeta` (`id_tipo_tarjeta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tiquete`
--
ALTER TABLE `tiquete`
  ADD CONSTRAINT `tiquete_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clase_viaje` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiquete_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiquete_ibfk_3` FOREIGN KEY (`id_vuelo`) REFERENCES `vuelo` (`id_vuelo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiquete_ibfk_4` FOREIGN KEY (`id_viajero`) REFERENCES `viajero` (`id_viajero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tiquete_ibfk_5` FOREIGN KEY (`id_asiento`) REFERENCES `asiento` (`id_asiento`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `viajero`
--
ALTER TABLE `viajero`
  ADD CONSTRAINT `viajero_ibfk_1` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id_genero`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vuelo`
--
ALTER TABLE `vuelo`
  ADD CONSTRAINT `vuelo_ibfk_1` FOREIGN KEY (`id_tipo_vuelo`) REFERENCES `tipo_vuelo` (`id_tipo_vuelo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vuelo_ibfk_2` FOREIGN KEY (`id_nacional_origen`) REFERENCES `origen_nacional` (`id_nacional_origen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vuelo_ibfk_3` FOREIGN KEY (`id_nacional_destino`) REFERENCES `destino_nacional` (`id_nacional_destino`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vuelo_ibfk_4` FOREIGN KEY (`id_ciudad_origen`) REFERENCES `origen` (`id_ciudad_origen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vuelo_ibfk_5` FOREIGN KEY (`id_ciudad_destino`) REFERENCES `destino` (`id_ciudad_destino`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vuelo_ibfk_8` FOREIGN KEY (`id_cant_horas`) REFERENCES `tiempo_vuelo` (`id_cant_horas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vuelo_ibfk_9` FOREIGN KEY (`id_aerolinea`) REFERENCES `aerolineas` (`id_aerolinea`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vuelo_cantpersonas`
--
ALTER TABLE `vuelo_cantpersonas`
  ADD CONSTRAINT `vuelo_cantpersonas_ibfk_1` FOREIGN KEY (`id_vuelo`) REFERENCES `vuelo` (`id_vuelo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vuelo_cantpersonas_ibfk_2` FOREIGN KEY (`id_num_personas`) REFERENCES `num_tiquetes` (`id_num_personas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
