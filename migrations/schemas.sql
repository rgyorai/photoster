CREATE TABLE `users` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`mail` varchar(70) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL,
	`nickname` varchar(20) NOT NULL,
	`created` datetime NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `photos` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`uid` varchar(10) NOT NULL,
	`imagepath` varchar(70) NOT NULL,
	`created` datetime NOT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `comments` (
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`pid` varchar(10) NOT NULL,
	`uid` varchar(10) NOT NULL,
	`comments` varchar(140),
	`created` datetime NOT NULL,
	PRIMARY KEY (`id`)
);