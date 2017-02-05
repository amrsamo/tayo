-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 05, 2017 at 04:40 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tayo`
--

-- --------------------------------------------------------

--
-- Table structure for table `insta_user`
--

CREATE TABLE `insta_user` (
  `id` int(11) NOT NULL,
  `email` varchar(500) CHARACTER SET utf8 NOT NULL,
  `username` varchar(250) CHARACTER SET utf8 NOT NULL,
  `url` varchar(250) CHARACTER SET utf8 NOT NULL,
  `followers` int(11) NOT NULL,
  `hashtag` varchar(200) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `externalUrl` varchar(500) CHARACTER SET utf8 DEFAULT NULL,
  `location` varchar(500) DEFAULT NULL,
  `conner` tinyint(4) NOT NULL DEFAULT '0',
  `instagram_unique_id` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fullName` varchar(500) CHARACTER SET utf8 NOT NULL,
  `profilePicUrl` varchar(500) CHARACTER SET utf8 NOT NULL,
  `biography` varchar(500) CHARACTER SET utf8 NOT NULL,
  `followsCount` int(11) NOT NULL,
  `mediaCount` int(11) NOT NULL,
  `isPrivate` int(11) NOT NULL,
  `isVerified` int(11) NOT NULL,
  `lat` varchar(500) NOT NULL DEFAULT '0',
  `lng` varchar(500) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `username` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `followers` int(11) NOT NULL,
  `hashtag` varchar(200) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `externalUrl` varchar(500) DEFAULT NULL,
  `location` varchar(500) DEFAULT NULL,
  `conner` tinyint(4) NOT NULL DEFAULT '0',
  `instagram_unique_id` varchar(100) NOT NULL,
  `fullName` varchar(500) NOT NULL,
  `profilePicUrl` varchar(500) NOT NULL,
  `biography` varchar(500) NOT NULL,
  `followsCount` int(11) NOT NULL,
  `mediaCount` int(11) NOT NULL,
  `isPrivate` int(11) NOT NULL,
  `isVerified` int(11) NOT NULL,
  `lat` varchar(500) NOT NULL DEFAULT '0',
  `lng` varchar(500) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_test`
--

CREATE TABLE `user_test` (
  `id` int(11) NOT NULL,
  `email` varchar(500) NOT NULL,
  `username` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `followers` int(11) NOT NULL,
  `hashtag` varchar(200) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `externalUrl` varchar(500) DEFAULT NULL,
  `location` varchar(500) DEFAULT NULL,
  `conner` tinyint(4) NOT NULL DEFAULT '0',
  `instagram_unique_id` varchar(100) NOT NULL,
  `fullName` varchar(500) NOT NULL,
  `profilePicUrl` varchar(500) NOT NULL,
  `biography` varchar(500) NOT NULL,
  `followsCount` int(11) NOT NULL,
  `mediaCount` int(11) NOT NULL,
  `isPrivate` int(11) NOT NULL,
  `isVerified` int(11) NOT NULL,
  `lat` varchar(500) NOT NULL,
  `lng` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insta_user`
--
ALTER TABLE `insta_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_test`
--
ALTER TABLE `user_test`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insta_user`
--
ALTER TABLE `insta_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=742212;
--
-- AUTO_INCREMENT for table `user_test`
--
ALTER TABLE `user_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=827473;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
