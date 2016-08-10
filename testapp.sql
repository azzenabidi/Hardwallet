-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2016 at 12:47 PM
-- Server version: 5.5.49-MariaDB-1ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'Materiel Affecté', 'materiel à la disposition du personnel ', '2016-07-25 21:59:04', '2016-07-25 21:59:04'),
(2, 'Materiel en stock', 'Materiel dans le magasin', '2016-07-25 22:00:29', '2016-07-25 22:00:29'),
(3, 'Materiel Reutilisable', 'Materiel à reutiliser', '2016-07-25 22:01:38', '2016-07-25 22:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `constructors`
--

CREATE TABLE IF NOT EXISTS `constructors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `website` varchar(120) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `address` longtext NOT NULL,
  `phone` varchar(50) NOT NULL,
  `chief_phone` varchar(50) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE IF NOT EXISTS `departments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'Hello', 'yes', '2016-07-25 04:49:10', '2016-07-25 04:49:10');

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE IF NOT EXISTS `materials` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `serial_number` varchar(50) NOT NULL,
  `model_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `constructor_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `serial_number` (`serial_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `serial_number`, `model_id`, `user_id`, `category_id`, `constructor_id`, `created`, `modified`) VALUES
(2, '09876688666 	', 1, 5, 1, 1, '2016-07-26 00:52:34', '2016-08-07 15:15:31'),
(3, '76554567', 1, NULL, 2, 1, '2016-07-28 04:40:11', '2016-08-08 08:59:56'),
(4, '987766555', 1, 5, 1, 1, '2016-08-07 16:17:27', '2016-08-07 16:17:27');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE IF NOT EXISTS `models` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `name`, `description`, `created`, `modified`) VALUES
(1, 'HP620', 'laptop mini', '2016-07-25 22:18:02', '2016-07-25 22:18:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `identity` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `department_id` int(10) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`identity`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `identity`, `name`, `surname`, `phone`, `department_id`, `password`, `role`, `created`, `modified`) VALUES
(5, '2016CJinfo', 'Azzen', 'Abidi', '777777777', 1, '$2y$10$pMjsPyjOvp6XgLskzMfvduMQgiH.lo8PihvVg5af/McW6pSNittq2', 'admin', '2016-07-25 16:52:18', '2016-08-08 20:41:35');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
