-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2023 at 06:55 AM
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
-- Database: `wishlist_website`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `User_id` varchar(20) NOT NULL,
  `Salary` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `Basket_id` int(11) NOT NULL,
  `User_id` varchar(20) NOT NULL,
  `Basket_value` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `calculates`
--

CREATE TABLE `calculates` (
  `Total_id` int(11) NOT NULL,
  `Basket_id` int(11) NOT NULL,
  `Website_domain` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `Coupon_id` int(11) NOT NULL,
  `Value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `edit`
--

CREATE TABLE `edit` (
  `User_id` varchar(20) NOT NULL,
  `Wishlist_id` int(11) NOT NULL,
  `Item_number` int(11) NOT NULL,
  `Category_id` int(11) NOT NULL,
  `produce` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `end_user`
--

CREATE TABLE `end_user` (
  `User_id` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `Item_number` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Due_date` date DEFAULT NULL,
  `Link` varchar(300) NOT NULL,
  `Description` varchar(300) DEFAULT NULL,
  `Item_category` int(11) DEFAULT NULL,
  `Website_domain` varchar(30) DEFAULT NULL,
  `Wishlist_id` int(11) NOT NULL,
  `Basket_id` int(11) DEFAULT NULL,
  `Price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `Category_id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `master_user`
--

CREATE TABLE `master_user` (
  `User_id` varchar(20) NOT NULL,
  `Email_address` varchar(20) DEFAULT NULL,
  `Display_name` varchar(20) NOT NULL,
  `User_address` varchar(30) DEFAULT NULL,
  `Phone_number` char(10) DEFAULT NULL,
  `User_password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `moderates`
--

CREATE TABLE `moderates` (
  `Admin_id` varchar(20) NOT NULL,
  `User_id` varchar(20) NOT NULL,
  `Item_number` int(11) NOT NULL,
  `Wishlist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipient`
--

CREATE TABLE `recipient` (
  `Wishlist_id` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

CREATE TABLE `total` (
  `Total_id` int(11) NOT NULL,
  `Basket_id` int(11) NOT NULL,
  `User_id` varchar(20) NOT NULL,
  `Total_value` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `User_id` varchar(20) NOT NULL,
  `Website_domain` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `website`
--

CREATE TABLE `website` (
  `Website_domain` varchar(30) NOT NULL,
  `Shipping_cost` decimal(10,2) DEFAULT NULL,
  `Coupons` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `Wishlist_id` int(11) NOT NULL,
  `Wishlist_name` varchar(20) NOT NULL,
  `Owner_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`Basket_id`,`User_id`),
  ADD KEY `BASKETENDUSERFK` (`User_id`);

--
-- Indexes for table `calculates`
--
ALTER TABLE `calculates`
  ADD PRIMARY KEY (`Total_id`,`Basket_id`,`Website_domain`),
  ADD KEY `CALCULATEBASKETFK` (`Basket_id`),
  ADD KEY `CALCULATEWEBSITEFK` (`Website_domain`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`Coupon_id`);

--
-- Indexes for table `edit`
--
ALTER TABLE `edit`
  ADD PRIMARY KEY (`User_id`,`Wishlist_id`,`Item_number`,`Category_id`),
  ADD KEY `EDITWISHLISTFK` (`Wishlist_id`),
  ADD KEY `EDITITEMFK` (`Item_number`),
  ADD KEY `EDITCATEGORYFK` (`Category_id`);

--
-- Indexes for table `end_user`
--
ALTER TABLE `end_user`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`Item_number`,`Wishlist_id`),
  ADD UNIQUE KEY `Link` (`Link`),
  ADD KEY `ITEMCATEGORYFK` (`Item_category`),
  ADD KEY `ITEMWEBSITEFK` (`Website_domain`),
  ADD KEY `ITEMWISHLISTFK` (`Wishlist_id`),
  ADD KEY `ITEMBASKETFK` (`Basket_id`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `master_user`
--
ALTER TABLE `master_user`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `moderates`
--
ALTER TABLE `moderates`
  ADD PRIMARY KEY (`Admin_id`,`User_id`,`Item_number`,`Wishlist_id`),
  ADD KEY `MODERATEENDUSERFK` (`User_id`),
  ADD KEY `MODERATEITEMFK` (`Item_number`),
  ADD KEY `MODERATEWISHLISTFK` (`Wishlist_id`);

--
-- Indexes for table `recipient`
--
ALTER TABLE `recipient`
  ADD PRIMARY KEY (`Wishlist_id`);

--
-- Indexes for table `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`Total_id`,`Basket_id`,`User_id`),
  ADD KEY `TOTALBASKETFK` (`Basket_id`),
  ADD KEY `TOTALENDUSERFK` (`User_id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`User_id`,`Website_domain`),
  ADD KEY `VISISTSWEBSITEFK` (`Website_domain`);

