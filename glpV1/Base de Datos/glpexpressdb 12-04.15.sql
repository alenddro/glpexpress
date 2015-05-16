-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-04-2015 a las 15:25:15
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
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `camion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE IF NOT EXISTS `oferta` (
  `id_of` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_of` varchar(200) NOT NULL,
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
  `ruta_img_prod` varchar(255) NOT NULL,
  `valor_prod` int(20) NOT NULL,
  `stock_prod` int(11) NOT NULL,
  `fec_subida_prod` datetime NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcar la base de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `nombre_prod`, `ruta_img_prod`, `valor_prod`, `stock_prod`, `fec_subida_prod`) VALUES
(1, 'Cilindro 5 kg', '', 8500, 0, '0000-00-00 00:00:00'),
(2, 'Cilindro 15 kg', '', 15990, 0, '0000-00-00 00:00:00'),
(3, 'Cilindro 45 kg', '', 25000, 0, '0000-00-00 00:00:00'),
(9, 'Gas licuado 3D', 'img/img-productos/2015-03-22 10-37-5745kg.jpg', 2990, 15, '2015-03-22 10:37:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE IF NOT EXISTS `promocion` (
  `id_prom` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_prom` varchar(200) NOT NULL,
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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcar la base de datos para la tabla `solicitud`
--


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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `trabajadoractivo`
--


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
  `esadmin` int(1) NOT NULL,
  PRIMARY KEY (`id_usu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Volcar la base de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nombreusu_usu`, `password_usu`, `nombre_usu`, `apellido_usu`, `direccion_usu`, `telefono_usu`, `email_usu`, `ruta_img_usu`, `terminosycondiciones_usu`, `esadmin`) VALUES
(32, 'admin', 'admin', 'Alexadmin', 'bravoadmin', 'santa admin inacap', 223344, 'ale@ale.cl', '', 'si', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
