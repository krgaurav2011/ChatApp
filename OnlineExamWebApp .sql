-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2015 at 01:42 AM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `OnlineExamWebApp`
--

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `test_id` int(10) NOT NULL,
  `marks` int(11) DEFAULT NULL,
  `test_completed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_id` int(10) NOT NULL,
  `q_no` int(11) NOT NULL,
  `question` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `option_1` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `option_2` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `option_3` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_unicode_ci NOT NULL,
  `option_4` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `correct_answer` varchar(255) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `test_id` (`test_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `sex` enum('male','female','not specified') CHARACTER SET ascii NOT NULL,
  `photo` mediumblob,
  `education` varchar(255) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `age` int(2) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `sex` enum('Male','Female','Not Specified') CHARACTER SET ascii NOT NULL,
  `photo` mediumblob,
  `designation` varchar(255) CHARACTER SET utf32 COLLATE utf32_bin NOT NULL,
  `age` int(2) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `subject` enum('physics','maths','chemistry','') NOT NULL,
  `full_marks` int(11) NOT NULL,
  `number_of_questions` int(11) NOT NULL,
  `positive_mark` int(11) NOT NULL,
  `negative_mark` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Teachr_ID` (`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(32) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `password` varchar(50) CHARACTER SET ascii COLLATE ascii_bin NOT NULL,
  `check_user_type` enum('Student','Teacher') CHARACTER SET ascii NOT NULL,
  `profile_complete` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `SNo` (`id`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `check_user_type`, `profile_complete`) VALUES
(1, 'f2ss2@w.com', 'c162de19c4c3731c', 'Teacher', 0),
(2, 'f2sswsw2@w.com', '1bbd886460827015', 'Student', 0),
(3, 'f2sswsw222@w.com', 'bbb8aae57c104cda', 'Teacher', 0),
(4, 'f2dsw222@w.com', 'ef800207a3648c7c', 'Teacher', 0),
(5, 'f2ddddsw222@w.com', 'd340c5e973c682f9', 'Teacher', 0),
(6, 'w222@w.com', 'adbc91a43e988a3b', 'Student', 0),
(7, 'wm222@w.com', 'e11170b8cbd2d741', 'Teacher', 0),
(8, 'a@a.com', '3dbe00a167653a1a', 'Student', 0),
(9, 'd@d.com', 'ef800207a3648c7c1ef3e9fe544f17f0', 'Student', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `marks`
--
ALTER TABLE `marks`
  ADD CONSTRAINT `marks_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `students` (`user_id`),
  ADD CONSTRAINT `marks_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`);

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `teachers` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
