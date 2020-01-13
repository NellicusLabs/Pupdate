# ************************************************************
# Host: 127.0.0.1 (MySQL 5.5.5-10.1.43-MariaDB-0ubuntu0.18.04.1)
# Database: pupdate
# Generation Time: 2020-01-13 23:26:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table events
# ------------------------------------------------------------

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `pet_id` int(111) NOT NULL,
  `event_type` varchar(111) NOT NULL,
  `event_time` varchar(111) NOT NULL,
  `event_data` varchar(256) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table marking
# ------------------------------------------------------------

DROP TABLE IF EXISTS `marking`;

CREATE TABLE `marking` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `pet_id` int(111) NOT NULL,
  `transponder_number` varchar(255) NOT NULL,
  `date_of_application` varchar(255) NOT NULL,
  `location` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table marking_fields
# ------------------------------------------------------------

DROP TABLE IF EXISTS `marking_fields`;

CREATE TABLE `marking_fields` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `pet_id` int(50) NOT NULL,
  `marking_name` varchar(111) NOT NULL,
  `marking_data` varchar(111) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table pets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `pets`;

CREATE TABLE `pets` (
  `pet_id` int(111) NOT NULL AUTO_INCREMENT,
  `pet_name` varchar(255) NOT NULL,
  `pet_age` varchar(255) NOT NULL,
  `pet_image` varchar(100) NOT NULL,
  `pet_breed` varchar(255) NOT NULL,
  `pet_species` varchar(255) NOT NULL,
  `pet_color` varchar(255) NOT NULL,
  `pet_dob` varchar(255) NOT NULL,
  `pet_sex` varchar(255) NOT NULL,
  `about_pet` text NOT NULL,
  `pet_status` int(11) NOT NULL COMMENT '0=active, 1=inactive',
  PRIMARY KEY (`pet_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table vaccinations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `vaccinations`;

CREATE TABLE `vaccinations` (
  `id` int(111) NOT NULL AUTO_INCREMENT,
  `pet_id` int(111) NOT NULL,
  `type` varchar(111) NOT NULL,
  `date` varchar(111) NOT NULL,
  `valid` varchar(111) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



# Dump of table weight
# ------------------------------------------------------------

DROP TABLE IF EXISTS `weight`;

CREATE TABLE `weight` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `pet_id` int(50) NOT NULL,
  `weight` varchar(111) NOT NULL,
  `weight_time` varchar(111) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
