-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2019 at 03:40 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookingtour`
--

CREATE TABLE `bookingtour` (
  `id` int(11) NOT NULL,
  `idtour` int(11) DEFAULT NULL,
  `username` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adult` int(11) DEFAULT NULL,
  `child` int(11) DEFAULT NULL,
  `address` mediumtext COLLATE utf8mb4_unicode_ci,
  `note` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookingtour`
--

INSERT INTO `bookingtour` (`id`, `idtour`, `username`, `tel`, `email`, `adult`, `child`, `address`, `note`) VALUES
(1, NULL, 'Trần Thị Thơm', '08021489395', 'tranthom161994@gmail.com', NULL, NULL, NULL, NULL),
(2, NULL, 'Trần Thị Thơm', '08021489395', 'tranthom161994@gmail.com', NULL, NULL, NULL, NULL),
(3, NULL, 'Trần Thị Thơm', '08021489395', 'tranthom161994@gmail.com', NULL, NULL, NULL, NULL),
(4, NULL, 'Trần Thị Thơm', '08021489395', 'tranthom161994@gmail.com', NULL, NULL, NULL, NULL),
(5, NULL, 'Trần Thị Thơm', '08021489395', 'tranthom161994@gmail.com', NULL, NULL, NULL, NULL),
(6, NULL, 'Trần Thị Thơm', '08021489395', 'tranthom161994@gmail.com', NULL, NULL, NULL, NULL),
(7, NULL, 'Trần Thị Thơm', '08021489395', 'tranthom161994@gmail.com', NULL, NULL, NULL, NULL),
(8, NULL, 'Trần Thị Thơm', '08021489395', 'tranthom161994@gmail.com', NULL, NULL, NULL, NULL),
(9, NULL, 'Trần Thị Thơm', '08021489395', 'tranthom161994@gmail.com', NULL, NULL, NULL, NULL),
(10, NULL, 'Trần Thị Thơm', '08021489395', 'tranthom161994@gmail.com', NULL, NULL, NULL, NULL),
(11, NULL, 'Trần Thị Thơm', '08021489395', 'tranthom161994@gmail.com', NULL, NULL, NULL, NULL),
(12, NULL, 'Trần Thị Thơm', '08021489395', 'tranthom161994@gmail.com', NULL, NULL, NULL, NULL),
(13, NULL, 'Trần Thị Thơm', '08021489395', 'tranthom161994@gmail.com', NULL, NULL, NULL, NULL),
(14, NULL, 'Trần Thị Thơm', '08021489395', 'tranthom161994@gmail.com', NULL, NULL, '山口県防府市大字台道505‐1ドミトリーブルースカイ209号室', NULL),
(15, 1, 'Trần Thị Thơm', '08021489395', 'tranthom161994@gmail.com', 2, 2, '山口県防府市大字台道505‐1ドミトリーブルースカイ209号室', '32321'),
(16, 2, 'Trần Thị Thơm', '08021489395', 'tranthom161994@gmail.com', 1, 1, '山口県防府市大字台道505‐1ドミトリーブルースカイ209号室', '232');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, '北海道'),
(2, '青森'),
(3, '岩手'),
(4, '宮城'),
(5, '秋田'),
(6, '山形'),
(7, '福島'),
(8, '茨城'),
(9, '栃木'),
(10, '群馬'),
(11, '埼玉'),
(12, '千葉'),
(13, '東京'),
(14, '神奈川'),
(15, '新潟');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `username` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` int(11) DEFAULT NULL,
  `email` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `depart`
--

CREATE TABLE `depart` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `depart`
--

INSERT INTO `depart` (`id`, `name`) VALUES
(1, 'Ha Noi'),
(2, 'Ho Chi Minh'),
(3, 'Tokyo');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prefecture` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`id`, `name`, `prefecture`, `image`, `content`) VALUES
(1, 'Phong nha ke nbang', 'Quang Nam', 'https://www.saigontourist.net/uploads/destination/TrongNuoc/Nhatrang/Vinpearl-Land_781467691.jpg', 'sdsds dsd'),
(2, '北海道', '北海道', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQh7rudsIjw8wfYdt5lBcO7RlPC-LlfyNtk2vWoutzFecUeuUMm', NULL),
(3, 'Nha Trang biển gọi', 'Khanh Hoa', 'https://static1.cafeland.vn/cafelandData/upload/tintuc/thitruong/2019/08/tuan-04/nhatrangkhanhhoa-1566637236.jpg', NULL),
(4, 'Thành phố cổ Osaka', 'Osaka', 'https://a1.cdn.japantravel.com/photo/221-163337/1440x960!/osaka-osaka-prefecture-163337.jpg', NULL),
(5, 'dddd', 'erer', NULL, NULL),
(6, 'fff', 'rer', NULL, NULL),
(7, 'ggggg', 'rer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `idtour` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tourlist`
--

CREATE TABLE `tourlist` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `is_top` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tourlist`
--

INSERT INTO `tourlist` (`id`, `city_id`, `destination_id`, `name`, `content`, `start`, `end`, `price`, `is_top`) VALUES
(1, 1, 1, 'TOUR NHẬT BẢN CUNG ĐƯỜNG VÀNG 6 NGÀY 5 Đ', 'Tour Nhật Bản cung đường Vàng 6 ngày 5 đêm là hành trình thăm quan Nhật Bản hấp dẫn HÀ NỘI – OSAKA – KOBE – KYOTO – NAGOYA – NÚI PHÚ SĨ– KAWAGUCHI – TOKYO –– HÀ NỘI', '2019-10-01', '2019-10-10', 23000, 1),
(2, 2, 2, 'Du lịch Nha Trang', 'Du lịch Nha Trang - Thành phố biển Nha Trang nổi tiếng với những cảnh quan thiên nhiên đẹp “mê hoặc” lòng người, hàng năm thu hút hàng trăm ngàn du khách cả trong và ngoài nước đến thăm quan nghỉ dưỡng. Nếu bạn đang tìm kiếm một chuyến du lịch đúng nghĩa nghỉ dưỡng thì Tour du lịch Nha Trang là sự lựa chọn tuyệt vời dành cho bạn. Đến với Thành phố biển Nha Trang bạn sẽ được thăm quan ngắm cảnh với rất nhiều những danh lam thắng cảnh nổi tiếng, được thử trải nghiệm câu tôm trên thuyền khi mặt trờ', '2019-12-12', '2019-12-16', 15000, 1),
(3, 3, 3, '北海道', '夏の北海道は、北海道新幹線開業で大賑わい！定番の函館をはじめ、世界自然遺産の知床や人気の旭山動物園など、魅力的な観光スポットが満載！ ウニや夕張メロンなど、北海道ならではの「食」もお楽しみください。', '2020-04-12', '2020-04-17', 4, 1),
(4, 4, 4, 'Osaka', '夏の北海道は、北海道新幹線開業で大賑わい！定番の函館をはじめ、世界自然遺産の知床や人気の旭山動物園など、魅力的な観光スポットが満載！ ウニや夕張メロンなど、北海道ならではの「食」もお楽しみください。', '2021-01-12', '2021-01-16', 15000, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookingtour`
--
ALTER TABLE `bookingtour`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `depart`
--
ALTER TABLE `depart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tourlist`
--
ALTER TABLE `tourlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookingtour`
--
ALTER TABLE `bookingtour`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
