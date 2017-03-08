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
INSERT INTO `_link_option` VALUES ('58b34d31bca030c','58b34d31bca030b','BOOTP',130,'Bootstrap Protocol',96),('58b34d31bca030d','58b34d31bca030b','YAML',35,'YAML Ain\'t Markup Language',10),('58b34d31bca030e','58b34d31bca030b','XML',39,'eXtensible Markup Language',17),('58b34d31bcdeb0f','58b34d31bca030b','WPA',89,'Wi-Fi Protected Access',55),('58b34d31ca4c610','58b34d31bca030b','WPAD',72,'Web Proxy Autodiscovery Protocol',221),('58b9a6b295dcc08','58b9a6b295dcc07','BOOTP',150,'Bootstrap Protocol',84),('58b9a6b29bb8c09','58b9a6b295dcc07','YAML',220,'YAML Ain\'t Markup Language',41),('58b9a6b29bb8c0a','58b9a6b295dcc07','XML',140,'eXtensible Markup Language',208),('58b9a6b2a82c70b','58b9a6b295dcc07','WPA',42,'Wi-Fi Protected Access',155),('58b9a6b2a82c70c','58b9a6b295dcc07','WPAD',42,'Web Proxy Autodiscovery Protocol',149),('58b9a6eea55800d','58b9a6eea51990c','BOOTP',182,'Bootstrap Protocol',215),('58b9a6eea55800e','58b9a6eea51990c','YAML',209,'YAML Ain\'t Markup Language',59),('58b9a6eea55800f','58b9a6eea51990c','XML',247,'eXtensible Markup Language',157),('58b9a6eea558010','58b9a6eea51990c','WPA',97,'Wi-Fi Protected Access',101),('58b9a6eeaf5aa11','58b9a6eea51990c','WPAD',254,'Web Proxy Autodiscovery Protocol',32),('58b9a733ed7e208','58b9a733ed7e207','BOOTP',182,'Bootstrap Protocol',215),('58b9a733f1a4c09','58b9a733ed7e207','YAML',209,'YAML Ain\'t Markup Language',59),('58b9a73404d3d0a','58b9a733ed7e207','XML',247,'eXtensible Markup Language',157),('58b9a73404d3d0b','58b9a733ed7e207','WPA',97,'Wi-Fi Protected Access',101),('58b9a734051240c','58b9a733ed7e207','WPAD',254,'Web Proxy Autodiscovery Protocol',32),('58bf5698b9fc519','58bf5698b9bdd18','BOOTP',130,'Bootstrap Protocol',96),('58bf5698b9fc51a','58bf5698b9bdd18','YAML',35,'YAML Ain\'t Markup Language',10),('58bf5698b9fc51b','58bf5698b9bdd18','XML',39,'eXtensible Markup Language',17),('58bf5698b9fc51c','58bf5698b9bdd18','WPA',89,'Wi-Fi Protected Access',55),('58bf5698b9fc51d','58bf5698b9bdd18','WPAD',72,'Web Proxy Autodiscovery Protocol',221),('58bf56a24c3e110','58bf56a24c3e10f','BOOTP',150,'Bootstrap Protocol',84),('58bf56a24c7ca11','58bf56a24c3e10f','YAML',220,'YAML Ain\'t Markup Language',41),('58bf56a24c7ca12','58bf56a24c3e10f','XML',140,'eXtensible Markup Language',208),('58bf56a24c7ca13','58bf56a24c3e10f','WPA',42,'Wi-Fi Protected Access',155),('58bf56a24c7ca14','58bf56a24c3e10f','WPAD',42,'Web Proxy Autodiscovery Protocol',149);
/*!40000 ALTER TABLE `_link_option` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `_multiple_choice` VALUES ('58b34d31bbe4b02','58b34d31b8b8201','<span class=\"equation\">\\(10 \\pi Hz\\)</span>','\0',15),('58b34d31bbe4b03','58b34d31b8b8201','<span class=\"equation\">\\(5 \\pi Hz\\)</span>','\0',191),('58b34d31bc23304','58b34d31b8b8201','<span class=\"equation\">\\(5 Hz\\)</span>','',146),('58b34d31bc23305','58b34d31b8b8201','<span class=\"equation\">\\(10 Hz\\)</span>','\0',159),('58b34d31bc61b07','58b34d31bc23306','<span class=\"equation\">\\({1 \\over 2\\pi} {\\sqrt{m \\over k}}\\)</span>','\0',101),('58b34d31bc61b08','58b34d31bc23306','<span class=\"equation\">\\(2\\pi {\\sqrt{k \\over m}}\\)</span>','\0',27),('58b34d31bc61b09','58b34d31bc23306','<span class=\"equation\">\\(2\\pi {\\sqrt{m \\over k}}\\)</span>','',88),('58b34d31bc61b0a','58b34d31bc23306','<span class=\"equation\">\\({1 \\over 2\\pi} {\\sqrt{k \\over m}}\\)</span>','\0',103),('58b34d31cac9713','58b34d31ca8ae12','<span class=\"equation\">\\(y = -2^3 + 1\\)</span>','\0',253),('58b34d31cb46714','58b34d31ca8ae12','<span class=\"equation\">\\(y = \\frac{2x - 2}{x + 1}\\)</span>','\0',194),('58b34d31cb84f15','58b34d31ca8ae12','<span class=\"equation\">\\(y = \\frac{x^2 + x - 3}{x + 2}\\)</span>','\0',209),('58b34d31cb84f16','58b34d31ca8ae12','Cả ba hàm số A, B, C','',212),('58b34d31cbc3718','58b34d31cbc3717','<span class=\"equation\">\\(V_\\max = A \\omega\\)</span>','',178),('58b34d31cc01f19','58b34d31cbc3717','<span class=\"equation\">\\(V_\\max = A \\omega^2\\)</span>','\0',252),('58b34d31cc01f1a','58b34d31cbc3717','<span class=\"equation\">\\(V_\\max = A^2\\omega\\)</span>','\0',221),('58b34d31cc01f1b','58b34d31cbc3717','<span class=\"equation\">\\(V_\\max = 2A\\omega\\)</span>','\0',92),('58b34d31cc4071d','58b34d31cc01f1c','dap an mot','\0',54),('58b34d31cc4071e','58b34d31cc01f1c','dap an hai','',247),('58b34d31cc4071f','58b34d31cc01f1c','dap an ba','\0',57),('58b34d31cc7ef21','58b34d31cc40720','<span class=\"equation\">\\(2^{11}\\)</span>','\0',53),('58b34d31cc7ef22','58b34d31cc40720','<span class=\"equation\">\\(2^{12}\\)</span>','\0',91),('58b34d31cc7ef23','58b34d31cc40720','<span class=\"equation\">\\(2^{10}\\)</span>','',45),('58b34d31ccbd724','58b34d31cc40720','<span class=\"equation\">\\(2^9\\)</span>','\0',206),('58b9a6b293e8a03','58b9a6b293aa302','<span class=\"equation\">\\({1 \\over 2\\pi} {\\sqrt{m \\over k}}\\)</span>','\0',83),('58b9a6b293e8a04','58b9a6b293aa302','<span class=\"equation\">\\(2\\pi {\\sqrt{k \\over m}}\\)</span>','\0',161),('58b9a6b293e8a05','58b9a6b293aa302','<span class=\"equation\">\\(2\\pi {\\sqrt{m \\over k}}\\)</span>','',47),('58b9a6b2959e306','58b9a6b293aa302','<span class=\"equation\">\\({1 \\over 2\\pi} {\\sqrt{k \\over m}}\\)</span>','\0',8),('58b9a6eea49c801','58b9a6ee9ec0700','<span class=\"equation\">\\(2^{11}\\)</span>','\0',59),('58b9a6eea4db102','58b9a6ee9ec0700','<span class=\"equation\">\\(2^{12}\\)</span>','\0',112),('58b9a6eea4db103','58b9a6ee9ec0700','<span class=\"equation\">\\(2^{10}\\)</span>','',131),('58b9a6eea4db104','58b9a6ee9ec0700','<span class=\"equation\">\\(2^9\\)</span>','\0',64),('58b9a6eea519906','58b9a6eea4db105','<span class=\"equation\">\\(y = -2^3 + 1\\)</span>','\0',215),('58b9a6eea519907','58b9a6eea4db105','<span class=\"equation\">\\(y = \\frac{2x - 2}{x + 1}\\)</span>','\0',103),('58b9a6eea519908','58b9a6eea4db105','<span class=\"equation\">\\(y = \\frac{x^2 + x - 3}{x + 2}\\)</span>','\0',121),('58b9a6eea519909','58b9a6eea4db105','Cả ba hàm số A, B, C','',44),('58b9a733ed3fb03','58b9a733ed01102','<span class=\"equation\">\\({1 \\over 2\\pi} {\\sqrt{m \\over k}}\\)</span>','\0',67),('58b9a733ed3fb04','58b9a733ed01102','<span class=\"equation\">\\(2\\pi {\\sqrt{k \\over m}}\\)</span>','\0',241),('58b9a733ed7e205','58b9a733ed01102','<span class=\"equation\">\\(2\\pi {\\sqrt{m \\over k}}\\)</span>','',244),('58b9a733ed7e206','58b9a733ed01102','<span class=\"equation\">\\({1 \\over 2\\pi} {\\sqrt{k \\over m}}\\)</span>','\0',240),('58bd4fd824d4701','58bd4fd81534400','dap an mot','\0',125),('58bd4fd82512e02','58bd4fd81534400','dap an hai','',53),('58bd4fd82512e03','58bd4fd81534400','dap an ba','\0',145),('58bd4fd82512e05','58bd4fd82512e04','<span class=\"equation\">\\(2^{11}\\)</span>','\0',59),('58bd4fd82551606','58bd4fd82512e04','<span class=\"equation\">\\(2^{12}\\)</span>','\0',112),('58bd4fd82551607','58bd4fd82512e04','<span class=\"equation\">\\(2^{10}\\)</span>','',131),('58bd4fd82551608','58bd4fd82512e04','<span class=\"equation\">\\(2^9\\)</span>','\0',64),('58bf5698b8c3d01','58bf5698b22c300','<span class=\"equation\">\\({1 \\over 2\\pi} {\\sqrt{m \\over k}}\\)</span>','\0',83),('58bf5698b902502','58bf5698b22c300','<span class=\"equation\">\\(2\\pi {\\sqrt{k \\over m}}\\)</span>','\0',161),('58bf5698b902503','58bf5698b22c300','<span class=\"equation\">\\(2\\pi {\\sqrt{m \\over k}}\\)</span>','',47),('58bf5698b902504','58bf5698b22c300','<span class=\"equation\">\\({1 \\over 2\\pi} {\\sqrt{k \\over m}}\\)</span>','\0',8),('58bf5698b940c06','58bf5698b902505','dap an mot','\0',125),('58bf5698b940c07','58bf5698b902505','dap an hai','',53),('58bf5698b940c08','58bf5698b902505','dap an ba','\0',145),('58bf5698b940c0a','58bf5698b940c09','<span class=\"equation\">\\(2^{11}\\)</span>','\0',59),('58bf5698b940c0b','58bf5698b940c09','<span class=\"equation\">\\(2^{12}\\)</span>','\0',112),('58bf5698b97f60c','58bf5698b940c09','<span class=\"equation\">\\(2^{10}\\)</span>','',131),('58bf5698b97f60d','58bf5698b940c09','<span class=\"equation\">\\(2^9\\)</span>','\0',64),('58bf5698b97f60f','58bf5698b97f60e','<span class=\"equation\">\\(y = -2^3 + 1\\)</span>','\0',253),('58bf5698b97f610','58bf5698b97f60e','<span class=\"equation\">\\(y = \\frac{2x - 2}{x + 1}\\)</span>','\0',194),('58bf5698b97f611','58bf5698b97f60e','<span class=\"equation\">\\(y = \\frac{x^2 + x - 3}{x + 2}\\)</span>','\0',209),('58bf5698b9bdd12','58bf5698b97f60e','Cả ba hàm số A, B, C','',212),('58bf5698b9bdd14','58bf5698b9bdd13','<span class=\"equation\">\\(2^{11}\\)</span>','\0',53),('58bf5698b9bdd15','58bf5698b9bdd13','<span class=\"equation\">\\(2^{12}\\)</span>','\0',91),('58bf5698b9bdd16','58bf5698b9bdd13','<span class=\"equation\">\\(2^{10}\\)</span>','',45),('58bf5698b9bdd17','58bf5698b9bdd13','<span class=\"equation\">\\(2^9\\)</span>','\0',206),('58bf56a24b82901','58bf56a2475c100','<span class=\"equation\">\\({1 \\over 2\\pi} {\\sqrt{m \\over k}}\\)</span>','\0',83),('58bf56a24bc1202','58bf56a2475c100','<span class=\"equation\">\\(2\\pi {\\sqrt{k \\over m}}\\)</span>','\0',161),('58bf56a24bc1203','58bf56a2475c100','<span class=\"equation\">\\(2\\pi {\\sqrt{m \\over k}}\\)</span>','',47),('58bf56a24bffa04','58bf56a2475c100','<span class=\"equation\">\\({1 \\over 2\\pi} {\\sqrt{k \\over m}}\\)</span>','\0',8),('58bf56a24bffa06','58bf56a24bffa05','<span class=\"equation\">\\(y = -2^3 + 1\\)</span>','\0',253),('58bf56a24bffa07','58bf56a24bffa05','<span class=\"equation\">\\(y = \\frac{2x - 2}{x + 1}\\)</span>','\0',194),('58bf56a24bffa08','58bf56a24bffa05','<span class=\"equation\">\\(y = \\frac{x^2 + x - 3}{x + 2}\\)</span>','\0',209),('58bf56a24bffa09','58bf56a24bffa05','Cả ba hàm số A, B, C','',212),('58bf56a24c3e10b','58bf56a24c3e10a','<span class=\"equation\">\\(2^{11}\\)</span>','\0',53),('58bf56a24c3e10c','58bf56a24c3e10a','<span class=\"equation\">\\(2^{12}\\)</span>','\0',91),('58bf56a24c3e10d','58bf56a24c3e10a','<span class=\"equation\">\\(2^{10}\\)</span>','',45),('58bf56a24c3e10e','58bf56a24c3e10a','<span class=\"equation\">\\(2^9\\)</span>','\0',206),('58bf56a24c7ca16','58bf56a24c7ca15','<span class=\"equation\">\\(V_\\max = A \\omega\\)</span>','',178),('58bf56a24cbb217','58bf56a24c7ca15','<span class=\"equation\">\\(V_\\max = A \\omega^2\\)</span>','\0',252),('58bf56a24cbb218','58bf56a24c7ca15','<span class=\"equation\">\\(V_\\max = A^2\\omega\\)</span>','\0',221),('58bf56a24cbb219','58bf56a24c7ca15','<span class=\"equation\">\\(V_\\max = 2A\\omega\\)</span>','\0',92);
/*!40000 ALTER TABLE `_multiple_choice` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `admin` VALUES ('root','9c7a31a8336cabd3298dbfef065214245e4a4176','Super Admin');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

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
INSERT INTO `category` VALUES ('58aa29c8017eb44','danh muc','58aa29283bf6568'),('58b6e002909b000','danh muc','58af10628833701');
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
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER `category_trigger_delete` BEFORE DELETE ON `category` FOR EACH ROW DELETE FROM exam WHERE exam.category_id = OLD.id */;;
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

