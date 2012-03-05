-- MySQL dump 10.13  Distrib 5.1.41, for debian-linux-gnu (i486)
--
-- Host: localhost    Database: photoquest
-- ------------------------------------------------------
-- Server version	5.1.41-3ubuntu12

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
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `c_date` datetime NOT NULL,
  `c_text` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,5,8,'0000-00-00 00:00:00','adsasas'),(2,5,8,'0000-00-00 00:00:00','dada'),(3,5,8,'2011-12-07 10:34:11','dadaddd'),(4,5,8,'2011-12-07 10:58:31','raz\ndwa\ntri &lt;b&gt;dasadas&lt;/b&gt;'),(5,5,8,'2011-12-07 11:00:43','ffddff'),(6,5,8,'2011-12-07 11:00:44','ffddff'),(7,5,8,'2011-12-07 11:00:45','ffddff'),(8,5,8,'2011-12-07 11:06:12','ha de'),(9,5,8,'2011-12-07 11:06:42','бреее'),(10,5,8,'2011-12-07 11:06:59','asda'),(11,5,8,'2011-12-07 11:07:57','asda'),(12,5,8,'2011-12-07 11:08:41','fff'),(13,5,8,'2011-12-07 11:09:23','fggg'),(14,5,8,'2011-12-07 11:10:15','tralalla'),(15,5,8,'2011-12-07 11:11:05','dddsa'),(16,5,8,'2011-12-07 11:14:21','raz'),(17,5,7,'2011-12-07 11:15:18','хоп троп'),(18,5,12,'2011-12-07 18:37:06','ha de'),(19,7,12,'2011-12-08 19:16:47','har har gar'),(20,7,12,'2011-12-08 19:17:00','har har gar'),(21,7,12,'2011-12-08 19:17:43','har har gar'),(22,5,19,'2011-12-18 21:06:21','Цветето има зъби?'),(23,6,19,'2011-12-18 22:56:52','То май се води кактус :) Трябва да може да оцелява :DDD'),(24,6,18,'2011-12-18 22:57:49','Само й липсват на колата очи и уста и е готова като от Колите :D :D :D'),(25,9,19,'2011-12-19 13:05:38','Посегнеш да го погалиш и те изяжда :D'),(26,11,20,'2011-12-19 23:57:14',''),(27,11,20,'2011-12-19 23:57:19',''),(28,6,25,'2012-01-25 23:48:59','Това е една мноого крийпи снимка :PPP'),(29,5,26,'2012-01-26 08:18:12','Уау, от къде е това?'),(30,6,26,'2012-01-26 09:14:53','На пролет на Борущица :) На мама цветята :)'),(31,5,26,'2012-01-26 09:17:27','Еее, ама трябва снимката днес да си я правила :Р '),(32,6,26,'2012-01-26 09:20:19','Ех... това ми беше като някаква grey area  на правилата :P Но добре де... няма повече :}');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exif`
--

DROP TABLE IF EXISTS `exif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exif` (
  `p_id` int(11) NOT NULL,
  `e_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `e_value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `e_raw_value` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  KEY `p_id` (`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exif`
--

LOCK TABLES `exif` WRITE;
/*!40000 ALTER TABLE `exif` DISABLE KEYS */;
INSERT INTO `exif` VALUES (18,'camera','Canon EOS DIGITAL REBEL XSi','Canon EOS DIGITAL REBEL XSi'),(18,'iso','200','200'),(18,'shutter','1/125','0.008'),(18,'aperture','8','8'),(18,'focal','10','10'),(17,'camera','DMC-FZ28','DMC-FZ28'),(17,'iso','100','100'),(17,'shutter','1','1'),(17,'aperture','2.8','2.8'),(17,'focal','4.8','4.8'),(16,'camera','Canon EOS DIGITAL REBEL XSi','Canon EOS DIGITAL REBEL XSi'),(16,'iso','200','200'),(16,'shutter','1/160','0.00625'),(16,'aperture','10','10'),(16,'focal','22','22'),(15,'camera','Canon EOS DIGITAL REBEL XSi','Canon EOS DIGITAL REBEL XSi'),(15,'iso','800','800'),(15,'shutter','1/20','0.05'),(15,'aperture','5','5'),(15,'focal','44','44'),(13,'camera','NIKON D80','NIKON D80'),(13,'iso','100','100'),(13,'shutter','8','8'),(13,'aperture','9','9'),(13,'focal','200','200'),(14,'camera','Canon EOS DIGITAL REBEL XSi','Canon EOS DIGITAL REBEL XSi'),(14,'iso','400','400'),(14,'shutter','0.6','0.6'),(14,'aperture','5.6','5.6'),(14,'focal','70','70'),(19,'camera','DMC-FZ28','DMC-FZ28'),(19,'iso','160','160'),(19,'shutter','1/30','0.033333333333333'),(19,'aperture','3','3'),(19,'focal','6.1','6.1'),(20,'camera','Canon EOS 1000D','Canon EOS 1000D'),(20,'iso','100','100'),(20,'shutter','4','4'),(20,'aperture','3.5','3.5'),(20,'focal','22','22'),(21,'camera','Canon EOS DIGITAL REBEL XSi','Canon EOS DIGITAL REBEL XSi'),(21,'iso','200','200'),(21,'shutter','10','10'),(21,'aperture','10','10'),(21,'focal','30','30'),(22,'camera','DMC-FZ28','DMC-FZ28'),(22,'iso','400','400'),(22,'shutter','1/15','0.066666666666667'),(22,'aperture','2.8','2.8'),(22,'focal','4.8','4.8'),(23,'camera','Canon EOS DIGITAL REBEL XSi','Canon EOS DIGITAL REBEL XSi'),(23,'iso','800','800'),(23,'shutter','0.6','0.6'),(23,'aperture','3.5','3.5'),(23,'focal','10','10'),(24,'camera','LGP500','LGP500'),(24,'iso','unknown','unknown'),(24,'shutter','unknown','unknown'),(24,'aperture','unknown','unknown'),(24,'focal','4.31','4.31'),(25,'camera','LGP500','LGP500'),(25,'iso','unknown','unknown'),(25,'shutter','unknown','unknown'),(25,'aperture','unknown','unknown'),(25,'focal','4.31','4.31'),(26,'camera','DMC-FZ28','DMC-FZ28'),(26,'iso','100','100'),(26,'shutter','1/320','0.003125'),(26,'aperture','3.2','3.2'),(26,'focal','8.7','8.7'),(28,'camera','LGP500','LGP500'),(28,'iso','unknown','unknown'),(28,'shutter','unknown','unknown'),(28,'aperture','unknown','unknown'),(28,'focal','4.31','4.31'),(58,'camera','Canon EOS DIGITAL REBEL XSi','Canon EOS DIGITAL REBEL XSi'),(58,'iso','200','200'),(58,'shutter','1/250','0.004'),(58,'aperture','13','13'),(58,'focal','22','22');
/*!40000 ALTER TABLE `exif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `q_id` int(11) NOT NULL,
  `p_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_date` datetime NOT NULL,
  `p_active` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  `p_image` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `p_exif_camera` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `p_exif_shutter` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `p_exif_shutter_real` float NOT NULL,
  `p_exif_iso` int(11) NOT NULL,
  `p_exif_aperture` float NOT NULL,
  `p_exif_focal` int(11) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=MyISAM AUTO_INCREMENT=59 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (18,5,14,'Wartburg 353','2011-12-18 11:56:58','Y','da0d5244f5656389d6ecd8ed0d70b784','','',0,0,0,0),(17,6,9,'Lights','2011-12-13 18:33:40','Y','a57ea73779b39f0be054d71b5ca09135','','',0,0,0,0),(16,5,7,'At the lake','2011-12-11 13:51:36','Y','65d90efb0f8d020e5ff3a12cf30d509d','','',0,0,0,0),(15,5,6,'Yummy','2011-12-10 23:54:04','Y','e9063653850e1deb914595c6335016b1','','',0,0,0,0),(13,9,4,'EXTERMINATE!!!','2011-12-08 21:14:31','Y','16bc38b8e66e20d59f02630bf6f22a73','','',0,0,0,0),(14,5,5,'Sugar cube','2011-12-09 17:38:36','Y','ccea679db291990adc731ecdef0176ab','','',0,0,0,0),(19,6,14,'Flower','2011-12-18 16:38:04','Y','db56033a8747eb49529226ed18ab9de0','','',0,0,0,0),(20,11,15,'Christmas','2011-12-19 23:57:10','Y','7cc0872a5200010a46965e2e4bc65e76','','',0,0,0,0),(21,5,16,'Starsies','2011-12-20 21:29:36','Y','07e8a3f01794f15482361a1234f71bc9','','',0,0,0,0),(22,6,19,'Eggs','2011-12-23 22:56:50','Y','2af63ab703792e8a3eed91c81e9a4ef1','','',0,0,0,0),(23,5,23,'Terra incognita','2011-12-27 23:31:56','Y','e1f2d42b70ae65bdf8e2f40b389346af','','',0,0,0,0),(24,5,24,'h2o','2011-12-28 16:21:53','Y','11e0c568c4c8e35d842a09f510c52960','','',0,0,0,0),(25,5,48,'Awwwww','2012-01-23 09:03:36','Y','53d8c544a231b3bf30f63d6076d2ce62','','',0,0,0,0),(26,6,49,'Nuances','2012-01-25 23:46:05','Y','dcef1df73253ab083bd1c06310795ce1','','',0,0,0,0),(28,5,60,'Icicles','2012-02-09 09:26:42','Y','077e22487cadc3e8226547c9ea66359a','','',0,0,0,0),(58,5,84,'White hat','2012-03-04 22:01:59','Y','e1e707fa1000a6f8d36afccdf9c75926','','',0,0,0,0);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos_seq`
--

DROP TABLE IF EXISTS `photos_seq`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos_seq` (
  `id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos_seq`
--

LOCK TABLES `photos_seq` WRITE;
/*!40000 ALTER TABLE `photos_seq` DISABLE KEYS */;
INSERT INTO `photos_seq` VALUES (58);
/*!40000 ALTER TABLE `photos_seq` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quests`
--

DROP TABLE IF EXISTS `quests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quests` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `q_date` date NOT NULL,
  `qpt_id` int(11) NOT NULL,
  PRIMARY KEY (`q_id`),
  KEY `qpt_id` (`qpt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quests`
--

LOCK TABLES `quests` WRITE;
/*!40000 ALTER TABLE `quests` DISABLE KEYS */;
INSERT INTO `quests` VALUES (1,'2011-12-06',171),(2,'2011-12-05',412),(3,'2011-12-07',111),(4,'2011-12-08',1099),(5,'2011-12-09',1107),(6,'2011-12-10',1129),(7,'2011-12-11',1134),(8,'2011-12-12',1144),(9,'2011-12-13',1179),(10,'2011-12-14',1189),(11,'2011-12-15',1203),(12,'2011-12-16',1230),(13,'2011-12-17',1245),(14,'2011-12-18',1262),(15,'2011-12-19',1325),(16,'2011-12-20',1359),(17,'2011-12-21',1361),(18,'2011-12-22',1376),(19,'2011-12-23',1412),(20,'2011-12-24',1382),(21,'2011-12-25',1413),(22,'2011-12-26',1419),(23,'2011-12-27',994),(24,'2011-12-28',1172),(25,'2011-12-29',1090),(26,'2012-01-01',856),(27,'2012-01-02',879),(28,'2012-01-03',923),(29,'2012-01-04',927),(30,'2012-01-05',982),(31,'2012-01-06',1019),(32,'2012-01-07',1068),(33,'2012-01-08',1094),(34,'2012-01-09',1116),(35,'2012-01-10',1128),(36,'2012-01-11',1138),(37,'2012-01-12',1149),(38,'2012-01-13',1160),(39,'2012-01-14',1187),(40,'2012-01-15',1205),(41,'2012-01-16',1235),(42,'2012-01-17',1246),(43,'2012-01-18',1281),(44,'2012-01-19',1285),(45,'2012-01-20',1355),(46,'2012-01-21',1370),(47,'2012-01-22',1374),(48,'2012-01-23',1411),(49,'2012-01-25',1416),(50,'2012-01-26',1418),(51,'2012-01-31',1415),(52,'2012-02-01',850),(53,'2012-02-02',872),(54,'2012-02-03',912),(55,'2012-02-04',930),(56,'2012-02-05',969),(57,'2012-02-06',1036),(58,'2012-02-07',1061),(59,'2012-02-08',1096),(60,'2012-02-09',1103),(61,'2012-02-10',1126),(62,'2012-02-11',1139),(63,'2012-02-12',1152),(64,'2012-02-13',1171),(65,'2012-02-14',1181),(66,'2012-02-15',1196),(67,'2012-02-16',1244),(68,'2012-02-17',1247),(69,'2012-02-18',1253),(70,'2012-02-19',1322),(71,'2012-02-20',1360),(72,'2012-02-21',1367),(73,'2012-02-22',1384),(74,'2012-02-23',1395),(75,'2012-02-24',997),(76,'2012-02-25',1414),(77,'2012-02-26',1417),(78,'2012-02-27',1022),(79,'2012-02-28',1026),(80,'2012-02-29',881),(81,'2012-03-01',848),(82,'2012-03-02',884),(83,'2012-03-03',925),(84,'2012-03-04',937),(85,'2012-03-05',980),(86,'2012-03-06',1017);
/*!40000 ALTER TABLE `quests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quests_possible_topics`
--

DROP TABLE IF EXISTS `quests_possible_topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `quests_possible_topics` (
  `qpt_id` int(11) NOT NULL AUTO_INCREMENT,
  `qpt_topic` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qpt_letter` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `qpt_suggested_by` int(11) NOT NULL,
  `qpt_date_selected` date NOT NULL,
  `qpt_approved` enum('Y','N') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`qpt_id`),
  UNIQUE KEY `qpt_topic` (`qpt_topic`)
) ENGINE=MyISAM AUTO_INCREMENT=1422 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quests_possible_topics`
--

LOCK TABLES `quests_possible_topics` WRITE;
/*!40000 ALTER TABLE `quests_possible_topics` DISABLE KEYS */;
INSERT INTO `quests_possible_topics` VALUES (111,'give','g',0,'2011-12-07','Y'),(1421,'icicle','i',5,'0000-00-00','Y'),(1419,'zoo','z',0,'2011-12-26','Y'),(1418,'zone','z',0,'2012-01-26','Y'),(1417,'zero','z',0,'2012-02-26','Y'),(1416,'yellow','y',0,'2012-01-25','Y'),(1415,'young','y',0,'2012-01-31','Y'),(1414,'yes','y',0,'2012-02-25','Y'),(1413,'yard','y',0,'2011-12-25','Y'),(1412,'wrong','w',0,'2011-12-23','Y'),(1411,'wreck','w',0,'2012-01-23','Y'),(1410,'wood','w',0,'0000-00-00','Y'),(1409,'wonderful','w',0,'0000-00-00','Y'),(1408,'witness','w',0,'0000-00-00','Y'),(1407,'within','w',0,'0000-00-00','Y'),(1406,'witch','w',0,'0000-00-00','Y'),(1405,'win','w',0,'0000-00-00','Y'),(1404,'wisdom','w',0,'0000-00-00','Y'),(1403,'winter','w',0,'0000-00-00','Y'),(1402,'window','w',0,'0000-00-00','Y'),(1401,'wild','w',0,'0000-00-00','Y'),(1400,'wide','w',0,'0000-00-00','Y'),(1399,'welfare','w',0,'0000-00-00','Y'),(1398,'weird','w',0,'0000-00-00','Y'),(1397,'weight','w',0,'0000-00-00','Y'),(1396,'weather','w',0,'0000-00-00','Y'),(171,'find','f',0,'2011-12-06','Y'),(1395,'weakness','w',0,'2012-02-23','Y'),(1394,'wave','w',0,'0000-00-00','Y'),(1393,'water','w',0,'0000-00-00','Y'),(1392,'waste','w',0,'0000-00-00','Y'),(1391,'warning','w',0,'0000-00-00','Y'),(1390,'warm','w',0,'0000-00-00','Y'),(1389,'whole','w',0,'0000-00-00','Y'),(1388,'white','w',0,'0000-00-00','Y'),(1387,'walk','w',0,'0000-00-00','Y'),(1386,'vulnerable','v',0,'0000-00-00','Y'),(1385,'vitality','v',0,'0000-00-00','Y'),(1384,'visible','v',0,'2012-02-22','Y'),(1383,'violin','v',0,'0000-00-00','Y'),(1382,'violet','v',0,'2011-12-24','Y'),(1381,'violence','v',0,'0000-00-00','Y'),(1380,'view','v',0,'0000-00-00','Y'),(1379,'victory','v',0,'0000-00-00','Y'),(1378,'vibrant','v',0,'0000-00-00','Y'),(1377,'versatile','v',0,'0000-00-00','Y'),(1376,'velvet','v',0,'2011-12-22','Y'),(1375,'variety','v',0,'0000-00-00','Y'),(1374,'vacant','v',0,'2012-01-22','Y'),(1373,'usual','u',0,'0000-00-00','Y'),(1372,'urban','u',0,'0000-00-00','Y'),(1371,'upset','u',0,'0000-00-00','Y'),(1370,'unlimited','u',0,'2012-01-21','Y'),(1369,'universe','u',0,'0000-00-00','Y'),(1368,'union','u',0,'0000-00-00','Y'),(1367,'unity','u',0,'2012-02-21','Y'),(1366,'unexpected','u',0,'0000-00-00','Y'),(1365,'underground','u',0,'0000-00-00','Y'),(1364,'under','u',0,'0000-00-00','Y'),(1363,'unaware','u',0,'0000-00-00','Y'),(1362,'umbrella','u',0,'0000-00-00','Y'),(1361,'ugly','u',0,'2011-12-21','Y'),(1360,'typical','t',0,'2012-02-20','Y'),(1359,'twinkle','t',0,'2011-12-20','Y'),(1358,'twilight','t',0,'0000-00-00','Y'),(1357,'trust','t',0,'0000-00-00','Y'),(1356,'trivial','t',0,'0000-00-00','Y'),(1355,'tree','t',0,'2012-01-20','Y'),(1354,'treasure','t',0,'0000-00-00','Y'),(1353,'tradition','t',0,'0000-00-00','Y'),(1352,'tool','t',0,'0000-00-00','Y'),(1351,'tolerance','t',0,'0000-00-00','Y'),(1350,'time','t',0,'0000-00-00','Y'),(1349,'tie','t',0,'0000-00-00','Y'),(1348,'thrill','t',0,'0000-00-00','Y'),(1347,'thorny','t',0,'0000-00-00','Y'),(1346,'terror','t',0,'0000-00-00','Y'),(1345,'tension','t',0,'0000-00-00','Y'),(1344,'temptation','t',0,'0000-00-00','Y'),(1343,'temple','t',0,'0000-00-00','Y'),(1342,'temporary','t',0,'0000-00-00','Y'),(1341,'temperature','t',0,'0000-00-00','Y'),(1340,'symbol','s',0,'0000-00-00','Y'),(1339,'sweet','s',0,'0000-00-00','Y'),(1338,'superficial','s',0,'0000-00-00','Y'),(1337,'sunflower','s',0,'0000-00-00','Y'),(1336,'sunset','s',0,'0000-00-00','Y'),(1335,'sunrise','s',0,'0000-00-00','Y'),(1334,'style','s',0,'0000-00-00','Y'),(1333,'stuff','s',0,'0000-00-00','Y'),(1332,'stress','s',0,'0000-00-00','Y'),(1331,'story','s',0,'0000-00-00','Y'),(1330,'start','s',0,'0000-00-00','Y'),(1329,'spirit','s',0,'0000-00-00','Y'),(1328,'spell','s',0,'0000-00-00','Y'),(1327,'specific','s',0,'0000-00-00','Y'),(1326,'special','s',0,'0000-00-00','Y'),(1325,'sparkle','s',0,'2011-12-19','Y'),(1324,'space','s',0,'0000-00-00','Y'),(1323,'source','s',0,'0000-00-00','Y'),(1322,'soul','s',0,'2012-02-19','Y'),(1321,'soft','s',0,'0000-00-00','Y'),(1320,'social','s',0,'0000-00-00','Y'),(1319,'snow','s',0,'0000-00-00','Y'),(1318,'smile','s',0,'0000-00-00','Y'),(1317,'smooth','s',0,'0000-00-00','Y'),(1316,'slope','s',0,'0000-00-00','Y'),(1315,'slice','s',0,'0000-00-00','Y'),(1314,'sky','s',0,'0000-00-00','Y'),(1313,'skin','s',0,'0000-00-00','Y'),(1312,'siren','s',0,'0000-00-00','Y'),(1311,'simple','s',0,'0000-00-00','Y'),(1310,'silly','s',0,'0000-00-00','Y'),(1309,'sign','s',0,'0000-00-00','Y'),(1308,'shift','s',0,'0000-00-00','Y'),(1307,'shine','s',0,'0000-00-00','Y'),(1306,'shell','s',0,'0000-00-00','Y'),(1305,'shape','s',0,'0000-00-00','Y'),(1304,'shade','s',0,'0000-00-00','Y'),(1303,'shadow','s',0,'0000-00-00','Y'),(1302,'sensation','s',0,'0000-00-00','Y'),(1301,'seduction','s',0,'0000-00-00','Y'),(1300,'secure','s',0,'0000-00-00','Y'),(1299,'secret','s',0,'0000-00-00','Y'),(1298,'sea','s',0,'0000-00-00','Y'),(1297,'season','s',0,'0000-00-00','Y'),(1296,'screen','s',0,'0000-00-00','Y'),(1295,'science','s',0,'0000-00-00','Y'),(1294,'school','s',0,'0000-00-00','Y'),(1293,'scarlet','s',0,'0000-00-00','Y'),(1292,'scene','s',0,'0000-00-00','Y'),(1291,'sculpture','s',0,'0000-00-00','Y'),(1290,'scar','s',0,'0000-00-00','Y'),(1289,'scandal','s',0,'0000-00-00','Y'),(1288,'satisfaction','s',0,'0000-00-00','Y'),(1287,'sand','s',0,'0000-00-00','Y'),(1286,'sadness','s',0,'0000-00-00','Y'),(1285,'safe','s',0,'2012-01-19','Y'),(1284,'rush','r',0,'0000-00-00','Y'),(1283,'ruin','r',0,'0000-00-00','Y'),(1282,'round','r',0,'0000-00-00','Y'),(1281,'rough','r',0,'2012-01-18','Y'),(1280,'rose','r',0,'0000-00-00','Y'),(1279,'room','r',0,'0000-00-00','Y'),(1278,'roof','r',0,'0000-00-00','Y'),(1277,'romance','r',0,'0000-00-00','Y'),(1276,'rock','r',0,'0000-00-00','Y'),(1275,'road','r',0,'0000-00-00','Y'),(1274,'risk','r',0,'0000-00-00','Y'),(1273,'rise','r',0,'0000-00-00','Y'),(1272,'ridiculous','r',0,'0000-00-00','Y'),(1271,'riddle','r',0,'0000-00-00','Y'),(1270,'rhythm','r',0,'0000-00-00','Y'),(1269,'revolution','r',0,'0000-00-00','Y'),(1268,'replacement','r',0,'0000-00-00','Y'),(1267,'rich','r',0,'0000-00-00','Y'),(1266,'repetition','r',0,'0000-00-00','Y'),(1265,'remind','r',0,'0000-00-00','Y'),(1264,'relax','r',0,'0000-00-00','Y'),(1263,'reflection','r',0,'0000-00-00','Y'),(1262,'red','r',0,'2011-12-18','Y'),(1261,'rebel','r',0,'0000-00-00','Y'),(1260,'reality','r',0,'0000-00-00','Y'),(1259,'real','r',0,'0000-00-00','Y'),(1258,'ray','r',0,'0000-00-00','Y'),(1257,'raw','r',0,'0000-00-00','Y'),(1256,'rare','r',0,'0000-00-00','Y'),(1255,'range','r',0,'0000-00-00','Y'),(1254,'random','r',0,'0000-00-00','Y'),(1253,'rainbow','r',0,'2012-02-18','Y'),(1252,'rain','r',0,'0000-00-00','Y'),(1251,'rail','r',0,'0000-00-00','Y'),(1250,'race','r',0,'0000-00-00','Y'),(1249,'quit','q',0,'0000-00-00','Y'),(1248,'quiet','q',0,'0000-00-00','Y'),(1247,'question','q',0,'2012-02-17','Y'),(1246,'queen','q',0,'2012-01-17','Y'),(1245,'quality','q',0,'2011-12-17','Y'),(1244,'pain','p',0,'2012-02-16','Y'),(1243,'puzzle','p',0,'0000-00-00','Y'),(1242,'purple','p',0,'0000-00-00','Y'),(1241,'pure','p',0,'0000-00-00','Y'),(1240,'punishment','p',0,'0000-00-00','Y'),(1239,'pupil','p',0,'0000-00-00','Y'),(1238,'progress','p',0,'0000-00-00','Y'),(1237,'predator','p',0,'0000-00-00','Y'),(1236,'precious','p',0,'0000-00-00','Y'),(1235,'practical','p',0,'2012-01-16','Y'),(1234,'power','p',0,'0000-00-00','Y'),(1233,'positive','p',0,'0000-00-00','Y'),(1232,'pole','p',0,'0000-00-00','Y'),(1231,'plus','p',0,'0000-00-00','Y'),(1230,'plenty','p',0,'2011-12-16','Y'),(1229,'pleasure','p',0,'0000-00-00','Y'),(1228,'play','p',0,'0000-00-00','Y'),(1227,'plastic','p',0,'0000-00-00','Y'),(1226,'pink','p',0,'0000-00-00','Y'),(1225,'pillar','p',0,'0000-00-00','Y'),(1224,'person','p',0,'0000-00-00','Y'),(1223,'performance','p',0,'0000-00-00','Y'),(1222,'perfect','p',0,'0000-00-00','Y'),(1221,'people','p',0,'0000-00-00','Y'),(1220,'peel','p',0,'0000-00-00','Y'),(1219,'peace','p',0,'0000-00-00','Y'),(1218,'passion','p',0,'0000-00-00','Y'),(1217,'party','p',0,'0000-00-00','Y'),(1216,'partner','p',0,'0000-00-00','Y'),(1215,'participant','p',0,'0000-00-00','Y'),(1214,'paper','p',0,'0000-00-00','Y'),(1213,'pale','p',0,'0000-00-00','Y'),(1212,'pair','p',0,'0000-00-00','Y'),(1211,'paint','p',0,'0000-00-00','Y'),(1210,'pack','p',0,'0000-00-00','Y'),(1209,'overflow','o',0,'0000-00-00','Y'),(1208,'outskirts','o',0,'0000-00-00','Y'),(1207,'outlook','o',0,'0000-00-00','Y'),(1206,'outdoors/outside/outwards','o',0,'0000-00-00','Y'),(1205,'other','o',0,'2012-01-15','Y'),(1204,'original','o',0,'0000-00-00','Y'),(1203,'ordinary','o',0,'2011-12-15','Y'),(1202,'orange','o',0,'0000-00-00','Y'),(1201,'option','o',0,'0000-00-00','Y'),(412,'early','e',0,'2011-12-05','Y'),(1200,'opposite','o',0,'0000-00-00','Y'),(1199,'open','o',0,'0000-00-00','Y'),(1198,'old','o',0,'0000-00-00','Y'),(1197,'oil','o',0,'0000-00-00','Y'),(1196,'odd','o',0,'2012-02-15','Y'),(1195,'obvious','o',0,'0000-00-00','Y'),(1194,'obligation','o',0,'0000-00-00','Y'),(1193,'object','o',0,'0000-00-00','Y'),(1192,'new','n',0,'0000-00-00','Y'),(1191,'nutritious','n',0,'0000-00-00','Y'),(1190,'numerous','n',0,'0000-00-00','Y'),(1189,'normal','n',0,'2011-12-14','Y'),(1188,'none','n',0,'0000-00-00','Y'),(1187,'no','n',0,'2012-01-14','Y'),(1186,'nightmare','n',0,'0000-00-00','Y'),(1185,'next','n',0,'0000-00-00','Y'),(1184,'net','n',0,'0000-00-00','Y'),(1183,'neck','n',0,'0000-00-00','Y'),(1182,'nature','n',0,'0000-00-00','Y'),(1181,'natural','n',0,'2012-02-14','Y'),(1180,'nation','n',0,'0000-00-00','Y'),(1179,'mysterious','m',0,'2011-12-13','Y'),(1178,'music','m',0,'0000-00-00','Y'),(1177,'movement','m',0,'0000-00-00','Y'),(1176,'mood','m',0,'0000-00-00','Y'),(1175,'monster','m',0,'0000-00-00','Y'),(1174,'moment','m',0,'0000-00-00','Y'),(1173,'mix','m',0,'0000-00-00','Y'),(1172,'mirror','m',0,'2011-12-28','Y'),(1171,'mine','m',0,'2012-02-13','Y'),(1170,'mess','m',0,'0000-00-00','Y'),(1169,'memory','m',0,'0000-00-00','Y'),(1168,'melt','m',0,'0000-00-00','Y'),(1167,'medium','m',0,'0000-00-00','Y'),(1166,'meaning','m',0,'0000-00-00','Y'),(1165,'mature','m',0,'0000-00-00','Y'),(1164,'many','m',0,'0000-00-00','Y'),(1163,'mankind','m',0,'0000-00-00','Y'),(1162,'magnificent','m',0,'0000-00-00','Y'),(1161,'magic','m',0,'0000-00-00','Y'),(1160,'mad','m',0,'2012-01-13','Y'),(1159,'machine','m',0,'0000-00-00','Y'),(1158,'luxury','l',0,'0000-00-00','Y'),(1157,'luck','l',0,'0000-00-00','Y'),(1156,'love','l',0,'0000-00-00','Y'),(1155,'lonely','l',0,'0000-00-00','Y'),(1154,'liquid','l',0,'0000-00-00','Y'),(1153,'link','l',0,'0000-00-00','Y'),(1152,'limit','l',0,'2012-02-12','Y'),(1151,'light','l',0,'0000-00-00','Y'),(1150,'life','l',0,'0000-00-00','Y'),(1149,'liberty','l',0,'2012-01-12','Y'),(1148,'liberal','l',0,'0000-00-00','Y'),(1147,'less','l',0,'0000-00-00','Y'),(1146,'lemon','l',0,'0000-00-00','Y'),(1145,'leaf','l',0,'0000-00-00','Y'),(1144,'lazy','l',0,'2011-12-12','Y'),(1143,'lady','l',0,'0000-00-00','Y'),(1142,'landscape','l',0,'0000-00-00','Y'),(1141,'label','l',0,'0000-00-00','Y'),(1140,'karma','k',0,'0000-00-00','Y'),(1139,'kohl','k',0,'2012-02-11','Y'),(1138,'kaleidoscope','k',0,'2012-01-11','Y'),(1137,'knot','k',0,'0000-00-00','Y'),(1136,'kind','k',0,'0000-00-00','Y'),(1135,'king','k',0,'0000-00-00','Y'),(1134,'kid','k',0,'2011-12-11','Y'),(1133,'key','k',0,'0000-00-00','Y'),(1132,'kiss','k',0,'0000-00-00','Y'),(1131,'jinx','j',0,'0000-00-00','Y'),(1130,'jade','j',0,'0000-00-00','Y'),(1129,'juicy','j',0,'2011-12-10','Y'),(1128,'jump','j',0,'2012-01-10','Y'),(1127,'joke','j',0,'0000-00-00','Y'),(1126,'jewel','j',0,'2012-02-10','Y'),(1125,'jam','j',0,'0000-00-00','Y'),(1124,'jail','j',0,'0000-00-00','Y'),(1123,'item','i',0,'0000-00-00','Y'),(1122,'isolated','i',0,'0000-00-00','Y'),(1121,'invisible','i',0,'0000-00-00','Y'),(1120,'intense','i',0,'0000-00-00','Y'),(1119,'intact','i',0,'0000-00-00','Y'),(1118,'insomnia','i',0,'0000-00-00','Y'),(1117,'inside','i',0,'0000-00-00','Y'),(1116,'insect','i',0,'2012-01-09','Y'),(1115,'inner','i',0,'0000-00-00','Y'),(1114,'infinity','i',0,'0000-00-00','Y'),(1113,'independent','i',0,'0000-00-00','Y'),(1112,'industry','i',0,'0000-00-00','Y'),(1111,'incredible','i',0,'0000-00-00','Y'),(1110,'inappropriate','i',0,'0000-00-00','Y'),(1109,'impressive','i',0,'0000-00-00','Y'),(1108,'imagination','i',0,'0000-00-00','Y'),(1107,'identical','i',0,'2011-12-09','Y'),(1106,'ideal','i',0,'0000-00-00','Y'),(1105,'icon','i',0,'0000-00-00','Y'),(1104,'idea','i',0,'0000-00-00','Y'),(1103,'ice','i',0,'2012-02-09','Y'),(1102,'humour','h',0,'0000-00-00','Y'),(1101,'human','h',0,'0000-00-00','Y'),(1100,'hug','h',0,'0000-00-00','Y'),(1099,'hostile','h',0,'2011-12-08','Y'),(1098,'hot','h',0,'0000-00-00','Y'),(1097,'horizon','h',0,'0000-00-00','Y'),(1096,'home','h',0,'2012-02-08','Y'),(1095,'hollow','h',0,'0000-00-00','Y'),(1094,'hobby','h',0,'2012-01-08','Y'),(1093,'history','h',0,'0000-00-00','Y'),(1092,'him','h',0,'0000-00-00','Y'),(1091,'hesitation','h',0,'0000-00-00','Y'),(1090,'hero','h',0,'2011-12-29','Y'),(1089,'help','h',0,'0000-00-00','Y'),(1088,'hello','h',0,'0000-00-00','Y'),(1087,'hell','h',0,'0000-00-00','Y'),(1086,'height','h',0,'0000-00-00','Y'),(1085,'heaven','h',0,'0000-00-00','Y'),(1084,'heat','h',0,'0000-00-00','Y'),(1083,'heart','h',0,'0000-00-00','Y'),(1082,'heal','h',0,'0000-00-00','Y'),(1081,'head','h',0,'0000-00-00','Y'),(1080,'harsh','h',0,'0000-00-00','Y'),(1079,'harmless','h',0,'0000-00-00','Y'),(1078,'hard','h',0,'0000-00-00','Y'),(1077,'harbour','h',0,'0000-00-00','Y'),(1076,'happiness','h',0,'0000-00-00','Y'),(1075,'hang','h',0,'0000-00-00','Y'),(1074,'handmade','h',0,'0000-00-00','Y'),(1073,'half','h',0,'0000-00-00','Y'),(1072,'haircut','h',0,'0000-00-00','Y'),(1071,'habit','h',0,'0000-00-00','Y'),(1070,'guideline','g',0,'0000-00-00','Y'),(1069,'guardian','g',0,'0000-00-00','Y'),(1068,'guard','g',0,'2012-01-07','Y'),(1067,'group','g',0,'0000-00-00','Y'),(1066,'ground','g',0,'0000-00-00','Y'),(1065,'grin','g',0,'0000-00-00','Y'),(1064,'green','g',0,'0000-00-00','Y'),(1063,'greatness','g',0,'0000-00-00','Y'),(1062,'gravity','g',0,'0000-00-00','Y'),(1061,'grass','g',0,'2012-02-07','Y'),(1060,'grain','g',0,'0000-00-00','Y'),(1059,'grace','g',0,'0000-00-00','Y'),(1058,'gossip','g',0,'0000-00-00','Y'),(1057,'god','g',0,'0000-00-00','Y'),(1056,'glow','g',0,'0000-00-00','Y'),(1055,'glory','g',0,'0000-00-00','Y'),(1054,'global','g',0,'0000-00-00','Y'),(1053,'glass','g',0,'0000-00-00','Y'),(1052,'glamorous','g',0,'0000-00-00','Y'),(1051,'glad','g',0,'0000-00-00','Y'),(1050,'gift','g',0,'0000-00-00','Y'),(1049,'giant','g',0,'0000-00-00','Y'),(1048,'ghost','g',0,'0000-00-00','Y'),(1047,'genuine','g',0,'0000-00-00','Y'),(1046,'gentle','g',0,'0000-00-00','Y'),(1045,'generation','g',0,'0000-00-00','Y'),(1044,'gem','g',0,'0000-00-00','Y'),(1043,'gaze','g',0,'0000-00-00','Y'),(1042,'gate','g',0,'0000-00-00','Y'),(1041,'game','g',0,'0000-00-00','Y'),(1040,'garden','g',0,'0000-00-00','Y'),(1039,'gap','g',0,'0000-00-00','Y'),(1038,'gamble','g',0,'0000-00-00','Y'),(1037,'faint','f',0,'0000-00-00','Y'),(1036,'fragile','f',0,'2012-02-06','Y'),(1035,'fortune','f',0,'0000-00-00','Y'),(1034,'form','f',0,'0000-00-00','Y'),(1033,'forever','f',0,'0000-00-00','Y'),(1032,'foreign','f',0,'0000-00-00','Y'),(1031,'force','f',0,'0000-00-00','Y'),(1030,'forbid','f',0,'0000-00-00','Y'),(1029,'foolish','f',0,'0000-00-00','Y'),(1028,'fog','f',0,'0000-00-00','Y'),(1027,'focus','f',0,'0000-00-00','Y'),(1026,'fluid','f',0,'2012-02-28','Y'),(1025,'fluent','f',0,'0000-00-00','Y'),(1024,'flow','f',0,'0000-00-00','Y'),(1023,'flood','f',0,'0000-00-00','Y'),(1022,'flexible','f',0,'2012-02-27','Y'),(1021,'flesh','f',0,'0000-00-00','Y'),(1020,'flavour','f',0,'0000-00-00','Y'),(1019,'flat','f',0,'2012-01-06','Y'),(1018,'flash','f',0,'0000-00-00','Y'),(1017,'flame','f',0,'2012-03-06','Y'),(1016,'fiction','f',0,'0000-00-00','Y'),(1015,'feel','f',0,'0000-00-00','Y'),(1014,'fascinating','f',0,'0000-00-00','Y'),(1013,'fear','f',0,'0000-00-00','Y'),(1012,'fast','f',0,'0000-00-00','Y'),(1011,'fashion','f',0,'0000-00-00','Y'),(1010,'farewell','f',0,'0000-00-00','Y'),(1009,'far','f',0,'0000-00-00','Y'),(1008,'fake','f',0,'0000-00-00','Y'),(1007,'fairytale','f',0,'0000-00-00','Y'),(1006,'fabulous','f',0,'0000-00-00','Y'),(1005,'future','f',0,'0000-00-00','Y'),(1004,'fur','f',0,'0000-00-00','Y'),(1003,'funny','f',0,'0000-00-00','Y'),(1002,'full','f',0,'0000-00-00','Y'),(1001,'forest','f',0,'0000-00-00','Y'),(1000,'frost','f',0,'0000-00-00','Y'),(999,'fresh','f',0,'0000-00-00','Y'),(998,'freedom','f',0,'0000-00-00','Y'),(997,'free','f',0,'2012-02-24','Y'),(996,'frantic','f',0,'0000-00-00','Y'),(995,'extreme','e',0,'0000-00-00','Y'),(994,'explore','e',0,'2011-12-27','Y'),(993,'excitement','e',0,'0000-00-00','Y'),(992,'exaggerate','e',0,'0000-00-00','Y'),(991,'evil','e',0,'0000-00-00','Y'),(990,'essential','e',0,'0000-00-00','Y'),(989,'escape','e',0,'0000-00-00','Y'),(988,'enthusiasm','e',0,'0000-00-00','Y'),(987,'enormous','e',0,'0000-00-00','Y'),(986,'endless','e',0,'0000-00-00','Y'),(985,'emotion','e',0,'0000-00-00','Y'),(984,'effort','e',0,'0000-00-00','Y'),(983,'end','e',0,'0000-00-00','Y'),(982,'embrace','e',0,'2012-01-05','Y'),(981,'effect','e',0,'0000-00-00','Y'),(980,'empty','e',0,'2012-03-05','Y'),(979,'element','e',0,'0000-00-00','Y'),(978,'edge','e',0,'0000-00-00','Y'),(977,'exhaustion','e',0,'0000-00-00','Y'),(976,'excellent','e',0,'0000-00-00','Y'),(975,'ethnic','e',0,'0000-00-00','Y'),(974,'enjoy','e',0,'0000-00-00','Y'),(973,'ecology','e',0,'0000-00-00','Y'),(972,'eclipse','e',0,'0000-00-00','Y'),(971,'ease','e',0,'0000-00-00','Y'),(970,'exposed','e',0,'0000-00-00','Y'),(969,'excess','e',0,'2012-02-05','Y'),(968,'eternity','e',0,'0000-00-00','Y'),(967,'equal','e',0,'0000-00-00','Y'),(966,'energy','e',0,'0000-00-00','Y'),(965,'earth','e',0,'0000-00-00','Y'),(964,'eager','e',0,'0000-00-00','Y'),(963,'ï»¿amazing','ï',0,'0000-00-00','Y'),(962,'dull','d',0,'0000-00-00','Y'),(961,'drastic','d',0,'0000-00-00','Y'),(960,'dominate','d',0,'0000-00-00','Y'),(959,'disappear','d',0,'0000-00-00','Y'),(958,'dirty','d',0,'0000-00-00','Y'),(957,'dignity','d',0,'0000-00-00','Y'),(956,'difference','d',0,'0000-00-00','Y'),(955,'devotion','d',0,'0000-00-00','Y'),(954,'determination','d',0,'0000-00-00','Y'),(953,'dramatic','d',0,'0000-00-00','Y'),(952,'distance','d',0,'0000-00-00','Y'),(951,'desperate','d',0,'0000-00-00','Y'),(950,'desire','d',0,'0000-00-00','Y'),(949,'desert','d',0,'0000-00-00','Y'),(948,'democracy','d',0,'0000-00-00','Y'),(947,'delight','d',0,'0000-00-00','Y'),(946,'delicacy','d',0,'0000-00-00','Y'),(945,'detail','d',0,'0000-00-00','Y'),(944,'destruction','d',0,'0000-00-00','Y'),(943,'drift','d',0,'0000-00-00','Y'),(942,'doubt','d',0,'0000-00-00','Y'),(941,'discovery','d',0,'0000-00-00','Y'),(940,'defence','d',0,'0000-00-00','Y'),(939,'defect','d',0,'0000-00-00','Y'),(938,'depth/deep','d',0,'0000-00-00','Y'),(937,'decoration','d',0,'2012-03-04','Y'),(936,'deadline','d',0,'0000-00-00','Y'),(935,'dazzling','d',0,'0000-00-00','Y'),(934,'dream','d',0,'0000-00-00','Y'),(933,'discomfort','d',0,'0000-00-00','Y'),(932,'disaster','d',0,'0000-00-00','Y'),(931,'daylight','d',0,'0000-00-00','Y'),(930,'darkness','d',0,'2012-02-04','Y'),(929,'dare','d',0,'0000-00-00','Y'),(928,'danger','d',0,'0000-00-00','Y'),(927,'dance','d',0,'2012-01-04','Y'),(926,'cute','c',0,'0000-00-00','Y'),(925,'creativity','c',0,'2012-03-03','Y'),(924,'crazy','c',0,'0000-00-00','Y'),(923,'cosy','c',0,'2012-01-03','Y'),(922,'common','c',0,'0000-00-00','Y'),(921,'collision','c',0,'0000-00-00','Y'),(920,'creepy','c',0,'0000-00-00','Y'),(919,'clear','c',0,'0000-00-00','Y'),(918,'civilization','c',0,'0000-00-00','Y'),(917,'choice','c',0,'0000-00-00','Y'),(916,'crowded','c',0,'0000-00-00','Y'),(915,'crossroads','c',0,'0000-00-00','Y'),(914,'core','c',0,'0000-00-00','Y'),(913,'controversial','c',0,'0000-00-00','Y'),(912,'control','c',0,'2012-02-03','Y'),(911,'childhood','c',0,'0000-00-00','Y'),(910,'charm','c',0,'0000-00-00','Y'),(909,'chaos','c',0,'0000-00-00','Y'),(908,'change','c',0,'0000-00-00','Y'),(907,'chance','c',0,'0000-00-00','Y'),(906,'challenge','c',0,'0000-00-00','Y'),(905,'curiosity/curious','c',0,'0000-00-00','Y'),(904,'conservative','c',0,'0000-00-00','Y'),(903,'caution','c',0,'0000-00-00','Y'),(902,'castle','c',0,'0000-00-00','Y'),(901,'complicated','c',0,'0000-00-00','Y'),(900,'competition','c',0,'0000-00-00','Y'),(899,'careless','c',0,'0000-00-00','Y'),(898,'century','c',0,'0000-00-00','Y'),(897,'confusion','c',0,'0000-00-00','Y'),(896,'contradiction','c',0,'0000-00-00','Y'),(895,'communication','c',0,'0000-00-00','Y'),(894,'casual','c',0,'0000-00-00','Y'),(893,'commercial','c',0,'0000-00-00','Y'),(892,'contemporary','c',0,'0000-00-00','Y'),(891,'celebrate','c',0,'0000-00-00','Y'),(890,'cell','c',0,'0000-00-00','Y'),(889,'careful','c',0,'0000-00-00','Y'),(888,'calm','c',0,'0000-00-00','Y'),(887,'colour','c',0,'0000-00-00','Y'),(886,'blackout','b',0,'0000-00-00','Y'),(885,'breath','b',0,'0000-00-00','Y'),(884,'brand','b',0,'2012-03-02','Y'),(883,'boring','b',0,'0000-00-00','Y'),(882,'belong','b',0,'0000-00-00','Y'),(881,'bold','b',0,'2012-02-29','Y'),(880,'bright','b',0,'0000-00-00','Y'),(879,'buzz','b',0,'2012-01-02','Y'),(878,'be....','b',0,'0000-00-00','Y'),(877,'blue','b',0,'0000-00-00','Y'),(876,'black','b',0,'0000-00-00','Y'),(875,'busy','b',0,'0000-00-00','Y'),(874,'broken','b',0,'0000-00-00','Y'),(873,'burning','b',0,'0000-00-00','Y'),(872,'basic','b',0,'2012-02-02','Y'),(871,'belief','b',0,'0000-00-00','Y'),(870,'bloom','b',0,'0000-00-00','Y'),(869,'beyond','b',0,'0000-00-00','Y'),(868,'before','b',0,'0000-00-00','Y'),(867,'beautiful','b',0,'0000-00-00','Y'),(866,'barrier','b',0,'0000-00-00','Y'),(865,'bare','b',0,'0000-00-00','Y'),(864,'balance','b',0,'0000-00-00','Y'),(863,'addiction','a',0,'0000-00-00','Y'),(862,'absence','a',0,'0000-00-00','Y'),(861,'abundant','a',0,'0000-00-00','Y'),(860,'angry','a',0,'0000-00-00','Y'),(859,'authentic','a',0,'0000-00-00','Y'),(858,'awkward','a',0,'0000-00-00','Y'),(857,'autumn','a',0,'0000-00-00','Y'),(856,'attraction','a',0,'2012-01-01','Y'),(855,'artistic','a',0,'0000-00-00','Y'),(854,'artificial','a',0,'0000-00-00','Y'),(853,'aggression','a',0,'0000-00-00','Y'),(852,'anxiety','a',0,'0000-00-00','Y'),(851,'amusing','a',0,'0000-00-00','Y'),(850,'ancient','a',0,'2012-02-01','Y'),(849,'ambition','a',0,'0000-00-00','Y'),(848,'amazing','a',0,'2012-03-01','Y'),(847,'ï»¿alone','ï',0,'0000-00-00','Y');
/*!40000 ALTER TABLE `quests_possible_topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratings` (
  `u_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `r_rating` tinyint(4) NOT NULL,
  PRIMARY KEY (`u_id`,`p_id`),
  KEY `u_id` (`u_id`,`p_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` VALUES (0,3,2),(5,3,1),(6,7,5),(6,13,3),(6,16,3),(5,19,5),(6,18,5),(6,20,4),(6,24,4),(6,25,4),(5,26,5);
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `u_id` int(11) NOT NULL,
  `s_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `s_value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`u_id`,`s_key`),
  KEY `u_id` (`u_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (5,'notify_new_topics','1'),(5,'notify_new_comments','1'),(6,'notify_new_topics','1'),(6,'notify_new_comments','1');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `u_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `u_password` char(32) COLLATE utf8_unicode_ci NOT NULL,
  `u_facebook` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `u_hash` char(32) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (5,'ivanatora','ivanatora@gmail.com','76419c58730d9f35de7ac538c2fd6737','','12f486c78f83b9b175d00665a971cda0'),(6,'ladytintalle','altarielle@gmail.com','4f41182b534b001562e9bb3353378f58','',''),(9,'stan','stan@stannedelchev.net','22f12b54cfb8a7a9a70094a193a38dab','',''),(11,'REAKTOR','reactor@abv.bg','4297f44b13955235245b2497399d7a93','','');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2012-03-05 16:30:36
