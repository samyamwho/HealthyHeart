-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2024 at 10:53 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `23189645`
--
CREATE DATABASE IF NOT EXISTS `23189645` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `23189645`;

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `ID` int(10) NOT NULL,
  `AdminName` varchar(120) DEFAULT NULL,
  `UserName` varchar(120) DEFAULT NULL,
  `MobileNumber` bigint(10) DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `AdminRegdate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `AdminRegdate`) VALUES
(1, 'Admin', 'admin', 8979555558, 'admin@gmail.com', 'aaa32cd08f9df664187683f8698a862b', '2022-07-27 22:51:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblblooddonars`
--

CREATE TABLE `tblblooddonars` (
  `id` int(11) NOT NULL,
  `FullName` varchar(100) DEFAULT NULL,
  `MobileNumber` char(11) DEFAULT NULL,
  `EmailId` varchar(100) DEFAULT NULL,
  `Gender` varchar(20) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `BloodGroup` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(1) DEFAULT NULL,
  `Password` varchar(250) DEFAULT NULL,
  `ImagePath` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblblooddonars`
--

INSERT INTO `tblblooddonars` (`id`, `FullName`, `MobileNumber`, `EmailId`, `Gender`, `Age`, `BloodGroup`, `Address`, `Message`, `PostingDate`, `status`, `Password`, `ImagePath`) VALUES
(30, 'Samyam Shrestha', '9803948433', 'samyamshr@gmail.com', 'Male', 20, 'A-', 'Gatthaghar Bhaktapur', ' I have a healthy Blood', '2024-06-18 14:31:20', 1, '81dc9bdb52d04dc20036dbd8313ed055', NULL),
(31, 'Pradeep Basnet', '9817036614', 'pradeep@gmail.com', 'Male', 21, 'O+', 'Balaju', 'Ask for my blood', '2024-06-18 14:42:25', 1, NULL, 'img/Screenshot 2024-05-27 173815.png'),
(32, 'Shreeyantra Rai', '9745668862', 'shreegaming111@gmail.com', 'Male', 23, 'A+', 'Hadi Gaun', 'I have an A+ blood, contact me if you want', '2024-06-18 14:44:36', 1, NULL, 'img/Screenshot 2024-06-18 202930.png'),
(33, 'Reshma Karki', '9849923356', 'reshmakarki@gmail.com', 'Female', 20, 'B+', 'kapan', 'i live in kapan', '2024-06-18 14:46:28', 1, NULL, 'img/SAM_2377.JPG'),
(34, 'Sakshyam Acharya', '9841154066', 'sakshyam@gmail.com', 'Male', 21, 'B+', 'Kathmandu', 'Do you need my blood?\r\n', '2024-06-18 14:48:28', 1, NULL, 'img/WhatsApp Image 2024-06-18 at 10.24.22_0b01d51a.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tblbloodgroup`
--

CREATE TABLE `tblbloodgroup` (
  `id` int(11) NOT NULL,
  `BloodGroup` varchar(20) DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbloodgroup`
--

INSERT INTO `tblbloodgroup` (`id`, `BloodGroup`, `PostingDate`) VALUES
(1, 'A-', '2022-04-30 20:33:50'),
(2, 'AB-', '2022-04-30 20:34:00'),
(3, 'O-', '2022-04-30 20:34:00'),
(4, 'A-', '2022-04-30 20:34:00'),
(5, 'A+', '2022-04-30 20:34:00'),
(6, 'AB+', '2022-04-30 20:34:00'),
(8, 'O+', '2023-03-30 16:22:27'),
(11, 'B-', '2024-05-30 16:41:00'),
(12, 'O+', '2024-06-04 06:10:39'),
(13, 'B+', '2024-06-05 05:09:38');

-- --------------------------------------------------------

--
-- Table structure for table `tblbloodrequirer`
--

CREATE TABLE `tblbloodrequirer` (
  `ID` int(10) NOT NULL,
  `BloodDonarID` int(10) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `EmailId` varchar(250) DEFAULT NULL,
  `ContactNumber` bigint(10) DEFAULT NULL,
  `BloodRequirefor` varchar(250) DEFAULT NULL,
  `Message` mediumtext DEFAULT NULL,
  `ApplyDate` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblbloodrequirer`
--

INSERT INTO `tblbloodrequirer` (`ID`, `BloodDonarID`, `name`, `EmailId`, `ContactNumber`, `BloodRequirefor`, `Message`, `ApplyDate`) VALUES
(1, 6, 'Rakesh', 'rak@gmail.com', 7894561236, 'Father', 'Please help', '2022-05-17 11:57:24'),
(2, 3, 'Mukesh', 'muk@gmail.com', 5896231478, 'Others', 'Please help', '2022-05-17 11:58:48'),
(3, 6, 'Hitesh', 'hit@gmail.com', 1236547896, 'Brother', 'do the needful', '2022-05-17 12:02:12'),
(4, 10, 'Rahul Singh', 'rahk@gmail.com', 2536251425, 'Mother', 'Please help me', '2022-07-29 01:51:52'),
(5, 11, 'Anuj Kumar', 'ak@gmail.com', 8525232102, 'Others', 'Need blood on urgent basis', '2022-08-02 01:24:18'),
(6, 12, 'sad', 'sadsa@gmail.com', 0, 'Brother', 'asd', '2023-03-30 14:26:35'),
(7, 9, 'Saad', 'saad@yahoo.com', 1234, 'Others', 'hello shb', '2023-03-30 14:45:31'),
(8, 9, 'saad', 'saad@yahoo.com', 1234, 'Father', 'Hello to the universe', '2023-03-30 14:47:19'),
(9, 13, 'noor', 'noor@gmail.com', 3242142, 'Father', 'please work krly bhia', '2023-03-30 15:04:01'),
(10, 9, 'Noor', 'noor@yahoo.com', 12345, 'Sister', 'Plese Donate', '2023-04-01 20:12:41'),
(11, 17, 'Dora', 'dora@dora.com', 98, 'Mother', 'Please Doinbate', '2023-04-01 20:15:27'),
(12, 18, 'Muhammad Saad Alam', 'saadalamk555@gmail.com', 3033173484, 'Mother', 'Please Contact me i neeed blood urgently.', '2023-04-04 18:59:43'),
(13, 18, 'Muhammad Saad Alam', 'saadalamk555@gmail.com', 3033173484, 'Brother', 'Please Donate this blood.', '2023-04-05 14:34:34'),
(14, 17, 'naruto', 'naruto@leaf.com', 123, 'Brother', 'Please donate dattaybayo.', '2023-04-05 14:46:51'),
(15, 19, 'Sampam', 'Samyam.Shrestha@mail.bcu.ac.uk', 9803948433, 'Others', 'i need a blood asap', '2024-05-30 13:09:47'),
(16, 20, 'sandip pyakur', 'sandippyakurel@gmail.com', 9862913787, 'Brother', 'i need a bloood asap', '2024-05-30 17:09:45'),
(17, 20, 'sandip pyakurel', 'shreegaming111@gmail.com', 9803948433, 'Father', 'i need blood', '2024-06-04 04:17:12'),
(18, 21, 'Aashrina Pradhan', 'sapkota@gmail.com', 9841155, 'Brother', 'ok', '2024-06-16 13:44:37'),
(19, 25, 'Aashrina Pradhan', 'ashrina@gmail.com', 9803948433, 'Father', 'ok', '2024-06-16 13:45:53'),
(20, 34, 'Aashrina Pradhan', 'ashrina@gmail.com', 98412342234, 'Mother', 'i need a blood as soon as possible', '2024-06-20 15:55:37'),
(21, 30, 'Aashrina Pradhan', 'ashrina@gmail.com', 9841155, 'Mother', 'i need a blood as soon as possible. how can i get one for my mother', '2024-06-20 15:56:53');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusinfo`
--

CREATE TABLE `tblcontactusinfo` (
  `id` int(11) NOT NULL,
  `Address` tinytext DEFAULT NULL,
  `EmailId` varchar(255) DEFAULT NULL,
  `ContactNo` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusinfo`
--

INSERT INTO `tblcontactusinfo` (`id`, `Address`, `EmailId`, `ContactNo`) VALUES
(1, 'Test Demo test demo																									', 'test@test.com', '8585233222');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactusquery`
--

CREATE TABLE `tblcontactusquery` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `EmailId` varchar(120) DEFAULT NULL,
  `ContactNumber` char(11) DEFAULT NULL,
  `Message` longtext DEFAULT NULL,
  `PostingDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tblcontactusquery`
--

INSERT INTO `tblcontactusquery` (`id`, `name`, `EmailId`, `ContactNumber`, `Message`, `PostingDate`, `status`) VALUES
(8, 'Saad Khan', 'saad@gmail.com', '2131', 'YEah!!1 boii\r\n', '2023-03-30 16:21:22', 1),
(9, 'Shreeyantra', 'samyam233@gmail.com', '9803948433', 'yoshi', '2024-05-28 13:10:05', NULL),
(10, 'Shreeyantra', 'samyam233@gmail.com', '9803948433', 'this is a trial', '2024-05-29 03:48:17', NULL),
(11, 'Pradeeep', 'Samyam.Shrestha@mail.bcu.ac.uk', '9803948433', 'there any blood available', '2024-05-29 15:10:18', NULL),
(12, 'Pradeeep', 'Samyam.Shrestha@mail.bcu.ac.uk', '9803948433', 'there any blood available', '2024-05-29 15:13:44', NULL),
(13, 'Samyam Shrestha', 'samyam233@gmail.com', '9803948433', 'i need some blood ffs', '2024-05-29 15:43:55', NULL),
(16, 'sandip pyakurel', 'sandippyakurel@gmail.com', '9862913787', 'kati oota blood group cha hajur sanga', '2024-05-30 17:08:09', NULL),
(17, 'sakshyam', 'sak@gmail.com', '9841154.66', 'heelo', '2024-06-02 02:42:48', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblblooddonars`
--
ALTER TABLE `tblblooddonars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bgroup` (`BloodGroup`);

--
-- Indexes for table `tblbloodgroup`
--
ALTER TABLE `tblbloodgroup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `BloodGroup` (`BloodGroup`),
  ADD KEY `BloodGroup_2` (`BloodGroup`);

--
-- Indexes for table `tblbloodrequirer`
--
ALTER TABLE `tblbloodrequirer`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `donorid` (`BloodDonarID`);

--
-- Indexes for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblblooddonars`
--
ALTER TABLE `tblblooddonars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tblbloodgroup`
--
ALTER TABLE `tblbloodgroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tblbloodrequirer`
--
ALTER TABLE `tblbloodrequirer`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tblcontactusinfo`
--
ALTER TABLE `tblcontactusinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblcontactusquery`
--
ALTER TABLE `tblcontactusquery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
