-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2024 at 06:05 PM
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
-- Database: `tp_php`
CREATE DATABASE IF NOT EXISTS `tp_php` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `tp_php`;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(40) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_email`, `admin_password`, `admin_id`, `admin_name`) VALUES
('admin@email.com', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `event_price` decimal(10,2) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_sum` varchar(100) NOT NULL,
  `event_description` text NOT NULL,
  `event_category` enum('workshop','congress','contest','hackathon') NOT NULL,
  `event_datetime` datetime NOT NULL,
  `event_image1` varchar(255) NOT NULL,
  `event_image2` varchar(255) NOT NULL,
  `event_image3` varchar(255) DEFAULT NULL,
  `event_image4` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `event_price`, `event_name`, `event_sum`, `event_description`, `event_category`, `event_datetime`, `event_image1`, `event_image2`, `event_image3`, `event_image4`) VALUES
(142000, 20.00, 'Data Overflow', 'A fast-paced AI workshop', 'DO is a cycle of trainings that will be concluded with a hackathon in the field of Data Science & AI', 'workshop', '2024-02-02 08:00:00', 'do1.jpg', 'do2.jpg', 'do3.jpg', 'do4.jpg'),
(142069, 150.00, 'Artificial Intelligence National Summit', 'Nation-wide congress for AI discussions', 'AINS is the first artificial intelligence congress organized by IEEE INSAT students.', 'congress', '2024-06-01 18:00:00', 'ains1.jpg', 'ains2.jpg', 'ains3.jpg', 'ains4.jpg'),
(169000, 15.00, 'Summer School IV', '3-Day workshop series for beginners', 'Get ready to dive into the world of engineering with our 6th edition of Summer School. Its that time of the year again, and we are thrilled to bring you our first annual event, offering introductory courses in various engineering fields for beginners.', 'workshop', '2024-09-01 10:00:00', 'sum_school1.jpg', 'sum_school2.jpg', 'sum_school3.jpg', 'sum_school4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_cost` decimal(6,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'Unpaid',
  `user_id` int(11) NOT NULL,
  `user_phone` varchar(10) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_university` varchar(255) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `event_id` varchar(255) NOT NULL,
  `event_price` decimal(6,2) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--

-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_constraint` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
