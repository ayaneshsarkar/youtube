-- MariaDB dump 10.17  Distrib 10.4.13-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: youtube
-- ------------------------------------------------------
-- Server version	10.4.13-MariaDB-1:10.4.13+maria~buster-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `likes`
--

DROP TABLE IF EXISTS `likes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `video_id` int(10) unsigned NOT NULL,
  `is_liked` tinyint(1) NOT NULL DEFAULT 0,
  `is_disliked` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `likes_user_id_foreign` (`user_id`),
  KEY `likes_video_id_foreign` (`video_id`),
  CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `likes_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
INSERT INTO `likes` VALUES (2,1,8,1,0,'2020-05-19 20:29:57','2020-06-03 19:33:49'),(3,1,5,1,0,'2020-05-19 20:55:01','2020-05-19 20:55:01'),(4,2,8,1,0,'2020-05-20 05:17:10','2020-05-20 05:17:10'),(5,1,9,1,0,'2020-05-20 05:25:39','2020-06-03 19:05:47'),(7,1,6,1,0,'2020-06-03 18:57:07','2020-06-14 19:09:19'),(8,1,4,1,0,'2020-06-14 19:10:12','2020-06-14 19:10:12'),(9,3,7,1,0,'2020-06-23 14:13:36','2020-06-23 14:13:36'),(10,3,9,1,0,'2020-06-23 14:14:18','2020-06-23 14:14:18'),(11,4,6,1,0,'2020-06-23 14:23:23','2020-06-23 14:23:23'),(12,4,4,1,0,'2020-06-23 14:23:43','2020-06-23 14:23:43');
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2020-05-13-055414','App\\Database\\Migrations\\CreateUsersTable','default','App',1589914145,1),(2,'2020-05-14-054612','App\\Database\\Migrations\\ModifyUsersTable','default','App',1589914145,1),(3,'2020-05-11-062356','App\\Database\\Migrations\\CreateVideoTable','default','App',1589914165,2),(4,'2020-05-15-063415','App\\Database\\Migrations\\CreateViewesTable','default','App',1589914190,3),(5,'2020-05-15-142743','App\\Database\\Migrations\\CreateLikesTable','default','App',1589914206,4),(6,'2020-05-18-051242','App\\Database\\Migrations\\CreateSubscribersTable','default','App',1589914238,5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscribers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `channel_id` int(10) unsigned NOT NULL,
  `subscribed` tinyint(1) NOT NULL DEFAULT 0,
  `not_subscribed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `subscribers_channel_id_foreign` (`channel_id`),
  CONSTRAINT `subscribers_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscribers`
--

LOCK TABLES `subscribers` WRITE;
/*!40000 ALTER TABLE `subscribers` DISABLE KEYS */;
INSERT INTO `subscribers` VALUES (2,2,1,1,0,'2020-05-19 21:15:38','2020-05-19 21:15:38'),(3,1,1,1,0,'2020-06-03 18:56:50','2020-06-03 18:56:50');
/*!40000 ALTER TABLE `subscribers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `channel_id` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `verify_key` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'ng6hODqSzKFr','ayaneshsarkar','ayaneshsarkar101@gmail.com','$2y$10$BQhtL0QOkYiq6Pjxlqc3ReGu1ygmpx9wOqqEopqQIFeSPGNQD2nAa','d1576e8b6b17f070ecba2097f22147f6',1,'2020-05-19 19:32:57','2020-05-19 19:33:24'),(2,'IfZ47Sdv98Tb','ayaneshofficial','ayaneshofficial@gmail.com','$2y$10$iKeeRmJLemyhalbxb2/GIeaJzsLfuyjQc.R2XllgG7Qwzs9fj.MYi','d0f4ec56774dcd75a7375c0e49cc7778',1,'2020-05-19 21:14:45','2020-05-19 21:15:04'),(3,'ZaBYRX7HdQnp','fullstackayanesh','ayanesh@fullstackayanesh.xyz','$2y$10$MQaf4.2atD2TuFAmNJaqxeIXpN4nnFLwuQfKWwtuDWq/z7hhze1zy','1e72f71320537f129c72232dc16f4fac',1,'2020-06-14 13:03:24','2020-06-14 13:13:12'),(4,'5pzw6ilsAIRr','ayaneshdev','ayaensh@ayaneshdev.xyz','$2y$10$1WjGdbIrsj.N1YIu964cG.f4Sr5lwHR0CO4nVGABmV/iEZjLTa7eK','751b68b40fe499a60d056d30e47ea6f3',1,'2020-06-23 14:12:27','2020-06-23 14:22:14');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `videos`
--

