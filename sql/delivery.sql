SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+08:00";

--
-- Database: `user`
--
DROP DATABASE IF EXISTS `users`;
CREATE DATABASE `users` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `users`;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--
DROP TABLE IF EXISTS `address`;
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(64) NOT NULL,
  `name` varchar(128) NOT NULL,
  `phonenumber` varchar(8) NOT NULL,
  CONSTRAINT user_pk1 PRIMARY KEY (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--
INSERT INTO `user` (`username`, `name`, `phonenumber`) VALUES
('tom123', 'Tom Tan', '99998888'),
('lee123', 'Lee Sin', '91231234');

-- --------------------------------------------------------
