-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2021 at 07:58 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vp_alumni_connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `creatioDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `name`, `contact`, `email`, `password`, `creatioDate`) VALUES
(1, 'Admin', 9998887776, 'admin1@gmail.com', 'admin1', '2021-01-29 11:50:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `alumnidata`
--

CREATE TABLE `alumnidata` (
  `ID` int(250) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `dipcollege` varchar(50) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `dippassout` int(4) NOT NULL,
  `degrcollege` varchar(50) NOT NULL,
  `identitycard` varchar(50) NOT NULL,
  `companyworking` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alumnidata`
--

INSERT INTO `alumnidata` (`ID`, `fname`, `lname`, `email`, `contact`, `dipcollege`, `branch`, `dippassout`, `degrcollege`, `identitycard`, `companyworking`) VALUES
(20, 'Sarthak', 'Salvi', 'sarthaksalvi2107@gmail.com', 8928395139, 'Vidyalankar Polytechnic', 'Information Technology', 2021, 'Veermata Jijabai Technological Institute', 'IDCard/Sarthak Salvi ID.jpeg', 'TCS'),
(42, 'Harsh', 'Shinde', 'harshshinde2017@gmail.com', 9082188312, 'Vidyalankar Polytechnic', 'Information Technology', 2021, 'Sardar Patel College of Engineering', 'IDCard/Harsh Shinde ID.jpeg', 'Tata'),
(43, 'Samarth', 'Gawade', 'samarthgawade88@gmail.com', 9137504107, '', '', 0, '', '', ''),
(44, 'Soham', 'Sawant', 'sohamsawant2000@gmail.com', 9326081694, 'Vidyalankar Polytechnic', 'Information Technology', 2021, 'Vidyalankar Institute of Technology', 'IDCard/Soham Sawant ID.jpeg', 'AWS');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `chatid` int(11) NOT NULL,
  `chat_room_id` int(11) DEFAULT NULL,
  `chat_msg` text DEFAULT NULL,
  `id` int(11) DEFAULT NULL,
  `chat_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`chatid`, `chat_room_id`, `chat_msg`, `id`, `chat_date`) VALUES
(17, 1, 'Soham Sawant: Hello Everyone !', 0, 'June 1, 2021 11:14:am'),
(18, 1, 'Harsh Shinde: Hi Soham, How are you ?', 0, 'June 1, 2021 11:15:am'),
(19, 1, 'Soham Sawant: Fine. ', 0, 'June 1, 2021 11:16:am'),
(20, 1, 'Sarthak Salvi: Hi, Are you all coming today for Alumni Meet', 0, 'June 1, 2021 11:17:am'),
(21, 1, 'Samarth Gawade: Yess', 0, 'June 1, 2021 11:17:am'),
(22, 1, 'Soham Sawant: Good Evening Everyone', 0, 'June 4, 2021 10:40:pm'),
(23, 1, 'Soham Sawant: Hi everyone', 0, 'June 5, 2021 8:37:pm'),
(24, 1, 'Soham Sawant: Hi', 0, 'June 9, 2021 9:36:am'),
(25, 1, 'Soham Sawant: Good Morning', 0, 'June 9, 2021 9:38:am'),
(26, 1, 'Harsh Shinde: Hello', 0, 'June 9, 2021 9:38:am'),
(27, 1, 'Soham Sawant: Hello', 0, 'June 22, 2021 12:23:pm');

-- --------------------------------------------------------

--
-- Table structure for table `chat_room`
--

CREATE TABLE `chat_room` (
  `chat_room_id` int(11) NOT NULL,
  `chat_room_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_room`
--

INSERT INTO `chat_room` (`chat_room_id`, `chat_room_name`) VALUES
(1, 'Welcome to V-Chat !');

-- --------------------------------------------------------

--
-- Table structure for table `eventmanagerlogin`
--

CREATE TABLE `eventmanagerlogin` (
  `id` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `creatioDate` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventmanagerlogin`
--

INSERT INTO `eventmanagerlogin` (`id`, `name`, `contact`, `email`, `password`, `creatioDate`) VALUES
(10, 'Rohan Patil', 3335557779, 'rohan@gmail.com', 'rohan', '2021-06-04 22:43:43.000000');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `date`, `time`, `status`) VALUES
(64, 'VP Alumni Meet', 'Dear Alumni, We would be immensely delighted to invite to the Alumni Meet. Let\'s all catch up on the old times and walk down the memory lane. We would certainly want your continued and valued association with our esteemed institute.', '2021-07-24', '16:00:00.000000', 'Scheduled');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `ID` int(10) NOT NULL,
  `picsource` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`ID`, `picsource`) VALUES
(9, 'gallery/im1.jpg'),
(10, 'gallery/im2.jpg'),
(11, 'gallery/im3.jpg'),
(16, 'gallery/im4.jpg'),
(26, 'gallery/im5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `post` varchar(100) NOT NULL,
  `minquali` varchar(500) NOT NULL,
  `location` varchar(100) NOT NULL,
  `applylink` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `company`, `post`, `minquali`, `location`, `applylink`) VALUES
(5, 'Google', 'Engineering Manager, Platforms', 'Bachelor\'s degree in Computer Science or related technical discipline, or equivalent practical experience.', 'Sunnyvale, CA, USA', 'https://careers.google.com/jobs/results/140033218448368326/'),
(7, 'TCS', 'IT Professional', 'BE. IT', 'Mumbai', 'https://www.indeed.com/q-PHP-jobs.html'),
(8, 'TCS', 'Trainee Engineer', 'B.E, B.Tech, ME, M.Tech In Any Disciplines.', 'Mumbai', 'https://www.govtjobsguru.co.in/tcs-recruitment/?utm_campaign=google_jobs_apply&utm_source=google_jobs_apply&utm_medium=organic');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `creatioDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `contact`, `email`, `password`, `creatioDate`) VALUES
(36, 'Sarthak', 'Salvi', 8928395139, 'sarthaksalvi2107@gmail.com', 'sarthaksalvi', '2021-05-24 17:22:39'),
(58, 'Harsh', 'Shinde', 9082188312, 'harshshinde2017@gmail.com', 'harshshinde', '2021-06-22 10:23:55'),
(59, 'Samarth', 'Gawade', 9137504107, 'samarthgawade88@gmail.com', 'samarthgawade', '2021-06-22 10:34:50'),
(60, 'Soham', 'Sawant', 9326081694, 'sohamsawant2000@gmail.com', 'sohamsawant', '2021-06-22 12:21:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alumnidata`
--
ALTER TABLE `alumnidata`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`chatid`);

--
-- Indexes for table `chat_room`
--
ALTER TABLE `chat_room`
  ADD PRIMARY KEY (`chat_room_id`);

--
-- Indexes for table `eventmanagerlogin`
--
ALTER TABLE `eventmanagerlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alumnidata`
--
ALTER TABLE `alumnidata`
  MODIFY `ID` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `chatid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `chat_room`
--
ALTER TABLE `chat_room`
  MODIFY `chat_room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `eventmanagerlogin`
--
ALTER TABLE `eventmanagerlogin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
