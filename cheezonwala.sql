-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2019 at 09:51 AM
-- Server version: 10.1.40-MariaDB
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
-- Database: `cheezonwala`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `password`) VALUES
(2, 'admin@cheezonwala.com', '1234'),
(5, 'admin', '123'),
(8, 'admin@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_brand` varchar(255) NOT NULL,
  `cat_tag` varchar(255) NOT NULL,
  `cat_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_brand`, `cat_tag`, `cat_type`) VALUES
(9, 'polo', 'summer', 'shirt'),
(10, 'denim', 'all', 'Jeans'),
(11, 'local', 'summer', 'Shoes'),
(12, 'supreme', 'all', 'shoes'),
(13, 'Loafers', 'Summer', 'Shoes'),
(15, 'Nike', 'Winter', 'Shoes'),
(17, 'nike', 'summer', 'shoes'),
(18, 'nike', 'summer', 'shoes');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_subject` varchar(255) NOT NULL,
  `c_message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(250) NOT NULL,
  `c_email` varchar(250) NOT NULL,
  `c_contact_no` int(11) NOT NULL,
  `c_zip_code` int(11) NOT NULL,
  `c_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `c_name`, `c_email`, `c_contact_no`, `c_zip_code`, `c_address`) VALUES
(1, 'Saqib Ali', 'saqibali80400@gmail.com', 900786010, 70600, 'A-2028 Karachi'),
(2, 'Saqib Ali', 'saqibali80400@gmail.com', 900786010, 70600, 'A-2028 Karachi'),
(3, 'Saqib Ali', 'saqibali80400@gmail.com', 900786010, 70600, 'A-2028 Karachi'),
(4, 'Saqib Ali', 'saqibali80400@gmail.com', 900786010, 70600, 'A-2028 Karachi'),
(6, 'Saqib Ali', 'saqibali80400@gmail.com', 900786010, 70600, 'A-2028 Karachi'),
(7, 'Saqib Ali', 'saqibali80400@gmail.com', 900786010, 70600, 'A-2028 Karachi'),
(8, 'Saqib Ali', 'saqibali80400@gmail.com', 900786010, 70600, 'A-2028 Karachi'),
(9, 'Saqib Ali', 'saqibali80400@gmail.com', 900786010, 70600, 'A-2028 Karachi'),
(10, 'Saqib Ali', 'saqibali80400@gmail.com', 900786010, 70600, 'A-2028 Karachi'),
(11, 'Saqib Ali', 'saqibali80400@gmail.com', 900786010, 70600, 'A-2028 Karachi'),
(45, 'shahzaib', 'shahzaib@gmail.com', 2147483647, 435345, 'B-99'),
(46, 's', 's@gmail.com', 342, 32423, 's'),
(47, 'shahzaib', 'shahzaib@gmail.com', 324423, 2342, 'B-99'),
(48, 's', 's@gmail.com', 3423423, 34234, 'B-99'),
(49, 's', 's@gmail.com', 234234, 234234, 'asdasd'),
(50, 's', 's@gmail.com', 234, 234234, '34'),
(51, 's', 's@gmail.com', 32424, 23423, 'B-99'),
(52, 'shahzaib', 'shahzaib@gmail.com', 2147483647, 75010, 'B-99'),
(53, 'shahzaib', 's@gmail.com', 9043, 990, 'b-99'),
(54, 'sd', 's@gmail.com', 4353453, 345345, 'wer'),
(55, 'shahzaib', 'shahzaib@gmail.com', 340, 89890, 'b-99'),
(56, 'sa', 'sad@gmail.com', 234324, 324234, '3423'),
(57, 'shahzaib', 's@gmail.com', 2147483647, 23232, 'abc'),
(58, 'shahzaib', 's@gmail.com', 23423423, 4535, 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `p_name` varchar(250) NOT NULL,
  `details` varchar(250) NOT NULL,
  `time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `price` varchar(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `p_name`, `details`, `time`, `price`, `c_id`) VALUES
