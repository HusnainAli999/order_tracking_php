-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2023 at 12:16 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `order_tracking_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_registration_table`
--

CREATE TABLE `customer_registration_table` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `unique_id` text NOT NULL,
  `register_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_registration_table`
--

INSERT INTO `customer_registration_table` (`id`, `name`, `email`, `password`, `unique_id`, `register_at`) VALUES
(2, 'sunny', 'sunny@gmail.com', '$2y$10$6r9p6S8/62KrvQP/tpZObe38S3f9vWi.AM/yFnecXnvGbH3n.tWkC', '658691ead614682282c198b6a00d5', '2023-12-23 07:53:14');

-- --------------------------------------------------------

--
-- Table structure for table `orders_table`
--

CREATE TABLE `orders_table` (
  `order_id` int(11) NOT NULL,
  `seller_id` text NOT NULL,
  `customer_id` text NOT NULL,
  `customer_name` text NOT NULL,
  `seller_name` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_status` text DEFAULT NULL,
  `order_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders_table`
--

INSERT INTO `orders_table` (`order_id`, `seller_id`, `customer_id`, `customer_name`, `seller_name`, `product_id`, `order_status`, `order_at`) VALUES
(5, '65869165a16f2cff6828500dac7d8', '658691ead614682282c198b6a00d5', 'sunny', '', 5, 'Your Order Is Shipped From My Shop', '2023-12-23 08:40:44'),
(6, '65869165a16f2cff6828500dac7d8', '658691ead614682282c198b6a00d5', 'sunny', 'Husnain Ali', 6, '', '2023-12-23 09:00:26');

-- --------------------------------------------------------

--
-- Table structure for table `products_table`
--

CREATE TABLE `products_table` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `price` int(11) NOT NULL,
  `seller_id` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products_table`
--

INSERT INTO `products_table` (`id`, `title`, `price`, `seller_id`) VALUES
(5, 'Elite Autos: Unveiling Excellence in Every Drive', 1500000, '65869165a16f2cff6828500dac7d8'),
(6, 'Revolutionary Rides: Unleash Your Passion with Our High-Octane Collection of Cutting-Edge Motorcycles, Where Adventure Meets Precision Performance', 15000, '65869165a16f2cff6828500dac7d8'),
(7, 'Sole Symphony: Step into Elegance with Our Exquisite Collection of Trendsetting Footwear for Every Occasion', 1400, '65869165a16f2cff6828500dac7d8');

-- --------------------------------------------------------

--
-- Table structure for table `seller_registration_table`
--

CREATE TABLE `seller_registration_table` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `unique_id` text NOT NULL,
  `register_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seller_registration_table`
--

INSERT INTO `seller_registration_table` (`id`, `name`, `email`, `password`, `unique_id`, `register_at`) VALUES
(4, 'Husnain Ali', 'husnain@gmail.com', '$2y$10$Ld7htnfCsaV23XUnllCKU.iYPGDwEfrbuMyqWzWuw.5QGruVxKEaS', '65869165a16f2cff6828500dac7d8', '2023-12-23 07:51:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_registration_table`
--
ALTER TABLE `customer_registration_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_table`
--
ALTER TABLE `orders_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products_table`
--
ALTER TABLE `products_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_registration_table`
--
ALTER TABLE `seller_registration_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_registration_table`
--
ALTER TABLE `customer_registration_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders_table`
--
ALTER TABLE `orders_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products_table`
--
ALTER TABLE `products_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seller_registration_table`
--
ALTER TABLE `seller_registration_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
