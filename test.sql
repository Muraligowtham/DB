-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2014 at 03:00 PM
-- Server version: 5.5.24-log
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `qid` int(11) NOT NULL DEFAULT '0',
  `answer` varchar(900) DEFAULT NULL,
  `author` varchar(30) DEFAULT NULL,
  `datee` varchar(30) DEFAULT NULL,
  `timee` varchar(30) DEFAULT NULL,
  `votes` int(11) NOT NULL,
  PRIMARY KEY (`aid`,`qid`),
  KEY `qid` (`qid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `qid` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `tag` varchar(10) DEFAULT NULL,
  `datee` varchar(30) DEFAULT NULL,
  `timee` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`qid`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

-- --------------------------------------------------------

--
-- Table structure for table `userrate`
--

CREATE TABLE IF NOT EXISTS `userrate` (
  `username` varchar(20) NOT NULL,
  `flag` int(11) NOT NULL,
  `aid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `opinion` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `uid` varchar(20) NOT NULL,
  `flag` varchar(2) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `email` (`email`,`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `email`, `uid`, `flag`) VALUES
('smita', 'smita@19', 'surebansmita@gmail.com', '10359', '1'),
('smitha', 'smita', 'surebansmita@gmail.com', '23255', '1'),
('sonu1', '789456', 'bonagerivenkatesh@gmail.com', '9481', '1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`qid`) REFERENCES `questions` (`qid`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
