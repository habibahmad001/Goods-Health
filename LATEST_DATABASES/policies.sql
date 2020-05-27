-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2019 at 10:24 AM
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
-- Database: `artesrph_goodinsured`
--

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

DROP TABLE IF EXISTS `policies`;
CREATE TABLE `policies` (
  `id` int(11) NOT NULL,
  `policy_number` varchar(255) DEFAULT NULL COMMENT 'unique policy number',
  `user_id` int(11) DEFAULT NULL,
  `broker_agency_id` int(11) DEFAULT NULL,
  `agent_id` int(11) DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `price_1` float DEFAULT NULL,
  `price_2` float DEFAULT NULL,
  `price_3` float DEFAULT NULL,
  `price_4` float DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `policy_meta` varchar(255) DEFAULT NULL,
  `carrier_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `policy_name` varchar(155) NOT NULL,
  `policy_type` varchar(155) NOT NULL,
  `policy_period` varchar(155) NOT NULL,
  `policy_value` decimal(15,2) NOT NULL,
  `policy_description` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 for active , 0 for inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`id`, `policy_number`, `user_id`, `broker_agency_id`, `agent_id`, `provider_id`, `price_1`, `price_2`, `price_3`, `price_4`, `product_id`, `policy_meta`, `carrier_id`, `category_id`, `policy_name`, `policy_type`, `policy_period`, `policy_value`, `policy_description`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'Car ', 'Renew Basis', '24 Months', '200000.00', 'Testing Only', 1, '2019-10-17 07:21:00', '2019-10-17 07:50:39'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 'Boat ', 'Renew Basis', '24 Months', '100000.00', 'Testing Only', 1, '2019-10-17 07:21:58', '2019-10-17 07:50:42'),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, 'Health ', 'Renew Basis', '24 Months', '150000.00', 'Testing Only', 1, '2019-10-17 07:22:35', '2019-10-17 07:50:49'),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 3, 'Life Insurance', 'Renew Basis', 'Life Time', '200000.00', 'Testing Only', 1, '2019-10-17 07:23:15', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `policies`
--
ALTER TABLE `policies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `policies`
--
ALTER TABLE `policies`
  ADD CONSTRAINT `policies_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `product_categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
