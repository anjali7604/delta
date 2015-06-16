-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2015 at 08:44 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `delta`
--

-- --------------------------------------------------------

--
-- Table structure for table `reg`
--

CREATE TABLE IF NOT EXISTS `reg` (
  `location` varchar(100) NOT NULL,
  `roll` int(25) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `dept` varchar(25) NOT NULL,
  `year` int(25) NOT NULL,
  `mail` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `id` int(100) NOT NULL,
  PRIMARY KEY (`roll`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2147483647 ;

--
-- Dumping data for table `reg`
--

INSERT INTO `reg` (`location`, `roll`, `name`, `dept`, `year`, `mail`, `pass`, `id`) VALUES
(' uploads/IMG-20141003-WA0001.jpg', 107114028, 'diptishikha dash', 'eee', 2014, 'diptishikhadash@gmail.com', 'c180aaa48ea3e5b5da68d6c86', 537835971),
(' uploads/IMG-20141118-WA0020.jpg', 110114013, 'anjali', 'ICE', 2014, 'anjaliandng@gmail.com', '60284ce206bf1e6b0955c450c', 826849748);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
