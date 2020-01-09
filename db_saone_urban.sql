-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2020 at 12:06 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_saone_urban`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `encpassword` varchar(255) NOT NULL,
  `salt` varchar(255) NOT NULL,
  `otp` varchar(50) NOT NULL,
  `role` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `updated_on` datetime NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `username`, `password`, `encpassword`, `salt`, `otp`, `role`, `name`, `updated_on`, `status`) VALUES
(1, 'admin', '12345', '79ccab2f1c410201980c2f99a1b37670', 'LBVWKE5t', '', 1, 'Admin', '2020-01-08 10:08:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `su_clients`
--

CREATE TABLE `su_clients` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `aadhar` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `district` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pincode` varchar(20) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `company_mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `c_website` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `registration_no` varchar(100) NOT NULL,
  `status` tinyint(4) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `su_clients`
--

INSERT INTO `su_clients` (`id`, `name`, `mobile`, `aadhar`, `gender`, `district`, `state`, `address`, `pincode`, `company_name`, `company_mobile`, `email`, `c_website`, `company_address`, `registration_no`, `status`) VALUES
(1, 'BASANT DHAL', '6200587963', '253490788667538659', 'Male', 'Ranchi', 'Jharkahand', 'Lalpur', '834001', 'qwerty', '7897465435', 'qrqwewq@gmail.com', 'asdfgh.com', 'Lalpur', '7865431453132197848', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `su_clients`
--
ALTER TABLE `su_clients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `su_clients`
--
ALTER TABLE `su_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
