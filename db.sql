-- Хост: localhost
-- Время создания: Ноя 19 2013 г., 14:52
-- Версия сервера: 5.5.32
-- Версия PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `acceptic` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `acceptic`;



CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;
