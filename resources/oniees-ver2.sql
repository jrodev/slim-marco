-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema oniees
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema oniees
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `oniees` DEFAULT CHARACTER SET utf8 ;
USE `oniees` ;

-- -----------------------------------------------------
-- Table `oniees`.`departamento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oniees`.`departamento` ;

CREATE TABLE IF NOT EXISTS `oniees`.`departamento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(80) NOT NULL,
  `fechareg` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` TINYINT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `oniees`.`departamento` (`id` ASC);


-- -----------------------------------------------------
-- Table `oniees`.`provincia`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oniees`.`provincia` ;

CREATE TABLE IF NOT EXISTS `oniees`.`provincia` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(80) NOT NULL,
  `fechareg` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` TINYINT NULL DEFAULT 1,
  `departamento_id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `oniees`.`provincia` (`id` ASC);

CREATE INDEX `fk_provincia_departamento1_idx` ON `oniees`.`provincia` (`departamento_id` ASC);


-- -----------------------------------------------------
-- Table `oniees`.`distrito`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oniees`.`distrito` ;

CREATE TABLE IF NOT EXISTS `oniees`.`distrito` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(80) NOT NULL,
  `fechareg` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` TINYINT NULL DEFAULT 1,
  `provincia_id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `oniees`.`distrito` (`id` ASC);

CREATE INDEX `fk_distrito_provincia1_idx` ON `oniees`.`distrito` (`provincia_id` ASC);


