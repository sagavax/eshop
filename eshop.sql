-- Adminer 4.2.0 MySQL dump

SET NAMES utf8mb4;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `eshop`;
CREATE DATABASE `eshop` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `eshop`;

DROP TABLE IF EXISTS `basket`;
CREATE TABLE `basket` (
  `session_id` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `product_id` int(5) NOT NULL,
  `price_until` int(5) NOT NULL,
  `pieces` int(5) NOT NULL,
  `total_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;


DROP TABLE IF EXISTS `invoice_header`;
CREATE TABLE `invoice_header` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `custom_order_id` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `nr_of_orders` int(5) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;


DROP TABLE IF EXISTS `invoice_items`;
CREATE TABLE `invoice_items` (
  `item_id` int(5) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(100) NOT NULL,
  `product_id` int(5) NOT NULL,
  `price_per_product` int(5) NOT NULL,
  `total_price` int(5) NOT NULL,
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `oder_items`;
CREATE TABLE `oder_items` (
  `item_id` int(5) NOT NULL AUTO_INCREMENT,
  `session_id` varchar(100) NOT NULL,
  `product_id` int(5) NOT NULL,
  `price_per_product` int(5) NOT NULL,
  `total_price` int(5) NOT NULL,
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `orders_header`;
CREATE TABLE `orders_header` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `custom_order_id` varchar(50) COLLATE utf8_slovak_ci NOT NULL,
  `nr_of_orders` int(5) NOT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_description` text NOT NULL,
  `product_picture` int(11) NOT NULL,
  `cat_id` int(5) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_unit_price` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`product_id`),
  KEY `cat_id` (`cat_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `product_categories` (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `cat_id` int(5) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(100) COLLATE utf8_slovak_ci NOT NULL,
  `cat_description` text COLLATE utf8_slovak_ci,
  `added_by` int(11) NOT NULL,
  `added_date` datetime NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_slovak_ci;


DROP TABLE IF EXISTS `product_pictures`;
CREATE TABLE `product_pictures` (
  `pic_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `path` varchar(100) NOT NULL,
  `added_by` int(3) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`pic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2015-03-09 15:12:29
