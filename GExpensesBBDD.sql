CREATE USER 'gexpensesuser'@'%' IDENTIFIED BY '1234';
GRANT CREATE,ALTER,INSERT,UPDATE,SELECT,DELETE,DROP,REFERENCES, RELOAD  ON * . * TO 'gexpensesuser'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;
DROP DATABASE IF EXISTS GExpensesBBDD;
CREATE DATABASE GExpensesBBDD;
USE GExpensesBBDD; 

--
-- Estructura de tabla para la tabla `activitat`
--
DROP TABLE IF EXISTS `activitat`;
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
(49, 'Jugar', 'a cartas', '$');

--
-- Estructura de tabla para la tabla `invitacio`
--
DROP TABLE IF EXISTS `invitacio`; 
CREATE TABLE `invitacio` (
  `id_invitacio` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Aceptado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `invitacio`
--

INSERT INTO `invitacio` (`id_invitacio`, `Nombre`, `Descripcion`, `Email`, `Aceptado`) VALUES
(1, '', '', 'oscarferram@gmail.com', 0),
(3, '', '', 'joancanals23@gmail.com', 0);

--
-- Estructura de tabla para la tabla `usuario`
--
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `contrasena` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--




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
  MODIFY `id_activitat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `invitacio`
--
ALTER TABLE `invitacio`
  MODIFY `id_invitacio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;