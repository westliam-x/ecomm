-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2018 at 07:40 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--
CREATE TABLE `products` (
  `id` int(30) NOT NULL,
  `Name` text NOT NULL,
  `Stars` int(10) NOT NULL,
  `product_image` varchar(150) NOT NULL,
  `sizes` int(30) NOT NULL,
  `product_Details` longtext NOT NULL,
  `product_Price` int(30) NOT NULL,
  `quantity` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Name`,`Stars`,`product_image`,`sizes`,`product_Details`,`product_Price`,`quantity`) VALUES
(1, 'Glass Jar', 4, 'bottle.jpg',200, 'Very glassy jar',2000,30),
(2, 'Big Jar',2 ,'bottle1.1.jpg',2000,'Very big jar',1000,70),
(3, 'Small Jar', 5,'bottle.jpg',100, 'Very small jar',4000,50),
(4, 'Slim Jar',3 ,'bottle1.png',10, 'Very slim jar',5000,40),
(5, 'Portable Jar',2 ,'bottle.jpg',50, 'Very portable jar',7000,10),
(6, 'Waterproff Jar',5 ,'bottle1.1.jpg',200, 'Very water proofed jar',4000,40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
