-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2015 at 07:46 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ang`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_level`
--

CREATE TABLE IF NOT EXISTS `access_level` (
  `access_id` int(11) NOT NULL AUTO_INCREMENT,
  `access_name` varchar(128) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`access_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `access_level`
--

INSERT INTO `access_level` (`access_id`, `access_name`, `created`, `status`) VALUES
(1, 'Test', '2015-03-15 07:29:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `acc_fea_rel`
--

CREATE TABLE IF NOT EXISTS `acc_fea_rel` (
  `ac_rel_id` int(11) NOT NULL AUTO_INCREMENT,
  `access_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL,
  PRIMARY KEY (`ac_rel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `feature_list`
--

CREATE TABLE IF NOT EXISTS `feature_list` (
  `feature_id` int(11) NOT NULL AUTO_INCREMENT,
  `feature` varchar(128) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`feature_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `feature_list`
--

INSERT INTO `feature_list` (`feature_id`, `feature`, `created`) VALUES
(1, 'feature 1', '2015-03-13 17:06:53'),
(2, 'feature 2', '2015-03-13 17:06:53'),
(3, 'feature 3', '2015-03-13 17:07:09'),
(4, 'feature 4', '2015-03-13 17:07:09'),
(5, 'feature 5', '2015-03-13 17:07:28'),
(6, 'feature 6', '2015-03-13 17:07:28'),
(7, 'feature 7', '2015-03-13 17:07:57'),
(8, 'feature 8', '2015-03-13 17:07:57');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `role`, `created`) VALUES
(1, 'test@test.com', '12345', 1, '2015-03-06 16:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `pin` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_level` varchar(255) NOT NULL,
  `dob` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `city`, `state`, `country`, `pin`, `contact`, `email`, `password`, `access_level`, `dob`) VALUES
(1, 'test', 'test', 'test', 'tesst', 'tesst', '212121', '121212121', 'sandeep@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '1', '1965-12-02 00:00:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
