
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Ноя 19 2014 г., 23:10
-- Версия сервера: 5.1.69
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u944640367_catal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `author`
--

DROP TABLE IF EXISTS `author`;
CREATE TABLE IF NOT EXISTS `author` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(60) NOT NULL,
  `second_name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Дамп данных таблицы `author`
--

INSERT INTO `author` (`id`, `first_name`, `second_name`) VALUES
(7, 'Агата', 'Кристи'),
(8, 'Артур Конан', 'Дойл'),
(9, 'Эдвард', 'Радзинский'),
(10, 'Эрих', 'Гамма'),
(11, 'Ричард', 'Хелм'),
(12, 'Ральф', 'Джонсон'),
(13, 'Джон', 'Влиссидес'),
(16, 'Lorem', 'Ipsum'),
(17, 'Lorem', 'Ipsum'),
(18, 'Lorem', 'Ipsum'),
(19, 'Lorem', 'Ipsum'),
(20, 'Lorem', 'Ipsum'),
(21, 'Lorem', 'Ipsum'),
(22, 'Lorem', 'Ipsum'),
(23, 'Lorem', 'Ipsum'),
(24, 'Lorem', 'Ipsum'),
(25, 'Lorem', 'Ipsum'),
(26, 'Lorem', 'Ipsum'),
(27, 'Lorem', 'Ipsum'),
(28, 'Lorem', 'Ipsum'),
(29, 'Lorem', 'Ipsum'),
(30, 'Lorem', 'Ipsum'),
(31, 'Lorem', 'Ipsum'),
(32, 'Lorem', 'Ipsum'),
(33, 'Lorem', 'Ipsum'),
(34, 'Lorem', 'Ipsum'),
(35, 'Lorem', 'Ipsum'),
(36, 'Lorem', 'Ipsum'),
(37, 'Lorem', 'Ipsum');

-- --------------------------------------------------------

--
-- Структура таблицы `author2book`
--

DROP TABLE IF EXISTS `author2book`;
CREATE TABLE IF NOT EXISTS `author2book` (
  `author_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`author_id`,`book_id`),
  KEY `book_id` (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `author2book`
--

INSERT INTO `author2book` (`author_id`, `book_id`) VALUES
(7, 7),
(7, 8),
(8, 4),
(9, 9),
(10, 10),
(11, 10),
(12, 10),
(13, 10),
(14, 11),
(15, 11);

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(120) NOT NULL,
  `cover` varchar(120) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=194 ;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id`, `title`, `cover`) VALUES
(4, 'Приключения Шерлока Холмса', '152211f4.jpg'),
(9, 'Иосиф Сталин. Гибель богов', '67daca67.jpg'),
(7, 'Пять поросят', '67587c72.jpg'),
(8, 'Часы', '14504cf3.jpg'),
(10, 'Приёмы объектно-ориентированного проектирования. Паттерны проектирования', '740fc2ac.jpg'),
(11, 'lorem ipsum dolor', '7da977af.jpg'),
(12, 'lorem ipsum dolor', '7da977af.jpg'),
(13, 'lorem ipsum dolor', '7da977af.jpg'),
(14, 'lorem ipsum dolor', '7da977af.jpg'),
(15, 'lorem ipsum dolor', '7da977af.jpg'),
(16, 'lorem ipsum dolor', '7da977af.jpg'),
(17, 'lorem ipsum dolor', '7da977af.jpg'),
(18, 'lorem ipsum dolor', '7da977af.jpg'),
(19, 'lorem ipsum dolor', '7da977af.jpg'),
(20, 'lorem ipsum dolor', '7da977af.jpg'),
(21, 'lorem ipsum dolor', '7da977af.jpg'),
(22, 'lorem ipsum dolor', '7da977af.jpg'),
(23, 'lorem ipsum dolor', '7da977af.jpg'),
(24, 'lorem ipsum dolor', '7da977af.jpg'),
(25, 'lorem ipsum dolor', '7da977af.jpg'),
(26, 'lorem ipsum dolor', '7da977af.jpg'),
(27, 'lorem ipsum dolor', '7da977af.jpg'),
(28, 'lorem ipsum dolor', '7da977af.jpg'),
(29, 'lorem ipsum dolor', '7da977af.jpg'),
(30, 'lorem ipsum dolor', '7da977af.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Дамп данных таблицы `subject`
--

INSERT INTO `subject` (`id`, `name`) VALUES
(4, 'Классические детективы'),
(5, 'Историческая проза'),
(6, 'История'),
(7, 'Биографии и Мемуары');

-- --------------------------------------------------------

--
-- Структура таблицы `subject2book`
--

DROP TABLE IF EXISTS `subject2book`;
CREATE TABLE IF NOT EXISTS `subject2book` (
  `subject_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  PRIMARY KEY (`subject_id`,`book_id`),
  KEY `book_id` (`book_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subject2book`
--

INSERT INTO `subject2book` (`subject_id`, `book_id`) VALUES
(4, 4),
(4, 7),
(4, 8),
(5, 9),
(6, 9),
(7, 9);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