DROP TABLE IF EXISTS `videos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `videos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `video_name` varchar(255) NOT NULL,
  `video_slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `is_unlisted` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `videos_user_id_foreign` (`user_id`),
  CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `videos`
--

LOCK TABLES `videos` WRITE;
/*!40000 ALTER TABLE `videos` DISABLE KEYS */;
INSERT INTO `videos` VALUES (4,1,'1589919624_930d3c19a55657b746c8.mp4','HWGsbplEVS','La Sandunga','Antenoche fui a tu casa,\r\nTres golpes le di al candado,\r\nTienes el sueño pesado.\r\nAy! Sandunga, Sandunga\r\nMamá por Dios.\r\nSandunga, no seas ingrata,\r\nMamá de mi corazón.\r\nMe ofreciste acompañarme\r\nDesde la iglesia hasta mi choza,\r\nPero como no llegaste\r\nTuve que venirme solo.\r\nA orillas del Papaloapam\r\nMe estaba bañando ayer,\r\nPasaste por las orillas\r\nY no quisiste ver.\r\nEstaban dos tortolitas\r\nArrullándose en su nido,\r\nY por más luchas que te hice\r\nTe hiciste la desentendida.\r\nAy! Sandunga sí, Ay…','1589919658_21b1523dc8c6cd145861.jpg','music',1,0,'2020-05-19 20:20:24','2020-05-19 20:21:18'),(5,1,'1589919745_3ed2c162d6d3d8b8069d.mp4','cuVlex4aHD','Juan Gabriel - Hasta Que Te Conocí','Letra de Hasta Que Te Conocí\r\n\r\nNo sabia, de tristezas, ni de lágrimas\r\nNi nada, que me hicieran llorar\r\nYo sabía de cariño, de ternura\r\nPorque a mí­ desde pequeño\r\nEso me enseño mamá, eso me enseño mamá\r\nEso y muchas cosas más\r\nYo jamás sufrí, yo jamás lloré\r\nYo era muy feliz, yo vivía muy bien\r\n\r\nYo vivía tan distinto, algo hermoso\r\nAlgo divino, lleno de felicidad\r\nYo sabia de alegrías, la belleza de la vida\r\nPero no de soledad, pero no de soledad\r\nDe eso y muchas cosas más\r\nYo jamás sufrí, yo jamás lloré\r\nYo era muy feliz, yo vivía muy bien\r\n\r\nHasta que te conocí\r\nVi la vida con dolor\r\nNo te miento fui feliz\r\nAunque con muy poco amor\r\nY muy tarde comprendí\r\nQue no te debía amar\r\nPorque ahora pienso en ti\r\nMás que ayer, mucho más\r\n\r\nYo jamás sufrí, yo jamás lloré\r\nYo era muy feliz\r\nPero te encontré\r\n\r\nYo no quiero que me digas\r\nSi valía o no la pena\r\nEl haberte conocido\r\nPorque no te creo más\r\nY es que tú fuiste muy mala\r\nSi muy mala conmigo\r\nPor eso no te quiero\r\nNo te quiero ver jamás','1589919783_f95ec079474129c63706.jpg','music',1,0,'2020-05-19 20:22:25','2020-05-19 20:23:03'),(6,1,'1589919863_3478262f3a77197194ef.mp4','hH1tqi0VXK','Natalia Lafourcade - Nunca Es Suficiente','NUNCA ES SUFICIENTE\r\n\r\nNunca es suficiente para mí.\r\nPorque siempre quiero más de ti.\r\nYo quisiera hacerte más feliz.\r\nHoy, mañana, siempre, hasta el fin.\r\n\r\nMi corazón estalla por tu amor.\r\nY tú que crees que esto es muy normal.\r\nAcostumbrado estás tanto al amor.\r\nQue no lo ves yo nunca he estado así.\r\n\r\nSi de casualidad me ves llorando un poco es porque yo te quiero a ti.\r\n\r\nY tú te vas jugando a enamorar.\r\nTodas las ilusiones vagabundas que se dejan alcanzar.\r\nY no verás que lo que yo te ofrezco es algo incondicional.\r\n\r\nY tú te vas jugando a enamorar.\r\nTe enredas por las noches entre historias que nunca tienen final.\r\nTe perderás dentro de mis recuerdos por haberme hecho llorar.\r\n\r\nNunca es suficiente para mí.\r\nPorque siempre quiero más de ti.\r\nNo ha cambiado nada mi sentir.\r\nAunque me haces mal te quiero aquí.\r\n\r\nMi corazón estalla de dolor.\r\n\r\nCómo evitar que se fracture en mil.\r\nAcostumbrado estás tanto al amor.\r\nQue no lo ves yo nunca he estado así.\r\n\r\nSi de casualidad me ves llorando un poco es porque yo te quiero a ti.\r\n\r\nY tú te vas jugando a enamorar\r\n\r\nMusic video by Natalia Lafourcade performing Nunca Es Suficiente. (C) 2016 Sony Music Entertainment México, S.A. de C.V.','1591209954_f9fdbad658ea3d1db159.jpg','music',1,0,'2020-05-19 20:24:24','2020-06-03 18:45:54'),(7,1,'1589919988_909c949dd3a4da1dcecc.mp4','jNBE1t8u9K','Transcription','Transcription','1589920037_7980359c77b6bfd9dae5.png','fiverr',1,0,'2020-05-19 20:26:28','2020-05-19 20:27:23'),(8,1,'1589920145_45b688e4f6318a6e16a8.mp4','ONxtL1BRWi','Natalia Lafourcade | Amor, Amor de Mis Amores (En Vivo)','One of the great songs that I like. I love this song.','1591209902_1275ec549c4784bb7d42.jpg','music',1,0,'2020-05-19 20:29:05','2020-06-03 18:45:02'),(9,1,'1589952260_c9735ec2b6b6e6afe6d5.mp4','hrTQbfgcjm','The HU - Wolf Totem (Official Music Video)','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','1589952327_c710b55d307e30244638.jpg','music',1,0,'2020-05-20 05:24:21','2020-05-20 05:25:27'),(10,1,'1589958429_905e1dda643423069f7e.mp4','rkSyKlUebR','Extraction 2020','Extraction is a 2020 American action-thriller film directed by Sam Hargrave (in his feature debut) and written by Joe Russo, based on the graphic novel Ciudad by Ande Parks, Joe Russo, Anthony Russo, Fernando León González, and Eric Skillman. What a film!\r\n','1591203092_73a9e7242bd136934f6d.png','movies',1,0,'2020-05-20 07:07:25','2020-06-03 16:51:32');
/*!40000 ALTER TABLE `videos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `viewes`
--

