-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-11-2022 a las 21:04:48
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
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasena` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `contrasena`) VALUES
(1, 'danieldee', 'rodriguezss', 'rodriguncljad@gmail.com', 'dsgjriwj ip'),
(2, 'oscar', 'ramirez', 'ramir@gmail.com', 'albacete'),
(3, 'joan', 'canals', 'jcanals@gmail.com', '1234'),
(4, 'manuel', 'carrasco', 'mcarrasco22@gmail.com', '1234'),
(5, 'manuelito', 'carrascos', 'mcarrafffsco22@gmail.com', '1234'),
(6, 'paco', 'sanz', 'paquito@gmail.com', '1234'),
(7, 'martin', 'caceres', 'martincaceres@gmail.com', '123456'),
(8, 'jcnal23@gmail.com', 'caODPIPODSAA', 'FWWFV', '12344545'),
(9, 'samu', 'vdfod', 'dgggggrg', '1234'),
(10, 'rdddd', 'dddd', 'ddddd', '12344545'),
(11, 'joan', 'canalls', 'jcanals@gmail.com', '1234'),
(12, 'daniel', 'rodriguez', 'rrodriguez@gmail.com', '1234'),
(13, 'diego', 'fernandez', 'fernan@gmail.com', '1234'),
(14, 'jose', 'curtido', 'jcurtido@gmail.com', '1234'),
(15, 'joan', 'canals', 'jcanals@gmail.com', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
