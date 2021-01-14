-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2021 at 01:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edoxi_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_footer_menu`
--

DROP TABLE IF EXISTS `ci_footer_menu`;
CREATE TABLE `ci_footer_menu` (
  `ci_footer_menu_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `Item_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- Error reading data for table edoxi_website.ci_footer_menu: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `edoxi_website`.`ci_footer_menu`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `ci_header_menu`
--

DROP TABLE IF EXISTS `ci_header_menu`;
CREATE TABLE `ci_header_menu` (
  `ci_header_menu_id` int(11) NOT NULL,
  `type` text NOT NULL,
  `Item_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ci_header_menu`
--

INSERT INTO `ci_header_menu` (`ci_header_menu_id`, `type`, `Item_ID`) VALUES
(938, 'course', 377),
(939, 'course', 392),
(940, 'course', 400),
(941, 'course', 554),
(942, 'course', 393),
(943, 'course', 417),
(944, 'course', 419),
(945, 'course', 426),
(946, 'course', 438),
(947, 'course', 440),
(948, 'course', 442),
(949, 'course', 444),
(950, 'course', 445),
(951, 'course', 446),
(952, 'course', 642),
(953, 'course', 721),
(954, 'course', 476),
(955, 'course', 483),
(956, 'course', 522),
(957, 'course', 534),
(958, 'course', 536),
(959, 'course', 459),
(960, 'course', 486),
(961, 'course', 460),
(962, 'course', 540),
(963, 'course', 555),
(964, 'course', 560),
(965, 'course', 567),
(966, 'course', 568),
(967, 'course', 571),
(968, 'course', 231),
(969, 'course', 461),
(970, 'course', 477),
(971, 'course', 487),
(972, 'course', 490),
(973, 'course', 493),
(974, 'course', 418),
(975, 'course', 462),
(976, 'course', 729),
(977, 'subcategory', 179),
(978, 'course', 572),
(979, 'course', 707),
(980, 'course', 691),
(981, 'course', 301),
(982, 'course', 326),
(983, 'course', 331),
(984, 'course', 360),
(985, 'course', 520),
(986, 'course', 547),
(987, 'course', 563),
(988, 'course', 590),
(989, 'course', 646),
(990, 'subcategory', 274),
(991, 'course', 327);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_footer_menu`
--
ALTER TABLE `ci_footer_menu`
  ADD PRIMARY KEY (`ci_footer_menu_id`);

--
-- Indexes for table `ci_header_menu`
--
ALTER TABLE `ci_header_menu`
  ADD PRIMARY KEY (`ci_header_menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_footer_menu`
--
ALTER TABLE `ci_footer_menu`
  MODIFY `ci_footer_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `ci_header_menu`
--
ALTER TABLE `ci_header_menu`
  MODIFY `ci_header_menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=992;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
