-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 06, 2024 at 04:12 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

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
-- Table structure for table `scholar_info`
--

CREATE TABLE `scholar_info` (
  `scholar_id` int(10) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `firstname` varchar(25) DEFAULT NULL,
  `middlename` varchar(25) DEFAULT NULL,
  `lastname` varchar(25) DEFAULT NULL,
  `suffix` text,
  `age` int(2) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `scholar_region` text,
  `presentaddress` text,
  `birthdate` date DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `phone_num` bigint(11) DEFAULT NULL,
  `telephone_number` int(15) DEFAULT NULL,
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
  `father_contactnum` bigint(11) DEFAULT NULL,
  `Father_Educ` varchar(45) DEFAULT NULL,
  `father_email` varchar(25) DEFAULT NULL,
  `motherstatus` varchar(45) DEFAULT NULL,
  `mother_fname` varchar(25) DEFAULT NULL,
  `mother_mname` varchar(25) DEFAULT NULL,
  `mother_lname` varchar(25) DEFAULT NULL,
  `mother_suffix` varchar(45) DEFAULT NULL,
  `mother_occupation` varchar(25) DEFAULT NULL,
  `mother_contactnum` bigint(11) DEFAULT NULL,
  `mother_email` varchar(25) DEFAULT NULL,
  `mother_Educ` varchar(45) DEFAULT NULL,
  `Course` text,
  `year_level` text,
  `primary_school` varchar(100) DEFAULT NULL,
  `primary_year_from` int(45) DEFAULT NULL,
  `primary_year_to` int(45) DEFAULT NULL,
  `primary_award` varchar(100) DEFAULT NULL,
  `secondary_school` varchar(100) DEFAULT NULL,
  `secondary_year_from` int(45) DEFAULT NULL,
  `secondary_award` varchar(100) DEFAULT NULL,
  `tertiary_school` varchar(100) DEFAULT NULL,
  `tertiary_year_from` int(45) DEFAULT NULL,
  `tertiary_year_to` int(45) DEFAULT NULL,
  `tertiary_award` varchar(100) DEFAULT NULL,
  `secondary_year_to` int(45) DEFAULT NULL,
  `remarks` text,
  `graduate` text,
  `graduated_at` text,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scholar_info`
--

INSERT INTO `scholar_info` (`scholar_id`, `user_id`, `firstname`, `middlename`, `lastname`, `suffix`, `age`, `gender`, `address`, `scholar_region`, `presentaddress`, `birthdate`, `email`, `phone_num`, `telephone_number`, `religion`, `citizenship`, `OFW_firstname`, `OFW_middlename`, `OFW_lastname`, `OFW_suffix`, `OFW_relationship`, `OFW_email`, `category`, `school`, `school_address`, `program`, `number_siblings`, `fatherstatus`, `father_fname`, `father_mname`, `father_lname`, `father_suffix`, `father_occupation`, `father_contactnum`, `Father_Educ`, `father_email`, `motherstatus`, `mother_fname`, `mother_mname`, `mother_lname`, `mother_suffix`, `mother_occupation`, `mother_contactnum`, `mother_email`, `mother_Educ`, `Course`, `year_level`, `primary_school`, `primary_year_from`, `primary_year_to`, `primary_award`, `secondary_school`, `secondary_year_from`, `secondary_award`, `tertiary_school`, `tertiary_year_from`, `tertiary_year_to`, `tertiary_award`, `secondary_year_to`, `remarks`, `graduate`, `graduated_at`, `deleted_at`) VALUES
(49, 8, 'Kouta', 'Michael B.', 'Aquilizan', '', 12, 'Male', 'Kapatiran St, Brgy. Camilmil', NULL, NULL, '2024-02-02', 'rikkunanase7@gmail.com', 998, NULL, NULL, NULL, 'Vince', 'Michael B.', 'Aquilizan', '', 's', 'onetaquilizan@yahoo.com', 'Land based', NULL, NULL, 'ODSP+', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Triggers `scholar_info`
--
DELIMITER $$
CREATE TRIGGER `update_status_from_terminated` AFTER INSERT ON `scholar_info` FOR EACH ROW UPDATE user_acc
SET account_status='activate'
WHERE USERID = NEW.user_id
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scholar_info`
--
ALTER TABLE `scholar_info`
  ADD PRIMARY KEY (`scholar_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scholar_info`
--
ALTER TABLE `scholar_info`
  MODIFY `scholar_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
