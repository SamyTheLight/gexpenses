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
  PRIMARY KEY (`id_usuario`)
  )ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `actividad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `actividad` ;

CREATE TABLE IF NOT EXISTS `actividad` (
  `id_actividad` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  `divisa` CHAR(1) NOT NULL,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_actividad` VARCHAR(45) NULL,
  PRIMARY KEY (`id_actividad`)
  )ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `category` ;

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`category_id`)
  )ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `invitacion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `invitacion` ;

CREATE TABLE IF NOT EXISTS `invitacion` (
  `usuario_id_usuario` INT NOT NULL,
  `actividad_id_actividad` INT NOT NULL,
  `nombre` VARCHAR(45) NULL,
  `descripcion` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  PRIMARY KEY (`usuario_id_usuario`, `actividad_id_actividad`),
  CONSTRAINT `fk_usuario_has_actividad_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_actividad_actividad1`
    FOREIGN KEY (`actividad_id_actividad`)
    REFERENCES `actividad` (`id_actividad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    )ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `gasto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `gasto` ;

CREATE TABLE IF NOT EXISTS `gasto` (
  `actividad_id_actividad` INT NOT NULL,
  `concepto` VARCHAR(200) NULL,
  `pagador` VARCHAR(45) NULL,
  `cantidad` DECIMAL(6,2) NULL,
  `fecha` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`actividad_id_actividad`),
  CONSTRAINT `fk_actividad_has_usuario_actividad1`
    FOREIGN KEY (`actividad_id_actividad`)
    REFERENCES `actividad` (`id_actividad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    )ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `reparto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `reparto` ;

CREATE TABLE IF NOT EXISTS `reparto` (
  `usuario_id_usuario` INT NOT NULL,
  `gasto_actividad_id_actividad` INT NOT NULL,
  `miembros` INT NOT NULL,
  `gasto` DECIMAL(6,2) NOT NULL,
  `importe` DECIMAL(6,2) NOT NULL,
  PRIMARY KEY (`usuario_id_usuario`, `gasto_actividad_id_actividad`),
  CONSTRAINT `fk_usuario_has_gasto_usuario1`
    FOREIGN KEY (`usuario_id_usuario`)
    REFERENCES `usuario` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_has_gasto_gasto1`
    FOREIGN KEY (`gasto_actividad_id_actividad`)
    REFERENCES `gasto` (`actividad_id_actividad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION
    )ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;