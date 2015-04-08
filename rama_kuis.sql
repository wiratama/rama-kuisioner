-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2015 at 09:34 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rama_kuis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `level` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `firstname`, `lastname`, `level`) VALUES
(1, 'arya@alamaya.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'arya', 'wiratama', 1);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `id_answer` int(11) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) DEFAULT NULL,
  `reasonable` tinyint(1) DEFAULT NULL,
  `answer` text,
  `skor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_answer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id_answer`, `id_question`, `reasonable`, `answer`, `skor`) VALUES
(2, 1, 0, 'Magazine', 5),
(10, 3, 0, 'Family', 5),
(11, 3, 0, 'Friends', 5),
(12, 3, 0, 'Couple', 10),
(13, 3, 0, 'Alone', 5),
(14, 4, 0, 'Food', 10),
(15, 4, 0, 'Service', 10),
(16, 4, 0, 'Atmosphere', 10),
(17, 4, 0, 'Entertainment', 10),
(18, 5, 0, 'First Time', NULL),
(19, 5, 0, 'Second Times', NULL),
(20, 5, 0, 'More than Two Times', NULL),
(21, 6, 0, 'Asian', NULL),
(22, 6, 0, 'Balinese', NULL),
(23, 6, 0, 'Western', NULL),
(24, 6, 1, 'Others', NULL),
(25, 7, 0, 'Below averages', NULL),
(26, 7, 0, 'Reasonable', NULL),
(27, 7, 0, 'Unacceptable', NULL),
(28, 8, 0, 'Below Averages', NULL),
(29, 8, 0, 'Reasonable', NULL),
(30, 8, 0, 'Unacceptable', NULL),
(31, 9, 0, '20 minutes', 20),
(32, 9, 0, '25 minutes', 15),
(33, 9, 0, '30 minutes', 10),
(34, 9, 0, 'Does Not Matter', 10),
(35, 10, 0, 'Traditional Music', NULL),
(36, 10, 0, 'Modern Music', NULL),
(37, 10, 1, 'Others', NULL),
(38, 11, 0, 'Very likely', NULL),
(39, 11, 0, 'Likely', NULL),
(40, 11, 1, 'Unlikely, because', NULL),
(50, 1, 0, 'Agent', 10),
(51, 1, 0, 'Friend', 5),
(52, 1, 0, 'Internet', 5),
(53, 1, 0, 'Passed by', 5);

-- --------------------------------------------------------

--
-- Table structure for table `answer_description`
--

