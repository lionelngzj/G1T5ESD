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
  `address` varchar(64) NOT NULL,
  `postalcode` int(6) NOT NULL,
  PRIMARY KEY (`username`, `address`),
  CONSTRAINT address_fk FOREIGN KEY (username)
    REFERENCES user (username)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `address` (`username`, `address`, `postalcode`) VALUES
('shawnlee95', '2E Hong San Walk #12-05', '689051'),
('lionelng96', 'Blk 512 Wellington Circle #02-18', '750512'),
('gohyuxin91', '11 Chai Chee Road', '460011'),
('shawnlee95', '2E Hong San Walk #11-05', '689051'),
('lionelng96', '368 Thomson Road', '298127');

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
(1, 10, '2019-03-17 17:22:10', 2),
(2, 1, '2019-03-18 11:32:03', 3);

INSERT INTO `orderitems` (`orderid`, `itemid`, `quantity`) VALUES
(1, 5, 1),
(1, 2, 2),
(2, 6, 3),
(2, 1, 3),
(2, 7, 6),
(3, 3, 1),
(4, 8, 4),
(4, 5, 2);

-- -----------------------------------------------------------------------------------------

DROP DATABASE IF EXISTS `restaurant`;
CREATE DATABASE `restaurant` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
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
    );

INSERT INTO `restaurant_list` (`rid`, `name`, `phone`, `street`, `unit_no`, `postal_code`) VALUES
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
    );

