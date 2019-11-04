CREATE DATABASE ci3_user_availability;
USE ci3_user_availability;
 
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(60) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `username`, `name`, `email`,`password`) VALUES
(1, 'admin', 'Admin', 'admin@gmail.com','12345'),
(2, 'cacan', 'Cacan', 'cacan@yahoo.com','12345'),
(3, 'rokib', 'Rokib', 'rokib@yahoo.com','12345'),
(4, 'robin', 'Robin', 'robin@gmail.com','12345');