-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 09:17 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

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
(1, 'Achim Paribahan', ''),
(2, 'Agradut', ''),
(3, 'Airport Bangabandhu Avenue Transport', ''),
(4, 'Ajmeri Glory', ''),
(5, 'Akash', ''),
(6, 'Akik', ''),
(7, 'Al Madina Plus One', ''),
(8, 'Al Makka Transport', ''),
(9, 'Alif Enterprise', ''),
(10, 'Anabil Super', ''),
(11, 'Arnob', ''),
(12, 'Ashirbad Paribahan', ''),
(13, 'Ashulia Classic', ''),
(14, 'Asmani', ''),
(15, 'ATCL', ''),
(16, 'Ayat', ''),
(17, 'Bahon', ''),
(18, 'Baishakhi', ''),
(19, 'Balaka', ''),
(20, 'Basumati', ''),
(21, 'Basumati Transport', ''),
(22, 'Best Shatabdi (AC)', ''),
(23, 'Best Transport', ''),
(24, 'Bhuyan Paribahan', ''),
(25, 'Bihanga', ''),
(26, 'Bihanga Paribahan', ''),
(27, 'Bihango', ''),
(28, 'Bihango Paribahan', ''),
(29, 'Bikalpa auto service', ''),
(30, 'Bikalpa City Super Service', ''),
(31, 'Bikash', ''),
(32, 'Bikash Paribahan', ''),
(33, 'Bondhu Paribahan', ''),
(34, 'Borak', ''),
(35, 'Boshumoti', ''),
(36, 'Brihottor Mirpur', ''),
(37, 'BRTC', ''),
(38, 'BRTC Articulated', ''),
(39, 'Cantonment Bus Service', ''),
(40, 'Cantonment Mini Service', ''),
(41, 'Champion', ''),
(42, 'City Link', ''),
(43, 'D Link', ''),
(44, 'D One Transport', ''),
(45, 'Deepan', ''),
(46, 'Desh Bangla', ''),
(47, 'Dewan', ''),
(48, 'Dhaka Chaka', ''),
(49, 'Dhaka Metro Service', ''),
(50, 'Dhaka Paribahan', ''),
(51, 'Dipon', ''),
(52, 'Dishari', ''),
(53, 'Elite', ''),
(54, 'ETC', ''),
(55, 'ETC Transport', ''),
(56, 'Everest Paribahan', ''),
(57, 'First Ten', ''),
(58, 'FTCL', ''),
(59, 'Gazipur Paribahan', ''),
(60, 'Grameen', ''),
(61, 'Grameen Suveccha', ''),
(62, 'Green Anabil', ''),
(63, 'Green Dhaka', ''),
(64, 'Gulshan Chaka', ''),
(65, 'Haji Transport', ''),
(66, 'Himachal', ''),
(67, 'Himalay', ''),
(68, 'Itihash', ''),
(69, 'J M Super Paribahan', ''),
(70, 'Jabale Noor Paribahan 1', ''),
(71, 'Jabale Nur Paribahan 2', ''),
(72, 'Janjabil', ''),
(73, 'Kamal Plus Paribahan', ''),
(74, 'Kanak', ''),
(75, 'Khajababa', ''),
(76, 'Kironmala Paribahan', ''),
(77, 'Labbayek', ''),
(78, 'Lal Sabuj (AC)', ''),
(79, 'Lams Paribahan', ''),
(80, 'Malancha', ''),
(81, 'Manjil Express', ''),
(82, 'Meghla Transport', ''),
(83, 'Meshkat', ''),
(84, 'Midline', ''),
(85, 'Mirpur Metro Services', ''),
(86, 'Mirpur link', ''),
(87, 'Mirpur Mission', ''),
(88, 'Mirpur Transport Service', ''),
(89, 'Mirpur United Service', ''),
(90, 'MM Lovely', ''),
(91, 'Modhumoti', ''),
(92, 'Mohona', ''),
(93, 'Moitri', ''),
(94, 'Moumita', ''),
(95, 'MTCL 2', ''),
(96, 'Nabakali', ''),
(97, 'New Vision', ''),
(98, 'Nilachol', ''),
(99, 'Nishrgo', ''),
(100, 'No. 13 Bus', ''),
(101, 'No. 4 Alike', ''),
(102, 'No. 6 Bus', ''),
(103, 'No. 6 Motijheel Banani Transport', ''),
(104, 'No. 7 Bus', ''),
(105, 'No. 8 Bus', ''),
(106, 'No. 9 Bus', ''),
(107, 'Nur E Makka', ''),
(108, 'Omama International', ''),
(109, 'One Transport', ''),
(110, 'Pallabi Local Service', ''),
(111, 'Pallabi Super', ''),
(112, 'Paristhan', ''),
(113, 'Power Paribahan', ''),
(114, 'Prattay', ''),
(115, 'Prochesta', ''),
(116, 'Projapati', ''),
(117, 'Provati Banasree', ''),
(118, 'Purbachol Logistics & Transport', ''),
(119, 'Raida', ''),
(120, 'Raja City', ''),
(121, 'Rajanigandha', ''),
(122, 'Rajdhani Super', ''),
(123, 'Ramjan', ''),
(124, 'Robrob', ''),
(125, 'Rois', ''),
(126, 'Rongdhonu Express', ''),
(127, 'Runway Express', ''),
(128, 'Rupa Paribahan', ''),
(129, 'Rupkotha', ''),
(130, 'Safety Druti', ''),
(131, 'Sakalpa-transport', ''),
(132, 'Salsabil', ''),
(133, 'Savar Paribahan', ''),
(134, 'Shadhin', ''),
(135, 'Shadhin Express', ''),
(136, 'Shahria Enterprise', ''),
(137, 'Shatabdi', ''),
(138, 'Shikhar Paribahan', ''),
(139, 'Shikor Paribahan', ''),
(140, 'Shuveccha', ''),
(141, 'Shuvojatra', ''),
(142, 'Siyam Transport', ''),
(143, 'Skyline', ''),
(144, 'Somota Paribahan', ''),
(145, 'Somoy', ''),
(146, 'Somoy Niyantran', ''),
(147, 'Super bus', ''),
(148, 'Supravat', ''),
(149, 'Swajan Paribahan', ''),
(150, 'Talukdar', ''),
(151, 'Tanjil Paribahan', ''),
(152, 'Taranga plus', ''),
(153, 'Tetulia', ''),
(154, 'Thikana', ''),
(155, 'Thikana Express', ''),
(156, 'Titas', ''),
(157, 'Transilva', ''),
(158, 'Trust Transport Services', ''),
(159, 'Trust Transport Services (AC)', ''),
(160, 'Turag', ''),
(161, 'Victor Classic', ''),
(162, 'Victor Paribahan', ''),
(163, 'VIP 27', ''),
(164, 'Welcome', ''),
(165, 'Winner', '');

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
(154, '1', '21', 106),
(155, '1', '12', 0),
(156, '1', '183', 0),
(157, '1', '64', 0),
(158, '19', '183', 0),
(159, '19', '64', 0),
(160, '19', '146', 0),
(161, '19', '62', 0),
(162, '19', '22', 0),
(163, '19', '79', 0);

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
(1, 'Gabtoli', ''),
(2, 'Technical', ''),
(3, 'Ansar Camp', ''),
(4, 'Mirpur 1', ''),
(5, 'Sony Cenema Hall', ''),
(6, 'Mirpur 2', ''),
(7, 'Mirpur 10', ''),
(8, 'Mirpur 11', ''),
(9, 'Purobi', ''),
(10, 'Kalshi', ''),
(11, 'ECB Square', ''),
(12, 'MES', ''),
(13, 'Shewra', ''),
(14, 'Kuril Bishwa Road', ''),
(15, 'Jamuna Future Park', ''),
(16, 'Bashundhara', ''),
(17, 'Nadda', ''),
(18, 'Notun Bazar', ''),
(19, 'Bashtola', ''),
(20, 'Shahjadpur', ''),
(21, 'Uttar Badda', ''),
(22, 'Badda', ''),
(23, 'Madhya Badda', ''),
(24, 'Merul', ''),
(25, 'Rampura Bridge', ''),
(26, 'Banasree', ''),
(27, 'Demra Staff Quarter', ''),
(28, 'Savar', ''),
(29, 'Hemayetpur', ''),
(30, 'Amin Bazar', ''),
(31, 'Kallyanpur', ''),
(32, 'Shyamoli', ''),
(33, 'Shishu Mela', ''),
(34, 'Agargaon', ''),
(35, 'Zia Uddyan', ''),
(36, 'Bijoy Sarani', ''),
(37, 'Jahangir Gate', ''),
(38, 'Mohakhali', ''),
(39, 'Wireless', ''),
(40, 'Gulshan 1', ''),
(41, 'Badda Link Road', ''),
(42, 'Fulbaria', ''),
(43, 'Golap Shah Mazar', ''),
(44, 'GPO', ''),
(45, 'Paltan', ''),
(46, 'Press Club', ''),
(47, 'High Court', ''),
(48, 'Matsya Bhaban', ''),
(49, 'Shahbag', ''),
(50, 'Bangla Motor', ''),
(51, 'Kawran Bazar', ''),
(52, 'Farmgate', ''),
(53, 'Chairman Bari', ''),
(54, 'Sainik Club', ''),
(55, 'Banani', ''),
(56, 'Kakali', ''),
(57, 'Staff Road', ''),
(58, 'Khilkhet', ''),
(59, 'Airport', ''),
(60, 'Jashimuddin (Uttara)', ''),
(61, 'Rajlakshmi', ''),
(62, 'Azampur', ''),
(63, 'House Building', ''),
(64, 'Abdullahpur', ''),
(65, 'Sadarghat', ''),
(66, 'Ray Saheb Bazar', ''),
(67, 'Naya Bazar', ''),
(68, 'Kakrail', ''),
(69, 'Shantinagar', ''),
(70, 'Malibagh Moor', ''),
(71, 'Mouchak', ''),
(72, 'Nabisco', ''),
(73, 'Tongi', ''),
(74, 'Station Road', ''),
(75, 'Mill Gate', ''),
(76, 'Board Bazar', ''),
(77, 'Gazipur Bypass', ''),
(78, 'Konabari', ''),
(79, 'Chandra', ''),
(80, 'Kadamtali', ''),
(81, 'Keraniganj', ''),
(82, 'Babubazar', ''),
(83, 'Malibagh Railgate', ''),
(84, 'Hazipara', ''),
(85, 'Rampura Bazar', ''),
(86, 'Nandan Park', ''),
(87, 'Zirani Bazar', ''),
(88, 'Baipayl', ''),
(89, 'Nobinagar', ''),
(90, 'College Gate', ''),
(91, 'Asad Gate', ''),
(92, 'Khamar Bari', ''),
(93, 'Gulistan', ''),
(94, 'Motijheel', ''),
(95, 'Kamalapur', ''),
(96, 'Mogbazar', ''),
(97, 'Mirpur 14', ''),
(98, 'Mazar Road', ''),
(99, 'Rupnagar', ''),
(100, 'Beribadh', ''),
(101, 'Birulia', ''),
(102, 'Ashulia', ''),
(103, 'Zirabo', ''),
(104, 'Fantasy Kingdom', ''),
(105, 'Shia Mosque', ''),
(106, 'Japan Garden City', ''),
(107, 'Adabor', ''),
(108, 'Kazipara', ''),
(109, 'Shewrapara', ''),
(110, 'Ring Road', ''),
(111, 'Old Airport', ''),
(112, 'kakali', ''),
(113, 'Sign Board', ''),
(114, 'Shonir Akhra', ''),
(115, 'Jatrabari', ''),
(116, 'Sayedabad', ''),
(117, 'Mugdapara', ''),
(118, 'Bashabo', ''),
(119, 'Khilgaon', ''),
(120, 'station Road', ''),
(121, 'Gazipur Chourasta', ''),
(122, 'Duaripara', ''),
(123, 'Rupnagar Abashik', ''),
(124, 'Shiyal Bari', ''),
(125, 'Proshika Moor', ''),
(126, 'Dhanmondi 27', ''),
(127, 'Shukrabad', ''),
(128, 'Dhanmondi 32', ''),
(129, 'Kalabagan', ''),
(130, 'City College', ''),
(131, 'New Market', ''),
(132, 'Nilkhet', ''),
(133, 'Azimpur', ''),
(134, 'Jamgora', ''),
(135, 'Ashulia Bazar', ''),
(136, 'Kamarpara', ''),
(137, 'Satrasta', ''),
(138, 'Dhour', ''),
(139, 'Tarabo', ''),
(140, 'Madanpur', ''),
(141, 'Mohammadpur Bus Stand', ''),
(142, 'Kalabagan City College', ''),
(143, 'Science Lab', ''),
(144, 'Katabon', ''),
(145, 'Bata Signal', ''),
(146, 'Arambagh Notre Dame College', ''),
(147, 'Chiriyakhana', ''),
(148, 'Taltola', ''),
(149, 'Rajarbag', ''),
(150, 'Bangla College', ''),
(151, 'Darussalam', ''),
(152, 'Dhanmondi 32 Kalabagan', ''),
(153, 'Dainik Bangla Moor', ''),
(154, 'Arambagh', ''),
(155, 'Manik Nagar', ''),
(156, 'TT Para', ''),
(157, 'Manik Mia Avenue', ''),
(158, 'Bangla Motor Shahbag', ''),
(159, 'Maowa', ''),
(160, 'Diabari', ''),
(161, 'Ittefaq Moor', ''),
(162, 'Mirpur 12', ''),
(163, 'Gulshan Bridge', ''),
(164, 'Tolarbag', ''),
(165, 'Kallyanpur Shyamoli', ''),
(166, 'Shukrabad Kalabagan', ''),
(167, 'Pallabi', ''),
(168, 'Dhakeshwari', ''),
(169, 'Matuail', ''),
(170, 'Rayerbag', ''),
(171, 'Chankhar Pul', ''),
(172, 'Bakshi Bazar', ''),
(173, 'Palashi', ''),
(174, 'Meghna Ghat', ''),
(175, 'Kalshi Pallabi', ''),
(176, 'Nobinagar Chandra', ''),
(177, 'Kanchpur', ''),
(178, 'Chittagong Road', ''),
(179, 'Mohammadpur', ''),
(180, 'Vulta', ''),
(181, 'Kanchan Bridge', ''),
(182, 'Nila Market', ''),
(183, '300 Feet', ''),
(184, 'Bashundhara (300 Feet Gate)', ''),
(185, 'Shankar', ''),
(186, 'Star Kabab', ''),
(187, 'Dhanmondi 15', ''),
(188, 'Jigatola', ''),
(189, 'Balughat', ''),
(190, 'Cantonment', ''),
(191, 'Kachukhet', ''),
(192, 'Vashantek', ''),
(193, 'Bosila', ''),
(194, 'Ghatar Char', ''),
(195, 'Dhamrai', ''),
(196, 'Kalampur', ''),
(197, 'Tajmahal Road', ''),
(198, 'Postagola', ''),
(199, 'Dholairpar', ''),
(200, 'Malibagh', ''),
(201, 'Kuril Chourasta', ''),
(202, 'Eden College', ''),
(203, 'Police Plaza', ''),
(204, 'Gulshan 2', ''),
(205, 'Uttara', ''),
(206, 'Gazipur', ''),
(207, 'Shib Bari', ''),
(208, 'Salimullah Road', ''),
(209, 'Jakir Hossen Road', ''),
(210, 'Baitul Mukarram', ''),
(211, 'Mirpur 10 Mirpur 11', ''),
(212, 'Rajlakshmi House Building', ''),
(213, 'Bangla Motor Farmgate', ''),
(214, 'Khamar Bari Farmgate', ''),
(215, 'Janapath Moor', ''),
(216, 'Chashara', ''),
(217, 'Shibu Market', ''),
(218, 'Jalkuri', ''),
(219, 'Mirpur Sony Cinema Hall', ''),
(220, 'Khilgaon Khidma Hospital', ''),
(221, 'Metro Hall', ''),
(222, 'Farmgate Bijoy Sarani', ''),
(223, 'Purobi Pallabi', ''),
(224, 'Bangladesh Bank', ''),
(225, 'Mogbazar Mohakhali', ''),
(226, 'Sony Cenema Hall Mirpur 1', ''),
(227, 'Nobinagar Baipayl', ''),
(228, 'Kuril Flyover Notun Bazar', ''),
(229, 'Beribadh Tin Rastar Moor', ''),
(230, 'Rayer Bazar', ''),
(231, 'Sikder Medical College', ''),
(232, 'Hazaribag', ''),
(233, 'Nawabganj', ''),
(234, 'Kamrangirchar', ''),
(235, 'Showari Ghat', ''),
(236, 'Mitford Ghat', ''),
(237, 'Airport Jashimuddin (Uttara)', ''),
(238, 'Narshinghapur', ''),
(239, 'Sura Bari', ''),
(240, 'Kashimpur', ''),
(241, 'Jarun', ''),
(242, 'Khilgaon Flyover', ''),
(243, 'Golapbag Chourasta', ''),
(244, 'Kazla', ''),
(245, 'Dayaganj', ''),
(246, 'Dhupkhola', ''),
(247, 'Ittefaq Moor Sayedabad', ''),
(248, 'Shanir Akhra', ''),
(249, 'Kazipara Shewrapara', ''),
(250, 'New Market Nilkhet', ''),
(251, 'Manikganj', ''),
(252, 'Paturia', ''),
(253, 'Mirpur 14 Bus Stand', ''),
(254, 'Dhaka College', ''),
(255, 'Signal', ''),
(256, 'CMH', ''),
(257, 'Garrison (Cantonment)', ''),
(258, 'Adamjee College', ''),
(259, 'Workshop', ''),
(260, 'Chalantika Moor', ''),
(261, 'Mirpur 6', ''),
(262, 'House Building Abdullahpur', ''),
(263, 'Kuril Kuril Bishwa Road', ''),
(264, 'Mirpur 2 Mirpur 10', ''),
(265, 'Kuril Kuril Bishwa Road Khilkhet', ''),
(266, 'Joydebpur', ''),
(267, 'Sreepur', ''),
(268, 'Baromi', ''),
(269, 'Jurain', ''),
(270, 'Fakirapul', ''),
(271, 'Rajendrapur', ''),
(272, 'Tikatuli', ''),
(273, 'Gandaria', ''),
(274, 'IDB', ''),
(275, 'Shimultola', ''),
(276, 'Palli Bidyut', ''),
(277, 'Savar Cantonment', ''),
(278, 'Rainkhola', ''),
(279, 'Sayedabad Janapath Moor', ''),
(280, 'Victoria Park', ''),
(281, 'Sanarpar', ''),
(282, 'South Banasree', ''),
(283, 'Ring road', ''),
(284, 'Adabor Shyamoli', ''),
(285, 'Mirpur 11 Purobi', ''),
(286, 'Shonbari Sreenagar', ''),
(287, 'Nimtola', ''),
(288, 'Kuchimura', ''),
(289, 'Hasnabad', ''),
(290, 'Mirpur 13', ''),
(291, 'Saudi Colony', ''),
(292, 'Mirpur DOHS', ''),
(293, 'Adamjee School', ''),
(294, 'Panthapath', ''),
(295, 'Bot tola', '');

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
(17, 'R-444', '1', '9', '96'),
(18, '', '1', '6', ''),
(19, '', '183', '59', '');

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
(11, '1', '2'),
(12, '18', '1'),
(13, '18', '18'),
(14, '19', '15'),
(15, '19', '17'),
(16, '19', '11'),
(17, '19', '36');

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
(3, 'api', 'apiVersion', '1.1.4'),
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
(1, '111', 'admin', 'himu', '419715', 'Sharier Himu', 'active', '', '', '10-11-2022; 1:37:06 PM'),
(2, '0001', 'admin', 'piyal', '4301', 'Piyal Ahmed', 'active', '43.250.83.89', 'Dhaka', '23-10-2022; 12:47:13 PM'),
(3, '0002', 'admin', 'sajal', '3051', 'Sajal Halder', 'active', '103.169.160.66', 'Dhaka', '23-10-2022; 1:27:57 AM');

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
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT for table `all_directions`
--
ALTER TABLE `all_directions`
  MODIFY `direction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT for table `all_places`
--
ALTER TABLE `all_places`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `all_routes`
--
ALTER TABLE `all_routes`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `all_routes_bus_list`
--
ALTER TABLE `all_routes_bus_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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
