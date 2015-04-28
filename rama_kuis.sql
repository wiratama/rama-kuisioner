-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2015 at 11:09 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id_comment`, `id_customer`, `store_number`, `comment`) VALUES
(4, 6, 'rama-123-xx', 'nice place, good food, keep smile'),
(5, 4, 'rama-123-xx', 'nice service, good people'),
(6, 6, 'rama-345-xx', 'nice place, nice services'),
(7, 7, 'rama-123-xx', 'nice place, nice services'),
(8, 8, 'rama-123-xx', 'nice music, nice food, good people'),
(9, 9, 'rama-123-xx', 'wasting time to wait my order');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `name`, `address`, `contact`, `nationality`, `email`, `validation_number`) VALUES
(4, 'nana alamaya', 'PCA biaung A25`', '1122334455', 'indonesia', 'nana@alamaya.com', '653040159-rama-123-xx'),
(6, 'arya', 'PCA 25 biaung', '1122334455', 'Indonesia', 'arya@alamaya.com', '8620181364-rama-345-xx'),
(7, 'kipli', 'PCA 25 biaung', '1122334455', 'Indonesia', 'kipli@alamaya.com', '380655421-rama-123-xx'),
(8, 'kipli', 'PCA 25 biaung', '1122334455', 'Indonesia', 'support@alamaya.com', '7849805158-rama-123-xx'),
(9, 'farkhan', 'PCA 25 biaung', '1122334455', 'Indonesia', 'fajar@alamaya.com', '4132154964-rama-123-xx');

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
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(64) NOT NULL DEFAULT 'system',
  `key` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_key` (`category`,`key`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `category`, `key`, `value`) VALUES
(1, 'mail', 'contactEmail', 's:21:"webmaster@example.com";'),
(2, 'mail', 'fromNoReply', 's:21:"noreply@ramaquest.com";'),
(3, 'mail', 'server', 's:20:"smtp.mandrillapp.com";'),
(4, 'mail', 'port', 's:3:"587";'),
(5, 'mail', 'user', 's:19:"support@alamaya.com";'),
(6, 'mail', 'password', 's:22:"xWwIPfRMNIdrj6qiTk5GCQ";'),
(7, 'home', 'headingTitleEnglish', 's:23:"Guest Experience Survey";'),
(8, 'home', 'welcomeTextEnglish', 's:174:"Welcome to Rama Restaurants Bali Guest Experience Survey. Thank you for taking the time to fill out our questioner. This will help us to ensure better service for the future.";'),
(9, 'home', 'headingTitleIndonesia', 's:25:"Survey Kepuasan Pelanggan";'),
(10, 'home', 'welcomeTextIndonesia', 's:215:"Selamat Datang di Survey Kepuasan Pelanggan Rama Restoran Bali. Terima kasih telah meluangkan waktu untuk mengisi kuesioner kami. Hal ini akan membantu kami untuk memastikan layanan yang lebih baik untuk masa depan.";'),
(11, 'customer', 'headingTitleEnglish', 's:18:"Dear Valued Guest,";'),
(12, 'customer', 'welcomeTextEnglish', 's:187:"We need your assistant in our effort to extend the finest service at our Restaurant. We would appreciate it very much if you could take a few minutes to fill the following questionnaires.";'),
(13, 'customer', 'labelTextEnglish', 's:41:"Your comments would be highly appreciated";'),
(14, 'customer', 'headingTitleIndonesia', 's:22:"Kepada Tamu Terhormat,";'),
(15, 'customer', 'welcomeTextIndonesia', 's:171:"Kami membutuhkan bantuan anda untuk meningkatkan kualitas di restorant kami. Kami akan sangat senang jika anda meluangkan sedikit waktu untuk mengisi kuesioner dibawah ini";'),
(16, 'customer', 'labelTextIndonesia', 's:30:"Saran Anda sangat kami hargai.";'),
(17, 'validation', 'headingTitleEnglish', 's:9:"THANK YOU";'),
(18, 'validation', 'welcomeTextEnglish', 's:235:"Thank you so much for participating in filling our Guest Comment Online Survey. You will receive Food and Beverage voucher to enjoy at our Restaurants. To claim the vouchers please submit to our cashier the email that we will send you.";'),
(19, 'validation', 'codeLabelTextEnglish', 's:15:"Validation Code";'),
(20, 'validation', 'headingTitleIndonesia', 's:12:"Terima kasih";'),
(21, 'validation', 'welcomeTextIndonesia', 's:203:"Terima kasih banyak telah mengisi survey online kami. Anda akan mendapatkan voucher makanan dan minuman di restorant kami. Untuk mengambil voucher silahkan sertakan email kode validasi yang kami kirimkan";'),
(22, 'validation', 'codeLabelTextIndonesia', 's:13:"Kode Validasi";');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=180 ;

--
-- Dumping data for table `survey_question_answer`
--

INSERT INTO `survey_question_answer` (`id_survey`, `id_survey_store`, `id_customer`, `id_question`, `id_answer`, `reason`) VALUES
(96, 7, 6, 17, '66', NULL),
(97, 7, 6, 17, '67', NULL),
(98, 7, 6, 18, '89', NULL),
(99, 7, 6, 18, '90', NULL),
(100, 7, 6, 19, '92', NULL),
(101, 7, 6, 19, '93', NULL),
(102, 7, 6, 20, '97', NULL),
(103, 7, 6, 21, '100', NULL),
(104, 7, 6, 21, '101', NULL),
(105, 7, 6, 22, '104', NULL),
(106, 7, 6, 23, '107', NULL),
(107, 7, 6, 24, '109', NULL),
(108, 7, 6, 27, '120', NULL),
(109, 7, 6, 27, '121', 'reggae'),
(110, 7, 6, 28, '123', NULL),
(111, 8, 4, 17, '67', NULL),
(112, 8, 4, 17, '86', NULL),
(113, 8, 4, 18, '89', NULL),
(114, 8, 4, 19, '93', NULL),
(115, 8, 4, 20, '97', NULL),
(116, 8, 4, 21, '102', 'Itali'),
(117, 8, 4, 22, '104', NULL),
(118, 8, 4, 23, '107', NULL),
(119, 8, 4, 24, '109', NULL),
(120, 8, 4, 27, '120', NULL),
(121, 8, 4, 28, '123', NULL),
(122, 9, 6, 17, '66', NULL),
(123, 9, 6, 17, '87', NULL),
(124, 9, 6, 18, '88', NULL),
(125, 9, 6, 18, '90', NULL),
(126, 9, 6, 19, '92', NULL),
(127, 9, 6, 19, '93', NULL),
(128, 9, 6, 19, '94', NULL),
(129, 9, 6, 20, '97', NULL),
(130, 9, 6, 21, '102', 'japan'),
(131, 9, 6, 22, '104', NULL),
(132, 9, 6, 23, '107', NULL),
(133, 9, 6, 24, '109', NULL),
(134, 9, 6, 27, '121', 'blues'),
(135, 9, 6, 28, '123', NULL),
(136, 10, 7, 17, '66', NULL),
(137, 10, 7, 17, '86', NULL),
(138, 10, 7, 18, '88', NULL),
(139, 10, 7, 18, '89', NULL),
(140, 10, 7, 18, '90', NULL),
(141, 10, 7, 19, '92', NULL),
(142, 10, 7, 19, '93', NULL),
(143, 10, 7, 19, '94', NULL),
(144, 10, 7, 20, '97', NULL),
(145, 10, 7, 21, '102', 'japan'),
(146, 10, 7, 22, '104', NULL),
(147, 10, 7, 23, '107', NULL),
(148, 10, 7, 24, '109', NULL),
(149, 10, 7, 27, '121', 'blues'),
(150, 10, 7, 28, '123', NULL),
(151, 11, 8, 17, '66', NULL),
(152, 11, 8, 17, '67', NULL),
(153, 11, 8, 17, '86', NULL),
(154, 11, 8, 18, '88', NULL),
(155, 11, 8, 18, '89', NULL),
(156, 11, 8, 18, '90', NULL),
(157, 11, 8, 19, '92', NULL),
(158, 11, 8, 19, '93', NULL),
(159, 11, 8, 19, '95', NULL),
(160, 11, 8, 20, '97', NULL),
(161, 11, 8, 21, '102', 'brazilian'),
(162, 11, 8, 22, '104', NULL),
(163, 11, 8, 23, '107', NULL),
(164, 11, 8, 24, '109', NULL),
(165, 11, 8, 27, '121', 'accoustic'),
(166, 11, 8, 28, '123', NULL),
(167, 12, 9, 17, '65', NULL),
(168, 12, 9, 17, '87', NULL),
(169, 12, 9, 18, '91', NULL),
(170, 12, 9, 19, '94', NULL),
(171, 12, 9, 19, '95', NULL),
(172, 12, 9, 20, '97', NULL),
(173, 12, 9, 21, '102', 'Itali'),
(174, 12, 9, 22, '104', NULL),
(175, 12, 9, 23, '107', NULL),
(176, 12, 9, 24, '109', NULL),
(177, 12, 9, 27, '119', NULL),
(178, 12, 9, 27, '121', 'blues'),
(179, 12, 9, 28, '124', 'to long to wait my order');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `survey_store`
--

INSERT INTO `survey_store` (`id_survey_store`, `store_number`, `date_survey`, `struk_number`) VALUES
(7, 'rama-123-xx', '2015-04-10', 'amx'),
(8, 'rama-123-xx', '2015-04-23', 'amx'),
(9, 'rama-345-xx', '2015-04-28', 'amx'),
(10, 'rama-123-xx', '2015-04-28', 'amx'),
(11, 'rama-123-xx', '2015-04-28', 'amx'),
(12, 'rama-123-xx', '2015-04-28', 'amx');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
