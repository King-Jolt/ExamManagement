/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.13-MariaDB : Database - exam_management
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `_link_option` */

DROP TABLE IF EXISTS `_link_option`;

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

/*Table structure for table `_multiple_choice` */

DROP TABLE IF EXISTS `_multiple_choice`;

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

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `user` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `parent` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `parent` (`parent`),
  CONSTRAINT `category_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `category_ibfk_2` FOREIGN KEY (`parent`) REFERENCES `category` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `course` */

DROP TABLE IF EXISTS `course`;

CREATE TABLE `course` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `exam` */

DROP TABLE IF EXISTS `exam`;

CREATE TABLE `exam` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `header` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `footer` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `share` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `share` (`share`),
  CONSTRAINT `exam_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  CONSTRAINT `exam_ibfk_2` FOREIGN KEY (`share`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `question` */

DROP TABLE IF EXISTS `question`;

CREATE TABLE `question` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `exam_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `a_title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `b_title` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `score` float DEFAULT NULL,
  `type` int(11) NOT NULL,
  `position` smallint(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_id` (`exam_id`),
  KEY `type` (`type`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `question_ibfk_2` FOREIGN KEY (`type`) REFERENCES `type_question` (`id`),
  CONSTRAINT `question_ibfk_3` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`id`),
  CONSTRAINT `question_ibfk_4` FOREIGN KEY (`group_id`) REFERENCES `question_group` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `question_group` */

DROP TABLE IF EXISTS `question_group`;

CREATE TABLE `question_group` (
  `id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `exam_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_id` (`exam_id`),
  CONSTRAINT `question_group_ibfk_1` FOREIGN KEY (`exam_id`) REFERENCES `exam` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `type_question` */

DROP TABLE IF EXISTS `type_question`;

CREATE TABLE `type_question` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

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

/* Trigger structure for table `category` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `category_trigger_delete` */$$

/*!50003 CREATE */ /*!50003 TRIGGER `category_trigger_delete` BEFORE DELETE ON `category` FOR EACH ROW DELETE FROM exam WHERE exam.category_id = OLD.id */$$


DELIMITER ;

/* Trigger structure for table `exam` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `exam_trigger_delete` */$$

/*!50003 CREATE */ /*!50003 TRIGGER `exam_trigger_delete` BEFORE DELETE ON `exam` FOR EACH ROW BEGIN
DELETE FROM question WHERE question.exam_id = OLD.id;
DELETE FROM question_group WHERE question_group.exam_id = OLD.id;
END */$$


DELIMITER ;

/* Trigger structure for table `question` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `question_trigger_delete` */$$

/*!50003 CREATE */ /*!50003 TRIGGER `question_trigger_delete` BEFORE DELETE ON `question` FOR EACH ROW BEGIN
DELETE FROM _link_option WHERE _link_option.question_id = OLD.id;
DELETE FROM _multiple_choice WHERE _multiple_choice.question_id = OLD.id;
END */$$


DELIMITER ;

/* Trigger structure for table `question_group` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `question_group_trigger_delete` */$$

/*!50003 CREATE */ /*!50003 TRIGGER `question_group_trigger_delete` BEFORE DELETE ON `question_group` FOR EACH ROW DELETE FROM question WHERE question.group_id = OLD.id */$$


DELIMITER ;

/* Procedure structure for procedure `get_question_from_ref` */

/*!50003 DROP PROCEDURE IF EXISTS  `get_question_from_ref` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `get_question_from_ref`()
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
ORDER BY question.position ASC */$$
DELIMITER ;

/* Procedure structure for procedure `list_question_by_exam` */

/*!50003 DROP PROCEDURE IF EXISTS  `list_question_by_exam` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `list_question_by_exam`(IN `user_id` VARCHAR(15) CHARSET utf8mb4, IN `category_id` VARCHAR(15) CHARSET utf8mb4, IN `exam_id` VARCHAR(15) CHARSET utf8mb4)
    NO SQL
SELECT
	question_group.id AS 'g_id',
    question_group.title AS 'g_title',
    question_group.content AS 'g_content',
    (CASE WHEN @qid != question.id THEN question.a_title ELSE NULL END) AS 'link_a_title',
    (CASE WHEN @qid != question.id THEN question.b_title ELSE NULL END) AS 'link_b_title',
    (CASE WHEN @qid != question.id THEN question.score ELSE NULL END) AS 'q_score',
    (CASE WHEN @qid != question.id THEN question.type ELSE NULL END) AS 'q_type',
    (CASE WHEN @qid != question.id THEN question.content ELSE NULL END) AS 'q_content',
    (CASE WHEN @qid != question.id THEN question.position ELSE NULL END) AS 'q_position',
    link.a_content AS 'link_a_content',
    link.a_mark AS 'link_a_mark',
    link.b_content AS 'link_b_content',
    CHAR(link.b_mark + 64) AS 'link_b_mark',
    CHAR(link.answer + 64) AS 'link_answer',
    multiple_choice.mark AS 'multiple_choice_mark',
    multiple_choice.content AS 'multiple_choice_content',
    multiple_choice.answer AS 'multiple_choice_answer',
    (CASE WHEN @qid != question.id THEN question.id ELSE NULL END) AS 'question_id',
    IF((@qid:=question.id), NULL, NULL) AS 'temp_a'
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
        ) AS c
    ON c.id = a.id
    ) AS link
ON link.question_id = question.id
JOIN exam ON exam.id = question.exam_id
JOIN category ON category.id = exam.category_id
LEFT JOIN question_group ON question_group.exam_id = question.exam_id AND question_group.id = question.group_id
WHERE category.user_id = user_id AND exam.category_id = category_id AND question.exam_id = exam_id
ORDER BY question_group.id, question.position ASC */$$
DELIMITER ;

/* Procedure structure for procedure `list_shared_exam` */

/*!50003 DROP PROCEDURE IF EXISTS  `list_shared_exam` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `list_shared_exam`(IN `course_id` VARCHAR(15) CHARSET utf8mb4, IN `include_user_id` VARCHAR(15) CHARSET utf8mb4, IN `except_exam_id` VARCHAR(15) CHARSET utf8mb4)
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
GROUP BY exam.id */$$
DELIMITER ;

/* Procedure structure for procedure `select_random_from_exam` */

/*!50003 DROP PROCEDURE IF EXISTS  `select_random_from_exam` */;

DELIMITER $$

/*!50003 CREATE PROCEDURE `select_random_from_exam`(IN `exam_id` VARCHAR(15) CHARSET utf8mb4, IN `n_question` INT UNSIGNED)
    NO SQL
INSERT INTO ref (
    SELECT question.id FROM question
    WHERE question.exam_id = exam_id
    ORDER BY rand()
    LIMIT n_question
) */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
