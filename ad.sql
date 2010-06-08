-- MySQL dump 10.13  Distrib 5.1.41, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: eachbb_ad
-- ------------------------------------------------------
-- Server version	5.1.41-3ubuntu12.1

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
-- Table structure for table `eb_ad`
--

DROP TABLE IF EXISTS `eb_ad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `code` char(20) NOT NULL COMMENT '广告代码',
  `channel_id` int(11) DEFAULT NULL,
  `banner_id` int(11) DEFAULT NULL,
  `target_url` varchar(256) DEFAULT NULL,
  `title` varchar(256) DEFAULT NULL,
  `image` varchar(256) DEFAULT NULL,
  `flash` varchar(256) DEFAULT NULL,
  `video` varchar(256) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `start_hour` varchar(20) DEFAULT NULL,
  `end_hour` varchar(20) DEFAULT NULL,
  `show_price` float DEFAULT NULL COMMENT '千次展示价格',
  `click_price` float DEFAULT NULL COMMENT '千次点击价格',
  `pop_price` float DEFAULT NULL COMMENT '千次弹框价格',
  `description` varchar(500) DEFAULT NULL COMMENT '描述',
  `is_adopt` tinyint(1) DEFAULT NULL COMMENT '是否发布',
  `ad_type` varchar(10) DEFAULT NULL COMMENT '广告类型',
  PRIMARY KEY (`id`),
  KEY `new_index` (`banner_id`),
  KEY `new_index1` (`channel_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_ad`
--

LOCK TABLES `eb_ad` WRITE;
/*!40000 ALTER TABLE `eb_ad` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_ad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_ad_click_list`
--

DROP TABLE IF EXISTS `eb_ad_click_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_ad_click_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(256) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `banner_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `show_page` varchar(300) DEFAULT NULL COMMENT '展示页面url',
  `remote_ip` varchar(30) DEFAULT NULL COMMENT '客户端IP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COMMENT='广告展示记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_ad_click_list`
--

LOCK TABLES `eb_ad_click_list` WRITE;
/*!40000 ALTER TABLE `eb_ad_click_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_ad_click_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_ad_result`
--

DROP TABLE IF EXISTS `eb_ad_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_ad_result` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `source_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `date_time` char(10) DEFAULT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `ad_name` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni` (`source_id`,`type`,`date_time`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_ad_result`
--

LOCK TABLES `eb_ad_result` WRITE;
/*!40000 ALTER TABLE `eb_ad_result` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_ad_result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_ad_show_list`
--

DROP TABLE IF EXISTS `eb_ad_show_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_ad_show_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_id` int(11) NOT NULL,
  `ad_name` varchar(256) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `banner_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `show_page` varchar(300) DEFAULT NULL COMMENT '展示页面url',
  `remote_ip` varchar(30) DEFAULT NULL COMMENT '客户端IP',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20750 DEFAULT CHARSET=utf8 COMMENT='广告展示记录表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_ad_show_list`
--

LOCK TABLES `eb_ad_show_list` WRITE;
/*!40000 ALTER TABLE `eb_ad_show_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `eb_ad_show_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_banner`
--

DROP TABLE IF EXISTS `eb_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL COMMENT '广告位名称',
  `description` varchar(500) DEFAULT NULL,
  `ad_count` int(11) DEFAULT '0',
  `ad_size` varchar(20) DEFAULT NULL COMMENT '广告尺寸',
  `code` varchar(45) DEFAULT NULL COMMENT '标识',
  PRIMARY KEY (`id`),
  KEY `new_index1` (`name`(255))
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_banner`
--

LOCK TABLES `eb_banner` WRITE;
/*!40000 ALTER TABLE `eb_banner` DISABLE KEYS */;
INSERT INTO `eb_banner` VALUES (2,'顶部banner',NULL,0,'778*90','top_banner'),(3,'首页中部广告位',NULL,0,'645*95','index_middle_banner'),(4,'通用右侧广告位',NULL,0,'315*265','right_banner'),(5,'富豪首页中部广告位2',NULL,0,'990*100','rich_banner2'),(7,'富豪首页中部广告位',NULL,0,'225*150','rich_banner1'),(10,'新闻文字环绕广告位',NULL,0,'225*205','news_banner'),(11,'榜单列表广告位',NULL,0,'385*375','list_banner'),(12,'杂志中部广告位',NULL,0,'660*100','magazine_banner1'),(13,'杂志展示页底部广告位',NULL,0,'1000*100','magazine_banner2'),(14,'登录页面广告位',NULL,0,'500*190','login_banner'),(15,'会员专区页面广告位',NULL,0,'635*185','club_banner');
/*!40000 ALTER TABLE `eb_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_channel`
--

DROP TABLE IF EXISTS `eb_channel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_channel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) DEFAULT NULL COMMENT '频道名称',
  `parttern` varchar(20) DEFAULT NULL COMMENT 'url一级目录',
  `comment` varchar(500) DEFAULT NULL COMMENT '注释',
  PRIMARY KEY (`id`),
  KEY `new_index` (`parttern`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_channel`
--

LOCK TABLES `eb_channel` WRITE;
/*!40000 ALTER TABLE `eb_channel` DISABLE KEYS */;
INSERT INTO `eb_channel` VALUES (3,'首页','index','首页'),(5,'榜单','list',NULL),(6,'富豪','billionaires',NULL),(7,'投资','investment',NULL),(8,'商业','business',NULL),(9,'创业','entrepreneur',NULL),(10,'科技','tech',NULL),(11,'城市','city',NULL),(12,'生活','life',NULL),(13,'专栏','column',NULL),(14,'杂志','magazine',NULL),(15,'搜索','search',NULL),(16,'新闻','news',NULL),(17,'会员俱乐部','club',NULL),(18,'增长俱乐部','investor',NULL),(19,'调查问卷','survey',NULL),(20,'登录','login',NULL),(21,'注册','register',NULL),(22,'会员中心','user',NULL),(23,'密码找回','getpwd',NULL),(24,'读者高见','comments',NULL);
/*!40000 ALTER TABLE `eb_channel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eb_channel_banner`
--

DROP TABLE IF EXISTS `eb_channel_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eb_channel_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `channel_id` int(11) NOT NULL,
  `banner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eb_channel_banner`
--

LOCK TABLES `eb_channel_banner` WRITE;
/*!40000 ALTER TABLE `eb_channel_banner` DISABLE KEYS */;
INSERT INTO `eb_channel_banner` VALUES (1,3,2),(2,3,3),(3,7,2),(4,8,2),(5,9,2),(6,10,2),(7,11,2),(8,7,4),(9,8,4),(10,9,4),(11,10,4),(12,11,4),(13,6,2),(14,6,5),(15,6,7),(16,16,2),(17,16,4),(18,16,10),(19,5,2),(20,5,4),(21,5,11),(22,6,4),(23,18,2),(24,18,4),(25,17,2),(26,17,15),(27,14,2),(28,14,4),(29,14,12),(30,14,13),(31,13,2),(32,13,4),(33,20,2),(34,21,2),(35,22,2),(36,20,14),(37,12,2),(38,15,2),(39,15,4),(40,19,2),(41,19,4),(42,23,2),(43,23,14),(44,15,11),(45,24,4);
/*!40000 ALTER TABLE `eb_channel_banner` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-06-08 10:40:33
