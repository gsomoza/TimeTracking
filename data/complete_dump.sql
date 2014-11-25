CREATE DATABASE  IF NOT EXISTS `timetracker` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `timetracker`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: timetracker
-- ------------------------------------------------------
-- Server version	5.6.12-log

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
-- Table structure for table `oauth_access_tokens`
--

DROP TABLE IF EXISTS `oauth_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_access_tokens` (
  `access_token` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_id` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expires` datetime NOT NULL,
  `scope` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`access_token`),
  KEY `IDX_CA42527CA76ED395` (`user_id`),
  KEY `IDX_CA42527C19EB6921` (`client_id`),
  CONSTRAINT `FK_CA42527C19EB6921` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`client_id`),
  CONSTRAINT `FK_CA42527CA76ED395` FOREIGN KEY (`user_id`) REFERENCES `oauth_users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_access_tokens`
--

LOCK TABLES `oauth_access_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_access_tokens` DISABLE KEYS */;
INSERT INTO `oauth_access_tokens` VALUES ('05dc04d5b4463ba72e0813870fd68cfa4a7a2bee','admin','timetrackerWssEuXCP','2014-09-05 19:56:13','default'),('088f330832bb84945f93dad3402853bce8b758e9','gabriel','timetrackerWssEuXCP','2014-09-05 18:51:13','default'),('08da103f81f04c921d1284f5012a7503fafa582d','admin','timetrackerWssEuXCP','2014-09-04 17:47:53','default'),('0c9997c17a2b68a018627801916e5dd7f5742da1','admin','timetrackerWssEuXCP','2014-08-28 14:46:08','default'),('112b3ab14cb644374e68585af44cd6176e176378','admin','timetrackerWssEuXCP','2014-09-04 06:31:06','default'),('1c37eb4fc2fcc5f74823a133d875cd408505293f','admin','timetrackerWssEuXCP','2014-09-04 06:00:28','default'),('2f8af3b34f98dcaf82a5689b592bcd16b9983029','admin','timetrackerWssEuXCP','2014-08-28 14:43:00','default'),('2fd52e0b62958c26ab2ff2bbaf6c51b47de6e066','gabriel','timetrackerWssEuXCP','2014-09-05 18:46:05','default'),('346fadf435023b61788706c7f750a74aaef3eb4e','gabriel3','timetrackerWssEuXCP','2014-09-05 23:06:09','default'),('3809278336ce3619ed08326d1c453baab95624ac','admin','timetrackerWssEuXCP','2014-09-05 01:34:04','default'),('41a7adf5a65da9398f0a6ea8094b33e3864ca8ba','admin','timetrackerWssEuXCP','2014-09-04 18:24:03','default'),('48667a262e2e117ef74faa19d1d8efbe307450e5','admin','timetrackerWssEuXCP','2014-08-28 15:01:26','default'),('509c3e379f6d2cf8b02b45b4b65ba6c24731596b','gabriel6','timetrackerWssEuXCP','2014-09-05 23:24:11','default'),('53cf3f9dde1fb877dfc6b5719ae07f9a2a409d02','admin','timetrackerWssEuXCP','2014-09-03 13:27:56','default'),('559b6b15785ab8fff08439575763491ff837bb89','admin','timetrackerWssEuXCP','2014-08-28 15:03:41','default'),('61509e7859b1735b484e2c5dd58c8b663d787636','admin','timetrackerWssEuXCP','2014-09-03 13:23:09','default'),('61cc8d1e734f84519b3d4e8ea1f092886b26c1e1','gabriel5','timetrackerWssEuXCP','2014-09-05 23:17:30','default'),('68bc177fc75133dc0035f8a5f43698969dfcff0d','admin','timetrackerWssEuXCP','2014-09-03 22:31:48','default'),('6b26be63ed4f9c24009253b61fe4a4696177bbae','johnyenglish','timetrackerWssEuXCP','2014-09-04 23:16:35','default'),('6cf75304f87e2bb1f7a4c05c31e22e68daae36a4','admin','timetrackerWssEuXCP','2014-08-28 14:41:50','default'),('78f9b13cd50b44ed8962baddcd576eb91cb7ad71','admin','timetrackerWssEuXCP','2014-09-04 21:47:43','default'),('796babd1e36dcc32f65b24ac948c218503260611','admin','timetrackerWssEuXCP','2014-08-28 16:05:32','default'),('7b349c10235e3e9d2103eddcb5a153fa2768f1aa','admin','timetrackerWssEuXCP','2014-08-28 15:06:01','default'),('8148705df6c01b6c21e1776b969cb3e15638b574','admin','timetrackerWssEuXCP','2014-08-28 14:40:23','default'),('8156d4a6d1f44af37d394630fa416a48953dbb6d','admin','timetrackerWssEuXCP','2014-09-04 07:19:03','default'),('8da76d41aed5eb563db0d6804d1b8ed22ae22a9b','admin','timetrackerWssEuXCP','2014-09-04 22:03:09','default'),('9cafda8b21fce7e3d6451ac93a7bae560859150f','admin','timetrackerWssEuXCP','2014-08-28 15:11:35','default'),('9f76ad09bb5f2fee5c2d41f60e9193ab570d5d17','admin','timetrackerWssEuXCP','2014-09-04 06:51:54','default'),('9f7be7bbbec1ed04597cc13984bef857ac467cb5','admin','timetrackerWssEuXCP','2014-08-28 15:47:18','default'),('ace82de56f2cf8c6903f1e636d69f5035cd1a636','gabriel5','timetrackerWssEuXCP','2014-09-05 23:18:46','default'),('b0a40ce92d63fc7998890ed62d70a51a9bf2f04e','admin','timetrackerWssEuXCP','2014-09-03 17:49:00','default'),('b7334077ad55edd66bdcc47cb08d93f90d0181d0','gabriel5','timetrackerWssEuXCP','2014-09-05 23:17:52','default'),('b8fdbdc7197888f9cdc25dd3c3114be8b5927a1b','admin','timetrackerWssEuXCP','2014-09-05 02:36:23','default'),('bdc726b252b597761ddb88cca4c89e0cc3025b2f','admin','timetrackerWssEuXCP','2014-08-28 14:59:57','default'),('c0d19444295409c203e229ddc602018dd78638bc','gabriel2','timetrackerWssEuXCP','2014-09-05 21:04:48','default'),('c1e468f2fe42c365023672c3cfc6dcda8c3f6f82','admin','timetrackerWssEuXCP','2014-09-04 02:41:01','default'),('c72b87bdb8bb48eba59ba90f78492100b254a8ea','gabriel3','timetrackerWssEuXCP','2014-09-05 22:00:03','default'),('ccd5defa4256189b8be15f29b3b5f36733b29ebf','admin','timetrackerWssEuXCP','2014-08-28 15:13:31','default'),('d17b9028fd5141170a513c27be773a8038d40ba5','admin','timetrackerWssEuXCP','2014-09-03 13:21:26','default'),('d1a71655fd0dc1b84e983e815aba5dcd399985c7','admin','timetrackerWssEuXCP','2014-09-05 00:27:05','default'),('dc03f2bb09568469b536dbfa8b125dde43c5571d','admin','timetrackerWssEuXCP','2014-09-04 18:49:27','default'),('de5aca1f322c8b80b25b47a0aa32432b9bd77510','admin','timetrackerWssEuXCP','2014-09-05 18:39:32','default'),('e09bb86cfd0108684f52a176a21158716adb8d05','admin','timetrackerWssEuXCP','2014-08-28 14:43:51','default'),('ed874d4fad50ee8665c65818832a307629b0dfd9','admin','timetrackerWssEuXCP','2014-09-04 17:22:07','default'),('ee3af4e942dc8e41d73fc2833c6293ff65fa967f','admin','timetrackerWssEuXCP','2014-08-28 14:37:41','default'),('f2549b26b50cd0ee37a895bf7215999d72c6b4c5','danny','timetrackerWssEuXCP','2014-10-08 12:04:07','default'),('f95d6da52abf0f8d367945aea3ef06d3fea2edab','admin','timetrackerWssEuXCP','2014-08-28 15:18:29','default'),('fd6a0a93611ba7a2429fe3d5e62bfa34077ca2d1','admin','timetrackerWssEuXCP','2014-09-04 06:03:50','default'),('ff283f46e8bc4c624e8bdf0c3b9b1fa348145b20','admin','timetrackerWssEuXCP','2014-09-05 14:21:26','default');
/*!40000 ALTER TABLE `oauth_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_authorization_codes`
--

DROP TABLE IF EXISTS `oauth_authorization_codes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_authorization_codes` (
  `authorization_code` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `client_client_id` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `redirect_uri` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expire` datetime NOT NULL,
  `scope` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_token` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`authorization_code`),
  KEY `IDX_98A471C4F2CBB92E` (`client_client_id`),
  KEY `IDX_98A471C4A76ED395` (`user_id`),
  CONSTRAINT `FK_98A471C4A76ED395` FOREIGN KEY (`user_id`) REFERENCES `oauth_users` (`username`),
  CONSTRAINT `FK_98A471C4F2CBB92E` FOREIGN KEY (`client_client_id`) REFERENCES `oauth_clients` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_authorization_codes`
--

LOCK TABLES `oauth_authorization_codes` WRITE;
/*!40000 ALTER TABLE `oauth_authorization_codes` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_authorization_codes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_clients`
--

DROP TABLE IF EXISTS `oauth_clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_clients` (
  `client_id` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `client_secret` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `redirect_uri` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `grant_types` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `scope` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_clients`
--

LOCK TABLES `oauth_clients` WRITE;
/*!40000 ALTER TABLE `oauth_clients` DISABLE KEYS */;
INSERT INTO `oauth_clients` VALUES ('timetrackerWssEuXCP','','/oauth/receivecode','password','default');
/*!40000 ALTER TABLE `oauth_clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_jwt`
--

DROP TABLE IF EXISTS `oauth_jwt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_jwt` (
  `client_id` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_key` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_jwt`
--

LOCK TABLES `oauth_jwt` WRITE;
/*!40000 ALTER TABLE `oauth_jwt` DISABLE KEYS */;
/*!40000 ALTER TABLE `oauth_jwt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_refresh_tokens`
--

DROP TABLE IF EXISTS `oauth_refresh_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_refresh_tokens` (
  `refresh_token` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_id` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `expires` datetime NOT NULL,
  `scope` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`refresh_token`),
  KEY `IDX_5AB687A76ED395` (`user_id`),
  KEY `IDX_5AB68719EB6921` (`client_id`),
  CONSTRAINT `FK_5AB68719EB6921` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`client_id`),
  CONSTRAINT `FK_5AB687A76ED395` FOREIGN KEY (`user_id`) REFERENCES `oauth_users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_refresh_tokens`
--

LOCK TABLES `oauth_refresh_tokens` WRITE;
/*!40000 ALTER TABLE `oauth_refresh_tokens` DISABLE KEYS */;
INSERT INTO `oauth_refresh_tokens` VALUES ('0182296b26b53b144c344ae0e2b03e3310057d67','admin','timetrackerWssEuXCP','2014-09-18 16:22:07','default'),('0820cd6b0e943da7eaac090dd40d302b7a29d99d','gabriel','timetrackerWssEuXCP','2014-09-19 17:46:05','default'),('11379a2b5efc76511a66798ad8c2f3a13bd4dc1e','admin','timetrackerWssEuXCP','2014-09-11 13:43:51','default'),('122a8d219836620b69989dc86b27e5d5f6cff9dd','admin','timetrackerWssEuXCP','2014-09-19 00:34:04','default'),('141341f34a11d6d5aa5c49139a2c94fe9a8dbd43','admin','timetrackerWssEuXCP','2014-09-11 13:43:00','default'),('196af7a526740a4464a3cc11d764b14c7faf8e2e','admin','timetrackerWssEuXCP','2014-09-17 21:31:48','default'),('1a51f5929869e4cbdda61886a215ec620f6a6400','admin','timetrackerWssEuXCP','2014-09-17 12:21:26','default'),('1f558b4899bbc16eaad557d1db14b8c48f2fc0ee','admin','timetrackerWssEuXCP','2014-09-19 18:56:13','default'),('25ad0b2da3bc965e3948d4cf1c94690ceb7a9d32','gabriel3','timetrackerWssEuXCP','2014-09-19 21:00:03','default'),('2652663c5c3913acdfa65b149fba1375bc6e06e5','johnyenglish','timetrackerWssEuXCP','2014-09-18 22:16:35','default'),('28bd7a99b874679792c50540afb0301aa1c63bb7','danny','timetrackerWssEuXCP','2014-10-22 11:04:07','default'),('3606be7d53b02d7a072808301ca3555a4155cf69','gabriel2','timetrackerWssEuXCP','2014-09-19 20:04:48','default'),('37d28bc473b191789c3297199c79f6011423d267','admin','timetrackerWssEuXCP','2014-09-18 16:47:53','default'),('38c275bfdbccb45aaf4204f4d07f8565c0574514','admin','timetrackerWssEuXCP','2014-09-18 05:31:06','default'),('3cce4569ed8a7fb99e3fea2ece12e144ce34fed2','gabriel6','timetrackerWssEuXCP','2014-09-19 22:24:11','default'),('4189f5ccc8dd17b70a3db8d41b30895ffa9b209f','gabriel','timetrackerWssEuXCP','2014-09-19 17:51:13','default'),('52b480323f1c891bd6fd14d62102ed1d808ecb59','admin','timetrackerWssEuXCP','2014-09-11 14:06:01','default'),('57cc3fa1437041d482fb7c8515a67cb17a0a685a','gabriel3','timetrackerWssEuXCP','2014-09-19 22:06:09','default'),('5f63f6dcde0b1d61ad7c899dde2c23e01936d1e9','gabriel5','timetrackerWssEuXCP','2014-09-19 22:18:46','default'),('78da96b0a43d08a6e70b421315055247d12172f9','admin','timetrackerWssEuXCP','2014-09-18 01:41:01','default'),('8897b355fd73c4080ae3e646104b3f3e238cc409','admin','timetrackerWssEuXCP','2014-09-11 15:05:32','default'),('89406a12b961f86a50ef40ddb4774b2e51a7b60b','admin','timetrackerWssEuXCP','2014-09-18 06:19:03','default'),('97f6b984da8b366ffb9798d74174feca1785295b','admin','timetrackerWssEuXCP','2014-09-11 14:13:31','default'),('98d41ae6b0155e10522a7f6ab143ad842b8dcf9d','admin','timetrackerWssEuXCP','2014-09-19 01:36:23','default'),('a06ded8e0520125cd87d7b7b9a63ad876bc1117b','admin','timetrackerWssEuXCP','2014-09-18 05:00:28','default'),('a4ebf5a7857c1807e2ecc0c84644e3022924c6bb','admin','timetrackerWssEuXCP','2014-09-18 23:27:05','default'),('a5b816155c6f99c956e46ed01f60ca9a3e555cad','admin','timetrackerWssEuXCP','2014-09-11 14:01:26','default'),('ac3fcb050be4f159a94b48a786ed8756a303d54e','admin','timetrackerWssEuXCP','2014-09-18 21:03:09','default'),('af8a1b9d3979dc1df3792bf6ad3d0c6941e91b1d','admin','timetrackerWssEuXCP','2014-09-11 13:46:08','default'),('b00df3f445d29cb2435a320c91857c3dc0104b8a','admin','timetrackerWssEuXCP','2014-09-17 16:49:00','default'),('b9fdbf30dced6e4d9d9cd489cca35a99ba565956','admin','timetrackerWssEuXCP','2014-09-19 13:21:26','default'),('c0181c1c219ca77d29e71a2e05f98dab01c752d7','admin','timetrackerWssEuXCP','2014-09-18 05:03:50','default'),('c348f246279ebd5b9c4137468eac95401f85f4ae','admin','timetrackerWssEuXCP','2014-09-17 12:23:09','default'),('c5e97b8968879a1e316ece220fd6e2d3d5be3cf5','admin','timetrackerWssEuXCP','2014-09-11 14:03:41','default'),('c5f5fda46c5390dc35324ab89f5a194b6e270038','gabriel5','timetrackerWssEuXCP','2014-09-19 22:17:52','default'),('ca73a9edf7af6045433661e4294196db31e69aab','admin','timetrackerWssEuXCP','2014-09-11 14:11:35','default'),('cb2eb8aea4893a97719799c353498b4c310ba0fb','admin','timetrackerWssEuXCP','2014-09-18 17:24:03','default'),('ce3c9991c8981835f0eef1a079e23681bf1e3914','admin','timetrackerWssEuXCP','2014-09-11 14:47:18','default'),('d7adfaeadccb19a8af01e99aa5a4d4c551ae4075','admin','timetrackerWssEuXCP','2014-09-19 17:39:32','default'),('db5bd3fd7e395180f002c7327881dfe9c69db2f8','gabriel5','timetrackerWssEuXCP','2014-09-19 22:17:30','default'),('e0155def356e90a6a32253af139ff047c9a13384','admin','timetrackerWssEuXCP','2014-09-18 17:49:27','default'),('f01dafee7f63788ed620ed9e819f9a9c2b4c9c1f','admin','timetrackerWssEuXCP','2014-09-11 14:18:45','default'),('f080d3e50772de5f1677872d0b6b8364395e9fdc','admin','timetrackerWssEuXCP','2014-09-18 05:51:54','default'),('f579d6c4b2591cdcd6f2006970c1e75a316e5bf0','admin','timetrackerWssEuXCP','2014-09-11 13:59:57','default'),('f762f3dfdf349e1785349dbd84a19d89e5619435','admin','timetrackerWssEuXCP','2014-09-17 12:27:56','default'),('fd6e47a74c8e1a8caa34fe56599a16ef45359ca5','admin','timetrackerWssEuXCP','2014-09-18 20:47:43','default');
/*!40000 ALTER TABLE `oauth_refresh_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_scopes`
--

DROP TABLE IF EXISTS `oauth_scopes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_scopes` (
  `id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `scope` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_default` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6EE3C02819EB6921` (`client_id`),
  CONSTRAINT `FK_6EE3C02819EB6921` FOREIGN KEY (`client_id`) REFERENCES `oauth_clients` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_scopes`
--

LOCK TABLES `oauth_scopes` WRITE;
/*!40000 ALTER TABLE `oauth_scopes` DISABLE KEYS */;
INSERT INTO `oauth_scopes` VALUES ('default','timetrackerWssEuXCP','default','default',1);
/*!40000 ALTER TABLE `oauth_scopes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oauth_users`
--

DROP TABLE IF EXISTS `oauth_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oauth_users` (
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `day_length` int(11) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oauth_users`
--

LOCK TABLES `oauth_users` WRITE;
/*!40000 ALTER TABLE `oauth_users` DISABLE KEYS */;
INSERT INTO `oauth_users` VALUES ('123098','$2y$10$cFVqeBCW4CjQ3QhhFzKoKO7txy0K2sZMRMcs0ycNnyGlb8PsYewVy',NULL,NULL,NULL),('admin','$2y$10$jQpoK/J4WA9Rq2k38fvXwuyCDxKtQJs4SrhiJHuMeQQF1yozkG7X2','Gabriel','Somoza',6),('danny','$2y$10$Stu5Ohcv7ZxEtauTHMGrsOU6JVBRqCtlM6dCRrsIT.XVgu3vvdirq',NULL,NULL,NULL),('gabriel','$2y$10$iIoWmp91LBDka2TCwfO6fegzLcsTE79rCcdiflqrIH.8QRHggYyBm',NULL,NULL,7),('gabriel2','$2y$10$fNOAlnRSanZAp2l4vRXDIuY79C6LaQsALT2/c1xLf61mt9gckepM6',NULL,NULL,NULL),('gabriel3','$2y$10$Hw7fg8YH7jZN.FdceieMLuuSNbaaBKFZlyBEFuL6U2drNhlv5HT/O','Gabriel','Somoza',3),('gabriel4','$2y$10$Hw7fg8YH7jZN.FdceieMLuuSNbaaBKFZlyBEFuL6U2drNhlv5HT/O',NULL,NULL,NULL),('gabriel5','$2y$10$a0lqakJYNEFlTHpodmJhRuxX6.cp4Qf2PxiWtimBpmMc0WWdy3BzS','Gabriel','Somoza',3),('gabriel6','$2y$10$a0lqakJYNEFlTHpodmJhRunNjjg.CInlv5kWdP8f1F/byRoPFnWW6',NULL,NULL,NULL),('johnyenglish','$2y$10$nZRbmsMC5lcw6RdUNvXqg.PR4rtI9OZR66iPxY6okChm2f3vI.iZe',NULL,NULL,NULL);
/*!40000 ALTER TABLE `oauth_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worklogs`
--

DROP TABLE IF EXISTS `worklogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `worklogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` double NOT NULL,
  `date` date NOT NULL,
  `notes` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `IDX_C78A883AA76ED395` (`user_id`),
  CONSTRAINT `FK_C78A883AA76ED395` FOREIGN KEY (`user_id`) REFERENCES `oauth_users` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worklogs`
--

LOCK TABLES `worklogs` WRITE;
/*!40000 ALTER TABLE `worklogs` DISABLE KEYS */;
INSERT INTO `worklogs` VALUES (16,'admin',3,'2014-09-02','THAT'),(36,'johnyenglish',2,'2014-09-04','TEST'),(37,'johnyenglish',2,'2014-09-04','Tranquil'),(38,'admin',3,'2014-09-05','TEST'),(39,'admin',2,'2014-09-05','OH NOO'),(40,'admin',5,'2014-09-05','OVERAGE'),(41,'admin',2,'2014-09-05','WORK'),(42,'admin',4,'2014-09-04','FINISHED'),(43,'gabriel',2,'2014-09-05','Interview'),(45,'gabriel',3,'2014-09-05','TEST'),(46,'gabriel',7,'2014-09-05','TEST2'),(47,'gabriel',2,'2014-09-05','TEST3'),(48,'gabriel',3,'2014-09-04','TEST4'),(49,'admin',5,'2014-09-04','TEST2'),(50,'admin',1,'2014-09-05','TEST'),(51,'admin',1,'2014-09-05','TEST'),(52,'admin',1,'2014-09-05','TRSD'),(53,'admin',1,'2014-09-05','TEST'),(62,'admin',1,'2014-09-05','fdsaf'),(63,'admin',2,'2014-09-05','dfa'),(64,'gabriel2',1,'2014-09-05','sdf'),(65,'gabriel2',1,'2014-09-05','sd'),(66,'gabriel2',1,'2014-09-05','asdf'),(67,'gabriel2',1,'2014-09-05','df'),(68,'gabriel2',1,'2014-09-05','sdf'),(69,'gabriel2',1,'2014-09-05','TEST'),(70,'gabriel2',3,'2014-09-05','STG'),(71,'gabriel2',3,'2014-09-05','SF'),(72,'gabriel2',2,'2014-09-05','SF'),(74,'gabriel2',12,'2014-09-03','TEST'),(75,'gabriel3',2,'2014-09-05','TEST'),(77,'gabriel3',3,'2014-09-05','AWTQ'),(78,'gabriel3',3,'2014-09-05','TEST'),(79,'gabriel3',3,'2014-09-05','TEST'),(80,'gabriel3',12,'2014-09-01','TEST'),(81,'gabriel3',2.5,'2014-09-05','ASF'),(82,'gabriel3',3,'2014-09-05','TEST'),(83,'danny',3,'2014-10-08','Meeting'),(84,'danny',2.5,'2014-10-08','TEST'),(85,'danny',4,'2014-09-08','Another meeting');
/*!40000 ALTER TABLE `worklogs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-11-25 17:30:44
