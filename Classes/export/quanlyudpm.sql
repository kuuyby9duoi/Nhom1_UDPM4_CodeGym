-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 23, 2020 lúc 10:35 PM
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
  `id_user` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_product` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sl_mua` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `coupon_code` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='ghi lại thông tin khách hàng thêm vào giỏ hàng của mình';

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_user`, `id_product`, `sl_mua`, `coupon_code`) VALUES
('15', 'C02', '3', '0'),
('34', 'C02 C01', '2 1', '0'),
('35', 'C06 C02', '2 3', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `invoice`
--

CREATE TABLE `invoice` (
  `id_invoice` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sl_mua` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ship` int(11) NOT NULL,
  `coupon` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` int(15) NOT NULL,
  `name` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(13) NOT NULL,
  `email` varchar(80) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `invoice`
--

INSERT INTO `invoice` (`id_invoice`, `id_user`, `id_product`, `sl_mua`, `ship`, `coupon`, `total`, `name`, `phone`, `email`, `address`, `note`, `status`) VALUES
(11, 35, 'C02 C03', '2 4', 30000, '0', 360000, '', 0, '', '', '', 'Chờ phê duyệt'),
(96, 35, 'C03', '8', 30000, '0', 1600000, 'Trịnh Sỹ Dự', 369918375, 'admin@trinhsydu.com', '04 goc de hai bai trung hanoi', 'mã vận đơn của quáy khách là: du2000', 'Đang vận chuyển');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quequan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hobby` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path_avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `name`, `gender`, `address`, `quequan`, `phone`, `email`, `hobby`, `admin`, `password`, `path_avatar`) VALUES
(1, 'vũ lê nguyên', 'Nam', '21', 'Tỉnh Bắc Kạn', 121, '121@a.s', 'Cà khịa', 'false', '12345', ''),
(2, 'vũ lê nguyên', 'Nam', '21', 'Tỉnh Bắc Kạn', 121, '121@a.s', 'Cà khịa', 'true', '12345', ''),
(3, 'vũ lê nguyên', 'Nam', '21', 'Tỉnh Bắc Kạn', 121, '121@a.s', 'Cà khịa', 'false', '12345', ''),
(15, 'Nguyễn Đức Anh', 'Nam', 'Đông', 'Tỉnh Bắc Kạn', 2147483647, 'du_trinhsy@yahoo.com', 'Cà khịa', 'true', '123456', 'upload/FB_IMG_1548676686648.jpg'),
(34, 'a4', 'Nam', 'Tỉnh Bắc Kạn', '', 2147483647, 'kuuyby9duoi@mail.ru', 'Cà khịa', 'false', '12345', 'upload/defaut.jpg'),
(35, 'Trịnh Sỹ Dự', 'Nam', 'Alley 99, Goc De Lane, Hoang Mai District, Hanoi', 'Thành phố Hà Nội', 369918375, 'admin@trinhsydu.com', 'Thích nhiều thứ nhưng đôi lúc dell cần', 'true', '12345', 'upload/86459918_676510169839502_6027643552308133888_n.jpg'),
(36, '1', 'Nam', 'Tỉnh Bắc Ninh', '', 32154156, '1@a.a', 'Cà khịa', 'false', '12345', 'upload/defaut.jpg'),
(37, 'hehe', 'Nữ', 'Tỉnh Hà Giang', '', 369918375, 'bibi@hehe.club.com', 'Cà khịa', 'false', '12345', 'upload/defaut.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quequan`
--

