-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2022 at 08:34 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thecarts`
--

-- --------------------------------------------------------

--
-- Table structure for table `cashout`
--

CREATE TABLE `cashout` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `pic` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cashout`
--

INSERT INTO `cashout` (`id`, `order_id`, `status_id`, `pic`, `date`) VALUES
(1, 1, 1, '1. Process ขึ้นทะเบียนสินค้าใหม่.jpg', '2021-11-11 03:30:23'),
(2, 2, 1, '1. Process ขึ้นทะเบียนสินค้าใหม่.jpg', '2021-12-07 02:23:00'),
(3, 3, 1, 'forest_by_aizekartworks_dev906s-fullview.jpg', '2021-12-07 02:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catId` int(11) NOT NULL,
  `catName` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `catPic` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catId`, `catName`, `catPic`) VALUES
(1, 'Nike', '5_dicut-1.png'),
(2, 'Adidas', 'N4B-SD-AS-M-600.jpg'),
(3, 'FILA', 'S__17899525.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `linetoken`
--

CREATE TABLE `linetoken` (
  `id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_token` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `linetoken`
--

INSERT INTO `linetoken` (`id`, `token`, `date_token`) VALUES
(1, 'pafntcF5D8ZSuPqGPwMwcd6UFJNJyLDNxgOBvcKr0CJ', '2020-11-27 11:00:56');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `cust_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status_id` int(2) NOT NULL,
  `report_id` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `cust_id`, `status_id`, `report_id`) VALUES
(1, '2021-11-11 10:28:58', '4', 1, '2111-11-0000'),
(2, '2021-11-20 08:59:50', '11', 1, '2111-20-0001'),
(3, '2021-12-07 09:47:14', '11', 1, '2112-07-0002'),
(4, '2021-12-20 14:31:02', '11', 0, '2112-20-0003'),
(5, '2022-01-10 10:43:57', '4', 0, '2201-10-0004');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_detail_quantity` tinyint(4) NOT NULL,
  `order_detail_price` decimal(10,2) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `status_process_id` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_detail_quantity`, `order_detail_price`, `product_id`, `order_id`, `status_process_id`) VALUES
(1, 2, '1490.00', 2, 1, 0),
(2, 1, '199.00', 3, 1, 0),
(3, 1, '1490.00', 4, 1, 0),
(4, 1, '250.00', 1, 2, 0),
(5, 1, '1490.00', 2, 2, 0),
(6, 1, '1490.00', 2, 3, 0),
(7, 1, '199.00', 3, 3, 0),
(8, 1, '250.00', 1, 4, 0),
(9, 1, '1490.00', 4, 4, 0),
(10, 1, '1490.00', 2, 5, 0),
(11, 1, '199.00', 3, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productdata`
--

CREATE TABLE `productdata` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `pdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_code` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `product_desc` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `product_img_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `qty` int(255) NOT NULL,
  `catId` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dateadd` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `product_name`, `product_desc`, `product_img_name`, `product_price`, `qty`, `catId`, `dateadd`, `status_id`) VALUES
