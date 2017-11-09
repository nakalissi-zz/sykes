/*
SQLyog Ultimate v11.11 (32 bit)
MySQL - 5.5.27 : Database - sykes_interview
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sykes_interview` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `sykes_interview`;

/*Table structure for table `bookings` */

DROP TABLE IF EXISTS `bookings`;

CREATE TABLE `bookings` (
  `__pk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `_fk_property` int(10) unsigned DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`__pk`),
  KEY `con-_fk_property-bookings` (`_fk_property`),
  CONSTRAINT `con-_fk_property-bookings` FOREIGN KEY (`_fk_property`) REFERENCES `properties` (`__pk`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

/*Data for the table `bookings` */

insert  into `bookings`(`__pk`,`_fk_property`,`start_date`,`end_date`) values (1,3,'2013-07-13','2013-06-22'),(2,3,'2013-06-29','2013-07-03'),(3,2,'2013-06-01','2013-06-29'),(4,2,'2013-06-29','2013-07-27'),(5,2,'2013-07-27','2013-08-24'),(6,2,'2013-08-24','2013-09-21'),(7,6,'2013-07-10','2013-07-13'),(8,1,'2013-06-22','2013-06-29'),(9,1,'2013-07-13','2013-07-20'),(10,9,'2013-07-06','2013-07-09'),(11,9,'2013-08-17','2013-08-24'),(12,11,'2013-06-15','2013-06-29'),(13,4,'2013-07-05','2013-07-19');

/*Table structure for table `department` */

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `__pk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `department_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`__pk`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `department` */

insert  into `department`(`__pk`,`department_name`) values (1,'Reservations'),(2,'Owners'),(3,'Customer Care'),(4,'Marketing'),(5,'IT');

/*Table structure for table `employee` */

DROP TABLE IF EXISTS `employee`;

CREATE TABLE `employee` (
  `__pk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `_fk_department` int(10) unsigned DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`__pk`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

/*Data for the table `employee` */

insert  into `employee`(`__pk`,`_fk_department`,`first_name`,`last_name`,`age`) values (1,3,'James','Rafferty',21),(2,1,'Ben','Jones',23),(3,NULL,'Ross','Steinberg',56),(4,4,'Christine','Robinson',44),(5,5,'John','Smith',38),(6,2,'Claire','Jenkins',41),(7,2,'Zoe','Dean',21);

/*Table structure for table `locations` */

DROP TABLE IF EXISTS `locations`;

CREATE TABLE `locations` (
  `__pk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `location_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`__pk`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `locations` */

insert  into `locations`(`__pk`,`location_name`) values (1,'Cornwall'),(2,'Lake District'),(3,'Yorkshire'),(4,'Wales'),(5,'Scotland');

/*Table structure for table `properties` */

DROP TABLE IF EXISTS `properties`;

CREATE TABLE `properties` (
  `__pk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `_fk_location` int(10) unsigned DEFAULT NULL,
  `property_name` varchar(255) DEFAULT NULL,
  `near_beach` tinyint(1) unsigned DEFAULT NULL,
  `accepet_pets` tinyint(1) unsigned DEFAULT NULL,
  `sleeps` tinyint(3) unsigned DEFAULT NULL,
  `beds` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`__pk`),
  KEY `con-_fk_location-properties` (`_fk_location`),
  CONSTRAINT `con-_fk_location-properties` FOREIGN KEY (`_fk_location`) REFERENCES `locations` (`__pk`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `properties` */

insert  into `properties`(`__pk`,`_fk_location`,`property_name`,`near_beach`,`accepet_pets`,`sleeps`,`beds`) values (1,1,'Sea View',1,1,4,2),(2,3,'Cosey',0,0,6,4),(3,5,'The Retreat',1,0,2,1),(4,5,'Coach House',0,1,5,3),(5,4,'Beach Cottage',1,1,8,6),(6,2,'Sunny Cottage',1,0,4,2),(7,1,'The Coach House',0,0,4,2),(8,4,'Barn Cottage',0,0,6,3),(9,4,'Palmers Lodge',0,1,4,3),(10,2,'Kingfisher Cottage',0,0,2,1),(11,1,'Sunnyvale',1,1,4,2),(12,5,'The Garden Appartment',0,0,2,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
