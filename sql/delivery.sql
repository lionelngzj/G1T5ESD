SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `appuser` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `appuser`;


DROP TABLE IF EXISTS `appuser`;
CREATE TABLE IF NOT EXISTS `appuser` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `fullname` char(25) NOT NULL,
  `hp` varchar(8) NOT NULL,
  `userpw` char(16) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;


INSERT INTO `appuser` (`userid`, `username`, `fullname`, `hp`, `userpw`) VALUES
(NULL, 'shawnlee95', 'Shawn Lee Min Hwee', '98765432', 'apple123'),
(NULL, 'lionelng96', 'Lionel Ng Ze Ji', '87654321', 'pear123'),
(NULL, 'gohyuxin', 'Goh Yu Xin', '76543210', 'orange123');