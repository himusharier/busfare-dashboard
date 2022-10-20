-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2022 at 09:26 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `busfair_main_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_places`
--

CREATE TABLE `all_places` (
  `place_id` int(11) NOT NULL,
  `placeNameEn` varchar(50) NOT NULL,
  `placeNameBn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `all_places`
--

INSERT INTO `all_places` (`place_id`, `placeNameEn`, `placeNameBn`) VALUES
(3, 'Fantasy Kingdom', 'ফ্যান্টাসী কিংডম'),
(4, 'Jatrabari', 'যাত্রাবাড়ী'),
(5, 'Jatrabari', 'যাত্রাবাড়ী'),
(6, 'Jatrabari', 'যাত্রাবাড়ী'),
(7, 'Signboard', 'সাইনবোর্ড'),
(8, 'Jatrabari', 'যাত্রাবাড়ী'),
(9, 'Signboard', 'সাইনবোর্ড'),
(10, 'Jatrabari', 'যাত্রাবাড়ী'),
(11, 'Jatrabari', 'যাত্রাবাড়ী'),
(12, 'Jatrabari', 'যাত্রাবাড়ী'),
(13, 'Jatrabari', 'যাত্রাবাড়ী'),
(14, 'Jatrabari', 'যাত্রাবাড়ী'),
(15, 'Jatrabari', 'যাত্রাবাড়ী'),
(16, 'Jatrabari', 'যাত্রাবাড়ী'),
(17, 'Jatrabari', 'যাত্রাবাড়ী'),
(18, 'Jatrabari', 'যাত্রাবাড়ী'),
(19, 'Jatrabari', 'যাত্রাবাড়ী'),
(20, 'Jatrabari', 'যাত্রাবাড়ী'),
(21, 'Jatrabari', 'যাত্রাবাড়ী'),
(22, 'Jatrabari', 'যাত্রাবাড়ী'),
(23, 'Jatrabari', 'যাত্রাবাড়ী'),
(24, 'Jatrabari', 'যাত্রাবাড়ী'),
(25, 'Jatrabari', 'যাত্রাবাড়ী'),
(26, 'Jatrabari', 'যাত্রাবাড়ী'),
(27, 'Jatrabari', 'যাত্রাবাড়ী'),
(28, 'Jatrabari', 'যাত্রাবাড়ী'),
(29, 'Jatrabari', 'যাত্রাবাড়ী'),
(30, 'Jatrabari', 'যাত্রাবাড়ী'),
(31, 'Jatrabari', 'যাত্রাবাড়ী');

-- --------------------------------------------------------

--
-- Table structure for table `all_routes`
--

CREATE TABLE `all_routes` (
  `route_id` int(11) NOT NULL,
  `route_no` varchar(20) NOT NULL,
  `routeNameEn` varchar(50) NOT NULL,
  `routeNameBn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `settingsTitle` varchar(50) NOT NULL,
  `settingsValue` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `settingsTitle`, `settingsValue`) VALUES
(1, 'siteName', 'BusFair');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `activation_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `user_id`, `role`, `username`, `password`, `full_name`, `activation_status`) VALUES
(1, '111', 'admin', 'himu', '419715', 'Sharier Himu', 'active'),
(2, '0001', 'admin', 'piyal', '453860', 'Piyal Ahmed', 'active'),
(3, '0002', 'admin', 'sajal', '089747', 'Sajal Halder', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_places`
--
ALTER TABLE `all_places`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `all_routes`
--
ALTER TABLE `all_routes`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_places`
--
ALTER TABLE `all_places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `all_routes`
--
ALTER TABLE `all_routes`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
