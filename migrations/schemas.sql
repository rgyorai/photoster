CREATE TABLE `users` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`mail` varchar(70) NOT NULL,
	`password` varchar(20) NOT NULL,
	`nickname` varchar(20) NOT NULL,
	`created` datetime NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `photos` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`userid` varchar(10) NOT NULL,
	`imagepath` varchar(70) NOT NULL,
	`comments` varchar(140),
	`created` datetime NOT NULL,
	PRIMARY KEY (`id`)
);