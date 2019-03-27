SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

-- -----------------------------------------------------------------------------------------
DROP DATABASE IF EXISTS `foodorders`;
CREATE DATABASE `foodorders` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `foodorders`;

DROP TABLE IF EXISTS `orderitems`;
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(16) NOT NULL,
  `restaurantid` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT NOW(),
  `status` varchar(16) NOT NULL,
  `paymentreceipt` varchar(68) NOT NULL,
  `total_amount` float NOT NULL,
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

INSERT INTO `orders` (`username`, `restaurantid`, `date`, `status`,`paymentreceipt`, `total_amount`) VALUES
('shawnlee95', 1, '2019-03-16 12:55:00', 'paid', '#1777-6432', 109.00),
('yuxin', 2, '2019-03-17 15:40:00', 'paid', '#1777-6433', 13.00),
('lionelng96', 1, '2019-03-17 17:22:10', 'paid', '#1777-6434', 23.4),
('yuxin', 1, '2019-03-18 11:32:03', 'paid', '#1777-6435', 18.3);

INSERT INTO `orderitems` (`orderid`, `itemid`, `quantity`) VALUES
(1, 1, 10),
(2, 1, 1),
(2, 2, 1),
(3, 7, 6),
(4, 4, 1),
(4, 5, 1),
(4, 6, 1);