--
-- Dumping data for table `exam`
--

LOCK TABLES `exam` WRITE;
/*!40000 ALTER TABLE `exam` DISABLE KEYS */;
INSERT INTO `exam` VALUES ('58b34d1bdfb8901','58aa29c8017eb44','DE THI','<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\"><tbody><tr><td style=\"text-align:center\"><strong>BỘ <u>GIÁO DỤC VÀ ĐÀO T</u>ẠO</strong></td><td style=\"text-align:center\"><strong>KỲ THI TRUNG HỌC PHỔ THÔNG QUỐC GIA NĂM 2017</strong></td></tr><tr><td>&nbsp;</td><td style=\"text-align:center\"><strong>Môn thi : TOÁN</strong></td></tr><tr><td style=\"text-align:center\"><strong>ĐỀ THI MINH HỌA</strong></td><td style=\"text-align:center\"><em>Thời <u>gian làm bài: 120 phút, không kể thời gian phát</u> đề</em></td></tr><tr><td style=\"text-align:center\"><em>(Đề thi có 01 trang)</em></td><td>&nbsp;</td></tr></tbody></table>','<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\"><tbody><tr><td style=\"text-align:center\"><strong>---------------------------------------- HẾT&nbsp;----------------------------------------</strong></td></tr><tr><td style=\"text-align:center\"><em>Thí sinh không được phép sử dụng tài liệu</em></td></tr></tbody></table>​​​​​','\0',NULL),('58b6f017cbd9400','58b6e002909b000','Bốc đề','<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\"><tbody><tr><td style=\"text-align:center\"><strong>BỘ <u>GIÁO DỤC VÀ ĐÀO T</u>ẠO</strong></td><td style=\"text-align:center\"><strong>KỲ THI TRUNG HỌC PHỔ THÔNG QUỐC GIA NĂM 2017</strong></td></tr><tr><td>&nbsp;</td><td style=\"text-align:center\"><strong>Môn thi : TOÁN</strong></td></tr><tr><td style=\"text-align:center\"><strong>ĐỀ THI MINH HỌA</strong></td><td style=\"text-align:center\"><em>Thời <u>gian làm bài: 120 phút, không kể thời gian phát</u> đề</em></td></tr><tr><td style=\"text-align:center\"><em>(Đề thi có 01 trang)</em></td><td>&nbsp;</td></tr></tbody></table>','<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\"><tbody><tr><td style=\"text-align:center\"><strong>---------------------------------------- HẾT&nbsp;----------------------------------------</strong></td></tr><tr><td style=\"text-align:center\"><em>Thí sinh không được phép sử dụng tài liệu</em></td></tr></tbody></table>​​​​​','\0',NULL),('58b99b8f90a5900','58aa29c8017eb44','tao moi','<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\"><tbody><tr><td style=\"text-align:center\"><strong>BỘ <u>GIÁO DỤC VÀ ĐÀO T</u>ẠO</strong></td><td style=\"text-align:center\"><strong>KỲ THI TRUNG HỌC PHỔ THÔNG QUỐC GIA NĂM 2017</strong></td></tr><tr><td>&nbsp;</td><td style=\"text-align:center\"><strong>Môn thi : TOÁN</strong></td></tr><tr><td style=\"text-align:center\"><strong>ĐỀ THI MINH HỌA</strong></td><td style=\"text-align:center\"><em>Thời <u>gian làm bài: 120 phút, không kể thời gian phát</u> đề</em></td></tr><tr><td style=\"text-align:center\"><em>(Đề thi có 01 trang)</em></td><td>&nbsp;</td></tr></tbody></table>','<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\"><tbody><tr><td style=\"text-align:center\"><strong>---------------------------------------- HẾT&nbsp;----------------------------------------</strong></td></tr><tr><td style=\"text-align:center\"><em>Thí sinh không được phép sử dụng tài liệu</em></td></tr></tbody></table>​​​​​','',NULL),('58be3f89ba1c100','58aa29c8017eb44','bb','<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\"><tbody><tr><td style=\"text-align:center\"><strong>BỘ <u>GIÁO DỤC VÀ ĐÀO T</u>ẠO</strong></td><td style=\"text-align:center\"><strong>KỲ THI TRUNG HỌC PHỔ THÔNG QUỐC GIA NĂM 2017</strong></td></tr><tr><td>&nbsp;</td><td style=\"text-align:center\"><strong>Môn thi : TOÁN</strong></td></tr><tr><td style=\"text-align:center\"><strong>ĐỀ THI MINH HỌA</strong></td><td style=\"text-align:center\"><em>Thời <u>gian làm bài: 120 phút, không kể thời gian phát</u> đề</em></td></tr><tr><td style=\"text-align:center\"><em>(Đề thi có 01 trang)</em></td><td>&nbsp;</td></tr></tbody></table>','<table align=\"center\" border=\"0\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\"><tbody><tr><td style=\"text-align:center\"><strong>---------------------------------------- HẾT&nbsp;----------------------------------------</strong></td></tr><tr><td style=\"text-align:center\"><em>Thí sinh không được phép sử dụng tài liệu</em></td></tr></tbody></table>​​​​​','\0',NULL);
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

