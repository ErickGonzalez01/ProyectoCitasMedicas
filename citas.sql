-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: citas
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `administracion`
--

DROP TABLE IF EXISTS `administracion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administracion` (
  `id` int NOT NULL AUTO_INCREMENT,
  `correo` varchar(45) NOT NULL,
  `clave` char(60) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`correo`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administracion`
--

LOCK TABLES `administracion` WRITE;
/*!40000 ALTER TABLE `administracion` DISABLE KEYS */;
INSERT INTO `administracion` VALUES (1,'correo@correo','$2y$10$JM3boPQhkk4uUbPGUaac5O6rgEy1FF5KBt.6a2SFQo.UxU9ianjIq','',''),(2,'erickjoelg@gmail.com','$2y$10$GAD0uDr0vLSkW6kJejueN.GhrRZYzoogMEoeL8m5bPANJHhum0iti','',''),(3,'medinasuarezwiliamjordi.@gmail.com','$2y$10$SWR/hzhp8Yc6oRi1C2lKeeKf5IYrP2YJGq9t5Wolej2vuVK26XVWa','',''),(4,'medinasuarezwiliamjordi@gmail.com','$2y$10$VdZ.s.ZuApTlM1Ntke.8s.hCF0b7ywLUIf1xv8rIDg8DxX/1phfwe','',''),(5,'maryelis@gmail.com','$2y$10$Td2diBqpWlx1./dVBFtNAulPJzk8q4/zgtq.eIp98qhy0sTPjQbeG','','');
/*!40000 ALTER TABLE `administracion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `citas_medicas`
--

DROP TABLE IF EXISTS `citas_medicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `citas_medicas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_paciente` int NOT NULL,
  `id_servicio` int NOT NULL,
  `fecha_registro` date NOT NULL,
  `fecha_cita` date NOT NULL,
  `hora_cita` time NOT NULL,
  `status_cita` varchar(20) NOT NULL,
  `duracion_cita` int NOT NULL,
  `citas_lote` bit(1) NOT NULL DEFAULT b'0',
  `ciclo_servicio` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_paciente` (`id_paciente`),
  KEY `id_servicio` (`id_servicio`),
  CONSTRAINT `citas_medicas_ibfk_1` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `citas_medicas_ibfk_2` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas_medicas`
--

LOCK TABLES `citas_medicas` WRITE;
/*!40000 ALTER TABLE `citas_medicas` DISABLE KEYS */;
INSERT INTO `citas_medicas` VALUES (16,40,1,'2022-12-29','2023-01-01','08:00:00','Activa',30,_binary '\0',1),(17,40,1,'2022-12-29','2023-01-01','08:00:00','Activa',30,_binary '\0',2),(18,40,1,'2022-12-29','2023-01-01','08:31:00','Activa',30,_binary '\0',2),(19,40,1,'2022-12-30','2023-01-02','08:31:00','Activa',30,_binary '\0',2),(20,40,1,'2022-12-30','2023-01-02','08:00:00','Activa',30,_binary '\0',2),(21,40,1,'2023-01-06','2023-01-03','08:00:00','Activa',29,_binary '\0',1),(22,40,1,'2023-01-06','2023-01-03','08:30:00','Activa',29,_binary '\0',1),(23,40,1,'2023-01-06','2023-01-03','09:00:00','Activa',29,_binary '\0',1),(24,40,1,'2023-01-06','2023-01-03','09:30:00','Activa',29,_binary '\0',1),(25,40,1,'2023-01-06','2023-01-03','10:00:00','Activa',29,_binary '\0',1),(26,40,1,'2023-01-06','2023-01-03','10:30:00','Activa',29,_binary '\0',1),(27,40,1,'2023-01-06','2023-01-03','11:00:00','Activa',29,_binary '\0',1),(28,40,1,'2023-01-06','2023-01-03','11:30:00','Activa',29,_binary '\0',1),(29,40,1,'2023-01-06','2023-01-03','12:30:00','Activa',29,_binary '\0',1),(30,40,1,'2023-01-06','2023-01-03','13:30:00','Activa',29,_binary '\0',1),(31,40,1,'2023-01-06','2023-01-03','14:30:00','Activa',29,_binary '\0',1),(32,40,1,'2023-01-06','2023-01-03','15:30:00','Activa',29,_binary '\0',1),(33,40,1,'2023-01-06','2023-01-03','16:30:00','Activa',29,_binary '\0',1),(34,40,1,'2023-01-06','2023-01-03','12:00:00','Activa',29,_binary '\0',1),(35,40,1,'2023-01-06','2023-01-03','13:00:00','Activa',29,_binary '\0',1),(36,40,1,'2023-01-06','2023-01-03','14:00:00','Activa',29,_binary '\0',1),(37,40,1,'2023-01-06','2023-01-03','15:00:00','Activa',29,_binary '\0',1),(38,40,1,'2023-01-06','2023-01-03','16:00:00','Activa',29,_binary '\0',1),(39,1,1,'2023-01-08','2023-01-03','08:00:00','Activa',30,_binary '\0',2),(40,42,1,'2023-01-10','1820-12-12','08:00:00','Activa',30,_binary '\0',1),(41,1,1,'2023-01-10','2023-01-03','08:31:00','Activa',30,_binary '\0',2),(42,1,2,'2023-01-10','2023-01-03','08:00:00','Activa',30,_binary '\0',1),(43,1,2,'2023-01-10','2023-01-03','08:31:00','Activa',30,_binary '\0',1),(44,1,1,'2023-01-10','2023-01-03','09:02:00','Activa',30,_binary '\0',2),(45,1,2,'2023-01-10','2023-01-03','09:02:00','Activa',30,_binary '\0',1),(46,1,2,'2023-01-10','2023-01-03','09:33:00','Activa',30,_binary '\0',1),(47,43,1,'2023-01-13','2023-01-13','08:00:00','Activa',30,_binary '\0',1),(48,1,2,'2023-01-13','2023-01-13','08:00:00','Activa',30,_binary '\0',1),(49,1,1,'2023-01-13','2023-01-13','08:31:00','Activa',30,_binary '\0',1),(50,1,2,'2023-01-13','2023-01-14','08:00:00','Activa',30,_binary '\0',1),(51,1,2,'2023-01-13','2023-01-15','08:00:00','Activa',30,_binary '\0',1),(52,1,1,'2023-01-13','2023-01-16','08:00:00','Activa',30,_binary '\0',1),(53,38,1,'2023-01-13','2023-01-16','08:31:00','Activa',30,_binary '\0',1),(54,1,2,'2023-01-13','2023-01-20','08:00:00','Activa',30,_binary '\0',1),(55,44,2,'2023-01-15','2023-02-20','08:00:00','Activa',30,_binary '\0',1),(56,1,1,'2023-01-20','2023-01-12','08:00:00','Activa',30,_binary '\0',1),(57,1,1,'2023-01-26','2023-01-25','08:00:00','Activa',30,_binary '\0',1),(58,58,2,'2023-01-27','2023-01-26','08:00:00','Activa',30,_binary '\0',1),(59,68,1,'2023-01-27','2023-02-22','08:00:00','Activa',30,_binary '\0',1),(60,1,1,'2023-02-03','2023-02-22','08:31:00','Activa',30,_binary '\0',1),(61,1,2,'2023-02-03','0023-02-23','08:00:00','Activa',30,_binary '\0',1),(62,279,2,'2023-02-03','2023-03-12','08:00:00','Activa',30,_binary '\0',1),(63,66,1,'2023-02-03','2023-02-22','09:02:00','Activa',30,_binary '\0',1),(64,1,3,'2023-02-13','2023-02-15','08:00:00','Activa',30,_binary '\0',1),(65,73,12,'2023-02-16','2023-03-12','08:00:00','Activa',30,_binary '\0',1);
/*!40000 ALTER TABLE `citas_medicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pacientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cedula` varchar(20) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `telefono` varchar(8) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cedula_UNIQUE` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=280 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pacientes`
--

LOCK TABLES `pacientes` WRITE;
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` VALUES (1,'616-260997-1000N','Miguel','Villalobo','1997-09-26','85487782'),(38,'616-121299-0002H','Juan Alexander','Mairena','1999-12-12','87872255'),(40,'366-300599-1000H','MARYELIS DE LOS ANGELES','DIAZ DIAZ','1999-05-30','12345678'),(42,'123-123456-1234A','AGUSTINA','LOPEZ','1983-02-12','12345678'),(43,'616-260588-0002W','Juan ','Manzanares','1980-01-12','50589498'),(44,'604-030703-1000C','Jeyder','Cucalon','2003-07-03','76374878'),(58,'616-030499-0000H','Luis Miguel','Ortiz Dávila','1999-04-03','77778794'),(60,'324-150221-0000A','ERICK JOHANNES','GONZALEZ DIAZ','2021-02-15','85487782'),(61,'123-150221-0000A','JOEL','GONZALEZ','2021-02-15','25251414'),(63,'111-111111-1111a','QWER TYUI ASDF GHJKL','Actualizado','1999-02-12','12345678'),(64,'122-111111-1111Q','Juan Manuel','Gomes Lopez','1999-12-12','12312312'),(65,'112-111111-1111Q','Juan','Cucalon','1999-12-12','12345678'),(66,'111-211111-1111w','Juan Manuel','Gomes Lopez','1999-12-12','12332152'),(68,'669-010288-4545q','asdf','asdf','1999-12-12','12234598'),(69,'123-454545-4578Q','asdñlk','asdñlkj','1999-12-12','78787878'),(70,'324-621220-3418z','Jaycee Mante','Schimmel','1983-04-20','(337) 25'),(71,'202-320687-7923a','Helen Aufderhar','Murphy','2005-11-04','281-523-'),(72,'933-719466-1237a','Lavinia Beer','Kuphal','2006-07-19','+1-636-4'),(73,'499-165588-5035y','Iva Eichmann','Jenkins','2010-02-11','+1971789'),(74,'133-642218-8567g','Miss Elfrieda Willms III','Berge','1980-07-25','812-504-'),(75,'277-160060-5655j','Hester O\'Conner','Quitzon','1996-08-18','+1 (305)'),(76,'728-559022-2183j','Bradford Little DDS','Ernser','1981-06-22','+1.678.8'),(77,'184-282400-7292z','Elva Kertzmann I','Rice','2010-05-29','1-956-26'),(78,'886-945909-5503r','Natalie Wisoky','Larkin','2012-09-04','(681) 24'),(79,'951-673888-1319b','Winona Treutel III','Wilkinson','2012-08-05','610-279-'),(80,'212-619898-4788t','Sydni Zulauf','Ritchie','1971-01-02','+1520221'),(81,'607-680151-3301z','Mr. Jabari Spencer','Wunsch','2005-02-25','571-814-'),(82,'901-738670-7519w','Damaris O\'Reilly PhD','Howell','1990-12-22','+1308640'),(83,'391-901042-2541b','Prof. Lynn Jaskolski','Hodkiewicz','1991-08-14','341.692.'),(84,'413-816643-3535v','Bud Crona III','Bogisich','2015-03-23','+1-931-2'),(85,'954-283528-3001t','Hallie Rohan','Kassulke','1986-11-07','364-749-'),(86,'518-117268-5943g','Prof. Destany Rowe III','Parisian','1980-08-06','469.288.'),(87,'542-504189-1586u','Ms. Colleen Farrell DDS','Gerlach','1998-08-18','1-931-92'),(88,'899-861990-1230l','Floyd Gaylord','Rohan','1996-12-02','(385) 79'),(89,'592-103529-2918u','Jalen Mohr','Osinski','2003-09-04','240-716-'),(90,'463-268570-8300g','Conner Wyman','Rolfson','1991-09-16','1-210-46'),(91,'806-277174-5565v','Lyric Renner DDS','Kutch','1979-06-23','+1-704-6'),(92,'361-131228-1444t','Michel Brakus','Lakin','2022-04-18','(763) 55'),(93,'984-923075-7070f','Prof. Darian Yost','Kohler','2010-04-17','1-283-56'),(94,'988-536743-4887k','Kyla Nikolaus','Abernathy','2016-04-05','1-978-79'),(95,'843-862378-7199g','Casper Koelpin','Sipes','1974-06-04','1-347-42'),(96,'424-288050-1223f','Prof. Mark Gutmann','Murphy','2010-04-19','+1 (916)'),(97,'432-559419-8687p','Dr. Rick Abernathy V','Wiza','2002-10-19','1-564-33'),(98,'497-778457-2012d','Chaim Gutmann','Graham','2014-03-15','+1.520.6'),(99,'764-319490-5254c','Teagan Steuber','Lang','2011-08-23','228-478-'),(100,'842-559528-9645b','Kristin Orn Sr.','Larson','1979-03-27','314-923-'),(101,'660-125228-3210n','Brice Ferry','Spencer','1991-10-20','+1 (906)'),(102,'442-318354-3502t','Mr. Abdiel Hudson PhD','Hartmann','1979-11-07','724.483.'),(103,'550-181572-3207n','Audreanne Rippin','Ledner','1974-08-31','+1.651.3'),(104,'711-665050-4226q','Colin Howe','Greenholt','2010-05-08','(360) 54'),(105,'182-452250-9524y','Brittany Schneider DVM','Satterfield','2008-09-11','+1-347-4'),(106,'361-468032-5134c','Katlyn Huel','Hayes','1986-08-10','229.414.'),(107,'580-574366-1034a','Mrs. Eda Gutmann Sr.','Mitchell','2003-05-24','1-318-91'),(108,'554-737765-8628m','Emery Walker IV','Stanton','1982-10-10','720-683-'),(109,'827-284194-5647u','Miss Idell Will III','Corwin','1984-11-08','1-209-96'),(110,'440-926742-9320t','Dr. Markus Reichert II','Gottlieb','1991-11-26','405.699.'),(111,'299-219283-7389c','Mrs. Diana Spencer','Franecki','1996-07-18','(212) 70'),(112,'578-673853-4290n','Dr. Sherwood McClure Jr.','Reichert','2020-12-20','279.804.'),(113,'254-308208-5786u','Dr. Carole Daugherty','Cummerata','1980-09-07','1-575-25'),(114,'213-246103-8158y','Meagan Kunze','Walker','2017-04-07','951-401-'),(115,'955-384659-3214o','Carli Larson','Graham','2017-08-06','+1.907.5'),(116,'521-390295-4025s','Tito Kerluke MD','Ankunding','2005-11-17','+1.732.4'),(117,'853-652853-1803e','Lenora Mraz Sr.','Orn','2000-10-27','+1802796'),(118,'587-260600-6687a','Verona Hintz','Fritsch','1971-01-19','1-762-62'),(119,'415-247955-6936f','Ewald Swaniawski','Rohan','1979-09-07','+1-234-5'),(120,'542-220296-1510r','Sydni Nienow III','Rohan','1998-02-20','1-320-51'),(121,'447-782385-1374p','Dr. Thurman Treutel MD','Mann','1983-01-25','856-879-'),(122,'242-477000-3436p','Jalen Hackett','Bayer','1988-09-11','610.637.'),(123,'159-996422-2682m','Prof. Javon Jaskolski','Stark','2020-09-19','+1.254.5'),(124,'412-360060-4077v','Dr. Nona Bashirian','Cassin','2002-10-26','1-669-26'),(125,'694-998982-1600z','Deangelo Roberts','Marvin','1984-05-01','+1-541-2'),(126,'930-105513-5169a','Ruth Lehner','Pfeffer','2002-02-25','223.312.'),(127,'595-917700-4626y','Priscilla Nitzsche','Friesen','1986-07-21','(318) 28'),(128,'942-941453-4494m','Fanny Cummings','Toy','2008-09-26','1-620-65'),(129,'616-865724-6130h','Jalen Roberts','O\'Kon','1988-09-21','+1 (206)'),(130,'472-639428-3302e','Sigrid Larson','Schamberger','1985-07-30','980-972-'),(131,'277-703669-7114r','Lorenzo Bogan V','Osinski','1975-04-20','1-445-40'),(132,'375-226973-9739m','Deron Wiegand','Renner','1980-05-13','+1-520-8'),(133,'339-264149-8142q','Torrey Will DVM','Leffler','1999-06-27','+1-646-9'),(134,'399-799531-3019m','Prof. Zakary Stamm MD','Schuppe','2012-12-15','(330) 53'),(135,'747-684436-5066t','Herminio Sanford','Ziemann','1997-05-31','(272) 45'),(136,'160-942431-5016b','Prof. Stephen Yost PhD','Langworth','2010-08-09','1-270-73'),(137,'420-377909-9002b','Leda Hessel','Howell','2006-11-25','+1-650-6'),(138,'499-557206-7183b','Tierra Dach I','Anderson','1989-05-04','(985) 58'),(139,'309-333718-2477b','Mrs. Winona Schneider','Stroman','1991-05-18','971.919.'),(140,'298-523931-5079c','Damaris Predovic','Jacobson','2013-05-19','773-497-'),(141,'255-571152-6147v','Mrs. Arielle Daniel','Lueilwitz','1983-09-07','(254) 94'),(142,'496-588529-5999c','Shea Renner','Huel','1980-09-01','606.400.'),(143,'191-835240-7433g','Dr. Kendrick Breitenberg','Roob','1970-07-09','+1984307'),(144,'873-225872-2700q','Mozell Sawayn','Harvey','1981-05-16','1-630-26'),(145,'357-336538-5634r','Cleve Runolfsson','Padberg','2010-02-05','1-309-37'),(146,'886-235826-1995b','Prof. Herminio Powlowski','Ratke','2002-11-30','769-833-'),(147,'430-120680-9179x','Eldridge Larson','Paucek','2006-01-29','+1 (623)'),(148,'446-689264-3639r','Larue Baumbach','Kihn','1973-03-30','(515) 68'),(149,'736-610037-8271h','Libbie Hamill','Haag','2023-01-18','718.703.'),(150,'965-307819-4939k','Chaim Russel','Rippin','2015-11-16','281.934.'),(151,'927-201518-1746b','Santiago Walker','Hammes','2004-10-16','+1-510-7'),(152,'106-463564-7006s','Dr. Brendan Feeney','Wehner','1993-03-24','+1-662-4'),(153,'258-375746-3835t','Olin Reilly','Lockman','1987-01-24','(339) 65'),(154,'276-102672-5636u','Vivien Gutkowski','Little','2000-06-05','(831) 38'),(155,'192-332235-8013e','Mr. Casimer Stroman DVM','Hauck','1997-04-10','810.864.'),(156,'761-796905-6101m','Dr. Noble Kozey','Watsica','2003-01-28','612-348-'),(157,'932-195028-8484m','Jennings Marvin MD','Bode','2007-03-17','+1-229-9'),(158,'633-451554-6543d','Magali Walker','Medhurst','1986-04-08','(586) 78'),(159,'248-426365-5020a','Ethel Pollich','Kirlin','1985-11-16','435-918-'),(160,'521-561222-4409h','Miss Elena Schimmel','Hartmann','2003-09-02','(323) 30'),(161,'597-682464-5235f','Crystel Lueilwitz','Grady','1987-01-06','(930) 27'),(162,'755-260162-2117g','Margot Moore','Ebert','2004-02-07','585-620-'),(163,'672-982472-5383t','Prof. Gianni Olson III','Hackett','1991-10-11','848-859-'),(164,'596-274038-3824a','Chelsey Veum','Durgan','1981-11-20','+1-424-7'),(165,'117-391999-2295b','Hillary Paucek','Koss','1998-04-05','+1925576'),(166,'162-199496-8503l','Ashleigh Klein','Dooley','1973-04-02','(445) 83'),(167,'491-886275-8767p','Preston Ferry','Gleason','1975-01-29','364-267-'),(168,'645-394649-5222y','Ford Kuphal','Daniel','2007-02-13','+1-410-2'),(169,'542-466736-8087g','Mr. Prince Connelly I','Breitenberg','2018-04-21','+1.215.3'),(170,'362-407027-9122n','Celine Blanda V','Emmerich','1976-10-14','725-290-'),(171,'934-434349-9980m','Willa Vandervort','Nicolas','2012-08-04','+1 (325)'),(172,'892-222224-2012m','Jeanne Eichmann','Metz','2003-03-17','+1-206-8'),(173,'567-359278-3926c','Iliana Johnson','Ledner','2010-10-05','+1531629'),(174,'601-232136-5256u','Carley Feil','Huel','2012-03-19','267.348.'),(175,'833-400793-4046s','Zita Grimes','Rempel','1996-07-19','+1 (940)'),(176,'747-945996-5235o','Carmel Murphy','Hackett','1992-04-24','802.205.'),(177,'507-231252-4955d','Arthur Davis','Dickinson','2015-11-11','+1-440-2'),(178,'520-620914-8701f','Mr. Brett Adams III','Walker','2008-04-06','+1929467'),(179,'184-585929-1443k','Roderick Wilkinson','Bergstrom','1988-12-29','1-339-86'),(180,'375-623333-2997b','Ismael Little III','Schulist','1998-01-09','(484) 89'),(181,'460-438343-5952n','Sanford Lemke','DuBuque','1997-12-21','(413) 90'),(182,'244-694781-4041i','Eleazar Schinner','Miller','1977-10-06','(347) 54'),(183,'239-836258-8395n','Mrs. Ruth Wiza DDS','Morar','2013-08-19','680.352.'),(184,'324-632110-5923w','Jaylan Gutmann','Watsica','2011-03-27','(321) 63'),(185,'830-792865-2703r','Prof. Adrian O\'Connell I','Yost','1990-11-27','445.531.'),(186,'490-563875-2526w','Golda Fadel Jr.','Kling','1988-11-11','430.986.'),(187,'252-580891-9979i','Rosemary Hyatt','Rogahn','2014-05-30','+1 (430)'),(188,'756-574654-4213k','Ahmed Stracke DVM','Koelpin','2014-04-04','803.561.'),(189,'911-595590-4015u','Bryce Nitzsche','Hermiston','2013-01-16','1-564-52'),(190,'609-618779-5571h','Keegan Satterfield','Russel','1983-12-21','803.833.'),(191,'606-171435-4319p','Stanley Berge','Hills','2007-08-12','828.401.'),(192,'613-890022-6889i','Prof. Dina Nicolas II','Grant','1992-09-05','+1469574'),(193,'340-638542-5523o','Willow Zieme','Bechtelar','2012-03-28','(878) 75'),(194,'697-806789-8143e','Tate Reichert MD','Davis','1974-01-22','1-541-22'),(195,'725-525548-1669r','Haley Beahan V','Christiansen','2021-10-13','1-361-56'),(196,'702-929612-1266n','Althea Weimann','Jaskolski','1996-04-18','+1-304-7'),(197,'640-992310-8734l','Prof. Bobby Langosh','Gottlieb','2004-12-01','517-638-'),(198,'386-933020-5223l','Mr. Joshuah Ullrich DVM','Schimmel','1977-09-21','+1 (830)'),(199,'822-388052-2181h','Enid Feeney Jr.','Walter','2018-12-07','754.488.'),(200,'167-960763-9554a','Providenci Mayert','Kuphal','1983-07-06','320.422.'),(201,'971-402649-3385k','Mrs. Filomena Muller Jr.','Rogahn','1986-03-23','774.421.'),(202,'534-139577-8467p','Brennan Green','Gutmann','2001-03-16','+1949870'),(203,'844-907570-9860r','Berry Kemmer','Beer','1970-08-23','985.362.'),(204,'273-166783-1024m','Maye Murphy','Bartoletti','2013-06-29','308-620-'),(205,'330-431708-2194v','Mr. Emory Kuhn','Klocko','1999-09-20','1-351-25'),(206,'186-724006-6083w','Roscoe Stehr','Mills','1979-10-11','240-347-'),(207,'806-857400-8157a','Felton Littel','Reynolds','2002-08-20','(269) 78'),(208,'483-701507-8983q','Royal Dietrich','Breitenberg','2007-11-15','(540) 39'),(209,'590-194648-7164a','Taryn Pfeffer I','McClure','2021-12-20','(317) 81'),(210,'357-181636-3200s','Isabella Green','Hermann','1990-06-29','+1442747'),(211,'962-275537-8229c','Serena Konopelski MD','Daniel','2009-04-20','+1-620-2'),(212,'668-856362-9964f','April Reilly MD','Johnson','2006-10-06','+1-385-3'),(213,'342-249700-8285l','Mrs. Queen Leannon','Herzog','1975-07-17','1-956-22'),(214,'818-535181-9949s','Dr. Oswaldo Jacobs','Sauer','1973-09-15','+1 (479)'),(215,'220-942461-1644c','Stuart Pfannerstill I','Braun','2016-12-14','901-712-'),(216,'360-355720-5701g','Casimir Crooks','Sporer','1985-07-02','+1.331.8'),(217,'186-737581-7308e','Corene Mante','Corkery','2012-06-30','1-407-35'),(218,'620-678739-8284v','Fabiola Jacobs Sr.','Medhurst','1979-05-06','1-267-99'),(219,'841-370144-5045r','Johanna Borer','Gislason','2002-02-25','+1-610-8'),(220,'943-697104-2988m','Santa Wyman','Beahan','1971-05-27','760-294-'),(221,'756-411760-2870p','Emmie Gaylord','Hoeger','1976-01-19','+1.772.3'),(222,'262-157861-6652p','Dr. Eduardo Stehr V','Beer','2003-11-09','305-516-'),(223,'258-452363-5528b','Lavina Heidenreich','Block','1986-05-04','1-564-60'),(224,'389-726525-6878c','Jerrod Sawayn','Effertz','2012-04-10','341-439-'),(225,'354-849171-1747m','Gabrielle Tillman','Ankunding','1989-01-08','1-959-94'),(226,'260-897274-8382l','Prof. Oswaldo VonRueden','Moen','2015-02-13','1-479-96'),(227,'816-292263-9331t','Hershel Cummings Jr.','Jakubowski','1987-06-02','1-979-56'),(228,'413-276372-3933m','Mr. Chris Leffler','Roberts','1986-03-02','(325) 48'),(229,'386-154576-2006j','Tanya Stroman','Runte','1997-08-29','+1-689-2'),(230,'914-889810-6010k','Karson Kassulke II','Bruen','1993-01-31','+1 (360)'),(231,'793-999800-2704r','Andreanne Gibson Sr.','Fritsch','1999-01-26','(607) 92'),(232,'735-481250-2550i','Agustina Stracke','Schultz','2003-07-30','406-512-'),(233,'701-102255-1723f','Aurelio Graham','Jacobs','2002-07-31','1-757-93'),(234,'899-830906-7659v','Dorcas Schmeler','Green','1995-01-15','240-705-'),(235,'461-986517-4429o','Elyse Hermann','Gleichner','2015-04-25','804-381-'),(236,'127-558182-2375p','Jessy Hill','Hahn','2019-04-19','812.771.'),(237,'640-820431-7749k','Geraldine Goodwin PhD','Fritsch','1986-04-17','+1520450'),(238,'682-823301-2707v','Kenya Zulauf','West','2005-10-24','1-531-30'),(239,'579-811098-9040w','Drew Hauck','Emard','1992-03-24','(424) 39'),(240,'179-685260-7634l','Jacey Berge','Cremin','2016-03-13','801-252-'),(241,'552-177182-2221s','Nikita Wolff','Haag','2013-06-29','+1 (314)'),(242,'251-414077-9972f','Grover Harvey Jr.','Jast','2018-04-06','415.750.'),(243,'491-450139-6593p','Sally Weissnat','Heidenreich','2008-04-25','+1.331.6'),(244,'759-299626-3827g','Dale Fritsch','Harber','1974-09-19','(743) 56'),(245,'670-610593-5845x','Prof. Samir Kovacek II','Stark','2002-07-05','+1-234-7'),(246,'588-454669-9869b','Wellington Lueilwitz','Schuster','1985-01-04','701.549.'),(247,'414-593805-7472w','Mr. Keshawn Dach II','Bogan','1983-01-01','352.517.'),(248,'565-885647-2354g','Prof. Colin Hilpert II','Reichert','2002-10-20','+1 (469)'),(249,'948-455089-7370w','Anastacio Leffler','Glover','1987-05-04','(847) 52'),(250,'567-408901-9186b','Gaylord Dicki','Corkery','1974-07-26','+1-626-7'),(251,'525-264832-3327x','Fredrick Bins','Pfeffer','1990-03-07','1-430-79'),(252,'201-166472-2410g','Kyleigh Feil','Block','2019-10-03','(731) 77'),(253,'493-673537-5962p','Manley Cruickshank','Koelpin','1995-04-22','862-810-'),(254,'759-219683-4348y','Prof. Louie Labadie','Morissette','1973-07-16','+1 (828)'),(255,'231-100870-2554w','Prof. Leda Hauck III','Orn','1986-05-12','+1 (989)'),(256,'167-334838-8650i','Maynard Kerluke','Murphy','1976-01-29','+1-732-3'),(257,'333-975481-1295k','Estelle Swift MD','Mitchell','1992-07-14','(845) 92'),(258,'720-916216-6629e','Emmalee Oberbrunner','Bogisich','2002-07-16','+1-864-9'),(259,'161-735135-6264o','Cara Veum','Boyle','2020-03-12','414.709.'),(260,'742-991341-6880v','Dr. Jacey Nader V','Labadie','2009-11-25','+1.214.5'),(261,'694-456570-9180y','Prof. Jorge Nienow V','Friesen','2012-03-07','+1 (801)'),(262,'558-659756-7521y','Alisha Hagenes','Larkin','1993-12-27','(914) 55'),(263,'125-603528-4246f','Chanel Hoppe','Blick','2014-12-21','(978) 58'),(264,'650-451367-9853i','Sophia Shields','Johnston','2002-12-26','(980) 24'),(265,'156-584949-4153o','Lourdes Kuhn','Dare','1994-06-01','+1.828.8'),(266,'204-243407-7996j','Eleanora Mante','Kassulke','2017-01-16','+1385675'),(267,'677-601739-8479t','Jaime Kuhic','Rohan','2016-09-10','1-231-57'),(268,'448-512159-5897w','Kacie Hagenes','Schamberger','1994-08-18','+1-804-5'),(269,'745-640120-7129l','Lessie Thiel','Anderson','2022-03-08','+1-631-2'),(270,'779-739287-1732h','Ruby Rempel','Cartwright','1976-07-17','1-224-72'),(271,'1233123','Juan','gonzalez','0000-00-00','85487782'),(272,'111-123123-1212a','Juan','gonzalez','0000-00-00','85487782'),(273,'111-123123-1252h','273Nombre','gonzalez','0000-00-00','85487782'),(274,'111-153123-1252h','274Nombre','gonzalez','1997-09-26','85487782'),(275,'191-153123-1252h','274Nombre','gonzalez','1997-09-26','85487782'),(276,'191-153123-1252z','274Nombre','gonzalez','1997-09-26','85487782'),(277,'191-153123-1252x','274Nombre','gonzalez','1997-09-26','85487782'),(278,'191-153123-1252r','marcos ','gonzalez','1997-09-26','85487782'),(279,'555-565555-5555r','asdfqwert','asdasd','1990-02-20','12454556');
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_servicio` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `detalle` varchar(255) NOT NULL,
  `hora_inicio_servicio` time NOT NULL,
  `hora_fin_servicio` time NOT NULL,
  `ciclo_citas_dia` int NOT NULL,
  `ciclos_citas_fin_de_semana` int NOT NULL,
  `duracion_cita` int NOT NULL,
  `duracion_cita_lote` int NOT NULL,
  `fin_de_semana` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE` (`nombre_servicio`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES (1,'TB Test','Se requieren dos citas, la segunda cita de 48','','08:00:00','17:00:00',3,1,30,10,_binary '\0'),(2,'Traveler','Cita para viajeros','Las citas tienen una duracion de 35 minutos por primer paciente, si no son citas en lote por varios pacientes, cada paciente aumento 10 minutos por paciente','08:00:00','17:00:00',4,1,30,10,_binary ''),(3,'EGO','Examen General de Orina','','08:00:00','15:00:00',3,1,15,5,_binary ''),(8,'ECO','Examen cardiaco electrocardiograma','','08:30:00','17:00:00',5,1,20,15,_binary ''),(12,'HTO','Examen de sangre Hematocrito','','08:00:00','15:00:00',5,1,10,8,_binary '');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-19 11:04:01
