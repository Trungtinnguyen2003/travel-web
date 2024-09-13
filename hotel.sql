-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: hotel
-- ------------------------------------------------------
-- Server version	8.0.36

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hotels` (
  `hotel_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `address` varchar(525) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `amenities` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `hotel_images` varchar(255) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels`
--

LOCK TABLES `hotels` WRITE;
/*!40000 ALTER TABLE `hotels` DISABLE KEYS */;
INSERT INTO `hotels` VALUES (1,'Khách Sạn Ninh Kiều','Ninh kiều, Cần Thơ',3.7,'máy lạnh, hồ bơi, điều hòa','hoabinhhotel.jpg',2.99,NULL,'2024-04-30 03:49:59'),(3,'khach sạn ninh kiều','Ninh kiều',3.6,'máy lạnh, hồ bơi, điều hòa','hoabinhhotel.jpg',3.99,'2024-04-29 23:22:15','2024-04-29 23:22:15'),(4,'khach sạn ninh kiều','Ninh kiều',5.6,'máy lạnh, hồ bơi, điều hòa','hoabinhhotel.jpg',3.99,NULL,NULL),(5,'khach sạn ninh kiều','Ninh kiều',5.6,'máy lạnh, hồ bơi, điều hòa','hoabinhhotel.jpg',3.99,'2024-04-29 23:22:15','2024-04-29 23:22:15'),(6,'khach sạn ninh kiều','bkfjakf',4.2,'4284629849','hoabinhhotel.jpg',3.2,'2024-04-29 23:22:15','2024-04-30 03:50:25'),(7,'gdsgdfg','gdgdg',3.2,'dgdg','hoabinhhotel.jpg',3.2,'2024-04-29 23:22:15','2024-04-29 23:22:15'),(8,'gfdgd','fsf',4.2,'adadas','hoabinhhotel.jpg',3.2,'2024-04-29 23:22:15','2024-04-29 23:22:15');
/*!40000 ALTER TABLE `hotels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rooms` (
  `room_id` int NOT NULL,
  `room_type` varchar(255) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `published` tinyint(1) DEFAULT NULL,
  `rooms_images` varchar(255) DEFAULT NULL,
  `hotels_id` int DEFAULT NULL,
  PRIMARY KEY (`room_id`),
  UNIQUE KEY `hotels_id_UNIQUE` (`hotels_id`),
  CONSTRAINT `fpk_1` FOREIGN KEY (`hotels_id`) REFERENCES `hotels` (`hotel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `address` varchar(525) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'nguyentrong','123456','nguyen trong','trong@gmail.com',13013801,'can tho','user1','user'),(2,'ptrong','$2y$12$oBjqutMkusptMK2GO7xMY.JD9CE28rTXa0e286tABpWKY4iiusd7m',NULL,NULL,NULL,NULL,NULL,'user'),(3,'gialinh','$2y$12$jh5M/RW0v5Bp/WDRcW73Feh2GyadJufUH7f/YyivX.O2v0SPVHQE.',NULL,NULL,NULL,NULL,NULL,'user'),(4,'gialinhram','$2y$12$sHY46uRQjduZx9hD3BAciO9rUVUOhyEcZkN4BSURhHQVTfOvfRmxi',NULL,NULL,NULL,NULL,NULL,'user'),(5,'linram','$2y$12$xWKPk8iHqzPkuuiM.gsfJ.crPfeRoMELoAifudZFBWCc547Lp3wdS',NULL,NULL,NULL,NULL,NULL,'user');
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

-- Dump completed on 2024-07-04 22:07:07
