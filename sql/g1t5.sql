SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- -----------------------------------------------------------------------------------------
CREATE DATABASE IF NOT EXISTS `user` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `user`;

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `fullname` char(25) NOT NULL,
  `hp` int(8) NOT NULL,
  `password` varchar(16) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

INSERT INTO `user` (`userid`, `username`, `fullname`, `hp`, `password`) VALUES
(NULL, 'shawnlee95', 'Shawn Lee Min Hwee', '98765432', 'apple123'),
(NULL, 'lionelng96', 'Lionel Ng Ze Ji', '87654321', 'pear123'),
(NULL, 'gohyuxin', 'Goh Yu Xin', '76543210', 'orange123');

-- -----------------------------------------------------------------------------------------

CREATE DATABASE IF NOT EXISTS `foodorders` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `foodorders`;

DROP TABLE IF EXISTS `orderitems`;
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
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
