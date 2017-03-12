-- MySQL dump 10.13  Distrib 5.7.17, for macos10.12 (x86_64)
--
-- Host: localhost    Database: shop
-- ------------------------------------------------------
-- Server version	5.7.17

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
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(500) COLLATE utf8mb4_bin DEFAULT '' COMMENT '图片地址',
  `product_id` bigint(20) DEFAULT '0' COMMENT '商品 ID',
  `pcode` char(64) COLLATE utf8mb4_bin DEFAULT '' COMMENT '商品编号',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` VALUES (1,'be/be254b4a5c2de0d5e5d9c870bd368120.png',5,'P1488982079','2017-03-11 04:02:36','2017-03-11 04:02:36');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(100) COLLATE utf8mb4_bin DEFAULT '' COMMENT '姓名',
  `email` char(255) COLLATE utf8mb4_bin DEFAULT '' COMMENT '邮件',
  `subject` char(255) COLLATE utf8mb4_bin DEFAULT '' COMMENT '主题',
  `note` varchar(500) COLLATE utf8mb4_bin DEFAULT '' COMMENT '要点',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (1,'sb','sb','sb','sb','2017-03-11 10:59:30','2017-03-11 10:59:30');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `friend_link`
--

DROP TABLE IF EXISTS `friend_link`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friend_link` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(500) COLLATE utf8mb4_bin DEFAULT '' COMMENT '友情链接',
  `logo` varchar(500) COLLATE utf8mb4_bin DEFAULT '' COMMENT 'logo',
  `sort` int(11) DEFAULT '0' COMMENT '分类排序',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friend_link`
--

LOCK TABLES `friend_link` WRITE;
/*!40000 ALTER TABLE `friend_link` DISABLE KEYS */;
INSERT INTO `friend_link` VALUES (1,'http://www.baidu.com','be/be254b4a5c2de0d5e5d9c870bd368120.png',0,'2017-03-11 04:03:18','2017-03-11 04:03:18');
/*!40000 ALTER TABLE `friend_link` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail_list`
--

DROP TABLE IF EXISTS `mail_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mail_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` char(255) COLLATE utf8mb4_bin DEFAULT '' COMMENT '邮件',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail_list`
--

LOCK TABLES `mail_list` WRITE;
/*!40000 ALTER TABLE `mail_list` DISABLE KEYS */;
/*!40000 ALTER TABLE `mail_list` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) DEFAULT '0' COMMENT 'admin ID',
  `name` varchar(500) COLLATE utf8mb4_bin DEFAULT '' COMMENT '商品名称',
  `pcode` char(20) COLLATE utf8mb4_bin DEFAULT '' COMMENT '商品编号',
  `title` varchar(1000) COLLATE utf8mb4_bin DEFAULT '' COMMENT '商品标题',
  `price` decimal(10,2) DEFAULT '0.00' COMMENT '商品价格',
  `detail` text COLLATE utf8mb4_bin COMMENT '商品详情',
  `star` int(11) DEFAULT '0' COMMENT '评星级',
  `seo_title` varchar(1000) COLLATE utf8mb4_bin DEFAULT '' COMMENT 'seo title',
  `seo_content` varchar(1000) COLLATE utf8mb4_bin DEFAULT '' COMMENT 'seo  content',
  `seo_desc` varchar(1000) COLLATE utf8mb4_bin DEFAULT '' COMMENT 'seo desc',
  `email` char(255) COLLATE utf8mb4_bin DEFAULT '' COMMENT '电子邮件',
  `business_phone` char(50) COLLATE utf8mb4_bin DEFAULT '' COMMENT '企业电话',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `main_category` int(11) DEFAULT '0' COMMENT '主分类',
  `sub_category` int(11) DEFAULT '0' COMMENT '二级分类',
  `image` char(255) COLLATE utf8mb4_bin DEFAULT '' COMMENT '商品头图',
  `status` tinyint(4) DEFAULT '1' COMMENT '状态 1下架 2上架 3删除',
  `storage` int(11) DEFAULT '0' COMMENT '库存',
  `is_home` tinyint(4) DEFAULT '0' COMMENT '是否首页商品',
  PRIMARY KEY (`id`),
  KEY `product_name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,0,'','P1489223903','',0.00,'1231',NULL,'0.00','abc','123','','','2017-03-11 09:18:23','2017-03-11 09:19:15',6,7,'http://shop.cheye.com/uploads/be/be254b4a5c2de0d5e5d9c870bd368120.png',1,0,0);
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) DEFAULT '0' COMMENT '父id',
  `title` char(255) COLLATE utf8mb4_bin DEFAULT '' COMMENT '分类标题',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sort` int(11) DEFAULT '0' COMMENT '分类排序',
  PRIMARY KEY (`id`),
  KEY `pc_title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (6,0,'main category','2017-03-08 00:23:07','2017-03-08 00:23:07',0),(7,6,'sizeone','2017-03-08 00:23:16','2017-03-08 00:23:16',0),(8,6,'size two','2017-03-08 00:23:22','2017-03-08 00:23:22',0),(9,0,'Main Category','2017-03-08 00:23:31','2017-03-08 00:23:31',0),(10,9,'helloworld','2017-03-08 00:23:39','2017-03-08 00:23:39',0);
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_image` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) DEFAULT '0' COMMENT '商品 ID',
  `link` varchar(500) COLLATE utf8mb4_bin DEFAULT '' COMMENT '友情链接',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `product_image_product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_image`
--

LOCK TABLES `product_image` WRITE;
/*!40000 ALTER TABLE `product_image` DISABLE KEYS */;
INSERT INTO `product_image` VALUES (1,0,'','2017-03-08 14:05:15','2017-03-08 14:05:15'),(2,0,'','2017-03-08 14:05:36','2017-03-08 14:05:36'),(3,0,'','2017-03-08 14:07:59','2017-03-08 14:07:59'),(4,0,'','2017-03-08 14:07:59','2017-03-08 14:07:59'),(8,6,'be/be254b4a5c2de0d5e5d9c870bd368120.png','2017-03-08 14:28:16','2017-03-08 14:28:16'),(9,6,'0f/0f52f1ce52f93437a2e9a12e2ae1d669.png','2017-03-08 14:28:16','2017-03-08 14:28:16'),(12,7,'f1/f1addde41bba9e4450a207efb79bb679.png','2017-03-08 15:40:09','2017-03-08 15:40:09'),(15,1,'http://shop.cheye.com/uploads/41/4160bfc78465fa6bf9fead5d3b54d23f.png','2017-03-11 09:19:15','2017-03-11 09:19:15');
/*!40000 ALTER TABLE `product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recommend_product`
--

DROP TABLE IF EXISTS `recommend_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recommend_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) DEFAULT '0' COMMENT '商品 ID',
  `sort` int(11) DEFAULT '0' COMMENT '分类排序',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recommend_product`
--

LOCK TABLES `recommend_product` WRITE;
/*!40000 ALTER TABLE `recommend_product` DISABLE KEYS */;
INSERT INTO `recommend_product` VALUES (3,4,0,'2017-03-11 04:03:59','2017-03-11 04:03:59');
/*!40000 ALTER TABLE `recommend_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seller`
--

DROP TABLE IF EXISTS `seller`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seller` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` char(100) COLLATE utf8mb4_bin DEFAULT '' COMMENT '用户名',
  `password` char(100) COLLATE utf8mb4_bin DEFAULT '' COMMENT '密码',
  `email_address` char(255) COLLATE utf8mb4_bin DEFAULT '' COMMENT '邮件地址',
  `location` char(255) COLLATE utf8mb4_bin DEFAULT '' COMMENT '地址',
  `business_phone` char(50) COLLATE utf8mb4_bin DEFAULT '' COMMENT '企业电话',
  `logo` varchar(500) COLLATE utf8mb4_bin DEFAULT '' COMMENT '企业logo',
  `two_dimensional_code` varchar(500) COLLATE utf8mb4_bin DEFAULT '' COMMENT '二维码地址',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `admin_username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seller`
--

LOCK TABLES `seller` WRITE;
/*!40000 ALTER TABLE `seller` DISABLE KEYS */;
INSERT INTO `seller` VALUES (1,'admin','admin','ab','ab','ab','http://shop.cheye.com/uploads/41/4160bfc78465fa6bf9fead5d3b54d23f.png','ab','2017-03-04 06:23:30','2017-03-11 09:22:03');
/*!40000 ALTER TABLE `seller` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shop_cart`
--

