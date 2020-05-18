-- MariaDB dump 10.17  Distrib 10.4.10-MariaDB, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: hcgs
-- ------------------------------------------------------
-- Server version	10.4.10-MariaDB

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
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `entry_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subjectname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subjecttitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `gradelevel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`entry_id`)
) ENGINE=MyISAM AUTO_INCREMENT=151 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'CREPR','CRE','CRE','Prep'),(2,'ENGLPR','ENGLISH','English','Prep'),(3,'HASSPR','HASS','HASS','Prep'),(4,'HEALPR','HEALTH','Health','Prep'),(5,'ICTPR','ICT/PRACTICAL SKILLS','ICT/Practical Skills','Prep'),(8,'MAKIPR','MAKING A LIVING','Making A Living','Prep'),(7,'MATHPR','MATHEMATICS','Mathematics','Prep'),(9,'PEPR','P.E.','Physical Education','Prep'),(10,'SCIEPR','SCIENCE','Science','Prep'),(11,'ARTSPR','ARTS','The Arts','Prep'),(12,'MUSIPR','MUSIC','Elective (Music Private Lessons)','Prep'),(13,'CREJR','CRE','CRE','Jr. Kindy'),(14,'ENGLJR','ENGLISH','English','Jr. Kindy'),(15,'HASSJR','HASS','HASS','Jr. Kindy'),(16,'HEALJR','HEALTH','Health','Jr. Kindy'),(17,'ICTJR','ICT/PRACTICAL SKILLS','ICT/Practical Skills','Jr. Kindy'),(18,'MAKIJR','MAKING A LIVING','Making A Living','Jr. Kindy'),(19,'MATHJR','MATHEMATICS','Mathematics','Jr. Kindy'),(20,'PEJR','P.E.','Physical Education','Jr. Kindy'),(21,'SCIEJR','SCIENCE','Science','Jr. Kindy'),(22,'ARTSJR','ARTS','The Arts','Jr. Kindy'),(23,'MUSIJR','MUSIC','Elective (Music Private Lessons)','Jr. Kindy'),(24,'CRE01','CRE','CRE','1'),(25,'ENGL01','ENGLISH','English','1'),(26,'HASS01','HASS','HASS','1'),(27,'HEAL01','HEALTH','Health','1'),(28,'ICT01','ICT/PRACTICAL SKILLS','ICT/Practical Skills','1'),(29,'MAKI01','MAKING A LIVING','Making A Living','1'),(30,'MATH01','MATHEMATICS','Mathematics','1'),(31,'PE01','P.E.','Physical Education','1'),(32,'SCIE01','SCIENCE','Science','1'),(33,'ARTS01','ARTS','The Arts','1'),(34,'MUSI01','MUSIC','Elective (Music Private Lessons)','1'),(35,'CRE02','CRE','CRE','2'),(36,'ENGL02','ENGLISH','English','2'),(37,'HASS02','HASS','HASS','2'),(38,'HEAL02','HEALTH','Health','2'),(39,'ICT02','ICT/PRACTICAL SKILLS','ICT/Practical Skills','2'),(40,'MAKI02','MAKING A LIVING','Making A Living','2'),(41,'MATH02','MATHEMATICS','Mathematics','2'),(42,'PE02','P.E.','Physical Education','2'),(43,'SCIE02','SCIENCE','Science','2'),(44,'ARTS02','ARTS','The Arts','2'),(45,'MUSI02','MUSIC','Elective (Music Private Lessons)','2'),(46,'CRE03','CRE','CRE','3'),(47,'ENGL03','ENGLISH','English','3'),(48,'HASS03','HASS','HASS','3'),(49,'HEAL03','HEALTH','Health','3'),(50,'ICT03','ICT/PRACTICAL SKILLS','ICT/Practical Skills','3'),(51,'MAKI03','MAKING A LIVING','Making A Living','3'),(52,'MATH03','MATHEMATICS','Mathematics','3'),(53,'PE03','P.E.','Physical Education','3'),(54,'SCIE03','SCIENCE','Science','3'),(55,'ARTS03','ARTS','The Arts','3'),(56,'MUSI03','MUSIC','Elective (Music Private Lessons)','3'),(57,'CRE04','CRE','CRE','4'),(58,'ENGL04','ENGLISH','English','4'),(59,'HASS04','HASS','HASS','4'),(60,'HEAL04','HEALTH','Health','4'),(61,'ICT04','ICT/PRACTICAL SKILLS','ICT/Practical Skills','4'),(62,'MAKI04','MAKING A LIVING','Making A Living','4'),(63,'MATH04','MATHEMATICS','Mathematics','4'),(64,'PE04','P.E.','Physical Education','4'),(65,'SCIE04','SCIENCE','Science','4'),(66,'ARTS04','ARTS','The Arts','4'),(67,'MUSI04','MUSIC','Elective (Music Private Lessons)','4'),(68,'CRE05','CRE','CRE','5'),(69,'ENGL05','ENGLISH','English','5'),(70,'HASS05','HASS','HASS','5'),(71,'HEAL05','HEALTH','Health','5'),(72,'ICT05','ICT/PRACTICAL SKILLS','ICT/Practical Skills','5'),(73,'MAKI05','MAKING A LIVING','Making A Living','5'),(74,'MATH05','MATHEMATICS','Mathematics','5'),(75,'PE05','P.E.','Physical Education','5'),(76,'SCIE05','SCIENCE','Science','5'),(77,'ARTS05','ARTS','The Arts','5'),(78,'MUSI05','MUSIC','Elective (Music Private Lessons)','5'),(79,'CRE06','CRE','CRE','6'),(80,'ENGL06','ENGLISH','English','6'),(81,'HASS06','HASS','HASS','6'),(82,'HEAL06','HEALTH','Health','6'),(83,'ICT06','ICT/PRACTICAL SKILLS','ICT/Practical Skills','6'),(84,'MAKI06','MAKING A LIVING','Making A Living','6'),(85,'MATH06','MATHEMATICS','Mathematics','6'),(86,'PE06','P.E.','Physical Education','6'),(87,'SCIE06','SCIENCE','Science','6'),(88,'ARTS06','ARTS','The Arts','6'),(89,'MUSI06','MUSIC','Elective (Music Private Lessons)','6'),(90,'AGRI07','AGRICULTURE','Agriculture','7'),(91,'CIVI07','CIVICS/GEOGRAPHY','Civics/Geography','7'),(92,'BUSI07','BUSINESS STUDIES','Business Studies','7'),(93,'HEAL07','HEALTH','Personal Development (Health)','7'),(94,'ICT07','ICT/PRACTICAL SKILLS','ICT/Practical Skills','7'),(95,'MAKI07','MAKING A LIVING','Making A Living/Home Economics','7'),(96,'MATH07','MATHEMATICS','Mathematics','7'),(97,'PE07','P.E.','Physical Education','7'),(98,'SCIE07','SCIENCE','Science','7'),(99,'ARTS07','ARTS','The Arts','7'),(100,'MUSI07','MUSIC','Elective (Music Private Lessons)','7'),(101,'HIST07','HISTORY','HASS','7'),(102,'AGRI08','AGRICULTURE','Agriculture','8'),(103,'CIVI08','CIVICS/GEOGRAPHY','Civics/Geography','8'),(104,'BUSI08','BUSINESS STUDIES','Business Studies','8'),(105,'HEAL08','HEALTH','Personal Development (Health)','8'),(106,'ICT08','ICT/PRACTICAL SKILLS','ICT/Practical Skills','8'),(107,'MAKI08','MAKING A LIVING','Making A Living/Home Economics','8'),(108,'MATH08','MATHEMATICS','Mathematics','8'),(109,'PE08','P.E.','Physical Education','8'),(110,'SCIE08','SCIENCE','Science','8'),(111,'ARTS08','ARTS','The Arts','8'),(112,'MUSI08','MUSIC','Elective (Music Private Lessons)','8'),(113,'HIST08','HISTORY','HASS','8'),(114,'AGRI09','AGRICULTURE','Agriculture','9'),(115,'CIVI09','CIVICS/GEOGRAPHY','Civics/Geography','9'),(116,'BUSI09','BUSINESS STUDIES','Business Studies','9'),(117,'HEAL09','HEALTH','Personal Development (Health)','9'),(118,'ICT09','ICT/PRACTICAL SKILLS','ICT/Practical Skills','9'),(119,'MAKI09','MAKING A LIVING','Making A Living/Home Economics','9'),(120,'MATH09','MATHEMATICS','Mathematics','9'),(121,'PE09','P.E.','Physical Education','9'),(122,'SCIE09','SCIENCE','Science','9'),(123,'ARTS09','ARTS','The Arts','9'),(124,'MUSI09','MUSIC','Elective (Music Private Lessons)','9'),(125,'HIST09','HISTORY','Social Science','9'),(126,'AGRI10','AGRICULTURE','Agriculture','10'),(127,'CIVI10','CIVICS/GEOGRAPHY','Civics/Geography','10'),(128,'BUSI10','BUSINESS STUDIES','Business Studies','10'),(129,'HEAL10','HEALTH','Personal Development (Health)','10'),(130,'ICT10','ICT/PRACTICAL SKILLS','ICT/Practical Skills','10'),(131,'MAKI10','MAKING A LIVING','Making A Living/Home Economics','10'),(132,'MATH10','MATHEMATICS','Mathematics','10'),(133,'PE10','P.E.','Physical Education','10'),(135,'SCIE10','SCIENCE','Science','10'),(136,'ARTS10','ARTS','The Arts','10'),(137,'MUSI10','MUSIC','Elective (Music Private Lessons)','10'),(138,'HIST10','HISTORY','Social Science','10'),(139,'ENGL07','ENGLISH','English','7'),(140,'ENGL08','ENGLISH','English','8'),(141,'ENGL09','ENGLISH','English','9'),(142,'ENGL10','ENGLISH','English','10'),(143,'CRE07','CRE','CRE','7'),(144,'CRE08','CRE','CRE','8'),(145,'CRE09','CRE','CRE','9'),(146,'CRE10','CRE','CRE','10'),(147,'SOCSCI7','SOCIAL SCIENCE','Social Science','7'),(148,'SOCSCI8','SOCIAL SCIENCE','Social Science','8'),(149,'SOCSCI9','SOCIAL SCIENCE','Social Science','9'),(150,'SOCSCI10','SOCIAL SCIENCE','Social Science','10');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-19  2:08:00
