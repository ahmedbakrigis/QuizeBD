DB= quize
quizetybe
CREATE TABLE `quizetybe` (
`Quize_ID` int PRIMARY KEY AUTO_INCREMENT,
`Quize_Name` varchar (255) NOT null
)ENGINE INNODB


========================================================================
Qoutions
CREATE TABLE `qoutions` (
`Qout_ID` int PRIMARY KEY AUTO_INCREMENT,
`Qout_Name` varchar (255) NOT null,
`quize_ID` int,
CONSTRAINT qoutquize
FOREIGN KEY(`quize_ID`) REFERENCES `quizetybe`(`Quize_ID`)
ON DELETE CASCADE
ON UPDATE CASCADE
)ENGINE INNODB
ALTER TABLE `qoutions` ADD UNIQUE(`Qout_Name`);
=========================================================================
CREATE TABLE `answers` (
`Ans_ID` int PRIMARY KEY AUTO_INCREMENT,
`quize_ID` int,
`qout_ID` int,
`First_Ans` varchar (255) NOT null,
`Second_Ans` varchar (255) NOT null,
`Corect_Ans` varchar (255) NOT null,
CONSTRAINT ansquize
FOREIGN KEY(`quize_ID`) REFERENCES `quizetybe`(`Quize_ID`)
ON DELETE CASCADE
ON UPDATE CASCADE,
CONSTRAINT qoutanser
FOREIGN KEY(`qout_ID`) REFERENCES `qoutions`(`Qout_ID`)
ON DELETE CASCADE
ON UPDATE CASCADE
)ENGINE INNODB
ALTER TABLE `answers` ADD UNIQUE(`Corect_Ans`);


