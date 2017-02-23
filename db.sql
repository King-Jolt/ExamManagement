-- MySQL dump 10.16  Distrib 10.1.13-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: exam_management
-- ------------------------------------------------------
-- Server version	10.1.13-MariaDB

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
-- Table structure for table `_link_option`
--

DROP TABLE IF EXISTS `_link_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_link_option` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `question_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `a_content` mediumtext COLLATE utf8_unicode_ci,
  `a_position` tinyint(4) unsigned NOT NULL,
  `b_content` mediumtext COLLATE utf8_unicode_ci,
  `b_position` tinyint(4) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `_link_option_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_link_option`
--

LOCK TABLES `_link_option` WRITE;
/*!40000 ALTER TABLE `_link_option` DISABLE KEYS */;
INSERT INTO `_link_option` VALUES ('58ae1ab3185ca02','58ae1ab31148001','BOOTP',193,'Bootstrap Protocol',215),('58ae1ab3189b203','58ae1ab31148001','YAML',243,'YAML Ain\'t Markup Language',61),('58ae1ab3189b204','58ae1ab31148001','XML',84,'eXtensible Markup Language',237),('58ae1ab3283b605','58ae1ab31148001','WPA',170,'Wi-Fi Protected Access',140),('58ae1ab3283b606','58ae1ab31148001','WPAD',191,'Web Proxy Autodiscovery Protocol',26);
/*!40000 ALTER TABLE `_link_option` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER `_link_option_trigger_insert` BEFORE INSERT ON `_link_option` FOR EACH ROW BEGIN
    SET NEW.a_position = get_rand(), NEW.b_position = get_rand();
    IF NEW.a_content IS NULL THEN
        SET NEW.a_position = 255;
    END IF;
    SET NEW.id = generate_uid();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `_multiple_choice`
--

DROP TABLE IF EXISTS `_multiple_choice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_multiple_choice` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `question_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `answer` bit(1) NOT NULL,
  `position` tinyint(4) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `_multiple_choice_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_multiple_choice`
--

