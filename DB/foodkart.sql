-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-08-2017 a las 22:48:15
-- Versión del servidor: 5.6.12-log
-- Versión de PHP: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `foodkart`
--
CREATE DATABASE IF NOT EXISTS `foodkart` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `foodkart`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'General'),
(2, 'Hamburguesas'),
(3, 'Aperitivos'),
(4, 'Ensaladas'),
(5, 'Bebidas'),
(6, 'Postres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuration`
--

CREATE TABLE IF NOT EXISTS `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(200) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `configuration`
--

INSERT INTO `configuration` (`id`, `key`, `text`) VALUES
(1, 'Titulo', 'SoftCompras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `p_id` varchar(5) NOT NULL,
  `p_name` varchar(30) NOT NULL,
  `p_description` varchar(300) NOT NULL,
  `p_category` varchar(30) NOT NULL,
  `p_image_id` varchar(500) NOT NULL,
  `p_price` int(11) NOT NULL,
  `p_available` tinyint(1) NOT NULL,
  `p_stock` int(11) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  PRIMARY KEY (`p_id`),
  KEY `items_ibfk_1` (`p_category`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`p_id`, `p_name`, `p_description`, `p_category`, `p_image_id`, `p_price`, `p_available`, `p_stock`, `p_image`) VALUES
('1', 'New Chicken Maharaja', 'Product Description', '1', 'chicken_maharaja', 183, 1, 100, 'm1.png'),
('2', 'Big Spicy Chicken Wrap', 'Product Description', '1', 'big_spicy_chicken_wrap', 172, 1, 100, 'm1.png'),
('3', 'Big Spicy Paneer Wrap', 'Product Description', '1', 'big_spicy_paneer_wrap', 167, 1, 100, 'm1.png'),
('4', 'Veg Maharaja Mac', 'Product Description', '1', 'veg_maharaja', 177, 1, 100, 'm1.png'),
('5', 'McSpicy Chicken', 'Product Description', '1', 'Mcspicy_chicken', 123, 1, 100, 'm1.png'),
('6', 'McSpicy Paneer', 'Product Description', '1', 'McSpicy_paneer', 147, 1, 100, 'm1.png'),
('7', 'Filet-O-Fish', 'Product Description', '1', 'filet_o_fish', 167, 1, 100, 'm1.png'),
('8', 'Salad wrap', 'Product Description', '1', 'salad_wrap', 127, 1, 100, 'm1.png'),
('9', 'Postre', 'Product Description', '6', 'mc_chicken', 235, 1, 100, 'm1.png'),
('10', 'McVeggie', 'Product Description', '1', 'mc_veggie', 127, 1, 100, 'm1.png'),
('11', 'Chicken McGrill', 'Product Description', '1', 'chick_mc_grill', 267, 1, 100, 'm1.png'),
('12', 'McEgg Burger', 'Product Description', '1', 'mc_egg_burger', 147, 1, 100, 'm1.png'),
('13', 'McAloo Tikki', 'Product Description', '1', 'mc_aloo_tikki', 165, 1, 100, 'm1.png'),
('14', 'Smoothie', 'Product Description', '2', 'Smoothie', 127, 1, 100, 'm1.png'),
('15', 'Double Chocolate Frappe', 'Product Description', '2', 'double_chocolate_frappe', 267, 1, 100, 'm1.png'),
('16', 'McCafe Frappe', 'Product Description', '2', 'mc_cafe_Frappe', 234, 1, 100, 'm1.png'),
('17', 'Hazelnut Coffee', 'Product Description', '2', 'McCafe_Hazelnut_Cold', 167, 1, 100, 'm1.png'),
('18', 'McCafe Classic Coffee', 'Product Description', '2', 'McCafe_Classic_coffee', 127, 2, 100, 'm1.png'),
('19', 'McCafe Ice Coffee', 'Product Description', '2', 'mccafe_ice_coffee', 117, 1, 100, 'm1.png'),
('20', 'McCafe Ice Tea', 'Product Description', '2', 'mccafe_ice_tea', 134, 1, 100, 'm1.png'),
('21', 'Iced splash', 'Product Description', '2', 'iced_splash', 290, 1, 100, 'm1.png'),
('22', 'Coke', 'Product Description', '2', 'coke', 147, 1, 100, 'm1.png'),
('23', 'Fanta', 'Product Description', '2', 'fanta', 27, 1, 100, 'm1.png'),
('24', 'Sprite', 'Product Description', '2', 'sprite', 37, 1, 100, 'm1.png'),
('25', 'Thums Up', 'Product Description', '2', 'thumsup', 30, 1, 100, 'm1.png'),
('26', 'Coke Zero', 'Product Description', '2', 'coke_zero', 30, 1, 100, 'm1.png'),
('27', 'Kinley', 'Product Description', '2', 'kinley', 30, 1, 100, 'm1.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblreseteopass`
--

CREATE TABLE IF NOT EXISTS `tblreseteopass` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `u_id` int(10) unsigned NOT NULL,
  `username` varchar(15) NOT NULL,
  `token` varchar(64) NOT NULL,
  `creado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `idusuario` (`u_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `tblreseteopass`
--

INSERT INTO `tblreseteopass` (`id`, `u_id`, `username`, `token`, `creado`) VALUES
(8, 1, 'Andres', '43eb55c29c98a68a0276ad5c5f00fdd92e89f542', '2017-08-22 19:43:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(300) NOT NULL,
  `u_password` varchar(300) NOT NULL,
  `u_phone` varchar(300) NOT NULL,
  `u_address` varchar(300) NOT NULL,
  `u_email` varchar(300) NOT NULL,
  `u_level` varchar(255) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`u_id`, `u_name`, `u_password`, `u_phone`, `u_address`, `u_email`, `u_level`) VALUES
(1, 'Andres', 'a7bd297a7fc5935adf555841e5bba8b2', '24458360', 'San Ramon', 'laqs84@softteca.com', '1'),
(2, 'Cliente', '0cc175b9c0f1b6a831c399e269772661', '24453333', 'San Ramon', 'laqs84@hotmail.com', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
