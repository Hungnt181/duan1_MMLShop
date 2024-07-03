-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2024 at 04:19 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mml_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `acc_id` int NOT NULL,
  `acc_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `acc_password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `acc_email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `acc_phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `acc_image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `acc_status` tinyint NOT NULL DEFAULT '1' COMMENT '1: Hoạt động\r\n0: Không hoạt động',
  `acc_role` tinyint NOT NULL DEFAULT '0' COMMENT '0: Client\r\n1: Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`acc_id`, `acc_name`, `acc_password`, `acc_email`, `acc_phone`, `acc_image`, `acc_status`, `acc_role`) VALUES
(1, 'ngothehung', '123456', 'hungnt@gmail.com', '0987654321', '', 1, 1),
(2, 'nguyenthuydung', '123456', 'dungnt@gmail.com', '0345678912', '', 1, 1),
(3, 'dungclient', '111111', 'thuydng2004@gmail.com', '0378296292', '', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` int NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `date_order` datetime NOT NULL,
  `bill_total` decimal(10,3) NOT NULL,
  `acc_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`bill_id`, `fullname`, `phone`, `address`, `date_order`, `bill_total`, `acc_id`) VALUES
(1, 'Nguyễn Thùy Dung', '0378296292', 'Hạ Long, Quảng Ninh', '2024-07-03 15:58:31', '499.000', 3);

-- --------------------------------------------------------

--
-- Table structure for table `bill_detail`
--

CREATE TABLE `bill_detail` (
  `bill_dt_id` int NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,3) NOT NULL,
  `quantity` int NOT NULL,
  `total` decimal(10,3) NOT NULL,
  `bill_id` int NOT NULL,
  `pro_dt_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill_detail`
--

INSERT INTO `bill_detail` (`bill_dt_id`, `pro_name`, `price`, `quantity`, `total`, `bill_id`, `pro_dt_id`) VALUES
(1, 'Tủ đầu giường', '499.000', 1, '499.000', 1, 19);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cate_id` int NOT NULL,
  `cate_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cate_status` tinyint NOT NULL DEFAULT '1' COMMENT '1: Tồn tại\r\n0: Không tồn tại'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cate_id`, `cate_name`, `cate_status`) VALUES
(1, 'Đồ chơi', 1),
(2, 'Chiếu sáng', 1),
(3, 'Phụ kiện', 1),
(4, 'Đồng hồ', 1),
(5, 'Nội thất', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `com_id` int NOT NULL,
  `com_content` text COLLATE utf8mb4_general_ci NOT NULL,
  `com_date` datetime NOT NULL,
  `account_id` int NOT NULL,
  `pro_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `com_content`, `com_date`, `account_id`, `pro_id`) VALUES
