-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2021 at 05:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `youtube`
--

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `video_id` int(10) UNSIGNED NOT NULL,
  `is_liked` tinyint(1) NOT NULL DEFAULT 0,
  `is_disliked` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `video_id`, `is_liked`, `is_disliked`, `created_at`, `updated_at`) VALUES
(48, 12, 60, 0, 1, '2020-05-17 14:24:04', '2020-05-17 19:56:43'),
(110, 12, 25, 0, 1, '2020-05-17 20:00:53', '2020-05-17 20:01:00'),
(126, 4, 60, 0, 1, '2020-05-18 15:58:22', '2020-05-18 15:58:29'),
(128, 12, 63, 1, 0, '2020-05-19 08:23:13', '2020-05-19 08:23:13'),
(130, 12, 64, 1, 0, '2020-05-19 16:51:08', '2020-05-19 16:51:08'),
(133, 21, 60, 1, 0, '2020-06-02 17:21:25', '2020-06-02 17:21:25');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` text NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(3, '2020-05-13-055414', 'App\\Database\\Migrations\\CreateUsersTable', 'default', 'App', 1589349978, 2),
(5, '2020-05-14-054612', 'App\\Database\\Migrations\\ModifyUsersTable', 'default', 'App', 1589435656, 3),
(8, '2020-05-14-184140', 'App\\Database\\Migrations\\AddForeignKey', 'default', 'App', 1589481966, 5),
(9, '2020-05-11-062356', 'App\\Database\\Migrations\\CreateVideoTable', 'default', 'App', 1589484734, 6),
(11, '2020-05-15-063415', 'App\\Database\\Migrations\\CreateViewesTable', 'default', 'App', 1589524941, 7),
(12, '2020-05-15-142743', 'App\\Database\\Migrations\\CreateLikesTable', 'default', 'App', 1589553213, 8),
(16, '2020-05-18-051242', 'App\\Database\\Migrations\\CreateSubscribersTable', 'default', 'App', 1589785636, 9),
(17, '2020-05-18-140948', 'App\\Database\\Migrations\\DropViewForeignKey', 'default', 'App', 1589811211, 10),
(18, '2020-05-18-141823', 'App\\Database\\Migrations\\DropLikesFroeignKey', 'default', 'App', 1589811544, 11);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(10) UNSIGNED NOT NULL,
  `subscribed` tinyint(1) NOT NULL DEFAULT 0,
  `not_subscribed` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `user_id`, `channel_id`, `subscribed`, `not_subscribed`, `created_at`, `updated_at`) VALUES
(61, 4, 12, 1, 0, '2020-05-18 08:29:13', '2020-05-18 08:29:13'),
(62, 4, 4, 1, 0, '2020-05-18 08:29:34', '2020-05-18 08:29:34'),
(69, 12, 4, 1, 0, '2020-05-18 13:09:07', '2020-05-18 13:09:07'),
(70, 21, 4, 1, 0, '2020-05-18 13:09:46', '2020-05-18 13:09:46'),
(72, 12, 12, 1, 0, '2020-05-24 15:08:44', '2020-05-24 15:08:44'),
(73, 21, 21, 1, 0, '2020-05-27 05:13:14', '2020-05-27 05:13:14'),
(74, 21, 12, 1, 0, '2020-06-08 04:08:09', '2020-06-08 04:08:09'),
(75, 4, 21, 1, 0, '2020-06-08 13:57:21', '2020-06-08 13:57:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `channel_id` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `verify_key` varchar(255) DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `channel_id`, `username`, `email`, `password`, `verify_key`, `verified`, `created_at`, `updated_at`) VALUES
(4, 'rzh7dWOiqavR', 'ayaneshofficial', 'ayaneshofficial@gmail.com', '$2y$10$dUsus52sVbwxkq3mVD6ZM.pZu3j6hvCHvoA7.SFHKqoY0/PHBLjcO', '66dac9f8f14019b104582e22995755b8', 1, '2020-05-13 09:47:01', '2020-05-13 10:02:57'),
(12, 'rzh7dWOiqaaa', 'ayanesh88', 'ayanesh88@hotmail.com', '$2y$10$u2UCJpaxYArVpjUmKwF.7OaLsKaQZf1GW26T2BxBO8VIELZEe/s7G', 'e50a43fc37af8328edfa974e026c3a8f', 1, '2020-05-13 14:23:43', '2020-05-14 18:14:22'),
(13, 'rzh7dWOiqfrT', 'fullstackayanesh', 'ayanesh@fullstackayanesh.xyz', '$2y$10$MTjL3y01Bzt9qoNfa88B8uoM.D.C6QRkRq3UupeUxg.QUpUsWlzvu', 'f62f3881b88567b0f546493cfb1293d0', 1, '2020-05-13 14:55:19', '2020-05-14 18:14:30'),
(21, 'geAxM82P6vjk', 'ayaneshdev', 'ayanesh@ayaneshdev.xyz', '$2y$10$IGB7Xj0FWoHT6uPgvJNFpub74OwqyAy3UUN9XBGaUXTMyGizERTYm', '6d376677b902dd246349e0728a54602c', 1, '2020-05-17 18:51:38', '2020-05-17 18:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `video_name` varchar(255) NOT NULL,
  `video_slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `is_published` tinyint(1) NOT NULL DEFAULT 0,
  `is_unlisted` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `user_id`, `video_name`, `video_slug`, `title`, `description`, `thumbnail`, `tags`, `is_published`, `is_unlisted`, `created_at`, `updated_at`) VALUES
