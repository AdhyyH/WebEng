-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2023 at 10:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_eng`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answerID` int(11) NOT NULL,
  `discussionID` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answerID`, `discussionID`, `date`, `description`) VALUES
(1, 3, '2023-06-19 05:55:25', 'my answer');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`) VALUES
(1, 'Software Engineering'),
(2, 'Multimedia'),
(3, 'Networking');

-- --------------------------------------------------------

--
-- Table structure for table `discussion`
--

CREATE TABLE `discussion` (
  `discussionID` int(11) NOT NULL,
  `userID` char(8) DEFAULT NULL,
  `categoryID` int(11) DEFAULT NULL,
  `expertID` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `topic` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `discussion`
--

INSERT INTO `discussion` (`discussionID`, `userID`, `categoryID`, `expertID`, `content`, `status`, `date`, `topic`) VALUES
(3, '1', 1, NULL, 'I need help with web eng', NULL, '2023-06-13 03:03:57', 'Web Eng'),
(4, '1', 3, NULL, 'Web engineering is fun', NULL, '2023-06-13 03:04:35', 'Web Engineering'),
(5, '1', 2, NULL, 'Im taking web engineering', NULL, '2023-06-13 03:04:35', 'WEBENG'),
(6, '1', 2, NULL, 'content 4', NULL, '2023-06-14 04:53:21', 'New topic'),
(7, '1', 3, NULL, 'i want to learn WE', NULL, '2023-06-11 08:32:09', 'WE'),
(8, '1', 2, NULL, 'Content WE', NULL, '2023-06-15 08:32:46', 'LEARNING WE'),
(9, '2', 2, NULL, 'OOP is so hard', NULL, '2023-06-02 04:39:08', 'OOP'),
(10, '1', 1, NULL, '123', NULL, NULL, '123'),
(11, '1', 1, NULL, '123', NULL, NULL, '123'),
(12, '1', 1, NULL, '123', NULL, NULL, '123'),
(13, '1', 1, NULL, '123', NULL, NULL, '123'),
(14, '1', 1, NULL, '098765432', NULL, NULL, '1234567890-'),
(15, '1', 2, NULL, 'eeeeee', NULL, '2023-06-19 09:33:03', 'weeee'),
(16, '1', 2, NULL, 'eeeeee', NULL, '2023-06-19 09:35:26', 'weeee'),
(17, '1', 3, NULL, 'gtregt4esxcvbhytres', NULL, '2023-06-19 09:35:36', 'iuytrdcvbhytredcv');

-- --------------------------------------------------------

--
-- Table structure for table `expert`
--

CREATE TABLE `expert` (
  `expertID` int(11) NOT NULL,
  `expertName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(11) NOT NULL,
  `discussionID` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `discussionID`, `description`, `rating`, `likes`, `datetime`) VALUES
(4, 3, 'my comment', NULL, NULL, '2023-06-19 06:30:22'),
(5, 3, 'comment', NULL, NULL, '2023-06-19 06:30:30'),
(6, 3, 'comment', NULL, NULL, '2023-06-19 06:31:35'),
(7, 3, 'comment', NULL, NULL, '2023-06-19 06:34:40');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` char(8) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `academicStatus` varchar(255) DEFAULT NULL,
  `researchType` varchar(255) DEFAULT NULL,
  `adminID` varchar(255) DEFAULT NULL,
  `socmedlink` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `email`, `academicStatus`, `researchType`, `adminID`, `socmedlink`) VALUES
('1', 'royston oscar', 'oscq22qar@gmail.com', 'Option A', 'Option 3', NULL, ''),
('2', 'royston', 'royston@gmail.com', NULL, NULL, NULL, NULL),
('cb21097', 'oka_ashmat', 'ashmat@gmail.com', 'Option C', 'Option 2', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answerID`),
  ADD KEY `discussionID` (`discussionID`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`discussionID`),
  ADD KEY `categoryID` (`categoryID`),
  ADD KEY `expertID` (`expertID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `expert`
--
ALTER TABLE `expert`
  ADD PRIMARY KEY (`expertID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`),
  ADD KEY `discussionID` (`discussionID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discussion`
--
ALTER TABLE `discussion`
  MODIFY `discussionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `expert`
--
ALTER TABLE `expert`
  MODIFY `expertID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`discussionID`) REFERENCES `discussion` (`discussionID`);

--
-- Constraints for table `discussion`
--
ALTER TABLE `discussion`
  ADD CONSTRAINT `discussion_ibfk_2` FOREIGN KEY (`categoryID`) REFERENCES `category` (`categoryID`),
  ADD CONSTRAINT `discussion_ibfk_3` FOREIGN KEY (`expertID`) REFERENCES `expert` (`expertID`),
  ADD CONSTRAINT `discussion_ibfk_4` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`discussionID`) REFERENCES `discussion` (`discussionID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