DROP TABLE IF EXISTS `shop_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shop_cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT '0' COMMENT '用户id',
  `product_id` int(11) DEFAULT '0' COMMENT '商品id',
  `num` int(11) DEFAULT '0' COMMENT '商品数量',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `shop_cart_user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop_cart`
--

LOCK TABLES `shop_cart` WRITE;
/*!40000 ALTER TABLE `shop_cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `shop_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `six_product`
--

DROP TABLE IF EXISTS `six_product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `six_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) DEFAULT '0' COMMENT '商品 ID',
  `sort` int(11) DEFAULT '0' COMMENT '分类排序',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `image` char(255) COLLATE utf8mb4_bin DEFAULT '' COMMENT '图片',
  `pcode` char(20) COLLATE utf8mb4_bin DEFAULT '' COMMENT '商品编码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `six_product`
--

LOCK TABLES `six_product` WRITE;
/*!40000 ALTER TABLE `six_product` DISABLE KEYS */;
INSERT INTO `six_product` VALUES (1,5,0,'2017-03-11 04:02:46','2017-03-11 04:02:46','be/be254b4a5c2de0d5e5d9c870bd368120.png','P1488982079');
/*!40000 ALTER TABLE `six_product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` char(50) COLLATE utf8mb4_bin DEFAULT '',
  `last_name` char(50) COLLATE utf8mb4_bin DEFAULT '',
  `email_address` char(255) COLLATE utf8mb4_bin DEFAULT '' COMMENT '邮件地址',
  `password` char(100) COLLATE utf8mb4_bin DEFAULT '' COMMENT '密码',
  `company_name` char(255) COLLATE utf8mb4_bin DEFAULT '' COMMENT '公司名称',
  `location` char(255) COLLATE utf8mb4_bin DEFAULT '' COMMENT '地址',
  `company_website` char(255) COLLATE utf8mb4_bin DEFAULT '' COMMENT '公司网站',
  `business_phone` char(50) COLLATE utf8mb4_bin DEFAULT '' COMMENT '企业电话',
  `ctime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `mtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) DEFAULT '1' COMMENT '用户状态 1待审核 2通过 3未通过',
  PRIMARY KEY (`id`),
  KEY `user_email_address` (`email_address`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'sb','sb','cheye@gmail.com','','company name','location','company website','business phone','2017-03-11 10:35:30','2017-03-11 10:48:10',2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-12 10:41:39
