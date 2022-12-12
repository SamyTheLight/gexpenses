CREATE USER 'gexpensesuser'@'%' IDENTIFIED BY '1234';
GRANT ALL PRIVILEGES REFERENCES, RELOAD ON * . * TO 'gexpensesuser'@'%' WITH GRANT OPTION;
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
(49, 'Jugar', 'a cartas', '$'),
(50, 'Jugar', 'a cartas', '$'),
(51, 'fgfg', 'fgfgf', '$'),
(52, 'fgfg', 'fgfgf', '$'),
(53, 'fgfg', 'fgfgf', '$'),
(54, 'fgfg', 'fgfgf', '$'),
(55, 'fgfg', 'fgfgf', '$'),
(56, 'Realizar sprint 3', 'Hacer mochila , vagrant, diseños de páginas ', '$'),
(57, 'Ver partidos del mundial', 'Juega españa versus Alemania donde la roja viene de ganar 7-0 a la costa rica de keylor navas', '€');

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
('pedro', 'lopez', 'plopez@gmail.com', '$2y$10$VzsRUP.DAV2tCsnQ3gtpYeJADUwe/TxAcloPN0d8e7g1Rx1Rxxj3C'),
('joan', 'canals', 'jco98web@gmail.com', '$2y$10$iAkzqTsjGTqENmKxXnurc.68e5mS4gGcRy/sEoSQL9ByPdD2akw5q'),
('pepito1', 'dffdf', 'dfdfdf', '$2y$10$1XHf5Xzem6nynn3fHzr0..KaFy/ezxVh9CjyuMnDsMT22DdZz4riO'),
('joancanals23', 'scadfsdf', 'joancanals23@gmail.com', '$2y$10$Fz70YDb3mWWyaAzP5Nio6.vTdP81fSaq19N6a/kkwVHT1Ds6vwZv6'),
('jcnal23@gmail.com', '', '', '$2y$10$m2XoRFxnKqHM.Kwn7n43lea9MGkPaH.R5nvZHssYJ1t4SuKvfb77i'),
('alfonso', 'rodriguez', 'jco98@gmail.com', '$2y$10$5xFo6UXuo2Hwk/W6IRG2GO012aT3fRRcyz9bjSoQ5J2NDxg7YEPJ.'),
('joan11', 'canals', 'jco98web@gmail.com', '$2y$10$R/.hofpBA.lDytTzjYb6LOyTQ7NcoUVsFEro/zw.qoVrO4fm.De0a'),
('jcnal23@gmail.com', '', '', '$2y$10$Cw9AiE1ga7ZKrUNgafVzhuwEeAy/tMJ2x/W6O0OdnfrOi2SWtRRFK');

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