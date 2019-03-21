SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- -----------------------------------------------------------------------------------------
DROP DATABASE IF EXISTS `user`;
CREATE DATABASE `user` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `user`;

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `fullname` char(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `hpnumber` int(11) NOT NULL,
  `driverwallet` float NOT NULL DEFAULT 0.0,
  PRIMARY KEY (`username`)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `user` (`username`, `password`, `fullname`, `email`, `hpnumber`, `driverwallet`) VALUES
('shawnlee95', 'shawnlee123', 'Shawn Lee Min Hwee', 'shawn.lee.2017@smu.edu.sg', 98765432, NULL),
('lionelng96', 'lionelng123', 'Lionel Ng Ze Ji', 'lionel.ng.2017@smu.edu.sg', 87654321, NULL),
('gohyuxin91', 'gohyuxin123', 'Goh Yu Xin', 'yuxin.goh.2017@smu.edu.sg', 76543210, NULL);

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `username` varchar(16) NOT NULL,
  `streetunit` varchar(64) NOT NULL,
  `postalcode` int(6) NOT NULL,
  PRIMARY KEY (`username`, `streetunit`),
  CONSTRAINT address_fk FOREIGN KEY (username)
    REFERENCES user (username)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `address` (`username`, `streetunit`, `postalcode`) VALUES
('shawnlee95', '2E Hong San Walk #12-05', '689051'),
('lionelng96', 'Blk 512 Wellington Circle #02-18', '750512'),
('gohyuxin91', '11 Chai Chee Road', '460011'),
('shawnlee95', '2E Hong San Walk #11-05', '689051'),
('lionelng96', '368 Thomson Road', '298127');