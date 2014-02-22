-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 23, 2012 at 04:35 PM
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
(1, 'The Secret Keeper', 'It keeps your secrets', 'It is a number', 100, 'question_1', '1'),
(2, 'The Secret Keeper 2', 'It keeps your secrets 2', 'Mountain', 100, 'question_2', 'mountain'),
(3, '', '', '', 100, 'question_3', 'flower'),
(4, '', '', '', 100, 'question_4', 'penguin');

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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` int(11) NOT NULL,
  `fbusername` varchar(30) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `branch` varchar(5) NOT NULL,
  `year` int(1) NOT NULL,
  `college` varchar(30) NOT NULL,
  `bio` varchar(150) NOT NULL,
  `userid` int(5) NOT NULL AUTO_INCREMENT,
  `emailchk` tinyint(1) NOT NULL,
  `phonechk` tinyint(1) NOT NULL,
  `fbusernamechk` tinyint(1) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
