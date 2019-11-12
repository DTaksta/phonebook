-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.25 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
CREATE DATABASE IF NOT EXISTS `phonebook`;
-- Dumping structure for table phonebook.contact
CREATE TABLE `contact` (
    `contact_id` bigint NOT NULL AUTO_INCREMENT,
    `first_name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    `timestamp` TIMESTAMP NOT NULL,
    PRIMARY KEY (`contact_id`)
);

-- Dumping structure for table phonebook.phone_number
CREATE TABLE `phone_number` (
    `phone_number_id` bigint NOT NULL AUTO_INCREMENT,
    `contact_id` bigint NOT NULL,
    `phone_number` varchar(255) NOT NULL,
    PRIMARY KEY (`phone_number_id`)
);

-- Dumping structure for table phonebook.email
CREATE TABLE `email` (
    `email_id` bigint NOT NULL AUTO_INCREMENT,
    `contact_id` bigint NOT NULL,
    `email` varchar(255) NOT NULL,
    PRIMARY KEY (`email_id`)
);

ALTER TABLE `phone_number` ADD CONSTRAINT `contact_id_phone_fk`
FOREIGN KEY (`contact_id`)
REFERENCES `contact`(`contact_id`)
ON DELETE CASCADE;

ALTER TABLE `email` ADD CONSTRAINT `contact_id_email_fk`
FOREIGN KEY (`contact_id`)
REFERENCES `contact`(`contact_id`)
ON DELETE CASCADE;

-- ALTER TABLE `Product_Attributes` ADD CONSTRAINT `Product_Attributes_FK`
-- FOREIGN KEY (`product_id`)
-- REFERENCES `Products`(`product_id`);

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
