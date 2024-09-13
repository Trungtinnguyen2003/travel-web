-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: hotel
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounts` (
  `account_id` int NOT NULL AUTO_INCREMENT,
  `role` enum('admin','staff','customer') DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `rank_account` enum('vang','bac','đong','bach kim') DEFAULT NULL,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (33,'customer','user1','$2y$10$eMrKje.xBxYL9cgiJLfhDO0li2jdlYGdgfBSWvHpKfxL0TysLQmpi',NULL),(34,'customer','user2','$2y$10$yDKb.doy.2mXLZCjvxIple1qMsIRK3hBHiI4vVy4UGvAoReqtU8FW',NULL),(35,'customer','user3','$2y$10$14VKYns1OIUlfoDnQdxhU.mQA3LsZctazbVAqJihTAw.GYgHAcO5.',NULL),(36,'customer','user4','$2y$10$fc8tDVSb86N2xbNHH6MB8O1ETDsq5Q8lFl2YRCFmv14b0k3YzHFbO',NULL),(37,'customer','user5','$2y$10$/oT9BL6qiRCdprblNaUzM.4iGb56bPttIlg4.260kUWvTqNp69hMK',NULL),(38,'customer','dq','$2y$10$OMTMlk8FKnILu9eTpjDAvO/8P0qajudx7MApWMrllc7s97uEyjw3y',NULL),(39,'customer','user6','$2y$10$u9X8MWMs8RUcbCyxIzadkOCxNduFblP2fXkhgiC/vsO.XK6Ude4cO',NULL),(40,'customer','daisy','$2y$10$c1sQSF6uq.gbNHvQB9nKiutRfne/k8DTltl0HKy2jM4QfPqs0/z3u',NULL),(42,'customer','Gia Linh','$2y$10$.kn8Vsj5Hn8kkKIiGUl8dubNjlfW16duJJqnt8pDJtfNWe4tcGnlW',NULL),(43,'customer','user12','$2y$10$sDSe/SucMEb86mjOJD9Fuuopq0OhcVAeCAaw9/PZwWCrewny9MBPW',NULL),(44,'customer','Phước Trọng','$2y$10$odZootyllFCgBL/oWsAZuuFG0y88TDsiSFbwWCKELavU2vemOe8fO',NULL),(45,'customer','linh','$2y$10$Or4JRFqWgkQYqNXG.7Ga0OS8jDs3uTewmccLTUPk7RlI2SC9a0pve',NULL),(46,'customer','B2111934','$2y$10$nqYAjyOv6uoX/oTZjh759OxjRCS4NpCQ/dGvf9YHuopJDwL2tb9yW',NULL),(47,'customer','ct216h','$2y$10$5LFypdWp06cBnNc4cMhuEOmVQfHx8aEduONi0Sqk4/5GxFOAzwP32',NULL),(48,'customer','hakhang','$2y$10$vhLUK73a8XMwoxNfq3NBE.CZyTgST8iJFccYgpxgll20W0BRKgyeW',NULL);
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bookings` (
  `booking_id` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `room_id` int DEFAULT NULL,
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `total_price` int DEFAULT NULL,
  `pay` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`booking_id`),
  KEY `customer_id` (`customer_id`),
  KEY `bookings_ibfk4_idx` (`room_id`),
  CONSTRAINT `bookings_ibfk4` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`),
  CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `address` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `customer_image` varchar(255) DEFAULT NULL,
  `account_id` int DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `account_id` (`account_id`),
  CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `accounts` (`account_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Gia Linh','Nguyễn','ngglinh@gmail.com',943334824,'Ninh Kiều - Cần Thơ','gialinh_nguyen.jpg',NULL,NULL),(2,'Khánh Linh','Trương','tklinh@gmail.com',989999510,'Đà Nẵng','khanhlinh_truong.jpg',NULL,NULL),(3,'Linh','Gia','ngglinh02@gmail.com',943332448,'An Kháng - Cần Thơ','nglinh.jpg',NULL,NULL),(4,'Chloe','Nguyễn','chloenguyen@gmail.com',934442448,'Cái Răng - Cần Thơ','chloe_nguyen.jpg',NULL,NULL),(5,'Phước Trọng','Nguyễn','nptrong@gmail.com',326820003,'Đà Lạt','phuoctrong_nguyen.jpg',NULL,NULL),(6,'Ánh Dương','Nguyễn','naduong@gmail.com',944441440,'Rạch Giá','anhduong_nguyen.jpg',NULL,NULL),(7,'Bình Minh','Đặng','nbminh@gmail.com',916975975,'Sài Gòn','binhminh_dang.jpg',NULL,NULL),(8,'Laelia','Kaylin','lealiakaylin@gmail.com',947577584,'Hà Giang','lealia_kaylin.jpg',NULL,NULL),(9,'Tuệ Mẫn ','Trương','ttman@gmail.com',946313233,'Ninh Binh','tueman_truong.jpg',NULL,NULL),(10,'Thanh Thúy','Lưu','ltthuy@gmail.com',918567100,'Thái Bình','thanhthuy_luu.jpg',NULL,NULL),(24,'Gia Linh',NULL,NULL,NULL,NULL,NULL,42,NULL),(25,'user5',NULL,NULL,NULL,NULL,NULL,37,NULL),(26,'nguyễn','gia','ngglinh02@gmail.com',943334824,'tran nam phu','1714720293_cus3_nglinh.jpg',45,NULL),(27,'Gia Linh','Nguyễn','ngl@gmail.com',1234567890,'123 3/2','1714826389_cus8_laelia_kaylin.jpg',46,NULL),(28,'ct216h','cit','cit@gmail.com',1234567890,'can tho','1714827166_saigoncanthohotel.jpg',47,NULL),(29,'hakhang',NULL,NULL,NULL,NULL,NULL,48,NULL);
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hotels`
--

DROP TABLE IF EXISTS `hotels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hotels` (
  `hotel_id` int NOT NULL AUTO_INCREMENT,
  `hotel_name` varchar(255) DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `number_rooms` int DEFAULT NULL,
  `amenities` varchar(500) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `hotel_image` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hotels`
