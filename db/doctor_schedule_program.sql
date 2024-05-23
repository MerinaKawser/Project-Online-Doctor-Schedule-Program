-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2024 at 12:30 AM
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
-- Database: `doctor_schedule_program`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin@');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone` int(16) NOT NULL,
  `gender` varchar(64) NOT NULL,
  `specialist` varchar(64) NOT NULL,
  `clinic_address` varchar(64) NOT NULL,
  `bmdc` int(20) NOT NULL,
  `file` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `status` varchar(64) NOT NULL,
  `s_day` varchar(64) NOT NULL,
  `s_time` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `email`, `phone`, `gender`, `specialist`, `clinic_address`, `bmdc`, `file`, `password`, `status`, `s_day`, `s_time`) VALUES
(22, 'Merina Kawser Monika', 'merina@gmail.com', 1867785022, 'on', 'Bone', 'Moghbazar', 123456789, 'matheus-ferrero-W7b3eDUb_2I-unsplash.jpg', 'd9b1d7db4cd6e70935368a1efb10e377', 'Accepted', 'Saturday to Monday and Wednesday, Thursday', '11a.m to 2p.m and 8p.m to 11p.m'),
(23, 'Erina', 'erina@gmail.com', 1867785022, 'on', 'Medicine', 'Dhanmondi', 1234567890, 'michael-dam-mEZ3PoFGs_k-unsplash.jpg', '202cb962ac59075b964b07152d234b70', 'Denied', '', ''),
(24, 'Jhon doe', 'jhon@gmail.com', 1877786022, 'on', 'medicine', 'Gulshan', 1234567890, 'luis-villasmil-hh3ViD0r0Rc-unsplash.jpg', '202cb962ac59075b964b07152d234b70', 'Accepted', 'Saturday to Monday and Wednesday, Thursday', '11a.m to 2p.m and 8p.m to 11p.m'),
(25, 'dr. tara', 'tare@gmail.com', 1987739033, 'on', 'bone', 'Dhanmondi', 1234567890, 'vince-veras-AJIqZDAUD7A-unsplash.jpg', '202cb962ac59075b964b07152d234b70', 'Pending', '', ''),
(26, 'dr. micael', 'micael@gmail.com', 2147483647, 'on', 'bone', 'dhanmondi', 1234567890, 'joseph-gonzalez-iFgRcqHznqg-unsplash.jpg', '202cb962ac59075b964b07152d234b70', 'Remove', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
