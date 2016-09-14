-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2016 at 10:11 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jrs`
--

CREATE DATABASE IF NOT EXISTS jrs;
USE jrs;

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE IF NOT EXISTS `employer` (
  `Email` varchar(50) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Contact` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`Email`, `Password`, `First_Name`, `Last_Name`, `Contact`) VALUES
('amila@gmail.com', '93f56ccb72718b484ea3464e0c670327', 'Amila', 'Perera', '9879879'),
('chamal@gmail.com', '3ec4f6bc4afe57cb0152a7d4d6ca2a95', 'Chamal', 'Sameera', '9879879'),
('kamal@gmail.com', 'aa63b0d5d950361c05012235ab520512', 'Kamal', 'Chamara', '9879879'),
('mihiri@gmail.com', 'e5819af8e16895c1de79eb4cb33a5f7f', 'Mihiri', 'Perera', '9879879');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `Job_ID` int(10) NOT NULL,
  `Employer_ID` varchar(50) NOT NULL,
  `Company_Name` varchar(30) NOT NULL,
  `Company_Type` varchar(30) NOT NULL,
  `Industry` varchar(30) NOT NULL,
  `Job_Title` varchar(30) NOT NULL,
  `Contract_Type` varchar(15) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Description` text NOT NULL,
  `Language_Skills` varchar(100) NOT NULL,
  `Professional_Skills` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`Job_ID`, `Employer_ID`, `Company_Name`, `Company_Type`, `Industry`, `Job_Title`, `Contract_Type`, `City`, `Description`, `Language_Skills`, `Professional_Skills`) VALUES
(1, 'amila@gmail.com', 'ILDP Academy (Pvt) Ltd', 'Employer (Private Sector)', 'Education', 'MULTI TASKING ENGLISH TEACHER', 'Full time', 'Colombo', 'ILDP is a steadily growing education company with fifteen years of track history. we have strategically planned to grow for the future, with a vision of becoming the right place to work & earn. Having this in mind, we are recruiting the right candidate for the positions mentioned in the advertisement with a single thought for GROWTH aspects.\r\n\r\nILDP conducts classes for English for students from the age of 4 onward under the license of Mikids Malaysia\r\n\r\n- Center Management Work\r\n- Centre marketing Work with Feild visits\r\n- English teaching\r\n- Absent Teacher\r\n- Actively participate in Events\r\n- Record Maintenance\r\n- Multi Tasking', 'English', 'Diploma in Montessori/Preschool Training is advantageous'),
(2, 'amila@gmail.com', 'King Coconut Restaurant', '     Employer (Private Sector)', 'Restaurant / Food Services', 'Kitchen Helpers', 'Full time', 'Negombo', 'We are currently looking for suitable candidates to fill in the position of Kitchen Helpers.', '-', '-'),
(3, 'amila@gmail.com', 'Virtusae', 'IT', 'IT', 'software engineer', 'full time', 'colombo', 'Have two year experience', 'english', 'experienced at Mlutplx'),
(4, 'chamal@gmail.com', 'MIT', 'IT', 'IT', 'software architect', 'four year', 'colombo', 'four year experienced', 'englich,sinhala', 'experienced at Mas holdings'),
(5, 'kamal@gmail.com', 'MAS holdings', 'IT', 'IT', 'business analyst', 'full time', 'kandy', 'experienced at Dialog', 'english,sinhala', 'experienced'),
(6, 'mihiri@gmail.com', 'S & D associations', 'Texriles', 'Textiles', 'accouting', 'full time', 'kandy', 'experienced with textile industry', 'english', 'english '),
(7, 'chamal@gmail.com', 'maliban', 'food', 'food', 'manager', 'full time', 'horana', 'experienced', 'english', 'skilled'),
(8, 'chamal@gmail.com', 'DSI', 'shoes', 'shoes', 'Designer', 'full time', 'gampaha', 'experienced', 'english', 'skilled'),
(9, 'chamal@gmail.com', 'salon Ama', 'beauty culture', 'Facials', 'Assistant', 'part time', 'horana', 'experineced', 'english', 'skilled');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE IF NOT EXISTS `jobseeker` (
  `Email` varchar(50) NOT NULL,
  `Password` varchar(40) NOT NULL,
  `First_Name` varchar(50) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Gender` char(1) NOT NULL,
  `DOB` date NOT NULL,
  `Contact` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`Email`, `Password`, `First_Name`, `Last_Name`, `Gender`, `DOB`, `Contact`) VALUES
('amali@gmail.com', '4289672f02464716756479a11ef87eec', 'Amali', 'Gunathilake', 'f', '1990-10-24', '9879879'),
('salim@yahoo.com', 'ca6b147b8fbdd688d8ebcaa3b803c22a', 'Salim', 'Nazeer', 'm', '1994-10-26', '9879879');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE IF NOT EXISTS `report` (
  `id` int(3) NOT NULL,
  `keyword` varchar(50) NOT NULL,
  `count` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `keyword`, `count`) VALUES
(1, 'Software Developer', 5),
(2, 'Helpers', 2),
(3, 'Business Analyst', 2),
(4, 'Sales Executive', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`Job_ID`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`Email`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `Job_ID` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
