-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 01:33 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `educations`
--

CREATE TABLE `educations` (
  `id_edu` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` enum('SD','SMP','SMA','S1','S2','S3') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `educations`
--

INSERT INTO `educations` (`id_edu`, `id_user`, `name`, `level`, `start_date`, `end_date`) VALUES
(4, 3, 'Informatika', 'S1', '2016-07-02', '2020-11-08'),
(6, 8, 'Teknik Komputer Jaringan', 'SMA', '2016-06-02', '2020-10-29');

-- --------------------------------------------------------

--
-- Table structure for table `employments`
--

CREATE TABLE `employments` (
  `id_emp` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `employment_name` varchar(255) NOT NULL,
  `level` enum('full_time','part_time','') NOT NULL,
  `company` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employments`
--

INSERT INTO `employments` (`id_emp`, `id_user`, `employment_name`, `level`, `company`, `start_date`, `end_date`) VALUES
(2, 3, 'Junior Web Developer', 'part_time', 'Speedy Global', '2021-05-03', '2021-05-29'),
(4, 8, 'IT Staff', 'full_time', 'IT Komp', '2021-04-26', '2021-05-08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(225) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `address`, `phone`) VALUES
(3, 'miartayasa10@gmail.com', '$2y$10$z0/vKXbXqiqXTL.EPJBrTOXFOy6uLH0YYSmzzkjjegnnCtC9jAcWq', 'I Gede Miarta Yasa', 'Mlati Krajan, Sendangadi, Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta', '+6281529963914'),
(7, 'sutapaloco@gmail.com', '$2y$10$JS.UYtzmjDnek4J0j8HEn.2nPnzRjC2TR.WQCvvZTtNtXIB/Ry89q', 'Sutapa', 'Mlati Krajan, Sendangadi, Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta', '+6281529963914'),
(8, 'sugeng@gmail.com', '$2y$10$YxRIHPjHHQS2iF1701QPz.8MLofBHEYEQhHljWTzN24GxXK5kibm2', 'Sugeng Pranoto', 'Mlati Krajan, Sendangadi, Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta', '+6281529963914');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `educations`
--
ALTER TABLE `educations`
  ADD PRIMARY KEY (`id_edu`);

--
-- Indexes for table `employments`
--
ALTER TABLE `employments`
  ADD PRIMARY KEY (`id_emp`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `educations`
--
ALTER TABLE `educations`
  MODIFY `id_edu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employments`
--
ALTER TABLE `employments`
  MODIFY `id_emp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
