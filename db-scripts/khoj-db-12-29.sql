-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 29, 2012 at 01:59 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `khoj-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `questionno` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `desc` varchar(200) NOT NULL,
  `schint` varchar(100) NOT NULL,
  `currpoints` int(5) NOT NULL,
  `image` varchar(20) NOT NULL,
  `answer` varchar(20) NOT NULL,
  PRIMARY KEY (`questionno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`questionno`, `title`, `desc`, `schint`, `currpoints`, `image`, `answer`) VALUES
(1, '', '', '', 100, 'question_1', '26 01'),
(2, '', '', '', 100, 'question_2', 'broadcastyourself'),
(3, '', '', '', 100, 'question_3', 'parkjaesang'),
(4, '', '', '', 100, 'question_4', 'skodayeti'),
(5, '', '', '', 100, 'question_5', 'mvsrengineeringcollege'),
(6, '', '', '', 100, 'question_6', 'pendrive'),
(7, '', '', '', 100, 'question_7', 'wildlifeact'),
(8, '', '', '', 100, 'question_8', 'jellybean'),
(9, '', '', '', 100, 'question_9', 'mohandaskaramchandgandhi'),
(10, '', '', '', 100, 'question_10', '655'),
(11, '', '', '', 100, 'question_11', 'whitneyhouston'),
(12, '', '', '', 100, 'question_12', 'jaguar'),
(13, '', '', '', 100, 'question_13', 'narendramodi'),
(14, '', '“clue” is the clue for this question . Find your clue in this site . ', '', 100, 'question_14', 'page404notfound'),
(15, '', '', '', 100, 'question_15', 'youarethewinnerofkhojthehunt');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `userid` int(5) NOT NULL,
  `currquest` int(3) NOT NULL,
  `currpoints` int(5) NOT NULL,
  `banned` tinyint(1) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`userid`, `currquest`, `currpoints`, `banned`) VALUES
(3, 2, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(30) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `branch` varchar(5) NOT NULL,
  `year` int(1) NOT NULL,
  `college` varchar(30) NOT NULL,
  `userid` int(5) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `firstname`, `lastname`, `username`, `password`, `phone`, `rollno`, `branch`, `year`, `college`, `userid`) VALUES
('admin@khjthehunt.com', 'Admin', '1', 'admin', '', 2147483647, '245109733301', 'CSE', 3, 'MVSR Engineering College', 3)
;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
