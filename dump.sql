-- MySQL Script generated by MySQL Workbench
-- Wed Aug 14 22:34:01 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema senshimatto
-- -----------------------------------------------------
-- 
-- 

-- -----------------------------------------------------
-- Schema senshimatto
--
-- 
-- 
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `senshimatto` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin ;
USE `senshimatto` ;

-- -----------------------------------------------------
-- Table `senshimatto`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `senshimatto`.`usuario` (
  `idUsuario` INT NOT NULL,
  `nome` VARCHAR(60) NOT NULL,
  `nascimento` DATE NOT NULL,
  `cpf` VARCHAR(60) NOT NULL,
  `sexo` VARCHAR(60) NOT NULL,
  `whatsapp` VARCHAR(60) NOT NULL,
  `email` VARCHAR(60) NOT NULL,
  `academia` VARCHAR(60) NOT NULL,
  `professor` VARCHAR(60) NOT NULL,
  `usuario` VARCHAR(10) NOT NULL,
  `senha` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`idUsuario`))
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `senshimatto`.`competicao` (
  `idCompeticao` INT NOT NULL,
  `evento` VARCHAR(60) NOT NULL,
  `endereco` VARCHAR(60) NOT NULL,
  `estado` VARCHAR(60) NOT NULL,
  `cidade` VARCHAR(60) NOT NULL,
  `dataEvento` DATE NOT NULL,
  `descricao` VARCHAR(60) NOT NULL,
  `cartaz` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`idCompeticao`))
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;