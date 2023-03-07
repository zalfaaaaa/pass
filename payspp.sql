-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 12:57 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payspp`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `idcls` int(11) NOT NULL,
  `clsname` varchar(10) NOT NULL,
  `skillcom` varchar(50) NOT NULL,
  `skillsort` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`idcls`, `clsname`, `skillcom`, `skillsort`) VALUES
(106, 'XII', 'Software Engineering', 'SE'),
(107, 'XI', 'Graphic/Multimedia ', 'G/M'),
(109, 'XII', 'Design Communication Visual', 'DKV'),
(110, 'X', 'Fine Art', 'FA');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `idpay` int(11) NOT NULL,
  `idstaff` int(11) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `paydate` date NOT NULL,
  `paymonth` varchar(8) NOT NULL,
  `payyear` varchar(4) NOT NULL,
  `idspp` int(11) NOT NULL,
  `payamount` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`idpay`, `idstaff`, `nisn`, `paydate`, `paymonth`, `payyear`, `idspp`, `payamount`) VALUES
(947, 20013, '20066036', '2023-03-07', '10', '2023', 115, 'Rp. 1.200.000'),
(948, 20005, '20066036', '2023-03-07', '11', '2023', 115, 'Rp. 800.000'),
(949, 20005, '20033036', '2023-03-07', '4', '2023', 117, 'Rp. 8.000.000'),
(950, 20005, '20000036', '2023-03-07', '2', '2023', 113, 'Rp. 2.200.000'),
(951, 20009, '20000036', '2023-03-07', '3', '2023', 113, 'Rp. 2.000.000'),
(952, 20009, '20066036', '2023-03-07', '8', '2023', 115, 'Rp. 900.000'),
(953, 20009, '20066036', '2023-03-07', '9', '2023', 115, 'Rp. 8.000.000'),
(954, 20009, '20033036', '2023-03-07', '6', '2023', 117, 'Rp. 6.000.000');

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `idspp` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `nominal` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`idspp`, `year`, `nominal`) VALUES
(113, 2020, 'Rp. 800.000'),
(115, 2021, 'Rp. 1.000.000'),
(116, 2022, 'Rp. 1.200.000'),
(117, 2023, 'Rp. 1.400.000');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `idstaff` int(11) NOT NULL,
  `namest` varchar(35) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `img` varchar(50) NOT NULL,
  `level` enum('admin','staff') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`idstaff`, `namest`, `username`, `password`, `img`, `level`) VALUES
(20005, 'Julien Khai', 'Khai', '505arc', 'oo0.jpg', 'admin'),
(20009, 'Nakeela Raiah', 'Nakee', 'nakee', 'ddd.jpg', 'staff'),
(20010, 'Abraham Khaizure', 'Abe', 'abcd', 'ksh2.jpg', 'staff'),
(20013, 'Shalfa Shabrina', 'Sasha', 'saash', 'chae.jpg', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `nisn` char(10) NOT NULL,
  `nis` char(8) NOT NULL,
  `name` varchar(35) NOT NULL,
  `img` varchar(50) NOT NULL,
  `idcls` int(11) NOT NULL,
  `address` text NOT NULL,
  `phoneno` varchar(13) NOT NULL,
  `idspp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`nisn`, `nis`, `name`, `img`, `idcls`, `address`, `phoneno`, `idspp`) VALUES
('20000036', '200000', 'Meah Keshinuca', 'minju.jpg', 109, 'Bandung, Dago', '808756006', 113),
('20011036', '200001', 'Marshall Lee', 'mark.jpg', 107, 'Bandung, Riau', '20299980', 116),
('20033036', '200003', 'Kadita Shamoura', 'yunjin2.jpg', 110, 'Bandung, Setiabudhi', '808883511', 117),
('20066036', '200006', 'Mikaela Shakila', 'yeri.jpg', 107, 'Bandung, Lengkong', '62505688500', 115);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`idcls`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`idpay`),
  ADD KEY `idstaff` (`idstaff`),
  ADD KEY `idspp` (`idspp`),
  ADD KEY `nisn` (`nisn`);

--
-- Indexes for table `spp`
--
ALTER TABLE `spp`
  ADD PRIMARY KEY (`idspp`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`idstaff`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`nisn`),
  ADD KEY `idcls` (`idcls`),
  ADD KEY `idspp` (`idspp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `idcls` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `idpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=955;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `idspp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `idstaff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20021;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`idstaff`) REFERENCES `staff` (`idstaff`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`idspp`) REFERENCES `student` (`idspp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_4` FOREIGN KEY (`nisn`) REFERENCES `student` (`nisn`) ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`idcls`) REFERENCES `class` (`idcls`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`idspp`) REFERENCES `spp` (`idspp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