CREATE TABLE `quequan` (
  `id` varchar(5) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `type` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Đang đổ dữ liệu cho bảng `quequan`
--

INSERT INTO `quequan` (`id`, `address`, `type`) VALUES
('01', 'Thành phố Hà Nội', 'Thành phố Trung ương'),
('02', 'Tỉnh Hà Giang', 'Tỉnh'),
('04', 'Tỉnh Cao Bằng', 'Tỉnh'),
('06', 'Tỉnh Bắc Kạn', 'Tỉnh'),
('08', 'Tỉnh Tuyên Quang', 'Tỉnh'),
('10', 'Tỉnh Lào Cai', 'Tỉnh'),
('11', 'Tỉnh Điện Biên', 'Tỉnh'),
('12', 'Tỉnh Lai Châu', 'Tỉnh'),
('14', 'Tỉnh Sơn La', 'Tỉnh'),
('15', 'Tỉnh Yên Bái', 'Tỉnh'),
('17', 'Tỉnh Hoà Bình', 'Tỉnh'),
('19', 'Tỉnh Thái Nguyên', 'Tỉnh'),
('20', 'Tỉnh Lạng Sơn', 'Tỉnh'),
('22', 'Tỉnh Quảng Ninh', 'Tỉnh'),
('24', 'Tỉnh Bắc Giang', 'Tỉnh'),
('25', 'Tỉnh Phú Thọ', 'Tỉnh'),
('26', 'Tỉnh Vĩnh Phúc', 'Tỉnh'),
('27', 'Tỉnh Bắc Ninh', 'Tỉnh'),
('30', 'Tỉnh Hải Dương', 'Tỉnh'),
('31', 'Thành phố Hải Phòng', 'Thành phố Trung ương'),
('33', 'Tỉnh Hưng Yên', 'Tỉnh'),
('34', 'Tỉnh Thái Bình', 'Tỉnh'),
('35', 'Tỉnh Hà Nam', 'Tỉnh'),
('36', 'Tỉnh Nam Định', 'Tỉnh'),
('37', 'Tỉnh Ninh Bình', 'Tỉnh'),
('38', 'Tỉnh Thanh Hóa', 'Tỉnh'),
('40', 'Tỉnh Nghệ An', 'Tỉnh'),
('42', 'Tỉnh Hà Tĩnh', 'Tỉnh'),
('44', 'Tỉnh Quảng Bình', 'Tỉnh'),
('45', 'Tỉnh Quảng Trị', 'Tỉnh'),
('46', 'Tỉnh Thừa Thiên Huế', 'Tỉnh'),
('48', 'Thành phố Đà Nẵng', 'Thành phố Trung ương'),
('49', 'Tỉnh Quảng Nam', 'Tỉnh'),
('51', 'Tỉnh Quảng Ngãi', 'Tỉnh'),
('52', 'Tỉnh Bình Định', 'Tỉnh'),
('54', 'Tỉnh Phú Yên', 'Tỉnh'),
('56', 'Tỉnh Khánh Hòa', 'Tỉnh'),
('58', 'Tỉnh Ninh Thuận', 'Tỉnh'),
('60', 'Tỉnh Bình Thuận', 'Tỉnh'),
('62', 'Tỉnh Kon Tum', 'Tỉnh'),
('64', 'Tỉnh Gia Lai', 'Tỉnh'),
('66', 'Tỉnh Đắk Lắk', 'Tỉnh'),
('67', 'Tỉnh Đắk Nông', 'Tỉnh'),
('68', 'Tỉnh Lâm Đồng', 'Tỉnh'),
('70', 'Tỉnh Bình Phước', 'Tỉnh'),
('72', 'Tỉnh Tây Ninh', 'Tỉnh'),
('74', 'Tỉnh Bình Dương', 'Tỉnh'),
('75', 'Tỉnh Đồng Nai', 'Tỉnh'),
('77', 'Tỉnh Bà Rịa - Vũng Tàu', 'Tỉnh'),
('79', 'Thành phố Hồ Chí Minh', 'Thành phố Trung ương'),
('80', 'Tỉnh Long An', 'Tỉnh'),
('82', 'Tỉnh Tiền Giang', 'Tỉnh'),
('83', 'Tỉnh Bến Tre', 'Tỉnh'),
('84', 'Tỉnh Trà Vinh', 'Tỉnh'),
('86', 'Tỉnh Vĩnh Long', 'Tỉnh'),
('87', 'Tỉnh Đồng Tháp', 'Tỉnh'),
('89', 'Tỉnh An Giang', 'Tỉnh'),
('91', 'Tỉnh Kiên Giang', 'Tỉnh'),
('92', 'Thành phố Cần Thơ', 'Thành phố Trung ương'),
('93', 'Tỉnh Hậu Giang', 'Tỉnh'),
('94', 'Tỉnh Sóc Trăng', 'Tỉnh'),
('95', 'Tỉnh Bạc Liêu', 'Tỉnh'),
('96', 'Tỉnh Cà Mau', 'Tỉnh');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produc_id` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `money` int(11) NOT NULL,
  `old_price` int(11) NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `in_stock` int(4) NOT NULL,
  `weight` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chat_lieu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xuatxu` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `baohanh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_thuong_goi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_khoa_hoc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ten_goi_khac` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nguon_goc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dac_diem` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giao_hang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ho` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `danh_gia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_mua` int(3) NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`name`, `produc_id`, `category`, `money`, `old_price`, `description`, `in_stock`, `weight`, `size`, `chat_lieu`, `xuatxu`, `baohanh`, `ten_thuong_goi`, `ten_khoa_hoc`, `ten_goi_khac`, `nguon_goc`, `dac_diem`, `giao_hang`, `ho`, `danh_gia`, `max_mua`, `picture`) VALUES
