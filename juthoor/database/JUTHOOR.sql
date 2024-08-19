-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: juthoor
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `Admin_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` text NOT NULL,
  `Password` text NOT NULL,
  `Admin_Fname` text NOT NULL,
  `Admin_Lname` text NOT NULL,
  `Admin_Email` text NOT NULL,
  PRIMARY KEY (`Admin_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin','123','','','');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `Cust_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Username` text NOT NULL,
  `Email` text NOT NULL,
  `Password` text NOT NULL,
  `Phone_Number` int(11) NOT NULL,
  `Fname` text DEFAULT NULL,
  `Lname` text DEFAULT NULL,
  `Ship_address` text DEFAULT NULL,
  `City` text DEFAULT NULL,
  PRIMARY KEY (`Cust_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'layan','test@test.com','123',774349402,'LAYAN','Aymen','KSA','Makkah');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment` (
  `Pay_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Card_name` text NOT NULL,
  `Card_number` int(16) NOT NULL,
  `CVV` int(4) NOT NULL,
  `Exp_date` varchar(30) NOT NULL,
  `Shop_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Pay_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,'aaaa',2147483647,123,'',NULL);
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plants`
--

DROP TABLE IF EXISTS `plants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plants` (
  `Plant_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Plant_name` text NOT NULL,
  `Plant_type` text NOT NULL,
  `Pdescription` text DEFAULT NULL,
  `Image` varchar(200) NOT NULL,
  `Price` double NOT NULL,
  `Quantity_num` int(11) DEFAULT NULL,
  `Admin_ID` int(11) DEFAULT NULL,
  `Cust_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`Plant_ID`),
  KEY `Admin_ID_fk` (`Admin_ID`),
  KEY `Cust_ID_fk` (`Cust_ID`),
  CONSTRAINT `plants_ibfk_1` FOREIGN KEY (`Admin_ID`) REFERENCES `admin` (`Admin_ID`),
  CONSTRAINT `plants_ibfk_2` FOREIGN KEY (`Cust_ID`) REFERENCES `customer` (`Cust_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plants`
--

LOCK TABLES `plants` WRITE;
/*!40000 ALTER TABLE `plants` DISABLE KEYS */;
INSERT INTO `plants` VALUES (1,'Pink Princess','Plant',NULL,'p1.jpg',350,20,NULL,NULL),(2,'FamilyShip Planets Organic soil','Care',NULL,'c1.jpeg',55,20,NULL,NULL),(3,'Philodendron','Plant',NULL,'p2.jpeg',200,20,NULL,NULL),(4,'Monstera','Plant',NULL,'p3.jpeg',250,20,NULL,NULL),(5,'Alocasia','Plant',NULL,'Photo5.jpg',400,20,NULL,NULL),(6,'Swiss Cheese Plant Big Leaf','Plant',NULL,'Photo15.jpg',300,20,NULL,NULL),(7,'The Spiky Sansevieria','Plant',NULL,'Photo14.jpg',150,20,NULL,NULL),(8,'The Chilli Plant','Plant',NULL,'Photo13.jpg',100,20,NULL,NULL),(9,'Bird of Paradise','Plant',NULL,'Photo12.jpeg',160,20,NULL,NULL),(10,'Areca','Plant',NULL,'Photo11.jpeg',400,20,NULL,NULL),(11,'Calathea','Plant',NULL,'Photo9.jpg',150,20,NULL,NULL),(12,'Zamia','Plant',NULL,'Photo10.jpeg',100,20,NULL,NULL),(13,'Monstera deliciosa\r\n','Plant',NULL,'Photo1.jpg',350,20,NULL,NULL),(14,'Shalimar Potting Soil - General Purpose Soil - 50 LTR','Care',NULL,'c2.jpeg',85,20,NULL,NULL),(15,'Shalimar Sona Bio Fertilizer Powder - 2 LB','Care',NULL,'c3.jpeg',50,20,NULL,NULL),(16,'Perlite Fertilizers (5L)\r\n','Care',NULL,'c4.jpeg',20,20,NULL,NULL),(17,'Doff Hormone Rooting PowdeR, 75 g','Care',NULL,'c5.jpeg',81,20,NULL,NULL),(18,'Nabtah Fertilizer For Indoor and Outdoor Plants\r\n','Care',NULL,'c6.jpeg',47,20,NULL,NULL),(19,'Nabtah B1+ B2+A fertilizers','Care',NULL,'c7.jpeg',150,20,NULL,NULL),(20,'Miracle-Gro Leaf Shine, 8-Ounce','Care',NULL,'c8.jpeg',120,20,NULL,NULL),(24,'Kokorona Plant Shelf Indoor Outdoor - 11 Tier Tall\r\n','Accessories',NULL,'x4.jpeg',149,20,NULL,NULL),(25,'XLUX Soil Moisture Meter\r\n','Accessories',NULL,'x5.jpeg',101,20,NULL,NULL),(26,'USB Plant Grow Light Sunlight White','Accessories',NULL,'x6.jpeg',86,20,NULL,NULL),(27,'Watering Can for Indoor Plants ','Accessories',NULL,'x7.jpeg',120,20,NULL,NULL),(28,'Garden Tools Set 11 Pieces Gardening Hand Tool Set\r\n','Accessories',NULL,'x8.jpeg',200,20,NULL,NULL),(29,'Cosmoplast Plastic Round Flowerpot 8” with Tray\r\n','Pots',NULL,'pot1.jpeg',10,20,NULL,NULL),(30,'Cosmoplast Plastic Woodgrain Round Flowerpot with Tray','Pots',NULL,'pot2.jpeg',15,20,NULL,NULL),(31,'Cosmoplast Plastic Sqaure Planter 20 Liters With Tray, White','Pots',NULL,'pot3.jpeg',50,20,NULL,NULL),(32,'Face Planters Pots','Pots',NULL,'pot4.jpeg',60,20,NULL,NULL),(33,'6 Pack Mandala Succulent Plant Pot with Bamboo Trays','Pots',NULL,'pot5.jpeg',166.8,20,NULL,NULL),(34,'Vintage Flower Pot, Blue\r\n','Pots',NULL,'pot6.jpeg',60,20,NULL,NULL),(35,'5 inch Glazed Vintage Ceramic Pots for Plants Unique Owl Shape Design\r\n','Pots',NULL,'pot7.jpeg',72,20,NULL,NULL),(36,'TENLOY Tall Face Planters Pots, 9.6in ','Pots',NULL,'pot8.jpeg',88,20,NULL,NULL),(37,'Monstera deliciosa ‘Albo Variegata’\r\n','Rare',NULL,'rare1.jpeg',1100,20,NULL,NULL),(38,'Philodendron Pink Princess\r\n','Rare',NULL,'plant2.jpeg',350,20,NULL,NULL),(39,'Syngonium podophyllum \'Red Spot\'\r\n','Rare',NULL,'rare2.jpeg',300,20,NULL,NULL),(40,'Monstera Monkey Variegata\r\n','Rare',NULL,'rare3.jpeg',400,20,NULL,NULL),(41,'Variegated Elephant\'s Ears\r\n','Rare',NULL,'rare5.webp',1700,20,NULL,NULL),(42,'Albuca spiralis\r\n','Rare',NULL,'rare6.webp',150,20,NULL,NULL),(43,'Black Gold Philodendron\r\n','Rare',NULL,'rare7.jpeg',300,20,NULL,NULL),(44,'','Rare',NULL,'rare8.jpeg',350,20,NULL,NULL);
/*!40000 ALTER TABLE `plants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shoppingcart`
--

DROP TABLE IF EXISTS `shoppingcart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shoppingcart` (
  `Shop_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Pname` text NOT NULL,
  `Quantity_num` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Cust_ID` int(11) NOT NULL,
  `Plant_ID` int(11) NOT NULL,
  PRIMARY KEY (`Shop_ID`),
  KEY `Cust_ID_fk2` (`Cust_ID`),
  KEY `Plant_ID_fk` (`Plant_ID`),
  CONSTRAINT `shoppingcart_ibfk_1` FOREIGN KEY (`Cust_ID`) REFERENCES `customer` (`Cust_ID`),
  CONSTRAINT `shoppingcart_ibfk_2` FOREIGN KEY (`Plant_ID`) REFERENCES `plants` (`Plant_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shoppingcart`
--

LOCK TABLES `shoppingcart` WRITE;
/*!40000 ALTER TABLE `shoppingcart` DISABLE KEYS */;
INSERT INTO `shoppingcart` VALUES (2,'Watering Can for Indoor Plants ',2,480,1,27),(3,'XLUX Soil Moisture Meter\r\n',1,101,1,25),(4,'Watering Can for Indoor Plants ',2,960,1,27),(5,'XLUX Soil Moisture Meter\r\n',1,101,1,25),(6,'Watering Can for Indoor Plants ',2,1920,1,27),(7,'XLUX Soil Moisture Meter\r\n',1,101,1,25),(8,'Watering Can for Indoor Plants ',2,3840,1,27),(9,'XLUX Soil Moisture Meter\r\n',1,101,1,25);
/*!40000 ALTER TABLE `shoppingcart` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-10 20:36:43
