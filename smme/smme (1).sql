-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2014 at 08:42 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smme`
--

-- --------------------------------------------------------

--
-- Table structure for table `friend_table`
--

CREATE TABLE IF NOT EXISTS `friend_table` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `friend_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `friend_table`
--

INSERT INTO `friend_table` (`id`, `user_id`, `friend_id`) VALUES
(26, 2, 1),
(27, 1, 2),
(28, 6, 5),
(29, 5, 6),
(30, 1, 8),
(31, 8, 1),
(32, 1, 5),
(33, 5, 1),
(34, 9, 1),
(35, 1, 9),
(36, 9, 2),
(37, 2, 9),
(38, 10, 1),
(39, 1, 10),
(40, 1, 6),
(41, 6, 1),
(42, 1, 2),
(43, 2, 1),
(44, 13, 1),
(45, 1, 13),
(46, 13, 2),
(47, 2, 13),
(48, 13, 5),
(49, 5, 13),
(50, 2, 5),
(51, 5, 2),
(52, 15, 1),
(53, 1, 15),
(54, 15, 2),
(55, 2, 15);

-- --------------------------------------------------------

--
-- Table structure for table `like_table`
--

CREATE TABLE IF NOT EXISTS `like_table` (
  `user_id` int(10) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(10) NOT NULL,
  `friend_id` int(10) NOT NULL,
  `pLike` int(11) NOT NULL,
  `pDislike` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `like_table`
--

INSERT INTO `like_table` (`user_id`, `id`, `post_id`, `friend_id`, `pLike`, `pDislike`, `date`) VALUES
(1, 5, 52, 4, 0, 1, '2014-08-16'),
(1, 6, 52, 4, 0, 1, '2014-08-16'),
(1, 7, 52, 1, 1, 0, '2014-08-16'),
(1, 8, 51, 1, 1, 0, '2014-08-16'),
(1, 9, 50, 1, 0, 1, '2014-08-16'),
(1, 10, 49, 1, 1, 0, '2014-08-16'),
(1, 11, 48, 1, 0, 1, '2014-08-16'),
(1, 12, 47, 1, 1, 0, '2014-08-16'),
(1, 13, 42, 1, 1, 0, '2014-08-16'),
(1, 14, 41, 1, 0, 1, '2014-08-16'),
(1, 15, 40, 1, 1, 0, '2014-08-16'),
(1, 16, 39, 1, 1, 0, '2014-08-16'),
(1, 17, 38, 1, 1, 0, '2014-08-16'),
(13, 18, 46, 1, 1, 0, '2014-08-18'),
(2, 19, 53, 1, 1, 0, '2014-08-18'),
(1, 20, 36, 1, 0, 1, '2014-08-18'),
(13, 21, 43, 1, 0, 1, '2014-08-18'),
(1, 22, 37, 1, 0, 1, '2014-08-18'),
(1, 23, 34, 1, 1, 0, '2014-08-18'),
(1, 24, 35, 1, 1, 0, '2014-08-18'),
(1, 25, 33, 1, 1, 0, '2014-08-18'),
(1, 26, 54, 1, 1, 0, '2014-08-18'),
(1, 27, 55, 1, 0, 1, '2014-08-18'),
(1, 28, 55, 13, 1, 0, '2014-08-18'),
(5, 29, 56, 5, 1, 0, '2014-08-18'),
(1, 30, 55, 5, 1, 0, '2014-08-18'),
(1, 31, 54, 5, 1, 0, '2014-08-18'),
(2, 32, 53, 5, 1, 0, '2014-08-18'),
(1, 33, 52, 5, 0, 1, '2014-08-18'),
(1, 34, 50, 5, 0, 1, '2014-08-18'),
(1, 35, 49, 5, 0, 1, '2014-08-18'),
(5, 36, 57, 5, 1, 0, '2014-08-18'),
(5, 37, 57, 1, 1, 0, '2014-08-19'),
(1, 38, 58, 1, 1, 0, '2014-08-19'),
(1, 39, 58, 5, 1, 0, '2014-08-20'),
(1, 40, 47, 5, 1, 0, '2014-08-20'),
(13, 41, 46, 5, 1, 0, '2014-08-20'),
(1, 42, 41, 5, 1, 0, '2014-08-20'),
(1, 43, 58, 15, 1, 0, '2014-08-28'),
(1, 44, 55, 15, 1, 0, '2014-08-28'),
(1, 45, 54, 15, 1, 0, '2014-08-28'),
(2, 46, 53, 15, 1, 0, '2014-08-28'),
(1, 47, 52, 15, 0, 1, '2014-08-28'),
(1, 48, 51, 15, 1, 0, '2014-08-28'),
(1, 49, 50, 15, 1, 0, '2014-08-28'),
(1, 50, 49, 15, 1, 0, '2014-08-28'),
(1, 51, 48, 15, 1, 0, '2014-08-28'),
(1, 52, 47, 15, 1, 0, '2014-08-28'),
(1, 53, 42, 15, 1, 0, '2014-08-28');

-- --------------------------------------------------------

--
-- Table structure for table `pending_request`
--

CREATE TABLE IF NOT EXISTS `pending_request` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `friend_id` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `pending_request`
--

INSERT INTO `pending_request` (`id`, `user_id`, `friend_id`) VALUES
(3, 1, 7),
(4, 1, 10),
(5, 5, 11),
(6, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `post_table`
--

CREATE TABLE IF NOT EXISTS `post_table` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `post_type` int(1) NOT NULL,
  `subject` text NOT NULL,
  `post` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  UNIQUE KEY `post_id_2` (`post_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `post_table`
--

INSERT INTO `post_table` (`post_id`, `user_id`, `post_type`, `subject`, `post`, `date`, `time`) VALUES
(33, 1, 1, 'ldjfakls', 'images/09-08-2014-1407583437.jpg', '2014-08-09', '16:23:57'),
(34, 1, 1, '', 'images/09-08-2014-1407583478.jpg', '2014-08-09', '16:24:38'),
(35, 1, 1, '', 'images/09-08-2014-1407583485.jpg', '2014-08-09', '16:24:45'),
(36, 1, 1, 'Hello World', 'images/09-08-2014-1407583494.jpg', '2014-08-09', '16:24:54'),
(37, 1, 1, '', 'images/09-08-2014-1407583785.jpg', '2014-08-09', '16:29:45'),
(38, 1, 1, '', 'images/09-08-2014-1407584945.jpg', '2014-08-09', '16:49:05'),
(39, 1, 1, '', 'images/11-08-2014-1407733543.jpg', '2014-08-11', '10:05:43'),
(40, 1, 1, '', 'images/11-08-2014-1407733622.jpg', '2014-08-11', '10:07:02'),
(41, 1, 1, '', 'images/11-08-2014-1407733638.jpg', '2014-08-11', '10:07:18'),
(42, 1, 1, '', 'images/11-08-2014-1407736343.jpg', '2014-08-11', '10:52:23'),
(43, 13, 1, 'Hello World', 'images/11-08-2014-1407750260.jpg', '2014-08-11', '14:44:20'),
(44, 13, 1, '', 'images/11-08-2014-1407750572.jpg', '2014-08-11', '14:49:32'),
(45, 13, 1, 'Scenary', 'images/11-08-2014-1407750625.jpg', '2014-08-11', '14:50:25'),
(46, 13, 1, '14 August', 'images/11-08-2014-1407753600.jpg', '2014-08-11', '15:40:00'),
(47, 1, 1, 'Independence day', 'images/11-08-2014-1407755424.jpg', '2014-08-11', '16:10:24'),
(48, 1, 1, 'Hello World', 'images/12-08-2014-1407845517.jpg', '2014-08-12', '17:11:57'),
(49, 1, 1, '3D Printing', 'images/12-08-2014-1407845567.jpg', '2014-08-12', '17:12:47'),
(50, 1, 1, 'Hello World', 'images/13-08-2014-1407928126.png', '2014-08-13', '16:08:46'),
(51, 1, 1, '', 'images/13-08-2014-1407928260.jpg', '2014-08-13', '16:11:00'),
(52, 1, 1, '', 'images/16-08-2014-1408183262.jpg', '2014-08-16', '15:01:02'),
(53, 2, 1, 'Table of Member 2', 'images/16-08-2014-1408197658.jpg', '2014-08-16', '19:00:58'),
(54, 1, 1, '', 'images/18-08-2014-1408347965.jpg', '2014-08-18', '12:46:05'),
(55, 1, 1, 'ffff', 'images/18-08-2014-1408347987.jpg', '2014-08-18', '12:46:27'),
(56, 5, 1, 'hello World', 'images/18-08-2014-1408365812.jpg', '2014-08-18', '17:43:32'),
(57, 5, 1, 'Flower', 'images/18-08-2014-1408369860.jpg', '2014-08-18', '18:51:00'),
(58, 1, 1, '', 'images/19-08-2014-1408448414.jpg', '2014-08-19', '16:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE IF NOT EXISTS `user_table` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `DOB` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`,`email`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`user_id`, `name`, `email`, `password`, `DOB`, `gender`, `user_type`, `image`) VALUES
(1, 'Infra', 'infra@infra.com', 'infra', '2014-01-01', 'male', 'corporate', ''),
(2, 'Hello', 'hello@hello.com', 'hello', '2014-05-22', 'male', '', ''),
(5, 'Hello1', 'Hello1@hello.com', 'hello1', '2014-06-12', 'female', '', ''),
(6, 'hello2', 'hello2@hello.com', 'hello2', '2014-06-05', 'female', '', ''),
(7, 'Shahnawaz', 'shah@shah.com', 'shah', '1987-02-04', 'male', '', ''),
(8, 'Ghaznafar', 'ghaznafar@gmail.com', 'ghaznafar', '1990-03-07', 'male', '', ''),
(9, 'Ibrahim', 'ibrahim@abc.com', 'ibrahim', '1996-02-08', 'male', '', ''),
(10, 'Sharjeel', 'sh@sh.com', 'sh', '2014-07-10', 'male', '', ''),
(11, 'alsdjk', 'lksjfals@asldja.com', 'aslaksdjkf', '2002-12-23', 'female', '', 'uploads/53e4cb4ad00e2.jpg'),
(12, 'Shahnawaz', 'shah@shah.com', 'shahnawaz', '1988-12-14', 'male', '', 'uploads/53e4cdeef1b7f.jpg'),
(13, 'Fowler', 'fowler@engr.com', 'fowler', '1970-02-02', 'male', 'corporate', 'uploads/53e850aa27fb4.jpg'),
(15, 'Pirate', 'pirate@gmail.com', 'pirate', '2014-08-09', 'male', 'corporate', 'uploads/53faca3d31caf.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
