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
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `apartments`
--

LOCK TABLES `apartments` WRITE;
/*!40000 ALTER TABLE `apartments` DISABLE KEYS */;
INSERT INTO `apartments` VALUES (29,'Mieszkanie 1','Mieszkanie 1 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',60.00,6,'2020-05-26 16:32:20'),(30,'Mieszkanie 2','Mieszkanie 2 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',46.00,1,'2020-05-26 16:32:20'),(31,'Mieszkanie 3','Mieszkanie 3 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',75.00,5,'2020-05-26 16:32:20'),(32,'Mieszkanie 4','Mieszkanie 4 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',62.00,1,'2020-05-26 16:32:20'),(33,'Mieszkanie 5','Mieszkanie 5 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',63.00,3,'2020-05-26 16:32:20'),(34,'Mieszkanie 6','Mieszkanie 6 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',60.00,4,'2020-05-26 16:32:20'),(35,'Mieszkanie 7','Mieszkanie 7 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',47.00,5,'2020-05-26 16:32:20'),(36,'Mieszkanie 8','Mieszkanie 8 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',47.00,4,'2020-05-26 16:32:20'),(37,'Mieszkanie 9','Mieszkanie 9 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',61.00,5,'2020-05-26 16:32:20'),(38,'Mieszkanie 10','Mieszkanie 10 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',51.00,2,'2020-05-26 16:32:20'),(39,'Mieszkanie 11','Mieszkanie 11 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',75.00,1,'2020-05-26 16:32:20'),(40,'Mieszkanie 12','Mieszkanie 12 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',74.00,1,'2020-05-26 16:32:20'),(41,'Mieszkanie 13','Mieszkanie 13 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',45.00,4,'2020-05-26 16:32:20'),(42,'Mieszkanie 14','Mieszkanie 14 Lorem ipsum dolor sit amet, consectetur adipiscing elit. \n                In sit amet gravida purus. Vivamus nec magna quis ipsum imperdiet feugiat vitae ac quam',79.00,4,'2020-05-26 16:32:20');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Jan1','Testowy1','testowy_mail_1@test.pl','188073444','a:1:{i:0;s:9:\"ROLE_USER\";}','$argon2i$v=19$m=65536,t=4,p=1$aWZvRS5rMlhSc29GN2RBcA$KxYt8vrhLXjSPmO8ATKEDadVq8W9VAmInybm3wka53Y','Tx5WASvjn5tfxt0SXttv4tvYEVuYguDg','2020-05-26 16:32:20','2020-05-26 16:32:20'),(2,'Jan2','Testowy2','testowy_mail_2@test.pl','312635774','a:1:{i:0;s:9:\"ROLE_USER\";}','$argon2i$v=19$m=65536,t=4,p=1$czl3dlNRSkV3MlpTaEovSw$ZwcyQsQW6y3OgVEsVawxVBwbe/eG4sDQamVMrMIApqc','TKlTnrwCKVYW3WDgCrmBaNZYJnChY7FQ','2020-05-26 16:32:20','2020-05-26 16:32:20'),(3,'Jan3','Testowy3','testowy_mail_3@test.pl','94971313','a:1:{i:0;s:9:\"ROLE_USER\";}','$argon2i$v=19$m=65536,t=4,p=1$Vm1KQVZnREJpNS9FSldjNg$LD7uayZ2iTpw0b4rsiKJnCjF1tjKMFAxRFArG8y6Rco','QAO3t9lHO017EDZrI0hAR3kNnalWzkkR','2020-05-26 16:32:20','2020-05-26 16:32:20'),(4,'Jan4','Testowy4','testowy_mail_4@test.pl','177611291','a:1:{i:0;s:9:\"ROLE_USER\";}','$argon2i$v=19$m=65536,t=4,p=1$Li5QZEZ4bXhWUndUR1lrbw$QuBEZfNvZQyvu2LxSqdyM3ipdqFBv+o9SSdRIXzj3Do','18pkUxj4pVx1K85mIJSYMX61heRt1xqX','2020-05-26 16:32:20','2020-05-26 16:32:20'),(5,'Jan5','Testowy5','testowy_mail_5@test.pl','410985947','a:1:{i:0;s:9:\"ROLE_USER\";}','$argon2i$v=19$m=65536,t=4,p=1$VEd3VWFKSHVWQVdoMkVEeQ$2yM5c8fMviCb1J25SLax5HLdAGqrW78LRiNo9qIzJzo','Mbof9Xg7I0gC1ADEcMJI46pH390tPudG','2020-05-26 16:32:21','2020-05-26 16:32:21'),(6,'Jan6','Testowy6','testowy_mail_6@test.pl','348621223','a:1:{i:0;s:9:\"ROLE_USER\";}','$argon2i$v=19$m=65536,t=4,p=1$NEgwNGl5UG83UFd3ZUxlMQ$6OeHxpm3OVdzQp2bnpJSdHqYlLsP7e79Eh8clka6CCE','DQzyDCfyQhqxh4DJALwu0FH651V5Zcxl','2020-05-26 16:32:21','2020-05-26 16:32:21');
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

-- Dump completed on 2020-05-26 17:54:18
