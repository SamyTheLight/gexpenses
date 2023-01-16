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
  `Divisa` char(1) NOT NULL,
<<<<<<< Updated upstream
  `Fecha` TIMESTAMP ,
  `usuario_id` INT(11) 
=======
  `Fecha` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `usuario_id` INT(11) NOT NULL AUTO_INCREMENT 
>>>>>>> Stashed changes
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `activitat`
--

INSERT INTO `activitat` (`id_activitat`, `Nombre`, `Descripcion`, `Divisa`,`Fecha`) VALUES
(1, 'Jugar', 'a cartas', '$', current_timestamp());

--
-- Estructura de tabla para la tabla `invitacio`
--
DROP TABLE IF EXISTS `invitacio`; 
CREATE TABLE `invitacio` (
  `id_invitacio` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
<<<<<<< Updated upstream
  `usuario_id` int(11) 
=======
  `usuario_id` int(11) NOT NULL
>>>>>>> Stashed changes
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `invitacio`
--
/*
INSERT INTO `invitacio` (`id_invitacio`, `Nombre`, `Descripcion`, `Email`) VALUES
(1, '', '', 'oscarferram@gmail.com'),
(3, '', '', 'joancanals23@gmail.com');
*/
--
-- Estructura de tabla para la tabla `usuario`
--
DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL ,
  `nombre` varchar(30) NOT NULL,
  `email` varchar(120) NOT NULL,
  `contrasena` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



ALTER TABLE `activitat`
  ADD PRIMARY KEY (`id_activitat`);

  ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

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
  MODIFY `id_activitat` int(11) NOT NULL AUTO_INCREMENT;



ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL  AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `invitacio`
--
ALTER TABLE `invitacio`
<<<<<<< Updated upstream
  MODIFY `id_invitacio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
<<<<<<< Updated upstream
=======
  MODIFY `id_invitacio` int(11) NOT NULL AUTO_INCREMENT;
>>>>>>> Stashed changes

ALTER TABLE `activitat`
  ADD `TipusAct` varchar(20) NOT NULL;
=======
COMMIT;
>>>>>>> Stashed changes

--
-- FOREIGN KEY de la tabla `invitacio`
--
ALTER TABLE `invitacio`
  ADD CONSTRAINT fk_invitacio_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario);

  --
  -- FOREIGN KEY de la tabla `activitat_usuario`
  --

<<<<<<< Updated upstream
ALTER TABLE `activitat`
   ADD CONSTRAINT fk_activitat_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario);

=======
ALTER TABLE 'activitat' 
  ADD ADD CONTRAINT fk_activitat_usuario FOREIGN KEY (usuario_id) REFERENCES usuario (id_usuario);
>>>>>>> Stashed changes
