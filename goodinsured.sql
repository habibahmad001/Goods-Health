-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 04, 2019 at 01:04 PM
-- Server version: 5.6.41-84.1-log
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT  */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `goodinsured`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(155) NOT NULL,
  `description` text NOT NULL,
  `organization_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `family_group`
--

CREATE TABLE `family_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(155) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2019_08_28_045426_add_extra_field_to_users_table', 1),
(13, '2019_08_28_051813_create_roles_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `organization_name` varchar(155) NOT NULL,
  `address` text NOT NULL,
  `phone_number` varchar(55) NOT NULL,
  `contact_person` varchar(55) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 for inactive ,1 for active ',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `policy_id` int(11) NOT NULL,
  `payment_plan` varchar(55) NOT NULL,
  `card_name` varchar(55) NOT NULL,
  `card_number` varchar(155) NOT NULL,
  `expiry_date` varchar(55) NOT NULL,
  `country` varchar(55) NOT NULL,
  `postal_code` varchar(55) NOT NULL,
  `transaction_number` varchar(155) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `transaction_status` int(11) NOT NULL,
  `transaction_response_msg` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

CREATE TABLE `policies` (
  `id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `policy_name` varchar(155) NOT NULL,
  `policy_type` varchar(55) NOT NULL,
  `policy_periods` varchar(55) NOT NULL,
  `policy_value` decimal(15,2) NOT NULL,
  `policy_description` text NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0 for INACTIVE,1 for ACTIVE',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `subject` varchar(55) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `description` text NOT NULL,
  `email` varchar(155) NOT NULL,
  `contact_number` varchar(55) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quote_item`
--

CREATE TABLE `quote_item` (
  `id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `policy_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quote_registered_users`
--

CREATE TABLE `quote_registered_users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `subject` varchar(155) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quote_reply`
--

CREATE TABLE `quote_reply` (
  `id` int(11) NOT NULL,
  `quote_id` int(11) NOT NULL,
  `subject` varchar(155) NOT NULL,
  `message` text NOT NULL,
  `attachment_name` varchar(55) DEFAULT NULL,
  `attachment_type` varchar(55) DEFAULT NULL,
  `attachment_path` varchar(55) DEFAULT NULL,
  `reply_by_user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `report_claim`
--

CREATE TABLE `report_claim` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `policy_id` int(11) NOT NULL,
  `organization_id` int(11) NOT NULL,
  `owner_damaged_property` varchar(255) NOT NULL,
  `address` varchar(155) NOT NULL,
  `phone_number` varchar(55) NOT NULL,
  `injured_party_information` varchar(155) NOT NULL,
  `injured_person_name` varchar(155) NOT NULL,
  `injured_person_address` varchar(255) NOT NULL,
  `injured_person_number` varchar(55) NOT NULL,
  `injured_person_alternate_number` varchar(55) NOT NULL,
  `injured_person_dob` date NOT NULL,
  `injured_person_guardian` varchar(155) NOT NULL,
  `damage_injury_date` date NOT NULL,
  `location_of_incident` varchar(155) NOT NULL,
  `activity` varchar(155) NOT NULL,
  `status` varchar(55) DEFAULT 'PENDING',
  `description_of_accident` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN', 1, '2019-08-28 05:23:37', '2019-08-28 05:23:37'),
(2, 'CUSTOMER', 1, NULL, NULL),
(3, 'BUSINESS', 1, NULL, NULL),
(4, 'PROVIDER', 1, NULL, NULL),
(5, 'BROKER/INSURANCE AGENCY FLAT', 1, NULL, NULL),
(6, 'BROKER/INSURANCE AGENCY FRANCHISE-LEADS ', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT '2',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$RUu4u63JJVxcUPTrzpDZtO4G33D6NsoNOiF3YAyMEyx2AD0luxBLO', 1, 'saB73t5ourJ3x1awNz7DwnsWZf1GqeCW3HhtqLa9Jz85SzcrBZ291FAQfUHF', '2019-08-29 10:16:07', '2019-09-03 06:39:25'),
(2, 'customer', 'customer@gmail.com', NULL, '$2y$10$B.9uUztG.yxsxAVPXONiA.ROItHKEjx3HPKB0Md.aify7xPgZByzS', 2, NULL, '2019-08-29 10:16:07', '2019-08-29 10:16:07'),
(3, 'business', 'business@gmail.com', NULL, '$2y$10$B.9uUztG.yxsxAVPXONiA.ROItHKEjx3HPKB0Md.aify7xPgZByzS', 3, NULL, '2019-08-29 10:16:07', '2019-08-29 10:16:07'),
(4, 'provider', 'provider@gmail.com', NULL, '$2y$10$B.9uUztG.yxsxAVPXONiA.ROItHKEjx3HPKB0Md.aify7xPgZByzS', 4, NULL, '2019-08-29 10:16:07', '2019-08-29 10:16:07'),
(5, 'broker-agency-flat', 'broker_agency_flat@gmail.com', NULL, '$2y$10$B.9uUztG.yxsxAVPXONiA.ROItHKEjx3HPKB0Md.aify7xPgZByzS', 5, NULL, '2019-08-29 10:16:07', '2019-08-29 10:16:07'),
(6, 'broker-agency-franchise', 'broker_agency_franchise@gmail.com', NULL, '$2y$10$B.9uUztG.yxsxAVPXONiA.ROItHKEjx3HPKB0Md.aify7xPgZByzS', 6, NULL, '2019-08-29 10:16:07', '2019-08-29 10:16:07'),
(7, 'TestUser1', 'test1@test.com', NULL, '$2y$10$wQYehY8X6UTVXagelQWoPuP5N4hC7R.GXVd5usBLspyz6clCqUUfK', 2, NULL, '2019-08-30 17:21:19', '2019-08-30 17:21:19'),
(18, 'test user2', 'testuser2@gmail.com', NULL, '$2y$10$dOX3g5hV/ncgmdHWK/uXduTjuQCYmR5AsmpiMDknn4maGgRAXzwF2', 2, NULL, '2019-09-02 09:43:38', '2019-09-02 09:43:38'),
(12, 'test user1', 'testuser1@gmail.com', NULL, '$2y$10$dOX3g5hV/ncgmdHWK/uXduTjuQCYmR5AsmpiMDknn4maGgRAXzwF2', 4, NULL, '2019-09-02 09:43:38', '2019-09-02 09:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(155) NOT NULL,
  `middle_initial` varchar(55) DEFAULT NULL,
  `last_name` varchar(155) NOT NULL,
  `suffix` varchar(55) NOT NULL,
  `gender` varchar(55) NOT NULL,
  `dob` date NOT NULL,
  `preferred_name` varchar(155) DEFAULT NULL,
  `social_security_number` varchar(155) DEFAULT NULL,
  `user_image` varchar(155) NOT NULL,
  `contact_number` varchar(155) NOT NULL,
  `alternate_number` varchar(155) DEFAULT NULL,
  `emergency_number` varchar(155) NOT NULL,
  `address` text NOT NULL,
  `state` varchar(55) NOT NULL,
  `zipcode` varchar(55) NOT NULL,
  `country` varchar(55) NOT NULL,
  `company_name` varchar(155) DEFAULT NULL,
  `designation` varchar(155) DEFAULT NULL,
  `annual_income` decimal(15,2) DEFAULT NULL,
  `employment_type` varchar(55) DEFAULT NULL,
  `company_address` text,
  `company_state` varchar(55) DEFAULT NULL,
  `company_city` varchar(55) DEFAULT NULL,
  `company_zip` varchar(55) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_dms`
--

CREATE TABLE `user_dms` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_name` varchar(155) NOT NULL,
  `document_path` varchar(155) NOT NULL,
  `document_type` varchar(155) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0 for INACTIVE,1 for ACTIVE',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_family_groups`
--

CREATE TABLE `user_family_groups` (
  `id` int(11) NOT NULL,
  `family_group_id` int(11) NOT NULL,
  `parent_user_id` int(11) NOT NULL,
  `first_name` varchar(155) NOT NULL,
  `middle_initial` varchar(55) DEFAULT NULL,
  `last_name` varchar(155) NOT NULL,
  `suffix` varchar(55) NOT NULL,
  `gender` varchar(55) NOT NULL,
  `dob` date NOT NULL,
  `preferred_name` varchar(155) DEFAULT NULL,
  `social_security_number` varchar(155) DEFAULT NULL,
  `user_image` varchar(155) NOT NULL,
  `spouse_first_name` varchar(155) NOT NULL,
  `spouse_suffix` varchar(55) NOT NULL,
  `spouse_last_name` varchar(55) NOT NULL,
  `spouse_birth_date` varchar(55) NOT NULL,
  `spouse_children_count` varchar(55) NOT NULL,
  `contact_number` varchar(155) NOT NULL,
  `emergency_number` varchar(155) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(55) NOT NULL,
  `state` varchar(55) NOT NULL,
  `zipcode` varchar(55) NOT NULL,
  `country` varchar(55) NOT NULL,
  `emergency_contact` varchar(155) DEFAULT NULL,
  `family_friend_contact` varchar(155) DEFAULT NULL,
  `relation` varchar(155) DEFAULT NULL,
  `sibling_email` varchar(155) DEFAULT NULL,
  `company_name` varchar(155) DEFAULT NULL,
  `designation` varchar(155) DEFAULT NULL,
  `employment_id` decimal(15,2) DEFAULT NULL,
  `employment_type` varchar(55) DEFAULT NULL,
  `employment_status` varchar(55) DEFAULT NULL,
  `benefit_info` varchar(55) DEFAULT NULL,
  `benefits_vendor` varchar(55) DEFAULT NULL,
  `assigned_benefits_vendor` varchar(55) DEFAULT NULL,
  `action_status` varchar(55) NOT NULL DEFAULT 'In-Progress',
  `terminate_status` varchar(55) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_id` (`organization_id`);

--
-- Indexes for table `family_group`
--
ALTER TABLE `family_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `policy_id` (`policy_id`);

--
-- Indexes for table `policies`
--
ALTER TABLE `policies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `organization_id` (`organization_id`);

--
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quote_item`
--
ALTER TABLE `quote_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quote_id` (`quote_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `policy_id` (`policy_id`);

--
-- Indexes for table `quote_registered_users`
--
ALTER TABLE `quote_registered_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `quote_reply`
--
ALTER TABLE `quote_reply`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quote_id` (`quote_id`),
  ADD KEY `reply_by_user_id` (`reply_by_user_id`);

--
-- Indexes for table `report_claim`
--
ALTER TABLE `report_claim`
  ADD PRIMARY KEY (`id`),
  ADD KEY `policy_id` (`policy_id`),
  ADD KEY `organization_id` (`organization_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_dms`
--
ALTER TABLE `user_dms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user_family_groups`
--
ALTER TABLE `user_family_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_user_id` (`parent_user_id`),
  ADD KEY `family_group_id` (`family_group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `family_group`
--
ALTER TABLE `family_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quote_item`
--
ALTER TABLE `quote_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quote_registered_users`
--
ALTER TABLE `quote_registered_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quote_reply`
--
ALTER TABLE `quote_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report_claim`
--
ALTER TABLE `report_claim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_dms`
--
ALTER TABLE `user_dms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_family_groups`
--
ALTER TABLE `user_family_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
