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

/* Procedure structure for procedure `STR_SAVE` */

/*!50003 DROP PROCEDURE IF EXISTS  `STR_SAVE` */;

DELIMITER $$

/*!50003 CREATE  PROCEDURE `STR_SAVE`(Query1 LONGTEXT,OUT Elocal INT(1),OUT EMessage VARCHAR(100))
BEGIN
DECLARE Emsg_val VARCHAR(100);
DECLARE Eretrun_val INT(1);
DECLARE EXIT HANDLER FOR SQLWARNING
BEGIN
SET Elocal=0;
SET EMessage='SQLWARNING IN STR_SAVE';
ROLLBACK;
END;
DECLARE EXIT HANDLER FOR SQLEXCEPTION
  BEGIN
   SET ELocal = 2;
   SET EMessage = 'SQLEXCEPTION IN STR_SAVE';
   ROLLBACK;
 END;
  START TRANSACTION; 
     SET @Qry = NULL;
  IF(Query1 <> '') THEN
      SET @Qry = Query1;
      PREPARE stmt FROM @Qry;
      EXECUTE stmt;
      DEALLOCATE PREPARE stmt;
  END IF;
COMMIT;
 SET ELocal = 1;
 SET EMessage = 'SUCCESSFULL';
END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