DROP TABLE IF EXISTS `viewes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `viewes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `video_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `viewes_user_id_foreign` (`user_id`),
  KEY `viewes_video_id_foreign` (`video_id`),
  CONSTRAINT `viewes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `viewes_video_id_foreign` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `viewes`
--

LOCK TABLES `viewes` WRITE;
/*!40000 ALTER TABLE `viewes` DISABLE KEYS */;
INSERT INTO `viewes` VALUES (2,1,4,'2020-05-19 20:21:02','2020-05-19 20:21:02'),(3,1,4,'2020-05-19 20:21:20','2020-05-19 20:21:20'),(4,1,5,'2020-05-19 20:23:12','2020-05-19 20:23:12'),(5,1,6,'2020-05-19 20:25:37','2020-05-19 20:25:37'),(6,1,7,'2020-05-19 20:27:26','2020-05-19 20:27:26'),(7,1,8,'2020-05-19 20:29:53','2020-05-19 20:29:53'),(8,1,8,'2020-05-19 20:30:13','2020-05-19 20:30:13'),(9,1,8,'2020-05-19 20:53:09','2020-05-19 20:53:09'),(10,1,8,'2020-05-19 20:54:37','2020-05-19 20:54:37'),(11,1,5,'2020-05-19 20:54:41','2020-05-19 20:54:41'),(12,1,5,'2020-05-19 20:55:19','2020-05-19 20:55:19'),(13,2,8,'2020-05-19 21:15:30','2020-05-19 21:15:30'),(14,2,8,'2020-05-20 05:17:00','2020-05-20 05:17:00'),(15,2,8,'2020-05-20 05:17:07','2020-05-20 05:17:07'),(16,2,6,'2020-05-20 05:17:23','2020-05-20 05:17:23'),(17,1,8,'2020-05-20 05:20:07','2020-05-20 05:20:07'),(18,1,8,'2020-05-20 05:20:26','2020-05-20 05:20:26'),(19,1,9,'2020-05-20 05:25:31','2020-05-20 05:25:31'),(20,1,9,'2020-05-20 06:01:09','2020-05-20 06:01:09'),(21,1,9,'2020-05-20 06:29:23','2020-05-20 06:29:23'),(22,1,9,'2020-05-20 06:33:58','2020-05-20 06:33:58'),(23,1,9,'2020-05-20 06:36:57','2020-05-20 06:36:57'),(24,1,9,'2020-05-20 06:37:45','2020-05-20 06:37:45'),(25,1,9,'2020-05-20 06:41:12','2020-05-20 06:41:12'),(26,1,9,'2020-05-20 06:44:04','2020-05-20 06:44:04'),(27,1,9,'2020-05-20 06:44:21','2020-05-20 06:44:21'),(28,1,9,'2020-05-20 06:46:53','2020-05-20 06:46:53'),(29,1,9,'2020-05-20 06:47:15','2020-05-20 06:47:15'),(30,1,9,'2020-05-20 06:47:36','2020-05-20 06:47:36'),(31,1,9,'2020-05-20 06:49:28','2020-05-20 06:49:28'),(32,1,9,'2020-05-20 06:50:44','2020-05-20 06:50:44'),(33,1,9,'2020-05-20 06:51:21','2020-05-20 06:51:21'),(34,1,9,'2020-05-20 06:53:54','2020-05-20 06:53:54'),(35,1,9,'2020-05-20 06:55:28','2020-05-20 06:55:28'),(36,1,9,'2020-05-20 06:56:08','2020-05-20 06:56:08'),(37,1,9,'2020-05-20 06:57:34','2020-05-20 06:57:34'),(38,1,9,'2020-05-20 06:57:38','2020-05-20 06:57:38'),(39,1,9,'2020-05-20 06:58:08','2020-05-20 06:58:08'),(40,1,9,'2020-05-20 06:59:49','2020-05-20 06:59:49'),(41,1,9,'2020-05-20 07:02:27','2020-05-20 07:02:27'),(42,1,9,'2020-05-20 07:04:55','2020-05-20 07:04:55'),(43,1,9,'2020-05-20 07:05:39','2020-05-20 07:05:39'),(44,1,9,'2020-05-20 07:07:13','2020-05-20 07:07:13'),(45,1,9,'2020-05-20 07:07:43','2020-05-20 07:07:43'),(46,1,10,'2020-05-20 07:10:41','2020-05-20 07:10:41'),(47,1,9,'2020-05-20 07:26:23','2020-05-20 07:26:23'),(48,1,9,'2020-05-20 07:26:37','2020-05-20 07:26:37'),(49,1,6,'2020-06-03 16:44:19','2020-06-03 16:44:19'),(50,1,10,'2020-06-03 16:45:54','2020-06-03 16:45:54'),(51,1,7,'2020-06-03 16:50:14','2020-06-03 16:50:14'),(52,1,8,'2020-06-03 16:51:41','2020-06-03 16:51:41'),(53,1,10,'2020-06-03 17:03:16','2020-06-03 17:03:16'),(54,1,10,'2020-06-03 17:08:25','2020-06-03 17:08:25'),(55,1,4,'2020-06-03 17:20:14','2020-06-03 17:20:14'),(56,1,6,'2020-06-03 17:20:29','2020-06-03 17:20:29'),(57,1,10,'2020-06-03 17:53:12','2020-06-03 17:53:12'),(58,1,10,'2020-06-03 17:55:13','2020-06-03 17:55:13'),(59,1,10,'2020-06-03 18:00:46','2020-06-03 18:00:46'),(60,1,10,'2020-06-03 18:03:19','2020-06-03 18:03:19'),(61,1,9,'2020-06-03 18:04:32','2020-06-03 18:04:32'),(62,1,9,'2020-06-03 18:05:31','2020-06-03 18:05:31'),(63,1,9,'2020-06-03 18:15:40','2020-06-03 18:15:40'),(64,1,10,'2020-06-03 18:18:49','2020-06-03 18:18:49'),(65,1,10,'2020-06-03 18:21:12','2020-06-03 18:21:12'),(66,1,10,'2020-06-03 18:24:36','2020-06-03 18:24:36'),(67,1,10,'2020-06-03 18:34:47','2020-06-03 18:34:47'),(68,1,10,'2020-06-03 18:35:19','2020-06-03 18:35:19'),(69,1,10,'2020-06-03 18:39:30','2020-06-03 18:39:30'),(70,1,6,'2020-06-03 18:53:47','2020-06-03 18:53:47'),(71,1,7,'2020-06-03 18:57:35','2020-06-03 18:57:35'),(72,1,7,'2020-06-03 19:01:08','2020-06-03 19:01:08'),(73,1,7,'2020-06-03 19:01:15','2020-06-03 19:01:15'),(74,1,9,'2020-06-03 19:05:10','2020-06-03 19:05:10'),(75,1,9,'2020-06-03 19:05:31','2020-06-03 19:05:31'),(76,1,9,'2020-06-03 19:06:10','2020-06-03 19:06:10'),(77,1,8,'2020-06-03 19:12:45','2020-06-03 19:12:45'),(78,1,8,'2020-06-03 19:22:20','2020-06-03 19:22:20'),(79,1,5,'2020-06-03 19:22:27','2020-06-03 19:22:27'),(80,1,5,'2020-06-03 19:22:35','2020-06-03 19:22:35'),(81,1,8,'2020-06-03 19:33:40','2020-06-03 19:33:40'),(82,3,9,'2020-06-14 13:31:34','2020-06-14 13:31:34'),(83,3,9,'2020-06-14 13:31:42','2020-06-14 13:31:42'),(84,1,10,'2020-06-14 19:07:57','2020-06-14 19:07:57'),(85,1,7,'2020-06-14 19:08:05','2020-06-14 19:08:05'),(86,1,6,'2020-06-14 19:09:01','2020-06-14 19:09:01'),(87,1,4,'2020-06-14 19:10:09','2020-06-14 19:10:09'),(88,1,4,'2020-06-14 19:11:19','2020-06-14 19:11:19'),(89,3,8,'2020-06-23 14:13:09','2020-06-23 14:13:09'),(90,3,7,'2020-06-23 14:13:14','2020-06-23 14:13:14'),(91,3,9,'2020-06-23 14:14:14','2020-06-23 14:14:14'),(92,3,9,'2020-06-23 14:14:20','2020-06-23 14:14:20'),(93,4,6,'2020-06-23 14:22:56','2020-06-23 14:22:56'),(94,4,4,'2020-06-23 14:23:36','2020-06-23 14:23:36'),(95,4,4,'2020-06-23 14:23:40','2020-06-23 14:23:40'),(96,1,4,'2020-06-26 13:44:24','2020-06-26 13:44:24'),(97,1,4,'2020-06-26 13:44:29','2020-06-26 13:44:29'),(98,1,4,'2020-06-26 13:44:31','2020-06-26 13:44:31'),(99,1,4,'2020-06-26 14:33:49','2020-06-26 14:33:49');
/*!40000 ALTER TABLE `viewes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-07-30  9:50:58