--

LOCK TABLES `hotels` WRITE;
/*!40000 ALTER TABLE `hotels` DISABLE KEYS */;
INSERT INTO `hotels` VALUES (1,'Mekong','5 Hai Bà Trưng - Ninh Kiều  - Cần Thơ',4.7,10,'Buffet sáng miễn phí, dọn phòng hằng ngày','mekonghotel.jpg','2024-05-03 06:28:36',NULL),(2,'Tâm Hùng','38 Nguyễn Trãi',4.2,20,'Dịch vụ trông trẻ, Spa, gội đầu dưỡng sinh','tamhunghotel.jpg',NULL,NULL),(3,'Cát Tường','520 Đại Lộ Hòa Bình',4.1,15,'Dọn phòng hằng ngày, dịch vụ giặt sấy, spa, karaoke','cattuonghotel.jpg',NULL,NULL),(4,'RiverSide','33 Hùng Vương',4.9,30,'Bãi đậu xe rộng, bếp ăn gia đình','riversidehotel.jpg',NULL,NULL),(5,'Hòa Bình','100 Thủ Khoa Huân ',4.1,25,'Quầy lưu niệm, tiệm bánh ngọt và coffe, sân vườn','hoabinhhotel.jpg',NULL,NULL),(6,'Flower','225 Tân Trào',4.7,8,'Phòng gym, spa, hồ bơi','flowerhotel.jpg',NULL,NULL),(7,'Rose','2 Điện Biên Phủ',4.2,15,'Thú cưng được vào khách sạn, dịch vụ giữ hành lý, spa thú cưng','rosehotel.jpg',NULL,NULL),(8,'Thịnh Vượng','1314 Nguyễn An Ninh',4.5,20,'Sân vườn, thang máy, wifi miễn phí','thinhvuonghotel.jpg',NULL,NULL),(9,'Tây Đô','68 Trần Nam Phú',4.8,30,'Sân vườn, nước miễn phí, hồ bơi','taydohotel.jpg',NULL,NULL),(10,'Gạo Trắng','999 Nguyễn Văn Cừ',4.3,15,'Quầy bar, phòng karaoke, gội đầu dưỡng sinh','gaotranghotel.jpg',NULL,NULL),(11,'TL Homestay','45 Nguyễn Đệ',4.4,12,'Quầy lưu niệm, thang máy, dịch vụ đưa đón sân bay','TLhomestay.jpg',NULL,NULL),(12,'Sài Gòn - Cần Thơ','3  Trần Hoàng Na',4.7,17,'Giao dịch không tiếp xúc, đổi ngoại tệ giá tốt','saigoncanthohotel.jpg',NULL,NULL),(14,'Như Ý','Tử Cấm Thành',4,NULL,'abc','1714826555_tamhunghotel.jfif','2024-05-04 05:42:35','2024-05-04 04:14:01');
/*!40000 ALTER TABLE `hotels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `review_id` int NOT NULL,
  `customer_id` int DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`review_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (1,5,4.5,'sach se, nhan vien cskh tot, an ninh tot, se quay lai','2024-05-04'),(2,4,4.9,'thoang mat, sach se, phuong tien di chuyen thuan loi','2023-07-12'),(3,3,4,'cskh tot, nhan vien, vui ve nhiet tinh','2024-01-05'),(4,2,5,'sach se, thoang mat','2024-02-29'),(5,1,4.4,'buffet sang tuyet voi, sach se, view dep','2024-03-24'),(6,6,4.6,'ho boi sach se, thoang mat','2023-12-12'),(7,7,4.7,'view dep ngam hoang hon','2024-01-24'),(8,8,4.9,'sach se, thoang mat, view ok','2023-12-31'),(9,9,5,'an ninh tot, cskh tot','2024-03-20'),(10,10,4.8,'sach se, view ngam binh minh dep, thoang mat','2023-10-30');
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rooms` (
  `room_id` int NOT NULL AUTO_INCREMENT,
  `hotel_id` int DEFAULT NULL,
  `room_type` varchar(255) DEFAULT NULL,
  `price_per_night` int DEFAULT NULL,
  `availability` tinyint(1) DEFAULT NULL,
  `room_image` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`room_id`),
  KEY `fk1_idx` (`hotel_id`),
  CONSTRAINT `fk1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,1,'Standard Double Roomm',2334,0,'1714818494_room_Deluxe_Double_Room_With_Window.jfif','2024-05-04 03:36:28',NULL),(2,1,'Deluxe Twin',30,0,'roomDeluxe Twin.jpg',NULL,NULL),(3,1,'Deluxe Triple',40,0,'room_Deluxe Triple.jpg',NULL,NULL),(4,1,'Family Suites',50,1,'room_Family_Suites.jpg',NULL,NULL),(5,1,'Executive Family Suite with Balcony',60,0,'room_Executive_Family_Suite_with_Balcony.jpg',NULL,NULL),(6,2,'Standard Double',35,1,'room_Standard_Double.jpg',NULL,NULL),(7,2,'Deluxe Double Room With Window',60,0,'room_Deluxe_Double_Room_With_Window.jpg',NULL,NULL),(8,2,'Executive Double Suite with Balcony',61,1,'room_Executive_Double_Suite_with_Balcony.jpg',NULL,NULL),(9,2,'Deluxe Triple',60,0,'room_Deluxe Triple.jpg',NULL,NULL),(10,2,'Family Quadruple Room for 4 People',80,0,'room_Family_Quadruple_Room_for_4_People.jpg',NULL,NULL),(11,3,'Large Double Room',27,1,'room_Large_Double_Room.jpg',NULL,NULL),(12,3,'Deluxe Twin',35,0,'roomDeluxe Twin.jpg',NULL,NULL),(13,3,'Deluxe Double Room With Window',60,0,'room_Deluxe_Double_Room_With_Window.jpg',NULL,NULL),(14,3,'Family Suites',90,1,'room_Family_Suites.jpg',NULL,NULL),(15,3,'Executive Family Suite with Balcony',100,1,'room_Executive_Family_Suite_with_Balcony.jpg',NULL,NULL),(16,4,'1 Bedroom Suite',23,1,'room_1_Bedroom_Suite.jpg',NULL,NULL),(17,4,'Deluxe Double Room With Window',49,1,'room_Deluxe_Double_Room_With_Window.jpg',NULL,NULL),(18,4,'Standard Double',22,0,'room_Standard_Double.jpg',NULL,NULL),(19,4,'Deluxe Triple',60,0,'room_Deluxe Triple.jpg',NULL,NULL),(20,4,'Family Quadruple Room for 4 People',82,0,'room_Family_Quadruple_Room_for_4_People.jpg',NULL,NULL),(21,5,'Standard Double',34,0,'room_Standard_Double.jpg',NULL,NULL),(22,5,'Deluxe Double Room With Window',49,1,'room_Deluxe_Double_Room_With_Window.jpg',NULL,NULL),(23,5,'Family Quadruple Room for 4 People',51,0,'room_Family_Quadruple_Room_for_4_People.jpg',NULL,NULL),(24,5,'Deluxe Triple',60,0,'room_Deluxe Triple.jpg',NULL,NULL),(25,5,'Executive Family Suite with Balcony',83,1,'room_Executive_Family_Suite_with_Balcony.jpg',NULL,NULL),(26,6,'1 Bedroom Suite',20,0,'room_1_Bedroom_Suite.jpg',NULL,NULL),(27,6,'Large Double Room',30,0,'room_Large_Double_Room.jpg',NULL,NULL),(28,6,'Deluxe Twin',40,1,'roomDeluxe Twin.jpg',NULL,NULL),(29,6,'Standard Double',43,1,'room_Standard_Double.jpg',NULL,NULL),(30,6,'Deluxe Triple',48,0,'room_Deluxe Triple.jpg',NULL,NULL),(31,7,'Deluxe Twin',25,1,'roomDeluxe Twin.jpg',NULL,NULL),(32,7,'Deluxe Double Room With Window',35,0,'room_Deluxe_Double_Room_With_Window.jpg',NULL,NULL),(33,7,'Deluxe Triple',35,1,'room_Deluxe Triple.jpg',NULL,NULL),(34,7,'Executive Double Suite with Balcony',93,1,'room_Executive_Double_Suite_with_Balcony.jpg',NULL,NULL),(35,7,'Executive Family Suite with Balcony',100,1,'room_Executive_Family_Suite_with_Balcony.jpg',NULL,NULL),(36,8,'1 Bedroom Suite',19,0,'room_1_Bedroom_Suite.jpg',NULL,NULL),(37,8,'Standard Double Room(No Window)',24,1,'room_Standard_Double_Room(No_Window).jpg',NULL,NULL),(38,8,'Standard Double',53,0,'room_Standard_Double.jpg',NULL,NULL),(39,8,'Family Suites',41,0,'room_Family_Suites.jpg',NULL,NULL),(40,8,'Large Double Room',48,1,'room_Large_Double_Room.jpg',NULL,NULL),(41,9,'Executive Double Suite with Balcony',51,0,'room_Executive_Double_Suite_with_Balcony.jpg',NULL,NULL),(42,9,'Executive Family Suite with Balcony',45,0,'room_Executive_Family_Suite_with_Balcony.jpg',NULL,NULL),(43,9,'Deluxe Double Room With Window',43,0,'room_Deluxe_Double_Room_With_Window.jpg',NULL,NULL),(44,9,'Deluxe Triple',23,0,'room_Deluxe Triple.jpg',NULL,NULL),(45,9,'1 Bedroom Suite',18,1,'room_1_Bedroom_Suite.jpg',NULL,NULL),(46,10,'Standard Double Room(No Window)',29,0,'room_Standard_Double_Room(No_Window).jpg',NULL,NULL),(47,10,'Standard Double',34,1,'room_Standard_Double.jpg',NULL,NULL),(48,10,'Large Double Room',43,1,'room_Large_Double_Room.jpg',NULL,NULL),(49,10,'Family Suites',50,0,'room_Family_Suites.jpg',NULL,NULL),(50,10,'Family Quadruple Room for 4 People',80,0,'room_Family_Quadruple_Room_for_4_People.jpg',NULL,NULL),(51,11,'1 Bedroom Suite',23,1,'room_1_Bedroom_Suite.jpg',NULL,NULL),(52,11,'Deluxe Twin',33,1,'roomDeluxe Twin.jpg',NULL,NULL),(53,11,'Family Quadruple Room for 4 People',55,0,'room_Family_Quadruple_Room_for_4_People.jpg',NULL,NULL),(54,11,'Deluxe Double Room With Window',56,1,'Deluxe Double Room With Window',NULL,NULL),(55,11,'Executive Family Suite with Balcony',57,1,'Executive Family Suite with Balcony',NULL,NULL),(56,12,'Deluxe Double Room With Window',58,1,'room_Deluxe_Double_Room_With_Window.jpg',NULL,NULL),(57,12,'Standard Double Room(No Window)',22,0,'room_Standard_Double_Room(No_Window).jpg',NULL,NULL),(58,12,'1 Bedroom Suite',29,0,'room_1_Bedroom_Suite.jpg',NULL,NULL),(59,12,'Large Double Room',34,1,'room_Large_Double_Room.jpg',NULL,NULL),(60,12,'Deluxe Twin',36,0,'roomDeluxe Twin.jpg',NULL,NULL),(61,1,'Standard Double',35,1,'room_Standard_Double.jpg',NULL,NULL),(63,1,'Deluxe Double Room With Window',38,0,'room_Deluxe_Double_Room_With_Window.jpg',NULL,NULL),(64,2,'Large Double Room',55,1,'room_Large_Double_Room.jpg',NULL,NULL),(65,2,'Deluxe Twin',45,1,'roomDeluxe Twin.jpg',NULL,NULL),(66,2,'Family Suites',57,1,'room_Family_Suites.jpg',NULL,NULL),(67,3,'1 Bedroom Suite',22,0,'room_1_Bedroom_Suite.jpg',NULL,NULL),(68,3,'Deluxe Triple',33,1,'room_Deluxe Triple.jpg',NULL,NULL),(69,3,'Standard Double Room(No Window)',22,1,'room_Standard_Double_Room(No_Window).jpg',NULL,NULL),(70,4,'Deluxe Twin',34,1,'roomDeluxe Twin.jpg',NULL,NULL),(71,4,'Large Double Room',43,1,'room_Large_Double_Room.jpg',NULL,NULL),(72,4,'Family Suites',47,1,'room_Family_Suites.jpg',NULL,NULL),(73,5,'Family Suites',44,0,'room_Family_Suites.jpg',NULL,NULL),(74,5,'Deluxe Twin',34,0,'roomDeluxe Twin.jpg',NULL,NULL),(75,5,'Large Double Room',50,1,'room_Large_Double_Room.jpg',NULL,NULL),(76,6,'Family Suites',29,1,'room_Family_Suites.jpg',NULL,NULL),(77,6,'Deluxe Double Room With Window',39,1,'room_Deluxe_Double_Room_With_Window.jpg',NULL,NULL),(78,6,'Standard Double Room(No Window)',45,0,'room_Standard_Double_Room(No_Window).jpg',NULL,NULL),(79,7,'Family Suites',45,1,'room_Family_Suites.jpg',NULL,NULL),(80,7,'Large Double Room',55,0,'room_Large_Double_Room.jpg',NULL,NULL),(81,7,'1 Bedroom Suite',23,0,'room_1_Bedroom_Suite.jpg',NULL,NULL),(82,8,'Deluxe Double Room With Window',55,0,'room_Deluxe_Double_Room_With_Window.jpg',NULL,NULL),(83,8,'Deluxe Triple',33,0,'room_Deluxe Triple.jpg',NULL,NULL),(84,8,'Deluxe Twin',35,1,'roomDeluxe Twin.jpg',NULL,NULL),(85,9,'Family Suites',45,1,'room_Family_Suites.jpg',NULL,NULL),(86,9,'Large Double Room',39,1,'room_Large_Double_Room.jpg',NULL,NULL),(87,9,'Deluxe Twin',35,0,'roomDeluxe Twin.jpg',NULL,NULL),(88,10,'Deluxe Twin',28,1,'roomDeluxe Twin.jpg',NULL,NULL),(89,10,'1 Bedroom Suite',22,0,'room_1_Bedroom_Suite.jpg',NULL,NULL),(90,10,'Deluxe Double Room With Window',38,1,'room_Deluxe_Double_Room_With_Window.jpg',NULL,NULL),(91,11,'Family Suites',55,0,'room_Family_Suites.jpg',NULL,NULL),(92,11,'Large Double Room',45,1,'room_Large_Double_Room.jpg',NULL,NULL),(93,11,'Deluxe Triple',33,0,'room_Deluxe Triple.jpg',NULL,NULL),(94,12,'Family Suites',49,1,'room_Family_Suites.jpg',NULL,NULL),(95,12,'Executive Double Suite with Balcony',50,1,'room_Executive_Double_Suite_with_Balcony.jpg',NULL,NULL),(96,12,'Deluxe Triple',33,0,'room_Deluxe Triple.jpg',NULL,NULL),(104,14,'chung túy cung',99,1,'1714826607_room_Family_Quadruple_Room_for_4_People.jfif','2024-05-04 05:43:40','2024-05-04 05:43:27');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-16 22:16:28
