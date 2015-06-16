-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-06-2015 a las 09:23:43
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `glpexpressdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `camion`
--

CREATE TABLE IF NOT EXISTS `camion` (
  `id_cam` int(11) NOT NULL AUTO_INCREMENT,
  `marca_cam` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `modelo_cam` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `patente_cam` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ano_cam` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `papeles_cam` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ruta_foto_cam` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descrip_cam` varchar(400) COLLATE utf8_spanish_ci NOT NULL,
  `dueno_cam` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fec_subida_cam` datetime NOT NULL,
  `estado_cam` int(2) NOT NULL,
  `fec_dado_baja_cam` datetime NOT NULL,
  `subida_por_cam` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_cam`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `camion`
--

INSERT INTO `camion` (`id_cam`, `marca_cam`, `modelo_cam`, `patente_cam`, `ano_cam`, `papeles_cam`, `ruta_foto_cam`, `descrip_cam`, `dueno_cam`, `fec_subida_cam`, `estado_cam`, `fec_dado_baja_cam`, `subida_por_cam`) VALUES
(1, 'Chevrolet', 'Camion', 'XX-SS-33', '2008', 'dia', 'img/img-camiones/2015-06-10 01-09-24Konachan.com - 135929 cigarette flowers gloves guitar handcuffs haru_aki hat instrument kagamine_.jpg', 'sdsff', 'ariel', '2015-06-10 01:09:24', 1, '0000-00-00 00:00:00', 'Alexadmin bravoadmin'),
(2, 'Audio', 'A4', 'ad-as-12', '1975', 'dia', 'img/img-camiones/2015-06-10 03-06-523d-jesus--1366x768.jpg', 'sadfasdfas', 'Dario', '2015-06-10 03:06:52', 1, '0000-00-00 00:00:00', 'Alexadmin bravoadmin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE IF NOT EXISTS `oferta` (
  `id_of` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_of` varchar(200) NOT NULL,
  `descrip_of` varchar(200) NOT NULL,
  `imagen_of` varchar(200) NOT NULL,
  `valor_of` varchar(200) NOT NULL,
  `stock_of` int(11) NOT NULL,
  `fec_subida_of` datetime NOT NULL,
  `fec_fin_of` datetime NOT NULL,
  `subida_por_of` varchar(200) NOT NULL,
  `estado_of` int(11) NOT NULL,
  PRIMARY KEY (`id_of`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `oferta`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_prod` varchar(20) NOT NULL,
  `descrip_prod` varchar(200) NOT NULL,
  `ruta_img_prod` varchar(255) NOT NULL,
  `valor_prod` int(20) NOT NULL,
  `stock_prod` int(11) NOT NULL,
  `fec_subida_prod` datetime NOT NULL,
  `agregado_por_prod` varchar(200) NOT NULL,
  `estado_prod` varchar(30) NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcar la base de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `nombre_prod`, `descrip_prod`, `ruta_img_prod`, `valor_prod`, `stock_prod`, `fec_subida_prod`, `agregado_por_prod`, `estado_prod`) VALUES
