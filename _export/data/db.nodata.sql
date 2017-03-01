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
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `category_trigger_delete` BEFORE DELETE ON `category` FOR EACH ROW DELETE FROM exam WHERE exam.category_id = OLD.id */;;
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
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `exam_trigger_delete` BEFORE DELETE ON `exam` FOR EACH ROW DELETE FROM question WHERE question.exam_id = OLD.id */;;
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
  `n_exam` tinyint NOT NULL,
  `n_share` tinyint NOT NULL
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
  `user_id` tinyint NOT NULL,
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
-- Temporary table structure for view `list_question`
--

DROP TABLE IF EXISTS `list_question`;
/*!50001 DROP VIEW IF EXISTS `list_question`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `list_question` (
  `user_id` tinyint NOT NULL,
  `category_id` tinyint NOT NULL,
  `id` tinyint NOT NULL,
  `content` tinyint NOT NULL,
  `exam_id` tinyint NOT NULL,
  `a_title` tinyint NOT NULL,
  `b_title` tinyint NOT NULL,
  `score` tinyint NOT NULL,
  `type` tinyint NOT NULL,
  `position` tinyint NOT NULL,
  `q_type` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `list_question_for_update`
--

DROP TABLE IF EXISTS `list_question_for_update`;
/*!50001 DROP VIEW IF EXISTS `list_question_for_update`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `list_question_for_update` (
  `user_id` tinyint NOT NULL,
  `category_id` tinyint NOT NULL,
  `exam_id` tinyint NOT NULL,
  `q_id` tinyint NOT NULL,
  `q_position` tinyint NOT NULL,
  `_multiple_choice_id` tinyint NOT NULL,
  `_link_id` tinyint NOT NULL,
  `_multiple_choice_position` tinyint NOT NULL,
  `_link_a_position` tinyint NOT NULL,
  `_link_b_position` tinyint NOT NULL
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
  `position` smallint(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_id` (`exam_id`),
  KEY `type` (`type`),
  CONSTRAINT `question_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`id`),
  CONSTRAINT `question_ibfk_2` FOREIGN KEY (`type`) REFERENCES `type_question` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `question_trigger_delete` BEFORE DELETE ON `question`
 FOR EACH ROW BEGIN
    DELETE FROM _link_option WHERE _link_option.question_id = OLD.id;
    DELETE FROM _multiple_choice WHERE _multiple_choice.question_id = OLD.id;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

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
-- Dumping routines for database 'exam_management'
--
/*!50003 DROP FUNCTION IF EXISTS `create_temp_table` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `create_temp_table`() RETURNS varchar(64) CHARSET utf8mb4
    NO SQL
BEGIN
CREATE TEMPORARY TABLE ref
(
    question_id VARCHAR(15) COLLATE utf8_unicode_ci PRIMARY KEY
) ENGINE=INNODB;
RETURN 'ref';
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
CREATE DEFINER=`root`@`localhost` FUNCTION `get_rand`() RETURNS tinyint(3) unsigned
RETURN RAND() * 254 ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP FUNCTION IF EXISTS `get_rand_w` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `get_rand_w`() RETURNS smallint(5) unsigned
    NO SQL
RETURN RAND() * 60000 ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `delete_category` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_category`(IN `user_id` VARCHAR(15) CHARSET utf8mb4, IN `category_id` VARCHAR(15) CHARSET utf8mb4)
    NO SQL
DELETE FROM category WHERE category.user_id = user_id AND category.id = category_id ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `delete_exam` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_exam`(IN `user_id` VARCHAR(15) CHARSET utf8mb4, IN `category_id` VARCHAR(15) CHARSET utf8mb4, IN `exam_id` VARCHAR(15) CHARSET utf8mb4)
    NO SQL
DELETE exam FROM exam
JOIN category ON category.id = category_id AND category.user_id = user_id AND category.id = exam.category_id
WHERE exam.id = exam_id ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `delete_question` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `delete_question`(IN `user_id` VARCHAR(15) CHARSET utf8mb4, IN `category_id` VARCHAR(15) CHARSET utf8mb4, IN `exam_id` VARCHAR(15) CHARSET utf8mb4, IN `question_id` VARCHAR(15) CHARSET utf8mb4)
    NO SQL
DELETE question FROM question
JOIN exam ON exam.id = exam_id AND exam.category_id = category_id AND exam.id = question.exam_id
JOIN category ON category.id = exam.category_id AND category.user_id = user_id
WHERE question.id = question_id ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `get_question_from_ref` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_question_from_ref`()
    NO SQL
SELECT
    (CASE WHEN @qid != question.id THEN question.a_title ELSE NULL END) AS 'q_a_title',
    (CASE WHEN @qid != question.id THEN question.b_title ELSE NULL END) AS 'q_b_title',
    (CASE WHEN @qid != question.id THEN question.score ELSE NULL END) AS 'q_score',
    (CASE WHEN @qid != question.id THEN question.type ELSE NULL END) AS 'q_type',
    (CASE WHEN @qid != question.id THEN question.content ELSE NULL END) AS 'q_content',
    (CASE WHEN @qid != question.id THEN question.position ELSE NULL END) AS 'q_position',
    link.a_content AS 'link_a_content',
    link.a_position AS 'link_a_position',
    link.b_content AS 'link_b_content',
    link.b_position AS 'link_b_position',
    multiple_choice.content AS 'multiple_choice_content',
    multiple_choice.answer AS 'multiple_choice_answer',
    multiple_choice.position AS 'multiple_choice_position',
    (@qid:=question.id) AS 'question_id'
FROM ref
JOIN question ON ref.question_id = question.id
JOIN (SELECT @qid:='') AS qvar
LEFT JOIN _multiple_choice AS multiple_choice
ON multiple_choice.question_id = question.id
LEFT JOIN _link_option AS link
ON link.question_id = question.id
ORDER BY question.position ASC ;;
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `list_question_by_exam`(IN `user_id` VARCHAR(15) CHARSET utf8mb4, IN `category_id` VARCHAR(15) CHARSET utf8mb4, IN `exam_id` VARCHAR(15) CHARSET utf8mb4)
    NO SQL
SELECT
    (CASE WHEN @qid != list_question.id THEN list_question.a_title ELSE NULL END) AS 'q_a_title',
    (CASE WHEN @qid != list_question.id THEN list_question.b_title ELSE NULL END) AS 'q_b_title',
    (CASE WHEN @qid != list_question.id THEN list_question.score ELSE NULL END) AS 'q_score',
    (CASE WHEN @qid != list_question.id THEN list_question.type ELSE NULL END) AS 'q_type',
    (CASE WHEN @qid != list_question.id THEN list_question.content ELSE NULL END) AS 'q_content',
    (CASE WHEN @qid != list_question.id THEN list_question.position ELSE NULL END) AS 'q_position',
    link.a_content AS 'link_a_content',
    link.a_mark AS 'link_a_mark',
    link.b_content AS 'link_b_content',
    link.b_mark AS 'link_b_mark',
    link.answer AS 'link_answer',
    multiple_choice.mark AS 'multiple_choice_mark',
    multiple_choice.content AS 'multiple_choice_content',
    multiple_choice.answer AS 'multiple_choice_answer',
    (@qid:=list_question.id) AS 'question_id'
FROM list_question
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
ON multiple_choice.question_id = list_question.id
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
        ) AS c
    ON c.id = a.id
    ) AS link
ON link.question_id = list_question.id
WHERE list_question.user_id = user_id AND list_question.category_id = category_id AND list_question.exam_id = exam_id
ORDER BY list_question.position ASC ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `list_shared_exam` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `list_shared_exam`(IN `course_id` VARCHAR(15) CHARSET utf8mb4, IN `include_user_id` VARCHAR(15) CHARSET utf8mb4, IN `except_exam_id` VARCHAR(15) CHARSET utf8mb4)
    NO SQL
SELECT
    user.id AS 'user_id', user.user AS 'user_user', user.name AS 'user_name',
    category.id AS 'category_id', category.name AS 'category_name',
    exam.id AS 'exam_id', exam.title AS 'exam_title',
    COUNT(question.id) AS 'n_question'
FROM course
JOIN user ON user.course_id = course.id
JOIN category ON category.user_id = user.id
JOIN exam ON exam.category_id = category.id
JOIN question ON question.exam_id = exam.id
WHERE course.id = course_id AND (user.id = include_user_id OR exam.share = 1) AND exam.id != except_exam_id
GROUP BY exam.id ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `select_random_from_exam` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `select_random_from_exam`(IN `exam_id` VARCHAR(15) CHARSET utf8mb4, IN `n_question` INT UNSIGNED)
    NO SQL
INSERT INTO ref (
    SELECT question.id FROM question
    WHERE question.exam_id = exam_id
    ORDER BY rand()
    LIMIT n_question
) ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `share_exam` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `share_exam`(IN `user_id` VARCHAR(15) CHARSET utf8mb4, IN `category_id` VARCHAR(15) CHARSET utf8mb4, IN `exam_id` VARCHAR(15) CHARSET utf8mb4, IN `share` BIT(1))
    NO SQL
UPDATE exam
JOIN list_exam ON list_exam.id = exam.id
SET exam.share = share
WHERE list_exam.user_id = user_id AND list_exam.category_id = category_id AND exam.id = exam_id ;;
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `shuffle_question`(IN `user_id` VARCHAR(15) CHARSET utf8mb4, IN `category_id` VARCHAR(15) CHARSET utf8mb4, IN `exam_id` VARCHAR(15) CHARSET utf8mb4)
    NO SQL
BEGIN
/* shuffle Multiple Choice */
UPDATE list_question_for_update SET
list_question_for_update._multiple_choice_position = get_rand()
WHERE
list_question_for_update.user_id = user_id AND
list_question_for_update.category_id = category_id AND
list_question_for_update.exam_id = exam_id;
/* shuffle Link with Option - First */
UPDATE list_question_for_update SET
list_question_for_update._link_a_position = get_rand()
WHERE
list_question_for_update._link_a_position != 255 AND
list_question_for_update.user_id = user_id AND
list_question_for_update.category_id = category_id AND
list_question_for_update.exam_id = exam_id;
/* shuffle Link with Option - Second */
UPDATE list_question_for_update SET
list_question_for_update._link_b_position = get_rand()
WHERE
list_question_for_update.user_id = user_id AND
list_question_for_update.category_id = category_id AND
list_question_for_update.exam_id = exam_id;
/* shuffle question position */
UPDATE list_question_for_update SET
list_question_for_update.q_position = get_rand_w()
WHERE
list_question_for_update.user_id = user_id AND
list_question_for_update.category_id = category_id AND
list_question_for_update.exam_id = exam_id;
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
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `list_category` AS select `category`.`id` AS `id`,`category`.`name` AS `name`,`category`.`user_id` AS `user_id`,count(`exam`.`id`) AS `n_exam`,count(if((`exam`.`share` <> 0),`exam`.`share`,NULL)) AS `n_share` from (`category` left join `exam` on((`exam`.`category_id` = `category`.`id`))) group by `category`.`id` */;
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
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
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
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `list_exam` AS select `list_category`.`user_id` AS `user_id`,`exam`.`id` AS `id`,`exam`.`category_id` AS `category_id`,`exam`.`title` AS `title`,`exam`.`header` AS `header`,`exam`.`footer` AS `footer`,`exam`.`share` AS `share`,`exam`.`date` AS `date`,count(`question`.`id`) AS `n_question` from ((`list_category` join `exam` on((`exam`.`category_id` = `list_category`.`id`))) left join `question` on((`question`.`exam_id` = `exam`.`id`))) group by `list_category`.`id`,`exam`.`id` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `list_question`
--

