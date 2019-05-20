-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2019 at 03:54 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(2, 'Beds'),
(4, 'Wardrobes'),
(26, 'Sofas'),
(30, 'Dining Tables');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `enquiry_id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `staff_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`enquiry_id`, `fullname`, `email`, `contact`, `message`, `status`, `staff_id`) VALUES
(4, 'Ramesh Thakur', 'rameshthapa@example.com', '123456', 'ramesh thakur wants wardrobe ramesh thakur wants wardrobe ramesh thakur wants wardrobe ', 'Completed', 1),
(5, 'Arjun Upreti', 'arjun@upreti.thapa', '123456789', 'Hello I am arjun upreti I want to know about the kinds of wardrobes that you have.', 'Completed', 13),
(6, 'Ram', 'Chandra@ram.com', '981654651', 'Do you have new sofas?', 'Pending', 0);

-- --------------------------------------------------------

--
-- Table structure for table `furniture`
--

CREATE TABLE `furniture` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) DEFAULT NULL,
  `availability` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_posted` datetime NOT NULL,
  `categoryId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `furniture`
--

INSERT INTO `furniture` (`id`, `name`, `description`, `price`, `availability`, `status`, `date_posted`, `categoryId`) VALUES
(17, 'Charmcorner Sofas', 'Prepare your senses for the inviting and indulging Charm range. A collection that includes a seat for every situation, itâ€™s also a range that gives you the power to create.', '1099.00', 'Available', 'Brand New', '2019-02-23 18:34:22', 26),
(18, 'Four Seater Sofas', 'Four seater sofas available in wide range of colours. These stay warm and are perfect for sitting in the winter.', '999.00', 'Available', 'Brand New', '2019-02-23 18:35:44', 26),
(19, 'Soft Left Arm Sofa', 'This is a second hand unit but nothing like one. Get this sofa at an unbeatable price from our store.', '500.00', 'Available', 'Second Hand', '2019-02-23 18:37:37', 26),
(20, 'Wooden Wardrobe', 'Brand new Wooden Wardrobe with three doors and drawers. Will fit in all your clothes and other wardrobe items as it is a big one.', '599.00', 'Available', 'Brand New', '2019-02-24 03:12:19', 4),
(21, 'Four Poster', 'Four Poster double bed.', '1599.00', 'Available', 'Brand New', '2019-02-24 03:13:06', 2),
(22, 'Second Hand Sofa', 'Second hand sofa set for sale. ', '399.00', 'Available', 'Second Hand', '2019-02-24 03:14:03', 26),
(23, 'Three Seater Red', 'Three Seater Red sofa set. Is very durable. ', '999.00', 'Available', 'Brand New', '2019-02-24 03:15:26', 26),
(24, 'Large Size Beds', 'All new large sized beds just arrived. Buy these luxury beds for your family. ', '2199.00', 'Available', 'Brand New', '2019-02-24 03:17:35', 2),
(25, 'Dining Tables', 'Brand new Dining Tables selling out fast. Come soon to get one yourself.', '499.00', 'Available', 'Brand New', '2019-02-24 03:29:35', 30),
(26, 'Yellow Sofa', 'Brand new yellow Sofa.', '899.00', 'Available', 'Brand New', '2019-02-24 03:31:15', 26),
(27, 'Classy Wardrobe', 'Classy Wooden Wardrobe that makes your room shine. Available in black, white and wooden colours.', '1099.00', 'Available', 'Brand New', '2019-02-24 03:38:34', 4),
(28, 'Standard Double Bed', 'Standard double bed. Second hand material but is in good condition.', '599.00', 'Available', 'Second Hand', '2019-02-24 04:00:56', 2),
(29, 'Second Hand Bed', 'Second hand double bed.', '899.00', 'Available', 'Second Hand', '2019-02-24 04:01:42', 2),
(30, 'Wardrobe', 'Second hand wardrobes for sale at just Â£299.', '299.00', 'Available', 'Second Hand', '2019-02-24 04:04:22', 4);

-- --------------------------------------------------------

--
-- Table structure for table `furniture_images`
--

