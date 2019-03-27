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
  PRIMARY KEY (`username`)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `user` (`username`, `password`, `fullname`, `email`, `hpnumber`) VALUES
('shawnlee95', 'shawnlee123', 'Shawn Lee Min Hwee', 'shawn.lee.2017@smu.edu.sg', 98765432),
('lionelng96', 'lionelng123', 'Lionel Ng Ze Ji', 'lionel.ng.2017@smu.edu.sg', 87654321),
('yuxin', '123', 'Goh Yu Xin', 'yuxin.goh.2017@smu.edu.sg', 76543210);

DROP TABLE IF EXISTS `address`;
CREATE TABLE IF NOT EXISTS `address` (
  `username` varchar(16) NOT NULL,
  `street` varchar(64) NOT NULL,
  `unit` varchar(64),
  `postalcode` int(6) NOT NULL,
  PRIMARY KEY (`username`, `street`,`unit`),
  CONSTRAINT address_fk FOREIGN KEY (username)
    REFERENCES user (username)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `address` (`username`, `street`, `unit`, `postalcode`) VALUES
('shawnlee95', '2E Hong San Walk', '#12-05', '689051'),
('lionelng96', 'Blk 512 Wellington Circle', '#02-18', '750512'),
('yuxin', '11 Chai Chee Road', NULL,'460011'),
('shawnlee95', '2E Hong San Walk', '#11-05', '689051'),
('lionelng96', '368 Thomson Road', NULL, '298127');