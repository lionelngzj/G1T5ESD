DROP DATABASE IF EXISTS `user`;
CREATE DATABASE `user` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `user`;

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `fullname` char(64) NOT NULL,
  `telegramid` char(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `hpnumber` int(11) NOT NULL,
  PRIMARY KEY (`username`)
)ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `user` (`username`, `password`, `fullname`, `telegramid`, `email`, `hpnumber`) VALUES
('shawnlee95', 'shawnlee123', 'Shawn Lee Min Hwee', 248395638, 'shawn.lee.2017@smu.edu.sg', 98765432),
('lionelng96', 'lionelng123', 'Lionel Ng Ze Ji', 80771196, 'lionel.ng.2017@smu.edu.sg', 87654321),
('yuxin', '123', 'Goh Yu Xin', 44771340, 'yuxin.goh.2017@smu.edu.sg', 76543210),
( "darrenlim96", "darren123", "Darren Lim Cong Hao", 188176270, "darren.lim.2017@smu.edu.sg", 65432109),
("ignatiustan96", "ignatius", "Ignatius Tan Jun Hong", 157884892,"ignatiustan.2017@sis.smu.edu.sg", 54321098);