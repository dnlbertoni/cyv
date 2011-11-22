-- MySQL dump 10.11
--
-- Host: localhost    Database: cacaov
-- ------------------------------------------------------
-- Server version	5.0.51a-24+lenny5

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `articulos`
--

DROP TABLE IF EXISTS `articulos`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `articulos` (
  `id` bigint(20) NOT NULL auto_increment COMMENT 'id del articulo',
  `nombre` varchar(80) collate utf8_bin NOT NULL COMMENT 'descripcion del articulo',
  `costo` decimal(8,3) default NULL COMMENT 'costo del articulo',
  `precio` decimal(8,3) default NULL COMMENT 'precio de lista del articulo',
  `kg` decimal(4,2) default '1.00' COMMENT 'kg por lata / bulto',
  `users_id` int(11) NOT NULL COMMENT 'firma digital del ultimo uso',
  `created` datetime NOT NULL COMMENT 'fecha de cracion',
  `modificado` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP COMMENT 'fecha de modificacion',
  PRIMARY KEY  (`id`),
  KEY `nombre` (`nombre`),
  KEY `created` (`created`,`modificado`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='tabla de articulos';
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `articulos`
--

LOCK TABLES `articulos` WRITE;
/*!40000 ALTER TABLE `articulos` DISABLE KEYS */;
INSERT INTO `articulos` VALUES (1,'PAN','2.300','5.200','1.00',1,'0000-00-00 00:00:00','2011-11-14 04:18:45'),(2,'TORTA DE CHOCOLATE ','15.600','23.500','1.00',1,'0000-00-00 00:00:00','2011-11-14 04:22:53'),(3,'lemon Pie','13.200','23.500','1.00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'medialunas','2.620','5.000','1.00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'medialunas','2.620','5.000','1.00',0,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'CHINCHURRETE','0.000','20.000','2.50',0,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `articulos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) collate utf8_bin NOT NULL default '0',
  `ip_address` varchar(16) collate utf8_bin NOT NULL default '0',
  `user_agent` varchar(150) collate utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL default '0',
  `user_data` text collate utf8_bin NOT NULL,
  PRIMARY KEY  (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuentas`
--

DROP TABLE IF EXISTS `cuentas`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `cuentas` (
  `id` int(11) NOT NULL COMMENT 'id de la cuenta',
  `nombre` varchar(80) collate utf8_bin NOT NULL COMMENT 'nombre de la cuenta',
  `descuento` decimal(5,3) NOT NULL default '0.000' COMMENT 'descuento sobre el precio de lista',
  `tipo` int(1) NOT NULL COMMENT '1 - cliente | 2 -proveedor',
  `estado` int(1) NOT NULL COMMENT '1 - activo | 0 - inactivo',
  PRIMARY KEY  (`id`),
  KEY `nombre` (`nombre`,`tipo`,`estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='tabla de cuentas';
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `cuentas`
--

LOCK TABLES `cuentas` WRITE;
/*!40000 ALTER TABLE `cuentas` DISABLE KEYS */;
/*!40000 ALTER TABLE `cuentas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estadoscomp`
--

DROP TABLE IF EXISTS `estadoscomp`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `estadoscomp` (
  `id` int(3) NOT NULL auto_increment COMMENT 'id del estado',
  `nombre` varchar(30) collate utf8_bin NOT NULL COMMENT 'descripcion del estado',
  `abrev` char(8) collate utf8_bin NOT NULL COMMENT 'abreviatura de la descripcion',
  PRIMARY KEY  (`id`),
  KEY `nombre` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='tabla de estados de los comprobantes';
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `estadoscomp`
--

LOCK TABLES `estadoscomp` WRITE;
/*!40000 ALTER TABLE `estadoscomp` DISABLE KEYS */;
/*!40000 ALTER TABLE `estadoscomp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facencab`
--

DROP TABLE IF EXISTS `facencab`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `facencab` (
  `id` bigint(20) NOT NULL auto_increment COMMENT 'id del comprobante',
  `tipcom` int(11) NOT NULL COMMENT 'tipo comprobante',
  `puesto` int(4) unsigned zerofill NOT NULL COMMENT 'puesto de venta emisor',
  `numero` int(8) unsigned zerofill NOT NULL COMMENT 'numero comprobante',
  `letra` char(1) collate utf8_bin NOT NULL COMMENT 'letra comprobante',
  `fecha` datetime NOT NULL COMMENT 'fecha de emision',
  `cuenta_id` bigint(20) NOT NULL COMMENT 'codigo de la cuenta de referencia',
  `importe` decimal(10,3) NOT NULL COMMENT 'importe total',
  `estado` int(1) NOT NULL COMMENT 'referencia a tabla de estados',
  `created` datetime NOT NULL COMMENT 'fecha de creacion',
  `modificado` timestamp NOT NULL default '0000-00-00 00:00:00' on update CURRENT_TIMESTAMP COMMENT 'fecha de modificacion',
  PRIMARY KEY  (`id`),
  KEY `tipcom` (`tipcom`,`puesto`,`numero`,`fecha`,`estado`),
  KEY `cuenta_id` (`cuenta_id`),
  KEY `created` (`created`,`modificado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='tabla de encabezado de comprobantes';
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `facencab`
--

LOCK TABLES `facencab` WRITE;
/*!40000 ALTER TABLE `facencab` DISABLE KEYS */;
/*!40000 ALTER TABLE `facencab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facmovim`
--

DROP TABLE IF EXISTS `facmovim`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `facmovim` (
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
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `facmovim`
--

LOCK TABLES `facmovim` WRITE;
/*!40000 ALTER TABLE `facmovim` DISABLE KEYS */;
/*!40000 ALTER TABLE `facmovim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL auto_increment,
  `ip_address` varchar(40) collate utf8_bin NOT NULL,
  `login` varchar(50) collate utf8_bin NOT NULL,
  `time` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sucursales`
--

DROP TABLE IF EXISTS `sucursales`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `sucursales` (
  `id` int(11) NOT NULL auto_increment COMMENT 'id de la sucursal',
  `nombre` varchar(80) collate utf8_bin NOT NULL COMMENT 'nombre identificacion sucursal',
  `direccion` varchar(80) collate utf8_bin default NULL COMMENT 'direccion sucursal',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='tabla de sucursales';
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `sucursales`
--

LOCK TABLES `sucursales` WRITE;
/*!40000 ALTER TABLE `sucursales` DISABLE KEYS */;
INSERT INTO `sucursales` VALUES (1,'Casa Central','Entre Rios 1030'),(2,'MITRE','MITRE ESQ YRIGOYEN'),(4,'LA BIANCA','LA BIANCA');
/*!40000 ALTER TABLE `sucursales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tmpmovim`
--

DROP TABLE IF EXISTS `tmpmovim`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `tmpmovim` (
  `id` bigint(20) NOT NULL auto_increment,
  `puesto` int(4) NOT NULL,
  `sucursal` int(4) NOT NULL,
  `cantidad` decimal(5,2) NOT NULL,
  `articulo` bigint(20) NOT NULL,
  `precio` decimal(8,2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `tmpmovim`
--

LOCK TABLES `tmpmovim` WRITE;
/*!40000 ALTER TABLE `tmpmovim` DISABLE KEYS */;
INSERT INTO `tmpmovim` VALUES (1,0,0,'1.00',1,'5.20'),(2,0,0,'2.50',6,'50.00'),(3,0,0,'5.00',6,'100.00'),(4,0,0,'50.00',1,'260.00'),(5,0,0,'23.00',2,'540.50');
/*!40000 ALTER TABLE `tmpmovim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_autologin`
--

DROP TABLE IF EXISTS `user_autologin`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `user_autologin` (
  `key_id` char(32) collate utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL default '0',
  `user_agent` varchar(150) collate utf8_bin NOT NULL,
  `last_ip` varchar(40) collate utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `user_autologin`
--

LOCK TABLES `user_autologin` WRITE;
/*!40000 ALTER TABLE `user_autologin` DISABLE KEYS */;
INSERT INTO `user_autologin` VALUES ('27c8c957a5501b4d49f8e3f30006437b',1,'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.2 (KHTML, like Gecko) Chrome/15.0.874.120 Safari/535.2','192.168.1.2','2011-11-16 15:44:30'),('3342060350df352daa9473bf6e25c37c',1,'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.2 (KHTML, like Gecko) Chrome/15.0.874.106 Safari/535.2','192.168.1.2','2011-11-13 22:29:53'),('586aab204e17890e24c2d6de3228bec8',1,'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.2 (KHTML, like Gecko) Chrome/15.0.874.121 Safari/535.2','192.168.1.2','2011-11-20 00:43:10');
/*!40000 ALTER TABLE `user_autologin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `country` varchar(20) collate utf8_bin default NULL,
  `website` varchar(255) collate utf8_bin default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
INSERT INTO `user_profiles` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
CREATE TABLE `users` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
SET character_set_client = @saved_cs_client;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'sistemas','$P$Be/Nnvvex.4r.3WEmFwPCl8RpOmRQl.','dd@dd.com',1,0,NULL,NULL,NULL,NULL,NULL,'192.168.1.2','2011-11-21 23:53:10','2011-11-13 19:29:38','2011-11-22 02:53:10');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2011-11-22 15:20:57