-- -----------------------------------------------------
-- Table `oniees`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oniees`.`categoria` ;

CREATE TABLE IF NOT EXISTS `oniees`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(150) NOT NULL,
  `descripcion` TEXT(250) NULL,
  `fechareg` DATETIME NULL,
  `activo` TINYINT NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `oniees`.`categoria` (`id` ASC);


-- -----------------------------------------------------
-- Table `oniees`.`establecimiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oniees`.`establecimiento` ;

CREATE TABLE IF NOT EXISTS `oniees`.`establecimiento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `categoria_id` INT NOT NULL,
  `distrito_id` INT NOT NULL,
  `codigo` VARCHAR(30) NOT NULL DEFAULT 'Codigo que llenara datos iniciales',
  `nombre` VARCHAR(100) NOT NULL,
  `direccion` VARCHAR(200) NOT NULL,
  `periodo` VARCHAR(150) NULL,
  `red_dirisdiresa` VARCHAR(100) NULL,
  `red_red` VARCHAR(100) NULL,
  `red_microred` VARCHAR(100) NULL,
  `red_institucion` VARCHAR(45) NULL,
  `red_areageografica` VARCHAR(45) NULL,
  `gral_aniomarcha` VARCHAR(45) NULL COMMENT 'Año puesta en marcha',
  `gral_nrocamas` VARCHAR(45) NULL COMMENT 'N° de camas (Internamiento/Hospitalización)',
  `gral_poblacbenefic` VARCHAR(45) NULL COMMENT 'Población Beneficiaria',
  `gral_inversionInfra` VARCHAR(45) NULL COMMENT 'Inversión en Infraestructura',
  `gral_inversionequip` VARCHAR(45) NULL COMMENT 'Inversión en Equipamiento',
  `img_json` TEXT(500) NULL,
  `geo_terrenopropio` TINYINT NULL COMMENT 'El terreno es propio',
  `geo_terrenosanea` TINYINT NULL COMMENT 'El terreno cuenta con saneamiento físico legal',
  `geo_areaterreno` VARCHAR(45) NULL COMMENT 'Área del terreno (m2)',
  `geo_areaconstruida` VARCHAR(45) NULL COMMENT 'Área construída (m2)',
  `geo_arealibre` VARCHAR(45) NULL COMMENT 'Área libre (m2)',
  `geo_superfterreno` VARCHAR(45) NULL COMMENT 'Superficie del terreno es',
  `geo_nropisosestabl` VARCHAR(45) NULL COMMENT 'Número de pisos del establecimiento',
  `geo_latitud` VARCHAR(45) NULL,
  `geo_longitud` VARCHAR(45) NULL,
  `geo_altura` VARCHAR(45) NULL,
  `geo_poblacRegion` VARCHAR(45) NULL,
  `geo_poblacDistrito` VARCHAR(45) NULL COMMENT 'Población actual del Distrito (en cientos)',
  `geo_areadistrito` VARCHAR(45) NULL,
  `geo_poblacdensidad` VARCHAR(45) NULL,
  `geo_accesibilidad` VARCHAR(45) NULL,
  `geo_tipocamino` VARCHAR(45) NULL,
  `eess_distancia` VARCHAR(45) NULL COMMENT 'Distancia (Km)',
  `eess_tiempo` VARCHAR(45) NULL COMMENT 'Tiempo (hora)',
  `eess_nivel` VARCHAR(45) NULL COMMENT 'Nivel-Categoría de EESS mas cercano',
  `hospital_distancia` VARCHAR(45) NULL COMMENT 'Distancia (Km)',
  `hospital_tiempo` VARCHAR(45) NULL COMMENT 'Tiempo (hora)',
  `hospital_nivel` VARCHAR(45) NULL COMMENT 'Nivel-Categoría de EESS mas cercano',
  `energia_publica` VARCHAR(45) NULL COMMENT 'Red pública',
  `energia_electrogeno` VARCHAR(45) NULL COMMENT 'Grupo Electrógeno',
  `energia_solares` VARCHAR(45) NULL COMMENT 'Paneles Solares	',
  `electr_potencia` VARCHAR(45) NULL,
  `electr_demanda` VARCHAR(45) NULL,
  `electr_contratada` VARCHAR(45) NULL,
  `electr_tarifa` VARCHAR(45) NULL,
  `electr_costokw` VARCHAR(45) NULL,
  `electr_cantpozotierra` VARCHAR(45) NULL,
  `electr_costokvar` VARCHAR(45) NULL,
  `agua_vulnerablea` VARCHAR(45) NULL,
  `vulne_ish` VARCHAR(45) NULL,
  `vulne_itse` VARCHAR(45) NULL,
  `vulne_conestudio` VARCHAR(45) NULL,
  `vulne_numeroish` VARCHAR(45) NULL,
  `vulne_anioitse` VARCHAR(45) NULL,
  `vulne_anioestu` VARCHAR(45) NULL,
  `resid_biocont` VARCHAR(45) NULL,
  `resid_comunes` VARCHAR(45) NULL,
  `resid_especiales` VARCHAR(45) NULL,
  `resid_conequipo` VARCHAR(45) NULL,
  `resid_operatividad` VARCHAR(45) NULL,
  `resid_costounitario` VARCHAR(45) NULL,
  `resid_costomensual` VARCHAR(45) NULL,
  `resid_ubicrell` VARCHAR(45) NULL,
  `comunic_telefono` VARCHAR(45) NULL COMMENT 'Ninguno,Movistar, Claro, Entel, Bitel',
  `comunic_internet` VARCHAR(45) NULL COMMENT 'Ninguno,Movistar, Claro, Entel',
  `comunic_radio` VARCHAR(45) NULL,
  `comunic_cable` VARCHAR(45) NULL COMMENT 'Ninguno,Movistar, Claro, Entel, Directv, Local',
  `conserv_arquitect` VARCHAR(45) NULL,
  `conserv_estruct` VARCHAR(45) NULL,
  `conserv_instaelect` VARCHAR(45) NULL,
  `conserv_instasanit` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `oniees`.`establecimiento` (`id` ASC);

CREATE UNIQUE INDEX `codigo_UNIQUE` ON `oniees`.`establecimiento` (`codigo` ASC);

CREATE INDEX `fk_establecimiento_distrito1_idx` ON `oniees`.`establecimiento` (`distrito_id` ASC);

CREATE INDEX `fk_establecimiento_categoria1_idx` ON `oniees`.`establecimiento` (`categoria_id` ASC);


-- -----------------------------------------------------
-- Table `oniees`.`especialidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oniees`.`especialidad` ;

CREATE TABLE IF NOT EXISTS `oniees`.`especialidad` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(100) NULL,
  `fechareg` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` TINYINT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_UNIQUE` ON `oniees`.`especialidad` (`id` ASC);


-- -----------------------------------------------------
-- Table `oniees`.`personal_especialidad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oniees`.`personal_especialidad` ;

CREATE TABLE IF NOT EXISTS `oniees`.`personal_especialidad` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cantidad` VARCHAR(45) NULL DEFAULT 'cantidad de personal para dicha especialidad',
  `fechareg` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` TINYINT NULL DEFAULT 1,
  `establecimiento_id` INT NOT NULL,
  `especialidad_id` INT NOT NULL,
  PRIMARY KEY (`id`, `establecimiento_id`, `especialidad_id`))
ENGINE = InnoDB;

