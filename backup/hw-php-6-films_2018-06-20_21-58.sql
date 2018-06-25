#SKD101|hw-php-6-films|1|2018.06.20 21:58:45|4|4

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `genre` text NOT NULL,
  `year` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 /*!40101 DEFAULT CHARSET=utf8 */;

INSERT INTO `user` VALUES
(1, 'Гладиатор', 'Боевик', '2000'),
(5, 'Игры разума', 'драма', '2001'),
(6, 'Игры разума', 'драма', '2001'),
(7, 'Три билборда', 'драма', '2017'),
(8, 'Эффект бабочки', 'триллер', '2004');

