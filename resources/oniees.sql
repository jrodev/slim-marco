-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 18-12-2018 a las 13:25:49
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `oniees`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_coberturatecho`
--

CREATE TABLE `tb_coberturatecho` (
  `Id` int(11) NOT NULL,
  `ladrillo_past` char(1) DEFAULT NULL COMMENT 'Ladrillo pastelero',
  `calamina` char(1) DEFAULT NULL COMMENT 'Estructura calamina',
  `teja` char(1) DEFAULT NULL COMMENT 'Estructura de teja',
  `otro_cobert` char(1) DEFAULT NULL COMMENT 'Codigo otra cobertura',
  `descotro_cobert` varchar(100) DEFAULT NULL COMMENT 'Descripcion otra cobertura',
  `cod_renipres` int(8) DEFAULT NULL COMMENT 'Codigo Renipres',
  `cod_usuario` int(11) DEFAULT NULL COMMENT 'Codigo Usuario',
  `fecha_reg` date DEFAULT NULL COMMENT 'Fecha de Registro',
  `fecha_rev` date DEFAULT NULL COMMENT 'Fecha de Revision',
  `estado` varchar(100) DEFAULT NULL COMMENT 'Estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_desague`
--

CREATE TABLE `tb_desague` (
  `Id` int(11) NOT NULL,
  `red_publica` char(1) DEFAULT NULL COMMENT 'Desague de red publica',
  `silo` char(1) DEFAULT NULL COMMENT 'Desague por silo',
  `pozo` char(1) DEFAULT NULL COMMENT 'Desague por pozo',
  `campo_abierto` char(1) DEFAULT NULL COMMENT 'Desague por campo abierto',
  `otro_desague` char(1) DEFAULT NULL COMMENT 'Codigo otra fuente de desague',
  `drenaje` char(2) DEFAULT NULL COMMENT 'Desague por drenaje',
  `cod_renipres` int(8) DEFAULT NULL COMMENT 'Codigo Renipres',
  `cod_usuario` int(10) DEFAULT NULL COMMENT 'Codigo de usuario',
  `fecha_reg` date DEFAULT NULL COMMENT 'Fecha de registro',
  `fecha_rev` date DEFAULT NULL COMMENT 'Fecha de revision',
  `estado` varchar(100) DEFAULT NULL COMMENT 'Estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_distancias`
--

CREATE TABLE `tb_distancias` (
  `eess_tiempo` varchar(20) DEFAULT NULL COMMENT 'Tiempo al Establecimiento mas cercano',
  `eess_nivelcat` char(1) DEFAULT NULL COMMENT 'Categoria de Establecimiento mas cercano',
  `hosp_distancia` int(11) DEFAULT NULL COMMENT 'Distancia al hospital mas cercano',
  `hosp_tiempo` varchar(20) DEFAULT NULL COMMENT 'Tiempo al hospital mas cercano',
  `cod_usurio` int(11) DEFAULT NULL COMMENT 'Codigo de usuario',
  `estado` varchar(100) DEFAULT NULL COMMENT 'Estado',
  `fecha_reg` date DEFAULT NULL COMMENT 'Fecha registro',
  `fecha_rev` date DEFAULT NULL COMMENT 'Fecha de revision',
  `cod_renipres` int(8) DEFAULT NULL COMMENT 'Codigo Renipres'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_establecimiento`
--

CREATE TABLE `tb_establecimiento` (
  `cod_renipres` int(8) NOT NULL COMMENT 'Codigo Renipres',
  `nom_estab` varchar(100) DEFAULT NULL COMMENT 'Nombre del establecimiento',
  `codcat_estab` varchar(6) DEFAULT NULL COMMENT 'Codigo categoria establecimiento',
  `nomcat_estab` varchar(100) DEFAULT NULL COMMENT 'Nombre Categoria Establecimiento',
  `periodo_estab` varchar(4) DEFAULT NULL COMMENT 'Periodo actual',
  `codregion_estab` char(2) DEFAULT NULL COMMENT 'Codigo Region Establecimiento',
  `eess_distancia` int(2) DEFAULT '0' COMMENT 'Distancia Establecimiento de Salud',
  `nomdepar_estab` varchar(100) DEFAULT NULL COMMENT 'Nombre Departamento Establecimiento',
  `nomprov_estab` varchar(100) DEFAULT NULL COMMENT 'Nombre Provincia Establecimiento',
  `nomdist_estab` varchar(100) DEFAULT NULL COMMENT 'Nombre Distrito Establecimiento',
  `codareageog_estab` char(2) DEFAULT NULL COMMENT 'Codigo Area Geografica Establecimiento',
  `nomdiresa_estab` varchar(100) DEFAULT NULL COMMENT 'Nombre Diresa Establecimiento',
  `red_estab` varchar(100) DEFAULT NULL COMMENT 'Red del Establecimiento',
  `micro_estab` varchar(100) DEFAULT NULL COMMENT 'Microred Establecimiento',
  `instit_estab` varchar(100) DEFAULT NULL COMMENT 'Institucion a la que pertenece el Establecimiento',
  `ano_estab` char(4) DEFAULT NULL COMMENT 'Año de puesta en marcha',
  `camas_estab` int(4) DEFAULT NULL COMMENT 'N° de camas del Establecimiento',
  `pobbenef_estab` int(11) DEFAULT NULL COMMENT 'Poblacion Beneficiaria del Establecimiento',
  `invinf_estab` decimal(12,2) DEFAULT NULL COMMENT 'Inversion en Infraestructura del Establecimiento',
  `invequip_estab` decimal(12,2) DEFAULT NULL COMMENT 'Inversion en equipamiento del Establecimiento',
  `invtot_estab` decimal(12,2) DEFAULT NULL COMMENT 'Inversion Total del Establecimiento',
  `foto1_estab` text COMMENT 'Foto principal del Establecimiento',
  `foto2_estab` text COMMENT 'Foto secundaria del Establecimiento',
  `foto3_estab` text COMMENT 'Mapa del Establecimiento',
  `direcc_estab` varchar(100) DEFAULT NULL,
  `codigo` char(2) DEFAULT NULL COMMENT 'Codigo de Departamento'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_establecimiento`
--

INSERT INTO `tb_establecimiento` (`cod_renipres`, `nom_estab`, `codcat_estab`, `nomcat_estab`, `periodo_estab`, `codregion_estab`, `eess_distancia`, `nomdepar_estab`, `nomprov_estab`, `nomdist_estab`, `codareageog_estab`, `nomdiresa_estab`, `red_estab`, `micro_estab`, `instit_estab`, `ano_estab`, `camas_estab`, `pobbenef_estab`, `invinf_estab`, `invequip_estab`, `invtot_estab`, `foto1_estab`, `foto2_estab`, `foto3_estab`, `direcc_estab`, `codigo`) VALUES
(4, 'SANTA MARIA DE NANAY', 'I-3', 'CENTROS DE SALUD O CENTROS MEDICOS', '2018', '3', 1, 'LORETO', 'MAYNAS ', 'ALTO NANAY', '2', 'Loreto', 'LORETO|MAYNAS CIUDAD', 'IQUITOS NORTE', 'GOBIERNO REGIONAL', '1993', 0, 625, '0.00', '0.00', '0.00', '', '', '', 'CASERIO DE SANTA MARIA DE NANAY', '32'),
(7, 'MORONACOCHA', 'I-4', 'CENTROS DE SALUD CON CAMAS DE INTERNAMIENTO', '2018', '3', 2, 'LORETO', 'MAYNAS ', 'IQUITOS', '3', 'Loreto', 'LORETO|MAYNAS CIUDAD', 'IQUITOS NORTE', 'GOBIERNO REGIONAL', '1993', 6, 37359, '0.00', '0.00', '0.00', '', '', '', 'CABALLERO LASTRE SIN NUMERO', '32'),
(8, 'TUPAC AMARU DE IQUITOS', 'I-3', 'CENTROS DE SALUD O CENTROS MEDICOS', '2018', '3', 2, 'LORETO', 'MAYNAS ', 'IQUITOS', '3', 'Loreto', 'LORETO|MAYNAS CIUDAD', 'IQUITOS NORTE', 'GOBIERNO REGIONAL', '1990', 0, 11614, '0.00', '0.00', '0.00', '', '', '', 'SE?OR DE SIPAN N?317', '32'),
(12, 'MANACAMIRI', 'I-1', 'PUESTOS DE SALUD O POSTAS DE SALUD', '2018', '3', 1, 'LORETO', 'MAYNAS ', 'IQUITOS', '3', 'Loreto', 'LORETO|MAYNAS CIUDAD', 'IQUITOS NORTE', 'GOBIERNO REGIONAL', '1991', 0, 905, '0.00', '0.00', '0.00', '', '', '', 'CASERIO MANACAMIRI - RIO NANAY', '32'),
(270, 'SAN JOSE DE LUPUNA', 'I-1', 'PUESTOS DE SALUD O POSTAS DE SALUD', '2018', '3', 3, 'LORETO', 'MAYNAS ', 'IQUITOS', '3', 'Loreto', 'LORETO|MAYNAS CIUDAD', 'IQUITOS NORTE', 'GOBIERNO REGIONAL', '1993', 0, 1448, '0.00', '0.00', '0.00', '', '', '', 'CASERIO DE SAN JOSE DE LUPUNA', '32'),
(785, 'APARICIO POMARES', 'I-3', 'CENTROS DE SALUD O CENTROS MEDICOS', '2018', '2', 2, 'HUANUCO', 'HUANUCO', 'HUANUCO', '2', 'Huanuco', 'HUANUCO|HUANUCO', 'HUANUCO', 'GOBIERNO REGIONAL', '1988', 8, 43328, '0.00', '0.00', '0.00', '', '', '', 'JR. JUNIN N? 321 - 323', '22'),
(894, 'ILLAHUASI', 'I-1', 'PUESTOS DE SALUD O POSTAS DE SALUD', '2018', '2', 15, 'HUANUCO', 'HUAMALIES', 'PU?OS', '2', 'Huanuco', 'HUANUCO|HUAMALIES', 'PU?OS', 'GOBIERNO REGIONAL', '1997', 0, 486, '0.00', '0.00', '0.00', '', '', '', 'OTROS CENTRO POBLADO DE ILLAHUASI CENTRO POBLADO DE ILLAHUASI PU?OS HUAMALIES HUANUCO ', '22'),
(924, 'YUYAPICHIS', 'I-3', 'CENTROS DE SALUD O CENTROS MEDICOS', '2018', '2', 185, 'HUANUCO', 'PUERTO INCA', 'YUYAPICHIS', '2', 'Huanuco', 'HUANUCO|PUERTO INCA (RED FUNCIONAL)', 'YUYAPICHIS', 'GOBIERNO REGIONAL', '1984', 0, 3180, '0.00', '0.00', '0.00', '', '', '', 'Av. MANUEL DIAZ SANTILLAN S N DISTRITO YUYAPICHIS PROVINCIA PUERTO INCA DEPARTAMENTO HU?NUCO ', '22'),
(925, 'DANTAS', 'I-1', 'PUESTOS DE SALUD O POSTAS DE SALUD', '2018', '2', 14, 'HUANUCO', 'PUERTO INCA', 'YUYAPICHIS', '2', 'Huanuco', 'HUANUCO|PUERTO INCA (RED FUNCIONAL)', 'YUYAPICHIS', 'GOBIERNO REGIONAL', '1988', 0, 636, '0.00', '0.00', '0.00', '', '', '', 'CARRETERA FERNANDO BELAUNDE  TERRY KM.112 DISTRITO YUYAPICHIS PROVINCIA PUERTO INCA DEPARTAMENTO HU?', '22'),
(926, 'STA. ROSA DE YANAYACU', 'I-1', 'PUESTOS DE SALUD O POSTAS DE SALUD', '2018', '2', 22, 'HUANUCO', 'PUERTO INCA', 'YUYAPICHIS', '2', 'Huanuco', 'HUANUCO|PUERTO INCA (RED FUNCIONAL)', 'YUYAPICHIS', 'GOBIERNO REGIONAL', '1994', 0, 1273, '0.00', '0.00', '0.00', '', '', '', 'CARRETERA FERNANDO BELAUNDE KM.92 DISTRITO YUYAPICHIS PROVINCIA PUERTO INCA DEPARTAMENTO HUANUCO ', '22'),
(927, 'CODO DEL POZUZO', 'I-3', 'CENTROS DE SALUD O CENTROS MEDICOS', '2018', '2', 220, 'HUANUCO', 'PUERTO INCA', 'CODO DEL POZUZO', '2', 'Huanuco', 'HUANUCO|PUERTO INCA (RED FUNCIONAL)', 'CODO DEL POZUZO', 'GOBIERNO REGIONAL', '1981', 8, 1851, '0.00', '0.00', '0.00', '', '', '', 'JR.FERNANDO BELAUNDE TERRY S N DISTRITO CODO DEL POZUZO PROVINCIA PUERTO INCA DEPARTAMENTO HU?NUCO ', '22'),
(5682, 'HUAURA', 'I-3', 'CENTROS DE SALUD O CENTROS MEDICOS', '2018', '1', 2, 'LIMA', 'HUAURA ', 'HUAURA', '1', 'Lima', 'LIMA|RED II HUAURA - OYON', 'HUAURA', 'GOBIERNO REGIONAL', '1993', 0, 18311, '0.00', '0.00', '0.00', '', '', '', 'AVENIDA AV. SAN FRANCISCO S N HUAURA N?MERO S N DISTRITO HUAURA PROVINCIA HUAURA DEPARTAMENTO LIMA 0', '15'),
(5871, 'HUAROCHIRI', 'I-3', 'CENTROS DE SALUD O CENTROS MEDICOS', '2018', '1', 150, 'LIMA', 'HUAROCHIRI ', 'HUAROCHIRI', '1', 'Lima', 'LIMA|RED IX HUAROCHIRI', 'HUAROCHIRI', 'GOBIERNO REGIONAL', '1973', 0, 980, '0.00', '0.00', '0.00', '', '', '', 'CALLE AMPE S N N?MERO S N DISTRITO SAN MATEO PROVINCIA HUAROCHIRI DEPARTAMENTO LIMA', '15'),
(5875, 'SAN LORENZO DE QUINTI\n', 'I-1', 'Hospital', '2018', '1', 40, 'Tumbes', 'Tumbes', 'Zorritos', '1', 'rreerre', 'LIMA|RED IX HUAROCHIRI\n', 'fdsf', 'GOBIERNO REGIONAL\n', '1974', 10, 5354, '4323.00', '756.00', '78973.00', NULL, NULL, NULL, 'JIRÓN JIRON DANIEL ALCIDES CARRION S/N NÚMERO S/N DISTRITO SAN LORENZO DE QUINTI PROVINCIA HUAROCHIR', '11'),
(5974, 'CHOCNA', 'I-1', 'PUESTOS DE SALUD O POSTAS DE SALUD', '2018', '1', 6, 'LIMA', 'HUAROCHIRI ', 'SAN MATEO', '1', 'Lima', 'LIMA|RED IX HUAROCHIRI', 'MATUCANA', 'GOBIERNO REGIONAL', '1998', 0, 295, '0.00', '0.00', '0.00', '', '', '', 'PLAZA DE ARMAS S N N?MERO S N DISTRITO SANTA EULALIA PROVINCIA HUAROCHIRI DEPARTAMENTO LIMA ', '15'),
(5975, 'ICHOCA', 'I-1', 'PUESTOS DE SALUD O POSTAS DE SALUD', '2018', '1', 20, 'LIMA', 'HUAROCHIRI ', 'SAN MATEO', '1', 'Lima', 'LIMA|RED IX HUAROCHIRI', 'MATUCANA', 'GOBIERNO REGIONAL', '1994', 0, 234, '0.00', '0.00', '0.00', '', '', '', 'CALLE AMPE S N N?MERO S N DISTRITO SAN MATEO PROVINCIA HUAROCHIRI DEPARTAMENTO LIMA', '15'),
(6945, 'NUEVO LIBERTAD', 'I-1', 'PUESTOS DE SALUD O POSTAS DE SALUD', '2018', '3', 3, 'LORETO', 'MAYNAS ', 'IQUITOS', '1', 'Loreto', 'LORETO|MAYNAS CIUDAD', 'IQUITOS NORTE', 'GOBIERNO REGIONAL', '1996', 0, 906, '0.00', '0.00', '0.00', '', '', '', 'CASERIO NUEVO LIBERTAD', '32'),
(11070, 'MONTERRICO', 'I-1', 'PUESTOS DE SALUD O POSTAS DE SALUD', '2018', '2', 15, 'HUANUCO', 'PUERTO INCA', 'YUYAPICHIS', '1', 'Huanuco', 'HUANUCO|PUERTO INCA (RED FUNCIONAL)', 'YUYAPICHIS', 'GOBIERNO REGIONAL', '2010', 0, 443, '0.00', '0.00', '0.00', '', '', '', 'CENTRO POBLADO DE MONTERRICO S N DISTRITO YUYAPICHIS PROVINCIA PUERTO INCA DEPARTAMENTO HU?NUCO ', '22'),
(11071, 'EL DORADO', 'I-1', 'PUESTOS DE SALUD O POSTAS DE SALUD', '2018', '2', 35, 'HUANUCO', 'PUERTO INCA', 'YUYAPICHIS', '2', 'Huanuco', 'HUANUCO|PUERTO INCA (RED FUNCIONAL)', 'YUYAPICHIS', 'GOBIERNO REGIONAL', '2010', 0, 510, '0.00', '0.00', '0.00', '', '', '', 'CENTRO POBLADO EL DORADO S N  DISTRITO YUYAPICHIS PROVINCIA PUERTO INCA DEPARTAMENTO HUANUCO ', '22'),
(11107, 'GUACAMAYO', 'I-1', 'PUESTOS DE SALUD O POSTAS DE SALUD', '2018', '2', 32, 'HUANUCO', 'PUERTO INCA', 'YUYAPICHIS', '2', 'Huanuco', 'HUANUCO|PUERTO INCA (RED FUNCIONAL)', 'YUYAPICHIS', 'GOBIERNO REGIONAL', '2010', 0, 319, '0.00', '0.00', '0.00', '', '', '', 'CENTRO POBLADO EL DORADO S N  DISTRITO YUYAPICHIS PROVINCIA PUERTO INCA DEPARTAMENTO HUANUCO ', '22'),
(13234, NULL, NULL, NULL, NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11'),
(56618, NULL, NULL, NULL, NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11'),
(67574, NULL, NULL, NULL, NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11'),
(78789, NULL, NULL, NULL, NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11'),
(89723, NULL, NULL, NULL, NULL, '1', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11'),
(98324, NULL, NULL, NULL, NULL, '11', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(98325, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98326, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98327, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98328, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98329, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98330, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98331, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98332, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98333, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98334, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98335, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98336, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98337, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98338, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98339, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98340, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98341, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98342, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98343, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98344, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98345, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98346, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98347, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98348, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98349, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98350, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98351, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98352, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98353, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98354, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98355, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98356, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98357, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98358, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98359, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98360, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98361, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98362, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98363, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98364, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98365, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98366, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98367, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98368, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98369, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98370, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98371, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98372, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98373, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98374, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98375, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98376, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98377, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98378, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98379, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98380, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98381, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98382, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98383, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98384, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98385, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98386, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98387, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98388, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98389, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98390, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98391, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98392, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98393, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98394, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98395, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98396, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98397, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98398, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98399, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98400, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98401, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98402, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98403, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98404, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98405, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98406, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98407, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98408, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98409, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98410, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98411, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98412, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98413, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98414, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98415, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98416, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', ''),
(98417, '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, 0, '0.00', '0.00', '0.00', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estadocons`
--

CREATE TABLE `tb_estadocons` (
  `Id` int(11) NOT NULL,
  `estruct_estab` varchar(2) NOT NULL COMMENT 'Estructura de Establecimiento',
  `arquitec_estab` varchar(2) NOT NULL COMMENT 'Arquitectura de Establecimiento',
  `instelect_estab` varchar(2) NOT NULL COMMENT 'Instalaciones Electricas de Establecimiento',
  `instsanit_estab` varchar(2) NOT NULL COMMENT 'Instalciones Sanitarias de Establecimiento',
  `estad_cons` varchar(2) NOT NULL COMMENT 'Estado de conservacion del Establecimiento',
  `cod_renipres` int(8) NOT NULL COMMENT 'Codigo Renipres',
  `cod_usuario` int(10) NOT NULL COMMENT 'Codigo Usuario',
  `fecha_reg` date NOT NULL COMMENT 'Fecha de Registro',
  `fecha_rev` date NOT NULL COMMENT 'Fecha de Revision',
  `estado` varchar(100) NOT NULL COMMENT 'Estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_estadocons`
--

INSERT INTO `tb_estadocons` (`Id`, `estruct_estab`, `arquitec_estab`, `instelect_estab`, `instsanit_estab`, `estad_cons`, `cod_renipres`, `cod_usuario`, `fecha_reg`, `fecha_rev`, `estado`) VALUES
(1, 'M', 'M', 'M', 'M', 'M', 3132, 0, '0000-00-00', '0000-00-00', '0'),
(2, 'B', 'B', 'B', 'B', 'B', 4566, 0, '0000-00-00', '0000-00-00', '0'),
(100, 'B', 'M', 'R', 'B', 'R', 5875, 0, '0000-00-00', '0000-00-00', '0'),
(101, 'B', 'M', 'R', 'R', 'R', 5677, 0, '0000-00-00', '0000-00-00', '0'),
(109, 'B', 'R', 'R', 'R', 'R', 5875, 0, '0000-00-00', '0000-00-00', '2'),
(110, 'B', 'R', 'R', 'R', 'R', 5682, 0, '0000-00-00', '0000-00-00', '0'),
(111, 'B', 'R', 'R', 'R', 'R', 5975, 0, '0000-00-00', '0000-00-00', '0'),
(112, 'B', 'R', 'R', 'R', 'R', 5871, 0, '0000-00-00', '0000-00-00', '0'),
(113, 'B', 'B', 'R', 'R', 'R', 5974, 0, '0000-00-00', '0000-00-00', '0'),
(114, 'B', 'B', 'B', 'B', 'B', 924, 0, '0000-00-00', '0000-00-00', '0'),
(115, 'B', 'B', 'R', 'R', 'R', 926, 0, '0000-00-00', '0000-00-00', '0'),
(116, 'B', 'B', 'R', 'R', 'R', 925, 0, '0000-00-00', '0000-00-00', '0'),
(117, 'B', 'B', 'B', 'B', 'B', 11071, 0, '0000-00-00', '0000-00-00', '0'),
(118, 'B', 'B', 'B', 'B', 'B', 927, 0, '0000-00-00', '0000-00-00', '0'),
(119, 'B', 'R', 'R', 'R', 'R', 11070, 0, '0000-00-00', '0000-00-00', '0'),
(120, 'B', 'R', 'R', 'R', 'R', 785, 0, '0000-00-00', '0000-00-00', '0'),
(121, 'M', 'M', 'M', 'M', 'M', 894, 0, '0000-00-00', '0000-00-00', '0'),
(122, 'B', 'B', 'B', 'B', 'B', 270, 0, '0000-00-00', '0000-00-00', '0'),
(123, 'B', 'R', 'R', 'M', 'R', 7, 0, '0000-00-00', '0000-00-00', '0'),
(124, 'M', 'M', 'M', 'M', 'M', 8, 0, '0000-00-00', '0000-00-00', '0'),
(125, 'M', 'M', 'M', 'R', 'B', 12, 0, '0000-00-00', '0000-00-00', '0'),
(126, 'R', 'R', 'M', 'M', 'M', 6945, 0, '0000-00-00', '0000-00-00', '0'),
(127, 'R', 'B', 'M', 'M', 'M', 4, 0, '0000-00-00', '0000-00-00', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estructuratecho`
--

CREATE TABLE `tb_estructuratecho` (
  `Id` int(11) NOT NULL,
  `losa_concreto` char(1) DEFAULT NULL COMMENT 'Losa concreto',
  `losa_alige` char(1) DEFAULT NULL COMMENT 'Losa aligerada',
  `estruct_madera` char(1) DEFAULT NULL COMMENT 'Estructura de madera',
  `estruct_fierro` char(1) DEFAULT NULL COMMENT 'Estructura de fierro',
  `ladrillo` char(1) DEFAULT NULL COMMENT 'Ladrillo',
  `otro_estruct` char(1) DEFAULT NULL COMMENT 'Codigo otra estructura',
  `descotro_estruct` varchar(100) DEFAULT NULL COMMENT 'Descripcion otra estructura',
  `cod_renipres` int(8) DEFAULT NULL COMMENT 'Codigo Renipres',
  `cod_usuario` int(10) DEFAULT NULL COMMENT 'Codigo usuario',
  `fecha_reg` date DEFAULT NULL COMMENT 'Fecha Registro',
  `fecha_rev` date DEFAULT NULL COMMENT 'Fecha de Revision',
  `estado` varchar(100) DEFAULT NULL COMMENT 'Estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_fuenteagua`
--

CREATE TABLE `tb_fuenteagua` (
  `Id` int(11) NOT NULL,
  `red_publica` char(1) DEFAULT NULL COMMENT 'Fuente de red publica',
  `pilones` char(1) DEFAULT NULL COMMENT 'Fuente de pilones',
  `pozo` char(1) DEFAULT NULL COMMENT 'Fuente de pozo',
  `camion_cisterna` char(1) DEFAULT NULL COMMENT 'Fuente de camion cisterna',
  `otro_fuenteagua` char(1) DEFAULT NULL COMMENT 'Codigo de otra fuente de agua',
  `descotro_agua` varchar(100) DEFAULT NULL COMMENT 'Descripcion otra fuente de agua',
  `cod_renipres` int(8) DEFAULT NULL COMMENT 'Codigo_Renipres',
  `cod_usuario` int(10) DEFAULT NULL COMMENT 'Codigo de usuario',
  `fecha_reg` date DEFAULT NULL COMMENT 'Fecha de registro',
  `fecha_rev` date DEFAULT NULL COMMENT 'Fecha de revision',
  `estado` varchar(100) DEFAULT NULL COMMENT 'Estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_fuenteelect`
--

CREATE TABLE `tb_fuenteelect` (
  `Id` int(11) NOT NULL,
  `red_publica` char(1) DEFAULT NULL COMMENT 'Fuente de red publica',
  `grupo_electro` char(1) DEFAULT NULL COMMENT 'Fuente de grupo electronico',
  `panel_solar` char(1) DEFAULT NULL COMMENT 'Fuente de panel solar',
  `cod_renipres` int(8) DEFAULT NULL COMMENT 'Codigo Renipres',
  `cod_usuario` int(10) DEFAULT NULL COMMENT 'Codigo de Usuario',
  `fecha_reg` date DEFAULT NULL COMMENT 'Fecha Registro',
  `fecha_rev` date DEFAULT NULL COMMENT 'Fecha de revision',
  `estado` varchar(100) DEFAULT NULL COMMENT 'Estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_geolocaliza`
--

CREATE TABLE `tb_geolocaliza` (
  `Id` int(11) NOT NULL,
  `terrpropgeo` char(2) DEFAULT NULL COMMENT 'Terreno propio',
  `terrsaneageo` char(2) DEFAULT NULL COMMENT 'Saneamiento del terreno',
  `areaterrgeo` decimal(7,2) DEFAULT NULL COMMENT 'Area del terreno',
  `areaconsgeo` decimal(7,2) DEFAULT NULL COMMENT 'Area del terreno construida',
  `arealibgeo` decimal(7,2) DEFAULT NULL COMMENT 'Area libre terreno',
  `superfterrenogeo` char(2) DEFAULT NULL COMMENT 'Superficie terreno',
  `numpisgeo` int(2) DEFAULT NULL COMMENT 'Numero pisos',
  `latitudgeo` varchar(100) DEFAULT NULL COMMENT 'Latitud',
  `longitudgeo` varchar(100) DEFAULT NULL COMMENT 'Longitud',
  `alturageo` int(7) DEFAULT NULL COMMENT 'Altura',
  `pobreggeo` int(11) DEFAULT NULL COMMENT 'Poblacion de la region del Establecimiento',
  `pobactdisgeo` int(11) DEFAULT NULL COMMENT 'Poblacion actual del Distrito del Establecimiento',
  `areadistgeo` decimal(7,2) DEFAULT NULL COMMENT 'Area del Distrito del Establecimiento',
  `densoblacgeo` decimal(7,2) DEFAULT NULL COMMENT 'Densidad poblacional',
  `accessgeo` char(2) DEFAULT NULL COMMENT 'Accesibilidad al Establecimiento',
  `tipo_cam` varchar(100) DEFAULT NULL COMMENT 'Tipo de camino',
  `cod_usuario` int(10) DEFAULT NULL COMMENT 'Codigo de Usurio',
  `fecha_reg` date DEFAULT NULL COMMENT 'Fecha de Registro',
  `fecha_rev` date DEFAULT NULL COMMENT 'Fecha de revision',
  `estado` varchar(100) DEFAULT NULL COMMENT 'Estado',
  `cod_renipres` int(8) DEFAULT NULL COMMENT 'Codigo Renipres'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tb_geolocaliza`
--

INSERT INTO `tb_geolocaliza` (`Id`, `terrpropgeo`, `terrsaneageo`, `areaterrgeo`, `areaconsgeo`, `arealibgeo`, `superfterrenogeo`, `numpisgeo`, `latitudgeo`, `longitudgeo`, `alturageo`, `pobreggeo`, `pobactdisgeo`, `areadistgeo`, `densoblacgeo`, `accessgeo`, `tipo_cam`, `cod_usuario`, `fecha_reg`, `fecha_rev`, `estado`, `cod_renipres`) VALUES
(5, 'Sí', 'Sí', '2537.00', '378.00', '2158.00', '1', NULL, '-12.1477020\n', '-76.2134550\n', 2682, 979565, 1566, NULL, '3.35', '1', 'Trocha\r\n', NULL, '2018-07-02', '2018-08-29', '2', 5875),
(6, 'Si', 'Si', '468.00', '230.00', '238.00', '1', NULL, '-11.0676500\n', '-77.5990570\n', 71, 973074, 36623, NULL, '75.67', '1', 'Camino Peatonal', NULL, '2018-07-02', '2018-07-10', '2', 5682),
(7, 'Si', 'No', '90.00', '90.00', '0.00', '1', NULL, '-11.8000470\n', '-76.3595420\n', 2843, 979565, 4754, NULL, '1.05', '1', 'Trocha', NULL, '2018-07-02', '2018-10-24', '2', 5975),
(8, 'Si', 'Si', '4959.00', '606.00', '4353.00', '2', NULL, '-12.1384379\n', '-76.2345114\n', 3144, 979565, 4579, NULL, '0.81', '1', 'Trocha', NULL, '2018-07-02', '2018-10-24', '2', 5871),
(9, 'Si', 'No', '242.00', '42.00', '200.00', '1', NULL, '-11.7794110\n', '-76.2406980\n', 3928, 979565, 4754, NULL, '11.16', '1', 'Trocha', NULL, '2018-07-02', '2018-10-24', '2', 5974),
(10, 'Si', 'Si', '4455.00', '450.00', '4005.00', '1', 1, '-9.6282450\n', '-74.9753270\n', 209, 885859, 6361, NULL, '3.80', '1', 'Trocha', NULL, '2018-09-06', '2018-10-17', '2', 924),
(11, 'Si', 'Si', '5483.00', '300.00', '5184.00', '1', 1, '-9.5592320\n', '-75.0137190\n', 221, 885859, 6361, '0.00', '3.80', '1', 'Asfaltado', NULL, '2018-09-10', '2018-10-17', '2', 926),
(12, 'Si', 'Si', '3750.00', '180.00', '3570.00', '1', 1, '-9.6679380\n', '-75.0217770\n', 235, 885859, 6361, NULL, '3.80', '1', 'Asfaltado', NULL, '2018-09-11', '2018-10-17', '2', 925),
(13, 'Si', 'No', '10000.00', '100.00', '9900.00', '1', 1, '-9.8081990\n', '-75.0115280\n', 229, 885859, 6361, NULL, '3.80', '1', 'Asfaltado', NULL, '2018-09-11', '2018-09-26', '2', 11071),
(14, 'Si', 'No', '1000.00', '250.00', '750.00', '1', 1, '-9.7875550\n', '-74.9168180\n', 224, 885859, 6361, NULL, '3.80', '1', 'Asfaltado', NULL, '2018-09-11', '2018-09-26', '2', 11107),
(15, 'Si', 'Si', '10000.00', '2004.00', '7996.00', '1', 1, '-9.6694020\n', '-75.4636650\n', 375, 885859, 6860, NULL, '2.06', '1', 'Trocha', NULL, '2018-09-11', '2018-10-17', '2', 927),
(16, 'No', 'Si', '210.00', '108.00', '102.00', '1', NULL, '-9.7241080\n', '-75.0136960\n', 276, 885859, 6361, NULL, '3.80', '1', 'Asfaltado', NULL, '2018-09-12', '2018-09-26', '2', 11070),
(17, 'Si', 'Si', '1053.00', '1053.00', '0.00', '1', NULL, '-9.9324970\n', '-76.2501550\n', 1898, 885859, 87081, NULL, '888.58', '1', 'Asfaltado\r\n', NULL, '2018-09-13', '2018-09-27', '2', 785),
(18, 'Si', 'No', '874.00', '195.00', '679.00', '2', NULL, '-9.4583150\n', '-76.9775500\n', 3722, 885859, 4271, NULL, '41.95', '1', 'Trocha', NULL, '2018-09-13', '2018-10-19', '2', 894),
(19, 'Si', 'No', '1200.00', '850.00', '120.00', '1', NULL, '-3.7420506\n', '-73.3260000\n', 87, 1058946, 153319, NULL, '0.00', '2', NULL, NULL, '2018-08-21', '2018-09-14', '2', 270),
(20, 'Si', 'Si', '988.00', '988.00', '0.00', '1', NULL, '-3.7478119\n', '-73.2658869\n', 91, 995355, 153319, NULL, '0.00', '1', 'Asfaltado', NULL, '2018-08-21', '2018-09-14', '2', 7),
(21, 'Si', 'Si', '2890.00', '1500.00', '139.00', '1', NULL, '-3.7536460\n', '-73.2685078\n', 91, 1058946, 561791, NULL, '0.00', '1', 'Asfaltado', NULL, '2018-08-21', '2018-11-02', '2', 8),
(22, 'Si', 'No', '1800.00', '800.00', '1000.00', '1', NULL, '-3.7177488\n', '-73.2847673\n', 83, 1058946, 153319, NULL, '0.00', '2', NULL, NULL, '2018-08-21', '2018-09-14', '2', 12),
(23, 'Si', 'No', '1200.00', '500.00', '700.00', '1', NULL, '-3.8305506\n', '-73.4623106\n', 104, 1058946, 561791, NULL, '0.00', '2', NULL, 0, '2018-08-21', '2018-11-02', '2', 6945),
(24, 'Si', 'Si', '1405.00', '850.00', '556.00', '1', NULL, '-3.8889880\n', '-73.6967490\n', 96, 1058946, 153319, NULL, '0.00', '2', NULL, 0, '2018-08-21', '2018-11-02', '2', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_paredmuro`
--

CREATE TABLE `tb_paredmuro` (
  `Id` int(11) NOT NULL,
  `ladrillo_cement` char(1) DEFAULT NULL COMMENT 'Ladrillo y cemento',
  `adobe` char(1) DEFAULT NULL COMMENT 'Pared de adobe',
  `drywall` char(1) DEFAULT NULL COMMENT 'Pared de drywall',
  `otro_pared` char(1) DEFAULT NULL COMMENT 'Codigo otra cobertura de pared',
  `descotro_pared` varchar(100) DEFAULT NULL COMMENT 'Descripcion otra cobertura de pared',
  `cod_renipres` int(8) DEFAULT NULL COMMENT 'Codigo Renipres',
  `cod_usuario` int(10) DEFAULT NULL COMMENT 'Codigo Usuario',
  `fecha_reg` date DEFAULT NULL COMMENT 'Fecha de Registro',
  `fecha_rev` date DEFAULT NULL COMMENT 'Fecha de Revision',
  `estado` varchar(100) DEFAULT NULL COMMENT 'Estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_personal`
--

CREATE TABLE `tb_personal` (
  `codpers_estab` char(2) NOT NULL DEFAULT '' COMMENT 'Codigo personal del Establecimiento',
  `cantpers_estab` int(11) DEFAULT NULL COMMENT 'Cantidad personal del Establecimiento',
  `cod_usuario` int(10) DEFAULT NULL COMMENT 'Codigo de Usuario',
  `fecha_reg` date DEFAULT NULL COMMENT 'Fecha registro',
  `fecha_rev` date DEFAULT NULL COMMENT 'Fecha de revision',
  `estado` varchar(100) DEFAULT NULL COMMENT 'Estado',
  `cod_renipres` int(8) DEFAULT NULL COMMENT 'Codigo Renipres'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_piso`
--

CREATE TABLE `tb_piso` (
  `Id` int(11) NOT NULL,
  `cemento` char(1) DEFAULT NULL COMMENT 'Estructura de cemento',
  `vinilico` char(1) DEFAULT NULL COMMENT 'Estructura de vinilico',
  `ceramico` char(1) DEFAULT NULL COMMENT 'Estructura de ceramico',
  `otro_piso` char(1) DEFAULT NULL COMMENT 'Codigo otro piso',
  `descotro_piso` varchar(100) DEFAULT NULL COMMENT 'Descripcion otra estructura de piso',
  `cod_renipres` int(8) DEFAULT NULL COMMENT 'Codigo Renipres',
  `cod_usuario` int(10) DEFAULT NULL COMMENT 'Codigo usuario',
  `fecha_reg` date DEFAULT NULL COMMENT 'Fecha de Registro',
  `fecha_rev` date DEFAULT NULL COMMENT 'Fecha de revision',
  `estado` varchar(100) DEFAULT NULL COMMENT 'Estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_redescomunica`
--

CREATE TABLE `tb_redescomunica` (
  `Id` int(11) NOT NULL,
  `telefono` char(2) DEFAULT NULL COMMENT 'Compania telefonica',
  `oper_telef` char(2) DEFAULT NULL COMMENT 'Operador telefonico',
  `internet` char(2) DEFAULT NULL COMMENT 'Internet del establecimiento',
  `oper_inter` char(2) DEFAULT NULL COMMENT 'Operador de internet del establecimiento',
  `radio` char(2) DEFAULT NULL COMMENT 'Radio del establecimiento',
  `cable` char(2) DEFAULT NULL COMMENT 'Cable del establecimiento',
  `oper_cable` char(2) DEFAULT NULL COMMENT 'Operador de cable del establecimiento',
  `cod_renipres` int(8) DEFAULT NULL COMMENT 'Codigo Renipres',
  `cod_usuario` int(10) DEFAULT NULL COMMENT 'Codigo de Usuario',
  `fecha_reg` date DEFAULT NULL COMMENT 'Fecha de registro',
  `fecha_rev` date DEFAULT NULL COMMENT 'Fecha de revision',
  `estado` varchar(100) DEFAULT NULL COMMENT 'Estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_residuos`
--

CREATE TABLE `tb_residuos` (
  `idresiduos` int(2) NOT NULL COMMENT 'Codigp Residuos',
  `bioconta_resid` decimal(5,2) NOT NULL COMMENT 'Biocontaminados por Kilo',
  `comunes_resid` decimal(5,2) NOT NULL COMMENT 'Comunes por Kilo',
  `especiales_resid` decimal(5,2) NOT NULL COMMENT 'Especiales por Kilo',
  `codtratamiento_resid` char(1) NOT NULL COMMENT 'Codigo Tratamiento de Residuos',
  `tratamiento_resid` varchar(100) NOT NULL COMMENT 'Tratamiento de residuos',
  `operatividad_resid` varchar(100) NOT NULL COMMENT 'Operatividad de residuos',
  `costounit_resid` decimal(5,2) NOT NULL COMMENT 'Costo unitario de traslado de residuos',
  `costomens_resid` decimal(5,2) NOT NULL COMMENT 'Costo mensual de traslado al relleno',
  `ubicacion_resid` varchar(100) NOT NULL COMMENT 'Ubicacion del relleno sanitario',
  `cod_renipres` int(11) NOT NULL COMMENT 'Codigo Renipres',
  `estado` varchar(100) NOT NULL COMMENT 'Estado',
  `fecha_reg` date NOT NULL COMMENT 'Fecha de Registro',
  `fecha_rev` date NOT NULL COMMENT 'Fecha de Revision'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_tecelectricas`
--

CREATE TABLE `tb_tecelectricas` (
  `Id` int(1) NOT NULL,
  `potenciainst` varchar(100) NOT NULL COMMENT 'Potencia instalada',
  `maxdemanda` varchar(100) NOT NULL COMMENT 'Maxima demanda',
  `potenciacont` varchar(100) NOT NULL COMMENT 'Potencia contratada',
  `tarifa_elect` char(1) NOT NULL COMMENT 'Tarifa Electrica',
  `costokw` int(8) NOT NULL COMMENT 'Costo Kw por hora',
  `cant_pozos` int(8) NOT NULL COMMENT 'Cantidad de pozos puesta a tierra',
  `costokvar` int(8) NOT NULL COMMENT 'Costo Kvar por hora',
  `cod_renipres` int(8) NOT NULL COMMENT 'Codigo Renipres',
  `cod_usuario` int(10) NOT NULL COMMENT 'Codigo de usuario',
  `fecha_reg` date NOT NULL COMMENT 'Fecha de registro',
  `fecha_rev` date NOT NULL COMMENT 'Fecha de revision',
  `estado` varchar(100) NOT NULL COMMENT 'estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_ups`
--

CREATE TABLE `tb_ups` (
  `cod_ups` char(2) NOT NULL COMMENT 'Codigo UPS',
  `numtotamb_ups` int(2) NOT NULL COMMENT 'Numero total de ambientes UPS',
  `amb_ups` varchar(100) NOT NULL COMMENT 'Ambientes de la UPS',
  `subamb_ups` varchar(100) NOT NULL COMMENT 'Sub ambientes de la UPS',
  `numsubamb_ups` int(2) NOT NULL COMMENT 'Numero de Sub ambientes UPS',
  `cod_renipres` int(8) NOT NULL COMMENT 'Codigo Renipres',
  `cod_usuario` int(10) NOT NULL COMMENT 'Codigo Usuario',
  `fecha_reg` date NOT NULL COMMENT 'Fecha de Registro',
  `fecha_rev` date NOT NULL COMMENT 'Fecha de Revision',
  `estado` varchar(100) NOT NULL COMMENT 'Estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_upss`
--

CREATE TABLE `tb_upss` (
  `cod_upss` char(2) NOT NULL DEFAULT '' COMMENT 'Codigo UPSS',
  `numtotamb_upss` int(2) DEFAULT NULL COMMENT 'Numero total de ambientes de la UPSS',
  `amb_upss` varchar(100) NOT NULL COMMENT 'Ambientes de la UPSS',
  `subamb_upss` varchar(100) NOT NULL COMMENT 'Sub ambientes de la UPSS',
  `numsubamb_upss` int(2) NOT NULL COMMENT 'Numero de sub ambientes de la UPSS',
  `cod_renipres` int(8) NOT NULL COMMENT 'Codigo Renipres',
  `cod_usuario` int(10) NOT NULL COMMENT 'Codigo Usuario',
  `fecha_reg` date NOT NULL COMMENT 'Fecha de Registro',
  `fecha_rev` date NOT NULL COMMENT 'Fecha de Revision',
  `estado` varchar(100) NOT NULL COMMENT 'Estado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `cod_usuario` int(10) NOT NULL COMMENT 'Codigo usuario',
  `nombre_usuario` varchar(30) NOT NULL COMMENT 'Nombre usuario',
  `apellido_usuario` varchar(30) NOT NULL COMMENT 'Apellido usuario',
  `permisos_usuario` varchar(100) NOT NULL COMMENT 'Permisos de usuario',
  `telf_usuario` varchar(30) NOT NULL COMMENT 'Telefono de usuario',
  `celular_usuario` varchar(30) NOT NULL COMMENT 'Celular de usuario',
  `correo_usuario` varchar(30) NOT NULL COMMENT 'Correo usuario',
  `fecha_reg` date NOT NULL COMMENT 'Fecha de Registro',
  `fecha_rev` date NOT NULL COMMENT 'Fecha de Revision'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_coberturatecho`
--
ALTER TABLE `tb_coberturatecho`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `cod_renipres` (`cod_renipres`);

--
-- Indices de la tabla `tb_desague`
--
ALTER TABLE `tb_desague`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `cod_renipres` (`cod_renipres`);

--
-- Indices de la tabla `tb_distancias`
--
ALTER TABLE `tb_distancias`
  ADD KEY `cod_renipres` (`cod_renipres`);

--
-- Indices de la tabla `tb_establecimiento`
--
ALTER TABLE `tb_establecimiento`
  ADD PRIMARY KEY (`cod_renipres`);

--
-- Indices de la tabla `tb_estadocons`
--
ALTER TABLE `tb_estadocons`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `cod_renipres` (`cod_renipres`);

--
-- Indices de la tabla `tb_estructuratecho`
--
ALTER TABLE `tb_estructuratecho`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `cod_renipres` (`cod_renipres`);

--
-- Indices de la tabla `tb_fuenteagua`
--
ALTER TABLE `tb_fuenteagua`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `cod_renipres` (`cod_renipres`);

--
-- Indices de la tabla `tb_fuenteelect`
--
ALTER TABLE `tb_fuenteelect`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `cod_renipres` (`cod_renipres`);

--
-- Indices de la tabla `tb_geolocaliza`
--
ALTER TABLE `tb_geolocaliza`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `cod_renipres` (`cod_renipres`);

--
-- Indices de la tabla `tb_paredmuro`
--
ALTER TABLE `tb_paredmuro`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `cod_renipres` (`cod_renipres`);

--
-- Indices de la tabla `tb_personal`
--
ALTER TABLE `tb_personal`
  ADD PRIMARY KEY (`codpers_estab`),
  ADD KEY `cod_renipres` (`cod_renipres`);

--
-- Indices de la tabla `tb_piso`
--
ALTER TABLE `tb_piso`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `cod_renipres` (`cod_renipres`);

--
-- Indices de la tabla `tb_redescomunica`
--
ALTER TABLE `tb_redescomunica`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `cod_renipres` (`cod_renipres`);

--
-- Indices de la tabla `tb_residuos`
--
ALTER TABLE `tb_residuos`
  ADD PRIMARY KEY (`idresiduos`),
  ADD KEY `cod_renipres` (`cod_renipres`);

--
-- Indices de la tabla `tb_tecelectricas`
--
ALTER TABLE `tb_tecelectricas`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `cod_renipres` (`cod_renipres`);

--
-- Indices de la tabla `tb_ups`
--
ALTER TABLE `tb_ups`
  ADD PRIMARY KEY (`cod_ups`),
  ADD KEY `cod_renipres` (`cod_renipres`);

--
-- Indices de la tabla `tb_upss`
--
ALTER TABLE `tb_upss`
  ADD PRIMARY KEY (`cod_upss`),
  ADD KEY `cod_renipres` (`cod_renipres`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_coberturatecho`
--
ALTER TABLE `tb_coberturatecho`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_desague`
--
ALTER TABLE `tb_desague`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_establecimiento`
--
ALTER TABLE `tb_establecimiento`
  MODIFY `cod_renipres` int(8) NOT NULL AUTO_INCREMENT COMMENT 'Codigo Renipres', AUTO_INCREMENT=98418;
--
-- AUTO_INCREMENT de la tabla `tb_estadocons`
--
ALTER TABLE `tb_estadocons`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT de la tabla `tb_estructuratecho`
--
ALTER TABLE `tb_estructuratecho`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_fuenteagua`
--
ALTER TABLE `tb_fuenteagua`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_fuenteelect`
--
ALTER TABLE `tb_fuenteelect`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_geolocaliza`
--
ALTER TABLE `tb_geolocaliza`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `tb_paredmuro`
--
ALTER TABLE `tb_paredmuro`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_piso`
--
ALTER TABLE `tb_piso`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_redescomunica`
--
ALTER TABLE `tb_redescomunica`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_residuos`
--
ALTER TABLE `tb_residuos`
  MODIFY `idresiduos` int(2) NOT NULL AUTO_INCREMENT COMMENT 'Codigp Residuos';
--
-- AUTO_INCREMENT de la tabla `tb_tecelectricas`
--
ALTER TABLE `tb_tecelectricas`
  MODIFY `Id` int(1) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_coberturatecho`
--
ALTER TABLE `tb_coberturatecho`
  ADD CONSTRAINT `tb_coberturatecho_ibfk_1` FOREIGN KEY (`cod_renipres`) REFERENCES `tb_establecimiento` (`cod_renipres`);

--
-- Filtros para la tabla `tb_desague`
--
ALTER TABLE `tb_desague`
  ADD CONSTRAINT `tb_desague_ibfk_1` FOREIGN KEY (`cod_renipres`) REFERENCES `tb_establecimiento` (`cod_renipres`);

--
-- Filtros para la tabla `tb_distancias`
--
ALTER TABLE `tb_distancias`
  ADD CONSTRAINT `tb_distancias_ibfk_1` FOREIGN KEY (`cod_renipres`) REFERENCES `tb_establecimiento` (`cod_renipres`);

--
-- Filtros para la tabla `tb_estructuratecho`
--
ALTER TABLE `tb_estructuratecho`
  ADD CONSTRAINT `tb_estructuratecho_ibfk_1` FOREIGN KEY (`cod_renipres`) REFERENCES `tb_establecimiento` (`cod_renipres`);

--
-- Filtros para la tabla `tb_fuenteagua`
--
ALTER TABLE `tb_fuenteagua`
  ADD CONSTRAINT `tb_fuenteagua_ibfk_1` FOREIGN KEY (`cod_renipres`) REFERENCES `tb_establecimiento` (`cod_renipres`);

--
-- Filtros para la tabla `tb_fuenteelect`
--
ALTER TABLE `tb_fuenteelect`
  ADD CONSTRAINT `tb_fuenteelect_ibfk_1` FOREIGN KEY (`cod_renipres`) REFERENCES `tb_establecimiento` (`cod_renipres`);

--
-- Filtros para la tabla `tb_geolocaliza`
--
ALTER TABLE `tb_geolocaliza`
  ADD CONSTRAINT `tb_geolocaliza_ibfk_1` FOREIGN KEY (`cod_renipres`) REFERENCES `tb_establecimiento` (`cod_renipres`);

--
-- Filtros para la tabla `tb_paredmuro`
--
ALTER TABLE `tb_paredmuro`
  ADD CONSTRAINT `tb_paredmuro_ibfk_1` FOREIGN KEY (`cod_renipres`) REFERENCES `tb_establecimiento` (`cod_renipres`);

--
-- Filtros para la tabla `tb_personal`
--
ALTER TABLE `tb_personal`
  ADD CONSTRAINT `tb_personal_ibfk_1` FOREIGN KEY (`cod_renipres`) REFERENCES `tb_establecimiento` (`cod_renipres`);

--
-- Filtros para la tabla `tb_piso`
--
ALTER TABLE `tb_piso`
  ADD CONSTRAINT `tb_piso_ibfk_1` FOREIGN KEY (`cod_renipres`) REFERENCES `tb_establecimiento` (`cod_renipres`);

--
-- Filtros para la tabla `tb_redescomunica`
--
ALTER TABLE `tb_redescomunica`
  ADD CONSTRAINT `tb_redescomunica_ibfk_1` FOREIGN KEY (`cod_renipres`) REFERENCES `tb_establecimiento` (`cod_renipres`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
