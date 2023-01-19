-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 09, 2022 at 01:21 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empirecuts`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `Email`, `Password`) VALUES
(1, 'admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tblbookings`
--

DROP TABLE IF EXISTS `tblbookings`;
CREATE TABLE IF NOT EXISTS `tblbookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(180) NOT NULL,
  `Surname` varchar(180) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `Style` varchar(250) NOT NULL,
  `Gender` varchar(180) NOT NULL,
  `Extrainfo` text NOT NULL,
  `Email` varchar(180) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookings`
--

INSERT INTO `tblbookings` (`id`, `Name`, `Surname`, `Date`, `Time`, `Style`, `Gender`, `Extrainfo`, `Email`) VALUES
(6, 'echo', 'sdasdsa', '2022-11-09', '15:16:00', 'cut', 'Male', 'jwqkqhdklas hdljshd lkjsahldkaslk djksajdlksajdlksajlkdsjalkdjlas  ', 'echo@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

DROP TABLE IF EXISTS `tblusers`;
CREATE TABLE IF NOT EXISTS `tblusers` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(180) NOT NULL,
  `Surname` varchar(180) NOT NULL,
  `Gender` varchar(180) NOT NULL,
  `Email` varchar(180) NOT NULL,
  `Password` varchar(180) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`Id`, `Name`, `Surname`, `Gender`, `Email`, `Password`) VALUES
(5, 'echo', 'echo', 'male', 'echo@gmail.com', 'fcea920f7412b5da7be0cf42b8c93759');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