CREATE INDEX `fk_personal_especialidad_establecimiento1_idx` ON `oniees`.`personal_especialidad` (`establecimiento_id` ASC);

CREATE INDEX `fk_personal_especialidad_especialidad1_idx` ON `oniees`.`personal_especialidad` (`especialidad_id` ASC);


-- -----------------------------------------------------
-- Table `oniees`.`upss`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oniees`.`upss` ;

CREATE TABLE IF NOT EXISTS `oniees`.`upss` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL,
  `descripcion` VARCHAR(150) NULL,
  `fechareg` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` TINYINT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oniees`.`ups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oniees`.`ups` ;

CREATE TABLE IF NOT EXISTS `oniees`.`ups` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL,
  `descripcion` VARCHAR(150) NULL,
  `fechareg` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` TINYINT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oniees`.`ambiente_upss`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oniees`.`ambiente_upss` ;

CREATE TABLE IF NOT EXISTS `oniees`.`ambiente_upss` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `total` INT NULL DEFAULT 0,
  `fechareg` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` TINYINT NULL DEFAULT 1,
  `establecimiento_id` INT NOT NULL,
  `upss_id` INT NOT NULL,
  PRIMARY KEY (`id`, `establecimiento_id`, `upss_id`))
ENGINE = InnoDB;

CREATE INDEX `fk_ambiente_upss_establecimiento1_idx` ON `oniees`.`ambiente_upss` (`establecimiento_id` ASC);

CREATE INDEX `fk_ambiente_upss_upss1_idx` ON `oniees`.`ambiente_upss` (`upss_id` ASC);


-- -----------------------------------------------------
-- Table `oniees`.`ambiente_ups`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oniees`.`ambiente_ups` ;

CREATE TABLE IF NOT EXISTS `oniees`.`ambiente_ups` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `total` INT NULL DEFAULT 0,
  `fechareg` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` TINYINT NULL DEFAULT 1,
  `establecimiento_id` INT NOT NULL,
  `ups_id` INT NOT NULL,
  PRIMARY KEY (`id`, `establecimiento_id`, `ups_id`))
ENGINE = InnoDB;

CREATE INDEX `fk_ambiente_ups_establecimiento1_idx` ON `oniees`.`ambiente_ups` (`establecimiento_id` ASC);

CREATE INDEX `fk_ambiente_ups_ups1_idx` ON `oniees`.`ambiente_ups` (`ups_id` ASC);


-- -----------------------------------------------------
-- Table `oniees`.`tipo_atributo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oniees`.`tipo_atributo` ;

CREATE TABLE IF NOT EXISTS `oniees`.`tipo_atributo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(150) NOT NULL COMMENT 'por ejem: CARAC. TÉC. ELÉCTRICAS, ESTRUCTURA DEL TECHO, PAREDES - MUROS..etc',
  `descripcion` VARCHAR(250) NULL,
  `fechareg` DATETIME NULL,
  `activo` TINYINT NULL DEFAULT 1,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `oniees`.`atributo`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oniees`.`atributo` ;

CREATE TABLE IF NOT EXISTS `oniees`.`atributo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(150) NOT NULL COMMENT 'por ejem: Losa de concreto, Ladrillo pastelero, Cemento',
  `descripcion` VARCHAR(250) NULL,
  `fechareg` DATETIME NULL,
  `activo` TINYINT NULL DEFAULT 1,
  `tipo_atributo_id` INT NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

CREATE INDEX `fk_atributo_tipo_atributo_idx` ON `oniees`.`atributo` (`tipo_atributo_id` ASC);


-- -----------------------------------------------------
-- Table `oniees`.`atributo_establecimiento`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `oniees`.`atributo_establecimiento` ;

CREATE TABLE IF NOT EXISTS `oniees`.`atributo_establecimiento` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `atributo_id` INT NOT NULL,
  `establecimiento_id` INT NOT NULL,
  `seleccionado` TINYINT NULL COMMENT 'Si la caracteristica se selecciono o no',
  `fechareg` DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
  `activo` TINYINT NULL DEFAULT 1,
  PRIMARY KEY (`id`, `atributo_id`, `establecimiento_id`))
ENGINE = InnoDB;

CREATE INDEX `fk_atributo_establecimiento_atributo1_idx` ON `oniees`.`atributo_establecimiento` (`atributo_id` ASC);

CREATE INDEX `fk_atributo_establecimiento_establecimiento1_idx` ON `oniees`.`atributo_establecimiento` (`establecimiento_id` ASC);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
