-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2023 at 01:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `payzpp`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `idcls` int(11) NOT NULL,
  `clsname` varchar(10) NOT NULL,
  `skillcom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`idcls`, `clsname`, `skillcom`) VALUES
(9990, 'XII', 'Software Engineering'),
(9991, 'XII', 'Graphic Design');

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
  `payamount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`idpay`, `idstaff`, `nisn`, `paydate`, `paymonth`, `payyear`, `idspp`, `payamount`) VALUES
(926, 16, '8008600', '2023-02-23', '2', '2023', 113, 700000);

-- --------------------------------------------------------

--
-- Table structure for table `spp`
--

CREATE TABLE `spp` (
  `idspp` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `spp`
--

INSERT INTO `spp` (`idspp`, `year`, `nominal`) VALUES
(113, 2023, 1000000),
(115, 2023, 700000),
(116, 2023, 500000),
(117, 2015, 1000000);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `idstaff` int(11) NOT NULL,
  `namest` varchar(35) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(35) NOT NULL,
  `level` enum('admin','staff') NOT NULL,
  `img` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`idstaff`, `namest`, `username`, `password`, `level`, `img`) VALUES
(11, 'Julien Khai', 'Khai', '505arc', 'admin', 'oo0.jpg'),
(15, 'Eloisa Jane', 'Issa', 'iss4', 'admin', 'oo4.jpg'),
(16, 'Abe Khaizure', 'Ab', 'abcd', 'staff', 'ksh2.jpg');

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
('10002909', '2299', 'Smiling Cat', 'kucing.jpg', 9990, 'Pet Shop', '808637553', 113),
('8008600', '8888', 'Marshall Lee', 'mark.jpg', 9990, 'Bandung, Setiabudhi', '808002202', 113),
('9009666', '9999', 'Mikaela Shakila', 'yeri.jpg', 9990, 'Bandung, Dago', '90988909', 113);

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
  MODIFY `idcls` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9994;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `idpay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=927;

--
-- AUTO_INCREMENT for table `spp`
--
ALTER TABLE `spp`
  MODIFY `idspp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `idstaff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`idstaff`) REFERENCES `staff` (`idstaff`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `student` (`nisn`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_3` FOREIGN KEY (`idspp`) REFERENCES `student` (`idspp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`idcls`) REFERENCES `class` (`idcls`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`idspp`) REFERENCES `spp` (`idspp`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
