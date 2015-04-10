-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2015 at 05:39 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=125 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`id_answer`, `id_question`, `reasonable`, `answer`, `skor`) VALUES
(65, 17, 0, NULL, 10),
(66, 17, 0, NULL, 10),
(67, 17, 0, NULL, 10),
(86, 17, 0, NULL, 10),
(87, 17, 0, NULL, 10),
(88, 18, 0, NULL, NULL),
(89, 18, 0, NULL, NULL),
(90, 18, 0, NULL, NULL),
(91, 18, 0, NULL, NULL),
(92, 19, 0, NULL, NULL),
(93, 19, 0, NULL, NULL),
(94, 19, 0, NULL, NULL),
(95, 19, 0, NULL, NULL),
(96, 20, 0, NULL, NULL),
(97, 20, 0, NULL, NULL),
(98, 20, 0, NULL, NULL),
(99, 21, 0, NULL, NULL),
(100, 21, 0, NULL, NULL),
(101, 21, 0, NULL, NULL),
(102, 21, 1, NULL, NULL),
(103, 22, 0, NULL, NULL),
(104, 22, 0, NULL, NULL),
(105, 22, 0, NULL, NULL),
(106, 23, 0, NULL, NULL),
(107, 23, 0, NULL, NULL),
(108, 23, 0, NULL, NULL),
(109, 24, 0, NULL, NULL),
(110, 24, 0, NULL, NULL),
(111, 24, 0, NULL, NULL),
(112, 24, 0, NULL, NULL),
(119, 27, 0, NULL, NULL),
(120, 27, 0, NULL, NULL),
(121, 27, 1, NULL, NULL),
(122, 28, 0, NULL, NULL),
(123, 28, 0, NULL, NULL),
(124, 28, 1, NULL, NULL);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `answer_description`
--

