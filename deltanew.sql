-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2015 at 11:04 AM
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
-- Table structure for table `factory`
--

CREATE TABLE IF NOT EXISTS `factory` (
  `factname` varchar(25) NOT NULL,
  `insdate` date NOT NULL,
  `pfd` int(25) NOT NULL,
  `temp` varchar(25) NOT NULL,
  `vis` decimal(25,0) NOT NULL,
  `elec` varchar(25) NOT NULL,
  `oxy` decimal(25,0) NOT NULL,
  `tox` decimal(25,0) NOT NULL,
  `flam` decimal(25,0) NOT NULL,
  `rescue` varchar(100) NOT NULL,
  `pipe` varchar(100) NOT NULL,
  `disposal` varchar(100) NOT NULL,
  PRIMARY KEY (`factname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `factory`
--

INSERT INTO `factory` (`factname`, `insdate`, `pfd`, `temp`, `vis`, `elec`, `oxy`, `tox`, `flam`, `rescue`, `pipe`, `disposal`) VALUES
('Ambuja Cement', '2015-07-08', 313, '31', '323', 'direct', '52', '10', '5', 'exit doors,fire ext', 'well maintained', 'river'),
('Jaypee Cement', '2015-06-15', 233, '45', '331', 'indirect', '75', '5', '2', 'exit doors', 'proper', 'river'),
('JK Cement', '2015-05-18', 101, '36', '95', 'direct', '86', '16', '10', 'fire ext.', 'enough', 'underground'),
('Ramco Cement', '2015-07-23', 85, '35', '132', 'direct', '90', '5', '2', 'fire ext.', 'well maintened', 'lake'),
('UltraTech Cement', '2015-07-28', 42, '25', '132', 'direct', '21', '10', '5', 'exit doors', 'not maintained', 'sewer line');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
