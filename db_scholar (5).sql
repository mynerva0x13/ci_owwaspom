-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 04:24 PM
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
-- Database: `db_scholar`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id_announcement` int(11) NOT NULL,
  `announcement_desc` text NOT NULL,
  `date_posted` timestamp NOT NULL DEFAULT current_timestamp(),
  `announcement_stat` varchar(25) NOT NULL,
  `author` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id_announcement`, `announcement_desc`, `date_posted`, `announcement_stat`, `author`) VALUES
(1, '<p><img src=\"http://localhost/ci_owwaspom/assets/images/uploads/image_65d3fcd9f06c0_1708391641.png\" style=\"width: 50%;\">Hello, Wor</p><p><br></p><p><br></p>', '2024-02-19 18:14:13', 'hidden', 'Vince M. Aquilizan'),
(2, '<p>Hess</p>', '2024-02-21 19:06:33', 'hidden', 'Aquilizan Kouta M');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `announcement_id` int(11) NOT NULL,
  `comment_text` text DEFAULT NULL,
  `comment_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `who_commented` text DEFAULT NULL,
  `comment_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `announcement_id`, `comment_text`, `comment_created_at`, `who_commented`, `comment_status`) VALUES
(22, 94, 'hello this is your scholar elcid', '2023-07-05 23:29:45', '22', 'unread'),
(23, 95, 'yes po\r\n', '2023-07-09 09:05:25', '22', 'unread'),
(24, 45, '`134', '2023-07-24 08:27:49', '22', 'unread'),
(25, 93, 'qwerty', '2023-07-24 08:28:50', '22', 'unread'),
(27, 97, '1234567', '2023-07-24 21:52:11', '312316', 'unread'),
(28, 99, 'w ertyu', '2023-10-11 01:13:07', '4', 'unread'),
(29, 99, 'hek', '2024-01-04 05:51:48', '22', 'unread'),
(41, 99, 'mama', '2024-01-05 06:01:10', '22', 'unread'),
(43, 99, 'mamamo', '2024-01-05 06:02:36', '22', 'unread'),
(45, 0, '\'sa\'', '0000-00-00 00:00:00', '\'22\'', '\'unread\''),
(46, 99, 'sa', '2024-01-05 06:23:38', '22', 'unread'),
(47, 99, 'sa', '2024-01-05 06:24:06', '22', 'unread'),
(48, 99, 'Hibiki Kuzw', '2024-01-05 06:24:14', '22', 'unread'),
(49, 99, 'Hello World', '2024-01-05 06:25:07', '22', 'unread'),
(50, 45, 'Ayumu Tamari', '2024-01-05 06:25:29', '22', 'unread'),
(51, 99, 'sa', '2024-01-07 01:37:03', '22', 'unread'),
(52, 99, 'Kua', '2024-01-17 01:07:20', '22', 'unread'),
(53, 103, 'hello', '2024-01-19 01:29:15', '312317', 'unread'),
(54, 103, 'Hello', '2024-01-19 01:41:10', '312317', 'unread'),
(55, 131, 'Hello', '2024-02-02 20:05:00', '312317', 'unread'),
(56, 131, 'Hello', '2024-02-02 20:06:45', '312317', 'unread'),
(57, 131, 'hi', '2024-02-02 20:22:41', '312317', 'unread'),
(58, 1, 'hello', '2024-02-19 18:14:40', '8', 'unread'),
(59, 1, 'Hello World', '2024-02-21 02:28:48', '8', 'unread'),
(60, 1, 'Hello', '2024-02-21 19:06:57', '8', 'unread'),
(61, 1, 'Hello', '2024-02-21 19:07:23', '8', 'unread'),
(62, 2, 'Hello 123', '2024-02-21 19:07:34', '8', 'unread'),
(63, 2, 'Hekki', '2024-02-21 19:08:00', '8', 'unread'),
(64, 2, 'Hello', '2024-02-21 19:12:11', '9', 'unread'),
(65, 2, 'sa', '2024-02-22 06:26:20', '9', 'unread'),
(66, 2, 'mo', '2024-02-22 06:26:34', '9', 'unread'),
(67, 2, 'mama', '2024-02-22 07:35:01', '9', 'unread'),
(68, 2, 'mama', '2024-02-22 07:36:06', '9', 'unread'),
(69, 2, 'mama', '2024-02-22 07:37:05', '9', 'unread'),
(70, 2, 'mama', '2024-02-22 07:37:29', '9', 'unread'),
(71, 1, 'mama', '2024-02-22 07:38:02', '9', 'unread'),
(72, 2, 's', '2024-02-22 07:38:49', '9', 'unread'),
(73, 2, 's', '2024-02-22 07:39:10', '9', 'unread');

-- --------------------------------------------------------

--
-- Table structure for table `graduated_scholar`
--