(1, 'P00001', ' Adidas รองเท้า adidas Ultraboost DNA x LEGO®', 'รายละเอียดสินค้ารายการที่ 1', 'adidas.jpg', '25000.00', 48, '2', '2022-01-22 04:11:25', 0),
(2, 'P000023', ' Fila - Womens Disruptor 2', 'รายละเอียดสินค้ารายการที่ 2', 'adasdasdasdadsasdasdasdfafaccx.jpg', '1490.00', 45, '3', '2022-01-22 04:10:57', 0),
(3, 'P00003', 'Fila ray tracer blue', 'รายละเอียดสินค้ารายการที่ 3', '208598_Main_Thumb_0568836.jpg', '1990.00', 47, '3', '2022-01-22 04:10:43', 0),
(4, 'P00004', ' Adidas รองเท้า adidas 4DFWD Pulse', 'รายละเอียดสินค้ารายการที่ 4', 'adidas_4DFWD_Pulse_Q46451_01_standard.jpg', '1490.00', 48, '2', '2022-01-22 04:07:29', 0),
(5, 'P00005', 'Nike Air Max 270 Mens Casual Shoes', 'รายละเอียดสินค้ารายการที่ 5', 'Rebel_59103601_blackwhite_hi-res.jpg', '1909.00', 50, '1', '2022-01-22 04:02:20', 0),
(6, 'P00006', 'สินค้า #6', 'รายละเอียดสินค้ารายการที่ 6', 'S__8503373.jpg', '1490.00', 50, '1', '2021-12-20 07:26:39', 2),
(7, 'P00007', 'สินค้า #7', 'รายละเอียดสินค้ารายการที่ 7', 'ดาวล้อมเดือน.jpg', '199.00', 50, '2', '2021-12-20 07:26:41', 2),
(8, 'P00008', 'Nike Comics', 'รายละเอียดสินค้ารายการที่ 8', 'images.jpg', '1490.00', 50, '1', '2022-01-22 04:04:06', 0),
(9, 'P000009', 'Air 270 nike mujer', 'รายละเอียดสินค้ารายการที่ 9', 'air-max-2021-shoes-gv0Z2s.jpg', '50.00', 50, '1', '2022-01-22 04:05:00', 0),
(10, 'P00010', ' Adidas รองเท้า Forum Mid', 'รายละเอียดสินค้ารายการที่ 10', 'Forum_Mid_FY4976_01_standard.jpg', '79.00', 0, '2', '2022-01-22 04:06:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `status_cash`
--

CREATE TABLE `status_cash` (
  `status_id` int(11) NOT NULL,
  `status_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_cash`
--

INSERT INTO `status_cash` (`status_id`, `status_name`, `color`) VALUES
(0, 'ยังไม่ได้ชำระ', '#FF4242'),
(1, 'ชำระเงินแล้ว', '#6AFF42');

-- --------------------------------------------------------

--
-- Table structure for table `status_process`
--

CREATE TABLE `status_process` (
  `status_process_id` int(11) NOT NULL,
  `status_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `color` varchar(8) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `status_process`
--

INSERT INTO `status_process` (`status_process_id`, `status_name`, `color`) VALUES
(1, 'กำลังดำเนินการ', '#FFCC66'),
(2, 'ดำเนินการเสร็จสิ้น', '#FF6666');

-- --------------------------------------------------------

--
-- Table structure for table `tblusers`
--

CREATE TABLE `tblusers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `useremail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `custaddr` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usertel` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `regdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `role_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblusers`
--

INSERT INTO `tblusers` (`id`, `fullname`, `username`, `useremail`, `custaddr`, `usertel`, `password`, `regdate`, `role_id`) VALUES
(4, 'admin', 'admin', 'admin@akara.co.th', '17/3 ม.2 ต.สวนหย่อม อ.กระสัง จ.ศรีสระเกตุ', '0865058123', 'e10adc3949ba59abbe56e057f20f883e', '2022-03-19 07:33:52', 1),
(11, 'test', 'test', 'natee@gmail.com', '17/3 ม.2 ต.สวนหย่อม อ.กระสัง จ.ศรีสระเกตุ', '0865058123', 'e10adc3949ba59abbe56e057f20f883e', '2022-03-19 07:33:49', 0),
(19, 'testadd', 'testadd', 'testadd@gmail.com', '17/3 ม.2 ต.สวนหย่อม อ.กระสัง จ.ศรีสระเกตุ', '0865058123', 'e10adc3949ba59abbe56e057f20f883e', '2022-03-19 07:33:51', 0),
(22, 'asdfasdf', 'asdfasdf', 'asdfasdf@gmail.com', 'จ.สระแก้ว อ.เมือง ต.ชัยโย 14560 0975214513', '0865058123', 'e10adc3949ba59abbe56e057f20f883e', '2022-03-19 07:33:48', 0),
(26, 'กุลธิดา จิตน้อม 2', 'admin123', 'npolpoy2539@gmail.com', '123456', '0865058123', 'e10adc3949ba59abbe56e057f20f883e', '2022-03-19 07:33:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `trackorder`
--

CREATE TABLE `trackorder` (
  `trackid` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `shipping` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tracknumber` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datestart` date NOT NULL,
  `dateend` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `trackorder`
--

INSERT INTO `trackorder` (`trackid`, `order_id`, `shipping`, `tracknumber`, `datestart`, `dateend`) VALUES
(1, 1, 'Flash Express', 'TH0021597843D21', '2021-12-07', '2021-12-08'),
(2, 2, 'Flash Express', 'TH0021597843D22', '2021-12-08', '2021-12-09'),
(3, 3, 'J&T Express', 'TH0021597843D23', '2021-12-07', '2021-12-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cashout`
--
ALTER TABLE `cashout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `linetoken`
--
ALTER TABLE `linetoken`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productdata`
--
ALTER TABLE `productdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_cash`
--
ALTER TABLE `status_cash`
  ADD PRIMARY KEY (`status_id`);

--
-- Indexes for table `status_process`
--
ALTER TABLE `status_process`
  ADD PRIMARY KEY (`status_process_id`);

--
-- Indexes for table `tblusers`
--
ALTER TABLE `tblusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trackorder`
--
ALTER TABLE `trackorder`
  ADD PRIMARY KEY (`trackid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cashout`
--
ALTER TABLE `cashout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `linetoken`
--
ALTER TABLE `linetoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `productdata`
--
ALTER TABLE `productdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `status_cash`
--
ALTER TABLE `status_cash`
  MODIFY `status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_process`
--
ALTER TABLE `status_process`
  MODIFY `status_process_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblusers`
--
ALTER TABLE `tblusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `trackorder`
--
ALTER TABLE `trackorder`
  MODIFY `trackid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
