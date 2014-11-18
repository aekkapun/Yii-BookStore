SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

CREATE DATABASE IF NOT EXISTS yii_catalog DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE yii_catalog;

DROP TABLE IF EXISTS author;
CREATE TABLE IF NOT EXISTS author (
id int(11) NOT NULL,
  first_name varchar(60) NOT NULL,
  second_name varchar(60) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

INSERT INTO author (id, first_name, second_name) VALUES
(1, 'Лев', 'Толстой'),
(2, 'Douglas', 'Adams'),
(3, 'Erich', 'Gamma'),
(4, 'Richard', 'Helm'),
(5, 'Ralph', 'Johnson'),
(6, 'John', 'Vlissides');

DROP TABLE IF EXISTS author2book;
CREATE TABLE IF NOT EXISTS author2book (
  author_id int(11) NOT NULL,
  book_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO author2book (author_id, book_id) VALUES
(2, 1),
(1, 2),
(3, 3),
(4, 3),
(5, 3),
(6, 3);

DROP TABLE IF EXISTS book;
CREATE TABLE IF NOT EXISTS book (
id int(11) NOT NULL,
  title varchar(120) NOT NULL,
  cover varchar(120) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO book (id, title, cover) VALUES
(1, 'The Hitchhiker''s Guide to the Galaxy', 'H2G2_UK_front_cover.jpg'),
(2, 'Война и мир', 'Tolstoy_-_War_and_Peace_-_first_edition,_1869.jpg'),
(3, 'Design Patterns: Elements of Reusable Object-Oriented Software', 'Design_Patterns_cover.jpg');

DROP TABLE IF EXISTS subject;
CREATE TABLE IF NOT EXISTS `subject` (
id int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

INSERT INTO subject (id, name) VALUES
(1, 'science fiction'),
(2, 'novel'),
(3, 'software engineering');

DROP TABLE IF EXISTS subject2book;
CREATE TABLE IF NOT EXISTS subject2book (
  subject_id int(11) NOT NULL,
  book_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO subject2book (subject_id, book_id) VALUES
(1, 1),
(1, 2),
(2, 2),
(3, 3);


ALTER TABLE author
 ADD PRIMARY KEY (id);

ALTER TABLE author2book
 ADD PRIMARY KEY (author_id,book_id), ADD KEY book_id (book_id);

ALTER TABLE book
 ADD PRIMARY KEY (id);

ALTER TABLE subject
 ADD PRIMARY KEY (id);

ALTER TABLE subject2book
 ADD PRIMARY KEY (subject_id,book_id), ADD KEY book_id (book_id);


ALTER TABLE author
MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
ALTER TABLE book
MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
ALTER TABLE subject
MODIFY id int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;

ALTER TABLE author2book
ADD CONSTRAINT author2book_ibfk_1 FOREIGN KEY (author_id) REFERENCES author (id),
ADD CONSTRAINT author2book_ibfk_2 FOREIGN KEY (book_id) REFERENCES book (id);

ALTER TABLE subject2book
ADD CONSTRAINT subject2book_ibfk_1 FOREIGN KEY (subject_id) REFERENCES subject (id),
ADD CONSTRAINT subject2book_ibfk_2 FOREIGN KEY (book_id) REFERENCES book (id);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