CREATE TABLE `graduated_scholar` (
  `id` int(11) NOT NULL,
  `name` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notification_id` int(11) NOT NULL,
  `catch_id` int(11) NOT NULL,
  `notification_type` text NOT NULL,
  `notification_message` varchar(100) NOT NULL,
  `notification_status` varchar(10) NOT NULL,
  `notification_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `notification_for` varchar(45) NOT NULL,
  `notif_creator` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notification_id`, `catch_id`, `notification_type`, `notification_message`, `notification_status`, `notification_date`, `notification_for`, `notif_creator`) VALUES
(1, 50, 'request', 'Aquilizan Kouta M has an edit request. Check and validate it now.', 'unread', '2024-02-15 01:35:39', 'Administrator', '49'),
(2, 52, 'request', 'Aquilizan Kouta M has an edit request. Check and validate it now.', 'unread', '2024-02-15 02:14:47', 'Administrator', '49'),
(3, 53, 'request', 'Aquilizan Kouta M has an edit request. Check and validate it now.', 'unread', '2024-02-15 02:17:59', 'Administrator', '49'),
(4, 54, 'request', 'Aquilizan Kouta M has an edit request. Check and validate it now.', 'unread', '2024-02-18 22:07:08', 'Administrator', '49'),
(5, 55, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'unread', '2024-02-18 23:54:20', 'Administrator', '49'),
(6, 56, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'unread', '2024-02-19 00:03:45', 'Administrator', '49'),
(7, 57, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'unread', '2024-02-19 00:04:11', 'Administrator', '49'),
(8, 0, 'request', 'Adminstrator has an edit your request. Check it.', 'read', '2024-02-19 01:11:45', '49', 'Administrator'),
(9, 54, 'request', 'Adminstrator has an edit your request. Check it.', 'unread', '2024-02-19 01:12:17', '49', 'Administrator'),
(10, 54, 'request', 'Adminstrator has an edit your request. Check it.', 'unread', '2024-02-19 01:12:35', '49', 'Administrator'),
(11, 54, 'request', 'Adminstrator has an edit your request. Check it.', 'unread', '2024-02-19 01:13:17', '49', 'Administrator'),
(12, 54, 'request', 'Adminstrator has an edit your request. Check it.', 'unread', '2024-02-19 01:13:19', '49', 'Administrator'),
(13, 54, 'request', 'Adminstrator has an edit your request. Check it.', 'unread', '2024-02-19 01:14:19', '49', 'Administrator'),
(14, 58, 'request', 'Aquilizan Kouta M has an edit request. Check and validate it now.', 'unread', '2024-02-19 01:44:08', 'Administrator', '49'),
(15, 59, 'request', 'Aquilizan Kouta M has an edit request. Check and validate it now.', 'unread', '2024-02-19 02:02:33', 'Administrator', '49'),
(16, 60, 'request', 'Aquilizan Kouta M has an edit request. Check and validate it now.', 'unread', '2024-02-19 02:08:32', 'Administrator', '49'),
(17, 60, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'unread', '2024-02-19 02:19:46', '49', 'Administrator'),
(18, 60, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'unread', '2024-02-19 02:19:53', '49', 'Administrator'),
(19, 61, 'request', 'Aquilizan Kouta M has an edit request. Check and validate it now.', 'unread', '2024-02-19 02:23:46', 'Administrator', '49'),
(20, 62, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'unread', '2024-02-19 02:28:14', 'Administrator', '49'),
(21, 63, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'unread', '2024-02-19 02:28:25', 'Administrator', '49'),
(22, 61, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'unread', '2024-02-19 02:28:55', '49', 'Administrator'),
(23, 59, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'unread', '2024-02-19 18:10:28', '49', 'Administrator'),
(24, 1, 'announcement', 'The Admin posted a new announcement. You can check and comment now.', 'unread', '2024-02-19 18:14:13', '', 'Vince M. Aquilizan'),
(25, 58, 'comment', 'Aquilizan Kouta M commented on your announcement. You can check and comment now.', 'unread', '2024-02-19 18:14:40', 'Administrator', 'Aquilizan Kouta M'),
(26, 59, 'comment', 'Aquilizan Kouta M commented on your announcement. You can check and comment now.', 'unread', '2024-02-21 02:28:48', 'Administrator', 'Aquilizan Kouta M'),
(27, 24, 'reply', ' Vince M. Aquilizan replied to your announcement. You can check and comment now.', 'unread', '2024-02-21 05:27:41', 'Administrator', 'Vince M. Aquilizan'),
(28, 64, 'request', 'Aquilizan Kouta M has an edit request. Check and validate it now.', 'unread', '2024-02-21 07:14:55', 'Administrator', '49'),
(29, 64, 'request', 'Adminstrator has an edit your request. Check it.', 'unread', '2024-02-21 07:16:13', '49', 'Administrator'),
(30, 65, 'request', 'Aquilizan Kouta M has an edit request. Check and validate it now.', 'unread', '2024-02-21 09:15:54', 'Administrator', '49'),
(31, 65, 'request', 'Adminstrator has an edit your request. Check it.', 'unread', '2024-02-21 09:17:30', '49', 'Administrator'),
(32, 66, 'request', 'Aquilizan Kouta M has an edit request. Check and validate it now.', 'unread', '2024-02-21 09:26:40', 'Administrator', '49'),
(33, 66, 'request', 'Adminstrator has an edit your request. Check it.', 'unread', '2024-02-21 09:32:19', '49', 'Administrator'),
(34, 67, 'request', 'Aquilizan Kouta M has an edit request. Check and validate it now.', 'unread', '2024-02-21 09:32:55', 'Administrator', '49'),
(35, 68, 'request', 'Aquilizan Kouta M has an edit request. Check and validate it now.', 'unread', '2024-02-21 09:36:37', 'Administrator', '49'),
(36, 68, 'request', 'Adminstrator has an edit your request. Check it.', 'unread', '2024-02-21 09:37:06', '49', 'Administrator'),
(37, 69, 'request', 'Aquilizan Kouta M has an edit request. Check and validate it now.', 'unread', '2024-02-21 09:39:52', 'Administrator', '49'),
(38, 69, 'request', 'Adminstrator has an edit your request. Check it.', 'unread', '2024-02-21 09:40:57', '49', 'Administrator'),
(39, 2, 'announcement', 'The Admin posted a new announcement. You can check and comment now.', 'unread', '2024-02-21 19:06:33', '', 'Aquilizan Kouta M'),
(40, 60, 'comment', 'Aquilizan Kouta M commented on your announcement. You can check and comment now.', 'unread', '2024-02-21 19:06:57', 'Administrator', 'Aquilizan Kouta M'),
(41, 61, 'comment', 'Aquilizan Kouta M commented on your announcement. You can check and comment now.', 'unread', '2024-02-21 19:07:23', 'Administrator', 'Aquilizan Kouta M'),
(42, 62, 'comment', 'Aquilizan Kouta M commented on your announcement. You can check and comment now.', 'unread', '2024-02-21 19:07:34', 'Administrator', 'Aquilizan Kouta M'),
(43, 63, 'comment', 'Aquilizan Kouta M commented on your announcement. You can check and comment now.', 'unread', '2024-02-21 19:08:00', 'Administrator', 'Aquilizan Kouta M'),
(44, 64, 'comment', 'Vince M. Aquilizan commented on your announcement. You can check and comment now.', 'unread', '2024-02-21 19:12:11', 'Administrator', 'Vince M. Aquilizan'),
(45, 70, 'request', 'Lynch Jermaine C has an edit request. Check and validate it now.', 'unread', '2024-02-22 01:13:42', 'Administrator', '66'),
(46, 71, 'request', 'Lynch Jermaine C has an edit request. Check and validate it now.', 'unread', '2024-02-22 01:40:27', 'Administrator', '66'),
(47, 72, 'request', 'Lynch Jermaine C has an edit request. Check and validate it now.', 'unread', '2024-02-22 01:46:42', 'Administrator', '66'),
(48, 73, 'request', 'Lynch Jermaine C has an edit request. Check and validate it now.', 'unread', '2024-02-22 01:46:58', 'Administrator', '66'),
(49, 70, 'request', 'Adminstrator has an edit your request. Check it.', 'read', '2024-02-22 04:55:00', '66', 'Administrator'),
(50, 25, 'reply', ' Vince M. Aquilizan replied to your announcement. You can check and comment now.', 'unread', '2024-02-22 06:13:22', 'Administrator', 'Vince M. Aquilizan'),
(51, 65, 'comment', 'Vince M. Aquilizan commented on your announcement. You can check and comment now.', 'unread', '2024-02-22 06:26:20', 'Administrator', 'Vince M. Aquilizan'),
(52, 66, 'comment', 'Vince M. Aquilizan commented on your announcement. You can check and comment now.', 'unread', '2024-02-22 06:26:34', 'Administrator', 'Vince M. Aquilizan'),
(53, 67, 'comment', 'Vince M. Aquilizan commented on your announcement. You can check and comment now.', 'unread', '2024-02-22 07:35:01', 'Administrator', 'Vince M. Aquilizan'),
(54, 68, 'comment', 'Vince M. Aquilizan commented on your announcement. You can check and comment now.', 'unread', '2024-02-22 07:36:06', 'Administrator', 'Vince M. Aquilizan'),
(55, 69, 'comment', 'Vince M. Aquilizan commented on your announcement. You can check and comment now.', 'unread', '2024-02-22 07:37:05', 'Administrator', 'Vince M. Aquilizan'),
(56, 70, 'comment', 'Vince M. Aquilizan commented on your announcement. You can check and comment now.', 'unread', '2024-02-22 07:37:29', 'Administrator', 'Vince M. Aquilizan'),
(57, 71, 'comment', 'Vince M. Aquilizan commented on your announcement. You can check and comment now.', 'unread', '2024-02-22 07:38:02', 'Administrator', 'Vince M. Aquilizan'),
(58, 72, 'comment', 'Vince M. Aquilizan commented on your announcement. You can check and comment now.', 'read', '2024-02-22 07:38:49', 'Administrator', 'Vince M. Aquilizan'),
(59, 73, 'comment', 'Vince M. Aquilizan commented on your announcement. You can check and comment now.', 'read', '2024-02-22 07:39:10', 'Administrator', 'Vince M. Aquilizan'),
(60, 74, 'request', 'Lynch Jermaine C has an edit request. Check and validate it now.', 'read', '2024-02-22 07:59:52', 'Administrator', '66'),
(61, 74, 'request', 'Adminstrator has an edit your request. Check it.', 'read', '2024-02-22 08:00:37', '66', 'Administrator'),
(62, 71, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'read', '2024-02-22 08:00:46', '66', 'Administrator'),
(63, 71, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'read', '2024-02-22 08:01:18', '66', 'Administrator'),
(64, 73, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'read', '2024-02-22 08:01:47', '66', 'Administrator'),
(65, 75, 'request', 'Lynch Jermaine C has an edit request. Check and validate it now.', 'read', '2024-02-22 08:03:04', 'Administrator', '66'),
(66, 75, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'read', '2024-02-22 08:03:19', '66', 'Administrator'),
(67, 76, 'request', 'Lynch Jermaine C has an edit request. Check and validate it now.', 'read', '2024-02-22 08:03:31', 'Administrator', '66'),
(68, 76, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'read', '2024-02-22 08:04:00', '66', 'Administrator'),
(69, 76, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'read', '2024-02-22 08:08:03', '66', 'Administrator'),
(70, 76, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'read', '2024-02-22 08:08:14', '66', 'Administrator'),
(71, 76, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'read', '2024-02-22 08:08:42', '66', 'Administrator'),
(72, 76, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'unread', '2024-02-22 08:08:45', '66', 'Administrator'),
(73, 76, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'unread', '2024-02-22 08:09:02', '66', 'Administrator'),
(74, 77, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'unread', '2024-02-22 08:19:48', 'Administrator', '66'),
(75, 78, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'unread', '2024-02-22 08:20:47', 'Administrator', '66'),
(76, 79, 'request', 'Vince M. Aquilizan has an edit request. Check and validate it now.', 'unread', '2024-02-22 08:23:34', 'Administrator', '66');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(11) NOT NULL,
  `commentid` int(11) DEFAULT NULL,
  `reply_text` text DEFAULT NULL,
  `reply_created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `who_reply` text DEFAULT NULL,
  `reply_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_id`, `commentid`, `reply_text`, `reply_created_at`, `who_reply`, `reply_status`) VALUES
