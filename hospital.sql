-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2023 at 11:49 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updationDate`) VALUES
(1, 'admin', 'Test@12345', '28-12-2016 11:42:05 AM');

-- --------------------------------------------------------

--
-- Table structure for table `application_logs`
--

CREATE TABLE `application_logs` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `usertype` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT current_timestamp(),
  `logout` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `application_logs`
--

INSERT INTO `application_logs` (`id`, `uid`, `usertype`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 0, 'staff_nurse', '', '2022-04-27 15:39:50', '0000-00-00 00:00:00', 0),
(2, 1, 'staff_nurse', '', '2022-04-27 15:40:25', '0000-00-00 00:00:00', 1),
(3, 1, 'staff_nurse', '59.94.63.169', '2022-04-27 15:57:51', '0000-00-00 00:00:00', 1),
(4, 0, 'staff_nurse', '59.94.59.185', '2022-04-28 16:17:40', '0000-00-00 00:00:00', 0),
(5, 1, 'staff_nurse', '59.94.59.185', '2022-04-28 16:18:30', '0000-00-00 00:00:00', 1),
(6, 0, 'staff_nurse', '59.94.59.185', '2022-04-28 16:32:02', '0000-00-00 00:00:00', 0),
(7, 1, 'staff_nurse', '59.94.59.185', '2022-04-28 16:32:18', '0000-00-00 00:00:00', 1),
(8, 1, 'staff_nurse', '59.94.59.185', '2022-04-28 16:40:50', '0000-00-00 00:00:00', 1),
(9, 1, 'staff_nurse', '', '2022-04-28 16:43:03', '0000-00-00 00:00:00', 1),
(10, 1, 'staff_nurse', '', '2022-04-28 16:44:18', '0000-00-00 00:00:00', 1),
(11, 1, 'staff_nurse', '59.94.59.185', '2022-04-28 16:51:47', '2022-04-28 16:51:55', 1),
(12, 0, 'laboratory', '59.94.59.185', '2022-04-28 18:12:37', '0000-00-00 00:00:00', 0),
(13, 1, 'laboratory', '59.94.59.185', '2022-04-28 18:12:54', '0000-00-00 00:00:00', 1),
(14, 1, 'admin', '59.94.62.85', '2022-04-29 16:14:09', '0000-00-00 00:00:00', 1),
(15, 1, 'admin', '150.107.16.233', '2022-05-03 13:34:00', '0000-00-00 00:00:00', 1),
(16, 1, 'admin', '103.97.92.134', '2022-05-03 21:22:31', '0000-00-00 00:00:00', 1),
(17, 1, 'admin', '150.107.18.232', '2022-05-04 09:54:57', '0000-00-00 00:00:00', 1),
(18, 1, 'admin', '150.107.16.189', '2022-05-05 10:48:14', '0000-00-00 00:00:00', 1),
(19, 1, 'admin', '150.107.16.189', '2022-05-05 12:13:17', '0000-00-00 00:00:00', 1),
(20, 0, 'admin', '61.0.36.182', '2022-05-16 10:46:40', '0000-00-00 00:00:00', 0),
(21, 7, 'doctor', '61.0.36.182', '2022-05-16 10:46:53', '2022-05-16 10:47:38', 1),
(22, 0, 'laboratory', '61.0.36.182', '2022-05-16 10:47:46', '0000-00-00 00:00:00', 0),
(23, 0, 'laboratory', '61.0.36.182', '2022-05-16 10:47:53', '0000-00-00 00:00:00', 0),
(24, 1, 'admin', '150.107.16.206', '2022-05-16 10:49:46', '0000-00-00 00:00:00', 1),
(25, 0, 'admin', '150.107.16.206', '2022-05-16 16:34:09', '0000-00-00 00:00:00', 0),
(26, 0, 'admin', '150.107.16.206', '2022-05-16 16:34:20', '0000-00-00 00:00:00', 0),
(27, 0, 'admin', '150.107.16.206', '2022-05-16 16:34:24', '0000-00-00 00:00:00', 0),
(28, 0, 'admin', '150.107.16.206', '2022-05-16 16:34:42', '0000-00-00 00:00:00', 0),
(29, 1, 'admin', '150.107.16.206', '2022-05-16 16:36:28', '0000-00-00 00:00:00', 1),
(30, 1, 'admin', '150.107.18.137', '2022-05-17 11:30:02', '0000-00-00 00:00:00', 1),
(31, 1, 'admin', '117.220.245.10', '2022-05-17 16:35:28', '0000-00-00 00:00:00', 1),
(32, 1, 'admin', '150.107.18.137', '2022-05-17 17:18:46', '0000-00-00 00:00:00', 1),
(33, 1, 'admin', '150.107.18.239', '2022-05-18 11:47:52', '0000-00-00 00:00:00', 1),
(34, 1, 'admin', '150.107.16.178', '2022-05-19 13:17:32', '0000-00-00 00:00:00', 1),
(35, 1, 'admin', '150.107.16.178', '2022-05-19 15:46:47', '0000-00-00 00:00:00', 1),
(36, 1, 'admin', '150.107.40.148', '2022-05-23 16:16:30', '0000-00-00 00:00:00', 1),
(37, 1, 'admin', '150.107.40.162', '2022-05-24 10:36:45', '0000-00-00 00:00:00', 1),
(38, 1, 'admin', '150.107.40.197', '2022-05-26 15:16:28', '0000-00-00 00:00:00', 1),
(39, 1, 'admin', '59.89.190.1', '2022-05-27 10:59:48', '0000-00-00 00:00:00', 1),
(40, 0, 'laboratory', '59.89.190.1', '2022-05-27 11:00:45', '0000-00-00 00:00:00', 0),
(41, 0, 'laboratory', '150.107.40.210', '2022-05-27 11:01:23', '0000-00-00 00:00:00', 0),
(42, 1, 'laboratory', '150.107.40.210', '2022-05-27 12:22:56', '0000-00-00 00:00:00', 1),
(43, 1, 'admin', '150.107.40.210', '2022-05-27 18:13:10', '0000-00-00 00:00:00', 1),
(44, 1, 'admin', '150.107.40.248', '2022-05-30 13:10:48', '0000-00-00 00:00:00', 1),
(45, 1, 'admin', '150.107.40.248', '2022-05-30 16:18:21', '0000-00-00 00:00:00', 1),
(46, 1, 'admin', '150.107.40.77', '2022-06-03 11:34:11', '0000-00-00 00:00:00', 1),
(47, 0, 'laboratory', '150.107.40.167', '2022-06-07 10:16:17', '0000-00-00 00:00:00', 0),
(48, 1, 'laboratory', '150.107.40.167', '2022-06-07 10:17:48', '0000-00-00 00:00:00', 1),
(49, 1, 'admin', '150.107.40.210', '2022-06-09 16:10:56', '0000-00-00 00:00:00', 1),
(50, 1, 'admin', '150.107.40.230', '2022-06-10 15:44:01', '0000-00-00 00:00:00', 1),
(51, 1, 'admin', '150.107.40.35', '2022-07-05 11:24:45', '0000-00-00 00:00:00', 1),
(52, 1, 'admin', '150.107.40.64', '2022-07-06 12:09:56', '0000-00-00 00:00:00', 1),
(53, 1, 'admin', '150.107.40.64', '2022-07-06 12:43:23', '0000-00-00 00:00:00', 1),
(54, 0, 'admin', '150.107.40.187', '2022-07-18 16:57:08', '0000-00-00 00:00:00', 0),
(55, 1, 'admin', '150.107.40.187', '2022-07-18 16:57:18', '0000-00-00 00:00:00', 1),
(56, 1, 'admin', '150.107.40.23', '2022-07-21 10:36:21', '0000-00-00 00:00:00', 1),
(57, 7, 'doctor', '150.107.40.23', '2022-07-21 11:08:23', '0000-00-00 00:00:00', 1),
(58, 1, 'admin', '150.107.40.23', '2022-07-21 15:15:28', '0000-00-00 00:00:00', 1),
(59, 1, 'admin', '150.107.40.23', '2022-07-21 16:31:16', '0000-00-00 00:00:00', 1),
(60, 0, 'admin', '::1', '2023-10-12 08:31:17', '0000-00-00 00:00:00', 0),
(61, 0, 'laboratory', '::1', '2023-10-12 10:13:19', '0000-00-00 00:00:00', 0),
(62, 0, 'laboratory', '::1', '2023-10-12 10:13:24', '0000-00-00 00:00:00', 0),
(63, 0, 'laboratory', '::1', '2023-10-12 10:13:56', '0000-00-00 00:00:00', 0),
(64, 1, 'admin', '::1', '2023-10-12 10:14:23', '2023-10-12 11:15:42', 1),
(65, 15, 'doctor', '::1', '2023-10-12 10:22:23', '0000-00-00 00:00:00', 1),
(66, 1, 'staff_nurse', '::1', '2023-10-12 11:02:33', '2023-10-12 11:05:44', 1),
(67, 1, 'laboratory', '::1', '2023-10-12 11:05:57', '0000-00-00 00:00:00', 1),
(68, 1, 'admin', '::1', '2023-10-12 11:07:27', '0000-00-00 00:00:00', 1),
(69, 1, 'staff_nurse', '::1', '2023-10-12 11:16:17', '0000-00-00 00:00:00', 1),
(70, 15, 'doctor', '::1', '2023-10-12 12:04:51', '0000-00-00 00:00:00', 1),
(71, 1, 'admin', '::1', '2023-10-12 14:52:33', '0000-00-00 00:00:00', 1),
(72, 1, 'admin', '::1', '2023-10-12 16:12:07', '2023-10-13 09:37:19', 1),
(73, 1, 'staff_nurse', '::1', '2023-10-13 09:37:25', '2023-10-13 09:37:46', 1),
(74, 0, 'laboratory', '::1', '2023-10-13 09:37:55', '0000-00-00 00:00:00', 0),
(75, 1, 'laboratory', '::1', '2023-10-13 09:38:38', '2023-10-13 09:42:05', 1),
(76, 1, 'admin', '::1', '2023-10-13 10:37:04', '2023-10-13 11:54:08', 1),
(77, 15, 'doctor', '::1', '2023-10-13 10:40:44', '0000-00-00 00:00:00', 1),
(78, 1, 'staff_nurse', '::1', '2023-10-13 11:04:07', '0000-00-00 00:00:00', 1),
(79, 1, 'laboratory', '::1', '2023-10-13 11:54:40', '0000-00-00 00:00:00', 1),
(80, 1, 'admin', '::1', '2023-10-13 12:04:44', '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `admission_id` int(11) NOT NULL,
  `doctorSpecialization` varchar(255) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `consultancyFees` int(11) DEFAULT NULL,
  `appointmentDate` varchar(255) DEFAULT NULL,
  `appointmentTime` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `userStatus` int(11) DEFAULT NULL,
  `doctorStatus` int(11) DEFAULT NULL,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `admission_id`, `doctorSpecialization`, `doctorId`, `userId`, `consultancyFees`, `appointmentDate`, `appointmentTime`, `postingDate`, `userStatus`, `doctorStatus`, `updationDate`) VALUES
(3, 6, 'Demo test', 7, 6, 600, '2022-03-31', '9:15 AM', '2019-06-23 18:31:28', 1, 1, '2022-03-31 10:00:40'),
(4, 0, 'Ayurveda', 5, 5, 8050, '2022-31-3', '1:00 PM', '2019-11-05 10:28:54', 1, 1, '2022-03-31 09:55:12'),
(5, 0, 'Dermatologist', 9, 7, 500, '2022-31-3', '5:30 PM', '2019-11-10 18:41:34', 1, 0, '2022-03-31 09:55:28'),
(6, 0, 'Physician', 11, 2, 2000, '2020-07-14', '10:15 AM', '2020-07-05 02:12:37', 1, 1, NULL),
(7, 0, 'General Physician', 3, 2, 1200, '2020-07-05', '10:15 AM', '2020-07-05 02:14:49', 0, 1, '2021-11-01 12:27:14'),
(8, 6, 'Demo test', 7, 9, 200, '2022-03-31', '4:00 PM', '2021-09-16 10:26:34', 1, 1, '2022-03-31 11:13:12'),
(9, 0, 'Dermatologist', 12, 10, 300, '2021-09-22', '5:00 PM', '2021-09-22 11:17:28', 1, 0, '2021-09-24 10:12:16'),
(10, 0, 'Dermatologist', 12, 2, 300, '2021-09-24', '3:08 PM', '2021-09-24 09:35:38', 0, 1, '2021-09-24 10:10:39'),
(11, 0, 'Test', 0, 2, 0, '2021-10-19', '11:45 AM', '2021-10-15 06:06:13', 1, 1, NULL),
(12, 0, 'Ayurveda', 8, 2, 600, '2021-10-22', '4:30 PM', '2021-10-15 10:54:13', 1, 1, NULL),
(13, 6, 'Demo test', 7, 9, 200, '2022-03-31', '4:45 PM', '2021-10-15 11:01:13', 1, 1, '2022-03-31 11:13:18'),
(14, 0, 'Dermatologist', 12, 5, 300, '2021-11-24', '4:45 PM', '2021-11-01 11:41:12', 1, 1, NULL),
(15, 0, 'General Physician', 6, 4, 2500, '2021-11-24', '4:30 PM', '2021-11-01 11:45:28', 1, 1, NULL),
(16, 0, 'General Physician', 6, 4, 2500, '2021-11-24', '4:30 PM', '2021-11-01 11:47:33', 1, 1, NULL),
(17, 0, 'Ayurveda', 5, 2, 8050, '2021-11-16', '5:30 PM', '2021-11-01 11:50:24', 1, 1, NULL),
(18, 0, 'General Physician', 3, 15, 1200, '2021-11-26', '18:10', '2021-11-26 12:24:46', 1, 1, NULL),
(19, 0, 'Demo test', 7, 9, 200, '2022-03-30', '3:20', '2021-12-09 09:37:10', 1, 1, '2022-03-31 11:13:31'),
(20, 0, 'General Physician', 6, 1, 2500, '2021-12-10', '3.00', '2021-12-10 11:47:34', 1, 1, NULL),
(21, 0, 'General Physician', 6, 7, 2500, '2021-12-10', '3.20', '2021-12-10 11:47:54', 1, 1, NULL),
(22, 0, 'Demo test', 7, 6, 200, '2022-04-01', '2:45 PM', '2021-12-15 09:14:26', 1, 1, '2022-03-31 11:14:04'),
(23, 0, 'General Physician', 3, 0, 1200, '2022-01-14', '3:20 AM', '2022-01-21 11:00:12', 1, 1, NULL),
(24, 0, 'Dermatologist', 12, 0, 300, '2022-01-21', '6:30 PM', '2022-01-21 12:52:47', 1, 1, NULL),
(25, 27, 'Dermatologist', 12, 14, 300, '2022-01-22', '3:08 PM', '2022-01-22 06:07:18', 1, 1, NULL),
(26, 0, 'Demo test', 7, 6, 200, '2022-02-01', '12:00 PM', '2022-02-01 06:19:17', 1, 1, '2022-03-31 11:13:45'),
(27, 28, 'Demo test', 7, 26, 200, '2022-02-01', '12:50 PM', '2022-02-01 07:19:23', 1, 1, '2022-02-01 07:34:30'),
(28, 29, 'Demo test', 7, 27, 200, '2022-02-02', '12:30 PM', '2022-02-02 06:33:26', 1, 1, NULL),
(29, 30, 'Demo test', 7, 28, 200, '2022-02-03', '11:50', '2022-02-03 06:19:25', 1, 1, NULL),
(30, 0, 'General Physician', 13, 29, 300, '2022-03-30', '3:08 PM', '2022-03-30 06:46:59', 1, 1, NULL),
(31, 31, 'General Physician', 13, 29, 300, '2022-03-30', '5:00 PM', '2022-03-30 11:19:23', 1, 1, NULL),
(32, 0, 'General Physician', 6, 29, 2500, '2022-04-01', '10:00pm', '2022-04-01 11:35:05', 1, 1, NULL),
(33, 0, 'General Physician', 6, 29, 2500, '2022-04-01', '10:00pm', '2022-04-01 11:36:58', 1, 1, NULL),
(34, 0, 'General Physician', 6, 29, 2500, '2022-04-01', '10:00pm', '2022-04-01 11:37:01', 1, 1, NULL),
(35, 0, 'General Physician', 6, 29, 2500, '2022-04-01', '10:00pm', '2022-04-01 11:39:28', 1, 1, NULL),
(36, 0, 'General Physician', 6, 29, 2500, '2022-04-01', '10:00pm', '2022-04-01 11:44:46', 1, 1, NULL),
(37, 0, 'General Physician', 6, 29, 2500, '2022-04-02', '10:00 pm', '2022-04-02 06:04:43', 1, 1, NULL),
(38, 33, 'General Physician', 13, 35, 300, '2022-04-05', '10: 00 Am', '2022-04-05 10:49:18', 1, 1, NULL),
(39, 33, 'General Physician', 13, 35, 300, '2022-04-19', '10 Am', '2022-04-19 07:32:56', 1, 1, NULL),
(40, 33, 'General Physician', 13, 35, 300, '2022-04-19', '10 Am', '2022-04-19 07:36:05', 1, 1, NULL),
(41, 33, 'General Physician', 13, 35, 300, '2022-04-19', '12 Am', '2022-04-19 07:39:41', 1, 1, NULL),
(42, 33, 'General Physician', 6, 35, 2500, '2022-04-19', '12', '2022-04-19 13:14:37', 1, 1, NULL),
(43, 45, 'General Physician', 13, 34, 300, '2022-04-22', '10 Am', '2022-04-22 19:17:41', 1, 1, NULL),
(44, 46, 'General Physician', 14, 36, 500, '2022-04-25', '5:00 PM', '2022-04-25 10:12:57', 1, 1, NULL),
(45, 46, 'General Physician', 14, 36, 500, '2022-04-25', '4:00 PM', '2022-04-25 11:22:21', 1, 1, NULL),
(46, 48, 'Gynecologist/Obstetrician', 15, 38, 500, '2023-10-12', '11:00 AM', '2023-10-12 10:20:43', 1, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `doctorName` varchar(255) DEFAULT NULL,
  `docFees` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `docEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specilization`, `doctorName`, `docFees`, `contactno`, `docEmail`, `password`, `creationDate`, `updationDate`) VALUES
(1, 'Dentist', 'Lyndon Bermoy', '500', 8285703354, 'anuj.lpu1@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2016-12-29 06:25:37', '2020-07-05 01:53:19'),
(2, 'Homeopath', 'Sarita Pandey', '600', 2147483647, 'sarita@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2016-12-29 06:51:51', '0000-00-00 00:00:00'),
(3, 'General Physician', 'Nitesh Kumar', '1200', 8523699999, 'nitesh@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:43:35', '0000-00-00 00:00:00'),
(4, 'Homeopath', 'Vijay Verma', '700', 25668888, 'vijay@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:45:09', '0000-00-00 00:00:00'),
(5, 'Ayurveda', 'Sanjeev', '8050', 442166644646, 'sanjeev@gmail.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:47:07', '0000-00-00 00:00:00'),
(6, 'General Physician', 'Amrita', '2500', 45497964, 'amrita@test.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 07:52:50', '0000-00-00 00:00:00'),
(7, 'Demo test', 'abc ', '200', 852888887, 'test@demo.com', 'f925916e2754e5e03f75dd58a5733251', '2017-01-07 08:08:58', '2021-10-15 06:01:56'),
(8, 'Ayurveda', 'Test Doctor', '600', 1234567890, 'test@test.com', '202cb962ac59075b964b07152d234b70', '2019-06-23 17:57:43', '2019-06-23 18:06:06'),
(11, 'Physician', 'Jonah Juarez', '2000', 123456789, 'jjuarez@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2020-07-05 02:06:00', '2020-07-05 02:06:48'),
(12, 'Dermatologist', 'Bhushan', '300', 9000000000, 'test@gmail.com', 'd4395a5856617fa4afe8c5cd2eed3912', '2021-09-22 07:41:25', NULL),
(13, 'General Physician', 'Testing march', '300', 8788599392, 'march@anjunahospital.com', '60fb105a882b0ac37cc2309d24d588d5', '2022-03-29 07:43:53', NULL),
(14, 'General Physician', 'April 2504 Doctor', '500', 8788599392, 'doctor@april.com', 'd483b1f9c5cf736434d16a92e7f9bacc', '2022-04-25 04:41:57', NULL),
(15, 'Gynecologist/Obstetrician', 'Mr Rustom', '500', 123456789, 'doctor@gmail.com', 'd723499442a49722741edeadfaea5bde', '2023-10-12 10:15:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctorspecilization`
--

