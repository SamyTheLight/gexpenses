SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- User gexpensesbbdd
-- -----------------------------------------------------

CREATE USER 'gexpensesuser'@'%' IDENTIFIED BY '1234';
GRANT CREATE,ALTER,INSERT,UPDATE,SELECT,DELETE,DROP,REFERENCES, RELOAD  ON * . * TO 'gexpensesuser'@'%' WITH GRANT OPTION;
FLUSH PRIVILEGES;

-- -----------------------------------------------------
-- Schema gexpensesbbdd
-- -----------------------------------------------------

DROP DATABASE IF EXISTS GExpensesBBDD;
CREATE DATABASE GExpensesBBDD;
USE GExpensesBBDD; 

-- -----------------------------------------------------
-- Table `usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `usuario` ;

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(16) NOT NULL,
  `contrasena` VARCHAR(60) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `sesion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `sesion`;

CREATE TABLE if NOT EXISTS `sesion` (
    id_sesion INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id_usuario INT NOT NULL,
    fecha_inicio TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    fecha_fin TIMESTAMP NULL,
    token CHAR(32) NOT NULL,
    FOREIGN KEY (usuario_id_usuario) REFERENCES `usuario`(id_usuario)
);

-- -----------------------------------------------------
-- Table `actividad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `actividad` ;

CREATE TABLE IF NOT EXISTS `actividad` (
  `id_actividad` INT NOT NULL AUTO_INCREMENT,
  `usuario_id_usuario` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  `divisa` CHAR(1) NOT NULL,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_actividad` VARCHAR(45) NULL DEFAULT NULL,
  `fecha_ultima_modificacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_actividad`),
  CONSTRAINT `fk_actividad_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `gasto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gasto` ;

CREATE TABLE IF NOT EXISTS `gasto` (
  `id_gasto` INT NOT NULL AUTO_INCREMENT,
  `actividad_id_actividad` INT NOT NULL,
  `concepto` VARCHAR(200) NULL DEFAULT NULL,
  `pagador` VARCHAR(45) NULL DEFAULT NULL,
  `cantidad` DECIMAL(6,2) NULL DEFAULT NULL,
  `fecha` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_gasto`),
  CONSTRAINT `fk_gasto_actividad1`
    FOREIGN KEY (`actividad_id_actividad`)
    REFERENCES `actividad` (`id_actividad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `invitacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `invitacion` ;

CREATE TABLE IF NOT EXISTS `invitacion` (
  `usuario_id_usuario` INT NOT NULL,
  `actividad_id_actividad` INT NOT NULL,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `descripcion` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `token` CHAR(32) NOT NULL,
  PRIMARY KEY (`usuario_id_usuario`, `actividad_id_actividad`),
  CONSTRAINT `fk_usuario_has_actividad_actividad1`
    FOREIGN KEY (`actividad_id_actividad`)
    REFERENCES `actividad` (`id_actividad`),
  CONSTRAINT `fk_usuario_has_actividad_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `usuario` (`id_usuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `reparto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reparto` ;

CREATE TABLE IF NOT EXISTS `reparto` (
  `id_reparto` INT NOT NULL AUTO_INCREMENT,
  `gasto_id_gasto` INT NOT NULL,
  `usuario_id_usuario` INT NOT NULL,
  `deuda` DECIMAL(6,2) NOT NULL,
  PRIMARY KEY (`id_reparto`),
  CONSTRAINT `fk_usuario_has_gasto_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `usuario` (`id_usuario`),
  CONSTRAINT `fk_reparto_gasto1`
    FOREIGN KEY (`gasto_id_gasto`)
    REFERENCES `gasto` (`id_gasto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `adscrito`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `adscrito` ;

CREATE TABLE IF NOT EXISTS `adscrito` (
  `id_adscrito` INT NOT NULL AUTO_INCREMENT,
  `usuario_id_usuario` INT NULL,
  `nombre_adscrito` VARCHAR(45) NOT NULL,
  `actividad_id_actividad` INT NOT NULL,
  PRIMARY KEY (`id_adscrito`),
  CONSTRAINT `fk_adscritos_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_adscritos_actividad1`
    FOREIGN KEY (`actividad_id_actividad`)
    REFERENCES `actividad` (`id_actividad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `deudor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `deudor` ;

CREATE TABLE IF NOT EXISTS `deudor` (
  `id_deudor` INT NOT NULL AUTO_INCREMENT,
  `cantidad_deuda` DECIMAL(6,2) NOT NULL DEFAULT 0 ,
  `adscrito_id_adscrito` INT NOT NULL,
  `gasto_id_gasto` INT NOT NULL,
  PRIMARY KEY (`id_deudor`),
  CONSTRAINT `fk_adscritos_has_gasto_adscritos1`
    FOREIGN KEY (`adscrito_id_adscrito`)
    REFERENCES `adscrito` (`id_adscrito`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_adscritos_has_gasto_gasto1`
    FOREIGN KEY (`gasto_id_gasto`)
    REFERENCES `gasto` (`id_gasto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


INSERT INTO usuario(`nombre`, `contrasena`, `email`) VALUES ('pepe', '$2y$10$.lH91mQ9s2pGqlstsP35wO0zlSQv/nSyBuiZKoQi7QFfiCddQjZhW', 'pepe@gmail.com');

INSERT INTO actividad(`usuario_id_usuario`, `nombre`, `descripcion`, `divisa`, `tipo_actividad`) VALUES (1, 'Jugar', 'Jugar a futbol', '$', 'Deportes');

INSERT INTO adscrito(`usuario_id_usuario`, `nombre_adscrito`, `actividad_id_actividad`) VALUES (1, 'pepe', 1);
INSERT INTO adscrito(`nombre_adscrito`, `actividad_id_actividad`) VALUES ('paco', 1);
INSERT INTO adscrito(`nombre_adscrito`, `actividad_id_actividad`) VALUES ('jose', 1);
INSERT INTO adscrito(`nombre_adscrito`, `actividad_id_actividad`) VALUES ('pedro', 1);

INSERT INTO actividad(`usuario_id_usuario`, `nombre`, `descripcion`, `divisa`, `tipo_actividad`) VALUES (1, 'Viajar', 'Viajar a Japón', '$', 'Viajes');

INSERT INTO adscrito(`usuario_id_usuario`, `nombre_adscrito`, `actividad_id_actividad`) VALUES (1, 'pepe', 2);
INSERT INTO adscrito(`nombre_adscrito`, `actividad_id_actividad`) VALUES ('manuel', 2);
INSERT INTO adscrito(`nombre_adscrito`, `actividad_id_actividad`) VALUES ('samuel', 2);
INSERT INTO adscrito(`nombre_adscrito`, `actividad_id_actividad`) VALUES ('alejandro', 2);