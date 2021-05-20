-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 29, 2021 at 09:02 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ces`
--

-- --------------------------------------------------------

--
-- Table structure for table `Major`
--

CREATE TABLE `Treat` (
  `TID` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `SchoolID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Major`
--

INSERT INTO `Treat` (`TID`, `Name`, `SchoolID`) VALUES
(11, 'จัดการธุรกิจและการเงินยุคดิจิทัล', 1),
(12, 'การตลาดดิจิทัลและการสร้างแบรนด์', 1),
(13, 'การจัดการโลจิสติกส์', 1),
(14, 'อุตสาหกรรมการบริการ', 1),
(15, 'ศิลปะการประกอบอาหารอย่างมืออาชีพ', 1),
(16, 'เศรษฐศาสตรบัณฑิต', 1),
(41, 'พยาบาลศาสตรบัณฑิต', 4),
(71, 'วิทยาศาสตร์', 7),
(72, 'วิทยาศาสตร์ทางทะเล', 7),
(121, 'เทคโนโลยีมัลติมีเดีย แอนิเมชัน และเกม', 12),
(122, 'เทคโนโลยีสารสนเทศและนวัตกรรมดิจิทัล', 12),
(123, 'วิชาดิจิทัลคอนเทนต์และสื่อ', 12),
(124, 'นวัตกรรมสารสนเทศทางการแพทย์', 12),
(125, 'วิชานิเทศศาสตร์ดิจิทัล', 12);

-- --------------------------------------------------------

--
-- Table structure for table `School`
--

CREATE TABLE `list` (
  `lID` int(11) NOT NULL,
  `Name` varchar(45) DEFAULT NULL,
  `TelNo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `School`
--

INSERT INTO `list` (`lID`, `Name`, `TelNo`) VALUES
(1, 'สำนักวิชาการจัดการ', '2201'),
(2, 'สำนักวิชาทันตแพทยศาสตร์นานาชาติ', '2202'),
(3, 'สำนักวิชาเทคโนโลยีการเกษตรและอุตสาหกรรมอาหาร', '2201'),
(4, 'สำนักวิชาพยาบาลศาสตร์', '2202'),
(5, 'สำนักวิชาแพทยศาสตร์', '2202'),
(6, 'สำนักวิชาเภสัชศาสตร์', '2202'),
(7, 'สำนักวิชาวิทยาศาสตร์', '2202'),
(8, 'สำนักวิชาวิศวกรรมศาสตร์และเทคโนโลยี', '2202'),
(9, 'สำนักวิชาศิลปศาสตร์', '2202'),
(10, 'สำนักวิชาสหเวชศาสตร์', '2202'),
(11, 'สำนักวิชาสาธารณสุขศาสตร์', '2202'),
(12, 'สำนักวิชาสารสนเทศศาสตร์', '2202');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE `disease` (
  `DID` varchar(8) NOT NULL,
  `FNAME` varchar(200) DEFAULT NULL,
  `LNAME` varchar(200) DEFAULT NULL,
  `GENDER` int(1) DEFAULT NULL,
  `GPAX` decimal(4,2) DEFAULT NULL,
  `MajorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Student`
--

INSERT INTO `disease` (`DID`, `FNAME`, `LNAME`, `GENDER`, `GPAX`, `MajorID`) VALUES
('46107850', 'เจริญพร', 'บัวแย้ม', 1, '3.17', 124),
('4611250', 'สมฤทัย', 'สิงหสุวรรณ', 2, '3.11', 71);

-- --------------------------------------------------------

--
-- Table structure for table `Student_has_Subject`
--

CREATE TABLE `Student_has_Subject` (
  `StudentID` varchar(8) NOT NULL,
  `SubjectID` varchar(10) NOT NULL,
  `Grade` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Subject`
--

CREATE TABLE `Subject` (
  `SUBID` varchar(10) NOT NULL,
  `NAME` varchar(45) DEFAULT NULL,
  `Unit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Major`
--
ALTER TABLE `Major`
  ADD PRIMARY KEY (`MID`),
  ADD KEY `fk_Major_School_idx` (`SchoolID`);

--
-- Indexes for table `School`
--
ALTER TABLE `School`
  ADD PRIMARY KEY (`SID`);

--
-- Indexes for table `Student`
--
ALTER TABLE `Student`
  ADD PRIMARY KEY (`STDID`),
  ADD KEY `fk_Student_Major1_idx` (`MajorID`);

--
-- Indexes for table `Student_has_Subject`
--
ALTER TABLE `Student_has_Subject`
  ADD PRIMARY KEY (`StudentID`,`SubjectID`),
  ADD KEY `fk_Student_has_Subject_Subject1_idx` (`SubjectID`),
  ADD KEY `fk_Student_has_Subject_Student1_idx` (`StudentID`);

--
-- Indexes for table `Subject`
--
ALTER TABLE `Subject`
  ADD PRIMARY KEY (`SUBID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Major`
--
ALTER TABLE `Major`
  ADD CONSTRAINT `fk_Major_School` FOREIGN KEY (`SchoolID`) REFERENCES `School` (`SID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `fk_Student_Major1` FOREIGN KEY (`MajorID`) REFERENCES `Major` (`MID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Student_has_Subject`
--
ALTER TABLE `Student_has_Subject`
  ADD CONSTRAINT `fk_Student_has_Subject_Student1` FOREIGN KEY (`StudentID`) REFERENCES `Student` (`STDID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Student_has_Subject_Subject1` FOREIGN KEY (`SubjectID`) REFERENCES `Subject` (`SUBID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