CREATE TABLE `doctorspecilization` (
  `id` int(11) NOT NULL,
  `specilization` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctorspecilization`
--

INSERT INTO `doctorspecilization` (`id`, `specilization`, `creationDate`, `updationDate`) VALUES
(1, 'Gynecologist/Obstetrician', '2016-12-28 06:37:25', '0000-00-00 00:00:00'),
(2, 'General Physician', '2016-12-28 06:38:12', '0000-00-00 00:00:00'),
(3, 'Dermatologist', '2016-12-28 06:38:48', '0000-00-00 00:00:00'),
(4, 'Homeopath', '2016-12-28 06:39:26', '0000-00-00 00:00:00'),
(5, 'Ayurveda', '2016-12-28 06:39:51', '0000-00-00 00:00:00'),
(6, 'Dentist', '2016-12-28 06:40:08', '0000-00-00 00:00:00'),
(7, 'Ear-Nose-Throat (Ent) Specialist', '2016-12-28 06:41:18', '0000-00-00 00:00:00'),
(9, 'Demo test', '2016-12-28 07:37:39', '0000-00-00 00:00:00'),
(10, 'Bones Specialist demo', '2017-01-07 08:07:53', '0000-00-00 00:00:00'),
(11, 'Test', '2019-06-23 17:51:06', '2019-06-23 17:55:06'),
(12, 'Dermatologist', '2019-11-10 18:36:36', '2019-11-10 18:36:50'),
(13, 'Physician', '2020-07-05 01:59:00', NULL),
(14, 'test', '2022-03-30 10:33:20', NULL),
(15, 'test new', '2022-03-30 10:57:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fluidintakelog`
--

CREATE TABLE `fluidintakelog` (
  `logid` int(11) NOT NULL,
  `admissionID` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iv` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `oral` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `urine` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `others` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `datein` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fluidintakelog`
--

INSERT INTO `fluidintakelog` (`logid`, `admissionID`, `iv`, `oral`, `rt`, `urine`, `others`, `datetime`, `datein`) VALUES
(1, '', '12', '23', '34', '45', '56', '0000-00-00 00:00:00', '0000-00-00'),
(2, '6', '23', '45', '67', '78', '90', '2022-04-22 12:24:01', '0000-00-00'),
(3, '6', '23', '23', '34', '45', '67', '2022-04-22 07:28:19', '0000-00-00'),
(4, '6', '23', '23', '34', '45', '67', '2022-04-22 07:31:50', '0000-00-00'),
(5, '6', '23', '23', '94', '45', '67', '2022-04-22 07:33:07', '0000-00-00'),
(6, '6', '12', '12', '12', '23', '34', '2022-04-22 09:41:58', '2022-04-22'),
(7, '6', '34', '23', '34', '34', '45', '2022-04-25 11:43:14', '2022-04-25'),
(8, '48', '400', '400', '57', '300', '400', '2023-10-12 04:51:36', '2023-10-12'),
(9, '48', '500', '500', '500', '300', '50', '2023-10-12 04:52:14', '2023-10-12'),
(10, '48', '500', '500', '500', '300', '50', '2023-10-12 04:52:34', '2023-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory`
--

CREATE TABLE `laboratory` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laboratory`
--

INSERT INTO `laboratory` (`id`, `username`, `password`, `updated_at`) VALUES
(1, 'laboratory', '799ad83c247e4b997891c10762d12728', '28-12-2016 11:42:05 AM');

-- --------------------------------------------------------

--
-- Table structure for table `laboratorytestlist`
--

CREATE TABLE `laboratorytestlist` (
  `labFormID` int(11) NOT NULL,
  `labTestName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `labFields` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `labCharges` int(11) NOT NULL,
  `test_more_info` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_titles` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laboratorytestlist`
--

INSERT INTO `laboratorytestlist` (`labFormID`, `labTestName`, `labFields`, `labCharges`, `test_more_info`, `main_titles`) VALUES
(113, 'URINE PREGNANCY TEST REPORT', '[{\"fieldName\":\"Urine Pregnancy Test \"}]', 0, '', ''),
(114, 'LACTATE DEHYDROGENASE (LDH)', '[{\"fieldName\":\"LACTATE DEHYDROGENASE (LDH)\",\"units\":\"U/L\",\"referanceRange\":\"230-460\"}]', 0, '&lt;p&gt;Clinical Significance: Lactate Dehydrogenase occurs in the cytoplasm of all cells; there are&lt;br /&gt;\r\nfive isoenzymes. The highest concentration are found in heart,liver,skeletal muscle, kidney,&lt;br /&gt;\r\nand the RBCs,with lesser amounts in lung, smooth muscle, and brain . LD catalyzes the&lt;br /&gt;\r\ninterconversion of lactate and pyruvate. Marked elevations in lactate dehydrogenase (LD)&lt;br /&gt;\r\nactivity can be observed in megaloblastic anemia, untreated pernicious anemia, Hodgkin&lt;br /&gt;\r\ndisease, abdominal and lung cancers, severe shock, and hypoxia. Moderate to slight&lt;br /&gt;\r\nincreases in LD levels are seen in myocardial infarction (MI), pulmonary infarction,&lt;br /&gt;\r\npulmonary embolism, leukemia, hemolytic anemia, infectious mononucleosis, progressive&lt;br /&gt;\r\nmuscular dystrophy (especially in the early and middle stages of the disease), liver disease,&lt;br /&gt;\r\nand renal disease. In liver disease, elevations of LD are not as great as the increases in&lt;br /&gt;\r\naspirate amino transferase (AST) and alkaline aminotransferase (ALT). Increased levels of&lt;br /&gt;\r\nthe enzyme are found in about one third of patients with renal disease, especially those with&lt;br /&gt;\r\ntubular necrosis or pyelonephritis. However, these elevations do not correlate well with&lt;br /&gt;\r\nproteinuria or other parameters of renal disease. On occasion a raised LD level may be the&lt;br /&gt;\r\nonly evidence to suggest the presence of a hidden pulmonary embolus.&lt;br /&gt;\r\nPlease correlate with clinical conditions.&lt;br /&gt;\r\nMethod:- LACTATE / IFCC METHOD&lt;/p&gt;\r\n', 'Units,Referance Range'),
(115, 'THYROID FUNCTION TEST', '[{\"fieldName\":\"Thyroid stimulating -  Hormone (TSH) (SANDWICH IMMUNODETECTION METHOD)\",\"units\":\"uIU/mL\"}]', 0, '&lt;p&gt;Gestation &amp;amp; Childhood Adult Pregnancy&lt;br /&gt;\n0 days &amp;ndash; 1.0-39.0 55-87YRS &amp;ndash; 0.5-8.9 1 1st Trimester -&lt;br /&gt;\n0.3-4.5&lt;br /&gt;\n5 days &amp;ndash; 1.7-9 20-54yrs &amp;ndash; 0.4-4.2 2nd Trimester&lt;br /&gt;\n&amp;ndash; 0.5-4.6&lt;br /&gt;\n1yr &amp;ndash; 0.4-8.6 3rd&lt;br /&gt;\nTrimester &amp;ndash; 0.8-5.2&lt;br /&gt;\n2yrs &amp;ndash; 0.4-7.6&lt;br /&gt;\n3yrs &amp;ndash; 0.3-6.7&lt;br /&gt;\n4-19yrs &amp;ndash; 0.4-6.2&lt;br /&gt;\nInterpretation:-&lt;br /&gt;\nTriiodothyronine T3 is a thyroid hormone. It affects almost every physiological&lt;br /&gt;\nprocess in the body, including growth, development, metabolism, body temperature&lt;br /&gt;\nAnd heart rate. Production of T3 and its Prohormone thyroxin (T4) is activate by&lt;br /&gt;\nthyroid- stimulating hormone (TSH), which is released from the pituitary gland.&lt;br /&gt;\nElevated concentrations of T3 , and T4 in the blood inhibit the production of TSH.&lt;br /&gt;\nThyroxin T4, Thyroxin&amp;rsquo;s principal function is to stimulate the metabolism of all cells&lt;br /&gt;\nand tissues in the body, Excessive secretion of thyroxin in the body is&lt;br /&gt;\nhyperthyroidism, and deficient secretion is called hypothyroidism. Most of the&lt;br /&gt;\nthyroid hormone in blood is bound to transport proteins. Only a very small fraction&lt;br /&gt;\nof the circulating hormone is free and biologically active.&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\n\n&lt;p&gt;In primary hypothyroidism, TSH levels are significantly elevated, while in secondary&lt;br /&gt;\nand tertiary hypothyroidism, TSH levels are low.&lt;/p&gt;\n', 'Units'),
(116, 'GLYCOSYLATED HEMOGLOBIN (HBA1C)', '[{\"fieldName\":\"HBA1C (Patient Test) \",\"units\":\"%\",\"referanceRange\":\"4.0-6.5%\"},{\"fieldName\":\"AVERAGE BLOOD SUGAR \"}]', 0, '&lt;p&gt;HBA1C DEGREE OF GLUCOSE CONTROL :-&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;gt;8% - ACTION SUGGESTED&lt;br /&gt;\r\n7-8%- GOOD CONTROL&lt;br /&gt;\r\n6-7% - NEAR NORMAL GLYCEMIA&lt;br /&gt;\r\n&amp;lt;6% - NON DIABETIC LEVEL&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', ''),
(117, 'PROCALCITONIN', '[{\"fieldName\":\"PROCALCITONIN\",\"referanceRange\":\"0.5ng/ml\",\"normalRange\":\" 0.5 ng /ml\"}]', 0, '&lt;p&gt;Clinical Significance:&lt;br /&gt;\r\nRise in circulating procalcitonin levels beyond normal range associated with&lt;br /&gt;\r\npro inflammatory stimuli during bacterial infection sepsis during operation /&lt;br /&gt;\r\ntrauma.&lt;br /&gt;\r\nMethod : Fluorescence Immunoassay (FIA)&lt;/p&gt;\r\n', 'Referance Range,Normal Range'),
(118, 'D-DIMER', '[{\"fieldName\":\"D-DIMER\",\"normalRange\":\"UPTO 500 ng/ml\"}]', 0, '', 'Normal Range'),
(119, 'URIC ACID', '[{\"fieldName\":\"URIC ACID\",\"normalRange\":\"Male 3.4 - 7.0 mg/dl           Female 2.5-6.0  mg/dl\"}]', 0, '', 'Normal Range'),
(120, 'RA. Factor', '[{\"fieldName\":\"RA. Factor\",\"normalRange\":\"Upto20 IU/mL \"}]', 0, '', 'Normal Range'),
(121, 'C.R.P.', '[{\"fieldName\":\"C-reactive protein\",\"normalRange\":\"Upto 10mg/L\"}]', 0, '', 'Normal Range'),
(122, 'A.S.O', '', 0, '', 'Normal Range'),
(123, 'Sr. Calcium', '[{\"fieldName\":\"Sr. Calcium\",\"normalRange\":\"8.5 – 10.2 mg/dl\"}]', 0, '', 'Normal Range'),
(124, 'SR. FERRITIN', '[{\"fieldName\":\"SR. FERRITIN\",\"normalRange\":\"Male 30-350 ng/mL           Female 20-250  ng/mL\"}]', 0, '', 'Normal Range'),
(125, 'CK-MB', '[{\"fieldName\":\"CK-MB\",\"normalRange\":\"Up to  7ng/mL\"}]', 0, '', 'Normal Range'),
(126, 'TROP-I', '[{\"fieldName\":\"TROP-I\",\"normalRange\":\"0.03ng/mL\"}]', 0, '', 'Normal Range'),
(127, 'Sr. AMYLASE', '[{\"fieldName\":\"Sr. AMYLASE\",\"normalRange\":\"Upto 80 U/L\"}]', 0, '', 'Normal Range'),
(128, 'Sr. LIPASE', '[{\"fieldName\":\"Sr. LIPASE\",\"normalRange\":\"13 to 60 U/L\"}]', 0, '', 'Normal Range'),
(129, 'COMPLETE BLOOD COUNT', '[{\"fieldName\":\"Haemoglobin\",\"referanceRange\":\"Male: 14 - 16 g%    Female: 12 - 14 g%\"},{\"fieldName\":\"TOTAL WBC COUNT*\",\"units\":\"\",\"referanceRange\":\"\",\"normalRange\":\"\"},{\"fieldName\":\"Total WBC Count \",\"referanceRange\":\"4000 - 11000 / cu.mm\"},{\"fieldName\":\"Neutrophils\",\"referanceRange\":\"40 - 75 %\"},{\"fieldName\":\"Lymphocytes\",\"referanceRange\":\"20 - 45 %\"},{\"fieldName\":\"Eosinophils\",\"referanceRange\":\"01 - 06 %\"},{\"fieldName\":\"Monocytes\",\"referanceRange\":\"00 - 10 %\"},{\"fieldName\":\"Basophils\",\"referanceRange\":\"00 - 01 %\"},{\"fieldName\":\" PLATELETS*\",\"units\":\"\",\"referanceRange\":\"\",\"normalRange\":\"\"},{\"fieldName\":\" Platelet Count \",\"referanceRange\":\" 150000 - 450000 / cu.mm\"}]', 0, '&lt;p&gt;Test done on fully automated cell counter&lt;/p&gt;\r\n', 'Referance Range'),
(130, 'SERUM ELECTROLYTES', '[{\"fieldName\":\"Sodium\",\"referanceRange\":\"135 -150 mEq / L\"},{\"fieldName\":\"Potassium\",\"referanceRange\":\"3.5 - 5.0 mEq / L\"},{\"fieldName\":\"Chlorides\",\"referanceRange\":\"94 - 110 mEq / L\"}]', 0, '&lt;p&gt;Test is done on 9180 Electrolyte Analyzer.&lt;/p&gt;\r\n', 'Referance Range'),
(131, 'LIPID PROFILE', '[{\"fieldName\":\"Sr. Cholesterol \",\"normalRange\":\"Up to 260 mg / dl\"},{\"fieldName\":\" Sr. Triglycerides \",\"normalRange\":\"Up to 170 mg / dl\"},{\"fieldName\":\"HDL Cholesterol \",\"normalRange\":\"Male 35 - 80 mg/dl   Female 42 - 88mg/dl\"},{\"fieldName\":\"LDL Cholesterol \",\"normalRange\":\"Upto 150 mg / dl\"},{\"fieldName\":\"VLDL\",\"normalRange\":\"Upto 35 mg / dl\"},{\"fieldName\":\"Cholesterol / HDL\",\"normalRange\":\"5\"}]', 0, '&lt;p&gt;Risk factor for coronary diseases:&lt;br /&gt;\r\nSr. Cholesterol&lt;br /&gt;\r\nLow : &amp;lt;200 mg/dl Moderate: 200 -240 mg/dl High : &amp;gt;240 mg/dl&lt;br /&gt;\r\nSr. LDL Cholesterol&lt;br /&gt;\r\nLow : &amp;lt;130 mg/dl Moderate: 130-160 mg/dl High : &amp;gt;160 mg/dl&lt;br /&gt;\r\nCholesterol / HDL&lt;br /&gt;\r\nLow : &amp;lt;5.1 Moderate: 5.1-8 High : &amp;gt;8.1&lt;br /&gt;\r\nTest done on semi automated analyzer Micro Lab RX-50&lt;/p&gt;\r\n', 'Normal Range'),
(132, 'LIVER FUNCTION TESTS', '[{\"fieldName\":\"Bilirubin Total   \",\"normalRange\":\"0.1 - 1.0 mg / dl\"},{\"fieldName\":\"Bilirubin Direct   \",\"normalRange\":\" 0.1 - 0.4 mg / dl\"},{\"fieldName\":\" Bilirubin Indirect \",\"normalRange\":\" 0.1 - 0.7 mg / dl\"},{\"fieldName\":\" S.G.O.T.  \",\"normalRange\":\"Up to 37 U / L\"},{\"fieldName\":\" S.G.P.T. \",\"normalRange\":\"Up to 40 U / L\"},{\"fieldName\":\" Alkaline Phosphates \",\"normalRange\":\"80 - 290 U/L\"},{\"fieldName\":\"Total Proteins     \",\"normalRange\":\"6.0 – 8.0 gm / dl\"},{\"fieldName\":\"Albumin\",\"normalRange\":\"3.7 - 5.3 gm / dl\"},{\"fieldName\":\"Globulin\",\"normalRange\":\"2.3 - 3.6 gm / dl\"},{\"fieldName\":\"A / G Ratio  \",\"normalRange\":\"1.0 - 2.3\"}]', 0, '&lt;p&gt;Test done on semi automated analyzer&lt;/p&gt;\n', 'Normal Range'),
(133, 'RENAL PROFILE', '[{\"fieldName\":\" Blood Urea\",\"normalRange\":\" 14 - 40 mg/dl\"},{\"fieldName\":\" Blood Urea Nitrogen\",\"normalRange\":\"04 - 20 mg/dl\"},{\"fieldName\":\" S. Creatinine \",\"normalRange\":\"Male: 0.6 - 1.2 mg/dl   Female: 0.5 - 1.1 mg/dl\"},{\"fieldName\":\" S. Uric Acid \",\"normalRange\":\"Male: 3.4 – 7.0 mg/dl   Female: 2.5 – 6.0 mg/dl\"},{\"fieldName\":\" S. Calcium    \",\"normalRange\":\" 8.5 - 10.2 mg/dl\"},{\"fieldName\":\"  S.SODIUM  \",\"normalRange\":\"135 - 150 mEq/L\"},{\"fieldName\":\" S.POTASSIUM \",\"normalRange\":\"3.5 - 5.0 mEq/L\"},{\"fieldName\":\"S.CHLORIDES  \",\"normalRange\":\"94 - 110 mEq/L\"}]', 0, '&lt;p&gt;Test done on semi automated analyzer&lt;/p&gt;\r\n', 'Normal Range'),
(134, 'BLOOD GROUP & RH FACTOR', '[{\"fieldName\":\"Blood Group \"},{\"fieldName\":\"Rh factor \"}]', 0, '&lt;p&gt;METHOD: SLIDE AGGUTINATION&lt;/p&gt;\r\n', ''),
(135, 'HEPATITIS B VIRUS ANTIBODIES', '[{\"fieldName\":\"HBsAg\"}]', 0, '&lt;p&gt;Method: Rapid Card Test&lt;/p&gt;\r\n', ''),
(136, 'HIV I& II', '[{\"fieldName\":\"HIV Antibody \"}]', 0, '&lt;p&gt;Method: Spot Test TRI DOT for HIV I &amp;amp; II&lt;/p&gt;\r\n', ''),
(137, 'HEPATITIS C VIRUS ANTIBODIES', '[{\"fieldName\":\"HCV\"}]', 0, '&lt;p&gt;Method - Rapid Card Test&lt;/p&gt;\r\n', ''),
(138, 'VDRL', '[{\"fieldName\":\"VDRL\"}]', 0, '&lt;p&gt;Method - Rapid Card Test&lt;/p&gt;\r\n', ''),
(139, 'FASTING BLOOD SUGAR', '', 0, '&lt;p&gt;METHOD: Glucose Oxides Peroxides (GOD - POD).&lt;br /&gt;\r\nTest Done on Semi automated analyzer.&lt;/p&gt;\r\n', 'Normal Range'),
(140, 'POST PRANDIAL BLOOD SUGAR', '[{\"fieldName\":\"POST PRANDIAL BLOOD SUGAR\",\"normalRange\":\"70 - 140 mg/dL\"}]', 0, '&lt;p&gt;METHOD: Glucose Oxides Peroxides (GOD - POD).&lt;br /&gt;\r\nTest Done on Semi automated analyzer.&lt;/p&gt;\r\n', 'Normal Range'),
(141, 'RANDOM BLOOD SUGAR', '', 0, '&lt;p&gt;METHOD: Glucose Oxides Peroxides (GOD - POD).&lt;br /&gt;\r\nTest Done on Semi automated analyzer.&lt;/p&gt;\r\n', 'Normal Range'),
(142, 'COMPLETE BLOOD COUNT', '[{\"fieldName\":\"Haemoglobin\",\"referanceRange\":\"Male: 14 - 16 g%   Female: 12 - 14 g%\"},{\"fieldName\":\"Haemoglobin\",\"referanceRange\":\"Male: 14 - 16 g%   Female: 12 - 14 g%\"},{\"fieldName\":\"RBC Count  \",\"referanceRange\":\" 4.5-6.0 cells/mcL\"},{\"fieldName\":\"PCV\",\"referanceRange\":\"47 - 57 %\"},{\"fieldName\":\"RBC INDICES*\",\"units\":\"\",\"referanceRange\":\"\",\"normalRange\":\"\"},{\"fieldName\":\"MCV\",\"referanceRange\":\"82 - 92 cu.mm\"},{\"fieldName\":\"MCH\",\"referanceRange\":\"27 - 32 pg\"},{\"fieldName\":\"MCHC\",\"referanceRange\":\" 32-36 %\"},{\"fieldName\":\"TOTAL WBC COUNT*\",\"units\":\"\",\"referanceRange\":\"\",\"normalRange\":\"\"},{\"fieldName\":\"TOTAL WBC COUNT\",\"referanceRange\":\"4000 - 11000 / cu.mm\"},{\"fieldName\":\"Neutrophils\",\"referanceRange\":\"40 - 75 %\"},{\"fieldName\":\"Lymphocytes\",\"referanceRange\":\"20 - 45 %\"},{\"fieldName\":\"Eosinophils\",\"referanceRange\":\"01 - 06 %\"},{\"fieldName\":\"Monocytes\",\"referanceRange\":\"00 - 10 %\"},{\"fieldName\":\"Basophils\",\"referanceRange\":\"00 - 01 %\"},{\"fieldName\":\"PLATELETS*\",\"units\":\"\",\"referanceRang', 0, '&lt;p&gt;Test done on fully automated cell counter&lt;/p&gt;\r\n', 'Referance Range'),
(143, 'ERYTHROCYTE SEDIMENTATION RATE (ESR)', '[{\"fieldName\":\"  E.S.R. at the end of 1 hour  \",\"normalRange\":\"  0 - 20 mm at 1 hour\"}]', 0, '&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;Method - Wintergreens&lt;/p&gt;\r\n', 'Normal Range'),
(144, 'DENGUE –NS1 & IgG/ IgM', '[{\"fieldName\":\"Dengue\"},{\"fieldName\":\"Dengue\"},{\"fieldName\":\"Dengue\"}]', 0, '&lt;p&gt;METHOD: - ONE STEP DENGUE NS1 &amp;amp; IgG/IgM.&lt;/p&gt;\r\n', ''),
(145, 'MALARIA ANTIGEN', '[{\"fieldName\":\"  ICT for Malaria Parasite\"}]', 0, '&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;METHOD: RAPID ONE STEP MALARIA ANTIGEN RAPID TEST&lt;/p&gt;\r\n', ''),
(146, 'SMEAR FOR MALARIAL PARASITES', '[{\"fieldName\":\"result\"}]', 0, '&lt;p&gt;Method: Thin &amp;amp; Thick Smear.&lt;br /&gt;\r\nChances of detection are highest at the time of fever.&lt;br /&gt;\r\nInability to see parasite in peripheral smear does not rule out Malaria.&lt;br /&gt;\r\nSmears on 2 - 3 times may be required in few cases.&lt;/p&gt;\r\n', ''),
(147, ' PROTHROMBIN TIME & INR', '[{\"fieldName\":\"PROTHROMBIN TIME:\"},{\"fieldName\":\"CONTROL: -\"},{\"fieldName\":\"INR: -\"}]', 0, '', ''),
(148, 'A.P.T.T', '[{\"fieldName\":\"A.P.T.T\",\"normalRange\":\"22-35\"},{\"fieldName\":\"CONTROL :-\"}]', 0, '', ''),
(149, 'EXAMINATION OF BLOOD FOR PT & PTT', '[{\"fieldName\":\"PROTHROMBIN TIME\"},{\"fieldName\":\"PT\"},{\"fieldName\":\"INR\"},{\"fieldName\":\"Control\"},{\"fieldName\":\"ARTIAL THROMBPLASTIN TIME (PTT)*\",\"units\":\"\",\"referanceRange\":\"\",\"normalRange\":\"\"},{\"fieldName\":\"Test\"},{\"fieldName\":\"Control\"}]', 0, '', ''),
(150, ' BT & CT', '[{\"fieldName\":\"Bleeding Time\",\"normalRange\":\"2-5min.\"},{\"fieldName\":\"Clotting Time\",\"normalRange\":\"3-8min.\"}]', 0, '', 'Normal Range'),
(151, 'ROUTINE URINE EXAMINATION', '[{\"fieldName\":\"HYSICAL EXAMINATION*\",\"units\":\"\",\"referanceRange\":\"\",\"normalRange\":\"\"},{\"fieldName\":\"Quantity\"},{\"fieldName\":\"Color\"},{\"fieldName\":\"Appearance\"},{\"fieldName\":\"Deposit\"},{\"fieldName\":\"pH\"},{\"fieldName\":\"Specific Gravity \"},{\"fieldName\":\"CHEMICAL EXAMINATION*\",\"units\":\"\",\"referanceRange\":\"\",\"normalRange\":\"\"},{\"fieldName\":\"Proteins\"},{\"fieldName\":\"Sugar\"},{\"fieldName\":\"Ketone\"},{\"fieldName\":\" Occult Blood  \"},{\"fieldName\":\"Urobilinogen\"},{\"fieldName\":\"ICROSCOPIC EXAMINATION OF CENTRIFUGALISED DEPOSIT*\",\"units\":\"\",\"referanceRange\":\"\",\"normalRange\":\"\"},{\"fieldName\":\"Pus Cells \"},{\"fieldName\":\" Epithelial Cells   \"},{\"fieldName\":\"Red Blood Cells \"},{\"fieldName\":\"     Casts    \"},{\"fieldName\":\"        Crystals           \"},{\"fieldName\":\"Other Findings \"}]', 0, '', ''),
(152, 'ROUTINE STOOL EXAMINATION', '[{\"fieldName\":\"PHYSICAL EXAMINATION*\",\"units\":\"\",\"referanceRange\":\"\",\"normalRange\":\"\"},{\"fieldName\":\"Color\"},{\"fieldName\":\" Consistency Semi \"},{\"fieldName\":\"Mucus\"},{\"fieldName\":\"Blood\"},{\"fieldName\":\"Parasites\"},{\"fieldName\":\"HEMICAL EXAMINATION*\",\"units\":\"\",\"referanceRange\":\"\",\"normalRange\":\"\"},{\"fieldName\":\"Reaction\"},{\"fieldName\":\"Occult Blood\"},{\"fieldName\":\"                                MICROSCOPIC EXAMINATION*\",\"units\":\"\",\"referanceRange\":\"\",\"normalRange\":\"\"},{\"fieldName\":\"Ova\"},{\"fieldName\":\"Cysts\"},{\"fieldName\":\"  Red Blood Cells \"},{\"fieldName\":\"Epithelial Cells\"},{\"fieldName\":\"     Pus Cells \"},{\"fieldName\":\"Others      \"}]', 0, '', ''),
(153, 'Platelet Count', '[{\"fieldName\":\"Platelet Count\",\"normalRange\":\"150000 - 450000 / cu.mm\"}]', 0, '&lt;p&gt;Test done on fully automated cell counter.&lt;/p&gt;\r\n', 'Normal Range'),
(154, 'VITAMIN D TOTAL {25-OH VITAMIN D}', '', 0, '&lt;p&gt;Vitamin D is a steroid hormone known for its important role in regulating body&lt;br /&gt;\r\nlevels of calcium and phosphorus in the mineralization of bone. Measured 25-OH&lt;br /&gt;\r\nvitamin D includes D3 (Cholecalciferol) and D2 (Ergocalciferol) where D2 is&lt;br /&gt;\r\nabsorbed from food and D3 is produced by skin on exposure to sunlight, the major&lt;br /&gt;\r\nstorage from of vitamin D is 25-OH vitamin D And is present in the blood at up to&lt;br /&gt;\r\n1000 fold higher concentration compared to the active 1, 25-OH vitamin D and has&lt;br /&gt;\r\na longer half life making it an analytic of choice for determination of vitamin D&lt;br /&gt;\r\nstatus.&lt;br /&gt;\r\n1. Diagnosis of vitamin D deficiency.&lt;br /&gt;\r\n2. Differential diagnosis of cause of rickets and asteomalacia.&lt;br /&gt;\r\n3. Monitoring vitamin D replacement therapy.&lt;br /&gt;\r\n4. Diagnosis of hypervitaminosis D.&lt;/p&gt;\r\n', 'Units,Referance Range'),
(157, 'THYROID FUNCTION TEST', '[{\"fieldName\":\"Thyroid stimulating - Hormone (TSH)  (SANDWICH IMMUNODETECTION METHOD)\",\"units\":\"uIU/mL\"}]', 5000, '&lt;table border=&quot;1&quot; cellpadding=&quot;1&quot; cellspacing=&quot;1&quot; style=&quot;width:500px&quot;&gt;\r\n	&lt;tbody&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;&lt;strong&gt;Gestation &amp;amp; Childhood&lt;/strong&gt;&lt;/td&gt;\r\n			&lt;td&gt;Adult&amp;nbsp;&lt;/td&gt;\r\n			&lt;td&gt;&lt;strong&gt;Pregnancy&lt;/strong&gt;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;0 days &amp;ndash; 1.0-39.0&lt;/td&gt;\r\n			&lt;td&gt;&lt;strong&gt;55-87YRS &amp;ndash; 0.5-8.9 &lt;/strong&gt;1&amp;nbsp;&amp;nbsp;&lt;/td&gt;\r\n			&lt;td&gt;1st Trimester -0.3-4.5&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;5 days &amp;ndash; 1.7-9&lt;/td&gt;\r\n			&lt;td&gt;&lt;strong&gt;20-54yrs &amp;ndash; 0.4-4.2&lt;/strong&gt;&amp;nbsp;&amp;nbsp;&amp;nbsp;&lt;/td&gt;\r\n			&lt;td&gt;2nd Trimester &amp;ndash; 0.5-4.6&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;1yr &amp;ndash; 0.4-8.6&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n			&lt;td&gt;3rd Trimester &amp;ndash; 0.8-5.2&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;2yrs &amp;ndash; 0.4-7.6&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;3yrs &amp;ndash; 0.3-6.7&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n		&lt;tr&gt;\r\n			&lt;td&gt;4-19yrs &amp;ndash; 0.4-6.2&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n			&lt;td&gt;&amp;nbsp;&lt;/td&gt;\r\n		&lt;/tr&gt;\r\n	&lt;/tbody&gt;\r\n&lt;/table&gt;\r\n\r\n&lt;h2&gt;&lt;br /&gt;\r\nInterpretation:-&lt;/h2&gt;\r\n\r\n&lt;p&gt;Triiodothyronine T3 is a thyroid hormone. It affects almost every physiological process in the body, including growth, development, metabolism, body temperature And heart rate. Production of T3 and its Prohormone thyroxin (T4) is activate by thyroid- stimulating hormone (TSH), which is released from the pituitary gland. Elevated concentrations of T3 , and T4 in the blood inhibit the production of TSH.&lt;/p&gt;\r\n\r\n&lt;p&gt;Thyroxin T4, Thyroxin&amp;rsquo;s principal function is to stimulate the metabolism of all cells and tissues in the body, Excessive secretion of thyroxin in the body is hyperthyroidism, and deficient secretion is called hypothyroidism. Most of the thyroid hormone in blood is bound to transport proteins. Only a very small fraction of the circulating hormone is free and biologically active.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;In primary hypothyroidism, TSH levels are significantly elevated, while in secondary and tertiary hypothyroidism, TSH levels are low.&lt;/p&gt;\r\n', 'Units');

-- --------------------------------------------------------

--
-- Table structure for table `labtestrecord`
--

CREATE TABLE `labtestrecord` (
  `recordID` int(11) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `admissionID` int(11) NOT NULL,
  `performedTestID` int(11) NOT NULL,
  `labTestStatus` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `testResult` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `findings` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `assignedDate` date NOT NULL,
  `performedDate` date DEFAULT NULL,
  `performedBy` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charges` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `multivalues` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `labtestrecord`
--

INSERT INTO `labtestrecord` (`recordID`, `doctor_id`, `admissionID`, `performedTestID`, `labTestStatus`, `remark`, `testResult`, `findings`, `assignedDate`, `performedDate`, `performedBy`, `charges`, `multivalues`) VALUES
(3, 0, 6, 3, 'complete', '', '{\"field 5\":\"asdsa\",\"field 50\":\"asdas\"}', 'dkvmdsklml', '2022-01-13', '2022-01-13', 'new', '50', 0),
(5, 0, 6, 1, 'complete', NULL, '{\"field 1\":\"effective\",\"field 2\":\"52%\",\"field 3\":\"33/tabs down 100\"}', 'patient is highly unstable. requires immediate admission. must not be left in the open', '2022-01-13', '2022-01-31', 'Jagannath Porob', '1000', 0),
(6, 0, 6, 3, 'pending', NULL, NULL, NULL, '2022-01-13', NULL, NULL, '', 0),
(7, 0, 28, 1, 'pending', NULL, NULL, NULL, '2022-02-01', NULL, NULL, '', 0),
(8, 0, 28, 1, 'complete', NULL, '{\"field 1\":\"34\",\"field 2\":\"qwerty\",\"field 3\":\"34\"}', 'Patient Healthy', '2022-02-01', '2022-02-01', 'Jagannath Porob', '1000', 0),
(9, 0, 28, 3, 'pending', NULL, NULL, NULL, '2022-02-01', NULL, NULL, '3000', 0),
(10, 0, 28, 3, 'pending', NULL, NULL, NULL, '2022-02-01', NULL, NULL, '', 0),
(11, 0, 29, 1, 'complete', NULL, '{\"field 1\":\"500\",\"field 2\":\"0909\",\"field 3\":\"900\"}', 'patient is highly unstable. requires immediate admission. must not be left in the open', '2022-02-02', '2022-02-02', 'ABC DOCTOR', '1000', 0),
(12, 0, 6, 4, 'complete', NULL, '{\"Reading 1\":\"12345\",\"Reading 2\":\"ghg\",\"Reading 3\":\"sadfsg\"}', 'Happy', '2022-02-02', '2022-02-02', 'Jogus', '5000', 0),
(13, 0, 30, 4, 'complete', NULL, '{\"Reading 1\":\"qwerty\",\"Reading 2\":\"rtrty\",\"Reading 3\":\"23\"}', 'patient healthy', '2022-02-03', '2022-02-03', 'Mr xtyx', '5000', 0),
(14, 0, 30, 4, 'pending', NULL, NULL, NULL, '2022-02-03', NULL, NULL, '', 0),
(15, 0, 30, 4, 'pending', NULL, NULL, NULL, '2022-02-03', NULL, NULL, '', 0),
(16, 0, 30, 4, 'pending', NULL, NULL, NULL, '2022-02-03', NULL, NULL, '', 0),
(17, 0, 5, 5, 'pending', NULL, NULL, NULL, '2022-03-02', NULL, NULL, '', 0),
(18, 0, 5, 6, 'pending', NULL, NULL, NULL, '2022-03-02', NULL, NULL, '', 0),
(19, 0, 5, 75, 'complete', NULL, '{\"bagkar\":\"22\",\"bhavegsh\":\"10\",\"name*\":\"22\",\"lol\":\"20\"}', 'ttrtr', '2022-03-15', '2022-03-16', 'hello', '200', 0),
(20, 0, 5, 48, 'complete', NULL, '{\"Haemoglobin\":\"4.5\",\" RBC Count  \":null,\" PCV\":null,\"RBC INDICES            MCV\":\"20\",\"MCH\":\"33\",\"MCHC \":\"20\",\"Total WBC Count \":\"45\",\"Neutrophils\":\"30\",\"Lymphocytes\":\"20\",\"Eosinophils\":\"22\",\"Monocytes\":\"28\",\"Basophils\":\"39\",\"Platelet Count\":\"20\"}', 'Dr. amruta', '2022-03-16', '2022-03-16', 'Dr.Sneha', '0', 0),
(21, 0, 5, 40, 'complete', NULL, '{\" Blood Group\":null,\"Rh factor \":\"abc\"}', 'Dr. amruta', '2022-03-16', '2022-03-24', 'Dr.Sneha', '0', 0),
(22, 0, 5, 87, 'complete', NULL, '{\"[{\"fieldName\":\"bagkar\"\":null,\"\"units\":\"ml\"\":null,\"\"referanceRange\":\"20-300\"}]\":null}', 'ttrtr', '2022-03-23', '2022-03-24', 'hello', '100', 0),
(23, 0, 5, 89, 'pending', NULL, NULL, NULL, '2022-03-24', NULL, NULL, '', 0),
(24, 0, 6, 88, 'complete', NULL, '{\"[{\"fieldName\":\"test1234\"\":null,\"\"units\":\"%\"\":null,\"\"referanceRange\":\"3-4\"}\":null,\"\"no value*\"]\":null}', 'Dr. amruta', '2022-03-24', '2022-03-24', 'Dr.Sneha', '0', 0),
(25, 0, 6, 87, 'pending', NULL, NULL, NULL, '2022-03-24', NULL, NULL, '', 0),
(26, 0, 6, 88, 'pending', NULL, NULL, NULL, '2022-03-24', NULL, NULL, '', 0),
(27, 0, 6, 89, 'pending', NULL, NULL, NULL, '2022-03-24', NULL, NULL, '', 0),
(28, 0, 6, 87, 'pending', NULL, NULL, NULL, '2022-03-24', NULL, NULL, '', 0),
(29, 0, 6, 88, 'pending', NULL, NULL, NULL, '2022-03-24', NULL, NULL, '', 0),
(30, 0, 6, 89, 'pending', NULL, NULL, NULL, '2022-03-24', NULL, NULL, '', 0),
(31, 0, 5, 95, 'pending', NULL, NULL, NULL, '2022-03-24', NULL, NULL, '', 0),
(32, 0, 5, 95, 'pending', NULL, NULL, NULL, '2022-03-24', NULL, NULL, '', 0),
(33, 0, 5, 95, 'complete', NULL, '{\"test no value *\":\" \",\"test with value \":\"we\"}', 'we', '2022-03-24', '2022-03-27', 'we', '0', 0),
(34, 0, 5, 96, 'complete', NULL, '{\"[{\"fieldName\":\"with value 11\"\":null,\"\"units\":\"ml\"}\":null,\"{\"fieldName\":\"no value 22*\"\":null,\"\"units\":\"\"\":null,\"\"referanceRange\":\"\"\":null,\"\"normalRange\":\"\"}]\":null}', 'Dr. amruta', '2022-03-24', '2022-03-24', 'Dr.Sneha', '0', 0),
(35, 0, 5, 97, 'pending', NULL, NULL, NULL, '2022-03-27', NULL, NULL, '', 0),
(36, 0, 5, 112, 'complete', NULL, '{\"[{\"fieldName\":\"macbook air\"\":null,\"\"units\":\"rupees\"\":null,\"\"referanceRange\":\"60k-80k\"}\":null,\"{\"fieldName\":\"macbook pro*\"\":null,\"\"units\":\"\"\":null,\"\"referanceRange\":\"\"\":null,\"\"normalRange\":\"\"}]\":null}', 'Dr. amruta', '2022-03-27', '2022-03-27', 'Dr.Sneha', '30', 0),
(37, 0, 5, 112, 'pending', NULL, NULL, NULL, '2022-03-27', NULL, NULL, '', 0),
(38, 0, 5, 112, 'complete', NULL, '{\"macbook air\":\"70000\",\"macbook pro*\":\" \"}', 'Dr. amruta', '2022-03-27', '2022-03-27', 'Dr.Sneha', '30', 0),
(39, 0, 5, 114, 'complete', NULL, '{\"LACTATE DEHYDROGENASE (LDH)\":\"30\"}', 'Dr. Amruta', '2022-03-28', '2022-03-28', 'Dr. Twinkle', '0', 0),
(40, 0, 5, 114, 'complete', NULL, '{\"LACTATE DEHYDROGENASE (LDH)\":\"20\"}', 'Dr. amruta', '2022-03-28', '2022-03-28', 'Dr. Twinkle', '0', 0),
(41, 0, 5, 130, 'complete', NULL, '{\"Sodium\":\"30\",\"Potassium\":\"20\",\"Chlorides\":\"30\"}', 'Dr. amruta', '2022-03-28', '2022-03-28', 'Dr.Sneha', '0', 0),
(42, 0, 6, 154, 'pending', NULL, NULL, NULL, '2022-03-28', NULL, NULL, '', 0),
(43, 0, 5, 113, 'complete', NULL, '{\"Urine Pregnancy Test \":\"positive\"}', 'Dr. amruta', '2022-03-28', '2022-03-28', 'Dr.Sneha', '0', 0),
(44, 0, 6, 113, 'complete', NULL, '{\"Urine_Pregnancy_Test_\":\"negative\"}', 'Dr. amruta', '2022-03-28', '2022-03-28', 'Dr.Sneha', '0', 0),
(45, 0, 5, 119, 'complete', NULL, '{\"URIC_ACID\":\"12\"}', '121', '2022-03-31', '2022-04-25', 'Ajay', '0', 0),
(46, 0, 5, 120, 'pending', NULL, NULL, NULL, '2022-03-31', NULL, NULL, '', 0),
(47, 0, 5, 119, 'complete', NULL, '{\"URIC_ACID\":\"112\"}', 'test', '2022-03-31', '2022-04-25', 'ajay', '0', 0),
(48, 0, 5, 130, 'pending', NULL, NULL, NULL, '2022-03-31', NULL, NULL, '', 0),
(49, 0, 5, 124, 'pending', NULL, NULL, NULL, '2022-03-31', NULL, NULL, '', 0),
(50, 0, 9, 124, 'pending', NULL, NULL, NULL, '2022-03-31', NULL, NULL, '300', 0),
(51, 0, 9, 124, 'pending', NULL, NULL, NULL, '2022-03-31', NULL, NULL, '500', 0),
(52, 0, 9, 124, 'pending', NULL, NULL, NULL, '2022-03-31', NULL, NULL, '600', 0),
(53, 0, 9, 124, 'pending', NULL, NULL, NULL, '2022-03-31', NULL, NULL, '100', 0),
(54, 0, 5, 113, 'pending', NULL, NULL, NULL, '2022-04-02', NULL, NULL, '', 0),
(55, 7, 5, 117, 'pending', NULL, NULL, NULL, '2022-04-24', NULL, NULL, '', 0),
(56, 14, 46, 144, 'pending', NULL, NULL, NULL, '2022-04-25', NULL, NULL, '', 0),
(57, 14, 46, 121, 'pending', NULL, NULL, NULL, '2022-04-25', NULL, NULL, '', 0),
(58, 14, 46, 119, 'pending', NULL, NULL, NULL, '2022-04-25', NULL, NULL, '', 0),
(59, 7, 5, 119, 'pending', NULL, NULL, NULL, '2022-04-25', NULL, NULL, '', 0),
(60, 15, 48, 130, 'complete', NULL, '{\"Sodium\":\"12\",\"Potassium\":\"12\",\"Chlorides\":\"12\"}', '12', '2023-10-12', '2023-10-12', '12', '0', 0),
(61, 0, 48, 129, 'pending', NULL, NULL, NULL, '2023-10-12', NULL, NULL, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_table`
--

CREATE TABLE `medicine_table` (
  `code` int(11) NOT NULL,
  `medname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `medicine_table`
--

INSERT INTO `medicine_table` (`code`, `medname`) VALUES
(3, 'cyclopalm'),
(4, 'amoxyclav'),
(5, 'dolo 650'),
(6, 'dolo'),
(8, 'mepol 500');

-- --------------------------------------------------------

--
-- Table structure for table `nearbyambulance`
--

CREATE TABLE `nearbyambulance` (
  `id` int(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `number` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nearbyambulance`
--

INSERT INTO `nearbyambulance` (`id`, `Name`, `number`, `address`) VALUES
(5, 'district hospital', '9119440099', ''),
(6, 'husdvcasuyidbcasbdha', '123456787', ''),
(7, 'iasdbk', '78237482347', ''),
(8, 'Goa Medical College', '123456789', 'Anjuna'),
(9, 'Jagannath Porob', '07038544429', 'Gaunwaddi anjuna Bardez');

-- --------------------------------------------------------

--
-- Table structure for table `notification_detail`
--

CREATE TABLE `notification_detail` (
  `notification_id` int(11) NOT NULL,
  `notification_type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notification_message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_receipt` tinyint(4) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notification_detail`
--

INSERT INTO `notification_detail` (`notification_id`, `notification_type`, `notification_message`, `read_receipt`, `user_id`) VALUES
(1, 'admin', 'Test Notification To Admin.', 1, NULL),
(2, 'admin', 'Test Notification 2', 1, NULL),
(3, 'lab', 'Testing', 1, NULL),
(4, 'doctor', 'Appointment Assigned by admin for the date: 2022-04-22', 1, 7),
(5, 'doctor', 'Appointment Assigned by admin for the date: 2022-04-25', 1, 14),
(6, 'lab', 'New Lab Test Assigned by Doctor.', 1, 0),
(7, 'doctor', 'Appointment Assigned by admin for the date: 2022-04-25', 1, 14),
(8, 'lab', 'New Lab Test Assigned by Doctor.', 1, 0),
(9, 'doctor', 'Appointment Assigned by admin for the date: 2023-10-12', 0, 15),
(10, 'lab', 'New Lab Test Assigned by Doctor.', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patdischargesummary`
--

CREATE TABLE `patdischargesummary` (
  `unqID` int(11) NOT NULL,
  `admissionID` int(11) NOT NULL,
  `summary` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dischargeadvice` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patdischargesummary`
--

INSERT INTO `patdischargesummary` (`unqID`, `admissionID`, `summary`, `dischargeadvice`) VALUES
(1, 9, 'hnjhgjjjj', 'Keep visiting us..kynki...achcha lagta hai!!'),
(2, 48, 'dscma,cnmasc', 's,mcx am,s cx'),
(3, 49, 'sd cN', 'sc kJ');

-- --------------------------------------------------------

--
-- Table structure for table `patientadmission`
--

CREATE TABLE `patientadmission` (
  `unqId` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `admissionType` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `docID` int(11) NOT NULL,
  `wardNo` int(11) NOT NULL,
  `chiefComplaint` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dateofadmission` datetime NOT NULL,
  `dateofdischarge` datetime NOT NULL,
  `billAmount` int(11) NOT NULL,
  `advance_paid` int(11) NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'paid|pending|unpaid',
  `registration_fee` int(11) NOT NULL COMMENT 'charge per day',
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patientadmission`
--

INSERT INTO `patientadmission` (`unqId`, `uid`, `admissionType`, `docID`, `wardNo`, `chiefComplaint`, `dateofadmission`, `dateofdischarge`, `billAmount`, `advance_paid`, `status`, `registration_fee`, `package_id`) VALUES
(1, 0, 'ide', 0, 56, '', '2021-11-29 00:00:00', '0000-00-00 00:00:00', 0, 0, 'paid', 0, 0),
(2, 0, '', 0, 34, '', '2021-11-29 00:00:00', '0000-00-00 00:00:00', 0, 0, 'pending', 0, 0),
(3, 0, '', 0, 45, '', '2021-11-29 00:00:00', '0000-00-00 00:00:00', 0, 0, 'pending', 0, 0),
(4, 0, '', 0, 67, '', '2021-12-06 00:00:00', '0000-00-00 00:00:00', 0, 0, 'pending', 0, 0),
(5, 9, 'ide', 2, 23, '', '2021-12-06 00:00:00', '2021-12-08 00:00:00', 0, 0, 'paid', 0, 0),
(6, 9, 'ide', 2, 34, '', '2021-12-24 00:00:00', '0000-00-00 00:00:00', 0, 0, 'pending', 100, 0),
(7, 24, 'opd', 3, 33, '', '2022-01-05 00:00:00', '0000-00-00 00:00:00', 0, 0, 'pending', 450, 0),
(8, 24, 'ide', 4, 55, '', '2022-01-06 00:00:00', '0000-00-00 00:00:00', 0, 0, 'pending', 450, 0),
(9, 14, 'ide', 2, 96, 'Head Ache, Fever, Stomach Pain', '2022-01-06 00:00:00', '0000-00-00 00:00:00', 0, 0, 'pending', 450, 15),
(14, 0, 'ide', 4450, 2022, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 3000, 'pending', 450, 0),
(24, 0, '3', 207, 2022, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 1000, 'pending', 509, 0),
(25, 0, '2', 34, 2022, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 'pending', 12, 0),
(26, 6, 'opd', 2, 999, '', '2022-01-06 00:00:00', '2022-02-02 10:12:43', 0, 90909, 'paid', 9966, 0),
(27, 14, 'ide', 2, 999, '', '2022-01-06 00:00:00', '0000-00-00 00:00:00', 0, 90909, 'pending', 9966, 8),
(28, 26, 'ide', 7, 23, '', '2022-02-01 00:00:00', '2021-01-02 11:02:11', 0, 23, 'paid', 23, 0),
(29, 27, 'opd', 7, 34, '', '2022-02-02 00:00:00', '2022-02-02 09:46:56', 0, 10, 'paid', 800, 0),
(30, 28, 'opd', 7, 344, '', '2022-02-03 00:00:00', '2022-02-03 06:41:58', 0, 34, 'paid', 12, 0),
(31, 29, 'opd', 13, 21, '', '2022-03-30 00:00:00', '0000-00-00 00:00:00', 0, 0, 'pending', 300, 0),
(32, 29, 'opd', 1, 11, '', '2022-04-03 00:00:00', '0000-00-00 00:00:00', 0, 1000, 'pending', 100, 0),
(33, 35, 'opd', 1, 21, '', '2022-04-04 00:00:00', '0000-00-00 00:00:00', 0, 100, 'pending', 333, 0),
(34, 4, 'opd', 1, 121, '', '2022-04-19 13:33:00', '0000-00-00 00:00:00', 0, 10000, 'pending', 200, 0),
(35, 0, 'opd', 1, 455, '', '2022-04-22 10:06:15', '0000-00-00 00:00:00', 0, 100, 'pending', 200, 0),
(36, 0, 'opd', 1, 67, '', '2022-04-22 10:31:12', '0000-00-00 00:00:00', 0, 100, 'pending', 200, 0),
(37, 0, 'opd', 1, 224, '', '2022-04-22 10:34:08', '0000-00-00 00:00:00', 0, 177, 'pending', 200, 0),
(38, 0, 'opd', 1, 224, '', '2022-04-22 10:49:27', '0000-00-00 00:00:00', 0, 177, 'pending', 200, 0),
(39, 0, 'opd', 1, 12, '', '2022-04-22 10:49:49', '0000-00-00 00:00:00', 0, 12, 'pending', 200, 0),
(40, 0, 'opd', 1, 12, '', '2022-04-22 10:49:54', '0000-00-00 00:00:00', 0, 12, 'pending', 200, 0),
(41, 0, 'opd', 1, 12, '', '2022-04-22 10:50:22', '0000-00-00 00:00:00', 0, 200, 'pending', 20012, 0),
(42, 0, 'opd', 1, 12, '', '2022-04-22 10:52:11', '0000-00-00 00:00:00', 0, 12, 'pending', 200, 0),
(43, 0, 'opd', 1, 12, '', '2022-04-22 10:52:13', '0000-00-00 00:00:00', 0, 12, 'pending', 200, 0),
(44, 0, 'opd', 1, 121, '', '2022-04-22 10:59:58', '0000-00-00 00:00:00', 0, 500, 'pending', 2000, 0),
(45, 34, 'opd', 1, 12, '', '2022-04-22 14:47:04', '0000-00-00 00:00:00', 0, 100, 'pending', 200, 0),
(46, 36, 'ide', 1, 212, '', '2022-04-25 10:03:25', '0000-00-00 00:00:00', 0, 15, 'pending', 200, 8),
(47, 7, 'opd', 1, 23, 'pishi lagli', '2022-07-06 12:58:35', '0000-00-00 00:00:00', 0, 0, 'pending', 200, 0),
(48, 38, 'ide', 1, 23, 'Fever', '2023-10-12 15:49:39', '2023-10-12 21:14:27', 600, 200, 'paid', 200, 0),
(49, 38, 'opd', 1, 50, 'sncjdsnx', '2023-10-12 21:48:22', '2023-10-13 12:45:24', 6500, 200, 'paid', 200, 0),
(50, 38, 'opd', 1, 34, 'xyz', '2023-10-13 16:08:45', '2023-10-13 17:02:58', 1000, 100, 'paid', 200, 0);

-- --------------------------------------------------------

--
-- Table structure for table `patientoperation`
--

CREATE TABLE `patientoperation` (
  `operationID` int(11) NOT NULL,
  `patientID` int(11) NOT NULL,
  `docID` varchar(30) NOT NULL,
  `consultantID` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `ward` int(11) NOT NULL,
  `rno` int(11) NOT NULL,
  `opDate` date NOT NULL,
  `opTitle` varchar(50) NOT NULL,
  `opTime` varchar(6) NOT NULL,
  `consent` varchar(5) NOT NULL,
  `DAMA` varchar(5) NOT NULL,
  `pRNote` varchar(100) NOT NULL,
  `fCDate` varchar(15) NOT NULL,
  `patient_admission_id` int(15) NOT NULL,
  `operationFeeRecieved` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patientoperation`
--

INSERT INTO `patientoperation` (`operationID`, `patientID`, `docID`, `consultantID`, `code`, `ward`, `rno`, `opDate`, `opTitle`, `opTime`, `consent`, `DAMA`, `pRNote`, `fCDate`, `patient_admission_id`, `operationFeeRecieved`) VALUES
(1, 0, '4', 0, '', 0, 0, '2021-12-09', '2', '15:21', 'Yes', 'No', 'wahdgusdfldbzfiuafg', '2021-12-28', 0, 0),
(2, 0, '3', 0, '', 0, 0, '2022-01-01', '2', '08:29', 'Yes', 'Yes', 'nbkjbm mhn', '2021-12-28', 0, 0),
(3, 15, '1', 0, '', 0, 0, '2021-12-30', '3', '04:27', 'Yes', 'No', ' mnvhjv m/lkkn.', '2021-12-28', 0, 0),
(4, 13, '4', 2, '', 0, 0, '2021-12-28', '2', '05:49', 'Yes', 'Yes', 'wefsa', '2021-12-28', 6, 0),
(5, 14, '2', 0, '', 0, 0, '2021-12-28', '2', '18:03', 'Yes', 'Yes', 'hbubij', '2021-12-28', 0, 0),
(6, 9, '4', 0, '', 0, 0, '2021-12-29', '2', '23:09', 'Yes', 'Yes', 'viasbid', '2021-12-29', 0, 0),
(7, 15, '7', 0, '', 0, 0, '2021-12-29', '3', '00:33', 'Yes', 'No', 'hvjkjhm', '2021-12-29', 0, 0),
(8, 26, '7', 0, '', 0, 0, '2022-02-01', '2', '18:02', 'Yes', 'No', 'Operation Successful', '2022-02-01', 0, 0),
(9, 26, '7', 0, '6392', 23, 0, '2022-02-01', '2', '17:30', 'Yes', 'No', 'n bfcf bh uhb', '2022-02-01', 28, 0),
(10, 26, '7', 0, '9378', 23, 0, '2022-02-01', '2', '17:33', 'Yes', 'No', 'ezsgbhkl;', '2022-02-01', 28, 0),
(11, 26, '6', 7, '5714', 23, 0, '2022-02-01', '2', '17:43', 'Yes', 'No', 'nzxcgdsfchjdsfchjzdsfhfsgdbzxcgshcbzxvcghszfcghxzhckfghzd', '2022-02-01', 9, 0),
(12, 26, '2', 7, '530562', 43567, 0, '2022-02-01', '3', '17:09', 'Yes', 'Yes', 'bjhvgghbjhbvjhyudvbjhbvhjfbvhdbvhfdbvhfd', '2022-02-01', 9, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `patient_medical_files`
--

CREATE TABLE `patient_medical_files` (
  `file_id` int(11) NOT NULL,
  `file_title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_id` int(11) NOT NULL,
  `uploaded_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_medical_files`
--

INSERT INTO `patient_medical_files` (`file_id`, `file_title`, `file_url`, `patient_id`, `uploaded_at`) VALUES
(1, 'new title', '410009.barberi_logo-final.png', 27, '2022-02-02 00:00:00'),
(2, 'report 1', '703565.barberi_logo-final.png', 28, '2022-02-03 00:00:00'),
(3, 'Diabetes report', '434769.cd57ccf9-53fb-43f9-83f5-ddde68f12077.png', 29, '2022-03-29 00:00:00'),
(4, 'Test File', '628981.ecommerce-2140603_1920.jpg', 9, '2022-03-31 00:00:00'),
(5, 'Testing File', '638945.square-brochure-design-red-corporate-business-rectangle-template-brochure-report-catalog-magazine-brochure-layout-modern-triangle-shape-abstract-background-creative-brochure-vector-concept-400-107794477.jpg', 29, '2022-03-31 00:00:00'),
(6, 'Testing File', '532373.square-brochure-design-red-corporate-business-rectangle-template-brochure-report-catalog-magazine-brochure-layout-modern-triangle-shape-abstract-background-creative-brochure-vector-concept-400-107794477.jpg', 29, '2022-03-31 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `procedurelist`
--

CREATE TABLE `procedurelist` (
  `procedureID` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `charges` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `procedurelist`
--

INSERT INTO `procedurelist` (`procedureID`, `name`, `charges`) VALUES
(2, 'Pacemaker Surgery', 5000),
(3, 'Catract Operation', 7000);

-- --------------------------------------------------------

--
-- Table structure for table `sms_email_record`
--

CREATE TABLE `sms_email_record` (
  `sms_email_id` int(11) NOT NULL,
  `sms_email_type` int(11) NOT NULL,
  `sent_at` datetime NOT NULL,
  `remark` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_or_email` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms_email_record`
--

INSERT INTO `sms_email_record` (`sms_email_id`, `sms_email_type`, `sent_at`, `remark`, `sms_or_email`) VALUES
(1, 4, '2022-01-01 06:27:30', 'SMS sent successfully.', 'sms'),
(2, 4, '2022-01-01 06:32:41', 'SMS sent successfully.', 'sms'),
(3, 4, '2022-01-01 06:38:48', '', 'email'),
(4, 4, '2022-01-01 07:00:28', '', 'email'),
(5, 4, '2022-04-05 11:11:01', 'A', 'sms'),
(6, 4, '2022-04-05 11:11:36', 'A', 'sms'),
(7, 4, '2022-04-05 11:57:02', '', 'email');

-- --------------------------------------------------------

--
-- Table structure for table `staff_user`
--

CREATE TABLE `staff_user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff_user`
--

INSERT INTO `staff_user` (`id`, `username`, `password`, `updated_at`) VALUES
(1, 'staffuser', 'b27bf71540ad350c2166d45b1a00d93d', '');

-- --------------------------------------------------------

--
-- Table structure for table `tariff_category`
--

CREATE TABLE `tariff_category` (
  `tariff_cat_id` int(11) NOT NULL,
  `tariff_cat_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tariff_category`
--

INSERT INTO `tariff_category` (`tariff_cat_id`, `tariff_cat_name`) VALUES
(1, 'Tariff Card Of Hospital'),
(2, 'Phychiaty section'),
(3, 'Alcohol Detox Package');

-- --------------------------------------------------------

--
-- Table structure for table `tariff_class`
--

CREATE TABLE `tariff_class` (
  `tariff_class_id` int(11) NOT NULL,
  `tariff_class_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tariff_class`
--

INSERT INTO `tariff_class` (`tariff_class_id`, `tariff_class_name`) VALUES
(1, 'A'),
(2, 'B'),
(6, 'F'),
(7, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `tariff_room_info`
--

CREATE TABLE `tariff_room_info` (
  `tariff_room_id` int(11) NOT NULL,
  `tariff_cat_id` int(11) NOT NULL,
  `tariff_class_type_id` int(11) NOT NULL,
  `tariff_room_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tariff_room_fee` int(11) NOT NULL,
  `tariff_fee_distribution` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_fee_distributed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tariff_room_info`
--

INSERT INTO `tariff_room_info` (`tariff_room_id`, `tariff_cat_id`, `tariff_class_type_id`, `tariff_room_name`, `tariff_room_fee`, `tariff_fee_distribution`, `is_fee_distributed`) VALUES
(8, 1, 1, '   operationasdgjv', 3000, '', 1),
(14, 2, 1, ' operation', 1750, '', 0),
(15, 3, 2, '  1234bvgh', 3000, '[{\"hospitalisation\":\"10000\",\"medofficer\":\"5000\",\"nursing\":\"2500\"}]', 1),
(16, 2, 1, '   test edit again', 40000, '[{', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblcontactus`
--

CREATE TABLE `tblcontactus` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(12) DEFAULT NULL,
  `message` mediumtext DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT current_timestamp(),
  `AdminRemark` mediumtext DEFAULT NULL,
  `LastupdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `IsRead` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcontactus`
--

INSERT INTO `tblcontactus` (`id`, `fullname`, `email`, `contactno`, `message`, `PostingDate`, `AdminRemark`, `LastupdationDate`, `IsRead`) VALUES
(1, 'test user', 'test@gmail.com', 2523523522523523, ' This is sample text for the test.', '2019-06-29 19:03:08', 'Test Admin Remark', '2019-06-30 12:55:23', 1),
(2, 'Lyndon Bermoy', 'serbermz2020@gmail.com', 1111111111111111, ' This is sample text for testing.  This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing. This is sample text for testing.', '2019-06-30 13:06:50', 'Answered', '2020-07-05 02:13:25', 1),
(3, 'fdsfsdf', 'fsdfsd@ghashhgs.com', 3264826346, 'sample text   sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  sample text  ', '2019-11-10 18:53:48', 'vfdsfgfd', '2019-11-10 18:54:04', 1),
(4, 'demo', 'demo@gmail.com', 123456789, ' hi, this is a demo', '2020-07-05 01:57:20', 'answered', '2020-07-05 01:57:46', 1),
(5, 'Bhavesh Bagkar', 'bhaveshkar19@gmail.com', 9119440099, ' whjdvwefbhsdsjersedbvakerlwe', '2021-10-15 11:57:47', 'ok bye', '2021-10-15 11:58:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblmedicalhistory`
--

CREATE TABLE `tblmedicalhistory` (
  `ID` int(10) NOT NULL,
  `PatientID` int(10) DEFAULT NULL,
  `admissionID` int(11) NOT NULL,
  `doctorID` int(11) NOT NULL,
  `BloodPressure` varchar(200) DEFAULT NULL,
  `BloodSugar` varchar(200) NOT NULL,
  `BSType` varchar(30) NOT NULL,
  `Weight` varchar(100) DEFAULT NULL,
  `Temperature` varchar(200) DEFAULT NULL,
  `MedicalPres` longtext DEFAULT NULL,
  `doctorObservation` varchar(200) NOT NULL,
  `doctorDiagnosis` varchar(500) NOT NULL,
  `nurseNote` varchar(100) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmedicalhistory`
--

INSERT INTO `tblmedicalhistory` (`ID`, `PatientID`, `admissionID`, `doctorID`, `BloodPressure`, `BloodSugar`, `BSType`, `Weight`, `Temperature`, `MedicalPres`, `doctorObservation`, `doctorDiagnosis`, `nurseNote`, `CreationDate`) VALUES
(2, 3, 0, 0, '120/185', '80/120', '', '85 Kg', '101 degree', '#Fever, #BP high\r\n1.Paracetamol\r\n2.jocib tab\r\n', '', '', '', '2019-11-06 04:20:07'),
(3, 2, 0, 0, '90/120', '92/190', '', '86 kg', '99 deg', '#Sugar High\r\n1.Petz 30', '', '', '', '2019-11-06 04:31:24'),
(4, 1, 0, 0, '125/200', '86/120', '', '56 kg', '98 deg', '# blood pressure is high\r\n1.koil cipla', '', '', '', '2019-11-06 04:52:42'),
(5, 1, 0, 0, '96/120', '98/120', '', '57 kg', '102 deg', '#Viral\r\n1.gjgjh-1Ml\r\n2.kjhuiy-2M', '', '', '', '2019-11-06 04:56:55'),
(6, 4, 0, 0, '90/120', '120', '', '56', '98 F', '#blood sugar high\r\n#Asthma problem', '', '', '', '2019-11-06 14:38:33'),
(7, 5, 0, 0, '80/120', '120', '', '85', '98.6', 'Rx\r\n\r\nAbc tab\r\nxyz Syrup', '', '', '', '2019-11-10 18:50:23'),
(8, 7, 0, 0, '90/80', '99', '', '24', '91', 'Amoxyclav', '', '', '', '2021-09-24 09:41:01'),
(9, 8, 0, 0, '90/80', '99', '', '24', '91', '123', '', '', '', '2021-09-24 10:15:18'),
(10, 8, 0, 0, '90/80', '99', '', '24', '91', '2333rewf', '', '', '', '2021-09-24 10:15:37'),
(11, 4, 0, 0, 'xyz', '198', '', '45', '123', ' , test medicine , test , test medicine , test , test medicine , test , test medicine , test , test medicine , test , test medicine , test , test medicine', '', '', '', '2021-10-20 11:17:18'),
(12, 4, 0, 0, '120', '120', '', '45', '97', ' , test medicine , test', '', '', '', '2021-10-20 11:18:33'),
(13, 4, 0, 0, '122', '120', '', '50', '60%', 'erasdghj', '', '', '', '2021-11-03 07:11:10'),
(14, 4, 0, 0, '122', '120', '', '8', '88', 'asdfh', '', '', '', '2021-11-03 09:53:25'),
(15, 4, 0, 0, '122', '111', 'Type5', '34', '88', 'weffe', '', '', '', '2021-11-03 09:57:59'),
(16, 4, 0, 0, '111', '34', 'Type2', '32', '36', 'asdf', '', '', '', '2021-11-03 10:02:43'),
(17, 9, 0, 0, '30', '32', 'Type1', '34', '36', '38', '', '', '', '2021-11-03 10:03:25'),
(18, 4, 0, 0, '1234', '45', 'Type2', '67', '', '', '', '', '', '2021-11-15 12:41:54'),
(19, 4, 0, 0, '1234', '45', 'Type2', '67', '', '', '', '', '', '2021-11-15 12:41:54'),
(20, 4, 0, 0, '1234', '45', 'Type2', '67', '', '', '', '', '', '2021-11-15 12:41:54'),
(21, 4, 0, 0, '122', '32', 'Type4', '33', '34', 'sad', '', '', '', '2021-11-16 09:06:42'),
(22, 4, 0, 0, '122', '45', 'Type1', '67', '88', 'schg', '', '', '', '2021-11-16 09:33:28'),
(23, 9, 0, 0, '23', '23', 'Type3', '65', '23', ' , test', '', '', '', '2021-11-16 09:34:19'),
(24, 4, 0, 0, '122', '45', 'Type4', '67', '88', 'asdasdc', '', '', 'saasasa', '2021-11-16 09:35:38'),
(25, 9, 5, 0, '34', '34', 'Type4', '65', '12', ' , amoxyclav', '', '', '123', '2021-12-06 11:18:56'),
(26, 9, 5, 0, '23', '56', 'Type1', '65', '91', 'test medicine , cyclopalm , amoxyclav', '', '', 'qwertyuiop', '2021-12-06 11:19:02'),
(27, 4, 0, 0, '122', '120', 'Type1', '34', '88', 'k', '', '', ',m', '2021-11-22 10:05:51'),
(28, 4, 0, 0, '122', '80', 'Type6', '34', '36', 'm', '', '', 'tfghj', '2021-11-23 10:40:00'),
(29, 4, 0, 0, '122', '110', 'Type6', '50', '60%', 'uqdj', '', '', 'ashj', '2021-11-23 10:40:36'),
(30, 9, 0, 0, '23', '34', 'Type4', '56', '92', 'test medicine', '', '', 'test', '2021-11-24 11:59:05'),
(31, 9, 6, 0, '23', '23', 'BBF', '34', '45', 'cyclopalm', '', '', 'mcvzdjkfbkbdfj', '2022-01-20 06:52:30'),
(32, 9, 6, 0, '23', '198', 'PBF', '45', '123', 'cyclopalm,amoxyclav', '', '', 'bvghvgkckhgcghc', '2022-01-20 06:53:40'),
(33, 9, 6, 0, '150/60', '100', 'BBF', '67', '97', 'cyclopalm', '', '', 'test Notes', '2022-01-28 05:49:13'),
(34, 9, 6, 0, '23', '198', 'PBF', '45', '123', '[{\"medicineName\":\"dolo\",\"frequency\":\"1-0-1\",\"dosage\":\"100 mg\",\"period\":\"6 D\"},{\"medicineName\":\"amoxyclav\",\"frequency\":\"1-0-1\",\"dosage\":\"100 mg\",\"period\":\"6 D\"},{\"medicineName\":\"mepol 500\",\"frequency\":\"1-0-1\",\"dosage\":\"100 mg\",\"period\":\"4 D\"}]', '', '', 'Test', '2022-01-31 10:40:41'),
(35, 9, 6, 0, '23', '56', 'BBF', '45', '99', '[{\"medicineName\":\"cyclopalm\",\"frequency\":\"1-0-0\",\"dosage\":\"50 mg\",\"period\":\"10 days\"}]', '', '', 'nvgvhbvhgvhkghvkbvv', '2022-02-01 05:32:56'),
(36, 9, 6, 7, '23', '56', 'BBF', '89', '87', '[{\"medicineName\":\"amoxyclav\",\"frequency\":\"1-1-1\",\"dosage\":\"10 mg\",\"period\":\"2 days\"}]', 'xzxjk', 'chvncxcvnb', 'nnbxckjsz', '2022-02-01 06:14:10'),
(37, 26, 28, 7, '23', '198', 'PBF', '45', '97', '[{\"medicineName\":\"cyclopalm\",\"frequency\":\"1-0-0\",\"dosage\":\"100 mg\",\"period\":\"4 days\"},{\"medicineName\":\"amoxyclav\",\"frequency\":\"0-0-1\",\"dosage\":\"200 mg\",\"period\":\"6 days\"}]', 'Testing patient', 'Testing patient', 'Testing patient', '2022-02-01 07:36:05'),
(38, 26, 28, 7, '23', '198', 'BBF', '45', '123', '[{\"medicineName\":\"cyclopalm\",\"frequency\":\"1-1-0\",\"dosage\":\"300 mg\",\"period\":\"1day\"}]', 'test', 'test', 'test', '2022-02-01 07:57:40'),
(39, 27, 29, 7, '23', '56', 'PL', '34', '123', '[{\"medicineName\":\"cyclopalm\",\"frequency\":\"1-0-1\",\"dosage\":\"20 mg\",\"period\":\"100 Days\"},{\"medicineName\":\"amoxyclav\",\"frequency\":\"1-1-1\",\"dosage\":\"200 mg\",\"period\":\"50 Days\"}]', 'Testing Patient', 'Testing Patient', 'Testing Patient', '2022-02-02 06:36:08'),
(40, 28, 30, 7, '23', '34', 'BBF', '45', '67', '[{\"medicineName\":\"cyclopalm\",\"frequency\":\"1-0-1\",\"dosage\":\"10 mg\",\"period\":\"5 dys\"},{\"medicineName\":\"amoxyclav\",\"frequency\":\"1-0-1\",\"dosage\":\"10 mg\",\"period\":\"5 dys\"}]', 'vcsvhjdsvbnsx', 'bxchjsxbv', 'gsxfhjasfxhasfh', '2022-02-03 06:33:49'),
(41, 9, 0, 7, '23', '198', 'BBF', '45', '99', '[{\"medicineName\":\"cyclopalm\",\"start_from\":\"10: 21 Pm\",\"dosage\":\"20mg\",\"interval_hourly\":\"2\",\"prescription_type\":\"hourly_prescription\"}]', 'testing', 'testing', 'testing hourly prescription', '2022-02-23 06:52:02'),
(42, 9, 9, 7, '23', '23', 'BL', '45', '45', '[{\"medicineName\":\"cyclopalm\",\"frequency\":\"1-0-1\",\"dosage\":\"\",\"period\":\"3\",\"mealDetail\":\"Before Meal\",\"prescription_type\":\"general_prescription\"}]', 'test', 'test', 'test', '2022-07-21 10:17:43'),
(43, 9, 9, 7, '23', '198', 'BBF', '45', '123', '[{\"medicineName\":\"cyclopalm\",\"frequency\":\"1-0-1\",\"dosage\":\"\",\"period\":\"1\",\"mealDetail\":\"Before Meal\",\"prescription_type\":\"general_prescription\"}]', 'test', 'test', 'test', '2022-07-21 10:17:38'),
(44, 9, 5, 7, '23', '198', 'BBF', '34', '97', '[{\"medicineName\":\"cyclopalm\",\"start_from\":\"10 Am\",\"dosage\":\"30 mg\",\"interval_hourly\":\"2\",\"prescription_type\":\"hourly_prescription\"}]', 'test', 'test', 'test', '2022-02-24 05:20:56'),
(45, 9, 5, 7, '23', '198', 'BBF', '45', '123', '[{\"medicineName\":\"cyclopalm\",\"start_from\":\"9:30 AM\",\"dosage\":\"70 mg\",\"interval_hourly\":1,\"prescription_type\":\"hourly_prescription\"}]', 'test', 'test', 'test', '2022-02-25 06:05:32'),
(46, 9, 5, 7, '12', '12', 'PBF', '122', '22', '[{\"medicineName\":\"amoxyclav\",\"start_from\":\"11:30 AM\",\"dosage\":\"100mg\",\"interval_hourly\":2,\"prescription_type\":\"hourly_prescription\"}]', 'testtest', 'test', 'test', '2022-04-25 06:04:36'),
(47, 38, 48, 15, '110/80', '110', 'BBF', '72', '100', '[{\"medicineName\":\"Paracetamol\",\"frequency\":\"1-1-1\",\"dosage\":\"100mg\",\"period\":\"3 daya\",\"mealDetail\":\"Before Meal\",\"prescription_type\":\"general_prescription\"},{\"medicineName\":\"no worm\",\"frequency\":\"1-1-1\",\"dosage\":\"100mg\",\"period\":\"3 days\",\"mealDetail\":\"Before Meal\",\"prescription_type\":\"general_prescription\"}]', 'Patient is good!', 'Dengue tests required', 'no-notes', '2023-10-12 10:59:24'),
(48, 38, 48, 1, '110', '95', 'BBF', '72', '110', '', 'dvbdnvb', 'dvbdvb', 'ndvjdbvd', '2023-10-12 11:03:32'),
(49, 38, 0, 0, '110', '23', '', '23', '23', '', '', '', '', '2023-10-12 11:08:02'),
(50, 38, 0, 0, '55', '200', '', '90', '91', '', '', '', '', '2023-10-12 11:14:05'),
(51, 38, 48, 1, '120', '222', 'BBF', '22', '110', '', 'xcbjb', 'xcbLJZ', 'xcbjzxx', '2023-10-12 11:16:59'),
(52, 38, 49, 15, '34', '33', 'BBF', '33', '123', '[{\"medicineName\":\"cyclopalm\",\"frequency\":\"1-0-0\",\"dosage\":\"100 mg\",\"period\":\"2\",\"mealDetail\":\"After Meal\",\"prescription_type\":\"general_prescription\"}]', 'djcblks', 'sdcak', 'xcbzljs', '2023-10-12 16:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `ID` int(10) NOT NULL,
  `Docid` int(10) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `adharCardNo` varchar(15) NOT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext DEFAULT NULL,
  `Patientdob` date DEFAULT NULL,
  `PatientMedhis` mediumtext DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT current_timestamp(),
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`ID`, `Docid`, `PatientName`, `PatientContno`, `adharCardNo`, `PatientEmail`, `PatientGender`, `PatientAdd`, `Patientdob`, `PatientMedhis`, `CreationDate`, `UpdationDate`) VALUES
(1, 1, 'Manisha Jha', 4558968789, '0', 'test@gmail.com', 'Female', '\"\"J&K Block J-127, Laxmi Nagar New Delhi', '0000-00-00', 'She is diabetic patient', '2019-11-04 21:38:06', '2019-11-06 06:48:05'),
(4, 7, 'Manav Sharma', 9888988989, '0', 'sharma@gmail.com', 'Male', 'L-56,Ashok Nagar New Delhi-110096', '0000-00-00', 'He is long suffered by asthma', '2019-11-06 14:33:54', '2019-11-06 14:34:31'),
(5, 9, 'John', 1234567890, '0', 'john@test.com', 'male', 'Test ', '0000-00-00', 'THis is sample text for testing.', '2019-11-10 18:49:24', NULL),
(6, 0, 'Don Bermoy', 123456789, '0', 'serbermz2020@gmail.com', 'male', 'Surigao Philippines', '0000-00-00', 'Diagnosed of High Blood Pressure', '2020-07-05 02:08:09', NULL),
(7, 12, 'Twinkle bagkar', 8308534919, '0', 'testpatient@gmail.com', 'Female', 'H.No.128/9A, Datta Niwas , Bambolim - Goa', '0000-00-00', 'patient has cold and fever', '2021-09-24 09:39:35', '2021-09-24 10:16:53'),
(8, 12, 'Swizel Baretto', 8308534919, '0', 'testnew@gmail.com', 'Female', 'H.No.128/9A, Datta Niwas , Bambolim - Goa', '0000-00-00', 'Vitals Strong', '2021-09-24 10:14:30', '2021-09-24 10:16:45'),
(9, 7, 'bhavesh', 91194400989, '0', 'bhaveshkar19@gmail.com', 'male', 'H.no1162/a bagwada morjim pernem goa\r\nNear milagres church', '0000-00-00', 'nothing', '2021-10-15 06:03:16', '2022-04-24 16:26:59'),
(10, 7, 'twi', 9119440099, '0', 'php@gmail.com', 'Male', 'H.no1162/a bagwada morjim pernem goa\r\nNear milagres church', '0000-00-00', 'dsigf', '2021-10-15 11:52:52', '2021-10-15 11:54:42'),
(11, 1, 'bbabgde', 9119440099, '0', 'bhaveshkar19@gmail.com', 'male', 'H.no1162/a bagwada morjim pernem goa\r\nNear milagres church', '0000-00-00', 'asdfh', '2021-10-27 12:22:26', NULL),
(12, 1, 'bhavesh', 9119440099, '0', 'bhaveshkar19@gmail.com', 'male', 'H.no1162/a bagwada morjim pernem goa\r\nNear milagres church', '0000-00-00', 'qwe', '2021-10-27 12:24:13', NULL),
(13, 1, 'bhavesh', 9119440099, '0', 'bhaveshkar19@gmail.com', 'male', 'H.no1162/a bagwada morjim pernem goa\r\nNear milagres church', '0000-00-00', 'sedfg', '2021-10-27 12:29:01', NULL),
(14, 1, 'bhavesh', 9119440099, '0', 'bhaveshkar19@gmail.com', 'male', 'H.no1162/a bagwada morjim pernem goa\r\nNear milagres church', '0000-00-00', 'sac', '2021-10-27 12:32:29', NULL),
(15, 1, 'Twinkle Bagkar', 8308534919, '0', 't@t.com', 'female', 'Satt Adhar Arcade Mapusa Pedem - Goa\r\nbldg B1, flat no 302', '0000-00-00', 'Diagnosed with Sadness', '2021-11-26 12:23:38', NULL),
(16, 0, 'jagannath porob', 3344559, '123456789', 'porobjagannath@gmail.com', 'male', '', '0000-00-00', NULL, '2021-11-29 00:00:00', NULL),
(17, 2, 'rdgfc qwerty', 2334545667, '2147483647', 'weblozee@gmail.com', 'female', '', '0000-00-00', NULL, '2021-11-29 00:00:00', NULL),
(18, 2, 'rdgfc qwerty', 2334545667, '2147483647', 'weblozee@gmail.com', 'female', '', '0000-00-00', NULL, '2021-11-29 00:00:00', NULL),
(19, 2, 'qwerty lastname', 9049505435, '2147483647', 'twinklebagkar99@gmail.com', 'female', '', '0000-00-00', NULL, '2021-11-29 00:00:00', NULL),
(20, 2, 'qwerty lastname', 9049505435, '2147483647', 'twinklebagkar99@gmail.com', 'female', '', '0000-00-00', NULL, '2021-11-29 00:00:00', NULL),
(21, 2, 'testter tester', 989833392, '2147483647', 'tttt@tr.com', 'male', '', '0000-00-00', NULL, '2021-11-22 00:00:00', NULL),
(22, 3, 'dukar mujnaav', 6767676767, '2147483647', 'porobjagannath@gmail.com', 'male', '', '0000-00-00', NULL, '2021-11-29 00:00:00', NULL),
(23, 4, 'rdgfc lastname', 6565656565, '1234567890', 'weblozee@gmail.com', 'female', '', '0000-00-00', NULL, '2021-11-29 00:00:00', NULL),
(24, 1, 'ram', 9836732467, '0', 'bdfbvd@gmail.com', 'male', 'mapusa', '0000-00-00', 'no', '2022-01-05 09:34:26', NULL),
(25, 2, 'test', 9982123333, '12121', 'test@test.com', 'female', '', '0000-00-00', NULL, '2022-01-06 00:00:00', NULL),
(26, 7, 'Bhargav Chauhan', 23356789, '1234567890', 'bhargav@gmail.com', 'male', '', '0000-00-00', NULL, '2022-02-01 00:00:00', NULL),
(27, 7, 'Jhumla G.', 9987998700, '1234567890', 'jj@test.com', 'female', '', '0000-00-00', NULL, '2022-02-02 00:00:00', NULL),
(28, 7, 'Test User Today', 4545478903, '2147483647', 'testUserNew@gmail.com', 'female', '', '0000-00-00', NULL, '0000-00-00 00:00:00', NULL),
(29, 1, 'March', 8788599392, '0', 'patient@march2022.com', 'male', 'Anjuna', '0000-00-00', 'nothing', '2022-03-29 12:20:25', NULL),
(30, 1, 'April Testing', 8999052871, '1111222231', 'weblozee@123.com', 'male', '112, anjuna goa', '0000-00-00', 'Test', '2022-04-04 09:44:17', NULL),
(31, 1, 'April Testing', 8999052871, '1111222231', 'weblozee@123.com', 'male', '112, anjuna goa', '0000-00-00', 'Test', '2022-04-04 09:45:17', NULL),
(32, 1, 'testing april 2', 8788555949, '2147483647', 'inro@SDSD.COM', 'male', '22, housie', '0000-00-00', '21', '2022-04-04 10:20:09', NULL),
(33, 1, 'Testing Registration', 8877878765, '2147483647', 'porob@House.com', 'male', 'Test, Location', '0000-00-00', 'Testing registration with id', '2022-04-04 10:46:13', NULL),
(34, 1, 'testing registration 2 ', 8777888948, '214748364799', 'Test@yest.com', 'male', '12, huhuh.com', '0000-00-00', 'Test ', '2022-04-04 10:47:37', '2022-04-08 16:11:45'),
(35, 1, 'testing registration 3', 8777888948, '2147483647', 'porobjaga@hj.com', 'male', 'test', '0000-00-00', 'test', '2022-04-04 10:56:01', NULL),
(36, 1, 'April 2504', 8999052871, '112233313131', 'info@weblozee.com', 'male', '304, Saldanha Business Towers, Mapusa Goa.', '0000-00-00', 'Testing features', '2022-04-25 10:02:06', NULL),
(37, 1, 'Pranali', 9923561122, '22331212122221', 'pranali@weblozee.com', 'female', 'jai jai at mapusa goa', '2015-07-23', 'Fever', '2022-07-06 12:47:03', NULL),
(38, 1, 'Jagannath Porob', 7038544429, '123412341234', 'porobjagannath@gmail.com', 'male', 'Gaunwaddi anjuna Bardez\r\nnear bhumika temple', '1995-06-21', 'Dengue', '2023-10-12 10:18:25', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_logs`
--
ALTER TABLE `application_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fluidintakelog`
--
ALTER TABLE `fluidintakelog`
  ADD PRIMARY KEY (`logid`);

--
-- Indexes for table `laboratory`
--
ALTER TABLE `laboratory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorytestlist`
--
ALTER TABLE `laboratorytestlist`
  ADD PRIMARY KEY (`labFormID`);

--
-- Indexes for table `labtestrecord`
--
ALTER TABLE `labtestrecord`
  ADD PRIMARY KEY (`recordID`);

--
-- Indexes for table `medicine_table`
--
ALTER TABLE `medicine_table`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `nearbyambulance`
--
ALTER TABLE `nearbyambulance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification_detail`
--
ALTER TABLE `notification_detail`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `patdischargesummary`
--
ALTER TABLE `patdischargesummary`
  ADD PRIMARY KEY (`unqID`);

--
-- Indexes for table `patientadmission`
--
ALTER TABLE `patientadmission`
  ADD PRIMARY KEY (`unqId`);

--
-- Indexes for table `patientoperation`
--
ALTER TABLE `patientoperation`
  ADD PRIMARY KEY (`operationID`);

--
-- Indexes for table `patient_medical_files`
--
ALTER TABLE `patient_medical_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `procedurelist`
--
ALTER TABLE `procedurelist`
  ADD PRIMARY KEY (`procedureID`);

--
-- Indexes for table `sms_email_record`
--
ALTER TABLE `sms_email_record`
  ADD PRIMARY KEY (`sms_email_id`);

--
-- Indexes for table `staff_user`
--
ALTER TABLE `staff_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tariff_category`
--
ALTER TABLE `tariff_category`
  ADD PRIMARY KEY (`tariff_cat_id`);

--
-- Indexes for table `tariff_class`
--
ALTER TABLE `tariff_class`
  ADD PRIMARY KEY (`tariff_class_id`);

--
-- Indexes for table `tariff_room_info`
--
ALTER TABLE `tariff_room_info`
  ADD PRIMARY KEY (`tariff_room_id`);

--
-- Indexes for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `application_logs`
--
ALTER TABLE `application_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `doctorspecilization`
--
ALTER TABLE `doctorspecilization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fluidintakelog`
--
ALTER TABLE `fluidintakelog`
  MODIFY `logid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `laboratory`
--
ALTER TABLE `laboratory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laboratorytestlist`
--
ALTER TABLE `laboratorytestlist`
  MODIFY `labFormID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `labtestrecord`
--
ALTER TABLE `labtestrecord`
  MODIFY `recordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `medicine_table`
--
ALTER TABLE `medicine_table`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `nearbyambulance`
--
ALTER TABLE `nearbyambulance`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `notification_detail`
--
ALTER TABLE `notification_detail`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `patdischargesummary`
--
ALTER TABLE `patdischargesummary`
  MODIFY `unqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `patientadmission`
--
ALTER TABLE `patientadmission`
  MODIFY `unqId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `patientoperation`
--
ALTER TABLE `patientoperation`
  MODIFY `operationID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patient_medical_files`
--
ALTER TABLE `patient_medical_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `procedurelist`
--
ALTER TABLE `procedurelist`
  MODIFY `procedureID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sms_email_record`
--
ALTER TABLE `sms_email_record`
  MODIFY `sms_email_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `staff_user`
--
ALTER TABLE `staff_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tariff_category`
--
ALTER TABLE `tariff_category`
  MODIFY `tariff_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tariff_class`
--
ALTER TABLE `tariff_class`
  MODIFY `tariff_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tariff_room_info`
--
ALTER TABLE `tariff_room_info`
  MODIFY `tariff_room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblcontactus`
--
ALTER TABLE `tblcontactus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblmedicalhistory`
--
ALTER TABLE `tblmedicalhistory`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
