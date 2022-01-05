# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.26)
# Database: db_rozgar
# Generation Time: 2021-06-14 13:36:30 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table disabilities
# ------------------------------------------------------------


LOCK TABLES `disabilities` WRITE;
/*!40000 ALTER TABLE `disabilities` DISABLE KEYS */;

INSERT INTO `disabilities` (`id`, `disability_name_e`, `disability_name_u`, `disability_order`, `disability_remark`, `disability_status`, `created_at`, `updated_at`)
VALUES
	(1,'Absent limb','غیر حاضر اعضاء',1,NULL,1,'2020-08-25 14:21:37','2020-08-25 14:21:37'),
	(2,'Cerebral palsy','دماغی فالج',2,NULL,1,'2020-08-25 14:21:37','2020-08-25 14:21:37'),
	(3,'Hearing impairments','سماعت کی خرابی',3,NULL,1,'2020-08-25 14:21:37','2020-08-25 14:21:37'),
	(4,'Intellectual or Learning Disability','فکری یا سیکھنے کی معذوری',4,NULL,1,'2020-08-25 14:21:37','2020-08-25 14:21:37'),
	(5,'Neurological disabilities','اعصابی معذوری',5,NULL,1,'2020-08-25 14:21:37','2020-08-25 14:21:37'),
	(6,'Physical Disability','جسمانی معذوری',6,NULL,1,'2020-08-25 14:21:37','2020-08-25 14:21:37'),
	(7,'Polio','پولیو',7,NULL,1,'2020-08-25 14:21:37','2020-08-25 14:21:37'),
	(8,'Reduced limb function','اعضا کی تقریب میں کمی',8,NULL,1,'2020-08-25 14:21:37','2020-08-25 14:21:37'),
	(9,'Visual impairments','بصری خرابیاں',9,NULL,1,'2020-08-25 14:21:37','2020-08-25 14:21:37'),
	(10,'Any other','کوئی اور',10,NULL,1,'2020-08-25 14:21:37','2020-08-25 14:21:37');

/*!40000 ALTER TABLE `disabilities` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
