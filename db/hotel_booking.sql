-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 09:16 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `check_In` varchar(50) NOT NULL,
  `check_out` varchar(50) NOT NULL,
  `customer_name` varchar(50) NOT NULL,
  `customer_number` varchar(30) NOT NULL,
  `customer_email` varchar(30) NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) NOT NULL,
  `status` enum('A','I') NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room`
--

CREATE TABLE `tbl_room` (
  `id` int(11) NOT NULL,
  `room_number` varchar(50) NOT NULL,
  `room_type` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `status` enum('A','I') NOT NULL,
  `position` int(11) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_room`
--

INSERT INTO `tbl_room` (`id`, `room_number`, `room_type`, `booking_id`, `status`, `position`, `added_date`, `updated_date`) VALUES
(1, '100', 1, 0, 'A', 3, '2021-03-14 18:44:33', '2021-03-15 13:44:55'),
(2, '101', 2, 0, 'A', 6, '2021-03-14 18:44:33', '2021-03-15 11:12:01'),
(3, '102', 3, 0, 'A', 9, '2021-03-14 18:45:37', '2021-03-15 11:11:58'),
(4, '103', 3, 0, 'A', 7, '2021-03-14 18:45:37', '2021-03-15 11:11:57'),
(5, '104', 1, 18, 'A', 8, '2021-03-14 18:47:02', '2021-03-15 13:42:48'),
(6, '105', 2, 0, 'I', 5, '2021-03-14 18:47:02', '2021-03-15 11:11:54'),
(7, '106', 1, 0, 'A', 2, '2021-03-14 18:48:36', '2021-03-15 13:30:04'),
(8, '107', 2, 0, 'A', 4, '2021-03-14 18:48:36', '2021-03-15 11:11:52'),
(9, '108', 1, 0, 'A', 1, '2021-03-14 18:49:18', '2021-03-15 13:31:59'),
(10, '109', 2, 0, 'A', 10, '2021-03-14 18:49:18', '2021-03-15 11:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_room_type`
--

CREATE TABLE `tbl_room_type` (
  `id` int(11) NOT NULL,
  `room_type` varchar(60) NOT NULL,
  `status` enum('A','I') NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_room_type`
--

INSERT INTO `tbl_room_type` (`id`, `room_type`, `status`, `added_date`, `updated_date`) VALUES
(1, 'AC', 'A', '2021-03-14 16:56:13', '2021-03-14 17:41:03'),
(2, 'NON AC', 'A', '2021-03-14 16:56:13', '2021-03-14 16:56:13'),
(3, 'Luxury ', 'A', '2021-03-14 16:57:19', '2021-03-14 16:57:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `username`, `mobile`, `email`, `password`, `status`, `added_date`, `updated_date`) VALUES
(1, 'Admin', '9876543210', 'test@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'A', '2021-03-14 17:07:44', '2021-03-14 17:07:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_room`
--
ALTER TABLE `tbl_room`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_room_type`
--
ALTER TABLE `tbl_room_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_room`
--
ALTER TABLE `tbl_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_room_type`
--
ALTER TABLE `tbl_room_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
