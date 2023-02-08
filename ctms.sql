-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2023 at 01:47 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ctms`
--

-- --------------------------------------------------------

--
-- Table structure for table `coordinators`
--

CREATE TABLE `coordinators` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'active',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coordinators`
--

INSERT INTO `coordinators` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `contact`, `status`, `user_id`) VALUES
(19, 'Joshua', 'Desabelle', 'Balansa', 'jbalansa143@gmail.com', '09882392398', 'active', 843);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `account_type` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `log_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `first_name`, `account_type`, `date`, `log_id`) VALUES
(500, 'Joshua Balansa', 'admin', '2023-02-07 11:53:38', '122'),
(501, 'Joshua Balansa', 'admin', '2023-02-07 11:58:16', '122'),
(502, 'Joshua Balansa', 'admin', '2023-02-07 18:54:17', '122'),
(503, 'Joshua Balansa', 'admin', '2023-02-07 19:07:34', '122'),
(504, 'Joshua Balansa', 'admin', '2023-02-07 19:38:23', '122'),
(505, 'Joshua Balansa', 'admin', '2023-02-07 19:58:57', '122'),
(506, 'tenant Sample', 'tenant', '2023-02-07 21:14:15', '123'),
(507, 'tenant Sample', 'tenant', '2023-02-07 21:14:26', '123'),
(508, 'Joshua Balansa', 'admin', '2023-02-07 21:14:32', '122');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `refno` varchar(255) NOT NULL,
  `ref_img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `date` date DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `amount`, `refno`, `ref_img`, `status`, `date`, `user_id`) VALUES
(123, '100', '0912830809128', '../uploads/3862_Screenshot_20230129_022210.png', 'accepted', '2023-02-02', 123),
(124, '800', '2001231212123', '../uploads/6847_health_certificate.jpg', 'accepted', '2023-02-03', 123),
(127, '900', '0129309909301', '../uploads/health_certificate(1).jpg', 'accepted', '2023-02-03', 124),
(128, '98', '1928371931827', '../uploads/9436_business_permit.jpg', 'pending', '2023-02-04', 123),
(129, '900', '0129830123801', '../uploads/7366_letter-of-intent-sample.png', 'accepted', '2023-02-04', 125),
(130, '20', '1111111111111', '../uploads/refno.jpg', 'accepted', '2023-02-04', 123),
(131, '900', '0129301203910', '../uploads/4813_refno.jpg', 'accepted', '2023-02-06', 123),
(132, '800', '0192830921381', '../uploads/2325_refno.jpg', 'pending', '2023-02-06', 123),
(133, '200', '1029381209380', '../uploads/4623_refno.jpg', 'pending', '2023-02-06', 123),
(134, '300', '9102830912930', '../uploads/7196_refno.jpg', 'accepted', '2023-02-06', 127);

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `midname` varchar(255) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `birth_date` date NOT NULL,
  `business_type` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `l_intent` varchar(255) NOT NULL,
  `s_permit` varchar(255) NOT NULL,
  `b_permit` varchar(255) NOT NULL,
  `h_certificate` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `fname`, `midname`, `lname`, `email`, `contact`, `birth_date`, `business_type`, `address`, `l_intent`, `s_permit`, `b_permit`, `h_certificate`, `status`, `date`) VALUES
(188, 'tenant', 'tenant', 'Sample', 'jbalansa143@gmail.com', '12391001923', '2023-02-25', 'Sample', 'SampleSampleSample1', '', 'Sanitary_permit.jpg', 'health_certificate.jpg', '', 'active', '2023-02-02 23:00:43.729837'),
(189, 'josh', 'desabelle', 'balansa', 'jbalansa143@gmail.com', '91023013091', '2023-02-10', 'Coffeee', 'CoffeeeCoffeee', '', '', '', '', 'pending', '2023-02-02 23:01:17.954229'),
(190, 'Joshua', 'Desabelle', 'Balansa', 'jbalansa143@gmail.com', '01923908120', '1999-11-09', 'Coffee', 'Bacolod city brgy estifania', 'business_permit.jpg', 'letter-of-intent-sample.png', '', '', 'active', '2023-02-04 08:57:08.994370'),
(191, 'Potato', 'sample', 'Corner', 'jbalansa143@gmail.com', '01923012039', '1973-03-13', 'sample', 'samplesamplesample', 'letter-of-intent-sample.png', 'Sanitary_permit.jpg', 'business_permit.jpg', 'health_certificate.jpg', 'active', '2023-02-05 08:33:54.769081'),
(192, 'example', 'example', 'example', 'example@example.com', '12319203801', '2023-03-02', 'example', 'example', '', '', '', '', 'archived', '2023-02-06 07:49:37.589429');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `account_type` varchar(255) NOT NULL DEFAULT 'tenant',
  `user_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `date`, `account_type`, `user_id`, `status`) VALUES
(1, 'admin', 'admin', '2022-11-02 19:08:57', 'admin', 0, 'active'),
(122, 'coor', '123', '2023-02-02 22:56:53', 'coordinator', 843, 'active'),
(123, 'tenant', '123', '2023-02-02 23:03:13', 'tenant', 188, 'active'),
(125, 'tenant2', '123', '2023-02-04 19:36:49', 'tenant', 190, 'active'),
(126, 'pcorner32349', 'qbi71yzL', '2023-02-05 08:40:49', 'tenant', 191, 'active'),
(127, 'empty', '123', '2023-02-06 07:49:49', 'archived', 192, 'archived');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coordinators`
--
ALTER TABLE `coordinators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_id` (`log_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coordinators`
--
ALTER TABLE `coordinators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=509;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
