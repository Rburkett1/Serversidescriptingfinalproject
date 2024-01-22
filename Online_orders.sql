-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 28, 2022 at 01:21 AM
-- Server version: 5.7.34
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Online_orders`
--

-- --------------------------------------------------------

--
-- Table structure for table `CustomerInfo`
--

CREATE TABLE `CustomerInfo` (
  `id` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Email` text NOT NULL,
  `Pnumber` text NOT NULL,
  `Username` text NOT NULL,
  `Password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CustomerInfo`
--

INSERT INTO `CustomerInfo` (`id`, `Name`, `Email`, `Pnumber`, `Username`, `Password`) VALUES
(19, 'Jimmy Hoffa', 'jhoffa@gmail.com', '234-654-3456', 'jhoffa', '$2y$10$.gKVn9zvA2d.XITP5s9FxuSG6q64I0WumJfGROcxdMtVHMCquEKBa'),
(21, 'Ryan Burkett', 'burkett@gmail.com', '321-000-0000', 'Rburks', '$2y$10$nr9le21X82cU/XGZCIbbBOBH66cUpvdj9ElsvM6Y6oWKOGOMxr60i');

-- --------------------------------------------------------

--
-- Table structure for table `CustomerOrders`
--

CREATE TABLE `CustomerOrders` (
  `id` int(11) NOT NULL,
  `Apps` text NOT NULL,
  `Entree` text NOT NULL,
  `Dessert` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `CustomerOrders`
--

INSERT INTO `CustomerOrders` (`id`, `Apps`, `Entree`, `Dessert`) VALUES
(18, 'Mozzerella Sticks', 'Chicken Parm', 'flawn'),
(19, 'Mozzerella Sticks', 'Salmon', 'Tiramisu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `CustomerInfo`
--
ALTER TABLE `CustomerInfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `CustomerOrders`
--
ALTER TABLE `CustomerOrders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `CustomerInfo`
--
ALTER TABLE `CustomerInfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `CustomerOrders`
--
ALTER TABLE `CustomerOrders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
