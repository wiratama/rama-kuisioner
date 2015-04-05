-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2015 at 05:47 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rama_kuisioner`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id_answer`, `id_question`, `reasonable`, `answer`, `skor`) VALUES
(1, 1, 0, 'Magazine', NULL),
(2, 1, 0, 'Agent', NULL),
(10, 3, 0, 'Family', NULL),
(11, 3, 0, 'Friends', NULL),
(12, 3, 1, 'Couple', NULL),
(13, 3, 0, 'Alone', NULL),
(14, 4, 0, 'Food', NULL),
(15, 4, 0, 'Service', NULL),
(16, 4, 1, 'Atmosphere', NULL),
(17, 4, 0, 'Entertainment', NULL),
(18, 5, 0, 'First time', NULL),
(19, 5, 0, 'Second time', NULL),
(20, 5, 0, 'More than Two Times', NULL),
(21, 6, 0, 'Asian', NULL),
(22, 6, 0, 'Balinese', NULL),
(23, 6, 0, 'Western', NULL),
(24, 6, 1, 'Others,', NULL),
(25, 7, 0, 'Below averages', NULL),
(26, 7, 0, 'Reasonable', NULL),
(27, 7, 0, 'Unacceptable', NULL),
(28, 8, 0, 'Below averages', NULL),
(29, 8, 0, 'Reasonable', NULL),
(30, 8, 0, 'Unacceptable', NULL),
(31, 9, 0, '20 minutes', NULL),
(32, 9, 0, '25 minutes', NULL),
(33, 9, 0, '30 minutes', NULL),
(34, 9, 0, 'Does Not Matter', NULL),
(35, 10, 0, 'Traditional music', NULL),
(36, 10, 0, 'Modern music', NULL),
(37, 10, 1, 'Others,', NULL),
(38, 11, 0, 'Very likely', NULL),
(39, 11, 0, 'Likely', NULL),
(40, 11, 1, 'Unlikely,', NULL),
(41, 12, 0, 'POOR', NULL),
(42, 12, 0, 'AVERANGE', NULL),
(43, 12, 1, 'GOOD', NULL),
(44, 12, 0, 'VERY GOOD', NULL),
(45, 13, 0, 'POOR', NULL),
(46, 13, 0, 'AVERANGE', NULL),
(47, 13, 0, 'GOOD', NULL),
(48, 13, 0, 'VERY GOOD', NULL),
(49, 13, 0, 'EXCELENT', NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `question` text,
  `type` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_question`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `question`, `type`) VALUES
(1, 'How did you know about us?', 'radio'),
(3, 'Who were you here with?', 'radio'),
(4, 'What do you like most about us??', 'radio'),
(5, 'How many times have you been to our Restaurant?', 'radio'),
(6, 'What is your favorite Food?', 'radio'),
(7, 'Please rate our Food Prices?', 'radio'),
(8, 'Please rate our Beverage Prices?', 'radio'),
(9, 'What is your expected food delivery time (from ordering time)', 'radio'),
(10, 'What kind of entertainment would you prefer in our Restaurant?', 'radio'),
(11, 'What is your likelihood to return?', 'radio'),
(12, 'Food Taste', 'checkbox'),
(13, 'Presentation', 'checkbox');

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
('rama-123-xx', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
