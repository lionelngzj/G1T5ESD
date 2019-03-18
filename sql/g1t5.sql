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
  `userid` int(11) NOT NULL,
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

INSERT INTO `orders` (`userid`, `restaurantid`, `date`, `paymentid`) VALUES
(1, 3, '2019-03-16 12:55:00', 1),
(1, 5, '2019-03-17 15:40:00', 2),
(2, 1, '2019-03-17 15:55:00', 3);

INSERT INTO `orderitems` (`orderid`, `itemid`, `quantity`) VALUES
(1, 31, 1),
(1, 32, 2),
(2, 1, 3),
(2, 4, 3),
(2, 7, 6),
(3, 25, 1);

-- -----------------------------------------------------------------------------------------

CREATE DATABASE IF NOT EXISTS `restaurant` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `restaurant`;

DROP TABLE IF EXISTS `restaurant_list`;
CREATE TABLE IF NOT EXISTS `restaurant_list` (
    `rid` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `phone` int(11) NOT NULL,
    `street` varchar(255) NOT NULL,
    `unit_no` varchar(255) NOT NULL,
    `postal_code` int(11) NOT NULL,
    PRIMARY KEY (rid)
    )
DROP TABLE IF EXISTS `menuitems`;
CREATE TABLE IF NOT EXISTS `menuitems` (
    `rid` int(11) NOT NULL,
    `fid` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `unit_price` float(11) NOT NULL,
    `category` varchar(255) NOT NULL,
    PRIMARY KEY (`rid`, `fid`),
	CONSTRAINT menuitems_fk FOREIGN KEY (rid)
        REFERENCES restaurant_list (rid)
    )
    
INSERT INTO restaurant_list (rid, name, phone, street, unit_no, postal_code) VALUES
(1, 'Odette', 91234567, "1 St Andrew's Rd", '#01-04', 178957 ),
(2, 'BAKALAKI Greek Taverna', 91234568, "3 Seng Poh Rd", '#02-03', 168891 ),
(3, 'Jiang-Nan Chun', 91234569,  '190 Orchard Blvd', '#12-01', 248646),
(4, 'Colony', 91234560, "7 Raffles Ave, The Ritz-Carlton, Millenia Singapore", '#01-14', 039799 ),
(5, 'Meta Restaurant', 91234561, "1 Keong Saik Rd", '#22-03', 089109 ),
(6, 'NOX - Dine in the Dark', 91234562,  '269 Beach Rd', '#14-21', 199546),
(7, 'Ballisco', 91234563, "1 Cuscaden Rd, Level 2 Regent Singapore A Four Seasons Hotel", '#02-04', 249715 ),
(8, 'Summer Pavilion', 91234564, "7 Raffles Ave", '#03-03', 039799 ),
(9, 'Cheek By Jowl', 91234565,  '21 Boon Tat St', '#42-01', 069620),
(10, 'Rhubarb', 91234566,  '3 Duxton Hill', '#112-01', 089589);
