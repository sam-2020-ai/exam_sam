-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2024 at 08:29 AM
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
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcart`
--

CREATE TABLE `addcart` (
  `id` int(11) NOT NULL,
  `cat` varchar(100) NOT NULL,
  `image` varchar(199) NOT NULL,
  `price` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addcart`
--

INSERT INTO `addcart` (`id`, `cat`, `image`, `price`, `id_user`, `id_product`, `quantity`) VALUES
(2, 'round', '66d5ab5577099.jpg', 11, 2, 11, 3),
(8, 'teshirt', '66d88fed3aea3.jpg', 120, 8, 6, 2),
(9, 'teshirt', '66d88fed3aea3.jpg', 120, 8, 6, 2),
(10, 'teshirt', '66d88fed3aea3.jpg', 120, 8, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` int(11) NOT NULL,
  `priv` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `address`, `phone`, `priv`) VALUES
(2, 'samir', 'samirwagieh712@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'cairo', 1234567899, 1),
(3, 'samir wagieh', 'samirwagieh7@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'giza', 2147483647, 0),
(4, 'samir', 'samirwagieh7122@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'cairo', 1234567899, 0),
(5, 'samir', 'sam@g.com', '3354045a397621cd92406f1f98cde292', 'giza', 1234567899, 0),
(6, 'samir', 'samirwagieh7112@gmail.com', '$2y$10$1Xi2DaMwgOUpPrRof3WjVevc0drgcnc5ONDTU6dK75ZaxjjakxfnG', 'cairo', 1234567899, 0),
(7, 'sam', 'samirwagieh71112@gmail.com', '$2y$10$jC3.hTLRyuq2Ih5IEQT9eOo88sTTO3tm6cAFX2wCMp2PzukDBmCX6', 'cairo', 1234567899, 0),
(8, 'samirwagiehh', 'samirwagieh711112@gmail.com', '$2y$10$Q2leXKpisafkk8ubGTy.XuvbGNRqmOZEKQpj/XjJvHhulREq0.2cW', 'giza', 1234567899, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cat`
--

CREATE TABLE `cat` (
  `id` int(11) NOT NULL,
  `cat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cat`
--

INSERT INTO `cat` (`id`, `cat`) VALUES
(1, 'te shirt'),
(2, 'labtop'),
(3, 'short');

-- --------------------------------------------------------

--
-- Table structure for table `many`
--

CREATE TABLE `many` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `cat` varchar(100) NOT NULL,
  `dis` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `admin_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `cat` varchar(100) NOT NULL,
  `dis` varchar(200) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `cat`, `dis`, `price`, `image`, `admin_id`, `quantity`) VALUES
(6, 'teshirt', 'te shirt', 'te shirt', 8001, '66d5cb27bb507.jpg', 2, 1001),
(8, 'round', 'te shirt', 'labtob', 11, '66d5ab210093d.jpg', 2, 11),
(10, 'round', 'te shirt', 'te shirt', 11, '66d5ab4714173.jpg', 2, 11),
(11, 'round', 'te shirt', 'short', 11, '66d5ab5577099.jpg', 2, 11),
(12, 'teshirt', 'te shirt', 'polo', 120, '66d88fed3aea3.jpg', 8, 100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcart`
--
ALTER TABLE `addcart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_product` (`id_product`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cat`
--
ALTER TABLE `cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `many`
--
ALTER TABLE `many`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcart`
--
ALTER TABLE `addcart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cat`
--
ALTER TABLE `cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `many`
--
ALTER TABLE `many`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addcart`
--
ALTER TABLE `addcart`
  ADD CONSTRAINT `addcart_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `addcart_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
