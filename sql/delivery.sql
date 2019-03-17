SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+08:00";

DROP DATABASE IF EXISTS APPuser;
CREATE DATABASE APPuser DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE APPuser;

CREATE TABLE APPuser
(UserID int NOT NULL AUTO_INCREMENT,
 Username varchar(25) NOT NULL,
 Fullname varchar(25) NOT NULL,
 PhoneNo int NOT NULL,
 UserPW varchar(25) NOT NULL,
 constraint userID_pk primary key (UserID));
 
 INSERT INTO `appuser` (`Username`, `Fullname`, `PhoneNo`, `UserPW`) VALUES 
 ('shawnleemh', 'Shawn Lee Min Hwee', '97332638', 'shawnleemh'),
 ('gohyuxin', 'Goh Yu Xin', '92192123', 'iamyuxin'),
 ('lionelnzj', 'Lionel Ng Ze Ji', '94231231', 'lionelng1996');