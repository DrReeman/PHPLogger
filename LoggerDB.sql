-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 10, 2016 at 11:41 PM
-- Server version: 5.5.50-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `LoggerDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `LoggerTable`
--

CREATE TABLE IF NOT EXISTS `LoggerTable` (
  `idLogMessage` int(11) NOT NULL AUTO_INCREMENT,
  `Date` datetime NOT NULL,
  `Level` varchar(128) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Context` varchar(255) NOT NULL,
  PRIMARY KEY (`idLogMessage`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `LoggerTable`
--

INSERT INTO `LoggerTable` (`idLogMessage`, `Date`, `Level`, `Message`, `Context`) VALUES
(1, '2016-08-10 22:10:16', 'info', 'Test', 'NULL'),
(2, '2016-08-10 22:10:16', 'info', '["test1","test2","test3"]', 'NULL'),
(3, '2016-08-10 22:10:16', 'info', '{"FirstElement":"test1","SecondElement":"test2","ThirdElement":"test3"}', 'NULL'),
(4, '2016-08-10 22:10:16', 'info', '{"var1":"12"}', 'NULL'),
(5, '2016-08-10 22:11:02', 'info', 'Test', 'NULL'),
(6, '2016-08-10 22:11:02', 'info', '["test1","test2","test3"]', 'NULL'),
(7, '2016-08-10 22:11:02', 'info', '{"FirstElement":"test1","SecondElement":"test2","ThirdElement":"test3"}', 'NULL'),
(8, '2016-08-10 22:11:02', 'info', '{"var1":"12"}', 'NULL');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
