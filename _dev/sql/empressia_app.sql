-- MySQL dump 10.16  Distrib 10.1.40-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: empressia_app
-- ------------------------------------------------------
-- Server version	10.1.40-MariaDB

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
-- Table structure for table `apartments`
--

DROP TABLE IF EXISTS `apartments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `slot_day_price` decimal(7,2) NOT NULL DEFAULT '0.00',
  `slots_count` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartments`
--

LOCK TABLES `apartments` WRITE;
/*!40000 ALTER TABLE `apartments` DISABLE KEYS */;
INSERT INTO `apartments` VALUES (1,'Mieszkanie 1','Mieszkanie 1 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',64.00,4,'2020-05-25 23:17:29'),(2,'Mieszkanie 2','Mieszkanie 2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',60.00,5,'2020-05-25 23:17:29'),(3,'Mieszkanie 3','Mieszkanie 3 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',57.00,3,'2020-05-25 23:17:29'),(4,'Mieszkanie 4','Mieszkanie 4 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',47.00,2,'2020-05-25 23:17:29'),(5,'Mieszkanie 5','Mieszkanie 5 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',57.00,4,'2020-05-25 23:17:29'),(6,'Mieszkanie 6','Mieszkanie 6 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',50.00,1,'2020-05-25 23:17:29'),(7,'Mieszkanie 7','Mieszkanie 7 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',71.00,4,'2020-05-25 23:17:29'),(8,'Mieszkanie 8','Mieszkanie 8 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',50.00,5,'2020-05-25 23:17:29'),(9,'Mieszkanie 9','Mieszkanie 9 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',77.00,3,'2020-05-25 23:17:29'),(10,'Mieszkanie 10','Mieszkanie 10 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',57.00,3,'2020-05-25 23:17:29'),(11,'Mieszkanie 11','Mieszkanie 11 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',42.00,2,'2020-05-25 23:17:29'),(12,'Mieszkanie 12','Mieszkanie 12 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',52.00,1,'2020-05-25 23:17:29'),(13,'Mieszkanie 13','Mieszkanie 13 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',50.00,1,'2020-05-25 23:17:29'),(14,'Mieszkanie 14','Mieszkanie 14 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',49.00,4,'2020-05-25 23:17:29');
/*!40000 ALTER TABLE `apartments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `apartments_reservations`
--

DROP TABLE IF EXISTS `apartments_reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `apartments_reservations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `apartment_id` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `reservation_start` date DEFAULT NULL,
  `reservation_end` date DEFAULT NULL,
  `reservation_days` int(11) NOT NULL DEFAULT '1',
  `peoples_number` int(11) NOT NULL DEFAULT '1',
  `payment_without_discount` decimal(7,2) NOT NULL DEFAULT '0.00',
  `payment_with_discount` decimal(7,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_A82722FC176DFE85` (`apartment_id`),
  KEY `IDX_A82722FCA76ED395` (`user_id`),
  CONSTRAINT `FK_A82722FC176DFE85` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_A82722FCA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartments_reservations`
--

LOCK TABLES `apartments_reservations` WRITE;
/*!40000 ALTER TABLE `apartments_reservations` DISABLE KEYS */;
/*!40000 ALTER TABLE `apartments_reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20200525211715','2020-05-25 21:17:21');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(16) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salt` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2020-05-25 23:17:35
