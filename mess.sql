-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2016 at 06:24 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mess`
--

-- --------------------------------------------------------

--
-- Table structure for table `current_status`
--

CREATE TABLE IF NOT EXISTS `current_status` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `total_value` int(10) DEFAULT NULL,
  `total_meal` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_status`
--

INSERT INTO `current_status` (`id`, `username`, `total_value`, `total_meal`) VALUES
(10, 'sisir', 456, 2),
(11, 'foysal', 345, 1),
(12, 'rahman', 500, 1),
(13, 'sharif', 200, 1);

-- --------------------------------------------------------

--
-- Table structure for table `meal`
--

CREATE TABLE IF NOT EXISTS `meal` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `breakfast` int(1) DEFAULT NULL,
  `lunch` int(1) DEFAULT NULL,
  `dinner` int(1) DEFAULT NULL,
  `meal_sum` int(1) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meal`
--

INSERT INTO `meal` (`id`, `date`, `username`, `breakfast`, `lunch`, `dinner`, `meal_sum`) VALUES
(3, '2016-05-08', 'sisir', 0, 1, 1, 2),
(4, '2016-05-08', 'foysal', 0, 1, 0, 1),
(5, '2016-05-08', 'rahman', 0, 0, 1, 1),
(6, '2016-05-08', 'sharif', 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `fullname` varchar(40) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `fullname`, `email`, `mobile`) VALUES
(7, 'sisir', 'Sisir Mahmud', 'sisir@gmail.com', 1914504779),
(8, 'foysal', 'Abdullah Al Foysal', 'foysal@gmail.com', 1915768765),
(9, 'rahman', 'Rahman', 'rahman@gmail.com', 1915768765),
(10, 'sharif', 'Hossain Md Sharif', 'sharif.aiub.20@gmail.com', 1914504779);

-- --------------------------------------------------------

--
-- Table structure for table `shopping`
--

CREATE TABLE IF NOT EXISTS `shopping` (
  `id` int(6) NOT NULL,
  `date` date NOT NULL,
  `username` varchar(20) NOT NULL,
  `shop_value` int(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shopping`
--

INSERT INTO `shopping` (`id`, `date`, `username`, `shop_value`) VALUES
(4, '2016-05-08', 'sisir', 456),
(5, '2016-05-08', 'foysal', 345),
(6, '2016-05-08', 'rahman', 500),
(7, '2016-05-08', 'sharif', 200);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`) VALUES
(8, 'admin', 'admin', 'admin'),
(9, 'sisir', 'sisir', 'member'),
(10, 'foysal', 'foysal', 'member'),
(11, 'rahman', 'rahman', 'member'),
(12, 'sharif', 'sharif', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `current_status`
--
ALTER TABLE `current_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meal`
--
ALTER TABLE `meal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shopping`
--
ALTER TABLE `shopping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `current_status`
--
ALTER TABLE `current_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `meal`
--
ALTER TABLE `meal`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `shopping`
--
ALTER TABLE `shopping`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
