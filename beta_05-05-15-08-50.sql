# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 192.168.1.101 (MySQL 5.6.19-0ubuntu0.14.04.1)
# Database: beta
# Generation Time: 2015-05-05 11:50:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table bi_files_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bi_files_types`;

CREATE TABLE `bi_files_types` (
  `type_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `bi_files_types` WRITE;
/*!40000 ALTER TABLE `bi_files_types` DISABLE KEYS */;

INSERT INTO `bi_files_types` (`type_id`, `type_name`)
VALUES
	(1,'Arquivo de Histórico'),
	(2,'Arquivo de Margem'),
	(3,'Arquivo de Movimento'),
	(4,'Arquivo de Retorno');

/*!40000 ALTER TABLE `bi_files_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table bi_files
# ------------------------------------------------------------

DROP TABLE IF EXISTS `bi_files`;

CREATE TABLE `bi_files` (
  `file_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `file_type` tinyint(3) unsigned NOT NULL,
  `file_upload_date` datetime NOT NULL,
  `file_path` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`file_id`),
  KEY `FK_FILES_TYPE_ID` (`file_type`),
  CONSTRAINT `FK_FILES_TYPE_ID` FOREIGN KEY (`file_type`) REFERENCES `bi_files_types` (`type_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `bi_files` WRITE;
/*!40000 ALTER TABLE `bi_files` DISABLE KEYS */;

INSERT INTO `bi_files` (`file_id`, `file_type`, `file_upload_date`, `file_path`)
VALUES
	(20,1,'2015-05-05 08:11:50','uploads/arquivos/historico_2015-05-05_08-11-50.txt');

/*!40000 ALTER TABLE `bi_files` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
