ALTER TABLE `user_family_groups` ADD `email` VARCHAR(100) NULL AFTER `terminate_status`, ADD `employer_name` VARCHAR(50) NULL AFTER `email`, ADD `employer_phone` VARCHAR(15) NULL AFTER `employer_name`;

ALTER TABLE `user_family_group_beneficiaries` ADD `beneficiaries` VARCHAR(100) NULL AFTER `beneficiary_information_file`;