INSERT INTO `menuitems` (`rid`, `fid`, `name`, `unit_price`, `category`) VALUES
(1, 1, "Eggs Benedict", 10.90, "Food"),
(1, 2, "Club Sandwich", 7.90, "Food"),
(1, 3, "Cheesy Omelette", 8.90, "Food"),
(1, 4, "Milk Toast", 5.50, "Food"),
(1, 5, "Spinach Quiche", 8.90, "Food"),
(1, 6, "Strawberry Milkshake", 3.90, "Drinks"),
(1, 7, "Chocolate Milkshake", 3.90, "Drinks"),
(1, 8, "Banana Milkshake", 3.90, "Drinks"),
(1, 9, "Caramel Macchiato ", 4.50, "Drinks"),
(1, 10, "Chocolate Waffles", 4.80, "Desserts"),
(1, 11, "Ice-Cream Waffles", 5.80, "Desserts"),
(1, 12, "Chocolate Lava Cake", 6.90, "Desserts"),
(2, 1, "Bacon Aglio Olio", 6.50, "Food"),
(2, 2, "Chicken Sausage Cream Pasta", 6.50, "Food"),
(2, 3, "Mac & Cheese", 7.90, "Food"),
(2, 4, "Fish & Chips", 7.90, "Food"),
(2, 5, "Beef Bolognese", 6.90, "Food"),
(2, 6, "Beef Lasagna", 8.90, "Food"),
(2, 7, "Ice Lemon Tea", 3.40, "Drinks"),
(2, 8, "Iced Lemonade", 3.40, "Drinks"),
(2, 9, "Iced Latte", 4.30, "Drinks"),
(2, 10, "Hot Latte", 3.90, "Drinks"),
(2, 11, "Fudgy Brownie", 2.90, "Desserts"),
(2, 12, "Oreo Cheesecake", 3.90, "Desserts"),
(2, 13, "Apple Crumble Pie", 3.50, "Desserts"),
(2, 14, "Strawberry Cheesecake", 3.50, "Desserts"),
(3, 1, "Fish Porridge", 4.50, "Food"),
(3, 2, "Pork Porridge", 3.50, "Food"),
(3, 3, "Minced Meat Noodles", 3.30, "Food"),
(3, 4, "Prawn Noodles", 3.80, "Food"),
(3, 5, "Minced Meat Porridge", 3.50, "Food"),
(3, 6, "Frog Porridge", 5.00, "Food"),
(3, 7, "Sweet and Sour Pork Rice", 6.00, "Food"),
(3, 8, "Iced Barley", 1.80, "Drinks"),
(3, 9, "Iced Milo", 1.50, "Drinks"),
(3, 10, "Chrysanthemum Tea", 1.50, "Drinks"),
(3, 11, "Water Chestnut Drink ", 1.50, "Drinks"),
(3, 12, "Sugar Cane Juice", 1.50, "Drinks"),
(4, 1, "Mango Salad", 4.50, "Food"),
(4, 2, "Papaya Salad", 4.50, "Food"),
(4, 3, "Glass Noodle Salad", 4.50, "Food"),
(4, 4, "Spring Rolls", 3.50, "Food"),
(4, 5, "Seafood Tom Yum Fried Rice", 6.90, "Food"),
(4, 6, "Beef Pad Thai", 7.90, "Food"),
(4, 7, "Thai Fresh Coconut", 4.00, "Drinks"),
(4, 8, "Thai Iced Milk Tea", 2.50, "Drinks"),
(4, 9, "Thai Iced Green Milk Tea", 2.50, "Drinks"),
(4, 10, "Iced Coffee", 2.50, "Drinks"),
(4, 11, "Iced Lemongrass", 2.50, "Drinks"),
(4, 12, "Mango Sticky Rice", 5.50, "Desserts"),
(4, 13, "Tapioca with Coconut Milk", 3.50, "Desserts"),
(4, 14, "Red Ruby", 3.50, "Desserts"),
(5, 1, "Signature Boiled Chicken(no rice)", 5.35, "Food"),
(5, 2, "Chicken Wing(2)(no rice)", 5.35, "Food"),
(5, 3, "Chicken Drumstick(no rice)", 6.35, "Food"),
(5, 4, "Chicken Rice", 0.85, "Food"),
(5, 5, "Sweet & Sour Pork", 12.30, "Food"),
(5, 6, "Imperial Pork Ribs", 14.90, "Food"),
(5, 7, "Lettuce with Oyster Sauce", 8.30, "Food"),
(5, 8, "Foo Chow Fish Ball Soup", 2.30, "Food"),
(5, 9, "Sambal Kang Kong", 9.90, "Food"),
(5, 10, "Crispy Prawn Porridge", 6.30, "Food"),
(5, 11, "Canned Drink", 2.50, "Drinks"),
(5, 12, "Barley Water", 3.00, "Drinks"),
(5, 13, "Lime Juice", 3.00, "Drinks"),
(5, 14, "Mineral Water", 1.80, "Drinks"),
(6, 1, "Cappuccino", 6.00, "Drinks"),
(6, 2, "White Chocolate Mocha", 6.70, "Drinks"),
(6, 3, "Vanilla Latte", 6.70, "Drinks"),
(6, 4, "Espresso", 3.70, "Drinks"),
(6, 5, "Caffe Latte", 6.00, "Drinks"),
(6, 6, "Caffe Mocha", 6.00, "Drinks"),
(6, 7, "Espresso", 3.70, "Drinks"),
(6, 8, "Caramel Hot Chocolate", 7.30, "Drinks"),
(6, 9, "Earl Grey Black Tea", 4.50, "Drinks"),
(6, 10, "Chai Black Tea", 4.50, "Drinks"),
(6, 11, "English Breakfast Black Tea", 4.50, "Drinks"),
(6, 12, "Youth Berry Green & White Tea", 4.50, "Drinks"),
(6, 13, "Caramel Frappuccino", 6.40, "Drinks"),
(6, 14, "Java Chip Frappuccino", 7.00, "Drinks"),
(7, 1, "Veggie Delite Sandwich", 4.90, "Food"),
(7, 2, "Chicken Ham Sandwich", 5.60, "Food"),
(7, 3, "Tuna Sandwich", 5.60, "Food"),
(7, 4, "Egg Mayo Sandwich", 5.20, "Food"),
(7, 5, "Turkey Sandwich", 5.90, "Food"),
(7, 6, "Chicken Breast Sandwich", 6.50, "Food"),
(7, 7, "Beef Meatball Sandwich", 6.50, "Food"),
(7, 8, "Italian BMT Sandwich", 6.50, "Food"),
(7, 9, "Orange Juice", 2.50, "Drinks"),
(7, 10, "Green Tea", 2.50, "Drinks"),
(7, 11, "Coke", 3.00, "Drinks"),
(7, 12, "Veggie Delite Sandwich", 4.90, "Drinks"),
(7, 13, "Cookie (1 piece)", 1.50, "Desserts"),
(7, 14, "Yoghurt", 2.00, "Desserts"),
(8, 1, "Plain Prata", 1.30, "Food"),
(8, 2, "Egg Prata", 2.00, "Food"),
(8, 3, "Cheese Prata", 3.00, "Food"),
(8, 4, "Prata Bomb", 3.50, "Food"),
(8, 5, "Briyani Chicken", 8.00, "Food"),
(8, 6, "Murtabak Mutton", 8.00, "Food"),
(8, 7, "Plain Naan", 2.00, "Food"),
(8, 8, "Nasi Goreng Seafood", 6.40, "Food"),
(8, 9, "Mee Goreng", 5.00, "Food"),
(8, 10, "Milo Dinosaur", 2.50, "Drinks"),
(8, 11, "Teh Cino", 2.00, "Drinks"),
(8, 12, "Tea", 1.40, "Drinks"),
(8, 13, "Bandung Ice", 2.00, "Drinks"),
(8, 14, "Masala Tea", 1.80, "Drinks"),
(9, 1, "Chicken Cha-Shu Ramen", 11.50, "Food"),
(9, 2, "Tokontsu Ramen", 11.50, "Food"),
(9, 3, "Beef Ramen", 13.50, "Food"),
(9, 4, "Mushroom Ramen", 10.50, "Food"),
(9, 5, "Ikura Sushi", 11.50, "Food"),
(9, 6, "Chirashi Don", 16.50, "Food"),
(9, 7, "Salmon Sashimi", 11.50, "Food"),
(9, 8, "Prawn Tempura (3pieces)", 9.90, "Food"),
(9, 9, "Vegetables Tempura", 9.90, "Food"),
(9, 10, "Oyako Don", 11.50, "Food"),
(9, 11, "Beef Don", 11.50, "Food"),
(9, 12, "Mineral Water", 2.50, "Drinks"),
(9, 13, "Lemon Tea", 2.50, "Drinks"),
(9, 14, "Sprite", 2.50, "Drinks"),
(10, 1, "Wagyu Burger Demi-Glace", 4.70, "Food"),
(10, 2, "Teriyaki Chicken Burger", 3.90, "Food"),
(10, 3, "Fish Burger", 3.40, "Food"),
(10, 4, "Cheese Burger", 2.50, "Food"),
(10, 5, "Chicken Burger", 3.40, "Food"),
(10, 6, "Ebi Burger", 3.90, "Food"),
(10, 7, "Green Salad", 3.60, "Food"),
(10, 8, "Clam Chowder", 2.60, "Food"),
(10, 9, "Corn Soup", 2.60, "Food"),
(10, 10, "Mushroom Soup", 2.60, "Food"),
(10, 11, "Grape Soda", 2.30, "Drinks"),
(10, 12, "Fresh Milk", 2.00, "Drinks"),
(10, 13, "Iced Peach Tea", 2.50, "Drinks"),
(10, 14, "Oolong Tea", 2.50, "Drinks");