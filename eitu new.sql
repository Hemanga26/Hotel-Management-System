-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2021 at 06:29 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Aid` int(11) NOT NULL,
  `Aname` varchar(255) NOT NULL,
  `Aemail` varchar(255) NOT NULL,
  `Apass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Aid`, `Aname`, `Aemail`, `Apass`) VALUES
(9, 'ADMIN', 'Admin@admin.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `msg_id` int(11) NOT NULL,
  `msg_name` varchar(255) NOT NULL,
  `msg_mail` varchar(255) NOT NULL,
  `msg_sub` varchar(255) NOT NULL,
  `msg_body` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`msg_id`, `msg_name`, `msg_mail`, `msg_sub`, `msg_body`) VALUES
(10, 'sdasd', 'asdasd', 'asdasd', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `Rev_id` int(11) NOT NULL,
  `Acid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `Rev_name` varchar(255) NOT NULL,
  `Rev_email` varchar(255) NOT NULL,
  `Rev_phone` varchar(255) NOT NULL,
  `Rev_IdnPan` varchar(11) NOT NULL,
  `Rev_Add` varchar(255) NOT NULL,
  `Rev_Sdate` date NOT NULL,
  `Rev_Edate` date NOT NULL,
  `rev_adults` int(11) NOT NULL,
  `rev_child` int(11) NOT NULL DEFAULT 0,
  `rev_totalguest` int(11) NOT NULL,
  `Rev_roomno` int(11) NOT NULL,
  `Rev_roomtype` varchar(255) NOT NULL,
  `Room_total` int(11) NOT NULL,
  `acnf` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`Rev_id`, `Acid`, `uid`, `Rev_name`, `Rev_email`, `Rev_phone`, `Rev_IdnPan`, `Rev_Add`, `Rev_Sdate`, `Rev_Edate`, `rev_adults`, `rev_child`, `rev_totalguest`, `Rev_roomno`, `Rev_roomtype`, `Room_total`, `acnf`, `status`) VALUES
(78, 18, 0, 'pranay kalita', 'pranaykalita2@gmail.com', '7638033416', 'fyopk9464D', 'jorahat', '2021-03-10', '2021-03-13', 1, 0, 1, 105, 'Single', 1500, 1, 2),
(79, 18, 0, 'pranay kalita', 'pranaykalita2@gmail.com', '9988776655', 'asdfg1234w', 'jor', '2021-03-09', '2021-03-11', 2, 0, 2, 201, 'Double', 2000, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `Roomid` int(8) UNSIGNED NOT NULL,
  `RoomNo` mediumint(9) DEFAULT NULL,
  `RoomType` text DEFAULT NULL,
  `RoomPrice` text DEFAULT NULL,
  `Room_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`Roomid`, `RoomNo`, `RoomType`, `RoomPrice`, `Room_status`) VALUES
(331, 103, 'Single Bed', '500', 0),
(332, 104, 'Single Bed', '500', 0),
(333, 105, 'Single Bed', '500', 0),
(334, 101, 'Single Bed', '500', 0),
(335, 102, 'Single Bed', '500', 0),
(336, 201, 'Double Bed', '1000', 0),
(337, 202, 'Double Bed', '1000', 0),
(338, 203, 'Double Bed', '1000', 0),
(339, 301, 'King Size Bed', '2000', 0),
(340, 302, 'King Size Bed', '2000', 0),
(341, 303, 'King Size Bed', '2000', 0),
(342, 204, 'Double Bed', '1000', 0),
(343, 205, 'Double Bed', '1000', 0),
(344, 206, 'Double Bed', '1000', 0),
(346, 106, 'Single Bed', '500', 0),
(347, 304, 'King Size Bed', '2000', 0),
(348, 305, 'King Size Bed', '2000', 0),
(349, 306, 'King Size Bed', '2000', 0),
(350, 505, 'Single Bed', '100', 0);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `s_name` varchar(255) NOT NULL,
  `s_position` varchar(255) NOT NULL,
  `s_contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`id`, `s_name`, `s_position`, `s_contact`) VALUES
(6, 'test', 'Housekeeping Manager', '123'),
(7, 'Rabina', 'Room Service', '987');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `uphone` varchar(255) NOT NULL,
  `upassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `uname`, `uemail`, `uphone`, `upassword`) VALUES
(18, 'pranay kalita', 'pranaykalita2@gmail.com', '7638033416', 'pranay123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Aid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`Rev_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`Roomid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `Aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `Rev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `Roomid` int(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=351;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
