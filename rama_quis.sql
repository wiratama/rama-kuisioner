-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2015 at 06:27 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rama_quis`
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=92 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id_answer`, `id_question`, `reasonable`, `answer`, `skor`) VALUES
(50, 14, 0, NULL, NULL),
(51, 14, 0, NULL, NULL),
(52, 14, 0, NULL, NULL),
(53, 14, 0, NULL, NULL),
(54, 14, 0, NULL, NULL),
(55, 15, 0, NULL, NULL),
(56, 15, 0, NULL, NULL),
(57, 15, 0, NULL, NULL),
(58, 15, 0, NULL, NULL),
(59, 16, 0, NULL, NULL),
(60, 16, 0, NULL, NULL),
(61, 16, 0, NULL, NULL),
(62, 16, 0, NULL, NULL),
(63, 17, 0, NULL, NULL),
(64, 17, 0, NULL, NULL),
(65, 17, 0, NULL, NULL),
(66, 18, 0, NULL, NULL),
(67, 18, 0, NULL, NULL),
(68, 18, 0, NULL, NULL),
(69, 18, 0, NULL, NULL),
(70, 19, 0, NULL, NULL),
(71, 19, 0, NULL, NULL),
(72, 19, 0, NULL, NULL),
(73, 20, 0, NULL, NULL),
(74, 20, 0, NULL, NULL),
(75, 20, 0, NULL, NULL),
(76, 21, 0, NULL, NULL),
(77, 21, 0, NULL, NULL),
(78, 21, 0, NULL, NULL),
(79, 21, 0, NULL, NULL),
(83, 23, 0, NULL, NULL),
(84, 23, 0, NULL, NULL),
(85, 23, 1, NULL, NULL),
(89, 25, 0, NULL, NULL),
(90, 25, 0, NULL, NULL),
(91, 25, 1, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `answer_description`
--

INSERT INTO `answer_description` (`id_answer_description`, `id_language`, `id_answer`, `answer`) VALUES
(1, 1, 50, 'Magazine'),
(2, 2, 50, 'Majalah'),
(3, 1, 51, 'Agent'),
(4, 2, 51, 'Agen'),
(5, 1, 52, 'Friend'),
(6, 2, 52, 'Teman'),
(7, 1, 53, 'Internet'),
(8, 2, 53, 'Internet'),
(9, 1, 54, 'Passed by'),
(10, 2, 54, 'Passed by'),
(11, 1, 55, 'Family'),
(12, 2, 55, 'Keluarga'),
(13, 1, 56, 'Friends'),
(14, 2, 56, 'Teman'),
(15, 1, 57, 'Couple'),
(16, 2, 57, 'Pasangan'),
(17, 1, 58, 'Alone'),
(18, 2, 58, 'Sendiri'),
(19, 1, 59, 'Food'),
(20, 2, 59, 'Makanan'),
(21, 1, 60, 'Service'),
(22, 2, 60, 'Pelayanan'),
(23, 1, 61, 'Atmosphere'),
(24, 2, 61, 'Atmosphere'),
(25, 1, 62, 'Entertainment'),
(26, 2, 62, 'Hiburan'),
(27, 1, 63, 'First Time'),
(28, 2, 63, 'Pertama kali'),
(29, 1, 64, 'Second Times'),
(30, 2, 64, 'Kedua kali'),
(31, 1, 65, 'More than Two Times'),
(32, 2, 65, 'Lebih dari dua kali'),
(33, 1, 66, 'Asian'),
(34, 2, 66, 'Asia'),
(35, 1, 67, 'Balinese'),
(36, 2, 67, 'Bali'),
(37, 1, 68, 'Western'),
(38, 2, 68, 'Barat'),
(39, 1, 69, 'Others'),
(40, 2, 69, ' Lainnya'),
(41, 1, 70, 'Below Averages'),
(42, 2, 70, 'Di bawah rata-rata'),
(43, 1, 71, 'Reasonable'),
(44, 2, 71, 'Masuk akal'),
(45, 1, 72, 'Unacceptable'),
(46, 2, 72, 'Tidak dapat diterima'),
(47, 1, 73, 'Below Averages'),
(48, 2, 73, ' Di bawah rata-rata'),
(49, 1, 74, 'Reasonable'),
(50, 2, 74, 'Masuk akal'),
(51, 1, 75, 'Unacceptable'),
(52, 2, 75, 'Tidak dapat diterima'),
(53, 1, 76, '20 minutes'),
(54, 2, 76, '20 menit'),
(55, 1, 77, '25 minutes'),
(56, 2, 77, '25 menit'),
(57, 1, 78, '30 minutes'),
(58, 2, 78, '30 menit'),
(59, 1, 79, 'Does Not Matter'),
(60, 2, 79, 'Tidak masalah'),
(61, 1, 80, 'Traditional music'),
(62, 2, 80, 'Musik tradisional'),
(63, 1, 81, 'Modern music'),
(64, 2, 81, 'Musik Modern'),
(65, 1, 82, 'Others '),
(66, 2, 82, 'Lainnya	'),
(67, 1, 83, 'Traditional music'),
(68, 2, 83, 'Musik tradisional'),
(69, 1, 84, 'Modern music'),
(70, 2, 84, 'Musik Modern'),
(71, 1, 85, 'Others '),
(72, 2, 85, 'Lainnya'),
(73, 1, 86, 'Very likely'),
(74, 2, 86, 'Sangat mungkin'),
(75, 1, 87, 'Likely'),
(76, 2, 87, 'Mungkin'),
(77, 1, 88, 'Unlikely,'),
(78, 2, 88, 'Tidak mungkin,'),
(79, 1, 89, ' Very likely'),
(80, 2, 89, 'Sangat mungkin'),
(81, 1, 90, 'Likely'),
(82, 2, 90, 'Mungkin'),
(83, 1, 91, 'Unlikely,'),
(84, 2, 91, 'Tidak mungkin,');

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
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id_language` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `question`, `type`) VALUES
(14, 'How did you know about us?', 'checkbox'),
(15, 'Who were you here with?', 'checkbox'),
(16, 'What do you like most about us??', 'checkbox'),
(17, 'How many times have you been to our Restaurant?', 'checkbox'),
(18, 'What is your favorite Food?', 'checkbox'),
(19, 'Please rate our Food Prices?', 'checkbox'),
(20, 'Please rate our Beverage Prices?', 'checkbox'),
(21, 'What is your expected food delivery time (from ordering time)', 'checkbox'),
(23, 'What kind of entertainment would you prefer in our Restaurant?', 'checkbox'),
(25, 'What is your likelihood to return?', 'checkbox');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `question_description`
--

INSERT INTO `question_description` (`id_question_description`, `id_question`, `id_language`, `question`) VALUES
(1, 14, 1, 'How did you know about us?'),
(2, 14, 2, 'Bagaimana Anda tahu tentang kami?'),
(3, 15, 1, 'Who were you here with?'),
(4, 15, 2, 'Datang dengan siapa?'),
(5, 16, 1, 'What do you like most about us??'),
(6, 16, 2, 'Apa yang paling Anda sukai tentang kami ??'),
(7, 17, 1, 'How many times have you been to our Restaurant?'),
(8, 17, 2, 'Berapa kali Anda pernah ke Restaurant kami?'),
(9, 18, 1, 'What is your favorite Food?'),
(10, 18, 2, 'Apa makanan favorit anda?'),
(11, 19, 1, 'Please rate our Food Prices?'),
(12, 19, 2, 'Silakan menilai harga makanan kami?'),
(13, 20, 1, 'Please rate our Beverage Prices?'),
(14, 20, 2, 'Silakan menilai harga minuman kami?'),
(15, 21, 1, 'What is your expected food delivery time (from ordering time)'),
(16, 21, 2, 'Berapa waktu pengiriman makanan yang Anda harapkan (dari waktu pemesanan)'),
(17, 23, 1, 'What kind of entertainment would you prefer in our Restaurant?'),
(18, 23, 2, 'Apa jenis hiburan yang Anda lebih suka di Restaurant kami?'),
(19, 25, 1, 'What is your likelihood to return?'),
(20, 25, 2, 'Apa kemungkinan Anda untuk kembali?');

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
