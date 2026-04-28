-- MySQL dump 10.13  Distrib 8.0.45, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: bmproperties
-- ------------------------------------------------------
-- Server version	5.7.24

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_login_attempts`
--

DROP TABLE IF EXISTS `admin_login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_login_attempts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `attempted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_success` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_login_attempts` (`attempted_at`),
  KEY `idx_login_user_ip` (`username`,`ip_address`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_login_attempts`
--

LOCK TABLES `admin_login_attempts` WRITE;
/*!40000 ALTER TABLE `admin_login_attempts` DISABLE KEYS */;
INSERT INTO `admin_login_attempts` VALUES (1,'admin','::1','2026-04-27 03:35:33',1),(2,'admin','::1','2026-04-27 04:51:12',1),(3,'admin','::1','2026-04-27 04:57:37',1),(4,'admin','::1','2026-04-27 06:12:35',1),(5,'admin','::1','2026-04-27 06:30:31',0),(6,'admin','::1','2026-04-27 06:30:31',0),(7,'admin','::1','2026-04-27 06:30:37',1),(8,'admin','::1','2026-04-27 06:40:11',1),(9,'admin','::1','2026-04-27 07:03:38',1),(10,'admin','::1','2026-04-27 11:27:09',1),(11,'admin','::1','2026-04-28 03:40:48',1);
/*!40000 ALTER TABLE `admin_login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_password_resets`
--

DROP TABLE IF EXISTS `admin_password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_password_resets` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `admin_user_id` int(10) unsigned NOT NULL,
  `token_hash` char(64) NOT NULL,
  `expires_at` datetime NOT NULL,
  `used_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_admin_reset_hash` (`token_hash`),
  KEY `idx_admin_reset_expiry` (`expires_at`),
  KEY `fk_admin_password_resets_user` (`admin_user_id`),
  CONSTRAINT `fk_admin_password_resets_user` FOREIGN KEY (`admin_user_id`) REFERENCES `admin_users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_password_resets`
--

LOCK TABLES `admin_password_resets` WRITE;
/*!40000 ALTER TABLE `admin_password_resets` DISABLE KEYS */;
INSERT INTO `admin_password_resets` VALUES (1,1,'ae05f1b28fd73a33613116c3112e89665b898ee8f35787078905b32fe8280a7c','2026-04-27 05:24:56',NULL,'2026-04-27 04:54:56'),(2,1,'09b4255d37398ed3c58a193155e0db4362270a6e81f0509a1148541ff9e649f0','2026-04-27 05:25:19',NULL,'2026-04-27 04:55:19'),(3,1,'5acbcf7255f1a97d76d7d48549c8555717542c420a9f40d3b8dd5abc1d58bded','2026-04-27 06:41:58',NULL,'2026-04-27 06:11:58'),(4,1,'9f9ea4e6e4b3d5f3662a03497d785f58bf77ef9ebbc789eb2b01352638f61c4e','2026-04-27 06:59:35',NULL,'2026-04-27 06:29:35'),(5,1,'d52379197da242f0f048a2c5555ad1cd8252407f92dd15af85a871b2fd22736b','2026-04-27 07:06:34',NULL,'2026-04-27 06:36:34');
/*!40000 ALTER TABLE `admin_password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `email` varchar(120) NOT NULL DEFAULT '',
  `full_name` varchar(140) NOT NULL DEFAULT '',
  `password_hash` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `last_login_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','rahulrajput81680@gmail.com','Administrator','$2y$12$e7DhNuM6SuvEOzd36JW93OKT44qf/0xaZImdgV2MPXLuFEKQvpvyO',1,'2026-04-28 09:10:48','2026-04-27 03:35:25');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `slug` varchar(120) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Plot','plot',1,1,'2026-04-27 03:35:25','2026-04-27 03:35:25'),(2,'Farmhouse','farmhouse',2,1,'2026-04-27 03:35:25','2026-04-27 03:35:25'),(3,'Office','office',3,1,'2026-04-27 03:35:25','2026-04-27 03:35:25');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone` varchar(40) NOT NULL,
  `subject` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_messages`
--

LOCK TABLES `contact_messages` WRITE;
/*!40000 ALTER TABLE `contact_messages` DISABLE KEYS */;
INSERT INTO `contact_messages` VALUES (1,'editor video','editorvideo123546@gmail.com','9045468542','testing contact form','asdf as fas','::1','2026-04-27 04:14:45'),(2,'editor video','editorvideo123546@gmail.com','9045468542','testing contact form','sdfd dfg sdgg','::1','2026-04-27 06:13:28'),(3,'editor video','editorvideo123546@gmail.com','9045468542','testing','asdf as fas f','::1','2026-04-27 06:32:12'),(4,'editor video','editorvideo123546@gmail.com','9045468542','this is testing','asfd asf a s','::1','2026-04-27 06:36:00'),(5,'editor video','editorvideo123546@gmail.com','9045468542','testing contact form','dsf f sf sf','::1','2026-04-27 09:32:52'),(6,'editor video','editorvideo123546@gmail.com','9045468542','testing contact form','zczxczx s d d','::1','2026-04-27 09:35:40');
/*!40000 ALTER TABLE `contact_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enquiries`
--

DROP TABLE IF EXISTS `enquiries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `enquiries` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(140) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `subject` varchar(180) NOT NULL,
  `message` text NOT NULL,
  `looking_to` enum('sell','rent','pg') NOT NULL DEFAULT 'sell',
  `property_group` enum('residential','commercial') NOT NULL DEFAULT 'residential',
  `property_type` varchar(100) NOT NULL,
  `source` varchar(60) NOT NULL DEFAULT 'header-modal',
  `page_url` varchar(255) NOT NULL DEFAULT '',
  `ip_address` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_enquiry_created` (`created_at`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enquiries`
--

LOCK TABLES `enquiries` WRITE;
/*!40000 ALTER TABLE `enquiries` DISABLE KEYS */;
INSERT INTO `enquiries` VALUES (1,'editor video','editorvideo123546@gmail.com','9045468542','Property Enquiry','asdf  af   d e e','rent','commercial','Flat/Apartment','header-modal','contact.php','::1','2026-04-27 04:16:58'),(2,'editor video','editorvideo123546@gmail.com','9045468542','Property Enquiry','sdfs sg dfg sdg','sell','residential','Flat/Apartment','header-modal','contact.php','::1','2026-04-27 06:14:08'),(3,'editor video','editorvideo123546@gmail.com','9045468542','Property Enquiry','ada  ddas a a a','sell','residential','Flat/Apartment','header-modal','contact.php','::1','2026-04-27 06:35:14');
/*!40000 ALTER TABLE `enquiries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `explore_cities`
--

DROP TABLE IF EXISTS `explore_cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `explore_cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_name` varchar(140) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `property_count` int(10) unsigned NOT NULL DEFAULT '0',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_explore_cities_active_sort` (`is_active`,`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `explore_cities`
--

LOCK TABLES `explore_cities` WRITE;
/*!40000 ALTER TABLE `explore_cities` DISABLE KEYS */;
INSERT INTO `explore_cities` VALUES (1,'Fatehabad Road','uploads/cities/515be1d4d84536b33f372270aaf8034a.webp',20,0,1,'2026-04-27 04:06:07','2026-04-27 04:06:07'),(2,'Sanjay Palace','uploads/cities/e696d5d884c5f1659177376deb5e21c7.webp',15,0,1,'2026-04-27 04:07:56','2026-04-27 04:08:43'),(3,'Firozabad','uploads/cities/417f511602e4f0a874e6b5e42fae121f.webp',10,0,1,'2026-04-27 04:09:05','2026-04-27 04:09:05'),(4,'Runakata','uploads/cities/5bb7c9fe9d08871995f980adca0d341c.webp',12,0,1,'2026-04-27 04:11:03','2026-04-27 04:26:03');
/*!40000 ALTER TABLE `explore_cities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gallery_items`
--

DROP TABLE IF EXISTS `gallery_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gallery_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(180) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `uploaded_by` varchar(80) NOT NULL DEFAULT 'admin',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gallery_items`
--

LOCK TABLES `gallery_items` WRITE;
/*!40000 ALTER TABLE `gallery_items` DISABLE KEYS */;
INSERT INTO `gallery_items` VALUES (7,'corporate-park','uploads/gallery/f49d818c844e8ce5ce9e7868384a7e0d.webp',0,'admin',1,'2026-04-27 11:52:34','2026-04-27 11:52:34'),(8,'dream-avenues','uploads/gallery/85e70fc95223557c1deb9e7b33e741e4.webp',0,'admin',1,'2026-04-27 11:52:46','2026-04-27 11:52:46'),(9,'landmark-city','uploads/gallery/c10d93ac34ebead3512fccf15a5ca3f0.webp',0,'admin',1,'2026-04-27 11:52:57','2026-04-27 11:52:57'),(10,'paramdeep-tower','uploads/gallery/d80e75d45aeae5ec993dda131862d8b9.webp',0,'admin',1,'2026-04-27 11:53:10','2026-04-27 11:53:10'),(11,'the-grand-valley','uploads/gallery/0ac0fe315f817a015782f3afa8a57f49.webp',0,'admin',1,'2026-04-27 11:53:22','2026-04-27 11:53:22'),(12,'upsic','uploads/gallery/2425ef83237f8f0ab4c67660e2a0c2ea.webp',0,'admin',1,'2026-04-27 11:53:30','2026-04-27 11:53:30'),(13,'vrindavan-global','uploads/gallery/e9de30176b979ce35c1ef18ce5cd3abc.webp',0,'admin',1,'2026-04-27 11:53:39','2026-04-27 11:53:39');
/*!40000 ALTER TABLE `gallery_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hero_section`
--

DROP TABLE IF EXISTS `hero_section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hero_section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_sort_order` (`sort_order`),
  KEY `idx_is_active` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hero_section`
--

LOCK TABLES `hero_section` WRITE;
/*!40000 ALTER TABLE `hero_section` DISABLE KEYS */;
INSERT INTO `hero_section` VALUES (5,'Find your','Dream Home','At BM Properties, we help you discover the perfect property that fits your lifestyle and budget. Whether you are looking to buy, sell, or rent, our carefully selected listings in prime locations ensure quality, comfort, and long-term value. Start your journey with us and find a place you can truly call home.','images/slider/sli-1.webp',1,1,'2026-04-28 05:32:56','2026-04-28 05:32:56'),(6,'Find your','Perfect Property','At BM Properties, we help you discover the perfect property that fits your lifestyle and budget. Whether you are looking to buy, sell, or rent, our carefully selected listings in prime locations ensure quality, comfort, and long-term value. Start your journey with us and find a place you can truly call home.','images/slider/sli-2.webp',2,1,'2026-04-28 05:32:56','2026-04-28 05:32:56'),(7,'Find your','Perfect Space','At BM Properties, we help you discover the perfect property that fits your lifestyle and budget. Whether you are looking to buy, sell, or rent, our carefully selected listings in prime locations ensure quality, comfort, and long-term value. Start your journey with us and find a place you can truly call home.','images/slider/sli-3.webp',3,1,'2026-04-28 05:32:56','2026-04-28 05:32:56'),(10,'Find your','Dream Office','At BM Properties, we help you discover the perfect property that fits your lifestyle and budget. Whether you are looking to buy, sell, or rent, our carefully selected listings in prime locations ensure quality, comfort, and long-term value. Start your journey with us and find a place you can truly call home.','uploads/hero-section/8b48a7caafbfb18cdbf2669e2ea8da1d.webp',4,1,'2026-04-28 06:17:00','2026-04-28 06:18:27');
/*!40000 ALTER TABLE `hero_section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hero_slides`
--

DROP TABLE IF EXISTS `hero_slides`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hero_slides` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL DEFAULT '',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_hero_slides_active_sort` (`is_active`,`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hero_slides`
--

LOCK TABLES `hero_slides` WRITE;
/*!40000 ALTER TABLE `hero_slides` DISABLE KEYS */;
INSERT INTO `hero_slides` VALUES (2,'uploads/hero/06a7dfd77c3dd9fb3dbaf6ede9ce5d73.webp','',0,1,'2026-04-28 04:27:34','2026-04-28 04:27:34'),(3,'uploads/hero/2ad26141976ff84a70777c712c8c99b9.webp','',0,1,'2026-04-28 04:28:02','2026-04-28 04:28:02');
/*!40000 ALTER TABLE `hero_slides` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `properties`
--

DROP TABLE IF EXISTS `properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `properties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) unsigned NOT NULL,
  `name` varchar(160) NOT NULL,
  `slug` varchar(180) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `hero_image` varchar(255) NOT NULL,
  `gallery_images_json` longtext NOT NULL,
  `summary` text NOT NULL,
  `description_json` longtext NOT NULL,
  `location` varchar(255) NOT NULL,
  `price` varchar(120) NOT NULL,
  `price_suffix` varchar(120) NOT NULL DEFAULT '',
  `beds` varchar(20) NOT NULL DEFAULT '',
  `baths` varchar(20) NOT NULL DEFAULT '',
  `sqft` varchar(50) NOT NULL DEFAULT '',
  `overview_id` varchar(120) NOT NULL DEFAULT '',
  `nearby` text NOT NULL,
  `nearby_items_json` longtext NOT NULL,
  `details_json` longtext NOT NULL,
  `features_json` longtext NOT NULL,
  `map_address` varchar(255) NOT NULL,
  `map_city` varchar(120) NOT NULL,
  `map_state` varchar(120) NOT NULL,
  `map_postal` varchar(40) NOT NULL,
  `map_area` varchar(120) NOT NULL,
  `map_country` varchar(120) NOT NULL,
  `map_embed` text NOT NULL,
  `website_url` varchar(255) NOT NULL DEFAULT '',
  `website_label` varchar(120) NOT NULL DEFAULT '',
  `whatsapp_number` varchar(25) NOT NULL DEFAULT '',
  `card_highlights_json` longtext NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '1',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `fk_properties_category` (`category_id`),
  CONSTRAINT `fk_properties_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `properties`
--

LOCK TABLES `properties` WRITE;
/*!40000 ALTER TABLE `properties` DISABLE KEYS */;
INSERT INTO `properties` VALUES (1,1,'The Grand Green Valley','grand-valley-empire','The Grand Green Valley - BM Real Estate','uploads/properties/8763289bb9e87bf01ffddff6d5d77fa2.webp','[\"images/featured-properties/grand-green-valley.jpg\",\"images/all-properties/grand-green2.jpg\",\"images/all-properties/grand-green3.jpg\",\"uploads/properties/8f5d38eca8e651668ad1ae2b7e91a050.webp\"]','This society will have all basic facilities and amenities to suit homebuyer’s needs and requirements. Brought to you by RRR Infra Developers, RRR The Grand Green Valley is scheduled for possession in Jan, 2026.','[\"This society will have all basic facilities and amenities to suit homebuyer’s needs and requirements. Brought to you by RRR Infra Developers, RRR The Grand Green Valley is scheduled for possession in Jan, 2026.\",\"This housing society has multiple property options to offer, in varied price range, making it one of the most suitable address to own, that too in your budget.\"]','Agra, Uttar Pradesh, India','On request','','','','','GRAND-VALLEY','Located close to developing residential neighborhoods, main road access, and essential daily conveniences.','[\"Main road connectivity for city access and daily commute.\",\"Developing residential neighborhoods with future appreciation potential.\",\"Nearby grocery, pharmacy, and day-to-day utility stores.\",\"Schools and local services within convenient reach.\"]','[{\"label\":\"ID\",\"value\":\"#GVE-101\"},{\"label\":\"Price\",\"value\":\"₹ 15.55 - 50 L\"},{\"label\":\"Year built\",\"value\":\"Jan 2026\"},{\"label\":\"Size\",\"value\":\"1150 sqft\"},{\"label\":\"Type\",\"value\":\"Plots + Villas\"},{\"label\":\"Status\",\"value\":\"For sale\"}]','[[\"Club house\",\"CCTV Camera\",\"Gymnasium\",\"Indoor Games\",\"Kids Play Area\",\"Meditation area\",\"Play area\",\"Reserved parking\",\"Security\",\"Water storage\",\"Street lighting\",\"jogging and scrolling track\",\"Public transport access\",\"Low-density planning\",\"Secure township feel\"]]','Fatehabad Rd, near Dauki, Kundol, Agra','Agra','Uttar Pradesh','283111','1150 sqft','India','https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d56761.344381692485!2d78.17292!3d27.232207!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39746f0075100abf%3A0x8cc9253ea6751170!2sAhinsa%20Green%20Valley!5e0!3m2!1sen!2sus!4v1775646395615!5m2!1sen!2sus','https://ahinsagreenvalley.com/','Visit Website','','[\"Club house\",\"CCTV Camera\",\"Gymnasium\",\"Indoor Games\"]',0,'active','2026-04-27 03:35:25','2026-04-27 12:04:18'),(2,1,'Vrindavan Global','vrindavan-global','Vrindavan Global - BM Real Estate','uploads/properties/84fa84c3ff9227e7b189276d781f684f.webp','[\"images/featured-properties/vrindavan-global.jpg\",\"images/all-properties/vrindavan-global2.jpg\",\"images/all-properties/vrindavan-global3.jpg\"]','A landmark opportunity to own a piece of residential plot in Vrindavan in one of India’s most revered spiritual destinations. Set across a grand expanse of 65 acres, this thoughtfully master-planned community comprises 500 premium residential plots, each designed to offer peace, prosperity, and a deep connection with divinity.','[\"A landmark opportunity to own a piece of residential plot in Vrindavan in one of India’s most revered spiritual destinations. Set across a grand expanse of 65 acres, this thoughtfully master-planned community comprises 500 premium residential plots, each designed to offer peace, prosperity, and a deep connection with divinity.\",\"offering flexibility for various lifestyle and investment goals — whether you dream of building a soulful retreat for your family, a second home for weekend escapes, or simply want to invest in an appreciating growth corridor.\"]','Mathura, Uttar Pradesh, India','On request','','','','','VRINDAVAN-GL','Set near temple corridors, local markets, and future-ready access roads for easy movement.','[\"2.5 hours from Delhi\",\"1.5 hours from the upcoming Jewar Airport\",\"Seamless metro-city access\",\"Temple corridor, local markets, and daily conveniences nearby\"]','[{\"label\":\"ID\",\"value\":\"#VG-204\"},{\"label\":\"Price\",\"value\":\"On request\"},{\"label\":\"Year built\",\"value\":\"5 August 2025\"},{\"label\":\"Size\",\"value\":\"1500 sq.ft. to 3000 sq.ft.\"},{\"label\":\"Type\",\"value\":\"residential plot\"},{\"label\":\"Status\",\"value\":\"For sale\"}]','[[\"Childrens Play Area\",\"Badminton Court\",\"Banquet Hall\",\"Club House\",\"Jogging Track\",\"Indoor Gymnasium\",\"Temple corridor access\",\"Local markets nearby\",\"School access\"]]','NH19, Mathura-Vrindavan, Uttar Pradesh','Mathura','Uttar Pradesh','281121','1500 sq.ft. to 3000 sq.ft.','India','https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d8393.108491262845!2d77.523709!3d27.537063!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMjfCsDMyJzEzLjQiTiA3N8KwMzEnMzQuNiJF!5e1!3m2!1sen!2sin!4v1775649476020!5m2!1sen!2sin','https://hoablproject.com/index.html','Visit Website','','[\"Childrens Play Area\",\"Badminton Court\",\"Banquet Hall\",\"Club House\"]',0,'active','2026-04-27 03:35:25','2026-04-27 12:04:38'),(3,2,'Green Valley Empire','green-valley-empire','Green Valley Empire - BM Real Estate','uploads/properties/bb6f567cfe53c85ae189b729cf9e00ec.webp','[\"images/featured-properties/green-valley-empire.jpg\",\"images/all-properties/green-valley-empire2.jpg\",\"images/all-properties/green-valley-empire4.jpg\"]','Green Valley Empire is a residential project under construction with a layout focused on everyday convenience and a calm neighborhood feel.','[\"Green Valley Empire is a residential project under construction with a layout focused on everyday convenience and a calm neighborhood feel.\",\"The project blends organized development with a location that supports future residential growth and investment confidence.\"]','Agra, Uttar Pradesh, India','On request','','','','','GREEN-VALLEY','Conveniently positioned near schools, transport links, and everyday retail needs.','[\"All Connected Expressways\",\"1 hr 30 min to Jewar Airport\",\"5 min to Yamuna Expressway\",\"10 min to Lucknow Expressway\",\"30 min to Agra Airport\",\"25 min to Agra Cantt Railway Station\"]','[{\"label\":\"ID\",\"value\":\"#GVE-214\"},{\"label\":\"Price\",\"value\":\"On request\"},{\"label\":\"Year built\",\"value\":\"Jan, 2026\"},{\"label\":\"Size\",\"value\":\"1325 sqft\"},{\"label\":\"Type\",\"value\":\"Residential Plots\"},{\"label\":\"Status\",\"value\":\"For sale\"}]','[[\"Childrens Play Area\",\"24X7 Water Supply\",\"Temple\",\"24x7 Security\",\"Internal Roads & Footpaths\",\"24x7 CCTV Surveillance\",\"Schools nearby\",\"Medical support nearby\",\"Retail convenience\"]]','Etmadpur–Khandoli Road, Mudi Chauraha, Agra','Agra','Uttar Pradesh','283202','1325 SqFt','India','https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d56761.344381692485!2d78.17292!3d27.232207!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39746f0075100abf%3A0x8cc9253ea6751170!2sAhinsa%20Green%20Valley!5e0!3m2!1sen!2sus!4v1775646395615!5m2!1sen!2sus','https://ahinsagreenvalley.com/','Visit Website','','[\"Childrens Play Area\",\"24X7 Water Supply\",\"Temple\",\"24x7 Security\"]',0,'active','2026-04-27 03:35:25','2026-04-27 12:05:20'),(4,2,'The UPSIC Project','upsic-project','The UPSIC Project - BM Real Estate','uploads/properties/5e6f92065348cf7bb1324f9090f63e6b.webp','[\"images/featured-properties/upsic.jpg\",\"images/banner/banner-property-1.jpg\",\"images/banner/banner-property-2.jpg\"]','The UPSIC Project is an upcoming development planned to deliver structured plots and practical infrastructure in a strategic location.','[\"The UPSIC Project is an upcoming development planned to deliver structured plots and practical infrastructure in a strategic location.\",\"It is positioned for buyers looking for future-ready land with a straightforward development layout and strong accessibility.\"]','Agra, Uttar Pradesh, India','On request','','','','','UPSIC-PROJEC','Close to developing civic infrastructure, road connections, and planned neighborhood services.','[\"Developing civic infrastructure in the nearby zone.\",\"Strong road network connections for quick access.\",\"Planned neighborhood services and utility growth.\",\"Retail and support services in the surrounding market.\"]','[{\"label\":\"ID\",\"value\":\"#UP-310\"},{\"label\":\"Price\",\"value\":\"On request\"},{\"label\":\"Year built\",\"value\":\"2024\"},{\"label\":\"Size\",\"value\":\"1600 sqft\"},{\"label\":\"Type\",\"value\":\"Farmhouse\"},{\"label\":\"Status\",\"value\":\"For sale\"}]','[[\"Planned utilities\",\"Accessible location\",\"24X7 Security\",\"24X7 Water Supply\",\"Investment-focused project\",\"Good road access\",\"Planned utilities\",\"Secure development layout\",\"Long-term asset value\",\"Nearby civic development\",\"Retail support close by\",\"Schools and services nearby\",\"Low maintenance needs\",\"Accessible location\"]]','Near Rambagh main Hathras road, Agra','Agra','Uttar Pradesh','282006','1600 SqFt','India','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3556.9579156942015!2d78.04414161503943!3d27.210193882974807!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3974f0c97d3db1b3%3A0x0!2sAgra%2C%20Uttar%20Pradesh!5e0!3m2!1sen!2sin!4v1710000000003!5m2!1sen!2sin','#','Visit Website','','[\"Planned utilities\",\"Accessible location\",\"24X7 Security\",\"24X7 Water Supply\"]',0,'active','2026-04-27 03:35:25','2026-04-27 12:05:33'),(5,1,'The Landmark City','landmark-city','The Landmark City - BM Real Estate','uploads/properties/cb72c74734ba263de903a42c59c4c6d9.webp','[\"images/featured-properties/landmark-city.jpg\",\"images/all-properties/landmark-city1.jpeg\",\"images/all-properties/landmark-city2.avif\"]','SR Enterprises presents a housing project located in Pathauli Village, Pathauli Village. The project comes equipped with all the basic facilities necessary to meet daily requirements of the modern urban lifestyle of its residents, including .','[\"SR Enterprises presents a housing project located in Pathauli Village, Pathauli Village. The project comes equipped with all the basic facilities necessary to meet daily requirements of the modern urban lifestyle of its residents, including .\",\"In S R Landmark City, the interiors are thoughtfully designed to provide adequate space, light and ventilation to the residential units. Pathauli Village is well-connected to other parts of the city via an extensive road.\"]','Agra, Uttar Pradesh, India','On request','','','','','LANDMARK-CIT','Near schools, local shops, and main access roads that support day-to-day convenience.','[\"Within 10.5 km of Jaipur Highway\",\"Well Connected by Shastripuram Area\",\"Nearby Schools, Hospitals, Markets\",\"Eco-friendly Lifestyle with Veteran Trees\"]','[{\"label\":\"ID\",\"value\":\"#LC-118\"},{\"label\":\"Price\",\"value\":\"On request\"},{\"label\":\"Year built\",\"value\":\"Aug 2017\"},{\"label\":\"Size\",\"value\":\"925 - 1350 sq.ft\"},{\"label\":\"Type\",\"value\":\"3 BHK Apartment\"},{\"label\":\"Status\",\"value\":\"For sale\"}]','[[\"Gymnasium\",\"Visitor Parking\",\"Badminton Court\",\"Temple\",\"Childrens Play Area\",\"Transport routes\",\"Jogging Track\",\"24x7 CCTV Surveillance\",\"Street Lighting\"]]','Patholi, Agra','Agra','Uttar Pradesh','282001','925 - 1350 sq.ft','India','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4210.519845506866!2d77.930008!3d27.1690924!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397477d50dda2379%3A0xfeb98ef1376cf830!2sLandmark%20City!5e1!3m2!1sen!2sin!4v1775708198339!5m2!1sen!2sin','https://housing.com/in/buy/projects/page/234112-landmark-city-by-rainbow-infra-housing-pvt-ltd-in-pathauli-village','Visit Website','','[\"Gymnasium\",\"Visitor Parking\",\"Badminton Court\",\"Temple\"]',0,'active','2026-04-27 03:35:25','2026-04-27 12:04:48'),(6,1,'Dream Avenues','dream-avenue','Dream Avenues - BM Real Estate','uploads/properties/4c298e6a3c529d44484b5c98490b48fd.webp','[\"images/featured-properties/dream-avenue.jpg\",\"images/all-properties/dream-avenues.webp\",\"images/all-properties/dream-avenues2.webp\",\"images/all-properties/dream-avenues3.webp\"]','Dream avenues offers commercial spaces in its residential development located on nh-19, near the yamuna expressway and approximately 15 minutes from agra.','[\"Dream avenues offers commercial spaces in its residential development located on nh-19, near the yamuna expressway and approximately 15 minutes from agra.\",\"These commercial opportunities are situated in a gated society, ideal for businesses seeking a prime location with high visibility and accessibility.\"]','Agra, Uttar Pradesh, India','On request','','','','','DREAM-AVENUE','Conveniently placed near neighborhood retail, transport access, and emerging residential demand.','[\"just 5 minutes away from the yamuna expressway\",\"15 minutes away from the heart of agra\",\"Situated directly on nh-19\",\"Essential services and convenience facilities within reach.\"]','[{\"label\":\"ID\",\"value\":\"#DA-126\"},{\"label\":\"Price\",\"value\":\"On request\"},{\"label\":\"Year built\",\"value\":\"July 15, 2029\"},{\"label\":\"Size\",\"value\":\"1800 sqft\"},{\"label\":\"Type\",\"value\":\"Plot\"},{\"label\":\"Status\",\"value\":\"For sale\"}]','[[\"Corner Property\",\"Overlooking Park\",\"24x7 Security\",\"Temple\",\"Neighborhood retail nearby\",\"Rain Water Harvesting\",\"Overlooking Main Road\",\"Family-oriented location\",\"Secure project setting\",\"Water and power access\",\"Green open space\",\"Long-term appreciation\",\"Community development\",\"Balanced lifestyle potential\"]]','Firozabad Road near K.P. Engineering College, Agra','Agra','Uttar Pradesh','282005','1800 SqFt','India','https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d538645.2600611125!2d78.1759644!3d27.2314314!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39746f002cf2088d%3A0xab82b045f8ec3021!2sDream%20Avenues!5e1!3m2!1sen!2sin!4v1775710022933!5m2!1sen!2sin','#','Visit Website','','[\"Corner Property\",\"Overlooking Park\",\"24x7 Security\",\"Temple\"]',0,'active','2026-04-27 03:35:25','2026-04-27 12:04:58'),(7,3,'Emporium Block','emporium-block','Emporium Block - BM Real Estate','uploads/properties/1d83a8efa77f4d5be3fa6a99ab0e4503.webp','[\"images/banner/banner-property-1.jpg\",\"images/banner/banner-property-2.jpg\",\"images/banner/banner-property-3.jpg\"]','Emporium Block is an upcoming commercial project under construction, designed to support retail and office use in a compact, practical format.','[\"Emporium Block is an upcoming commercial project under construction, designed to support retail and office use in a compact, practical format.\",\"The project is positioned for business buyers who want a clean layout, strong visibility, and future commercial demand.\"]','Agra, Uttar Pradesh, India','On request','','','','','EMPORIUM-BLO','Close to retail movement, service businesses, and commercial road traffic.','[\"Multiple offices, banks, coaching centers\",\"Co-working spaces and IT companies\",\"Government offices and service centers\"]','[{\"label\":\"ID\",\"value\":\"#EB-420\"},{\"label\":\"Price\",\"value\":\"On request\"},{\"label\":\"Year built\",\"value\":\"2024\"},{\"label\":\"Size\",\"value\":\"900 sqft\"},{\"label\":\"Type\",\"value\":\"Office\"},{\"label\":\"Status\",\"value\":\"For sale\"}]','[[\"24x7 Security\",\"Car Parking\",\"Lifts\",\"24/7 Water Supply\",\"24/7 Power Backup\",\"Grade A Building\",\"Business support nearby\",\"Service routes close by\",\"Delivery access\"]]','Emporium Block, Sanjay Place, Agra','Agra','Uttar Pradesh','282002','900 SqFt','India','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4209.415097158735!2d78.00157787597884!3d27.198368047755366!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39747747173e7289%3A0xcc0eebb90e9a8158!2semporium%20block%2C%20Sanjay%20Palace%2C%20Sanjay%20Place%2C%20Civil%20Lines%2C%20Agra%2C%20Uttar%20Pradesh%20282002!5e1!3m2!1sen!2sin!4v1775710816270!5m2!1sen!2sin','#','Visit Website','','[\"24x7 Security\",\"Car Parking\",\"Lifts\",\"24/7 Water Supply\"]',0,'active','2026-04-27 03:35:25','2026-04-27 12:06:04'),(8,3,'Corporate Park Agra','corporate-park-agra','Corporate Park Agra - BM Real Estate','uploads/properties/0c25651c353028c4e1747e4a9703e19e.webp','[\"images/featured-properties/corporate-park.png\",\"images/banner/banner-property-1.jpg\",\"images/banner/banner-property-3.jpg\"]','Looking for property investment opportunities in Agra, Agra Infraland Corporate park can be the right bet for you.It is a ready to move project in Sanjay Place , Agra, offering investment options within your budget.','[\"Looking for property investment opportunities in Agra, Agra Infraland Corporate park can be the right bet for you.It is a ready to move project in Sanjay Place , Agra, offering investment options within your budget.\",\"For those looking for exciting returns on investment, Agra Infraland Corporate park is Agra most desirable commercial project, where property options are available in varied budget range.\"]','Agra, Uttar Pradesh, India','On request','','','','','CORPORATE-PA','Located near active commercial movement, service routes, and business-friendly infrastructure.','[\"Multiple offices, banks, coaching centers\",\"Co-working spaces and IT companies\",\"Government offices and service centers\"]','[{\"label\":\"ID\",\"value\":\"#CPA-502\"},{\"label\":\"Price\",\"value\":\"On request\"},{\"label\":\"Year built\",\"value\":\"Jun, 2018\"},{\"label\":\"Size\",\"value\":\"1050 sqft\"},{\"label\":\"Type\",\"value\":\"Office\"},{\"label\":\"Status\",\"value\":\"For Rent\"}]','[[\"24x7 Security\",\"Car Parking\",\"Lifts\",\"24/7 Water Supply\",\"24/7 Power Backup\",\"Grade A Building\",\"Business support nearby\",\"Service routes close by\",\"Delivery access\"]]','Sanjay Palace, Sanjay Place, Civil Lines, Agra','Agra','Uttar Pradesh','282002','1050 SqFt','India','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4209.352020133202!2d78.0082523!3d27.2000387!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397477ad7106acf1%3A0xa6379bee5878de32!2sCorporate%20Park%2C%20Sanjay%20Place%2C%20Agra!5e1!3m2!1sen!2sin!4v1775710573058!5m2!1sen!2sin','#','Visit Website','','[\"24x7 Security\",\"Car Parking\",\"Lifts\",\"24/7 Water Supply\"]',0,'active','2026-04-27 03:35:25','2026-04-27 12:06:20'),(9,3,'Padamdeep Tower','padamdeep-tower','Padamdeep Tower - BM Real Estate','uploads/properties/f2037ef47b688d045781373d723b9129.webp','[\"images/featured-properties/padamdeep-tower.png\",\"images/banner/banner-property-1.jpg\",\"images/banner/banner-property-2.jpg\"]','Situated in Sanjay Place, the Padamdeep Tower is planned to offer a modern lifestyle to all the residents. Padamdeep Tower is a high-quality yet affordable residential project by Shree Riddhi Siddhi Real Ventures LLP. The site\'s complete address is Sanjay Place, Madhu Nagar, Agra, Uttar Pradesh.','[\"Situated in Sanjay Place, the Padamdeep Tower is planned to offer a modern lifestyle to all the residents. Padamdeep Tower is a high-quality yet affordable residential project by Shree Riddhi Siddhi Real Ventures LLP. The site\'s complete address is Sanjay Place, Madhu Nagar, Agra, Uttar Pradesh.\",\"Its pincode is 282002. With all modern conveniences at your disposal, Padamdeep Tower will ensure a quality living experience.\"]','Agra, Uttar Pradesh, India','On request','','','','','PADAMDEEP-TO','Near business activity, roadway access, and commercial support services.','[\"Multiple offices, banks, coaching centers\",\"Co-working spaces and IT companies\",\"Government offices and service centers\"]','[{\"label\":\"ID\",\"value\":\"#PT-618\"},{\"label\":\"Price\",\"value\":\"On request\"},{\"label\":\"Year built\",\"value\":\"2024\"},{\"label\":\"Size\",\"value\":\"980 sqft\"},{\"label\":\"Type\",\"value\":\"Office/flats\"},{\"label\":\"Status\",\"value\":\"For sale\"}]','[[\"24/7 Power Backup\",\"Car Parking\",\"Lifts\",\"24/7 Water Supply\",\"24x7 Security\",\"Grade A Building\",\"Business support nearby\",\"Service routes close by\",\"Delivery access\"]]','Wazirpura Rd, Sanjay Palace, Sanjay Place, Agra','Agra','Uttar Pradesh','282002','980 SqFt','India','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4209.442459569624!2d78.00629359999999!3d27.1976433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3974774796a70893%3A0x1d4eeb3bded1673!2sPadamdeep%20Tower%2C%20Wazirpura%20Rd%2C%20Sanjay%20Palace%2C%20Sanjay%20Place%2C%20Madhu%20Nagar%2C%20Agra%2C%20Uttar%20Pradesh%20282002!5e1!3m2!1sen!2sin!4v1775711517642!5m2!1sen!2sin','#','Visit Website','','[\"24/7 Power Backup\",\"Car Parking\",\"Lifts\",\"24/7 Water Supply\"]',0,'active','2026-04-27 03:35:25','2026-04-27 12:06:31'),(10,1,'editor video','editor-video','editor video - BM Real Estate','uploads/properties/c125406e20a29c90dcdd2704449df679.webp','[\"uploads/properties/c125406e20a29c90dcdd2704449df679.webp\",\"uploads/properties/a02ff36bf4c3d237da71090ef0e04803.webp\",\"uploads/properties/c8c87aa13a907622481fbaea61ea4142.webp\",\"uploads/properties/e7277bbdae71c013e4a543675aeab406.webp\",\"uploads/properties/bd319c1796e4fd1b1015c127c5868d55.webp\"]','standing-with-the-farmer-yogesh-nauhwars-lifelong-mission-for-agricultural-justice-in-western-up','[\"standing-with-the-farmer-yogesh-nauhwars-lifelong-mission-for-agricultural-justice-in-western-up\"]','agra, uttar pradesh, India','On request','','','','','EDITOR-VIDEO','tajmahal','[\"tajmahal\",\"inner ring road\",\"lucknow expressway\",\"agra\"]','[{\"label\":\"Year built\",\"value\":\"2025\"},{\"label\":\"Booking Amount\",\"value\":\"250000\"},{\"label\":\"Status\",\"value\":\"active\"},{\"label\":\"Size\",\"value\":\"8 beds\"},{\"label\":\"Plot Size\",\"value\":\"1000 sqft\"},{\"label\":\"address\",\"value\":\"fatehabad road\"}]','[[\"club house\",\"cctv camera\",\"parking\",\"temple\",\"car-parking\",\"cycle-parking\",\"RO Water\",\"Fresh Environement\",\"new cars\",\"good environement\",\"educated peoples\",\"Food facility\",\"cab facility\",\"highway road\",\"expressway connected\"]]','sanjay palace','agra','uttar pradesh','282006','agra','India','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4368.9120741269035!2d78.08928167609967!3d27.13715715040794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x397471f5b36bcb7b%3A0xa0afaad70de840e0!2s43PR%2BVQF%20Ramada%20Plaza%20Hotel%2C%20Agra%2C%20Uttar%20Pradesh%20282004!5e1!3m2!1sen!2sin!4v1777261368951!5m2!1sen!2sin','https://digiconnunite.com/','Visit Website','9045468542','[\"club house\",\"cctv camera\",\"parking\",\"temple\"]',0,'active','2026-04-27 03:43:42','2026-04-27 08:48:07');
/*!40000 ALTER TABLE `properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `site_settings`
--

DROP TABLE IF EXISTS `site_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `site_settings` (
  `id` tinyint(3) unsigned NOT NULL,
  `office_address` text NOT NULL,
  `phone` varchar(40) NOT NULL,
  `email` varchar(120) NOT NULL,
  `open_time` varchar(255) NOT NULL,
  `facebook_url` varchar(255) NOT NULL DEFAULT '#',
  `instagram_url` varchar(255) NOT NULL DEFAULT '#',
  `youtube_url` varchar(255) NOT NULL DEFAULT '#',
  `page_title_bg` varchar(255) NOT NULL DEFAULT 'images/banner/banner2.jpg',
  `trusted_partners_heading` varchar(180) NOT NULL DEFAULT 'Trusted by over 20+ major companies',
  `hero_subtitle` varchar(180) NOT NULL DEFAULT '',
  `hero_title` varchar(255) NOT NULL DEFAULT '',
  `hero_cta_label` varchar(120) NOT NULL DEFAULT '',
  `hero_cta_url` varchar(255) NOT NULL DEFAULT '',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `site_settings`
--

LOCK TABLES `site_settings` WRITE;
/*!40000 ALTER TABLE `site_settings` DISABLE KEYS */;
INSERT INTO `site_settings` VALUES (1,'Block No-25, Sanjay Place, Agra - 282002','+91 98370 29310','bmrealestateagra@gmail.com','Monday - Friday: 08:00 - 20:00 | Saturday - Sunday: 10:00 - 18:00','#','#','#','images/banner/banner2.jpg','Trusted by over 10+ major companies','','','','','2026-04-27 09:03:49');
/*!40000 ALTER TABLE `site_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimonials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(140) NOT NULL,
  `subtitle` varchar(180) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `rating` tinyint(3) unsigned NOT NULL DEFAULT '5',
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_testimonials_active_sort` (`is_active`,`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials` DISABLE KEYS */;
INSERT INTO `testimonials` VALUES (1,'Rahul Rajput','Home Buyer','BM Properties made my home-buying experience smooth and stress-free. They guided me at every step and helped me find a property that perfectly fits my needs and budget.','images/testimonial/testi-1.jpg',5,0,1,'2026-04-27 03:35:25','2026-04-27 03:37:11'),(2,'Amit Singh','Investor','I was looking for a good investment option, and BM Properties suggested promising projects. Their knowledge of locations and future growth is impressive.','images/testimonial/testi-2.jpg',5,2,1,'2026-04-27 03:35:25','2026-04-27 03:35:25'),(3,'Neha Gupta','Rental Client','Finding a rental property was never this easy. BM Properties provided multiple options and handled everything quickly and efficiently.','images/testimonial/testi-4.png',5,3,1,'2026-04-27 03:35:25','2026-04-27 03:35:25');
/*!40000 ALTER TABLE `testimonials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `top_properties`
--

DROP TABLE IF EXISTS `top_properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `top_properties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(160) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `detail_url` varchar(255) NOT NULL DEFAULT '',
  `tag_label` varchar(120) NOT NULL DEFAULT '',
  `highlights_json` longtext NOT NULL,
  `summary` text NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_top_properties_active_sort` (`is_active`,`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `top_properties`
--

LOCK TABLES `top_properties` WRITE;
/*!40000 ALTER TABLE `top_properties` DISABLE KEYS */;
INSERT INTO `top_properties` VALUES (1,'Green Valley Empire','uploads/top-properties/0e5ce2e10c44b170a64b1bb83f90e3a5.webp','','','[\"temple\",\"247 Security\",\"Water Supply\"]','Green Valley Empire is a residential project under construction with a layout focused on everyday convenience and a calm neighborhood feel.\r\n\r\nThe project blends organized development with a location that supports future residential growth and investment confidence.',0,1,'2026-04-27 08:50:06','2026-04-27 12:32:42'),(2,'Dream Avenues','uploads/top-properties/7415c3ee9741b78eaf97c55049a5f852.webp','','','[\"24x7 Security\",\"Water Supply\",\"Park\"]','Dream Avenue is an upcoming residential project currently under construction, ideally located on Main Firozabad Road near K.P. Engineering College, NH-2/19, Agra.',0,1,'2026-04-27 08:55:19','2026-04-27 12:30:51'),(3,'Vrindavan Global','uploads/top-properties/021ca789332102ed8213f4b5e95cabb3.webp','','','[\"Temple\",\"Banquet Hall\",\"Club House\"]','A landmark opportunity to own a piece of residential plot in Vrindavan in one of India’s most revered spiritual destinations. Set across a grand expanse of 65 acres, this thoughtfully master-planned community comprises 500 premium residential plots, each designed to offer peace, prosperity, and a deep connection with divinity.',0,1,'2026-04-27 12:33:32','2026-04-27 12:33:32'),(4,'The Grand Green Valley Empire','uploads/top-properties/237bada84cae595fb4fb6d27104958b3.webp','','The Grand Green Valley','[\"Club House\",\"CCTV\",\"Indoor Games\"]','This society will have all basic facilities and amenities to suit homebuyer’s needs and requirements. Brought to you by RRR Infra Developers, RRR The Grand Green Valley is scheduled for possession in Jan, 2026.',0,1,'2026-04-27 12:34:21','2026-04-27 12:34:41');
/*!40000 ALTER TABLE `top_properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trusted_partners`
--

DROP TABLE IF EXISTS `trusted_partners`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `trusted_partners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `company_name` varchar(140) NOT NULL,
  `logo_path` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_trusted_partners_active_sort` (`is_active`,`sort_order`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trusted_partners`
--

LOCK TABLES `trusted_partners` WRITE;
/*!40000 ALTER TABLE `trusted_partners` DISABLE KEYS */;
INSERT INTO `trusted_partners` VALUES (1,'Ahinsa','images/partners/ahinsa.png',1,1,'2026-04-27 06:54:08','2026-04-27 06:54:08'),(2,'Corporate Park','images/partners/corporate-park.png',2,1,'2026-04-27 06:54:08','2026-04-27 06:54:08'),(3,'Landmark City','images/partners/landmark-city.png',3,1,'2026-04-27 06:54:08','2026-04-27 06:54:08'),(4,'Lodha','images/partners/lodha.png',4,1,'2026-04-27 06:54:08','2026-04-27 06:54:08'),(5,'UPSIC','images/partners/upsic.png',5,1,'2026-04-27 06:54:08','2026-04-27 06:54:08');
/*!40000 ALTER TABLE `trusted_partners` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-04-28 12:18:49
