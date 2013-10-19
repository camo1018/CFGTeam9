-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 19, 2013 at 04:50 AM
-- Server version: 5.5.29-log
-- PHP Version: 5.4.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `manafitness`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `cache_proc`()
BEGIN
DELETE FROM calorie_month WHERE date < UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL 30 DAY));
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `calorie_count`
--

CREATE TABLE IF NOT EXISTS `calorie_count` (
  `cal_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(1) NOT NULL,
  `calories` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`cal_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `calorie_count`
--

INSERT INTO `calorie_count` (`cal_id`, `user_id`, `type`, `calories`, `date`) VALUES
(4, 14, 'M', 1200, '2013-10-08'),
(6, 14, 'W', 2500, '2013-10-16'),
(7, 14, 'M', 200, '2013-09-23'),
(8, 14, 'M', 350, '2013-10-04'),
(9, 14, 'W', 250, '2013-10-17'),
(10, 14, 'M', 500, '2013-10-16'),
(11, 14, 'W', 400, '2013-10-15'),
(12, 14, 'M', 1050, '2013-10-13'),
(13, 14, 'W', 50, '2013-10-14');

--
-- Triggers `calorie_count`
--
DROP TRIGGER IF EXISTS `Update Month`;
DELIMITER //
CREATE TRIGGER `Update Month` AFTER INSERT ON `calorie_count`
 FOR EACH ROW INSERT INTO calorie_month (user_id, type, calories, date)
VALUES (NEW.user_id, NEW.type, NEW.calories, NEW.date)
//
DELIMITER ;
DROP TRIGGER IF EXISTS `Update Movement`;
DELIMITER //
CREATE TRIGGER `Update Movement` BEFORE INSERT ON `calorie_count`
 FOR EACH ROW IF 
(NEW.type='M' AND 
(SELECT COUNT(*) FROM calorie_count WHERE date=NEW.date AND type='M' = 1))
THEN
DELETE FROM calorie_count WHERE date = NEW.date AND type='M';
DELETE FROM calorie_month WHERE date = NEW.date AND type='M';
END IF
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `calorie_month`
--

CREATE TABLE IF NOT EXISTS `calorie_month` (
  `cal_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` varchar(1) NOT NULL,
  `calories` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`cal_id`),
  KEY `user_id` (`user_id`),
  KEY `user_id_2` (`user_id`),
  KEY `user_id_3` (`user_id`),
  KEY `user_id_4` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `calorie_month`
--

INSERT INTO `calorie_month` (`cal_id`, `user_id`, `type`, `calories`, `date`) VALUES
(1, 14, 'M', 1200, '2013-10-08'),
(2, 14, 'W', 2500, '2013-10-16'),
(3, 14, 'M', 200, '2013-09-23'),
(4, 14, 'M', 350, '2013-10-04'),
(5, 14, 'W', 250, '2013-10-17'),
(6, 14, 'M', 500, '2013-10-16'),
(7, 14, 'W', 400, '2013-10-15'),
(8, 14, 'M', 1050, '2013-10-13'),
(9, 14, 'W', 50, '2013-10-14');

--
-- Triggers `calorie_month`
--
DROP TRIGGER IF EXISTS `Update Total`;
DELIMITER //
CREATE TRIGGER `Update Total` AFTER INSERT ON `calorie_month`
 FOR EACH ROW IF EXISTS (SELECT * from calorie_total WHERE user_id = NEW.user_id AND type = NEW.type)
THEN UPDATE calorie_total SET calories = (calories + NEW.calories)
WHERE user_id = NEW.user_id AND type = NEW.type;
ELSE
INSERT INTO calorie_total VALUES (NEW.user_id, NEW.type, NEW.calories);
END IF
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `calorie_total`
--

CREATE TABLE IF NOT EXISTS `calorie_total` (
  `user_id` int(11) NOT NULL,
  `type` varchar(1) NOT NULL,
  `calories` int(11) NOT NULL,
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `calorie_total`
--

INSERT INTO `calorie_total` (`user_id`, `type`, `calories`) VALUES
(14, 'M', 3300),
(14, 'W', 3200);

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE IF NOT EXISTS `campaigns` (
  `campaign_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(128) NOT NULL,
  `description` text,
  `progress` int(11) NOT NULL,
  `goal` int(11) NOT NULL,
  `metric` char(4) NOT NULL,
  `num_followers` int(11) NOT NULL,
  `num_members` int(11) NOT NULL,
  `lives_saved` int(11) NOT NULL,
  PRIMARY KEY (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `campaign_activity`
--

CREATE TABLE IF NOT EXISTS `campaign_activity` (
  `c_activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) NOT NULL,
  `action` char(1) NOT NULL,
  `entity` int(11) NOT NULL,
  PRIMARY KEY (`c_activity_id`),
  KEY `campaign_id` (`campaign_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `group_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` char(64) NOT NULL,
  `description` text,
  `num_followers` int(11) NOT NULL,
  `num_members` int(11) NOT NULL,
  `lives_saved` int(11) NOT NULL,
  `campaigns` text NOT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_activity`
--

CREATE TABLE IF NOT EXISTS `group_activity` (
  `g_activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `action` char(1) NOT NULL,
  `entity` int(11) NOT NULL,
  PRIMARY KEY (`g_activity_id`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(15) NOT NULL,
  `last_name` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `email`) VALUES
(11, 'hellohello', '23b431acfeb41e15d466d75de822307c', 'hellohello', 'hellohello', 'hello@hello.com'),
(12, 'testacc', '33c0fc48dfec3ddae7e3398e30e89a61', 'Paul', '', 'test@gmail.com'),
(13, 'paulpark', 'e2f79a37f49e0dae478c9f8c169ae41c', 'Paul', 'Park', 'paulpark@testemail.c'),
(14, 'masudurrahman', 'df7890a60260c61562d3f20448763ab3', 'Masudur', 'Rahman', 'mr3rw@virginia.edu');

-- --------------------------------------------------------

--
-- Table structure for table `users_activity`
--

CREATE TABLE IF NOT EXISTS `users_activity` (
  `activity_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `action` char(1) NOT NULL,
  `entity` int(11) NOT NULL,
  PRIMARY KEY (`activity_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `calorie_count`
--
ALTER TABLE `calorie_count`
  ADD CONSTRAINT `calorie_count_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `calorie_month`
--
ALTER TABLE `calorie_month`
  ADD CONSTRAINT `calorie_month_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `calorie_total`
--
ALTER TABLE `calorie_total`
  ADD CONSTRAINT `calorie_total_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `campaign_activity`
--
ALTER TABLE `campaign_activity`
  ADD CONSTRAINT `campaign_activity_ibfk_1` FOREIGN KEY (`campaign_id`) REFERENCES `campaigns` (`campaign_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_activity`
--
ALTER TABLE `group_activity`
  ADD CONSTRAINT `group_activity_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_activity`
--
ALTER TABLE `users_activity`
  ADD CONSTRAINT `users_activity_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`ec2-54-221-102-63.compute-1.amazonaws.com` EVENT `Calorie Monthly Table Update` ON SCHEDULE EVERY 1 DAY STARTS '2013-10-18 00:00:00' ENDS '2013-12-31 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO Call cache_proc$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