(1, '10 điểm không có nhưng', '2024-07-03 16:05:04', 3, 14);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int NOT NULL,
  `news_title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `news_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `news_content` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_img`, `news_content`) VALUES
(1, 'Thi công nội thất căn hộ Midtown M7 Phú Mỹ Hưng 115m2', 'news1.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sapien dignissim a elementum. Sociis metus, hendrerit mauris id in. Quis sit sit ultrices tincidunt euismod luctus diam. Turpis sodales orci etiam phasellus lacus id leo. Amet turpis nunc, nulla massa est viverra interdum'),
(2, 'Thi công nội thất nhà phố D7 An Thiên Lý Thủ Đức', 'news2.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sapien dignissim a elementum. Sociis metus, hendrerit mauris id in. Quis sit sit ultrices tincidunt euismod luctus diam. Turpis sodales orci etiam phasellus lacus id leo. Amet turpis nunc, nulla massa est viverra interdum'),
(3, 'Thi công nội thất nhà phố KDC Bến Lức quận 8', 'news3.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sapien dignissim a elementum. Sociis metus, hendrerit mauris id in. Quis sit sit ultrices tincidunt euismod luctus diam. Turpis sodales orci etiam phasellus lacus id leo. Amet turpis nunc, nulla massa est viverra interdum'),
(4, 'Cách Tạo Không Gian Nội Thất Đẹp Theo Phong Cách Indochine', 'news4.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sapien dignissim a elementum. Sociis metus, hendrerit mauris id in. Quis sit sit ultrices tincidunt euismod luctus diam. Turpis sodales orci etiam phasellus lacus id leo. Amet turpis nunc, nulla massa est viverra interdum'),
(5, '19 gam màu hứa hẹn dẫn đầu xu hướng trang trí nội thất 2022', 'news5.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sapien dignissim a elementum. Sociis metus, hendrerit mauris id in. Quis sit sit ultrices tincidunt euismod luctus diam. Turpis sodales orci etiam phasellus lacus id leo. Amet turpis nunc, nulla massa est viverra interdum'),
(6, 'Thi công nội thất căn hộ Vinhomes Grand Park Q9 Block S202', 'news6.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sapien dignissim a elementum. Sociis metus, hendrerit mauris id in. Quis sit sit ultrices tincidunt euismod luctus diam. Turpis sodales orci etiam phasellus lacus id leo. Amet turpis nunc, nulla massa est viverra interdum'),
(7, 'Thi công nội thất biệt thự Vinhomes Tân Cảng Bình Thạnh', 'news7.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sapien dignissim a elementum. Sociis metus, hendrerit mauris id in. Quis sit sit ultrices tincidunt euismod luctus diam. Turpis sodales orci etiam phasellus lacus id leo. Amet turpis nunc, nulla massa est viverra interdum'),
(8, 'Thi công nội thất văn phòng Central Premium Tháp B - 40m2', 'news8.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet sapien dignissim a elementum. Sociis metus, hendrerit mauris id in. Quis sit sit ultrices tincidunt euismod luctus diam. Turpis sodales orci etiam phasellus lacus id leo. Amet turpis nunc, nulla massa est viverra interdum');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` int NOT NULL,
  `pro_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pro_image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pro_description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `cate_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_name`, `pro_image`, `pro_description`, `cate_id`) VALUES
(1, 'Bình hoa nhỏ', 'binh-hoa-nho.jpg', 'Bình hoa nhỏ trang trí bàn.', 3),
(2, 'Ghế gỗ', 'ghe-go.jpg', 'Ghế gỗ - Nội thất trang trí cho nhà ở.', 5),
(3, 'Gấu bông', 'gau-bong.png', 'Gấu bông - Trang trí nhà ở. Đồ decor basic. Đồ chơi cho trẻ.', 1),
(4, 'Đồng hồ gỗ', 'dong-ho-go.png', 'Đồng hồ gỗ treo tường, trang trí nhà ở. Nội thất nhà ở đơn giản, cổ điển.', 4),
(5, 'Đồng hồ tròn đơn giản', 'dong-ho-tron-don-gian.jpg', 'Đồng hồ tròn đơn giản, hiện đại treo tường trang trí cho nhà ở.', 4),
(6, 'Đồng hồ treo tường bằng gỗ', 'dong-ho-treo-tuong-bang-go.jpg', 'Đồng hồ treo tường bằng gỗ đơn giản, hiện đại phù hợp với mọi phong cách nội thất.', 4),
(7, 'Đèn ngủ', 'den-ngu.jpg', 'Đèn ngủ cổ điển, sang trọng.', 2),
(8, 'Đèn sân vườn', 'den-san-vuon.jpg', 'Đèn sân vườn - Nội thất hiện đại cho sân vườn của bạn.', 2),
(9, 'Đèn neon', 'den-neon.jpg', 'Đèn neon đơn giản, hiện đại, sang trọng. Phù hợp cho cả nội thất và ngoại thất.', 2),
(10, 'Bình thủy tinh', 'binh-thuy-tinh.jpg', 'Bình thủy tinh trang trí phòng khách, phòng ngủ đơn giản, hiện đại.', 3),
(11, 'Đèn treo', 'den-treo.jpg', 'Đèn treo nhỏ cho phòng bếp hiện đại, ấm cúng.', 2),
(12, 'Bình đựng nước', 'binh-dung-nuoc.jpg', 'Bình đựng nước cổ điển, trang trí bàn ăn, phòng khách ', 3),
(13, 'Bàn cafe', 'ban-cafe.jpg', 'Bàn cafe bằng gỗ, thân thiện với môi trường, phù hợp cho trang trí nhà ở đơn giản, hiện đại', 5),
(14, 'Tủ đầu giường', 'tu-dau-giuong.jpg', 'Tủ đầu giường phong cách cổ điển, đơn giản. Chất liệu gỗ thân thiện môi trường. Gỗ thơm dễ ngủ và điều hòa khí huyết.', 5),
(15, 'Bình giữ nhiệt cà phê', 'binh-giu-nhiet-ca-phe.jpg', 'Bình giữ nhiệt cà phê thiết kế đơn giản dễ mang theo.', 3),
(16, 'Đĩa xanh', 'dia-xanh.jpg', 'Đĩa xanh thiết kế đơn giản, sang trọng phù hợp cho nội thất phòng bếp. ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `product_dt_id` int NOT NULL,
  `pro_color` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pro_size` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `pro_price` decimal(10,3) NOT NULL,
  `pro_quantity` int NOT NULL,
  `pro_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`product_dt_id`, `pro_color`, `pro_size`, `pro_price`, `pro_quantity`, `pro_id`) VALUES
(1, 'Màu đỏ', '16x16cm', '99.000', 13, 1),
(2, 'Màu đỏ', '14x14cm', '89.000', 11, 1),
(3, 'Màu đỏ', '12x12cm', '79.000', 12, 1),
(4, 'Màu trắng', '16x16cm', '99.000', 25, 1),
(5, 'Màu trắng', '14x14cm', '89.000', 21, 1),
(6, 'Màu trắng', '12x12cm', '79.000', 19, 1),
(7, 'Trắng', '1m', '199.000', 22, 2),
(8, 'Hồng nude', '10x30cm', '86.000', 12, 3),
(9, 'Vàng trắng', 'R20cm', '159.000', 30, 4),
(10, 'Đỏ', 'R15cm', '99.000', 20, 5),
(11, 'Nâu gỗ', 'R20cm', '175.000', 32, 6),
(12, 'Trắng', 'R20cmxH30cm', '199.000', 30, 7),
(13, 'Xanh ghi', '12x12cm', '167.000', 50, 8),
(14, 'Xanh bơ', '5x50cm', '79.000', 45, 9),
(15, 'Trắng sứ', 'R10xR15cm', '88.000', 16, 10),
(16, 'Xám ghi', 'R8cm', '66.000', 45, 11),
(17, 'Đen sứ', '1L', '78.000', 20, 12),
(18, 'Nâu gỗ', 'R30xH50cm', '399.000', 25, 13),
(19, 'Vàng gỗ', '30x20x50cm', '499.000', 30, 14),
(20, 'Đen', '500ml', '59.000', 20, 15),
(21, 'Xanh cổ vịt', 'R10cm', '69.000', 55, 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`acc_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `fk_bill_acc` (`acc_id`);

--
-- Indexes for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`bill_dt_id`),
  ADD KEY `fk_billdetail_bill` (`bill_id`),
  ADD KEY `fk_billdetail_prodetail` (`pro_dt_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cate_id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`com_id`),
  ADD KEY `fk_cmt_acc` (`account_id`),
  ADD KEY `fk_cmt_pro` (`pro_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `fk_pro_cate` (`cate_id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`product_dt_id`),
  ADD KEY `fk_prodetail_pro` (`pro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `acc_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `bill_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `bill_dt_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cate_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `com_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pro_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `product_dt_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `fk_bill_acc` FOREIGN KEY (`acc_id`) REFERENCES `account` (`acc_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD CONSTRAINT `fk_billdetail_bill` FOREIGN KEY (`bill_id`) REFERENCES `bill` (`bill_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_billdetail_prodetail` FOREIGN KEY (`pro_dt_id`) REFERENCES `product_detail` (`product_dt_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_cmt_acc` FOREIGN KEY (`account_id`) REFERENCES `account` (`acc_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_cmt_pro` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_pro_cate` FOREIGN KEY (`cate_id`) REFERENCES `category` (`cate_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `fk_prodetail_pro` FOREIGN KEY (`pro_id`) REFERENCES `product` (`pro_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