LOCK TABLES `_multiple_choice` WRITE;
/*!40000 ALTER TABLE `_multiple_choice` DISABLE KEYS */;
INSERT INTO `_multiple_choice` VALUES ('58aa34978731505','58aa34977a40aaf','<span class=\"equation\">\\(10 \\pi Hz\\)</span>','\0',123),('58aa34978731532','58aa34977a40aaf','<span class=\"equation\">\\(5 \\pi Hz\\)</span>','\0',86),('58aa34978731589','58aa34977a40aaf','<span class=\"equation\">\\(5 Hz\\)</span>','',64),('58aa349787ae576','58aa34977a40aaf','<span class=\"equation\">\\(10 Hz\\)</span>','\0',60),('58aa35b9d5f0937','58aa35b9d091826','<span class=\"equation\">\\({1 \\over 2\\pi} {\\sqrt{m \\over k}}\\)</span>','\0',110),('58aa35b9d66d9a6','58aa35b9d091826','<span class=\"equation\">\\(2\\pi {\\sqrt{k \\over m}}\\)</span>','\0',116),('58aa35b9d66d9b6','58aa35b9d091826','<span class=\"equation\">\\(2\\pi {\\sqrt{m \\over k}}\\)</span>','',248),('58aa35b9e7c35f5','58aa35b9d091826','<span class=\"equation\">\\({1 \\over 2\\pi} {\\sqrt{k \\over m}}\\)</span>','\0',133),('58aa36e055c6153','58aa36e04913ea9','<span class=\"equation\">\\(V_\\max = A \\omega\\)</span>','',172),('58aa36e05604a33','58aa36e04913ea9','<span class=\"equation\">\\(V_\\max = A \\omega^2\\)</span>','\0',208),('58aa36e05604a8e','58aa36e04913ea9','<span class=\"equation\">\\(V_\\max = A^2\\omega\\)</span>','\0',17),('58aa36e05604adb','58aa36e04913ea9','<span class=\"equation\">\\(V_\\max = 2A\\omega\\)</span>','\0',223),('58aa42457826e79','58aa424575775c6','<span class=\"equation\">\\(2^{11}\\)</span>','\0',49),('58aa42467e02f04','58aa424575775c6','<span class=\"equation\">\\(2^{12}\\)</span>','\0',85),('58aa4246816e007','58aa424575775c6','<span class=\"equation\">\\(2^{10}\\)</span>','',22),('58aa4246816e010','58aa424575775c6','<span class=\"equation\">\\(2^9\\)</span>','\0',110);
/*!40000 ALTER TABLE `_multiple_choice` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER `_mul_choice_trigger_insert` BEFORE INSERT ON `_multiple_choice` FOR EACH ROW BEGIN
    SET NEW.position = get_rand();
    SET NEW.id = generate_uid();
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `user` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('root','dc76e9f0c0006e8f919e0c515c66dbba3982f785','Super Admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER `admin_trigger_insert` BEFORE INSERT ON `admin` FOR EACH ROW SET NEW.pass = SHA1(NEW.pass) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `category` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `category_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `category`
--

LOCK TABLES `category` WRITE;
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` VALUES ('58aa29c8017eb44','danh muc','58aa29283bf6568');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER `cat_trigger_insert` BEFORE INSERT ON `category` FOR EACH ROW SET NEW.id = generate_uid() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER `cat_trigger_delete` BEFORE DELETE ON `category` FOR EACH ROW DELETE FROM exam WHERE exam.category_id = OLD.id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES ('58aa2916bd791d5','Toán');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER `course_trigger_insert` BEFORE INSERT ON `course` FOR EACH ROW SET NEW.id = generate_uid() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `header` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `footer` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `share` bit(1) NOT NULL DEFAULT b'0',
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam`
--

LOCK TABLES `exam` WRITE;
/*!40000 ALTER TABLE `exam` DISABLE KEYS */;
INSERT INTO `exam` VALUES ('58aa3328cadc2c9','58aa29c8017eb44','Đề thi','<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">			<tbody>				<tr>					<td style=\"text-align:center\"><strong>BỘ <u>GIÁO DỤC VÀ ĐÀO T</u>ẠO</strong></td>					<td>&nbsp;</td>					<td style=\"text-align:center\"><strong>KỲ THI TRUNG HỌC PHỔ THÔNG QUỐC GIA NĂM 2017</strong></td>				</tr>				<tr>					<td>&nbsp;</td>					<td>&nbsp;</td>					<td style=\"text-align:center\"><strong>Môn thi : TOÁN</strong></td>				</tr>				<tr>					<td style=\"text-align:center\"><strong>ĐỀ THI MINH HỌA</strong></td>					<td>&nbsp;</td>					<td style=\"text-align:center\"><em>Thời <u>gian làm bài: 120 phút, không kể thời gian phát</u> đề</em></td>				</tr>				<tr>					<td style=\"text-align:center\"><em>(Đề thi có 01 trang)</em></td>					<td>&nbsp;</td>					<td>&nbsp;</td>				</tr>			</tbody>	</table>','<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">			<tbody>				<tr>					<td style=\"text-align:center\"><strong>---------------------------------------- HẾT&nbsp;----------------------------------------</strong></td>				</tr>				<tr>					<td style=\"text-align:center\"><em>Thí sinh không được phép sử dụng tài liệu</em></td>				</tr>			</tbody>	</table>​​​​​','','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `exam` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER `exam_trigger_delete` BEFORE DELETE ON `exam` FOR EACH ROW DELETE FROM question WHERE question.exam_id = OLD.id */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Temporary table structure for view `list_category`
--

DROP TABLE IF EXISTS `list_category`;
/*!50001 DROP VIEW IF EXISTS `list_category`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `list_category` (
  `id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `user_id` tinyint NOT NULL,
  `n_exam` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `list_course`
--

DROP TABLE IF EXISTS `list_course`;
/*!50001 DROP VIEW IF EXISTS `list_course`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `list_course` (
  `id` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `n_user` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `list_exam`
--

DROP TABLE IF EXISTS `list_exam`;
/*!50001 DROP VIEW IF EXISTS `list_exam`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `list_exam` (
  `id` tinyint NOT NULL,
  `category_id` tinyint NOT NULL,
  `title` tinyint NOT NULL,
  `header` tinyint NOT NULL,
  `footer` tinyint NOT NULL,
  `share` tinyint NOT NULL,
  `date` tinyint NOT NULL,
  `n_question` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `list_multiple_choice_question`
--

DROP TABLE IF EXISTS `list_multiple_choice_question`;
/*!50001 DROP VIEW IF EXISTS `list_multiple_choice_question`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `list_multiple_choice_question` (
  `exam_id` tinyint NOT NULL,
  `question_id` tinyint NOT NULL,
  `content` tinyint NOT NULL,
  `answer` tinyint NOT NULL,
  `position` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `list_user`
--

DROP TABLE IF EXISTS `list_user`;
/*!50001 DROP VIEW IF EXISTS `list_user`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `list_user` (
  `id` tinyint NOT NULL,
  `course_id` tinyint NOT NULL,
  `user` tinyint NOT NULL,
  `pass` tinyint NOT NULL,
  `name` tinyint NOT NULL,
  `n_category` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `question` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `exam_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `a_title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `b_title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `score` float DEFAULT NULL,
  `type` int(11) NOT NULL,
  `position` smallint(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_id` (`exam_id`),
  KEY `type` (`type`),
  CONSTRAINT `question_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`id`),
  CONSTRAINT `question_ibfk_2` FOREIGN KEY (`type`) REFERENCES `type_question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES ('58aa34977a40aaf','Một hệ dao động chịu tác dụng của ngoại lực tuần hoàn&nbsp;<span class=\"equation\">\\(F_n = F_n \\cos10 \\pi t\\)</span>&nbsp;thì xảy ra hiện tượng cộng hưởng. Tần số dao động riêng của hệ phải là','58aa3328cadc2c9',NULL,NULL,1,2,3574),('58aa35b9d091826','Một con lắc lò xo gồm lò xo có độ cứng k và hòn bi m gắn vào đầu lò xo, đầu kia của lò xo được treo vào một điểm cố định. Kích thước cho con lắc dao động điều hòa theo phương thẳng đứng. Chu kì là','58aa3328cadc2c9',NULL,NULL,1,2,2334),('58aa36e04913ea9','Biểu thức li độ của vật dao động điều hòa có dạng&nbsp;<span class=\"equation\">\\(x = Acos (\\omega + \\phi)\\)</span>, Vận tốc của vật có giá trị cực đại là','58aa3328cadc2c9',NULL,NULL,1,2,949),('58aa424575775c6','Nhờ khai triển nhị thức&nbsp;<span class=\"equation\">\\((1 + x)^{11}\\)</span>&nbsp;ta có giá trị&nbsp;<span class=\"equation\">\\(S = C_{11}^6 + C_{11}^7 + C_{11}^8 + C_{11}^9 + C_{11}^{10} + C_{11}^{11}\\)</span>&nbsp;bằng :','58aa3328cadc2c9',NULL,NULL,1,2,2744),('58adecb06789c01','Tổng diện tích của <span data-fill=\"hai\">?</span> hình vuông vẽ trên cạnh kề của một tam giác vuông bằng <span data-fill=\"diện tích\">?</span> hình vuông vẽ trên cạnh huyền của tam giác này.','58aa3328cadc2c9',NULL,NULL,0,4,3575),('58aded25058e901','Nếu một đường thẳng <span data-fill=\"song song\">?</span> với một cạnh của tam giác và cắt hai cạnh còn lại thì nó định ra trên hai cạnh đó những đoạn thẳng <span data-fill=\"tương ứng\">?</span> tỉ lệ.','58aa3328cadc2c9',NULL,NULL,0,4,3576),('58ae1ab31148001','Nối các cột A với cột B sao cho phù hợp !','58aa3328cadc2c9','Viết tắt','Tên đầy đủ',2,1,3577);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER `question_trigger_insert` BEFORE INSERT ON `question` FOR EACH ROW BEGIN
	DECLARE pos SMALLINT;
    SELECT IFNULL(MAX(question.position) + 1, RAND() * 5000)
    INTO pos FROM question
    WHERE question.exam_id = NEW.exam_id;
    SET NEW.position = pos;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER `question_trigger_delete` BEFORE DELETE ON `question` FOR EACH ROW BEGIN
    DELETE FROM _link_option WHERE _link_option.question_id = OLD.id;
    DELETE FROM _multiple_choice WHERE _multiple_choice.question_id = OLD.id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ref_question`
--

DROP TABLE IF EXISTS `ref_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ref_question` (
  `question_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ref_question`
--

LOCK TABLES `ref_question` WRITE;
/*!40000 ALTER TABLE `ref_question` DISABLE KEYS */;
/*!40000 ALTER TABLE `ref_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_question`
--

DROP TABLE IF EXISTS `type_question`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_question` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_question`
--

LOCK TABLES `type_question` WRITE;
/*!40000 ALTER TABLE `type_question` DISABLE KEYS */;
INSERT INTO `type_question` VALUES (1,'Ghép nối'),(2,'Lựa chọn đáp án'),(4,'Điền khuyết');
/*!40000 ALTER TABLE `type_question` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user` (`user`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('58aa29283bf6568','58aa2916bd791d5','test','7c222fb2927d828af22f592134e8932480637c0d','Nguyen Trung');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER `user_trigger_insert` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
SET NEW.id = generate_uid();
SET NEW.pass = SHA1(NEW.pass);
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping routines for database 'exam_management'
--
/*!50003 DROP FUNCTION IF EXISTS `generate_uid` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE  FUNCTION `generate_uid`() RETURNS varchar(15) CHARSET utf8mb4
    NO SQL
BEGIN
	DECLARE m DOUBLE;
    DECLARE m2 DOUBLE;
    DECLARE r VARCHAR(15);
    IF @__test_func__ IS NULL THEN
    	SET @__test_func__ = 1;
    ELSE
    	SET @__test_func__ = @__test_func__ + 1;
    END IF;
    SET m = UNIX_TIMESTAMP(NOW(6));
    SET m2 = m - FLOOR(m);
    IF m2 = 0 THEN
    	SET m2 = RAND();
    END IF;
    SET r = CONCAT(LPAD(HEX(m), 8, '0'), LPAD(HEX(m2 * 999999), 5, '0'), LPAD(HEX(@__test_func__), 2, '0'));
    RETURN LOWER(r);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `get_rand` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE  FUNCTION `get_rand`() RETURNS tinyint(3) unsigned
RETURN RAND() * 254 ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `list_question_by_exam` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE  PROCEDURE `list_question_by_exam`(IN `exam_id` VARCHAR(15) CHARSET utf8mb4)
    NO SQL
SELECT
	(CASE WHEN @qid != question.id THEN question.a_title ELSE NULL END) AS 'q_a_title',
	(CASE WHEN @qid != question.id THEN question.b_title ELSE NULL END) AS 'q_b_title',
	(CASE WHEN @qid != question.id THEN question.score ELSE NULL END) AS 'q_score',
	(CASE WHEN @qid != question.id THEN question.type ELSE NULL END) AS 'q_type',
	(CASE WHEN @qid != question.id THEN question.content ELSE NULL END) AS 'q_content',
    (CASE WHEN @qid != question.id THEN question.position ELSE NULL END) AS 'q_position',
	link.a_content AS 'link_a_content',
	link.a_mark AS 'link_a_mark',
	link.b_content AS 'link_b_content',
	link.b_mark AS 'link_b_mark',
	link.answer AS 'link_answer',
	multiple_choice.mark AS 'multiple_choice_mark',
	multiple_choice.content AS 'multiple_choice_content',
	multiple_choice.answer AS 'multiple_choice_answer',
	(@qid:=question.id) AS 'question_id'
FROM question
JOIN (SELECT @qid:='') AS qvar
LEFT JOIN
	(
	SELECT
		(CASE WHEN @mcid != _multiple_choice.question_id THEN @mcn:=1 ELSE @mcn:=@mcn + 1 END) AS 'mark',
		_multiple_choice.content, _multiple_choice.answer,
		(@mcid:=_multiple_choice.question_id) AS 'question_id'
	FROM _multiple_choice
	JOIN (SELECT @mcid:='', @mcn:=0) AS mark
	ORDER BY _multiple_choice.question_id, _multiple_choice.position
	) AS multiple_choice
ON multiple_choice.question_id = question.id
LEFT JOIN
	(
	SELECT
		a.question_id, a.mark AS 'a_mark', a.content AS 'a_content', b.mark AS 'b_mark', b.content AS 'b_content',
		(CASE WHEN a.content IS NULL THEN NULL ELSE c.mark END) AS 'answer' FROM
		(
		SELECT
			_link_option.id,
			_link_option.a_content AS 'content',
			(CASE WHEN @id != _link_option.question_id THEN @n:=1 ELSE @n:=@n + 1 END) AS 'mark',
			(@id:=_link_option.question_id) AS 'question_id'
		FROM _link_option
		JOIN (SELECT @id:='', @n:=0) AS mark
		ORDER BY _link_option.question_id, _link_option.a_position
		) AS a
	LEFT JOIN
		(
		SELECT
			_link_option.id,
			_link_option.b_content AS 'content',
			(CASE WHEN @id2 != _link_option.question_id THEN @n2:=1 ELSE @n2:=@n2 + 1 END) AS 'mark',
			(@id2:=_link_option.question_id) AS 'question_id'
		FROM _link_option
		JOIN (SELECT @id2:='', @n2:=0) AS mark
		ORDER BY _link_option.question_id, _link_option.b_position
		) AS b
	ON a.mark = b.mark AND a.question_id = b.question_id
	LEFT JOIN
		(
		SELECT
			_link_option.id,
			(CASE WHEN @id3 != _link_option.question_id THEN @n3:=1 ELSE @n3:=@n3 + 1 END) AS 'mark',
			(@id3:=_link_option.question_id) AS 'question_id'
		FROM _link_option
		JOIN (SELECT @id3:='', @n3:=0) AS mark
		ORDER BY _link_option.question_id, _link_option.b_position
		) c
	ON c.id = a.id
	) AS link
ON link.question_id = question.id
WHERE question.exam_id = exam_id
ORDER BY question.position ASC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `list_question_from_ref` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE  PROCEDURE `list_question_from_ref`()
    NO SQL
SELECT
	(CASE WHEN @qid != question.id THEN question.a_title ELSE NULL END) AS 'q_a_title',
	(CASE WHEN @qid != question.id THEN question.b_title ELSE NULL END) AS 'q_b_title',
	(CASE WHEN @qid != question.id THEN question.score ELSE NULL END) AS 'q_score',
	(CASE WHEN @qid != question.id THEN question.type ELSE NULL END) AS 'q_type',
	(CASE WHEN @qid != question.id THEN question.content ELSE NULL END) AS 'q_content',
    (CASE WHEN @qid != question.id THEN question.position ELSE NULL END) AS 'q_position',
	link.a_content AS 'link_a_content',
	link.a_mark AS 'link_a_mark',
	link.b_content AS 'link_b_content',
	link.b_mark AS 'link_b_mark',
	link.answer AS 'link_answer',
	multiple_choice.mark AS 'multiple_choice_mark',
	multiple_choice.content AS 'multiple_choice_content',
	multiple_choice.answer AS 'multiple_choice_answer',
	(@qid:=question.id) AS 'question_id'
FROM ref_question
JOIN question ON ref_question.question_id = question.id
JOIN (SELECT @qid:='') AS qvar
LEFT JOIN
	(
	SELECT
		(CASE WHEN @mcid != _multiple_choice.question_id THEN @mcn:=1 ELSE @mcn:=@mcn + 1 END) AS 'mark',
		_multiple_choice.content, _multiple_choice.answer,
		(@mcid:=_multiple_choice.question_id) AS 'question_id'
	FROM _multiple_choice
	JOIN (SELECT @mcid:='', @mcn:=0) AS mark
	ORDER BY _multiple_choice.question_id, _multiple_choice.position
	) AS multiple_choice
ON multiple_choice.question_id = question.id
LEFT JOIN
	(
	SELECT
		a.question_id, a.mark AS 'a_mark', a.content AS 'a_content', b.mark AS 'b_mark', b.content AS 'b_content',
		(CASE WHEN a.content IS NULL THEN NULL ELSE c.mark END) AS 'answer' FROM
		(
		SELECT
			_link_option.id,
			_link_option.a_content AS 'content',
			(CASE WHEN @id != _link_option.question_id THEN @n:=1 ELSE @n:=@n + 1 END) AS 'mark',
			(@id:=_link_option.question_id) AS 'question_id'
		FROM _link_option
		JOIN (SELECT @id:='', @n:=0) AS mark
		ORDER BY _link_option.question_id, _link_option.a_position
		) AS a
	LEFT JOIN
		(
		SELECT
			_link_option.id,
			_link_option.b_content AS 'content',
			(CASE WHEN @id2 != _link_option.question_id THEN @n2:=1 ELSE @n2:=@n2 + 1 END) AS 'mark',
			(@id2:=_link_option.question_id) AS 'question_id'
		FROM _link_option
		JOIN (SELECT @id2:='', @n2:=0) AS mark
		ORDER BY _link_option.question_id, _link_option.b_position
		) AS b
	ON a.mark = b.mark AND a.question_id = b.question_id
	LEFT JOIN
		(
		SELECT
			_link_option.id,
			(CASE WHEN @id3 != _link_option.question_id THEN @n3:=1 ELSE @n3:=@n3 + 1 END) AS 'mark',
			(@id3:=_link_option.question_id) AS 'question_id'
		FROM _link_option
		JOIN (SELECT @id3:='', @n3:=0) AS mark
		ORDER BY _link_option.question_id, _link_option.b_position
		) c
	ON c.id = a.id
	) AS link
ON link.question_id = question.id
ORDER BY question.position ASC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `list_shared_question_in_exam` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE  PROCEDURE `list_shared_question_in_exam`(IN `course_id` VARCHAR(15) CHARSET utf8mb4, IN `except_exam_id` VARCHAR(15) CHARSET utf8mb4)
    NO SQL
SELECT
	course.id AS 'course_id', course.name AS 'course_name',
    user.id AS 'user_id', user.user AS 'user_user', user.name AS 'user_name',
    category.id AS 'category_id', category.name AS 'category_name',
    exam.id AS 'exam_id', exam.title AS 'exam_title',
    question.id AS 'question_id',
    question.content AS 'question_content'
FROM course
JOIN user ON user.course_id = course.id
JOIN category ON category.user_id = user.id
JOIN exam ON exam.category_id = category.id AND exam.id != except_exam_id AND exam.share = 1
JOIN question ON question.exam_id = exam.id
WHERE course.id = course_id ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `shuffle_question` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE  PROCEDURE `shuffle_question`(IN `exam_id` VARCHAR(15) CHARSET utf8mb4)
    NO SQL
BEGIN
    UPDATE question
    SET question.position = RAND() * 5000
    WHERE question.exam_id = exam_id;
    UPDATE _link_option
    JOIN question ON question.id = _link_option.question_id
    JOIN exam ON exam.id = question.exam_id
    SET _link_option.a_position = get_rand(), _link_option.b_position = get_rand()
    WHERE exam.id = exam_id AND _link_option.a_content IS NOT NULL;
    UPDATE _multiple_choice
    JOIN question ON question.id = _multiple_choice.question_id
    JOIN exam ON exam.id = question.exam_id
    SET _multiple_choice.position = get_rand()
    WHERE exam.id = exam_id;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `list_category`
--

/*!50001 DROP TABLE IF EXISTS `list_category`*/;
/*!50001 DROP VIEW IF EXISTS `list_category`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `list_category` AS select `category`.`id` AS `id`,`category`.`name` AS `name`,`category`.`user_id` AS `user_id`,count(`exam`.`id`) AS `n_exam` from (`category` left join `exam` on((`exam`.`category_id` = `category`.`id`))) group by `category`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `list_course`
--

/*!50001 DROP TABLE IF EXISTS `list_course`*/;
/*!50001 DROP VIEW IF EXISTS `list_course`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `list_course` AS select `course`.`id` AS `id`,`course`.`name` AS `name`,count(`user`.`id`) AS `n_user` from (`course` left join `user` on((`user`.`course_id` = `course`.`id`))) group by `course`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `list_exam`
--

/*!50001 DROP TABLE IF EXISTS `list_exam`*/;
/*!50001 DROP VIEW IF EXISTS `list_exam`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `list_exam` AS select `exam`.`id` AS `id`,`exam`.`category_id` AS `category_id`,`exam`.`title` AS `title`,`exam`.`header` AS `header`,`exam`.`footer` AS `footer`,`exam`.`share` AS `share`,`exam`.`date` AS `date`,count(`question`.`id`) AS `n_question` from (`exam` left join `question` on((`question`.`exam_id` = `exam`.`id`))) group by `exam`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `list_multiple_choice_question`
--

/*!50001 DROP TABLE IF EXISTS `list_multiple_choice_question`*/;
/*!50001 DROP VIEW IF EXISTS `list_multiple_choice_question`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `list_multiple_choice_question` AS select `question`.`exam_id` AS `exam_id`,`_multiple_choice`.`question_id` AS `question_id`,`_multiple_choice`.`content` AS `content`,`_multiple_choice`.`answer` AS `answer`,`_multiple_choice`.`position` AS `position` from (`_multiple_choice` join `question` on((`question`.`id` = `_multiple_choice`.`question_id`))) order by `_multiple_choice`.`question_id`,`_multiple_choice`.`position` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `list_user`
--

/*!50001 DROP TABLE IF EXISTS `list_user`*/;
/*!50001 DROP VIEW IF EXISTS `list_user`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013  SQL SECURITY DEFINER */
/*!50001 VIEW `list_user` AS select `user`.`id` AS `id`,`user`.`course_id` AS `course_id`,`user`.`user` AS `user`,`user`.`pass` AS `pass`,`user`.`name` AS `name`,count(`category`.`id`) AS `n_category` from (`user` left join `category` on((`category`.`user_id` = `user`.`id`))) group by `user`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-02-23  6:14:32
