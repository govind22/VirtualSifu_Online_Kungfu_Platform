DROP TABLE IF EXISTS `minty_config`;
CREATE TABLE `minty_config` (
  `ID` int(16) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '',
  `value` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `minty_users`;
CREATE TABLE `minty_users` (
  `ID` int(16) NOT NULL AUTO_INCREMENT,
  `username` text CHARACTER SET utf8 NOT NULL,
  `password` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `super` tinyint(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `tokens`;
CREATE TABLE `tokens` (
  `ID` int(16) NOT NULL AUTO_INCREMENT,
  `token` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `user` int(16) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;