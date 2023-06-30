-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 10:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `messagegram`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_users`
--

CREATE TABLE `chat_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `connected_username` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `chat_users`
--

INSERT INTO `chat_users` (`id`, `username`, `connected_username`, `datetime`) VALUES
(1, 'Lokeshwar Deb', 'Jhumur Roy', '2023-06-30 23:57:37'),
(2, 'Jhumur Roy', 'Lokeshwar Deb', '2023-06-30 23:57:55');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_username` varchar(255) NOT NULL,
  `reciver_username` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_username`, `reciver_username`, `message`, `datetime`) VALUES
(1, 'p', 'd', 'd', '2023-06-30 18:50:08'),
(2, 'Lokeshwar Deb', 'Jhumur Roy', 'This is a message', '2023-06-30 20:05:03'),
(3, 'Lokeshwar Deb', 'Jhumur Roy', 'Lokeshwar Deb', '2023-06-30 21:41:36'),
(4, 'Lokeshwar Deb', 'Jhumur Roy', 'Lokeshwar Deb', '2023-06-30 21:42:49'),
(5, 'Lokeshwar Deb', 'Jhumur Roy', 'om namah shivay', '2023-06-30 21:43:32'),
(6, 'Lokeshwar Deb', 'Jhumur Roy', 'om namah shivay', '2023-06-30 22:10:44'),
(7, 'Lokeshwar Deb', 'Jhumur Roy', 'har har mahadeb', '2023-06-30 22:12:21'),
(8, 'Jhumur Roy', 'Lokeshwar Deb', 'om namah shivay', '2023-06-30 22:13:10'),
(9, 'Jhumur Roy', 'Lokeshwar Deb', 'dd', '2023-06-30 22:13:37'),
(10, 'Jhumur Roy', 'Lokeshwar Deb', 'df', '2023-06-30 22:20:53'),
(11, 'Jhumur Roy', 'Jhumur Roy', 'd', '2023-06-30 22:24:42'),
(12, 'Jhumur Roy', 'Jhumur Roy', 's', '2023-06-30 22:25:50'),
(13, 'Jhumur Roy', 'Jhumur Roy', 'e', '2023-06-30 22:33:42'),
(14, 'Jhumur Roy', 'Jhumur Roy', 'de', '2023-06-30 22:36:21'),
(15, 'Lokeshwar Deb', 'Jhumur Roy', 'd', '2023-06-30 22:38:34'),
(16, 'Lokeshwar Deb', 'Jhumur Roy', 'w', '2023-06-30 22:43:31'),
(17, 'Jhumur Roy', 'Lokeshwar Deb', 'From Jhumur', '2023-06-30 22:55:08'),
(18, 'Lokeshwar Deb', 'Jhumur Roy', 'from lokeshwar\r\n', '2023-06-30 23:01:39'),
(19, 'Lokeshwar Deb', 'Jhumur Roy', 'Hi Jhumur', '2023-07-01 01:14:47'),
(20, 'Lokeshwar Deb', 'Jhumur Roy', 'sended', '2023-07-01 01:42:19'),
(21, 'Jhumur Roy', 'Lokeshwar Deb', 'recived sended\r\n', '2023-07-01 01:43:13'),
(22, 'Lokeshwar Deb', 'Jhumur Roy', 'thanks', '2023-07-01 02:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img_name` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `user_email`, `password`, `img_name`, `datetime`) VALUES
(1, 'fd', 'g', '', 'd', '2023-06-30 17:26:38'),
(2, ',m,', 'lokeshwarfashionhouse@gmail.com', '$2y$10$mS8f5klhMuda19qSs/8ICeSMZo9ioezgMvcrdUKpQST/3/1Q8B7Q2', '', '2023-06-30 18:22:53'),
(3, 'd', 'lokeshwarfashionhouse@gmail.com', '$2y$10$es1O9IZbTBz4yfuZhFCcReWU9MVZ.7I18AVebvZqkFBlqzo6Hc7E2', '', '2023-06-30 18:28:08'),
(4, 'Lokeshwar Deb', 'lokeshwarfashionhouse@gmail.com', '$2y$10$Gb8XZFJczgjvfx5zg6mI6eZB9A5BwgMy82QTgEwWpPqK7j8V/P9Qm', '', '2023-06-30 20:01:28'),
(5, 'Jhumur Roy', 'jhumurroy22@gmail.com', '$2y$10$h/8DxoIJCRSET3rnCsx4OOgB/IzYznKRgonHYtSej4/0e0zY.o0Li', '', '2023-06-30 20:01:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat_users`
--
ALTER TABLE `chat_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chat_users`
--
ALTER TABLE `chat_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
