
-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 25, 2016 at 09:59 PM
-- Server version: 5.1.57
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `a3022695_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoption`
--

DROP TABLE IF EXISTS `adoption`;
CREATE TABLE IF NOT EXISTS `adoption` (
  `adoptionId` int(11) NOT NULL AUTO_INCREMENT,
  `petId` int(11) DEFAULT NULL,
  `shelterId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `delivery_time` time DEFAULT NULL,
  PRIMARY KEY (`adoptionId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;


-- --------------------------------------------------------

--
-- Table structure for table `petInfo`
--

DROP TABLE IF EXISTS `petInfo`;
CREATE TABLE IF NOT EXISTS `petInfo` (
  `petId` int(11) NOT NULL AUTO_INCREMENT,
    `adopted` int(1) NOT NULL,
  `petType` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `pet_name` varchar(25) COLLATE latin1_general_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `breed` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `furColor` varchar(10) COLLATE latin1_general_ci DEFAULT NULL,
  `picturePath` varchar(1000) COLLATE latin1_general_ci DEFAULT NULL,
  `pet_description` varchar(500) COLLATE latin1_general_ci NOT NULL,
  `shelterId` int(11) DEFAULT NULL,
  PRIMARY KEY (`petId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Table structure for table `shelterInfo`
--

DROP TABLE IF EXISTS `shelterInfo`;
CREATE TABLE IF NOT EXISTS `shelterInfo` (
  `shelterId` int(11) NOT NULL AUTO_INCREMENT,
  `shelter_name` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `shelter_address` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `shelter_description` varchar(300) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`shelterId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `shelterReview`
--

DROP TABLE IF EXISTS `shelterReview`;
CREATE TABLE IF NOT EXISTS `shelterReview` (
  `user_name` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `shelterId` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `review` varchar(300) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`shelterId`,`user_name`),
  KEY `user_name` (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shelters`
--

DROP TABLE IF EXISTS `shelters`;
CREATE TABLE IF NOT EXISTS `shelters` (
  `user_name` varchar(25) COLLATE latin1_general_ci NOT NULL,
  `shelterId` int(11) NOT NULL,
  `firstname` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `lastname` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(32) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`user_name`),
  KEY `shelterId` (`shelterId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_name` varchar(25) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `password` varchar(32) COLLATE latin1_general_ci NOT NULL,
  `firstname` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `lastname` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `address` varchar(100) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