--
-- Dumping data for table `question`
--

LOCK TABLES `question` WRITE;
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` VALUES ('58b34d31b8b8201','Một hệ dao động chịu tác dụng của ngoại lực tuần hoàn&nbsp;<span class=\"equation\">\\(F_n = F_n \\cos10 \\pi t\\)</span>&nbsp;thì xảy ra hiện tượng cộng hưởng. Tần số dao động riêng của hệ phải là','58b34d1bdfb8901',NULL,NULL,1,2,42881),('58b34d31bc23306','Một con lắc lò xo gồm lò xo có độ cứng k và hòn bi m gắn vào đầu lò xo, đầu kia của lò xo được treo vào một điểm cố định. Kích thước cho con lắc dao động điều hòa theo phương thẳng đứng. Chu kì là','58b34d1bdfb8901',NULL,NULL,1,2,57457),('58b34d31bca030b','Nối các cột A với cột B sao cho phù hợp !','58b34d1bdfb8901','Viết tắt','Tên đầy đủ',2,1,38643),('58b34d31ca4c611','Nếu một đường thẳng <span data-fill=\"song song\">?</span> với một cạnh của tam giác và cắt hai cạnh còn lại thì nó định ra trên hai cạnh đó những đoạn thẳng <span data-fill=\"tương ứng\">?</span> tỉ lệ.','58b34d1bdfb8901',NULL,NULL,0,4,51549),('58b34d31ca8ae12','Dựa vào hàm số nào sau đây không có cực trị ?','58b34d1bdfb8901',NULL,NULL,1,2,20843),('58b34d31cbc3717','Biểu thức li độ của vật dao động điều hòa có dạng&nbsp;<span class=\"equation\">\\(x = Acos (\\omega + \\phi)\\)</span>, Vận tốc của vật có giá trị cực đại là','58b34d1bdfb8901',NULL,NULL,1,2,48287),('58b34d31cc01f1c','3 dap an - chon 2','58b34d1bdfb8901',NULL,NULL,0,2,58904),('58b34d31cc40720','Nhờ khai triển nhị thức&nbsp;<span class=\"equation\">\\((1 + x)^{11}\\)</span>&nbsp;ta có giá trị&nbsp;<span class=\"equation\">\\(S = C_{11}^6 + C_{11}^7 + C_{11}^8 + C_{11}^9 + C_{11}^{10} + C_{11}^{11}\\)</span>&nbsp;bằng :','58b34d1bdfb8901',NULL,NULL,1,2,29661),('58b34d31ccbd725','Tổng diện tích của <span data-fill=\"hai\">?</span> hình vuông vẽ trên cạnh kề của một tam giác vuông bằng <span data-fill=\"diện tích\">?</span> hình vuông vẽ trên cạnh huyền của tam giác này.','58b34d1bdfb8901',NULL,NULL,0,4,51554),('58b9a6b287b3701','Tổng diện tích của <span data-fill=\"hai\">?</span> hình vuông vẽ trên cạnh kề của một tam giác vuông bằng <span data-fill=\"diện tích\">?</span> hình vuông vẽ trên cạnh huyền của tam giác này.','58b99b8f90a5900',NULL,NULL,0,4,51554),('58b9a6b293aa302','Một con lắc lò xo gồm lò xo có độ cứng k và hòn bi m gắn vào đầu lò xo, đầu kia của lò xo được treo vào một điểm cố định. Kích thước cho con lắc dao động điều hòa theo phương thẳng đứng. Chu kì là','58b99b8f90a5900',NULL,NULL,1,2,5982),('58b9a6b295dcc07','Nối các cột A với cột B sao cho phù hợp !','58b99b8f90a5900','Viết tắt','Tên đầy đủ',2,1,44589),('58b9a6ee9ec0700','Nhờ khai triển nhị thức&nbsp;<span class=\"equation\">\\((1 + x)^{11}\\)</span>&nbsp;ta có giá trị&nbsp;<span class=\"equation\">\\(S = C_{11}^6 + C_{11}^7 + C_{11}^8 + C_{11}^9 + C_{11}^{10} + C_{11}^{11}\\)</span>&nbsp;bằng :','58b6f017cbd9400',NULL,NULL,1,2,14172),('58b9a6eea4db105','Dựa vào hàm số nào sau đây không có cực trị ?','58b6f017cbd9400',NULL,NULL,1,2,22050),('58b9a6eea51990b','Tổng diện tích của <span data-fill=\"hai\">?</span> hình vuông vẽ trên cạnh kề của một tam giác vuông bằng <span data-fill=\"diện tích\">?</span> hình vuông vẽ trên cạnh huyền của tam giác này.','58b6f017cbd9400',NULL,NULL,0,4,51554),('58b9a6eea51990c','Nối các cột A với cột B sao cho phù hợp !','58b6f017cbd9400','Viết tắt','Tên đầy đủ',2,1,59706),('58b9a733e6a8001','Tổng diện tích của <span data-fill=\"hai\">?</span> hình vuông vẽ trên cạnh kề của một tam giác vuông bằng <span data-fill=\"diện tích\">?</span> hình vuông vẽ trên cạnh huyền của tam giác này.','58b6f017cbd9400',NULL,NULL,0,4,51554),('58b9a733ed01102','Một con lắc lò xo gồm lò xo có độ cứng k và hòn bi m gắn vào đầu lò xo, đầu kia của lò xo được treo vào một điểm cố định. Kích thước cho con lắc dao động điều hòa theo phương thẳng đứng. Chu kì là','58b6f017cbd9400',NULL,NULL,1,2,52160),('58b9a733ed7e207','Nối các cột A với cột B sao cho phù hợp !','58b6f017cbd9400','Viết tắt','Tên đầy đủ',2,1,59706),('58bd4fd81534400','3 dap an - chon 2','58b99b8f90a5900',NULL,NULL,0,2,9514),('58bd4fd82512e04','Nhờ khai triển nhị thức&nbsp;<span class=\"equation\">\\((1 + x)^{11}\\)</span>&nbsp;ta có giá trị&nbsp;<span class=\"equation\">\\(S = C_{11}^6 + C_{11}^7 + C_{11}^8 + C_{11}^9 + C_{11}^{10} + C_{11}^{11}\\)</span>&nbsp;bằng :','58b99b8f90a5900',NULL,NULL,1,2,14172),('58bf5698b22c300','Một con lắc lò xo gồm lò xo có độ cứng k và hòn bi m gắn vào đầu lò xo, đầu kia của lò xo được treo vào một điểm cố định. Kích thước cho con lắc dao động điều hòa theo phương thẳng đứng. Chu kì là','58be3f89ba1c100',NULL,NULL,1,2,5982),('58bf5698b902505','3 dap an - chon 2','58be3f89ba1c100',NULL,NULL,0,2,9514),('58bf5698b940c09','Nhờ khai triển nhị thức&nbsp;<span class=\"equation\">\\((1 + x)^{11}\\)</span>&nbsp;ta có giá trị&nbsp;<span class=\"equation\">\\(S = C_{11}^6 + C_{11}^7 + C_{11}^8 + C_{11}^9 + C_{11}^{10} + C_{11}^{11}\\)</span>&nbsp;bằng :','58be3f89ba1c100',NULL,NULL,1,2,14172),('58bf5698b97f60e','Dựa vào hàm số nào sau đây không có cực trị ?','58be3f89ba1c100',NULL,NULL,1,2,20843),('58bf5698b9bdd13','Nhờ khai triển nhị thức&nbsp;<span class=\"equation\">\\((1 + x)^{11}\\)</span>&nbsp;ta có giá trị&nbsp;<span class=\"equation\">\\(S = C_{11}^6 + C_{11}^7 + C_{11}^8 + C_{11}^9 + C_{11}^{10} + C_{11}^{11}\\)</span>&nbsp;bằng :','58be3f89ba1c100',NULL,NULL,1,2,29661),('58bf5698b9bdd18','Nối các cột A với cột B sao cho phù hợp !','58be3f89ba1c100','Viết tắt','Tên đầy đủ',2,1,38643),('58bf56a2475c100','Một con lắc lò xo gồm lò xo có độ cứng k và hòn bi m gắn vào đầu lò xo, đầu kia của lò xo được treo vào một điểm cố định. Kích thước cho con lắc dao động điều hòa theo phương thẳng đứng. Chu kì là','58be3f89ba1c100',NULL,NULL,1,2,5982),('58bf56a24bffa05','Dựa vào hàm số nào sau đây không có cực trị ?','58be3f89ba1c100',NULL,NULL,1,2,20843),('58bf56a24c3e10a','Nhờ khai triển nhị thức&nbsp;<span class=\"equation\">\\((1 + x)^{11}\\)</span>&nbsp;ta có giá trị&nbsp;<span class=\"equation\">\\(S = C_{11}^6 + C_{11}^7 + C_{11}^8 + C_{11}^9 + C_{11}^{10} + C_{11}^{11}\\)</span>&nbsp;bằng :','58be3f89ba1c100',NULL,NULL,1,2,29661),('58bf56a24c3e10f','Nối các cột A với cột B sao cho phù hợp !','58be3f89ba1c100','Viết tắt','Tên đầy đủ',2,1,44589),('58bf56a24c7ca15','Biểu thức li độ của vật dao động điều hòa có dạng&nbsp;<span class=\"equation\">\\(x = Acos (\\omega + \\phi)\\)</span>, Vận tốc của vật có giá trị cực đại là','58be3f89ba1c100',NULL,NULL,1,2,48287),('58bf56a24cbb21b','Nếu một đường thẳng <span data-fill=\"song song\">?</span> với một cạnh của tam giác và cắt hai cạnh còn lại thì nó định ra trên hai cạnh đó những đoạn thẳng <span data-fill=\"tương ứng\">?</span> tỉ lệ.','58be3f89ba1c100',NULL,NULL,0,4,51549),('58bf56a24cbb21d','Tổng diện tích của <span data-fill=\"hai\">?</span> hình vuông vẽ trên cạnh kề của một tam giác vuông bằng <span data-fill=\"diện tích\">?</span> hình vuông vẽ trên cạnh huyền của tam giác này.','58be3f89ba1c100',NULL,NULL,0,4,51554);
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
/*!50003 CREATE*/ /*!50017 */ /*!50003 TRIGGER `question_trigger_delete` BEFORE DELETE ON `question`
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
INSERT INTO `user` VALUES ('58aa29283bf6568','58aa2916bd791d5','test','7c222fb2927d828af22f592134e8932480637c0d','Nguyen Trung'),('58af10628833701','58aa2916bd791d5','leader','7c222fb2927d828af22f592134e8932480637c0d','Tổ trưởng'),('58b74a44b1ecc00','58aa2916bd791d5','giaovien','7c222fb2927d828af22f592134e8932480637c0d','Giao vien test');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

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
CREATE  FUNCTION `create_temp_table`() RETURNS varchar(64) CHARSET utf8mb4
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
CREATE  FUNCTION `get_rand`() RETURNS tinyint(3) unsigned
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
CREATE  FUNCTION `get_rand_w`() RETURNS smallint(5) unsigned
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
CREATE  PROCEDURE `delete_category`(IN `user_id` VARCHAR(15) CHARSET utf8mb4, IN `category_id` VARCHAR(15) CHARSET utf8mb4)
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
CREATE  PROCEDURE `delete_exam`(IN `user_id` VARCHAR(15) CHARSET utf8mb4, IN `category_id` VARCHAR(15) CHARSET utf8mb4, IN `exam_id` VARCHAR(15) CHARSET utf8mb4)
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
CREATE  PROCEDURE `delete_question`(IN `user_id` VARCHAR(15) CHARSET utf8mb4, IN `category_id` VARCHAR(15) CHARSET utf8mb4, IN `exam_id` VARCHAR(15) CHARSET utf8mb4, IN `question_id` VARCHAR(15) CHARSET utf8mb4)
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
CREATE  PROCEDURE `get_question_from_ref`()
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
CREATE  PROCEDURE `list_question_by_exam`(IN `user_id` VARCHAR(15) CHARSET utf8mb4, IN `category_id` VARCHAR(15) CHARSET utf8mb4, IN `exam_id` VARCHAR(15) CHARSET utf8mb4)
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
CREATE  PROCEDURE `list_shared_exam`(IN `course_id` VARCHAR(15) CHARSET utf8mb4, IN `include_user_id` VARCHAR(15) CHARSET utf8mb4, IN `except_exam_id` VARCHAR(15) CHARSET utf8mb4)
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
CREATE  PROCEDURE `select_random_from_exam`(IN `exam_id` VARCHAR(15) CHARSET utf8mb4, IN `n_question` INT UNSIGNED)
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
CREATE  PROCEDURE `share_exam`(IN `user_id` VARCHAR(15) CHARSET utf8mb4, IN `category_id` VARCHAR(15) CHARSET utf8mb4, IN `exam_id` VARCHAR(15) CHARSET utf8mb4, IN `share` BIT(1))
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
CREATE  PROCEDURE `shuffle_question`(IN `user_id` VARCHAR(15) CHARSET utf8mb4, IN `category_id` VARCHAR(15) CHARSET utf8mb4, IN `exam_id` VARCHAR(15) CHARSET utf8mb4)
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
/*!50013  SQL SECURITY DEFINER */
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
/*!50013  SQL SECURITY DEFINER */
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
/*!50013  SQL SECURITY DEFINER */
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

-- Dump completed on 2017-03-08 23:13:13
