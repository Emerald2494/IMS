-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 10:43 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(25) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `active`) VALUES
(21, 'Samsung', 1),
(27, 'Apple', 1),
(30, 'MacBook', 1),
(33, 'DELL', 1),
(34, 'Huawei', 1),
(35, 'Lenovo', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cash_order`
--

CREATE TABLE `cash_order` (
  `cashorder_id` int(11) NOT NULL,
  `invoice_number` int(50) NOT NULL,
  `brand_id` int(25) NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serial_number` int(50) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(25) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `active`) VALUES
(12, 'Camera', 2),
(13, 'Laptop', 1),
(14, 'Phone', 1),
(15, 'Book', 1);

-- --------------------------------------------------------

--
-- Table structure for table `charge_order`
--

CREATE TABLE `charge_order` (
  `chargeorder_id` int(11) NOT NULL,
  `invoice_number` int(50) NOT NULL,
  `brand_id` int(25) NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serial_number` int(50) NOT NULL,
  `price` double NOT NULL,
  `down_payment` int(11) NOT NULL,
  `month_term` int(11) NOT NULL,
  `monthly_payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(25) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `contact_number`) VALUES
(1, 'Arkar', 'Yangon', '0978784563');

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(11) NOT NULL,
  `discount_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `emp_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(25) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `name`, `active`) VALUES
