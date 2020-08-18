-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 23, 2020 lúc 05:03 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlyudpm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_user` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `id_product` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `sl_mua` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_nopad_ci NOT NULL,
  `coupon_code` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_nopad_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='ghi lại thông tin khách hàng thêm vào giỏ hàng của mình';

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_user`, `id_product`, `sl_mua`, `coupon_code`) VALUES
('15', 'C02', '3', '0'),
('34', 'C02 C01', '2 1', '0'),
('35', 'C01', '8', '0');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
