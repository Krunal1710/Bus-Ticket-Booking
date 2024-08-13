-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2024 at 11:36 AM
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
-- Database: `bus_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `email` varchar(100) NOT NULL,
  `bus_number` varchar(50) NOT NULL,
  `bdate` date NOT NULL,
  `pname` varchar(100) NOT NULL,
  `age` int(5) NOT NULL,
  `contact` int(50) NOT NULL,
  `seat` int(50) NOT NULL,
  `gender` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`email`, `bus_number`, `bdate`, `pname`, `age`, `contact`, `seat`, `gender`) VALUES
('abc123@gmail.com', 'GJ05XA1234', '2024-06-27', 'abc', 20, 1234567890, 1, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `bus_number` varchar(50) NOT NULL,
  `source` varchar(40) NOT NULL,
  `destination` varchar(40) NOT NULL,
  `departure_time` varchar(50) NOT NULL,
  `arrival_time` varchar(50) NOT NULL,
  `bus_type` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `via_cities` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`bus_number`, `source`, `destination`, `departure_time`, `arrival_time`, `bus_type`, `price`, `via_cities`) VALUES
('GJ05XA1234', 'surat', 'ahmedabad', '23:15', '05:50', 'AC', 500, 'kamrej-ankleshwar-bharuch-vadodara-anand-nadiad'),
('GJ05XB1234', 'surat', 'ahmedabad', '16:10', '23:25', 'NON-AC', 333, 'kamrej-ankleshwar-bharuch-vadodara-anand-nadiad'),
('GJ05XC1234', 'ahmedabad', 'surat', '23:15', '05:50', 'AC', 500, 'kamrej-ankleshwar-bharuch-vadodara-anand-nadiad'),
('GJ05XD1234', 'ahmedabad', 'surat', '16:10', '23:25', 'NON-AC', 333, 'kamrej-ankleshwar-bharuch-vadodara-anand-nadiad'),
('GJ05XE1234', 'surat', 'rajkot', '22:00', '06:25', 'AC', 600, 'kamrej-ankleshwar-bharuch-vadodara-anand-nadiad'),
('GJ05XF1234', 'rajkot', 'surat', '22:00', '06:25', 'AC', 600, 'kamrej-ankleshwar-bharuch-vadodara-anand-nadiad');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `subject` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `email`, `password`) VALUES
('abc', 'abc123@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`bus_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