/*!50001 DROP TABLE IF EXISTS `list_question`*/;
/*!50001 DROP VIEW IF EXISTS `list_question`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `list_question` AS select `list_exam`.`user_id` AS `user_id`,`list_exam`.`category_id` AS `category_id`,`question`.`id` AS `id`,`question`.`content` AS `content`,`question`.`exam_id` AS `exam_id`,`question`.`a_title` AS `a_title`,`question`.`b_title` AS `b_title`,`question`.`score` AS `score`,`question`.`type` AS `type`,`question`.`position` AS `position`,`type_question`.`name` AS `q_type` from ((`list_exam` join `question` on((`question`.`exam_id` = `list_exam`.`id`))) join `type_question` on((`type_question`.`id` = `question`.`type`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `list_question_for_update`
--

/*!50001 DROP TABLE IF EXISTS `list_question_for_update`*/;
/*!50001 DROP VIEW IF EXISTS `list_question_for_update`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `list_question_for_update` AS select `list_exam`.`user_id` AS `user_id`,`list_exam`.`category_id` AS `category_id`,`question`.`exam_id` AS `exam_id`,`question`.`id` AS `q_id`,`question`.`position` AS `q_position`,`_multiple_choice`.`id` AS `_multiple_choice_id`,`_link_option`.`id` AS `_link_id`,`_multiple_choice`.`position` AS `_multiple_choice_position`,`_link_option`.`a_position` AS `_link_a_position`,`_link_option`.`b_position` AS `_link_b_position` from (((`question` join `list_exam` on((`list_exam`.`id` = `question`.`exam_id`))) left join `_multiple_choice` on((`_multiple_choice`.`question_id` = `question`.`id`))) left join `_link_option` on((`_link_option`.`question_id` = `question`.`id`))) where (`question`.`type` <> 4) */;
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
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
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

-- Dump completed on 2017-03-02  1:33:23
