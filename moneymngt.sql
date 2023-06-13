-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2023 at 05:08 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moneymngt`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL,
  `division` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `income_date` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `division`, `category_name`, `amount`, `description`, `income_date`, `created_at`, `updated_at`) VALUES
(2, 'personal', 'Movie', '1000', 'not ', '2023-05-26', '2023-05-29 15:39:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `id` int(11) NOT NULL,
  `division` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `income_date` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`id`, `division`, `category_name`, `amount`, `description`, `income_date`, `created_at`, `updated_at`) VALUES
(1, 'personal', 'Movie', '1001', 'eqwewq', '2022-05-29', '2023-05-30 03:02:41', NULL),
(2, 'office', 'Fuel', '1001', 'eqwewq', '2023-05-27', '2023-05-29 05:04:08', NULL),
(3, 'personal', 'Movie', '1001', 'eqwewq', '2023-05-27', '2023-05-29 15:04:07', NULL),
(4, 'office', 'wqeqe', '1001', 'eqwewq', '2023-05-27', '2023-05-26 00:51:00', NULL),
(5, 'office', 'wqeqe', '1001', 'eqwewq', '2023-05-27', '2023-05-26 00:51:34', NULL),
(6, 'office', 'wqeqe', '1001', 'eqwewq', '2023-05-27', '2023-05-26 00:52:55', NULL),
(7, 'personal', 'erwer', '4324', 'not ', '2023-05-19', '2023-05-26 01:10:37', NULL),
(8, 'office', 'Loan', '1000', 'no', '2023-05-26', '2023-05-26 01:25:12', NULL),
(9, 'office', 'Fuel', '1000', 'not ', '2023-05-26', '2023-05-26 01:50:31', NULL),
(10, 'office', 'Fuel', '1000', 'not ', '2023-05-26', '2023-05-26 01:50:35', NULL),
(11, 'office', 'Fuel', '1000', 'not ', '2023-05-26', '2023-05-26 15:44:11', NULL),
(12, 'office', 'Fuel', '100', 'not ', '2023-05-26', '2023-05-26 15:46:37', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