CREATE TABLE IF NOT EXISTS `answer_description` (
  `id_answer_description` int(11) NOT NULL AUTO_INCREMENT,
  `id_language` int(11) DEFAULT NULL,
  `id_answer` int(11) DEFAULT NULL,
  `answer` text,
  PRIMARY KEY (`id_answer_description`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) DEFAULT NULL,
  `store_number` varchar(255) DEFAULT NULL,
  `comment` text,
  PRIMARY KEY (`id_comment`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_customer`, `store_number`, `comment`) VALUES
(2, 4, 'rama-123-xx', 'nice'),
(3, 5, 'rama-123-xx', 'nice bro');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(300) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `nationality` varchar(300) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `validation_number` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `name`, `address`, `contact`, `nationality`, `email`, `validation_number`) VALUES
(4, 'nana alamaya', 'PCA biaung A25`', '1122334455', 'indonesia', 'nana@alamaya.com', '8615377581'),
(5, 'alamaya', 'PCA biaung A25`', '1122334455', 'indonesia', 'arya@alamaya.com', '424935291');

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id_language` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_language`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id_language`, `name`, `code`, `image`) VALUES
(1, 'English', 'en', 'imglangpng-1428389795.png'),
(2, 'Indonesia', 'ina', '100png-1428467577.png');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `question` text,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `question`, `type`) VALUES
(1, 'How did you know about us?', 'checkbox'),
(3, 'Who were you here with?', 'checkbox'),
(4, 'What do you like most about us??', 'checkbox'),
(5, 'How many times have you been to our Restaurant?', 'checkbox'),
(6, 'What is your favorite Food?', 'checkbox'),
(7, 'Please rate our Food Prices?', 'checkbox'),
(8, 'Please rate our Beverage Prices?', 'checkbox'),
(9, 'What is your expected food delivery time (from ordering time)', 'checkbox'),
(10, 'What kind of entertainment would you prefer in our Restaurant?', 'checkbox'),
(11, 'What is your likelihood to return?', 'checkbox');

-- --------------------------------------------------------

--
-- Table structure for table `question_description`
--

CREATE TABLE IF NOT EXISTS `question_description` (
  `id_question_description` int(11) NOT NULL AUTO_INCREMENT,
  `id_question` int(11) DEFAULT NULL,
  `id_language` int(11) DEFAULT NULL,
  `question` text,
  PRIMARY KEY (`id_question_description`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
  `store_number` varchar(255) NOT NULL DEFAULT '',
  `address` text,
  PRIMARY KEY (`store_number`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`store_number`, `address`) VALUES
('rama-123-xx', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
('rama-345-xx', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

-- --------------------------------------------------------

--
-- Table structure for table `survey_question_answer`
--

CREATE TABLE IF NOT EXISTS `survey_question_answer` (
  `id_survey` int(11) NOT NULL AUTO_INCREMENT,
  `id_survey_store` int(11) NOT NULL,
  `id_customer` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `id_answer` text NOT NULL,
  `reason` text,
  PRIMARY KEY (`id_survey`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `survey_question_answer`
--

INSERT INTO `survey_question_answer` (`id_survey`, `id_survey_store`, `id_customer`, `id_question`, `id_answer`, `reason`) VALUES
(66, 5, 4, 1, '2', NULL),
(67, 5, 4, 3, '12', 'not alone'),
(68, 5, 4, 4, '16', 'relax'),
(69, 5, 4, 5, '19', NULL),
(70, 5, 4, 6, '24', 'japan'),
(71, 5, 4, 7, '26', NULL),
(72, 5, 4, 8, '29', NULL),
(73, 5, 4, 9, '31', NULL),
(74, 5, 4, 10, '37', 'reggae'),
(75, 5, 4, 11, '39', NULL),
(76, 5, 4, 12, '42', NULL),
(77, 5, 4, 12, '43', 'goodd'),
(78, 5, 4, 13, '46', NULL),
(79, 5, 4, 13, '47', NULL),
(80, 5, 4, 13, '48', NULL),
(81, 6, 5, 1, '2', NULL),
(82, 6, 5, 3, '12', 'not alone'),
(83, 6, 5, 4, '16', 'relax'),
(84, 6, 5, 5, '19', NULL),
(85, 6, 5, 6, '24', 'japan'),
(86, 6, 5, 7, '26', NULL),
(87, 6, 5, 8, '29', NULL),
(88, 6, 5, 9, '31', NULL),
(89, 6, 5, 10, '37', 'reggae'),
(90, 6, 5, 11, '39', NULL),
(91, 6, 5, 12, '42', NULL),
(92, 6, 5, 12, '43', 'goodd'),
(93, 6, 5, 13, '46', NULL),
(94, 6, 5, 13, '47', NULL),
(95, 6, 5, 13, '48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `survey_store`
--

CREATE TABLE IF NOT EXISTS `survey_store` (
  `id_survey_store` int(11) NOT NULL AUTO_INCREMENT,
  `store_number` varchar(255) NOT NULL,
  `date_survey` date NOT NULL,
  `struk_number` varchar(255) NOT NULL,
  PRIMARY KEY (`id_survey_store`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `survey_store`
--

INSERT INTO `survey_store` (`id_survey_store`, `store_number`, `date_survey`, `struk_number`) VALUES
(5, 'rama-123-xx', '2015-04-06', 'amxx'),
(6, 'rama-123-xx', '2015-04-30', 'amxx');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