CREATE TABLE `furniture_images` (
  `furniture_image_id` int(11) NOT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `furniture_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `furniture_images`
--

INSERT INTO `furniture_images` (`furniture_image_id`, `path`, `furniture_id`) VALUES
(26, 'images/furniture/1553524658.8063charmcorner.jpg', 17),
(27, 'images/furniture/1553524658.8112charmcorner2.jpg', 17),
(39, 'images/furniture/1553525048.691sofaleftarm.jpg', 19),
(40, 'images/furniture/1553525798.613210.jpg', 21),
(49, 'images/furniture/1553525877.7374classywardrobe.jpeg', 20),
(50, 'images/furniture/1553525877.7411classywardrobe2.jpg', 20),
(51, 'images/furniture/1553525877.7446classywardrobe3.jpeg', 20),
(52, 'images/furniture/1553525877.7477classywardrobe4.jpeg', 20),
(53, 'images/furniture/1553525897.723412.jpg', 22),
(54, 'images/furniture/1553525907.8812redsofa1.jpg', 23),
(55, 'images/furniture/1553525907.8842redsofa2.jpg', 23),
(56, 'images/furniture/1553525907.8882redsofa3.jpg', 23),
(57, 'images/furniture/1553525907.8911redsofa4.jpg', 23),
(58, 'images/furniture/1553525926.3123bed4.jpg', 24),
(59, 'images/furniture/1553525926.3158bed5.jpg', 24),
(60, 'images/furniture/1553525926.319beds.jpg', 24),
(61, 'images/furniture/1553525942.5052diningtable1.jpg', 25),
(62, 'images/furniture/1553525942.5104diningtable2.jpg', 25),
(63, 'images/furniture/1553525942.5143diningtable3.jpg', 25),
(64, 'images/furniture/1553525942.5174diningtable4.jpg', 25),
(65, 'images/furniture/1553525950.7508sofa1.jpg', 26),
(66, 'images/furniture/1553525965.5193classywardrobe.jpeg', 27),
(67, 'images/furniture/1553525965.5227classywardrobe2.jpg', 27),
(68, 'images/furniture/1553525965.5257classywardrobe3.jpeg', 27),
(69, 'images/furniture/1553525965.5287classywardrobe4.jpeg', 27),
(70, 'images/furniture/1553525990.60641.jpg', 28),
(71, 'images/furniture/1553525990.6109bed1.jpg', 28),
(72, 'images/furniture/1553525990.6159bedimage.jpg', 28),
(73, 'images/furniture/1553526003.5927secondhandbed1.JPG', 29),
(74, 'images/furniture/1553526003.5968secondhandbed2.jpg', 29),
(75, 'images/furniture/1553526003.6005secondhandbed3.jpg', 29),
(76, 'images/furniture/1553526003.6039secondhandbed4.jpg', 29),
(81, 'images/furniture/1553527139.1409similarsofa1.jpg', 18),
(82, 'images/furniture/1553527139.144similarsofa2.jpg', 18),
(83, 'images/furniture/1553527139.147similarsofa3.jpg', 18),
(84, 'images/furniture/1553527139.1497similarsofa4.jpg', 18),
(85, 'images/furniture/1553527139.1528similarsofa5.jpg', 18),
(86, 'images/furniture/1553527147.2786wardrobe.jpg', 30);

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `update_id` int(5) NOT NULL,
  `date_posted` datetime NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`update_id`, `date_posted`, `title`, `description`, `image`) VALUES
(7, '2019-02-24 04:21:38', 'First Update', 'Hello. This is Fran\'s furniture. I am testing the add update feature and this is the first update I am posting to this system.    ', 'logo.png'),
(8, '2019-02-24 04:32:19', 'MEGA SALE', 'We are offering a mega sale in the coming month. The sale starts from 1st March 2019 and lasts upto 7th. We will be providing heavy discounts on products as much as 70%. You will get at least 25% discount on any product.', 'sale.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(5) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `type`, `name`, `username`, `password`) VALUES
(1, 'super', 'Administrator', 'admin', '$2y$10$9MFOMIlZgtkx5j6e2idG7e/A9pbBeu5hjHxqaoxoXp5G/gybmzzjG'),
(2, 'staff', 'Anil Upreti', 'anilupreti', '$2y$10$3kfX43LPMqbMICIJBSXh1.v2tJF5ekQqyWXa/Y7HM6AttYoCZsCiq'),
(4, 'staff', 'Ramesh Thapa', 'rthapa123', '$2y$10$Qhvy.RuGHIIKfBdkJdKZBOxl5Jh2CvAh1XdZTW05TIXo386Q1qkoy'),
(13, 'staff', 'Diwas Lamsal', 'diwaslamsal', '$2y$10$7FDGziwr2UucgO9Z03EwF.2dHKbcX.yEf0zeeGweh56OGAc14sRSq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`enquiry_id`);

--
-- Indexes for table `furniture`
--
ALTER TABLE `furniture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `furniture_images`
--
ALTER TABLE `furniture_images`
  ADD PRIMARY KEY (`furniture_image_id`),
  ADD KEY `fk_fi_furnitures` (`furniture_id`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`update_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `enquiry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `furniture`
--
ALTER TABLE `furniture`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `furniture_images`
--
ALTER TABLE `furniture_images`
  MODIFY `furniture_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `update_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `furniture`
--
ALTER TABLE `furniture`
  ADD CONSTRAINT `fk_f_categories` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`);

--
-- Constraints for table `furniture_images`
--
ALTER TABLE `furniture_images`
  ADD CONSTRAINT `fk_fi_furnitures` FOREIGN KEY (`furniture_id`) REFERENCES `furniture` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
