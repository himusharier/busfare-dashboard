-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 03:54 PM
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
-- Table structure for table `all_buses`
--

CREATE TABLE `all_buses` (
  `bus_id` int(11) NOT NULL,
  `busNameEn` varchar(100) NOT NULL,
  `busNameBn` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `all_buses`
--

INSERT INTO `all_buses` (`bus_id`, `busNameEn`, `busNameBn`) VALUES
(1, 'Achim Paribahan', 'অসীম পরিবহণ'),
(2, 'Agradut', 'অগ্রদূত'),
(3, 'Airport Bangabandhu Avenue Transport', 'এয়ারপোর্ট বঙ্গবন্ধু এভিনিউ ট্রান্সপোর্ট');

-- --------------------------------------------------------

--
-- Table structure for table `all_directions`
--

CREATE TABLE `all_directions` (
  `direction_id` int(11) NOT NULL,
  `direction_route` varchar(20) NOT NULL,
  `direction_place` varchar(20) NOT NULL,
  `direction_distance` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `all_directions`
--

INSERT INTO `all_directions` (`direction_id`, `direction_route`, `direction_place`, `direction_distance`) VALUES
(1, '1', '1', 0),
(2, '1', '2', 2.2),
(3, '1', '3', 4.7),
(4, '1', '4', 6.1),
(5, '1', '5', 6.8),
(6, '1', '6', 11.4),
(7, '1', '7', 13.7),
(8, '1', '8', 15.6),
(9, '1', '9', 16.6),
(10, '1', '10', 17.8),
(11, '1', '11', 18.9),
(12, '1', '12', 19.9),
(13, '1', '13', 24.8),
(14, '1', '14', 28.8),
(15, '2', '15', 0),
(16, '2', '16', 0.4),
(17, '2', '17', 0.7),
(18, '2', '18', 1.4),
(19, '2', '3', 2.3),
(20, '2', '4', 3.7),
(21, '2', '6', 9),
(22, '2', '19', 13.2),
(23, '2', '20', 14.7),
(24, '2', '21', 15.7),
(25, '2', '22', 16.9),
(26, '3', '23', 0),
(27, '3', '2', 0.9),
(28, '3', '16', 1.3),
(29, '3', '17', 1.8),
(30, '3', '18', 2.3),
(31, '3', '3', 3.2),
(32, '3', '4', 4.6),
(33, '3', '5', 5.3),
(34, '3', '24', 7),
(35, '3', '25', 10.6),
(36, '3', '26', 11.1),
(37, '3', '27', 15.1),
(38, '4', '23', 0),
(39, '4', '28', 2),
(40, '4', '29', 2.4),
(41, '4', '30', 3.7),
(42, '4', '31', 4.6),
(43, '4', '32', 5.5),
(44, '4', '33', 9.1),
(45, '4', '34', 11.8),
(46, '4', '35', 14.9),
(47, '4', '9', 16.7),
(48, '5', '36', 0),
(49, '5', '16', 0.7),
(50, '5', '17', 1.1),
(51, '5', '18', 1.5),
(52, '5', '3', 2.6),
(53, '5', '4', 3.7),
(54, '5', '6', 9),
(55, '5', '8', 13.5),
(56, '5', '37', 13.8),
(57, '5', '38', 17),
(58, '6', '39', 0),
(59, '6', '30', 1.8),
(60, '6', '31', 2.7),
(61, '6', '40', 3.8),
(62, '6', '41', 5),
(63, '6', '42', 5.4),
(64, '6', '43', 6.3),
(65, '6', '33', 7.2),
(66, '6', '6', 9),
(67, '6', '44', 10),
(68, '6', '7', 11.4),
(69, '6', '19', 13.1),
(70, '6', '37', 14.1),
(71, '6', '45', 17.2),
(72, '6', '11', 18.3),
(73, '7', '30', 0),
(74, '7', '31', 1),
(75, '7', '32', 2.2),
(76, '7', '41', 3.2),
(77, '7', '42', 3.9),
(78, '7', '43', 4.6),
(79, '7', '26', 6.8),
(80, '7', '46', 7.4),
(81, '7', '34', 8.4),
(82, '7', '47', 9.3),
(83, '7', '7', 9.7),
(84, '7', '19', 11.5),
(85, '7', '48', 12.5),
(86, '7', '49', 13.8),
(87, '7', '12', 17.6),
(88, '8', '2', 0),
(89, '8', '50', 4.4),
(90, '8', '3', 8.9),
(91, '8', '4', 10.3),
(92, '8', '5', 11),
(93, '8', '24', 12.7),
(94, '8', '51', 14),
(95, '8', '43', 14.5),
(96, '8', '52', 15.9),
(97, '8', '53', 22),
(98, '9', '54', 0),
(99, '9', '30', 1),
(100, '9', '42', 4.6),
(101, '9', '33', 6.6),
(102, '9', '55', 8.6),
(103, '9', '46', 9),
(104, '9', '34', 10),
(105, '9', '56', 10.6),
(106, '9', '57', 10.8),
(107, '9', '53', 12),
(108, '10', '58', 0),
(109, '10', '3', 2.1),
(110, '10', '30', 3.6),
(111, '10', '59', 5.3),
(112, '10', '42', 7.4),
(113, '10', '33', 8.9),
(114, '10', '26', 9.4),
(115, '10', '46', 10.1),
(116, '10', '34', 11.9),
(117, '10', '7', 13.1),
(118, '10', '19', 14.7),
(119, '10', '60', 17.1),
(120, '10', '61', 18.1),
(121, '10', '62', 20.9),
(122, '10', '63', 23.3),
(123, '10', '64', 25.7),
(124, '11', '39', 0),
(125, '11', '30', 1.8),
(126, '11', '40', 3.8),
(127, '11', '42', 5.4),
(128, '11', '33', 7.2),
(129, '11', '6', 9),
(130, '11', '19', 12.6),
(131, '11', '9', 13.7),
(132, '11', '22', 16),
(133, '12', '65', 0),
(134, '12', '66', 15.5),
(135, '12', '67', 17.7),
(136, '12', '68', 18.4),
(137, '12', '69', 20.7),
(138, '12', '70', 23.5),
(139, '12', '71', 24.4),
(140, '12', '72', 26.4),
(141, '12', '73', 28.4),
(142, '12', '74', 30.2),
(143, '12', '6', 33.1),
(144, '12', '7', 35.5),
(145, '12', '19', 37.3),
(146, '12', '75', 38.8),
(147, '12', '76', 40.2),
(148, '12', '77', 47.5),
(149, '1', '1', 101),
(150, '1', '8', 102),
(151, '1', '8', 102),
(152, '1', '19', 104),
(153, '1', '20', 105),
(154, '1', '21', 106);

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
(1, 'Kalshi', 'কালশী'),
(2, 'Mirpur-12', 'মিরপুর-১২'),
(3, 'Mirpur-10', 'মিরপুর-১০'),
(4, 'Kajipara', 'কাজীপাড়া'),
(5, 'Shewrapara', 'শেওড়াপাড়া'),
(6, 'Farmgate', 'ফার্মগেট'),
(7, 'Shahbag', 'শাহবাগ'),
(8, 'Paltan', 'পল্টন'),
(9, 'Gulistan', 'গুলিস্তান'),
(10, 'Tikatuli', 'টিকাটুলি'),
(11, 'Sayedabad', 'সায়েদাবাদ'),
(12, 'Jatrabari', 'যাত্রাবাড়ী'),
(13, 'Signboard', 'সাইনবোর্ড'),
(14, 'Kachpurbridge', 'কাঁচপুরব্রীজ'),
(15, 'Pallabi (Mirpur-12)', 'পল্লবী (মিরপুর-১২)'),
(16, 'Mirpur-11.5', 'মিরপুর-১১.৫'),
(17, 'Boikali Hotel', 'বৈকালী হোটেল'),
(18, 'Mirpur-11', 'মিরপুর-১১'),
(19, 'Pressclub', 'প্রেসক্লাব'),
(20, 'T&amp;T', 'টিএন্ডটি'),
(21, 'Raisaheb Bazar', 'রায়সাহেব বাজার'),
(22, 'Victoria Park', 'ভিক্টরিয়া পার্ক'),
(23, 'Duaripara', 'দুয়ারীপাড়া'),
(24, 'Agargaon', 'আগারগাঁও'),
(25, 'Dhanmondi', 'ধানমন্ডি'),
(26, 'Shukrabad', 'শুক্রাবাদ'),
(27, 'Dhakeshwari Mondir', 'ঢাকেশ্বরী মন্দির'),
(28, 'Proshika', 'প্রশিকা'),
(29, 'Mirpur Thana', 'মিরপুর থানা'),
(30, 'Mirpur-1', 'মিরপুর-১'),
(31, 'Ansarcamp', 'আনসারক্যাম্প'),
(32, 'Technical', 'টেকনিক্যাল'),
(33, 'Asadgate', 'আসাদগেট'),
(34, 'Sciencelab', 'সায়েন্সল্যাব'),
(35, 'Buet', 'বুয়েট'),
(36, 'Pallabi (ceramic)', 'পল্লবী (সিরামিক)'),
(37, 'Stadium', 'স্টেডিয়াম'),
(38, 'Notredame College', 'নটরড্যাম কলেজ'),
(39, 'Chiriakhana', 'চিড়িয়াখানা'),
(40, 'Darussalam', 'দারুসসালাম'),
(41, 'Kalyanpur', 'কল্যাণপুর'),
(42, 'Shyamoli', 'শ্যামলী'),
(43, 'Collegegate', 'কলেজগেট'),
(44, 'Kawranbazar', 'কাওরানবাজার'),
(45, 'Ittefaq', 'ইত্তেফাক'),
(46, 'Kolabagan', 'কলাবাগান'),
(47, 'Katabon', 'কাটাবন'),
(48, 'Gulistan Mor', 'গুলিস্তান মোড়'),
(49, 'Bangladesh Bank', 'বাংলাদেশ ব্যাংক'),
(50, 'ECB Mor', 'ইসিবি মোড়'),
(51, 'Shishumela', 'শিশুমেলা'),
(52, 'Manikmia Avenue', 'মানিকমিয়া এভিনিউ'),
(53, 'Azimpur', 'আজিমপুর'),
(54, 'Mirpur Majar Road', 'মিরপুর মাজার রোড'),
(55, 'Rasel Square', 'রাসেল স্কয়ার'),
(56, 'Newmarket', 'নিউমার্কেট'),
(57, 'Nilkhet', 'নীলক্ষেত'),
(58, 'Mirpur-14', 'মিরপুর-১৪'),
(59, 'Bangla College', 'বাংলা কলেজ'),
(60, 'Shapla Chottor', 'শাপলা চত্বর'),
(61, 'Kamalapur', 'কমলাপুর'),
(62, 'Basabo', 'বাসাবো'),
(63, 'Khilgaon Railgate', 'খিলগাঁও রেলগেট'),
(64, 'Khilgaon Taltola', 'খিলগাঁও তালতলা'),
(65, 'Baipayl', 'বাইপাইল'),
(66, 'Kamarpara', 'কামারপাড়া'),
(67, 'Abdullahpur', 'আব্দুল্লাহপুর'),
(68, 'Azampur', 'আজমপুর'),
(69, 'Airport', 'এয়ারপোর্ট'),
(70, 'Khilkhet', 'খিলক্ষেত'),
(71, 'Bishyaroad', 'বিশ্বরোড'),
(72, 'Stuffroad', 'স্টাফরোড'),
(73, 'Kakoli', 'কাকলি'),
(74, 'Mahakhali', 'মহাখালী'),
(75, 'Fulbaria', 'ফুলবাড়িয়া'),
(76, 'Babu Bazar Bridge', 'বাবু বাজার ব্রীজ'),
(77, 'Keraniganj (Notun Jailkhana)', 'কেরানীগঞ্জ (নতুন জেলখানা)');

-- --------------------------------------------------------

--
-- Table structure for table `all_routes`
--

CREATE TABLE `all_routes` (
  `route_id` int(11) NOT NULL,
  `route_no` varchar(20) NOT NULL,
  `routeStartPlace` varchar(20) NOT NULL,
  `routeEndPlace` varchar(20) NOT NULL,
  `routeDistance` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `all_routes`
--

INSERT INTO `all_routes` (`route_id`, `route_no`, `routeStartPlace`, `routeEndPlace`, `routeDistance`) VALUES
(1, 'A-101', '1', '14', '28.8'),
(2, 'A-102', '15', '22', '16.9'),
(3, 'A-105', '23', '27', '15.10'),
(4, 'A-110', '23', '9', '16.7'),
(5, 'A-111', '36', '38', '17.0'),
(6, 'A-114', '39', '11', '18.3'),
(7, 'A-115', '30', '12', '17.6'),
(8, 'A-122', '2', '53', '22.0'),
(9, 'A-127', '54', '53', '12.0'),
(10, 'A-129', '58', '64', '25.7'),
(11, 'A-131', '39', '22', '16.0'),
(12, 'A-132', '65', '77', '47.5'),
(14, 'R-111', '1', '75', '100'),
(15, 'R-222', '1', '4', '99'),
(16, 'R-333', '1', '8', '98'),
(17, 'R-444', '1', '9', '96');

-- --------------------------------------------------------

--
-- Table structure for table `all_routes_bus_list`
--

CREATE TABLE `all_routes_bus_list` (
  `id` int(11) NOT NULL,
  `route_id` varchar(20) NOT NULL,
  `bus_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `all_routes_bus_list`
--

INSERT INTO `all_routes_bus_list` (`id`, `route_id`, `bus_no`) VALUES
(1, 'R-111', '1'),
(2, 'R-111', '2'),
(3, 'R-111', '3'),
(4, 'mysql_insert_id()', '1'),
(5, 'mysql_insert_id()', '2'),
(6, '17', '1'),
(7, '17', '2'),
(8, 'R-444', '3'),
(9, '17', '3'),
(10, '1', '1'),
(11, '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `api_requests`
--

CREATE TABLE `api_requests` (
  `id` int(11) NOT NULL,
  `ipAddress` varchar(30) NOT NULL,
  `locationCity` varchar(100) NOT NULL,
  `locationCountry` varchar(100) NOT NULL,
  `date` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `requestPage` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `api_requests`
--

INSERT INTO `api_requests` (`id`, `ipAddress`, `locationCity`, `locationCountry`, `date`, `time`, `requestPage`) VALUES
(1, '', '', '', '27-10-2022', '12:39:30 PM', '/getplaces'),
(2, '', '', '', '27-10-2022', '12:48:20 PM', '/getplaces'),
(3, '', '', '', '27-10-2022', '12:50:04 PM', '/getplaces'),
(4, '', '', '', '27-10-2022', '12:50:54 PM', '/getplaces'),
(5, '', '', '', '27-10-2022', '12:50:56 PM', '/getplaces'),
(6, '', '', '', '27-10-2022', '12:51:32 PM', '/getplaces'),
(7, '', '', '', '27-10-2022', '12:53:17 PM', '/getroutes'),
(8, '', '', '', '27-10-2022', '12:54:26 PM', '/getroutes'),
(9, '', '', '', '27-10-2022', '1:06:38 PM', '/getroutes'),
(10, '', '', '', '27-10-2022', '1:07:10 PM', '/getdirections'),
(11, '', '', '', '27-10-2022', '1:08:14 PM', '/getdirections'),
(12, '', '', '', '27-10-2022', '1:09:02 PM', '/getdirections'),
(13, '', '', '', '27-10-2022', '1:09:04 PM', '/getdirections'),
(14, '', '', '', '27-10-2022', '1:09:18 PM', '/getdirections'),
(15, '', '', '', '27-10-2022', '1:09:25 PM', '/getdirections'),
(16, '', '', '', '27-10-2022', '1:11:06 PM', '/getdirections'),
(17, '', '', '', '27-10-2022', '1:11:07 PM', '/getdirections'),
(18, '', '', '', '29-10-2022', '8:35:36 PM', '/getplaces'),
(19, '', '', '', '31-10-2022', '2:47:38 PM', '/getplaces'),
(20, '', '', '', '31-10-2022', '2:49:52 PM', '/getplaces'),
(21, '', '', '', '31-10-2022', '2:50:16 PM', '/getplaces'),
(22, '', '', '', '01-11-2022', '2:00:36 AM', '/getbuses'),
(23, '', '', '', '01-11-2022', '2:06:40 AM', '/getroutes'),
(24, '', '', '', '01-11-2022', '2:07:28 AM', '/getroutes'),
(25, '', '', '', '01-11-2022', '2:07:30 AM', '/getroutes'),
(26, '', '', '', '01-11-2022', '2:07:46 AM', '/getroutes'),
(27, '', '', '', '01-11-2022', '2:10:08 AM', '/getroutes');

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
(1, 'site', 'siteName', 'BusFare'),
(2, 'api', 'apiStatus', 'Active'),
(3, 'api', 'apiVersion', '1.1.1'),
(4, 'api', 'fairRate', '2.45'),
(5, 'api', 'minimumFare', '10'),
(6, 'api', 'lastInfoUpdate', '01-09-2022');

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
(1, '111', 'admin', 'himu', '419715', 'Sharier Himu', 'active', '', '', '31-10-2022; 5:28:31 PM'),
(2, '0001', 'admin', 'piyal', '4301', 'Piyal Ahmed', 'active', '43.250.83.89', 'Dhaka', '23-10-2022; 12:47:13 PM'),
(3, '0002', 'admin', 'sajal', '089747', 'Sajal Halder', 'active', '103.169.160.66', 'Dhaka', '23-10-2022; 1:27:57 AM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_buses`
--
ALTER TABLE `all_buses`
  ADD PRIMARY KEY (`bus_id`);

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
-- Indexes for table `all_routes_bus_list`
--
ALTER TABLE `all_routes_bus_list`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `all_buses`
--
ALTER TABLE `all_buses`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `all_directions`
--
ALTER TABLE `all_directions`
  MODIFY `direction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `all_places`
--
ALTER TABLE `all_places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `all_routes`
--
ALTER TABLE `all_routes`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `all_routes_bus_list`
--
ALTER TABLE `all_routes_bus_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `api_requests`
--
ALTER TABLE `api_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