(1, 'Cilindro 5 kg', '', '', 8500, 12, '2015-05-14 00:00:00', '', ''),
(2, 'Cilindro 15 kg', '', '', 15990, 15, '2015-05-11 00:00:00', '', ''),
(3, 'Cilindro 45 kg', '', '', 25000, 45, '2015-05-28 10:00:00', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE IF NOT EXISTS `promocion` (
  `id_prom` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_prom` varchar(200) NOT NULL,
  `descrip_prom` varchar(200) NOT NULL,
  `imagen_prom` varchar(200) NOT NULL,
  `valor_prom` varchar(200) NOT NULL,
  `stock_prom` int(11) NOT NULL,
  `fec_subida_prom` datetime NOT NULL,
  `fec_fin_prom` datetime NOT NULL,
  `subida_por_prom` varchar(200) NOT NULL,
  `estado_prom` int(11) NOT NULL,
  PRIMARY KEY (`id_prom`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `promocion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `id_soli` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id_soli` int(11) NOT NULL,
  `fec_solicitud_soli` datetime NOT NULL,
  `producto_id_soli` int(11) NOT NULL,
  `estado_solicitud_soli` varchar(20) NOT NULL,
  `asignado_a_soli` varchar(200) NOT NULL,
  `finalizado_por_soli` varchar(20) NOT NULL,
  `fec_fin_soli` datetime NOT NULL,
  `tipo_comentario_cli_soli` varchar(200) NOT NULL,
  `comentario_cli_soli` varchar(800) NOT NULL,
  `motivo_rech_soli` varchar(200) NOT NULL,
  `metodo_pago_cli_soli` varchar(30) NOT NULL,
  `metodo_pago_conf_soli` varchar(30) NOT NULL,
  PRIMARY KEY (`id_soli`),
  KEY `producto_id` (`producto_id_soli`),
  KEY `cliente_id` (`cliente_id_soli`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_soli`, `cliente_id_soli`, `fec_solicitud_soli`, `producto_id_soli`, `estado_solicitud_soli`, `asignado_a_soli`, `finalizado_por_soli`, `fec_fin_soli`, `tipo_comentario_cli_soli`, `comentario_cli_soli`, `motivo_rech_soli`, `metodo_pago_cli_soli`, `metodo_pago_conf_soli`) VALUES
(1, 79, '2015-06-10 12:07:07', 3, 'activo', '', '', '0000-00-00 00:00:00', '', '', ' el loco es terrible cuma me tiro los balones por la caeZAAAA shiaaaa!!!!                                                                                                | rechazado por: david abarca', 'credito', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `todas`
--

CREATE TABLE IF NOT EXISTS `todas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `times` int(11) NOT NULL,
  `fec_vista` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcar la base de datos para la tabla `todas`
--

INSERT INTO `todas` (`id`, `times`, `fec_vista`) VALUES
(1, 1251, '2015-06-02'),
(2, 71, '2015-06-03'),
(3, 13, '2015-06-04'),
(4, 8, '2015-06-08'),
(5, 14, '2015-06-10'),
(6, 1, '2015-06-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadoractivo`
--

CREATE TABLE IF NOT EXISTS `trabajadoractivo` (
  `id_trabajadoractivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_trab_activo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_trab_activo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `apellido_trab_activo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `id_camion_trab_activo` int(11) NOT NULL,
  `stock_camion_trab_activo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fec_asignacion_trab_activo` datetime NOT NULL,
  `estado_trab_activo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fec_asignacion_fin_trab_activo` datetime NOT NULL,
  `asignado_por_trab_activo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_trabajadoractivo`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `trabajadoractivo`
--

INSERT INTO `trabajadoractivo` (`id_trabajadoractivo`, `id_trab_activo`, `nombre_trab_activo`, `apellido_trab_activo`, `id_camion_trab_activo`, `stock_camion_trab_activo`, `fec_asignacion_trab_activo`, `estado_trab_activo`, `fec_asignacion_fin_trab_activo`, `asignado_por_trab_activo`) VALUES
(1, '80', 'ariel', 'arenas', 1, 'asadfsf', '2015-06-10 01:11:53', '1', '0000-00-00 00:00:00', 'Alexadmin bravoadmin'),
(2, '81', 'david', 'abarca', 2, 'ssfsfsf', '2015-06-10 03:07:17', '1', '0000-00-00 00:00:00', 'Alexadmin bravoadmin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unicas`
--

CREATE TABLE IF NOT EXISTS `unicas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(15) NOT NULL,
  `times` int(11) NOT NULL,
  `fec_vista` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Volcar la base de datos para la tabla `unicas`
--

INSERT INTO `unicas` (`id`, `ip`, `times`, `fec_vista`) VALUES
(1, '200.72.240.49', 18, '2015-06-02'),
(2, '200.111.61.157', 18, '2015-06-02'),
(3, '192.99.150.7', 6, '2015-06-02'),
(4, '200.91.9.241', 18, '2015-06-02'),
(5, '200.91.9.177', 670, '2015-06-02'),
(6, '200.72.240.29', 91, '2015-06-02'),
(7, '200.111.61.177', 133, '2015-06-02'),
(8, '207.244.77.3', 126, '2015-06-02'),
(9, '46.165.220.216', 168, '2015-06-02'),
(10, '200.83.150.208', 3, '2015-06-02'),
(11, '200.72.240.49', 30, '2015-06-03'),
(12, '190.98.227.113', 3, '2015-06-03'),
(13, '200.91.9.241', 3, '2015-06-03'),
(14, '66.102.8.204', 2, '2015-06-03'),
(15, '66.102.8.199', 1, '2015-06-03'),
(16, '200.29.165.241', 18, '2015-06-03'),
(17, '::1', 14, '2015-06-03'),
(18, '::1', 13, '2015-06-04'),
(19, '::1', 8, '2015-06-08'),
(20, '::1', 14, '2015-06-10'),
(21, '::1', 1, '2015-06-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usu` int(11) NOT NULL AUTO_INCREMENT,
  `nombreusu_usu` varchar(20) NOT NULL,
  `password_usu` varchar(50) NOT NULL,
  `nombre_usu` varchar(20) NOT NULL,
  `apellido_usu` varchar(20) NOT NULL,
  `direccion_usu` varchar(50) NOT NULL,
  `telefono_usu` int(15) NOT NULL,
  `email_usu` varchar(20) NOT NULL,
  `ruta_img_usu` varchar(299) NOT NULL,
  `terminosycondiciones_usu` varchar(3) NOT NULL,
  `registrado_el` varchar(30) NOT NULL,
  `EstadoKEY` varchar(40) NOT NULL,
  `CodigoKEY` varchar(40) NOT NULL,
  `esadmin` int(1) NOT NULL,
  PRIMARY KEY (`id_usu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nombreusu_usu`, `password_usu`, `nombre_usu`, `apellido_usu`, `direccion_usu`, `telefono_usu`, `email_usu`, `ruta_img_usu`, `terminosycondiciones_usu`, `registrado_el`, `EstadoKEY`, `CodigoKEY`, `esadmin`) VALUES
(32, 'admin', 'admin', 'Alexadmin', 'bravoadmin', 'santa admin inacap', 223344, 'ale@ale.cl', '', 'si', '0000-00-00', '1', '', 2),
(81, '', 'qw', 'david', 'abarca', 'alx', 223344, 'david@david.cl', '', 'si', '10-06-2015', '1', '', 1),
(80, '', 'qw', 'ariel', 'arenas', 'santa ursula', 995156968, 'ariel@ariel.cl', '', 'si', '10-06-2015', '1', '', 1),
(79, '', 'qw', 'alexander', 'bravo', 'santa ursula 1934 Rancagua', 995156968, 'alenddro@hotmail.com', '', 'si', '10-06-2015', '1', '98800660', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
