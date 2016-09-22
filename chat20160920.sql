-- MySQL dump 10.13  Distrib 5.6.28, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: chat
-- ------------------------------------------------------
-- Server version	5.6.28-0ubuntu0.15.04.1

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
-- Table structure for table `gupshup`
--

DROP TABLE IF EXISTS `gupshup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gupshup` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `u_id` int(6) NOT NULL,
  `chat` text NOT NULL,
  `sent_time` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gupshup`
--

LOCK TABLES `gupshup` WRITE;
/*!40000 ALTER TABLE `gupshup` DISABLE KEYS */;
INSERT INTO `gupshup` VALUES (1,2,'Hello','2016-09-18 22:39:59'),(2,2,'How are you?','2016-09-18 22:40:12'),(3,2,'are you there?','2016-09-18 22:42:47'),(4,2,'helllooooooo','2016-09-18 22:43:50'),(5,1,'czvxcv','2016-09-18 22:44:02'),(6,1,'hello vikas','2016-09-18 22:50:14'),(7,1,'hELLO VIKAS ARE YOU THERE? BC','2016-09-18 22:54:43'),(8,2,'hey azim gaali mat de bkn','2016-09-18 22:57:26'),(9,1,'ok sorry','2016-09-18 22:59:53'),(10,1,'bura maan gaya kya?','2016-09-18 23:00:24'),(11,2,'nahi be mazak kar rha u','2016-09-18 23:00:45'),(12,1,'tab to gaand mara tu','2016-09-18 23:01:11'),(13,1,'fasdfad','2016-09-18 23:03:52'),(14,1,'adfasdf','2016-09-18 23:27:56'),(15,2,'ajsdfjas4','2016-09-18 23:28:19'),(16,2,'asdf','2016-09-18 23:28:30'),(17,2,'asdf','2016-09-18 23:28:31'),(18,2,'asdf','2016-09-18 23:28:33'),(19,2,'asdf','2016-09-18 23:28:34'),(20,2,'qqqqqq','2016-09-18 23:28:45'),(21,2,'qw','2016-09-18 23:28:47'),(22,2,'rrr','2016-09-18 23:28:49'),(23,2,'ttt','2016-09-18 23:28:51'),(24,2,'hi azim','2016-09-19 15:39:46'),(25,1,'aaa','2016-09-19 15:41:23'),(26,1,'Hello vikas','2016-09-19 15:41:31'),(27,2,'Hi azim','2016-09-19 15:41:39'),(28,1,'Hello world','2016-09-19 15:42:12');
/*!40000 ALTER TABLE `gupshup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `title` char(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `password` varchar(200) NOT NULL,
  `is_active` int(1) NOT NULL,
  `create_dt` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Mr.','Azim','Khan','azim@tedconsult.com','','d8578edf8458ce06fbc5bb76a58c5ca4',1,'2016-09-18 15:35:55'),(2,'Mr.','Vikas','Pandey','vikas@tedconsult.com','','d8578edf8458ce06fbc5bb76a58c5ca4',1,'2016-09-18 15:42:47');
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

-- Dump completed on 2016-09-20 10:21:14
