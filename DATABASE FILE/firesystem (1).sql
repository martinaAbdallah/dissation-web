-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 19, 2022 at 03:51 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firesystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `markets`
--
--

DROP TABLE IF EXISTS `media`;
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

-- DROP TABLE IF EXISTS `migrations`;
-- CREATE TABLE IF NOT EXISTS `migrations` (
--   `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
--   `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
--   `batch` int(11) NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reading`
--

-- DROP TABLE IF EXISTS `reading`;
-- CREATE TABLE IF NOT EXISTS `reading` (
--   `id` int(50) NOT NULL AUTO_INCREMENT,
--   `Temperature` int(100) NOT NULL,
--   `Flame` int(100) NOT NULL,
--   `Noticifications` int(100) NOT NULL,
--   `Time` datetime(6) NOT NULL,
--   PRIMARY KEY (`id`)
-- ) ENGINE=MyISAM AUTO_INCREMENT=302 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reading`
--

-- INSERT INTO `reading` (`id`, `Temperature`, `Flame`, `Noticifications`, `Time`) VALUES
-- (1, 28, 1, 1, '2022-06-04 18:35:29.418192'),
-- (2, 28, 1, 1, '2022-06-04 18:35:29.418192'),
-- (3, 29, 0, 0, '2022-06-04 18:35:29.418197'),
-- (282, 29, 0, 0, '2022-06-07 20:27:41.000000'),
-- (283, 29, 0, 0, '2022-06-07 20:27:41.000000'),
-- (284, 29, 0, 0, '2022-06-07 20:27:41.000000'),
-- (285, 29, 0, 0, '2022-06-07 20:27:41.000000'),
-- (286, 29, 0, 0, '2022-06-07 20:32:03.000000'),
-- (287, 29, 0, 0, '2022-06-07 20:32:03.000000'),
-- (288, 29, 0, 0, '2022-06-07 20:32:03.000000'),
-- (289, 29, 1, 1, '2022-06-07 20:32:18.000000'),
-- (290, 29, 0, 0, '2022-06-07 20:32:18.000000'),
-- (291, 29, 0, 0, '2022-06-07 20:32:18.000000'),
-- (292, 29, 0, 0, '2022-06-07 20:32:18.000000'),
-- (293, 29, 0, 0, '2022-06-07 20:32:18.000000'),
-- (294, 29, 1, 1, '2022-06-07 20:32:18.000000'),
-- (296, 0, 0, 0, '0000-00-00 00:00:00.000000'),
-- (297, 0, 0, 0, '0000-00-00 00:00:00.000000'),
-- (298, 29, 0, 0, '2022-06-08 13:52:00.000000'),
-- (299, 29, 0, 0, '2022-06-08 13:52:00.000000'),
-- (300, 29, 0, 0, '2022-06-08 13:52:00.000000'),
-- (301, 0, 0, 0, '0000-00-00 00:00:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_level` (`user_level`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(8, 'Eliaza', 'eliaza@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, '2osbwnso8.jpg', 1, '2022-06-08 10:23:16'),
(29, 'anna', 'anna@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 'no_image.jpg', 1, NULL),
(33, 'amina', 'amina', '1234', 2, 'no_image.jpg', 0, '2022-06-20 00:00:00'),
(34, 'amina', 'amina', '1234', 2, 'no_image.jpg', 0, '2022-06-20 00:00:00'),
(35, 'Martina', 'martinaabdallah203@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, 'no_image.jpg', 1, '2022-06-19 05:05:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `group_level` (`group_level`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
(1, 'Admin', 1, 1),
(3, 'User', 2, 1);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
