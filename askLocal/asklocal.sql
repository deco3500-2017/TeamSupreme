-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2017 at 08:45 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asklocal`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `AID` int(11) NOT NULL,
  `Atext` varchar(500) NOT NULL,
  `QID` int(11) NOT NULL,
  `User` varchar(20) NOT NULL,
  `Score` int(11) NOT NULL DEFAULT '0',
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`AID`, `Atext`, `QID`, `User`, `Score`, `Time`) VALUES
(1, 'Yeah its Boppin', 2, 'Bosco', 15, '2017-10-10 06:46:14'),
(2, 'nah lmao no ones here not even me', 2, 'John', -5, '2017-10-10 06:46:14'),
(3, 'Yeah its fun and/or interesting', 1, 'Bosco', 99, '2017-10-10 06:46:48');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `QID` int(11) NOT NULL,
  `Qtext` varchar(500) NOT NULL,
  `User` varchar(20) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Location` varchar(50) NOT NULL,
  `Points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`QID`, `Qtext`, `User`, `Time`, `Location`, `Points`) VALUES
(1, 'Hey is the place any goood???', 'Bosco', '2017-10-10 06:41:07', 'UQ Art Museum', 20),
(2, 'Is the new exhibit busy', 'John', '2017-10-10 06:41:07', 'UQ Art Museum', 10),
(3, 'wubba lubba dub dub', 'Bosco', '2017-10-10 06:41:34', 'UQ FArt Museum', 20),
(4, 'xxxxxx', 'Bosco', '2017-10-10 20:21:35', 'UQ Art Museum', 12),
(5, 'xxxxxx', 'Bosco', '2017-10-10 20:24:06', 'UQ Art Museum', 12),
(20, 'asdwwwww', 'Bosco', '2017-10-10 21:16:20', '', 2),
(21, '', 'Bosco', '2017-10-10 21:16:23', '', 8),
(22, '', 'Bosco', '2017-10-10 21:21:49', '', 10),
(23, '', 'Bosco', '2017-10-10 21:22:16', '', 3),
(24, '', 'Bosco', '2017-10-10 21:25:51', '', 11),
(25, '', 'Bosco', '2017-10-10 21:25:56', 'Botanical Gardens', 13),
(26, '', 'Bosco', '2017-10-10 21:26:00', 'Botanical Gardens', 2),
(27, 'aaaaa', 'Bosco', '2017-10-10 21:26:03', 'Botanical Gardens', 2),
(28, '', 'Bosco', '2017-10-10 21:26:04', 'Botanical Gardens', 1),
(29, '', 'Bosco', '2017-10-10 21:27:47', 'Botanical Gardens', 9),
(30, 'cararararararaaa??', 'Bosco', '2017-10-10 21:28:10', 'Carara Markets', 10);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Username` varchar(20) NOT NULL,
  `Points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Username`, `Points`) VALUES
('Bosco', 1000),
('John', 28);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`AID`),
  ADD KEY `questionForeign` (`QID`),
  ADD KEY `userForeign` (`User`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`QID`),
  ADD KEY `userQuestionForeign` (`User`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `AID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `QID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `questionForeign` FOREIGN KEY (`QID`) REFERENCES `question` (`QID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userForeign` FOREIGN KEY (`User`) REFERENCES `users` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `userQuestionForeign` FOREIGN KEY (`User`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
