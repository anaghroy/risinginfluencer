-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2024 at 06:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaign_form`
--

CREATE TABLE `campaign_form` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phoneno` bigint(11) NOT NULL,
  `objective` text NOT NULL,
  `platform` varchar(20) NOT NULL,
  `campaign_type` varchar(20) NOT NULL,
  `influencer_type` varchar(20) NOT NULL,
  `budget` decimal(10,2) NOT NULL,
  `about_yourself` text NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campaign_form`
--

INSERT INTO `campaign_form` (`id`, `name`, `brand`, `email`, `phoneno`, `objective`, `platform`, `campaign_type`, `influencer_type`, `budget`, `about_yourself`, `submission_date`) VALUES
(1, 'ANAGH ROY', 'budding', 'royanagh1999@gmail.com', 916900756340, 'skincare', 'facebook', 'product', 'micro', 200000.00, 'testing', '2024-04-02 06:20:16'),
(2, 'aditi adak', 'budding1', 'royanagh2000@gmail.com', 916900756340, 'skincare', 'youtube', 'paid', 'celebrity', 298600.00, 'testing1', '2024-04-02 06:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `username`, `email`, `password`) VALUES
(2, 'a3', 'r@gmail.com', 'r@gmail.com'),
(53, 'anagh', 'anagh@yahoo.com', 'vcxzxcxc@12');

-- --------------------------------------------------------

--
-- Table structure for table `employment`
--

CREATE TABLE `employment` (
  `id` int(1) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phoneno` bigint(11) DEFAULT NULL,
  `street` varchar(100) NOT NULL,
  `apt` varchar(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `citizen` varchar(3) NOT NULL,
  `nocitizen` varchar(3) NOT NULL,
  `company` varchar(10) NOT NULL,
  `year` year(4) NOT NULL,
  `employed` varchar(3) NOT NULL,
  `employe_contact` varchar(3) NOT NULL,
  `employment_type` text NOT NULL,
  `highschool_name` varchar(100) NOT NULL,
  `highschool_address` varchar(100) NOT NULL,
  `graduated` varchar(3) NOT NULL,
  `college_name` varchar(100) NOT NULL,
  `college_address` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_address` varchar(100) NOT NULL,
  `supervisor_name_title` varchar(100) NOT NULL,
  `starting_salary` bigint(11) NOT NULL,
  `ending_salary` bigint(11) NOT NULL,
  `responsibilities` text NOT NULL,
  `reason_for_leaving` varchar(50) NOT NULL,
  `previous_supervisor_contact` text NOT NULL,
  `acknowledgement` varchar(3) NOT NULL,
  `authorize_investigation` varchar(3) NOT NULL,
  `false_information_consequences` varchar(3) NOT NULL,
  `digital_document_type` varchar(50) NOT NULL,
  `digital_document_upload` longblob NOT NULL,
  `digital_signature_upload` longblob NOT NULL,
  `about_yourself` longtext NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employment`
--

INSERT INTO `employment` (`id`, `firstname`, `lastname`, `email`, `phoneno`, `street`, `apt`, `state`, `country`, `position`, `citizen`, `nocitizen`, `company`, `year`, `employed`, `employe_contact`, `employment_type`, `highschool_name`, `highschool_address`, `graduated`, `college_name`, `college_address`, `company_name`, `company_address`, `supervisor_name_title`, `starting_salary`, `ending_salary`, `responsibilities`, `reason_for_leaving`, `previous_supervisor_contact`, `acknowledgement`, `authorize_investigation`, `false_information_consequences`, `digital_document_type`, `digital_document_upload`, `digital_signature_upload`, `about_yourself`, `submission_date`) VALUES
(44, 'ANAGH', 'ROY', 'royanagh1999@gmail.com', 916900756340, 'mission', '12/63c', 'bihar', 'India', 'Software Engineer', 'Yes', 'Yes', 'Yes', '2000', 'Yes', 'Yes', 'Part-time', 'the little star', 'mission', 'Yes', 'arts', 'mission', 'budding influencers', 'mission', 'manager', 20000, 50000, 'managers', 'Retired', 'on', 'Yes', 'Yes', 'Yes', 'aadhaar card', 0x443a78616d70706874646f6373526973696e6720696e666c75656e6365722077656273697465414e4147485f30312e706466, 0x443a78616d70706874646f6373526973696e6720696e666c75656e6365722077656273697465414e4147485f30312e706466, 'ttesting', '2024-03-30 12:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `influencer_form`
--

CREATE TABLE `influencer_form` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneno` bigint(11) NOT NULL,
  `whatsappno` bigint(11) NOT NULL,
  `instagram` blob NOT NULL,
  `followers` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `full_frame_photo` longblob NOT NULL,
  `close_frame_photo` longblob NOT NULL,
  `about_yourself` longtext NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `influencer_form`
--

INSERT INTO `influencer_form` (`id`, `firstname`, `lastname`, `email`, `phoneno`, `whatsappno`, `instagram`, `followers`, `category`, `location`, `address`, `full_frame_photo`, `close_frame_photo`, `about_yourself`, `submission_date`) VALUES
(20, 'ANAGH', 'ROY', 'royanagh1999@gmail.com', 916900756340, 6900756340, 0x4172726179, 200036, 'beauty influencer', 'delhi', '', 0x4172726179, 0x4172726179, 'tresting', '2024-03-31 07:17:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `campaign_form`
--
ALTER TABLE `campaign_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employment`
--
ALTER TABLE `employment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `influencer_form`
--
ALTER TABLE `influencer_form`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `campaign_form`
--
ALTER TABLE `campaign_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer_details`
--
ALTER TABLE `customer_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `employment`
--
ALTER TABLE `employment`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `influencer_form`
--
ALTER TABLE `influencer_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
