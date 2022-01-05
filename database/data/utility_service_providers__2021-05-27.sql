# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.26)
# Database: smerp
# Generation Time: 2021-06-07 06:32:35 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table utility_service_providers
# ------------------------------------------------------------

LOCK TABLES `utility_service_providers` WRITE;
/*!40000 ALTER TABLE `utility_service_providers` DISABLE KEYS */;

INSERT INTO `utility_service_providers` (`id`, `utility_form_id`, `provider_name`, `fbr_code_id`, `provider_remark`, `provider_status`, `deleted_at`, `created_at`, `updated_at`)
VALUES
	(1,6,'Mobilink',501,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(2,6,'Telenor',502,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(3,6,'Ufone',503,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(4,6,'Warid',504,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(5,6,'Zong',505,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(6,1,'FESCO',601,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(7,1,'GEPCO',602,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(8,1,'HESCO',603,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(9,1,'IESCO',604,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(10,1,'K-Electric',605,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(11,1,'LESCO',606,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(12,1,'MEPCO',607,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(13,1,'PESCO',608,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(14,1,'QESCO',609,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(15,1,'SEPCO',610,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(16,1,'TESCO',611,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(17,1,'BTESCO (Bahria Town)',612,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(18,1,'MTESCO (Model Town)',613,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(19,2,'SNGPL',701,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(20,2,'SSGC',702,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(21,4,'PTCL',801,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(22,4,'Wateen',802,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(23,4,'World Call',803,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(24,4,'Nayatel',804,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(25,4,'Wi-Tribe',805,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(26,4,'Qubee',806,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(27,4,'Comsats ISP',807,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(28,4,'Zong',809,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(29,4,'Jazz',810,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(30,4,'UFone',811,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(31,4,'Telenor',812,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(32,4,'Other',813,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(33,3,'WASA',901,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(34,5,'PTCL',901,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(35,NULL,'Other',0,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(36,1,'Other',0,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14'),
	(37,2,'Other',0,NULL,1,NULL,'2021-06-07 11:32:14','2021-06-07 11:32:14');

/*!40000 ALTER TABLE `utility_service_providers` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
