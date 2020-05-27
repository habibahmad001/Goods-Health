TABLE IF EXISTS `policies`;
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
ALTER TABLE `user_family_groups` ADD `relation` INT NOT NULL DEFAULT '0' AFTER `user_id`;
ALTER TABLE `user_permissions` ADD `dashboard` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '1 for access, 0 for no-access' AFTER `admin_center`, ADD `fast_access` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '1 for access, 0 for no-access' AFTER `dashboard`, ADD `family_group` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '1 for access, 0 for no-access' AFTER `fast_access`, ADD `benefit` TINYINT(1) NOT NULL DEFAULT '0' COMMENT '1 for access, 0 for no-access' AFTER `family_group`;

ALTER TABLE `carrier_product_details` ADD `bodily_injury_liability` DECIMAL(25,2) NULL AFTER `price_4`, ADD `property_damage_liability` DECIMAL(25,2) NULL AFTER `bodily_injury_liability`, ADD `uninsured_motorist_bodily` DECIMAL(25,2) NULL AFTER `property_damage_liability`, ADD `uninsured_motorist_property` DECIMAL(25,2) NULL AFTER `uninsured_motorist_bodily`, ADD `personal_injury_protection` DECIMAL(25,2) NULL AFTER `uninsured_motorist_property`;

UPDATE `carrier_details` SET `carrier_logo` = 'hdfc.png' WHERE `carrier_details`.`id` = 2; 
UPDATE `carrier_details` SET `carrier_logo` = 'lic.png' WHERE `carrier_details`.`id` = 3; 
UPDATE `carrier_details` SET `carrier_logo` = 'healthfarm.png' WHERE `carrier_details`.`id` = 4; 
UPDATE `carrier_details` SET `carrier_logo` = 'healthfarm.png' WHERE `carrier_details`.`id` = 5;

UPDATE `carrier_product_details` SET `price_1` = '10', `bodily_injury_liability` = '10', `property_damage_liability` = '10', `uninsured_motorist_bodily` = '10', `uninsured_motorist_property` = '10', `personal_injury_protection` = '10' WHERE `carrier_product_details`.`id` = 1; 
UPDATE `carrier_product_details` SET `price_1` = '20', `bodily_injury_liability` = '20', `property_damage_liability` = '20', `uninsured_motorist_bodily` = '20', `uninsured_motorist_property` = '20', `personal_injury_protection` = '20', `status` = '1' WHERE `carrier_product_details`.`id` = 2;


INSERT INTO `carrier_product_details` (`id`, `carrier_id`, `category_id`, `state`, `city_id`, `zipcode`, `county`, `product_name`, `product_description`, `price_1`, `price_2`, `price_3`, `price_4`, `bodily_injury_liability`, `property_damage_liability`, `uninsured_motorist_bodily`, `uninsured_motorist_property`, `personal_injury_protection`, `meta`, `status`, `delete_status`, `added_by`, `created_at`, `updated_at`) VALUES (NULL, '5', '2', 'PR', '1', '00601', 'Adjuntas', 'Auto', 'For Auto', '30.00', NULL, NULL, NULL, '30.00', '30.00', '30.00', '30.00', '30.00', NULL, '1', '1', '1', '2019-11-07 18:07:41', '2019-11-22 16:26:40'), (NULL, '2', '2', 'PR', '1', '00601', 'Adjuntas', 'Boat', 'For Auto', '40.00', NULL, NULL, NULL, '40.00', '40.00', '40.00', '40.00', '40.00', NULL, '1', '1', '1', '2019-11-07 18:22:44', '2019-11-22 16:26:35');