INSERT INTO `answer_description` (`id_answer_description`, `id_language`, `id_answer`, `answer`) VALUES
(23, 1, 65, 'Agent'),
(24, 2, 65, 'Agen'),
(25, 1, 66, 'Friend'),
(26, 2, 66, 'Teman'),
(27, 1, 67, 'Internet'),
(28, 2, 67, 'Internet'),
(37, 1, 86, 'Magazine'),
(38, 2, 86, 'Majalah'),
(39, 1, 87, 'Pass by'),
(40, 2, 87, 'Pass by'),
(41, 1, 88, 'Family'),
(42, 2, 88, 'Keluarga'),
(43, 1, 89, 'Friends'),
(44, 2, 89, 'Teman'),
(45, 1, 90, 'Couple'),
(46, 2, 90, 'Pasangan'),
(47, 1, 91, 'Alone'),
(48, 2, 91, 'Sendiri'),
(49, 1, 92, ' Food'),
(50, 2, 92, 'Makanan'),
(51, 1, 93, 'Service'),
(52, 2, 93, 'Pelayanan'),
(53, 1, 94, 'Atmosphere'),
(54, 2, 94, 'Atmosphere'),
(55, 1, 95, 'Entertainment'),
(56, 2, 95, 'Hiburan'),
(57, 1, 96, 'First Time'),
(58, 2, 96, 'Pertama kali'),
(59, 1, 97, 'Second Times'),
(60, 2, 97, 'Kedua kali'),
(61, 1, 98, 'More than Two Times'),
(62, 2, 98, 'Lebih dari dua kali'),
(63, 1, 99, 'Asian'),
(64, 2, 99, 'Asian'),
(65, 1, 100, 'Balinese'),
(66, 2, 100, 'Bali'),
(67, 1, 101, 'Western'),
(68, 2, 101, 'Barat'),
(69, 1, 102, 'Others '),
(70, 2, 102, 'Lainnya'),
(71, 1, 103, 'Below averages'),
(72, 2, 103, 'Di bawah rata-rata'),
(73, 1, 104, 'Reasonable'),
(74, 2, 104, 'Masuk akal'),
(75, 1, 105, 'Unacceptable'),
(76, 2, 105, 'tidak dapat diterima'),
(77, 1, 106, 'Below Averages'),
(78, 2, 106, 'Di bawah Rata-rata'),
(79, 1, 107, 'Reasonable'),
(80, 2, 107, 'Masuk akal'),
(81, 1, 108, 'Unacceptable'),
(82, 2, 108, 'Tidak dapat diterima'),
(83, 1, 109, '20 minutes'),
(84, 2, 109, '20 menit'),
(85, 1, 110, '25 minutes'),
(86, 2, 110, '25 menit'),
(87, 1, 111, '30 minutes'),
(88, 2, 111, '30 menit'),
(89, 1, 112, 'Does Not Matter'),
(90, 2, 112, 'Tidak masalah'),
(91, 1, 113, 'Traditional Music'),
(92, 2, 113, 'Musik tradisional'),
(93, 1, 114, 'Modern Music'),
(94, 2, 114, 'Musik modern'),
(95, 1, 115, 'Others '),
(96, 2, 115, 'Lainnya'),
(97, 1, 116, 'Traditional Music'),
(98, 2, 116, 'Musik tradisional'),
(99, 1, 117, 'Modern Music'),
(100, 2, 117, 'Musik modern'),
(101, 1, 118, 'Others '),
(102, 2, 118, 'Lainnya'),
(103, 1, 119, 'Traditional Music'),
(104, 2, 119, 'Musik tradisional'),
(105, 1, 120, 'Modern Music'),
(106, 2, 120, 'Musik Modern'),
(107, 1, 121, 'Others'),
(108, 2, 121, 'Lainnya'),
(109, 1, 122, 'Very likely'),
(110, 2, 122, 'Sangat mungkin'),
(111, 1, 123, 'Likely'),
(112, 2, 123, 'Mungkin'),
(113, 1, 124, 'Unlikely, because '),
(114, 2, 124, 'Tidak mungkin, karena');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id_question`, `question`, `type`) VALUES
(17, 'How did you know about us?', 'checkbox'),
(18, 'Who were you here with?', 'checkbox'),
(19, 'What do you like most about us??', 'checkbox'),
(20, 'How many times have you been to our Restaurant?', 'checkbox'),
(21, 'What is your favorite Food?', 'checkbox'),
(22, 'Please rate our Food Prices?', 'checkbox'),
(23, 'Please rate our Beverage Prices?', 'checkbox'),
(24, 'What is your expected food delivery time (from ordering time)', 'checkbox'),
(27, 'What kind of entertainment would you prefer in our Restaurant?', 'checkbox'),
(28, 'What is your likelihood to return?', 'checkbox');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `question_description`
--

INSERT INTO `question_description` (`id_question_description`, `id_question`, `id_language`, `question`) VALUES
(7, 17, 1, 'How did you know about us?'),
(8, 17, 2, 'Bagaimana Anda tahu tentang kami?'),
(9, 18, 1, 'Who were you here with?'),
(10, 18, 2, 'Datang dengan siapa?'),
(11, 19, 1, 'What do you like most about us??'),
(12, 19, 2, 'Apa yang paling Anda sukai tentang kami ??'),
(13, 20, 1, 'How many times have you been to our Restaurant?'),
(14, 20, 2, 'Berapa kali Anda pernah ke Restaurant kami?'),
(15, 22, 1, 'Please rate our Food Prices?'),
(16, 22, 2, 'Silakan menilai harga makanan kami?'),
(17, 23, 1, 'Please rate our Beverage Prices?'),
(18, 23, 2, 'Silakan menilai harga minuman kami?'),
(19, 24, 1, 'What is your expected food delivery time (from ordering time)'),
(20, 24, 2, 'Berapa waktu pengiriman makanan yang Anda harapkan (dari waktu pemesanan)'),
(21, 27, 1, 'What kind of entertainment would you prefer in our Restaurant?'),
(22, 27, 2, 'Apa jenis hiburan yang Anda lebih suka di Restaurant kami?'),
(23, 28, 1, 'What is your likelihood to return?'),
(24, 28, 2, 'Apa kemungkinan Anda untuk kembali?'),
(25, 21, 1, 'What is your favorite Food?'),
(26, 21, 2, 'Apa makanan favorit anda?');

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
