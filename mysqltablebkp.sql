/*
SQLyog Community Edition- MySQL GUI v6.56
MySQL - 5.5.8-log : Database - mtest
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE DATABASE /*!32312 IF NOT EXISTS*/`mtest` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mtest`;

/*Table structure for table `tbl_manufacturer` */

DROP TABLE IF EXISTS `tbl_manufacturer`;

CREATE TABLE `tbl_manufacturer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mname` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`mname`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_manufacturer` */

insert  into `tbl_manufacturer`(`id`,`mname`) values (1,'maruti'),(2,'honda');

/*Table structure for table `tbl_modeldetail` */

DROP TABLE IF EXISTS `tbl_modeldetail`;

CREATE TABLE `tbl_modeldetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manufactureID` int(11) NOT NULL,
  `modelName` varchar(255) NOT NULL DEFAULT '',
  `color` varchar(255) NOT NULL DEFAULT '',
  `myear` varchar(255) NOT NULL DEFAULT '',
  `rno` varchar(255) NOT NULL DEFAULT '',
  `imagestr` varchar(255) NOT NULL DEFAULT '',
  `sold` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_modeldetail` */

insert  into `tbl_modeldetail`(`id`,`manufactureID`,`modelName`,`color`,`myear`,`rno`,`imagestr`,`sold`) values (1,1,'dzire','black','2018','mp09na1245','1526829517_UNADJUSTEDNONRAW_thumb_9ae.jpg,1526829517_UNADJUSTEDNONRAW_thumb_9af.jpg',1),(2,1,'dzire','red','2018','mp09na1242','1526829543_UNADJUSTEDNONRAW_thumb_9ae.jpg,1526829543_UNADJUSTEDNONRAW_thumb_9af.jpg',1),(3,1,'dzire','white','2018','mp09na1243','1526829551_UNADJUSTEDNONRAW_thumb_9ae.jpg,1526829551_UNADJUSTEDNONRAW_thumb_9af.jpg',0),(4,2,'jazz','white','2018','mp09na1241','1526829624_UNADJUSTEDNONRAW_thumb_9b0.jpg',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