(25, 12, '1589308849_281802b8f7317603333a.mp4', 'bzurxn8fNM', 'Natalia Lafourcade | Amor, Amor de Mis Amores (En Vivo)', 'One of the great songs that I like. I love this song.', '1589309130_7700661a0605734aa352.jpg', 'music,natalia', 1, 0, '2020-05-12 13:10:49', '2020-05-19 16:49:38'),
(60, 4, '1589484874_f1f0331c4948047bbe8f.mp4', 'IVS1Rspx2K', 'The HU - Wolf Totem (Official Music Video)', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.\r\n\r\n It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1589484900_8a8290a95ce858a35275.jpg', 'music', 1, 0, '2020-05-14 19:34:34', '2020-05-14 19:35:44'),
(63, 12, '1589830964_4ae6506b6cb869c01809.mp4', 'cWUoQbFONd', 'Juan Gabriel - Hasta Que Te Conocí', 'Letra de Hasta Que Te Conocí\r\n\r\nNo sabia, de tristezas, ni de lágrimas\r\nNi nada, que me hicieran llorar\r\nYo sabía de cariño, de ternura\r\nPorque a mí­ desde pequeño\r\nEso me enseño mamá, eso me enseño mamá\r\nEso y muchas cosas más\r\nYo jamás sufrí, yo jamás lloré\r\nYo era muy feliz, yo vivía muy bien\r\n\r\nYo vivía tan distinto, algo hermoso\r\nAlgo divino, lleno de felicidad\r\nYo sabia de alegrías, la belleza de la vida\r\nPero no de soledad, pero no de soledad\r\nDe eso y muchas cosas más\r\nYo jamás sufrí, yo jamás lloré\r\nYo era muy feliz, yo vivía muy bien\r\n\r\nHasta que te conocí\r\nVi la vida con dolor\r\nNo te miento fui feliz\r\nAunque con muy poco amor\r\nY muy tarde comprendí\r\nQue no te debía amar\r\nPorque ahora pienso en ti\r\nMás que ayer, mucho más\r\n\r\nYo jamás sufrí, yo jamás lloré\r\nYo era muy feliz\r\nPero te encontré\r\n\r\nYo no quiero que me digas\r\nSi valía o no la pena\r\nEl haberte conocido\r\nPorque no te creo más\r\nY es que tú fuiste muy mala\r\nSi muy mala conmigo\r\nPor eso no te quiero\r\nNo te quiero ver jamás', '1589831004_6d0db9249336dd3f0e05.jpg', 'music', 1, 0, '2020-05-18 19:42:44', '2020-05-18 19:43:42'),
(64, 21, '1589891774_c8f75ade00d4a2b1573f.mp4', 'bv1czaKnA7', 'Natalia Lafourcade - Nunca Es Suficiente', 'NUNCA ES SUFICIENTE\r\n\r\nNunca es suficiente para mí.\r\nPorque siempre quiero más de ti.\r\nYo quisiera hacerte más feliz.\r\nHoy, mañana, siempre, hasta el fin.\r\n\r\nMi corazón estalla por tu amor.\r\nY tú que crees que esto es muy normal.\r\nAcostumbrado estás tanto al amor.\r\nQue no lo ves yo nunca he estado así.\r\n\r\nSi de casualidad me ves llorando un poco es porque yo te quiero a ti.\r\n\r\nY tú te vas jugando a enamorar.\r\nTodas las ilusiones vagabundas que se dejan alcanzar.\r\nY no verás que lo que yo te ofrezco es algo incondicional.\r\n\r\nY tú te vas jugando a enamorar.\r\nTe enredas por las noches entre historias que nunca tienen final.\r\nTe perderás dentro de mis recuerdos por haberme hecho llorar.\r\n\r\nNunca es suficiente para mí.\r\nPorque siempre quiero más de ti.\r\nNo ha cambiado nada mi sentir.\r\nAunque me haces mal te quiero aquí.\r\n\r\nMi corazón estalla de dolor.\r\n\r\nCómo evitar que se fracture en mil.\r\nAcostumbrado estás tanto al amor.\r\nQue no lo ves yo nunca he estado así.\r\n\r\nSi de casualidad me ves llorando un poco es porque yo te quiero a ti.\r\n\r\nY tú te vas jugando a enamorar\r\n\r\nMusic video by Natalia Lafourcade performing Nunca Es Suficiente. (C) 2016 Sony Music Entertainment México, S.A. de C.V.', '1589891805_cbff97fbb78567a1f006.jpg', 'music', 1, 0, '2020-05-19 12:36:14', '2020-05-19 16:57:10');

-- --------------------------------------------------------

--
-- Table structure for table `viewes`
--

CREATE TABLE `viewes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `video_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `viewes`
--

INSERT INTO `viewes` (`id`, `user_id`, `video_id`, `created_at`, `updated_at`) VALUES
(3, 4, 60, '2020-05-15 07:27:16', '2020-05-15 07:27:16'),
(4, 4, 60, '2020-05-15 07:30:38', '2020-05-15 07:30:38'),
(5, 4, 60, '2020-05-15 07:30:43', '2020-05-15 07:30:43'),
(6, 4, 60, '2020-05-15 07:31:17', '2020-05-15 07:31:17'),
(7, 4, 60, '2020-05-15 07:32:05', '2020-05-15 07:32:05'),
(8, 4, 60, '2020-05-15 07:33:59', '2020-05-15 07:33:59'),
(12, 4, 25, '2020-05-15 07:38:30', '2020-05-15 07:38:30'),
(13, 4, 60, '2020-05-15 07:40:43', '2020-05-15 07:40:43'),
(17, 4, 25, '2020-05-15 07:48:27', '2020-05-15 07:48:27'),
(22, 4, 60, '2020-05-15 13:06:30', '2020-05-15 13:06:30'),
(23, 4, 60, '2020-05-15 13:06:35', '2020-05-15 13:06:35'),
(24, 4, 25, '2020-05-15 13:27:35', '2020-05-15 13:27:35'),
(26, 4, 25, '2020-05-15 14:29:34', '2020-05-15 14:29:34'),
(27, 4, 25, '2020-05-15 14:43:27', '2020-05-15 14:43:27'),
(28, 4, 25, '2020-05-15 14:43:49', '2020-05-15 14:43:49'),
(29, 4, 25, '2020-05-15 14:44:38', '2020-05-15 14:44:38'),
(30, 4, 25, '2020-05-15 14:45:07', '2020-05-15 14:45:07'),
(31, 4, 25, '2020-05-15 14:45:27', '2020-05-15 14:45:27'),
(32, 4, 25, '2020-05-15 15:15:44', '2020-05-15 15:15:44'),
(33, 4, 25, '2020-05-15 15:21:14', '2020-05-15 15:21:14'),
(35, 4, 25, '2020-05-15 17:05:24', '2020-05-15 17:05:24'),
(39, 4, 25, '2020-05-15 17:06:48', '2020-05-15 17:06:48'),
(40, 4, 25, '2020-05-15 17:15:26', '2020-05-15 17:15:26'),
(223, 12, 25, '2020-05-17 10:16:22', '2020-05-17 10:16:22'),
(224, 12, 25, '2020-05-17 10:18:25', '2020-05-17 10:18:25'),
(225, 12, 25, '2020-05-17 10:34:41', '2020-05-17 10:34:41'),
(226, 12, 25, '2020-05-17 10:35:09', '2020-05-17 10:35:09'),
(227, 12, 25, '2020-05-17 10:37:19', '2020-05-17 10:37:19'),
(228, 12, 25, '2020-05-17 10:37:21', '2020-05-17 10:37:21'),
(229, 12, 25, '2020-05-17 10:37:58', '2020-05-17 10:37:58'),
(230, 12, 25, '2020-05-17 10:38:03', '2020-05-17 10:38:03'),
(231, 12, 25, '2020-05-17 10:40:04', '2020-05-17 10:40:04'),
(232, 12, 25, '2020-05-17 10:40:19', '2020-05-17 10:40:19'),
(233, 12, 25, '2020-05-17 10:41:00', '2020-05-17 10:41:00'),
(234, 12, 25, '2020-05-17 10:41:01', '2020-05-17 10:41:01'),
(235, 12, 25, '2020-05-17 10:46:29', '2020-05-17 10:46:29'),
(236, 12, 25, '2020-05-17 10:46:43', '2020-05-17 10:46:43'),
(247, 12, 25, '2020-05-17 10:56:47', '2020-05-17 10:56:47'),
(279, 12, 25, '2020-05-17 13:19:03', '2020-05-17 13:19:03'),
(280, 12, 25, '2020-05-17 13:19:07', '2020-05-17 13:19:07'),
(281, 12, 25, '2020-05-17 13:19:12', '2020-05-17 13:19:12'),
(282, 12, 25, '2020-05-17 13:19:15', '2020-05-17 13:19:15'),
(285, 12, 25, '2020-05-17 13:19:26', '2020-05-17 13:19:26'),
(292, 12, 25, '2020-05-17 13:23:53', '2020-05-17 13:23:53'),
(294, 12, 25, '2020-05-17 13:23:58', '2020-05-17 13:23:58'),
(295, 12, 25, '2020-05-17 13:26:52', '2020-05-17 13:26:52'),
(300, 12, 25, '2020-05-17 13:28:56', '2020-05-17 13:28:56'),
(305, 12, 25, '2020-05-17 13:56:30', '2020-05-17 13:56:30'),
(318, 12, 25, '2020-05-17 14:05:30', '2020-05-17 14:05:30'),
(336, 12, 60, '2020-05-17 14:24:02', '2020-05-17 14:24:02'),
(342, 12, 60, '2020-05-17 14:25:12', '2020-05-17 14:25:12'),
(372, 12, 25, '2020-05-17 14:43:56', '2020-05-17 14:43:56'),
(435, 12, 60, '2020-05-17 19:56:17', '2020-05-17 19:56:17'),
(438, 12, 25, '2020-05-17 20:00:30', '2020-05-17 20:00:30'),
(444, 12, 25, '2020-05-17 20:24:31', '2020-05-17 20:24:31'),
(445, 12, 60, '2020-05-17 20:24:35', '2020-05-17 20:24:35'),
(449, 12, 25, '2020-05-17 20:24:50', '2020-05-17 20:24:50'),
(455, 12, 60, '2020-05-17 20:25:23', '2020-05-17 20:25:23'),
(462, 12, 60, '2020-05-17 20:26:02', '2020-05-17 20:26:02'),
(476, 12, 60, '2020-05-18 05:01:38', '2020-05-18 05:01:38'),
(483, 12, 60, '2020-05-18 05:51:20', '2020-05-18 05:51:20'),
(484, 12, 60, '2020-05-18 06:01:00', '2020-05-18 06:01:00'),
(489, 12, 60, '2020-05-18 06:34:07', '2020-05-18 06:34:07'),
(497, 12, 60, '2020-05-18 07:50:13', '2020-05-18 07:50:13'),
(499, 12, 60, '2020-05-18 08:09:24', '2020-05-18 08:09:24'),
(501, 12, 60, '2020-05-18 08:26:26', '2020-05-18 08:26:26'),
(504, 4, 60, '2020-05-18 08:29:31', '2020-05-18 08:29:31'),
(506, 12, 60, '2020-05-18 08:30:08', '2020-05-18 08:30:08'),
(508, 12, 60, '2020-05-18 09:17:58', '2020-05-18 09:17:58'),
(510, 12, 60, '2020-05-18 09:26:04', '2020-05-18 09:26:04'),
(515, 12, 60, '2020-05-18 13:09:02', '2020-05-18 13:09:02'),
(516, 21, 60, '2020-05-18 13:09:41', '2020-05-18 13:09:41'),
(525, 4, 25, '2020-05-18 15:10:37', '2020-05-18 15:10:37'),
(526, 4, 25, '2020-05-18 15:14:56', '2020-05-18 15:14:56'),
(527, 4, 25, '2020-05-18 15:15:53', '2020-05-18 15:15:53'),
(528, 4, 25, '2020-05-18 15:16:13', '2020-05-18 15:16:13'),
(529, 4, 25, '2020-05-18 15:17:17', '2020-05-18 15:17:17'),
(530, 4, 25, '2020-05-18 15:17:48', '2020-05-18 15:17:48'),
(531, 4, 25, '2020-05-18 15:19:37', '2020-05-18 15:19:37'),
(532, 4, 25, '2020-05-18 15:19:58', '2020-05-18 15:19:58'),
(533, 4, 25, '2020-05-18 15:20:08', '2020-05-18 15:20:08'),
(534, 4, 25, '2020-05-18 15:21:05', '2020-05-18 15:21:05'),
(535, 4, 25, '2020-05-18 15:21:37', '2020-05-18 15:21:37'),
(536, 4, 25, '2020-05-18 15:22:06', '2020-05-18 15:22:06'),
(537, 4, 25, '2020-05-18 15:22:08', '2020-05-18 15:22:08'),
(538, 4, 25, '2020-05-18 15:22:23', '2020-05-18 15:22:23'),
(539, 4, 25, '2020-05-18 15:22:33', '2020-05-18 15:22:33'),
(540, 4, 25, '2020-05-18 15:22:36', '2020-05-18 15:22:36'),
(541, 4, 25, '2020-05-18 15:23:34', '2020-05-18 15:23:34'),
(542, 4, 25, '2020-05-18 15:24:33', '2020-05-18 15:24:33'),
(543, 4, 25, '2020-05-18 15:24:35', '2020-05-18 15:24:35'),
(544, 4, 25, '2020-05-18 15:25:39', '2020-05-18 15:25:39'),
(545, 4, 25, '2020-05-18 15:25:42', '2020-05-18 15:25:42'),
(546, 4, 25, '2020-05-18 15:27:13', '2020-05-18 15:27:13'),
(547, 4, 25, '2020-05-18 15:27:52', '2020-05-18 15:27:52'),
(548, 4, 25, '2020-05-18 15:28:23', '2020-05-18 15:28:23'),
(549, 4, 25, '2020-05-18 15:28:41', '2020-05-18 15:28:41'),
(550, 4, 25, '2020-05-18 15:28:46', '2020-05-18 15:28:46'),
(551, 4, 25, '2020-05-18 15:28:48', '2020-05-18 15:28:48'),
(552, 4, 25, '2020-05-18 15:29:20', '2020-05-18 15:29:20'),
(553, 4, 25, '2020-05-18 15:29:34', '2020-05-18 15:29:34'),
(554, 4, 25, '2020-05-18 15:29:39', '2020-05-18 15:29:39'),
(555, 4, 25, '2020-05-18 15:30:47', '2020-05-18 15:30:47'),
(556, 4, 25, '2020-05-18 15:30:56', '2020-05-18 15:30:56'),
(557, 4, 25, '2020-05-18 15:32:03', '2020-05-18 15:32:03'),
(558, 4, 25, '2020-05-18 15:32:05', '2020-05-18 15:32:05'),
(559, 4, 25, '2020-05-18 15:36:35', '2020-05-18 15:36:35'),
(560, 4, 60, '2020-05-18 15:38:35', '2020-05-18 15:38:35'),
(562, 4, 60, '2020-05-18 15:38:55', '2020-05-18 15:38:55'),
(567, 12, 63, '2020-05-18 19:43:48', '2020-05-18 19:43:48'),
(568, 12, 63, '2020-05-18 19:46:39', '2020-05-18 19:46:39'),
(570, 12, 63, '2020-05-18 19:48:36', '2020-05-18 19:48:36'),
(571, 12, 25, '2020-05-18 19:49:28', '2020-05-18 19:49:28'),
(572, 12, 25, '2020-05-18 19:52:51', '2020-05-18 19:52:51'),
(573, 12, 63, '2020-05-18 19:57:11', '2020-05-18 19:57:11'),
(574, 12, 63, '2020-05-18 19:57:31', '2020-05-18 19:57:31'),
(575, 12, 63, '2020-05-18 20:05:56', '2020-05-18 20:05:56'),
(576, 12, 63, '2020-05-18 20:06:21', '2020-05-18 20:06:21'),
(577, 12, 63, '2020-05-18 20:06:57', '2020-05-18 20:06:57'),
(578, 12, 63, '2020-05-18 20:08:21', '2020-05-18 20:08:21'),
(579, 12, 63, '2020-05-18 20:09:52', '2020-05-18 20:09:52'),
(580, 12, 63, '2020-05-18 20:10:00', '2020-05-18 20:10:00'),
(581, 12, 25, '2020-05-18 20:13:02', '2020-05-18 20:13:02'),
(582, 12, 63, '2020-05-18 20:13:09', '2020-05-18 20:13:09'),
(584, 12, 25, '2020-05-18 20:13:17', '2020-05-18 20:13:17'),
(585, 12, 63, '2020-05-19 06:11:30', '2020-05-19 06:11:30'),
(586, 12, 63, '2020-05-19 06:17:03', '2020-05-19 06:17:03'),
(587, 12, 63, '2020-05-19 06:42:35', '2020-05-19 06:42:35'),
(588, 12, 63, '2020-05-19 08:23:07', '2020-05-19 08:23:07'),
(589, 12, 63, '2020-05-19 08:23:16', '2020-05-19 08:23:16'),
(590, 12, 63, '2020-05-19 08:23:22', '2020-05-19 08:23:22'),
(591, 12, 63, '2020-05-19 08:23:23', '2020-05-19 08:23:23'),
(592, 12, 63, '2020-05-19 08:23:27', '2020-05-19 08:23:27'),
(593, 12, 63, '2020-05-19 08:23:34', '2020-05-19 08:23:34'),
(594, 21, 64, '2020-05-19 12:36:52', '2020-05-19 12:36:52'),
(595, 21, 64, '2020-05-19 12:45:14', '2020-05-19 12:45:14'),
(596, 21, 64, '2020-05-19 13:02:21', '2020-05-19 13:02:21'),
(597, 21, 60, '2020-05-19 13:02:38', '2020-05-19 13:02:38'),
(598, 21, 63, '2020-05-19 14:29:32', '2020-05-19 14:29:32'),
(599, 21, 25, '2020-05-19 14:29:36', '2020-05-19 14:29:36'),
(600, 21, 25, '2020-05-19 14:29:43', '2020-05-19 14:29:43'),
(601, 21, 64, '2020-05-19 14:29:55', '2020-05-19 14:29:55'),
(602, 21, 63, '2020-05-19 14:30:12', '2020-05-19 14:30:12'),
(603, 21, 64, '2020-05-19 14:32:12', '2020-05-19 14:32:12'),
(604, 21, 64, '2020-05-19 14:37:11', '2020-05-19 14:37:11'),
(605, 21, 64, '2020-05-19 14:39:59', '2020-05-19 14:39:59'),
(606, 21, 64, '2020-05-19 14:45:43', '2020-05-19 14:45:43'),
(607, 21, 64, '2020-05-19 14:45:46', '2020-05-19 14:45:46'),
(608, 21, 64, '2020-05-19 14:45:49', '2020-05-19 14:45:49'),
(609, 21, 64, '2020-05-19 14:45:50', '2020-05-19 14:45:50'),
(610, 21, 64, '2020-05-19 14:45:56', '2020-05-19 14:45:56'),
(611, 21, 64, '2020-05-19 14:46:36', '2020-05-19 14:46:36'),
(612, 21, 64, '2020-05-19 14:56:09', '2020-05-19 14:56:09'),
(613, 21, 64, '2020-05-19 14:56:24', '2020-05-19 14:56:24'),
(614, 21, 64, '2020-05-19 14:57:06', '2020-05-19 14:57:06'),
(615, 21, 64, '2020-05-19 14:57:18', '2020-05-19 14:57:18'),
(616, 21, 64, '2020-05-19 14:57:33', '2020-05-19 14:57:33'),
(617, 21, 64, '2020-05-19 15:02:22', '2020-05-19 15:02:22'),
(618, 21, 64, '2020-05-19 15:02:26', '2020-05-19 15:02:26'),
(619, 21, 64, '2020-05-19 15:02:34', '2020-05-19 15:02:34'),
(620, 21, 64, '2020-05-19 15:02:35', '2020-05-19 15:02:35'),
(621, 21, 64, '2020-05-19 15:37:27', '2020-05-19 15:37:27'),
(622, 21, 64, '2020-05-19 15:37:41', '2020-05-19 15:37:41'),
(623, 21, 64, '2020-05-19 15:53:43', '2020-05-19 15:53:43'),
(624, 21, 64, '2020-05-19 15:56:13', '2020-05-19 15:56:13'),
(625, 21, 64, '2020-05-19 15:56:28', '2020-05-19 15:56:28'),
(626, 21, 64, '2020-05-19 16:39:19', '2020-05-19 16:39:19'),
(627, 12, 64, '2020-05-19 16:48:06', '2020-05-19 16:48:06'),
(628, 12, 64, '2020-05-19 16:48:16', '2020-05-19 16:48:16'),
(629, 12, 25, '2020-05-19 16:48:24', '2020-05-19 16:48:24'),
(630, 12, 64, '2020-05-19 16:49:41', '2020-05-19 16:49:41'),
(631, 12, 64, '2020-05-19 16:50:56', '2020-05-19 16:50:56'),
(632, 12, 64, '2020-05-19 16:53:26', '2020-05-19 16:53:26'),
(633, 12, 64, '2020-05-19 16:54:27', '2020-05-19 16:54:27'),
(634, 12, 64, '2020-05-19 16:55:00', '2020-05-19 16:55:00'),
(635, 12, 25, '2020-05-19 16:56:14', '2020-05-19 16:56:14'),
(636, 21, 64, '2020-05-19 16:56:51', '2020-05-19 16:56:51'),
(637, 21, 64, '2020-05-19 16:57:14', '2020-05-19 16:57:14'),
(639, 12, 25, '2020-05-19 19:58:26', '2020-05-19 19:58:26'),
(640, 12, 25, '2020-05-19 19:58:50', '2020-05-19 19:58:50'),
(642, 12, 63, '2020-05-19 20:21:59', '2020-05-19 20:21:59'),
(643, 12, 25, '2020-05-19 20:23:52', '2020-05-19 20:23:52'),
(644, 12, 25, '2020-05-19 20:24:52', '2020-05-19 20:24:52'),
(646, 12, 64, '2020-05-19 20:28:18', '2020-05-19 20:28:18'),
(647, 12, 64, '2020-05-20 06:14:02', '2020-05-20 06:14:02'),
(649, 12, 63, '2020-05-24 15:19:29', '2020-05-24 15:19:29'),
(650, 12, 63, '2020-05-24 15:20:16', '2020-05-24 15:20:16'),
(651, 12, 63, '2020-05-24 15:20:38', '2020-05-24 15:20:38'),
(652, 12, 63, '2020-05-24 15:21:26', '2020-05-24 15:21:26'),
(661, 4, 25, '2020-05-30 09:37:28', '2020-05-30 09:37:28'),
(663, 21, 60, '2020-06-02 17:18:56', '2020-06-02 17:18:56'),
(665, 21, 25, '2020-06-02 17:31:27', '2020-06-02 17:31:27'),
(678, 12, 25, '2020-07-08 17:19:15', '2020-07-08 17:19:15'),
(680, 12, 60, '2021-02-03 19:59:13', '2021-02-03 19:59:13'),
(681, 12, 60, '2021-02-03 19:59:15', '2021-02-03 19:59:15'),
(690, 12, 64, '2021-02-03 20:04:03', '2021-02-03 20:04:03'),
(691, 21, 64, '2021-02-03 20:05:44', '2021-02-03 20:05:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `likes_user_id_foreign` (`user_id`),
  ADD KEY `video_id` (`video_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribers_channel_id_foreign` (`channel_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `videos_user_id_foreign` (`user_id`);

--
-- Indexes for table `viewes`
--
ALTER TABLE `viewes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `viewes_user_id_foreign` (`user_id`),
  ADD KEY `video_id` (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `viewes`
--
ALTER TABLE `viewes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=694;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `subscribers_channel_id_foreign` FOREIGN KEY (`channel_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `viewes`
--
ALTER TABLE `viewes`
  ADD CONSTRAINT `viewes_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viewes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
