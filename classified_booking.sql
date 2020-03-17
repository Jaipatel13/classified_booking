-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2020 at 12:40 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `classified_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertiesment_details`
--

CREATE TABLE `advertiesment_details` (
  `advertiesment_details_id` int(20) NOT NULL,
  `category_type` varchar(30) NOT NULL COMMENT '1-text\r\n2-display',
  `users_id` int(20) NOT NULL,
  `newspaper_id` int(20) NOT NULL,
  `advertiesment_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `advertiesment_height` varchar(30) NOT NULL,
  `advertiesment_width` varchar(30) NOT NULL,
  `advertiesment_amount` varchar(255) NOT NULL,
  `is_active` tinyint(3) NOT NULL DEFAULT 1 COMMENT '0=inactive\r\n1=active',
  `sort_order` int(20) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertiesment_details`
--

INSERT INTO `advertiesment_details` (`advertiesment_details_id`, `category_type`, `users_id`, `newspaper_id`, `advertiesment_name`, `description`, `advertiesment_height`, `advertiesment_width`, `advertiesment_amount`, `is_active`, `sort_order`, `entry_date`, `update_date`) VALUES
(1, 'display', 1, 1, 'House', 'welcome', '150', '200', '3000', 1, 0, '2020-03-07 04:22:01', '0000-00-00 00:00:00'),
(2, 'display', 2, 2, 'Electonics', 'hello world', '152', '200', '3000', 1, 0, '2020-03-07 04:22:05', '0000-00-00 00:00:00'),
(3, 'display', 3, 3, 'Cars And vehicles', 'hiii', '150', '200', '900', 1, 0, '2020-03-07 04:22:08', '0000-00-00 00:00:00'),
(4, 'text', 4, 4, 'Furniture', '', '150', '200', '3000', 1, 0, '2020-03-07 04:22:11', '0000-00-00 00:00:00'),
(5, 'text', 5, 5, 'Education', '', '1', '1', '1', 1, 0, '2020-03-07 04:22:18', '0000-00-00 00:00:00'),
(6, 'display', 5, 6, 'Education1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repellat architecto maiores vero, quasi dolor, accusantium autem aliquam, ullam sequi saepe illum eaque aperiam eius amet! Necessitatibus nam sapiente obcaecati sit, fugit omnis non sunt distinctio aliquid, quibusdam excepturi hic?', '1', '1', '1', 1, 0, '2020-03-07 08:13:39', '0000-00-00 00:00:00'),
(7, 'display', 3, 7, 'Cars And vehicles123', 'hiii', '150', '200', '900', 1, 0, '2020-02-26 05:57:37', '0000-00-00 00:00:00'),
(8, 'text', 4, 8, 'Furniture123', '', '150', '200', '3000', 1, 0, '2020-02-26 05:55:53', '0000-00-00 00:00:00'),
(9, 'text', 5, 9, 'Education123', '', '1', '1', '1', 1, 0, '2020-02-26 05:55:15', '0000-00-00 00:00:00'),
(10, 'text', 5, 10, 'Education123', '', '1', '1', '1', 1, 0, '2020-02-26 05:55:15', '0000-00-00 00:00:00'),
(11, 'display', 5, 6, 'Education2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repellat architecto maiores vero, quasi dolor, accusantium autem aliquam, ullam sequi saepe illum eaque aperiam eius amet! Necessitatibus nam sapiente obcaecati sit, fugit omnis non sunt distinctio aliquid, quibusdam excepturi hic?', '1', '1', '1', 1, 0, '2020-03-07 08:13:47', '0000-00-00 00:00:00'),
(12, 'display', 5, 6, 'Education3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repellat architecto maiores vero, quasi dolor, accusantium autem aliquam, ullam sequi saepe illum eaque aperiam eius amet! Necessitatibus nam sapiente obcaecati sit, fugit omnis non sunt distinctio aliquid, quibusdam excepturi hic?', '1', '1', '1', 1, 0, '2020-03-07 08:13:51', '0000-00-00 00:00:00'),
(13, 'text', 5, 6, 'Education4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repellat architecto maiores vero, quasi dolor, accusantium autem aliquam, ullam sequi saepe illum eaque aperiam eius amet! Necessitatibus nam sapiente obcaecati sit, fugit omnis non sunt distinctio aliquid, quibusdam excepturi hic?', '1', '1', '1', 1, 0, '2020-03-07 06:38:58', '0000-00-00 00:00:00'),
(14, 'text', 5, 6, 'Education5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repellat architecto maiores vero, quasi dolor, accusantium autem aliquam, ullam sequi saepe illum eaque aperiam eius amet! Necessitatibus nam sapiente obcaecati sit, fugit omnis non sunt distinctio aliquid, quibusdam excepturi hic?', '1', '1', '1', 1, 0, '2020-03-07 06:39:04', '0000-00-00 00:00:00'),
(15, 'text', 5, 6, 'Education6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repellat architecto maiores vero, quasi dolor, accusantium autem aliquam, ullam sequi saepe illum eaque aperiam eius amet! Necessitatibus nam sapiente obcaecati sit, fugit omnis non sunt distinctio aliquid, quibusdam excepturi hic?', '1', '1', '1', 1, 0, '2020-03-07 06:13:12', '0000-00-00 00:00:00'),
(16, 'text', 5, 6, 'Education7', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repellat architecto maiores vero, quasi dolor, accusantium autem aliquam, ullam sequi saepe illum eaque aperiam eius amet! Necessitatibus nam sapiente obcaecati sit, fugit omnis non sunt distinctio aliquid, quibusdam excepturi hic?', '1', '1', '1', 1, 0, '2020-03-07 06:39:08', '0000-00-00 00:00:00'),
(17, 'text', 5, 6, 'Education8', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error repellat architecto maiores vero, quasi dolor, accusantium autem aliquam, ullam sequi saepe illum eaque aperiam eius amet! Necessitatibus nam sapiente obcaecati sit, fugit omnis non sunt distinctio aliquid, quibusdam excepturi hic?', '1', '1', '1', 1, 0, '2020-03-07 06:39:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `booking_details_id` int(20) NOT NULL,
  `booking_name` varchar(255) NOT NULL,
  `booking_number` varchar(100) NOT NULL,
  `advertiesment_details_id` int(20) NOT NULL,
  `users_id` int(20) NOT NULL,
  `booking_date` datetime NOT NULL,
  `description` longtext NOT NULL,
  `newspaper_id` int(20) NOT NULL,
  `booking_amount` float NOT NULL,
  `is_active` tinyint(3) NOT NULL DEFAULT 1 COMMENT '0=inactive\r\n1=active',
  `sort_order` int(20) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`booking_details_id`, `booking_name`, `booking_number`, `advertiesment_details_id`, `users_id`, `booking_date`, `description`, `newspaper_id`, `booking_amount`, `is_active`, `sort_order`, `entry_date`, `update_date`) VALUES
(1, 'education', '1', 1, 2, '2020-02-02 10:49:14', '', 1, 1, 1, 0, '2020-02-26 05:02:46', '0000-00-00 00:00:00'),
(2, 'furniture', '2', 1, 2, '2020-02-02 10:49:14', '', 1, 1, 1, 0, '2020-02-26 05:02:50', '0000-00-00 00:00:00'),
(3, 'Education7', 'U4uB2Lta', 16, 2, '2020-03-07 12:01:06', 'Desc', 6, 1, 1, 0, '2020-03-07 11:01:06', '0000-00-00 00:00:00'),
(4, 'Education7', 'U4u0KGle', 16, 2, '2020-03-07 12:07:37', 'rqrqt', 6, 1, 1, 0, '2020-03-07 11:07:37', '0000-00-00 00:00:00'),
(5, 'Education7', 'U4ubuAgr', 16, 2, '2020-03-07 12:11:21', 'wewe', 6, 1, 1, 0, '2020-03-07 11:11:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `city_id` int(20) NOT NULL,
  `city_name` varchar(200) NOT NULL,
  `country_id` int(20) NOT NULL,
  `state_id` int(20) NOT NULL,
  `is_active` tinyint(3) NOT NULL DEFAULT 1 COMMENT '0=inactive\r\n1=active',
  `sort_order` int(20) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `city_name`, `country_id`, `state_id`, `is_active`, `sort_order`, `entry_date`, `update_date`) VALUES
(1, 'Ahmedabad', 1, 1, 1, 0, '2020-02-26 05:48:41', 0),
(2, 'Gandhinagar', 1, 1, 1, 0, '2020-02-26 05:49:25', 0),
(3, 'Vadodara', 1, 1, 1, 0, '2020-02-26 05:49:25', 0),
(4, 'Surat', 1, 1, 1, 0, '2020-02-26 05:49:25', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(20) NOT NULL,
  `country_name` varchar(200) NOT NULL,
  `is_active` tinyint(3) NOT NULL DEFAULT 1 COMMENT '0=inactive\r\n1=active',
  `sort_order` int(20) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `is_active`, `sort_order`, `entry_date`, `update_date`) VALUES
(1, 'India', 1, 0, '2020-01-29 07:18:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `newspaper`
--

CREATE TABLE `newspaper` (
  `newspaper_id` int(20) NOT NULL,
  `newspaper_name` varchar(255) NOT NULL,
  `newspaper_brand` int(200) NOT NULL,
  `users_id` int(20) NOT NULL,
  `advertiesment_details_id` int(20) NOT NULL,
  `is_active` tinyint(3) NOT NULL DEFAULT 1 COMMENT '0=inactive\r\n1=active',
  `sort_order` int(20) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newspaper`
--

INSERT INTO `newspaper` (`newspaper_id`, `newspaper_name`, `newspaper_brand`, `users_id`, `advertiesment_details_id`, `is_active`, `sort_order`, `entry_date`, `update_date`) VALUES
(1, 'Divay Bhaskar', 0, 0, 0, 1, 0, '2020-03-06 07:23:12', '0000-00-00 00:00:00'),
(2, 'Sandesh\r\n', 0, 0, 0, 1, 0, '2020-03-06 07:03:02', '0000-00-00 00:00:00'),
(3, 'Gujarat Samachar', 0, 0, 0, 1, 0, '2020-03-06 07:03:02', '0000-00-00 00:00:00'),
(4, 'The Times Of India', 0, 0, 0, 1, 0, '2020-03-06 07:03:02', '0000-00-00 00:00:00'),
(5, 'Maharast Times', 0, 0, 0, 1, 0, '2020-03-06 07:03:02', '0000-00-00 00:00:00'),
(6, 'Pune Mirror', 0, 0, 0, 1, 0, '2020-03-06 07:03:02', '0000-00-00 00:00:00'),
(7, 'Banglore Mirror', 0, 0, 0, 1, 0, '2020-03-06 07:03:02', '0000-00-00 00:00:00'),
(8, 'Rajshtan Patrika', 0, 0, 0, 1, 0, '2020-03-06 07:03:02', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `payment_details_id` int(20) NOT NULL,
  `payment_type` varchar(100) NOT NULL COMMENT '1.credit_card\r\n2.debit_card',
  `payment_date` datetime NOT NULL,
  `users_id` int(20) NOT NULL,
  `booking_details_id` int(20) NOT NULL,
  `advertiesment_details_id` int(20) NOT NULL,
  `payment_amount` float NOT NULL,
  `is_active` tinyint(3) NOT NULL DEFAULT 1 COMMENT '0=inactive\r\n1=active',
  `sort_order` int(20) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `state_id` int(20) NOT NULL,
  `country_id` int(20) NOT NULL,
  `state_name` varchar(200) NOT NULL,
  `is_active` tinyint(3) NOT NULL DEFAULT 1 COMMENT '0=inactive\r\n1=active',
  `sort_order` int(20) NOT NULL,
  `enter_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `country_id`, `state_name`, `is_active`, `sort_order`, `enter_date`, `update_date`) VALUES
(1, 1, 'Gujarat           ', 1, 0, '2020-02-26 05:47:26', '0000-00-00 00:00:00'),
(2, 1, 'Maharast     ', 1, 0, '2020-03-06 04:30:56', '0000-00-00 00:00:00'),
(3, 1, 'Rajshthan  ', 1, 0, '2020-03-06 04:31:59', '0000-00-00 00:00:00'),
(4, 1, 'Banglore\r\n', 1, 0, '2020-03-06 06:21:40', '0000-00-00 00:00:00'),
(5, 1, 'pune', 1, 0, '2020-03-06 06:21:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(20) NOT NULL,
  `user_type` varchar(100) NOT NULL COMMENT '1.admin\r\n2.customer',
  `username` varchar(255) NOT NULL,
  `first_name` varchar(150) NOT NULL,
  `last_name` varchar(150) NOT NULL,
  `address_line_1` text NOT NULL,
  `address_line_2` text NOT NULL,
  `country_id` int(20) NOT NULL,
  `state_id` int(20) NOT NULL,
  `city_id` int(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_no` varchar(200) NOT NULL,
  `paypal_email_id` varchar(255) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `is_active` tinyint(3) DEFAULT 1 COMMENT '0=inactive\r\n1=active',
  `sort_order` int(20) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `update_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `user_type`, `username`, `first_name`, `last_name`, `address_line_1`, `address_line_2`, `country_id`, `state_id`, `city_id`, `email`, `password`, `mobile_no`, `paypal_email_id`, `zip_code`, `is_active`, `sort_order`, `entry_date`, `update_date`) VALUES
(1, 'admin', '', 'Admin', '1', 'delhi', 'Mountain View', 1, 1, 1, 'parikh.rashmi1999@gmail.com', '56634bf8c27b9e0bd7f13644966a5c9794790caa23470033d97ccb2097e59c034de7e18d3db3d7e83e46b56be31566f01c69bf1163f1724f7dcad2b13d994adfmg3QmqpndKn5JfbcTuz7txRJizIyCKWkrERcSFgIWGA=', '9874563110', '', 0, 1, 0, '2020-03-06 03:47:29', '0000-00-00 00:00:00'),
(2, 'customer', 'Rashmi27', 'Rashmi', 'Parikh', 'shree sharnam society', 'sarghasan', 1, 1, 2, 'parikh.rashmi1990@gmail.com', '56634bf8c27b9e0bd7f13644966a5c9794790caa23470033d97ccb2097e59c034de7e18d3db3d7e83e46b56be31566f01c69bf1163f1724f7dcad2b13d994adfmg3QmqpndKn5JfbcTuz7txRJizIyCKWkrERcSFgIWGA=', '9874563110', 'parikh.rashmi1990@gmail.com', 382421, 1, 0, '2020-03-06 04:21:25', '0000-00-00 00:00:00'),
(3, 'customer', 'kinj27', 'kinj', 'patel', 'kadi', 'Shree Society', 1, 1, 2, 'patel.kinj1990@gmail.com', '56634bf8c27b9e0bd7f13644966a5c9794790caa23470033d97ccb2097e59c034de7e18d3db3d7e83e46b56be31566f01c69bf1163f1724f7dcad2b13d994adfmg3QmqpndKn5JfbcTuz7txRJizIyCKWkrERcSFgIWGA=', '9874563110', 'patel.kinj1990@gmail.com', 382421, 1, 0, '2020-03-04 05:42:23', '0000-00-00 00:00:00'),
(4, 'customer', 'richi27', 'richi', 'soni', 'ahmedabad', 'Shree Society', 1, 1, 2, 'soni.richi990@gmail.com', '56634bf8c27b9e0bd7f13644966a5c9794790caa23470033d97ccb2097e59c034de7e18d3db3d7e83e46b56be31566f01c69bf1163f1724f7dcad2b13d994adfmg3QmqpndKn5JfbcTuz7txRJizIyCKWkrERcSFgIWGA=', '9874563110', 'soni.richi1990@gmail.com', 382421, 1, 0, '2020-03-04 05:42:23', '0000-00-00 00:00:00'),
(5, 'customer', 'harsh27', 'harsh', 'oza', 'ahmedabad', 'Shree Society', 1, 1, 2, 'oza.harsh990@gmail.com', '56634bf8c27b9e0bd7f13644966a5c9794790caa23470033d97ccb2097e59c034de7e18d3db3d7e83e46b56be31566f01c69bf1163f1724f7dcad2b13d994adfmg3QmqpndKn5JfbcTuz7txRJizIyCKWkrERcSFgIWGA=', '9874563110', 'oza.harsh1990@gmail.com', 382421, 1, 0, '2020-03-04 05:42:23', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertiesment_details`
--
ALTER TABLE `advertiesment_details`
  ADD PRIMARY KEY (`advertiesment_details_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`booking_details_id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `newspaper`
--
ALTER TABLE `newspaper`
  ADD PRIMARY KEY (`newspaper_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`payment_details_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertiesment_details`
--
ALTER TABLE `advertiesment_details`
  MODIFY `advertiesment_details_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `booking_details_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `city_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newspaper`
--
ALTER TABLE `newspaper`
  MODIFY `newspaper_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `payment_details_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `state_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
