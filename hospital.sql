CREATE DATABASE IF NOT EXISTS `hospital` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hospital`;

DROP TABLE IF EXISTS `species`;
CREATE TABLE IF NOT EXISTS `species` (
	`species_id` int(11) NOT NULL AUTO_INCREMENT,
	`species_description` varchar(50) DEFAULT NULL,
	PRIMARY KEY (`species_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO `species` (`species_id`, `species_description`) VALUES
(1, 'Hond'),
(2, 'Kat');

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
	`client_id` int(11) NOT NULL AUTO_INCREMENT,
	`client_firstname` varchar(50) DEFAULT NULL,
	`client_lastname` varchar(50) DEFAULT NULL,
	`client_phone` varchar(50) DEFAULT NULL,
	`client_email` varchar(50) DEFAULT NULL,
	PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO `clients` (`client_id`, `client_firstname`, `client_lastname`, `client_phone`, `client_email`) VALUES
(1, 'Jane', 'Doe', `0673991659`, `Jane.Doe@planet.nl`),
(2, 'John', 'Doe', `0673931679`, `John.Doe@planet.nl`);

DROP TABLE IF EXISTS `gender`;
CREATE TABLE IF NOT EXISTS `gender` (
  `gender_id` int(11) NOT NULL AUTO_INCREMENT,
  `gender_description` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gender_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO `gender` (`gender_id`, `gender_description`) VALUES
(1, 'male'),
(2, 'female');

DROP TABLE IF EXISTS `patients`;
CREATE TABLE IF NOT EXISTS `patients` (
  `patient_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_name` varchar(50) DEFAULT NULL,
  `gender_id` int(11) NOT NULL,
  `species_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `patient_status` text,
  PRIMARY KEY (`patient_id`),
  FOREIGN KEY (`species_id`) REFERENCES `species`(`species_id`),
  FOREIGN KEY (`client_id`) REFERENCES `clients`(`client_id`),
  FOREIGN KEY (`gender_id`) REFERENCES `gender`(`gender_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

INSERT INTO `patients` (`patient_id`, `patient_name`, `gender_id`, `species_id`, `client_id` ,`patient_status`) VALUES
(1, 'Bobbie', 1, 1, 1,'Koorts, eet slecht, blaft veel te veel'),
(2, 'Minoes', 2, 2, 2,'Drinkt niet, haaruitval, mager'),
(3, 'Kees', 1, 1, 2,'Eet te veel, vetzucht, jankt en kotst');
