#SKD101|hw-php-6-films|1|2018.06.25 12:12:07|3|3

DROP TABLE IF EXISTS `films`;
CREATE TABLE `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `genre` text NOT NULL,
  `year` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 /*!40101 DEFAULT CHARSET=utf8 */;

INSERT INTO `films` VALUES
(2, 'Три билборда', 'драма', '2017'),
(6, 'Гладиатор ', 'боевик, драма', '2000'),
(8, 'Грань будущего', 'фантастика, боевик', '2015');