(1, 'Galaxy S21 Ultra', 2),
(3, 'MateBook D15', 1),
(8, 'Lenovo 100e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(25) NOT NULL,
  `invoice_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gross_amount` int(50) NOT NULL,
  `vat_charge_rate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vat_charge` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `net_amount` int(11) NOT NULL,
  `date_order` date NOT NULL,
  `or_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `invoice_number`, `gross_amount`, `vat_charge_rate`, `vat_charge`, `net_amount`, `date_order`, `or_number`, `user_id`) VALUES
(22, '0', 1081000, '', '17000', 289000, '2021-01-27', '0', 0),
(23, 'INV/3B70', 676000, '', '8500', 144500, '2021-01-27', 'OR -6747', 0),
(24, 'INV/7F9E', 180000, '', '10000', 190000, '2021-01-27', 'OR -FFD5', 1),
(25, 'INV/E226', 561000, '', '8500', 144500, '2021-01-27', 'OR -DCF2', 2);

-- --------------------------------------------------------

--
-- Table structure for table `order_lines`
--

CREATE TABLE `order_lines` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_lines`
--

INSERT INTO `order_lines` (`id`, `order_id`, `product_id`, `qty`, `rate`, `discount`, `amount`) VALUES
(12, 22, 5, '1', '809000', '0', '809000.00'),
(13, 22, 4, '2', '170000', '20', '272000.00'),
(14, 23, 7, '3', '200000', '10', '540000.00'),
(15, 23, 4, '1', '170000', '20', '136000.00'),
(16, 24, 7, '1', '200000', '10', '180000.00'),
(17, 25, 3, '1', '500000', '15', '425000.00'),
(18, 25, 4, '1', '170000', '20', '136000.00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `img` blob DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(25) NOT NULL,
  `purchased_price` int(11) NOT NULL,
  `qty` int(25) NOT NULL,
  `discount` int(25) DEFAULT NULL,
  `date_received` date NOT NULL,
  `brand_id` int(25) NOT NULL,
  `model_id` int(25) NOT NULL,
  `category_id` int(25) NOT NULL,
  `store_id` int(25) NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `availability` int(50) NOT NULL,
  `date_sold` date NOT NULL,
  `customer_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `img`, `name`, `price`, `purchased_price`, `qty`, `discount`, `date_received`, `brand_id`, `model_id`, `category_id`, `store_id`, `description`, `availability`, `date_sold`, `customer_id`) VALUES
(3, '', 'Testing Product', 500000, 0, 12, 15, '2021-01-21', 21, 1, 14, 13, '                         this is description                                                                                                                              ', 1, '0000-00-00', 0),
(4, '', 'Lenovo 100e', 170000, 0, 10, 20, '2021-01-21', 35, 8, 13, 10, '                 Specs: CPU Intel celeron N3350; 1366*768,standby 6-7 hours;                               ', 1, '0000-00-00', 0),
(5, '', 'Huawei MateBook D15', 809000, 0, 10, 0, '2021-01-22', 34, 3, 13, 13, '                   15.6-inch HUAWEI FullView Display\r\n\r\n', 1, '0000-00-00', 0),
(7, '', 'Product A', 200000, 0, 10, 10, '2021-01-21', 21, 3, 13, 10, '                  ', 1, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `active`) VALUES
(10, 'store one', 1),
(13, 'store two', 1);

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `supplier_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(25) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_number` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `contact_number`) VALUES
(1, 'Admin', 'admin@gmail.com', 'password', 'Yangon', '09-6961474912'),
(2, 'Emerald', 'emerald@gmail.com', 'TXlhMTIzIUAj', 'Pyawbwe', '09954861489');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_orderlines`
-- (See below for the actual view)
--
CREATE TABLE `vw_orderlines` (
`id` int(11)
,`order_id` int(11)
,`qty` varchar(255)
,`rate` varchar(255)
,`discount` varchar(255)
,`amount` varchar(255)
,`inv_no` varchar(255)
,`gross_amt` int(50)
,`vat_rate` varchar(255)
,`Vat` varchar(255)
,`net_amt` int(11)
,`date_order` date
,`or_number` varchar(255)
,`product_name` varchar(255)
,`selling_price` int(25)
,`discount_price` int(25)
,`purchased_price` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_orders`
-- (See below for the actual view)
--
CREATE TABLE `vw_orders` (
`id` int(25)
,`invoice_number` varchar(255)
,`gross_amount` int(50)
,`vat_charge_rate` varchar(255)
,`vat_charge` varchar(255)
,`net_amount` int(11)
,`date_order` date
,`or_number` varchar(255)
,`user_name` varchar(255)
,`user_address` varchar(255)
,`user_contact_number` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vw_products`
-- (See below for the actual view)
--
CREATE TABLE `vw_products` (
`product_id` int(11)
,`img` blob
,`name` varchar(255)
,`price` int(25)
,`purchased_price` int(11)
,`qty` int(25)
,`discount` int(25)
,`date_received` date
,`brand_name` varchar(255)
,`model_name` varchar(255)
,`category_name` varchar(255)
,`store_name` varchar(255)
,`description` varchar(255)
,`availability` int(50)
,`date_sold` date
);

-- --------------------------------------------------------

--
-- Structure for view `vw_orderlines`
--
DROP TABLE IF EXISTS `vw_orderlines`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_orderlines`  AS SELECT `order_lines`.`id` AS `id`, `order_lines`.`order_id` AS `order_id`, `order_lines`.`qty` AS `qty`, `order_lines`.`rate` AS `rate`, `order_lines`.`discount` AS `discount`, `order_lines`.`amount` AS `amount`, `orders`.`invoice_number` AS `inv_no`, `orders`.`gross_amount` AS `gross_amt`, `orders`.`vat_charge_rate` AS `vat_rate`, `orders`.`vat_charge` AS `Vat`, `orders`.`net_amount` AS `net_amt`, `orders`.`date_order` AS `date_order`, `orders`.`or_number` AS `or_number`, `products`.`name` AS `product_name`, `products`.`price` AS `selling_price`, `products`.`discount` AS `discount_price`, `products`.`purchased_price` AS `purchased_price` FROM ((`order_lines` left join `orders` on(`orders`.`id` = `order_lines`.`order_id`)) left join `products` on(`products`.`product_id` = `order_lines`.`product_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_orders`
--
DROP TABLE IF EXISTS `vw_orders`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_orders`  AS SELECT `orders`.`id` AS `id`, `orders`.`invoice_number` AS `invoice_number`, `orders`.`gross_amount` AS `gross_amount`, `orders`.`vat_charge_rate` AS `vat_charge_rate`, `orders`.`vat_charge` AS `vat_charge`, `orders`.`net_amount` AS `net_amount`, `orders`.`date_order` AS `date_order`, `orders`.`or_number` AS `or_number`, `users`.`name` AS `user_name`, `users`.`address` AS `user_address`, `users`.`contact_number` AS `user_contact_number` FROM (`orders` left join `users` on(`users`.`id` = `orders`.`user_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `vw_products`
--
DROP TABLE IF EXISTS `vw_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_products`  AS SELECT `products`.`product_id` AS `product_id`, `products`.`img` AS `img`, `products`.`name` AS `name`, `products`.`price` AS `price`, `products`.`purchased_price` AS `purchased_price`, `products`.`qty` AS `qty`, `products`.`discount` AS `discount`, `products`.`date_received` AS `date_received`, `brands`.`name` AS `brand_name`, `models`.`name` AS `model_name`, `categories`.`name` AS `category_name`, `stores`.`name` AS `store_name`, `products`.`description` AS `description`, `products`.`availability` AS `availability`, `products`.`date_sold` AS `date_sold` FROM ((((`products` left join `brands` on(`brands`.`id` = `products`.`brand_id`)) left join `models` on(`products`.`model_id` = `models`.`id`)) left join `categories` on(`categories`.`id` = `products`.`category_id`)) left join `stores` on(`stores`.`id` = `products`.`store_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cash_order`
--
ALTER TABLE `cash_order`
  ADD PRIMARY KEY (`cashorder_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `charge_order`
--
ALTER TABLE `charge_order`
  ADD PRIMARY KEY (`chargeorder_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_lines`
--
ALTER TABLE `order_lines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `cash_order`
--
ALTER TABLE `cash_order`
  MODIFY `cashorder_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `charge_order`
--
ALTER TABLE `charge_order`
  MODIFY `chargeorder_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_lines`
--
ALTER TABLE `order_lines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_lines`
--
ALTER TABLE `order_lines`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