(13, 22, 'yes\r\n', '2023-07-06 11:17:22', '22', 'read'),
(14, 25, 'wertyu', '2023-07-24 14:28:57', '22', 'read'),
(15, 25, 'qwfghjkl', '2023-07-24 14:29:42', '22', 'read'),
(16, 29, 'hello', '2024-01-05 13:00:50', '22', 'read'),
(17, 49, 'sa', '2024-01-05 14:05:53', '22', 'read'),
(18, 49, 'Yuuki', '2024-01-05 14:06:25', '22', 'read'),
(19, 49, 'mama', '2024-01-05 14:08:37', '22', 'read'),
(20, 49, 'Hello', '2024-01-17 08:05:05', '22', 'read'),
(21, 52, 'Hello, World', '2024-01-17 08:07:36', '22', 'read'),
(22, 55, 'kumusta', '2024-02-03 03:05:12', '312317', 'read'),
(23, 57, 'hello', '2024-02-03 03:43:48', '22', 'read'),
(24, 59, 'Hello world', '2024-02-21 12:27:41', '9', 'read'),
(25, 64, 'mm', '2024-02-22 13:13:22', '9', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `request_info`
--

CREATE TABLE `request_info` (
  `request_info_id` int(11) NOT NULL,
  `scholar_id` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `middlename` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `suffix` text NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `scholar_region` text NOT NULL,
  `presentaddress` text NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone_num` bigint(20) NOT NULL,
  `telephone_number` int(11) NOT NULL,
  `religion` varchar(45) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `OFW_firstname` varchar(45) NOT NULL,
  `OFW_middlename` varchar(45) NOT NULL,
  `OFW_lastname` varchar(45) NOT NULL,
  `OFW_suffix` varchar(10) NOT NULL,
  `OFW_relationship` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `school` varchar(70) NOT NULL,
  `school_address` varchar(70) NOT NULL,
  `program` varchar(5) NOT NULL,
  `number_siblings` varchar(2) NOT NULL,
  `fatherstatus` varchar(45) NOT NULL,
  `father_fname` varchar(25) NOT NULL,
  `father_mname` varchar(25) NOT NULL,
  `father_lname` varchar(25) NOT NULL,
  `father_suffix` varchar(10) NOT NULL,
  `father_occupation` varchar(25) NOT NULL,
  `father_contactnum` bigint(20) NOT NULL,
  `Father_Educ` varchar(45) NOT NULL,
  `father_email` varchar(25) NOT NULL,
  `motherstatus` varchar(45) NOT NULL,
  `mother_fname` varchar(25) NOT NULL,
  `mother_mname` varchar(25) NOT NULL,
  `mother_lname` varchar(25) NOT NULL,
  `mother_suffix` varchar(45) NOT NULL,
  `mother_occupation` varchar(25) NOT NULL,
  `mother_contactnum` bigint(20) NOT NULL,
  `mother_email` varchar(25) NOT NULL,
  `mother_Educ` varchar(45) NOT NULL,
  `Course` text NOT NULL,
  `year_level` text NOT NULL,
  `primary_school` varchar(100) NOT NULL,
  `primary_year_from` int(11) NOT NULL,
  `primary_year_to` int(11) NOT NULL,
  `primary_award` varchar(100) NOT NULL,
  `secondary_school` varchar(100) NOT NULL,
  `secondary_year_from` int(11) NOT NULL,
  `secondary_award` varchar(100) NOT NULL,
  `tertiary_school` varchar(100) NOT NULL,
  `tertiary_year_from` int(11) NOT NULL,
  `tertiary_year_to` int(11) NOT NULL,
  `tertiary_award` varchar(100) NOT NULL,
  `secondary_year_to` int(11) NOT NULL,
  `request_status` text NOT NULL,
  `request_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `request_info`
--

INSERT INTO `request_info` (`request_info_id`, `scholar_id`, `firstname`, `middlename`, `lastname`, `suffix`, `age`, `gender`, `address`, `scholar_region`, `presentaddress`, `birthdate`, `email`, `phone_num`, `telephone_number`, `religion`, `citizenship`, `OFW_firstname`, `OFW_middlename`, `OFW_lastname`, `OFW_suffix`, `OFW_relationship`, `category`, `school`, `school_address`, `program`, `number_siblings`, `fatherstatus`, `father_fname`, `father_mname`, `father_lname`, `father_suffix`, `father_occupation`, `father_contactnum`, `Father_Educ`, `father_email`, `motherstatus`, `mother_fname`, `mother_mname`, `mother_lname`, `mother_suffix`, `mother_occupation`, `mother_contactnum`, `mother_email`, `mother_Educ`, `Course`, `year_level`, `primary_school`, `primary_year_from`, `primary_year_to`, `primary_award`, `secondary_school`, `secondary_year_from`, `secondary_award`, `tertiary_school`, `tertiary_year_from`, `tertiary_year_to`, `tertiary_award`, `secondary_year_to`, `request_status`, `request_description`) VALUES
(54, 49, 'Kouta', 'Michael B.', 'Aquilizan', '', 12, '', 'Kapatiran St, Brgy. Camilmil', '', '', '2024-02-02', 'rikkunanase7@gmail.com', 998, 0, 'aa', 'x', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'accept', '1'),
(55, 49, 'Kouta', 'Michael B.', 'Aquilizan', '', 12, '', 'Kapatiran St, Brgy. Camilmil', '', '', '2024-02-02', 'rikkunanase7@gmail.com', 998, 0, 'aa', 'x', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'deny', '1'),
(56, 49, 'Kouta', 'Michael B.', 'Aquilizan', '', 12, '', 'Kapatiran St, Brgy. Camilmil', '', '', '2024-02-02', 'rikkunanase7@gmail.com', 998, 0, 'aa', 'x', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'deny', '1'),
(57, 49, 'Kouta', 'Michael B.', 'Aquilizan', '', 12, '', 'Kapatiran St, Brgy. Camilmil', '', '', '2024-02-02', 'rikkunanase7@gmail.com', 998, 0, 'aa', 'x', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'deny', '1'),
(59, 49, '', '', '', '', 0, '', '', '', '', '0000-00-00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', 'Samson Savage', 'Samson Savage', 'Xena Hernandez', 'Voluptatem', 'Omnis earum itaque q', 0, 'Facere enim vero dol', '', '', 'Nerea Emerson', 'Tatyana Greer', 'Evangeline Chan', 'Ipsa voluptatem De', 'Est aut eu error qui', 0, '', 'Omnis ipsum reicien', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'accept', '2'),
(60, 49, '', '', '', '', 0, '', '', '', '', '0000-00-00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '88', '', 'Carter Rivera', 'Carter Rivera', 'Gil Tanner', 'Velit sunt', 'Enim saepe dolor eaq', 0, 'Commodo officia veni', '', '', 'Reuben Castro', 'Alana Bradshaw', 'Benedict Chang', 'In natus adipisci ve', 'Deleniti cillum volu', 0, '', 'Ullam aliqua Molest', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'accept', '2'),
(61, 49, '', '', '', '', 0, '', '', '', '', '0000-00-00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', 'Corporis quis dolore', 1993, 2013, '', 'Corporis quis dolore', 1981, '', 'Ut rem quo officiis ', 1973, 2012, '', 1997, 'accept', '3'),
(62, 49, '', '', '', '', 0, '', '', '', '', '0000-00-00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', 'Corporis quis dolore', 2024, 2024, '', 'Corporis quis dolore', 2024, '', 'Ut rem quo officiis ', 2024, 2024, '', 2024, 'deny', '3'),
(63, 49, '', '', '', '', 0, '', '', '', '', '0000-00-00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', 'Corporis quis dolore', 2024, 2024, '', 'Corporis quis dolore', 2024, '', 'Ut rem quo officiis ', 2024, 2024, '', 2024, 'deny', '3'),
(64, 49, 'Kouta', 'Michael B.', 'Yuzuki', '\\\'\\\'', 0, '', 'Kapatiran St, Brgy. Camilmil', '', '', '2024-02-14', 'koutayuzuki565@gmail.com', 0, 0, '\\\'aa\\\'', '\\\'x\\\'', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'accept', '1'),
(65, 49, 'Kouta', 'Michael B.', 'Yuzuki', '\'\\\\\\\'\\\\\\\'\'', 0, '', 'Kapatiran St, Brgy. Camilmil', '', '', '2024-02-20', 'koutayuzuki565@gmail.com', 0, 0, '\'aa\'', '\'\\\\\\\'x\\\\\\\'\'', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'accept', '1'),
(66, 49, 'Kouta', 'Michael B.', 'Yuzuki', '\'\\\'\\\\\\\\\\\\\\\'\\\\\\\\\\\\\\\'\\\'\'', 0, '', 'Kapatiran St, Brgy. Camilmil', '', '', '2024-02-06', 'koutayuzuki565@gmail.com', 0, 0, '\'\\\'aa\\\'\'', '\'\\\'\\\\\\\\\\\\\\\'x\\\\\\\\\\\\\\\'\\\'\'', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'accept', '1'),
(67, 49, 'Kouta', 'Michael B.', 'Yuzuki', 'x', 0, '', 'Kapatiran St, Brgy. Camilmil', '', '', '2024-01-29', 'koutayuzuki565@gmail.com', 0, 0, 'x', 'x', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'deny', '1'),
(68, 49, 'Kouta', 'Michael B.', 'Aquilizan', 'x', 0, '', 'Kapatiran St, Brgy. Camilmil', '', '', '2024-02-21', 'rikkunanase7@gmail.com', 0, 0, 'x', 'x', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'accept', '1'),
(69, 49, 'Kouta', 'Michael B.', 'Yuzuki', 'x', 0, '', 'Kapatiran St, Brgy. Camilmil', '', '', '2024-02-21', 'koutayuzuki565@gmail.com', 0, 0, 'x', 'x', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'accept', '1'),
(70, 66, 'Vince', 'Michael B.', 'Aquilizan', 'Minim et quaerat qui', 62, '', 'Kapatiran St, Brgy. Camilmil', '', '', '2024-02-02', 'rikkunanase7@gmail.com', 9981760252, 0, 'Catholic', 'Filipino', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'accept', '1'),
(71, 66, '', '', '', '', 0, '', '', '', '', '0000-00-00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '12', '', 'Vince', 'Vince', 'Aquilizan', 'a', 'a', 0, 'a', '', '', 'Cole', 'Kirsten Collins', 'Atkins', 'Father', 'a', 0, '', 'a', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'accept', '2'),
(72, 66, '', '', '', '', 0, '', '', '', '', '0000-00-00', '', 0, 0, '', '', '', '', '', '', '', '', 'Kouta Michael B. Yuzuki', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '1st year', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'deny', '4'),
(73, 66, '', '', '', '', 0, '', '', '', '', '0000-00-00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', 's', 2024, 2024, '', 's', 2024, '', 's', 2024, 2024, '', 2024, 'accept', '3'),
(74, 66, 'Vince', 'Michael B.', 'Aquilizan', 'Minim et quaerat qui', 62, '', 'Kapatiran St, Brgy. Camilmil', '', '', '2024-02-02', 'rikkunanase7@gmail.com', 9981760252, 0, 'Catholic', 'Filipino', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'accept', '1'),
(75, 66, '', '', '', '', 0, '', '', '', '', '0000-00-00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '35', '', 'Francesca Dominguez', 'Francesca Dominguez', 'Melinda Perez', 'Ut vel ani', 'Impedit non veniam', 0, 'Voluptatum ratione d', '', '', 'Maia Snow', 'Bevis Mccarty', 'Jasmine Wooten', 'Atque consequatur b', 'Ut impedit debitis ', 0, '', 'Ullamco animi assum', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'accept', '2'),
(76, 66, '', '', '', '', 0, '', '', '', '', '0000-00-00', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '92', '', 'Charissa Dominguez', 'Charissa Dominguez', 'Laurel Parks', 'Amet vitae', 'Sit et similique bla', 0, 'Quis rerum sed commo', '', '', 'Emily Stewart', 'Kristen Irwin', 'Graham Burns', 'Beatae voluptatem pl', 'In nisi aut nisi rer', 0, '', 'Reprehenderit ex vo', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'accept', '2'),
(77, 66, '', '', '', '', 0, '', '', '', '', '0000-00-00', '', 0, 0, '', '', '', '', '', '', '', '', 'Kouta Michael B. Yuzuki', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '1st year', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'deny', '4'),
(78, 66, '', '', '', '', 0, '', '', '', '', '0000-00-00', '', 0, 0, '', '', '', '', '', '', '', '', 'Kouta Michael B. Yuzuki', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '1st year', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'deny', '4'),
(79, 66, '', '', '', '', 0, '', '', '', '', '0000-00-00', '', 0, 0, '', '', '', '', '', '', '', '', 'Kouta Michael B. Yuzuki', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '1st year', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, 'deny', '4');

-- --------------------------------------------------------

--
-- Table structure for table `scholartask`
--

CREATE TABLE `scholartask` (
  `id` int(10) UNSIGNED NOT NULL,
  `report_name` varchar(255) NOT NULL,
  `content` longblob NOT NULL,
  `docu_desc` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date_upload` datetime DEFAULT current_timestamp(),
  `sender` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholartask`
--

INSERT INTO `scholartask` (`id`, `report_name`, `content`, `docu_desc`, `size`, `type`, `date_upload`, `sender`) VALUES
(2, 'End of Semester', 0x3130393930312d3474682e6a706567, '3rd year 2nd sem', 79, 'image/jpeg', '2023-03-27 05:56:35', 109901),
(3, 'End of Semester', 0x3130393930312d3474682e6a706567, '2nd year 2nd sem', 79, 'image/jpeg', '2023-03-27 05:56:47', 109901),
(4, 'End of Semester', 0x3130393930312d6172742d61707072655f636861707465722d312e646f6378, '2nd year 2nd sem', 1104, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '2023-03-27 06:03:43', 109901),
(5, 'End of Semester', 0x3130393930312d6368696c6c2d63687269737469616e2d7226625f6c6f66692d706c61796c6973742df09f8c8c2e6d7033, '2nd year 2nd sem', 16844, 'audio/mpeg', '2023-04-01 09:46:59', 109901),
(6, 'Grades', 0x3130393930312d696e766974652e7a69702e6372646f776e6c6f6164, '1st year 1st sem', 1151, 'application/octet-stream', '2023-04-04 08:28:24', 109901),
(7, 'Grades', 0x3130393930312d3332353331343932355f3836303339343032383535303331345f353235323232393339353434323236393338315f6e2e6a7067, '3rd year 2nd sem', 859, 'image/jpeg', '2023-04-13 11:50:16', 109901),
(8, 'End of Semester', 0x3130393930312d61646d696e5f7363686f6c61725f696e666f726d6174696f6e2e706870, '2nd year 2nd sem', 7, 'application/octet-stream', '2023-05-04 10:22:20', 109901),
(9, 'Grades', 0x3130393930312d73637265656e73686f745f323032332d30352d30332d31332d34372d30352d37325f36383064303336373936303066376166306234633730306336623237306665372e6a7067, '4th year 3rd sem', 199, 'image/jpeg', '2023-05-04 11:17:02', 109901),
(10, 'Grades', 0x3130393930312d68617070792d6e616e6179732d6461792d706f2e707364, '3rd year 2nd sem', 13633, 'application/octet-stream', '2023-05-04 11:57:27', 109901);

-- --------------------------------------------------------

--
-- Table structure for table `scholar_info`
--

CREATE TABLE `scholar_info` (
  `scholar_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `firstname` varchar(25) DEFAULT NULL,
  `middlename` varchar(25) DEFAULT NULL,
  `lastname` varchar(25) DEFAULT NULL,
  `suffix` text DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `scholar_region` text DEFAULT NULL,
  `presentaddress` text DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone_num` bigint(20) DEFAULT NULL,
  `telephone_number` int(11) DEFAULT NULL,
  `religion` varchar(45) DEFAULT NULL,
  `citizenship` varchar(100) DEFAULT NULL,
  `OFW_firstname` varchar(45) DEFAULT NULL,
  `OFW_middlename` varchar(45) DEFAULT NULL,
  `OFW_lastname` varchar(45) DEFAULT NULL,
  `OFW_suffix` varchar(10) DEFAULT NULL,
  `OFW_relationship` varchar(45) DEFAULT NULL,
  `OFW_email` varchar(200) NOT NULL,
  `category` varchar(45) DEFAULT NULL,
  `school` varchar(70) DEFAULT NULL,
  `school_address` varchar(70) DEFAULT NULL,
  `program` varchar(5) DEFAULT NULL,
  `number_siblings` varchar(2) DEFAULT NULL,
  `fatherstatus` varchar(45) DEFAULT NULL,
  `father_fname` varchar(25) DEFAULT NULL,
  `father_mname` varchar(25) DEFAULT NULL,
  `father_lname` varchar(25) DEFAULT NULL,
  `father_suffix` varchar(10) DEFAULT NULL,
  `father_occupation` varchar(25) DEFAULT NULL,
  `father_contactnum` bigint(20) DEFAULT NULL,
  `Father_Educ` varchar(45) DEFAULT NULL,
  `father_email` varchar(25) DEFAULT NULL,
  `motherstatus` varchar(45) DEFAULT NULL,
  `mother_fname` varchar(25) DEFAULT NULL,
  `mother_mname` varchar(25) DEFAULT NULL,
  `mother_lname` varchar(25) DEFAULT NULL,
  `mother_suffix` varchar(45) DEFAULT NULL,
  `mother_occupation` varchar(25) DEFAULT NULL,
  `mother_contactnum` bigint(20) DEFAULT NULL,
  `mother_email` varchar(25) DEFAULT NULL,
  `mother_Educ` varchar(45) DEFAULT NULL,
  `Course` text DEFAULT NULL,
  `year_level` text DEFAULT NULL,
  `primary_school` varchar(100) DEFAULT NULL,
  `primary_year_from` int(11) DEFAULT NULL,
  `primary_year_to` int(11) DEFAULT NULL,
  `primary_award` varchar(100) DEFAULT NULL,
  `secondary_school` varchar(100) DEFAULT NULL,
  `secondary_year_from` int(11) DEFAULT NULL,
  `secondary_award` varchar(100) DEFAULT NULL,
  `tertiary_school` varchar(100) DEFAULT NULL,
  `tertiary_year_from` int(11) DEFAULT NULL,
  `tertiary_year_to` int(11) DEFAULT NULL,
  `tertiary_award` varchar(100) DEFAULT NULL,
  `secondary_year_to` int(11) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `graduate` text DEFAULT NULL,
  `graduated_at` timestamp NULL DEFAULT NULL,
  `terminated_at` timestamp NULL DEFAULT NULL,
  `request_status` varchar(100) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `scholar_info`
--

INSERT INTO `scholar_info` (`scholar_id`, `user_id`, `firstname`, `middlename`, `lastname`, `suffix`, `age`, `gender`, `address`, `scholar_region`, `presentaddress`, `birthdate`, `email`, `phone_num`, `telephone_number`, `religion`, `citizenship`, `OFW_firstname`, `OFW_middlename`, `OFW_lastname`, `OFW_suffix`, `OFW_relationship`, `OFW_email`, `category`, `school`, `school_address`, `program`, `number_siblings`, `fatherstatus`, `father_fname`, `father_mname`, `father_lname`, `father_suffix`, `father_occupation`, `father_contactnum`, `Father_Educ`, `father_email`, `motherstatus`, `mother_fname`, `mother_mname`, `mother_lname`, `mother_suffix`, `mother_occupation`, `mother_contactnum`, `mother_email`, `mother_Educ`, `Course`, `year_level`, `primary_school`, `primary_year_from`, `primary_year_to`, `primary_award`, `secondary_school`, `secondary_year_from`, `secondary_award`, `tertiary_school`, `tertiary_year_from`, `tertiary_year_to`, `tertiary_award`, `secondary_year_to`, `remarks`, `graduate`, `graduated_at`, `terminated_at`, `request_status`, `deleted_at`) VALUES
(66, 56, 'Vince', 'Michael B.', 'Aquilizan', 'Minim et quaerat qui', 62, 'Male', 'Kapatiran St, Brgy. Camilmil', NULL, NULL, '2024-02-02', 'rikkunanase7@gmail.com', 9981760252, NULL, 'Catholic', 'Filipino', 'Zephr', 'Xavier Crosby', 'Orr', 'Dolor volu', 'Ut enim et omnis con', 'xerar@mailinator.com', 'Land based', NULL, NULL, 'ODSP+', '92', NULL, 'Charissa Dominguez', 'Charissa Dominguez', 'Laurel Parks', 'Amet vitae', 'Sit et similique bla', NULL, 'Quis rerum sed commo', NULL, NULL, 'Emily Stewart', 'Kristen Irwin', 'Graham Burns', 'Beatae voluptatem pl', 'In nisi aut nisi rer', 0, NULL, 'Reprehenderit ex vo', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL),
(67, 58, 'pufan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-02-22 11:55:07', '', NULL);

--
-- Triggers `scholar_info`
--
DELIMITER $$
CREATE TRIGGER `update_status_from_terminated` AFTER INSERT ON `scholar_info` FOR EACH ROW UPDATE user_acc
SET account_status='activate'
WHERE USERID = NEW.user_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `terminated_scholar`
--

CREATE TABLE `terminated_scholar` (
  `ID` int(11) NOT NULL,
  `ID_scholar` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `middlename` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `suffix` text NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `presentaddress` text NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone_num` bigint(20) NOT NULL,
  `telephone_number` int(11) NOT NULL,
  `religion` varchar(45) NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `OFW_firstname` varchar(45) NOT NULL,
  `OFW_middlename` varchar(45) NOT NULL,
  `OFW_lastname` varchar(45) NOT NULL,
  `OFW_suffix` varchar(10) NOT NULL,
  `OFW_relationship` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `school` varchar(70) NOT NULL,
  `school_address` varchar(70) NOT NULL,
  `program` varchar(5) NOT NULL,
  `number_siblings` varchar(2) NOT NULL,
  `fatherstatus` varchar(45) NOT NULL,
  `father_fname` varchar(25) NOT NULL,
  `father_mname` varchar(25) NOT NULL,
  `father_lname` varchar(25) NOT NULL,
  `father_suffix` varchar(10) NOT NULL,
  `father_occupation` varchar(25) NOT NULL,
  `father_contactnum` bigint(20) NOT NULL,
  `Father_Educ` varchar(45) NOT NULL,
  `father_email` varchar(25) NOT NULL,
  `motherstatus` varchar(45) NOT NULL,
  `mother_fname` varchar(25) NOT NULL,
  `mother_mname` varchar(25) NOT NULL,
  `mother_lname` varchar(25) NOT NULL,
  `mother_suffix` varchar(45) NOT NULL,
  `mother_occupation` varchar(25) NOT NULL,
  `mother_contactnum` bigint(20) NOT NULL,
  `mother_email` varchar(25) NOT NULL,
  `mother_Educ` varchar(45) NOT NULL,
  `Course` text NOT NULL,
  `year_level` text NOT NULL,
  `primary_school` varchar(100) NOT NULL,
  `primary_year_from` int(11) NOT NULL,
  `primary_year_to` int(11) NOT NULL,
  `primary_award` varchar(100) NOT NULL,
  `secondary_school` varchar(100) NOT NULL,
  `secondary_year_from` int(11) NOT NULL,
  `secondary_award` varchar(100) NOT NULL,
  `tertiary_school` varchar(100) NOT NULL,
  `tertiary_year_from` int(11) NOT NULL,
  `tertiary_year_to` int(11) NOT NULL,
  `tertiary_award` varchar(100) NOT NULL,
  `secondary_year_to` int(11) NOT NULL,
  `terminated_at` datetime NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `terminated_scholar`
--

INSERT INTO `terminated_scholar` (`ID`, `ID_scholar`, `user_id`, `firstname`, `middlename`, `lastname`, `suffix`, `age`, `gender`, `address`, `presentaddress`, `birthdate`, `email`, `phone_num`, `telephone_number`, `religion`, `citizenship`, `OFW_firstname`, `OFW_middlename`, `OFW_lastname`, `OFW_suffix`, `OFW_relationship`, `category`, `school`, `school_address`, `program`, `number_siblings`, `fatherstatus`, `father_fname`, `father_mname`, `father_lname`, `father_suffix`, `father_occupation`, `father_contactnum`, `Father_Educ`, `father_email`, `motherstatus`, `mother_fname`, `mother_mname`, `mother_lname`, `mother_suffix`, `mother_occupation`, `mother_contactnum`, `mother_email`, `mother_Educ`, `Course`, `year_level`, `primary_school`, `primary_year_from`, `primary_year_to`, `primary_award`, `secondary_school`, `secondary_year_from`, `secondary_award`, `tertiary_school`, `tertiary_year_from`, `tertiary_year_to`, `tertiary_award`, `secondary_year_to`, `terminated_at`, `remarks`) VALUES
(10, 15, 312319, 'Jemuel', 'hector', 'Gallejo', '', 1, 'male', 'Naujan Oriental Mindoro', 'Lumangbayan Mindoro', '2019-02-06', '', 0, 0, '', '', ' ', '', '', '', '', 'Land', '', '', 'ODSP', '', 'Living', '', '', '', '', '', 0, '', '', 'Living', '', '', '', '', '', 0, '', '', '', '', 'AMS', 2023, 2023, '', 'OMNHS', 2023, '', 'City College Of Calapan', 2023, 2023, '', 2023, '2023-06-29 15:04:11', ''),
(20, 33, 312334, 'Alli', 'Junita', 'Mirasol', '', 21, '', 'Pachoca Calapan City Oriental Mindoro', '', '2023-06-15', 'admin@gmail.com', 9999999, 0, 'Christian', 'Filipino', '', '', '', '', '', '', '2345', '', 'ODSP', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', 'Doctor of Fine Arts.', '3rd year', '123', 2023, 2023, '', '12', 2023, '', '', 2023, 2023, '', 2023, '2023-07-08 17:17:15', ''),
(21, 5, 0, 'Ara', 'Marasigan', 'Cleofe', '', 0, 'female', 'guinobatan, calapan, Oriental mindoro', '', '2000-09-12', 'nico@piece.com', 2147483647, 0, '', '', '', '', '', '', '', '', 'city college', 'calapan', 'ODSP', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, '2023-07-08 17:22:25', ''),
(23, 7, 0, 'Samantha', 'Sy', 'Smith', '', 0, 'Female', 'Marinduque', '', '2020-11-10', 'sam@gmail.com', 2147483647, 0, '', '', '', '', '', '', '', '', 'University of Batangas', 'Batangas', 'EDSP', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', '', '', '', 0, 0, '', '', 0, '', '', 0, 0, '', 0, '2023-07-08 18:47:01', ''),
(24, 67, 312404, 'Mary', 'Mendoza', 'Marasigan', '', 19, '', 'Romblon', '', '2004-01-02', 'bunneycabel.gupit@gmail.com', 9564681215, 0, 'IMF', 'Filipino', '', '', '', '', '', '', '', '', 'ODSP', '', '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', 0, '', '', 'BSECE', '1st year', 'Romblon Elementary School', 2023, 2023, '', 'Romblon State University', 2023, '', 'Romblon State University', 2023, 2023, '', 2023, '2023-07-08 18:53:46', '');

--
-- Triggers `terminated_scholar`
--
DELIMITER $$
CREATE TRIGGER `update_status` AFTER INSERT ON `terminated_scholar` FOR EACH ROW UPDATE user_acc
SET account_status='deactivate'
WHERE USERID = NEW.user_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `upload_documents`
--

CREATE TABLE `upload_documents` (
  `document_id` int(11) NOT NULL,
  `document_name` varchar(200) NOT NULL,
  `document_size` varchar(200) NOT NULL,
  `document_description` varchar(200) NOT NULL,
  `date_submitted` varchar(200) NOT NULL,
  `document_status` varchar(300) NOT NULL,
  `report_sender` text NOT NULL,
  `year_level` text NOT NULL,
  `semester` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `upload_documents`
--

INSERT INTO `upload_documents` (`document_id`, `document_name`, `document_size`, `document_description`, `date_submitted`, `document_status`, `report_sender`, `year_level`, `semester`, `deleted_at`) VALUES
(12, 'Cursor-Arrow-PNG-Photos.png', '', 'Certificate of Grades', '2024-02-21 17:56:39', 'unread', '49', '1st year', '1st Semester', NULL),
(13, 'Cursor-Arrow-PNG-Photos (1).png', '', 'Certificate of Grades', '2024-02-22 10:18:41', 'unread', '66', '1st year', '1st Semester', '2024-02-22 12:14:44'),
(14, '423105785_7738480529498363_8454954821517838654_n.jpg', '', 'Certificate of Grades', '2024-02-22 13:16:21', 'unread', '66', '1st year', '1st Semester', '2024-02-22 12:16:37'),
(15, '423105785_7738480529498363_8454954821517838654_n.jpg', '', 'Certificate of Grades', '2024-02-22 13:16:37', 'unread', '66', '2nd year', '1st Semester', '2024-02-22 12:22:25'),
(16, '423105785_7738480529498363_8454954821517838654_n.jpg', '', 'Semestrial Report', '2024-02-22 13:22:21', 'unread', '66', '2nd year', '1st Semester', '2024-02-22 12:22:38'),
(17, '423105785_7738480529498363_8454954821517838654_n.jpg', '', 'Semestrial Report', '2024-02-22 13:22:25', 'unread', '66', '2nd year', '1st Semester', '2024-02-22 12:22:34'),
(18, '423105785_7738480529498363_8454954821517838654_n.jpg', '', 'Transcript Record', '2024-02-22 13:22:38', 'unread', '66', '2nd year', '1st Semester', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_acc`
--

CREATE TABLE `user_acc` (
  `USERID` int(11) NOT NULL,
  `NAME` varchar(90) NOT NULL,
  `username` varchar(90) NOT NULL,
  `account_password` varchar(90) NOT NULL,
  `TYPE` varchar(30) NOT NULL,
  `account_status` text NOT NULL,
  `account_approval` varchar(10) NOT NULL,
  `staff_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_acc`
--

INSERT INTO `user_acc` (`USERID`, `NAME`, `username`, `account_password`, `TYPE`, `account_status`, `account_approval`, `staff_address`) VALUES
(1, 'Aquilizan Kouta M', 'admin', 'admin', 'Administrator', 'active', 'accept', 'Mindoro Oriental'),
(2, 'Aquilizan Kouta M', 'rikkunanase7@gmail.com', 'KoutaODSP12', 'Scholar', 'active', '', 'Mindoro Oriental'),
(8, 'Aquilizan Kouta M', 'scholar', 'scholar', 'Scholar', 'activate', 'accept', 'Mindoro Oriental'),
(9, 'Vince M. Aquilizan', 'Staff', 'Staff', 'Staff', 'active', 'accept', 'Mindoro Oriental'),
(10, 'Yuzuki Kouta M', 'koutayuzuki565@gmail.com', 'KoutaODSP12', 'Scholar', 'deactivate', '', 'Mindoro Oriental'),
(11, 'Vince M. Aquilizan', 'onetaquilizan@yahoo.com', 'OWWA@parent123', 'Parent', 'active', '', 'Mindoro Oriental'),
(26, 'Aquilizan Vince M', 'docivibyd@mailinator.com', 'VinceEDSP67', 'Scholar', 'activate', 'deny', 'Mindoro Oriental'),
(27, 'Nathaniel Q. 1', 'terefojo@mailinator.com', 'OWWA@parent123', 'Parent', 'active', '', 'Mindoro Oriental'),
(28, 'Garner Jarrod S', 'viquvazo@mailinator.com', 'JarrodODSP41', 'Scholar', 'activate', 'accept', 'Marinduque'),
(29, 'Sandra L. Dixon', 'luku@mailinator.com', 'OWWA@parent123', 'Parent', 'active', '', 'Marinduque'),
(30, 'White Bianca S', 'rylop@mailinator.com', 'BiancaODSP46', 'Scholar', 'activate', 'deny', 'Mindoro Occidental'),
(31, 'Imelda B. Fernandez', 'gajar@mailinator.com', 'OWWA@parent123', 'Parent', 'active', '', 'Mindoro Occidental'),
(32, 'White Bianca S', 'rylop@mailinator.com', 'BiancaODSP46', 'Scholar', 'active', '', 'Mindoro Occidental'),
(33, 'Imelda B. Fernandez', 'gajar@mailinator.com', 'OWWA@parent123', 'Parent', 'active', '', 'Mindoro Occidental'),
(34, 'White Bianca S', 'rylopss@mailinator.com', 'BiancaEDSP46', 'Scholar', 'activate', 'deny', 'Mindoro Occidental'),
(35, 'Imelda B. Fernandez', 'gajar@mailinator.com', 'OWWA@parent123', 'Parent', 'active', '', 'Mindoro Occidental'),
(36, 'White Bianca S', 'rylooooopss@mailinator.com', 'BiancaEDSP46', 'Scholar', 'activate', 'deny', 'Mindoro Occidental'),
(37, 'Imelda B. Fernandez', 'gajar@mailinator.com', 'OWWA@parent123', 'Parent', 'active', '', 'Mindoro Occidental'),
(38, 'White Bianca S', 'rylooooopss@mailinator.com', 'BiancaEDSP46', 'Scholar', 'active', '', 'Mindoro Occidental'),
(39, 'Imelda B. Fernandez', 'gajar@mailinator.com', 'OWWA@parent123', 'Parent', 'active', '', 'Mindoro Occidental'),
(40, 'White Bianca S', 'rylooooffopss@mailinator.com', 'BiancaEDSP46', 'Scholar', 'activate', 'deny', 'Mindoro Occidental'),
(41, 'Imelda B. Fernandez', 'gajar@mailinator.com', 'OWWA@parent123', 'Parent', 'active', '', 'Mindoro Occidental'),
(42, 'White Bianca S', 'rylooooffopss@mailinator.com', 'BiancaEDSP46', 'Scholar', 'active', '', 'Mindoro Occidental'),
(43, 'Imelda B. Fernandez', 'gajar@mailinator.com', 'OWWA@parent123', 'Parent', 'active', '', 'Mindoro Occidental'),
(44, 'White Bianca S', 'rylooooffsdopss@mailinator.com', 'BiancaEDSP46', 'Scholar', 'activate', 'deny', 'Mindoro Occidental'),
(45, 'Imelda B. Fernandez', 'gajar@mailinator.com', 'OWWA@parent123', 'Parent', 'active', '', 'Mindoro Occidental'),
(46, 'White Bianca S', 'rylooooffsdosaspss@mailinator.com', 'BiancaEDSP46', 'Scholar', 'activate', 'deny', 'Mindoro Occidental'),
(47, 'Imelda B. Fernandez', 'gajar@mailinator.com', 'OWWA@parent123', 'Parent', 'active', '', 'Mindoro Occidental'),
(48, 'White Bianca S', 'rylooooffsdobhgsaspss@mailinator.com', 'BiancaELAP46', 'Scholar', 'activate', 'accept', 'Mindoro Occidental'),
(49, 'Imelda B. Fernandez', 'gajar@mailinator.com', 'OWWA@parent123', 'Parent', 'active', '', 'Mindoro Occidental'),
(50, 'Montgomery Ivy K', 'gaposoj@mailinator.com', 'IvyELAP4', 'Scholar', 'activate', '', 'Romblon'),
(51, 'Allistair L. Daugherty', 'xikotyz@mailinator.com', 'OWWA@parent123', 'Parent', 'active', '', 'Romblon'),
(52, 'Sloan Brittany A', 'fapaty@mailinator.com', 'BrittanyEDSP+36', 'Scholar', 'activate', '', 'Mindoro Occidental'),
(53, 'Dora L. Boyer', 'vekipew@mailinator.com', 'OWWA@parent123', 'Parent', 'active', '', 'Mindoro Occidental'),
(54, 'Aquilizan Vince M', 'rikkunanase7@gmail.com', 'VinceEDSP67', 'Scholar', 'activate', '', 'Mindoro Oriental'),
(55, 'Charles M. Savage', 'gycehumotu@mailinator.com', 'OWWA@parent123', 'Parent', 'active', '', 'Mindoro Oriental'),
(56, 'Lynch Jermaine C', 'sorivudalu@mailinator.com', 'JermaineODSP+62', 'Scholar', 'activate', 'accept', 'Mindoro Oriental'),
(57, 'Zephr X. Orr', 'xerar@mailinator.com', 'OWWA@parent123', 'Parent', 'active', '', 'Mindoro Oriental'),
(58, 'pufan', 'kisymyde@mailinator.com', 'ac748cb38ff28d1ea98458b16695739d7e90f22d', 'Administrator', 'activate', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id_announcement`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `comment_id` (`commentid`);

--
-- Indexes for table `request_info`
--
ALTER TABLE `request_info`
  ADD PRIMARY KEY (`request_info_id`);

--
-- Indexes for table `scholartask`
--
ALTER TABLE `scholartask`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scholar_info`
--
ALTER TABLE `scholar_info`
  ADD PRIMARY KEY (`scholar_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `terminated_scholar`
--
ALTER TABLE `terminated_scholar`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `upload_documents`
--
ALTER TABLE `upload_documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `user_acc`
--
ALTER TABLE `user_acc`
  ADD PRIMARY KEY (`USERID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id_announcement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notification_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `request_info`
--
ALTER TABLE `request_info`
  MODIFY `request_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `scholartask`
--
ALTER TABLE `scholartask`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `scholar_info`
--
ALTER TABLE `scholar_info`
  MODIFY `scholar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `upload_documents`
--
ALTER TABLE `upload_documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user_acc`
--
ALTER TABLE `user_acc`
  MODIFY `USERID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`commentid`) REFERENCES `comments` (`comment_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