('Bỏng Thái', 'C02', 'Cây trong nhà', 140000, 190000, ' Hoa có rất nhiều màu sắc tùy vào giống cây bạn chọn, có thể là màu đò, màu vàng, màu tím,.. cây có cành mang hoa cao so với là, cho hoa đơn 4 cánh, mỗi cành sẽ mang một chùm hoa nhìn rất đẹp nên thường được chọn trồng trong sân vườn, cảnh quan đô thị, công trình, hành lang, trang trí nội thất,…… Hiện nay trên thị trường đang có 2 loại hoa đơn và kép với nhiều màu sắc như: Đỏ, cam, hồng,…  Cây bỏng thái là loài cây có nhiều ý nghĩa, màu sắc lại rực rỡ với sức sống bền bỉ mang theo nhiều ý nghĩa ', 11, '0.5 kg', '30cm x 25cm', '', 'Việt Nam', 'Không hỗ trợ', 'Bỏng Thái', '', 'cây lá bỏng', 'Thái Lan', 'Lá mọng nước', 'cod', 'Bỏng ngô', '1 lượt đánh giá', 3, 'img/produc/bongthai.png img/produc/bongthai2.jpg '),
('Tùng Thơm', 'C03', 'Cây để bàn', 120000, 170000, 'Cây Tùng thơm còn có tên gọi khác là cây tùng hương, cây tùng chanh, là loài cây thuộc dạng thân gỗ nhỏ, có hình tháp tự nhiên, chiều cao trung bình khoảng từ 40 – 60cm, cây có lá hình kim, mọc nhiều trên cành nhánh và có mùi thơm rất dễ chịu.Ngoài tác dụng làm cảnh, cây tùng thơm còn có thể xua đuổi côn trùng bởi mùi của nó, làm tỉnh táo tinh thần và xua tan mệt mỏi sau những ngày làm việc.', 0, '0', '', '', 'Việt Nam', 'Không hỗ trợ', '', '', '', '', '', 'cod', '', '1 lượt đánh giá', 8, 'img/produc/tung-thom-03-600x786.jpg'),
('Bạch Mã Hoàng Tử', 'C06', 'Cây trong nhà', 175000, 225000, 'Cây có rễ chùm, màu trắng ngà. Đặc điểm nổi bật của cây Bạch Mã là sinh trưởng nhanh, lan bụi rộng. Người trồng có thể nhân giống bằng cách tách bụi, sẽ hiệu quả hơn nhiều so với việc gieo trồng.', 15, '0.48 kg', '30cm x 25cm', '', 'Việt Nam', 'Không hỗ trợ', '', '', '', 'Thái Lan', 'Lá chuối', 'COD', 'Bỏng ngô', '1 lượt đánh giá', 8, 'img/produc/bmht.jpg img/produc/19-370x270.jpg ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `uid` (`id_user`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quequan`
--
ALTER TABLE `quequan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`produc_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id_invoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `uid` FOREIGN KEY (`id_user`) REFERENCES `khachhang` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
