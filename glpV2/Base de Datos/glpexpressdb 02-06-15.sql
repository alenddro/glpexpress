-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-06-2015 a las 00:33:07
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
-- Volcado de datos para la tabla `camion`
--

INSERT INTO `camion` (`id_cam`, `marca_cam`, `modelo_cam`, `patente_cam`, `ano_cam`, `papeles_cam`, `ruta_foto_cam`, `descrip_cam`, `dueno_cam`, `fec_subida_cam`, `estado_cam`, `fec_dado_baja_cam`, `subida_por_cam`) VALUES
(1, 'Audi', 'CaMIX', 'FY-FY-69', '2012', 'dia', 'img/img-camiones/2015-05-13 07-48-32camion.jpg', 'Camion buen estado', 'Jose', '2015-05-13 07:48:32', 1, '0000-00-00 00:00:00', 'Alexadmin bravoadmin'),
(2, 'Mercedez', 'BenZZ', 'XX-SS-33', '1971', 'dia', 'img/img-camiones/2015-05-13 07-49-4968747470733a2f2f7261772e6769746875622e636f6d2f6d656a6f72616e646f6c61636c6173652f6d656a6f72616e646f637572736f2f6d61737465722f74696d656c696e65637572736f732e6a7067.jpg', 'aasdasd', 'Ariel Arenas', '2015-05-13 07:49:49', 1, '0000-00-00 00:00:00', 'Alexadmin bravoadmin');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`id_of`, `titulo_of`, `descrip_of`, `imagen_of`, `valor_of`, `stock_of`, `fec_subida_of`, `fec_fin_of`, `subida_por_of`, `estado_of`) VALUES
(1, 'Drive', 'Solo por este fin de semana Gas licuado 15kg a $13.990', 'img/img-ofertas/2015-05-14 11-14-18llegar a eso.jpg', '10.990', 15, '2015-05-14 11:14:18', '0000-00-00 00:00:00', 'Alexadmin bravoadmin', 1),
(2, 'Gas en Oferta', 'Solo por este fin de semana Gas licuado 15kg a $10.990', 'img/img-ofertas/2015-05-14 12-20-19llegar a eso.jpg', '10.990', 15, '2015-05-14 12:20:19', '0000-00-00 00:00:00', 'Alexadmin bravoadmin', 1),
(3, 'Gas en Oferta', 'Solo por este fin de semana Gas licuado 15kg a $10.990', 'img/img-ofertas/2015-05-14 12-20-32llegar a eso.jpg', '10.990', 15, '2015-05-14 12:20:32', '0000-00-00 00:00:00', 'Alexadmin bravoadmin', 1),
(4, 'Zapatillas', 'Solo por este fin de semana Gas licuado 15kg a $10.990', 'img/img-ofertas/2015-05-14 12-22-15horario.jpg', '13.990', 15, '2015-05-14 12:22:15', '0000-00-00 00:00:00', 'Alexadmin bravoadmin', 1);

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
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_prod`, `nombre_prod`, `descrip_prod`, `ruta_img_prod`, `valor_prod`, `stock_prod`, `fec_subida_prod`, `agregado_por_prod`, `estado_prod`) VALUES
(1, 'Cilindro 5 kg', '', '', 8500, 12, '2015-05-14 00:00:00', '', ''),
(2, 'Cilindro 15 kg', '', '', 15990, 15, '2015-05-11 00:00:00', '', ''),
(3, 'Cilindro 45 kg', '', '', 25000, 45, '2015-05-28 10:00:00', '', ''),
(10, 'Gas licuado 3D', '', 'img/img-productos/2015-05-14 01-24-253d-jesus--1366x768.jpg', 2990, 15, '2015-05-14 01:24:25', '', ''),
(15, 'Gas licuado 3X', 'asdasdasd', 'img/img-productos/2015-05-14 01-45-093d-jesus--1366x768.jpg', 2990, 15, '2015-05-14 01:45:09', 'Alexadmin bravoadmin', '1');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `promocion`
--

INSERT INTO `promocion` (`id_prom`, `titulo_prom`, `descrip_prom`, `imagen_prom`, `valor_prom`, `stock_prom`, `fec_subida_prom`, `fec_fin_prom`, `subida_por_prom`, `estado_prom`) VALUES
(1, 'Frase', 'lleve este drive solo por 990 oportnidad unica, no te la pierdas!!!', 'img/img-promocion/2015-05-14 12-39-51llegar a eso.jpg', '990', 23, '2015-05-14 12:39:51', '0000-00-00 00:00:00', 'Alexadmin bravoadmin', 1),
(2, 'Frase', 'lleve este drive solo por 990 oportnidad unica, no te la pierdas!!!', 'img/img-promocion/2015-05-14 12-40-32llegar a eso.jpg', '990', 23, '2015-05-14 12:40:32', '0000-00-00 00:00:00', 'Alexadmin bravoadmin', 1);

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
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id_soli`, `cliente_id_soli`, `fec_solicitud_soli`, `producto_id_soli`, `estado_solicitud_soli`, `asignado_a_soli`, `finalizado_por_soli`, `fec_fin_soli`, `tipo_comentario_cli_soli`, `comentario_cli_soli`, `motivo_rech_soli`, `metodo_pago_cli_soli`, `metodo_pago_conf_soli`) VALUES
(1, 73, '2015-05-13 18:45:05', 2, 'activo', '', '', '0000-00-00 00:00:00', '', '', '', 'efectivo', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `todas`
--

CREATE TABLE IF NOT EXISTS `todas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `times` int(11) NOT NULL,
  `fec_vista` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `todas`
--

INSERT INTO `todas` (`id`, `times`, `fec_vista`) VALUES
(1, 1251, '2015-06-02'),
(2, 71, '2015-06-03');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `trabajadoractivo`
--

INSERT INTO `trabajadoractivo` (`id_trabajadoractivo`, `id_trab_activo`, `nombre_trab_activo`, `apellido_trab_activo`, `id_camion_trab_activo`, `stock_camion_trab_activo`, `fec_asignacion_trab_activo`, `estado_trab_activo`, `fec_asignacion_fin_trab_activo`, `asignado_por_trab_activo`) VALUES
(1, '76', 'ariel', 'arenas', 1, '3 gas de 15 kg', '2015-05-13 07:52:28', '1', '0000-00-00 00:00:00', 'Alexadmin bravoadmin'),
(3, '74', 'alexander', 'abarca', 2, 'gfrttgh', '2015-05-19 01:14:54', '1', '0000-00-00 00:00:00', 'Alexadmin bravoadmin');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `unicas`
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
(17, '::1', 14, '2015-06-03');

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usu`, `nombreusu_usu`, `password_usu`, `nombre_usu`, `apellido_usu`, `direccion_usu`, `telefono_usu`, `email_usu`, `ruta_img_usu`, `terminosycondiciones_usu`, `registrado_el`, `EstadoKEY`, `CodigoKEY`, `esadmin`) VALUES
(32, 'admin', 'admin', 'Alexadmin', 'bravoadmin', 'santa admin inacap', 223344, 'ale@ale.cl', '', 'si', '0000-00-00', '', '', 2),
(76, '', 'qw', 'ariel', 'arenas', 'santa ursula', 22323, 'ariel@ariel.cl', '', 'si', '13-05-2015', '', '', 1),
(75, '', 'qw', 'camila', 'abarca', 'santa mirta', 123, 'camila@camila.cl', '', 'si', '13-05-2015', '', '', 3),
(74, '', 'qw', 'alexander', 'abarca', 'santa ursula 1934 Rancagua', 995156968, 'alenddro@hotmail.com', '', 'si', '13-05-2015', '', '', 1),
(73, '', 'qwqw', 'miminombre', 'mmimama', 'mimimiapellido', 2147483647, 'mi@mi2.cl', '', 'si', '13-05-2015', '', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
