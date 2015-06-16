-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generaci�n: 17-02-2010 a las 20:56:02
-- Versi�n del servidor: 5.1.36
-- Versi�n de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de datos: `bdgimnasio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deportista`
--

CREATE TABLE IF NOT EXISTS `deportista` (
  `DEP_IDE` varchar(15) NOT NULL,
  `DEP_APE` varchar(40) NOT NULL,
  `DEP_NOM` varchar(40) NOT NULL,
  `DEP_SEX` enum('M','F') NOT NULL,
  `DEP_FEN` datetime NOT NULL,
  `DEP_EST` decimal(4,2) NOT NULL,
  `DEP_PES` decimal(4,2) NOT NULL,
  `DEP_GRS` varchar(3) NOT NULL,
  `DEP_EMA` varchar(40) NOT NULL,
  `DEP_CON` varchar(40) NOT NULL,
  `DEP_DIR` varchar(50) NOT NULL,
  `DEP_TEL` varchar(10) NOT NULL,
  `DEP_CEL` varchar(12) NOT NULL,
  `PRO_IDE` int(4) NOT NULL,
  `TID_IDE` varchar(2) NOT NULL,
  `DEP_FHR` datetime NOT NULL,
  `DEP_ESD` int(2) NOT NULL,
  `DEP_TIU` int(2) NOT NULL,
  PRIMARY KEY (`DEP_IDE`),
  KEY `DEPORTISTA_TIPODEPORTISTA` (`TID_IDE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `deportista`
--

INSERT INTO `deportista` (`DEP_IDE`, `DEP_APE`, `DEP_NOM`, `DEP_SEX`, `DEP_FEN`, `DEP_EST`, `DEP_PES`, `DEP_GRS`, `DEP_EMA`, `DEP_CON`, `DEP_DIR`, `DEP_TEL`, `DEP_CEL`, `PRO_IDE`, `TID_IDE`, `DEP_FHR`, `DEP_ESD`, `DEP_TIU`) VALUES
('93378156', 'GUARIN', 'NELSON', 'M', '1969-09-25 00:00:00', '99.99', '84.00', 'O+', 'nguarin@gmail.com', 'ce58e9302ce21a9be2e4530bd7b3dddf24e7e7b0', 'CALLE 10', '2783743', '3164640520', 1, '2', '2010-02-15 15:20:32', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepe`
--

CREATE TABLE IF NOT EXISTS `detallepe` (
  `PLE_IDE` int(10) NOT NULL,
  `EJE_IDE` int(4) NOT NULL,
  `DPE_DIA` varchar(10) NOT NULL,
  `DPE_SER` int(4) NOT NULL,
  `DPE_REP` int(4) NOT NULL,
  `DPE_TIE` int(4) NOT NULL,
  PRIMARY KEY (`PLE_IDE`,`EJE_IDE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `detallepe`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio`
--

CREATE TABLE IF NOT EXISTS `ejercicio` (
  `EJE_IDE` int(4) NOT NULL AUTO_INCREMENT,
  `EJE_NOM` varchar(50) NOT NULL,
  `EJE_DES` varchar(100) NOT NULL,
  `EJE_FOT` varchar(30) NOT NULL,
  `MAQ_IDE` int(4) NOT NULL,
  `MOD_IDE` int(4) NOT NULL,
  PRIMARY KEY (`EJE_IDE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=209 ;

--
-- Volcar la base de datos para la tabla `ejercicio`
--

INSERT INTO `ejercicio` (`EJE_IDE`, `EJE_NOM`, `EJE_DES`, `EJE_FOT`, `MAQ_IDE`, `MOD_IDE`) VALUES
(1, 'ELEVACIONES LATERALES', 'SIRVE PARA EL AUMENTO DE PESO', '', 3, 3),
(2, 'ELEVACIONES POSTERIORES', 'SIRVE PARA EL AUMENTO DEL PESO', '', 4, 3),
(3, 'PRESS MANCUERNA HOMBRO', 'SIRVE PARA EL AUMENTO DEL PESO', '', 4, 3),
(4, 'REMO DE PIE', 'SIRVE PARA EL AUMENTO DEL PESO', '', 5, 3),
(5, 'ENCOJIMIENTO HOMBRO BARRA', 'SIRVE PARA EL AUMENTO DEL PESO', '', 5, 3),
(6, 'PRESS BANCO AGARRE ESTRECHO', 'SIRVE PARA EL AUMENTO DEL PESO', '', 4, 3),
(7, 'EXTENCION POLEA BARRA RECTA', 'SIRVE PARA EL AUMENTO DEL PESO', '', 3, 3),
(8, 'EXTENCION MANCUERNA 2 BRAZOS', 'SIRVE PARA EL AUMENTO DEL PESO', '', 3, 3),
(9, 'EXTENCION PIERNAS', 'SIRVE PARA EL AUMENTO DEL PESO', '', 2, 3),
(10, 'SENTADILLA', 'SIRVE PARA EL AUMENTO DEL PESO', '', 8, 3),
(11, 'PRENSA', 'SIRVE PARA EL AUMENTO DEL PESO', '', 2, 3),
(12, 'ELEVACIONES TALONES', 'SIRVE PARA EL AUMENTO DEL PESO', '', 2, 3),
(13, 'GEMELOS', 'SIRVE PARA EL AUMENTO DEL PESO', '', 8, 3),
(14, 'PRESS BACO PLANO', 'SIRVE PARA EL AUMENTO DEL PESO', '', 2, 3),
(15, 'PRESS BANCO INCLINADO', 'SIRVE PARA EL AUMENTO DEL PESO', '', 2, 3),
(16, 'PRESS DECLINADO MANCUERNA', 'SIRVE PARA EL AUMENTO DEL PESO', '', 8, 3),
(17, 'PULL OVER MANCUERNA', 'SIRVE PARA EL AUMENTO DEL PESO', '', 2, 3),
(18, 'ELEVACIONES PIERNAS', 'SIRVE PARA EL AUMENTO DEL PESO', '', 8, 3),
(19, 'ENCOJIMIENTO TRONCO', 'SIRVE PARA EL AUMENTO DEL PESO', '', 2, 3),
(20, 'JALON POLEA POR DELANTE', 'SIRVE PARA EL AUMENTO DEL PESO', '', 3, 3),
(21, 'REMO INCLINADO BARRA', 'SIRVE PARA EL AUMENTO DEL PESO', '', 5, 3),
(22, 'PESO MUERTO PIERNA DOBLADA', 'SIRVE PARA EL AUMENTO DEL PESO', '', 7, 3),
(23, 'CURL BICEPS MANCUERNA', 'SIRVE PARA EL AUMENTO DEL PESO', '', 4, 3),
(24, 'CURL BICEPS PREDICADOR', 'SIRVE PARA EL AUMENTO DEL PESO', '', 4, 3),
(25, 'LEG CURL FEMORAL', 'SIRVE PARA EL AUMENTO DEL PESO', '', 2, 3),
(26, 'GEMELO', 'SIRVE PARA EL AUMENTO DEL PESO', '', 8, 3),
(27, 'ELEVACION TALONES SENTADOS', 'SIRVE PARA EL AUMENTO DEL PESO', '', 8, 3),
(28, 'PRESS BANCO PLANO MANCUERNA', 'SIRVE PARA EL AUMENTO DE PESO', '', 5, 3),
(29, 'APERTONES BANCO PLANO', 'SIRVE PARA EL AUMENTO DE PESO', '', 9, 3),
(30, 'PRESS HOMBRO MANCUERNA', 'SIRVE PARA EL AUMENTO DE PESO', '', 4, 3),
(31, 'ELEVACIONES FRONTALES', 'SIRVE PARA EL AUMENTO DE PESO', '', 9, 3),
(32, 'TRICEP COPA', 'SIRVE PARA EL AUMENTO DE PESO', '', 3, 3),
(33, 'ABDOMINALES CIRCUITO', 'SIRVE PARA EL AUMENTO DE PESO', '', 6, 3),
(34, 'SENTADILLA BARRA O MANCUERNA', 'SIRVE PARA EL AUMENTO DE PESO', '', 8, 3),
(35, 'TIJERAS MANCUERNA', 'SIRVE PARA EL AUMENTO DE PESO', '', 2, 3),
(36, 'FLEXION FEMORAL', 'SIRVE PARA EL AUMENTO DE PESO', '', 2, 3),
(37, 'GLUTEOS COLCHONETA', 'SIRVE PARA EL AUMENTO DE PESO', '', 7, 3),
(38, 'EXTENCION CUADRICEPS', 'SIRVE PARA EL AUMENTO DE PESO', '', 8, 3),
(39, 'ABDUCTORES', 'SIRVE PARA EL AUMENTO DE PESO', '', 8, 3),
(40, 'GEMELO', 'SIRVE PARA EL AUMENTO DE PESO', '', 8, 3),
(41, 'JALON POLEA POR DELANTE', 'SIRVE PARA EL AUMENTO DE PESO', '', 3, 3),
(42, 'REMO POLEA', 'SIRVE PARA EL AUMENTO DE PESO', '', 3, 3),
(43, 'REMO LATERAL MANCUERNA', 'SIRVE PARA EL AUMENTO DE PESO', '', 5, 3),
(44, 'HIPEREXTENCIONES BANCO ROMANO', 'SIRVE PARA EL AUMENTO DE PESO', '', 8, 3),
(45, 'CURL BICEPS  BARRA', 'SIRVE PARA EL AUMENTO DE PESO', '', 4, 3),
(46, 'CURL BICEPS  MANCUERNA', 'SIRVE PARA EL AUMENTO DE PESO', '', 5, 3),
(47, 'CIRCUITO ABDOMINAL BANCO ROMANO', 'SIRVE PARA EL AUMENTO DE PESO', '', 6, 3),
(48, 'SENTADILLA BARRA O MANCUERNA', 'SIRVE PARA EL AUMENTO DE PESO', '', 2, 3),
(49, 'TIJERAS MANCUERNA', 'SIRVE PARA EL AUMENTO DE PESO', '', 8, 3),
(50, 'FLEXION FEMORAL', 'SIRVE PARA EL AUMENTO DE PESO', '', 8, 3),
(51, 'EXTENCION CUADRICEPS', 'SIRVE PARA EL AUMENTO DE PESO', '', 8, 3),
(52, 'GLUTEOS COLCHONETA', 'SIRVE PARA EL AUMENTO DE PESO', '', 7, 3),
(53, 'ABDUCTORES', 'SIRVE PARA EL AUMENTO DE PESO', '', 2, 3),
(54, 'GEMELO', 'SIRVE PARA EL AUMENTO DE PESO', '', 8, 3),
(55, 'ENCIMA DE LA POLEA', 'SIRVE PARA EL AUMENTO DE PESO', '', 3, 3),
(56, 'FLEXIONES ENTRE BANCOS', 'SIRVE PARA EL AUMENTO DE PESO', '', 8, 3),
(57, 'PATADAS CON MANCUERNA', 'SIRVE PARA EL AUMENTO DE PESO', '', 7, 3),
(58, 'SENTADILLA FRONTAL PRENSA', 'SIRVE PARA EL AUMENTO DE PESO', '', 2, 3),
(59, 'SENTADILLA SISY', 'SIRVE PARA EL AUMENTO DE PESO', '', 2, 3),
(60, 'ZANCADA CON MANCUERNA', 'SIRVE PARA EL AUMENTO DE PESO', '', 2, 3),
(61, 'ENCOGIMIENTO CON BALON MEDICINAL', 'SIRVE PARA EL AUMENTO DE PESO', '', 5, 3),
(62, 'ELEVACIONES DE RODILLAS', 'SIRVE PARA EL AUMENTO DE PESO', '', 8, 3),
(63, 'PRESS BANCO PLANO ', 'SIRVE PARA REDUCCION DE PESO', '', 4, 2),
(64, 'EXTENCION CUADRICEPS', 'SIRVE PARA REDUCCION DE PESO', '', 8, 2),
(65, 'JALON POLEA POR DETRAS', 'SIRVE PARA REDUCCION DE PESO', '', 8, 2),
(66, 'FLEXION FEMORAL', 'SIRVE PARA REDUCCION DE PESO', '', 8, 2),
(67, 'PRESS HOMBRO MANCUERNA', 'SIRVE PARA REDUCCION DE PESO', '', 5, 2),
(68, 'TRICEP COPA', 'SIRVE PARA REDUCCION DE PESO', '', 8, 2),
(69, 'GLUTEOS MAQUINA', 'SIRVE PARA REDUCCION DE PESO', '', 7, 2),
(70, 'ABDUCTORES', 'SIRVE PARA REDUCCION DE PESO', '', 8, 2),
(71, 'SENTADILLA', 'SIRVE PARA REDUCCION DE PESO', '', 2, 2),
(72, 'PRESS INCLINADO CON MANCUERNA', 'SIRVE PARA REDUCCION DE PESO', '', 4, 2),
(73, 'PRESS BANCO MULTIPOWER', 'SIRVE PARA REDUCCION DE PESO', '', 8, 2),
(74, 'APERTURAS EN BANCO PLANO', 'SIRVE PARA REDUCCION DE PESO', '', 5, 2),
(75, 'DOBLE ENCOGIMIENTO', 'SIRVE PARA REDUCCION DE PESO', '', 6, 2),
(76, 'ENCOGIMIENTO EN POLEA', 'SIRVE PARA REDUCCION DE PESO', '', 9, 2),
(77, 'DOMINADOS', 'SIRVE PARA REDUCCION DE PESO', '', 1, 2),
(78, 'JALON POLEA AGARRE INVERTIDO', 'SIRVE PARA REDUCCION DE PESO', '', 3, 2),
(79, 'REMO CON BARRA', 'SIRVE PARA REDUCCION DE PESO', '', 3, 2),
(80, 'REMO A UNA MANO', 'SIRVE PARA REDUCCION DE PESO', '', 3, 2),
(81, 'ELEVACIONES DE TALONES PIE', 'SIRVE PARA REDUCCION DE PESO', '', 2, 2),
(82, 'ELEVACIONES DE TALONES SENTADO', 'SIRVE PARA REDUCCION DE PESO', '', 2, 2),
(83, 'CURL DE BRAZOS CON MANCUERNA', 'SIRVE PARA REDUCCION DE PESO', '', 5, 2),
(84, 'CURL DE BRAZOS EN BANCO INCLINADO', 'SIRVE PARA REDUCCION DE PESO', '', 5, 2),
(85, 'CURL DE BRAZOS AGARRE INVERTIDO', 'SIRVE PARA REDUCCION DE PESO', '', 5, 2),
(86, 'EXTENCION DE TRICEPS BARRA Z', 'SIRVE PARA REDUCCION DE PESO', '', 8, 2),
(87, 'GLUTEOS MAQUINA', 'SIRVE PARA REDUCCION DE PESO', '', 7, 2),
(88, 'EXTENCION CUADRICEPS', 'SIRVE PARA REDUCCION DE PESO', '', 8, 2),
(89, 'GLUTEOS COLCHONETA', 'SIRVE PARA REDUCCION DE PESO', '', 7, 2),
(90, 'FLEXION FEMORAL', 'SIRVE PARA REDUCCION DE PESO', '', 2, 2),
(91, 'ABDOMINALES COLCHONETAS', 'SIRVE PARA REDUCCION DE PESO', '', 3, 2),
(92, 'ABDUCTORES', 'SIRVE PARA REDUCCION DE PESO', '', 2, 2),
(93, 'PRESS BANCO PLANO ', 'SIRVE PARA REDUCCION DE PESO', '', 4, 2),
(94, 'EXTENCION CUADRICEPS', 'SIRVE PARA REDUCCION DE PESO', '', 5, 2),
(95, 'GLUTEOS COLCHONETA', 'SIRVE PARA REDUCCION DE PESO', '', 7, 2),
(96, 'JALON POLEA POR DETRAS', 'SIRVE PARA REDUCCION DE PESO', '', 2, 2),
(97, 'FLEXION FEMORAL', 'SIRVE PARA REDUCCION DE PESO', '', 2, 2),
(98, 'PRESS HOMBRO MANCUERNA', 'SIRVE PARA REDUCCION DE PESO', '', 4, 2),
(99, 'TRICEP COPA', 'SIRVE PARA REDUCCION DE PESO', '', 3, 2),
(100, 'GLUTEOS MAQUINA', 'SIRVE PARA REDUCCION DE PESO', '', 7, 2),
(101, 'ABDUCTORES', 'SIRVE PARA REDUCCION DE PESO', '', 2, 2),
(102, 'SENTADILLA', 'SIRVE PARA REDUCCION DE PESO', '', 2, 2),
(103, 'GLUTEOS MAQUINA', 'SIRVE PARA REDUCCION DE PESO', '', 7, 2),
(104, 'EXTENCION CUADRICEPS', 'SIRVE PARA REDUCCION DE PESO', '', 2, 2),
(105, 'GLUTEOS COLCHONETA', 'SIRVE PARA REDUCCION DE PESO', '', 7, 2),
(106, 'FLEXION FEMORAL', 'SIRVE PARA REDUCCION DE PESO', '', 2, 2),
(107, 'ABDOMINALES COLCHONETAS', 'SIRVE PARA REDUCCION DE PESO', '', 6, 2),
(108, 'ABDUCTORES', 'SIRVE PARA REDUCCION DE PESO', '', 2, 2),
(109, 'PRESS BANCO PLANO ', 'SIRVE PARA REDUCCION DE PESO', '', 4, 2),
(110, 'APERTURAS PLANOS', 'SIRVE PARA REDUCCION DE PESO', '', 8, 2),
(111, 'PRESS INCLINADO', 'SIRVE PARA REDUCCION DE PESO', '', 9, 2),
(112, 'PEK DEK', 'SIRVE PARA REDUCCION DE PESO', '', 4, 2),
(113, 'PULL OVER', 'SIRVE PARA REDUCCION DE PESO', '', 6, 2),
(114, 'PRESS SENTADO MANCUERNA', 'SIRVE PARA REDUCCION DE PESO', '', 4, 2),
(115, 'TRAPECIO BARRA', 'SIRVE PARA REDUCCION DE PESO', '', 5, 2),
(116, 'ELEVACIONES FRONTALES', 'SIRVE PARA REDUCCION DE PESO', '', 4, 2),
(117, 'EXTENCION CUADRICEPS', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 8, 4),
(118, 'PESO MUERTO', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 5, 4),
(119, 'CURL FEMORAL', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 8, 4),
(120, 'HAKA', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 2, 4),
(121, 'ELEVACIONES GEMELOS SENTADO', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 8, 4),
(122, 'GEMELOS DE PIE', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 8, 4),
(123, 'CURL BICEP INTERNO', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 8, 4),
(124, 'EXTENCION POLEA', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 3, 4),
(125, 'CURL BARRA', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 4, 4),
(126, 'PRESS FRANCES', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 5, 4),
(127, 'CURL POLEA', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 3, 4),
(128, 'EXTENCIONES INVERTIDAS', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 5, 4),
(129, 'JALON POLEA INVERTIDA', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 3, 4),
(130, 'REMO POLEA SENTADO', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 3, 4),
(131, 'REMO MANCUERNA', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 3, 4),
(132, 'REMO BARRA T', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 3, 4),
(133, 'JALON POLEA POR DETRAS', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 3, 4),
(134, 'REMO INCLINADO BARRA', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 3, 4),
(135, 'SENTADILLA', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 2, 4),
(136, 'GLUTEOS MAQUINA', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 7, 4),
(137, 'CUADRICEP', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 8, 4),
(138, 'GLUTEOS COLCHONETA', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 7, 4),
(139, 'FEMORALES', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 2, 4),
(140, 'ABDUCTORES', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 8, 4),
(141, 'PRESS BANCO PLANO MANCUERNA', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 5, 4),
(142, 'APERTONES BANCO PLANO', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 5, 4),
(143, 'PULL OVER MANCUERNA', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 3, 4),
(144, 'PRESS HOMBRO MANCUERNA', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 4, 4),
(145, 'ELEVACIONES LATERALES', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 4, 4),
(146, 'ELEVACIONES FRONTALES', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 4, 4),
(147, 'TRICEP COPA', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 2, 4),
(148, 'ABDOMINALES CIRCUITO', 'SIRVE PARA EL MANTENIMIENTO FISICO ', '', 6, 4),
(149, 'PRESS DECLINADO BARRA', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 4, 1),
(150, 'PRESS INCLINADO  MANCUERNA', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 4, 1),
(151, 'APERTURAS PLANAS', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 5, 1),
(152, 'CURL MANCUERNAS ALTERNO', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 3, 1),
(153, 'CURL CONCENTRADO', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 3, 1),
(154, 'CURL BICEPS PREDICADOR POLEA', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 3, 1),
(155, 'FLEXION MU�ECA ANTEBRAZO', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 8, 1),
(156, 'FLEXION MU�ECA INVERTIDA', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 8, 1),
(157, 'SENTADILLA', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 2, 1),
(158, 'HAKA', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 2, 1),
(159, 'EXTENCION CUADRICEPS', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 2, 1),
(160, 'FLEXION FEMORAL', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 2, 1),
(161, 'GEMELOS PRENSA\r\n', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 2, 1),
(162, 'GEMELOS HOKA', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 2, 1),
(163, 'ABDOMINALES EN BANCO', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 6, 1),
(164, 'PRESS HOMBRO MANCUERNA', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 5, 1),
(165, 'ELEVACIONES LATERALES', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 8, 1),
(166, 'ELEVACIONES FRONTALES', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 8, 1),
(167, 'REMO TRAPECIO', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 4, 1),
(168, 'PRESS FRANCES TRICEPS SENTADO', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 8, 1),
(169, 'EXTENCION TRICEP POLEA', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 3, 1),
(170, 'ABDOMINALES TABLA', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 6, 1),
(171, 'REMO BARRA INVERTIDO', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 4, 1),
(172, 'JALON CERRADO AL PECHO', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 9, 1),
(173, 'REMO LATERAL', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 3, 1),
(174, 'PRESS MUERTO LUMBARES', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 4, 1),
(175, 'FLEXION FEMORAL', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 2, 1),
(176, 'FLEXION FEMORAL DE PIE', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 2, 1),
(177, 'GEMELOS PRENSA', 'EL FISICULTURISMO SIRVE PARA TONIFICAR LAS PARTES DEL CUERPO', '', 8, 1),
(178, 'PRESS DECLINADO BARRA', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 4, 5),
(179, 'PRESS INCLINADO  MANCUERNA', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 4, 5),
(180, 'APERTURAS PLANAS', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 3, 5),
(181, 'CURL MANCUERNAS ALTERNO', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 3, 5),
(182, 'CURL CONCENTRADO', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 3, 5),
(183, 'CURL BICEPS PREDICADOR POLEA', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 3, 5),
(184, 'FLEXION MU�ECA ANTEBRAZO', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 8, 5),
(185, 'FLEXION MU�ECA INVERTIDA', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 8, 5),
(186, 'SENTADILLA', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 2, 5),
(187, 'HAKA', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 2, 5),
(188, 'EXTENCION CUADRICEPS', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 8, 5),
(189, 'FLEXION FEMORAL', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 2, 5),
(190, 'GEMELOS PRENSA', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 8, 5),
(191, 'GEMELOS HOKA', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 8, 5),
(192, 'ABDOMINALES EN BANCO', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 6, 5),
(193, 'PRESS HOMBRO MANCUERNA', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 4, 5),
(194, 'ELEVACIONES LATERALES', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 5, 5),
(195, 'ELEVACIONES FRONTALES', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 5, 5),
(196, 'REMO TRAPECIO', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 4, 5),
(197, 'PRESS FRANCES TRICEPS SENTADO', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 8, 5),
(198, 'EXTENCION TRICEP POLEA', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 8, 5),
(199, 'ABDOMINALES TABLA', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 6, 5),
(200, 'REMO BARRA INVERTIDO', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 5, 5),
(201, 'JALON CERRADO AL PECHO', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 9, 5),
(202, 'REMO LATERAL', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 5, 5),
(203, 'PESO MUERTO LUMBARES', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 4, 5),
(204, 'FLEXION FEMORAL', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 2, 5),
(205, 'FLEXION FEMORAL DE PIE', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 8, 5),
(206, 'GEMELOS PRENSA', 'LA RECUPERACION FISICA SIRVE PARA TENER EN CUENTA LOS LIQUIDOS QUE SE GENERA DE UN ENTRENAMIENTO.', '', 2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultad`
--

CREATE TABLE IF NOT EXISTS `facultad` (
  `FAC_IDE` int(4) NOT NULL AUTO_INCREMENT,
  `FAC_NOM` varchar(50) NOT NULL,
  PRIMARY KEY (`FAC_IDE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `facultad`
--

INSERT INTO `facultad` (`FAC_IDE`, `FAC_NOM`) VALUES
(1, 'Ingenieria'),
(2, 'Ciencias Economicas y Administrativas'),
(3, 'Derecho y Ciencia'),
(4, 'Humanidades y Ciencias Sociales'),
(5, 'Artes Integradas'),
(6, 'Ciencias Naturales y Matematicas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE IF NOT EXISTS `ingreso` (
  `ING_NUM` bigint(10) NOT NULL AUTO_INCREMENT,
  `ING_FHI` datetime NOT NULL,
  `ING_FHS` datetime NOT NULL,
  `DEP_IDE` varchar(15) NOT NULL,
  PRIMARY KEY (`ING_NUM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `ingreso`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina`
--

CREATE TABLE IF NOT EXISTS `maquina` (
  `MAQ_IDE` int(4) NOT NULL AUTO_INCREMENT,
  `MAQ_NOM` varchar(50) NOT NULL,
  `MAQ_DES` varchar(100) NOT NULL,
  `TIM_IDE` int(4) NOT NULL,
  PRIMARY KEY (`MAQ_IDE`),
  KEY `MAQUINA_TIPOMAQUINA` (`TIM_IDE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcar la base de datos para la tabla `maquina`
--

INSERT INTO `maquina` (`MAQ_IDE`, `MAQ_NOM`, `MAQ_DES`, `TIM_IDE`) VALUES
(1, 'Eliptica', 'Sirve para eliminar grasa de estomago y muslos', 1),
(2, 'Bicicletas Spinning', 'nos contribuye al cuidado  de las piernas , caderas, ayuda a la perdida de peso,reduce la celulitis.', 1),
(3, 'Trotadora', 'es bueno para el  sistema cardiovascular, ayuda a quemar calorias, fortalece las piernas y es bueno ', 1),
(4, 'Cable Cross Over', '', 2),
(5, 'Smith Multiestacion', 'Estas m�quinas te permitir�n ejercitar todos los m�sculos del cuerpo', 2),
(6, 'Soporte Sentadilla', '', 3),
(7, 'Abductor', 'sirve para aumentar cadera y pierna en conjunto.', 3),
(8, 'Hacka', 'su finalidad es  el desarrollo en conjunto de los musculos de las piernas y gemelos', 3),
(9, 'Leg Curl', 'Desarrolla el b�ceps femoral de la pierna. El asiento toma doble posici�n �sea en forma de joroba.', 3),
(10, 'Smith ', 'con 8 ganchos de seguridad para seleccionar la altura de cada persona para ejecutar las sentadillas ', 3),
(11, 'Leg Extencion ', 'Desarrolla los cuadriceps de la pierna.', 3),
(12, 'Pec Deck', 'Maquina que se usa como contractor del m�sculo pectoral.', 4),
(13, 'Press Frontal', 'sirve para aumentar la masa muscular, tonificar y marcar', 4),
(14, 'press Plano', ' sirve para  trabajar el pectoral mayor, del pectoral menor y en menor medida de los tr�ceps.', 4),
(15, 'Press Declinado', 'sirve para el pectoral alto.', 4),
(16, 'Banco De Hombro', 'sirve para la tonificacion muscular del musculo deltoides en sus tres porciones: anterior, lateral.', 5),
(17, 'Press Hombro', '', 5),
(18, 'Banco Abdominal', 'Banco para la tonificaci�n de la musculatura abdominal, b�sicamente el recto del abdomen y los obl�c', 6),
(19, 'Banco fijo', '', 6),
(20, 'Elevaciones De Pierna', 'sirve para trabajar principalmente la zona inferior de los m�sculos abdominales.', 6),
(21, 'Barra De Discos', '', 7),
(22, 'Soporte De Discos', '', 7),
(23, 'Soporte De Mancuernas', '', 7),
(24, 'Dos Bases De Mancuerna', '', 7),
(25, 'Soporte Fijo', '', 7),
(26, 'Soporte Para Mancuerna', '', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad`
--

CREATE TABLE IF NOT EXISTS `modalidad` (
  `MOD_IDE` int(4) NOT NULL AUTO_INCREMENT,
  `MOD_NOM` varchar(50) NOT NULL,
  `MOD_DES` text NOT NULL,
  PRIMARY KEY (`MOD_IDE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `modalidad`
--

INSERT INTO `modalidad` (`MOD_IDE`, `MOD_NOM`, `MOD_DES`) VALUES
(1, 'AUMENTO DE PESO', 'Consiste en cambios en la secuencia de los ejercicios . Y sugerencias de cómo se debe alimentar para lograr el incremento  de la masa muscular'),
(2, 'Reduccion de Peso', ''),
(3, 'Mantenimiento F�sico', 'Sistema de trabajo muscular menos riguroso, con la variante de que la persona solo busca mantener su estado fisico actual.'),
(4, 'Recuperacion Fisica', 'Trata de aliviar o recuperar dolencias fisicas  como las lesiones de tipo articular y muscular por medio de una guia de ejercicios terapeuticos.'),
(5, 'Fisiculturismo', 'Sistema de trabajo con pesas para adquirir volumen y masa corporal por medio de ejercicios .');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenmto`
--

CREATE TABLE IF NOT EXISTS `ordenmto` (
  `ORM_NUM` bigint(10) NOT NULL AUTO_INCREMENT,
  `ORM_FEC` datetime NOT NULL,
  `ORM_OBS` varchar(150) NOT NULL,
  `MAQ_IDE` int(4) NOT NULL,
  PRIMARY KEY (`ORM_NUM`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `ordenmto`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planentrenamiento`
--

CREATE TABLE IF NOT EXISTS `planentrenamiento` (
  `PLE_IDE` int(10) NOT NULL AUTO_INCREMENT,
  `PLE_FEI` datetime NOT NULL,
  `PLE_FEF` datetime NOT NULL,
  `PLE_OBS` varchar(100) NOT NULL,
  `DEP_IDE` varchar(15) NOT NULL,
  `ENT_IDE` varchar(15) NOT NULL,
  PRIMARY KEY (`PLE_IDE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `planentrenamiento`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programa`
--

CREATE TABLE IF NOT EXISTS `programa` (
  `PRO_IDE` int(4) NOT NULL AUTO_INCREMENT,
  `PRO_NOM` varchar(50) NOT NULL,
  `FAC_IDE` int(4) NOT NULL,
  PRIMARY KEY (`PRO_IDE`),
  KEY `FACULTAD_PROGRAMA` (`FAC_IDE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcar la base de datos para la tabla `programa`
--

INSERT INTO `programa` (`PRO_IDE`, `PRO_NOM`, `FAC_IDE`) VALUES
(1, 'Ingenier�a de sistemas', 1),
(2, 'Ingenier�a Electr�nica', 1),
(3, 'Tecnolog�a Electr�nica', 1),
(4, 'Ingenier�a Mec�nica', 1),
(5, 'Ingenier�a Civil', 1),
(6, 'Ingenier�a Industrial', 1),
(7, 'Econom�a', 2),
(8, 'Mercadeo', 2),
(9, 'Tecnolog�a en Mercadeo y ventas', 2),
(10, 'Administraci�n de Negocios Internacionales', 2),
(11, 'Contadur�a P�blica', 2),
(12, 'Tecnolog�a en Contabilidad y Costos', 2),
(13, 'Administraci�n Financiera', 2),
(14, 'Derecho', 3),
(15, 'Tec.Inv.Criminal y Judicial', 3),
(16, 'Psicolog�a', 2),
(17, 'Filosofia', 2),
(18, 'Comunicaci�n Social y Periodismo', 2),
(19, 'Arquitectura', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodeportista`
--

CREATE TABLE IF NOT EXISTS `tipodeportista` (
  `TID_IDE` int(2) NOT NULL AUTO_INCREMENT,
  `TID_NOM` varchar(30) NOT NULL,
  PRIMARY KEY (`TID_IDE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcar la base de datos para la tabla `tipodeportista`
--

INSERT INTO `tipodeportista` (`TID_IDE`, `TID_NOM`) VALUES
(1, 'ESTUDIANTE  NUEVO'),
(2, 'ESTUDIANTE ANTIGUO'),
(3, 'DOCENTE PLANTA'),
(4, 'DOCENTE MEDIO TIEMPO'),
(5, 'PERSONAL ADMINISTRATIVO'),
(6, 'EGRESADO'),
(7, 'ESTUDIANTE  TECNICO SAN JOSE'),
(8, 'ESTUDIANTE DE CONVENIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomaquina`
--

CREATE TABLE IF NOT EXISTS `tipomaquina` (
  `TIM_IDE` int(4) NOT NULL AUTO_INCREMENT,
  `TIM_NOM` varchar(50) NOT NULL,
  `TIM_DES` varchar(200) NOT NULL,
  PRIMARY KEY (`TIM_IDE`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcar la base de datos para la tabla `tipomaquina`
--

INSERT INTO `tipomaquina` (`TIM_IDE`, `TIM_NOM`, `TIM_DES`) VALUES
(1, 'Línea Cardiovascular', 'Funcion Regulacion y Fortalecimiento de la Frecuencia Cardiaca'),
(2, 'Línea Multifuerza', 'Funciones Fuerza, Resistencia y Potencia localizada del tren inferior'),
(3, 'Línea Pierna', 'Fuerza y Resistencia del tren Superior'),
(4, 'Línea Pecho', 'Funciones fuerza,Resistencia y Potencia localizada en el Pectoral'),
(5, 'Línea Hombros', 'Funciones Fuerza, Resistencia y Potencia del Hombro'),
(6, 'Línea Abdomen', 'Funciones Fortalecimiento, Resistencia y Potencia de la Zona Baja y Alta del Abdomen. Hombro'),
(7, 'Línea Soporte', 'Accesorios, Multiples  Herramientas Para Dotacion del Gym');
