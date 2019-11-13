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
array (size=6)
  'first_name' => string 'Danny' (length=5)
  'last_name' => string '' (length=0)
  'phoneType' => 
    array (size=2)
      0 => string 'Mobile' (length=6)
      1 => string 'Home' (length=4)
  'phoneNumber' => 
    array (size=2)
      0 => string '(555) 121-2121' (length=14)
      1 => string '(555) 123-4567' (length=14)
  'emailType' => 
    array (size=2)
      0 => string 'Personal' (length=8)
      1 => string 'Work' (length=4)
  'emailAddress' => 
    array (size=2)
      0 => string 'one@email.com' (length=13)
      1 => string 'two@email.com' (length=13)
CREATE TABLE `contact` (
    `contact_id` bigint NOT NULL AUTO_INCREMENT,
    `first_name` varchar(255) NOT NULL,
    `last_name` varchar(255) NOT NULL,
    PRIMARY KEY (`contact_id`)
);

-- Dumping structure for table phonebook.phone_number
CREATE TABLE `phone_number` (
    `phone_number_id` bigint NOT NULL AUTO_INCREMENT,
    `contact_id` bigint NOT NULL,
    `phone_number` varchar(255) NOT NULL,
    `phone_number_type` varchar(255) NOT NULL,
    PRIMARY KEY (`phone_number_id`)
);

-- Dumping structure for table phonebook.email
CREATE TABLE `email` (
    `email_id` bigint NOT NULL AUTO_INCREMENT,
    `contact_id` bigint NOT NULL,
    `email` varchar(255) NOT NULL,
    `email_type` varchar(255) NOT NULL,
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
