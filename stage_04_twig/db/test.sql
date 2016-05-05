USE retr0test;

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
) ENGINE=MyISAM AUTO_INCREMENT=125 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `developer`
--

LOCK TABLES `developer` WRITE;
/*!40000 ALTER TABLE `developer` DISABLE KEYS */;
INSERT INTO `developer` VALUES (118,'Konopelski-Keebler','http://senger.com/et-est-placeat-exercitationem-nihil','Repellendus sit cum maiores eveniet omnis officiis. Aliquam tenetur perspiciatis et rerum qui. Illo earum eaque nobis cum excepturi sed dicta.'),(119,'Nikolaus, Pfeffer and Marks','https://deckow.com/ut-in-facilis-eum-cupiditate-sunt-cum-aut-rerum.html','Qui qui qui iusto laudantium nihil laborum et. Enim corporis quidem amet maiores molestias corporis. Dolore sint velit aliquam.'),(120,'Toy, Erdman and Mosciski','http://gleichner.com/ipsa-consectetur-odit-voluptatem-quia-et','Laudantium pariatur qui autem autem. Molestias accusantium a fugiat esse minima. Repellat dolore alias maxime ut est voluptate quas.'),(121,'Hills-Koch','http://grant.net/','Officia voluptatem dolorem aperiam voluptatem dicta unde voluptas. Est doloremque est voluptatum occaecati aut. Error et quo rem nisi praesentium magni aut.'),(122,'Feest and Sons','http://dubuque.com/','Quis facilis et amet eius voluptate. Sapiente ea veritatis sapiente hic ipsa occaecati. Laudantium ipsum cupiditate est et unde.'),(123,'Flatley-Ferry','https://dicki.biz/voluptate-dolores-eos-consectetur-ut-laudantium.html','Minus neque quis omnis excepturi nisi. Incidunt nemo nemo eum. Quod odit voluptatem nihil alias quidem aut in quaerat.');
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
  `platform` varchar(16) COLLATE utf8_unicode_ci DEFAULT NULL,
  `released` char(4) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `screen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `developer_id` int(10) unsigned DEFAULT NULL,
  `description` tinytext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `developer_id` (`developer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (36,'9799204633909','Tillman-Hoppe','16339-9400','1995',15.92,'http://lorempixel.com/640/480/?13707',7,'Neque nesciunt et quisquam sunt. Sed qui consequatur nostrum sint ipsum. Similique consequatur quos dolore atque voluptas.'),(37,'9793167884064','O\'Connell, Frami and Barrows','61849-4541','1983',4.13,'http://lorempixel.com/640/480/?64127',3,'Magni praesentium ratione consectetur voluptas culpa. Amet sapiente aut neque modi. Id ut voluptas et debitis provident perspiciatis.'),(38,'9787186871723','Lueilwitz-Ruecker','60581-0921','1979',2.64,'http://lorempixel.com/640/480/?41373',9,'Aliquam et aut vitae excepturi. Minima qui voluptas praesentium quos dicta non. Molestias non sit quia natus ut saepe mollitia.'),(39,'9784624649074','Volkman-Jacobi','92800','1977',1.04,'http://lorempixel.com/640/480/?81971',3,'Autem ipsam explicabo error nobis non. Dignissimos est ad exercitationem autem vero nisi. Ut qui architecto et eius alias.'),(40,'9784038194122','Kozey-Osinski','27117-5728','1985',10.81,'http://lorempixel.com/640/480/?93341',6,'Possimus aut itaque aut expedita. Unde voluptatem voluptatem adipisci. Illum quam ducimus aut odio omnis maiores in.'),(41,'9785451808535','Haag-Carter','03015-7014','1998',3.89,'http://lorempixel.com/640/480/?58693',4,'Eligendi dolor fugit dolores ea rerum. Iure nobis eius possimus fugiat. Repellat neque officiis provident est.');
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
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `role` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=938 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (936,'my_test_user','kevin96@conroy.biz','$2y$10$stNYO4eX.AlBuVc6gwvQhuI86hH80XprdRHruys3q6wa2.NL/bxg6','Alexandrine','Collier',2);
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

-- Dump completed on 2016-05-05 11:26:37
