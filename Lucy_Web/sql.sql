-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.14 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for lucy_web
CREATE DATABASE IF NOT EXISTS `lucy_web` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `lucy_web`;

-- Dumping structure for table lucy_web.tbl_pets
CREATE TABLE IF NOT EXISTS `tbl_pets` (
  `petID` int(11) NOT NULL AUTO_INCREMENT,
  `petname` varchar(50) DEFAULT NULL,
  `petage` bit(1) DEFAULT NULL,
  `petrace` varchar(50) DEFAULT NULL,
  `petgender` varchar(50) DEFAULT NULL,
  `petweight` bigint(20) DEFAULT NULL,
  `joining_date` datetime DEFAULT NULL,
  PRIMARY KEY (`petID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Dumping data for table lucy_web.tbl_pets: 0 rows
/*!40000 ALTER TABLE `tbl_pets` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pets` ENABLE KEYS */;

-- Dumping structure for table lucy_web.tbl_users
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `joining_date` datetime NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `telephone` bigint(22) DEFAULT NULL,
  `profil_picture` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table lucy_web.tbl_users: ~9 rows (approximately)
/*!40000 ALTER TABLE `tbl_users` DISABLE KEYS */;
INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_email`, `user_password`, `joining_date`, `address`, `telephone`, `profil_picture`) VALUES
	(1, 'pradeep', 'pradeep@gmail.com', '1bbd886460827015e5d605ed44252251', '2015-11-08 17:25:19', NULL, NULL, NULL),
	(2, 'test', 'test@test.test', '1bbd886460827015e5d605ed44252251', '2015-11-14 13:37:19', NULL, NULL, NULL),
	(4, 'Derek', 'testing@est.com', 'doncamilo', '2016-11-25 00:00:00', 'test', 58584644, NULL),
	(5, 'Derek12', 'derek@tormajeune.com', 'doncamilo', '2016-11-25 00:00:00', '22 Lecornu Ste Croix, 22', 12345, NULL),
	(6, 'jord1407', 'jord1407@tormajeune.com', 'test1234', '2016-11-25 00:00:00', '22 Lecornu Ste Croix, 22', 23058584644, NULL),
	(7, 'yuyu', 'pheles1430@gmail.com', 'TEST', '2016-11-29 00:00:00', '22 Lecornu Ste Croix, 22', 23058584644, NULL),
	(8, 'poke', '&#039;poke&#039;@test.com', '&#039;test1234', '2016-11-29 00:00:00', 'test&#039; &#039; &#039; road &#039;maritius&#039;', 1234567, NULL),
	(9, 'mimi', 'mimi@gmail.com', '12345', '2017-01-10 00:00:00', '22 Lecornu Ste Croix, 22', 2061212, NULL),
	(10, 'don', 'pheles14302@gmail.com', 'doncamilo', '2017-02-01 00:00:00', '22 Lecornu Ste Croix, 22', 2156684, NULL);
/*!40000 ALTER TABLE `tbl_users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
