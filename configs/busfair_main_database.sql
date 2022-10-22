-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2022 at 07:16 PM
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
-- Table structure for table `all_directions`
--

CREATE TABLE `all_directions` (
  `direction_id` int(11) NOT NULL,
  `direction_route` varchar(20) NOT NULL,
  `direction_place` varchar(20) NOT NULL,
  `direction_distance` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `all_places`
--

CREATE TABLE `all_places` (
  `place_id` int(11) NOT NULL,
  `placeNameEn` varchar(50) NOT NULL,
  `placeNameBn` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `all_routes`
--

CREATE TABLE `all_routes` (
  `route_id` int(11) NOT NULL,
  `route_no` varchar(20) NOT NULL,
  `routeStartPlace` varchar(20) NOT NULL,
  `routeEndPlace` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `api_requests`
--

CREATE TABLE `api_requests` (
  `id` int(11) NOT NULL,
  `ipAddress` varchar(30) NOT NULL,
  `location` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `settingsType` varchar(20) NOT NULL,
  `settingsTitle` varchar(50) NOT NULL,
  `settingsValue` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `settingsType`, `settingsTitle`, `settingsValue`) VALUES
(1, 'site', 'siteName', 'BusFair'),
(2, 'api', 'apiStatus', 'Inactive'),
(3, 'api', 'fairRate', '2.5');

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
  `activation_status` varchar(20) NOT NULL,
  `last_ip` varchar(30) NOT NULL,
  `last_location` varchar(100) NOT NULL,
  `last_login` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `user_id`, `role`, `username`, `password`, `full_name`, `activation_status`, `last_ip`, `last_location`, `last_login`) VALUES
(1, '111', 'admin', 'himu', '419715', 'Sharier Himu', 'active', '59.153.16.129', 'Barishal', '22-10-2022; 11:04:49 PM'),
(2, '0001', 'admin', 'piyal', '453860', 'Piyal Ahmed', 'active', '', '', ''),
(3, '0002', 'admin', 'sajal', '089747', 'Sajal Halder', 'active', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_directions`
--
ALTER TABLE `all_directions`
  ADD PRIMARY KEY (`direction_id`);

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
-- Indexes for table `api_requests`
--
ALTER TABLE `api_requests`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `all_directions`
--
ALTER TABLE `all_directions`
  MODIFY `direction_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `all_places`
--
ALTER TABLE `all_places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `all_routes`
--
ALTER TABLE `all_routes`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `api_requests`
--
ALTER TABLE `api_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
