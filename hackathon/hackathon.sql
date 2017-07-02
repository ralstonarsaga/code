-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2017 at 06:51 AM
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
-- Table structure for table `disposal`
--

CREATE TABLE IF NOT EXISTS `disposal` (
  `disposal_id` int(11) NOT NULL AUTO_INCREMENT,
  `disposal_name` varchar(100) NOT NULL,
  `disposal_desc` varchar(100) NOT NULL,
  `disposal_place` varchar(100) NOT NULL,
  `disposal_remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`disposal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `disposal`
--

INSERT INTO `disposal` (`disposal_id`, `disposal_name`, `disposal_desc`, `disposal_place`, `disposal_remarks`) VALUES
(1, 'Electronic Company1', 'Batteries, Microwave', 'Makati', ''),
(2, 'Photo Company', 'Laminated Film', 'Manila', ''),
(3, 'Chemical Company', 'toxic chemical ways', 'Malabon', '');

-- --------------------------------------------------------

--
-- Table structure for table `junkshop`
--

CREATE TABLE IF NOT EXISTS `junkshop` (
  `junk_id` int(11) NOT NULL AUTO_INCREMENT,
  `junk_name` varchar(100) NOT NULL,
  `junk_desc` varchar(100) NOT NULL,
  `junk_place` varchar(100) NOT NULL,
  `junk_remarks` varchar(100) NOT NULL,
  PRIMARY KEY (`junk_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `junkshop`
--

INSERT INTO `junkshop` (`junk_id`, `junk_name`, `junk_desc`, `junk_place`, `junk_remarks`) VALUES
(1, 'Myrna''s Junkshop', 'glass, aluminum, plastic and other materials', 'Makati', 'clean and green'),
(2, 'Bitoy''s Junkshop', 'newspaper, aluminum and other materials', 'Pasay', 'Recycle');

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
  `raw_mat_min_ord_qty` varchar(100) NOT NULL,
  PRIMARY KEY (`raw_mat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `raw_material`
--

INSERT INTO `raw_material` (`raw_mat_id`, `raw_mat_name`, `raw_mat_desc`, `raw_mat_price_id`, `raw_mat_cat_id`, `raw_mat_uom_id`, `raw_mat_remarks`, `raw_mat_min_ord_qty`) VALUES
(1, 'Bottle1', 'Desc', '3', '4', '2', '', '500'),
(2, 'Aluminum', 'Desc', '10', '2', '4', '', '500'),
(3, 'Newspaper', 'Desc', '5', '3', '4', '', '500'),
(4, 'Bakeware', 'Desc', '5', '2', '2', '', '100'),
(5, 'Ceramics', 'Desc', '5', '1', '2', '', '80'),
(6, 'Hard Cardboard', 'Desc', '2', '5', '2', '', '300'),
(7, 'Bottle2', 'Desc', '3', '4', '2', '', '500');

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
(1, 'Glass', 'Desc', 0),
(2, 'Metal', 'Desc', 0),
(3, 'Paper', 'Desc', 0),
(4, 'Plastic', 'Desc', 0),
(5, 'Cardboard', 'Desc', 0),
(6, 'Others', 'Desc', 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `raw_mat_uom`
--

INSERT INTO `raw_mat_uom` (`raw_mat_uom_id`, `raw_mat_uom_name`, `raw_mat_uom_desc`, `raw_mat_uom_remarks`) VALUES
(1, 'yards', 'yards', ''),
(2, 'piece', 'piece', ''),
(3, 'dozen', 'dozen', ''),
(4, 'kg', 'kg', '');

-- --------------------------------------------------------

--
-- Table structure for table `reward`
--

CREATE TABLE IF NOT EXISTS `reward` (
  `reward_id` int(100) NOT NULL AUTO_INCREMENT,
  `reward_name` varchar(100) NOT NULL,
  `reward_desc` varchar(100) NOT NULL,
  PRIMARY KEY (`reward_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `reward`
--

INSERT INTO `reward` (`reward_id`, `reward_name`, `reward_desc`) VALUES
(1, '100', '1000 Eco-Points');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE IF NOT EXISTS `transaction` (
  `trans_id` int(11) NOT NULL AUTO_INCREMENT,
  `trans_user_id` varchar(100) NOT NULL,
  `trans_qty` varchar(100) NOT NULL,
  `trans_pick_time` date NOT NULL,
  `trans_remarks` varchar(100) NOT NULL,
  `trans_raw_mat_cat_id` int(11) NOT NULL,
  `trans_status` varchar(30) NOT NULL,
  `trans_total_amount` int(100) NOT NULL,
  `trans_eco_points` int(100) NOT NULL,
  `trans_c_pick_up_time` date NOT NULL,
  PRIMARY KEY (`trans_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`trans_id`, `trans_user_id`, `trans_qty`, `trans_pick_time`, `trans_remarks`, `trans_raw_mat_cat_id`, `trans_status`, `trans_total_amount`, `trans_eco_points`, `trans_c_pick_up_time`) VALUES
(63, '', '1', '2017-07-13', '1', 1, 'Pick Up', 5, 50, '0000-00-00'),
(64, '', '1', '2017-07-12', '1', 5, 'Pick Up', 2, 20, '0000-00-00'),
(65, '', '1', '2017-07-13', '1', 1, 'Pick Up', 5, 50, '0000-00-00'),
(66, '', '1', '2017-07-12', '1', 1, 'Pick Up', 5, 50, '0000-00-00'),
(67, '', '1', '2017-07-19', '1', 1, 'Pick Up', 5, 50, '0000-00-00'),
(68, '', '1', '2017-07-06', '1', 1, 'Pick Up', 5, 50, '0000-00-00'),
(69, '', '1', '2017-07-13', '', 1, 'Pick Up', 5, 50, '0000-00-00'),
(70, '', '10', '2017-07-12', '1', 2, 'Pick Up', 150, 1500, '0000-00-00'),
(71, '', '11', '2017-07-20', '', 5, 'Pick Up', 22, 220, '0000-00-00'),
(72, '', '1', '2017-07-12', '1', 2, 'Pending', 15, 150, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_raw_mats`
--

CREATE TABLE IF NOT EXISTS `transaction_raw_mats` (
  `tr_trans_id` int(11) NOT NULL,
  `tr_raw_mat_id` int(11) NOT NULL,
  `tr_priority` int(11) NOT NULL,
  KEY `tr_trans_id` (`tr_trans_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_raw_mats`
--

INSERT INTO `transaction_raw_mats` (`tr_trans_id`, `tr_raw_mat_id`, `tr_priority`) VALUES
(63, 5, 0),
(64, 6, 0),
(65, 5, 0),
(66, 5, 0),
(67, 5, 0),
(68, 5, 0),
(69, 5, 0),
(70, 2, 0),
(70, 4, 1),
(71, 6, 0),
(72, 2, 0),
(72, 4, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `userid`, `email`, `fname`, `lname`, `password`, `access_key`, `address`, `contact_id`) VALUES
(1, 'don', 'don.belando@gmail.com', 'don', 'belando', 'don', 'Developer', '2320 marconi st. makati', '8442774'),
(2, 'ton', 'ton.ton@gmail.com', 'ton', 'tontonton', 'ton', 'Developer', '1234 Maricaban Pasay', '123456'),
(3, 'jen', 'jen@gmail.com', 'jen', 'jen', 'jen', 'Developer', 'pasig', '123456789'),
(4, 'user1', 'user1@gmail.com', 'user1', 'user1', 'user1', 'User', 'test user1 address', '1234');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_raw_mat_per_cat`
--
CREATE TABLE IF NOT EXISTS `vw_raw_mat_per_cat` (
`raw_mat_id` int(100)
,`raw_mat_desc` varchar(100)
,`raw_mat_cat_id` varchar(100)
,`raw_mat_cat_desc` varchar(100)
,`raw_mat_name` varchar(100)
,`raw_mat_cat_name` varchar(100)
);
-- --------------------------------------------------------

--
-- Structure for view `vw_raw_mat_per_cat`
--
DROP TABLE IF EXISTS `vw_raw_mat_per_cat`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_raw_mat_per_cat` AS select distinct `a`.`raw_mat_id` AS `raw_mat_id`,`a`.`raw_mat_desc` AS `raw_mat_desc`,`a`.`raw_mat_cat_id` AS `raw_mat_cat_id`,`b`.`raw_mat_cat_desc` AS `raw_mat_cat_desc`,`a`.`raw_mat_name` AS `raw_mat_name`,`b`.`raw_mat_cat_name` AS `raw_mat_cat_name` from (`raw_material` `a` join `raw_mat_cat` `b` on((`a`.`raw_mat_cat_id` = `b`.`raw_mat_cat_ids`)));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction_raw_mats`
--
ALTER TABLE `transaction_raw_mats`
  ADD CONSTRAINT `transaction_mat_details` FOREIGN KEY (`tr_trans_id`) REFERENCES `transaction` (`trans_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
