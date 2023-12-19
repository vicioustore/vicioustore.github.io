-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 04:33 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vicioustore`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblbrand`
--

CREATE TABLE `tblbrand` (
  `idbrand` int(11) NOT NULL,
  `gambarbrand` varchar(150) NOT NULL,
  `brand` varchar(150) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbldetailproduct`
--

CREATE TABLE `tbldetailproduct` (
  `iddetail` int(11) NOT NULL,
  `idproduct` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `idproduct` int(11) NOT NULL,
  `idbrand` int(11) NOT NULL,
  `namaproduct` varchar(200) NOT NULL,
  `harga` int(8) NOT NULL,
  `description` text NOT NULL,
  `spec` text NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `idjenis` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblslide`
--

CREATE TABLE `tblslide` (
  `idslide` int(11) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `idbrand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblbrand`
--
ALTER TABLE `tblbrand`
  ADD PRIMARY KEY (`idbrand`);

--
-- Indexes for table `tbldetailproduct`
--
ALTER TABLE `tbldetailproduct`
  ADD PRIMARY KEY (`iddetail`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`idproduct`);

--
-- Indexes for table `tblslide`
--
ALTER TABLE `tblslide`
  ADD PRIMARY KEY (`idslide`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblbrand`
--
ALTER TABLE `tblbrand`
  MODIFY `idbrand` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbldetailproduct`
--
ALTER TABLE `tbldetailproduct`
  MODIFY `iddetail` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `idproduct` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblslide`
--
ALTER TABLE `tblslide`
  MODIFY `idslide` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
