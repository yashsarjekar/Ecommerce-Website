-- phpMyAdmin SQL Dump
-- version 4.0.10.18
-- https://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 28, 2018 at 12:05 PM
-- Server version: 5.6.34-79.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thepov3n_data`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE IF NOT EXISTS `adminlogin` (
  `srno` int(10) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`srno`, `username`, `password`) VALUES
(1, 'yash sarjekar', 'yash');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int(10) NOT NULL AUTO_INCREMENT,
  `brand_title` text NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_title`) VALUES
(1, 'Nike'),
(2, 'Ralph Lawren'),
(3, 'Gap'),
(4, 'Levi'),
(5, 'Michael Kors'),
(6, 'Coach'),
(7, 'Dell'),
(8, 'Hp'),
(9, 'Lenovo'),
(10, 'iphones');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `srno` int(100) NOT NULL AUTO_INCREMENT,
  `cart_id` int(11) NOT NULL,
  `ip_add` varchar(100) NOT NULL,
  `qty` int(100) NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=269 ;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`srno`, `cart_id`, `ip_add`, `qty`) VALUES
(268, 26, '49.32.180.214', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_idc` int(10) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_idc`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_idc`, `cat_title`) VALUES
(1, 'Men Shirts'),
(2, 'Men Jeans'),
(8, 'Female Shirt'),
(4, 'Female Jeans'),
(5, 'Laptops'),
(6, 'Computers'),
(7, 'Mobile Phones'),
(9, 'I phone');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` text NOT NULL,
  `Email` text NOT NULL,
  `password` text NOT NULL,
  `country` text NOT NULL,
  `city` text NOT NULL,
  `contact` text NOT NULL,
  `address` varchar(100) NOT NULL,
  `customer_img` text NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `Email`, `password`, `country`, `city`, `contact`, `address`, `customer_img`) VALUES
(7, 'Rajendra Sarjekar', 'sarjekar66@gmail.com', 'raju', 'India', 'mumbai', '9323153196', 'room no 16, gomukh bhavan, ashok nagar, govandi(E) ,400088.', 'asus.png'),
(6, 'Yash', 'yashsarjekar007@gmail.com', 'yash', 'India', 'mumbai', '7977437824', 'room no 16, gomukh bhavan, ashok nagar, govandi(E) ,400088.', 'aa.png');

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE IF NOT EXISTS `customer_orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `due_amount` text NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `total_products` int(10) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(49, 7, '5150', 189649310, 3, '2018-01-20 11:23:35', 'Pending'),
(48, 6, '6100', 1995398231, 2, '2018-01-20 11:18:34', 'Pending'),
(47, 6, '5700', 2110742772, 2, '2018-01-20 11:16:44', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `customer_pending`
--

CREATE TABLE IF NOT EXISTS `customer_pending` (
  `srno` int(100) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `customer_pending`
--

INSERT INTO `customer_pending` (`srno`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(72, 7, 189649310, 29, 1, 'Pending'),
(71, 7, 189649310, 27, 3, 'Pending'),
(70, 7, 189649310, 24, 1, 'Pending'),
(69, 6, 1995398231, 20, 4, 'Pending'),
(68, 6, 1995398231, 26, 3, 'Pending'),
(67, 6, 2110742772, 27, 1, 'Pending'),
(66, 6, 2110742772, 26, 2, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_no` int(10) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `paypal`
--

CREATE TABLE IF NOT EXISTS `paypal` (
  `payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `transection_no` text NOT NULL,
  `amount` int(100) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(100) NOT NULL,
  `status` text NOT NULL,
  `currency` text NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `paypal`
--

INSERT INTO `paypal` (`payment_id`, `transection_no`, `amount`, `customer_id`, `product_id`, `qty`, `status`, `currency`) VALUES
(2, '5U214977WW8944428', 4000, 7, 26, 2, 'Completed', 'USD'),
(3, '9M8429024L511492C', 9750, 7, 27, 1, 'Completed', 'USD'),
(4, '9M8429024L511492C', 9750, 7, 18, 1, 'Completed', 'USD'),
(5, '9M8429024L511492C', 9750, 7, 21, 1, 'Completed', 'USD'),
(6, '9M8429024L511492C', 9750, 7, 26, 4, 'Completed', 'USD');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_idc` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `img1` text NOT NULL,
  `img2` text NOT NULL,
  `product_price` text NOT NULL,
  `description` text NOT NULL,
  `status` text NOT NULL,
  `keyword` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_idc`, `brand_id`, `date`, `product_title`, `img1`, `img2`, `product_price`, `description`, `status`, `keyword`) VALUES
(24, 1, 4, '2017-12-28 16:45:51', 'Orange t shirt', 't5.png', 't5.png', '25', 'Orange t Shirt', 'on', 'Orange t shirt,Men t shirts, Men wears'),
(29, 1, 4, '2018-01-05 15:54:49', 'Black t shirt', 't2.png', 't2.png', '25', 'Black t Shirt', 'on', 'black t shirts, Men tshirts,Men wears'),
(18, 1, 2, '2017-12-28 16:05:58', 'Black hudi', 'tt.png', 'tt.png', '25', 'Black hudi', 'on', 'hudi,back hudi, Men hudi,'),
(12, 1, 5, '2017-12-28 10:39:23', 'Black t Shirt', 't1.png', 't1.png', '12', 'Black  full t shirt', 'on', 'black t shirts, Men tshirts,Men wears'),
(25, 1, 2, '2017-12-28 16:48:37', 'Grey t Shirt', 't4.png', 't4.png', '25', 'Grey t Shirt', 'on', 'Grey t shirts, Men tshirts,Men wears'),
(23, 1, 3, '2017-12-28 16:43:27', 'Blue and white t Shirt', 't9.jpg', 't9.jpg', '25', 'Blue and White t Shirt', 'on', 'black t shirts, Men tshirts,Men wears'),
(22, 1, 1, '2017-12-28 16:40:28', 'Black white t shirt', 't6.jpg', 't6.jpg', '25', 'Black and white t Shirt', 'on', 'black t shirts, Men tshirts,Men wears'),
(21, 1, 2, '2017-12-28 16:38:32', 'Grey t Shirt', 't3.jpg', 't3.jpg', '25', 'Grey t shirt', 'on', 'Grey t shirts, Men tshirts,Men wears'),
(20, 1, 1, '2017-12-28 16:33:41', 'Black t shirt', 't7.png', 't7.png', '25', 'Black t Shirt', 'on', 'black t shirts, Men tshirts,Men wears'),
(26, 5, 7, '2017-12-28 16:54:28', 'Dell laptop', 'dell.jpg', 'dell.jpg', '2000', 'Dell laptops', 'on', 'Dell laptops'),
(27, 5, 8, '2017-12-28 16:56:12', 'Hp laptop', 'hp.png', 'hp.png', '1700', 'Hp laptops', 'on', 'Hp laptop'),
(28, 5, 9, '2017-12-28 16:58:11', 'lenovo laptop', 'lenovo.png', 'lenovo.png', '1500', 'Lenovo Laptop', 'on', 'Lenovo laptop');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
