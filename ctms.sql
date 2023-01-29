-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2023 at 11:36 AM
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
-- Table structure for table `archives`
--

CREATE TABLE `archives` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(8, 'Carl', 'E', 'Ibabao', 'carl@carl.com', '12938712737', 'active', 52469),
(13, 'Josh', 'Desabelle', 'Balansa', 'jbalansa143@gmail.com', '09122190312', 'active', 2198),
(14, 'Coordinator', 'Coordinator', 'Coordinator', 'Coordinator@gmail.com', '09101920123', 'active', 4560);

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

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `refno` varchar(255) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `amount`, `refno`, `date`, `user_id`) VALUES
(72, '900', '1029380129380', '2023-01-22', 77),
(73, '100', '1029391203013', '2023-01-22', 79),
(74, '800', '9182737213811', '2023-01-27', 77);

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
(73, 'Joshua', 'Desabelle ', 'Balansa', 'jbssalansa143@gmail.com', '09101023900', '2023-01-13', 'Coffee', 'Bacolod City Brgy Estifania ', '', '02af6f406b25e5c284daa0c39cf96a9a.jpg', '', '', 'pastdue', '2022-12-29 21:57:22.357411'),
(74, 'Alfred', 'Baloya', 'Fabillar', 'afred@yahoo.com', '09812391290', '0000-00-00', 'Burger', 'Bacolod City Brgy Estifania ', '', '02af6f406b25e5c284daa0c39cf96a9a.jpg', '', '', 'pending', '2022-12-29 22:02:00.443010'),
(75, 'Mark', 'M', 'Munion', 'johnmarksalera5@gmail.com', '98192399238', '2013-01-09', 'Coffee', 'Bacolod City Brgy Estifania ', '', '02af6f406b25e5c284daa0c39cf96a9a.jpg', '', '', 'pending', '2022-12-29 22:07:14.558943'),
(76, 'Eugene', 'Tingson', 'Talisik', 'lagosjames34@gmail.com', '91283091289', '0000-00-00', 'COffeee', 'Bacolod City', '', '02af6f406b25e5c284daa0c39cf96a9a.jpg', '', '', 'active', '2023-01-05 12:10:39.718637'),
(90, 'joshua', 'desabelle', 'balannsa', 'jbalansa143@gmail.com', '09120312939', '2023-01-14', 'burger', 'bacolod city neg occ', '1920x1080-rick-and-morty-orange-space-art-4k_1602452335.jpg', '1920x1080-rick-and-morty-orange-space-art-4k_1602452335.jpg', 'IMG_20220928_092205_2.jpg', '1920x1080-rick-and-morty-orange-space-art-4k_1602452335.jpg', 'pending', '2023-01-14 18:45:30.428316'),
(91, 'James', 'Obregon', 'Lagos', 'jbalansa143@gmail.com', '91827312893', '2023-01-16', 'Business', 'Bacolod City Neg occ', '2f93af00-b23c-4c3d-b442-9d800fc41ec7.jpg', '1920x1080-rick-and-morty-orange-space-art-4k_1602452335.jpg', '1920x1080-rick-and-morty-orange-space-art-4k_1602452335.jpg', '1920x1080-rick-and-morty-orange-space-art-4k_1602452335.jpg', 'pastdue', '2023-01-16 12:00:38.721830'),
(171, 'bettatest', 'bettatest', 'bettatest', 'jbalansa143@gmail.com', '12321313123', '2023-01-22', 'bettatest', 'bettatest', '2f93af00-b23c-4c3d-b442-9d800fc41ec7.jpg', '1920x1080-rick-and-morty-orange-space-art-4k_1602452335.jpg', 'IMG_20220928_092205_2.jpg', 'Marmotamaps_Wallpaper_Berchtesgaden_Desktop_1920x1080.jpg', 'active', '2023-01-22 23:20:00.015463'),
(172, 'bettatest', 'bettatest', 'bettatest', 'jbalansa143@gmail.com', '12321313123', '1900-01-11', 'bettatest', 'bettatest', '2f93af00-b23c-4c3d-b442-9d800fc41ec7.jpg', '1920x1080-rick-and-morty-orange-space-art-4k_1602452335.jpg', 'IMG_20220928_092205_2.jpg', 'Marmotamaps_Wallpaper_Berchtesgaden_Desktop_1920x1080.jpg', 'pending', '2023-01-22 23:24:45.443847'),
(173, 'Alvin', 'Alvin', 'Alvin', 'vintoien22@gmail.com', '91283912232', '2023-01-24', 'Flowers', 'Bacolod city', 'IMG_20220928_092205_2.jpg', '2f93af00-b23c-4c3d-b442-9d800fc41ec7.jpg', '2f93af00-b23c-4c3d-b442-9d800fc41ec7.jpg', 'IMG_20220928_092205_2.jpg', 'rejected', '2023-01-24 11:12:35.177045'),
(174, 'helloworld', 'helloworld', 'helloworld', 'helloworld@helloworld.com', '09120939120', '2007-06-21', 'Burger', 'Bacolod City', 'wallpaperflare.com_wallpaper.jpg', 'wallpaperflare.com_wallpaper.jpg', 'wallpaperflare.com_wallpaper.jpg', 'wallpaperflare.com_wallpaper.jpg', 'pending', '2023-01-27 21:55:09.028066');

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
(56, 'carl', '123', '2022-12-22 00:08:10', 'coordinator', 52469, 'active'),
(76, 'josh', '123', '2023-01-05 14:33:21', 'coordinator', 2198, 'active'),
(77, 'jbalansa', '123', '2023-01-05 14:37:17', 'tenant', 73, 'active'),
(92, 'bbettatest', 'e07bzu46', '2023-01-25 13:20:23', 'tenant', 171, 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archives`
--
ALTER TABLE `archives`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `archives`
--
ALTER TABLE `archives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `coordinators`
--
ALTER TABLE `coordinators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
