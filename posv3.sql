-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2020 at 08:40 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` varchar(30) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Brakes'),
(3, 'Mirrors'),
(5, 'Wheel'),
(6, 'Battery'),
(7, 'Rims'),
(10, 'Fluids');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `expense_id` int(11) NOT NULL,
  `expense` varchar(50) NOT NULL,
  `expense_amount` decimal(10,2) NOT NULL,
  `expense_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`expense_id`, `expense`, `expense_amount`, `expense_date`) VALUES
(1, 'Salary of Cashier', '250.00', '2020-09-26'),
(2, 'Travelling Expense', '120.00', '2020-09-25');

-- --------------------------------------------------------

--
-- Table structure for table `history_log`
--

CREATE TABLE `history_log` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(100) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_log`
--

INSERT INTO `history_log` (`log_id`, `user_id`, `action`, `date`) VALUES
(78, 1, 'added new supplier fgf', '2019-09-04 20:08:01'),
(79, 1, 'updated supplier leee', '2019-09-04 20:08:16'),
(80, 1, 'added new user ada', '2019-09-04 20:09:58'),
(81, 1, 'updated user kaye', '2019-09-04 20:10:10'),
(82, 1, 'has logged out the system at ', '2019-09-04 20:25:23'),
(83, 1, 'has logged in the system at ', '2019-09-05 07:20:13'),
(84, 1, 'has logged out the system at ', '2019-09-05 12:51:32'),
(85, 3, 'has logged in the system at ', '2019-09-05 12:51:37'),
(86, 3, 'has logged out the system at ', '2019-09-05 12:52:35'),
(87, 1, 'has logged in the system at ', '2019-09-05 12:52:42'),
(88, 1, 'has logged in the system at ', '2019-09-06 18:46:41'),
(89, 1, 'added new schedule for 2019-09-10', '2019-09-06 19:25:30'),
(90, 1, 'updated schedule to 2019-08-22', '2019-09-06 19:31:06'),
(91, 5, 'added new product jk', '2019-09-07 03:39:48'),
(92, 5, 'added new product l;l', '2019-09-07 03:41:07'),
(93, 1, 'has logged out!', '2020-04-24 08:07:00'),
(94, 0, 'successfully logged in!', '2020-04-24 08:12:00'),
(95, 0, 'has logged out!', '2020-04-24 08:13:00'),
(96, 0, 'successfully logged in!', '2020-04-24 08:14:00'),
(97, 0, 'has logged out!', '2020-04-24 08:15:00'),
(98, 9, 'successfully logged in!', '2020-04-24 08:15:00'),
(99, 9, 'successfully logged in!', '2020-04-24 08:15:00'),
(100, 9, 'has logged out!', '2020-04-24 08:16:00'),
(101, 9, 'successfully logged in!', '2020-04-24 08:16:00'),
(102, 9, 'has logged out!', '2020-04-24 08:19:00'),
(103, 9, 'successfully logged in!', '2020-04-24 08:20:00'),
(104, 9, 'has logged out!', '2020-04-24 08:20:00'),
(105, 9, 'successfully logged in!', '2020-04-24 08:20:00'),
(106, 9, 'has logged out!', '2020-04-24 08:20:00'),
(107, 9, 'successfully logged in!', '2020-04-24 08:21:00'),
(108, 9, 'has logged out!', '2020-04-24 08:21:00'),
(109, 9, 'successfully logged in!', '2020-04-24 08:21:00'),
(110, 9, 'has logged out!', '2020-04-24 08:21:00'),
(111, 9, 'successfully logged in!', '2020-04-24 08:22:00'),
(112, 9, 'has logged out!', '2020-04-24 08:22:00'),
(113, 9, 'successfully logged in!', '2020-04-24 08:22:00'),
(114, 9, 'has logged out!', '2020-04-24 08:22:00'),
(115, 9, 'successfully logged in!', '2020-04-24 08:22:00'),
(116, 9, 'added new product ', '2020-04-24 09:49:54'),
(117, 9, 'added new product 5644', '2020-04-24 09:51:42'),
(118, 9, 'updated product Tinapa', '2020-04-24 10:16:32'),
(119, 9, 'added  of Side Mirror', '2020-04-24 17:17:51'),
(120, 9, 'added 5 of Side Mirror', '2020-04-24 17:18:13'),
(121, 9, 'added 15 of Tinapa', '2020-04-24 17:22:54'),
(122, 0, 'has logged out!', '2020-04-25 02:42:00'),
(123, 9, 'successfully logged in!', '2020-04-25 02:43:00'),
(124, 9, 'successfully logged in!', '2020-04-25 02:43:00'),
(125, 9, 'updated product 5644', '2020-04-25 02:49:18'),
(126, 9, 'added new product 555 Corned Beef', '2020-04-25 02:51:39'),
(127, 9, 'updated product 5644', '2020-04-25 02:51:58'),
(128, 9, 'updated product tgete', '2020-04-25 02:52:53'),
(129, 9, 'updated product test', '2020-04-25 02:53:03'),
(130, 9, 'updated product l;l', '2020-04-25 02:53:13'),
(131, 9, 'updated product klk', '2020-04-25 02:53:30'),
(132, 9, 'updated product jk', '2020-04-25 02:54:29'),
(133, 9, 'updated product kjhjh', '2020-04-25 02:55:12'),
(134, 9, 'updated product jhjh', '2020-04-25 02:55:24'),
(135, 9, 'successfully logged in!', '2020-04-25 04:32:00'),
(136, 9, 'successfully logged in!', '2020-04-25 04:32:00'),
(137, 9, 'successfully logged in!', '2020-04-25 04:32:00'),
(138, 9, 'successfully logged in!', '2020-04-25 04:33:00'),
(139, 9, 'successfully logged in!', '2020-04-25 04:33:00'),
(140, 9, 'successfully logged in!', '2020-04-25 04:34:00'),
(141, 9, 'has logged out!', '2020-04-25 04:34:00'),
(142, 0, 'has logged out!', '2020-04-25 04:34:00'),
(143, 6, 'successfully logged in!', '2020-04-25 04:40:00'),
(144, 6, 'successfully logged in!', '2020-04-25 04:41:00'),
(145, 6, 'successfully logged in!', '2020-04-25 04:41:00'),
(146, 6, 'successfully logged in!', '2020-04-25 04:41:00'),
(147, 3, 'added 50 of 555 Corned Beef', '2020-04-25 11:30:53'),
(148, 3, 'added 100 of Side Mirror', '2020-04-25 11:31:04'),
(149, 3, 'added 200 of Tinapa', '2020-04-25 11:31:14'),
(150, 3, 'successfully added new sales worth 210.00', '2020-04-25 12:25:08'),
(151, 3, 'successfully added new sales worth 30.00', '2020-04-26 11:39:11'),
(152, 3, 'successfully added new sales worth 150.00', '2020-04-26 12:40:13'),
(153, 3, 'has logged out!', '2020-04-26 06:44:00'),
(154, 9, 'successfully logged in!', '2020-04-26 06:44:00'),
(155, 9, 'has logged out!', '2020-04-26 06:46:00'),
(156, 10, 'successfully logged in!', '2020-04-26 06:47:00'),
(157, 10, 'successfully added new sales worth 1050.00', '2020-04-26 12:48:29'),
(158, 10, 'has logged out!', '2020-04-26 06:48:00'),
(159, 9, 'successfully logged in!', '2020-04-26 06:48:00'),
(160, 9, 'successfully logged in!', '2020-05-06 05:03:00'),
(161, 9, 'has logged out!', '2020-05-06 05:11:00'),
(162, 11, 'successfully logged in!', '2020-05-06 05:11:00'),
(163, 11, 'has logged out!', '2020-05-06 05:11:00'),
(164, 12, 'successfully logged in!', '2020-05-06 05:12:00'),
(165, 12, 'has logged out!', '2020-05-06 05:12:00'),
(166, 11, 'successfully logged in!', '2020-05-06 05:19:00'),
(167, 11, 'successfully logged in!', '2020-06-12 10:17:00'),
(168, 11, 'has logged out!', '2020-06-12 10:28:00'),
(169, 11, 'successfully logged in!', '2020-06-12 10:28:00'),
(170, 11, 'has logged out!', '2020-06-12 10:29:00'),
(171, 12, 'successfully logged in!', '2020-06-12 10:29:00'),
(172, 12, 'has logged out!', '2020-06-12 14:05:00'),
(173, 12, 'successfully logged in!', '2020-06-12 14:06:00'),
(174, 12, 'has logged out!', '2020-06-12 14:06:00'),
(175, 12, 'successfully logged in!', '2020-06-12 14:06:00'),
(176, 12, 'successfully added new sales worth 90.00', '2020-06-12 20:15:36'),
(177, 12, 'successfully added new sales worth 500.00', '2020-06-12 20:21:10'),
(178, 12, 'successfully added new sales worth 150.00', '2020-06-12 20:23:56'),
(179, 12, 'has logged out!', '2020-06-12 14:24:00'),
(180, 11, 'successfully logged in!', '2020-06-12 14:24:00'),
(181, 11, 'successfully logged in!', '2020-06-12 15:19:00'),
(182, 11, 'has logged out!', '2020-06-12 15:19:00'),
(183, 11, 'successfully logged in!', '2020-06-12 15:21:00'),
(184, 11, 'has logged out!', '2020-06-12 15:22:00'),
(185, 11, 'successfully logged in!', '2020-08-24 06:52:00'),
(186, 0, 'has logged out!', '2020-09-24 13:06:00'),
(187, 12, 'successfully logged in!', '2020-09-24 13:07:00'),
(188, 12, 'successfully logged in!', '2020-09-24 13:52:00'),
(189, 12, 'has logged out!', '2020-09-24 13:52:00'),
(190, 11, 'successfully logged in!', '2020-09-24 13:52:00'),
(191, 11, 'has logged out!', '2020-09-24 14:20:00'),
(192, 11, 'successfully logged in!', '2020-09-24 14:20:00'),
(193, 11, 'has logged out!', '2020-09-24 14:20:00'),
(194, 12, 'successfully logged in!', '2020-09-24 14:20:00'),
(195, 12, 'successfully added new sales worth 200.00', '2020-09-24 20:20:53'),
(196, 12, 'successfully added new sales worth 100.00', '2020-09-24 20:21:07'),
(197, 12, 'has logged out!', '2020-09-24 14:21:00'),
(198, 11, 'successfully logged in!', '2020-09-24 14:21:00'),
(199, 11, 'successfully logged in!', '2020-09-26 00:00:00'),
(200, 12, 'successfully logged in!', '2020-09-26 04:21:00'),
(201, 12, 'successfully added new sales worth 1615.00', '2020-09-26 12:08:45'),
(202, 12, 'successfully added new sales worth 1615', '2020-09-26 12:14:47'),
(203, 12, 'successfully added new sales worth 270.00', '2020-09-26 12:35:12'),
(204, 12, 'successfully added new sales worth 120.00', '2020-09-26 12:39:28'),
(205, 12, 'has logged out!', '2020-09-26 06:52:00'),
(206, 11, 'successfully logged in!', '2020-09-26 06:52:00'),
(207, 1, 'has logged out!', '2020-09-26 08:05:00'),
(208, 12, 'successfully logged in!', '2020-09-26 08:06:00'),
(209, 12, 'successfully added new sales worth 30.00', '2020-09-26 14:06:13'),
(210, 12, 'has logged out!', '2020-09-26 08:06:00'),
(211, 11, 'successfully logged in!', '2020-09-26 08:06:00'),
(212, 11, 'has logged out!', '2020-09-26 08:34:00'),
(213, 12, 'successfully logged in!', '2020-09-26 08:34:00'),
(214, 12, 'successfully added new sales worth 290.00', '2020-09-26 14:34:47'),
(215, 12, 'has logged out!', '2020-09-26 08:35:00'),
(216, 11, 'successfully logged in!', '2020-09-26 08:35:00'),
(217, 11, 'has logged out!', '2020-09-26 08:37:00'),
(218, 12, 'successfully logged in!', '2020-09-26 08:37:00');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` varchar(10) NOT NULL,
  `order_total` decimal(10,2) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cash_tendered` decimal(10,2) NOT NULL,
  `cash_change` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `amount_due` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_date`, `order_status`, `order_total`, `cust_name`, `cash_tendered`, `cash_change`, `user_id`, `discount`, `amount_due`) VALUES
