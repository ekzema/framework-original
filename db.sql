-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               5.7.20-log - MySQL Community Server (GPL)
-- Операционная система:         Win64
-- HeidiSQL Версия:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Дамп структуры базы данных framework
CREATE DATABASE IF NOT EXISTS `framework` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `framework`;

-- Дамп структуры для таблица framework.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `parent` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы framework.categories: 36 rows
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `title`, `parent`) VALUES
	(685, 'Комплектующие к Apple', 0),
	(691, 'Запчасти iPad', 685),
	(692, 'Запчасти iPhone', 685),
	(693, 'Запчасти iPod', 685),
	(694, 'Запчасти Mac', 685),
	(695, 'iPad', 691),
	(696, 'iPad 2', 691),
	(697, 'iPad NEW (iPad 3)', 691),
	(698, 'iPad 4', 691),
	(699, 'iPad mini', 691),
	(700, 'iPhone', 692),
	(701, 'iPhone 3G/3GS', 692),
	(702, 'iPhone 4', 692),
	(703, 'iPhone 4S', 692),
	(704, 'iPhone 5', 692),
	(705, 'Микросхемы Apple', 685),
	(836, 'Защитные плёнки на Apple', 0),
	(840, 'iPad', 836),
	(841, 'iPhone', 836),
	(842, 'iPod', 836),
	(843, 'Mac', 836),
	(853, 'Оборудование для ремонта Apple', 0),
	(876, 'Аксессуары для Apple', 0),
	(877, 'Аксессуары iPad', 876),
	(878, 'Аксессуары iPhone', 876),
	(879, 'Аксессуары iPod', 876),
	(880, 'Аксессуары Mac', 876),
	(881, 'iPad', 877),
	(882, 'iPad 2', 877),
	(883, 'iPad NEW 3 / iPad 4', 877),
	(884, 'iPad mini', 877),
	(885, 'iPhone 3G / 3GS', 878),
	(886, 'iPhone 4 / 4S', 878),
	(887, 'iPhone 5', 878),
	(888, 'Аксессуары для Apple', 876),
	(895, 'iPhone 5 Lamborghini', 878);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;

-- Дамп структуры для таблица framework.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL DEFAULT '0',
  `is_release` tinyint(1) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `intro_text` text NOT NULL,
  `full_text` text NOT NULL,
  `date` int(10) unsigned NOT NULL,
  `meta_desc` varchar(255) NOT NULL,
  `meta_key` varchar(255) NOT NULL,
  `hits` int(10) unsigned NOT NULL,
  `hide` tinyint(1) unsigned NOT NULL,
  `no_form` tinyint(1) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Дамп данных таблицы framework.posts: ~2 rows (приблизительно)
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `is_release`, `title`, `img`, `intro_text`, `full_text`, `date`, `meta_desc`, `meta_key`, `hits`, `hide`, `no_form`) VALUES
	(1, 4, '6trtrrre', 'ttet  tetet etete ', 'tetet  te e te tetetet et et etetet', ' tete  te  e te te e te te te te t eteteet', 0, 'rereerer e', 're rer ere', 14, 0, 0),
	(2, 4, '6trtr', 'ttet  tetet etete ', 'tetet  te e te tetetet et et etetet', ' tete  te  e te te e te te te te t eteteet', 0, 'rereerer e', 're rer ere', 14, 0, 0);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Дамп структуры для таблица framework.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8;

-- Дамп данных таблицы framework.user: 0 rows
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
