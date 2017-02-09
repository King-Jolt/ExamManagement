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
-- Table structure for table `_fill`
--

DROP TABLE IF EXISTS `_fill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_fill` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `question_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `visibility` bit(1) NOT NULL,
  `number_order` tinyint(4) NOT NULL,
  `position` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `_fill_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_fill`
--

LOCK TABLES `_fill` WRITE;
/*!40000 ALTER TABLE `_fill` DISABLE KEYS */;
/*!40000 ALTER TABLE `_fill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `_link_option_a`
--

DROP TABLE IF EXISTS `_link_option_a`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_link_option_a` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `option_b` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `question_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `position` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`),
  KEY `option_b` (`option_b`),
  CONSTRAINT `_link_option_a_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`),
  CONSTRAINT `_link_option_a_ibfk_2` FOREIGN KEY (`option_b`) REFERENCES `_link_option_b` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_link_option_a`
--

LOCK TABLES `_link_option_a` WRITE;
/*!40000 ALTER TABLE `_link_option_a` DISABLE KEYS */;
INSERT INTO `_link_option_a` VALUES ('589c8a0ec6eeb3f','589c8a0ec112a32','589c8a0eba3c8c6','Từ đơn',107),('589c8a0eca59c4e','589c8a0ec72d392','589c8a0eba3c8c6','Từ ghép',34),('589c8a0ee2c42fe','589c8a0ed0b2e70','589c8a0eba3c8c6','Từ láy',31);
/*!40000 ALTER TABLE `_link_option_a` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER `_link_a_trigger_insert` BEFORE INSERT ON `_link_option_a` FOR EACH ROW SET NEW.position = get_rand() */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `_link_option_b`
--

DROP TABLE IF EXISTS `_link_option_b`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `_link_option_b` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `question_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `position` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `question_id` (`question_id`),
  CONSTRAINT `_link_option_b_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `_link_option_b`
--

LOCK TABLES `_link_option_b` WRITE;
/*!40000 ALTER TABLE `_link_option_b` DISABLE KEYS */;
INSERT INTO `_link_option_b` VALUES ('589c8a0ec112a32','589c8a0eba3c8c6','điện, ga, sông, núi',31),('589c8a0ec72d392','589c8a0eba3c8c6','lác đác, long lanh, róc rách',44),('589c8a0ed0b2e70','589c8a0eba3c8c6','sách vở, thước kẻ',106),('589c8a0ee302a7a','589c8a0eba3c8c6','khoa học, kỹ thuật',78);
/*!40000 ALTER TABLE `_link_option_b` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER `_link_b_trigger_insert` BEFORE INSERT ON `_link_option_b` FOR EACH ROW SET NEW.position = get_rand() */;;
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
  `position` tinyint(4) NOT NULL,
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
INSERT INTO `_multiple_choice` VALUES ('589c8bf3992eb78','589c8bf3915ead4','Có biên độ giảm dần theo thời gian.','',51),('589c8bf3a469e8a','589c8bf3915ead4','Có biên độ không đổi theo thời gian.','\0',100),('589c8bf3a4e6e08','589c8bf3915ead4','Luôn có hại.','\0',30),('589c8bf3b542ad3','589c8bf3915ead4','Luôn có lợi.','\0',27),('589cc0600ff1735','589cc0600477d8f','<span class=\"equation\">\\([1; 3] \\cup [2; 4]\\)</span>','\0',26),('589cc0601689167','589cc0600477d8f','<span class=\"equation\">\\([-\\infty; 2] \\cup [3; +\\infty]\\)</span>','\0',27),('589cc0601a32a58','589cc0600477d8f','<span class=\"equation\">\\([2; 3]\\)</span>','',41),('589cc0601a712fa','589cc0600477d8f','<span class=\"equation\">\\(\\Phi\\)</span>','\0',100),('589cc1894f9cffa','589cc189459a535','<span class=\"equation\">\\((1; 2)\\)</span>','',60),('589cc189520e03c','589cc189459a535','<span class=\"equation\">\\((1; +\\infty)\\)</span>','\0',77),('589cc1895a5b29e','589cc189459a535','<span class=\"equation\">\\((0; 1)\\)</span>','\0',86),('589cc1895ad82d5','589cc189459a535','<span class=\"equation\">\\((0; 2)\\)</span>','\0',79);
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
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER `_mul_choice_trigger_insert` BEFORE INSERT ON `_multiple_choice` FOR EACH ROW SET NEW.position = get_rand() */;;
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
-- Table structure for table `exam`
--

