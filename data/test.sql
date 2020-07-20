-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 09:14 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `o_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `new_date` date NOT NULL,
  `end_date` date NOT NULL,
  `p_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`o_id`, `username`, `address`, `email`, `phone`, `new_date`, `end_date`, `p_id`, `u_id`) VALUES
(5, 'sobrii mama', '57/2 กูวิง บานา เมือง ปัตตานี 94000', 'bree@gmail.com', '0807070159', '2020-03-24', '2020-03-30', 4, 3),
(6, 'surainee lateh', '57/2 กูวิง บานา เมือง ปัตตานี 94000', 'bree@gmail.com', '0807070159', '2020-03-25', '2020-03-27', 4, 3),
(7, 'surainee lateh', '57/2 กูวิง บานา เมือง ปัตตานี 94000', 'bree@gmail.com', '0807070159', '2020-03-25', '2020-03-24', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` int(11) NOT NULL,
  `b_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `details` text CHARACTER SET utf8 NOT NULL,
  `gory` varchar(100) CHARACTER SET utf8 NOT NULL,
  `b_photo` varchar(400) NOT NULL,
  `price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`id`, `b_name`, `details`, `gory`, `b_photo`, `price`) VALUES
(2, 'ชุดแต่งงานอิสลาม', 'size 26 color blcak bewtifull', 'woman', 'img_5e767628576b2.jpg', 3200),
(3, 'ชุดแต่งงานอิสลาม', 'size 26 color blcak bewtifull', 'man', 'img_5e77945519b59.jpg', 4300),
(4, 'ชุดแต่งงานอิสลาม', 'size 24 สีนํ้าตาล เอว 36 เหมาะกับคนตัวเล็ก', 'woman', 'img_5e7a32fe029d2.jpg', 4560);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(150) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(150) CHARACTER SET utf8 NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `status`) VALUES
(1, 'surainee', 'saleh', 'test@test.com', '1234', 'user'),
(2, 'admin', 'admin', 'admin@gmail.com', 'admin', 'admin'),
(3, 'sobrii', 'mama', 'bree@gmail.com', 'bree', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `o_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
