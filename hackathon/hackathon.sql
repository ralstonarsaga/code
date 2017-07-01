-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 01, 2017 at 01:09 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hackathon`
--

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

CREATE TABLE IF NOT EXISTS `raw_material` (
  `raw_mat_id` int(100) NOT NULL AUTO_INCREMENT,
  `raw_mat_name` varchar(100) NOT NULL,
  `raw_mat_desc` varchar(100) NOT NULL,
  `raw_mat_price_id` varchar(100) NOT NULL,
  `raw_mat_cat_id` varchar(100) NOT NULL,
  `raw_mat_uom_id` varchar(100) NOT NULL,
  `raw_mat_remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`raw_mat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`raw_mat_id`, `raw_mat_name`, `raw_mat_desc`, `raw_mat_price_id`, `raw_mat_cat_id`, `raw_mat_uom_id`, `raw_mat_remarks`) VALUES
(1, 'Bottle', 'Bottle', '', '4', '', ''),
(2, 'Can', 'Can', '', '2', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `raw_mat_cat`
--

CREATE TABLE IF NOT EXISTS `raw_mat_cat` (
  `raw_mat_cat_ids` int(11) NOT NULL AUTO_INCREMENT,
  `raw_mat_cat_name` varchar(100) NOT NULL,
  `raw_mat_cat_desc` varchar(100) NOT NULL,
  `raw_mat_cat_remarks` int(100) NOT NULL,
  PRIMARY KEY (`raw_mat_cat_ids`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `raw_mat_cat`
--

INSERT INTO `raw_mat_cat` (`raw_mat_cat_ids`, `raw_mat_cat_name`, `raw_mat_cat_desc`, `raw_mat_cat_remarks`) VALUES
(1, 'Glass', 'Glass', 0),
(2, 'Metal', 'Metal', 0),
(3, 'Paper', 'Paper', 0),
(4, 'Plastic', 'Plastic', 0),
(5, 'Cardboard', 'Cardboard', 0),
(6, 'Others', 'Others', 0);

-- --------------------------------------------------------

--
-- Table structure for table `raw_mat_uom`
--

CREATE TABLE IF NOT EXISTS `raw_mat_uom` (
  `raw_mat_uom_id` int(11) NOT NULL AUTO_INCREMENT,
  `raw_mat_uom_name` varchar(100) NOT NULL,
  `raw_mat_uom_desc` varchar(100) NOT NULL,
  `raw_mat_uom_remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`raw_mat_uom_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `raw_mat_uom`
--

INSERT INTO `raw_mat_uom` (`raw_mat_uom_id`, `raw_mat_uom_name`, `raw_mat_uom_desc`, `raw_mat_uom_remarks`) VALUES
(1, 'yards', 'yards', ''),
(2, 'piece', 'piece', '');

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE IF NOT EXISTS `reward` (
  `reward_id` int(100) NOT NULL AUTO_INCREMENT,
  `reward_name` varchar(100) NOT NULL,
  `reward_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`reward_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`reward_id`, `reward_name`, `reward_desc`) VALUES
(1, '100 ', 'For Every 1000 sold bottles');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_user_id` varchar(100) NOT NULL,
  `trans_raw_mat_id` varchar(100) NOT NULL,
  `trans_qty` varchar(100) NOT NULL,
  `trans_pick_time` date NOT NULL,
  `trans_remarks` varchar(100) NOT NULL,
  `trans_raw_mat_cat_id` int(11) NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_raw_mat`
--

CREATE TABLE IF NOT EXISTS `transaction_raw_mat` (
  `tr_trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `tr_raw_mat_id` int(11) NOT NULL,
  `tr_priotity` int(11) NOT NULL,
  PRIMARY KEY (`tr_trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `access_key` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_id` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_COLUMNS` (`fname`,`lname`),
  UNIQUE KEY `UNIQUE_USERID` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userid`, `email`, `fname`, `lname`, `password`, `access_key`, `address`, `contact_id`) VALUES
(1, 'don', 'don.belando@gmail.com', 'don', 'belando', 'don', 'Developer', '2320 marconi st. makati', '8442774'),
(2, 'ton', 'ton.ton@gmail.com', 'ton', 'tontonton', 'ton', 'Developer', '1234 Maricaban Pasay', '123456');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
