-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2021 at 09:51 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bep5prw5jz4yqcnr9a0w`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `first_name`, `last_name`, `email`, `phone`, `password`) VALUES
(1, 'First', 'omondi', 'djack@test.com', '0729170437', '$2y$10$Dp9ehVEj4VNu8NlEIKkznemh68tfJOEVBDa9uJEeVZ/dFm9uyYmeS');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `first_name`, `last_name`, `email`, `phone`, `county`, `city`, `date_of_birth`, `profile_pic`, `password`) VALUES
(1, 'Sam', 'ace', 'djack009@test.com', '0729170437', 'Mombasa', 'mombasa', '2020-12-24', '../profile-pics/default-profile.png', '$2y$10$Q478wTPEwVnulrzwWUKx5.Uy6LydYMHpHtDL3rF5Gj0wQIHbvRDvm');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `sales_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `quantity_of_purchase` int(11) NOT NULL,
  `date_of_purchase` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `item_category` varchar(255) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_pic` varchar(255) NOT NULL,
  `item_quantity` int(11) NOT NULL DEFAULT 0,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `seller_id` int(11) NOT NULL,
  `seller_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`, `item_category`, `item_price`, `item_pic`, `item_quantity`, `created_on`, `seller_id`, `seller_name`) VALUES
(6, 'banana', 'Leafy greens', 788, '5fd8d99c0446c5.42555429.jpg', 8, '2020-12-15 00:00:00', 13, 'Sam Test'),
(7, 'tomatoes', 'Edible plants', 500, '5fd8de44de9ab6.99388161.jpg', 5, '2020-12-15 00:00:00', 13, 'Sam Test'),
(8, 'banana', 'Cruferous', 300, '5fd99522708ff6.24988073.jpg', 3, '2020-12-16 00:00:00', 15, 'jace ace'),
(9, 'peaches', 'Cruferous', 500, '5fd99e20bffcd8.25321942.jpg', 15, '2020-12-16 00:00:00', 15, 'jace ace'),
(10, 'strawberry', 'Cruferous', 545, '5fd99e3e8706d3.48258780.jpg', 15, '2020-12-16 00:00:00', 15, 'jace ace'),
(12, 'Carrots', 'Leafy greens', 450, '5fdb08627d6123.04967759.jpg', 34, '2020-12-17 00:00:00', 13, 'Sam Test'),
(13, 'Puchi puchi', 'Marrow', 400, '5fdb4e18380297.52091418.jpg', 15, '2020-12-17 00:00:00', 16, 'New person'),
(14, 'Fresh stuff', 'Leafy greens', 550, '5fdb4f04708184.52047459.jpg', 12, '2020-12-17 00:00:00', 17, 'Another test Mtu');

-- --------------------------------------------------------

--
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `seller_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`seller_id`, `first_name`, `last_name`, `email`, `phone`, `county`, `city`, `date_of_birth`, `profile_pic`, `password`) VALUES
(13, 'Sam', 'Test', 'sam@test.com', '0729170437', 'Mombasa', 'mombasa', '2020-11-29', '../profile-pics/default-profile.png', '$2y$10$pnfOiID9ilY.A2FMqZnt7eWVklIctDzmfQP6l9IrF5zCsd8Fzbotq'),
(15, 'jace', 'ace', 'djack009@test.com', '0712345698', 'Mombasa', 'mombasa', '1999-07-08', '../profile-pics/default-profile.png', '$2y$10$3rZoIo6UPkVW6xfh2fCBwesBnXPbxgJ4Ffz6.6UD9a2nzcjfr578a'),
(16, 'New', 'person', 'sammy@test.com', '0712354689', 'Nairobi', 'Nairobi', '1998-07-15', '../profile-pics/default-profile.png', '$2y$10$uUL2ZoFC/DKr1rv4K.MaB.4Tu0USZWN5HWHaUelWQXgmdk6zTsbZi'),
(17, 'Another test', 'Mtu', 'sammy01@test.com', '0798765765', 'Nakuru', 'Mutei', '1985-06-19', '../profile-pics/default-profile.png', '$2y$10$0Lyj1yf0.h4c8vtdzpysEO6oIJZvy6O6ialm34ozOnv9YUSu3D966'),
(18, 'Mason', 'Jace', 'sammy02@test.com', '0798765765', 'Nakuru', 'Mutei', '0000-00-00', '../profile-pics/default-profile.png', '$2y$10$lJzz9FiFHpU9NHdX0YYZEuJ.Jp3HT/A88kBtqN/JpUBgjZFJqM6Ru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`sales_id`),
  ADD KEY `customer_id` (`customer_id`,`seller_id`,`item_id`),
  ADD KEY `seller_id` (`seller_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `seller_id` (`seller_id`);

--
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`seller_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `seller_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_5` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_ibfk_6` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_ibfk_7` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`seller_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
