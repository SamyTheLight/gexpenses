-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-11-2022 a las 20:50:34
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gexpenses`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activitat`
--

CREATE TABLE `activitat` (
  `id_activitat` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(150) NOT NULL,
  `Divisa` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `activitat`
--

INSERT INTO `activitat` (`id_activitat`, `Nombre`, `Descripcion`, `Divisa`) VALUES
(49, 'Jugar', 'a cartas', '$'),
(50, 'Jugar', 'a cartas', '$'),
(51, 'fgfg', 'fgfgf', '$'),
(52, 'fgfg', 'fgfgf', '$'),
(53, 'fgfg', 'fgfgf', '$'),
(54, 'fgfg', 'fgfgf', '$'),
(55, 'fgfg', 'fgfgf', '$');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitacio`
--

CREATE TABLE `invitacio` (
  `id_invitacio` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `invitacio`
--

INSERT INTO `invitacio` (`id_invitacio`, `Nombre`, `Descripcion`, `Email`) VALUES
(1, '', '', 'oscarferram@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `contrasena` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `apellidos`, `email`, `contrasena`) VALUES
('joan', 'canals', 'jcanals@gmail.com', '1234'),
('oscar', 'alonso', 'oalonso@gmail.com', '12345'),
('paco', 'lopez', 'pacolopez@gmail.com', '123'),
('marcos', 'alonso', 'malonso@gmail.com', '1234'),
('marcos', 'perez', 'mperez@gmail.com', '1234'),
('marcos', 'perez', 'mperez@gmail.com', '1234'),
('pepe', 'santosfg', 'fggfg', '123'),
('pep', 'guardiola', 'dddd', '123'),
('pepa', 'ffff', 'fff', '123'),
('maite', 'alonso', 'malonso@gmail.com', '1234'),
('pablo', 'eee', 'eee', '123'),
('fdf', 'dfdf', 'dfdf', '123'),
('abc', '1111', '1111', '123'),
('abc', '1111', '1111', '123'),
('abc', '1111', '1111', '123'),
('abc', '1111', '1111', '123'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('dfdf', 'dfdf', 'fdfd', '123'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', '', '', '12344545'),
('jcnal23@gmail.com', 'sdfsad', 'fasdfasdf', '12344545'),
('jcnal23@gmail.com', 'sdfsad', 'fasdfasdf', '12344545'),
('jcnal23@gmail.com', 'sdfsad', 'fasdfasdf', '12344545'),
('jcnal23@gmail.com', 'sdfsad', 'fasdfasdf', '12344545'),
('paco', '1234', '112', '123'),
('marcos', 'alonso', 'malonso@gmail.com', '1234'),
('marcos', 'alonso', 'malonso@gmail.com', '1234'),
('jcnal23@gmail.com', 'yyy', '', '12344545'),
('jcnal23@gmail.com', 'yyy', '', '12344545'),
('jcnal23@gmail.com', 'yyy', '', '12344545'),
('jcnal23@gmail.com', 'yyy', '', '12344545'),
('jcnal23@gmail.com', 'yyy', '', '12344545'),
('jcnal23@gmail.com', 'yyy', '', '12344545'),
('jcnal23@gmail.com', 'yyy', '', '12344545'),
('jcnal23@gmail.com', 'yyy', '', '12344545'),
('pablo', 'emilio', 'pemilio@gmail.com', '123'),
('pablo', 'emilio', 'pemilio@gmail.com', '123'),
('pablo', 'emilio', 'pemilio@gmail.com', '123'),
('pablo', 'emilio', 'pemilio@gmail.com', '123'),
('manolo', 'lama', 'manololama@gmail.com', '1234'),
('paco', 'dedo', 'pdedo@gmail.com', '1234'),
('paco', 'dedo', 'pdedo@gmail.com', '$2y$10$xa/rzSBAYZEfl'),
('martin', 'caceres', 'mcaceres@gmail.com', '$2y$10$zYKjjp2d.bWkc'),
('frenkie', 'de jong', 'fdejong@gmail.com', '$2y$10$QZYOs3oKTHUcS'),
('julio', 'iglesias', 'jiglesias@gmail.com', '$2y$10$fz7o9p54oAAlK'),
('marcos', 'perez', 'mperez@gmail.com', '$2y$10$J3DjY8cs37YKI'),
('emilio', 'lopez', 'elopez@gmail.com', '$2y$10$gNsHPLWvCVxI2'),
('miriam', 'perez', 'ddd', '$2y$10$xYGyluYy7373/'),
('manolito', 'garcia', 'mmdd', '$2y$10$Fvqd9omN/45iMQyOC3S/5ektXchBjlVIKda1eDSmiG0CDk59Fj2RK'),
('jordi', 'bosom', 'jbosom@gmail.com', '$2y$10$pVnxdNKmOgra0uL2MciX6eWdNJTeLNfaImRAH4m5TqJvX5rll3xlW'),
('noelia', 'perez', 'nperez@gmail.com', '$2y$10$g6/0Zf2yKY8Us6x.UHiOTOdnOcF7Et39A2qkJLoBmViIMA.lDpl2W'),
('ruben', 'bezos', 'ffff', '$2y$10$7KfHMYxNJEncEBKYiK3T7.UxCTtdWsS9dKdzVBSWEuOJOs6OdVByi'),
('josep', 'queralt', 'jqueralt@gmail.com', '$2y$10$LKAF6Y04Tsj988hkkstlMuotVzOn50y7rx6uzw74ocQh1KCDKcgPu'),
('frgtg', 'gbgb', 'gtth', '$2y$10$hBHNECMiZbJAvlR8n.gUiO/lUDwNZXRHoPmMmG4D8rfng.u7vVesC'),
('frgtg', 'gbgb', 'gtth', '$2y$10$vNrjaN8nUpENYU7.4AkjCO5FBivMQpp8d8l2XPzTTBRtgy47p51ZK'),
('pedro', 'lopez', 'plopez@gmail.com', '$2y$10$VzsRUP.DAV2tCsnQ3gtpYeJADUwe/TxAcloPN0d8e7g1Rx1Rxxj3C');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `apellidos`, `email`, `contrasena`) VALUES
('danieldee', 'rodriguezss', 'rodriguncljad@gmail.com', ''),
('joan', 'canals', 'jcanals@gmail.com', ''),
('manuel', 'carrasco', 'mcarrasco22@gmail.com', ''),
('manuelito', 'carrascos', 'mcarrafffsco22@gmail.com', ''),
('paco', 'sanz', 'paquito@gmail.com', ''),
('martin', 'caceres', 'martincaceres@gmail.com', ''),
('jcnal23@gmail.com', 'caODPIPODSAA', 'FWWFV', ''),
('samu', 'vdfod', 'dgggggrg', ''),
('rdddd', 'dddd', 'ddddd', ''),
('joan', 'canalls', 'jcanals@gmail.com', ''),
('daniel', 'rodriguez', 'rrodriguez@gmail.com', ''),
('diego', 'fernandez', 'fernan@gmail.com', ''),
('jose', 'curtido', 'jcurtido@gmail.com', ''),
('joan', 'canals', 'jcanals@gmail.com', ''),
('pp', 'pp', 'pp', ''),
('maria dolores', 'ortiz garcia', 'putaloli@gmail.com', ''),
('', '', '', ''),
('', '', '', ''),
('', '', '', ''),
('sheyla', 'jimenez', 'puton@gmail.com', ''),
('', '', '', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activitat`
--
ALTER TABLE `activitat`
  ADD PRIMARY KEY (`id_activitat`);

--
-- Indices de la tabla `invitacio`
--
ALTER TABLE `invitacio`
  ADD PRIMARY KEY (`id_invitacio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activitat`
--
ALTER TABLE `activitat`
  MODIFY `id_activitat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `invitacio`
--
ALTER TABLE `invitacio`
  MODIFY `id_invitacio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