--
-- Indexes for table `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`Website_domain`),
  ADD KEY `WEBSITECOUPONFK` (`Coupons`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`Wishlist_id`,`Owner_id`),
  ADD KEY `WISHLISTUSERFK` (`Owner_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `USERADMINFK` FOREIGN KEY (`User_id`) REFERENCES `master_user` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `BASKETENDUSERFK` FOREIGN KEY (`User_id`) REFERENCES `end_user` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `calculates`
--
ALTER TABLE `calculates`
  ADD CONSTRAINT `CALCULATEBASKETFK` FOREIGN KEY (`Basket_id`) REFERENCES `basket` (`Basket_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CALCULATETOTALFK` FOREIGN KEY (`Total_id`) REFERENCES `total` (`Total_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `CALCULATEWEBSITEFK` FOREIGN KEY (`Website_domain`) REFERENCES `website` (`Website_domain`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `edit`
--
ALTER TABLE `edit`
  ADD CONSTRAINT `EDITCATEGORYFK` FOREIGN KEY (`Category_id`) REFERENCES `item_category` (`Category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `EDITENDUSERFK` FOREIGN KEY (`User_id`) REFERENCES `end_user` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `EDITITEMFK` FOREIGN KEY (`Item_number`) REFERENCES `item` (`Item_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `EDITWISHLISTFK` FOREIGN KEY (`Wishlist_id`) REFERENCES `wishlist` (`Wishlist_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `end_user`
--
ALTER TABLE `end_user`
  ADD CONSTRAINT `ENDUSERFK` FOREIGN KEY (`User_id`) REFERENCES `master_user` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `ITEMBASKETFK` FOREIGN KEY (`Basket_id`) REFERENCES `basket` (`Basket_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `ITEMCATEGORYFK` FOREIGN KEY (`Item_category`) REFERENCES `item_category` (`Category_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `ITEMWEBSITEFK` FOREIGN KEY (`Website_domain`) REFERENCES `website` (`Website_domain`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `ITEMWISHLISTFK` FOREIGN KEY (`Wishlist_id`) REFERENCES `wishlist` (`Wishlist_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moderates`
--
ALTER TABLE `moderates`
  ADD CONSTRAINT `MODERATEADMINFK` FOREIGN KEY (`Admin_id`) REFERENCES `admin` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `MODERATEENDUSERFK` FOREIGN KEY (`User_id`) REFERENCES `end_user` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `MODERATEITEMFK` FOREIGN KEY (`Item_number`) REFERENCES `item` (`Item_number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `MODERATEWISHLISTFK` FOREIGN KEY (`Wishlist_id`) REFERENCES `wishlist` (`Wishlist_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recipient`
--
ALTER TABLE `recipient`
  ADD CONSTRAINT `RECIPIENTWISHLISTFK` FOREIGN KEY (`Wishlist_id`) REFERENCES `wishlist` (`Wishlist_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `total`
--
ALTER TABLE `total`
  ADD CONSTRAINT `TOTALBASKETFK` FOREIGN KEY (`Basket_id`) REFERENCES `basket` (`Basket_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `TOTALENDUSERFK` FOREIGN KEY (`User_id`) REFERENCES `end_user` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visits`
--
ALTER TABLE `visits`
  ADD CONSTRAINT `VISISTSWEBSITEFK` FOREIGN KEY (`Website_domain`) REFERENCES `website` (`Website_domain`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `VISITSENDUSERFK` FOREIGN KEY (`User_id`) REFERENCES `end_user` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `website`
--
ALTER TABLE `website`
  ADD CONSTRAINT `WEBSITECOUPONFK` FOREIGN KEY (`Coupons`) REFERENCES `coupons` (`Coupon_id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `WISHLISTUSERFK` FOREIGN KEY (`Owner_id`) REFERENCES `master_user` (`User_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
