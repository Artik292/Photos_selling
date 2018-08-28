# ************************************************************
# Sequel Pro SQL dump
# Версия 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Адрес: 127.0.0.1 (MySQL 5.5.5-10.3.8-MariaDB)
# Схема: Photo_selling
# Время создания: 2018-08-28 08:55:32 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Дамп таблицы event
# ------------------------------------------------------------

DROP TABLE IF EXISTS `event`;

CREATE TABLE `event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_date` date DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `photographer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_event_photographer_idx` (`photographer_id`),
  CONSTRAINT `fk_event_photographer` FOREIGN KEY (`photographer_id`) REFERENCES `photographer` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;

INSERT INTO `event` (`id`, `event_date`, `category`, `name`, `photographer_id`)
VALUES
	(1,'2019-06-10','graduation','Graduation 12 B',1);

/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы format
# ------------------------------------------------------------

DROP TABLE IF EXISTS `format`;

CREATE TABLE `format` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `width` decimal(12,2) DEFAULT NULL,
  `height` decimal(12,0) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `format` WRITE;
/*!40000 ALTER TABLE `format` DISABLE KEYS */;

INSERT INTO `format` (`id`, `name`, `price`, `width`, `height`)
VALUES
	(1,'background',12.00,12.00,14);

/*!40000 ALTER TABLE `format` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы order
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order`;

CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(12,2) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `is_paid` tinyint(1) DEFAULT NULL,
  `ref` varchar(255) DEFAULT NULL,
  `vat` decimal(12,2) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_order_user_idx` (`user_id`),
  CONSTRAINT `fk_order_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;

INSERT INTO `order` (`id`, `amount`, `name`, `date`, `is_paid`, `ref`, `vat`, `user_id`)
VALUES
	(1,25.00,'123158967','2018-08-20 09:20:00',0,'1ed3e1d21e',7536.00,1);

/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы photo
# ------------------------------------------------------------

DROP TABLE IF EXISTS `photo`;

CREATE TABLE `photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image_orig` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_photo_event_idx` (`event_id`),
  CONSTRAINT `fk_photo_event` FOREIGN KEY (`event_id`) REFERENCES `event` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `photo` WRITE;
/*!40000 ALTER TABLE `photo` DISABLE KEYS */;

INSERT INTO `photo` (`id`, `name`, `image_orig`, `image`, `event_id`)
VALUES
	(1,'13124151','src/img(orig).png','src/img.png',1);

/*!40000 ALTER TABLE `photo` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы photo-order
# ------------------------------------------------------------

DROP TABLE IF EXISTS `photo-order`;

CREATE TABLE `photo-order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `format_id` int(11) NOT NULL,
  `photo_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_photo-order_photo_idx` (`photo_id`),
  KEY `fk_photo-order_order_idx` (`order_id`),
  KEY `fk_photo-order_format_idx` (`format_id`),
  CONSTRAINT `fk_photo-order_format` FOREIGN KEY (`format_id`) REFERENCES `format` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_photo-order_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_photo-order_photo` FOREIGN KEY (`photo_id`) REFERENCES `photo` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `photo-order` WRITE;
/*!40000 ALTER TABLE `photo-order` DISABLE KEYS */;

INSERT INTO `photo-order` (`id`, `format_id`, `photo_id`, `order_id`)
VALUES
	(1,1,1,1);

/*!40000 ALTER TABLE `photo-order` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы photographer
# ------------------------------------------------------------

DROP TABLE IF EXISTS `photographer`;

CREATE TABLE `photographer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `photographer` WRITE;
/*!40000 ALTER TABLE `photographer` DISABLE KEYS */;

INSERT INTO `photographer` (`id`, `name`, `email`, `password`)
VALUES
	(1,'John','john.wick@mail.com','password');

/*!40000 ALTER TABLE `photographer` ENABLE KEYS */;
UNLOCK TABLES;


# Дамп таблицы user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`id`, `name`, `email`, `password`)
VALUES
	(1,'michael','michael. myers@mail.com','password');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
