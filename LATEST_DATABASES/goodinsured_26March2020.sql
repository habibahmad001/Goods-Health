-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2020 at 06:58 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodinsured_6`
--

-- --------------------------------------------------------

--
-- Table structure for table `benefit_options`
--

DROP TABLE IF EXISTS `benefit_options`;
CREATE TABLE `benefit_options` (
  `id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `option_text` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benefit_options`
--

INSERT INTO `benefit_options` (`id`, `question_id`, `option_text`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Option 1', 1, '2020-03-26 09:48:21', '2020-03-26 09:49:52'),
(2, 2, 'Option 2', 1, '2020-03-26 09:48:21', '2020-03-26 09:49:52'),
(3, 3, 'Option 1', 1, '2020-03-26 09:48:21', '2020-03-26 09:49:52'),
(4, 3, 'Option 2', 1, '2020-03-26 09:48:21', '2020-03-26 09:49:52'),
(5, 3, 'Option 3', 1, '2020-03-26 09:48:21', '2020-03-26 09:49:52'),
(6, 8, '10', 1, '2020-03-26 11:29:36', NULL),
(7, 8, '100', 1, '2020-03-26 11:29:45', NULL),
(8, 5, 'CHK 1', 1, '2020-03-26 11:29:45', NULL),
(9, 5, 'CHK 2', 1, '2020-03-26 11:29:45', NULL),
(10, 4, 'Radio 1', 1, '2020-03-26 11:29:45', NULL),
(11, 4, 'Radio 2', 1, '2020-03-26 11:29:45', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `benefit_questions`
--

DROP TABLE IF EXISTS `benefit_questions`;
CREATE TABLE `benefit_questions` (
  `id` int(11) NOT NULL,
  `added_by_user_id` int(11) DEFAULT NULL,
  `question_text` text DEFAULT NULL,
  `is_custom_question_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1 - Yes, 0 - No',
  `section_ids` text DEFAULT NULL,
  `question_input_type` varchar(20) DEFAULT 'text',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benefit_questions`
--

INSERT INTO `benefit_questions` (`id`, `added_by_user_id`, `question_text`, `is_custom_question_status`, `section_ids`, `question_input_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Type of home you liive in -- a.k.a your primary residance', 0, NULL, 'text', 1, '2020-03-23 14:25:27', '2020-03-23 14:37:30'),
(2, 1, 'Liability/Dwelling Limit', 0, '{\"1\":1}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 11:24:50'),
(3, 1, 'Personal Property Limit', 0, '{\"1\":1}', 'multi-select', 1, '2020-03-23 14:27:13', '2020-03-26 11:25:01'),
(4, 1, 'Loss of use Limit', 0, '{\"1\":1}', 'radio', 1, '2020-03-23 14:27:13', '2020-03-26 10:59:33'),
(5, 1, 'Other structure limit', 0, '{\"1\":1}', 'checkbox', 1, '2020-03-23 14:27:13', '2020-03-26 11:25:12'),
(6, 1, 'Replacement cost', 0, '{\"1\":1}', 'calendar', 1, '2020-03-23 14:27:13', '2020-03-26 11:01:01'),
(7, 1, 'Personal Liability limit', 0, '{\"1\":1}', 'number', 1, '2020-03-23 14:27:13', '2020-03-26 11:07:16'),
(8, 1, 'Limited Fungi, Wet or Dry Rot, Yeast or Bacteria Coverage - Property', 0, '{\"1\":2}', 'range', 1, '2020-03-23 14:27:13', '2020-03-26 11:25:18'),
(9, 1, 'Limited Fungi, Wet or Dry Rot, Yeast or Bacteria Coverage - Liability', 0, '{\"1\":2}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(10, 1, 'Ordinance or Law Coverage Limit', 0, '{\"1\":2}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(11, 1, 'Do you want Sinkhole Loss Coverage?', 0, '{\"1\":2}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(12, 1, 'Sinkhole Deductible', 0, '{\"1\":3}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(13, 1, 'Hurricane Deductible', 0, '{\"1\":3}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(14, 1, 'All Other Perils Deductible', 0, '{\"1\":3}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(15, 1, 'Roof Covering', 0, '{\"1\":4}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(16, 1, 'Roof of Wall Attachment', 0, '{\"1\":4}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(17, 1, 'Secondry Water Resistance(SWR)', 0, '{\"1\":4}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(18, 1, 'Roof Deck Attachment', 0, '{\"1\":4}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(19, 1, 'Roof Geometry', 0, '{\"1\":4}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(20, 1, 'Opening Protection', 0, '{\"1\":4}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(21, 1, 'Burglar Alarm', 0, '{\"1\":5}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(22, 1, 'Sprinkler', 0, '{\"1\":5}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(23, 1, 'Fire Alarm', 0, '{\"1\":5}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(24, 1, 'Equipment Breakdown', 0, '{\"1\":6}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(25, 1, 'Domestic Workers', 0, '{\"1\":6}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(26, 1, 'Computers', 0, '{\"1\":6}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(27, 1, 'Jewelry & Watches', 0, '{\"1\":6}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(28, 1, 'Service Line', 0, '{\"1\":6}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(29, 1, 'Home Office', 0, '{\"1\":6}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(30, 1, 'Water Backup', 0, '{\"1\":6}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(31, 1, 'Mortgage Payment Protection', 0, '{\"1\":6}', 'select', 1, '2020-03-23 14:27:13', '2020-03-26 09:47:27'),
(33, 1, 'Testing Queestion', 1, '{\"0\":\"2\"}', 'select', 1, '2020-03-26 15:27:39', NULL),
(34, 1, 'Testing Question 1', 1, '{\"0\":\"3\"}', 'text', 1, '2020-03-26 15:52:56', NULL),
(35, 1, 'Testing Question 1', 1, '{\"0\":\"3\"}', 'text', 1, '2020-03-26 15:53:07', NULL),
(36, 1, 'Testing Question 1', 1, '{\"0\":\"3\"}', 'text', 1, '2020-03-26 15:54:01', NULL),
(37, 1, 'Testing Question 2', 1, '{\"0\":\"3\"}', 'number', 1, '2020-03-26 15:54:57', NULL),
(38, 1, 'Testing Question 2', 1, '{\"0\":\"4\"}', 'select', 1, '2020-03-26 15:56:56', NULL),
(39, 1, 'Testing Question 3', 1, '{\"0\":\"4\"}', 'calendar', 1, '2020-03-26 15:58:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `benefit_question_sections`
--

DROP TABLE IF EXISTS `benefit_question_sections`;
CREATE TABLE `benefit_question_sections` (
  `id` int(11) NOT NULL,
  `section_name` varchar(100) NOT NULL,
  `section_slug` varchar(100) NOT NULL,
  `show_add_field_button` tinyint(1) DEFAULT 1 COMMENT '1 - Yes, 0 - No',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 - Delete, 1 - Active, 2 - Inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benefit_question_sections`
--

INSERT INTO `benefit_question_sections` (`id`, `section_name`, `section_slug`, `show_add_field_button`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Coverage Limits', 'coverage_limits', 1, 1, '2020-03-23 19:29:07', '2020-03-23 13:59:07'),
(2, 'Medical Payments to Others', 'medical_payments_to_others', 1, 1, '2020-03-23 19:29:52', '2020-03-23 13:59:52'),
(3, 'Deductible', 'deductible', 1, 1, '2020-03-23 19:30:15', '2020-03-23 14:00:15'),
(4, 'Wind Mitigtion', 'wind_mitigtion', 1, 1, '2020-03-23 19:30:44', '2020-03-23 14:00:44'),
(5, 'Discounts', 'discounts', 1, 1, '2020-03-23 19:33:03', '2020-03-23 14:03:03'),
(6, 'Hippo exclusive enhanced coverage', 'hippo_exclusive_enhanced_coverage', 1, 1, '2020-03-23 19:33:57', '2020-03-23 14:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `benefit_question_section_transactions`
--

DROP TABLE IF EXISTS `benefit_question_section_transactions`;
CREATE TABLE `benefit_question_section_transactions` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `benefit_question_section_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benefit_question_section_transactions`
--

INSERT INTO `benefit_question_section_transactions` (`id`, `category_id`, `benefit_question_section_id`, `created_at`, `updated_at`) VALUES
(1, 19, 1, '2020-03-23 19:41:04', '2020-03-23 14:11:04'),
(2, 19, 2, '2020-03-23 19:41:04', '2020-03-23 14:11:04'),
(3, 19, 3, '2020-03-23 19:41:04', '2020-03-23 14:11:04'),
(4, 19, 4, '2020-03-23 19:41:04', '2020-03-23 14:11:04'),
(5, 19, 5, '2020-03-23 19:41:04', '2020-03-23 14:11:04'),
(6, 19, 6, '2020-03-23 19:41:04', '2020-03-23 14:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `benefit_question_transactions`
--

DROP TABLE IF EXISTS `benefit_question_transactions`;
CREATE TABLE `benefit_question_transactions` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL DEFAULT 0,
  `benefit_question_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benefit_question_transactions`
--

INSERT INTO `benefit_question_transactions` (`id`, `category_id`, `product_id`, `benefit_question_id`, `created_at`, `updated_at`) VALUES
(1, 19, 0, 1, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(2, 19, 0, 2, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(3, 19, 0, 3, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(4, 19, 0, 4, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(5, 19, 0, 5, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(6, 19, 0, 6, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(7, 19, 0, 7, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(8, 19, 0, 8, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(9, 19, 0, 9, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(10, 19, 0, 10, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(11, 19, 0, 11, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(12, 19, 0, 12, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(13, 19, 0, 13, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(14, 19, 0, 14, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(15, 19, 0, 15, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(16, 19, 0, 16, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(17, 19, 0, 17, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(18, 19, 0, 18, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(19, 19, 0, 19, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(20, 19, 0, 20, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(21, 19, 0, 21, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(22, 19, 0, 22, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(23, 19, 0, 23, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(24, 19, 0, 24, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(25, 19, 0, 25, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(26, 19, 0, 26, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(27, 19, 0, 27, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(28, 19, 0, 28, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(29, 19, 0, 29, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(30, 19, 0, 30, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(31, 19, 0, 31, '2020-03-23 20:23:06', '2020-03-23 14:53:06'),
(33, 19, 9, 33, '2020-03-26 20:57:40', '2020-03-26 15:27:40'),
(34, 19, 9, 36, '2020-03-26 21:24:01', '2020-03-26 15:54:01'),
(35, 19, 9, 37, '2020-03-26 21:24:57', '2020-03-26 15:54:57'),
(36, 19, 9, 38, '2020-03-26 21:26:57', '2020-03-26 15:56:57'),
(37, 19, 9, 39, '2020-03-26 21:28:19', '2020-03-26 15:58:19');

-- --------------------------------------------------------

--
-- Table structure for table `benefit_selected_by_user_options`
--

DROP TABLE IF EXISTS `benefit_selected_by_user_options`;
CREATE TABLE `benefit_selected_by_user_options` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `option_id` int(11) DEFAULT NULL,
  `option_text` varchar(255) DEFAULT NULL COMMENT 'If option are of type text',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `benefit_selected_by_user_options`
--

INSERT INTO `benefit_selected_by_user_options` (`id`, `user_id`, `question_id`, `option_id`, `option_text`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 0, NULL, 1, '2020-03-13 07:12:04', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benefit_options`
--
ALTER TABLE `benefit_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefit_questions`
--
ALTER TABLE `benefit_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefit_question_sections`
--
ALTER TABLE `benefit_question_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefit_question_section_transactions`
--
ALTER TABLE `benefit_question_section_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefit_question_transactions`
--
ALTER TABLE `benefit_question_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `benefit_selected_by_user_options`
--
ALTER TABLE `benefit_selected_by_user_options`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`,`question_id`,`option_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benefit_options`
--
ALTER TABLE `benefit_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `benefit_questions`
--
ALTER TABLE `benefit_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `benefit_question_sections`
--
ALTER TABLE `benefit_question_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `benefit_question_section_transactions`
--
ALTER TABLE `benefit_question_section_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `benefit_question_transactions`
--
ALTER TABLE `benefit_question_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `benefit_selected_by_user_options`
--
ALTER TABLE `benefit_selected_by_user_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
