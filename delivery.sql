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
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `username` varchar(128) NOT NULL,
  `name` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `name`) VALUES
('tom123', 'Tom Tan'),
('lee123', 'Lee Sin');
--
-- Indexes for table `admin_user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Table structure for table `address`
--
DROP TABLE IF EXISTS `address`;
CREATE TABLE `address` (
  `username` varchar(128) NOT NULL,
  `street` varchar(256) NOT NULL,
  `postal_code` varchar(6) NOT NULL,
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