(64, 'Gold and black Nike sneakers', 'Good quality. comfortable stuff', '2019-07-08 06:23:23', '2099', 53),
(65, 'Black denim mens narrow jeans', 'Easy to wear and comfortable. Good Quality', '2019-07-08 06:24:01', '999', 54),
(66, ' Womens name printed sweatshirt', ' Easy to wear and comfortable. Good Quality', '2019-07-08 06:30:43', '799', 55),
(67, 'Mens nike t-shirt half sleeves', 'Grey color. 100% cotton', '2019-07-08 06:31:12', '500', 56),
(68, 'Mens nike t-shirt half sleeves', 'Grey color. 100% cotton', '2019-07-10 12:33:30', '500', 57),
(69, 'Brown mens loafers formal shoes', 'Good quality. long lasting', '2019-07-10 12:34:12', '1699', 58);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(555) NOT NULL,
  `details` varchar(555) NOT NULL,
  `image` varchar(700) NOT NULL,
  `price` int(255) NOT NULL,
  `c_price` int(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cat_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `details`, `image`, `price`, `c_price`, `time`, `cat_id`) VALUES
(32, 'Supreme joggers shoes classy', 'red printed. good quality', '1556015282_5.jpg', 2100, 2300, '2019-06-26 22:23:31', '12'),
(33, 'Mens nike t-shirt half sleeves', 'Grey color. 100% cotton', '1556015416_3.jpg', 500, 650, '2019-06-26 21:14:40', '9'),
(35, 'Blue shine material mens formal shoes', 'Good quality. long lasting', '1556015791_2.jpg', 1699, 1750, '2019-06-26 22:30:23', '13'),
(36, 'Brown mens loafers formal shoes', 'Good quality. long lasting', '1556015901_1.jpg', 1699, 1750, '2019-06-26 22:32:55', '13'),
(37, 'Mens formal leather classy shoes', 'Good quality. Suitable for professional meeting', '1556016063_4.jpg', 1499, 1550, '2019-06-26 22:36:05', '11'),
(38, 'Gold and black Nike sneakers', 'Good quality. comfortable stuff', '1556016593_2199.jpg', 2099, 2199, '2019-06-26 22:34:23', '15'),
(39, 'New super sneakers olive color', 'Easy to wear and comfortable', '1556016848_2099.jpg', 2099, 2199, '2019-07-08 11:35:38', '15'),
(40, 'Black denim mens narrow jeans', 'Easy to wear and comfortable. Good Quality', '1556016968_1199.jpg', 999, 1199, '2019-06-26 21:24:48', '10'),
(42, ' Womens name printed sweatshirt', ' Easy to wear and comfortable. Good Quality', '1556017141_799.jpg', 799, 850, '2019-06-26 22:19:34', '11'),
(43, 'Mens formal leather classy shoes', 'Good quality. Suitable for professional meetings', '1556017207_Untitled-1.jpg', 1499, 1550, '2019-06-26 22:35:31', '11'),
(44, 'Mens printed name sweatshirt ', 'Black and maroon color available', '1556017995_799.jpg', 799, 850, '2019-06-26 22:36:52', '9'),
(45, 'Womens name printed hooddies', 'Black and maroon color available', '1556018130_1199.jpg', 1199, 1250, '2019-06-26 22:37:36', '11'),
(46, 'Mens name printed hooddies', 'Black and maroon color available', '1556018247_sadf.jpg', 1199, 1250, '2019-06-26 22:36:27', '12');

-- --------------------------------------------------------

--
-- Table structure for table `product_order`
--

CREATE TABLE `product_order` (
  `product_order_id` int(11) NOT NULL,
  `quantity` varchar(250) NOT NULL,
  `product_order_time` datetime NOT NULL,
  `Order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_order`
--

INSERT INTO `product_order` (`product_order_id`, `quantity`, `product_order_time`, `Order_id`, `product_id`, `customer_id`) VALUES
(3, '1', '2019-07-08 06:23:23', 64, 38, 53),
(4, '1', '2019-07-08 06:24:01', 65, 40, 54),
(5, '1', '2019-07-08 06:30:43', 66, 42, 55),
(6, '1', '2019-07-08 06:31:12', 67, 33, 56),
(7, '1', '2019-07-10 12:33:30', 68, 33, 57),
(8, '1', '2019-07-10 12:34:12', 69, 36, 58);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_order`
--
ALTER TABLE `product_order`
  ADD PRIMARY KEY (`product_order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `product_order`
--
ALTER TABLE `product_order`
  MODIFY `product_order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
