-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 04:47 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reglog`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminpost`
--

CREATE TABLE `adminpost` (
  `id` int(11) NOT NULL,
  `username` varchar(25) DEFAULT NULL,
  `title` varchar(25) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminpost`
--

INSERT INTO `adminpost` (`id`, `username`, `title`, `description`, `slug`, `date`) VALUES
(4, 'kimita', 'test', 'will this work?', 'test', '2022-03-28 11:26:00'),
(16, 'kimita', 'Show at debos', 'blah blah blah', 'show-at-debos', '2022-04-11 08:17:00');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(10) NOT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `title` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `description` longtext CHARACTER SET utf8 DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `user_id`, `title`, `description`, `slug`, `date`) VALUES
(29, 'kimita', 'title', 'did this fix it..', 'title', '2022-04-25 14:38:42'),
(32, 'kimita', 'test', 'working?', 'test', '2022-04-25 14:38:48'),
(33, 'kimita', 'test', 'this is number 3', 'test', '2022-04-25 14:38:58'),
(34, 'tomboy', 'heyy man', ' this is another one', 'heyy-man', '2022-04-25 14:39:07'),
(35, 'kimita', 'Night Connect', 'Free show at jerry on mondays', 'night-connect', '2022-04-25 14:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `ChatID` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `chat` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`ChatID`, `user_id`, `username`, `chat`, `date`) VALUES
(1, 2, 'kimita', 'when is the show?', '2022-04-13 10:29:00'),
(2, 3, 'tomboy', 'idk', '2022-04-17 04:55:00'),
(3, 2, 'kimita', '.', '2022-04-17 04:58:00'),
(4, 2, 'kimita', '\'', '2022-04-17 04:58:00'),
(5, 2, 'kimita', 'I\'ll do it', '2022-04-17 05:16:00'),
(6, 2, 'kimita', 'wassup', '2022-04-18 20:46:00'),
(7, 2, 'kimita', 'chandler', '2022-04-18 20:47:00'),
(8, 2, 'kimita', 'hey', '2022-04-25 06:33:00'),
(9, 4, 'Dmane', 'yea boi', '2022-04-25 06:46:00'),
(10, 2, 'kimita', 'cameron', '2022-04-25 16:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `username` varchar(25) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `name`, `username`, `email`, `password`) VALUES
(2, 'dorrell', 'kimita', 'ishiroa@gmail.com', 'alicia'),
(3, 'alicia', 'tomboy', 'tomboee14@gmail.com', 'dorrell'),
(4, 'Chad', 'Dmane', 'dlc1224@southalabama.gmail.com', 'Garry');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminpost`
--
ALTER TABLE `adminpost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`ChatID`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminpost`
--
ALTER TABLE `adminpost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `ChatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
