/*
SQLyog Enterprise v13.1.1 (64 bit)
MySQL - 5.7.33 : Database - cotizacion
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cotizacion` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `cotizacion`;

/*Table structure for table `ciudad` */

DROP TABLE IF EXISTS `ciudad`;

CREATE TABLE `ciudad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Table structure for table `cliente` */

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente` (
  `idCli` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL,
  `idCiudad` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCli`),
  KEY `idCiudad` (`idCiudad`),
  CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`idCiudad`) REFERENCES `ciudad` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Table structure for table `cotizacion` */

DROP TABLE IF EXISTS `encargado`;

CREATE TABLE `encargado` (
  `idEnc` int(11) NOT NULL AUTO_INCREMENT,
  `ci` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `telefono` int(11) NOT NULL DEFAULT '0',
  `direccion` varchar(50) NOT NULL,
  PRIMARY KEY (`idEnc`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Table structure for table `marca` */

DROP TABLE IF EXISTS `marca`;

CREATE TABLE `marca` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;


/*Table structure for table `producto` */

DROP TABLE IF EXISTS `producto`;

CREATE TABLE `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `costo` float(11,1) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `costoVenta` float(11,1) DEFAULT NULL,
  `idMarca` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK_producto_marca` (`idMarca`) USING BTREE,
  CONSTRAINT `FK_producto_marca` FOREIGN KEY (`idMarca`) REFERENCES `marca` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

DROP TABLE IF EXISTS `cotizacion`;

CREATE TABLE `cotizacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idEncargado` int(11) DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `idCliente` (`idCliente`),
  KEY `idEncargado` (`idEncargado`),
  CONSTRAINT `cotizacion_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCli`),
  CONSTRAINT `cotizacion_ibfk_2` FOREIGN KEY (`idEncargado`) REFERENCES `encargado` (`idEnc`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `detalle` */

DROP TABLE IF EXISTS `detalle`;

CREATE TABLE `detalle` (
  `idC` int(11) NOT NULL,
  `idP` int(11) NOT NULL,
  `costoTotal` float NOT NULL,
  KEY `FK_detalle_cotizacion` (`idC`),
  KEY `FK_detalle_producto` (`idP`),
  CONSTRAINT `FK_detalle_cotizacion` FOREIGN KEY (`idC`) REFERENCES `cotizacion` (`id`),
  CONSTRAINT `FK_detalle_producto` FOREIGN KEY (`idP`) REFERENCES `producto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `encargado` */

