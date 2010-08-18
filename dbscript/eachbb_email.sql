-- MySQL dump 10.13  Distrib 5.1.41, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: eachbb_email
-- ------------------------------------------------------
-- Server version	5.1.41-3ubuntu12.3

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
-- Table structure for table `eb_email`
--

DROP TABLE IF EXISTS `eb_email`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_email` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email_to` varchar(256) DEFAULT NULL,
  `email_from` varchar(256) DEFAULT NULL,
  `email_subject` varchar(256) DEFAULT NULL,
  `email_content` text,
  `email_status` int(10) unsigned DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=142 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_email`
--

LOCK TABLES `eb_email` WRITE;
/*!40000 ALTER TABLE `eb_email` DISABLE KEYS */;
INSERT INTO `eb_email` VALUES (136,'123@efasd.com','','2222222222222','12312，你好：<br/><br/>　　您的好友sauger想与您分享福布斯中文网的文章《2222222222222》，您可以点击以下连接阅读<br/><br/>　　<a href=\'http://www.forbeschina.com/review/201006/0001010.shtml\'>http://www.forbeschina.com/review/201006/0001010.shtml</a><br/>　　如果点击以上链接不起作用，请将此网址复制并粘贴到新的浏览器窗口中。',NULL,'2010-06-29 12:19:56'),(137,'123@efasd.com','','2222222222222','12312，你好：<br/><br/>　　您的好友sauger想与您分享网趣宝贝的文章《2222222222222》，您可以点击以下连接阅读<br/><br/>　　<a href=\'http://127.0.0.1:82/review/201006/0001010.shtml\'>http://www.forbeschina.com/review/201006/0001010.shtml</a><br/>　　如果点击以上链接不起作用，请将此网址复制并粘贴到新的浏览器窗口中。',NULL,'2010-06-29 12:21:07'),(138,'123@efasd.com','','2222222222222','12312，你好：<br/><br/>　　您的好友sauger想与您分享网趣宝贝的文章《2222222222222》，您可以点击以下连接阅读<br/><br/>　　<a href=\'http://127.0.0.1:82/review/201006/0001010.shtml\'>http://www.forbeschina.com/review/201006/0001010.shtml</a><br/>　　如果点击以上链接不起作用，请将此网址复制并粘贴到新的浏览器窗口中。',NULL,'2010-06-29 12:22:32'),(139,'123@efasd.com','','2222222222222','aaa，你好：<br/><br/>　　您的好友sauger想与您分享网趣宝贝的文章《2222222222222》，您可以点击以下连接阅读<br/><br/>　　<a href=\'http://127.0.0.1:82/review/201006/0001010.shtml\'>http://www.forbeschina.com/review/201006/0001010.shtml</a><br/>　　如果点击以上链接不起作用，请将此网址复制并粘贴到新的浏览器窗口中。',NULL,'2010-06-29 12:24:25'),(140,'sauger@163.com','','2222222222222','bbb，你好：<br/><br/>　　您的好友sauger想与您分享网趣宝贝的文章《2222222222222》，您可以点击以下连接阅读<br/><br/>　　<a href=\'http://127.0.0.1:82/review/201006/0001010.shtml\'>http://www.forbeschina.com/review/201006/0001010.shtml</a><br/>　　如果点击以上链接不起作用，请将此网址复制并粘贴到新的浏览器窗口中。',NULL,'2010-06-29 12:25:06'),(141,'123@efasd.com','','2222222222222','ccc，你好：<br/><br/>　　您的好友sauger想与您分享网趣宝贝的文章《2222222222222》，您可以点击以下连接阅读<br/><br/>　　<a href=\'http://127.0.0.1:82/review/201006/0001010.shtml\'>http://www.forbeschina.com/review/201006/0001010.shtml</a><br/>　　如果点击以上链接不起作用，请将此网址复制并粘贴到新的浏览器窗口中。',NULL,'2010-06-29 12:25:06');
/*!40000 ALTER TABLE `eb_email` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_email_history`
--

DROP TABLE IF EXISTS `eb_email_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_email_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email_to` varchar(256) DEFAULT NULL,
  `email_from` varchar(256) DEFAULT NULL,
  `email_subject` varchar(256) DEFAULT NULL,
  `email_content` text,
  `email_status` varchar(50) DEFAULT 'success',
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_email_history`
--

LOCK TABLES `eb_email_history` WRITE;
/*!40000 ALTER TABLE `eb_email_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_email_history` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-07-13 15:06:38
