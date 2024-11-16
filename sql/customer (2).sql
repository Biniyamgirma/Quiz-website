-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 08:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `customer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `ID` int(11) NOT NULL,
  `fName` varchar(50) NOT NULL,
  `lName` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `subId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ID`, `fName`, `lName`, `password`, `email`, `file`, `subId`) VALUES
(5, ' alemitu', ' Alemu', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 'g@gmail.com', 'pexels-lance-reis-255748881-16062911.jpg', 2),
(6, 'biniyam', ' girma', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', 'girmabinyam7@gmail.com', 'gert-tali-2NS6IDQaZ5Q-unsplash.jpg', 1),
(8, 'asas', ' A', '054e3b308708370ea029dc2ebd1646c498d59d7203c9e1a44cf0484df98e581a', 'abc@gmail.com', 'photo_2024-10-04_09-38-38.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `Qid` int(11) NOT NULL,
  `Aid` int(11) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `subId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`Qid`, `Aid`, `answer`, `subId`) VALUES
(22, 65, 'test1', 0),
(22, 66, 'test2', 0),
(22, 67, 'test3', 0),
(22, 68, 'test4', 0),
(23, 69, 'test1', 0),
(23, 70, 'test2', 0),
(23, 71, 'test3', 0),
(23, 72, 'test4', 0),
(24, 73, 'test1', 0),
(24, 74, 'test2', 0),
(24, 75, 'test3', 0),
(24, 76, 'test4', 0),
(25, 77, 'test1', 0),
(25, 78, 'test2', 0),
(25, 79, 'test3', 0),
(25, 80, 'test4', 0),
(26, 81, 'test1', 0),
(26, 82, 'test2', 0),
(26, 83, 'test3', 0),
(26, 84, 'test4', 0),
(27, 85, 'test1', 0),
(27, 86, 'test2', 0),
(27, 87, 'test3', 0),
(27, 88, 'test4', 0),
(28, 89, '1', 0),
(28, 90, '2', 0),
(28, 91, '3', 0),
(28, 92, '4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `ID` int(7) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `pass_word` varchar(100) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`ID`, `first_name`, `last_name`, `email`, `pass_word`, `reg_date`, `file`) VALUES
(88, 'Alemitu', 'Ayana', 'girmabiny@gmail.com', '', '2024-11-06 13:48:07', 'gert-tali-2NS6IDQaZ5Q-unsplash.jpg'),
(92, 'Biniyam', 'Girma', 'girma@gmail.com', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', '2024-09-21 08:42:44', 'sara-dubler-Koei_7yYtIo-unsplash.jpg'),
(93, 'biniyam', 'father', 'girmabm7@gmail.com', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', '2024-09-21 08:42:55', 'sonny-mauricio-yhc4pSbl01A-unsplash.jpg'),
(98, 'alemayew', 'Alemu', 'g@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2024-09-27 12:08:20', 'ricky-higby-5jqNqM1Npsg-unsplash.jpg'),
(99, 'test', 'girma', 'admin@100', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2024-09-28 11:19:36', '11.png'),
(100, 'g@q', 'girmaa', 'biniyam12@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2024-09-30 10:06:01', 'eiliv-aceron-1pqxHp0dYyA-unsplash.jpg'),
(101, 'alemitu', 'girma', 'test@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2024-10-02 07:06:21', 'arthur-humeau-o8LLzIxWZMA-unsplash.jpg'),
(102, 'biniyam', 'Girma', 'girmabinyam7@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '2024-11-08 18:21:26', 'photo_2024-10-04_09-38-38.jpg'),
(103, 'alemayew', 'niguse', 'hello@gmail.com', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', '2024-10-25 13:02:54', 'eth chess 2 png.png'),
(104, 'abebech', 'Alemu', 'abe@1213', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', '2024-10-30 07:56:57', 'pexels-lance-reis-255748881-16062911.jpg'),
(105, 'biniyam', 'Girma', '7@gmail.com', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', '2024-11-07 18:32:46', ''),
(106, 'alemu', 'ajrat', 'm7@gmail.com', '', '2024-11-07 18:38:53', 'photo_2024-10-04_09-38-38.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `subId` int(11) NOT NULL,
  `password` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `subId`, `password`) VALUES
(124, 0, '$2y$10$eNmfaOq.emeq7xywKHjqw.PMoFmG/bDmi7ig2Cly3jgMx6e8WF4Qm'),
(125, 0, '$argon2i$v=19$m=65536,t=4,p=1$V1VVcWtpRExmNHc0VVZNRw$+mXtx5gCdsFoeEFQd6imqy6EsxeO3MdpW+8cu2wgOM8'),
(123, 0, '$2y$10$wN1lz95GP6uBXvJG/lgoTOy/ahMxyJ.CIcxrCXnfuCc5Fg0Xi3MGO'),
(1, 0, '$argon2i$v=19$m=65536,t=4,p=1$M2w2NklwbEV6S0k4TTkvag$1saLyqlgU0s6/H8TJo3cx7Cq7tQg9uVPiKSIBmrYsKk'),
(3, 0, '$argon2i$v=19$m=65536,t=4,p=1$bkRPbVE0TmR3RE5FOGk2Sw$WS5bZZZjLgmXfqfIZb5he+5qljANtMH5B8VBO92zypY');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `subId` int(11) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`subId`, `file`) VALUES
(63, 'gert-tali-2NS6IDQaZ5Q-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `Qid` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `Aid` int(11) NOT NULL,
  `subId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`Qid`, `question`, `Aid`, `subId`) VALUES
(22, 'test', 65, 2),
(23, 'qus 1', 69, 1),
(24, 'qus 2', 73, 1),
(25, 'qus 3', 77, 1),
(26, 'qus 4', 81, 1),
(27, 'qus eng', 85, 2),
(28, 'test 11', 92, 3);

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `ID` int(11) NOT NULL,
  `subId` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`ID`, `subId`, `score`) VALUES
(102, 1, 3),
(102, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subId` int(11) NOT NULL,
  `Subject` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subId`, `Subject`) VALUES
(1, 'Mathematics'),
(2, 'English'),
(3, 'Chemistry'),
(4, 'Biology');

-- --------------------------------------------------------

--
-- Table structure for table `usercom`
--

CREATE TABLE `usercom` (
  `ID` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user-comment` varchar(255) NOT NULL,
  `com-date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usercom`
--

INSERT INTO `usercom` (`ID`, `name`, `email`, `user-comment`, `com-date`, `status`) VALUES
(0, 'test001', '', 'hey from comment uhdhudu;gdujbuucuu biuhh8 h hujiu;lliuyyy  ub hgu g bloufd0ew hupuiuwyuuyer wheur d\\sjhfyJ UGUnbj\\bjy\\tysgdl ghhg\\vdkgdyudb yfsdhby vk\\j', '2024-08-23 19:52:44', 1),
(0, 'Biniyam', '', 'hello', '2024-08-25 17:30:00', 1),
(57, 'Biniyam', '', '123', '2024-08-25 18:19:46', 1),
(57, 'Biniyam', 'girmabinyam7@gmail.com', 'hello A', '2024-08-25 18:23:22', 1),
(57, 'Biniyam', 'girmabinyam7@gmail.com', 'hello A', '2024-08-25 18:24:03', 1),
(63, 'Biniyam', 'girmabinyam7@gmail.com', 'hello', '2024-08-26 08:02:02', 1),
(63, 'Biniyam', 'girmabinyam7@gmail.com', 'comment from biniyam', '2024-08-26 08:05:43', 1),
(63, 'Biniyam', 'girmabinyam7@gmail.com', '', '2024-09-01 21:11:12', 1),
(68, 'alemayew', 'girmabinyam@gmail.com', 'hello', '2024-09-03 21:17:45', 1),
(76, 'biniyam', 'girmabinyam7@gmail.com', 'hello biniyam this website is for the customers', '2024-09-08 07:27:36', 1),
(83, 'biniyam', 'girmabinyam7@gmail.com', 'hello from binyam', '2024-09-13 11:07:49', 1),
(85, 'test001', 'g@q', 'hello my name is binyam', '2024-09-15 19:48:07', 1),
(87, 'Biniyam', 'hello@g', 'hello from comment\r\n', '2024-09-19 09:23:03', 1),
(1, ' Biniyam', 'girmabinyam7@gmail.com', '', '2024-10-06 10:18:24', 1),
(95, 'biniyam', 'girmabinyam7@gmail.com', 'hello', '2024-10-06 11:36:31', 1),
(102, 'biniyam', 'girmabinyam7@gmail.com', 'hello from comment', '2024-10-25 16:14:34', 1),
(102, 'biniyam', 'girmabinyam7@gmail.com', 'hello new comment', '2024-10-26 19:05:51', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`Aid`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`subId`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`Qid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `Aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `ID` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `Qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
