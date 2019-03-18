SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- -----------------------------------------------------------------------------------------
DROP DATABASE IF EXISTS `user`;
CREATE DATABASE `user` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `user`;

DROP TABLE IF EXISTS `address`;
DROP TABLE IF EXISTS `consumer`;
CREATE TABLE IF NOT EXISTS `consumer` (
  `username` varchar(16) NOT NULL,
  `fullname` char(25) NOT NULL,
  `hp` int(8) NOT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`username`)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `consumer` (`username`, `fullname`, `hp`, `password`) VALUES
('shawnlee95', 'Shawn Lee Min Hwee', '98765432', 'apple123'),
('lionelng96', 'Lionel Ng Ze Ji', '87654321', 'pear123'),
('gohyuxin', 'Goh Yu Xin', '76543210', 'orange123');

CREATE TABLE IF NOT EXISTS `address` (
  `username` varchar(16) NOT NULL,
  `addressline` varchar(64) NOT NULL,
  `postalcode` varchar(6) NOT NULL,
  PRIMARY KEY (`username`, `addressline`),
  CONSTRAINT address_fk FOREIGN KEY (username)
    REFERENCES consumer (username)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `address` (`username`, `addressline`, `postalcode`) VALUES
('shawnlee95', '123 Clementi', '120123'),
('shawnlee95', '222 Clementi Road', '120222');

DROP TABLE IF EXISTS `drivers`;
CREATE TABLE IF NOT EXISTS `drivers` (
  `username` varchar(16) NOT NULL,
  `fullname` char(25) NOT NULL,
  `hp` int(8) NOT NULL,
  `password` varchar(16) NOT NULL,
  `wallet` float NOT NULL DEFAULT 0.0,
  PRIMARY KEY (`username`)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `drivers` (`username`, `fullname`, `hp`, `password`) VALUES
('ignatiusdriver', 'Ignatius Tan', 99998888,'iggy123'),
('shawndriver', 'Shawn Lee', 88889999,'shawn123');

-- -----------------------------------------------------------------------------------------
DROP DATABASE IF EXISTS `foodorders`;
CREATE DATABASE `foodorders` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `foodorders`;

DROP TABLE IF EXISTS `orderitems`;
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `username` int(11) NOT NULL,
  `restaurantid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT NOW(),
  `driver_username` varchar(16) DEFAULT NULL, 
  `paymentid` int(11) NOT NULL,
  PRIMARY KEY (`orderid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `orderitems` (
  `orderid` int(11) NOT NULL,
  `itemid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`orderid`, `itemid`),
	CONSTRAINT orderitems_fk FOREIGN KEY (orderid)
        REFERENCES orders (orderid)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `orders` (`username`, `restaurantid`, `date`, `paymentid`) VALUES
('shawnlee95', 3, '2019-03-16 12:55:00', 1),
('shawnlee95', 5, '2019-03-17 15:40:00', 2),
('lionelng96', 1, '2019-03-17 15:55:00', 3);

INSERT INTO `orderitems` (`orderid`, `itemid`, `quantity`) VALUES
(1, 31, 1),
(1, 32, 2),
(2, 1, 3),
(2, 4, 3),
(2, 7, 6),
(3, 25, 1);

-- -----------------------------------------------------------------------------------------