-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: table_29m
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `users_29m`
--

DROP TABLE IF EXISTS `users_29m`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_29m` (
  `USER_ID` int(11) NOT NULL AUTO_INCREMENT,
  `LOGIN` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `DISCOUNT` int(11) NOT NULL DEFAULT 0,
  `delivery_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`USER_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_29m`
--

LOCK TABLES `users_29m` WRITE;
/*!40000 ALTER TABLE `users_29m` DISABLE KEYS */;
INSERT INTO `users_29m` VALUES (15,'pasha','7f883efe9fd0247733f3d6ce83d587da',15,'Москва, Кремль 1'),(17,'admin@ya.ru','admin@',0,NULL),(18,'vkUser@ya.ru','vkvk',0,NULL),(19,'456@ya.ru','456',0,NULL),(20,'user1@ya.ru','123',0,NULL),(55,'qwerty@mail.ru','0d509c23a0bea89bad0b51cc96dccdccc81535d0ae8e84f31b5a5fdd93d91765',0,NULL),(56,'qwerty@mail.ru','71064b8c0ad06e76aeac72c8f817bff565c6bf2f0262267cf154990a177e399c',0,NULL),(57,'user1@ya.ru','71064b8c0ad06e76aeac72c8f817bff565c6bf2f0262267cf154990a177e399c',0,NULL);
/*!40000 ALTER TABLE `users_29m` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'table_29m'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-06-29 12:38:09
