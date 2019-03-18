SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- -----------------------------------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `user` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `user`;

DROP TABLE IF EXISTS `address`;
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(16) NOT NULL,
  `fullname` char(25) NOT NULL,
  `hp` int(8) NOT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`username`)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `user` (`username`, `fullname`, `hp`, `password`) VALUES
('shawnlee95', 'Shawn Lee Min Hwee', '98765432', 'apple123'),
('lionelng96', 'Lionel Ng Ze Ji', '87654321', 'pear123'),
('gohyuxin', 'Goh Yu Xin', '76543210', 'orange123');

CREATE TABLE IF NOT EXISTS `address` (
  `username` varchar(16) NOT NULL,
  `address` varchar(64) NOT NULL,
  `postalcode` varchar(6) NOT NULL,
  PRIMARY KEY (`username`, `address`),
  CONSTRAINT address_fk FOREIGN KEY (username)
    REFERENCES user (username)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `address` (`username`, `address`, `postalcode`) VALUES
('shawnlee95', '123 Clementi', '120123'),
('shawnlee95', '222 Clementi', '120222');

-- -----------------------------------------------------------------------------------------

CREATE DATABASE IF NOT EXISTS `foodorders` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `foodorders`;

DROP TABLE IF EXISTS `orderitems`;
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `username` int(11) NOT NULL,
  `restaurantid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT NOW(),
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

CREATE DATABASE IF NOT EXISTS `restaurant` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `restaurant`;

DROP TABLE IF EXISTS `restaurant_list`;
CREATE TABLE IF NOT EXISTS `restaurant_list` (
    `rid` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `phone` int(11) NOT NULL,
    `street` varchar(255) NOT NULL,
    `unit_no` int(11) NOT NULL,
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
