-- MySQL dump 10.13  Distrib 5.7.12, for Linux (x86_64)
--
-- Host: localhost    Database: retr0test
-- ------------------------------------------------------
-- Server version       5.7.12

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
-- Table structure for table `developer`
--

DROP TABLE IF EXISTS `developer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `developer` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` tinytext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=136 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `developer`
--

LOCK TABLES `developer` WRITE;
/*!40000 ALTER TABLE `developer` DISABLE KEYS */;
INSERT INTO `developer` VALUES (134,'Electronic Arts','http://www.ea.com/','Founded in 1982, Electronic Arts Inc. is a leading global interactive entertainment software company.'),(135,'Brøderbund Software','https://en.wikipedia.org/wiki/Br%C3%B8derbund','Founded in 1980, Brøderbund Software, Inc. was an American maker of video games. Brøderbund is best known for the 8-bit computer game hits Choplifter, Lode Runner, Karateka, and Prince of Persia .'),(133,'Interplay Ent Corp','http://www.interplay.com/','Founded in 1983, Interplay originally published successful titles in the Role-Playing Game (RPG) genre, including hits like Fallout 1 and 2, Planescape: Torment and the Baldur&#39;s Gate series.'),(132,'Deadline Games','https://en.wikipedia.org/wiki/Deadline_Games','Deadline Games A/S was a video game developer based in Copenhagen, Denmark, operating between 1996 and 2009. Its last published game was Watchmen: The End Is Nigh, based on Watchmen.'),(131,'Irrational Games','http://irrationalgames.com/','As an award winning video game developer founded in 1997 by Ken Levine, Jonathan Chey, and Robert Fermier. Irrational Games made its name with the much loved first person shooter System Shock 2.');
/*!40000 ALTER TABLE `developer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `platform` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
  `released` char(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` varchar(7) COLLATE utf8_unicode_ci DEFAULT NULL,
  `screen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `developer_id` int(10) unsigned DEFAULT NULL,
  `description` tinytext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `developer_id` (`developer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (49,'SEA004','The Sims 2','Nintendo DS','2005','8.00','sims2_ss.jpg',134,'Life Simulation'),(50,'SEA007','The Sims 2','GameCube','2005','7.00','sims2_ss.jpg',134,'Life Simulation'),(47,'IE005','Baldur&#39;s Gate II','Windows','2000','9.00','baldursgate_ss.png',133,'Fantasy RPG'),(48,'CDG003','Chili Con Carnage','PSP','2007','6.00','chili.jpg',132,'Comedy Action 3rd person shooter'),(44,'BIG001','Bioshock','XBox 360','2007','6.00','bioshock_ss.jpg',131,'Fantasy 1st person shooter'),(45,'BIG002','Bioshock','PS3','2008','6.00','bioshock_ss.jpg',131,'Fantasy 1st person shooter'),(46,'BIG003','Bioshock','Windows','2007','6.00','bioshock_ss.jpg',131,'Fantasy 1st person shooter'),(51,'PHMR02','Prince of Persia','Sega Master System','1992','26.00','prince_persia_ss.png',135,'Fantasy'),(52,'PHMR75','Prince of Persia','Gameboy Color','1999','20.00','prince_persia_ss.png',135,'Fantasy'),(53,'PHMR08','Prince of Persia','Amstrad PCP','1990','25.00','prince_persia_ss.png',135,'Fantasy');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `role` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'Me','Mememe','meme@meme.me','meme','$2y$10$pxHe3M0boyS2MVvM3NdRdeswBGg4fQ4phjksMBEFJFjK3tiyPWU9S',2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `video` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `screen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `description` tinytext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `video`
--

LOCK TABLES `video` WRITE;
/*!40000 ALTER TABLE `video` DISABLE KEYS */;
INSERT INTO `video` VALUES (101,'Towne, Marks and Sawayn','http://lorempixel.com/640/480/?82057','http://carroll.com/voluptas-maxime-rerum-est-sed','Odit sunt cupiditate et libero dicta dolor. Quia quam cupiditate voluptatem. Aliquam et quibusdam et quia.');
/*!40000 ALTER TABLE `video` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-07 13:59:31
