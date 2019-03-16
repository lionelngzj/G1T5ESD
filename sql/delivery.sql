SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+08:00";

--
-- Database: `user`
--
CREATE DATABASE IF NOT EXISTS `users` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `users`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
DROP TABLE IF EXISTS `address`;
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(128) NOT NULL,
  `name` varchar(256) NOT NULL,
  CONSTRAINT user_pk1 PRIMARY KEY (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--
INSERT INTO `user` (`username`, `name`) VALUES
('tom123', 'Tom Tan'),
('lee123', 'Lee Sin');

--
-- Table structure for table `address`
--
CREATE TABLE `address` (
  `username` varchar(128) NOT NULL,
  `street` varchar(256) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
  CONSTRAINT address_pk1 PRIMARY KEY (username),
  CONSTRAINT address FOREIGN KEY (username)
        REFERENCES user (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--
INSERT INTO `address` (`username`, `street`, `postal_code`) VALUES
('tom123', 'Raffles Place', '048618'),
('lee123', 'Tampines', '529538');
--
-- --------------------------------------------------------