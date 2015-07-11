CREATE DATABASE  IF NOT EXISTS `mao10cms` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `mao10cms`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: mao10cms
-- ------------------------------------------------------
-- Server version	5.5.32

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
-- Table structure for table `mc_order`
--

DROP TABLE IF EXISTS `mc_order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mc_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `number` varchar(20) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `send_time` datetime DEFAULT NULL,
  `creat_time` datetime DEFAULT NULL,
  `note` text,
  `pro_id` int(11) unsigned NOT NULL,
  `price` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mc_order`
--

LOCK TABLES `mc_order` WRITE;
/*!40000 ALTER TABLE `mc_order` DISABLE KEYS */;
INSERT INTO `mc_order` VALUES (1,'1201408060111161166',1,'郭栋',0,'15234399470','山西省 吕梁市文水县',1,NULL,'2014-08-06 01:11:17','hello',1,39.80),(2,'1201408060119027492',1,'郭栋',0,'15234399470','山西省 吕梁市文水县',5,NULL,'2014-08-06 01:19:03','hello',9,39.80),(3,'1201408060119027492',1,'郭栋',0,'15234399470','山西省 吕梁市文水县',1,NULL,'2014-08-06 01:19:03','hello',8,39.80),(4,'1201408060119027492',1,'郭栋',0,'15234399470','山西省 吕梁市文水县',1,NULL,'2014-08-06 01:19:03','hello',7,39.80),(5,'1201408060120148932',1,'郭栋',0,'15234399470','山西省 吕梁市文水县',5,NULL,'2014-08-06 01:20:15','hello',9,39.80),(6,'1201408060120148932',1,'郭栋',0,'15234399470','山西省 吕梁市文水县',1,NULL,'2014-08-06 01:20:15','hello',8,39.80),(7,'1201408060120148932',1,'郭栋',0,'15234399470','山西省 吕梁市文水县',1,NULL,'2014-08-06 01:20:15','hello',7,39.80);
/*!40000 ALTER TABLE `mc_order` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-06  1:24:42