(92, '2020-09-25 12:38:53', 'paid', '120.00', 'ttt', '120.00', '0.00', 12, '0.00', '120.00'),
(93, '2020-09-26 14:05:43', 'paid', '30.00', 'Recording Staff1', '50.00', '20.00', 12, '0.00', '30.00'),
(94, '2020-09-26 14:34:17', 'paid', '290.00', 'Recording Staff1', '300.00', '10.00', 12, '0.00', '290.00'),
(95, '2020-09-26 14:38:06', 'pending', '30.00', 'ddd', '0.00', '0.00', 0, '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `prod_id`, `qty`, `price`, `total`) VALUES
(152, 92, 13, 2, '60.00', '30.00'),
(153, 93, 13, 1, '30.00', '30.00'),
(154, 94, 13, 3, '30.00', '90.00'),
(155, 94, 2, 2, '100.00', '200.00'),
(156, 95, 13, 1, '30.00', '30.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prod_id` int(11) NOT NULL,
  `prod_pic` varchar(1000) NOT NULL,
  `prod_desc` varchar(1000) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `prod_price` decimal(10,2) NOT NULL,
  `prod_qty` varchar(10) NOT NULL,
  `prod_unit` varchar(50) NOT NULL,
  `grams` varchar(10) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `reorder` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prod_id`, `prod_pic`, `prod_desc`, `prod_name`, `supplier_id`, `prod_price`, `prod_qty`, `prod_unit`, `grams`, `cat_id`, `reorder`) VALUES
(2, 'default.gif', 'chu chu chu', 'Side Mirror', 1, '100.00', '102', '', '', 1, 5),
(3, 'intro-bg.jpg', '														', 'jhjh', 1, '123.00', '-14', '', '', 1, 2),
(4, 'albacore-tuna.jpg', '														', 'test', 1, '210.00', '', '', '', 1, 2),
(5, 'food.png', 'dsds													', 'kjhjh', 1, '110.00', '-3', '', '', 1, 1),
(6, 'libbys-sliced-carrots-230g.jpg', 'ytytyt												', 'klk', 1, '10.00', '-1', '', '', 1, 2),
(7, 'tide-powder-2.72kg.jpg', 'tete														', 'tgete', 1, '44.00', '', '', '', 1, 4),
(8, 'tide-powder-2.72kg.jpg', 'Sardines', 'Tinapa', 2, '15.00', '135', '', '', 7, 10),
(9, 'starkist-chunk-light-tuna.jpeg', 'kj														', 'jk', 2, '45.00', '', '', '', 1, 4),
(10, 'fresh-eggs-10.jpg', 'jkjk														', 'l;l', 2, '12.00', '', '', '', 1, 1),
(12, 'logo.png', '555																												', '5644', 2, '11.00', '-3', '', '', 10, 1),
(13, 'default.gif', 'jhsjfhsjfkshfjkshfsjkhfsjkhsjkfhsjkfhsjfh', '555 Corned Beef', 1, '30.00', '12', '', '', 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `stockin`
--

CREATE TABLE `stockin` (
  `stockin_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `stockin_qty` int(6) NOT NULL,
  `stockin_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockin`
--

INSERT INTO `stockin` (`stockin_id`, `prod_id`, `stockin_qty`, `stockin_date`) VALUES
(4, 2, 10, '2019-05-26 12:45:06'),
(5, 2, 10, '2019-08-11 23:57:31'),
(6, 3, 1, '2019-09-04 19:56:29'),
(8, 2, 5, '2020-04-24 17:18:13'),
(9, 8, 15, '2020-04-24 17:22:54'),
(10, 13, 50, '2020-04-25 11:30:53'),
(11, 2, 100, '2020-04-25 11:31:04'),
(12, 8, 200, '2020-04-25 11:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `stockout`
--

CREATE TABLE `stockout` (
  `stockout_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `qty` int(6) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_address` varchar(100) NOT NULL,
  `supplier_contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_address`, `supplier_contact`) VALUES
(1, 'Proctor and Gamble', 'Bacolod City', '09086152757'),
(2, 'Robina', 'bago', '234');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(50) NOT NULL,
  `last` varchar(50) NOT NULL,
  `first` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `user_type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `last`, `first`, `status`, `user_type`) VALUES
(11, 'jenzen', 'b1b3l9la0i202cb962ac59075b964b07152d234b70', 'Daquiado', 'Jenzen', '', 'admin'),
(12, 'cashier', 'b1b3l9la0i202cb962ac59075b964b07152d234b70', 'Daquiado', 'Jenzen', '', 'cashier');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `history_log`
--
ALTER TABLE `history_log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prod_id`);

--
-- Indexes for table `stockin`
--
ALTER TABLE `stockin`
  ADD PRIMARY KEY (`stockin_id`);

--
-- Indexes for table `stockout`
--
ALTER TABLE `stockout`
  ADD PRIMARY KEY (`stockout_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `history_log`
--
ALTER TABLE `history_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=219;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `stockin`
--
ALTER TABLE `stockin`
  MODIFY `stockin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `stockout`
--
ALTER TABLE `stockout`
  MODIFY `stockout_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
