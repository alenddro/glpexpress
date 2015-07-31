-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 05-04-2015 a las 00:29:41
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `glpexpressdb`
--
CREATE DATABASE IF NOT EXISTS `glpexpressdb` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `glpexpressdb`;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`id_of`, `titulo_of`, `imagen_of`, `valor_of`, `stock_of`, `fec_subida_of`, `fec_fin_of`, `subida_por_of`, `estado_of`) VALUES
(4, 'Drive', 'img/img-ofertas/2015-04-01 10-26-00agregarusu.png', '990', 15, '2015-04-01 10:26:00', '0000-00-00 00:00:00', 'Alexadmin bravoadmin', 1);

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
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `nombre_prod`, `ruta_img_prod`, `valor_prod`, `stock_prod`, `fec_subida_prod`) VALUES
(1, 'Cilindro 5 kg', '', 8500, 0, '0000-00-00 00:00:00'),
(2, 'Cilindro 15 kg', '', 15990, 0, '0000-00-00 00:00:00'),
(3, 'Cilindro 45 kg', '', 25000, 0, '0000-00-00 00:00:00'),
(9, 'Gas licuado 3D', 'img/img-productos/2015-03-22 10-37-5745kg.jpg', 2990, 15, '2015-03-22 10:37:57');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_soli`, `cliente_id_soli`, `fec_solicitud_soli`, `producto_id_soli`, `estado_solicitud_soli`, `finalizado_por_soli`, `fec_fin_soli`, `tipo_comentario_cli_soli`, `comentario_cli_soli`, `motivo_rech_soli`, `metodo_pago_cli_soli`, `metodo_pago_conf_soli`) VALUES
(1, 42, '2015-03-18 20:04:30', 1, 'oculto', '41', '0000-00-00 00:00:00', '', '', '', '', ''),
(2, 42, '2015-03-19 09:52:25', 2, 'oculto', '41', '0000-00-00 00:00:00', '', '', '', '', ''),
(3, 42, '2015-03-19 09:52:37', 1, 'oculto', '43', '0000-00-00 00:00:00', '', '', '', '', ''),
(4, 42, '2015-03-19 14:32:22', 2, 'oculto', '44', '0000-00-00 00:00:00', 'felicitacion', 'exfcelente                                                                          ', '', '', ''),
(5, 42, '2015-03-19 19:15:01', 2, 'oculto', '43', '0000-00-00 00:00:00', 'reclamo', 'muy malo malo                                                                          ', '', '', ''),
(6, 42, '2015-03-19 19:39:46', 3, 'oculto', '41', '0000-00-00 00:00:00', 'felicitacion', 'asdasdas                                                                          ', '', '', ''),
(7, 42, '2015-03-22 22:14:39', 1, 'oculto', '41', '0000-00-00 00:00:00', 'felicitacion', 'mu genial                                                                          ', '', '', ''),
(8, 42, '2015-03-22 22:15:35', 3, 'oculto', '44', '0000-00-00 00:00:00', '', '', '', 'efectivo', ''),
(9, 42, '2015-03-22 22:22:37', 3, 'oculto', '41', '0000-00-00 00:00:00', 'mejoras', 'mejoren los camiones                                                                          ', '', 'credito', ''),
(12, 42, '2015-03-25 21:19:48', 2, 'oculto', '41', '0000-00-00 00:00:00', '', '', '', 'visa', ''),
(11, 42, '2015-03-23 12:17:34', 1, 'oculto', '44', '0000-00-00 00:00:00', 'reclamo', '                                                asdasd                          ', '', 'visa', ''),
(13, 42, '2015-04-03 22:30:47', 2, 'oculto', '44', '0000-00-00 00:00:00', 'otro', ' nada que decir ckjajkajkakjakj                                                                         ', '', 'efectivo', ''),
(14, 42, '2015-04-03 23:57:24', 1, 'finalizado', '41', '0000-00-00 00:00:00', 'reclamo', 'Me atendio super mal                                                                           ', '', 'visa', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nombreusu_usu`, `password_usu`, `nombre_usu`, `apellido_usu`, `direccion_usu`, `telefono_usu`, `email_usu`, `ruta_img_usu`, `terminosycondiciones_usu`, `esadmin`) VALUES
(32, 'admin', 'admin', 'Alexadmin', 'bravoadmin', 'santa admin inacap', 223344, 'ale@ale.cl', '', 'si', 2),
(42, 'we', 'qwer15', 'we', 'we', 'we', 23, 'wewewe@erere.cl', '', 'si', 0),
(41, 'Alex', 'alex', 'Alexander', 'Bravo', 'santa ursula 1934 Rancagua', 995156968, 'alenddro@hotmail.com', '', 'si', 1),
(43, 'ariel', 'ariel', 'ariel', 'arenas', 'lalala', 22323, 'ariel@ariel.cl', '', 'si', 1),
(44, 'nico', 'nico', 'nico', 'nico', 'nico', 12, 'nico@nico.cl', '', 'si', 1),
(45, 'profesora', 'profesora', 'profesora', 'profe', 'santa mirta', 1234, 'ariel@ariel.cl', '', 'si', 0),
(46, 'raquel', 'raquel', 'raquel', 'moya', 'santa ursula 1934 Rancagua', 995156968, 'raquell_42@hotmail.c', '', '', 1),
(47, 'camila', 'camila', 'camila', 'chan', 'asdf', 213131, 'alexander.bravo@inac', '', 'si', 3);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
