-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 12, 2022 at 08:53 PM
-- Server version: 5.7.37
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pragatis_ecom_mlm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE `tbl_contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `contact` varchar(25) DEFAULT NULL,
  `message` text,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_us`
--

INSERT INTO `tbl_contact_us` (`id`, `name`, `email`, `contact`, `message`, `created_on`) VALUES
(2, 'htn hg', 'ravindra@gmail.com', '213456', 'ad', '2022-02-10 11:53:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ecom_brand`
--

CREATE TABLE `tbl_ecom_brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1' COMMENT '	1->Active, 2->Inactive',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ecom_brand`
--

INSERT INTO `tbl_ecom_brand` (`id`, `name`, `image`, `slug`, `is_active`, `updated_at`, `created_at`) VALUES
(3, 'Mi', '19ca3354d10e80480104170295ae923d.jpg', 'mi', 1, '2022-02-04 10:49:35', NULL),
(4, 'Lenvo', 'cb45e63ddf092ccd8d0b3baf135b58a5.jpg', 'lenvo', 1, '2022-02-04 10:49:17', NULL),
(5, 'Nokia', '4abb2c77f50b6c8d42b8a2c134f1a769.jpg', 'nokia', 1, '2022-02-04 10:49:04', NULL),
(6, 'Sumsang', '1ab2478f3b57b18e0aac125c0ea912b6.jpg', 'sumsang', 1, '2022-02-04 10:48:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ecom_category`
--

CREATE TABLE `tbl_ecom_category` (
  `id` int(11) NOT NULL,
  `parent_cat` varchar(200) NOT NULL DEFAULT '0',
  `cat_name` varchar(150) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `icon` text,
  `description` varchar(255) DEFAULT NULL,
  `is_menu` int(11) NOT NULL DEFAULT '2' COMMENT '1->Yes, 2->No',
  `is_active` int(11) NOT NULL DEFAULT '1' COMMENT '1->Active, 2->Inactive',
  `slug` varchar(200) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ecom_category`
--

INSERT INTO `tbl_ecom_category` (`id`, `parent_cat`, `cat_name`, `image`, `icon`, `description`, `is_menu`, `is_active`, `slug`, `updated_at`, `created_at`) VALUES
(5, '0', 'Cloth', '1cf4cd1fd067732995831461938dd988.jpg', '<i class=\"w-icon-heartbeat\"></i>', 'Cloth', 1, 1, 'cloth', '2022-02-10 09:50:09', '2022-02-04 10:40:16'),
(6, 'cloth', 'T-Shirt', 'be63d2f9a069420c9811f1b68b3aac3a.jpg', NULL, 'T-Shirt', 2, 1, 'T-Shirt', NULL, '2022-02-04 10:40:34'),
(7, '0', 'Shirt', '39544a99b087264bb9f6e8b5dde5c8ce.jpg', '', 'Shirt', 2, 2, 'shirt', '2022-02-04 11:13:59', '2022-02-04 10:41:00'),
(9, '0', 'Beauty', '674aafa73a59d41e9667093ec5022099.jpg', '<i class=', 'Beauty', 1, 1, 'beauty', '2022-02-09 12:07:39', '2022-02-04 11:40:53'),
(10, '0', 'Health', '7ed62b38e9066c4a167554d541c230a0.jpg', '<i class=', 'Beauty Health', 1, 1, 'health', '2022-02-09 12:06:44', '2022-02-04 11:41:21'),
(11, '0', 'Fashoin', 'db81b366cf64b2983836a0a62d55e0f7.jpg', '<i class=', 'Fashoin', 1, 1, 'fashoin', '2022-02-09 09:39:00', '2022-02-04 11:42:28'),
(12, 'fashoin', 'Men', 'd99bba56a7758f5bd1008e398d84e819.jpg', '<i class=\"w-icon-tshirt2\"></i>', 'Men', 2, 1, 'men', NULL, '2022-02-04 11:42:46'),
(13, 'fashoin', 'Women', 'c1052201f3d9ed2d33e697b93bbce6a8.jpg', '<i class=\"w-icon-tshirt2\"></i>', 'Women', 2, 1, 'women', NULL, '2022-02-04 11:43:05'),
(14, '0', 'Jacket', 'bf7788243b942a0b665c8dec6b193480.jpg', '<i class=', 'Jacket', 1, 1, 'jacket', '2022-02-09 10:06:12', '2022-02-04 12:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ecom_color`
--

CREATE TABLE `tbl_ecom_color` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1' COMMENT '1=>Active, 2=>Inactive',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ecom_color`
--

INSERT INTO `tbl_ecom_color` (`id`, `name`, `is_active`, `updated_at`, `created_at`) VALUES
(1, 'red', 1, NULL, '2022-02-04 12:01:49'),
(2, 'black', 1, '2022-02-04 11:02:23', '2022-02-04 12:01:56'),
(3, 'blue', 1, NULL, '2022-02-04 12:02:52'),
(4, 'brown', 1, NULL, '2022-02-04 12:02:57'),
(5, 'yellow', 1, NULL, '2022-02-04 12:03:06'),
(6, 'orange', 1, '2022-02-04 11:03:31', '2022-02-04 12:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ecom_mainslider`
--

CREATE TABLE `tbl_ecom_mainslider` (
  `id` int(11) NOT NULL,
  `image` text,
  `status` enum('1','2') NOT NULL COMMENT '1->active,2->inactive',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ecom_mainslider`
--

INSERT INTO `tbl_ecom_mainslider` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, '6f2066fea4fd2757e4e117db97d82ff3.jpg', '1', '2022-02-05 17:47:41', '2022-02-05 17:47:41'),
(4, '3458d16d584d0a1d2d1269032b2cc3ee.jpg', '1', '2022-02-09 12:27:32', '2022-02-09 12:27:32'),
(5, '00dfe0a5be7b360980cdb017e0e81806.jpg', '1', '2022-02-09 12:27:40', '2022-02-09 12:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ecom_orders`
--

CREATE TABLE `tbl_ecom_orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `order_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` int(11) DEFAULT NULL,
  `shipping_charge` int(11) NOT NULL DEFAULT '0',
  `grand_total` varchar(255) NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `status` enum('1','2','3','4','5','6') NOT NULL COMMENT '1->Placed,2->Packed,3->On the way,4->Delivered,5->Cancelled, 6->Processing',
  `payment_status` int(11) NOT NULL COMMENT '1=>Payment Comelete, 2=>Payment Incomplete',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ecom_orders`
--

INSERT INTO `tbl_ecom_orders` (`id`, `customer_id`, `seller_id`, `order_id`, `username`, `email`, `contact`, `address`, `shipping_charge`, `grand_total`, `payment_type`, `status`, `payment_status`, `updated_at`, `created_at`) VALUES
(1, 2, 0, '1869753', 'deepakmauryacs', 'deepakmauryacs16@gmail.com', '8081008926', 1, 50, '3050', 'COD', '6', 2, NULL, '2022-02-10 13:51:41'),
(2, 2, 0, '7886648', 'deepakmauryacs', 'deepakmauryacs16@gmail.com', '8081008926', 1, 50, '2050', 'COD', '6', 2, NULL, '2022-02-10 13:51:41'),
(3, 2, 0, '9761604', 'deepakmauryacs', 'deepakmauryacs16@gmail.com', '8081008926', 1, 50, '3050', 'COD', '6', 2, NULL, '2022-02-10 13:51:41'),
(4, 2, 0, '1388500', 'deepakmauryacs', 'deepakmauryacs16@gmail.com', '8081008926', 2, 50, '1050', 'COD', '2', 2, '2022-02-10 10:22:43', '2022-02-10 13:51:41'),
(5, 3, 0, '1447454', 'ravindra', 'ravindra123@gmail.com', '12345', 8, 50, '2050', 'COD', '3', 2, '2022-02-10 12:15:32', '2022-02-10 13:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ecom_order_product`
--

CREATE TABLE `tbl_ecom_order_product` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `order_id` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `sell_price` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_total` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ecom_order_product`
--

INSERT INTO `tbl_ecom_order_product` (`id`, `product_id`, `customer_id`, `seller_id`, `order_id`, `image`, `product_name`, `sell_price`, `quantity`, `sub_total`, `created_at`) VALUES
(1, 1, 2, 0, '1869753', '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', '1000', 2, '2000', '2022-02-08 13:18:19'),
(2, 2, 2, 0, '1869753', '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', '1000', 1, '1000', '2022-02-08 13:18:19'),
(3, 7, 2, 0, '7886648', '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', '1000', 1, '1000', '2022-02-08 13:20:58'),
(4, 8, 2, 0, '7886648', '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', '1000', 1, '1000', '2022-02-08 13:20:58'),
(5, 13, 2, 0, '9761604', '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', '1000', 1, '1000', '2022-02-08 13:22:23'),
(6, 14, 2, 0, '9761604', '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', '1000', 1, '1000', '2022-02-08 13:22:23'),
(7, 15, 2, 0, '9761604', '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', '1000', 1, '1000', '2022-02-08 13:22:23'),
(8, 2, 2, 0, '1388500', '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', '1000', 1, '1000', '2022-02-08 13:48:21'),
(9, 5, 3, 0, '1447454', '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', '1000', 1, '1000', '2022-02-10 12:57:11'),
(10, 6, 3, 0, '1447454', '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', '1000', 1, '1000', '2022-02-10 12:57:11');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ecom_product`
--

CREATE TABLE `tbl_ecom_product` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `image` text,
  `name` text,
  `category` varchar(255) DEFAULT NULL,
  `sub_category` varchar(255) DEFAULT NULL,
  `description` longtext,
  `specifications` longtext,
  `brand` varchar(255) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `color` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `sell_price` int(11) DEFAULT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `discount_type` varchar(255) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `tax` text,
  `sku_number` text,
  `is_active` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1->active,2->inactive',
  `product_type` int(11) DEFAULT NULL,
  `meta_tag_title` text,
  `meta_tag_description` text,
  `meta_tag_keywords` text,
  `tag` text,
  `slug` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ecom_product`
--

INSERT INTO `tbl_ecom_product` (`id`, `seller_id`, `image`, `name`, `category`, `sub_category`, `description`, `specifications`, `brand`, `size`, `unit`, `color`, `quantity`, `price`, `sell_price`, `discount`, `discount_type`, `discount_price`, `tax`, `sku_number`, `is_active`, `product_type`, `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords`, `tag`, `slug`, `created_at`, `updated_at`) VALUES
(1, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(2, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(3, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(4, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(5, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(6, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(7, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(8, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(9, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(10, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(11, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(12, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(13, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(14, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(15, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(16, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(17, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(18, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(19, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(20, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(21, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(22, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(23, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(24, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(25, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(26, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(27, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(28, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(29, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(30, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(31, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(32, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(33, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(34, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(35, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(36, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(37, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(38, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(39, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(40, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(41, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(42, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(43, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(44, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(45, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(46, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(47, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(48, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(49, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(50, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(51, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(52, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(53, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(54, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(55, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(56, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(57, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(58, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(59, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(60, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(61, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(62, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(63, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(64, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(65, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(66, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(67, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(68, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(69, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(70, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(71, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(72, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(73, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(74, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(75, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(76, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(77, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(78, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(79, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(80, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(81, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(82, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(83, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(84, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(85, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(86, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(87, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(88, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(89, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(90, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(91, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(92, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(93, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15');
INSERT INTO `tbl_ecom_product` (`id`, `seller_id`, `image`, `name`, `category`, `sub_category`, `description`, `specifications`, `brand`, `size`, `unit`, `color`, `quantity`, `price`, `sell_price`, `discount`, `discount_type`, `discount_price`, `tax`, `sku_number`, `is_active`, `product_type`, `meta_tag_title`, `meta_tag_description`, `meta_tag_keywords`, `tag`, `slug`, `created_at`, `updated_at`) VALUES
(94, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(95, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(96, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(97, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(98, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(99, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(100, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(101, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(102, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(103, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(104, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(105, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(106, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(107, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(108, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(109, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(110, NULL, '4d599af9221caab87badaf70e3192956.jpg', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'Cloth', '', '', '', 'sumsang', '4', 5, 1, 10, 1000, 1000, '0', '', 0, '1', NULL, '1', 1, 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'CHKOKKO Men\'s Cotton Regular Fit Full Sleeves T-Shirt', 'chkokko-mens-cotton-regular-fit-full-sleeves-t-shirt', '2022-02-04 12:16:15', '2022-02-04 12:16:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ecom_producttype`
--

CREATE TABLE `tbl_ecom_producttype` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `is_active` enum('1','2') DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ecom_producttype`
--

INSERT INTO `tbl_ecom_producttype` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'New Arrivals', '1', '2022-02-04 16:08:56', '2022-02-04 16:08:56'),
(2, 'Best Seller', '1', '2022-02-04 16:09:09', '2022-02-04 16:09:09'),
(3, 'Most Popular', '1', '2022-02-04 16:09:43', '2022-02-04 16:09:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ecom_product_image`
--

CREATE TABLE `tbl_ecom_product_image` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL COMMENT 'tbl_ecom_product.id',
  `product_image` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ecom_product_image`
--

INSERT INTO `tbl_ecom_product_image` (`id`, `product_id`, `product_image`, `created_at`, `updated_at`) VALUES
(1, 1, 'c2f56c944d55310c296bbc6b8291dd8c.jpg', '2022-02-03 08:21:29', '2022-02-03 08:21:29'),
(2, 1, 'ceb324766e373517cbb20e1bef5341d9.jpg', '2022-02-03 08:21:29', '2022-02-03 08:21:29'),
(3, 1, 'd185d131e57152f6d13f39fd9af660a3.jpg', '2022-02-03 08:21:29', '2022-02-03 08:21:29'),
(4, 2, '770bc513e3ba263bcffcffdcb200f6ae.jpg', '2022-02-03 09:48:23', '2022-02-03 09:48:23'),
(5, 3, 'a8ec6266631ad3908862f9b02358d446.jpg', '2022-02-04 11:12:29', '2022-02-04 11:12:29'),
(6, 3, '45dc460ebca2af5bbe3d0c770ebb5f02.jpg', '2022-02-04 11:12:29', '2022-02-04 11:12:29'),
(7, 3, 'c9a36ec8e34239ed6cf1353a147bdac4.jpg', '2022-02-04 11:12:29', '2022-02-04 11:12:29'),
(8, 4, 'e3c413b0e37a5f8b39120f5853fe58f6.jpg', '2022-02-04 12:10:49', '2022-02-04 12:10:49'),
(9, 4, '6cda9771a16f02e772019f63f8c10262.jpg', '2022-02-04 12:10:49', '2022-02-04 12:10:49'),
(10, 5, '86d1dc6220ca8ed58dde3e87ad275118.jpg', '2022-02-04 12:11:44', '2022-02-04 12:11:44'),
(11, 5, 'f631b9d93eee76cb3a557bfe19761477.jpg', '2022-02-04 12:11:44', '2022-02-04 12:11:44'),
(12, 6, '100689181a85c3333cb11ef9d2377a6e.jpg', '2022-02-04 12:12:42', '2022-02-04 12:12:42'),
(13, 6, '524ba5bb0cf28d181404b196b6b640c7.jpg', '2022-02-04 12:12:42', '2022-02-04 12:12:42'),
(14, 7, '3708c07b6825c28060280f9230ac4a62.jpg', '2022-02-04 12:15:06', '2022-02-04 12:15:06'),
(15, 7, 'd87681bf3fdeca7844ab351636197f45.jpg', '2022-02-04 12:15:06', '2022-02-04 12:15:06'),
(16, 8, '056356cfb1f35d0a3cd130fc6a06e345.jpg', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(17, 8, 'd69dedfb144dadcf50563e9fb0024d96.jpg', '2022-02-04 12:16:15', '2022-02-04 12:16:15'),
(18, 9, '4b50768878a6d6c10f96abbdacb86917.jpg', '2022-02-05 11:41:11', '2022-02-05 11:41:11'),
(19, 10, '120f55bf20e5e2d01a9020f648d51ea6.jpg', '2022-02-05 11:42:33', '2022-02-05 11:42:33'),
(20, 11, '2a25ade11b2f41d6a5156b34297ff98e.jpg', '2022-02-05 11:44:56', '2022-02-05 11:44:56'),
(21, 12, '79f84ac7d5ca6d402851f6daf5c5a87c.jpg', '2022-02-05 11:46:51', '2022-02-05 11:46:51'),
(22, 13, '5bbe4b9a767ef4c25134998d700d0082.jpg', '2022-02-05 11:50:05', '2022-02-05 11:50:05'),
(23, 14, 'aca9410d05cc99b615b3ddca78086b07.jpg', '2022-02-05 11:51:05', '2022-02-05 11:51:05'),
(24, 15, '86718b588a0bed48c9f671813eaf735c.jpg', '2022-02-05 11:51:52', '2022-02-05 11:51:52'),
(25, 16, 'bff84e3240d0de8be18af3f932107df4.jpg', '2022-02-05 11:52:03', '2022-02-05 11:52:03'),
(26, 17, 'df73507ddf6cfa66e9783db9b2bfb1e1.jpg', '2022-02-05 11:52:34', '2022-02-05 11:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ecom_recentview`
--

CREATE TABLE `tbl_ecom_recentview` (
  `id` int(11) NOT NULL,
  `user_ip` text,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ecom_size`
--

CREATE TABLE `tbl_ecom_size` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1' COMMENT '1->Active, 2->Inactive',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ecom_size`
--

INSERT INTO `tbl_ecom_size` (`id`, `name`, `is_active`, `updated_at`, `created_at`) VALUES
(2, 'XXL', 1, '2022-02-04 09:58:18', '2022-02-03 13:08:40'),
(3, 'Small', 1, NULL, '2022-02-04 11:47:16'),
(4, 'Medium', 1, NULL, '2022-02-04 11:47:22'),
(5, 'Large', 1, NULL, '2022-02-04 11:47:27'),
(6, 'Extra Large', 1, NULL, '2022-02-04 11:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ecom_store_setup`
--

CREATE TABLE `tbl_ecom_store_setup` (
  `id` int(11) NOT NULL,
  `header_logo` varchar(200) DEFAULT NULL,
  `footer_logo` varchar(200) DEFAULT NULL,
  `favicon_icon` varchar(200) DEFAULT NULL,
  `shop_name` varchar(200) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` json DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `google_map` text,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `linked_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ecom_unit`
--

CREATE TABLE `tbl_ecom_unit` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT '1' COMMENT '1->Active, 2->Inactive',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ecom_unit`
--

INSERT INTO `tbl_ecom_unit` (`id`, `name`, `is_active`, `updated_at`, `created_at`) VALUES
(1, 'kg', 1, NULL, '2022-02-03 13:16:45'),
(2, 'mg', 1, NULL, '2022-02-03 13:16:49'),
(3, 'mt', 1, '2022-02-03 07:47:04', '2022-02-03 13:16:56'),
(5, 'Pics', 1, NULL, '2022-02-04 12:14:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ecom_useraddress`
--

CREATE TABLE `tbl_ecom_useraddress` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `shipping_address` text,
  `complete_address` text,
  `floor` text,
  `landmark` text,
  `country` varchar(50) NOT NULL DEFAULT 'India',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ecom_useraddress`
--

INSERT INTO `tbl_ecom_useraddress` (`id`, `user_id`, `shipping_address`, `complete_address`, `floor`, `landmark`, `country`, `created_at`, `updated_at`) VALUES
(304, 1, NULL, 'lekhraj lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL),
(305, 1, NULL, 'lekhraj lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL),
(306, 1, NULL, 'lekhraj lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL),
(307, 1, NULL, 'lekhraj lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL),
(308, 1, NULL, 'polytecnic lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL),
(309, 1, NULL, '1/723 Vishal khand-1 Gomti Nagar Lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL),
(310, 1, NULL, 'lekhraj lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL),
(311, 1, NULL, 'lekhraj lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL),
(312, 1, NULL, 'lekhraj  metro station lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL),
(313, 1, NULL, 'lekhraj lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL),
(314, 1, NULL, 'lekhraj metro station lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL),
(315, 1, NULL, 'charbagh lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL),
(316, 1, NULL, 'charbagh lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL),
(317, 1, NULL, 'polytecnic lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL),
(318, 1, NULL, 'polytecnic lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL),
(319, 1, NULL, 'polytecnic lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL),
(320, 1, NULL, 'polytecnic lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL),
(321, 1, NULL, 'lekhraj metro station lucknow', '', '', 'India', '2022-02-03 11:20:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ecom_websetting`
--

CREATE TABLE `tbl_ecom_websetting` (
  `id` int(11) NOT NULL,
  `privacy_policy` longtext,
  `term_and_conditions` longtext,
  `returns_policy` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ecom_websetting`
--

INSERT INTO `tbl_ecom_websetting` (`id`, `privacy_policy`, `term_and_conditions`, `returns_policy`) VALUES
(1, '<h1>Privacy Policy&nbsp;</h1>\r\n\r\n<p>At myserviceera.com, accessible from myserviceera.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by myserviceera.com and how we use it.</p>\r\n\r\n<p>If you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us.</p>\r\n\r\n<p>This Privacy Policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in myserviceera.com. This policy is not applicable to any information collected offline or via channels other than this website. Our Privacy Policy was created with the help of the&nbsp;<a href=\"https://www.privacypolicygenerator.info/\">Free Privacy Policy Generator</a>.</p>\r\n\r\n<h2>Consent</h2>\r\n\r\n<p>By using our website, you hereby consent to our Privacy Policy and agree to its terms.</p>\r\n\r\n<h2>Information we collect</h2>\r\n\r\n<p>The personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.</p>\r\n\r\n<p>If you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.</p>\r\n\r\n<p>When you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.</p>\r\n\r\n<h2>How we use your information</h2>\r\n\r\n<p>We use the information we collect in various ways, including to:</p>\r\n\r\n<ul>\r\n	<li>Provide, operate, and maintain our website</li>\r\n	<li>Improve, personalize, and expand our website</li>\r\n	<li>Understand and analyze how you use our website</li>\r\n	<li>Develop new products, services, features, and functionality</li>\r\n	<li>Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes</li>\r\n	<li>Send you emails</li>\r\n	<li>Find and prevent fraud</li>\r\n</ul>\r\n\r\n<h2>Log Files</h2>\r\n\r\n<p>myserviceera.com follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services&#39; analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users&#39; movement on the website, and gathering demographic information.</p>\r\n\r\n<h2>Google DoubleClick DART Cookie</h2>\r\n\r\n<p>Google is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL &ndash;&nbsp;<a href=\"https://policies.google.com/technologies/ads\">https://policies.google.com/technologies/ads</a></p>\r\n\r\n<h2>Advertising Partners Privacy Policies</h2>\r\n\r\n<p>You may consult this list to find the Privacy Policy for each of the advertising partners of myserviceera.com.</p>\r\n\r\n<p>Third-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on myserviceera.com, which are sent directly to users&#39; browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.</p>\r\n\r\n<p>Note that myserviceera.com has no access to or control over these cookies that are used by third-party advertisers.</p>\r\n\r\n<h2>Third Party Privacy Policies</h2>\r\n\r\n<p>myserviceera.com&#39;s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options.</p>\r\n\r\n<p>You can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers&#39; respective websites.</p>\r\n\r\n<h2>CCPA Privacy Rights (Do Not Sell My Personal Information)</h2>\r\n\r\n<p>Under the CCPA, among other rights, California consumers have the right to:</p>\r\n\r\n<p>Request that a business that collects a consumer&#39;s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.</p>\r\n\r\n<p>Request that a business delete any personal data about the consumer that a business has collected.</p>\r\n\r\n<p>Request that a business that sells a consumer&#39;s personal data, not sell the consumer&#39;s personal data.</p>\r\n\r\n<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>\r\n\r\n<h2>GDPR Data Protection Rights</h2>\r\n\r\n<p>We would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:</p>\r\n\r\n<p>The right to access &ndash; You have the right to request copies of your personal data. We may charge you a small fee for this service.</p>\r\n\r\n<p>The right to rectification &ndash; You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.</p>\r\n\r\n<p>The right to erasure &ndash; You have the right to request that we erase your personal data, under certain conditions.</p>\r\n\r\n<p>The right to restrict processing &ndash; You have the right to request that we restrict the processing of your personal data, under certain conditions.</p>\r\n\r\n<p>The right to object to processing &ndash; You have the right to object to our processing of your personal data, under certain conditions.</p>\r\n\r\n<p>The right to data portability &ndash; You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.</p>\r\n\r\n<p>If you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.</p>\r\n\r\n<h2>Children&#39;s Information</h2>\r\n\r\n<p>Another part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.</p>\r\n\r\n<p>myserviceera.com does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.</p>\r\n', '<h2><strong>Term and Conditions</strong></h2>\r\n\r\n<p>These terms and conditions outline the rules and regulations for the use of myserviceera&#39;s Website, located at myserviceera.com.</p>\r\n\r\n<p>By accessing this website we assume you accept these terms and conditions. Do not continue to use myserviceera.com if you do not agree to take all of the terms and conditions stated on this page.</p>\r\n\r\n<p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: &quot;Client&quot;, &quot;You&quot; and &quot;Your&quot; refers to you, the person log on this website and compliant to the Company&rsquo;s terms and conditions. &quot;The Company&quot;, &quot;Ourselves&quot;, &quot;We&quot;, &quot;Our&quot; and &quot;Us&quot;, refers to our Company. &quot;Party&quot;, &quot;Parties&quot;, or &quot;Us&quot;, refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client&rsquo;s needs in respect of provision of the Company&rsquo;s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>\r\n\r\n<h3><strong>Cookies</strong></h3>\r\n\r\n<p>We employ the use of cookies. By accessing myserviceera.com, you agreed to use cookies in agreement with the myserviceera&#39;s Privacy Policy.</p>\r\n\r\n<p>Most interactive websites use cookies to let us retrieve the user&rsquo;s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>\r\n\r\n<h3><strong>License</strong></h3>\r\n\r\n<p>Unless otherwise stated, myserviceera and/or its licensors own the intellectual property rights for all material on myserviceera.com. All intellectual property rights are reserved. You may access this from myserviceera.com for your own personal use subjected to restrictions set in these terms and conditions.</p>\r\n\r\n<p>You must not:</p>\r\n\r\n<ul>\r\n	<li>Republish material from myserviceera.com</li>\r\n	<li>Sell, rent or sub-license material from myserviceera.com</li>\r\n	<li>Reproduce, duplicate or copy material from myserviceera.com</li>\r\n	<li>Redistribute content from myserviceera.com</li>\r\n</ul>\r\n\r\n<p>This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the&nbsp;<a href=\"https://www.termsandconditionsgenerator.com/\">Terms And Conditions Generator</a>.</p>\r\n\r\n<p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. myserviceera does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of myserviceera,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, myserviceera shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>\r\n\r\n<p>myserviceera reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>\r\n\r\n<p>You warrant and represent that:</p>\r\n\r\n<ul>\r\n	<li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>\r\n	<li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>\r\n	<li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>\r\n	<li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>\r\n</ul>\r\n\r\n<p>You hereby grant myserviceera a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>\r\n\r\n<h3><strong>Hyperlinking to our Content</strong></h3>\r\n\r\n<p>The following organizations may link to our Website without prior written approval:</p>\r\n\r\n<ul>\r\n	<li>Government agencies;</li>\r\n	<li>Search engines;</li>\r\n	<li>News organizations;</li>\r\n	<li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>\r\n	<li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>\r\n</ul>\r\n\r\n<p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party&rsquo;s site.</p>\r\n\r\n<p>We may consider and approve other link requests from the following types of organizations:</p>\r\n\r\n<ul>\r\n	<li>commonly-known consumer and/or business information sources;</li>\r\n	<li>dot.com community sites;</li>\r\n	<li>associations or other groups representing charities;</li>\r\n	<li>online directory distributors;</li>\r\n	<li>internet portals;</li>\r\n	<li>accounting, law and consulting firms; and</li>\r\n	<li>educational institutions and trade associations.</li>\r\n</ul>\r\n\r\n<p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of myserviceera; and (d) the link is in the context of general resource information.</p>\r\n\r\n<p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party&rsquo;s site.</p>\r\n\r\n<p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to myserviceera. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>\r\n\r\n<p>Approved organizations may hyperlink to our Website as follows:</p>\r\n\r\n<ul>\r\n	<li>By use of our corporate name; or</li>\r\n	<li>By use of the uniform resource locator being linked to; or</li>\r\n	<li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party&rsquo;s site.</li>\r\n</ul>\r\n\r\n<p>No use of myserviceera&#39;s logo or other artwork will be allowed for linking absent a trademark license agreement.</p>\r\n\r\n<h3><strong>iFrames</strong></h3>\r\n\r\n<p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>\r\n\r\n<h3><strong>Content Liability</strong></h3>\r\n\r\n<p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>\r\n\r\n<h3><strong>Your Privacy</strong></h3>\r\n\r\n<p>Please read Privacy Policy</p>\r\n\r\n<h3><strong>Reservation of Rights</strong></h3>\r\n\r\n<p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it&rsquo;s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>\r\n\r\n<h3><strong>Removal of links from our website</strong></h3>\r\n\r\n<p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>\r\n\r\n<p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>\r\n\r\n<h3><strong>Disclaimer</strong></h3>\r\n\r\n<p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>\r\n\r\n<ul>\r\n	<li>limit or exclude our or your liability for death or personal injury;</li>\r\n	<li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>\r\n	<li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>\r\n	<li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>\r\n</ul>\r\n\r\n<p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>\r\n\r\n<p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>\r\n', '<h2><strong>Term and Conditions</strong></h2>\r\n\r\n<p>These terms and conditions outline the rules and regulations for the use of myserviceera&#39;s Website, located at myserviceera.com.</p>\r\n\r\n<p>By accessing this website we assume you accept these terms and conditions. Do not continue to use myserviceera.com if you do not agree to take all of the terms and conditions stated on this page.</p>\r\n\r\n<p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice and all Agreements: &quot;Client&quot;, &quot;You&quot; and &quot;Your&quot; refers to you, the person log on this website and compliant to the Company&rsquo;s terms and conditions. &quot;The Company&quot;, &quot;Ourselves&quot;, &quot;We&quot;, &quot;Our&quot; and &quot;Us&quot;, refers to our Company. &quot;Party&quot;, &quot;Parties&quot;, or &quot;Us&quot;, refers to both the Client and ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner for the express purpose of meeting the Client&rsquo;s needs in respect of provision of the Company&rsquo;s stated services, in accordance with and subject to, prevailing law of Netherlands. Any use of the above terminology or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>\r\n\r\n<h3><strong>Cookies</strong></h3>\r\n\r\n<p>We employ the use of cookies. By accessing myserviceera.com, you agreed to use cookies in agreement with the myserviceera&#39;s Privacy Policy.</p>\r\n\r\n<p>Most interactive websites use cookies to let us retrieve the user&rsquo;s details for each visit. Cookies are used by our website to enable the functionality of certain areas to make it easier for people visiting our website. Some of our affiliate/advertising partners may also use cookies.</p>\r\n\r\n<h3><strong>License</strong></h3>\r\n\r\n<p>Unless otherwise stated, myserviceera and/or its licensors own the intellectual property rights for all material on myserviceera.com. All intellectual property rights are reserved. You may access this from myserviceera.com for your own personal use subjected to restrictions set in these terms and conditions.</p>\r\n\r\n<p>You must not:</p>\r\n\r\n<ul>\r\n	<li>Republish material from myserviceera.com</li>\r\n	<li>Sell, rent or sub-license material from myserviceera.com</li>\r\n	<li>Reproduce, duplicate or copy material from myserviceera.com</li>\r\n	<li>Redistribute content from myserviceera.com</li>\r\n</ul>\r\n\r\n<p>This Agreement shall begin on the date hereof. Our Terms and Conditions were created with the help of the&nbsp;<a href=\"https://www.termsandconditionsgenerator.com/\">Terms And Conditions Generator</a>.</p>\r\n\r\n<p>Parts of this website offer an opportunity for users to post and exchange opinions and information in certain areas of the website. myserviceera does not filter, edit, publish or review Comments prior to their presence on the website. Comments do not reflect the views and opinions of myserviceera,its agents and/or affiliates. Comments reflect the views and opinions of the person who post their views and opinions. To the extent permitted by applicable laws, myserviceera shall not be liable for the Comments or for any liability, damages or expenses caused and/or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this website.</p>\r\n\r\n<p>myserviceera reserves the right to monitor all Comments and to remove any Comments which can be considered inappropriate, offensive or causes breach of these Terms and Conditions.</p>\r\n\r\n<p>You warrant and represent that:</p>\r\n\r\n<ul>\r\n	<li>You are entitled to post the Comments on our website and have all necessary licenses and consents to do so;</li>\r\n	<li>The Comments do not invade any intellectual property right, including without limitation copyright, patent or trademark of any third party;</li>\r\n	<li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material which is an invasion of privacy</li>\r\n	<li>The Comments will not be used to solicit or promote business or custom or present commercial activities or unlawful activity.</li>\r\n</ul>\r\n\r\n<p>You hereby grant myserviceera a non-exclusive license to use, reproduce, edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats or media.</p>\r\n\r\n<h3><strong>Hyperlinking to our Content</strong></h3>\r\n\r\n<p>The following organizations may link to our Website without prior written approval:</p>\r\n\r\n<ul>\r\n	<li>Government agencies;</li>\r\n	<li>Search engines;</li>\r\n	<li>News organizations;</li>\r\n	<li>Online directory distributors may link to our Website in the same manner as they hyperlink to the Websites of other listed businesses; and</li>\r\n	<li>System wide Accredited Businesses except soliciting non-profit organizations, charity shopping malls, and charity fundraising groups which may not hyperlink to our Web site.</li>\r\n</ul>\r\n\r\n<p>These organizations may link to our home page, to publications or to other Website information so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products and/or services; and (c) fits within the context of the linking party&rsquo;s site.</p>\r\n\r\n<p>We may consider and approve other link requests from the following types of organizations:</p>\r\n\r\n<ul>\r\n	<li>commonly-known consumer and/or business information sources;</li>\r\n	<li>dot.com community sites;</li>\r\n	<li>associations or other groups representing charities;</li>\r\n	<li>online directory distributors;</li>\r\n	<li>internet portals;</li>\r\n	<li>accounting, law and consulting firms; and</li>\r\n	<li>educational institutions and trade associations.</li>\r\n</ul>\r\n\r\n<p>We will approve link requests from these organizations if we decide that: (a) the link would not make us look unfavorably to ourselves or to our accredited businesses; (b) the organization does not have any negative records with us; (c) the benefit to us from the visibility of the hyperlink compensates the absence of myserviceera; and (d) the link is in the context of general resource information.</p>\r\n\r\n<p>These organizations may link to our home page so long as the link: (a) is not in any way deceptive; (b) does not falsely imply sponsorship, endorsement or approval of the linking party and its products or services; and (c) fits within the context of the linking party&rsquo;s site.</p>\r\n\r\n<p>If you are one of the organizations listed in paragraph 2 above and are interested in linking to our website, you must inform us by sending an e-mail to myserviceera. Please include your name, your organization name, contact information as well as the URL of your site, a list of any URLs from which you intend to link to our Website, and a list of the URLs on our site to which you would like to link. Wait 2-3 weeks for a response.</p>\r\n\r\n<p>Approved organizations may hyperlink to our Website as follows:</p>\r\n\r\n<ul>\r\n	<li>By use of our corporate name; or</li>\r\n	<li>By use of the uniform resource locator being linked to; or</li>\r\n	<li>By use of any other description of our Website being linked to that makes sense within the context and format of content on the linking party&rsquo;s site.</li>\r\n</ul>\r\n\r\n<p>No use of myserviceera&#39;s logo or other artwork will be allowed for linking absent a trademark license agreement.</p>\r\n\r\n<h3><strong>iFrames</strong></h3>\r\n\r\n<p>Without prior approval and written permission, you may not create frames around our Webpages that alter in any way the visual presentation or appearance of our Website.</p>\r\n\r\n<h3><strong>Content Liability</strong></h3>\r\n\r\n<p>We shall not be hold responsible for any content that appears on your Website. You agree to protect and defend us against all claims that is rising on your Website. No link(s) should appear on any Website that may be interpreted as libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or other violation of, any third party rights.</p>\r\n\r\n<h3><strong>Your Privacy</strong></h3>\r\n\r\n<p>Please read Privacy Policy</p>\r\n\r\n<h3><strong>Reservation of Rights</strong></h3>\r\n\r\n<p>We reserve the right to request that you remove all links or any particular link to our Website. You approve to immediately remove all links to our Website upon request. We also reserve the right to amen these terms and conditions and it&rsquo;s linking policy at any time. By continuously linking to our Website, you agree to be bound to and follow these linking terms and conditions.</p>\r\n\r\n<h3><strong>Removal of links from our website</strong></h3>\r\n\r\n<p>If you find any link on our Website that is offensive for any reason, you are free to contact and inform us any moment. We will consider requests to remove links but we are not obligated to or so or to respond to you directly.</p>\r\n\r\n<p>We do not ensure that the information on this website is correct, we do not warrant its completeness or accuracy; nor do we promise to ensure that the website remains available or that the material on the website is kept up to date.</p>\r\n\r\n<h3><strong>Disclaimer</strong></h3>\r\n\r\n<p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website. Nothing in this disclaimer will:</p>\r\n\r\n<ul>\r\n	<li>limit or exclude our or your liability for death or personal injury;</li>\r\n	<li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>\r\n	<li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>\r\n	<li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>\r\n</ul>\r\n\r\n<p>The limitations and prohibitions of liability set in this Section and elsewhere in this disclaimer: (a) are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer, including liabilities arising in contract, in tort and for breach of statutory duty.</p>\r\n\r\n<p>As long as the website and the information and services on the website are provided free of charge, we will not be liable for any loss or damage of any nature.</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_seller`
--

CREATE TABLE `tbl_seller` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shop_name` text,
  `shop_address` text,
  `landmark` text,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `latitude` text,
  `longitude` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(70) NOT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(200) NOT NULL,
  `about` varchar(255) DEFAULT NULL,
  `is_active` enum('1','2') NOT NULL DEFAULT '2' COMMENT '1=>Active, 2=>Inactive',
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `email`, `contact`, `password`, `image`, `about`, `is_active`, `updated_at`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, 'e6e061838856bf47e1de730719fb2609', 'no-image.png', NULL, '2', '2022-01-31 08:06:45', '2022-01-31 02:36:45'),
(2, 'deepakmauryacs', 'deepakmauryacs16@gmail.com', '8081008926', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '1', '2022-02-10 11:16:43', '2022-02-04 18:01:31'),
(3, 'ravindra', 'ravindra123@gmail.com', '12345', '202cb962ac59075b964b07152d234b70', '63c0155e4aa87ae98b297663f29e7ff6.png', 'abc', '1', NULL, '2022-02-10 12:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useraddress`
--

CREATE TABLE `tbl_useraddress` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `billing_name` varchar(255) DEFAULT NULL,
  `billing_email` varchar(255) DEFAULT NULL,
  `billing_mobile_no` varchar(20) DEFAULT NULL,
  `alter_mobile_no` varchar(20) DEFAULT NULL,
  `building_name` text,
  `road_area_colony` text,
  `landmark` text,
  `country` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pincode` varchar(20) DEFAULT NULL,
  `address_type` varchar(50) DEFAULT NULL,
  `latitude` text,
  `longitude` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_useraddress`
--

INSERT INTO `tbl_useraddress` (`id`, `user_id`, `billing_name`, `billing_email`, `billing_mobile_no`, `alter_mobile_no`, `building_name`, `road_area_colony`, `landmark`, `country`, `state`, `city`, `pincode`, `address_type`, `latitude`, `longitude`, `created_at`) VALUES
(1, 2, 'deepak maurya', 'deepakmauryacs16@gmail.com', '08081008926', '08081008926', 'G5', 'Munshipuliya', 'UNUA', 'India', 'Uttar Pradesh', 'Varansi', '221007', '1', NULL, NULL, '2022-02-05 08:39:11'),
(2, 2, 'htn hg', 'ravindra@gmail.com', '213456', '01234567890', 'awawsa', 'aw', 'wa', 'India', 'Uttar Pradesh', 'fdgt', '64545', '1', NULL, NULL, '2022-02-08 11:00:15'),
(8, 3, 'htn hg', 'ravindra@gmail.com', '213456', '01234567890', 'sdc', 'cfs', 'nhbgfvdcsx', 'India', 'Uttar Pradesh', 'fdgt', '64545', '1', NULL, NULL, '2022-02-10 12:57:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ecom_brand`
--
ALTER TABLE `tbl_ecom_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ecom_category`
--
ALTER TABLE `tbl_ecom_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ecom_color`
--
ALTER TABLE `tbl_ecom_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ecom_mainslider`
--
ALTER TABLE `tbl_ecom_mainslider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ecom_orders`
--
ALTER TABLE `tbl_ecom_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ecom_order_product`
--
ALTER TABLE `tbl_ecom_order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ecom_product`
--
ALTER TABLE `tbl_ecom_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ecom_producttype`
--
ALTER TABLE `tbl_ecom_producttype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ecom_product_image`
--
ALTER TABLE `tbl_ecom_product_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ecom_recentview`
--
ALTER TABLE `tbl_ecom_recentview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ecom_size`
--
ALTER TABLE `tbl_ecom_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ecom_store_setup`
--
ALTER TABLE `tbl_ecom_store_setup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ecom_unit`
--
ALTER TABLE `tbl_ecom_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ecom_useraddress`
--
ALTER TABLE `tbl_ecom_useraddress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ecom_websetting`
--
ALTER TABLE `tbl_ecom_websetting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_useraddress`
--
ALTER TABLE `tbl_useraddress`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_ecom_brand`
--
ALTER TABLE `tbl_ecom_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_ecom_category`
--
ALTER TABLE `tbl_ecom_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_ecom_color`
--
ALTER TABLE `tbl_ecom_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_ecom_mainslider`
--
ALTER TABLE `tbl_ecom_mainslider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_ecom_orders`
--
ALTER TABLE `tbl_ecom_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_ecom_order_product`
--
ALTER TABLE `tbl_ecom_order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_ecom_product`
--
ALTER TABLE `tbl_ecom_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tbl_ecom_producttype`
--
ALTER TABLE `tbl_ecom_producttype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_ecom_product_image`
--
ALTER TABLE `tbl_ecom_product_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_ecom_recentview`
--
ALTER TABLE `tbl_ecom_recentview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ecom_size`
--
ALTER TABLE `tbl_ecom_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_ecom_store_setup`
--
ALTER TABLE `tbl_ecom_store_setup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ecom_unit`
--
ALTER TABLE `tbl_ecom_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_ecom_websetting`
--
ALTER TABLE `tbl_ecom_websetting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_useraddress`
--
ALTER TABLE `tbl_useraddress`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
