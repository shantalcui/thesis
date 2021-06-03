-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2021 at 03:50 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sum`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(111) NOT NULL,
  `admin_name` varchar(111) NOT NULL,
  `admin_pass` varchar(111) NOT NULL,
  `admin_login` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_pass`, `admin_login`) VALUES
(1, 'manager', 'Abc12345', ''),
(2, 'Nel John', 'Abc12345', 'login');

-- --------------------------------------------------------

--
-- Table structure for table `daily`
--

CREATE TABLE `daily` (
  `daily_id` int(111) NOT NULL,
  `daily_date` varchar(111) NOT NULL,
  `daily_tnorder` int(111) NOT NULL,
  `daily_discount` float(111,2) NOT NULL,
  `daily_vat` float(111,2) NOT NULL,
  `daily_sales` float(111,2) NOT NULL,
  `daily_gross_sales` float(111,2) NOT NULL,
  `week` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `income_id` int(111) NOT NULL,
  `income_Transaction` varchar(111) NOT NULL,
  `income_Date_Time` varchar(111) NOT NULL,
  `income_amount` float(111,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`income_id`, `income_Transaction`, `income_Date_Time`, `income_amount`) VALUES
(1, 'Guest2', 'February 19 2021/09:44am', 220.64),
(2, 'Guest2', 'February 20 2021/11:55am', 220.64),
(3, 'Guest2', 'February 20 2021/01:12pm', 220.64),
(4, 'Guest3', 'February 20 2021/01:23pm', 157.60),
(5, 'Guest3', 'February 20 2021/01:48pm', 157.60),
(6, 'Guest3', 'February 20 2021/01:58pm', 157.60),
(7, 'neljohn', 'February 22 2021/10:58am', 7249.60),
(8, 'Guest3', 'February 22 2021/11:12am', 220.64),
(9, 'neljohn', 'February 22 2021/12:23pm', 220.64),
(10, 'neljohn', 'February 22 2021/12:27pm', 220.64),
(11, 'neljohn', 'February 22 2021/12:45pm', 297.60),
(12, 'Guest3', 'February 22 2021/12:50pm', 416.64),
(13, 'Guest3', 'February 22 2021/01:02pm', 140.00),
(14, 'neljohn', 'February 22 2021/01:10pm', 315.20),
(15, 'neljohn', 'February 22 2021/01:19pm', 157.60),
(16, 'Guest1', 'February 23 2021/11:05am', 157.60),
(17, 'Guest1', 'February 23 2021/12:35pm', 220.64),
(18, 'neljohn', 'February 23 2021/01:59pm', 220.64),
(19, 'neljohn', 'February 23 2021/03:27pm', 315.20),
(20, 'neljohn', 'February 23 2021/03:36pm', 157.60),
(21, 'Guest1', 'February 23 2021/04:38pm', 157.60),
(22, 'neljohn', 'February 23 2021/04:46pm', 220.64),
(23, 'neljohn', 'February 23 2021/04:59pm', 315.20),
(24, 'neljohn', 'February 23 2021/05:37pm', 157.60),
(25, 'neljohn', 'February 23 2021/05:41pm', 220.64),
(26, 'neljohn', 'February 23 2021/05:49pm', 220.64),
(27, 'neljohn', 'February 23 2021/05:54pm', 157.60),
(28, 'neljohn', 'February 24 2021/05:08pm', 46.52),
(29, 'neljohn', 'February 24 2021/11:09pm', 157.60),
(30, 'neljohn', 'February 24 2021/11:42pm', 441.28),
(31, 'neljohn', 'February 24 2021/11:47pm', 220.64),
(32, 'neljohn', 'March 01 2021/06:37pm', 157.60),
(33, 'neljohn', 'March 07 2021/07:09pm', 157.60),
(34, 'neljohn', 'March 14 2021/10:04am', 220.64),
(35, 'neljohn', 'March 14 2021/10:22am', 220.64),
(36, 'neljohn', 'March 14 2021/10:25am', 220.64),
(37, 'neljohn', 'March 14 2021/10:27am', 7407.20),
(38, 'neljohn', 'March 14 2021/10:37am', 907.20),
(39, 'neljohn', 'March 14 2021/10:41am', 220.64),
(40, 'neljohn', 'March 14 2021/10:48am', 157.60);

-- --------------------------------------------------------

--
-- Table structure for table `monthly`
--

CREATE TABLE `monthly` (
  `monthly_id` int(111) NOT NULL,
  `monthly_month` varchar(111) NOT NULL,
  `monthly_tnorder` int(111) NOT NULL,
  `monthly_discount` float(111,2) NOT NULL,
  `monthly_vat` float(111,2) NOT NULL,
  `monthly_sales` float(111,2) NOT NULL,
  `monthly_gross_sales` float(111,2) NOT NULL,
  `month_m` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(111) NOT NULL,
  `order_image` varchar(111) NOT NULL,
  `order_name_id` int(111) NOT NULL,
  `order_name` varchar(111) NOT NULL,
  `order_cashier` varchar(111) NOT NULL,
  `order_table` varchar(111) NOT NULL,
  `order_username` varchar(111) NOT NULL,
  `order_user` varchar(111) NOT NULL,
  `order_qty` int(111) NOT NULL,
  `order_price` float(111,2) NOT NULL,
  `order_tprice` float(111,2) NOT NULL,
  `order_status` varchar(111) NOT NULL,
  `order_ddate` varchar(111) NOT NULL,
  `order_date` varchar(111) NOT NULL,
  `order_time` varchar(111) NOT NULL,
  `order_date_out` varchar(111) NOT NULL,
  `order_user_id` int(111) NOT NULL,
  `user_or` varchar(111) NOT NULL,
  `order_place` varchar(111) NOT NULL,
  `takeout_id` int(111) NOT NULL,
  `order_served` varchar(111) NOT NULL,
  `notice` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_image`, `order_name_id`, `order_name`, `order_cashier`, `order_table`, `order_username`, `order_user`, `order_qty`, `order_price`, `order_tprice`, `order_status`, `order_ddate`, `order_date`, `order_time`, `order_date_out`, `order_user_id`, `user_or`, `order_place`, `takeout_id`, `order_served`, `notice`) VALUES
(1, './images/sweet-n-sour.png', 1, 'Fish Fillet Rice Bowl', 'Nel John', '4', 'neljohn', 'neljohnmapagmahal@gmail.com', 1, 197.00, 197.00, 'Paid', '21-03', '21-03-14', '10:47am', '10:48am', 6, 'OR490191', 'place', 0, 'off', 'notice');

-- --------------------------------------------------------

--
-- Table structure for table `ptb`
--

CREATE TABLE `ptb` (
  `id` int(111) NOT NULL,
  `pname` varchar(111) NOT NULL,
  `pqty` int(111) NOT NULL,
  `pprice` float(6,2) NOT NULL,
  `pimage` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ptb`
--

INSERT INTO `ptb` (`id`, `pname`, `pqty`, `pprice`, `pimage`) VALUES
(1, 'Fish Fillet Rice Bowl', 49, 197.00, './images/sweet-n-sour.png'),
(2, 'Tofu Rice Bowl', 50, 197.00, './images/tofu.png'),
(3, 'Shanghai Rice Bowl', 50, 175.00, './images/shanghai.png'),
(4, 'Chicken Sisig Rice Bowl', 50, 197.00, './images/chicken-sisig.png'),
(5, 'Platter Meal', 50, 351.00, './images/platter-meal.png'),
(6, 'Fiesta Plate Meal', 50, 351.00, './images/fiesta.png'),
(7, 'Super Solo Meal', 50, 395.00, './images/super-solo-meal.jpg'),
(8, 'Best Plate', 50, 395.00, './images/best-plate.png'),
(9, 'Basic Meal', 50, 230.00, './images/basic-meal.png'),
(10, 'Bilao 1', 50, 1429.00, './images/bilao-trio-1.jpg'),
(11, 'Bilao 2', 50, 1539.00, './images/bilao-trio-2.jpg'),
(12, 'All-In-One Bundle 1', 50, 1053.00, './images/bundle-1.png'),
(13, 'All-In-One Bundle 2', 50, 1151.00, './images/bundle-2.png'),
(14, 'All-In-One Bundle 3', 50, 1063.00, './images/bundle-3.png'),
(15, 'All-In-One Bundle 4', 50, 1230.00, './images/bundle-4.jpg'),
(16, 'All-In-One Bundle 5', 50, 1270.00, './images/bundle-5.jpg'),
(17, 'All-In-One Bundle 6', 50, 1260.00, './images/bundle-6.jpg'),
(18, 'All-In-One Bundle 7', 50, 2199.00, './images/bundle-7.jpg'),
(19, 'Halo Halo', 50, 175.00, './images/Halo Halo.png'),
(20, 'Leche Flan', 50, 137.00, './images/Leche Flan.png'),
(21, 'Bottled Water', 50, 25.00, './images/water.png'),
(22, 'Softdrinks', 50, 98.00, './images/pepsi.png'),
(23, 'Diet Softdrinks', 50, 98.00, './images/diet.jpg'),
(24, '1.5 Litre Softdrinks', 50, 109.00, './images/litre.jpg'),
(25, '1.5 Litre Diet Softdrinks', 50, 109.00, './images/litre-diet.jpg'),
(26, 'Orange Juice', 50, 39.00, './images/orange.jpg'),
(27, 'Mango Juice', 50, 39.00, './images/mango.jpg'),
(29, 'Red Wine', 50, 560.00, './images/Red Wine.jpg'),
(30, 'White Wine', 50, 678.00, './images/White WIne.jpg'),
(31, 'Rum', 50, 567.00, './images/Rum.jpg'),
(32, 'Vodka', 50, 740.00, './images/Vodka.jpg'),
(33, 'Whiskey', 50, 657.00, './images/Whiskey.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` int(111) NOT NULL,
  `table_name` varchar(111) NOT NULL,
  `table_image` varchar(111) NOT NULL,
  `table_status` int(111) NOT NULL,
  `table_email` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `table_name`, `table_image`, `table_status`, `table_email`) VALUES
(1, 'C1', '', 0, 0),
(2, 'C2', '', 0, 0),
(3, 'C3', '', 0, 0),
(4, 'F2', '', 0, 0),
(5, 'F1', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `take_out_number`
--

CREATE TABLE `take_out_number` (
  `take_out_number_id` int(111) NOT NULL,
  `take_out_number_userid` int(111) NOT NULL,
  `take_out_number_name` varchar(111) NOT NULL,
  `take_out_number_email` varchar(111) NOT NULL,
  `take_out_payment` varchar(111) NOT NULL,
  `take_out_amount` float(111,2) NOT NULL,
  `take_out_bill` float(111,2) NOT NULL,
  `take_out_change` float(111,2) NOT NULL,
  `take_out_discount` varchar(111) NOT NULL,
  `take_out_age` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_marks`
--

CREATE TABLE `tbl_marks` (
  `student_id` int(10) UNSIGNED NOT NULL,
  `student_name` varchar(35) NOT NULL,
  `marks` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_marks`
--

INSERT INTO `tbl_marks` (`student_id`, `student_name`, `marks`) VALUES
(1, 'neljohnmapagmahal@gmail.com', 39),
(2, 'Mary ', 46),
(3, 'Maya', 65),
(4, 'Rahul', 90),
(5, 'Priya', 75);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(111) NOT NULL,
  `user_firstname` varchar(111) NOT NULL,
  `user_email` varchar(111) NOT NULL,
  `user_password` varchar(111) NOT NULL,
  `user_age` int(11) NOT NULL,
  `user_block` varchar(111) NOT NULL,
  `user_guest` varchar(111) NOT NULL,
  `user_points` float(111,2) NOT NULL,
  `user_approve` float(111,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_firstname`, `user_email`, `user_password`, `user_age`, `user_block`, `user_guest`, `user_points`, `user_approve`) VALUES
(1, 'user', 'cg288695@gmail.com', '123', 22, 'block', '', 62.46, 0.00),
(3, 'hehe', 'benson@yahoo.com', '123', 15, 'block', '', 0.00, 0.00),
(6, 'neljohn', 'neljohnmapagmahal@gmail.com', 'Stigma45', 22, 'Not Blocked', '', 100.97, 0.00),
(8, 'Roi', 'notnotyyhn@gmail.com', 'Thr33t0w3rs!', 22, 'Not Blocked', '', 0.00, 0.00),
(11, 'Shantal', 'shantal.cui@gmail.com', 'Abc12345', 22, 'Not Blocked', '', 1.58, 0.00),
(12, 'Neil', 'neilgabrenz@gmail.com', 'Neilrenz123', 60, 'Not Blocked', '', 0.00, 0.00),
(13, 'Rosie Gabriel', 'gabrielrosy24@gmail.com', 'Rose1rose', 60, 'Not Blocked', '', 0.00, 0.00),
(14, 'noslem', 'flagentriregistrar@gmail.com', 'Son61729714', 22, 'Not Blocked', '', 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `user_feedback`
--

CREATE TABLE `user_feedback` (
  `user_id` int(111) NOT NULL,
  `user_name` varchar(111) NOT NULL,
  `user_feedback` longtext NOT NULL,
  `user_date` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_feedback`
--

INSERT INTO `user_feedback` (`user_id`, `user_name`, `user_feedback`, `user_date`) VALUES
(1, 'Meow', 'Arf', 'February 19, 2021');

-- --------------------------------------------------------

--
-- Table structure for table `user_receipt`
--

CREATE TABLE `user_receipt` (
  `id` int(250) NOT NULL,
  `user_receipt_or` varchar(111) NOT NULL,
  `user_name` varchar(111) NOT NULL,
  `user_email` varchar(111) NOT NULL,
  `user_torder` int(111) NOT NULL,
  `user_tqty` int(111) NOT NULL,
  `user_subtotal` float(111,2) DEFAULT NULL,
  `user_tender` float(111,2) NOT NULL,
  `user_change` float(111,2) NOT NULL,
  `user_table` varchar(111) NOT NULL,
  `user_vat` float(111,2) NOT NULL,
  `user_discount` float(111,2) NOT NULL,
  `receipt_date` varchar(111) NOT NULL,
  `receipt_time` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_receipt`
--

INSERT INTO `user_receipt` (`id`, `user_receipt_or`, `user_name`, `user_email`, `user_torder`, `user_tqty`, `user_subtotal`, `user_tender`, `user_change`, `user_table`, `user_vat`, `user_discount`, `receipt_date`, `receipt_time`) VALUES
(1, 'OR490191', 'neljohn', 'neljohnmapagmahal@gmail.com', 1, 1, 157.60, 500.00, 342.40, '4', 0.00, 39.40, 'Mar 14,2021', '10:48am');

-- --------------------------------------------------------

--
-- Table structure for table `user_tables`
--

CREATE TABLE `user_tables` (
  `utable_id` int(111) NOT NULL,
  `utable_Table_no` varchar(111) NOT NULL,
  `utable_Username` varchar(111) NOT NULL,
  `utable_Status` varchar(111) NOT NULL,
  `utable_Date_time` varchar(111) NOT NULL,
  `utable_Date_time_out` varchar(111) NOT NULL,
  `utable_user_id` int(111) NOT NULL,
  `utable_dd` varchar(111) NOT NULL,
  `user_payment` varchar(111) NOT NULL,
  `user_change` float(111,2) NOT NULL,
  `user_amount` float(111,2) NOT NULL,
  `p1` int(111) NOT NULL,
  `utable_change` float(111,2) NOT NULL,
  `user_verify` varchar(111) NOT NULL,
  `off` int(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tables`
--

INSERT INTO `user_tables` (`utable_id`, `utable_Table_no`, `utable_Username`, `utable_Status`, `utable_Date_time`, `utable_Date_time_out`, `utable_user_id`, `utable_dd`, `user_payment`, `user_change`, `user_amount`, `p1`, `utable_change`, `user_verify`, `off`) VALUES
(1, '4', 'neljohn', 'Available', '21-03-14 / 10:46am', '21-03-14 / 10:48am', 6, '21-03-14', 'Cash', 342.40, 500.00, 3, 157.60, 'Discounted', 2);

-- --------------------------------------------------------

--
-- Table structure for table `weekly`
--

CREATE TABLE `weekly` (
  `weekly_id` int(111) NOT NULL,
  `weekly_weekn` varchar(111) NOT NULL,
  `weekly_week` varchar(111) NOT NULL,
  `weekly_tnorder` int(111) NOT NULL,
  `weekly_discount` float(111,2) NOT NULL,
  `weekly_vat` float(111,2) NOT NULL,
  `weekly_sale` float(111,2) NOT NULL,
  `weekly_gross_sale` float(111,2) NOT NULL,
  `month` varchar(111) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `daily`
--
ALTER TABLE `daily`
  ADD PRIMARY KEY (`daily_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `monthly`
--
ALTER TABLE `monthly`
  ADD PRIMARY KEY (`monthly_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `ptb`
--
ALTER TABLE `ptb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `take_out_number`
--
ALTER TABLE `take_out_number`
  ADD PRIMARY KEY (`take_out_number_id`);

--
-- Indexes for table `tbl_marks`
--
ALTER TABLE `tbl_marks`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_feedback`
--
ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_receipt`
--
ALTER TABLE `user_receipt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tables`
--
ALTER TABLE `user_tables`
  ADD PRIMARY KEY (`utable_id`);

--
-- Indexes for table `weekly`
--
ALTER TABLE `weekly`
  ADD PRIMARY KEY (`weekly_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `daily`
--
ALTER TABLE `daily`
  MODIFY `daily_id` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `monthly`
--
ALTER TABLE `monthly`
  MODIFY `monthly_id` int(111) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ptb`
--
ALTER TABLE `ptb`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `take_out_number`
--
ALTER TABLE `take_out_number`
  MODIFY `take_out_number_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_marks`
--
ALTER TABLE `tbl_marks`
  MODIFY `student_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=193;

--
-- AUTO_INCREMENT for table `user_feedback`
--
ALTER TABLE `user_feedback`
  MODIFY `user_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_receipt`
--
ALTER TABLE `user_receipt`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_tables`
--
ALTER TABLE `user_tables`
  MODIFY `utable_id` int(111) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `weekly`
--
ALTER TABLE `weekly`
  MODIFY `weekly_id` int(111) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
