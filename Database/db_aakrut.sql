-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2020 at 02:59 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `Is_Sell` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`Product_Id`, `Product_Name`, `Product_Img`, `Region`, `College_Name`, `Branch`, `Semester`, `Subject`, `Price`, `Type`, `Description`, `Date_Added`, `Is_Sell`) VALUES
(1, 'Techmax Information Technology', 'prod_001.jpg', 'Central', 'KJ Somaiya', 'Information Technology', 3, 'Fundamental Computing', 500, 'Reference Books', 'abcdefghijklmna', '2020-01-29 05:41:22', 0),
(2, 'RRB Mechanical Engineering', 'prod_002.jpg', 'Harbour', 'Viva', 'Mechanical', 6, 'Discrete Mathematics', 11350, 'Reference Books', 'abcjfdfhdsjfdnf', '2020-01-29 05:41:22', 0),
(3, 'Painting and Drawing Tools Set', 'prod_003.jpg', 'Central', 'Kelkar', 'Automobile', 1, 'Auto Cad', 1000, 'Stationary', 'abcdfklehfoibg', '2020-01-29 05:41:22', 0),
(4, 'Flow error and Congestion Control', 'prod_004.jpg', 'Western', 'Rizvi', 'Computer Science', 3, 'Python 3', 210, 'Study Material', 'qwerejfdkml;dmgl;f', '2020-01-29 05:41:22', 0),
(5, 'Data Structure', 'prod_005.jpg', 'Western', 'Thakur', 'Information Technology', 4, 'Data Structure', 896, 'Reference Books', 'abjksdfsdkflsdkjfhsfdlksfldmvldnvkjdsbgfdkjdbgfjsgdkjgkfdjgkjgiuweyrterhjgfdg', '2020-01-29 08:47:41', 0),
(6, 'Strength of Materials', 'prod_006.jpg', 'Harbour', 'Pillai', 'Mechanical ', 8, 'Strength of Materials', 9450, 'Reference Books', 'klafdjdfdsmfd', '2020-01-29 08:47:41', 0),
(7, 'Material Technology', 'prod_007.jpg', 'Trans-Harbour', 'Rodrigues', 'Mechanical ', 7, 'Material Technology', 320, 'Reference Books', 'abcdefghijklmipaftyvwxya', '2020-01-29 08:47:41', 0),
(8, 'Computational Fluid Dynamics', 'prod_008.jpg', 'Central', 'Vishwamatak', 'Automobile ', 5, 'Computational Fluid Dynamics', 740, 'Reference Books', 'abjkxhfuhflds', '2020-01-29 08:47:42', 0),
(13, 'Stapler', 'prod_013.jpg', 'Western', 'Atharva', 'Electrical', 1, 'Electrical vehical  Technology', 850, 'Stationary', 'aklkflkdnf', '2020-01-29 08:53:00', 0),
(14, 'Eraser\'s', 'prod_014.jpg', 'Harbour', 'Amity', 'Electronics and Tele', 2, 'Electromagnetic Engineering', 230, 'Stationary', 'sdf;lsdflds;,;/', '2020-01-29 08:53:00', 0),
(15, 'Highlighter', 'prod_015.jpg', 'Trans-Harbour', 'Datta', 'Instrumentation Engg', 7, 'Analytical Instrumentation', 400, 'Stationary', 'fgfgdf', '2020-01-29 08:53:00', 0),
(16, 'Paper Clip', 'prod_016.jpg', 'Central', 'Bharat', 'Electrical', 5, 'Microwave Engineering', 650, 'Stationary', 'gfhgfhgf', '2020-01-29 08:53:00', 0);

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
  `User_Mobile` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`Service_Id`, `Service_Type`, `Region`, `College`, `Branch`, `College_Id`, `Description`, `Date_Time`, `Email_Id`, `User_Name`, `User_Mobile`) VALUES
(0, 'Assingment Writing', '2', 'xyz', '', 49, 'fdbdfb', '2020-03-07 13:27:03', 'spol421@gmail.com', 'fbdfb', 346346),
(1, 'Assingment Writing', 'Central', 'Rizvi', '', 1, 'abcdefghijklmm', '2020-02-09 06:30:14', '', '', 0),
(2, 'Mini Project', 'Western', 'Somaiya', '', 2, 'adkhgkfgkdfg', '2020-02-09 06:31:34', '', '', 0),
(3, 'Final Year Project', 'Trans-Harbour', 'Rodrigues', '', 3, 'urtjdfgjfbgjf', '2020-02-09 06:32:41', '', '', 0),
(4, 'Drawing', 'Harbour', 'Amity', '', 4, 'qwerpoiuiyyu', '2020-02-09 06:32:41', '', '', 0),
(5, 'Final Year Project', 'Central', 'Vishwamatak', '', 1, 'asdflkjgh', '2020-02-09 06:32:58', '', '', 0),
(6, 'Assingment Writing', 'Western', 'Bharat', '', 2, 'zxcv,mnbn', '2020-02-09 06:32:58', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `User_Id` int(20) NOT NULL,
  `User_Name` varchar(50) NOT NULL,
  `Email_Id` varchar(100) NOT NULL,
  `Mobile_No` int(10) NOT NULL,
  `Verified` tinyint(1) NOT NULL DEFAULT 0,
  `Date_Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`User_Id`, `User_Name`, `Email_Id`, `Mobile_No`, `Verified`, `Date_Time`) VALUES
(1, 'Shreya', 'shreya@gmail.com', 5655221, 0, '2020-02-09 09:23:51'),
(2, 'Aryan', 'aryan@gmail.com', 85412, 0, '2020-02-09 09:23:51'),
(3, 'Shubham', 'spol421@gmail.com', 2147483647, 0, '2020-02-23 20:11:06'),
(4, 'ihjbihgbuiy', 'spol4212@gmail.com', 865764654, 0, '2020-02-26 16:25:21');

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
-- Dumping data for table `user_service`
--

INSERT INTO `user_service` (`User_Id`, `Service_Id`, `Email_Id`, `User_Name`, `User_Mobile`, `Service_Type`, `Description`, `Region`, `College_Name`, `College_Id`) VALUES
(0, 0, 'spol421@gmail.com', 'sdvs', 457467, 'Assingment Writing', 'cgnfc', '2', 'xyz', 32);

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
  ADD UNIQUE KEY `Email_Id` (`Email_Id`),
  ADD UNIQUE KEY `Mobile_No` (`Mobile_No`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `Product_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `User_Id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
