-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 09, 2020 at 06:56 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `post_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `created`, `updated`) VALUES
(6, 'snack', '2020-03-06 17:39:24', '2020-03-06 21:32:44'),
(9, 'minuman ringan', '2020-03-06 20:11:15', '2020-03-06 21:32:36'),
(10, 'minuman', '2020-03-06 20:11:22', '2020-03-06 21:32:13'),
(11, 'mie', '2020-03-06 20:11:34', '2020-03-06 21:32:02'),
(12, 'makanan', '2020-03-06 20:11:38', '2020-03-06 21:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `name`, `gender`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'aaaaaaa', 'P', '43535435', 'cuman ganti perempuan saja', '2020-03-06 14:27:48', '2020-03-06 08:36:41'),
(3, 'bambang', 'L', '98978987974', 'tuban akbar\r\n', '2020-03-06 14:36:23', '2020-03-06 11:20:41'),
(4, 'anton', 'L', '8979879', 'kjljkjkljl', '2020-03-07 03:30:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(10) NOT NULL DEFAULT '0',
  `image` varchar(100) DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `stock`, `image`, `created`, `updated`) VALUES
(2, 'a002', 'relax', 11, 8, 15000, 0, NULL, '2020-03-07 05:59:01', '2020-03-07 12:50:03'),
(3, 'a003', 'hhhhh', 9, 7, 7777, 0, NULL, '2020-03-07 18:46:09', '2020-03-07 16:05:11'),
(4, 'a004', 'kacang', 12, 7, 3000, 0, NULL, '2020-03-07 19:06:02', NULL),
(5, 'a005', 'uiererer', 9, 7, 7000, 0, NULL, '2020-03-08 07:51:07', '2020-03-08 01:58:48'),
(6, 'a007', 'uuuu', 10, 7, 9999000, 0, NULL, '2020-03-08 08:23:29', '2020-03-08 11:27:31'),
(7, 'a008', 'ii', 10, 7, 7000, 0, 'item-200308-25a7ddb08e.png', '2020-03-08 08:32:56', '2020-03-08 11:20:46');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` text,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `name`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(1, 'Toko A', '0877665777', 'Doromukti', 'Toko ATK', '2020-03-05 14:58:54', NULL),
(2, 'Toko B', '098767678678', 'Bojonegoro', 'Toko langganan', '2020-03-05 14:58:54', NULL),
(5, 'wes bener', '33333', 'ketintang lama', 'toko mantab', '2020-03-05 21:38:17', '2020-03-06 02:45:18'),
(6, 'toko DED', '87868768768', 'jalan montang manting', 'pokok e sip ae', '2020-03-06 08:22:00', '2020-03-06 02:45:38'),
(7, 'pak jhon', '8797897979', 'malang', NULL, '2020-03-07 03:29:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `name`, `created`, `updated`) VALUES
(7, 'pcs', '2020-03-06 17:55:34', '2020-03-07 12:27:13'),
(8, 'Kg', '2020-03-07 18:27:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `name`, `address`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'rama astadipati', 'tuban regency', 1),
(2, 'kasir', '8691e4fc53b99da544ce86e22acba62d13352eff', 'kabag kasir', 'tuban akbar', 2),
(7, 'arisaja', '9275a4603956f7ea4b09d6beb4c770222926d36d', 'ari', 'mojokerto', 2),
(8, 'kasirbaru2', 'c6cf11767a72e96e43bd0ba8c72f6790a1c2a8b5', 'kasir baru', 'baru saja diganti', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `unit` (`unit_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
