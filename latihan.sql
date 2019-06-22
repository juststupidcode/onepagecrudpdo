/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 5.7.17-log : Database - latihan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`latihan` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `latihan`;

/*Table structure for table `mhs` */

DROP TABLE IF EXISTS `mhs`;

CREATE TABLE `mhs` (
  `nim` int(4) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `lahir` varchar(30) NOT NULL,
  `nilai` varchar(50) NOT NULL,
  PRIMARY KEY (`nim`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `mhs` */

insert  into `mhs`(`nim`,`nama`,`lahir`,`nilai`) values 
(2017001,'Ade Yonatan','Jakarta, 7 Januari 1993','100');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
