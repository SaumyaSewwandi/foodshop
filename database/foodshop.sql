-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2022 at 04:59 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Breakfast'),
(2, 'Chinese'),
(3, 'Indian'),
(4, 'Pizza'),
(8, 'Drinks');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `quantity` float NOT NULL,
  `price` int(11) NOT NULL,
  `status` binary(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `item_name`, `quantity`, `price`, `status`) VALUES
(1, 'Milk Rice', 1, 150, 0x31),
(1, 'Hoppers', 3, 160, 0x31),
(2, 'String hoppers', 1, 170, 0x31),
(2, 'Milk Rice', 1, 150, 0x31),
(3, 'Hoppers', 1, 50, 0x31),
(3, 'Milk Rice', 1, 150, 0x31),
(4, 'Milk Rice', 1, 150, 0x31),
(4, 'Hoppers', 3, 50, 0x31),
(4, 'Orange juice', 1, 120, 0x31),
(5, 'Milk Rice', 1, 150, 0x31),
(5, 'Hoppers', 3, 50, 0x31),
(5, 'Orange juice', 2, 120, 0x31),
(6, 'Milk Rice', 1, 150, 0x31),
(6, 'Hoppers', 3, 50, 0x31),
(6, 'orange', 1, 120, 0x31),
(7, 'Milk Rice', 1, 150, 0x31),
(7, 'Hoppers', 3, 50, 0x31),
(7, 'orange', 1, 120, 0x31);

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `order_id` int(100) NOT NULL,
  `Total_price` float NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`order_id`, `Total_price`, `date`) VALUES
(1, 630, '2022-07-31'),
(2, 320, '2022-07-31'),
(3, 200, '2022-07-31'),
(4, 420, '2022-07-31'),
(5, 540, '2022-07-31'),
(6, 420, '2022-08-01'),
(7, 420, '2022-08-01');

-- --------------------------------------------------------

--
-- Table structure for table `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `category_id` int(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL DEFAULT 0,
  `img_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0= unavailable, 1 Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_list`
--

INSERT INTO `product_list` (`id`, `category_id`, `name`, `description`, `price`, `img_path`, `status`) VALUES
(1, 1, 'Milk Rice', 'A bit like a savoury rice pudding, kiribath is made by boiling white or brown kakulu rice ', 150, 'shutterstock_514422628-e1527484322874.jpg', 1),
(2, 1, 'Hoppers', 'Have it with an egg, curry and sambol, or with treacle and banana for a sweet treat.', 50, 'Intrepid-Travel-sri-lanka_egg-hoppers.jpg', 1),
(6, 1, 'String hoppers', 'Locals usually mix in some Pol Sambal, freshly grated coconut, chilli and red onion', 150, 'shutterstock_438528970-e1527484261808.jpg', 1),
(7, 3, 'Masala dosa', 'Rice is a staple of south Indian cuisine and is used in most dishes, including the finger-licking masala dosa. ', 200, 'masala-dosa-with-chutney-sauce-and-sambar-india.webp', 0),
(8, 4, 'Pizza', 'usually round, flat base of leavened wheat-based dough topped with tomatoes, cheese, sausage, anchovies, mushrooms, onions, olives, vegetables, meat, ham, etc.', 999, 'Eq_it-na_pizza-margherita_sep2005_sml.jpg', 0),
(15, 8, 'orange', 'simply squeezing fresh-picked oranges and pouring the juice into bottles or cartons', 120, 'AdobeStock_118835355-scaled.jpeg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `role` enum('waiter','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `email`, `username`, `password`, `mobile`, `role`) VALUES
(1, 'saumya', 'saumya@gmail.com', 'saumya', '81dc9bdb52d04dc20036dbd8313ed055', '0774563452', 'admin'),
(2, 'Saumya', 'sa@gmail.com', 'saumya', 'e2fc714c4727ee9395f324cd2e7f331f', '0774561231', 'waiter');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