DROP TABLE IF EXISTS `exam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exam` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `template_id` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exam`
--

LOCK TABLES `exam` WRITE;
/*!40000 ALTER TABLE `exam` DISABLE KEYS */;
INSERT INTO `exam` VALUES ('589c896d46977f8','589cd2381491f7f','Example','');
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
-- Temporary table structure for view `list_exam`
--

DROP TABLE IF EXISTS `list_exam`;
/*!50001 DROP VIEW IF EXISTS `list_exam`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `list_exam` (
  `id` tinyint NOT NULL,
  `title` tinyint NOT NULL,
  `n_question` tinyint NOT NULL
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
  CONSTRAINT `question_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES ('589c8a0eba3c8c6','Ghép các từ ở <strong>cột A</strong> với <strong>cột B</strong> sao cho phù hợp','589c896d46977f8','Cột A','Cột B',2,1,2159),('589c8bf3915ead4','Dao động tắt dần','589c896d46977f8',NULL,NULL,1,2,1335),('589cc0600477d8f','Cho hàm số&nbsp;<span class=\"equation\">\\(y = \\sqrt{-x^2 + 4x - 3} + \\sqrt{-x^2 + 6x - 8}\\)</span>&nbsp;. Tập xác định của hàm số là:','589c896d46977f8',NULL,NULL,5,2,198),('589cc189459a535','Hàm số&nbsp;<span class=\"equation\">\\(y = \\sqrt{2x - x^2}\\)</span>&nbsp;nghịch biến trên khoảng:','589c896d46977f8',NULL,NULL,0,2,1986);
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
	DECLARE pos INT;
	SELECT IFNULL(MAX(question.position), get_rand()) INTO pos FROM question;
    SET NEW.position = (pos + 1);
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
	DELETE FROM _link_option_a WHERE _link_option_a.question_id = OLD.id;
	DELETE FROM _link_option_b WHERE _link_option_b.question_id = OLD.id;
    DELETE FROM _multiple_choice WHERE _multiple_choice.question_id = OLD.id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `template`
--

DROP TABLE IF EXISTS `template`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `template` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `header` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `footer` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `template`
--

LOCK TABLES `template` WRITE;
/*!40000 ALTER TABLE `template` DISABLE KEYS */;
/*!40000 ALTER TABLE `template` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `table_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type`
--

LOCK TABLES `type` WRITE;
/*!40000 ALTER TABLE `type` DISABLE KEYS */;
/*!40000 ALTER TABLE `type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('589cd2381491f7f','teacher','4a82cb6db537ef6c5b53d144854e146de79502e8','Thử Nghiệm');
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
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER `user_trigger_insert` BEFORE INSERT ON `user` FOR EACH ROW SET NEW.pass = SHA1(NEW.pass) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping routines for database 'exam_management'
--
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
CREATE  FUNCTION `get_rand`() RETURNS tinyint(4)
RETURN RAND() * 100 + 20 ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `link_question` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE  PROCEDURE `link_question`(IN `q_id` VARCHAR(15) CHARSET utf8mb4)
    NO SQL
SELECT
	a.content AS 'a_content',
    a.pos AS 'a_position',
    b.content AS 'b_content',
    b.pos AS 'b_position',
    ab.content AS 'ab_content',
    ab.pos AS 'ab_position'
FROM
	(
		SELECT _link_option_b.*, (@n:=@n + 1) AS 'pos' FROM _link_option_b
		JOIN (SELECT @n:=0) AS r
		WHERE _link_option_b.question_id = q_id
		ORDER BY _link_option_b.position
	) AS b
LEFT JOIN
	(
		SELECT _link_option_a.*, (@n2:=@n2 + 1) AS 'pos' FROM _link_option_a
        JOIN (SELECT @n2:=0) AS r
		WHERE _link_option_a.question_id = q_id
        ORDER BY _link_option_a.position
    ) AS a
ON b.pos = a.pos
LEFT JOIN
	(
		SELECT _link_option_b.*, (@n3:=@n3 + 1) AS 'pos' FROM _link_option_b
		JOIN (SELECT @n3:=0) AS r
		WHERE _link_option_b.question_id = q_id
		ORDER BY _link_option_b.position
	) AS ab
ON ab.id = a.option_b
ORDER BY -a.pos DESC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `multiple_choice_question` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE  PROCEDURE `multiple_choice_question`(IN `q_id` VARCHAR(15) CHARSET utf8mb4)
    NO SQL
SELECT _multiple_choice.*, (@n:=@n + 1) AS 'pos' FROM _multiple_choice
JOIN (SELECT @n:=0) AS r
WHERE _multiple_choice.question_id = q_id
ORDER BY _multiple_choice.position ;;
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
	/* shuffle question order */
    UPDATE question
    SET question.position = RAND() * 5000
    WHERE question.exam_id = exam_id;
	/* shuffle link: option a */
	UPDATE _link_option_a
	JOIN question ON question.id = _link_option_a.question_id
	JOIN exam ON exam.id = question.exam_id
    SET _link_option_a.position = get_rand()
    WHERE exam.id = exam_id;
    /* shuffle link: option b */
    UPDATE _link_option_b
    JOIN question ON question.id = _link_option_b.question_id
    JOIN exam ON exam.id = question.exam_id
    SET _link_option_b.position = get_rand()
    WHERE exam.id = exam_id;
    /* shuffle multiple choice */
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
/*!50001 VIEW `list_exam` AS select `exam`.`id` AS `id`,`exam`.`title` AS `title`,count(`question`.`id`) AS `n_question` from (`exam` left join `question` on((`exam`.`id` = `question`.`exam_id`))) group by `exam`.`id` */;
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

-- Dump completed on 2017-02-10  6:43:38
