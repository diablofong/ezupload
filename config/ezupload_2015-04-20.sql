# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.21)
# Database: ezupload
# Generation Time: 2015-04-20 14:27:29 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ez_filepath
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ez_filepath`;

CREATE TABLE `ez_filepath` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '檔案序號',
  `userid` int(11) NOT NULL COMMENT '使用者序號',
  `filename` varchar(255) DEFAULT '' COMMENT '檔案名稱',
  `filepath` varchar(255) DEFAULT '' COMMENT '檔案路徑',
  `uploaddate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '上傳時間',
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table ez_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ez_user`;

CREATE TABLE `ez_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '使用者序號',
  `account` varchar(20) NOT NULL DEFAULT '' COMMENT '使用者帳號',
  `password` varchar(255) NOT NULL DEFAULT '' COMMENT '使用者密碼',
  `username` varchar(11) NOT NULL DEFAULT '' COMMENT '使用者名稱',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '使用者信箱',
  `role` varchar(1) DEFAULT NULL COMMENT '使用者角色',
  PRIMARY KEY (`id`),
  KEY `account` (`account`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ez_user` WRITE;
/*!40000 ALTER TABLE `ez_user` DISABLE KEYS */;

INSERT INTO `ez_user` (`id`, `account`, `password`, `username`, `email`, `role`)
VALUES
	(1,'admin','8d5f8aeeb64e3ce20b537d04c486407eaf489646617cfcf493e76f5b794fa080','管理者','admin@example.com','*');

/*!40000 ALTER TABLE `ez_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
