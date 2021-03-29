-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2021 at 06:05 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_aakrut`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `Product_Id` int(20) NOT NULL,
  `Product_Name` varchar(100) NOT NULL,
  `Product_Img` varchar(200) NOT NULL,
  `Region` varchar(100) NOT NULL,
  `College_Name` varchar(200) NOT NULL,
  `Branch` varchar(50) NOT NULL,
  `Semester` int(10) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Price` int(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Description` text NOT NULL,
  `Date_Added` timestamp NOT NULL DEFAULT current_timestamp(),
  `Is_Sell` tinyint(1) NOT NULL,
  `Email_Id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_Id`, `Product_Name`, `Product_Img`, `Region`, `College_Name`, `Branch`, `Semester`, `Subject`, `Price`, `Type`, `Description`, `Date_Added`, `Is_Sell`, `Email_Id`) VALUES
(3, 'Networking book', 'prod_3.jpg', '3', '30', 'Information Technology', 3, 'Computer Networks', 400, 'Study Material', 'Information technology reference book', '2020-03-15 14:52:34', 0, 'spol421@gmail.com'),
(6, 'Eraser', 'prod_6.jpg', '2', '31', 'Mechanical Engineering', 1, 'Communication Skills', 50, 'Stationary', 'Eraser', '2020-03-15 17:43:12', 0, 'shreya@gmail.com'),
(7, 'Refrence book', 'prod_7.jpg', '1', '6', 'Automobile', 1, 'Structured Programming Approach', 400, 'Reference Books', 'ldkhff leirhvkewjfbvwekv owerhvlwejnv', '2020-03-15 17:46:55', 0, 'aryan@gmail.com'),
(8, 'SOM1', 'prod_8.jpg', '1', '9', 'Mechanical Engineering', 5, 'Machine Design I', 550, 'Study Material', 'sdfsdvsdvsdv', '2021-02-07 16:30:22', 0, 'spol421@gmail.com'),
(9, 'TOM', 'prod_9.jpg', '1', '5', 'Mechanical Engineering', 2, 'Thermodynamics', 600, 'Study Material', 'dfgdfgdfgdfg', '2021-02-07 16:31:05', 0, 'spol421@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `Service_Id` int(20) NOT NULL,
  `Service_Type` varchar(50) NOT NULL,
  `Region` varchar(50) NOT NULL,
  `College` varchar(100) NOT NULL,
  `Branch` varchar(200) NOT NULL,
  `College_Id` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Date_Time` timestamp NOT NULL DEFAULT current_timestamp(),
  `Email_Id` varchar(200) NOT NULL,
  `User_Name` varchar(200) NOT NULL,
  `User_Mobile` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Service_Id`, `Service_Type`, `Region`, `College`, `Branch`, `College_Id`, `Description`, `Date_Time`, `Email_Id`, `User_Name`, `User_Mobile`) VALUES
(15, 'Mini Project', '2', 'SCHOOL OF TECHNOLOGY, CHHATRAPATI SHIVAJI MAHARAJ UNIVERSITY - [CSMU], NAVI MUMBAI', '', 51, 'sdsd', '2020-09-23 15:33:41', 'spol421@gmail.com', 'fghfgh', 8989898989),
(17, 'Final Year Project', '2', 'SCHOOL OF TECHNOLOGY, CHHATRAPATI SHIVAJI MAHARAJ UNIVERSITY - [CSMU], NAVI MUMBAI', '', 51, 'asas', '2020-09-23 15:35:43', 'spol421@gmail.com', 'shubham', 8958586969),
(19, 'Final Year Project', '1', 'SHIVAJIRAO S. JONDHLE COLLEGE OF ENGINEERING AND TECHNOLOGY,ASANGAON', '', 22, 'sdsd', '2020-09-23 15:37:55', 'spol421@gmail.com', 'shubham', 8747586915),
(22, 'Mini Project', '2', 'DY PATIL UNIVERSITY, NAVI MUMBAI', '', 41, 'mini project', '2020-09-23 15:42:46', 'abc@gmail.com', 'aryan', 7968458965),
(23, 'Final Year Project', '2', 'SCHOOL OF TECHNOLOGY, CHHATRAPATI SHIVAJI MAHARAJ UNIVERSITY - [CSMU], NAVI MUMBAI', '', 51, 'asasf', '2020-10-06 16:02:10', 'spol421@gmail.com', 'shubham', 12345678900);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `User_Id` int(20) NOT NULL,
  `User_Name` varchar(50) NOT NULL,
  `Email_Id` varchar(100) NOT NULL,
  `Password` varchar(16) NOT NULL,
  `Mobile_No` bigint(11) NOT NULL,
  `Verified` tinyint(1) NOT NULL DEFAULT 0,
  `Date_Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`User_Id`, `User_Name`, `Email_Id`, `Password`, `Mobile_No`, `Verified`, `Date_Time`) VALUES
(2, 'Aryan', 'aryan@gmail.com', '1234', 8541212569, 0, '2020-02-09 09:23:51'),
(11, 'shubham', 'spol4212@gmail.com', '', 8286148258, 0, '2020-12-05 16:58:20'),
(19, 'shubham', 'spol421@gmail.com', '123456', 8286148258, 0, '2021-01-31 13:59:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_product`
--

CREATE TABLE `user_product` (
  `User_Id` int(20) NOT NULL,
  `Product_Id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_service`
--

CREATE TABLE `user_service` (
  `User_Id` int(20) NOT NULL,
  `Service_Id` int(20) NOT NULL,
  `Email_Id` varchar(200) NOT NULL,
  `User_Name` varchar(200) NOT NULL,
  `User_Mobile` int(11) NOT NULL,
  `Service_Type` varchar(200) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Region` varchar(200) NOT NULL,
  `College_Name` varchar(200) NOT NULL,
  `College_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`Product_Id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`Service_Id`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`User_Id`),
  ADD UNIQUE KEY `Email_Id` (`Email_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `User_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
