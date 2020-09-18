CREATE TABLE IF NOT EXISTS `users` (
`id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
`email` varchar(50) COLLATE utf8_general_ci NOT NULL,
`password` varchar(100) COLLATE utf8_general_ci NOT NULL,
`registered_at` varchar(50) NOT NULL,
`roles` varchar(150) COLLATE utf8_general_ci NOT NULL,
`api_token` varchar(255) NULLABLE,
PRIMARY KEY (`id`),
UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

INSERT INTO users (email, password, roles, registered_at, api_token) VALUES ('john@doe.fr', 'password', "[\"ROLE_USER\"]", 2020-09-10 18:38:03.756612 Europe/Berlin (+02:00), '')