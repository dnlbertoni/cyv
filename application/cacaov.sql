-- phpMyAdmin SQL Dump
-- version 3.4.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-12-2011 a las 17:16:17
-- Versión del servidor: 5.0.51
-- Versión de PHP: 5.2.6-1+lenny13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `cacaov`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE IF NOT EXISTS `articulos` (
  `id` bigint(20) NOT NULL auto_increment COMMENT 'id del articulo',
  `nombre` varchar(80) collate utf8_bin NOT NULL COMMENT 'descripcion del articulo',
  `costo` decimal(8,3) default NULL COMMENT 'costo del articulo',
  `precio` decimal(8,3) default NULL COMMENT 'precio de lista del articulo',
  `peso` tinyint(1) NOT NULL default '1' COMMENT 'si es por peso o por unidad',
  `kg` decimal(4,2) default '1.00' COMMENT 'kg por lata / bulto',
  `users_id` int(11) NOT NULL COMMENT 'firma digital del ultimo uso',
  `created` datetime NOT NULL COMMENT 'fecha de cracion',
  `modificado` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP COMMENT 'fecha de modificacion',
  PRIMARY KEY  (`id`),
  KEY `nombre` (`nombre`),
  KEY `created` (`created`,`modificado`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='tabla de articulos' AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `nombre`, `costo`, `precio`, `peso`, `kg`, `users_id`, `created`, `modificado`) VALUES
(1, 'PAN', '2.300', '5.200', 1, '1.00', 1, '0000-00-00 00:00:00', '2011-11-14 04:18:45'),
(2, 'TORTA DE CHOCOLATE ', '15.600', '23.500', 1, '1.00', 1, '0000-00-00 00:00:00', '2011-11-14 04:22:53'),
(3, 'lemon Pie', '13.200', '23.500', 1, '1.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'medialunas', '2.620', '5.000', 1, '1.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'medialunas', '2.620', '5.000', 1, '1.00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'CHINCHURRETE', '0.000', '20.000', 1, '2.50', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'TORTA DE NARANJA', '23.500', '25.000', 0, '1.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, 'TORTA DE NARANJA', '23.500', '25.000', 0, '1.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) collate utf8_bin NOT NULL default '0',
  `ip_address` varchar(16) collate utf8_bin NOT NULL default '0',
  `user_agent` varchar(150) collate utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text collate utf8_bin NOT NULL,
  PRIMARY KEY  (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE IF NOT EXISTS `cuentas` (
  `id` int(11) NOT NULL COMMENT 'id de la cuenta',
  `nombre` varchar(80) collate utf8_bin NOT NULL COMMENT 'nombre de la cuenta',
  `descuento` decimal(5,3) NOT NULL default '0.000' COMMENT 'descuento sobre el precio de lista',
  `tipo` int(1) NOT NULL COMMENT '1 - cliente | 2 -proveedor',
  `estado` int(1) NOT NULL COMMENT '1 - activo | 0 - inactivo',
  PRIMARY KEY  (`id`),
  KEY `nombre` (`nombre`,`tipo`,`estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='tabla de cuentas';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoscomp`
--

CREATE TABLE IF NOT EXISTS `estadoscomp` (
  `id` int(3) NOT NULL auto_increment COMMENT 'id del estado',
  `nombre` varchar(30) collate utf8_bin NOT NULL COMMENT 'descripcion del estado',
  `abrev` char(8) collate utf8_bin NOT NULL COMMENT 'abreviatura de la descripcion',
  PRIMARY KEY  (`id`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='tabla de estados de los comprobantes' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facencab`
--

CREATE TABLE IF NOT EXISTS `facencab` (
  `id` bigint(20) NOT NULL auto_increment COMMENT 'id del comprobante',
  `tipcom` int(11) NOT NULL COMMENT 'tipo comprobante: 1- remito 2 - liquidacion',
  `puesto` int(4) unsigned zerofill NOT NULL COMMENT 'puesto de venta emisor',
  `numero` int(8) unsigned zerofill NOT NULL COMMENT 'numero comprobante',
  `letra` char(1) collate utf8_bin NOT NULL COMMENT 'letra comprobante',
  `fecha` datetime NOT NULL COMMENT 'fecha de emision',
  `sucursal_id` bigint(20) NOT NULL COMMENT 'codigo de la cuenta de referencia',
  `importe` decimal(10,3) NOT NULL COMMENT 'importe total',
  `estado` int(1) NOT NULL COMMENT 'referencia a tabla de estados',
  `created` datetime NOT NULL COMMENT 'fecha de creacion',
  `modificado` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP COMMENT 'fecha de modificacion',
  PRIMARY KEY  (`id`),
  KEY `tipcom` (`tipcom`,`puesto`,`numero`,`fecha`,`estado`),
  KEY `cuenta_id` (`sucursal_id`),
  KEY `created` (`created`,`modificado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='tabla de encabezado de comprobantes' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facmovim`
--

CREATE TABLE IF NOT EXISTS `facmovim` (
  `id` bigint(20) NOT NULL COMMENT 'id del renglon',
  `facencab_id` bigint(20) unsigned NOT NULL COMMENT 'numero id del comprobante',
  `articulo_id` bigint(20) unsigned NOT NULL COMMENT 'numero de aritculo',
  `cantidad` decimal(5,2) unsigned NOT NULL COMMENT 'cantidad facturada',
  `precio` decimal(8,3) NOT NULL COMMENT 'precio al momento de la facturacion',
  `costo` decimal(8,3) default '0.000' COMMENT 'costo al momento de la facturacion',
  `tasaiva` decimal(5,3) NOT NULL COMMENT 'tasa de iva',
  `created` datetime NOT NULL COMMENT 'fecha de creacion del registro',
  `modificado` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP COMMENT 'fecha de modificacion',
  PRIMARY KEY  (`id`),
  KEY `facencab_id` (`facencab_id`,`articulo_id`,`created`,`modificado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='tabla de renglones del comprobante';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_attempts`
--

CREATE TABLE IF NOT EXISTS `login_attempts` (
  `id` int(11) NOT NULL auto_increment,
  `ip_address` varchar(40) collate utf8_bin NOT NULL,
  `login` varchar(50) collate utf8_bin NOT NULL,
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numerador`
--

CREATE TABLE IF NOT EXISTS `numerador` (
  `tipcom` int(11) NOT NULL COMMENT '1 - Remitos | 2  - Liquidaciones',
  `puesto` int(11) NOT NULL,
  `numero` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='tabla de numeradores';

--
-- Volcado de datos para la tabla `numerador`
--

INSERT INTO `numerador` (`tipcom`, `puesto`, `numero`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursales`
--

CREATE TABLE IF NOT EXISTS `sucursales` (
  `id` int(11) NOT NULL auto_increment COMMENT 'id de la sucursal',
  `nombre` varchar(80) collate utf8_bin NOT NULL COMMENT 'nombre identificacion sucursal',
  `direccion` varchar(80) collate utf8_bin default NULL COMMENT 'direccion sucursal',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='tabla de sucursales' AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `sucursales`
--

INSERT INTO `sucursales` (`id`, `nombre`, `direccion`) VALUES
(1, 'Casa Central', 'Entre Rios 1030'),
(2, 'MITRE', 'MITRE ESQ YRIGOYEN'),
(4, 'LA BIANCA', 'LA BIANCA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmpmovim`
--

CREATE TABLE IF NOT EXISTS `tmpmovim` (
  `id` bigint(20) NOT NULL auto_increment,
  `puesto` int(4) NOT NULL,
  `numero` int(8) NOT NULL,
  `sucursal` int(4) NOT NULL,
  `cantidad` decimal(5,2) NOT NULL,
  `articulo` bigint(20) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `tmpmovim`
--

INSERT INTO `tmpmovim` (`id`, `puesto`, `numero`, `sucursal`, `cantidad`, `articulo`, `precio`) VALUES
(1, 0, 0, 0, '1.00', 1, '5.20'),
(2, 0, 0, 0, '2.50', 6, '50.00'),
(3, 0, 0, 0, '5.00', 6, '100.00'),
(4, 0, 0, 0, '50.00', 1, '260.00'),
(5, 0, 0, 0, '23.00', 2, '540.50'),
(27, 1, 1, 4, '10.00', 3, '23.50'),
(28, 1, 1, 4, '5.00', 6, '20.00'),
(29, 1, 1, 4, '10.00', 1, '5.20'),
(30, 1, 1, 4, '1.00', 5, '5.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(50) collate utf8_bin NOT NULL,
  `password` varchar(255) collate utf8_bin NOT NULL,
  `email` varchar(100) collate utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL default '1',
  `banned` tinyint(1) NOT NULL default '0',
  `ban_reason` varchar(255) collate utf8_bin default NULL,
  `new_password_key` varchar(50) collate utf8_bin default NULL,
  `new_password_requested` datetime default NULL,
  `new_email` varchar(100) collate utf8_bin default NULL,
  `new_email_key` varchar(50) collate utf8_bin default NULL,
  `last_ip` varchar(40) collate utf8_bin NOT NULL,
  `last_login` datetime NOT NULL default '0000-00-00 00:00:00',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `activated`, `banned`, `ban_reason`, `new_password_key`, `new_password_requested`, `new_email`, `new_email_key`, `last_ip`, `last_login`, `created`, `modified`) VALUES
(1, 'sistemas', '$P$Be/Nnvvex.4r.3WEmFwPCl8RpOmRQl.', 'dd@dd.com', 1, 0, NULL, NULL, NULL, NULL, NULL, '192.168.1.2', '2011-12-02 18:37:22', '2011-11-13 19:29:38', '2011-12-02 21:37:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_autologin`
--

CREATE TABLE IF NOT EXISTS `user_autologin` (
  `key_id` char(32) collate utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL default '0',
  `user_agent` varchar(150) collate utf8_bin NOT NULL,
  `last_ip` varchar(40) collate utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `user_autologin`
--

INSERT INTO `user_autologin` (`key_id`, `user_id`, `user_agent`, `last_ip`, `last_login`) VALUES
('27c8c957a5501b4d49f8e3f30006437b', 1, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.2 (KHTML, like Gecko) Chrome/15.0.874.120 Safari/535.2', '192.168.1.2', '2011-11-16 15:44:30'),
('3342060350df352daa9473bf6e25c37c', 1, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.2 (KHTML, like Gecko) Chrome/15.0.874.106 Safari/535.2', '192.168.1.2', '2011-11-13 22:29:53'),
('586aab204e17890e24c2d6de3228bec8', 1, 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.2 (KHTML, like Gecko) Chrome/15.0.874.121 Safari/535.2', '192.168.1.2', '2011-11-20 00:43:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_profiles`
--

CREATE TABLE IF NOT EXISTS `user_profiles` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) collate utf8_bin default NULL,
  `website` varchar(255) collate utf8_bin default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `user_profiles`
--

INSERT INTO `user_profiles` (`id`, `user_id`, `country`, `website`) VALUES
(1, 1, NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
